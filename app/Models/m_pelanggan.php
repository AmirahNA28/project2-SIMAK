<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_pelanggan extends Model
{
    protected $table = 'pelanggan'; // Nama tabel di database
    protected $fillable = ['nama', 'email', 'password']; // Kolom yang bisa diisi
    protected $hidden = ['password']; // Jangan tampilkan password saat mengambil data
    public $timestamps = true; // Aktifkan timestamps
}
