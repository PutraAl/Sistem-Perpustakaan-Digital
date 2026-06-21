@extends('layout.master')
@section('title', 'Buku')

@section('content')
    <div class="flex-1 min-w-0 pt-14 lg:pt-8">

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">

            <div>

                <h1 class="text-4xl font-bold
                                        bg-gradient-to-r
                                        from-blue-600
                                        to-cyan-500
                                        bg-clip-text
                                        text-transparent">

                    Koleksi Buku

                </h1>

                <p class="text-slate-500 mt-2 text-lg">
                    Kelola koleksi buku digital perpustakaan
                </p>

            </div>

            <button data-modal-target="modal-buku" data-modal-toggle="modal-buku" type="button" class="
                                    mt-4 lg:mt-0
                                    inline-flex items-center gap-2
                                    px-6 py-4
                                    rounded-2xl
                                    bg-gradient-to-r
                                    from-blue-500
                                    to-cyan-500
                                    text-white
                                    font-semibold
                                    shadow-lg shadow-blue-500/20
                                    hover:scale-105
                                    transition">

                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">

                    <path d="M12 5v14" />
                    <path d="M5 12h14" />

                </svg>

                Tambah Buku

            </button>

        </div>




        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="bg-white rounded-2xl border p-5">
                <p class="text-sm text-slate-500">Total Buku</p>
                <h2 class="text-3xl font-bold text-slate-800">
                    {{ $totalBuku }} {{-- <-- Ganti jadi ini --}} </h2>
            </div>

            <div class="bg-white rounded-2xl border p-5">
                <p class="text-sm text-slate-500">
                    Kategori
                </p>

                <h2 class="text-3xl font-bold text-slate-800">
                    {{ $kategori->count() }}
                </h2>
            </div>

            <div class="bg-white rounded-2xl border p-5">
                <p class="text-sm text-slate-500">
                    Status Sistem
                </p>

                <h2 class="text-3xl font-bold text-green-600">
                    Online
                </h2>
            </div>

        </div>


        <form method="GET" action="" class="
                                bg-white
                                rounded-3xl
                                border border-slate-200
                                p-6
                                shadow-sm
                                mb-6">

            <div class="flex items-center gap-3 mb-5">

                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">

                    <circle cx="11" cy="11" r="8" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />

                </svg>

                <h3 class="font-semibold text-slate-700">
                    Filter & Pencarian
                </h3>

            </div>

            <div class="grid md:grid-cols-12 gap-4">

                <div class="md:col-span-6">

                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul buku..." class="
                                            w-full
                                            rounded-2xl
                                            border border-slate-200
                                            px-4 py-3
                                            focus:ring-2
                                            focus:ring-blue-400
                                            focus:outline-none">

                </div>

                <div class="md:col-span-4">


                        <select name="id_kategori"
                            class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-400">
                            <option value="">Semua Kategori</option>
                            @foreach($kategori as $item)
                                <option value="{{ $item->id_kategori }}" {{ request('id_kategori') == $item->id_kategori ? 'selected' : '' }}>
                                    {{ $item->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                </div>

                <div class="md:col-span-2">

                    <button type="submit" class="
                                            w-full
                                            py-3
                                            rounded-2xl
                                            bg-gradient-to-r
                                            from-blue-500
                                            to-cyan-500
                                            text-white
                                            font-semibold">

                        Filter

                    </button>

                </div>

            </div>

        </form>


        <div class="
                                grid
                                grid-cols-2
                                md:grid-cols-3
                                lg:grid-cols-4
                                xl:grid-cols-5
                                gap-6">
            {{-- BAGIAN CARD LOOPING BUKU --}}
            @foreach ($buku as $data)
                <div
                    class="group bg-white rounded-2xl overflow-hidden border border-slate-200 hover:border-blue-400 hover:shadow-xl transition duration-300 flex flex-col">
                    <div class="overflow-hidden h-64 bg-slate-100">
                        <img src="{{ asset('img/' . $data->foto) }}"
                            onerror="this.onerror=null; this.src='https://placehold.co/400x600?text=No+Cover';"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <span class="inline-flex px-2 py-1 text-xs rounded-full bg-blue-50 text-blue-600 font-medium w-max">
                            {{ $data->kategori->nama_kategori ?? 'Tanpa Kategori' }}
                        </span>
                        <h2 class="font-bold text-slate-800 mt-3 line-clamp-2">
                            {{ $data->judul }}
                        </h2>
                        <p class="text-sm text-slate-500 mt-1">
                            {{ $data->penulis }}
                        </p>
                        <div class="flex items-center justify-between mt-auto pt-4">
                            <span
                                class="text-xs px-2 py-1 rounded-lg {{ $data->stok > 0 ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600' }}">
                                {{ $data->stok > 0 ? 'Tersedia: ' . $data->stok : 'Habis' }}
                            </span>
                            <button data-modal-target="edit-buku-{{ $data->id_buku }}"
                                data-modal-toggle="edit-buku-{{ $data->id_buku }}"
                                class="px-4 py-2 rounded-xl bg-gradient-to-r from-blue-500 to-cyan-500 text-white text-sm hover:shadow-lg transition">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>

                <x-modal id="edit-buku-{{ $data->id_buku }}" title="Edit Buku">
                    <x-forms.form-buku action="{{ route('buku.update') }}" method="PUT" :buku="$data" :kategoris="$kategori" />
                </x-modal>
            @endforeach
        </div>
        {{-- 🚀 TOMBOL PAGINATION 1, 2, 3 LETAKKAN DISINI --}}
        <div class="mt-8">
            {{ $buku->links() }}
        </div>

        <x-modal id="modal-buku" title="Tambah Buku">
            <x-forms.form-buku action="{{ route('buku.store') }}" method="POST" :kategoris="$kategori" /> </x-modal>

@endsection