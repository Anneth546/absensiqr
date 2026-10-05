<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absensi extends Model
{
    protected $fillable = [
        'sesi_absensi_id',
        'mahasiswa_id',
        'waktu_scan',
        'status',
        'keterangan',
    ];

    protected $casts = [
        'waktu_scan' => 'datetime',
    ];

    public function sesiAbsensi(): BelongsTo
    {
        return $this->belongsTo(SesiAbsensi::class);
    }

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}