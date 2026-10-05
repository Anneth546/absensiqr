<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Support\Facades\Auth;

class DosenMataKuliahController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $dosen = $user->dosen;

        if (!$dosen) {
            abort(403, 'Data dosen tidak ditemukan.');
        }

        $mataKuliahs = MataKuliah::orderBy('kode')->get();

        return view('dosen.mata-kuliah', [
            'dosen' => $dosen,
            'mataKuliahs' => $mataKuliahs,
        ]);
    }
}