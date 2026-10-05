<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminDosenController extends Controller
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
     * Menampilkan daftar dosen.
     */
    public function index()
    {
        $this->checkAdmin();

        $dosen = Dosen::with('user')
            ->orderBy('nama')
            ->get();

        return view('admin.dosen.index', [
            'dosen' => $dosen,
        ]);
    }

    /**
     * Menampilkan form tambah dosen.
     */
    public function create()
    {
        $this->checkAdmin();

        return view('admin.dosen.create');
    }

    /**
     * Menyimpan dosen baru.
     */
    public function store(Request $request)
    {
        $this->checkAdmin();

        $data = $request->validate(
            [
                'nama' => ['required', 'string', 'max:100'],

                'nidn' => [
                    'required',
                    'string',
                    'max:50',
                    'unique:dosens,nidn',
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
            ],
            [
                'nama.required' => 'Nama dosen wajib diisi.',
                'nidn.required' => 'NIDN wajib diisi.',
                'nidn.unique' => 'NIDN sudah digunakan.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah digunakan.',
                'password.required' => 'Password wajib diisi.',
                'password.min' => 'Password minimal 8 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak sama.',
            ]
        );

        DB::transaction(function () use ($data) {

            $newUser = User::create([
                'name' => $data['nama'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'dosen',
            ]);

            Dosen::create([
                'user_id' => $newUser->id,
                'nidn' => $data['nidn'],
                'nama' => $data['nama'],
                'no_hp' => $data['no_hp'] ?? null,
                'program_studi' => $data['program_studi'] ?? null,
            ]);
        });

        return redirect()
            ->route('admin.dosen')
            ->with('success', 'Dosen berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit dosen.
     */
    public function edit(int $id)
    {
        $this->checkAdmin();

        $dosen = Dosen::with('user')->findOrFail($id);

        return view('admin.dosen.edit', [
            'dosen' => $dosen,
        ]);
    }

    /**
     * Memperbarui data dosen.
     */
    public function update(Request $request, int $id)
    {
        $this->checkAdmin();

        $dosen = Dosen::with('user')->findOrFail($id);

        $data = $request->validate(
            [
                'nama' => [
                    'required',
                    'string',
                    'max:100',
                ],

                'nidn' => [
                    'required',
                    'string',
                    'max:50',
                    Rule::unique('dosens', 'nidn')
                        ->ignore($dosen->id),
                ],

                'email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email')
                        ->ignore($dosen->user_id),
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
            ],
            [
                'nama.required' => 'Nama dosen wajib diisi.',
                'nidn.required' => 'NIDN wajib diisi.',
                'nidn.unique' => 'NIDN sudah digunakan.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah digunakan.',
                'password.min' => 'Password minimal 8 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak sama.',
            ]
        );

        DB::transaction(function () use ($data, $dosen) {

            $dosen->user->update([
                'name' => $data['nama'],
                'email' => $data['email'],
            ]);

            if (!empty($data['password'])) {

                $dosen->user->update([
                    'password' => Hash::make($data['password']),
                ]);
            }

            $dosen->update([
                'nidn' => $data['nidn'],
                'nama' => $data['nama'],
                'no_hp' => $data['no_hp'] ?? null,
                'program_studi' => $data['program_studi'] ?? null,
            ]);
        });

        return redirect()
            ->route('admin.dosen')
            ->with('success', 'Data dosen berhasil diperbarui.');
    }

    /**
     * Menghapus dosen.
     */
    public function destroy(int $id)
    {
        $this->checkAdmin();

        $dosen = Dosen::with('user')->findOrFail($id);

        DB::transaction(function () use ($dosen) {
            $dosen->user()->delete();
        });

        return redirect()
            ->route('admin.dosen')
            ->with('success', 'Dosen berhasil dihapus.');
    }
}