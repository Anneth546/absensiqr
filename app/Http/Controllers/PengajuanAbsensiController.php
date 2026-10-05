<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\PengajuanAbsensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanAbsensiController extends Controller
{
    /**
     * Menampilkan halaman Izin / Sakit
     */
    public function index()
    {
        $user = Auth::user();

        $mahasiswa = $user->mahasiswa;

        if (!$mahasiswa) {
            abort(403, 'Data mahasiswa tidak ditemukan.');
        }

        $pengajuan = PengajuanAbsensi::where(
            'mahasiswa_id',
            $mahasiswa->id
        )
        ->with([
            'jadwal.mataKuliah',
            'jadwal.dosen'
        ])
        ->latest()
        ->get();

        $jadwals = Jadwal::with([
            'mataKuliah',
            'dosen'
        ])
        ->orderBy('hari')
        ->orderBy('jam_mulai')
        ->get();

        return view('mahasiswa.izin-sakit', [
            'mahasiswa' => $mahasiswa,
            'pengajuan' => $pengajuan,
            'jadwals' => $jadwals,
        ]);
    }


    /**
     * Menyimpan pengajuan baru
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $mahasiswa = $user->mahasiswa;

        if (!$mahasiswa) {
            abort(403, 'Data mahasiswa tidak ditemukan.');
        }

        $data = $request->validate([
            'jadwal_id' => [
                'required',
                'exists:jadwals,id'
            ],

            'tanggal' => [
                'required',
                'date'
            ],

            'jenis' => [
                'required',
                'in:tidak_hadir,sakit,terlambat,qr_bermasalah,kendala_teknis,lainnya'
            ],

            'alasan' => [
                'required',
                'string',
                'max:2000'
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Cek apakah mahasiswa sudah membuat pengajuan
        |--------------------------------------------------------------------------
        */

        $sudahAda = PengajuanAbsensi::where(
            'mahasiswa_id',
            $mahasiswa->id
        )
        ->where('jadwal_id', $data['jadwal_id'])
        ->where('tanggal', $data['tanggal'])
        ->exists();


        if ($sudahAda) {

            return back()
                ->withErrors([
                    'tanggal' => 'Kamu sudah memiliki pengajuan untuk jadwal dan tanggal tersebut.'
                ])
                ->withInput();
        }


        /*
        |--------------------------------------------------------------------------
        | Simpan pengajuan
        |--------------------------------------------------------------------------
        */

        PengajuanAbsensi::create([
            'mahasiswa_id' => $mahasiswa->id,
            'jadwal_id' => $data['jadwal_id'],
            'tanggal' => $data['tanggal'],
            'jenis' => $data['jenis'],
            'alasan' => $data['alasan'],
            'status' => 'menunggu',
        ]);


        return redirect()
            ->route('mahasiswa.izin-sakit')
            ->with(
                'success',
                'Pengajuan berhasil dikirim dan sedang menunggu pemeriksaan.'
            );
    }
}