<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\M_Produk;

class C_Keranjang extends Controller
{
    public function tambah(Request $request)
    {
        $produk = M_Produk::find($request->id);

        $keranjang = session()->get('keranjang', []);
        if(isset($keranjang[$produk->id])){
            $keranjang[$produk->id]['jumlah']++;
        } else {
            $keranjang[$produk->id] = [
                "nama" => $produk->nama_produk,
                "harga" => $produk->harga,
                "gambar" => $produk->gambar_produk,
                "jumlah" => 1
            ];
        }
        session()->put('keranjang', $keranjang);
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function lihat()
    {
        $keranjang = session()->get('keranjang', []);
        return view('v_keranjang', compact('keranjang'));
    }

    public function hapus($id)
    {
        $keranjang = session()->get('keranjang');
        if(isset($keranjang[$id])) {
            unset($keranjang[$id]);
            session()->put('keranjang', $keranjang);
        }
        return redirect('/keranjang')->with('success', 'Produk dihapus dari keranjang.');
    }
}
