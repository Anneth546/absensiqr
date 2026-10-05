<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\SesiAbsensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenRiwayatController extends Controller
{
    public function index(Request $request)
    {
        $dosen = Auth::user()->dosen;

        if (!$dosen) {
            abort(403, 'Data dosen tidak ditemukan.');
        }

        $mataKuliahId = $request->input('mata_kuliah_id');
        $tanggal = $request->input('tanggal');

        $riwayat = SesiAbsensi::with([
            'jadwal.mataKuliah',
            'jadwal.kelas',
            'jadwal.dosen',
        ])
        ->withCount([
            'absensi as total_absensi',

            'absensi as total_hadir' => function ($query) {
                $query->where('status', 'hadir');
            },

            'absensi as total_terlambat' => function ($query) {
                $query->where('status', 'terlambat');
            },

            'absensi as total_izin' => function ($query) {
                $query->where('status', 'izin');
            },

            'absensi as total_sakit' => function ($query) {
                $query->where('status', 'sakit');
            },

            'absensi as total_alpha' => function ($query) {
                $query->where('status', 'alpha');
            },
        ])
        ->whereHas('jadwal', function ($query) use ($dosen, $mataKuliahId) {

            $query->where('dosen_id', $dosen->id);

            if ($mataKuliahId) {
                $query->where('mata_kuliah_id', $mataKuliahId);
            }
        });

        if ($tanggal) {
            $riwayat->whereDate('tanggal', $tanggal);
        }

        $riwayat = $riwayat
            ->orderByDesc('tanggal')
            ->orderByDesc('jam_mulai')
            ->get();

        $mataKuliahs = MataKuliah::whereHas(
            'jadwal',
            function ($query) use ($dosen) {
                $query->where('dosen_id', $dosen->id);
            }
        )
        ->orderBy('nama')
        ->get();

        $totalSesi = $riwayat->count();

        $totalAbsensi = $riwayat->sum('total_absensi');

        $totalHadir = $riwayat->sum('total_hadir');

        $totalTerlambat = $riwayat->sum('total_terlambat');

        return view('dosen.riwayat', [
            'dosen' => $dosen,
            'riwayat' => $riwayat,
            'mataKuliahs' => $mataKuliahs,
            'totalSesi' => $totalSesi,
            'totalAbsensi' => $totalAbsensi,
            'totalHadir' => $totalHadir,
            'totalTerlambat' => $totalTerlambat,
        ]);
    }
}