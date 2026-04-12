<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::prefix('/admin')->group(function () {
    Route::get('/peminjaman', [PeminjamanController::class,'index_admin'])->name('admin.peminjaman');
});

Route::get('/user', function(){
    return view ('user.dashboard');
});

Route::get('/buku', [BukuController::class, 'index'])->name('buku');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
Route::get('/login', [LoginController::class, 'index'])->name('login');
