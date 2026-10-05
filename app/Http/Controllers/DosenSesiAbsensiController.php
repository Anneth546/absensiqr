<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\SesiAbsensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DosenSesiAbsensiController extends Controller
{
    /**
     * Halaman Sesi Absensi
     */
    public function index()
    {
        $user = Auth::user();

        $dosen = $user->dosen;

        if (!$dosen) {
            abort(403, 'Data dosen tidak ditemukan.');
        }

        // Ambil jadwal milik dosen yang sedang login
        $jadwals = Jadwal::where('dosen_id', $dosen->id)
            ->with(['mataKuliah', 'kelas'])
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();

        // Ambil sesi milik dosen
        $sesiAbsensis = SesiAbsensi::whereHas('jadwal', function ($query) use ($dosen) {
                $query->where('dosen_id', $dosen->id);
            })
            ->with(['jadwal.mataKuliah', 'jadwal.kelas'])
            ->latest()
            ->get();

        return view('dosen.sesi-absensi', [
            'dosen' => $dosen,
            'jadwals' => $jadwals,
            'sesiAbsensis' => $sesiAbsensis,
        ]);
    }

    /**
     * Membuat sesi absensi baru
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $dosen = $user->dosen;

        if (!$dosen) {
            abort(403, 'Data dosen tidak ditemukan.');
        }

        $data = $request->validate([
            'jadwal_id' => ['required', 'exists:jadwals,id'],
            'tanggal' => ['required', 'date'],
            'jam_mulai' => ['required', 'date_format:H:i'],
            'jam_selesai' => ['required', 'date_format:H:i', 'after:jam_mulai'],
        ], [
            'jadwal_id.required' => 'Silakan pilih jadwal.',
            'jadwal_id.exists' => 'Jadwal tidak ditemukan.',
            'tanggal.required' => 'Tanggal wajib diisi.',
            'jam_mulai.required' => 'Jam mulai wajib diisi.',
            'jam_selesai.required' => 'Jam selesai wajib diisi.',
            'jam_selesai.after' => 'Jam selesai harus lebih besar dari jam mulai.',
        ]);

        // Pastikan jadwal memang milik dosen yang login
        $jadwal = Jadwal::where('id', $data['jadwal_id'])
            ->where('dosen_id', $dosen->id)
            ->first();

        if (!$jadwal) {
            return back()
                ->withErrors([
                    'jadwal_id' => 'Jadwal tersebut bukan milik Anda.'
                ])
                ->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | Nonaktifkan sesi lama untuk jadwal yang sama
        |--------------------------------------------------------------------------
        */
        SesiAbsensi::where('jadwal_id', $jadwal->id)
            ->where('aktif', true)
            ->update([
                'aktif' => false
            ]);

        /*
        |--------------------------------------------------------------------------
        | Buat token QR
        |--------------------------------------------------------------------------
        */
        $token = strtoupper(Str::random(32));

        $sesi = SesiAbsensi::create([
            'jadwal_id' => $jadwal->id,
            'tanggal' => $data['tanggal'],
            'jam_mulai' => $data['jam_mulai'],
            'jam_selesai' => $data['jam_selesai'],
            'token_qr' => $token,
            'aktif' => true,
        ]);

        return redirect()
            ->route('dosen.sesi-absensi')
            ->with('success', 'Sesi absensi berhasil dibuat.')
            ->with('sesi_id', $sesi->id);
    }

    /**
     * Menonaktifkan sesi
     */
    public function deactivate($id)
    {
        $user = Auth::user();

        $dosen = $user->dosen;

        if (!$dosen) {
            abort(403, 'Data dosen tidak ditemukan.');
        }

        $sesi = SesiAbsensi::whereHas('jadwal', function ($query) use ($dosen) {
                $query->where('dosen_id', $dosen->id);
            })
            ->findOrFail($id);

        $sesi->update([
            'aktif' => false
        ]);

        return redirect()
            ->route('dosen.sesi-absensi')
            ->with('success', 'Sesi absensi berhasil dinonaktifkan.');
    }
}