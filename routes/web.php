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

// Rute untuk edit produk - hanya bisa diakses setelah login
Route::get('/produk/{id}/edit', [ProductController::class, 'edit'])->middleware('auth')->name('produk.edit');
Route::put('/produk/{id}', [ProductController::class, 'update'])->middleware('auth')->name('produk.update');

// Route::get('/produk/{idketerangan}/edit', [ProductController::class, 'editketerangan'])->middleware('auth')->name('produk.editketerangan');
// Route::put('/produk/{idketerangan}', [ProductController::class, 'updateketerangan'])->middleware('auth')->name('produk.updateketerangan');

// Rute untuk hapus produk - hanya bisa diakses setelah login
Route::get('/produk/{id}/edit', [ProductController::class, 'editketerangan'])->middleware('auth')->name('produk.edit');
Route::put('/produk/{id}', [ProductController::class, 'updateketerangan'])->middleware('auth')->name('produk.update');

Route::delete('/produk/{id}', [ProductController::class, 'destroy'])->name('produk.destroy');


Route::delete('/produk/{idketerangan}', [ProductController::class, 'hapusketerangan'])->name('produk.hapusketerangan');

Route::get('/produk/tambah_version', [ProductController::class, 'tambahversion'])->middleware('auth')->name('produk.tambah_version');

Route::post('/produk/tambah_version', [ProductController::class, 'simpanversion'])->middleware('auth')->name('produk.simpan_version');
// Rute logout - hanya bisa diakses setelah login
// Rute logout - hanya bisa diakses setelah login

route::get('/logout',[AuthController::class,'auth'])->middleware('auth')->name ('logout');

Route::post('/auth/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logoutt');

// Rute detail produk - hanya bisa diakses setelah login
Route::get('/produk/{id}/{product}', [ProductController::class, 'show'])->middleware('auth')->name('produk.show');

// Rute tambahan produk di halaman detail produk - hanya bisa diakses setelah login
Route::get('/produk/tambah-keterangan', [ProductController::class, 'tambahKeterangan'])->middleware('auth')->name('produk.tambah_keterangan');
Route::post('/produk/tambah-keterangan', [ProductController::class, 'simpanKeterangan'])->middleware('auth')->name('produk.simpan_keterangan');
// Route::delete('/produk/{id}/medissy', [ProductController::class, 'destroy'])->middleware('auth')->name('produk.destroy');
// route halaman pengujung
Route::get('/produk-list', [ProductController::class, 'produkList'])->name('produk.produk_list');

// route yang mengarah ke halaman produk_detail.blade.php
Route::get('/produk/{id}', [ProductController::class, 'detail'])->name('produk.detail');


// route yang mengarah ke halaman produk_detail.blade.php
Route::get('/produk/{id}/detail', [ProductController::class, 'produkdetail'])->name('produk.detailm');

