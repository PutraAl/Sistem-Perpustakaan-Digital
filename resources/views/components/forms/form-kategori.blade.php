@props([
    'action' => '#',
    'method' => 'POST',
    'kategori' => null
])

<form action="{{ $action }}" method="POST">
    @csrf

    @if($method !== 'POST')
        @method($method)
    @endif
    
    <div class="grid gap-4 grid-cols-2 py-4 md:py-6">

        <div class="col-span-2">
            <label class="block mb-2 text-sm font-medium">Nama Kategori</label>
            <input type="text" name="nama_kategori"
                value="{{ old('nama_kategori', $kategori->nama_kategori ?? '') }}"
                class="w-full px-3 py-2.5 border rounded-base">
        </div>

    </div>

    <div class="flex gap-3 border-t pt-4">
        <button type="submit" class="bg-brand text-white px-4 py-2 rounded-base">
            {{ $kategori ? 'Update' : 'Tambah' }}
        </button>
</form>

     @if($kategori)
<form action="{{ route('delete.kategori') }}" method="POST">
    @csrf
    <input type="hidden" value="{{ $kategori->id_kategori }}" name="id_kategori">
   <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-base cursor-pointer">
        Hapus
    </button>
</form>
@endif
    </div>