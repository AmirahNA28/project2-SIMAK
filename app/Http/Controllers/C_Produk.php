<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Produk extends Controller
{
    public function index(Request $request)
    {
        $jenis = $request->input('jenis');
        $berat = $request->input('berat');

        // Data stok dummy
        $stok_sapi = [
            1 => 5,
            2 => 3,
            3 => 0,
            4 => 10,
            5 => 2,
            6 => 0,
        ];

        $stok_domba = [
            1 => 4,
            2 => 0,
            3 => 6,
            4 => 1,
            5 => 0,
        ];

        // Filter stok jika filter aktif
        if ($jenis && $berat) {
            if ($jenis === 'sapi') {
                $stok_sapi = collect($stok_sapi)->filter(function ($value, $key) use ($berat) {
                    return $this->beratSapi($key) === $berat;
                })->toArray();
                $stok_domba = [];
            } elseif ($jenis === 'domba') {
                $stok_domba = collect($stok_domba)->filter(function ($value, $key) use ($berat) {
                    return $this->beratDomba($key) === $berat;
                })->toArray();
                $stok_sapi = [];
            }
        }

        // Buat daftar produk untuk ditampilkan
        $produk = $this->generateProdukList($stok_sapi, $stok_domba);

        return view('produk', compact('stok_sapi', 'stok_domba', 'produk'));
    }

    public function showProduk()
    {
        $stok_sapi = [
            1 => 5,
            2 => 3,
            3 => 0,
            4 => 10,
            5 => 2,
            6 => 0,
        ];

        $stok_domba = [
            1 => 4,
            2 => 0,
            3 => 6,
            4 => 1,
            5 => 0,
        ];

        $produk = $this->generateProdukList($stok_sapi, $stok_domba);

        return view('v_shope', compact('stok_sapi', 'stok_domba', 'produk'));
    }

    private function generateProdukList($stok_sapi, $stok_domba)
    {
        $produk = [];

        foreach ($stok_sapi as $no => $stok) {
            $produk[] = [
                'no' => $no,
                'berat' => $this->beratSapi($no),
            ];
        }

        foreach ($stok_domba as $no => $stok) {
            $produk[] = [
                'no' => $no,
                'berat' => $this->beratDomba($no),
            ];
        }

        return $produk;
    }

    private function beratSapi($no)
    {
        $beratList = [
            1 => '200-225kg',
            2 => '226-250kg',
            3 => '251-300kg',
            4 => '301-350kg',
            5 => '351-400kg',
            6 => '>400kg',
        ];
        return $beratList[$no] ?? null;
    }

    private function beratDomba($no)
    {
        $beratList = [
            1 => '20-25kg',
            2 => '26-30kg',
            3 => '31-35kg',
            4 => '36-40kg',
            5 => '41-50kg',
        ];
        return $beratList[$no] ?? null;
    }
}
