<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKesehatan extends Model
{
    use HasFactory;

    protected $table = 'jadwal_kesehatan_sapi';

    protected $fillable = [
        'id_sapi',
        'tanggal_pemeriksaan',
        'keterangan',
        'status',
    ];

    public function sapi()
    {
        return $this->belongsTo(Sapi::class, 'id_sapi');
    }
}
