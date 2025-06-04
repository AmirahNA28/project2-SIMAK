<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriSapi;
use App\Models\KategoriDomba;

class C_KategoriProduk extends Controller
{
    public function index()
    {
        $produkSapi = KategoriSapi::all();
        $produkDomba = KategoriDomba::all();
        return view('v_shope', compact('produkSapi', 'produkDomba'));
    }
}

