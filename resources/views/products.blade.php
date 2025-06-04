<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kategori Produk Hewan - Saung Kandang Sapi</title>
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

        .delay-200 { animation-delay: 0.2s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-600 { animation-delay: 0.6s; }
        .delay-800 { animation-delay: 0.8s; }

        /* Background animation */
        @keyframes backgroundMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        body {
            background: #FAF9F6; /* warna latar mirip kode kedua */
            background-size: 800% 800%;
            animation: backgroundMove 20s ease infinite;
        }
    </style>
</head>
<body class="relative min-h-screen text-[#2F2F2F]">

  <div class="max-w-screen-xl mx-auto px-6 py-10 mt-10 shadow-xl rounded-xl bg-[#F7E9C4]">

    <!-- Navbar -->
    <nav class="sticky top-0 z-50 flex justify-between items-center py-5 animate-fadeInUp delay-200 bg-white rounded-md px-4 shadow-md border-b border-[#8B5E3C]/20">
      <div class="flex items-center space-x-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" class="text-[#4B7F52]" viewBox="0 0 24 24" fill="currentColor">
          <path d="M11 2.5L20 7v2H2V7zm4 7.5h4v8h-4zM2 22v-3h18v3zm7-12h4v8H9zm-6 0h4v8H3zm0 10v1h16v-1zm1-9v6h2v-6zm6 0v6h2v-6zm6 0v6h2v-6zM3 8h16v-.4l-8-4.02L3 7.6z"/>
        </svg>
        <span class="text-3xl font-bold font-[Lobster] text-[#4B7F52]">Saung Kandang</span>
      </div>
      <ul class="hidden md:flex space-x-8 text-[#8B5E3C] font-semibold tracking-wide">
        <li><a href="/home" class="hover:text-[#4B7F52] transition duration-300">Home</a></li>
        <li><a href="/products" class="hover:text-[#4B7F52] transition duration-300">Produk</a></li>
        <li><a href="/contact" class="hover:text-[#4B7F52] transition duration-300">Kontak</a></li>
      </ul>
      <div class="flex space-x-3">
        <a href="/index" class="bg-[#4B7F52] text-white px-4 py-2 rounded-full text-sm shadow hover:bg-[#3A6542] transition duration-300">Masuk</a>
        <a href="/Register" class="bg-white text-[#4B7F52] border border-[#4B7F52] px-4 py-2 rounded-full text-sm hover:bg-[#DFF1E1] transition duration-300">Daftar</a>
      </div>
    </nav>

    <!-- Judul Halaman -->
    <section class="text-center py-10 animate-fadeInUp delay-400">
      <h1 class="text-4xl font-extrabold mb-3 text-[#2F2F2F]">Kategori Produk Hewan</h1>
      <p class="text-lg mb-6 max-w-xl mx-auto text-[#8B5E3C]">Pilih kategori ternak berkualitas yang kami sediakan untuk kebutuhan peternakan dan bisnis Anda.</p>
    </section>

    <!-- Kategori Produk -->
    <section class="py-10 animate-fadeInUp delay-600">
      <div class="grid md:grid-cols-2 gap-10 max-w-4xl mx-auto">
  <!-- Kategori Sapi -->
  <a href="/kategorisapi" class="bg-white rounded-xl flex flex-col items-center p-6 text-[#2F2F2F] shadow-md hover:shadow-lg transition duration-300">
    <img src="../images/sapi2.png" alt="Sapi" class="w-60 h-40 object-contain rounded-lg mb-4" />
    <h3 class="text-2xl font-semibold mb-2 text-[#4B7F52]">Sapi</h3>
    <p class="text-center text-base mb-4 px-2 text-[#8B5E3C]">Hewan sapi unggulan, sehat, dan siap untuk kebutuhan peternakan Anda.</p>
    <span class="inline-block bg-[#8B5E3C] text-white px-5 py-2 rounded-full text-sm hover:bg-[#704429] transition cursor-pointer">Selengkapnya</span>
  </a>

  <!-- Kategori Domba/Kambing -->
  <a href="/kategoridomba" class="bg-white rounded-xl flex flex-col items-center p-6 text-[#2F2F2F] shadow-md hover:shadow-lg transition duration-300">
    <img src="../images/domba_kambing2.png" alt="Domba / Kambing" class="w-60 h-40 object-contain rounded-lg mb-4" />
    <h3 class="text-2xl font-semibold mb-2 text-[#4B7F52]">Domba / Kambing</h3>
    <p class="text-center text-base mb-4 px-2 text-[#8B5E3C]">Berbagai jenis domba dan kambing sehat yang sesuai syariat dan berkualitas.</p>
    <span class="inline-block bg-[#8B5E3C] text-white px-5 py-2 rounded-full text-sm hover:bg-[#704429] transition cursor-pointer">Selengkapnya</span>
  </a>
</div>

    </section>

  </div> <!-- penutup container utama -->

</body>

</html>