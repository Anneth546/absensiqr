<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminJadwalController extends Controller
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
     * Menampilkan daftar jadwal.
     */
    public function index()
    {
        $this->checkAdmin();

        $jadwal = Jadwal::with([
            'mataKuliah',
            'dosen',
            'kelas',
        ])
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();

        return view('admin.jadwal.index', [
            'jadwal' => $jadwal,
        ]);
    }

    /**
     * Form tambah jadwal.
     */
    public function create()
    {
        $this->checkAdmin();

        $mataKuliah = MataKuliah::orderBy('kode')->get();

        $dosen = Dosen::orderBy('nama')->get();

        $kelas = Kelas::orderBy('nama')->get();

        return view('admin.jadwal.create', [
            'mataKuliah' => $mataKuliah,
            'dosen' => $dosen,
            'kelas' => $kelas,
        ]);
    }

    /**
     * Menyimpan jadwal baru.
     */
    public function store(Request $request)
    {
        $this->checkAdmin();

        $data = $request->validate(
            [
                'mata_kuliah_id' => [
                    'required',
                    'integer',
                    'exists:mata_kuliahs,id',
                ],

                'dosen_id' => [
                    'required',
                    'integer',
                    'exists:dosens,id',
                ],

                'kelas_id' => [
                    'required',
                    'integer',
                    'exists:kelas,id',
                ],

                'hari' => [
                    'required',
                    'string',
                    'max:20',
                ],

                'jam_mulai' => [
                    'required',
                    'date_format:H:i',
                ],

                'jam_selesai' => [
                    'required',
                    'date_format:H:i',
                    'after:jam_mulai',
                ],

                'ruangan' => [
                    'nullable',
                    'string',
                    'max:100',
                ],
            ],
            [
                'mata_kuliah_id.required' => 'Mata kuliah wajib dipilih.',
                'mata_kuliah_id.exists' => 'Mata kuliah tidak ditemukan.',

                'dosen_id.required' => 'Dosen wajib dipilih.',
                'dosen_id.exists' => 'Dosen tidak ditemukan.',

                'kelas_id.required' => 'Kelas wajib dipilih.',
                'kelas_id.exists' => 'Kelas tidak ditemukan.',

                'hari.required' => 'Hari wajib dipilih.',

                'jam_mulai.required' => 'Jam mulai wajib diisi.',
                'jam_mulai.date_format' => 'Format jam mulai tidak valid.',

                'jam_selesai.required' => 'Jam selesai wajib diisi.',
                'jam_selesai.date_format' => 'Format jam selesai tidak valid.',
                'jam_selesai.after' => 'Jam selesai harus setelah jam mulai.',

                'ruangan.max' => 'Nama ruangan maksimal 100 karakter.',
            ]
        );

        Jadwal::create([
            'mata_kuliah_id' => $data['mata_kuliah_id'],
            'dosen_id' => $data['dosen_id'],
            'kelas_id' => $data['kelas_id'],
            'hari' => $data['hari'],
            'jam_mulai' => $data['jam_mulai'],
            'jam_selesai' => $data['jam_selesai'],
            'ruangan' => $data['ruangan'] ?? null,
        ]);

        return redirect()
            ->route('admin.jadwal')
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }

    /**
     * Form edit jadwal.
     */
    public function edit(int $id)
    {
        $this->checkAdmin();

        $jadwal = Jadwal::findOrFail($id);

        $mataKuliah = MataKuliah::orderBy('kode')->get();

        $dosen = Dosen::orderBy('nama')->get();

        $kelas = Kelas::orderBy('nama')->get();

        return view('admin.jadwal.edit', [
            'jadwal' => $jadwal,
            'mataKuliah' => $mataKuliah,
            'dosen' => $dosen,
            'kelas' => $kelas,
        ]);
    }

    /**
     * Memperbarui jadwal.
     */
    public function update(Request $request, int $id)
    {
        $this->checkAdmin();

        $jadwal = Jadwal::findOrFail($id);

        $data = $request->validate(
            [
                'mata_kuliah_id' => [
                    'required',
                    'integer',
                    'exists:mata_kuliahs,id',
                ],

                'dosen_id' => [
                    'required',
                    'integer',
                    'exists:dosens,id',
                ],

                'kelas_id' => [
                    'required',
                    'integer',
                    'exists:kelas,id',
                ],

                'hari' => [
                    'required',
                    'string',
                    'max:20',
                ],

                'jam_mulai' => [
                    'required',
                    'date_format:H:i',
                ],

                'jam_selesai' => [
                    'required',
                    'date_format:H:i',
                    'after:jam_mulai',
                ],

                'ruangan' => [
                    'nullable',
                    'string',
                    'max:100',
                ],
            ],
            [
                'mata_kuliah_id.required' => 'Mata kuliah wajib dipilih.',
                'mata_kuliah_id.exists' => 'Mata kuliah tidak ditemukan.',

                'dosen_id.required' => 'Dosen wajib dipilih.',
                'dosen_id.exists' => 'Dosen tidak ditemukan.',

                'kelas_id.required' => 'Kelas wajib dipilih.',
                'kelas_id.exists' => 'Kelas tidak ditemukan.',

                'hari.required' => 'Hari wajib dipilih.',

                'jam_mulai.required' => 'Jam mulai wajib diisi.',
                'jam_mulai.date_format' => 'Format jam mulai tidak valid.',

                'jam_selesai.required' => 'Jam selesai wajib diisi.',
                'jam_selesai.date_format' => 'Format jam selesai tidak valid.',
                'jam_selesai.after' => 'Jam selesai harus setelah jam mulai.',

                'ruangan.max' => 'Nama ruangan maksimal 100 karakter.',
            ]
        );

        $jadwal->update([
            'mata_kuliah_id' => $data['mata_kuliah_id'],
            'dosen_id' => $data['dosen_id'],
            'kelas_id' => $data['kelas_id'],
            'hari' => $data['hari'],
            'jam_mulai' => $data['jam_mulai'],
            'jam_selesai' => $data['jam_selesai'],
            'ruangan' => $data['ruangan'] ?? null,
        ]);

        return redirect()
            ->route('admin.jadwal')
            ->with('success', 'Data jadwal berhasil diperbarui.');
    }

    /**
     * Menghapus jadwal.
     */
    public function destroy(int $id)
    {
        $this->checkAdmin();

        $jadwal = Jadwal::findOrFail($id);

        $jadwal->delete();

        return redirect()
            ->route('admin.jadwal')
            ->with('success', 'Jadwal berhasil dihapus.');
    }
}