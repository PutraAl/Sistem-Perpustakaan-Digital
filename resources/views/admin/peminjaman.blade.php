@extends('layout.master')

@section('content')
    <div class="flex-1 min-w-0 pt-14 lg:pt-8 bg-white rounded-xl border border-gray-200 p-4">
        <div class="flex items-center justify-between mb-4">
            <div>
                <p class="text-sm font-semibold text-gray-800">Aktivitas Peminjaman</p>
                <p class="text-xs text-gray-400">Semua member</p>
            </div>
              <div>
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                    class="w-full bg-blue-500 text-white px-3 py-1.5 md:px-4 md:py-2 rounded-md text-xs md:text-sm hover:bg-blue-600 transition" type="button">
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
                        <th class="text-left text-xs font-semibold text-gray-400 pb-2 pr-4 hidden sm:table-cell">Tanggal Pinjam
                        </th>
                        <th class="text-left text-xs font-semibold text-gray-400 pb-2 pr-4 hidden sm:table-cell">Tanggal Tenggang
                        </th>
                        <th class="text-left text-xs font-semibold text-gray-400 pb-2">Status</th>
                        <th class="text-left text-xs font-semibold text-gray-400 pb-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <tr>
                        <td class="py-2.5 pr-4 text-gray-800 text-xs">The Great Gatsby</td>
                        <td class="py-2.5 pr-4 text-gray-600 text-xs">Arief Nugroho</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs hidden sm:table-cell">Mar 28</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs hidden sm:table-cell">Apr 11</td>
                        <td class="py-2.5"><span
                            class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-blue-50 text-blue-700">Borrowed</span>
                        </td>
                        <td class="py-2.5"><span  onclick="openModal()"
                            class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-blue-400 text-white hover:cursor-pointer">Details</span>
                        </td>
                   
                       
                    </tr>
                    <tr>
                        <td class="py-2.5 pr-4 text-gray-800 text-xs">Clean Code</td>
                        <td class="py-2.5 pr-4 text-gray-600 text-xs">Siti Rahayu</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs hidden sm:table-cell">Mar 25</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs hidden sm:table-cell">Apr 8</td>
                        <td class="py-2.5"><span
                                class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-red-50 text-red-700">Overdue</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2.5 pr-4 text-gray-800 text-xs">Dune</td>
                        <td class="py-2.5 pr-4 text-gray-600 text-xs">Budi Santoso</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs hidden sm:table-cell">Mar 30</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs hidden sm:table-cell">Apr 13</td>
                        <td class="py-2.5"><span
                                class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-blue-50 text-blue-700">Borrowed</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2.5 pr-4 text-gray-800 text-xs">Atomic Habits</td>
                        <td class="py-2.5 pr-4 text-gray-600 text-xs">Dewi Kusuma</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs hidden sm:table-cell">Mar 15</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs hidden sm:table-cell">Mar 29</td>
                        <td class="py-2.5"><span
                                class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-green-50 text-green-700">Returned</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2.5 pr-4 text-gray-800 text-xs">Sapiens</td>
                        <td class="py-2.5 pr-4 text-gray-600 text-xs">Reza Firmansyah</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs hidden sm:table-cell">Apr 1</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs hidden sm:table-cell">Apr 15</td>
                        <td class="py-2.5"><span
                                class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-blue-50 text-blue-700">Borrowed</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2.5 pr-4 text-gray-800 text-xs">The Pragmatic Programmer</td>
                        <td class="py-2.5 pr-4 text-gray-600 text-xs">Nadia Putri</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs hidden sm:table-cell">Mar 20</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs hidden sm:table-cell">Apr 3</td>
                        <td class="py-2.5"><span
                                class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-red-50 text-red-700">Overdue</span>
                        </td>
                    </tr>
                 
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('title', 'Peminjaman')

@section('modal_content')
<form>

  <div class="mb-2">
    <label class="text-xs text-gray-500">Judul Buku</label>
    <input type="text" class="w-full border px-3 py-2 text-xs rounded-md">
  </div>

  <div class="mb-2">
    <label class="text-xs text-gray-500">Anggota</label>
    <input type="text" class="w-full border px-3 py-2 text-xs rounded-md">
  </div>

  <div class="mb-3">
    <label class="text-xs text-gray-500">Status</label>
    <select class="w-full border px-3 py-2 text-xs rounded-md">
      <option>Dipinjam</option>
      <option>Dikembalikan</option>
    </select>
  </div>

  <button class="bg-blue-500 text-white px-3 py-1.5 rounded text-xs">
    Simpan
  </button>

</form>
@endsection