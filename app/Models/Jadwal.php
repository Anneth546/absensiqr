<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'mata_kuliah_id',
        'dosen_id',
        'kelas_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'ruangan',
    ];

    public function mataKuliah(): BelongsTo
    {
        return $this->belongsTo(
            MataKuliah::class,
            'mata_kuliah_id'
        );
    }

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(
            Dosen::class,
            'dosen_id'
        );
    }

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(
            Kelas::class,
            'kelas_id'
        );
    }

    public function sesiAbsensi(): HasMany
    {
        return $this->hasMany(
            SesiAbsensi::class,
            'jadwal_id'
        );
    }

    public function pengajuanAbsensi(): HasMany
    {
        return $this->hasMany(
            PengajuanAbsensi::class,
            'jadwal_id'
        );
    }
}