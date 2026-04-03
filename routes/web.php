<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('master');
});
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');




Route::get('/login', [LoginController::class, 'index']);
Route::get('/buku', [BukuController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);
