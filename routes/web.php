<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_Home;
use App\Http\Controllers\C_User;
use App\Http\Controllers\C_Register;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PemilikPesananController;
use App\Http\Controllers\C_Sapi;
use App\Http\Controllers\C_KesehatanSapi;
use App\Http\Controllers\c_pakan;
use App\Http\Controllers\c_kandang;
use App\Http\Controllers\DetailProdukSapiController;
use App\Http\Controllers\c_kategorisapi;
use App\Http\Controllers\c_kategoridomba;
use App\Http\Controllers\C_Login;
use App\Http\Controllers\c_loginpelanggan;
use App\Http\Controllers\C_Pemilik;
use App\Http\Controllers\c_daftarakun;
use App\Http\Controllers\c_profile;
use App\Http\Controllers\LaporanKeuanganController;
use App\Http\Controllers\C_KategoriProduk;
use App\Http\Controllers\C_Produk;
use App\Http\Controllers\C_BestSeller;
use App\Http\Controllers\C_Keranjang;
use App\Http\Controllers\C_JadwalKesehatan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/', function () {
    return view('index');
    });
Route::get('/Register', function () {
    return view('v_register');
    });
Route::get('/contact', function () {
    return view('v_contact');
    });
Route::get('/about', function () {
   return 'Halaman About';
    });
Route::get('/kali', function () {
    return 9*9;
    });

Route::get('/order', [OrderController::class, 'showForm'])->name('order.form');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');


/*
Route :: view('/contact','v_contact');
Route :: view('/contact','v_contact',[
'name' => 'Amirah',
'email' => 'Amirahnurafifah@gmail.com']);
Route::get('/contact', function () {
 return view('v_contact',['name' => 'Amirah','email' => 'amirahnurafifah@gmail.com']);
 });*/


 Route :: view('/admin', 'admin/v_admin');
 Route :: view('/admin', 'admin.v_admin');
 Route::get('index', function(){
    return view('v_index');
 });

 Route::view('/about', 'v_about');
 Route::view('/contact', 'v_contact');
 Route::view('/login', 'v_login');
 Route::view('/databarang', 'v_databarang');
 Route::view('/index', 'v_index');
 Route::view('/admin', 'layout.v_template')->name('admin');
 Route::view('/home', 'v_home');



Route::get('/', [app\http\controllers\HomeController::class, 'index'])->name('home');
Route::get('/index', [c_login::class, 'showLoginForm'])->name('index');
Route::post('/index', [c_login::class, 'index']);
Route::post('/logout', [c_login::class, 'logout'])->name('logout');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/index');
})->name('logout');
Route::get('/register', [C_Register::class, 'showRegister'])->name('register'); // untuk form
Route::post('/register', [C_Register::class, 'register'])->name('register.submit'); // untuk proses
Route::get('/home', [C_Home::class, 'index']);
route::get('/', [c_Login::class,'index']);
route::get('/home', [c_home::class,'index']);

// Halaman Login
Route::get('/loginpelanggan', [c_loginpelanggan::class, 'showLoginForm'])->name('loginpelanggan');
Route::post('loginpelanggan', [c_loginpelanggan::class, 'loginpelanggan']);
// Halaman Logout
Route::post('logout', [c_loginpelanggan::class, 'logout'])->name('logout');

Route::get('/admin', function () {
    return view('v_admin');
})->middleware(['auth', 'role:karyawan']);

Route::get('/profileadmin', [c_profile::class, 'index'])->name('profile');


Route::get('/dashboard_pemilik', function () {
    return view('v_dashboard_pemilik');
})->middleware(['auth', 'role:pemilik']);

Route::get('/shope', function () {
    return view('v_shope');
})->middleware(['auth', 'role:pelanggan']);


Route::middleware(['auth', 'role:pemilik'])->group(function () {
    Route::get('/dashboard_pemilik', [C_Pemilik::class, 'dashboard'])->name('dashboard');
    Route::get('/pemilik_data', [C_Pemilik::class, 'lihatData'])->name('data');
    Route::get('/dashboard_pemilik/pemilik_pesanan', [C_Pemilik::class, 'daftarPesanan'])->name('pemilik.daftarPesanan');
    
});
Route::get('/daftarakun', [App\Http\Controllers\c_daftarakun::class, 'index'])->middleware('auth');
Route::resource('laporankeuangan', LaporanKeuanganController::class);
Route::get('/laporankeuangan', [LaporanKeuanganController::class, 'index'])->name('laporankeuangan.index');
Route::get('/laporankeuangan/create', [LaporanKeuanganController::class, 'create'])->name('laporankeuangan.create');
Route::post('/laporankeuangan', [LaporanKeuanganController::class, 'store'])->name('laporankeuangan.store');
Route::get('/laporankeuangan/{id}/edit', [LaporanKeuanganController::class, 'edit'])->name('laporankeuangan.edit');
Route::put('/laporankeuangan/{id}', [LaporanKeuanganController::class, 'update'])->name('laporankeuangan.update');
Route::delete('/laporankeuangan/{id}', [LaporanKeuanganController::class, 'destroy'])->name('laporankeuangan.destroy');

/*
route::get('/about', [c_home::class,'about']);
route::get('/about2/{$id}', [c_home::class,'about2']); */


 route::get('/sapi', [c_sapi::class,'index'])-> name('sapi');
 route::get('/sapi/detail/{id_sapi}', [c_sapi::class,'detail']);
 Route::get('/sapi/add', [C_Sapi::class, 'add']);
 Route::post('/sapi/insert', [C_sapi::class, 'insert']);
 Route::put('/sapi/edit/{id_sapi}', [C_Sapi::class, 'edit']);
 Route::post('/sapi/update/{id_sapi}', [C_Sapi::class, 'update']);
 Route::get('/sapi/delete/{id_sapi}', [C_Sapi::class, 'delete']);


 Route::get('/products', [ProductController::class, 'index'])-> name('products');
Route::get('/produk', [C_Produk::class, 'index'])->name('produk');
 Route::get('/shope', [C_Produk::class, 'showProduk']);
 Route::get('/kategorisapi', [c_kategorisapi::class, 'index'])-> name('kategori');
 Route::get('/kategoridomba', [c_kategoridomba::class, 'index'])-> name('kategori');
 Route::get('/kategori-produk', [C_KategoriProduk::class, 'index']);
 Route::post('/order', function (\Illuminate\Http\Request $request) {
    return view('order', [
        'kategori_sapi' => $request->kategori_sapi,
        'kategori_domba_kambing' => $request->kategori_domba_kambing,
    ]);
});
Route::get('/dashboard_pemilik/pesanan_pemilik', [PemilikPesananController::class, 'index'])->name('pemilik.pesanan.index');
Route::post('/dashboard_pemilik/pesanan_pemilik/{id}/update-status', [PemilikPesananController::class, 'updateStatus'])->name('pemilik.pesanan.updateStatus');



Route::post('/midtrans/webhook', [PesananController::class, 'handleWebhook'])->name('midtrans.webhook');



Route::post('/order', [OrderController::class, 'addToCart']);
Route::get('/order', [OrderController::class, 'showForm'])->name('order.form');
Route::post('/order/proses', [OrderController::class, 'prosesPesanan'])->name('order.submit');
Route::get('/dashboard-pelanggan', [OrderController::class, 'dashboardPelanggan'])->name('dashboard.pelanggan');

Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');

Route::post('/submit-order', [OrderController::class, 'store']);

Route::get('/detailproduksapi', [DetailProductController::class, 'index'])-> name('detailproduksapi');



 Route::get('/menu_pesanan_sapi', [DetailProdukSapiController::class, 'index']);
 Route::get('/menu_pesanan_sapi/detail/{id}', [DetailProdukSapiController::class, 'detail'])->name('menu_pesanan_sapi.detail');
 Route::get('/menu_pesanan_sapi/create', [DetailProdukSapiController::class, 'create'])->name('menu_pesanan_sapi.create');
 Route::post('/menu_pesanan_sapi/store', [DetailProdukSapiController::class, 'store'])->name('menu_pesanan_sapi.store');
 Route::get('/menu_pesanan_sapi/edit/{id}', [DetailProdukSapiController::class, 'edit'])->name('menu_pesanan_sapi.edit');
 Route::put('/menu_pesanan_sapi/update/{id}', [DetailProdukSapiController::class, 'update'])->name('menu_pesanan_sapi.update');
 Route::delete('/menu_pesanan_sapi/delete/{id}', [DetailProdukSapiController::class, 'delete'])->name('menu_pesanan_sapi.delete');


 Route::resource('kesehatan_sapi', c_kesehatansapi::class);
 route::get('/kesehatan_sapi', [c_kesehatansapi::class,'index'])-> name('kesehatan_sapi');
 route::get('/kesehatan_sapi/detail/{id_kesehatan}', [c_sapi::class,'detail']);

Route::get('/sapi', [C_Sapi::class, 'index'])->name('sapi.index');
Route::get('/sapi', [C_Sapi::class, 'data_sapi'])->name('data_sapi');
Route::get('/sapi/detail/{id_sapi}', [C_Sapi::class, 'detail']);
Route::get('/sapi/add', [C_Sapi::class, 'add']);
Route::post('/sapi/insert', [C_Sapi::class, 'insert']);
Route::get('/sapi/edit/{id_sapi}', [C_Sapi::class, 'edit']);
Route::put('/sapi/update/{id_sapi}', [C_Sapi::class, 'update'])->name('sapi.update');
Route::get('/sapi/delete/{id_sapi}', [C_Sapi::class, 'delete']);


 Route::get('/kesehatan', [C_KesehatanSapi::class, 'index'])->name('kesehatan.index');
Route::get('/kesehatan/detail/{id_kesehatan}', [C_KesehatanSapi::class, 'show'])->name('kesehatan.detail');
 Route::get('/kesehatan/create', [C_KesehatanSapi::class, 'create'])->name('kesehatan.create');
 Route::post('/kesehatan/store', [C_KesehatanSapi::class, 'store'])->name('kesehatan.store');
 Route::get('/kesehatan/edit/{id_kesehatan}', [C_KesehatanSapi::class, 'edit'])->name('kesehatan.edit');
 Route::put('/kesehatan/update/{id_kesehatan}', [C_KesehatanSapi::class, 'update'])->name('kesehatan.update');
 Route::delete('/kesehatan/delete/{id_kesehatan}', [C_KesehatanSapi::class, 'delete'])->name('kesehatan.delete');

Route::get('/pakan', [c_pakan::class, 'index'])->name('pakan.index');
Route::get('/pakan/create', [c_pakan::class, 'create'])->name('pakan.create');
Route::post('/pakan', [c_pakan::class, 'store'])->name('pakan.store');
Route::get('/pakan/{id_pakan}/edit', [c_pakan::class, 'edit'])->name('pakan.edit'); // ✅ letakkan sebelum {id}
Route::put('/pakan/{id_pakan}', [c_pakan::class, 'update'])->name('pakan.update');
Route::get('/pakan/{id_pakan}/detail', [c_pakan::class, 'detail'])->name('pakan.detail');
Route::delete('/pakan/{id_pakan}', [c_pakan::class, 'delete'])->name('pakan.delete'); // ✅ ubah ke DELETE


Route::prefix('kandang')->name('kandang.')->group(function () {
    // Menampilkan daftar kandang
    Route::get('/', [c_kandang::class, 'index'])->name('index');

    // Menampilkan form tambah kandang
    Route::get('/create', [c_kandang::class, 'create'])->name('create');

    // Menyimpan data kandang baru
    Route::post('/store', [c_kandang::class, 'store'])->name('store');

    // Menampilkan form edit kandang
    Route::get('/{id}/edit', [c_kandang::class, 'edit'])->name('edit');

    // Memperbarui data kandang
    Route::put('/{id}', [c_kandang::class, 'update'])->name('update');

    // Menghapus data kandang
    Route::delete('/{id}', [c_kandang::class, 'delete'])->name('delete');

    // Menampilkan detail kandang
    Route::get('/{id}/detail', [c_kandang::class, 'detail'])->name('detail');
});

Route::resource('jadwal_kesehatan', C_JadwalKesehatan::class);
Route::get('/jadwal_kesehatan', [C_JadwalKesehatan::class, 'index'])->name('jadwal_kesehatan.index');
Route::get('/jadwal_kesehatan/create', [C_JadwalKesehatan::class, 'create'])->name('jadwal_kesehatan.create');
Route::post('/jadwal_kesehatan/store', [C_JadwalKesehatan::class, 'store'])->name('jadwal_kesehatan.store');

Route::get('/login', [C_Login::class, 'index']);
 Route::get('/login', [C_Login::class, 'showLoginForm'])->name('login');
 Route::post('/login', [C_Login::class, 'login']);
 Route::get('/dashboard', [C_Login::class, 'dashboard'])->middleware('auth')->name('dashboard');
 Route::post('/logout', [C_Login::class, 'logout'])->name('logout');

 Route::get('/produk-best-seller', [C_BestSeller::class, 'index']);
 Route::post('/tambah-ke-keranjang', [C_Keranjang::class, 'tambah']);
Route::get('/keranjang', [C_Keranjang::class, 'lihat']);
Route::post('/keranjang/hapus/{id}', [C_Keranjang::class, 'hapus']);
/*
 Route::get('/home/about/', [C_Home::class, 'about']);
 Route::get('/user', [C_user::class, 'index']);
 Route::get('/Login', [C_Login::class, 'index']);
 Route::get('/mahasiswa', [C_Mahasiswa::class, 'index']);
 Route::get('/dosen', [C_dosen::class, 'index']);




 Route::get('/mahasiswa/', function ($nama_mahasiswa='Amirah') {
    return view('mahasiswa',['nama_mahasiswa'=>$nama_mahasiswa]);
     });
Route::view('/about','about',[
    'nama' => 'Amirah',
    'alamat' => 'Rawabadak, Subang'
    ]);

 Route::view('/dosen', 'v_dosen');
 Route::view('/mahasiswa', 'v_mahasiswa'); */

