<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminPengaturanController extends Controller
{
    /**
     * Pastikan hanya admin yang dapat mengakses.
     */
    private function checkAdmin(): User
    {
        $user = Auth::user();

        if (! ($user instanceof User) || $user->role !== 'admin') {
            abort(
                403,
                'Halaman ini hanya dapat diakses oleh admin.'
            );
        }

        return $user;
    }

    /**
     * Halaman pengaturan admin.
     */
    public function index()
    {
        $user = $this->checkAdmin();

        return view(
            'admin.pengaturan.index',
            [
                'user' => $user,
            ]
        );
    }

    /**
     * Update profil admin.
     */
    public function updateProfile(Request $request)
    {
        $user = $this->checkAdmin();

        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

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

        /*
        |--------------------------------------------------------------------------
        | UPDATE DATA
        |--------------------------------------------------------------------------
        */

        $user->name =
            $validated['name'];

        $user->email =
            $validated['email'];

        $user->save();

        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.pengaturan')
            ->with(
                'success',
                'Profil admin berhasil diperbarui.'
            );
    }

    /**
     * Update password admin.
     */
    public function updatePassword(Request $request)
    {
        $user = $this->checkAdmin();

        /*
        |--------------------------------------------------------------------------
        | VALIDASI PASSWORD
        |--------------------------------------------------------------------------
        */

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

        /*
        |--------------------------------------------------------------------------
        | SIMPAN PASSWORD BARU
        |--------------------------------------------------------------------------
        */

        $user->password =
            Hash::make(
                $validated['password']
            );

        $user->save();

        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.pengaturan')
            ->with(
                'success',
                'Password berhasil diperbarui.'
            );
    }
}