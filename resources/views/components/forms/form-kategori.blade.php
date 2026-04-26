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

        <!-- Nama Kategori -->
        <div class="col-span-2">
            <label class="block mb-2 text-sm font-medium">Nama Kategori</label>
            <input type="text" name="nama_kategori"
                value="{{ old('nama_kategori', $buku->nama_kategori ?? '') }}"
                class="w-full px-3 py-2.5 border rounded-base">
        </div>

    </div>

    <div class="flex gap-3 border-t pt-4">
        <button type="submit" class="bg-brand text-white px-4 py-2 rounded-base">
            {{ $buku ? 'Update' : 'Tambah' }}
        </button>
        
      
    </div>
</form>