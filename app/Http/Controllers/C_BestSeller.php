<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Produk;

class C_BestSeller extends Controller
{
    public function index()
    {
        $bestSellerSapi = M_Produk::where('jenis_produk', 'sapi')
                            ->orderByDesc('total_terjual')
                            ->take(4)
                            ->get();

        $bestSellerDomba = M_Produk::where('jenis_produk', 'domba')
                            ->orderByDesc('total_terjual')
                            ->take(4)
                            ->get();

        return view('v_best_seller', compact('bestSellerSapi', 'bestSellerDomba'));
    }
}
