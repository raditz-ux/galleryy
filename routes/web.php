<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\AdminController;

// Pengalihan Utama
Route::get('/', function () {
    return redirect('/dashboard');
});

// Guest & Publik
Route::get('/dashboard', [FotoController::class, 'index'])->name('dashboard');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'proseslogin']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'prosesregister']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Fitur Interaksi
Route::post('/like/{id}', [LikeController::class, 'like'])->name('foto.like');
Route::post('/komentar/{id}', [KomentarController::class, 'store'])->name('komentar.store');

// Fitur Admin & Manajemen (Protected)
Route::middleware(['web'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    
    // Manajemen Foto
    Route::get('/admin/tambah', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/simpan', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/admin/hapus/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    
    // Manajemen Komentar
    Route::post('/admin/komentar/{id}', [AdminController::class, 'komentar'])->name('admin.komentar');
    Route::get('/admin/hapus-komentar/{id}', [KomentarController::class, 'hapus'])->name('komentar.destroy');
});

// Route Upload (Opsional jika ingin dipisah dari Admin)
Route::get('/upload', [FotoController::class, 'create'])->name('foto.upload');
Route::post('/upload', [FotoController::class, 'store'])->name('foto.store');