<?php

use Illuminate\Support\Facades\Route;

// Controller Public / Frontend
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfilPerusahaanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KontakController;

// Controller Admin
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminProdukController;

// ================= Halaman Frontend Pengunjung =================
Route::get('/', [BerandaController::class, 'index']);
Route::get('/profil', [ProfilPerusahaanController::class, 'index']);
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{id}', [ProdukController::class, 'show']);
Route::get('/artikel', [ArtikelController::class, 'index']);
Route::get('/artikel/{id}', [ArtikelController::class, 'show']);
Route::get('/galeri', [GaleriController::class, 'index']);
Route::get('/galeri/{id}', [GaleriController::class, 'show']);
Route::post('/galeri/{id}/like', [GaleriController::class, 'like'])->name('galeri.like');
Route::post('/galeri/{id}/comment', [GaleriController::class, 'comment'])->name('galeri.comment');
Route::get('/kontak', [KontakController::class, 'index']);
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

// ================= Autentikasi Admin =================
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);

// ================= Halaman Panel Admin (Proteksi Auth) =================
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard']);
    Route::post('/logout', [AdminAuthController::class, 'logout']);
    
    // Resource CRUD Admin (Produk, dll)
    Route::resource('products', AdminProdukController::class);
});