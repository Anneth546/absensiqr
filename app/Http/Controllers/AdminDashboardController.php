<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\SesiAbsensi;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    private function checkAdmin(): void
    {
        $user = Auth::user();

        if (!$user || $user->role !== 'admin') {
            abort(403, 'Halaman ini hanya dapat diakses oleh admin.');
        }
    }

    public function index()
    {
        $this->checkAdmin();

        /*
        |--------------------------------------------------------------------------
        | DATA USER YANG SEDANG LOGIN
        |--------------------------------------------------------------------------
        */

        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | DATA PROFIL ADMIN
        |--------------------------------------------------------------------------
        */

        $admin = $user->admin;

        if (!$admin) {
            abort(
                404,
                'Data profil admin tidak ditemukan.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | STATISTIK
        |--------------------------------------------------------------------------
        */

        $totalMahasiswa = Mahasiswa::count();

        $totalDosen = Dosen::count();

        $totalMataKuliah = MataKuliah::count();

        $totalKelas = Kelas::count();

        $totalSesiAbsensi = SesiAbsensi::count();

        $totalKehadiran = Absensi::count();

        /*
        |--------------------------------------------------------------------------
        | KIRIM DATA KE VIEW
        |--------------------------------------------------------------------------
        */

        return view('admin.dashboard', [

            'user' => $user,

            'admin' => $admin,

            'totalMahasiswa' => $totalMahasiswa,

            'totalDosen' => $totalDosen,

            'totalMataKuliah' => $totalMataKuliah,

            'totalKelas' => $totalKelas,

            'totalSesiAbsensi' => $totalSesiAbsensi,

            'totalKehadiran' => $totalKehadiran,

        ]);
    }
}