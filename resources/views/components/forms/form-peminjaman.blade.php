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
        
        <div>
            <label class="block text-xs font-medium text-gray-600 mb-1">Anggota</label>
            <select name="user_id" required
                class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none">
                <option value="" disabled selected>Pilih anggota...</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->nama }}</option>
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
            <input type="text" value="{{ $peminjaman->user->nama }}" readonly
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
           <div>
            <label class="block text-xs font-medium text-gray-600 mb-1">Status</label>
            <select name="status" class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none">
                <option value="dipinjam" {{ $peminjaman->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                <option value="dikembalikan" {{ $peminjaman->status == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                <option value="terlambat" {{ $peminjaman->status == 'terlambat' ? 'selected' : '' }}>Terlambat</option>
                
                {{-- TAMBAHKAN BARIS INI: --}}
                <option value="ditolak" {{ in_array($peminjaman->status, ['ditolak', 'dibatalkan']) ? 'selected' : '' }}>Dibatalkan / Ditolak</option>
            </select>
        </div>
        </div>

          <hr class="border-gray-100 my-4">

        <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Item Buku Yang Dipinjam</p>
        <!-- Detail Buku (readonly) -->
          <div class="space-y-2 max-h-52 overflow-y-auto pr-1">
            @foreach($peminjaman->detail as $item)
                @php 
                    $itemBadge = $statusBadge[$item->status_item] ?? 'bg-gray-100 text-gray-500'; 
                @endphp
                
                <div class="flex items-center justify-between bg-gray-50/80 border border-gray-100 rounded-lg p-2 hover:bg-gray-50 transition">
                    <div class="flex items-center gap-3">
                        {{-- Thumbnail Cover Buku --}}
                        <img src="{{ asset('buku/' . ($item->buku?->foto ?? 'default.png')) }}" 
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

        <div class="flex justify-end gap-2 pt-2">
            <button type="button" data-modal-hide="detail-pinjam-{{ $peminjaman->id }}"
                class="px-4 py-2 text-xs rounded-md border border-gray-300 text-gray-600 hover:bg-gray-50 transition">Batal</button>
            <button type="submit"
                class="px-4 py-2 text-xs rounded-md bg-blue-500 text-white hover:bg-blue-600 transition">Simpan Perubahan</button>
        </div>
    @endif
</form>