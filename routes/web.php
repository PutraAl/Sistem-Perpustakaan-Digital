<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('index');
})->name('landing');


Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/peminjaman', [PeminjamanController::class,'index_admin'])->name('admin.peminjaman');
    Route::get('/user', [UserController::class,'index'])->name('admin.user');
});

Route::get('/user', function(){
    return view ('user.dashboard');
});

Route::get('/buku', [BukuController::class, 'index'])->name('buku');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
Route::get('/login', function(){
    return view('index');
})->name('login');
