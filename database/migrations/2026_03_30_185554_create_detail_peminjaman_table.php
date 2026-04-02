<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_detail_peminjaman', function (Blueprint $table) {
            $table->id('id_detail_peminjaman');

            $table->integer('jumlah')->default(1);

            $table->enum('status_item', ['dipinjam', 'dikembalikan', 'rusak', 'hilang'])
                ->default('dipinjam');
            $table->date('tanggal_kembali')->nullable();
            $table->decimal('denda_item', 10, 2)->default(0);
            $table->timestamps();
            // Foreign key ke tb peminjaman
            $table->foreignId('id_peminjaman')
                ->references('id_peminjaman')
                ->on('tb_peminjaman')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            // Foreign key ke tb buku
            $table->foreignId('id_buku')
                ->references('id_buku')
                ->on('tb_buku')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_detail_peminjaman');
    }
};
