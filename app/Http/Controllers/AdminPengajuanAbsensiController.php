<?php

namespace App\Http\Controllers;

use App\Models\PengajuanAbsensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPengajuanAbsensiController extends Controller
{
    /**
     * Pastikan pengguna adalah admin.
     */
    private function checkAdmin(): void
    {
        $user = Auth::user();

        if (!$user || $user->role !== 'admin') {
            abort(
                403,
                'Halaman ini hanya dapat diakses oleh admin.'
            );
        }
    }

    /**
     * Menampilkan halaman pengajuan absensi.
     */
    public function index(Request $request)
    {
        $this->checkAdmin();

        /*
        |--------------------------------------------------------------------------
        | USER LOGIN
        |--------------------------------------------------------------------------
        */

        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | DATA ADMIN
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
        | QUERY PENGAJUAN
        |--------------------------------------------------------------------------
        */

        $query = PengajuanAbsensi::with([
            'mahasiswa',
            'jadwal.mataKuliah',
            'jadwal.dosen',
            'jadwal.kelas',
        ]);

        /*
        |--------------------------------------------------------------------------
        | FILTER STATUS
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {

            $query->where(
                'status',
                $request->status
            );
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER TANGGAL
        |--------------------------------------------------------------------------
        */

        if ($request->filled('tanggal')) {

            $query->whereDate(
                'tanggal',
                $request->tanggal
            );
        }

        /*
        |--------------------------------------------------------------------------
        | DATA PENGAJUAN
        |--------------------------------------------------------------------------
        */

        $pengajuan = $query
            ->orderByDesc('created_at')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | STATISTIK
        |--------------------------------------------------------------------------
        */

        $totalPengajuan =
            PengajuanAbsensi::count();

        $totalMenunggu =
            PengajuanAbsensi::where(
                'status',
                'menunggu'
            )->count();

        $totalDisetujui =
            PengajuanAbsensi::where(
                'status',
                'disetujui'
            )->count();

        $totalDitolak =
            PengajuanAbsensi::where(
                'status',
                'ditolak'
            )->count();

        /*
        |--------------------------------------------------------------------------
        | KIRIM DATA KE VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.pengajuan-absensi.index',
            [

                'user' =>
                    $user,

                'admin' =>
                    $admin,

                'pengajuan' =>
                    $pengajuan,

                'totalPengajuan' =>
                    $totalPengajuan,

                'totalMenunggu' =>
                    $totalMenunggu,

                'totalDisetujui' =>
                    $totalDisetujui,

                'totalDitolak' =>
                    $totalDitolak,

                'filterStatus' =>
                    $request->status,

                'filterTanggal' =>
                    $request->tanggal,

            ]
        );
    }

    /**
     * Menyetujui pengajuan.
     */
    public function approve(int $id)
    {
        $this->checkAdmin();

        $pengajuan =
            PengajuanAbsensi::findOrFail($id);

        $pengajuan->update([
            'status' =>
                'disetujui',

            'diproses_at' =>
                now(),
        ]);

        return back()->with(
            'success',
            'Pengajuan absensi berhasil disetujui.'
        );
    }

    /**
     * Menolak pengajuan.
     */
    public function reject(
        Request $request,
        int $id
    ) {
        $this->checkAdmin();

        $request->validate([
            'catatan_admin' =>
                'nullable|string|max:1000',
        ]);

        $pengajuan =
            PengajuanAbsensi::findOrFail($id);

        $pengajuan->update([
            'status' =>
                'ditolak',

            'catatan_admin' =>
                $request->catatan_admin,

            'diproses_at' =>
                now(),
        ]);

        return back()->with(
            'success',
            'Pengajuan absensi berhasil ditolak.'
        );
    }
}