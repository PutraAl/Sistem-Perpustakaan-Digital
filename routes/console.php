<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\Peminjaman;
use App\Mail\PengingatJatuhTempoMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schedule;
use Carbon\Carbon;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    $besok = Carbon::tomorrow()->toDateString();

    // Cari transaksi dipinjam/terlambat yang jatuh temponya adalah BESOK
    $peminjamans = Peminjaman::with('user', 'detail.buku')
        ->whereIn('status', ['dipinjam', 'terlambat'])
        ->whereDate('tanggal_jatuh_tempo', $besok)
        ->get();

    foreach ($peminjamans as $peminjaman) {
        if ($peminjaman->user && $peminjaman->user->email) {
            Mail::to($peminjaman->user->email)->queue(new PengingatJatuhTempoMail($peminjaman));
        }
    }
})->everyMinute();