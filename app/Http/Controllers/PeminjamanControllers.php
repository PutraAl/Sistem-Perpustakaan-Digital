<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PeminjamanControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function riwayat()
{
    // Mengambil riwayat peminjaman khusus untuk user yang sedang login
    // Beserta data user, detail pinjaman, dan buku di dalam detailnya
    $peminjamans = Peminjaman::with(['user', 'detail.buku'])
        ->where('user_id', Auth::id())
        ->orderBy('id_peminjaman', 'desc')
        ->get();

    return view('user.riwayatpeminjaman', compact('peminjamans')); // Sesuaikan nama file view kamu
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
