<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Buku;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
=======
use Illuminate\Http\Request;

class BukuController extends Controller
{
   public function index() {
    $buku = [
        ["id"=>1,"nama"=>"Pemrograman Web"],
        ["id"=>2,"nama"=>"Basis Data"],
        ["id"=>3,"nama"=>"Algoritma"]
    ];

    return view('buku.index', compact('buku'));
}

}
 
>>>>>>> 616c0eb9db87caf721e5bdaf3079a6b87cb44b63
