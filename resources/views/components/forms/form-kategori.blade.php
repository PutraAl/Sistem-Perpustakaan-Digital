@props([
    'action' => '#',
    'method' => 'POST',
    'kategori' => null
])

<div class="flex flex-col gap-2">
    {{-- Main Form (ID dibuat dinamis menggunakan id_kategori) --}}
    <form id="form-kategori-{{ $kategori ? $kategori->id_kategori : 'add' }}" action="{{ $action }}" method="POST" class="flex flex-col gap-5">
        @csrf
        @if($method !== 'POST')
            @method($method)
        @endif

        @if($kategori)
            <input type="hidden" name="id_kategori" value="{{ $kategori->id_kategori }}">
        @endif

        <div class="space-y-1.5">
            <label for="nama_kategori" class="block text-sm font-medium text-slate-700">Nama Kategori</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    {{-- Ikon Tag/Label --}}
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                </div>
                <input type="text" id="nama_kategori" name="nama_kategori" 
                    value="{{ old('nama_kategori', $kategori->nama_kategori ?? '') }}"
                    class="block w-full pl-10 pr-3 py-2.5 border border-slate-300 rounded-xl bg-slate-50 text-slate-900 text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-500/30 focus:border-sky-500 transition-all duration-200" 
                    placeholder="Masukkan nama kategori" required>
            </div>
        </div>
    </form>

    {{-- Action Footer --}}
    <div class="mt-4 pt-5 border-t border-slate-100 flex items-center justify-between">
        
        {{-- Kiri: Form & Tombol Hapus (Hanya muncul jika mode edit/kategori ada) --}}
        <div>
            @if($kategori)
            <form action="{{ route('delete.kategori') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $kategori->id_kategori }}" name="id_kategori">
                <button type="submit" 
                    class="px-4 py-2.5 text-sm font-medium text-red-600 bg-red-50 hover:bg-red-100 rounded-xl transition-all duration-200 flex items-center gap-2 group">
                    <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Hapus Data
                </button>
            </form>
            @endif
        </div>

        {{-- Kanan: Tombol Batal & Simpan --}}
        <div class="flex items-center gap-3">
            <button 
                type="button" 
                data-modal-hide="modal" 
                class="px-5 py-2.5 text-sm font-medium text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition-all duration-200">
                Batal
            </button>
            
            {{-- Tombol submit ini terhubung ke form utama secara dinamis --}}
            <button 
                type="submit" 
                form="form-kategori-{{ $kategori ? $kategori->id_kategori : 'add' }}"
                class="px-5 py-2.5 text-sm font-medium text-white {{ $kategori ? 'bg-green-500 hover:bg-green-600' : 'bg-sky-500 hover:bg-sky-600' }} rounded-xl shadow-sm hover:shadow-md transition-all duration-200 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
                {{ $kategori ? 'Update Data' : 'Simpan Kategori' }}
            </button>
        </div>
    </div>
</div>