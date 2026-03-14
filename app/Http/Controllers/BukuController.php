<?php

namespace App\Http\Controllers;

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
 