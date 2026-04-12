@extends('layout.master')

@section('title', 'User')
@section('content')
<div class="flex-1 min-w-0 pt-14 lg:pt-8 bg-white rounded-xl border border-gray-200 p-4">
        <div class="flex items-center justify-between mb-4">
            <div>
                <p class="text-sm font-semibold text-gray-800">Aktivitas Peminjaman</p>
                <p class="text-xs text-gray-400">Semua member</p>
            </div>

        </div>
        <form method="GET" action=""
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
                    <select name="status"
                        class="w-full border border-gray-300 rounded-md px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm focus:ring-1 md:focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        <option value="">Semua Role</option>
                        <option value="dipinjam" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="dikembalikan" {{ request('role') == 'anggota' ? 'selected' : '' }}>Anggota
                        </option>
                     
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
                        <th class="text-left text-xs font-semibold text-gray-400 pb-2 pr-4">No</th>
                        <th class="text-left text-xs font-semibold text-gray-400 pb-2 pr-4">Nama</th>
                        <th class="text-left text-xs font-semibold text-gray-400 pb-2 pr-4 ">Email
                        </th>
                        <th class="text-left text-xs font-semibold text-gray-400 pb-2 pr-4 ">Role
                        </th>
                        <th class="text-left text-xs font-semibold text-gray-400 pb-2 hidden sm:table-cell">NIM</th>
                        <th class="text-left text-xs font-semibold text-gray-400 pb-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <tr>
                        <td class="py-2.5 pr-4 text-gray-800 text-xs">1</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs ">Peter P</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs ">Palamsyah111@gmail.com</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs ">Admin</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs hidden sm:table-cell">
                         Tidak Ada NIM
                        </td>
                        <td class="py-2.5"><span  onclick="openModal()"
                            class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-blue-400 text-white hover:cursor-pointer">Details</span>
                        </td>
                   
                       
                    </tr>
                    <tr>
                        <td class="py-2.5 pr-4 text-gray-800 text-xs">2</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs ">Peter P</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs ">Palamsyah111@gmail.com</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs ">Admin</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs hidden sm:table-cell">
                         Tidak Ada NIM
                        </td>
                        <td class="py-2.5"><span  onclick="openModal()"
                            class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-blue-400 text-white hover:cursor-pointer">Details</span>
                        </td>
                   
                       
                    </tr>
                    <tr>
                        <td class="py-2.5 pr-4 text-gray-800 text-xs">3</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs ">Peter P</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs ">Palamsyah111@gmail.com</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs ">Admin</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs hidden sm:table-cell">
                         Tidak Ada NIM
                        </td>
                        <td class="py-2.5"><span  onclick="openModal()"
                            class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-blue-400 text-white hover:cursor-pointer">Details</span>
                        </td>
                   
                       
                    </tr>
                    <tr>
                        <td class="py-2.5 pr-4 text-gray-800 text-xs">4</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs ">Peter P</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs ">Palamsyah111@gmail.com</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs ">Admin</td>
                        <td class="py-2.5 pr-4 text-gray-500 text-xs hidden sm:table-cell">
                         Tidak Ada NIM
                        </td>
                        <td class="py-2.5"><span  onclick="openModal()"
                            class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-blue-400 text-white hover:cursor-pointer">Details</span>
                        </td>
                   
                       
                    </tr>
                    
                 
                </tbody>
            </table>
        </div>
    </div>


@endsection