<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;

class MahasiswaDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $mahasiswa = $user->mahasiswa;

        // Jika bukan mahasiswa
        if (!$mahasiswa) {
            abort(403, 'Akun mahasiswa tidak ditemukan.');
        }

        // =========================
        // DATA ABSENSI
        // =========================

        $hadir = Absensi::where('mahasiswa_id', $mahasiswa->id)
            ->where('status', 'hadir')
            ->count();

        $izin = Absensi::where('mahasiswa_id', $mahasiswa->id)
            ->where('status', 'izin')
            ->count();

        $sakit = Absensi::where('mahasiswa_id', $mahasiswa->id)
            ->where('status', 'sakit')
            ->count();

        $totalAbsensi = Absensi::where('mahasiswa_id', $mahasiswa->id)
            ->count();

        // =========================
        // PERSENTASE HADIR
        // =========================

        $persentaseHadir = $totalAbsensi > 0
            ? round(($hadir / $totalAbsensi) * 100)
            : 0;

        return view('mahasiswa.dashboard', [
            'mahasiswa' => $mahasiswa,
            'hadir' => $hadir,
            'izin' => $izin,
            'sakit' => $sakit,
            'persentaseHadir' => $persentaseHadir,
        ]);
    }
}