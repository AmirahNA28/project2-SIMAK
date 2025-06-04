<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiPembayaran extends Model
{
    protected $table = 'transaksi_pembayaran';

    protected $fillable = [
        'pesanan_id',
        'metode_pembayaran',
        'status_pembayaran',
        'jumlah_bayar',
        'bukti_pembayaran',
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }
}
