<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Formulir Pesanan - Saung Kandang Sapi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 1s ease-out forwards;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-400 {
            animation-delay: 0.4s;
        }

        .delay-600 {
            animation-delay: 0.6s;
        }

        body {
            background: linear-gradient(270deg, #f9f4ef, #d7c1a0, #f0d9a1, #e8cfae);
            background-size: 800% 800%;
            animation: backgroundMove 20s ease infinite;
            font-family: 'Inter', sans-serif;
        }

        @keyframes backgroundMove {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>

<body class="relative min-h-screen text-yellow-900">

    <!-- Overlay putih transparan -->
    <div class="absolute inset-0 bg-white bg-opacity-30 backdrop-blur-sm z-0"></div>

    <div
        class="relative z-10 max-w-lg mx-auto p-8 my-12 border-4 border-yellow-700 rounded-xl shadow-lg bg-yellow-50/90 animate-fadeInUp delay-200">

        <h1 class="text-3xl font-extrabold text-center mb-6">Formulir Pesanan</h1>

        @if (session('success'))
            <p class="bg-green-100 text-green-800 p-3 rounded mb-6 text-center font-semibold">
                {{ session('success') }}
            </p>
        @endif

        <form method="POST" action="{{ route('order.submit') }}" class="space-y-5">
            @csrf

            {{-- Nama user login, tampil tanpa input edit --}}
            <div>
                <label class="block font-semibold mb-1">Nama:</label>
                <input type="text" value="{{ auth()->user()->name }}" disabled
                    class="w-full px-4 py-2 rounded-md border border-yellow-300 bg-yellow-100 cursor-not-allowed" />
            </div>
            <div>
                <label class="block font-semibold mb-1">Email:</label>
                <input type="text" value="{{ auth()->user()->email }}" disabled
                    class="w-full px-4 py-2 rounded-md border border-yellow-300 bg-yellow-100 cursor-not-allowed" />
            </div>
            <div>
                <label class="block font-semibold mb-1">Produk dipilih:</label>
                <input type="text" value="{{ $produk_label ?? 'Tidak ada produk dipilih' }}" disabled
                    class="w-full px-4 py-2 rounded-md border border-yellow-300 bg-yellow-100 cursor-not-allowed" />
            </div>

            <!-- Untuk diproses saat submit -->
            <input type="hidden" name="jenis" value="{{ $jenis }}">
            <input type="hidden" name="kategori" value="{{ $kategori }}">
            <input type="hidden" id="hargaSatuan" value="{{ $harga }}">
            <input type="hidden" name="harga_per_item" id="hargaPerItem">
            <input type="hidden" name="total_harga" id="totalHargaInput">

            <div>
                <label for="alamat" class="block font-semibold mb-1">Alamat:</label>
                <textarea name="alamat" id="alamat" rows="3" required
                    class="w-full px-4 py-2 rounded-md border border-yellow-300 focus:ring-2 focus:ring-yellow-500 focus:outline-none resize-none">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="kontak" class="block font-semibold mb-1">No. Kontak (HP/WA):</label>
                <input type="text" name="kontak" id="kontak" required value="{{ old('kontak') }}"
                    class="w-full px-4 py-2 rounded-md border border-yellow-300 focus:ring-2 focus:ring-yellow-500 focus:outline-none" />
                @error('kontak')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="jumlah" class="block font-semibold mb-1">Jumlah:</label>
                <input type="number" name="jumlah" id="jumlah" min="1" value="{{ old('jumlah', 1) }}"
                    required
                    class="w-full px-4 py-2 rounded-md border border-yellow-300 focus:ring-2 focus:ring-yellow-500 focus:outline-none"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '');" />

                @error('jumlah')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="metode_pembayaran" class="block font-semibold mb-1">Metode Pembayaran:</label>
                <select name="metode_pembayaran" id="metode_pembayaran" required
                    class="w-full px-4 py-2 rounded-md border border-yellow-300 focus:ring-2 focus:ring-yellow-500 focus:outline-none">
                    <option value="">-- Pilih Metode Pembayaran --</option>
                    <option value="Transfer Bank" {{ old('metode_pembayaran') == 'Transfer Bank' ? 'selected' : '' }}>
                        Transfer Bank</option>
                    <option value="COD (Bayar di Tempat)"
                        {{ old('metode_pembayaran') == 'COD (Bayar di Tempat)' ? 'selected' : '' }}>COD (Bayar di
                        Tempat)</option>
                    <option value="QRIS" {{ old('metode_pembayaran') == 'QRIS' ? 'selected' : '' }}>QRIS</option>
                </select>
                @error('metode_pembayaran')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="text-center font-semibold text-yellow-900" id="totalHarga">Total Harga: Rp0</div>


            <button type="submit"
                class="w-full bg-yellow-700 text-yellow-100 py-3 rounded-full font-semibold hover:bg-yellow-800 transition">
                Pesan Sekarang
            </button>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputJumlah = document.getElementById('jumlah');
            const hargaSatuanElem = document.getElementById('hargaSatuan');
            const hargaPerItemInput = document.getElementById('hargaPerItem');
            const totalHargaInput = document.getElementById('totalHargaInput');
            const totalHargaDisplay = document.getElementById('totalHarga');

            function updateTotalHarga() {
                const jumlah = parseInt(inputJumlah.value || 1);
                const hargaSatuan = parseInt(hargaSatuanElem.value || 0);
                const total = jumlah * hargaSatuan;

                hargaPerItemInput.value = hargaSatuan;
                totalHargaInput.value = total;
                totalHargaDisplay.textContent = `Total Harga: Rp${total.toLocaleString('id-ID')}`;
            }
            updateTotalHarga();
            inputJumlah.addEventListener('input', updateTotalHarga);
        });
    </script>
</body>

</html>