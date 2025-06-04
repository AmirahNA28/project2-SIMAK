<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
        'order_dteails',
        'kontak',
        'kategori_sapi',
        'kategori_domba_kambing',
        'jumlah',
        'metode_pembayaran',
        'total_harga'
    ];
}
