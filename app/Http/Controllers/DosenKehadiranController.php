<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;

class DosenKehadiranController extends Controller
{
    /**
     * Menampilkan daftar kehadiran mahasiswa
     * berdasarkan sesi absensi milik dosen yang sedang login.
     */
    public function index()
    {
        // Ambil data dosen yang sedang login
        $dosen = Auth::user()->dosen;

        // Kalau data dosen tidak ditemukan
        if (!$dosen) {
            abort(403, 'Data dosen tidak ditemukan.');
        }

        /*
        |--------------------------------------------------------------------------
        | Ambil data absensi
        |--------------------------------------------------------------------------
        | Kita hanya mengambil absensi yang sesi jadwalnya
        | dibuat oleh dosen yang sedang login.
        */
        $absensis = Absensi::with([
            'mahasiswa',
            'sesiAbsensi.jadwal.mataKuliah',
            'sesiAbsensi.jadwal.kelas',
        ])
            ->whereHas('sesiAbsensi.jadwal', function ($query) use ($dosen) {
                $query->where('dosen_id', $dosen->id);
            })
            ->latest('waktu_scan')
            ->get();

        return view('dosen.kehadiran', [
            'dosen' => $dosen,
            'absensis' => $absensis,
        ]);
    }
}