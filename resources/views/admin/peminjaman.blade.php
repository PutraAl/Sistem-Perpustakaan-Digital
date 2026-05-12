@extends('layout.master')

@section('content')
    <div class="flex-1 min-w-0  pt-14 md:pt-8 bg-white rounded-xl border border-gray-200 p-4">
        <div class="flex items-center justify-between mb-4">
            <div>
                <p class="text-sm font-semibold text-gray-800">Aktivitas Peminjaman</p>
                <p class="text-xs text-gray-400">Semua member</p>
            </div>
            <div>
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                    class="w-full bg-blue-500 text-white px-3 py-1.5 md:px-4 md:py-2 rounded-md text-xs md:text-sm hover:bg-blue-600 transition"
                    type="button">
                    Tambah Peminjaman
                </button>
            </div>
        </div>
        <form method="GET" action="{{ route('admin.peminjaman') }}"
            class="w-full bg-white p-3 mb-4 md:p-4 rounded-lg border border-gray-200">

            <div class="grid grid-cols-1 md:grid-cols-12 gap-2 md:gap-3">

                <div class="md:col-span-4">
                    <div
                        class="flex items-center bg-gray-50 border border-gray-300 rounded-md px-2 py-1.5 md:px-3 md:py-2 focus-within:ring-1 md:focus-within:ring-2 focus-within:ring-blue-400">

                        <svg class="w-3.5 h-3.5 md:w-4 md:h-4 text-gray-400 mr-2" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg>

                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari..."
                            class="w-full bg-transparent text-xs md:text-sm focus:outline-none">
                    </div>
                </div>

                <div class="md:col-span-2">
                    <input type="date" name="start_date" value="{{ request('start_date') }}"
                        class="w-full border border-gray-300 rounded-md px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm focus:ring-1 md:focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>

                <div class="md:col-span-2">
                    <input type="date" name="end_date" value="{{ request('end_date') }}"
                        class="w-full border border-gray-300 rounded-md px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm focus:ring-1 md:focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>

                <!-- 📌 Status -->
                <div class="md:col-span-2">
                    <select name="status"
                        class="w-full border border-gray-300 rounded-md px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm focus:ring-1 md:focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        <option value="">Semua</option>
                        <option value="dipinjam" {{ request('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                        <option value="dikembalikan" {{ request('status') == 'dikembalikan' ? 'selected' : '' }}>Kembali
                        </option>
                        <option value="terlambat" {{ request('status') == 'terlambat' ? 'selected' : '' }}>Terlambat</option>
                    </select>
                </div>

                <!-- 🔘 Button -->
                <div class="md:col-span-2">
                    <button type="submit"
                        class="w-full bg-blue-500 text-white px-3 py-1.5 md:px-4 md:py-2 rounded-md text-xs md:text-sm hover:bg-blue-600 transition">
                        Filter
                    </button>
                </div>

            </div>

        </form>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="text-left text-xs font-semibold text-gray-400 pb-2 pr-4">Judul Buku</th>
                        <th class="text-left text-xs font-semibold text-gray-400 pb-2 pr-4">Anggota</th>
                        <th class="text-left text-xs font-semibold text-gray-400 pb-2 pr-4 hidden sm:table-cell">Tanggal
                            Pinjam
                        </th>
                        <th class="text-left text-xs font-semibold text-gray-400 pb-2 pr-4 hidden sm:table-cell">Tanggal
                            Tenggang
                        </th>
                        <th class="text-left text-xs font-semibold text-gray-400 pb-2">Status</th>
                        <th class="text-left text-xs font-semibold text-gray-400 pb-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <tr>
                        <td class="py-2.5 pr-4 text-gray-800 text-xs">Rahasia Dunia Yang Disenyumbinyikan</td>
                        <td class="py-2.5 pr-4 text-gray-600 text-xs">Peter</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs hidden sm:table-cell">20 Mei 2026</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs hidden sm:table-cell">25 Mei 2026</td>
                        <td class="py-2.5"><span
                                class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-blue-50 text-blue-700">Dipinjam</span>
                        </td>
                        <td class="py-2.5"><span data-modal-target="detail-pinjam" data-modal-toggle="detail-pinjam"
                                class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-blue-400 text-white hover:cursor-pointer">Details</span>
                        </td>


                    </tr>
                    <tr>
                        <td class="py-2.5 pr-4 text-gray-800 text-xs">Clean Code</td>
                        <td class="py-2.5 pr-4 text-gray-600 text-xs">Siti Rahayu</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs hidden sm:table-cell">Mar 25</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs hidden sm:table-cell">Apr 8</td>
                        <td class="py-2.5"><span
                                class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-red-50 text-red-700">Terlambat</span>
                        </td>
                         <td class="py-2.5"><span data-modal-target="detail-pinjam2" data-modal-toggle="detail-pinjam2"
                                class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-blue-400 text-white hover:cursor-pointer">Details</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2.5 pr-4 text-gray-800 text-xs">Atomic Habits</td>
                        <td class="py-2.5 pr-4 text-gray-600 text-xs">Dewi Kusuma</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs hidden sm:table-cell">Mar 15</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs hidden sm:table-cell">Mar 29</td>
                        <td class="py-2.5"><span
                                class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-green-50 text-green-700">Dikembalikan</span>
                        </td>
                         <td class="py-2.5"><span data-modal-target="detail-pinjam3" data-modal-toggle="detail-pinjam3"
                                class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-blue-400 text-white hover:cursor-pointer">Details</span>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
@endsection




<x-modal id="detail-pinjam" title="Detail Peminjaman">

    <x-forms.form-peminjaman :peminjaman="1" />

</x-modal>
<x-modal id="detail-pinjam2" title="Detail Peminjaman">

    <x-forms.form-peminjaman :peminjaman="2" />

</x-modal>
<x-modal id="detail-pinjam3" title="Detail Peminjaman">

    <x-forms.form-peminjaman :peminjaman="3" />

</x-modal>
<x-modal id="crud-modal" title="Tambah Peminjaman">

    <x-forms.form-peminjaman :action="route('tambah.peminjaman')" method="POST" :users="$users" :bukus="$bukus" />

</x-modal>
<script>
    const bukusData = @json($bukus);

    let instances = [];

    function initSelect(el) {
        let ts = new TomSelect(el, {
            valueField: 'id_buku',
            labelField: 'judul',
            searchField: 'judul',
            options: [],          // start empty — refreshAll() will fill it
            openOnFocus: true,
            placeholder: 'Pilih buku...',
            onChange: function () {
                refreshAll();
            }
        });

        instances.push(ts);
        refreshAll();             // immediately filter options after adding
    }

    function getSelectedValues() {
        return instances
            .map(i => String(i.getValue()))
            .filter(v => v !== "");
    }

    function refreshAll() {
        let selected = getSelectedValues();

        instances.forEach(ts => {
            let current = String(ts.getValue());

            ts.clearOptions();

            bukusData.forEach(buku => {
                let id = String(buku.id_buku);

                // Show option if: not selected by anyone, OR it's this instance's own current value
                if (!selected.includes(id) || id === current) {
                    ts.addOption({ id_buku: id, judul: buku.judul });
                }
            });

            // Re-set the current value so it doesn't get wiped after clearOptions
            if (current) {
                ts.setValue(current, true); // silent = true, no onChange loop
            }

            ts.refreshOptions(false);
        });
    }

    function tambahBuku() {
        let wrapper = document.getElementById('bukuWrapper');

        let div = document.createElement('div');
        div.className = "buku-item border border-gray-100 rounded-lg p-3 space-y-2 bg-gray-50 relative";

        div.innerHTML = `
        <button type="button" onclick="removeBuku(this)"
            class="absolute top-2 right-2 text-gray-300 hover:text-red-400 transition">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        <div>
            <label class="block text-xs font-medium text-gray-600 mb-1">Buku</label>
            <select name="buku_id[]" class="bukuSelect w-full border border-gray-300 rounded-md px-3 py-2 text-xs"></select>
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
    `;

        wrapper.appendChild(div);
        initSelect(div.querySelector('.bukuSelect')); // initSelect calls refreshAll internally
    }

    function removeBuku(btn) {
        let div = btn.closest('.buku-item');
        let select = div.querySelector('.bukuSelect');
        let instance = instances.find(i => i.input === select);

        if (instance) {
            instance.destroy();
            instances = instances.filter(i => i !== instance);
        }

        div.remove();
        refreshAll(); // free up the removed book for other rows
    }

    document.addEventListener('DOMContentLoaded', () => {
        instances = [];
        document.querySelectorAll('.bukuSelect').forEach(el => initSelect(el));
    });
</script>
@section('title', 'Peminjaman')