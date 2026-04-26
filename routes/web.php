<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\Admin\KategoriController;

Route::get('/', function () {
    return view('index');
})->name('landing');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/peminjaman', [PeminjamanController::class, 'index_admin'])
        ->name('admin.peminjaman');

    Route::get('/user', [UserController::class, 'index'])
        ->name('admin.user');

    Route::get('/buku', [BukuController::class, 'index_admin'])
        ->name('admin.buku');

    Route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori');
    Route::post('/kategori', [KategoriController::class, 'create'])->name('tambah.kategori');
    Route::post('/kategori/hapus', [KategoriController::class, 'destroy'])
        ->name('delete.kategori');
    Route::put('/kategori/{id}', [KategoriController::class, 'update'])
        ->name('update.kategori');

    Route::get('/profil', function () {
        return view('admin.profil');
    })->name('admin.profil');
});


Route::get('/user', function () {
    return view('user.dashboard');
})->name('user.dashboard');

Route::get('/buku', function () {
    return view('user.buku');
})->name('user.buku');

Route::get('/riwayat', function () {
    return view('user.riwayatpeminjaman');
})->name('user.riwayat');

Route::get('/profil', function () {
    return view('user.profil');
})->name('user.profil');

Route::get('/detail', function () {
    return view('user.detail');
})->name('user.detail');



// Route::get('/buku', [BukuController::class, 'index'])->name('buku');
// Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
