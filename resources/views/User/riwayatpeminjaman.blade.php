@extends('layout.app')

@section('title', 'Peminjaman')

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

                        <tr>
                            <td class="py-2.5 pr-4">The Great Gatsby</td>
                            <td class="py-2.5 pr-4">Arief Nugroho</td>
                            <td class="py-2.5 pr-4 hidden sm:table-cell">Mar 28</td>
                            <td class="py-2.5 pr-4 hidden sm:table-cell">Apr 11</td>
                            <td>
                                <span class="px-2 py-0.5 text-[10px] bg-blue-100 text-blue-700 rounded-full">Borrowed</span>
                            </td>
                            <td>
                                <span onclick="openModal()" class="px-2 py-0.5 text-[10px] bg-blue-500 text-white rounded cursor-pointer">
                                    Details
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <td class="py-2.5 pr-4">Clean Code</td>
                            <td class="py-2.5 pr-4">Siti Rahayu</td>
                            <td class="py-2.5 pr-4 hidden sm:table-cell">Mar 25</td>
                            <td class="py-2.5 pr-4 hidden sm:table-cell">Apr 8</td>
                            <td>
                                <span class="px-2 py-0.5 text-[10px] bg-red-100 text-red-700 rounded-full">Overdue</span>
                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td class="py-2.5 pr-4">Dune</td>
                            <td class="py-2.5 pr-4">Budi Santoso</td>
                            <td class="py-2.5 pr-4 hidden sm:table-cell">Mar 30</td>
                            <td class="py-2.5 pr-4 hidden sm:table-cell">Apr 13</td>
                            <td>
                                <span class="px-2 py-0.5 text-[10px] bg-blue-100 text-blue-700 rounded-full">Borrowed</span>
                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td class="py-2.5 pr-4">Atomic Habits</td>
                            <td class="py-2.5 pr-4">Dewi Kusuma</td>
                            <td class="py-2.5 pr-4 hidden sm:table-cell">Mar 15</td>
                            <td class="py-2.5 pr-4 hidden sm:table-cell">Mar 29</td>
                            <td>
                                <span class="px-2 py-0.5 text-[10px] bg-green-100 text-green-700 rounded-full">Returned</span>
                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td class="py-2.5 pr-4">Sapiens</td>
                            <td class="py-2.5 pr-4">Reza Firmansyah</td>
                            <td class="py-2.5 pr-4 hidden sm:table-cell">Apr 1</td>
                            <td class="py-2.5 pr-4 hidden sm:table-cell">Apr 15</td>
                            <td>
                                <span class="px-2 py-0.5 text-[10px] bg-blue-100 text-blue-700 rounded-full">Borrowed</span>
                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td class="py-2.5 pr-4">The Pragmatic Programmer</td>
                            <td class="py-2.5 pr-4">Nadia Putri</td>
                            <td class="py-2.5 pr-4 hidden sm:table-cell">Mar 20</td>
                            <td class="py-2.5 pr-4 hidden sm:table-cell">Apr 3</td>
                            <td>
                                <span class="px-2 py-0.5 text-[10px] bg-red-100 text-red-700 rounded-full">Overdue</span>
                            </td>
                            <td></td>
                        </tr>

                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

@endsection 