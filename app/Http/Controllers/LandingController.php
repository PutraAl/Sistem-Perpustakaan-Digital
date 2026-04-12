<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Peminjaman;

class LandingController extends Controller
{
public function index()
{
    return view('landing.index', [
        'buku' => \App\Models\Buku::take(6)->get(),
        'totalBuku' => \App\Models\Buku::count(),
        'totalKategori' => \App\Models\Kategori::count(),
        'totalUser' => \App\Models\User::count(),
        'totalPeminjaman' => \App\Models\Peminjaman::count(),
    ]);
}
}