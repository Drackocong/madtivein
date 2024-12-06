<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\versionController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\Url;

// Rute untuk halaman login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Rute untuk halaman register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Rute untuk halaman produk - hanya bisa diakses setelah login
Route::get('/produk', [ProductController::class, 'index'])->middleware('auth')->name('produk.index');

// Rute untuk menambah produk - hanya bisa diakses setelah login
Route::get('/produk/create', [ProductController::class, 'create'])->middleware('auth')->name('produk.create');
Route::post('/produk/store', [ProductController::class, 'store'])->middleware('auth')->name('produk.store');

// // Rute untuk edit produk - hanya bisa diakses setelah login
// Route::get('/produk/{id}/edit', [ProductController::class, 'edit'])->middleware('auth')->name('produk.edit');
// Route::put('/produk/{id}', [ProductController::class, 'update'])->middleware('auth')->name('produk.update');

// Route::get('/produk/{idketerangan}/edit', [ProductController::class, 'editketerangan'])->middleware('auth')->name('produk.editketerangan');
// Route::put('/produk/{idketerangan}', [ProductController::class, 'updateketerangan'])->middleware('auth')->name('produk.updateketerangan');

// Rute untuk hapus produk - hanya bisa diakses setelah login
Route::get('/produk/{id}/edit', [ProductController::class, 'edit'])->middleware('auth')->name('produk.edit');
Route::put('/produk/{id}', [ProductController::class, 'updateproduk'])->middleware('auth')->name('produk.updateproduk');



Route::get('/produk/{id}/editketerangans', [ProductController::class, 'editketerangans'])->middleware('auth')->name('produk.editketerangan');
Route::put('/produk/{title}', [ProductController::class, 'updateketerangan'])->middleware('auth')->name('produk.updateketerangan');


Route::get('/produk/{id}/editversionn', [ProductController::class, 'editversionn'])->middleware('auth')->name('produk.editversionn');
Route::put('/produk/{id}', [ProductController::class, 'updateversionn'])->middleware('auth')->name('produk.updateversionn');



Route::delete('/produk/{id}/destroy', [ProductController::class, 'destroy'])->name('produk.destroy');


Route::delete('/hapusketerangan', [ProductController::class, 'hapusketerangan'])->name('produk.hapusketerangan');


Route::delete('/produk/{id}', [ProductController::class, 'hapusversionn'])->name('produk.hapusversionn');

Route::get('/produk/tambah_version', [ProductController::class, 'tambahversion'])->middleware('auth')->name('produk.tambah_version');

Route::post('/produk/tambah_version', [ProductController::class, 'simpanversion'])->middleware('auth')->name('produk.simpan_version');
// Rute logout - hanya bisa diakses setelah login
// Rute logout - hanya bisa diakses setelah login


Route::get('/produk/tambah_versionn', [ProductController::class, 'tambahversionn'])->middleware('auth')->name('produk.tambah_versionn');

Route::post('/produk/tambah_versionn', [ProductController::class, 'simpanversionn'])->middleware('auth')->name('produk.simpan_versionn');

route::get('/logout',[AuthController::class,'auth'])->middleware('auth')->name ('logout');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logoutt');

// Rute detail produk - hanya bisa diakses setelah login
Route::get('/produk/{id}/{product}', [ProductController::class, 'show'])->middleware('auth')->name('produk.show');


// Route::get('/produk/{id}/{product}', [ProductController::class, 'version1'])->middleware('auth')->name('produk.show');

// Rute tambahan produk di halaman detail produk - hanya bisa diakses setelah login
Route::get('/produk/tambah-keterangan', [ProductController::class, 'tambahKeterangan'])->middleware('auth')->name('produk.tambah_keterangan');
Route::post('/produk/tambah-keterangan', [ProductController::class, 'simpanKeterangan'])->middleware('auth')->name('produk.simpan_keterangan');



// Route::delete('/produk/{id}/medissy', [ProductController::class, 'destroy'])->middleware('auth')->name('produk.destroy');
// route halaman pengujung
Route::get('/produk-list', [ProductController::class, 'produkList'])->name('produk.produk_list');

// route yang mengarah ke halaman produk_detail.blade.php
Route::get('/produk/{id}', [ProductController::class, 'detail'])->name('produk.detail');

// route halaman pengujung
Route::get('/produk/details', [ProductController::class, 'details'])->name('produk.details');
// route yang mengarah ke halaman produk_detail.blade.php
Route::get('/produk/{id}/detail', [ProductController::class, 'produkdetail'])->name('produk.detailm');
// Route::get('/produk/{id}/{name}/{version}', [ProductController::class, 'produkdetail'])->name('produk.produk_detail');
// // route yang mengarah ke halaman produk_detail.blade.php
// // Route::get('/version', [ProductController::class, 'version1'])->name('produk.detail');
// Route::get('/produk/{id}/produk_detaill', [ProductController::class, 'produk_detaill'])->name('produk.produk_detaill');
// Route::get('/product/produk_detaill', [ProductController::class, 'produkdetaill'])->name('produk.produk_detaill');

// Route::post('/produk/{produk_id}/version', [ProductController::class, 'tambahversionn']);
// Route::get('/produk/{id}', [ProductController::class, 'showProdukWithVersions']);

