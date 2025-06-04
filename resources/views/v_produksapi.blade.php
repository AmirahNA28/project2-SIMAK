<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Produk Hewan  - SIMAK</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-black">
    <!-- Navbar -->
    <nav class="flex justify-between items-center p-5 bg-white shadow-md">
        <div class="text-2xl font-bold flex items-center">
            <img src="../dokumen_sapi/logosapi.jpg" alt="Saung Kandang Sapi" class="h-10 mr-2">
            <span class="text-blue-500">Saung Kandang Sapi</span>
        </div>
        <ul class="flex space-x-6 text-lg">
            <li><a href="/home" class="hover:text-blue-500">HOME</a></li>
            <li><a href="/contact" class="hover:text-blue-500">KONTAK</a></li>
        </ul>
        <div class="flex items-center space-x-2">
            <span>Halo, Sign in</span>
            <a href="/index" class="font-semibold">My Account</a>
        </div>
    </nav>

    <!-- Konten Produk -->
    <section class="text-center py-10">
        <div class="flex justify-center mt-6 space-x-6">
        <div class="bg-white shadow-lg rounded-lg p-4">
            <div class="col-md-4 product-card">
                <img src="images/sapi.jpg" alt="Kandang 1" class="product-image">
                <a href="/detailproduksapi">
                <h3>Kandang 1</h3>
                </a>
            </div>
        </div>
        <div class="bg-white shadow-lg rounded-lg p-4">
            <div class="col-md-4 product-card">
                <img src="images/domba_kambing.jpg" alt="Domba / Kambing" class="product-image">
                <a href="/detailprodukdombing">
                <h3>Domba / Kambing</h3>
                </a>
            </div>
        </div>
        </div>
    </section>
</body>
</html>
