<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE tb_peminjaman
            MODIFY COLUMN status ENUM(
                'menunggu_konfirmasi',
                'dipinjam',
                'dikembalikan',
                'terlambat',
                'ditolak',
                'dibatalkan'
            ) NOT NULL DEFAULT 'menunggu_konfirmasi'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE tb_peminjaman
            MODIFY COLUMN status ENUM(
                'dipinjam',
                'dikembalikan',
                'terlambat'
            ) NOT NULL DEFAULT 'dipinjam'
        ");
    }
};