<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Karyawan</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-green-50">

    <div id="wrapper" class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="bg-gradient-to-b from-green-300 to-green-500 w-64 p-6 space-y-6">
            <div class="text-white text-center font-bold text-2xl mb-4 tracking-wide border-b border-green-200 pb-3">
                <i class="fas fa-user text-2xl"></i>
                <span class="font-medium">Karyawan</span>
            </div>

            <ul class="space-y-2 text-white">
                <li class="border-b border-green-200 pb-2">
                    <a href="/dashboard" class="hover:text-green-100 flex items-center">
                        <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                    </a>
                </li>
                <li class="border-b border-green-200 pb-2">
                    <a href="/jadwal_kesehatan" class="hover:text-green-100 flex items-center">
                        <i class="fas fa-home mr-3"></i> Jadwal Kesehatan Sapi
                    </a>
                </li>
                <li class="border-b border-green-200 pb-2">
                    <a href="/sapi" class="hover:text-green-100 flex items-center">
                        <i class="fas fa-hippo mr-3"></i> Kelola Data Sapi
                    </a>
                </li>
                <li class="border-b border-green-200 pb-2">
                    <a href="/pakan" class="hover:text-green-100 flex items-center">
                        <i class="fas fa-drumstick-bite mr-3"></i> Kelola Data Pakan
                    </a>
                </li>
                <li class="border-b border-green-200 pb-2">
                    <a href="/kesehatan_sapi" class="hover:text-green-100 flex items-center">
                        <i class="fas fa-hospital mr-3"></i> Kelola Data Kesehatan
                    </a>
                </li>
                <li class="pb-2">
                    <a href="/kandang" class="hover:text-green-100 flex items-center">
                        <i class="fas fa-home mr-3"></i> Kelola Data Kandang
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Content Wrapper -->
        <div class="flex-1 bg-white p-6">
            <!-- Topbar -->
            <nav class="bg-gradient-to-r from-green-400 to-green-600 shadow-md p-4 flex justify-between items-center rounded-md">
                <div class="text-white text-xl font-semibold">Dashboard Karyawan</div>
                <div class="relative inline-block text-left">
                    <div class="flex items-center space-x-4 cursor-pointer" onclick="toggleDropdown()">
                        <span class="text-white text-sm">Karyawan</span>
                        <img class="w-10 h-10 rounded-full border-2 border-white" src="{{ asset('Tamplate/img/undraw_profile.svg') }}" alt="Profile">
                    </div>
                    <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50">
                        <a href="/profileadmin" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-100"><i class="fas fa-user mr-2"></i> Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-100"><i class="fas fa-cogs mr-2"></i> Settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-100"><i class="fas fa-list mr-2"></i> Activity Log</a>
                        <div class="border-t my-1"></div>
                        <a href="/index" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-100"><i class="fas fa-sign-out-alt mr-2"></i> Logout</a>
                    </div>
                </div>
            </nav>

            <!-- Notification -->
            @if(!empty($notifications) && $notifications->count() > 0)
            <div class="mt-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4">
                <p class="font-bold">Perhatian!</p>
                <p>Terdapat {{ $notifications->count() }} jadwal pemeriksaan kesehatan yang akan segera tiba:</p>
                <ul class="mt-2 list-disc list-inside">
                    @foreach($notifications as $notif)
                        <li>Sapi ID: {{ $notif->id_sapi }} - Tanggal: {{ \Carbon\Carbon::parse($notif->tanggal)->format('d M Y') }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Dashboard Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
                <div class="bg-green-100 border-l-4 border-green-400 p-4 shadow rounded">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm font-bold text-green-700">Data Sapi</p>
                        </div>
                        <i class="fas fa-hippo fa-2x text-green-400"></i>
                    </div>
                </div>

                <div class="bg-green-200 border-l-4 border-green-500 p-4 shadow rounded">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm font-bold text-green-800">Data Pakan</p>
                        </div>
                        <i class="fas fa-drumstick-bite fa-2x text-green-500"></i>
                    </div>
                </div>

                <div class="bg-green-100 border-l-4 border-green-400 p-4 shadow rounded">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm font-bold text-green-700">Data Kesehatan</p>
                        </div>
                        <i class="fas fa-hospital fa-2x text-green-400"></i>
                    </div>
                </div>

                <div class="bg-green-200 border-l-4 border-green-500 p-4 shadow rounded">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm font-bold text-green-800">Data Kandang</p>
                        </div>
                        <i class="fas fa-home fa-2x text-green-500"></i>
                    </div>
                </div>
            </div>

            <h2 class="text-lg font-semibold text-gray-700 mt-8 mb-4">Jadwal Kesehatan</h2>
            <!-- Jadwal table atau bagian lainnya -->
        </div>
    </div>

    <script>
        function toggleDropdown() {
            const menu = document.getElementById('dropdownMenu');
            menu.classList.toggle('hidden');
        }
    </script>
</body>
</html>
