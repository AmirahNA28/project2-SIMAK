<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans'; // pastikan sesuai dengan nama tabel di database

    protected $fillable = [
        'nama',
        'alamat',
        'kontak',
        'kategori',
        // 'kategori_domba_kambing',
        'jenis',
        'jumlah',
        'order_details',
        'total_harga',
        'metode_pembayaran',
        'status',
        'bukti_pembayaran',
        'order_id',
        'users_id',
    ];
}
