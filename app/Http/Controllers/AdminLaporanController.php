<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\PengajuanAbsensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLaporanController extends Controller
{
    private function checkAdmin(): void
    {
        $user = Auth::user();

        if (! $user || $user->role !== 'admin') {
            abort(403, 'Halaman ini hanya dapat diakses oleh admin.');
        }
    }

    private function getFilteredQuery(Request $request)
    {
        $query = Absensi::with([
            'mahasiswa',
            'sesiAbsensi.jadwal.mataKuliah',
            'sesiAbsensi.jadwal.dosen',
            'sesiAbsensi.jadwal.kelas',
        ]);

        if ($request->filled('tanggal_mulai')) {
            $query->whereHas('sesiAbsensi', function ($q) use ($request) {
                $q->whereDate('tanggal', '>=', $request->tanggal_mulai);
            });
        }

        if ($request->filled('tanggal_selesai')) {
            $query->whereHas('sesiAbsensi', function ($q) use ($request) {
                $q->whereDate('tanggal', '<=', $request->tanggal_selesai);
            });
        }

        if ($request->filled('mata_kuliah_id')) {
            $query->whereHas('sesiAbsensi.jadwal', function ($q) use ($request) {
                $q->where('mata_kuliah_id', $request->mata_kuliah_id);
            });
        }

        if ($request->filled('kelas_id')) {
            $query->whereHas('sesiAbsensi.jadwal', function ($q) use ($request) {
                $q->where('kelas_id', $request->kelas_id);
            });
        }

        if ($request->filled('dosen_id')) {
            $query->whereHas('sesiAbsensi.jadwal', function ($q) use ($request) {
                $q->where('dosen_id', $request->dosen_id);
            });
        }

        return $query;
    }

    private function getFilteredPengajuanQuery(Request $request, bool $filterStatus = true)
    {
        $query = PengajuanAbsensi::with([
            'mahasiswa',
            'jadwal.mataKuliah',
            'jadwal.dosen',
            'jadwal.kelas',
        ]);

        if ($filterStatus && $request->filled('status_pengajuan')) {
            $query->where('status', $request->status_pengajuan);
        }

        if ($request->filled('tanggal_mulai')) {
            $query->whereDate('tanggal', '>=', $request->tanggal_mulai);
        }

        if ($request->filled('tanggal_selesai')) {
            $query->whereDate('tanggal', '<=', $request->tanggal_selesai);
        }

        foreach ([
            'mata_kuliah_id' => 'mata_kuliah_id',
            'kelas_id' => 'kelas_id',
            'dosen_id' => 'dosen_id',
        ] as $requestField => $jadwalField) {
            if ($request->filled($requestField)) {
                $query->whereHas('jadwal', function ($q) use ($request, $requestField, $jadwalField) {
                    $q->where($jadwalField, $request->input($requestField));
                });
            }
        }

        return $query;
    }

    private function mapPengajuanForReport(PengajuanAbsensi $pengajuan): object
    {
        return (object) [
            'mahasiswa' => $pengajuan->mahasiswa,
            'sesiAbsensi' => (object) [
                'jadwal' => $pengajuan->jadwal,
                'tanggal' => $pengajuan->tanggal,
            ],
            'waktu_scan' => null,
            'status' => $pengajuan->status,
            'keterangan' => $pengajuan->catatan_admin ?: $pengajuan->alasan,
        ];
    }

    public function index(Request $request)
    {
        $this->checkAdmin();

        $request->validate([
            'status_pengajuan' => 'nullable|in:menunggu,disetujui,ditolak',
        ]);

        $mataKuliahs = MataKuliah::orderBy('nama')->get();
        $kelases = Kelas::orderBy('nama')->get();
        $dosens = Dosen::orderBy('nama')->get();

        $isPengajuanReport = $request->filled('status_pengajuan');

        if ($isPengajuanReport) {
            $absensi = $this->getFilteredPengajuanQuery($request)
                ->orderByDesc('tanggal')
                ->orderByDesc('created_at')
                ->get()
                ->map(fn (PengajuanAbsensi $pengajuan) => $this->mapPengajuanForReport($pengajuan));

            $pengajuanStats = $this->getFilteredPengajuanQuery($request, false)
                ->selectRaw('status, COUNT(*) as jumlah')
                ->groupBy('status')
                ->pluck('jumlah', 'status');

            $total = $pengajuanStats->sum();
            $menunggu = (int) ($pengajuanStats['menunggu'] ?? 0);
            $disetujui = (int) ($pengajuanStats['disetujui'] ?? 0);
            $ditolak = (int) ($pengajuanStats['ditolak'] ?? 0);
        } else {
            $absensi = $this->getFilteredQuery($request)
                ->orderByDesc('waktu_scan')
                ->get();

            $total = $absensi->count();
            $hadir = $absensi->where('status', 'hadir')->count();
            $terlambat = $absensi->where('status', 'terlambat')->count();
            $izin = $absensi->where('status', 'izin')->count();
            $sakit = $absensi->where('status', 'sakit')->count();
            $alpha = $absensi->where('status', 'alpha')->count();

            $persentaseHadir = $total > 0
                ? round(($hadir / $total) * 100, 1)
                : 0;
        }

        return view('admin.laporan.index', [
            'absensi' => $absensi,
            'mataKuliahs' => $mataKuliahs,
            'kelases' => $kelases,
            'dosens' => $dosens,
            'total' => $total,
            'hadir' => $hadir ?? 0,
            'terlambat' => $terlambat ?? 0,
            'izin' => $izin ?? 0,
            'sakit' => $sakit ?? 0,
            'alpha' => $alpha ?? 0,
            'persentaseHadir' => $persentaseHadir ?? 0,
            'isPengajuanReport' => $isPengajuanReport,
            'menunggu' => $menunggu ?? 0,
            'disetujui' => $disetujui ?? 0,
            'ditolak' => $ditolak ?? 0,
            'tanggalMulai' => $request->tanggal_mulai,
            'tanggalSelesai' => $request->tanggal_selesai,
            'mataKuliahId' => $request->mata_kuliah_id,
            'kelasId' => $request->kelas_id,
            'dosenId' => $request->dosen_id,
            'statusPengajuan' => $request->status_pengajuan,
        ]);
    }

    public function exportExcel(Request $request)
    {
        $this->checkAdmin();

        $request->validate([
            'status_pengajuan' => 'nullable|in:menunggu,disetujui,ditolak',
        ]);

        if ($request->filled('status_pengajuan')) {
            $absensi = $this->getFilteredPengajuanQuery($request)
                ->orderByDesc('tanggal')
                ->orderByDesc('created_at')
                ->get()
                ->map(fn (PengajuanAbsensi $pengajuan) => $this->mapPengajuanForReport($pengajuan));
        } else {
            $absensi = $this->getFilteredQuery($request)
                ->orderByDesc('waktu_scan')
                ->get();
        }

        $namaFile = 'laporan-presensi-' . now()->format('Y-m-d-His') . '.csv';

        return response()->streamDownload(function () use ($absensi) {
            echo "\xEF\xBB\xBF";

            echo implode(',', [
                '"No"',
                '"NPM"',
                '"Nama Mahasiswa"',
                '"Kode Mata Kuliah"',
                '"Mata Kuliah"',
                '"Kelas"',
                '"Dosen"',
                '"Tanggal"',
                '"Waktu Scan"',
                '"Status"',
                '"Keterangan"',
            ]);
            echo PHP_EOL;

            $no = 1;

            foreach ($absensi as $item) {
                $mahasiswa = $item->mahasiswa;
                $jadwal = $item->sesiAbsensi ? $item->sesiAbsensi->jadwal : null;
                $mataKuliah = $jadwal ? $jadwal->mataKuliah : null;
                $kelas = $jadwal ? $jadwal->kelas : null;
                $dosen = $jadwal ? $jadwal->dosen : null;

                $tanggal = $item->sesiAbsensi && $item->sesiAbsensi->tanggal
                    ? $item->sesiAbsensi->tanggal->format('d-m-Y')
                    : '';

                $waktu = $item->waktu_scan
                    ? $item->waktu_scan->format('H:i:s')
                    : '';

                $row = [
                    $no,
                    $mahasiswa->npm ?? '',
                    $mahasiswa->nama ?? '',
                    $mataKuliah->kode ?? '',
                    $mataKuliah->nama ?? '',
                    $kelas->nama ?? '',
                    $dosen->nama ?? '',
                    $tanggal,
                    $waktu,
                    ucfirst($item->status ?? ''),
                    $item->keterangan ?? '',
                ];

                $row = array_map(function ($value) {
                    $value = (string) $value;
                    $value = str_replace('"', '""', $value);

                    return '"' . $value . '"';
                }, $row);

                echo implode(',', $row) . PHP_EOL;
                $no++;
            }
        }, $namaFile, [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $namaFile . '"',
        ]);
    }
}