<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('sesi_absensi_id')
                ->constrained('sesi_absensis')
                ->cascadeOnDelete();

            $table->foreignId('mahasiswa_id')
                ->constrained('mahasiswas')
                ->cascadeOnDelete();

            $table->timestamp('waktu_scan')->nullable();

            $table->enum('status', [
                'hadir',
                'terlambat',
                'izin',
                'sakit',
                'alpha'
            ])->default('hadir');

            $table->text('keterangan')->nullable();

            $table->timestamps();

            $table->unique([
                'sesi_absensi_id',
                'mahasiswa_id'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};