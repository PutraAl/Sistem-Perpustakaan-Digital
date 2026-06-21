@props([
    'peminjaman' => null
])

@php
    // Palet warna otomatis untuk status utama maupun status per-buku
    $statusBadge = [
        'menunggu_konfirmasi' => 'bg-amber-50 text-amber-700 border-amber-200',
        'dipinjam'            => 'bg-blue-50 text-blue-700 border-blue-200',
        'dikembalikan'        => 'bg-green-50 text-green-700 border-green-200',
        'terlambat'           => 'bg-red-50 text-red-700 border-red-200',
        'ditolak'             => 'bg-slate-100 text-slate-600 border-slate-200',
    ];
@endphp

@if($peminjaman)
    <div class="mt-2 space-y-3">

        {{-- Anggota --}}
        <div>
            <label class="block text-xs font-medium text-gray-600 mb-1">Nama Peminjam</label>
            <input type="text" value="{{ $peminjaman->user?->nama ?? 'User Tidak Dikenal' }}" readonly
                class="w-full border border-gray-200 bg-gray-50 rounded-md px-3 py-2 text-xs text-gray-700 font-semibold cursor-not-allowed">
        </div>

        {{-- Grid Tanggal --}}
        <div class="grid grid-cols-2 gap-3">
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Tanggal Pinjam</label>
                <input type="date" value="{{ $peminjaman->tanggal_pinjam }}" disabled
                    class="w-full border border-gray-200 bg-gray-50 rounded-md px-3 py-2 text-xs text-gray-600 cursor-not-allowed">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Jatuh Tempo</label>
                <input type="date" value="{{ $peminjaman->tanggal_jatuh_tempo }}" disabled
                    class="w-full border border-gray-200 bg-gray-50 rounded-md px-3 py-2 text-xs text-gray-600 cursor-not-allowed">
            </div>
        </div>

        {{-- Grid Denda & Status Utama --}}
        <div class="grid grid-cols-2 gap-3 items-end">
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Akumulasi Denda</label>
                <div class="relative">
                    <span class="absolute left-3 top-2 text-xs font-bold text-gray-400">Rp</span>
                    <input type="text" value="{{ number_format($peminjaman->denda, 0, ',', '.') }}" disabled
                        class="w-full border border-gray-200 bg-gray-50 rounded-md pl-8 pr-3 py-2 text-xs text-gray-700 font-bold cursor-not-allowed">
                </div>
            </div>

            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Status Pengajuan</label>
                @php $badgeClass = $statusBadge[$peminjaman->status] ?? 'bg-gray-100 text-gray-600'; @endphp
                <div class="w-full border rounded-md px-3 py-1.5 text-xs font-bold uppercase text-center tracking-wider {{ $badgeClass }}">
                    {{ str_replace('_', ' ', $peminjaman->status) }}
                </div>
            </div>
        </div>

        <hr class="border-gray-100 my-4">

        <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Item Buku Yang Dipinjam</p>
        
        {{-- Daftar Buku (Diberi max-height agar bisa di-scroll jika pinjam banyak buku) --}}
        <div class="space-y-2 max-h-52 overflow-y-auto pr-1">
            @foreach($peminjaman->detail as $item)
                @php 
                    $itemBadge = $statusBadge[$item->status_item] ?? 'bg-gray-100 text-gray-500'; 
                @endphp
                
                <div class="flex items-center justify-between bg-gray-50/80 border border-gray-100 rounded-lg p-2 hover:bg-gray-50 transition">
                    <div class="flex items-center gap-3">
                        {{-- Thumbnail Cover Buku --}}
                        <img src="{{ asset('img/' . ($item->buku?->foto ?? 'default.png')) }}" 
                             onerror="this.src='https://placehold.co/100x150?text=No+Cover';"
                             class="w-9 h-12 object-cover rounded shadow-2xs">
                        <div>
                            <p class="text-xs font-bold text-gray-800 line-clamp-1">{{ $item->buku?->judul ?? 'Buku Terhapus' }}</p>
                            <p class="text-[11px] text-gray-500 mt-0.5 font-medium">
                                Qty: {{ $item->jumlah }}
                                @if($item->denda_item > 0)
                                    <span class="text-red-500 font-bold ml-1">· Denda: Rp {{ number_format($item->denda_item, 0, ',', '.') }}</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="text-right">
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider border {{ $itemBadge }}">
                            @if($peminjaman->status == 'menunggu_konfirmasi')
                    {{ str_replace('_', ' ', 'Menunggu Konfirmasi') }}
                @else

                            {{ str_replace('_', ' ', $item->status_item) }}
                            @endif
                        </span>
                        @if($item->tanggal_kembali)
                            <p class="text-[9px] text-gray-400 mt-1">Kembali: {{ date('d/m/y', strtotime($item->tanggal_kembali)) }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@else
    <div class="py-8 text-center text-xs text-gray-400 font-medium">
        Terjadi kesalahan: Data peminjaman tidak ditemukan.
    </div>
@endif
