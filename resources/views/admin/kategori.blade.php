@extends('layout.master')
@section('title', 'Kategori')

@section('content')

<div class="flex-1 min-w-0 pt-14 lg:pt-8">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Kelola Kategori
            </h1>

            <p class="text-sm text-slate-500 mt-1">
                Manajemen kategori koleksi perpustakaan digital
            </p>
        </div>

        <button
            data-modal-target="modal-kategori"
            data-modal-toggle="modal-kategori"
            type="button"
            class="
            inline-flex items-center gap-2
            px-5 py-3
            rounded-xl
            bg-gradient-to-r
            from-blue-500
            to-cyan-500
            text-white
            font-medium
            shadow-lg shadow-blue-500/20
            hover:scale-105
            transition">

            <svg class="w-4 h-4"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                viewBox="0 0 24 24">

                <path d="M12 5v14"/>
                <path d="M5 12h14"/>

            </svg>

            Tambah Kategori
        </button>

    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

        <div class="bg-gradient-to-r from-blue-500 to-cyan-500 rounded-2xl p-5 text-white">

            <p class="text-sm opacity-90">
                Total Kategori
            </p>

            <h3 class="text-3xl font-bold mt-1">
                {{ $data->count() }}
            </h3>

        </div>

        <div class="bg-white border border-slate-200 rounded-2xl p-5">

            <p class="text-sm text-slate-500">
                Kategori Aktif
            </p>

            <h3 class="text-3xl font-bold text-slate-800 mt-1">
                {{ $data->count() }}
            </h3>

        </div>

        <div class="bg-white border border-slate-200 rounded-2xl p-5">

            <p class="text-sm text-slate-500">
                Digital Library
            </p>

            <h3 class="text-3xl font-bold text-slate-800 mt-1">
                SiPerDig
            </h3>

        </div>

    </div>

    {{-- Filter --}}
    <form method="GET"
        action=""
        class="bg-white border border-slate-200 rounded-2xl p-4 mb-6">

        <div class="grid md:grid-cols-12 gap-3">

            <div class="md:col-span-8">

                <div class="relative">

                    <svg
                        class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24">

                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>

                    </svg>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari kategori..."
                        class="
                        w-full
                        pl-11
                        pr-4
                        py-3
                        rounded-xl
                        border
                        border-slate-200
                        focus:ring-2
                        focus:ring-blue-400
                        focus:outline-none">

                </div>

            </div>

            <div class="md:col-span-2">

                <button
                    type="submit"
                    class="
                    w-full
                    py-3
                    rounded-xl
                    bg-slate-800
                    text-white
                    hover:bg-slate-700
                    transition">

                    Filter

                </button>

            </div>

        </div>

    </form>

    {{-- Preview Card Kategori --}}
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4 mb-8">

        @foreach($data as $row)

        <div
            class="
            bg-white
            border border-slate-200
            rounded-2xl
            p-4
            hover:border-blue-400
            hover:shadow-lg
            transition">

            <div
                class="
                w-12 h-12
                rounded-xl
                bg-gradient-to-r
                from-blue-500
                to-cyan-500
                flex items-center justify-center
                text-white
                text-xl
                mb-3">

                <svg class="w-6 h-6"
    fill="none"
    stroke="currentColor"
    stroke-width="2"
    viewBox="0 0 24 24">

    <path d="M4 19.5A2.5 2.5 0 016.5 17H20"/>
    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/>

</svg>

            </div>

            <h3 class="font-semibold text-slate-800">
                {{ $row->nama_kategori }}
            </h3>

            <p class="text-xs text-slate-500 mt-1">
                Kategori Buku
            </p>

        </div>

        @endforeach

    </div>

    {{-- Tabel --}}
    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="bg-slate-50">

                        <th class="text-left px-6 py-4 text-xs font-semibold text-slate-500">
                            No
                        </th>

                        <th class="text-left px-6 py-4 text-xs font-semibold text-slate-500">
                            Nama Kategori
                        </th>

                        <th class="text-left px-6 py-4 text-xs font-semibold text-slate-500">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($data as $row)

                    <tr class="border-t border-slate-100 hover:bg-slate-50">

                        <td class="px-6 py-4">

                            <span
                                class="
                                w-7 h-7
                                rounded-full
                                bg-slate-100
                                flex items-center justify-center
                                text-xs font-semibold">

                                {{ $loop->iteration }}

                            </span>

                        </td>

                        <td class="px-6 py-4">

                            <span
                                class="
                                inline-flex
                                px-3 py-1
                                rounded-full
                                bg-blue-50
                                text-blue-700
                                text-xs
                                font-semibold">

                                {{ $row->nama_kategori }}

                            </span>

                        </td>

                        <td class="px-6 py-4">

                            <span
                                data-modal-target="modal-kategori-{{ $row->id_kategori }}"
                                data-modal-toggle="modal-kategori-{{ $row->id_kategori }}"
                                class="
                                inline-flex
                                items-center
                                gap-2
                                px-3 py-1.5
                                rounded-full
                                bg-gradient-to-r
                                from-blue-500
                                to-cyan-500
                                text-white
                                text-xs
                                font-medium
                                cursor-pointer
                                hover:shadow-lg
                                hover:shadow-blue-300/30
                                transition">

                                <svg class="w-4 h-4"
    fill="none"
    stroke="currentColor"
    stroke-width="2"
    viewBox="0 0 24 24">

    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8S1 12 1 12z"/>
    <circle cx="12" cy="12" r="3"/>

</svg>

<span>Detail</span>

                            </span>

                        </td>

                    </tr>

                    <x-modal
                        id="modal-kategori-{{ $row->id_kategori }}"
                        title="Edit Kategori">

                        <x-forms.form-kategori
                            :action="route('update.kategori')"
                            :kategori="$row" />

                    </x-modal>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

<x-modal id="modal-kategori" title="Tambah Kategori">
    <x-forms.form-kategori action="{{ route('tambah.kategori') }}" />
</x-modal>

@endsection