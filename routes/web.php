<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index']);
Route::get('/buku', [BukuController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);