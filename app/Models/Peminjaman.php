<?php

namespace App\Models;

use App\Models\DetailPeminjaman;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Peminjaman extends Model
{
    /** @use HasFactory<\Database\Factories\PeminjamanFactory> */
    use HasFactory;
    protected $primaryKey = 'id_peminjaman';
    protected $table = 'tb_peminjaman';

     protected $fillable = [
    'user_id',
    'tanggal_pinjam',
    'tanggal_jatuh_tempo',
    'tanggal_kembali',
    'denda',
    'status'
];

   public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

   public function detail()
{
    return $this->hasMany(
        DetailPeminjaman::class,
        'id_peminjaman',
        'id_peminjaman'
    );
}
 const TARIF_DENDA_PER_HARI = 3000;
 public function hitungHariTerlambat(): int
    {
        $jatuhTempo = Carbon::parse($this->tanggal_jatuh_tempo)->startOfDay();
        $acuan = $this->tanggal_kembali
            ? Carbon::parse($this->tanggal_kembali)->startOfDay()
            : Carbon::today();

        if ($acuan->lessThanOrEqualTo($jatuhTempo)) {
            return 0;
        }

        return $jatuhTempo->diffInDays($acuan);
    }

    public function hitungDenda(): int
    {
        return $this->hitungHariTerlambat() * self::TARIF_DENDA_PER_HARI;
    }

    /** Bisa dipanggil langsung di Blade: $peminjaman->denda_berjalan */
    public function getDendaBerjalanAttribute()
    {
        return $this->hitungDenda();
    }

    /** $peminjaman->is_terlambat -> true/false */
    public function getIsTerlambatAttribute()
    {
        return !in_array($this->status, ['dikembalikan', 'ditolak', 'dibatalkan'])
            && $this->hitungHariTerlambat() > 0;
    }

}
