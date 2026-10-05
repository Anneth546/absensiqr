<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengajuanAbsensi extends Model
{
    protected $fillable = [
        'mahasiswa_id',
        'jadwal_id',
        'tanggal',
        'jenis',
        'alasan',
        'bukti',
        'status',
        'catatan_admin',
        'diproses_at',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'diproses_at' => 'datetime',
    ];

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function jadwal(): BelongsTo
    {
        return $this->belongsTo(Jadwal::class);
    }
}