<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Memproses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'identity' => ['required', 'string'],
            'password' => ['required'],
            'role' => ['required', 'in:mahasiswa,dosen,admin'],
        ]);

        $identity = $credentials['identity'];
        $password = $credentials['password'];
        $role = $credentials['role'];

        /*
        |--------------------------------------------------------------------------
        | MAHASISWA
        |--------------------------------------------------------------------------
        */

        if ($role === 'mahasiswa') {

            $mahasiswa = Mahasiswa::where('npm', $identity)
                ->with('user')
                ->first();

            if (!$mahasiswa || !$mahasiswa->user) {
                return back()
                    ->withErrors([
                        'identity' => 'NPM tidak ditemukan.',
                    ])
                    ->withInput();
            }

            if (!Auth::attempt([
                'email' => $mahasiswa->user->email,
                'password' => $password,
                'role' => 'mahasiswa',
            ])) {
                return back()
                    ->withErrors([
                        'identity' => 'Password salah.',
                    ])
                    ->withInput();
            }

            $request->session()->regenerate();

            return redirect('/mahasiswa/dashboard');
        }

        /*
        |--------------------------------------------------------------------------
        | DOSEN
        |--------------------------------------------------------------------------
        */

        if ($role === 'dosen') {

            $dosen = Dosen::where('nidn', $identity)
                ->with('user')
                ->first();

            if (!$dosen || !$dosen->user) {
                return back()
                    ->withErrors([
                        'identity' => 'NIDN tidak ditemukan.',
                    ])
                    ->withInput();
            }

            if (!Auth::attempt([
                'email' => $dosen->user->email,
                'password' => $password,
                'role' => 'dosen',
            ])) {
                return back()
                    ->withErrors([
                        'identity' => 'Password salah.',
                    ])
                    ->withInput();
            }

            $request->session()->regenerate();

            return redirect('/dosen/dashboard');
        }

        /*
        |--------------------------------------------------------------------------
        | ADMIN
        |--------------------------------------------------------------------------
        */

        if ($role === 'admin') {

            if (!Auth::attempt([
                'email' => $identity,
                'password' => $password,
                'role' => 'admin',
            ])) {
                return back()
                    ->withErrors([
                        'identity' => 'Email atau password admin salah.',
                    ])
                    ->withInput();
            }

            $request->session()->regenerate();

            return redirect('/admin/dashboard');
        }

        return back()
            ->withErrors([
                'identity' => 'Role tidak valid.',
            ])
            ->withInput();
    }

    /*
    |--------------------------------------------------------------------------
    | REGISTER
    |--------------------------------------------------------------------------
    */

    // Menampilkan halaman register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Memproses pendaftaran mahasiswa / dosen
    public function register(Request $request)
    {
        $data = $request->validate([
            'role' => ['required', 'in:mahasiswa,dosen'],

            'nama' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'min:8',
                'confirmed',
            ],

            'npm' => [
                'required_if:role,mahasiswa',
                'nullable',
                'string',
                'max:50',
                'unique:mahasiswas,npm',
            ],

            'nidn' => [
                'required_if:role,dosen',
                'nullable',
                'string',
                'max:50',
                'unique:dosens,nidn',
            ],

            'program_studi' => ['required_if:role,mahasiswa', 'nullable', 'string', 'max:255'],
'kelas' => ['required_if:role,mahasiswa', 'nullable', 'string', 'max:100'],
        ]);

        DB::transaction(function () use ($data) {

            $user = \App\Models\User::create([
                'name' => $data['nama'],
                'email' => $data['email'],
                'password' => $data['password'],
                'role' => $data['role'],
            ]);

            if ($data['role'] === 'mahasiswa') {
    Mahasiswa::create([
        'user_id' => $user->id,
        'npm' => $data['npm'],
        'nama' => $data['nama'],
        'program_studi' => $data['program_studi'],
        'kelas' => $data['kelas'],
    ]);
}

            if ($data['role'] === 'dosen') {

                Dosen::create([
                    'user_id' => $user->id,
                    'nidn' => $data['nidn'],
                    'nama' => $data['nama'],
                ]);
            }
        });

        return redirect('/login')
            ->with(
                'success',
                'Pendaftaran berhasil! Silakan login menggunakan akun yang baru dibuat.'
            );
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}