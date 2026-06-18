@extends('layout.app')

@section('content')
<div class="space-y-6">

    {{-- Hero Banner --}}
    <div class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-700 rounded-2xl p-7 md:p-9 text-white shadow-lg">
        {{-- Dot pattern background --}}
        <div class="absolute inset-0 opacity-10">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="dots" x="0" y="0" width="24" height="24" patternUnits="userSpaceOnUse">
                        <circle cx="2" cy="2" r="1.5" fill="white"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#dots)"/>
            </svg>
        </div>
        {{-- Decorative circle --}}
        <div class="absolute -right-10 -top-10 w-52 h-52 bg-white/10 rounded-full"></div>
        <div class="absolute -right-4 top-16 w-32 h-32 bg-white/5 rounded-full"></div>

        <div class="relative z-10">
            <p class="text-blue-200 text-sm font-medium mb-1 tracking-wide uppercase">Dashboard</p>
            <h1 class="text-2xl md:text-3xl font-bold mb-2">
                Halo, {{ auth()->user()->name ?? 'Peter' }} 👋
            </h1>
            <p class="text-blue-100 text-sm md:text-base max-w-lg">
                Selamat datang di Sistem Perpustakaan Digital.
                Temukan buku favoritmu dan kelola peminjaman dengan mudah.
            </p>
            <div class="flex items-center gap-3 mt-5">
                <a href="/buku"
                    class="inline-flex items-center gap-2 bg-white text-blue-600 px-5 py-2.5 rounded-xl font-semibold text-sm hover:bg-blue-50 active:scale-95 transition-all shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                    Cari Buku
                </a>
                <span class="text-blue-200 text-xs">{{ now()->translatedFormat('d F Y') }}</span>
            </div>
        </div>
    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm text-gray-500 font-medium">Total Buku</span>
                <div class="w-9 h-9 rounded-xl bg-blue-50 flex items-center justify-center">
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                    </svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-gray-900 mb-1">{{ $totalBuku ?? 0 }}</p>
            <p class="text-xs text-gray-400">Koleksi tersedia</p>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm text-gray-500 font-medium">Sedang Dipinjam</span>
                <div class="w-9 h-9 rounded-xl bg-amber-50 flex items-center justify-center">
                    <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                    </svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-gray-900 mb-1">{{ $dipinjam ?? 0 }}</p>
            <p class="text-xs text-gray-400">Buku aktif dipinjam</p>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm text-gray-500 font-medium">Riwayat Peminjaman</span>
                <div class="w-9 h-9 rounded-xl bg-green-50 flex items-center justify-center">
                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
                    </svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-gray-900 mb-1">{{ $riwayat ?? 0 }}</p>
            <p class="text-xs text-gray-400">Total transaksi</p>
        </div>

    </div>

    {{-- Akses Cepat --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-50">
            <h2 class="text-sm font-semibold text-gray-800">Akses Cepat</h2>
        </div>
        <div class="p-3 flex flex-col gap-1">

            <a href="/buku"
                class="flex items-center gap-4 px-4 py-3.5 rounded-xl hover:bg-gray-50 transition-colors group">
                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center flex-shrink-0 group-hover:bg-blue-100 transition-colors">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-800">Daftar Buku</p>
                    <p class="text-xs text-gray-400 mt-0.5">Cari dan lihat buku yang tersedia</p>
                </div>
                <svg class="w-4 h-4 text-gray-300 group-hover:text-gray-400 group-hover:translate-x-0.5 transition-all" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <polyline points="9 18 15 12 9 6"/>
                </svg>
            </a>

            <div class="h-px bg-gray-50 mx-4"></div>

            <a href="{{ route('user.riwayat') }}"
                class="flex items-center gap-4 px-4 py-3.5 rounded-xl hover:bg-gray-50 transition-colors group">
                <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center flex-shrink-0 group-hover:bg-green-100 transition-colors">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-800">Riwayat Peminjaman</p>
                    <p class="text-xs text-gray-400 mt-0.5">Lihat semua riwayat peminjaman kamu</p>
                </div>
                <svg class="w-4 h-4 text-gray-300 group-hover:text-gray-400 group-hover:translate-x-0.5 transition-all" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <polyline points="9 18 15 12 9 6"/>
                </svg>
            </a>

        </div>
    </div>

    {{-- Informasi Perpustakaan --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        {{-- Aturan Peminjaman --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-50 flex items-center gap-2">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
                <h2 class="text-sm font-semibold text-gray-800">Aturan Peminjaman</h2>
            </div>
            <div class="p-5 space-y-3">
                @foreach([
                    ['icon' => 'check', 'color' => 'blue', 'text' => 'Maksimal <strong>3 buku</strong> dipinjam sekaligus'],
                    ['icon' => 'check', 'color' => 'blue', 'text' => 'Masa pinjam <strong>7 hari</strong>'],
                    ['icon' => 'check', 'color' => 'blue', 'text' => 'Dapat diperpanjang sebelum jatuh tempo'],
                    ['icon' => 'warn',  'color' => 'amber', 'text' => 'Keterlambatan dikenakan <strong>denda</strong>'],
                ] as $rule)
                <div class="flex items-start gap-3">
                    <div class="w-5 h-5 rounded-full flex-shrink-0 mt-0.5 flex items-center justify-center
                        {{ $rule['color'] === 'blue' ? 'bg-blue-50' : 'bg-amber-50' }}">
                        @if($rule['icon'] === 'check')
                            <svg class="w-2.5 h-2.5 text-blue-600" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                        @else
                            <svg class="w-2.5 h-2.5 text-amber-500" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/>
                            </svg>
                        @endif
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed">{!! $rule['text'] !!}</p>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Jam Operasional --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-50 flex items-center gap-2">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                </svg>
                <h2 class="text-sm font-semibold text-gray-800">Jam Operasional</h2>
            </div>
            <div class="p-5 space-y-2.5">
                <div class="flex justify-between items-center bg-gray-50 rounded-xl px-4 py-3">
                    <span class="text-sm text-gray-600">Senin – Jumat</span>
                    <span class="text-sm font-semibold text-green-600">08.00 – 17.00</span>
                </div>
                <div class="flex justify-between items-center bg-gray-50 rounded-xl px-4 py-3">
                    <span class="text-sm text-gray-600">Sabtu</span>
                    <span class="text-sm font-semibold text-amber-500">08.00 – 12.00</span>
                </div>
                <div class="flex justify-between items-center bg-gray-50 rounded-xl px-4 py-3">
                    <span class="text-sm text-gray-600">Minggu</span>
                    <span class="text-sm font-semibold text-red-500">Tutup</span>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection