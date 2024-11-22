<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

// Rute untuk hapus produk - hanya bisa diakses setelah login
Route::delete('/produk/{id}', [ProductController::class, 'destroy'])->middleware('auth')->name('produk.destroy');

// Rute logout - hanya bisa diakses setelah login
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

// Rute detail produk - hanya bisa diakses setelah login
Route::get('/produk/{id}/detail', [ProductController::class, 'show'])->middleware('auth')->name('produk.show');

// Rute tambahan produk di halaman detail produk - hanya bisa diakses setelah login
Route::get('/produk/tambah-keterangan', [ProductController::class, 'tambahKeterangan'])->middleware('auth')->name('produk.tambah_keterangan');
Route::post('/produk/tambah-keterangan', [ProductController::class, 'simpanKeterangan'])->middleware('auth')->name('produk.simpan_keterangan'); 

// route halaman pengujung
Route::get('/produk-list', [ProductController::class, 'produkList'])->name('produk.produk_list');

// route yang mengarah ke halaman produk_detail.blade.php
Route::get('/produk/{id}', [ProductController::class, 'detail'])->name('produk.detail');