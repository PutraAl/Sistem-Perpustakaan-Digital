<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan Digital')</title>
    {{-- @vite('resources/css/app.css') --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans">

    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

</body>
</html>


// File: resources/views/components/navbar.blade.php
<nav class="bg-white/80 backdrop-blur border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <div class="w-9 h-9 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold">L</div>
            <span class="text-lg font-semibold text-gray-800">LibraryOS</span>
        </div>

        <div class="hidden md:flex gap-8 text-sm font-medium text-gray-600">
            <a href="{{ route('landing') }}" class="hover:text-blue-600">Home</a>
            <a href="{{ route('buku') }}" class="hover:text-blue-600">Koleksi</a>
            <a href="{{ route('kategori') }}" class="hover:text-blue-600">Kategori</a>
        </div>

        <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700">
            Login
        </a>
    </div>
</nav>


// File: resources/views/components/footer.blade.php
<footer class="bg-gray-900 text-gray-400 py-10 mt-20">
    <div class="max-w-7xl mx-auto px-6 text-center text-sm">
        <p>© 2026 LibraryOS. All rights reserved.</p>
    </div>
</footer>


// File: resources/views/landing/index.blade.php
@extends('layouts.app')

@section('title', 'Landing Page')

@section('content')

<!-- HERO PREMIUM -->
<section class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-12 items-center">
    <div>
        <h1 class="text-5xl font-bold text-gray-900 leading-tight">
            Akses Perpustakaan Digital Tanpa Batas
        </h1>
        <p class="mt-6 text-gray-600 text-lg">
            Temukan ribuan buku, kelola peminjaman, dan nikmati pengalaman membaca modern dalam satu platform.
        </p>

        <div class="mt-8 flex gap-4">
            <a href="{{ route('buku') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                Jelajahi Buku
            </a>
            <a href="{{ route('login') }}" class="px-6 py-3 border border-gray-300 rounded-lg hover:bg-gray-100">
                Masuk
            </a>
        </div>
    </div>

    <div class="bg-gradient-to-br from-blue-100 to-blue-50 rounded-2xl h-80 flex items-center justify-center text-6xl font-bold text-blue-600">
        LIB
    </div>
</section>

<!-- STATISTIK -->
<section class="max-w-6xl mx-auto px-6 py-12 grid grid-cols-2 md:grid-cols-4 gap-6">
    <div class="bg-white p-6 rounded-xl shadow text-center">
        <h3 class="text-2xl font-bold text-gray-900">{{ $totalBuku }}</h3>
        <p class="text-gray-500 text-sm">Total Buku</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow text-center">
        <h3 class="text-2xl font-bold text-gray-900">{{ $totalKategori }}</h3>
        <p class="text-gray-500 text-sm">Kategori</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow text-center">
        <h3 class="text-2xl font-bold text-gray-900">{{ $totalUser }}</h3>
        <p class="text-gray-500 text-sm">User</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow text-center">
        <h3 class="text-2xl font-bold text-gray-900">{{ $totalPeminjaman }}</h3>
        <p class="text-gray-500 text-sm">Peminjaman</p>
    </div>
</section>

<!-- BUKU TERBARU -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Buku Terbaru</h2>
        <a href="{{ route('buku') }}" class="text-blue-600 text-sm">Lihat semua</a>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
        @foreach($buku as $item)
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-5">
                <div class="h-40 bg-gray-100 rounded-lg mb-4"></div>
                <h3 class="font-semibold text-lg text-gray-800">{{ $item->judul }}</h3>
                <p class="text-gray-500 text-sm mt-1">{{ $item->penulis }}</p>
            </div>
        @endforeach
    </div>
</section>

@endsection
