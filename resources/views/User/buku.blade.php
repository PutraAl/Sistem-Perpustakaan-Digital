@extends('layout.app')
@section('title', 'Koleksi Buku')

@section('content')
<div class="flex-1 min-w-0 pt-14 lg:pt-8">
    {{-- Header & Tombol Tambah --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
        <div>
            <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">Koleksi Buku</h1>
            <p class="text-slate-500 mt-2 text-lg">Kelola koleksi buku digital perpustakaan</p>
        </div>
    </div>

    {{-- Filter Form --}}
    <form method="GET" action="{{ route('user.buku') }}" class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm mb-8">
        <div class="grid md:grid-cols-12 gap-4">
            <div class="md:col-span-6">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul buku..." class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div class="md:col-span-4">
                <select name="id_kategori" class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-400">
                    <option value="">Semua Kategori</option>
                    @foreach($kategori as $item)
                        <option value="{{ $item->id_kategori }}" {{ request('id_kategori') == $item->id_kategori ? 'selected' : '' }}>
                            {{ $item->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="md:col-span-2">
                <button type="submit" class="w-full py-3 rounded-2xl bg-gradient-to-r from-blue-500 to-cyan-500 text-white font-semibold">Filter</button>
            </div>
        </div>
    </form>

    {{-- Grid Buku (6 Kolom) --}}
    @if($buku->count() > 0)
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
        @foreach ($buku as $data)
            <div class="group bg-white rounded-2xl overflow-hidden border border-slate-200 hover:border-blue-400 hover:shadow-xl transition duration-300 flex flex-col">
                <div class="h-48 overflow-hidden bg-slate-100">
                    <img src="{{ asset('img/' . $data->foto) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div class="p-3 flex flex-col flex-1">
                    <span class="text-[10px] uppercase tracking-wider text-blue-600 font-bold">{{ $data->kategori->nama_kategori ?? 'Umum' }}</span>
                    <h2 class="font-bold text-slate-800 mt-1 line-clamp-1 text-sm">{{ $data->judul }}</h2>
                    <p class="text-xs text-slate-500">{{ $data->penulis }}</p>
                    <div class="flex items-center justify-between mt-auto pt-4">
                            <span
                                class="text-xs px-2 py-1 rounded-lg {{ $data->stok > 0 ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600' }}">
                                {{ $data->stok > 0 ? 'Tersedia: ' . $data->stok : 'Habis' }}
                            </span>
                        </div>
                    <div class="mt-auto pt-3 flex flex-col gap-2">
    {{-- Tombol Pinjam --}}
    @if($data->stok > 0)
      <form action="{{ route('user.buku.pinjam', $data->id_buku) }}" method="POST">
                                        @csrf
                                        <button type="submit" onclick="return confirm('Apakah anda yakin ingin meminjam buku ini?')"
                                            class="w-full bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white font-semibold py-2 rounded-xl transition-all shadow-md text-xs md:text-sm">
                                            Pinjam
                                        </button>
                                    </form>
      
    @else
        <button disabled class="w-full bg-slate-100 text-slate-400 font-semibold py-2 rounded-xl text-xs md:text-sm border border-slate-200 cursor-not-allowed">
            Habis
        </button>
    @endif

    {{-- Tombol Detail --}}
    <a href="{{ route('user.detail', $data->id_buku) }}"
        class="w-full text-center bg-white border border-blue-500 text-blue-600 hover:bg-blue-500 hover:text-white font-semibold py-2 rounded-xl transition-all text-xs md:text-sm">
        Detail
    </a>
</div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Paginasi (Tombol 1, 2, 3...) --}}
    <div class="mt-8">
        {{ $buku->links() }}
    </div>
    @else
        <p class="text-center text-slate-500 mt-10">Tidak ada buku ditemukan.</p>
    @endif
</div>
@endsection