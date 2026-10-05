<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Mahasiswa;
use App\Models\SesiAbsensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    /**
     * Menampilkan halaman scan QR mahasiswa.
     */
    public function scan()
    {
        $user = Auth::user();

        $mahasiswa = $user->mahasiswa;

        if (!$mahasiswa) {
            abort(403, 'Data mahasiswa tidak ditemukan.');
        }

        return view('mahasiswa.scan', [
            'mahasiswa' => $mahasiswa,
        ]);
    }

    /**
     * Memproses hasil scan QR.
     */
    public function store(Request $request)
    {
        $request->validate([
            'token_qr' => ['required', 'string'],
        ]);

        $user = Auth::user();

        $mahasiswa = $user->mahasiswa;

        if (!$mahasiswa) {
            return response()->json([
                'success' => false,
                'message' => 'Data mahasiswa tidak ditemukan.',
            ], 403);
        }

        // Cari sesi berdasarkan token QR
        $sesi = SesiAbsensi::where('token_qr', $request->token_qr)
            ->where('aktif', true)
            ->with('jadwal.mataKuliah')
            ->first();

        if (!$sesi) {
            return response()->json([
                'success' => false,
                'message' => 'QR Code tidak valid atau sesi absensi sudah tidak aktif.',
            ], 404);
        }

        // Cek apakah sesi masih berada pada tanggal yang benar
        if (!$sesi->tanggal->isToday()) {
            return response()->json([
                'success' => false,
                'message' => 'Sesi absensi ini bukan untuk hari ini.',
            ], 422);
        }

        // Cek apakah mahasiswa sudah melakukan absensi
        $sudahAbsen = Absensi::where('sesi_absensi_id', $sesi->id)
            ->where('mahasiswa_id', $mahasiswa->id)
            ->exists();

        if ($sudahAbsen) {
            return response()->json([
                'success' => false,
                'message' => 'Kamu sudah melakukan absensi pada sesi ini.',
            ], 422);
        }

        // Tentukan status berdasarkan waktu scan
        $sekarang = now();

        $jamMulai = \Carbon\Carbon::parse(
            $sesi->tanggal->format('Y-m-d') . ' ' . $sesi->jam_mulai
        );

        $status = $sekarang->greaterThan($jamMulai)
            ? 'terlambat'
            : 'hadir';

        // Simpan absensi
        $absensi = Absensi::create([
            'sesi_absensi_id' => $sesi->id,
            'mahasiswa_id' => $mahasiswa->id,
            'waktu_scan' => $sekarang,
            'status' => $status,
        ]);

        return response()->json([
            'success' => true,
            'message' => $status === 'hadir'
                ? 'Absensi berhasil dicatat.'
                : 'Absensi berhasil dicatat sebagai terlambat.',
            'data' => [
                'id' => $absensi->id,
                'status' => $absensi->status,
                'waktu_scan' => $absensi->waktu_scan->format('d-m-Y H:i:s'),
                'mata_kuliah' => $sesi->jadwal->mataKuliah->nama ?? '-',
            ],
        ]);
    }
}