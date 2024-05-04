<?php

use App\Http\Controllers\KaryawanLoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PembelianBahanBakuController;
use App\Http\Controllers\HistoryPesananController;
use App\Http\Controllers\HampersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->name('home');

//produk
Route::resource('/produk', ProdukController::class);
Route::post('/produk/search', [App\Http\Controllers\ProdukController::class, 'search'])->name('produk.search');

//hampers
Route::resource('/hampers', HampersController::class);
Route::post('/hampers/search', [App\Http\Controllers\HampersController::class, 'search'])->name('hampers.search');

//pembelian bahan baku
Route::resource('pembelianBahanBaku', PembelianBahanBakuController::class);
Route::post('/pembelianBahanBaku/search', [App\Http\Controllers\PembelianBahanBakuController::class, 'search'])->name('pembelianBahanBaku.search');

//resep
Route::get('/resep', [App\Http\Controllers\ResepController::class, 'index'])->name('resep.index');
Route::get('/resep/create', [App\Http\Controllers\ResepController::class, 'create'])->name('resep.create');
Route::get('/resep/{id}/{id_bahan}/edit', [App\Http\Controllers\ResepController::class, 'edit'])->name('resep.edit');
Route::post('/resep/search', [App\Http\Controllers\ResepController::class, 'search'])->name('resep.search');
Route::post('/resep/store', [App\Http\Controllers\ResepController::class, 'store'])->name('resep.store');
Route::put('/resep/{id}/{id_bahan}/{id_produk}/update', [App\Http\Controllers\ResepController::class, 'update'])->name('resep.update');
Route::post('/resep/{id}/{id_bahan}/destroy', [App\Http\Controllers\ResepController::class, 'destroy'])->name('resep.destroy');

//karyawan
Route::resource('karyawan', KaryawanController::class);
Route::post('/karyawan/search', [App\Http\Controllers\KaryawanController::class, 'search'])->name('karyawan.search');

//customer
Route::resource('customers', CustomerController::class);
Route::post('customers/search', [App\Http\Controllers\CustomerController::class, 'search'])->name('customer.search');

//history pesanan customer
Route::get('/transaksi', [App\Http\Controllers\TransaksiController::class, 'index'])->name('transaksi.index');

Route::get('/register', [App\Http\Controllers\RegisterController::class, 'create'])->name('register');
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [App\Http\Controllers\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login-check', [App\Http\Controllers\LoginController::class, 'login'])->name('login.check');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
