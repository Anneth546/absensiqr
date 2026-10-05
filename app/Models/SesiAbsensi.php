<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SesiAbsensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'jadwal_id',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'token_qr',
        'aktif',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
            'aktif' => 'boolean',
        ];
    }

    public function jadwal(): BelongsTo
    {
        return $this->belongsTo(
            Jadwal::class,
            'jadwal_id'
        );
    }

    public function absensi(): HasMany
    {
        return $this->hasMany(
            Absensi::class,
            'sesi_absensi_id'
        );
    }
}