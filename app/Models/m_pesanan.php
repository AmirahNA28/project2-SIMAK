<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan'; // nama tabel

    protected $fillable = [
        'nama', 'alamat', 'kontak',
        'kategori_sapi', 'kategori_domba_kambing',
        'jumlah', 'status_pengiriman'
    ];
}
