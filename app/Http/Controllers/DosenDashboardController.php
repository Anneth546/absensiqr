<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;

class DosenDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $dosen = $user->dosen;

        if (!$dosen) {
            abort(403, 'Data dosen tidak ditemukan.');
        }

        // Jumlah mahasiswa yang hadir
        $hadir = Absensi::whereHas('sesiAbsensi.jadwal', function ($query) use ($dosen) {
            $query->where('dosen_id', $dosen->id);
        })
        ->where('status', 'hadir')
        ->count();

        // Jumlah terlambat
        $terlambat = Absensi::whereHas('sesiAbsensi.jadwal', function ($query) use ($dosen) {
            $query->where('dosen_id', $dosen->id);
        })
        ->where('status', 'terlambat')
        ->count();

        // Jumlah izin
        $izin = Absensi::whereHas('sesiAbsensi.jadwal', function ($query) use ($dosen) {
            $query->where('dosen_id', $dosen->id);
        })
        ->where('status', 'izin')
        ->count();

        // Jumlah sakit
        $sakit = Absensi::whereHas('sesiAbsensi.jadwal', function ($query) use ($dosen) {
            $query->where('dosen_id', $dosen->id);
        })
        ->where('status', 'sakit')
        ->count();

        return view('dosen.dashboard', [
            'dosen' => $dosen,
            'hadir' => $hadir,
            'terlambat' => $terlambat,
            'izin' => $izin,
            'sakit' => $sakit,
        ]);
    }
}