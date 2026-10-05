<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdminKelasController extends Controller
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
     * Menampilkan daftar kelas.
     */
    public function index()
    {
        $this->checkAdmin();

        $kelas = Kelas::withCount('jadwal')
            ->orderBy('nama')
            ->get();

        return view('admin.kelas.index', [
            'kelas' => $kelas,
        ]);
    }

    /**
     * Form tambah kelas.
     */
    public function create()
    {
        $this->checkAdmin();

        return view('admin.kelas.create');
    }

    /**
     * Menyimpan kelas baru.
     */
    public function store(Request $request)
    {
        $this->checkAdmin();

        $data = $request->validate(
            [
                'nama' => [
                    'required',
                    'string',
                    'max:100',
                ],

                'program_studi' => [
                    'nullable',
                    'string',
                    'max:100',
                ],

                'angkatan' => [
                    'nullable',
                    'string',
                    'max:20',
                ],
            ],
            [
                'nama.required' => 'Nama kelas wajib diisi.',
                'nama.max' => 'Nama kelas maksimal 100 karakter.',
                'program_studi.max' => 'Program studi maksimal 100 karakter.',
                'angkatan.max' => 'Angkatan maksimal 20 karakter.',
            ]
        );

        Kelas::create([
            'nama' => $data['nama'],
            'program_studi' => $data['program_studi'] ?? null,
            'angkatan' => $data['angkatan'] ?? null,
        ]);

        return redirect()
            ->route('admin.kelas')
            ->with('success', 'Kelas berhasil ditambahkan.');
    }

    /**
     * Form edit kelas.
     */
    public function edit(int $id)
    {
        $this->checkAdmin();

        $kelas = Kelas::findOrFail($id);

        return view('admin.kelas.edit', [
            'kelas' => $kelas,
        ]);
    }

    /**
     * Memperbarui kelas.
     */
    public function update(Request $request, int $id)
    {
        $this->checkAdmin();

        $kelas = Kelas::findOrFail($id);

        $data = $request->validate(
            [
                'nama' => [
                    'required',
                    'string',
                    'max:100',
                ],

                'program_studi' => [
                    'nullable',
                    'string',
                    'max:100',
                ],

                'angkatan' => [
                    'nullable',
                    'string',
                    'max:20',
                ],
            ],
            [
                'nama.required' => 'Nama kelas wajib diisi.',
                'nama.max' => 'Nama kelas maksimal 100 karakter.',
                'program_studi.max' => 'Program studi maksimal 100 karakter.',
                'angkatan.max' => 'Angkatan maksimal 20 karakter.',
            ]
        );

        $kelas->update([
            'nama' => $data['nama'],
            'program_studi' => $data['program_studi'] ?? null,
            'angkatan' => $data['angkatan'] ?? null,
        ]);

        return redirect()
            ->route('admin.kelas')
            ->with('success', 'Data kelas berhasil diperbarui.');
    }

    /**
     * Menghapus kelas.
     */
    public function destroy(int $id)
    {
        $this->checkAdmin();

        $kelas = Kelas::findOrFail($id);

        $kelas->delete();

        return redirect()
            ->route('admin.kelas')
            ->with('success', 'Kelas berhasil dihapus.');
    }
}