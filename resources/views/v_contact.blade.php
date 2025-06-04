<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kontak Kami - Saung Kandang Sapi</title>
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
            background: #FAF9F6;
            background-size: 800% 800%;
            animation: backgroundMove 20s ease infinite;
        }
    </style>
</head>
<body class="relative min-h-screen text-[#2F2F2F]">

    <!-- Overlay putih transparan agar konten jelas -->
    <div class="absolute inset-0 bg-white bg-opacity-30 backdrop-blur-sm z-0"></div>

    <div class="max-w-screen-xl mx-auto px-6 py-6">

      <nav class="sticky top-0 z-50 flex justify-between items-center py-5 animate-fadeInUp delay-200 px-4 shadow-md border-b border-[#8B5E3C]/20" style="background-color: #F7E9C4;">
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


      <!-- Judul & Info Kontak -->
      <section class="animate-fadeInUp delay-400 text-center max-w-3xl mx-auto mt-10 relative z-10">
          <h1 class="text-5xl font-extrabold mb-6 text-[#2F2F2F]">Kontak Kami</h1>
          <p class="mb-2 font-semibold text-[#8B5E3C]">PT. AstraGrow Infotech</p>
          <div class="text-left space-y-2 text-[#2F2F2F] font-medium px-4 md:px-0">
              <p><strong>Subang:</strong> Jl. Kapten Hanafiah Subang, Rawabadak, Subang, Jawa Barat - Indonesia</p>
              <p><strong>Pemilik:</strong> Bapak H. Ade</p>
              <p><strong>Email:</strong> astragrowinfotech@gmail.com</p>
              <p><strong>Phone:</strong> 08 111 111 9059</p>
          </div>
      </section>

      <!-- Peta Google Maps -->
      <section class="mt-12 animate-fadeInUp delay-600 relative z-10 max-w-4xl mx-auto px-4">
          <div class="rounded-lg overflow-hidden shadow-lg border-4 border-[#8B5E3C]">
              <iframe 
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15839.264314840416!2d107.76784102337698!3d-6.572520731653135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e693fd46b58d9db%3A0xd9e86a58a47bce4c!2sSubang%2C%20Subang%20Regency%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1712404567890" 
                  width="100%" 
                  height="450" 
                  style="border:0;" 
                  allowfullscreen="" 
                  loading="lazy" 
                  referrerpolicy="no-referrer-when-downgrade">
              </iframe>
          </div>
      </section>

      <!-- Tombol kontak CS fixed kanan bawah -->
      <a href="https://wa.me/62934807190" target="_blank"
   class="fixed bottom-5 right-5 bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg transition duration-300 z-50">
   <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="white" viewBox="0 0 24 24">
     <path d="M20.52 3.48A11.93 11.93 0 0 0 12.01 0C5.38 0 .05 5.34.01 11.94a11.9 11.9 0 0 0 1.64 6.06L0 24l6.18-1.62a12 12 0 0 0 5.83 1.48h.01c6.63 0 11.96-5.34 11.99-11.94a11.91 11.91 0 0 0-3.49-8.44zM12 22.04h-.01a10.03 10.03 0 0 1-5.1-1.39l-.37-.22-3.67.96.98-3.57-.24-.37a9.96 9.96 0 0 1-1.56-5.38C2.05 6.48 6.49 2.04 12 2.04a9.97 9.97 0 0 1 7.07 2.93 9.92 9.92 0 0 1 2.92 7.06c-.02 5.5-4.5 10-10 10zm5.46-7.56c-.3-.15-1.76-.87-2.04-.97s-.47-.15-.67.15-.77.97-.95 1.17c-.18.2-.35.22-.65.07s-1.27-.47-2.42-1.49a9.09 9.09 0 0 1-1.66-2.06c-.17-.3-.02-.47.13-.62.14-.14.3-.35.45-.52.15-.18.2-.3.3-.5.1-.2.05-.37-.03-.52-.08-.15-.67-1.62-.92-2.22s-.49-.5-.67-.51c-.17-.01-.37-.01-.57-.01a1.1 1.1 0 0 0-.8.37c-.27.3-1.05 1.03-1.05 2.5s1.08 2.9 1.23 3.1c.15.2 2.13 3.24 5.17 4.54.72.31 1.29.5 1.73.63.72.23 1.37.2 1.88.12.57-.08 1.76-.72 2.01-1.42.25-.7.25-1.3.18-1.42-.07-.12-.26-.2-.56-.34z"/>
   </svg>
</a>

    </div> <!-- penutup container utama -->

</body>
</html>