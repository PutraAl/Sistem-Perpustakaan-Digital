<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;

class BukuControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $buku = Buku::all();
    $kategori = Kategori::all();

    return view(
        'user.buku',
        compact('buku', 'kategori')
    );
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
}
