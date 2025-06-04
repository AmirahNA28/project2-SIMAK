<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Produk - Saung Kandang Sapi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .animate-fadeInUp { animation: fadeInUp 1s ease-out forwards; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-600 { animation-delay: 0.6s; }
        .delay-800 { animation-delay: 0.8s; }

        body {
            background: linear-gradient(270deg, #f9f4ef, #d7c1a0, #f0d9a1, #e8cfae);
            background-size: 800% 800%;
            animation: backgroundMove 20s ease infinite;
        }

        @keyframes backgroundMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<body class="relative min-h-screen text-yellow-900 font-sans">
    <div class="absolute inset-0 bg-white bg-opacity-30 backdrop-blur-sm z-0"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 py-8 my-8 border-4 border-yellow-700 rounded-xl shadow-lg bg-yellow-50/80">
        <!-- Navbar -->
        <nav class="flex justify-between items-center py-5 animate-fadeInUp delay-200 bg-yellow-100 rounded-md px-4 mb-8">
            <div class="text-xl font-bold flex items-center">
                <img src="{{ asset('dokumen_sapi/logosapi2.png') }}" alt="Saung Kandang Sapi" class="h-10 mr-2" />
                <span class="text-yellow-700">Saung Kandang Sapi</span>
            </div>
            <a href="{{ url('/dashboard-pelanggan') }}" class="bg-yellow-700 text-yellow-100 px-4 py-2 rounded-full font-semibold hover:bg-yellow-800 transition">
                Dashboard
            </a>
        </nav>

        <!-- Judul -->
        <section class="text-center mb-10 animate-fadeInUp delay-400">
            <h1 class="text-4xl font-extrabold mb-3">Selamat Datang!</h1>
            <p class="text-lg max-w-xl mx-auto text-yellow-900/80">
                Pilih produk ternak terbaik yang sesuai kebutuhan peternakan Anda.
            </p>
        </section>

        <!-- Fitur Pencarian -->
        <div class="max-w-xl mx-auto mb-10 animate-fadeInUp delay-600">
            <form method="GET" action="{{ url('/produk') }}" class="flex gap-2 shadow-md rounded overflow-hidden">
                <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari produk..." class="flex-grow px-4 py-2 border border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-500 rounded-l" />
                <button type="submit" class="bg-yellow-700 text-yellow-100 px-6 font-semibold hover:bg-yellow-800 transition rounded-r">Cari</button>
            </form>
        </div>

        <!-- Filter + Produk -->
        <section class="grid md:grid-cols-4 gap-8 max-w-7xl mx-auto animate-fadeInUp delay-800">
            <!-- Sidebar Filter -->
            <aside class="bg-yellow-100 p-6 rounded-xl shadow-md text-yellow-900">
                <h2 class="text-xl font-bold mb-4">Filter Produk</h2>
                <form method="GET" action="{{ url('/produk') }}" class="flex flex-col gap-4">
                    <div>
                        <label class="block mb-1 font-semibold">Jenis</label>
                        <select name="jenis" id="filterJenis" class="w-full border border-yellow-300 rounded px-3 py-2">
                            <option value="" {{ request('jenis') == '' ? 'selected' : '' }}>Semua</option>
                            <option value="sapi" {{ request('jenis') == 'sapi' ? 'selected' : '' }}>Sapi</option>
                            <option value="domba" {{ request('jenis') == 'domba' ? 'selected' : '' }}>Domba/Kambing</option>
                        </select>
                    </div>

                    <div>
                        <label class="block mb-1 font-semibold">Berat</label>
                        <select name="berat" id="filterBerat" class="w-full border border-yellow-300 rounded px-3 py-2">
                            <option value="">Semua</option>
                            {{-- Options akan di-generate JS --}}
                        </select>
                    </div>

                    <button type="submit" class="mt-2 bg-yellow-700 text-white py-2 px-4 rounded-full hover:bg-yellow-800 transition">
                        Terapkan Filter
                    </button>
                </form>
            </aside>

            <!-- Produk -->
            <div class="md:col-span-3 grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Loop produk sapi --}}
                @foreach([
                    ['no' => 1, 'berat' => '200-225kg'],
                    ['no' => 2, 'berat' => '226-250kg'],
                    ['no' => 3, 'berat' => '251-300kg'],
                    ['no' => 4, 'berat' => '301-350kg'],
                    ['no' => 5, 'berat' => '351-400kg'],
                    ['no' => 6, 'berat' => '>400kg'],
                ] as $sapi)
                    @php 
                        $stok = $stok_sapi[$sapi['no']] ?? 0; 
                        $show = true;
                        if(request('jenis') == 'sapi' && request('berat') && request('berat') != $sapi['berat']) $show = false;
                        if(request('jenis') == 'domba') $show = false;
                        if(request('jenis') == '' && request('berat') && request('berat') != $sapi['berat']) $show = false;
                    @endphp

                    @if($show)
                    <div class="bg-yellow-100 rounded-xl flex flex-col items-center p-6 text-yellow-900 shadow-md hover:shadow-lg transition duration-300">
                        <img src="{{ asset('images/sapi2.png') }}" alt="Sapi" class="w-40 h-32 object-contain rounded-lg mb-4" />
                        <h3 class="text-2xl font-semibold mb-1">No {{ $sapi['no'] }}</h3>
                        <p class="text-center text-base mb-1">Berat {{ $sapi['berat'] }}</p>
                        <p class="text-sm text-gray-700 mb-3">Stok: {{ $stok }}</p>

                        @if($stok > 0)
                            <form action="/order" method="POST" class="w-full form-pesan">
                                @csrf
                                <input type="hidden" name="kategori_sapi" value="{{ $sapi['no'] }}">
                                <button type="submit" class="w-full bg-yellow-700 text-yellow-100 px-5 py-2 rounded-full text-sm font-semibold hover:bg-yellow-800 transition">
                                    Pesan Sekarang
                                </button>
                            </form>
                        @else
                            <span class="w-full text-center text-red-600 font-semibold">Stok Habis</span>
                        @endif
                    </div>
                    @endif
                @endforeach

                {{-- Loop produk domba/kambing --}}
                @foreach([
                    ['no' => 1, 'berat' => '20-25kg'],
                    ['no' => 2, 'berat' => '26-30kg'],
                    ['no' => 3, 'berat' => '31-35kg'],
                    ['no' => 4, 'berat' => '36-40kg'],
                    ['no' => 5, 'berat' => '41-50kg'],
                ] as $dk)
                    @php 
                        $stok = $stok_domba[$dk['no']] ?? 0; 
                        $show = true;
                        if(request('jenis') == 'domba' && request('berat') && request('berat') != $dk['berat']) $show = false;
                        if(request('jenis') == 'sapi') $show = false;
                        if(request('jenis') == '' && request('berat') && request('berat') != $dk['berat']) $show = false;
                    @endphp

                    @if($show)
                    <div class="bg-yellow-100 rounded-xl flex flex-col items-center p-6 text-yellow-900 shadow-md hover:shadow-lg transition duration-300">
                        <img src="{{ asset('images/domba_kambing2.png') }}" alt="Domba/Kambing" class="w-40 h-32 object-contain rounded-lg mb-4" />
                        <h3 class="text-2xl font-semibold mb-1">No {{ $dk['no'] }}</h3>
                        <p class="text-center text-base mb-1">Berat {{ $dk['berat'] }}</p>
                        <p class="text-sm text-gray-700 mb-3">Stok: {{ $stok }}</p>

                        @if($stok > 0)
                            <form action="/order" method="POST" class="w-full form-pesan">
                                @csrf
                                <input type="hidden" name="kategori_domba" value="{{ $dk['no'] }}">
                                <button type="submit" class="w-full bg-yellow-700 text-yellow-100 px-5 py-2 rounded-full text-sm font-semibold hover:bg-yellow-800 transition">
                                    Pesan Sekarang
                                </button>
                            </form>
                        @else
                            <span class="w-full text-center text-red-600 font-semibold">Stok Habis</span>
                        @endif
                    </div>
                    @endif
                @endforeach
            </div>
        </section>

    </div>

    <!-- Popup pesan -->
    <div id="popupPesan" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 hidden z-50">
        <div class="bg-white rounded-xl p-8 max-w-md w-full shadow-lg text-center">
            <h3 class="text-xl font-bold mb-4">Pesanan Berhasil!</h3>
            <p class="mb-6">Terima kasih sudah melakukan pemesanan. Kami akan segera memproses pesanan Anda.</p>
            <button id="tutupPopup" class="bg-yellow-700 text-yellow-100 px-6 py-2 rounded-full font-semibold hover:bg-yellow-800 transition">
                Tutup
            </button>
        </div>
    </div>

    <script>
        // Isi opsi berat sesuai jenis filter
        const beratSapi = ['200-225kg', '226-250kg', '251-300kg', '301-350kg', '351-400kg', '>400kg'];
        const beratDomba = ['20-25kg', '26-30kg', '31-35kg', '36-40kg', '41-50kg'];

        const jenisSelect = document.getElementById('filterJenis');
        const beratSelect = document.getElementById('filterBerat');

        function updateBeratOptions() {
            let jenis = jenisSelect.value;
            let beratOptions = [];
            if(jenis === 'sapi') beratOptions = beratSapi;
            else if(jenis === 'domba') beratOptions = beratDomba;
            else beratOptions = [];

            beratSelect.innerHTML = '<option value="">Semua</option>';
            beratOptions.forEach(b => {
                const opt = document.createElement('option');
                opt.value = b;
                opt.textContent = b;
                if("{{ request('berat') }}" === b) opt.selected = true;
                beratSelect.appendChild(opt);
            });
        }

        jenisSelect.addEventListener('change', updateBeratOptions);

        // Initialize on page load
        updateBeratOptions();

        // Popup pesan setelah submit form
        document.querySelectorAll('.form-pesan').forEach(form => {
            form.addEventListener('submit', e => {
                e.preventDefault();
                // Bisa tambahkan ajax request disini jika mau
                // Sekarang langsung popup
                document.getElementById('popupPesan').classList.remove('hidden');
            });
        });

        document.getElementById('tutupPopup').addEventListener('click', () => {
            document.getElementById('popupPesan').classList.add('hidden');
        });
    </script>
</body>
</html>
