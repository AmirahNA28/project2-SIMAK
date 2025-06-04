<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukSapi;

class DetailProdukSapiController extends Controller
{
    public function index()
    {
        $produk_sapis = ProdukSapi::all();
        return view('menu_pesanan_sapi', compact('produk_sapis'));
    }
}
