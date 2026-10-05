<?php

namespace App\Http\Controllers;

use App\Models\SesiAbsensi;
use Illuminate\Support\Facades\Auth;

class AdminSesiAbsensiController extends Controller
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
     * Menampilkan semua sesi absensi.
     */
    public function index()
    {
        $this->checkAdmin();

        $sesiAbsensi = SesiAbsensi::with([
            'jadwal.mataKuliah',
            'jadwal.dosen',
            'jadwal.kelas',
        ])
            ->orderByDesc('tanggal')
            ->orderByDesc('jam_mulai')
            ->get();

        return view('admin.sesi-absensi.index', [
            'sesiAbsensi' => $sesiAbsensi,
        ]);
    }

    /**
     * Menampilkan detail sesi absensi.
     */
    public function show(int $id)
    {
        $this->checkAdmin();

        $sesi = SesiAbsensi::with([
            'jadwal.mataKuliah',
            'jadwal.dosen',
            'jadwal.kelas',
            'absensi.mahasiswa',
        ])->findOrFail($id);

        return view('admin.sesi-absensi.show', [
            'sesi' => $sesi,
        ]);
    }
}