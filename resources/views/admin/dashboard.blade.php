@extends('layout.master')
@section('content')
 <div class="flex-1 min-w-0 pt-14 lg:pt-0">
            <div class="p-4 lg:p-6">

                {{-- Topbar --}}
                <div class="flex flex-wrap items-center justify-between gap-3 mb-6">
                    <div>
                        <h1 class="text-lg font-semibold text-gray-800">Dashboard</h1>
                        <p class="text-sm text-gray-500">Welcome back, Peter — here's what's happening today</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-xs text-gray-500 bg-white border border-gray-200 rounded-lg px-3 py-1.5">
                            {{ now()->format('F j, Y') }}
                        </span>
                        {{-- <div class="relative">
                            <button class="p-2 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="1.8"
                                    stroke-linecap="round" viewBox="0 0 24 24">
                                    <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9" />
                                    <path d="M13.73 21a2 2 0 01-3.46 0" />
                                </svg>
                            </button>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                        </div> --}}
                    </div>
                </div>

                {{-- Metric cards --}}
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 mb-6">

                    <div class="bg-white rounded-xl border border-gray-200 p-4">
                        <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center mb-3">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M4 19.5A2.5 2.5 0 016.5 17H20" />
                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z" />
                            </svg>
                        </div>
                        <p class="text-xs text-gray-500 mb-1">Total Buku</p>
                        <p class="text-2xl font-semibold text-gray-800">12,480</p>
                        <p class="text-xs text-green-600 mt-1">+111 added this month</p>
                    </div>

                    <div class="bg-white rounded-xl border border-gray-200 p-4">
                        <div class="w-8 h-8 bg-green-50 rounded-lg flex items-center justify-center mb-3">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M23 21v-2a4 4 0 00-3-3.87" /><path d="M16 3.13a4 4 0 010 7.75" />
                            </svg>
                        </div>
                        <p class="text-xs text-gray-500 mb-1">Total Anggota</p>
                        <p class="text-2xl font-semibold text-gray-800">3,214</p>
                        <p class="text-xs text-green-600 mt-1">+56 this week</p>
                    </div>

                    <div class="bg-white rounded-xl border border-gray-200 p-4">
                        <div class="w-8 h-8 bg-amber-50 rounded-lg flex items-center justify-center mb-3">
                            <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <polyline points="9 11 12 14 22 4" />
                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" />
                            </svg>
                        </div>
                        <p class="text-xs text-gray-500 mb-1">Buku yang dipinjam</p>
                        <p class="text-2xl font-semibold text-gray-800">874</p>
                        <p class="text-xs text-green-600 mt-1">+38 today</p>
                    </div>

                    <div class="bg-white rounded-xl border border-gray-200 p-4">
                        <div class="w-8 h-8 bg-red-50 rounded-lg flex items-center justify-center mb-3">
                            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                                <line x1="12" y1="9" x2="12" y2="13" /><line x1="12" y1="17" x2="12.01" y2="17" />
                            </svg>
                        </div>
                        <p class="text-xs text-gray-500 mb-1">Keterlambatan Pengembalian</p>
                        <p class="text-2xl font-semibold text-gray-800">42</p>
                        <p class="text-xs text-red-500 mt-1">+7 since yesterday</p>
                    </div>
                </div>

                {{-- Charts row --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">

                    {{-- Bar chart --}}
                    <div class="bg-white rounded-xl border border-gray-200 p-4">
                        <p class="text-sm font-semibold text-gray-800">Peminjaman Buku Bulanan</p>
                        <p class="text-xs text-gray-400 mb-3">Books borrowed per month — 2026</p>
                        <div class="flex flex-wrap gap-3 mb-3">
                            <span class="flex items-center gap-1.5 text-xs text-gray-500">
                                <span class="w-2.5 h-2.5 rounded-sm bg-blue-600 inline-block"></span>Current month
                            </span>
                            <span class="flex items-center gap-1.5 text-xs text-gray-500">
                                <span class="w-2.5 h-2.5 rounded-sm bg-blue-300 inline-block"></span>Previous months
                            </span>
                        </div>
                        <div class="relative w-full h-52">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>

                    {{-- Doughnut chart --}}
                    <div class="bg-white rounded-xl border border-gray-200 p-4">
                        <p class="text-sm font-semibold text-gray-800">Collection by genre</p>
                        <p class="text-xs text-gray-400 mb-3">Distribution across book categories</p>
                        <div class="flex flex-wrap gap-x-3 gap-y-1.5 mb-3">
                            <span class="flex items-center gap-1.5 text-xs text-gray-500"><span class="w-2.5 h-2.5 rounded-sm inline-block" style="background:#2563eb"></span>Fiction 30%</span>
                            <span class="flex items-center gap-1.5 text-xs text-gray-500"><span class="w-2.5 h-2.5 rounded-sm inline-block" style="background:#16a34a"></span>Science 17%</span>
                            <span class="flex items-center gap-1.5 text-xs text-gray-500"><span class="w-2.5 h-2.5 rounded-sm inline-block" style="background:#d97706"></span>History 15%</span>
                            <span class="flex items-center gap-1.5 text-xs text-gray-500"><span class="w-2.5 h-2.5 rounded-sm inline-block" style="background:#ea580c"></span>Technology 18%</span>
                            <span class="flex items-center gap-1.5 text-xs text-gray-500"><span class="w-2.5 h-2.5 rounded-sm inline-block" style="background:#7c3aed"></span>Children 12%</span>
                            <span class="flex items-center gap-1.5 text-xs text-gray-500"><span class="w-2.5 h-2.5 rounded-sm inline-block" style="background:#db2777"></span>Art 7%</span>
                        </div>
                        <div class="relative w-full h-52">
                            <canvas id="doughnutChart"></canvas>
                        </div>
                    </div>
                </div>

                {{-- Recent borrowing table --}}
            

            </div>
        </div>
        @endsection