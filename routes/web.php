<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LayananController as AdminLayananController;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Admin\PesananPaketController;
use App\Http\Controllers\Admin\PesanController as AdminPesanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// Halaman Publik
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/tentang', [PublicController::class, 'tentang'])->name('tentang');
Route::get('/layanan', [PublicController::class, 'layanan'])->name('layanan');
Route::get('/paket/{paket}/pesan', [PublicController::class, 'formPesanPaket'])->name('paket.form');
Route::post('/paket/{paket}/pesan', [PublicController::class, 'pesanPaket'])->name('paket.pesan');
Route::get('/pesanan/{pesananPaket}/bukti', [PublicController::class, 'buktiPesanan'])->name('pesanan.bukti');
Route::get('/kontak', [PublicController::class, 'kontak'])->name('kontak');
Route::post('/kontak', [PublicController::class, 'kirimPesan'])->name('kontak.kirim');
Route::get('/tentang-developer', [PublicController::class, 'tentangDeveloper'])->name('tentang.developer');

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/layanan', [AdminLayananController::class, 'index'])->name('layanan.index');
    Route::get('/layanan/create', [AdminLayananController::class, 'create'])->name('layanan.create');
    Route::post('/layanan', [AdminLayananController::class, 'store'])->name('layanan.store');
    Route::get('/layanan/{layanan}/edit', [AdminLayananController::class, 'edit'])->name('layanan.edit');
    Route::put('/layanan/{layanan}', [AdminLayananController::class, 'update'])->name('layanan.update');
    Route::delete('/layanan/{layanan}', [AdminLayananController::class, 'destroy'])->name('layanan.destroy');

    Route::get('/paket', [PaketController::class, 'index'])->name('paket.index');
    Route::get('/paket/create', [PaketController::class, 'create'])->name('paket.create');
    Route::post('/paket', [PaketController::class, 'store'])->name('paket.store');
    Route::get('/paket/{paket}/edit', [PaketController::class, 'edit'])->name('paket.edit');
    Route::put('/paket/{paket}', [PaketController::class, 'update'])->name('paket.update');
    Route::delete('/paket/{paket}', [PaketController::class, 'destroy'])->name('paket.destroy');

    Route::get('/pesanan-paket', [PesananPaketController::class, 'index'])->name('pesanan-paket.index');
    Route::put('/pesanan-paket/{pesananPaket}/status', [PesananPaketController::class, 'updateStatus'])->name('pesanan-paket.status');
    Route::delete('/pesanan-paket/{pesananPaket}', [PesananPaketController::class, 'destroy'])->name('pesanan-paket.destroy');

    Route::get('/pesan', [AdminPesanController::class, 'index'])->name('pesan.index');
    Route::delete('/pesan/{pesan}', [AdminPesanController::class, 'destroy'])->name('pesan.destroy');
});
