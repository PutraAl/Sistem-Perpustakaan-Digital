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
public static function perbaruiDendaOtomatis()
    {
        $hariIni = Carbon::today();

        // 1. Tangkap buku yang kemarin 'dipinjam', tapi hari ini sudah lewat batas
        $lewatBatas = self::where('status', 'dipinjam')
            ->whereDate('tanggal_jatuh_tempo', '<', $hariIni->toDateString())
            ->get();

        foreach ($lewatBatas as $p) {
            $p->status = 'terlambat';
            $p->denda  = $p->hitungDenda(); // Memanggil rumus buatanmu sendiri!
            $p->save();

            // Ubah status item di tabel anak jadi 'terlambat'
          DetailPeminjaman::where('id_peminjaman', $p->id_peminjaman)
    ->where('status_item', 'dipinjam')
    ->update([
        'denda_item' => $p->denda
    ]);
        }
        // 2. Perbarui nominal denda bagi yang statusnya sudah 'terlambat' (Argo berjalan tiap hari)
        $sedangTerlambat = self::where('status', 'terlambat')
            ->whereNull('tanggal_kembali')
            ->get();

        foreach ($sedangTerlambat as $p) {
            $dendaRealtime = $p->hitungDenda();
            if ($p->denda !== $dendaRealtime) {
                $p->denda = $dendaRealtime;
                $p->save();
            }
        }
    }
}
