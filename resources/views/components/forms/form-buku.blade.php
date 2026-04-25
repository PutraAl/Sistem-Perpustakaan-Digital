@props([
    'action' => '#',
    'method' => 'POST',
    'buku' => null
])

<form action="{{ $action }}" method="POST">
    @csrf

    @if($method !== 'POST')
        @method($method)
    @endif
    
    <div class="grid gap-4 grid-cols-2 py-4 md:py-6">

        <!-- Judul -->
        <div class="col-span-2">
            <label class="block mb-2 text-sm font-medium">Judul Buku</label>
            <input type="text" name="nama_buku"
                value="{{ old('nama_buku', $buku->nama_buku ?? '') }}"
                class="w-full px-3 py-2.5 border rounded-base">
        </div>

        <!-- Penulis -->
        <div class="col-span-1">
            <label class="block mb-2 text-sm font-medium">Penulis</label>
            <input type="text" name="penulis"
                value="{{ old('penulis', $buku->penulis ?? '') }}"
                class="w-full px-3 py-2.5 border rounded-base">
        </div>

        <!-- Kategori -->
        <div class="col-span-1">
            <label class="block mb-2 text-sm font-medium">Kategori</label>
            <select name="kategori" class="w-full px-3 py-2.5 border rounded-base">
                <option>Pilih</option>
                <option {{ ($buku->kategori ?? '') == 'Novel' ? 'selected' : '' }}>Novel</option>
                <option {{ ($buku->kategori ?? '') == 'Komik' ? 'selected' : '' }}>Komik</option>
            </select>
        </div>

        <!-- Deskripsi -->
        <div class="col-span-2">
            <label class="block mb-2 text-sm font-medium">Deskripsi</label>
            <textarea name="deskripsi" class="w-full p-3 border rounded-base">{{ old('deskripsi', $buku->deskripsi ?? '') }}</textarea>
        </div>
    </div>

    <div class="flex gap-3 border-t pt-4">
        <button type="submit" class="bg-brand text-white px-4 py-2 rounded-base">
            {{ $buku ? 'Update' : 'Tambah' }}
        </button>
        
        <button type="button" data-modal-hide="modal-buku"
            class="px-4 py-2 border rounded-base">
            Batal
        </button>
    </div>
</form>