<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\UserController;
// use App\Http\Controllers\BukuController;
use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\BukuControllers;
use App\Http\Controllers\Admin\PeminjamanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\KategoriController;

Route::get('/', function () {
    return view('index');
})->name('landing');

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';

Route::prefix('admin')->group(function () {

    Route::get('/', [UserController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/peminjaman', [PeminjamanController::class, 'index_admin'])
        ->name('admin.peminjaman');
    Route::get('/user', [UserController::class, 'index'])
        ->name('admin.user');
    Route::post('/user/store', [UserController::class, 'store'])->name('tambah.user');
    Route::post('/user/edit', [UserController::class, 'update'])
        ->name('edit.user');
    Route::post('/user/hapus', [UserController::class, 'destroy'])
        ->name('hapus.user');

    Route::get('/buku', [BukuController::class, 'index'])
        ->name('admin.buku');
    Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
    Route::put('/buku/update', [BukuController::class, 'update'])->name('buku.update');
    Route::post('/buku/delete', [BukuController::class, 'destroy'])->name('buku.delete');


    Route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori');
    Route::post('/kategori', [KategoriController::class, 'create'])->name('tambah.kategori');
    Route::post('/kategori/hapus', [KategoriController::class, 'destroy'])
        ->name('delete.kategori');
    Route::post('/kategori/update', [KategoriController::class, 'update'])
        ->name('update.kategori');
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('admin.peminjaman');
    Route::post('/admin/peminjaman', [App\Http\Controllers\Admin\PeminjamanController::class, 'store'])
        ->name('admin.peminjaman.store');

    // Jika ingin edit/update:
    Route::put('/admin/peminjaman/{id}', [App\Http\Controllers\Admin\PeminjamanController::class, 'update'])
        ->name('admin.peminjaman.update');

    // Route::post('/peminjaman/return/{id}', [PeminjamanController::class, 'returnBuku'])->name('admin.peminjaman.return');

    Route::get('/profil', function () {
        return view('admin.profil');
    })->name('admin.profil');
});


Route::get('/user', function () {
    return view('user.dashboard');
})->name('user.dashboard');

Route::get('/buku', [BukuControllers::class, 'index'])->name('user.buku');

Route::get('/riwayat', function () {
    return view('user.riwayatpeminjaman');
})->name('user.riwayat');

Route::get('/profil', function () {
    return view('user.profil');
})->name('user.profil');

Route::get(
    '/detail/{id_buku}',
    [BukuControllers::class, 'detail']
)->name('user.detail');

Route::post('/profil/update', [UserController::class, 'updateProfil'])
    ->name('user.profil.update');




// Route::get('/buku', [BukuController::class, 'index'])->name('buku');
// Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');