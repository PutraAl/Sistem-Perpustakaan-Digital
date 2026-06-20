@extends('layout.app')

@section('content')
    <div class="flex-1 min-w-0 pt-14 lg:pt-8 bg-white rounded-xl border border-gray-200 p-4">
        <div class="flex items-center justify-center mb-4">
            <div>
                <p class="text-md font-semibold text-gray-800">Selamat datang di Perpustakaan Digital</p>
            </div>


        </div>
        <form method="GET" action="" class="w-full bg-white p-3 mb-4 md:p-4 rounded-lg border border-gray-200">

            <div class="grid grid-cols-1 md:grid-cols-12 gap-2 md:gap-3">

                <div class="md:col-span-4">
                    <div
                        class="flex items-center bg-gray-50 border border-gray-300 rounded-md px-2 py-1.5 md:px-3 md:py-2 focus-within:ring-1 md:focus-within:ring-2 focus-within:ring-blue-400 ">

                        <svg class="w-3.5 h-3.5 md:w-4 md:h-4 text-gray-400 mr-2" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg>

                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari..."
                            class="w-full bg-transparent text-xs md:text-sm focus:outline-none">
                    </div>
                </div>
                <div class="md:col-span-2">
                    <select name="status"
                        class="w-full border border-gray-300 rounded-md px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm focus:ring-1 md:focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        <option value="">Semua Kategori</option>
                        @foreach($kategori as $kat)
                            <option value="{{ $kat->id_kategori }}">
                                {{ $kat->nama_kategori }}
                            </option>
                        @endforeach

                        </option>

                    </select>
                </div>
                <!-- 🔘 Button -->
                <div class="md:col-span-2">
                    <button type="submit"
                        class="w-full bg-blue-500 text-white px-3 py-1.5 md:px-4 md:py-2 rounded-md text-xs md:text-sm hover:bg-blue-600 transition">
                        Filter
                    </button>
                </div>

            </div>

        </form>

        @if($buku->count() > 0)
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
                @foreach($buku as $data)
                    <div class="bg-white rounded-xl shadow overflow-hidden">
                        <img src="{{ asset('img/' . $data->foto) }}" class="w-full h-40 object-cover">
                        <div class="p-4">
                            <h2 class="font-bold text-center">{{ $data->judul }}</h2>

                            <div class="flex items-center justify-center gap-2 mt-3 mx-2 mb-2">

                                {{-- LOGIKA PINTAR: Cek stok. Kalau habis, tombol pinjam diganti tulisan "Habis" --}}
                                @if($data->stok > 0)
                                    <form action="{{ route('user.buku.pinjam', $data->id_buku) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="bg-green-500 hover:bg-green-600 text-white font-medium py-1 px-4 rounded-md transition shadow-sm text-xs md:text-sm">
                                            Pinjam
                                        </button>
                                    </form>
                                @else
                                    <span
                                        class="bg-slate-100 text-slate-400 font-medium py-1 px-4 rounded-md text-xs md:text-sm cursor-not-allowed border border-slate-200">
                                        Habis
                                    </span>
                                @endif

                                <a href="{{ route('user.detail', $data->id_buku) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-1 px-4 rounded-md transition shadow-sm text-xs md:text-sm">
                                    Detail
                                </a>

                            </div>
                        </div>
                    </div>

                @endforeach

        @else
                <p class="text-md font-semibold text-center text-gray-800">Tidak Ada Buku Yang Tersedia</p>
            @endif
        </div>

    </div>
@endsection