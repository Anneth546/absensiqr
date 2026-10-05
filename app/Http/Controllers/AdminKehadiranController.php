<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminKehadiranController extends Controller
{
    /**
     * Memastikan hanya admin yang boleh mengakses.
     */
    private function checkAdmin(): void
    {
        $user = Auth::user();

        if (!$user || $user->role !== 'admin') {
            abort(403, 'Halaman ini hanya dapat diakses oleh admin.');
        }
    }

    /**
     * Menampilkan seluruh data kehadiran.
     */
    public function index(Request $request)
    {
        $this->checkAdmin();

        $query = Absensi::with([
            'mahasiswa',
            'sesiAbsensi.jadwal.mataKuliah',
            'sesiAbsensi.jadwal.dosen',
            'sesiAbsensi.jadwal.kelas',
        ]);

        /*
         * Filter tanggal.
         */
        if ($request->filled('tanggal')) {
            $query->whereHas('sesiAbsensi', function ($q) use ($request) {
                $q->whereDate('tanggal', $request->tanggal);
            });
        }

        /*
         * Filter status.
         */
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        /*
         * Data terbaru di atas.
         */
        $kehadiran = $query
            ->orderByDesc('waktu_scan')
            ->get();

        /*
         * Statistik.
         */
        $totalKehadiran = Absensi::count();

        $totalHadir = Absensi::where('status', 'hadir')
            ->count();

        $totalTerlambat = Absensi::where('status', 'terlambat')
            ->count();

        $totalIzin = Absensi::where('status', 'izin')
            ->count();

        $totalSakit = Absensi::where('status', 'sakit')
            ->count();

        return view('admin.kehadiran.index', [
            'kehadiran' => $kehadiran,
            'totalKehadiran' => $totalKehadiran,
            'totalHadir' => $totalHadir,
            'totalTerlambat' => $totalTerlambat,
            'totalIzin' => $totalIzin,
            'totalSakit' => $totalSakit,
            'filterTanggal' => $request->tanggal,
            'filterStatus' => $request->status,
        ]);
    }
}