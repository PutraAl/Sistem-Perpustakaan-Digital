@extends('layout.app')

@section('content')
    <div class="flex-1 min-w-0 pt-14 lg:pt-8 bg-white rounded-xl border border-gray-200 p-4">
        <div class="flex items-center justify-center mb-4">
            <div>
                <p class="text-md font-semibold text-gray-800">Selamat datang di Perpustakaan Digital</p>
            </div>
           

        </div>
        <form method="GET" action="" class="w-full bg-white p-3 mb-4 md:p-4 rounded-lg border border-gray-200">

            <div class="grid grid-cols-1 md:grid-cols-12 gap-2 md:gap-3">

                <div class="md:col-span-4">
                    <div
                        class="flex items-center bg-gray-50 border border-gray-300 rounded-md px-2 py-1.5 md:px-3 md:py-2 focus-within:ring-1 md:focus-within:ring-2 focus-within:ring-blue-400 ">

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
                        <option value="">Semua Kategori</option>
                        <option value="dipinjam" {{ request('kategori') == 'admin' ? 'selected' : '' }}>Science</option>
                        <option value="dikembalikan" {{ request('kategori') == 'anggota' ? 'selected' : '' }}>Fiksi
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

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
            <div class="bg-white rounded-xl shadow overflow-hidden">
                <img src="{{ asset('img/logopolibatam.png') }}" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h2 class="font-bold text-center">Sang Pembangkit Energi</h2>
                  
                    <div class="flex items-center justify-center mt-3 mb-2">

                        <a href="{{ route('user.detail') }}" class="text-center bg-blue-400 text-white py-1 px-4 rounded-md hover:text-blue-400 hover:bg-white hover:border-1" href="">Detail</a>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow overflow-hidden">
                <img src="{{ asset('img/logopolibatam.png') }}" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h2 class="font-bold text-center">Sang Pembangkit Energi</h2>
                  
                    <div class="flex items-center justify-center mt-3 mb-2">

                        <a class="text-center bg-blue-400 text-white py-1 px-4 rounded-md hover:text-blue-400 hover:bg-white hover:border-1" href="">Detail</a>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow overflow-hidden">
                <img src="{{ asset('img/logopolibatam.png') }}" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h2 class="font-bold text-center">Sang Pembangkit Energi</h2>
                  
                    <div class="flex items-center justify-center mt-3 mb-2">

                        <a class="text-center bg-blue-400 text-white py-1 px-4 rounded-md hover:text-blue-400 hover:bg-white hover:border-1" href="">Detail</a>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow overflow-hidden">
                <img src="{{ asset('img/logopolibatam.png') }}" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h2 class="font-bold text-center">Sang Pembangkit Energi</h2>
                  
                    <div class="flex items-center justify-center mt-3 mb-2">

                        <a class="text-center bg-blue-400 text-white py-1 px-4 rounded-md hover:text-blue-400 hover:bg-white hover:border-1" href="">Detail</a>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow overflow-hidden">
                <img src="{{ asset('img/logopolibatam.png') }}" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h2 class="font-bold text-center">Sang Pembangkit Energi</h2>
                  
                    <div class="flex items-center justify-center mt-3 mb-2">

                        <a class="text-center bg-blue-400 text-white py-1 px-4 rounded-md hover:text-blue-400 hover:bg-white hover:border-1" href="">Detail</a>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow overflow-hidden">
                <img src="{{ asset('img/logopolibatam.png') }}" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h2 class="font-bold text-center">Sang Pembangkit Energi</h2>
                  
                    <div class="flex items-center justify-center mt-3 mb-2">

                        <a class="text-center bg-blue-400 text-white py-1 px-4 rounded-md hover:text-blue-400 hover:bg-white hover:border-1" href="">Detail</a>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow overflow-hidden">
                <img src="{{ asset('img/logopolibatam.png') }}" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h2 class="font-bold text-center">Sang Pembangkit Energi</h2>
                  
                    <div class="flex items-center justify-center mt-3 mb-2">

                        <a class="text-center bg-blue-400 text-white py-1 px-4 rounded-md hover:text-blue-400 hover:bg-white hover:border-1" href="">Detail</a>
                    </div>
                </div>
            </div>

           

        </div>

    </div>
@endsection
