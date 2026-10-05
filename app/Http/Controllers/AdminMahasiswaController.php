<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminMahasiswaController extends Controller
{
    /**
     * Menampilkan daftar mahasiswa.
     */
    public function index()
    {
        $user = Auth::user();

        if (!$user || $user->role !== 'admin') {
            abort(403, 'Halaman ini hanya dapat diakses oleh admin.');
        }

        $mahasiswa = Mahasiswa::with('user')
            ->orderBy('nama')
            ->get();

        return view('admin.mahasiswa.index', [
            'mahasiswa' => $mahasiswa,
        ]);
    }


    /**
     * Menampilkan form tambah mahasiswa.
     */
    public function create()
    {
        $user = Auth::user();

        if (!$user || $user->role !== 'admin') {
            abort(403, 'Halaman ini hanya dapat diakses oleh admin.');
        }

        return view('admin.mahasiswa.create');
    }


    /**
     * Menyimpan mahasiswa baru.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if (!$user || $user->role !== 'admin') {
            abort(403, 'Halaman ini hanya dapat diakses oleh admin.');
        }

        $data = $request->validate(
            [
                'nama' => [
                    'required',
                    'string',
                    'max:100',
                ],

                'npm' => [
                    'required',
                    'string',
                    'max:50',
                    'unique:mahasiswas,npm',
                ],

                'email' => [
                    'required',
                    'email',
                    'max:255',
                    'unique:users,email',
                ],

                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'confirmed',
                ],

                'no_hp' => [
                    'nullable',
                    'string',
                    'max:20',
                ],

                'program_studi' => [
                    'nullable',
                    'string',
                    'max:100',
                ],

                'kelas' => [
                    'nullable',
                    'string',
                    'max:100',
                ],
            ],
            [
                'nama.required' =>
                    'Nama mahasiswa wajib diisi.',

                'nama.max' =>
                    'Nama mahasiswa maksimal 100 karakter.',

                'npm.required' =>
                    'NPM wajib diisi.',

                'npm.unique' =>
                    'NPM tersebut sudah digunakan.',

                'email.required' =>
                    'Email wajib diisi.',

                'email.email' =>
                    'Format email tidak valid.',

                'email.unique' =>
                    'Email tersebut sudah digunakan.',

                'password.required' =>
                    'Password wajib diisi.',

                'password.min' =>
                    'Password minimal 8 karakter.',

                'password.confirmed' =>
                    'Konfirmasi password tidak cocok.',
            ]
        );


        DB::transaction(function () use ($data) {

            /*
             * Membuat akun login mahasiswa
             * di tabel users.
             */
            $newUser = User::create([
                'name' => $data['nama'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'mahasiswa',
            ]);


            /*
             * Membuat data profil mahasiswa
             * di tabel mahasiswas.
             */
            Mahasiswa::create([
                'user_id' => $newUser->id,
                'npm' => $data['npm'],
                'nama' => $data['nama'],
                'no_hp' => $data['no_hp'] ?? null,
                'program_studi' => $data['program_studi'] ?? null,
                'kelas' => $data['kelas'] ?? null,
            ]);
        });


        return redirect()
            ->route('admin.mahasiswa')
            ->with(
                'success',
                'Mahasiswa berhasil ditambahkan.'
            );
    }


    /**
     * Menampilkan form edit mahasiswa.
     */
    public function edit(int $id)
    {
        $user = Auth::user();

        if (!$user || $user->role !== 'admin') {
            abort(403, 'Halaman ini hanya dapat diakses oleh admin.');
        }

        $mahasiswa = Mahasiswa::with('user')
            ->findOrFail($id);

        return view('admin.mahasiswa.edit', [
            'mahasiswa' => $mahasiswa,
        ]);
    }


    /**
     * Memperbarui data mahasiswa.
     */
    public function update(Request $request, int $id)
    {
        $user = Auth::user();

        if (!$user || $user->role !== 'admin') {
            abort(403, 'Halaman ini hanya dapat diakses oleh admin.');
        }

        $mahasiswa = Mahasiswa::with('user')
            ->findOrFail($id);


        $data = $request->validate(
            [
                'nama' => [
                    'required',
                    'string',
                    'max:100',
                ],

                'npm' => [
                    'required',
                    'string',
                    'max:50',
                    Rule::unique('mahasiswas', 'npm')
                        ->ignore($mahasiswa->id),
                ],

                'email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email')
                        ->ignore($mahasiswa->user_id),
                ],

                'password' => [
                    'nullable',
                    'string',
                    'min:8',
                    'confirmed',
                ],

                'no_hp' => [
                    'nullable',
                    'string',
                    'max:20',
                ],

                'program_studi' => [
                    'nullable',
                    'string',
                    'max:100',
                ],

                'kelas' => [
                    'nullable',
                    'string',
                    'max:100',
                ],
            ],
            [
                'nama.required' =>
                    'Nama mahasiswa wajib diisi.',

                'nama.max' =>
                    'Nama mahasiswa maksimal 100 karakter.',

                'npm.required' =>
                    'NPM wajib diisi.',

                'npm.unique' =>
                    'NPM tersebut sudah digunakan.',

                'email.required' =>
                    'Email wajib diisi.',

                'email.email' =>
                    'Format email tidak valid.',

                'email.unique' =>
                    'Email tersebut sudah digunakan.',

                'password.min' =>
                    'Password minimal 8 karakter.',

                'password.confirmed' =>
                    'Konfirmasi password tidak cocok.',
            ]
        );


        DB::transaction(function () use (
            $data,
            $mahasiswa
        ) {

            /*
             * Update akun login mahasiswa.
             */
            $mahasiswa->user->update([
                'name' => $data['nama'],
                'email' => $data['email'],
            ]);


            /*
             * Password hanya diubah kalau
             * field password tidak kosong.
             */
            if (!empty($data['password'])) {

                $mahasiswa->user->update([
                    'password' =>
                        Hash::make($data['password']),
                ]);
            }


            /*
             * Update data profil mahasiswa.
             */
            $mahasiswa->update([
                'npm' => $data['npm'],
                'nama' => $data['nama'],
                'no_hp' => $data['no_hp'] ?? null,
                'program_studi' =>
                    $data['program_studi'] ?? null,
                'kelas' =>
                    $data['kelas'] ?? null,
            ]);
        });


        return redirect()
            ->route('admin.mahasiswa')
            ->with(
                'success',
                'Data mahasiswa berhasil diperbarui.'
            );
    }


    /**
     * Menghapus mahasiswa.
     */
    public function destroy(int $id)
    {
        $user = Auth::user();

        if (!$user || $user->role !== 'admin') {
            abort(403, 'Halaman ini hanya dapat diakses oleh admin.');
        }

        $mahasiswa = Mahasiswa::with('user')
            ->findOrFail($id);


        DB::transaction(function () use ($mahasiswa) {

            /*
             * Menghapus akun user.
             *
             * Karena tabel mahasiswas memiliki
             * cascadeOnDelete() pada user_id,
             * data mahasiswa ikut terhapus.
             */
            $mahasiswa->user()->delete();
        });


        return redirect()
            ->route('admin.mahasiswa')
            ->with(
                'success',
                'Mahasiswa berhasil dihapus.'
            );
    }
}