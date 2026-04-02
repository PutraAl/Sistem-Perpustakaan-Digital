<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_buku', function (Blueprint $table) {
            $table->id('id_buku');
            $table->string('judul');
            $table->string('penulis');
            $table->string('penerbit');
            $table->year('tahun_terbit');
            $table->integer('stok')->default(0);
            $table->text('deskripsi')->nullable();

            $table->timestamps();
            // Foreign key ke tb kategori
            $table->foreignId('id_kategori')
                ->references('id_kategori')
                ->on('tb_kategori')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_buku');
    }
};
