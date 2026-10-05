<?php

namespace App\Http\Controllers;

use App\Models\PengajuanAbsensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenPengajuanAbsensiController extends Controller
{
    /**
     * Menampilkan semua pengajuan mahasiswa
     * yang berasal dari jadwal milik dosen yang sedang login.
     */
    public function index()
    {
        $dosen = Auth::user()->dosen;

        if (!$dosen) {
            abort(403, 'Data dosen tidak ditemukan.');
        }

        $pengajuan = PengajuanAbsensi::with([
            'mahasiswa',
            'jadwal.mataKuliah',
            'jadwal.kelas',
        ])
        ->whereHas('jadwal', function ($query) use ($dosen) {
            $query->where('dosen_id', $dosen->id);
        })
        ->latest()
        ->get();

        return view('dosen.pengajuan-absensi', [
            'dosen' => $dosen,
            'pengajuan' => $pengajuan,
        ]);
    }

    /**
     * Menyetujui pengajuan.
     */
    public function approve($id)
    {
        $dosen = Auth::user()->dosen;

        if (!$dosen) {
            abort(403, 'Data dosen tidak ditemukan.');
        }

        $pengajuan = PengajuanAbsensi::where('id', $id)
            ->whereHas('jadwal', function ($query) use ($dosen) {
                $query->where('dosen_id', $dosen->id);
            })
            ->firstOrFail();

        $pengajuan->update([
            'status' => 'disetujui',
            'diproses_at' => now(),
            'catatan_admin' => null,
        ]);

        return back()->with(
            'success',
            'Pengajuan berhasil disetujui.'
        );
    }

    /**
     * Menolak pengajuan.
     */
    public function reject(Request $request, $id)
    {
        $dosen = Auth::user()->dosen;

        if (!$dosen) {
            abort(403, 'Data dosen tidak ditemukan.');
        }

        $data = $request->validate([
            'catatan' => [
                'nullable',
                'string',
                'max:2000'
            ],
        ]);

        $pengajuan = PengajuanAbsensi::where('id', $id)
            ->whereHas('jadwal', function ($query) use ($dosen) {
                $query->where('dosen_id', $dosen->id);
            })
            ->firstOrFail();

        $pengajuan->update([
            'status' => 'ditolak',
            'diproses_at' => now(),
            'catatan_admin' => $data['catatan'] ?? null,
        ]);

        return back()->with(
            'success',
            'Pengajuan berhasil ditolak.'
        );
    }
}