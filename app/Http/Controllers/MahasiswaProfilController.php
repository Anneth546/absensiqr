<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MahasiswaProfilController extends Controller
{
    /**
     * Menampilkan halaman profil mahasiswa.
     */
    public function index()
    {
        $user = Auth::user();

        $mahasiswa = $user->mahasiswa;

        if (!$mahasiswa) {
            abort(403, 'Data mahasiswa tidak ditemukan.');
        }

        return view('mahasiswa.profil', [
            'user' => $user,
            'mahasiswa' => $mahasiswa,
        ]);
    }


    /**
     * Menyimpan perubahan profil.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $mahasiswa = $user->mahasiswa;

        if (!$mahasiswa) {
            abort(403, 'Data mahasiswa tidak ditemukan.');
        }

        $data = $request->validate([
            'nama' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $user->id,
            ],

            'no_hp' => [
                'nullable',
                'string',
                'max:20',
            ],

            'program_studi' => [
                'nullable',
                'string',
                'max:255',
            ],

            'kelas' => [
                'nullable',
                'string',
                'max:100',
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | UPDATE USER
        |--------------------------------------------------------------------------
        */

        $user->name = $data['nama'];
        $user->email = $data['email'];

        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();


        /*
        |--------------------------------------------------------------------------
        | UPDATE DATA MAHASISWA
        |--------------------------------------------------------------------------
        */

        $mahasiswa->nama = $data['nama'];
        $mahasiswa->no_hp = $data['no_hp'] ?? null;
        $mahasiswa->program_studi = $data['program_studi'] ?? null;
        $mahasiswa->kelas = $data['kelas'] ?? null;

        $mahasiswa->save();


        return redirect()
            ->route('mahasiswa.profil')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}