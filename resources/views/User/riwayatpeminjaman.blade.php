@extends('layout.app')

@section('title', 'Riwayat Peminjaman')

@section('content')

    <div class="w-full px-2">
        <h2 class="mb-4 text-lg font-semibold">Riwayat Peminjaman Buku</h2>

        <div class="bg-white shadow-sm rounded-lg w-full max-w-none">
            <div class="p-4 w-full">
                <div class="w-full overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-left text-xs font-semibold text-gray-400 pb-2 pr-4">Judul Buku</th>
                                <th class="text-left text-xs font-semibold text-gray-400 pb-2 pr-4">Anggota</th>
                                <th class="text-left text-xs font-semibold text-gray-400 pb-2 pr-4 hidden sm:table-cell">Tanggal Pinjam</th>
                                <th class="text-left text-xs font-semibold text-gray-400 pb-2 pr-4 hidden sm:table-cell">Tanggal Tenggang</th>
                                <th class="text-left text-xs font-semibold text-gray-400 pb-2">Status</th>
                                <th class="text-left text-xs font-semibold text-gray-400 pb-2">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">
                            @forelse($peminjamans as $pinjam)
                                <tr>
                                    {{-- Kolom 1: Judul Buku --}}
                                    <td class="py-3 pr-4 font-medium text-gray-800">
                                        @php
                                            $bukuPertama = $pinjam->detail->first()?->buku?->judul ?? 'Buku tidak ditemukan';
                                            $sisaBuku = $pinjam->detail->count() - 1;
                                        @endphp
                                        {{ $bukuPertama }}
                                        @if($sisaBuku > 0)
                                            <span class="text-xs text-blue-500 font-semibold bg-blue-50 px-1.5 py-0.5 rounded">
                                                +{{ $sisaBuku }} buku
                                            </span>
                                        @endif
                                    </td>

                                    {{-- Kolom 2: Nama Anggota --}}
                                    <td class="py-3 pr-4 text-gray-600">
                                        {{ $pinjam->user?->nama ?? 'User Anonymous' }}
                                    </td>

                                    {{-- Kolom 3: Tanggal Pinjam --}}
                                    <td class="py-3 pr-4 hidden sm:table-cell text-gray-600">
                                        {{ date('d M Y', strtotime($pinjam->tanggal_pinjam)) }}
                                    </td>

                                    {{-- Kolom 4: Tanggal Jatuh Tempo --}}
                                    <td class="py-3 pr-4 hidden sm:table-cell text-gray-600">
                                        {{ date('d M Y', strtotime($pinjam->tanggal_jatuh_tempo)) }}
                                    </td>

                                    {{-- Kolom 5: Status --}}
                                    <td class="py-3 pr-4">
                                        @if($pinjam->status === 'menunggu_konfirmasi')
                                            <span class="px-2.5 py-1 text-[11px] font-medium bg-amber-100 text-amber-800 rounded-full">Menunggu Konfirmasi</span>
                                        @elseif($pinjam->status === 'dipinjam')
                                            <span class="px-2.5 py-1 text-[11px] font-medium bg-blue-100 text-blue-700 rounded-full">Dipinjam</span>
                                        @elseif($pinjam->status === 'dikembalikan')
                                            <span class="px-2.5 py-1 text-[11px] font-medium bg-green-100 text-green-700 rounded-full"> Dikembalikan</span>
                                        @elseif($pinjam->status === 'terlambat')
                                            <span class="px-2.5 py-1 text-[11px] font-medium bg-red-100 text-red-700 rounded-full"> Terlambat</span>
                                        @elseif($pinjam->status === 'ditolak')
                                            <span class="px-2.5 py-1 text-[11px] font-medium bg-gray-100 text-gray-600 rounded-full">Ditolak</span>
                                        @endif
                                    </td>

                                    {{-- Kolom 6: Tombol --}}
                                    <td class="py-3">
                                        <button type="button" 
                                                data-modal-target="detail-pinjam-{{ $pinjam->id_peminjaman }}" 
                                                data-modal-toggle="detail-pinjam-{{ $pinjam->id_peminjaman }}"
                                                class="px-2.5 py-1 text-xs font-medium bg-blue-500 hover:bg-blue-600 text-white rounded transition shadow-sm">
                                            Details
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-8 text-center text-gray-400 font-medium">
                                        Belum ada riwayat peminjaman buku.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

  
    @foreach($peminjamans as $pinjam)
       
            <x-modal id="detail-pinjam-{{ $pinjam->id_peminjaman }}" title="Detail Peminjaman">

                        <x-forms.form-detailuser :peminjaman="$pinjam" />
                     </x-modal>
    @endforeach

@endsection