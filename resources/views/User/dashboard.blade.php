@extends('layout.app')

@section('content')

<div class="space-y-6">


<div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl p-8 text-white shadow-lg">
    <h1 class="text-3xl font-bold">
        Halo, Peter 👋
    </h1>

    <p class="mt-2 text-blue-100">
        Selamat datang di Sistem Perpustakaan Digital.
        Temukan buku favoritmu dan kelola peminjaman dengan mudah.
    </p>

    <a href="/buku"
        class="inline-block mt-5 bg-white text-blue-600 px-5 py-2 rounded-lg font-semibold hover:bg-gray-100 transition">
        Cari Buku
    </a>
</div>

<!-- Statistik -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white rounded-2xl shadow-sm p-6 border">
        <div class="text-4xl">📚</div>
        <h3 class="text-gray-500 mt-3">Total Buku</h3>
        <p class="text-3xl font-bold text-blue-600">
            {{ $totalBuku ?? 0 }}
        </p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-6 border">
        <div class="text-4xl">📖</div>
        <h3 class="text-gray-500 mt-3">Sedang Dipinjam</h3>
        <p class="text-3xl font-bold text-yellow-500">
            {{ $dipinjam ?? 0 }}
        </p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-6 border">
        <div class="text-4xl">📝</div>
        <h3 class="text-gray-500 mt-3">Riwayat Peminjaman</h3>
        <p class="text-3xl font-bold text-green-600">
            {{ $riwayat ?? 0 }}
        </p>
    </div>

</div>

<!-- Menu -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <a href="/buku"
        class="bg-white rounded-2xl shadow-sm border p-6 hover:shadow-lg hover:-translate-y-1 transition">

        <div class="flex items-center gap-4">
            <div class="bg-blue-100 p-4 rounded-xl text-3xl">
                📚
            </div>

            <div>
                <h2 class="font-semibold text-lg">
                    Daftar Buku
                </h2>

                <p class="text-gray-500 text-sm">
                    Cari dan lihat buku yang tersedia
                </p>
            </div>
        </div>

    </a>

    <a href="{{ route('user.riwayat') }}"
        class="bg-white rounded-2xl shadow-sm border p-6 hover:shadow-lg hover:-translate-y-1 transition">

        <div class="flex items-center gap-4">
            <div class="bg-green-100 p-4 rounded-xl text-3xl">
                📖
            </div>

            <div>
                <h2 class="font-semibold text-lg">
                    Riwayat Peminjaman
                </h2>

                <p class="text-gray-500 text-sm">
                    Lihat semua riwayat peminjaman
                </p>
            </div>
        </div>

    </a>

</div>

<!-- Informasi -->
<div class="bg-white rounded-2xl shadow-sm border">

    <div class="border-b px-6 py-4">
        <h2 class="font-semibold text-lg text-gray-800">
            Informasi Perpustakaan
        </h2>
    </div>

    <div class="p-6">
        <div class="grid md:grid-cols-2 gap-4">

            <div class="bg-gray-50 rounded-xl p-4">
                <h3 class="font-semibold mb-3">
                    📚 Aturan Peminjaman
                </h3>

                <ul class="space-y-2 text-gray-600 text-sm">
                    <li>• Maksimal 3 buku dipinjam</li>
                    <li>• Masa pinjam 7 hari</li>
                    <li>• Dapat diperpanjang sebelum jatuh tempo</li>
                    <li>• Keterlambatan dikenakan denda</li>
                </ul>
            </div>

            <div class="bg-gray-50 rounded-xl p-4">
                <h3 class="font-semibold mb-3">
                    ⏰ Jam Operasional
                </h3>

                <ul class="space-y-2 text-gray-600 text-sm">
                    <li>Senin - Jumat : 08.00 - 17.00</li>
                    <li>Sabtu : 08.00 - 12.00</li>
                    <li>Minggu : Tutup</li>
                </ul>
            </div>

        </div>
    </div>

</div>


</div>
@endsection
