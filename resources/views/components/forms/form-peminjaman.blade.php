@props(['peminjaman' => null, 'users' => [], 'bukus' => []])

@php
    $isEdit = isset($peminjaman) && $peminjaman;
@endphp

<form method="POST"
    action="{{ $isEdit 
        ? route('admin.peminjaman.update', $peminjaman->id_peminjaman) 
        : route('admin.peminjaman.store') }}">
    
    @csrf

    @if($isEdit)
        @method('PUT')
    @endif

    @if(!$isEdit)
        {{-- ADD MODE --}}
        <div>
            <label class="block text-xs font-medium text-gray-600 mb-1">Anggota</label>
            <select name="user_id" required
                class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none">
                <option value="" disabled selected>Pilih anggota...</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-2 gap-3">
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" value="{{ date('Y-m-d') }}" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Tanggal Jatuh Tempo</label>
                <input type="date" name="tanggal_jatuh_tempo" value="{{ date('Y-m-d', strtotime('+14 days')) }}" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
        </div>

        <hr class="border-gray-100">
        <p class="text-xs font-semibold text-gray-700">Buku yang Dipinjam</p>

        <div id="bukuWrapper" class="space-y-3">
            <div class="buku-item border border-gray-100 rounded-lg p-3 space-y-2 bg-gray-50 relative">
                <button type="button" onclick="removeBuku(this)"
                    class="absolute top-2 right-2 text-gray-300 hover:text-red-400 transition">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">Buku</label>
                    <select name="buku_id[]" class="bukuSelect w-full border border-gray-300 rounded-md px-3 py-2 text-xs" required></select>
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
            </div>
        </div>

        <button type="button" onclick="tambahBuku()" class="text-xs text-blue-500 hover:underline flex items-center gap-1">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 5v14M5 12h14"/>
            </svg>
            Tambah Buku Lain
        </button>

        <div class="flex justify-end gap-2 pt-2">
            <button type="button" data-modal-hide="crud-modal"
                class="px-4 py-2 text-xs rounded-md border border-gray-300 text-gray-600 hover:bg-gray-50 transition">Batal</button>
            <button type="submit"
                class="px-4 py-2 text-xs rounded-md bg-blue-500 text-white hover:bg-blue-600 transition">Simpan Peminjaman</button>
        </div>

    @else
        {{-- EDIT / DETAIL MODE --}}
        <div>
            <label class="block text-xs font-medium text-gray-600 mb-1">Anggota</label>
            <input type="text" value="{{ $peminjaman->user->name }}" readonly
                class="w-full border border-gray-200 bg-gray-50 rounded-md px-3 py-2 text-xs text-gray-500 cursor-not-allowed">
        </div>

        <div class="grid grid-cols-2 gap-3">
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" value="{{ $peminjaman->tanggal_pinjam }}" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Tanggal Jatuh Tempo</label>
                <input type="date" name="tanggal_jatuh_tempo" value="{{ $peminjaman->tanggal_jatuh_tempo }}" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
        </div>

        <div>
            <label class="block text-xs font-medium text-gray-600 mb-1">Status</label>
            <select name="status"
                class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none">
                <option value="dipinjam" {{ $peminjaman->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                <option value="dikembalikan" {{ $peminjaman->status == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                <option value="terlambat" {{ $peminjaman->status == 'terlambat' ? 'selected' : '' }}>Terlambat</option>
            </select>
        </div>

        <!-- Detail Buku (readonly) -->
        <div>
            <p class="text-xs font-semibold text-gray-700 mb-2">Detail Buku</p>
            <div class="space-y-2">
                @foreach($peminjaman->detail as $item)
                <div class="flex items-center justify-between bg-gray-50 border border-gray-100 rounded-md px-3 py-2.5">
                    <div>
                        <p class="text-xs font-medium text-gray-800">{{ $item->buku->judul }}</p>
                        <p class="text-[11px] text-gray-400 mt-0.5">
                            Jumlah: {{ $item->jumlah }} · Denda: Rp {{ number_format($item->denda, 0, ',', '.') }}
                        </p>
                        @if($item->tanggal_kembali)
                            <p class="text-[11px] text-gray-400">Kembali: {{ $item->tanggal_kembali }}</p>
                        @endif
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold
                        @if($item->status == 'dipinjam') bg-blue-50 text-blue-700
                        @elseif($item->status == 'dikembalikan') bg-green-50 text-green-700
                        @else bg-red-50 text-red-700
                        @endif">
                        {{ ucfirst($item->status) }}
                    </span>
                </div>
                @endforeach
            </div>
        </div>

        <div class="flex justify-end gap-2 pt-2">
            <button type="button" data-modal-hide="detail-pinjam-{{ $peminjaman->id }}"
                class="px-4 py-2 text-xs rounded-md border border-gray-300 text-gray-600 hover:bg-gray-50 transition">Batal</button>
            <button type="submit"
                class="px-4 py-2 text-xs rounded-md bg-blue-500 text-white hover:bg-blue-600 transition">Simpan Perubahan</button>
        </div>
    @endif
</form>