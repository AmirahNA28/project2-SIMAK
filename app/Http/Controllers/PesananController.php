<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Midtrans\Notification;
use Midtrans\Config;
// use Midtrans\Notification;
class PesananController extends Controller
{

    public function handleWebhook()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');

        try {
            $notif = new Notification();
            $transaction = $notif->transaction_status;
            $orderId = $notif->order_id;
            $fraud = $notif->fraud_status;
            $pesanan = Pesanan::where('order_id', $orderId)->first();
            if (!$pesanan) {
                return response()->json(['status' => 'error', 'message' => 'Order not found'], 404);
            }
            if ($transaction === 'capture' && $fraud === 'accept') {
                $pesanan->status = 'sukses';
            } elseif (in_array($transaction, ['settlement'])) {
                $pesanan->status = 'sukses';
            } elseif ($transaction === 'pending') {
                $pesanan->status = 'pending';
            } elseif (in_array($transaction, ['deny', 'cancel', 'expire'])) {
                $pesanan->status = 'gagal';
            }
            $pesanan->save();
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function index()
    {
        $pesanans = Pesanan::all();
        return view('pesanan', compact('pesanans'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'jumlah' => 'required|integer',
            'kategori_sapi' => 'nullable|string',
            'kategori_domba_kambing' => 'nullable|string',
            'metode_pembayaran' => 'required|string',
            'total_harga' => 'required|numeric',
            'status' => 'nullable|string',
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan data pesanan
        $pesanan = new Pesanan();
        $pesanan->nama = $request->nama;
        $pesanan->alamat = $request->alamat;
        $pesanan->kontak = $request->kontak;
        $pesanan->jumlah = $request->jumlah;
        $pesanan->kategori_sapi = $request->kategori_sapi;
        $pesanan->kategori_domba_kambing = $request->kategori_domba_kambing;
        $pesanan->metode_pembayaran = $request->metode_pembayaran;
        $pesanan->total_harga = $request->total_harga;
        $pesanan->status = 'Menunggu Konfirmasi';

        // Cek dan simpan bukti pembayaran (jika ada)
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/bukti_pembayaran', $filename);
            $pesanan->bukti_pembayaran = $filename;
        }

        $pesanan->save();

        return redirect()->back()->with('success', 'Pesanan berhasil disimpan.');
    }
}
