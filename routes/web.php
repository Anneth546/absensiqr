<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaDashboardController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\KartuQrController;
use App\Http\Controllers\RiwayatAbsensiController;
use App\Http\Controllers\PengajuanAbsensiController;
use App\Http\Controllers\MahasiswaProfilController;
use App\Http\Controllers\DosenDashboardController;
use App\Http\Controllers\DosenMataKuliahController;
use App\Http\Controllers\DosenSesiAbsensiController;
use App\Http\Controllers\DosenJadwalController;
use App\Http\Controllers\DosenKehadiranController;
use App\Http\Controllers\DosenPengajuanAbsensiController;
use App\Http\Controllers\DosenRiwayatController;
use App\Http\Controllers\DosenProfilController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminMahasiswaController;
use App\Http\Controllers\AdminDosenController;
use App\Http\Controllers\AdminMataKuliahController;
use App\Http\Controllers\AdminKelasController;
use App\Http\Controllers\AdminJadwalController;
use App\Http\Controllers\AdminSesiAbsensiController;
use App\Http\Controllers\AdminKehadiranController;
use App\Http\Controllers\AdminPengajuanAbsensiController;
use App\Http\Controllers\AdminLaporanController;
use App\Http\Controllers\AdminPengaturanController;
use App\Http\Controllers\AdminProfilController;

Route::get('/', function () {
    return view('welcome');
});

// =========================
// LOGIN
// =========================

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');


// =========================
// REGISTER
// =========================

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');


// =========================
// LOGOUT
// =========================

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


// =========================
// DASHBOARD MAHASISWA
// =========================

Route::get('/mahasiswa/dashboard', [MahasiswaDashboardController::class, 'index'])
    ->middleware('auth')
    ->name('mahasiswa.dashboard');

    // =========================
// ABSENSI MAHASISWA
// =========================

Route::get('/mahasiswa/scan', [AbsensiController::class, 'scan'])
    ->middleware('auth')
    ->name('mahasiswa.scan');

Route::post('/mahasiswa/scan', [AbsensiController::class, 'store'])
    ->middleware('auth')
    ->name('mahasiswa.scan.store');

    Route::get('/mahasiswa/kartu-qr', [KartuQrController::class, 'index'])
    ->middleware('auth')
    ->name('mahasiswa.kartu-qr');

    Route::get(
    '/mahasiswa/riwayat',
    [RiwayatAbsensiController::class, 'index']
)
    ->middleware('auth')
    ->name('mahasiswa.riwayat');

    Route::get('/mahasiswa/izin-sakit', [PengajuanAbsensiController::class, 'index'])
    ->middleware('auth')
    ->name('mahasiswa.izin-sakit');

Route::post('/mahasiswa/izin-sakit', [PengajuanAbsensiController::class, 'store'])
    ->middleware('auth')
    ->name('mahasiswa.izin-sakit.store');

    Route::get('/mahasiswa/profil', [MahasiswaProfilController::class, 'index'])
    ->middleware('auth')
    ->name('mahasiswa.profil');

Route::put('/mahasiswa/profil', [MahasiswaProfilController::class, 'update'])
    ->middleware('auth')
    ->name('mahasiswa.profil.update');

    Route::get('/dosen/dashboard', [DosenDashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dosen.dashboard');

    Route::get('/dosen/mata-kuliah', [DosenMataKuliahController::class, 'index'])
    ->middleware('auth')
    ->name('dosen.mata-kuliah');

    Route::get('/dosen/sesi-absensi', [DosenSesiAbsensiController::class, 'index'])
    ->middleware('auth')
    ->name('dosen.sesi-absensi');

Route::post('/dosen/sesi-absensi', [DosenSesiAbsensiController::class, 'store'])
    ->middleware('auth')
    ->name('dosen.sesi-absensi.store');

Route::patch('/dosen/sesi-absensi/{id}/nonaktifkan', [DosenSesiAbsensiController::class, 'deactivate'])
    ->middleware('auth')
    ->name('dosen.sesi-absensi.deactivate');

    Route::get('/dosen/jadwal', [DosenJadwalController::class, 'index'])
    ->middleware('auth')
    ->name('dosen.jadwal');

Route::get('/dosen/jadwal/create', [DosenJadwalController::class, 'create'])
    ->middleware('auth')
    ->name('dosen.jadwal.create');

Route::post('/dosen/jadwal', [DosenJadwalController::class, 'store'])
    ->middleware('auth')
    ->name('dosen.jadwal.store');

    Route::get('/dosen/kehadiran', [DosenKehadiranController::class, 'index'])
    ->middleware('auth')
    ->name('dosen.kehadiran');

    Route::get('/dosen/pengajuan-absensi', [DosenPengajuanAbsensiController::class, 'index'])
    ->middleware('auth')
    ->name('dosen.pengajuan-absensi');

Route::patch('/dosen/pengajuan-absensi/{id}/approve', [DosenPengajuanAbsensiController::class, 'approve'])
    ->middleware('auth')
    ->name('dosen.pengajuan-absensi.approve');

Route::patch('/dosen/pengajuan-absensi/{id}/reject', [DosenPengajuanAbsensiController::class, 'reject'])
    ->middleware('auth')
    ->name('dosen.pengajuan-absensi.reject');

    Route::get('/dosen/riwayat', [DosenRiwayatController::class, 'index'])
    ->middleware('auth')
    ->name('dosen.riwayat');

    Route::get(
    '/dosen/profil',
    [DosenProfilController::class, 'index']
)
    ->middleware('auth')
    ->name('dosen.profil');

Route::put(
    '/dosen/profil',
    [DosenProfilController::class, 'update']
)
    ->middleware('auth')
    ->name('dosen.profil.update');

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware('auth')
    ->name('admin.dashboard');

    Route::get('/admin/mahasiswa', [AdminMahasiswaController::class, 'index'])
    ->middleware('auth')
    ->name('admin.mahasiswa');

Route::get('/admin/mahasiswa/create', [AdminMahasiswaController::class, 'create'])
    ->middleware('auth')
    ->name('admin.mahasiswa.create');

Route::post('/admin/mahasiswa', [AdminMahasiswaController::class, 'store'])
    ->middleware('auth')
    ->name('admin.mahasiswa.store');

Route::get('/admin/mahasiswa/{id}/edit', [AdminMahasiswaController::class, 'edit'])
    ->middleware('auth')
    ->name('admin.mahasiswa.edit');

Route::put('/admin/mahasiswa/{id}', [AdminMahasiswaController::class, 'update'])
    ->middleware('auth')
    ->name('admin.mahasiswa.update');

Route::delete('/admin/mahasiswa/{id}', [AdminMahasiswaController::class, 'destroy'])
    ->middleware('auth')
    ->name('admin.mahasiswa.destroy');

    Route::get('/admin/dosen', [AdminDosenController::class, 'index'])
    ->middleware('auth')
    ->name('admin.dosen');

Route::get('/admin/dosen/create', [AdminDosenController::class, 'create'])
    ->middleware('auth')
    ->name('admin.dosen.create');

Route::post('/admin/dosen', [AdminDosenController::class, 'store'])
    ->middleware('auth')
    ->name('admin.dosen.store');

Route::get('/admin/dosen/{id}/edit', [AdminDosenController::class, 'edit'])
    ->middleware('auth')
    ->name('admin.dosen.edit');

Route::put('/admin/dosen/{id}', [AdminDosenController::class, 'update'])
    ->middleware('auth')
    ->name('admin.dosen.update');

Route::delete('/admin/dosen/{id}', [AdminDosenController::class, 'destroy'])
    ->middleware('auth')
    ->name('admin.dosen.destroy');

    Route::get('/admin/mata-kuliah', [AdminMataKuliahController::class, 'index'])
    ->middleware('auth')
    ->name('admin.mata-kuliah');

Route::get('/admin/mata-kuliah/create', [AdminMataKuliahController::class, 'create'])
    ->middleware('auth')
    ->name('admin.mata-kuliah.create');

Route::post('/admin/mata-kuliah', [AdminMataKuliahController::class, 'store'])
    ->middleware('auth')
    ->name('admin.mata-kuliah.store');

Route::get('/admin/mata-kuliah/{id}/edit', [AdminMataKuliahController::class, 'edit'])
    ->middleware('auth')
    ->name('admin.mata-kuliah.edit');

Route::put('/admin/mata-kuliah/{id}', [AdminMataKuliahController::class, 'update'])
    ->middleware('auth')
    ->name('admin.mata-kuliah.update');

Route::delete('/admin/mata-kuliah/{id}', [AdminMataKuliahController::class, 'destroy'])
    ->middleware('auth')
    ->name('admin.mata-kuliah.destroy');

    Route::get('/admin/kelas', [AdminKelasController::class, 'index'])
    ->middleware('auth')
    ->name('admin.kelas');

Route::get('/admin/kelas/create', [AdminKelasController::class, 'create'])
    ->middleware('auth')
    ->name('admin.kelas.create');

Route::post('/admin/kelas', [AdminKelasController::class, 'store'])
    ->middleware('auth')
    ->name('admin.kelas.store');

Route::get('/admin/kelas/{id}/edit', [AdminKelasController::class, 'edit'])
    ->middleware('auth')
    ->name('admin.kelas.edit');

Route::put('/admin/kelas/{id}', [AdminKelasController::class, 'update'])
    ->middleware('auth')
    ->name('admin.kelas.update');

Route::delete('/admin/kelas/{id}', [AdminKelasController::class, 'destroy'])
    ->middleware('auth')
    ->name('admin.kelas.destroy');

    Route::get('/admin/jadwal', [AdminJadwalController::class, 'index'])
    ->middleware('auth')
    ->name('admin.jadwal');

Route::get('/admin/jadwal/create', [AdminJadwalController::class, 'create'])
    ->middleware('auth')
    ->name('admin.jadwal.create');

Route::post('/admin/jadwal', [AdminJadwalController::class, 'store'])
    ->middleware('auth')
    ->name('admin.jadwal.store');

Route::get('/admin/jadwal/{id}/edit', [AdminJadwalController::class, 'edit'])
    ->middleware('auth')
    ->name('admin.jadwal.edit');

Route::put('/admin/jadwal/{id}', [AdminJadwalController::class, 'update'])
    ->middleware('auth')
    ->name('admin.jadwal.update');

Route::delete('/admin/jadwal/{id}', [AdminJadwalController::class, 'destroy'])
    ->middleware('auth')
    ->name('admin.jadwal.destroy');

    Route::get('/admin/sesi-absensi', [AdminSesiAbsensiController::class, 'index'])
    ->middleware('auth')
    ->name('admin.sesi-absensi');

Route::get('/admin/sesi-absensi/{id}', [AdminSesiAbsensiController::class, 'show'])
    ->middleware('auth')
    ->name('admin.sesi-absensi.show');

    Route::get('/admin/kehadiran', [AdminKehadiranController::class, 'index'])
    ->middleware('auth')
    ->name('admin.kehadiran');

    Route::get(
    '/admin/pengajuan-absensi',
    [AdminPengajuanAbsensiController::class, 'index']
)
    ->middleware('auth')
    ->name('admin.pengajuan-absensi');

Route::patch(
    '/admin/pengajuan-absensi/{id}/approve',
    [AdminPengajuanAbsensiController::class, 'approve']
)
    ->middleware('auth')
    ->name('admin.pengajuan-absensi.approve');

Route::patch(
    '/admin/pengajuan-absensi/{id}/reject',
    [AdminPengajuanAbsensiController::class, 'reject']
)
    ->middleware('auth')
    ->name('admin.pengajuan-absensi.reject');

    Route::get(
    '/admin/laporan',
    [AdminLaporanController::class, 'index']
)
    ->middleware('auth')
    ->name('admin.laporan');

    Route::get(
    '/admin/laporan/export',
    [AdminLaporanController::class, 'exportExcel']
)
    ->middleware('auth')
    ->name('admin.laporan.export');

    // =========================
// PENGATURAN ADMIN
// =========================

Route::get(
    '/admin/pengaturan',
    [AdminPengaturanController::class, 'index']
)
    ->middleware('auth')
    ->name('admin.pengaturan');

Route::put(
    '/admin/pengaturan/profil',
    [AdminPengaturanController::class, 'updateProfile']
)
    ->middleware('auth')
    ->name('admin.pengaturan.profile.update');

Route::put(
    '/admin/pengaturan/password',
    [AdminPengaturanController::class, 'updatePassword']
)
    ->middleware('auth')
    ->name('admin.pengaturan.password.update');

    // =========================
// PROFIL ADMIN
// =========================

Route::get(
    '/admin/profil',
    [AdminProfilController::class, 'index']
)
    ->middleware('auth')
    ->name('admin.profil');

Route::put(
    '/admin/profil',
    [AdminProfilController::class, 'update']
)
    ->middleware('auth')
    ->name('admin.profil.update');

Route::put(
    '/admin/profil/password',
    [AdminProfilController::class, 'updatePassword']
)
    ->middleware('auth')
    ->name('admin.profil.password.update');