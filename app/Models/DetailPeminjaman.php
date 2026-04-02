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
        'peminjaman_id',
        'buku_id',
        'jumlah',
        'status_item',
        'tanggal_kembali',
        'denda_item'
    ];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
