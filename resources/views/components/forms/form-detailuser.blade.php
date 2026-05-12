@php
    // ── DUMMY DATA ────────────────────────────────────────────────────────────
    $dummyPeminjaman = [
        1 => [
            'id_peminjaman' => 1,
            'user_id' => 1,
            'anggota' => 'Peter',
            'tanggal_pinjam' => '2026-05-20',
            'tanggal_jatuh_tempo' => '2026-05-25',
            'tanggal_kembali' => null,
            'denda' => 0,
            'status' => 'dipinjam',
            'detail' => [
                [
                    'id_buku' => 1,
                    'judul' => 'The Great Gatsby',
                    'jumlah' => 1,
                    'status_item' => 'dipinjam',
                    'denda_item' => 0,
                    'tanggal_kembali' => null,
                ],
            ],
        ],
    ];

    // ── RESOLVE MODE ─────────────────────────────────────────────────────────
    // $peminjaman prop: null = Add mode | integer = Detail/Edit mode
    $isEdit = isset($peminjaman) && $peminjaman !== null;
    $data = $isEdit ? ($dummyPeminjaman[$peminjaman] ?? null) : null;

    // ── DUMMY USERS & BUKU for Add mode dropdowns ─────────────────────────────
    $dummyUsers = $users ?? [
        ['id' => 1, 'name' => 'Peter'],
        ['id' => 2, 'name' => 'Siti Rahayu'],
        ['id' => 3, 'name' => 'Budi Santoso'],
        ['id' => 4, 'name' => 'Dewi Kusuma'],
        ['id' => 5, 'name' => 'Reza Firmansyah'],
        ['id' => 6, 'name' => 'Nadia Putri'],
    ];

   

    $statusItemBadge = [
        'dipinjam' => 'bg-blue-50 text-blue-700',
        'dikembalikan' => 'bg-green-50 text-green-700',
        'rusak' => 'bg-orange-50 text-orange-700',
        'hilang' => 'bg-red-50 text-red-700',
    ];
@endphp

{{-- ════════════════════════════════════════════════════════════════════════
ADD MODE ─ $peminjaman is null
════════════════════════════════════════════════════════════════════════ --}}

        <form action="#" method="POST" class="mt-4 space-y-3">
            @csrf
            @method('PUT')

            {{-- Anggota (read-only) --}}
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Anggota</label>
                <input type="text" value="{{ $data['anggota'] }}" readonly
                    class="w-full border border-gray-200 bg-gray-50 rounded-md px-3 py-2 text-xs text-gray-500 cursor-not-allowed">
            </div>

            {{-- Tanggal Pinjam --}}
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" value="{{ $data['tanggal_pinjam'] }}"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none" disabled>
            </div>

            {{-- Tanggal Jatuh Tempo --}}
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Tanggal Jatuh Tempo</label>
                <input type="date" name="tanggal_jatuh_tempo" value="{{ $data['tanggal_jatuh_tempo'] }}"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none" disabled>
            </div>

            {{-- Tanggal Kembali --}}
{{-- 
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">
                    Tanggal Kembali
                    <span class="text-gray-400 font-normal">(opsional)</span>
                </label>
                <input type="date" name="tanggal_kembali" value="{{ $data['tanggal_kembali'] ?? '' }}"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div> --}}

            {{-- Denda --}}
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Denda (Rp)</label>
                <input type="number" name="denda" value="{{ $data['denda'] }}" min="0" step="500"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none" disabled>
            </div>

            {{-- Status --}}
             <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Status </label>
                <input type="text" name="denda" value="Dipinjam" 
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none" disabled >
            </div>

            <hr class="border-gray-100">

            <p class="text-xs font-semibold text-gray-700">Detail Buku</p>
            <div class="space-y-2">
                @foreach($data['detail'] as $item)
                    @php $badge = $statusItemBadge[$item['status_item']] ?? 'bg-gray-100 text-gray-500'; @endphp
                    <div class="flex items-center justify-between bg-gray-50 border border-gray-100 rounded-md px-3 py-2.5">
                        <div>
                            <p class="text-xs font-medium text-gray-800">{{ $item['judul'] }}</p>
                            <p class="text-[11px] text-gray-400 mt-0.5">
                                Jumlah: {{ $item['jumlah'] }}
                                &nbsp;·&nbsp;
                                Denda: Rp {{ number_format($item['denda_item'], 0, ',', '.') }}
                            </p>
                            @if($item['tanggal_kembali'])
                                <p class="text-[11px] text-gray-400">Kembali: {{ $item['tanggal_kembali'] }}</p>
                            @endif
                        </div>
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold {{ $badge }}">
                            {{ ucfirst($item['status_item']) }}
                        </span>
                    </div>
                @endforeach
            </div>

          
        </form>