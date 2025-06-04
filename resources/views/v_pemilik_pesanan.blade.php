@extends('layout_pemilik')

@section('content')
<h2 class="text-xl font-bold mb-4">Daftar Pesanan Pelanggan</h2>

<table class="min-w-full bg-white shadow-md rounded-lg">
    <thead>
        <tr class="bg-gray-100 text-gray-700">
            <th class="px-4 py-2">Nama</th>
            <th class="px-4 py-2">Alamat</th>
            <th class="px-4 py-2">Kontak</th>
            <th class="px-4 py-2">Kategori Sapi</th>
            <th class="px-4 py-2">Kategori Domba/Kambing</th>
            <th class="px-4 py-2">Jumlah</th>
            <th class="px-4 py-2">Total Harga</th>
            <th class="px-4 py-2">Metode Pembayaran</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Bukti Pembayaran</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pesanan as $p)
        <tr class="border-b">
            <td class="px-4 py-2">{{ $p->nama }}</td>
            <td class="px-4 py-2">{{ $p->alamat }}</td>
            <td class="px-4 py-2">{{ $p->kontak }}</td>
            <td class="px-4 py-2">{{ $p->kategori_sapi ?? '-' }}</td>
            <td class="px-4 py-2">{{ $p->kategori_domba_kambing ?? '-' }}</td>
            <td class="px-4 py-2">{{ $p->jumlah }}</td>
            <td class="px-4 py-2">Rp{{ number_format($p->total_harga, 0, ',', '.') }}</td>
            <td class="px-4 py-2">{{ $p->metode_pembayaran }}</td>
            <td class="px-4 py-2">{{ ucfirst($p->status) }}</td>
            <td class="px-4 py-2">
                @if($p->bukti_pembayaran)
                    <a href="{{ asset('storage/bukti/' . $p->bukti_pembayaran) }}" target="_blank" class="text-blue-600 underline">Lihat</a>
                @else
                    -
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
