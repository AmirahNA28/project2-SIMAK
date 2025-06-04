<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\M_Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class OrderController extends Controller
{
    public function showForm(Request $request)
    {
        $user = Auth::user();
        $jenis = $request->query('jenis');
        $kategori = $request->query('kategori');
        $id_produk = $request->query('id_produk');

        $hargaMap = [
            'sapi' => [
                1 => 20000000,
                2 => 22000000,
                3 => 25000000,
                4 => 28000000,
                5 => 30000000,
                6 => 35000000,
            ],
            'domba' => [
                1 => 2500000,
                2 => 2800000,
                3 => 3000000,
                4 => 3200000,
                5 => 3500000,
            ],
        ];

        $harga = $hargaMap[$jenis][$kategori] ?? 0;

        $kategori_sapi = [
            1 => '200-225kg',
            2 => '226-250kg',
            3 => '251-300kg',
            4 => '301-350kg',
            5 => '351-400kg',
            6 => '>400kg',
        ];

        $kategori_domba = [
            1 => '20-25kg',
            2 => '26-30kg',
            3 => '31-35kg',
            4 => '36-40kg',
            5 => '41-50kg',
        ];

        $produk_label = null;
        if ($jenis === 'sapi' && isset($kategori_sapi[$kategori])) {
            $produk_label = 'Sapi ' . $kategori_sapi[$kategori];
        } elseif ($jenis === 'domba' && isset($kategori_domba[$kategori])) {
            $produk_label = 'Domba/Kambing ' . $kategori_domba[$kategori];
        }

        return view('order-form', compact('user', 'produk_label', 'jenis', 'kategori', 'harga', 'id_produk'));
    }

    // Tampilkan dashboard pelanggan dengan daftar pesanan
    public function dashboardPelanggan()
    {
        $pesanans = Pesanan::orderBy('created_at', 'desc')->get();
        return view('dashboard-pelanggan', compact('pesanans'));
    }

    // Proses simpan pesanan dari form

    public function prosesPesanan(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:20',
            'jumlah' => 'required|integer|min:1',
            'metode_pembayaran' => 'required|string',
            'total_harga' => 'required|numeric|min:0',
            'kategori' => 'required|string',
        ]);
        if ($request->jenis == 'sapi') {
            $kategori_sapi = $request->kategori;
            $kategori_domba_kambing = null;
        } else {
            $kategori_sapi = null;
            $kategori_domba_kambing = $request->kategori;
        }

        $orderId = 'PSNAN-' . Str::random(20) . '-' . time();
        $pesanan = Pesanan::create([
            'nama' => Auth::user()->name,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'jumlah' => $request->jumlah,
            'jenis' => $request->jenis,
            'metode_pembayaran' => $request->metode_pembayaran,
            'total_harga' => $request->total_harga,
            'order_id' => $orderId,
            'kategori' => $request->kategori,
            'status' => in_array($request->metode_pembayaran, ['Transfer Bank', 'QRIS']) ? 'pending' : 'pending',
            'users_id' => Auth::id(),
        ]);
        $pesanan->save();

        if (in_array($request->metode_pembayaran, ['Transfer Bank', 'QRIS'])) {
            Config::$serverKey = config('midtrans.server_key');
            Config::$isProduction = config('midtrans.is_production');
            Config::$isSanitized = true;
            Config::$is3ds = true;

            $midtransParams = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => $pesanan->total_harga,
                ],
                'customer_details' => [
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'phone' => $request->kontak,
                ],
            ];

            $snapToken = Snap::getSnapToken($midtransParams);

            return view('midtrans.payment', compact('snapToken', 'orderId'));
        }

        return redirect()->route('dashboard.pelanggan')->with('success', 'Pesanan berhasil dikirim!');
    }

    // Update status pesanan (misal setelah pembayaran)
    public function updateStatus($id)
    {
        $pesanan = Pesanan::find($id);

        if ($pesanan && $pesanan->metode_pembayaran == 'Transfer' && $pesanan->status == 'Menunggu Pembayaran') {
            $pesanan->status = 'Dibayar';
            $pesanan->save();
        }

        return redirect()->back()->with('success', 'Status Pesanan telah diperbarui');
    }

    // Menyimpan pilihan kategori sapi/domba ke session lalu redirect ke form order
    public function addToCart(Request $request)
    {
        if ($request->has('kategori_sapi')) {
            session(['kategori_sapi' => $request->input('kategori_sapi')]);
            session()->forget('kategori_domba_kambing'); // Hapus kategori domba/kambing
        }

        if ($request->has('kategori_domba_kambing')) {
            session(['kategori_domba_kambing' => $request->input('kategori_domba_kambing')]);
            session()->forget('kategori_sapi'); // Hapus kategori sapi
        }

        return redirect('/order'); // Arahkan ke halaman formulir pesanan
    }
}
