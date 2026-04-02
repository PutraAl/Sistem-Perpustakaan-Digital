<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    /** @use HasFactory<\Database\Factories\PeminjamanFactory> */
    use HasFactory;
    protected $primaryKey = 'id_peminjaman';
    protected $table = 'tb_peminjaman';

      protected $fillable = [
        'anggota_id',
        'tanggal_pinjam',
        'tanggal_jatuh_tempo',
        'tanggal_kembali',
        'denda',
        'status'
    ];

    public function anggota()
    {
        return $this->belongsTo(User::class, 'anggota_id');
    }

    public function detail()
    {
        return $this->hasMany(DetailPeminjaman::class);
    }
}
