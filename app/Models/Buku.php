<?php

namespace App\Models;

use App\Models\DetailPeminjaman;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    /** @use HasFactory<\Database\Factories\BukuFactory> */
    use HasFactory;

    protected $table = 'tb_buku';
    protected $primaryKey = 'id_buku';

   protected $fillable = [
        'kategori_id',
        'judul',
        'foto',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'stok',
        'deskripsi'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function detailPeminjaman()
    {
        return $this->hasMany(DetailPeminjaman::class);
    }
}
