<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Pesanan Pemilik</title>
    <style>
        table {
            width: 100%; 
            border-collapse: collapse;
        }
        th, td {
            padding: 8px; 
            border: 1px solid #ccc; 
            text-align: left;
        }
        select {
            padding: 4px;
        }
    </style>
</head>
<body>
    <h1>Daftar Pesanan - Dashboard Pemilik</h1>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kontak</th>
                <th>Kategori Sapi</th>
                <th>Kategori Domba/Kambing</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Metode Pembayaran</th>
                <th>Status</th>
                <th>Ubah Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pesanans as $pesanan)
            <tr>
                <td>{{ $pesanan->id }}</td>
                <td>{{ $pesanan->nama }}</td>
                <td>{{ $pesanan->alamat }}</td>
                <td>{{ $pesanan->kontak }}</td>
                <td>{{ $pesanan->kategori_sapi ?? '-' }}</td>
                <td>{{ $pesanan->kategori_domba_kambing ?? '-' }}</td>
                <td>{{ $pesanan->jumlah }}</td>
                <td>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                <td>{{ $pesanan->metode_pembayaran }}</td>
                <td>{{ ucfirst($pesanan->status) }}</td>
                <td>
                    <form action="{{ route('pemilik.pesanan.updateStatus', $pesanan->id) }}" method="POST">
                        @csrf
                        <select name="status" onchange="this.form.submit()">
                            <option value="pending" {{ $pesanan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="diproses" {{ $pesanan->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="dikirim" {{ $pesanan->status == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                            <option value="selesai" {{ $pesanan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="batal" {{ $pesanan->status == 'batal' ? 'selected' : '' }}>Batal</option>
                        </select>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="11" style="text-align:center;">Belum ada pesanan</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
