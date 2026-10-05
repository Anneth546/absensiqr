<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdminMataKuliahController extends Controller
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
     * Menampilkan semua mata kuliah.
     */
    public function index()
    {
        $this->checkAdmin();

        $mataKuliah = MataKuliah::withCount('jadwal')
            ->orderBy('kode')
            ->get();

        return view('admin.mata-kuliah.index', [
            'mataKuliah' => $mataKuliah,
        ]);
    }

    /**
     * Form tambah mata kuliah.
     */
    public function create()
    {
        $this->checkAdmin();

        return view('admin.mata-kuliah.create');
    }

    /**
     * Menyimpan mata kuliah baru.
     */
    public function store(Request $request)
    {
        $this->checkAdmin();

        $data = $request->validate(
            [
                'kode' => [
                    'required',
                    'string',
                    'max:50',
                    'unique:mata_kuliahs,kode',
                ],

                'nama' => [
                    'required',
                    'string',
                    'max:150',
                ],

                'sks' => [
                    'required',
                    'integer',
                    'min:1',
                    'max:6',
                ],
            ],
            [
                'kode.required' => 'Kode mata kuliah wajib diisi.',
                'kode.unique' => 'Kode mata kuliah sudah digunakan.',
                'nama.required' => 'Nama mata kuliah wajib diisi.',
                'sks.required' => 'SKS wajib diisi.',
                'sks.integer' => 'SKS harus berupa angka.',
                'sks.min' => 'SKS minimal 1.',
                'sks.max' => 'SKS maksimal 6.',
            ]
        );

        MataKuliah::create([
            'kode' => $data['kode'],
            'nama' => $data['nama'],
            'sks' => $data['sks'],
        ]);

        return redirect()
            ->route('admin.mata-kuliah')
            ->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    /**
     * Form edit mata kuliah.
     */
    public function edit(int $id)
    {
        $this->checkAdmin();

        $mataKuliah = MataKuliah::findOrFail($id);

        return view('admin.mata-kuliah.edit', [
            'mataKuliah' => $mataKuliah,
        ]);
    }

    /**
     * Memperbarui mata kuliah.
     */
    public function update(Request $request, int $id)
    {
        $this->checkAdmin();

        $mataKuliah = MataKuliah::findOrFail($id);

        $data = $request->validate(
            [
                'kode' => [
                    'required',
                    'string',
                    'max:50',
                    Rule::unique('mata_kuliahs', 'kode')
                        ->ignore($mataKuliah->id),
                ],

                'nama' => [
                    'required',
                    'string',
                    'max:150',
                ],

                'sks' => [
                    'required',
                    'integer',
                    'min:1',
                    'max:6',
                ],
            ],
            [
                'kode.required' => 'Kode mata kuliah wajib diisi.',
                'kode.unique' => 'Kode mata kuliah sudah digunakan.',
                'nama.required' => 'Nama mata kuliah wajib diisi.',
                'sks.required' => 'SKS wajib diisi.',
                'sks.integer' => 'SKS harus berupa angka.',
                'sks.min' => 'SKS minimal 1.',
                'sks.max' => 'SKS maksimal 6.',
            ]
        );

        $mataKuliah->update([
            'kode' => $data['kode'],
            'nama' => $data['nama'],
            'sks' => $data['sks'],
        ]);

        return redirect()
            ->route('admin.mata-kuliah')
            ->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    /**
     * Menghapus mata kuliah.
     */
    public function destroy(int $id)
    {
        $this->checkAdmin();

        $mataKuliah = MataKuliah::findOrFail($id);

        /*
         * Jadwal yang memakai mata kuliah ini
         * akan ikut terhapus karena foreign key
         * mata_kuliah_id menggunakan cascadeOnDelete().
         */
        $mataKuliah->delete();

        return redirect()
            ->route('admin.mata-kuliah')
            ->with('success', 'Mata kuliah berhasil dihapus.');
    }
}