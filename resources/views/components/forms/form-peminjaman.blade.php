@props([
    'action' => '#',
    'method' => 'POST',
    'peminjaman' => null,
    'users' => [],
    'bukus' => []
])

<form action="{{ $action }}" method="POST">
    @csrf

    @if($method !== 'POST')
        @method($method)
    @endif

    <div class="grid gap-4 grid-cols-2 py-4 md:py-6">

        <!-- USER -->
        <div class="col-span-2">
            <label class="block mb-2 text-sm font-medium">Anggota</label>
           <select id="userSelect" name="user_id" class="w-full px-3 py-2 border rounded-base">
    <option value="">Pilih Anggota</option>
    @foreach($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
    @endforeach
</select>
        </div>

        <!-- TANGGAL -->
        <div>
            <label class="block mb-2 text-sm font-medium">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" id="tglPinjam"
                value="{{ old('tanggal_pinjam', $peminjaman->tanggal_pinjam ?? '') }}"
                onchange="setTanggal()"
                class="w-full px-3 py-2.5 border rounded-base">
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium">Jatuh Tempo</label>
            <input type="date" name="tanggal_jatuh_tempo" id="tglKembali"
                value="{{ old('tanggal_jatuh_tempo', $peminjaman->tanggal_jatuh_tempo ?? '') }}"
                
                class="w-full px-3 py-2.5 border rounded-base bg-gray-50">
        </div>

        <!-- INFO -->
        <div class="col-span-2 text-sm text-blue-600" id="infoTanggal"></div>

        <!-- DETAIL BUKU -->
        <div class="col-span-2">
            <label class="block mb-2 text-sm font-medium">Daftar Buku</label>

            <div id="bukuWrapper">
                @if($peminjaman && $peminjaman->detail)
                    @foreach($peminjaman->detail as $i => $detail)
                        <div class="flex gap-2 mb-2">
                            <select name="buku_id[]" class="flex-1 px-2 py-2 border rounded">
                                @foreach($bukus as $buku)
                                    <option value="{{ $buku->id }}"
                                        {{ $detail->buku_id == $buku->id ? 'selected' : '' }}>
                                        {{ $buku->judul }}
                                    </option>
                                @endforeach
                            </select>

                            <input type="number" name="jumlah[]" value="{{ $detail->jumlah }}"
                                class="w-20 px-2 py-2 border rounded">

                            <button type="button" onclick="hapusRow(this)" class="text-red-500">X</button>
                        </div>
                    @endforeach
                @else
                    <div class="flex gap-2 mb-2">
                       <select name="buku_id[]" class="bukuSelect w-full px-2 py-2 border rounded">
    @foreach($bukus as $buku)
        <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
    @endforeach
</select>

                        <input type="number" name="jumlah[]" value="1"
                            class="w-20 px-2 py-2 border rounded">

                        <button type="button" onclick="hapusRow(this)" class="text-red-500">X</button>
                    </div>
                @endif
            </div>

            <button type="button" onclick="tambahBuku()" class="text-blue-600 text-sm mt-2">
                + Tambah Buku
            </button>
        </div>

    </div>

    <!-- BUTTON -->
    <div class="flex gap-3 border-t pt-4">

        <button type="submit" class="bg-brand text-white px-4 py-2 rounded-base">
            {{ $peminjaman ? 'Update' : 'Tambah' }}
        </button>

</form>

@if($peminjaman)
<form action="{{ route('admin.peminjaman.delete') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $peminjaman->id }}">
    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-base">
        Hapus
    </button>
</form>
@endif

</div>

