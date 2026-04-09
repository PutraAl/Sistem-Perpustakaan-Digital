<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::prefix('admin')->group(function () {
    Route::get('/peminjaman', [PeminjamanController::class,'index_admin'])->name('admin.peminjaman');
});

Route::get('/login', [LoginController::class, 'index']);
Route::get('/buku', [BukuController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);
