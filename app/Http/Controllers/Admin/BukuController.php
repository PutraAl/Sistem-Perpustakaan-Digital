<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();

        return view(
            'admin.buku',
            compact(
                'buku',
                'kategori'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
{
    Buku::create([
        'id_kategori'  => $request->id_kategori,
        'judul'        => $request->judul,
        'penulis'      => $request->penulis,
        'penerbit'     => $request->penerbit,
        'tahun_terbit' => $request->tahun_terbit,
        'stok'         => $request->stok,
        'deskripsi'    => $request->deskripsi,
        'foto'         => ''
    ]);

    return redirect()
        ->route('admin.buku')
        ->with('success', 'Buku berhasil ditambahkan');
}
    

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
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
}