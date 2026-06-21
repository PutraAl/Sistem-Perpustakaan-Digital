@extends('layout.master')

@section('content')
    <div class="flex-1 min-w-0 pt-14 lg:pt-0">
        <div class="p-4 lg:p-6">

            {{-- Topbar --}}
            <div class="flex flex-wrap items-center justify-between gap-3 mb-6">
                <div>
                    <h1 class="text-lg font-semibold text-gray-800">Dashboard</h1>
                    <p class="text-sm text-gray-500">Hi, {{ auth()->user()->nama ?? auth()->user()->name ?? 'Admin' }} — selamat datang di website Sistem Perpustakaan Digital</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-xs text-gray-500 bg-white border border-gray-200 rounded-lg px-3 py-1.5 font-medium shadow-2xs">
                        {{ now()->format('F j, Y') }}
                    </span>
                </div>
            </div>
                                                                        
            {{-- Metric cards --}}
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 mb-6">
                <a href="{{ route('admin.buku') }}" class="block">
                    <div class="bg-white rounded-xl border border-gray-200 p-4 hover:shadow-md transition">
                        <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center mb-3">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 016.5 17H20" /><path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z" /></svg>
                        </div>
                        <p class="text-xs text-gray-500 mb-1">Total Buku</p>
                        <p class="text-2xl font-semibold text-gray-800">{{ $totalBuku ?? 0 }}</p>
                    </div>
                </a>

                <a href="{{ route('admin.user') }}" class="block">
                    <div class="bg-white rounded-xl border border-gray-200 p-4 hover:shadow-md transition">
                        <div class="w-8 h-8 bg-green-50 rounded-lg flex items-center justify-center mb-3">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" /><circle cx="9" cy="7" r="4" /><path d="M23 21v-2a4 4 0 00-3-3.87" /><path d="M16 3.13a4 4 0 010 7.75" /></svg>
                        </div>
                        <p class="text-xs text-gray-500 mb-1">Total Anggota</p>
                        <p class="text-2xl font-semibold text-gray-800">{{ $totalAnggota ?? 0 }}</p>
                    </div>
                </a>

                <a href="{{ route('admin.peminjaman') }}" class="block">
                    <div class="bg-white rounded-xl border border-gray-200 p-4 hover:shadow-md transition">
                        <div class="w-8 h-8 bg-amber-50 rounded-lg flex items-center justify-center mb-3">
                            <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><polyline points="9 11 12 14 22 4" /><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" /></svg>
                        </div>
                        <p class="text-xs text-gray-500 mb-1">Buku yang Dipinjam</p>
                        <p class="text-2xl font-semibold text-gray-800">{{ $bukuDipinjam ?? 0 }}</p>
                    </div>
                </a>

                <a href="{{ route('admin.peminjaman') }}" class="block">
                    <div class="bg-white rounded-xl border border-gray-200 p-4 hover:shadow-md transition">
                        <div class="w-8 h-8 bg-red-50 rounded-lg flex items-center justify-center mb-3">
                            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" /><line x1="12" y1="9" x2="12" y2="13" /><line x1="12" y1="17" x2="12.01" y2="17" /></svg>
                        </div>
                        <p class="text-xs text-gray-500 mb-1">Keterlambatan</p>
                        <p class="text-2xl font-semibold text-red-600">{{ $telatKembali ?? 0 }}</p>
                    </div>
                </a>
            </div>

            {{-- Charts row --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">

                {{-- Bar chart --}}
                <div class="bg-white rounded-xl border border-gray-200 p-4 shadow-2xs">
                    <p class="text-sm font-semibold text-gray-800">Peminjaman Buku Bulanan</p>
                    <p class="text-xs text-gray-400 mb-3">Statistik peminjaman — {{ date('Y') }}</p>
                    <div class="relative w-full h-52 mt-4">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>

                {{-- Doughnut chart --}}
                <div class="bg-white rounded-xl border border-gray-200 p-4 shadow-2xs">
                    <p class="text-sm font-semibold text-gray-800">Berdasarkan Kategori</p>
                    
                    @php 
                        $palet = ['#2563eb', '#16a34a', '#d97706', '#ea580c', '#7c3aed', '#db2777', '#059669', '#dc2626']; 
                        $kategoriList = $genreList ?? collect([]);
                    @endphp
                    
                    <div class="flex flex-wrap gap-x-3 gap-y-1.5 mb-3 mt-1">
                        @foreach($kategoriList as $idx => $g)
                            <span class="flex items-center gap-1 text-xs text-gray-600 font-medium">
                                <span class="w-2.5 h-2.5 rounded-sm inline-block" style="background:{{ $palet[$idx % count($palet)] }}"></span>
                                {{ $g['label'] }} ({{ $g['persen'] }}%)
                            </span>
                        @endforeach
                    </div>

                    <div class="relative w-full h-48">
                        <canvas id="doughnutChart"></canvas>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const barData = @json($dataBar ?? []);
        const genreList = @json($genreList ?? []);
        const palet = ['#2563eb', '#16a34a', '#d97706', '#ea580c', '#7c3aed', '#db2777', '#059669', '#dc2626'];

        const elBar = document.getElementById('barChart');
        if (elBar && barData.length > 0) {
            new Chart(elBar, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Jumlah Peminjaman',
                        data: barData,
                        backgroundColor: '#2563eb',
                        borderRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } }
                }
            });
        }

        const elDoughnut = document.getElementById('doughnutChart');
        if (elDoughnut && genreList.length > 0) {
            new Chart(elDoughnut, {
                type: 'doughnut',
                data: {
                    labels: genreList.map(i => i.label),
                    datasets: [{
                        data: genreList.map(i => i.count),
                        backgroundColor: genreList.map((_, i) => palet[i % palet.length]),
                        borderWidth: 0,
                        hoverOffset: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '68%',
                    plugins: { legend: { display: false } }
                }
            });
        }
    });
</script>
@endpush