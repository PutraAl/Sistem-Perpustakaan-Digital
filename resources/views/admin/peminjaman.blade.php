@extends('layout.master')

@section('title', 'Peminjaman')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold bg-gradient-to-r from-blue-600 via-cyan-500 to-indigo-500 bg-clip-text text-transparent">
            Manajemen Peminjaman
        </h1>
        <p class="text-sm text-gray-500 mt-1">
            Kelola aktivitas peminjaman buku anggota perpustakaan
        </p>
    </div>
    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
        class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-gradient-to-r from-blue-500 to-cyan-500 text-white text-sm font-medium shadow-lg shadow-blue-200 hover:scale-105 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path d="M12 5v14M5 12h14"/>
        </svg>
        Tambah Peminjaman
    </button>
</div>

<!-- Flash Messages -->
@if(session('success'))
    <div class="mb-4 p-4 rounded-xl bg-green-50 border border-green-200 text-green-700 text-sm">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="mb-4 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm">
        {{ session('error') }}
    </div>
@endif

<!-- Filter & Search Modern (dengan Alpine.js) -->
<div x-data="{ open: true }" class="mb-6">
    <div class="bg-white/70 backdrop-blur-lg border border-white/30 rounded-2xl p-5 shadow-xl shadow-blue-100/50 transition-all duration-300">
        <!-- Header filter dengan toggle -->
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                </svg>
                <h3 class="text-sm font-semibold text-gray-700">Filter & Pencarian</h3>
            </div>
            <button @click="open = !open" class="text-gray-400 hover:text-blue-500 transition-transform" :class="{'rotate-180': !open}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
        </div>

        <!-- Konten filter (collapsible) -->
        <div x-show="open" x-collapse>
            <form method="GET" action="{{ route('admin.peminjaman') }}" class="space-y-4">
                <!-- Baris utama: search + status -->
                <div class="flex flex-col md:flex-row gap-3">
                    <!-- Search dengan icon -->
                    <div class="relative flex-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="8"/>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari judul buku atau nama anggota..."
                            class="w-full pl-12 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:ring-2 focus:ring-blue-400 focus:border-transparent outline-none transition-all placeholder:text-gray-400">
                    </div>

                    <!-- Status dropdown dengan badge -->
                    <div class="relative">
                        <select name="status"
                            class="appearance-none w-full md:w-44 rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 pr-10 focus:ring-2 focus:ring-blue-400 outline-none transition-all text-sm
                            @if(request('status') == 'dipinjam') border-blue-300 bg-blue-50 text-blue-700
                            @elseif(request('status') == 'terlambat') border-red-300 bg-red-50 text-red-700
                            @elseif(request('status') == 'dikembalikan') border-green-300 bg-green-50 text-green-700
                            @endif">
                            <option value="">Semua Status</option>
                            <option value="dipinjam" @selected(request('status')=='dipinjam')>Dipinjam</option>
                            <option value="dikembalikan" @selected(request('status')=='dikembalikan')>Dikembalikan</option>
                            <option value="terlambat" @selected(request('status')=='terlambat')>Terlambat</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M6 9l6 6 6-6"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Baris kedua: tanggal dan tombol -->
                <div class="flex flex-col sm:flex-row gap-3 items-start sm:items-end">
                    <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div class="relative">
                            <label class="text-xs font-medium text-gray-500 mb-1 block">Tanggal Mulai</label>
                            <input type="date" name="start_date" value="{{ request('start_date') }}"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 focus:ring-2 focus:ring-blue-400 outline-none transition-all">
                        </div>
                        <div class="relative">
                            <label class="text-xs font-medium text-gray-500 mb-1 block">Tanggal Akhir</label>
                            <input type="date" name="end_date" value="{{ request('end_date') }}"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 focus:ring-2 focus:ring-blue-400 outline-none transition-all">
                        </div>
                    </div>

                    <!-- Tombol aksi -->
                    <div class="flex gap-2 w-full sm:w-auto">
                        <button type="submit"
                            class="flex-1 sm:flex-none px-6 py-3 rounded-xl bg-gradient-to-r from-blue-500 to-cyan-500 text-white font-medium shadow-lg shadow-blue-200 hover:shadow-xl hover:scale-105 active:scale-95 transition-all duration-200 flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                            </svg>
                            Terapkan
                        </button>
                        @if(request()->anyFilled(['search','status','start_date','end_date']))
                        <a href="{{ route('admin.peminjaman') }}"
                            class="px-4 py-3 rounded-xl bg-gray-100 text-gray-500 hover:bg-gray-200 hover:text-gray-700 transition-all flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>

        <!-- Active filter pills -->
        @php
            $filters = [];
            if(request('search')) $filters[] = 'Pencarian: '.request('search');
            if(request('status')) $filters[] = 'Status: '.ucfirst(request('status'));
            if(request('start_date')) $filters[] = 'Dari: '.\Carbon\Carbon::parse(request('start_date'))->format('d M Y');
            if(request('end_date')) $filters[] = 'Sampai: '.\Carbon\Carbon::parse(request('end_date'))->format('d M Y');
        @endphp
        @if(count($filters))
        <div class="flex flex-wrap gap-2 mt-4 pt-4 border-t border-gray-100">
            @foreach($filters as $filter)
            <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-medium">
                {{ $filter }}
                <button onclick="this.closest('span').remove(); document.querySelector('form').submit();" class="hover:text-blue-900">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </span>
            @endforeach
        </div>
        @endif
    </div>
</div>

<!-- Tabel Data -->
<div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-lg">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gradient-to-r from-slate-50 to-blue-50">
                    <th class="text-left text-xs font-semibold text-gray-400 pb-2 pr-4 py-3 px-4">Judul Buku</th>
                    <th class="text-left text-xs font-semibold text-gray-400 pb-2 pr-4 py-3">Anggota</th>
                    <th class="text-left text-xs font-semibold text-gray-400 pb-2 pr-4 py-3 hidden sm:table-cell">Tanggal Pinjam</th>
                    <th class="text-left text-xs font-semibold text-gray-400 pb-2 pr-4 py-3 hidden sm:table-cell">Tanggal Tenggang</th>
                    <th class="text-left text-xs font-semibold text-gray-400 pb-2 py-3">Status</th>
                    <th class="text-left text-xs font-semibold text-gray-400 pb-2 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($data as $peminjaman)
                <tr class="hover:bg-blue-50/50 transition duration-200">
                    <td class="py-3 pr-4 text-gray-800 text-xs px-4">
                        {{ $peminjaman->detail->first()?->buku?->judul ?? '-' }}
                    </td>
                    <td class="py-3 pr-4 text-gray-600 text-xs">
                        {{ $peminjaman->user->name }}
                    </td>
                    <td class="py-3 pr-4 text-gray-500 text-xs hidden sm:table-cell">
                        {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y') }}
                    </td>
                    <td class="py-3 pr-4 text-gray-500 text-xs hidden sm:table-cell">
                        {{ \Carbon\Carbon::parse($peminjaman->tanggal_jatuh_tempo)->format('d M Y') }}
                    </td>
                    <td class="py-3">
                        @if($peminjaman->status == 'dipinjam')
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-blue-50 text-blue-700">Dipinjam</span>
                        @elseif($peminjaman->status == 'terlambat')
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-red-50 text-red-700">Terlambat</span>
                        @else
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-green-50 text-green-700">Dikembalikan</span>
                        @endif
                    </td>
                    <td class="py-3">
                        <button data-modal-target="detail-pinjam-{{ $peminjaman->id }}" data-modal-toggle="detail-pinjam-{{ $peminjaman->id }}"
                            class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-blue-400 text-white hover:cursor-pointer hover:bg-blue-500 transition">
                            Detail
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-6 text-gray-400">Belum ada data peminjaman</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Detail (menggunakan komponen x-modal) -->
@foreach($data as $peminjaman)
    <x-modal id="detail-pinjam-{{ $peminjaman->id }}" title="Detail Peminjaman">
        <x-forms.form-peminjaman :peminjaman="$peminjaman" />
    </x-modal>
@endforeach

<!-- Modal Tambah Peminjaman (mode create) -->
<x-modal id="crud-modal" title="Tambah Peminjaman Baru">
    <x-forms.form-peminjaman :peminjaman="null" :users="$users" :bukus="$bukus" />
</x-modal>

<!-- Script untuk TomSelect -->
<script>
    const bukusData = @json($bukus);

    let instances = [];

    function initSelect(el) {
        let ts = new TomSelect(el, {
            valueField: 'id_buku',
            labelField: 'judul',
            searchField: 'judul',
            options: [],
            openOnFocus: true,
            placeholder: 'Pilih buku...',
            onChange: function () {
                refreshAll();
            }
        });

        instances.push(ts);
        refreshAll();
    }

    function getSelectedValues() {
        return instances
            .map(i => String(i.getValue()))
            .filter(v => v !== "");
    }

    function refreshAll() {
        let selected = getSelectedValues();

        instances.forEach(ts => {
            let current = String(ts.getValue());

            ts.clearOptions();

            bukusData.forEach(buku => {
                let id = String(buku.id_buku);
                if (!selected.includes(id) || id === current) {
                    ts.addOption({ id_buku: id, judul: buku.judul });
                }
            });

            if (current) {
                ts.setValue(current, true);
            }

            ts.refreshOptions(false);
        });
    }

    function tambahBuku() {
        let wrapper = document.getElementById('bukuWrapper');

        let div = document.createElement('div');
        div.className = "buku-item border border-gray-100 rounded-lg p-3 space-y-2 bg-gray-50 relative";

        div.innerHTML = `
        <button type="button" onclick="removeBuku(this)"
            class="absolute top-2 right-2 text-gray-300 hover:text-red-400 transition">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        <div>
            <label class="block text-xs font-medium text-gray-600 mb-1">Buku</label>
            <select name="buku_id[]" class="bukuSelect w-full border border-gray-300 rounded-md px-3 py-2 text-xs"></select>
        </div>
        <div class="grid grid-cols-2 gap-2">
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Jumlah</label>
                <input type="number" name="jumlah[]" value="1" min="1"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Status Item</label>
                <select name="status_item[]"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    <option value="dipinjam" selected>Dipinjam</option>
                    <option value="dikembalikan">Dikembalikan</option>
                    <option value="rusak">Rusak</option>
                    <option value="hilang">Hilang</option>
                </select>
            </div>
        </div>
    `;

        wrapper.appendChild(div);
        initSelect(div.querySelector('.bukuSelect'));
    }

    function removeBuku(btn) {
        let div = btn.closest('.buku-item');
        let select = div.querySelector('.bukuSelect');
        let instance = instances.find(i => i.input === select);

        if (instance) {
            instance.destroy();
            instances = instances.filter(i => i !== instance);
        }

        div.remove();
        refreshAll();
    }

    document.addEventListener('DOMContentLoaded', () => {
        instances = [];
        document.querySelectorAll('.bukuSelect').forEach(el => initSelect(el));
    });
</script>
@endsection