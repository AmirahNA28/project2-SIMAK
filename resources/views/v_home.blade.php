<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SIMAK - Saung Kandang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes bubbleMove {
            0% {
                transform: translateY(0) translateX(0) scale(1);
                opacity: 0.5;
            }
            50% {
                opacity: 0.2;
            }
            100% {
                transform: translateY(-200px) translateX(20px) scale(1.1);
                opacity: 0;
            }
        }

        .bubble-container {
            position: absolute;
            top: 0; left: 50%;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: visible;
            transform: translateX(-50%);
            z-index: 0;
        }

        .bubble {
            position: absolute;
            bottom: 0;
            background-color: rgba(139, 94, 60, 0.15);
            border-radius: 50%;
            animation-name: bubbleMove;
            animation-timing-function: ease-in-out;
            animation-iteration-count: infinite;
            animation-duration: 8s;
        }

        .bubble:nth-child(1) { width: 40px; height: 40px; left: 10%; animation-delay: 0s; }
        .bubble:nth-child(2) { width: 25px; height: 25px; left: 30%; animation-delay: 2s; }
        .bubble:nth-child(3) { width: 50px; height: 50px; left: 50%; animation-delay: 4s; }
        .bubble:nth-child(4) { width: 30px; height: 30px; left: 70%; animation-delay: 1.5s; }
        .bubble:nth-child(5) { width: 20px; height: 20px; left: 85%; animation-delay: 3.5s; }

        section {
            border-bottom: 1px solid rgba(139, 94, 60, 0.1);
            position: relative;
            z-index: 10;
        }
    </style>
</head>
<body class="relative min-h-screen text-[#2F2F2F] bg-[#FAF9F6]">

<!-- Navbar -->
    <nav class="sticky top-0 z-50 flex justify-between items-center py-5 animate-fadeInUp delay-200 bg-white/80 rounded-md px-4 shadow-md border-b border-[#8B5E3C]/20">
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
    <a href="/Register" class="bg-white/80 text-[#4B7F52] border border-[#4B7F52] px-4 py-2 rounded-full text-sm hover:bg-[#DFF1E1] transition duration-300">Daftar</a>
  </div>
</nav>



<!-- Hero Section -->
<section class="text-center py-20 w-full min-h-screen relative" style="background-image: url('./dokumen_sapi/bghome.jpeg'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-black bg-opacity-40 -z-10"></div>
    <div class="bubble-container" aria-hidden="true">
        <div class="bubble"></div><div class="bubble"></div><div class="bubble"></div><div class="bubble"></div><div class="bubble"></div>
    </div>
    <h1 class="text-5xl font-extrabold mb-3 text-white">Selamat Datang</h1>
    <h2 class="text-3xl font-bold mb-6 text-white">di Saung Kandang</h2>
    <p class="mb-4 text-lg text-[#F7E9C4]">Peternakan terpercaya dengan berbagai pilihan sapi dan domba/kambing unggulan.</p>
    <p class="mb-4 text-lg text-[#F7E9C4]">Kami menyediakan hewan yang sehat, terawat, dan siap kirim untuk Anda.</p>
    <h3 class="text-2xl font-semibold text-white">Miliki livestocknya sekarang!</h3>
    <p class="text-lg text-[#F7E9C4]">Bantu peternak lokal, bangun ketahanan pangan bersama kami.</p>
    <p class="font-bold text-lg mt-6 text-white">AstraGrowInfotech.id</p>
</section>

<!-- Kategori Produk -->
<!-- Kategori Produk -->
<section class="py-16">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-10">
            <p class="text-sm text-[#8B5E3C] font-semibold uppercase tracking-wide">Kategori</p>
            <h2 class="text-4xl font-bold text-[#2F2F2F]">
                Ternak <span class="text-[#4B7F52]">Berkualitas</span>
            </h2>
            <a href="/products" class="inline-block mt-5 bg-[#4B7F52] text-white px-6 py-3 rounded-full text-sm hover:bg-[#3A6542] transition">
                Shop Products →
            </a>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Qurban -->
            <div class="bg-[#F7E9C4] rounded-xl p-6 text-[#2F2F2F] shadow-md hover:shadow-lg transition duration-300 text-center">
                <img src="../images/sapi2.png" class="w-60 h-40 object-contain rounded-lg mb-4 mx-auto" />
                <h3 class="text-xl font-semibold mb-3">QURBAN</h3>
                <p class="text-base mb-4">Sapi pilihan unggulan, sehat, dan terawat untuk ibadah Qurban.</p>
                <div class="text-center">
                    <a href="/products" class="bg-[#8B5E3C] text-white px-5 py-2 rounded-full text-sm hover:bg-[#704429] transition">
                        Selengkapnya
                    </a>
                </div>
            </div>

            <!-- Aqiqah -->
            <div class="bg-[#F7E9C4] rounded-xl p-6 text-[#2F2F2F] shadow-md hover:shadow-lg transition duration-300 text-center">
                <img src="../images/domba_kambing2.png" class="w-60 h-40 object-contain rounded-lg mb-4 mx-auto" />
                <h3 class="text-xl font-semibold mb-3">AQIQAH</h3>
                <p class="text-base mb-4">Kambing dan domba terbaik, siap untuk kebutuhan Aqiqah Anda.</p>
                <div class="text-center">
                    <a href="/products" class="bg-[#8B5E3C] text-white px-5 py-2 rounded-full text-sm hover:bg-[#704429] transition">
                        Selengkapnya
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Carousel Produk -->
<section class="py-20 bg-[#FAF9F6]">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h2 class="text-4xl font-extrabold text-[#2F2F2F] mb-2">Ternak Berkualitas</h2>
        <h3 class="text-3xl font-bold text-[#4B7F52] mb-6">untuk Kebutuhan Anda</h3>
        <p class="text-lg text-[#8B5E3C] mb-10">Kami menyediakan sapi dan kambing unggulan.</p>
        <div class="relative">
           

            <div id="carousel" class="flex overflow-x-auto gap-6 snap-x snap-mandatory scrollbar-hide px-10">
                <!-- Produk carousel -->
                <div class="min-w-[300px] max-w-xs bg-[#F7E9C4] rounded-xl p-6 shadow-md hover:shadow-lg snap-start">
                    <img src="../images/sapi2.png" class="w-full h-48 object-contain rounded-lg mb-4" />
                    <h4 class="text-xl font-semibold text-[#2F2F2F] mb-2">Sapi Qurban</h4>
                    <p class="text-[#8B5E3C] text-sm mb-4">Wujudkan qurban yang bermakna dengan sapi jantan unggul, gemuk, dan terjaga kesehatannya.</p>
                    <a href="/products" class="bg-[#4B7F52] text-white px-5 py-2 rounded-full text-sm hover:bg-[#3A6542] transition">Selengkapnya</a>
                </div>

                <div class="min-w-[300px] max-w-xs bg-[#F7E9C4] rounded-xl p-6 shadow-md hover:shadow-lg snap-start">
                    <img src="../images/domba_kambing2.png" class="w-full h-48 object-contain rounded-lg mb-4" />
                    <h4 class="text-xl font-semibold text-[#2F2F2F] mb-2">Kambing Aqiqah</h4>
                    <p class="text-[#8B5E3C] text-sm mb-4">Lengkapi sunnah aqiqah dengan kambing pilihan, bersih, dan siap untuk disalurkan dengan amanah.

</p>
        <a href="/products" class="bg-[#4B7F52] text-white px-5 py-2 rounded-full text-sm hover:bg-[#3A6542] transition">Selengkapnya</a>
            </div>
        <!-- Kartu sapi lain -->
        <div class="min-w-[300px] max-w-xs bg-[#F7E9C4] rounded-xl p-6 shadow-md hover:shadow-lg transition snap-start">
            <img src="../images/sapi2.png" alt="Sapi Siap Potong" class="w-full h-48 object-contain rounded-lg mb-4" />
            <h4 class="text-xl font-semibold text-[#2F2F2F] mb-2">Sapi Siap Potong</h4>
            <p class="text-[#8B5E3C] text-sm mb-4">
                Sapi yang siap dipotong untuk kebutuhan daging segar.
            </p>
            <a href="/products" class="inline-block bg-[#4B7F52] text-[#FAF9F6] px-5 py-2 rounded-full text-sm hover:bg-[#2F2F2F] transition">
                Selengkapnya
            </a>
        </div>

<!-- Kartu kambing lain -->
<div class="min-w-[300px] max-w-xs bg-[#F7E9C4] rounded-xl p-6 shadow-md hover:shadow-lg transition snap-start">
    <img src="../images/domba_kambing2.png" alt="Domba Berkualitas" class="w-full h-48 object-contain rounded-lg mb-4" />
    <h4 class="text-xl font-semibold text-[#2F2F2F] mb-2">Domba Berkualitas</h4>
    <p class="text-[#8B5E3C] text-sm mb-4 text-justify">
        Domba sehat dan terawat dengan kualitas unggul.
    </p>
    <a href="/products" class="inline-block bg-[#4B7F52] text-[#FAF9F6] px-5 py-2 rounded-full text-sm hover:bg-[#2F2F2F] transition">
        Selengkapnya
    </a>
        </div>
    </div>
</section>

<!-- Tombol WhatsApp Mengambang -->
<a href="https://wa.me/62934807190" target="_blank"
   class="fixed bottom-5 right-5 bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg transition duration-300 z-50">
   <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="white" viewBox="0 0 24 24">
     <path d="M20.52 3.48A11.93 11.93 0 0 0 12.01 0C5.38 0 .05 5.34.01 11.94a11.9 11.9 0 0 0 1.64 6.06L0 24l6.18-1.62a12 12 0 0 0 5.83 1.48h.01c6.63 0 11.96-5.34 11.99-11.94a11.91 11.91 0 0 0-3.49-8.44zM12 22.04h-.01a10.03 10.03 0 0 1-5.1-1.39l-.37-.22-3.67.96.98-3.57-.24-.37a9.96 9.96 0 0 1-1.56-5.38C2.05 6.48 6.49 2.04 12 2.04a9.97 9.97 0 0 1 7.07 2.93 9.92 9.92 0 0 1 2.92 7.06c-.02 5.5-4.5 10-10 10zm5.46-7.56c-.3-.15-1.76-.87-2.04-.97s-.47-.15-.67.15-.77.97-.95 1.17c-.18.2-.35.22-.65.07s-1.27-.47-2.42-1.49a9.09 9.09 0 0 1-1.66-2.06c-.17-.3-.02-.47.13-.62.14-.14.3-.35.45-.52.15-.18.2-.3.3-.5.1-.2.05-.37-.03-.52-.08-.15-.67-1.62-.92-2.22s-.49-.5-.67-.51c-.17-.01-.37-.01-.57-.01a1.1 1.1 0 0 0-.8.37c-.27.3-1.05 1.03-1.05 2.5s1.08 2.9 1.23 3.1c.15.2 2.13 3.24 5.17 4.54.72.31 1.29.5 1.73.63.72.23 1.37.2 1.88.12.57-.08 1.76-.72 2.01-1.42.25-.7.25-1.3.18-1.42-.07-.12-.26-.2-.56-.34z"/>
   </svg>
</a>

<!-- JavaScript Carousel -->
<script>
    function slideCarousel(direction) {
        const carousel = document.getElementById('carousel');
        const cardWidth = carousel.querySelector('div').offsetWidth + 24; // 24 = margin gap-6
        carousel.scrollBy({ left: direction * cardWidth, behavior: 'smooth' });
    }
</script>

</body>
</html>