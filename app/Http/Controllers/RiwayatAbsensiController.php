<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;

class RiwayatAbsensiController extends Controller
{
    public function index()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil data mahasiswa dari user tersebut
        $mahasiswa = $user->mahasiswa;

        // Kalau data mahasiswa tidak ditemukan
        if (!$mahasiswa) {
            abort(403, 'Data mahasiswa tidak ditemukan.');
        }


        // =====================================================
        // AMBIL RIWAYAT ABSENSI
        // =====================================================

        $riwayat = Absensi::where('mahasiswa_id', $mahasiswa->id)
            ->with([
                'sesiAbsensi.jadwal.mataKuliah',
                'sesiAbsensi.jadwal.dosen'
            ])
            ->orderByDesc('waktu_scan')
            ->get();


        // =====================================================
        // HITUNG STATISTIK
        // =====================================================

        // Total semua absensi
        $totalAbsensi = $riwayat->count();


        // Jumlah hadir
        $hadir = $riwayat
            ->where('status', 'hadir')
            ->count();


        // Jumlah terlambat
        $terlambat = $riwayat
            ->where('status', 'terlambat')
            ->count();


        // =====================================================
        // KIRIM DATA KE VIEW
        // =====================================================

        return view('mahasiswa.riwayat', [
            'mahasiswa' => $mahasiswa,
            'riwayat' => $riwayat,
            'totalAbsensi' => $totalAbsensi,
            'hadir' => $hadir,
            'terlambat' => $terlambat,
        ]);
    }
}