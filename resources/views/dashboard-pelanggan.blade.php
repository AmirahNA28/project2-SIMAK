<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Pelanggan</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-yellow-50">

    <!-- Page Wrapper -->
    <div id="wrapper" class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="bg-gradient-to-b from-yellow-800 to-yellow-900 w-64 p-6 space-y-6">
           <div class="text-white text-center font-bold text-2xl mb-4 tracking-wide">🐄 Saung Kandang</div>

            <div class="flex items-center space-x-2 text-white mb-6">
                <i class="fas fa-user-circle text-2xl"></i>
                <span class="font-medium">Pelanggan</span>
            </div>

            <ul class="space-y-2 text-white">
                <li class="hover:text-yellow-300">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    <span>Dashboard</span>
                </li>
            </ul>
        </aside>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="flex-1 bg-white p-6">

            <!-- Topbar -->
            <nav class="bg-gradient-to-r from-green-700 to-green-600 shadow-md p-4 flex justify-between items-center relative rounded-md">
                <div class="text-white text-xl font-semibold">Dashboard Pelanggan</div>

                <!-- Profile Dropdown -->
                <div class="relative inline-block text-left">
                    <div class="flex items-center space-x-4 cursor-pointer" onclick="toggleDropdown()">
                        <span class="text-white text-sm">Pelanggan</span>
                        <img class="w-10 h-10 rounded-full border-2 border-white" src="{{ asset('Tamplate/img/undraw_profile.svg') }}" alt="Profile">
                    </div>

                    <!-- Dropdown Menu -->
                    <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50">
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-yellow-100">
                                <i class="fas fa-user mr-2"></i> Profile
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-yellow-100">
                                <i class="fas fa-cogs mr-2"></i> Settings
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-yellow-100">
                                <i class="fas fa-list mr-2"></i> Activity Log
                            </a>
                            <div class="border-t my-1"></div>
                            <a href="/index" class="block px-4 py-2 text-sm text-gray-700 hover:bg-yellow-100">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </a>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="mt-6 max-w-5xl mx-auto px-4">
                @yield('content')

                <!-- Pesanan Saya -->
                <div class="bg-yellow-100 rounded-lg shadow p-4 mb-6 border border-yellow-300">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-base font-semibold text-yellow-900">Pesanan Saya</h2>
                        <a href="{{ url('/pesanan') }}" class="text-green-700 text-sm hover:text-green-800 flex items-center">
                            Lihat Riwayat Pesanan
                            <i class="fas fa-chevron-right ml-1 text-xs"></i>
                        </a>
                    </div>

                    <!-- Ikon Pesanan -->
                    <div class="flex flex-wrap justify-between gap-4 text-yellow-900 text-center">
                        <a href="#" class="w-20 flex flex-col items-center justify-center gap-y-2 hover:text-green-700 cursor-pointer">
                            <i class="fas fa-shopping-cart text-2xl"></i>
                            <span class="text-sm">Pesanan</span>
                        </a>

                        <a href="{{ url('/belum-bayar') }}" class="w-20 flex flex-col items-center justify-center gap-y-2 hover:text-green-700 cursor-pointer">
                            <i class="fas fa-wallet text-2xl"></i>
                            <span class="text-sm">Belum Bayar</span>
                        </a>

                        <a href="{{ url('/dikemas') }}" class="w-20 flex flex-col items-center justify-center gap-y-2 hover:text-green-700 cursor-pointer">
                            <i class="fas fa-box text-2xl"></i>
                            <span class="text-sm">Dikemas</span>
                        </a>

                        <a href="{{ url('/dikirim') }}" class="w-20 flex flex-col items-center justify-center gap-y-2 hover:text-green-700 cursor-pointer">
                            <i class="fas fa-truck text-2xl"></i>
                            <span class="text-sm">Dikirim</span>
                        </a>

                        <a href="{{ url('/beri-penilaian') }}" class="w-20 flex flex-col items-center justify-center gap-y-2 hover:text-green-700 cursor-pointer">
                            <i class="fas fa-star text-2xl"></i>
                            <span class="text-sm text-center">Penilaian</span>
                        </a>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Dropdown Script -->
    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('hidden');
        }

        window.addEventListener('click', function (e) {
            const dropdown = document.getElementById('dropdownMenu');
            const trigger = dropdown.previousElementSibling;
            if (!trigger.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>

</body>

</html>