@props([
    'action' => '#',
    'method' => 'POST',
    'buku' => null,
    'dummy' => null
])

@php
    if ($dummy && !$buku) {
        $buku = (object)[
            'id' => 1,
            'nama_buku' => 'Rahasia Dunia Yang Disembunyikan',
            'penulis' => 'Unknown',
            'penerbit' => 'Erlangga',
            'tahun' => 2020,
            'kategori' => 'Fiksi',
            'stok' => 12,
            'deskripsi' => 'Buku ini adalah semua sejarah dari dunia yang telah disembunyikan, dimana kita semua tidak tau awal mula dunia itu seperti apa. Namun di buku ini diceritkan rahasia-rahasianya, mulai dari awal bumi lahir termasuk nabi adam, rahasia kerajaan eropa, donald trump dan semacamnya. Bagi yang membaca buku ini akan terstimulasi seolah olah ia akan percaya dan kehilangan kepercayaan terhadap sebuah agama. Namun itu semua tergantung seberapa kuat iman orang yang membacanya',
            'gambar' => null
        ];
    }
@endphp

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf

    @if($method !== 'POST')
        @method($method)
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 py-4">

        <!-- LEFT -->
        <div class="space-y-5">

            <!-- Judul -->
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Judul Buku</label>
                <input type="text" name="nama_buku"
                    value="{{ old('nama_buku', $buku->nama_buku ?? '') }}"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Penulis -->
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Penulis</label>
                <input type="text" name="penulis"
                    value="{{ old('penulis', $buku->penulis ?? '') }}"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Penerbit -->
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Penerbit</label>
                <input type="text" name="penerbit"
                    value="{{ old('penerbit', $buku->penerbit ?? '') }}"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Tahun + Stok -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">Tahun</label>
                    <input type="number" name="tahun"
                        value="{{ old('tahun', $buku->tahun ?? '') }}"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">Stok</label>
                    <input type="number" name="stok"
                        value="{{ old('stok', $buku->stok ?? '') }}"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <!-- Kategori -->
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Kategori</label>
                <select name="kategori"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Pilih kategori</option>
                    <option value="Novel" {{ ($buku->kategori ?? '') == 'Novel' ? 'selected' : '' }}>Novel</option>
                    <option value="Komik" {{ ($buku->kategori ?? '') == 'Komik' ? 'selected' : '' }}>Komik</option>
                    <option value="Edukasi" {{ ($buku->kategori ?? '') == 'Edukasi' ? 'selected' : '' }}>Edukasi</option>
                    <option value="Edukasi" {{ ($buku->kategori ?? '') == 'Fiksi' ? 'selected' : '' }} >Fiksi</option>
                </select>
            </div>

        </div>

        <!-- RIGHT -->
        <div class="space-y-5">

            <!-- Deskripsi -->
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" rows="6"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none">{{ old('deskripsi', $buku->deskripsi ?? '') }}</textarea>
            </div>

            <!-- Upload -->
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Upload Gambar</label>

                <label class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-2 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1" />
                            <path d="M12 12v-8m0 0l-3 3m3-3l3 3" />
                        </svg>
                        <p class="text-sm text-gray-500">
                            <span class="font-medium text-blue-600">Klik untuk upload</span> atau drag file
                        </p>
                        <p class="text-xs text-gray-400">PNG, JPG (max 2MB)</p>
                    </div>
                    <input type="file" name="gambar" class="hidden">
                </label>
            </div>

        </div>
    </div>

    <!-- BUTTON -->
    <div class="flex justify-end gap-3 pt-4 border-t">
        <button type="button" data-modal-hide="modal-buku"
            class="px-4 py-2 text-sm border rounded-lg hover:bg-gray-100">
            Batal
        </button>

        <button type="submit"
            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">
            {{ $buku ? 'Update Buku' : 'Tambah Buku' }}
        </button>
    </div>
</form>