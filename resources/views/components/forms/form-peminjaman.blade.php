@props(['peminjaman' => null, 'users' => [], 'bukus' => []])

@php
    $isEdit = isset($peminjaman) && $peminjaman;
    
    $statusBadge = [
        'menunggu_konfirmasi' => 'bg-amber-50 text-amber-700 border-amber-200',
        'dipinjam'            => 'bg-blue-50 text-blue-700 border-blue-200',
        'dikembalikan'        => 'bg-green-50 text-green-700 border-green-200',
        'terlambat'           => 'bg-red-50 text-red-700 border-red-200',
        'ditolak'             => 'bg-slate-100 text-slate-600 border-slate-200',
        'dibatalkan'          => 'bg-slate-100 text-slate-600 border-slate-200',
    ];
@endphp

<form method="POST"
    action="{{ $isEdit 
        ? route('admin.peminjaman.update', $peminjaman->id_peminjaman) 
        : route('admin.peminjaman.store') }}">
    
    @csrf
    @if($isEdit) @method('PUT') @endif

    @if(!$isEdit)
        {{-- ==================================================================== --}}
        {{-- KAMAR 1: MODE TAMBAH BARU (Haram ada pemanggilan $peminjaman->... disini) --}}
        {{-- ==================================================================== --}}
        <div>
            <label class="block text-xs font-medium text-gray-600 mb-1">Anggota</label>
            <select name="user_id" required class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 outline-none">
                <option value="" disabled selected>Pilih anggota...</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->nama ?? $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-2 gap-3 mt-3">
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" value="{{ date('Y-m-d') }}" required class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs outline-none">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Jatuh Tempo</label>
                <input type="date" name="tanggal_jatuh_tempo" value="{{ date('Y-m-d', strtotime('+7 days')) }}" required class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs outline-none">
            </div>
        </div>

        <hr class="border-gray-100 my-3">
        <p class="text-xs font-semibold text-gray-700 mb-2">Buku yang Dipinjam</p>

        <div id="bukuWrapper" class="space-y-3">
            <div class="buku-item border border-gray-100 rounded-lg p-3 space-y-2 bg-gray-50 relative">
                <button type="button" onclick="removeBuku(this)" class="absolute top-2 right-2 text-gray-300 hover:text-red-400 transition">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">Buku</label>
                    <select name="buku_id[]" class="bukuSelect w-full border border-gray-300 rounded-md px-3 py-2 text-xs" required></select>
                </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Jumlah</label>
                        <input type="number" name="jumlah[]" value="1" min="1" class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs">
                    </div>
            </div>
        </div>

        <div class="flex justify-between items-center mt-3 pt-2">
            <button type="button" onclick="tambahBuku()" class="text-xs text-blue-500 hover:underline flex items-center gap-1 font-semibold">
                + Tambah Buku Lain
            </button>
            <div class="flex gap-2">
                <button type="button" data-modal-hide="crud-modal" class="px-4 py-2 text-xs rounded-md border text-gray-600 hover:bg-gray-50">Batal</button>
                <button type="submit" class="px-4 py-2 text-xs rounded-md bg-blue-500 text-white hover:bg-blue-600">Simpan Peminjaman</button>
            </div>
        </div>

    @else
        {{-- ==================================================================== --}}
        {{-- KAMAR 2: MODE DETAIL & EDIT ADMIN (Disini baru boleh panggil datanya) --}}
        {{-- ==================================================================== --}}
        <div class="space-y-3 text-left">

            {{-- Nama Peminjam --}}
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Nama Peminjam</label>
                <input type="text" value="{{ $peminjaman->user?->nama ?? $peminjaman->user?->name ?? 'User Terhapus' }}" readonly
                    class="w-full border border-gray-200 bg-gray-50 rounded-md px-3 py-2 text-xs text-gray-800 font-bold cursor-not-allowed">
            </div>

            {{-- Grid Tanggal (BISA DIEDIT SEKARANG) --}}
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" value="{{ $peminjaman->tanggal_pinjam }}" required
                        class="w-full border border-gray-300 bg-white rounded-md px-3 py-2 text-xs text-gray-800 font-mono focus:ring-2 focus:ring-blue-400 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">Jatuh Tempo</label>
                    <input type="date" name="tanggal_jatuh_tempo" value="{{ $peminjaman->tanggal_jatuh_tempo }}" required
                        class="w-full border border-gray-300 bg-white rounded-md px-3 py-2 text-xs text-gray-800 font-mono focus:ring-2 focus:ring-blue-400 outline-none">
                </div>
            </div>

            {{-- KOTAK KENDALI ADMIN (Denda Otomatis + Ubah Status) --}}
            <div class="grid grid-cols-2 gap-3 items-end bg-blue-50/60 p-3 rounded-xl border border-blue-100">
                <div>
                    <label class="block text-xs font-bold text-red-600 mb-1">Total Denda</label>
                    <div class="relative">
                        <span class="absolute left-3 top-2 text-xs font-bold text-red-400">Rp</span>
                        {{-- MENGHITUNG DENDA SECARA LIVE MENGGUNAKAN RUMUSMU --}}
                        <input type="text" value="{{ number_format($peminjaman->hitungDenda(), 0, ',', '.') }}" readonly
                            class="w-full border border-red-200 bg-white rounded-md pl-8 pr-3 py-2 text-xs text-red-700 font-black">
                    </div>
                    @if($peminjaman->hitungHariTerlambat() > 0)
                        <span class="text-[10px] text-red-500 font-bold block mt-1">
                            Telat {{ $peminjaman->hitungHariTerlambat() }} hari (Rp3k/hari)
                        </span>
                    @endif
                </div>

                <div>
                    <label class="block text-xs font-bold text-blue-800 mb-1">Ubah Status Transaksi</label>
                    <select name="status" class="w-full border border-blue-300 bg-white rounded-md px-3 py-2 text-xs font-bold text-blue-900 focus:ring-2 focus:ring-blue-500 outline-none cursor-pointer shadow-2xs">
                        <option value="menunggu_konfirmasi" @selected($peminjaman->status == 'menunggu_konfirmasi')>⏳ Menunggu ACC</option>
                        <option value="dipinjam" @selected($peminjaman->status == 'dipinjam')>📖 Dipinjam</option>
                        <option value="dikembalikan" @selected($peminjaman->status == 'dikembalikan')>✅ Dikembalikan</option>
                        <option value="terlambat" @selected($peminjaman->status == 'terlambat')>⚠️ Terlambat</option>
                        <option value="ditolak" @selected(in_array($peminjaman->status, ['ditolak', 'dibatalkan']))>❌ Batalkan / Tolak</option>
                    </select>
                </div>
            </div>

            <hr class="border-gray-100 my-3">
            
            <div class="flex justify-between items-center mb-1">
                <p class="text-xs font-bold text-gray-500 uppercase tracking-wider">Daftar Buku Yang Dipinjam</p>
                <span class="text-[11px] font-bold text-blue-600">{{ $peminjaman->detail->sum('jumlah') }} </span>
            </div>

            {{-- Daftar Buku --}}
            <div class="space-y-2 max-h-48 overflow-y-auto pr-1">
                @foreach($peminjaman->detail as $item)
                    @php $itemBadge = $statusBadge[$item->status_item] ?? 'bg-gray-100 text-gray-500'; @endphp
                    <div class="flex items-center justify-between bg-white border border-gray-100 rounded-xl p-2.5 shadow-2xs">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('buku/' . ($item->buku?->foto ?? 'default.png')) }}" 
                                onerror="this.src='https://placehold.co/100x150?text=No+Cover';"
                                class="w-9 h-12 object-cover rounded shadow-2xs border border-gray-100">
                            <div>
                          <p class="text-xs font-bold text-gray-800 line-clamp-1">{{ $item->buku?->judul ?? 'Buku Terhapus' }}</p>

                        {{-- <label class="block text-xs font-medium text-gray-600 mb-1">Jumlah</label>
                        <input type="number" name="jumlah[]" value="1" min="1" 
                            class="input-jumlah w-full border border-gray-300 rounded-md px-3 py-2 text-xs"
                            oninput="if(this.max && parseInt(this.value) > parseInt(this.max)) { this.value = this.max; }"> --}}
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
                    </div>
                @endforeach
            </div>

            {{-- Tombol Simpan Admin --}}
            <div class="flex justify-end gap-2 pt-3 border-t border-gray-100">
                <button type="button" data-modal-hide="detail-pinjam-{{ $peminjaman->id_peminjaman }}" class="px-4 py-2 text-xs rounded-md border text-gray-600 hover:bg-gray-50">Tutup</button>
                <button type="submit" class="px-4 py-2 text-xs rounded-md bg-blue-600 text-white hover:bg-blue-700 font-semibold shadow-sm">Simpan Perubahan Status</button>
            </div>

        </div>
    @endif
</form>