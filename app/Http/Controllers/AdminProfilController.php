<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfilController extends Controller
{
    /**
     * Pastikan hanya admin yang dapat mengakses halaman profil.
     */
    private function checkAdmin(): void
    {
        $user = Auth::user();

        if (!$user || $user->role !== 'admin') {
            abort(
                403,
                'Halaman ini hanya dapat diakses oleh admin.'
            );
        }
    }

    /**
     * Menampilkan halaman profil admin.
     */
    public function index()
    {
        $this->checkAdmin();

        $user = Auth::user();

        return view(
            'admin.profil.index',
            [
                'user' => $user,
            ]
        );
    }

    /**
     * Memperbarui informasi profil admin.
     */
    public function update(Request $request)
    {
        $this->checkAdmin();

        $user = Auth::user();

        $validated = $request->validate(
            [
                'name' => [
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
            ],
            [
                'name.required' =>
                    'Nama wajib diisi.',

                'name.max' =>
                    'Nama maksimal 255 karakter.',

                'email.required' =>
                    'Email wajib diisi.',

                'email.email' =>
                    'Format email tidak valid.',

                'email.unique' =>
                    'Email tersebut sudah digunakan.',
            ]
        );

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        $user->save();

        return redirect()
            ->route('admin.profil')
            ->with(
                'success',
                'Profil admin berhasil diperbarui.'
            );
    }

    /**
     * Memperbarui password admin.
     */
    public function updatePassword(Request $request)
    {
        $this->checkAdmin();

        $user = Auth::user();

        $validated = $request->validate(
            [
                'current_password' => [
                    'required',
                    'current_password',
                ],

                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'confirmed',
                ],
            ],
            [
                'current_password.required' =>
                    'Password lama wajib diisi.',

                'current_password.current_password' =>
                    'Password lama tidak sesuai.',

                'password.required' =>
                    'Password baru wajib diisi.',

                'password.min' =>
                    'Password baru minimal 8 karakter.',

                'password.confirmed' =>
                    'Konfirmasi password tidak sesuai.',
            ]
        );

        $user->password = Hash::make(
            $validated['password']
        );

        $user->save();

        return redirect()
            ->route('admin.profil')
            ->with(
                'success',
                'Password berhasil diperbarui.'
            );
    }
}