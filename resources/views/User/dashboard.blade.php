@extends('layout.app')

@section('content')
<div class="p-6">

    {{-- TITLE --}}
    <h1 class="text-2xl font-bold text-gray-800 mb-2">Dashboard Anggota</h1>
    <p class="text-gray-500 mb-6">Selamat datang, Admin 👋</p>

    {{-- CARD MENU --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- CARD BUKU --}}
        <a href="/buku"
            class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition border border-gray-100 flex items-center gap-4">

            {{-- ICON --}}
            <div class="bg-blue-100 text-blue-600 p-3 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M4 19.5A2.5 2.5 0 016.5 17H20"/>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/>
                </svg>
            </div>

            <div>
                <h2 class="font-semibold text-gray-800">Daftar Buku</h2>
                <p class="text-sm text-gray-500">Lihat dan cari buku yang tersedia</p>
            </div>
        </a>

        {{-- CARD RIWAYAT --}}
        <a href="{{ route('user.riwayat') }}"
            class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition border border-gray-100 flex items-center gap-4">

            {{-- ICON --}}
            <div class="bg-green-100 text-green-600 p-3 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M12 8v4l3 3"/>
                    <circle cx="12" cy="12" r="10"/>
                </svg>
            </div>

            <div>
                <h2 class="font-semibold text-gray-800">Riwayat Peminjaman</h2>
                <p class="text-sm text-gray-500">Lihat buku yang pernah dipinjam</p>
            </div>
        </a>

    </div>

</div>
@endsection