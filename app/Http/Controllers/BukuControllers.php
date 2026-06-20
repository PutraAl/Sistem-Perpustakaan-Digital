<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use App\Models\Buku;
use App\Models\DetailPeminjaman;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class BukuControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $buku = Buku::all();
    $kategori = Kategori::all();

return view ('user.buku', compact('buku', 'kategori'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function detail($id)
    {
        $data = Buku::findorFail($id);
        return view ('user.detail', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBukuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBukuRequest $request, Buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        //
    }
  public function pinjam(Buku $buku)
    {
        if ($buku->stok < 1) {
            return redirect()->back()->with('error', 'Maaf, stok buku ini sedang habis!');
        }

        DB::transaction(function () use ($buku) {
            
            $peminjaman = Peminjaman::create([
                'user_id'             => Auth::id(),
                'tanggal_pinjam'      => now()->toDateString(),
                'tanggal_jatuh_tempo' => now()->addDays(7)->toDateString(), 
                // STATUS DI BAWAH INI KITA GANTI:
                'status'              => 'menunggu_konfirmasi' 
            ]);

            DetailPeminjaman::create([
                'id_peminjaman' => $peminjaman->id_peminjaman,
                'id_buku'       => $buku->id_buku,
                'jumlah'        => 1,
                // DETAILNYA JUGA MENUNGGU KONFIRMASI:
                'status_item'   => 'dipinjam'
            ]);

            // Stok tetap dikurangi 1 sebagai tanda "Di-booking"
            $buku->decrement('stok'); 
        });

        return redirect()->back()->with('success', 'Pengajuan pinjam berhasil! Silakan tunggu konfirmasi Admin.');
    }
}
