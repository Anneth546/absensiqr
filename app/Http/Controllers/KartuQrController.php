<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class KartuQrController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $mahasiswa = $user->mahasiswa;

        if (!$mahasiswa) {
            abort(403, 'Data mahasiswa tidak ditemukan.');
        }

        // Data yang akan dimasukkan ke QR mahasiswa
        $qrData = 'MAHASISWA-' . $mahasiswa->id;

        return view('mahasiswa.kartu-qr', [
            'mahasiswa' => $mahasiswa,
            'qrData' => $qrData,
        ]);
    }
}