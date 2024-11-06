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

// Rute untuk halaman produk
Route::get('/produk', [ProductController::class, 'index'])->middleware('auth')->name('produk.index');
// Route::get('/produk/create', [ProductController::class, 'create'])->name('produk.create');
Route::get('/produk/create', [ProductController::class, 'create'])->name('produk.create');
Route::post('/produk/store', [ProductController::class, 'store'])->name('produk.store');

// Rute edit produk
Route::get('/produk/{id}/edit', [ProductController::class, 'edit'])->name('produk.edit');
Route::put('/produk/{id}', [ProductController::class, 'update'])->name('produk.update');

// Rute hapus produk
Route::delete('/produk/{id}', [ProductController::class, 'destroy'])->name('produk.destroy');

// Rute logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Rute detail produk
Route::get('/produk/{id}/detail', [ProductController::class, 'show'])->name('produk.show');

// Rute tambahan produk di halaman detail produk
Route::get('/produk/tambah-keterangan', [ProductController::class, 'tambahKeterangan'])->name('produk.tambah_keterangan');
Route::post('/produk/tambah-keterangan', [ProductController::class, 'simpanKeterangan'])->name('produk.simpan_keterangan');
