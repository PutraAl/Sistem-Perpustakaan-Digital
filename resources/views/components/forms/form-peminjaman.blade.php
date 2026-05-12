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
                    'judul' => 'Rahasia Dunia Yang Disembunyikan',
                    'jumlah' => 1,
                    'status_item' => 'dipinjam',
                    'denda_item' => 0,
                    'tanggal_kembali' => null,
                ],
            ],
        ],
        2 => [
            'id_peminjaman' => 2,
            'user_id' => 2,
            'anggota' => 'Siti Rahayu',
            'tanggal_pinjam' => '2025-03-25',
            'tanggal_jatuh_tempo' => '2025-04-08',
            'tanggal_kembali' => null,
            'denda' => 10000,
            'status' => 'terlambat',
            'detail' => [
                [
                    'id_buku' => 2,
                    'judul' => 'Clean Code',
                    'jumlah' => 1,
                    'status_item' => 'dipinjam',
                    'denda_item' => 10000,
                    'tanggal_kembali' => null,
                ],
                [
                    'id_buku' => 7,
                    'judul' => '1984',
                    'jumlah' => 1,
                    'status_item' => 'dipinjam',
                    'denda_item' => 0,
                    'tanggal_kembali' => null,
                ],
            ],
        ],
        3 => [
            'id_peminjaman' => 3,
            'user_id' => 3,
            'anggota' => 'Dewi Kusuma',
            'tanggal_pinjam' => '2025-03-15',
            'tanggal_jatuh_tempo' => '2025-03-29',
            'tanggal_kembali' => '2025-03-28',
            'denda' => 0,
            'status' => 'dikembalikan',
            'detail' => [
                [
                    'id_buku' => 4,
                    'judul' => 'Atomic Habits',
                    'jumlah' => 1,
                    'status_item' => 'dikembalikan',
                    'denda_item' => 0,
                    'tanggal_kembali' => '2025-03-28',
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

    $dummyBukus = $bukus ?? [
        ['id_buku' => 1, 'judul' => 'The Great Gatsby'],
        ['id_buku' => 2, 'judul' => 'Clean Code'],
        ['id_buku' => 3, 'judul' => 'Dune'],
        ['id_buku' => 4, 'judul' => 'Atomic Habits'],
        ['id_buku' => 5, 'judul' => 'Sapiens'],
        ['id_buku' => 6, 'judul' => 'The Pragmatic Programmer'],
        ['id_buku' => 7, 'judul' => '1984'],
        ['id_buku' => 8, 'judul' => 'The Alchemist'],
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
@if(!$isEdit)
    <form action="{{ $action ?? '#' }}" method="{{ $method ?? 'POST' }}" class="mt-4 space-y-3">
        @csrf

        {{-- Anggota --}}
        <div>
            <label class="block text-xs font-medium text-gray-600 mb-1">Anggota</label>
            <select name="user_id"
                class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none">
                <option value="" disabled selected>Pilih anggota...</option>
                @foreach($dummyUsers as $user)
                    <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
                @endforeach
            </select>
        </div>

        {{-- Tanggal Pinjam --}}
        <div>
            <label class="block text-xs font-medium text-gray-600 mb-1">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" value="{{ date('Y-m-d') }}"
                class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        {{-- Tanggal Jatuh Tempo --}}
        <div>
            <label class="block text-xs font-medium text-gray-600 mb-1">Tanggal Jatuh Tempo</label>
            <input type="date" name="tanggal_jatuh_tempo"
                class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        {{-- Status --}}
        <div>
            <label class="block text-xs font-medium text-gray-600 mb-1">Status</label>
            <select name="status"
                class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none">
                <option value="dipinjam" selected>Dipinjam</option>
                <option value="dikembalikan">Dikembalikan</option>
                <option value="terlambat">Terlambat</option>
            </select>
        </div>

        <hr class="border-gray-100">
        <p class="text-xs font-semibold text-gray-700">Detail Buku</p>

        {{-- Buku List --}}
        <div id="bukuWrapper" class="space-y-3">
            <div class="buku-item border border-gray-100 rounded-lg p-3 space-y-2 bg-gray-50">
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">Buku</label>
                    <select name="buku_id[]"
                        class="bukuSelect w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        <option value="" disabled selected>Pilih buku...</option>
                        @foreach($dummyBukus as $b)
                            <option value="{{ $b['id_buku'] }}">{{ $b['judul'] }}</option>
                        @endforeach
                    </select>
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
                <path d="M12 5v14M5 12h14" />
            </svg>
            Tambah Buku Lain
        </button>

        {{-- Actions --}}
        <div class="flex justify-end gap-2 pt-2">
            <button type="button" data-modal-hide="crud-modal"
                class="px-4 py-2 text-xs rounded-md border border-gray-300 text-gray-600 hover:bg-gray-50 transition">
                Batal
            </button>
            <button type="submit" class="px-4 py-2 text-xs rounded-md bg-blue-500 text-white hover:bg-blue-600 transition">
                Simpan
            </button>
        </div>
    </form>



@else
    @if(!$data)
        <p class="mt-4 text-xs text-red-500">Data peminjaman tidak ditemukan.</p>
    @else
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
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            {{-- Tanggal Jatuh Tempo --}}
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Tanggal Jatuh Tempo</label>
                <input type="date" name="tanggal_jatuh_tempo" value="{{ $data['tanggal_jatuh_tempo'] }}"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            {{-- Tanggal Kembali --}}
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">
                    Tanggal Kembali
                    <span class="text-gray-400 font-normal">(opsional)</span>
                </label>
                <input type="date" name="tanggal_kembali" value="{{ $data['tanggal_kembali'] ?? '' }}"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            {{-- Denda --}}
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Denda (Rp)</label>
                <input type="number" name="denda" value="{{ $data['denda'] }}" min="0" step="500"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Status</label>
                <select name="status"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    @foreach(['dipinjam' => 'Dipinjam', 'dikembalikan' => 'Dikembalikan', 'terlambat' => 'Terlambat'] as $val => $label)
                        <option value="{{ $val }}" {{ $data['status'] === $val ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
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

            <div class="flex justify-between items-center pt-2">
                <button type="button" data-modal-hide="detail-pinjam"
                    onclick="bukaModalHapus({{ $data['id_peminjaman'] }}, '{{ $data['detail'][0]['judul'] ?? '-' }}', '{{ $data['anggota'] }}')"
                    class="px-3 py-2 text-xs rounded-md bg-red-50 text-red-600 border border-red-200 hover:bg-red-100 transition flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 6h18M8 6V4h8v2M19 6l-1 14H6L5 6" />
                    </svg>
                    Hapus
                </button>

                <div class="flex gap-2">
                    <button type="button" data-modal-hide="detail-pinjam"
                        class="px-4 py-2 text-xs rounded-md border border-gray-300 text-gray-600 hover:bg-gray-50 transition">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-4 py-2 text-xs rounded-md bg-blue-500 text-white hover:bg-blue-600 transition">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    @endif
@endif