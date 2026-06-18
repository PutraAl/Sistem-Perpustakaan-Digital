<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    /** @use HasFactory<\Database\Factories\DetailPeminjamanFactory> */
    use HasFactory;

    protected $table = 'tb_detail_peminjaman';
    protected $primaryKey = 'id_detail_peminjaman';
     protected $fillable = [
        'id_peminjaman',
        'id_buku',
        'jumlah',
        'status_item',
        'tanggal_kembali',
        'denda_item'
    ];

   public function peminjaman()
{
    return $this->belongsTo(
        Peminjaman::class,
        'id_peminjaman',
        'id_peminjaman'
    );
}

    public function buku()
{
    return $this->belongsTo(
        Buku::class,
        'id_buku',
        'id_buku'
    );
}
}
