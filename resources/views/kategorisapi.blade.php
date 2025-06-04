<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kategori Produk Sapi - Saung Kandang Sapi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background-color: #fffbe8;
      color: #78350f;
      font-family: system-ui, sans-serif;
    }
  </style>
</head>
<body class="min-h-screen">

  <!-- Navbar -->
  <nav class="w-full py-5 px-6 bg-yellow-100 flex justify-between items-center">
    <div class="text-xl font-bold text-yellow-800 flex items-center gap-2">
      <span>🐄</span> Saung Kandang Sapi
    </div>
    <ul class="flex space-x-6 text-yellow-900 font-medium text-base">
      <li><a href="/home" class="hover:underline">HOME</a></li>
      <li><a href="/products" class="hover:underline">PRODUK</a></li>
      <li><a href="/contact" class="hover:underline">KONTAK</a></li>
    </ul>
    <ul class="flex space-x-4">
      <li><a href="/index" class="bg-yellow-700 text-white px-4 py-2 rounded">Masuk</a></li>
      <li><a href="/register" class="bg-yellow-700 text-white px-4 py-2 rounded">Daftar</a></li>
    </ul>
  </nav>

  <!-- Konten Kategori -->
  <main class="w-full px-6 py-10">
    <h1 class="text-2xl font-semibold text-yellow-800 mb-6">Kategori Produk Sapi</h1>

    <section class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      <a href="/shope" class="border border-yellow-300 rounded p-4 text-center bg-white hover:bg-yellow-50">
        <img src="./images/sapi2.png" alt="Sapi 1" class="w-24 h-24 mx-auto mb-2 object-contain">
        <h4 class="font-semibold text-sm">No 1</h4>
        <p class="text-xs">Berat 200-225kg</p>
      </a>

      <a href="/shope" class="border border-yellow-300 rounded p-4 text-center bg-white hover:bg-yellow-50">
        <img src="./images/sapi2.png" alt="Sapi 2" class="w-24 h-24 mx-auto mb-2 object-contain">
        <h4 class="font-semibold text-sm">No 2</h4>
        <p class="text-xs">Berat 226-250kg</p>
      </a>

      <a href="/shope" class="border border-yellow-300 rounded p-4 text-center bg-white hover:bg-yellow-50">
        <img src="./images/sapi2.png" alt="Sapi 3" class="w-24 h-24 mx-auto mb-2 object-contain">
        <h4 class="font-semibold text-sm">No 3</h4>
        <p class="text-xs">Berat 251-300kg</p>
      </a>

      <a href="/shope" class="border border-yellow-300 rounded p-4 text-center bg-white hover:bg-yellow-50">
        <img src="./images/sapi2.png" alt="Sapi 4" class="w-24 h-24 mx-auto mb-2 object-contain">
        <h4 class="font-semibold text-sm">No 4</h4>
        <p class="text-xs">Berat 301-350kg</p>
      </a>

      <a href="/shope" class="border border-yellow-300 rounded p-4 text-center bg-white hover:bg-yellow-50">
        <img src="./images/sapi2.png" alt="Sapi 5" class="w-24 h-24 mx-auto mb-2 object-contain">
        <h4 class="font-semibold text-sm">No 5</h4>
        <p class="text-xs">Berat 351-400kg</p>
      </a>

      <a href="/shope" class="border border-yellow-300 rounded p-4 text-center bg-white hover:bg-yellow-50">
        <img src="./images/sapi2.png" alt="Sapi 6" class="w-24 h-24 mx-auto mb-2 object-contain">
        <h4 class="font-semibold text-sm">No 6</h4>
        <p class="text-xs">Berat &gt;400kg</p>
      </a>
    </section>
  </main>

  <!-- Popup Login -->
  <div id="loginPopup" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white p-6 rounded w-80 text-center">
      <h2 class="text-lg font-semibold text-yellow-800 mb-3">Akses Terbatas</h2>
      <p class="text-sm text-gray-700 mb-4">Silakan login atau daftar untuk melihat detail produk.</p>
      <div class="flex justify-center gap-3">
        <a href="/index" class="bg-yellow-700 text-white px-4 py-2 rounded">Login</a>
        <a href="/register" class="bg-yellow-600 text-white px-4 py-2 rounded">Daftar</a>
      </div>
      <button onclick="closePopup()" class="mt-4 text-sm text-gray-500 hover:text-gray-700">Tutup</button>
    </div>
  </div>

  <!-- Script untuk Popup -->
  <script>
    const showPopup = (e) => {
      e.preventDefault();
      document.getElementById("loginPopup").classList.remove("hidden");
      document.getElementById("loginPopup").classList.add("flex");
    };

    const closePopup = () => {
      document.getElementById("loginPopup").classList.add("hidden");
      document.getElementById("loginPopup").classList.remove("flex");
    };

    document.addEventListener("DOMContentLoaded", () => {
      document.querySelectorAll("a[href='/shope']").forEach(link => {
        link.addEventListener("click", showPopup);
      });
    });
  </script>

</body>
</html>
