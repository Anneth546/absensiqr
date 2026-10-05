<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\MataKuliah;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenJadwalController extends Controller
{
    /**
     * Menampilkan daftar jadwal milik dosen yang sedang login.
     *
     * Jika ada ?mata_kuliah_id=..., maka hanya jadwal
     * untuk mata kuliah tersebut yang ditampilkan.
     */
    public function index(Request $request)
    {
        $dosen = Auth::user()->dosen;

        if (!$dosen) {
            abort(403, 'Data dosen tidak ditemukan.');
        }

        $query = Jadwal::where('dosen_id', $dosen->id)
            ->with(['mataKuliah', 'kelas']);

        // Jika dosen datang dari halaman Mata Kuliah
        // dengan memilih mata kuliah tertentu
        if ($request->filled('mata_kuliah_id')) {
            $query->where(
                'mata_kuliah_id',
                $request->mata_kuliah_id
            );
        }

        $jadwals = $query
            ->orderByRaw("
                FIELD(
                    hari,
                    'Senin',
                    'Selasa',
                    'Rabu',
                    'Kamis',
                    'Jumat',
                    'Sabtu',
                    'Minggu'
                )
            ")
            ->orderBy('jam_mulai')
            ->get();

        // Mata kuliah yang sedang dipilih
        $mataKuliahTerpilih = null;

        if ($request->filled('mata_kuliah_id')) {
            $mataKuliahTerpilih = MataKuliah::find(
                $request->mata_kuliah_id
            );
        }

        return view('dosen.jadwal', [
            'dosen' => $dosen,
            'jadwals' => $jadwals,
            'mataKuliahTerpilih' => $mataKuliahTerpilih,
        ]);
    }


    /**
     * Menampilkan form tambah jadwal.
     */
    public function create()
    {
        $dosen = Auth::user()->dosen;

        if (!$dosen) {
            abort(403, 'Data dosen tidak ditemukan.');
        }

        $mataKuliahs = MataKuliah::orderBy('nama')->get();

        $kelass = Kelas::orderBy('nama')->get();

        return view('dosen.jadwal-create', [
            'dosen' => $dosen,
            'mataKuliahs' => $mataKuliahs,
            'kelass' => $kelass,
        ]);
    }


    /**
     * Menyimpan jadwal baru.
     */
    public function store(Request $request)
    {
        $dosen = Auth::user()->dosen;

        if (!$dosen) {
            abort(403, 'Data dosen tidak ditemukan.');
        }

        $data = $request->validate([
            'mata_kuliah_id' => [
                'required',
                'exists:mata_kuliahs,id'
            ],

            'kelas_id' => [
                'required',
                'exists:kelas,id'
            ],

            'hari' => [
                'required',
                'in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu'
            ],

            'jam_mulai' => [
                'required',
                'date_format:H:i'
            ],

            'jam_selesai' => [
                'required',
                'date_format:H:i',
                'after:jam_mulai'
            ],

            'ruangan' => [
                'nullable',
                'string',
                'max:100'
            ],
        ]);

        Jadwal::create([
            'mata_kuliah_id' => $data['mata_kuliah_id'],
            'dosen_id' => $dosen->id,
            'kelas_id' => $data['kelas_id'],
            'hari' => $data['hari'],
            'jam_mulai' => $data['jam_mulai'],
            'jam_selesai' => $data['jam_selesai'],
            'ruangan' => $data['ruangan'] ?? null,
        ]);

        return redirect()
            ->route('dosen.jadwal')
            ->with(
                'success',
                'Jadwal berhasil dibuat.'
            );
    }
}