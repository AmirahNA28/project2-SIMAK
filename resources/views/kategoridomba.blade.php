<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kategori Produk Domba - Saung Kandang Sapi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>

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
    .delay-600 {
      animation-delay: 0.6s;
    }

    body {
      background-color: #fff;
      color: #a16207;
      font-family: 'Inter', system-ui, sans-serif;
      min-height: 100vh;
    }
  </style>
</head>
<body>

  <div class="max-w-screen-xl mx-auto px-6 py-10 mt-10 shadow-xl rounded-xl bg-yellow-50">

    <!-- Navbar -->
    <nav class="flex justify-between items-center py-5 px-6 bg-yellow-100 rounded-md animate-fadeInUp delay-200 mb-10">
      <div class="text-2xl font-bold flex items-center">
        <span class="text-yellow-700 flex items-center gap-2">
          <span>🐄</span> Saung Kandang Sapi
        </span>
      </div>
      <ul class="flex space-x-8 text-yellow-800 font-semibold text-lg">
        <li><a href="/home" class="hover:text-yellow-900 transition">HOME</a></li>
        <li><a href="/products" class="hover:text-yellow-900 transition">PRODUK</a></li>
        <li><a href="/contact" class="hover:text-yellow-900 transition">KONTAK</a></li>
      </ul>
      <ul class="flex space-x-6">
        <li><a href="/index" class="bg-yellow-700 text-yellow-100 px-5 py-2 rounded-full text-base hover:bg-yellow-800 transition">Masuk</a></li>
        <li><a href="/register" class="bg-yellow-700 text-yellow-100 px-5 py-2 rounded-full text-base hover:bg-yellow-800 transition">Daftar</a></li>
      </ul>
    </nav>

    <!-- Produk Domba -->
    <section class="grid md:grid-cols-3 gap-6 animate-fadeInUp delay-600 text-yellow-900 text-sm">

      <!-- Produk 1 -->
      <a href="/index" class="block bg-white rounded-xl p-5 shadow hover:shadow-lg transition text-center hover:bg-yellow-50 pesan-btn" data-nama="No 1" data-berat="20–25kg" data-harga="Rp 2.500.000">
        <img src="./images/domba_kambing2.png" alt="Domba" class="w-36 h-36 mx-auto mb-3 object-contain" />
        <h4 class="font-semibold text-base">No 1</h4>
        <p class="text-sm">Berat 20–25kg</p>
      </a>

      <!-- Produk 2 -->
      <a href="/index" class="block bg-white rounded-xl p-5 shadow hover:shadow-lg transition text-center hover:bg-yellow-50 pesan-btn" data-nama="No 2" data-berat="26–30kg" data-harga="Rp 2.800.000">
        <img src="./images/domba_kambing2.png" alt="Domba" class="w-36 h-36 mx-auto mb-3 object-contain" />
        <h4 class="font-semibold text-base">No 2</h4>
        <p class="text-sm">Berat 26–30kg</p>
      </a>

      <!-- Produk 3 -->
      <a href="/index" class="block bg-white rounded-xl p-5 shadow hover:shadow-lg transition text-center hover:bg-yellow-50 pesan-btn" data-nama="No 3" data-berat="31–35kg" data-harga="Rp 3.000.000">
        <img src="./images/domba_kambing2.png" alt="Domba" class="w-36 h-36 mx-auto mb-3 object-contain" />
        <h4 class="font-semibold text-base">No 3</h4>
        <p class="text-sm">Berat 31–35kg</p>
      </a>

      <!-- Produk 4 -->
      <a href="/index" class="block bg-white rounded-xl p-5 shadow hover:shadow-lg transition text-center hover:bg-yellow-50 pesan-btn" data-nama="No 4" data-berat="36–40kg" data-harga="Rp 3.200.000">
        <img src="./images/domba_kambing2.png" alt="Domba" class="w-36 h-36 mx-auto mb-3 object-contain" />
        <h4 class="font-semibold text-base">No 4</h4>
        <p class="text-sm">Berat 36–40kg</p>
      </a>

      <!-- Produk 5 -->
      <a href="/index" class="block bg-white rounded-xl p-5 shadow hover:shadow-lg transition text-center hover:bg-yellow-50 pesan-btn" data-nama="No 5" data-berat="41–50kg" data-harga="Rp 3.500.000">
        <img src="./images/domba_kambing2.png" alt="Domba" class="w-36 h-36 mx-auto mb-3 object-contain" />
        <h4 class="font-semibold text-base">No 5</h4>
        <p class="text-sm">Berat 41–50kg</p>
      </a>

    </section>
  </div>

  <!-- Popup Modal -->
  <div id="loginPopup" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-xl p-8 max-w-sm text-center animate-fadeInUp">
      <h3 class="text-xl font-bold text-yellow-800 mb-4">Akses Terbatas</h3>
      <p class="text-gray-700 mb-6">Silakan login atau daftar terlebih dahulu untuk memesan produk.</p>
      <div class="flex justify-center space-x-4">
        <a href="/index" class="bg-yellow-600 hover:bg-yellow-700 text-white font-semibold px-4 py-2 rounded-lg">Login</a>
        <a href="/register" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded-lg">Daftar</a>
      </div>
      <button onclick="closePopup()" class="mt-5 text-sm text-gray-500 hover:text-gray-700">Tutup</button>
    </div>
  </div>

  <script>
    // Tampilkan popup saat klik produk (pesan)
    const showPopup = (e) => {
      e.preventDefault(); // cegah link langsung terbuka
      document.getElementById("loginPopup").classList.remove("hidden");
    };

    const closePopup = () => {
      document.getElementById("loginPopup").classList.add("hidden");
    };

    document.addEventListener("DOMContentLoaded", () => {
      // Pasang event klik ke semua produk dengan class 'pesan-btn'
      const pesanButtons = document.querySelectorAll(".pesan-btn");
      pesanButtons.forEach(btn => btn.addEventListener("click", showPopup));
    });
  </script>

</body>
</html>
