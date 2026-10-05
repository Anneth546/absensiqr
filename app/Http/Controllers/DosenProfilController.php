<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DosenProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dosen = $user->dosen;

        if (!$dosen) {
            abort(403, 'Data dosen tidak ditemukan.');
        }

        return view('dosen.profil', [
            'user' => $user,
            'dosen' => $dosen,
        ]);
    }


    public function update(Request $request)
    {
        $user = Auth::user();
        $dosen = $user->dosen;

        if (!$dosen) {
            abort(403, 'Data dosen tidak ditemukan.');
        }

        $data = $request->validate([
            'nama' => [
                'required',
                'string',
                'max:100',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
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

            'foto' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
            ],
        ], [
            'nama.required' => 'Nama wajib diisi.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email tersebut sudah digunakan.',

            'foto.image' => 'File foto harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat JPG, JPEG, PNG, atau WEBP.',
            'foto.max' => 'Ukuran foto maksimal 2 MB.',

            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | UPDATE USER
        |--------------------------------------------------------------------------
        */

        $user->name = $data['nama'];
        $user->email = $data['email'];

        if (!empty($data['password'])) {
            $user->password = Hash::make(
                $data['password']
            );
        }

        $user->save();


        /*
        |--------------------------------------------------------------------------
        | UPDATE FOTO
        |--------------------------------------------------------------------------
        */

        $fotoPath = $dosen->foto;

        if ($request->hasFile('foto')) {

            if (
                $dosen->foto &&
                Storage::disk('public')->exists($dosen->foto)
            ) {
                Storage::disk('public')->delete(
                    $dosen->foto
                );
            }

            $fotoPath = $request
                ->file('foto')
                ->store('foto-dosen', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE DATA DOSEN
        |--------------------------------------------------------------------------
        */

        $dosen->update([
            'nama' => $data['nama'],
            'no_hp' => $data['no_hp'] ?? null,
            'program_studi' => $data['program_studi'] ?? null,
            'foto' => $fotoPath,
        ]);


        return redirect()
            ->route('dosen.profil')
            ->with(
                'success',
                'Profil berhasil diperbarui.'
            );
    }
}