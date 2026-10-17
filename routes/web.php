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
use App\Http\Controllers\Admin\AdminGaleriController;
use App\Http\Controllers\Admin\AdminArtikelController;
use App\Http\Controllers\Admin\AdminKontakController;

// ================= Halaman Frontend Pengunjung =================
Route::get('/', [BerandaController::class, 'index']);
Route::get('/profil', [ProfilPerusahaanController::class, 'index']);
Route::get('/produk', [ProdukController::class, 'index'])->name('public.produk.index');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('public.produk.show');
Route::get('/artikel', [ArtikelController::class, 'index']);
Route::get('/artikel/{id}', [ArtikelController::class, 'show']);
Route::get('/galeri', [GaleriController::class, 'index'])->name('public.galeri.index');
Route::get('/galeri/{id}', [GaleriController::class, 'show']);
Route::post('/galeri/{id}/like', [GaleriController::class, 'like'])->name('galeri.like');
Route::post('/galeri/{id}/comment', [GaleriController::class, 'comment'])->name('galeri.comment');
Route::delete('/komentar-publik/{id}', [GaleriController::class, 'destroyKomentar'])->name('galeri.komentar.destroy');
Route::get('/kontak', [KontakController::class, 'index']);
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

// ================= Autentikasi Admin =================
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);

// ================= Halaman Panel Admin (Proteksi Auth) =================
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard']);
    Route::post('/logout', [AdminAuthController::class, 'logout']);

    Route::get('/profil/edit', [AdminAuthController::class, 'editProfile'])->name('admin.profil.edit');
    Route::put('/profil/update', [AdminAuthController::class, 'updateProfile'])->name('admin.profil.update');
    
    // Resource CRUD Admin Produk (URL: /admin/produk)
    Route::resource('produk', AdminProdukController::class)->parameters([
        'produk' => 'produk'
    ])->names('produk');

    // Resource CRUD Admin Galeri (URL: /admin/galeri)
    Route::resource('galeri', AdminGaleriController::class)->parameters([
        'galeri' => 'galeri'
    ])->names('galeri');

    // Hapus Komentar Galeri oleh Admin
    Route::delete('/komentar/{id}', [AdminGaleriController::class, 'destroyKomentar'])->name('admin.komentar.destroy');

    // Artikel Admin
    Route::resource('artikel', AdminArtikelController::class)->parameters(['artikel' => 'artikel'])->names('artikel');

    // Kontak Admin (Hanya index, show, destroy)
    Route::resource('kontak', AdminKontakController::class)->parameters(['kontak' => 'kontak'])->names('kontak')->only(['index', 'show', 'destroy']);
});