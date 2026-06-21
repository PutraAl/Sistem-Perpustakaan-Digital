<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;
use App\Models\Kategori; // PASTIKAN BARIS INI ADA!
class BukuSeeder extends Seeder
{
    public function run(): void
    {
        $kategoriIds = Kategori::pluck('id_kategori')->toArray();

        if (empty($kategoriIds)) {
            $this->command->error('Tabel tb_kategori kosong!');
            return;
        }
        $dataBuku = [
            ['judul' => 'Belajar Laravel Dasar', 'penulis' => 'Budi Santoso', 'penerbit' => 'Elex Media', 'tahun_terbit' => 2024],
            ['judul' => 'Teknik Database Relasional', 'penulis' => 'Siti Aminah', 'penerbit' => 'Informatika', 'tahun_terbit' => 2023],
            ['judul' => 'Panduan Desain UI/UX', 'penulis' => 'Andi Wijaya', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2022],
            ['judul' => 'Algoritma Pemrograman', 'penulis' => 'Dedi Kurniawan', 'penerbit' => 'Elex Media', 'tahun_terbit' => 2021],
            ['judul' => 'Mastering Tailwind CSS', 'penulis' => 'Rina Putri', 'penerbit' => 'Informatika', 'tahun_terbit' => 2024],
            ['judul' => 'Sejarah Dunia Modern', 'penulis' => 'John Smith', 'penerbit' => 'Pustaka Jaya', 'tahun_terbit' => 2020],
            ['judul' => 'Rahasia Produktivitas', 'penulis' => 'James Clear', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2023],
            ['judul' => 'Seni Berpikir Positif', 'penulis' => 'Dale Carnegie', 'penerbit' => 'Pustaka Utama', 'tahun_terbit' => 2019],
            ['judul' => 'Fisika Kuantum Dasar', 'penulis' => 'Albert Einstein', 'penerbit' => 'Science Press', 'tahun_terbit' => 2022],
            ['judul' => 'Resep Masakan Nusantara', 'penulis' => 'Chef Juna', 'penerbit' => 'Foodie Books', 'tahun_terbit' => 2024],
            ['judul' => 'Manajemen Keuangan', 'penulis' => 'Robert K.', 'penerbit' => 'Bisnis Media', 'tahun_terbit' => 2021],
            ['judul' => 'Psikologi Komunikasi', 'penulis' => 'Dr. Jalaluddin', 'penerbit' => 'Remaja Rosda', 'tahun_terbit' => 2022],
            ['judul' => 'Dasar-dasar Networking', 'penulis' => 'Tanenbaum', 'penerbit' => 'Informatika', 'tahun_terbit' => 2020],
            ['judul' => 'Arsitektur Komputer', 'penulis' => 'William Stallings', 'penerbit' => 'Prentice Hall', 'tahun_terbit' => 2018],
            ['judul' => 'Sastra Klasik Indonesia', 'penulis' => 'Pramoedya A.', 'penerbit' => 'Lentera', 'tahun_terbit' => 2015],
            ['judul' => 'Biografi Tokoh Dunia', 'penulis' => 'Walter Isaacson', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2023],
            ['judul' => 'Membangun API Laravel', 'penulis' => 'Taylor Otwell', 'penerbit' => 'Laravel Press', 'tahun_terbit' => 2024],
            ['judul' => 'Dasar Machine Learning', 'penulis' => 'Andrew Ng', 'penerbit' => 'Coursera', 'tahun_terbit' => 2023],
            ['judul' => 'Geografi Dunia', 'penulis' => 'National Geo', 'penerbit' => 'World Books', 'tahun_terbit' => 2021],
            ['judul' => 'Filosofi Hidup', 'penulis' => 'Marcus Aurelius', 'penerbit' => 'Pustaka Utama', 'tahun_terbit' => 2022],
        ];

       foreach ($dataBuku as $buku) {
            Buku::create([
                'judul'        => $buku['judul'],
                'penulis'      => $buku['penulis'],
                'penerbit'     => $buku['penerbit'],
                'foto'         => 'lCXHZ41Qjl8REdI7DtYISi27TazCKf7qzeaAaU5K.png',
                'tahun_terbit' => $buku['tahun_terbit'],
                'stok'         => rand(5, 50),
                'deskripsi'    => 'Deskripsi untuk ' . $buku['judul'],
                // Ini akan memilih antara 1 atau 3 saja
                'id_kategori'  => $kategoriIds[array_rand($kategoriIds)], 
            ]);
        }
    }
}