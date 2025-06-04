<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Produk - Saung Kandang Sapi</title>
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

        .delay-800 {
            animation-delay: 0.8s;
        }

        body {
            background: linear-gradient(270deg, #f9f4ef, #d7c1a0, #f0d9a1, #e8cfae);
            background-size: 800% 800%;
            animation: backgroundMove 20s ease infinite;
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

<body class="relative min-h-screen text-yellow-900 font-sans">
    <div class="absolute inset-0 bg-white bg-opacity-30 backdrop-blur-sm z-0"></div>

    <div
        class="relative z-10 max-w-7xl mx-auto px-6 py-8 my-8 border-4 border-yellow-700 rounded-xl shadow-lg bg-yellow-50/80">
        <!-- Navbar -->
        <nav
            class="flex justify-between items-center py-5 animate-fadeInUp delay-200 bg-yellow-100 rounded-md px-4 mb-8">
            <div class="text-xl font-bold flex items-center">
                <img src="../dokumen_sapi/logosapi2.png" alt="Saung Kandang Sapi" class="h-10 mr-2" />
                <span class="text-yellow-700">Saung Kandang Sapi</span>
            </div>
            <a href="{{ url('/dashboard-pelanggan') }}"
                class="bg-yellow-700 text-yellow-100 px-4 py-2 rounded-full font-semibold hover:bg-yellow-800 transition">
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
                <input type="text" name="cari" placeholder="Cari produk..."
                    class="flex-grow px-4 py-2 border border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-500 rounded-l" />
                <button type="submit"
                    class="bg-yellow-700 text-yellow-100 px-6 font-semibold hover:bg-yellow-800 transition rounded-r">Cari</button>
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
                        <select name="jenis" id="filterJenis"
                            class="w-full border border-yellow-300 rounded px-3 py-2">
                            <option value="">Semua</option>
                            <option value="sapi">Sapi</option>
                            <option value="domba">Domba/Kambing</option>
                        </select>
                    </div>

                    <div>
                        <label class="block mb-1 font-semibold">Berat</label>
                        <select name="berat" id="filterBerat"
                            class="w-full border border-yellow-300 rounded px-3 py-2">
                            <option value="">Semua</option>
                            <option value="200-225kg">1. Sapi 200-225kg</option>
                            <option value="226-250kg">2. Sapi 226-250kg</option>
                            <option value="251-300kg">3. Sapi 251-300kg</option>
                            <option value="301-350kg">4. Sapi 301-350kg</option>
                            <option value="351-400kg">5. Sapi 351-400kg</option>
                            <option value=">400kg">6. Sapi >400kg</option>
                            <option value="20-25kg">1. Domba 20-25kg</option>
                            <option value="26-30kg">2. Domba 26-30kg</option>
                            <option value="31-35kg">3. Domba 31-35kg</option>
                            <option value="36-40kg">4. Domba 36-40kg</option>
                            <option value="41-50kg">5. Domba 41-50kg</option>
                        </select>
                    </div>

                    <button type="submit"
                        class="mt-2 bg-yellow-700 text-white py-2 px-4 rounded-full hover:bg-yellow-800 transition">
                        Terapkan Filter
                    </button>
                </form>
            </aside>

            <!-- Produk -->
            <div class="md:col-span-3 grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Produk Sapi --}}
                @foreach ([['no' => 1, 'berat' => '200-225kg'], ['no' => 2, 'berat' => '226-250kg'], ['no' => 3, 'berat' => '251-300kg'], ['no' => 4, 'berat' => '301-350kg'], ['no' => 5, 'berat' => '351-400kg'], ['no' => 6, 'berat' => '>400kg']] as $sapi)
                    {{-- Ambil stok sapi berdasarkan nomor, default 0 --}}
                    @php $stok = $stok_sapi[$sapi['no']] ?? 0; @endphp
                    <div
                        class="bg-yellow-100 rounded-xl flex flex-col items-center p-6 text-yellow-900 shadow-md hover:shadow-lg transition duration-300">
                        <img src="{{ asset('images/sapi2.png') }}" alt="Sapi"
                            class="w-40 h-32 object-contain rounded-lg mb-4" />
                        <h3 class="text-2xl font-semibold mb-1">No {{ $sapi['no'] }}</h3>
                        <p class="text-center text-base mb-1">Berat {{ $sapi['berat'] }}</p>
                        <p class="text-sm text-gray-700 mb-3">Stok: {{ $stok }}</p>

                        @if ($stok > 0)
                            <form action="{{ route('order.form') }}" method="GET" class="w-full form-pesan">
                                <input type="hidden" name="jenis" value="sapi">
                                <input type="hidden" name="kategori" value="{{ $sapi['no'] }}">
                                <button type="submit"
                                    class="w-full bg-yellow-700 text-yellow-100 px-5 py-2 rounded-full text-sm font-semibold hover:bg-yellow-800 transition">
                                    Pesan Sekarang
                                </button>
                            </form>
                        @else
                            <span class="w-full text-center text-red-600 font-semibold">Stok Habis</span>
                        @endif
                    </div>
                @endforeach

                {{-- Produk Domba/Kambing --}}
                @foreach ([['no' => 1, 'berat' => '20-25kg'], ['no' => 2, 'berat' => '26-30kg'], ['no' => 3, 'berat' => '31-35kg'], ['no' => 4, 'berat' => '36-40kg'], ['no' => 5, 'berat' => '41-50kg']] as $dk)
                    {{-- Ambil stok domba berdasarkan nomor, default 0 --}}
                    @php $stok = $stok_domba[$dk['no']] ?? 0; @endphp
                    <div
                        class="bg-yellow-100 rounded-xl flex flex-col items-center p-6 text-yellow-900 shadow-md hover:shadow-lg transition duration-300">
                        <img src="{{ asset('images/domba_kambing2.png') }}" alt="Domba/Kambing"
                            class="w-40 h-32 object-contain rounded-lg mb-4" />
                        <h3 class="text-2xl font-semibold mb-1">No {{ $dk['no'] }}</h3>
                        <p class="text-center text-base mb-1">Berat {{ $dk['berat'] }}</p>
                        <p class="text-sm text-gray-700 mb-3">Stok: {{ $stok }}</p>

                        @if ($stok > 0)
                            <form action="{{ route('order.form') }}" method="GET" class="w-full form-pesan">
                                <input type="hidden" name="jenis" value="domba">
                                <input type="hidden" name="kategori" value="{{ $dk['no'] }}">
                                <button type="submit"
                                    class="w-full bg-yellow-700 text-yellow-100 px-5 py-2 rounded-full text-sm font-semibold hover:bg-yellow-800 transition">
                                    Pesan Sekarang
                                </button>
                            </form>
                        @else
                            <span class="w-full text-center text-red-600 font-semibold">Stok Habis</span>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>
    </div>

    <!-- Popup -->
    <div id="popupPesan" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
        <div class="bg-white rounded-2xl p-8 text-center shadow-lg animate-fadeInUp max-w-md">
            <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" alt="Berhasil"
                class="w-16 h-16 mx-auto mb-4">
            <h2 class="text-2xl font-bold text-green-600 mb-2">Berhasil Dipesan!</h2>
            <p class="text-gray-600 mb-4">Terima kasih sudah memesan produk kami.</p>
            <button onclick="tutupPopup()"
                class="bg-yellow-700 text-yellow-100 px-6 py-2 rounded-full font-semibold hover:bg-yellow-800 transition">
                Tutup
            </button>
        </div>
    </div>

    <script>
        // Hanya form dengan class 'form-pesan' yang pakai popup
        document.querySelectorAll('form.form-pesan').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault(); // cegah submit langsung
                document.getElementById('popupPesan').classList.remove('hidden');
                setTimeout(() => {
                    form.submit();
                }, 2000); // submit setelah popup muncul 2 detik
            });
        });

        function tutupPopup() {
            document.getElementById('popupPesan').classList.add('hidden');
        }
    </script>
    <script>
        const beratOptions = {
            sapi: [{
                    value: '200-225kg',
                    label: '1. Sapi 200-225kg'
                },
                {
                    value: '226-250kg',
                    label: '2. Sapi 226-250kg'
                },
                {
                    value: '251-300kg',
                    label: '3. Sapi 251-300kg'
                },
                {
                    value: '301-350kg',
                    label: '4. Sapi 301-350kg'
                },
                {
                    value: '351-400kg',
                    label: '5. Sapi 351-400kg'
                },
                {
                    value: '>400kg',
                    label: '6. Sapi >400kg'
                },
            ],
            domba: [{
                    value: '20-25kg',
                    label: '1. Domba 20-25kg'
                },
                {
                    value: '26-30kg',
                    label: '2. Domba 26-30kg'
                },
                {
                    value: '31-35kg',
                    label: '3. Domba 31-35kg'
                },
                {
                    value: '36-40kg',
                    label: '4. Domba 36-40kg'
                },
                {
                    value: '41-50kg',
                    label: '5. Domba 41-50kg'
                },
            ],
            semua: [{
                    value: '',
                    label: 'Semua'
                },
                // gabungan semua
                {
                    value: '200-225kg',
                    label: '1. Sapi 200-225kg'
                },
                {
                    value: '226-250kg',
                    label: '2. Sapi 226-250kg'
                },
                {
                    value: '251-300kg',
                    label: '3. Sapi 251-300kg'
                },
                {
                    value: '301-350kg',
                    label: '4. Sapi 301-350kg'
                },
                {
                    value: '351-400kg',
                    label: '5. Sapi 351-400kg'
                },
                {
                    value: '>400kg',
                    label: '6. Sapi >400kg'
                },
                {
                    value: '20-25kg',
                    label: '1. Domba 20-25kg'
                },
                {
                    value: '26-30kg',
                    label: '2. Domba 26-30kg'
                },
                {
                    value: '31-35kg',
                    label: '3. Domba 31-35kg'
                },
                {
                    value: '36-40kg',
                    label: '4. Domba 36-40kg'
                },
                {
                    value: '41-50kg',
                    label: '5. Domba 41-50kg'
                },
            ]
        };

        const filterJenis = document.getElementById('filterJenis');
        const filterBerat = document.getElementById('filterBerat');

        filterJenis.addEventListener('change', () => {
            const jenis = filterJenis.value;
            let options = [];

            if (jenis === 'sapi') options = beratOptions.sapi;
            else if (jenis === 'domba') options = beratOptions.domba;
            else options = beratOptions.semua;

            // Clear opsi berat
            filterBerat.innerHTML = '';

            // Tambahkan opsi baru
            options.forEach(opt => {
                const option = document.createElement('option');
                option.value = opt.value;
                option.textContent = opt.label;
                filterBerat.appendChild(option);
            });
        });
    </script>
</body>

</html>
