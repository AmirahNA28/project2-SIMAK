<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriDomba extends Model
{
    use HasFactory;
    protected $table = 'kategori_domba';
    protected $fillable = ['berat', 'stok'];
}
