<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(270deg, #f9f4ef, #d7c1a0, #f0d9a1, #e8cfae);
            background-size: 800% 800%;
            animation: backgroundMove 20s ease infinite;
            font-family: 'Inter', sans-serif;
        }

        @keyframes backgroundMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<body class="min-h-screen text-yellow-900">
    <div class="max-w-7xl mx-auto px-4 py-10 relative z-10">
        <div class="flex justify-between items-center mb-6">
        <!-- Tombol Kembali -->
        <a href="{{ url()->previous() }}" 
        class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-2 px-4 rounded">
            ← Kembali
        </a>

        <!-- Tombol Logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
                Logout
            </button>
        </form>
    </div>
        <h1 class="text-3xl font-bold text-center mb-8">Daftar Pesanan</h1>

        <form action="{{ route('pesanan.index') }}" method="GET" class="mb-6 flex justify-center">
            <input type="text" name="search" placeholder="Cari nama/kategori/jenis..." 
                value="{{ request('search') }}"
                class="w-1/2 px-4 py-2 border border-yellow-400 rounded-l-md focus:outline-none focus:ring focus:ring-yellow-300" />
            <button type="submit" class="bg-yellow-500 text-white px-4 rounded-r-md hover:bg-yellow-600">
                Cari
            </button>
        </form>
        <div class="overflow-x-auto rounded-xl shadow-xl">
            <table class="min-w-full bg-white/90 border border-yellow-700 text-sm">
                <thead class="bg-yellow-200 text-yellow-900">
                    <tr>
                        <th class="px-4 py-3 border">Nama</th>
                        <th class="px-4 py-3 border">Alamat</th>
                        <th class="px-4 py-3 border">Kontak</th>
                        <th class="px-4 py-3 border">Jumlah Pesanan</th>
                        <th class="px-4 py-3 border">Jenis</th>
                        <th class="px-4 py-3 border">Kategori</th>
                        <th class="px-4 py-3 border">Metode</th>
                        <th class="px-4 py-3 border">Total Harga</th>
                        <th class="px-4 py-3 border">Status Pembayaran</th>
                        <th class="px-4 py-3 border">Tanggal Pesan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pesanans as $pesanan)
                    <tr class="hover:bg-yellow-100">
                        <td class="px-4 py-2 border">{{ $pesanan->nama }}</td>
                        <td class="px-4 py-2 border">{{ $pesanan->alamat }}</td>
                        <td class="px-4 py-2 border">{{ $pesanan->kontak }}</td>
                        <td class="px-4 py-2 border text-center">{{ $pesanan->jumlah }}</td>
                        <td class="px-4 py-2 border text-green-700 font-semibold">
                            {{ $pesanan->jenis ?? '-' }}
                        </td>
                        <td class="px-4 py-2 border text-green-700 font-semibold">
                            {{ $pesanan->kategori ?? '-' }}
                        </td>
                        <td class="px-4 py-2 border">{{ $pesanan->metode_pembayaran }}</td>
                        <td class="px-4 py-2 border font-bold text-yellow-800">
                            Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-2 border">{{ $pesanan->status }}</td>
                        <td class="px-4 py-2 border">
                            {{ \Carbon\Carbon::parse($pesanan->updated_at)->format('d M Y') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
