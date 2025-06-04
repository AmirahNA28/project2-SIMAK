<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Best Seller Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

  <div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-center">Produk Best Seller - Sapi</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
      @foreach($bestSellerSapi as $produk)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
          <img src="{{ asset('storage/' . $produk->gambar_produk) }}" class="w-full h-48 object-cover" alt="{{ $produk->nama_produk }}">
          <div class="p-4">
            <h2 class="text-xl font-semibold">{{ $produk->nama_produk }}</h2>
            <p class="text-gray-600">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
            <p class="text-sm text-green-600 mt-2">Terjual: {{ $produk->total_terjual }}</p>

            <!-- Form Tambah ke Keranjang -->
            <form action="{{ route('keranjang.tambah') }}" method="POST" class="mt-4">
              @csrf
              <input type="hidden" name="produk_id" value="{{ $produk->id }}">
              <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg w-full">
                Tambah ke Keranjang
              </button>
            </form>
          </div>
        </div>
      @endforeach
    </div>

    <h1 class="text-3xl font-bold mt-12 mb-6 text-center">Produk Best Seller - Domba/Kambing</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
      @foreach($bestSellerDomba as $produk)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
          <img src="{{ asset('storage/' . $produk->gambar_produk) }}" class="w-full h-48 object-cover" alt="{{ $produk->nama_produk }}">
          <div class="p-4">
            <h2 class="text-xl font-semibold">{{ $produk->nama_produk }}</h2>
            <p class="text-gray-600">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
            <p class="text-sm text-green-600 mt-2">Terjual: {{ $produk->total_terjual }}</p>

            <!-- Form Tambah ke Keranjang -->
            <form action="{{ route('keranjang.tambah') }}" method="POST" class="mt-4">
              @csrf
              <input type="hidden" name="produk_id" value="{{ $produk->id }}">
              <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg w-full">
                Tambah ke Keranjang
              </button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  </div>

</body>
</html>
