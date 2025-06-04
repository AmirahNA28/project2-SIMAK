<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_Produk extends Model
{
    protected $table = 'tb_produk';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_produk', 'jenis_produk', 'harga', 'stok', 'total_terjual', 'deskripsi', 'gambar_produk'
    ];
}

