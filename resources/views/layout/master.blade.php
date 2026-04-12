<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans">

    {{-- Mobile overlay --}}
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden" onclick="toggleSidebar()">
    </div>

    {{-- Mobile menu toggle --}}
    <button onclick="toggleSidebar()"
        class="fixed top-3 left-3 z-50 lg:hidden bg-white border border-gray-200 rounded-lg p-2 shadow-sm">
        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            viewBox="0 0 24 24">
            <line x1="3" y1="6" x2="21" y2="6" />
            <line x1="3" y1="12" x2="21" y2="12" />
            <line x1="3" y1="18" x2="21" y2="18" />
        </svg>
    </button>

    <div class="flex min-h-screen">

        {{-- ===================== SIDEBAR ===================== --}}
        <aside id="sidebar"
            class="fixed top-0 left-0 h-full w-56 bg-white border-r border-gray-200 flex flex-col z-50
                   -translate-x-full lg:translate-x-0 lg:static lg:z-auto transition-transform duration-300 ease-in-out">

            {{-- Brand --}}
            <div class="flex items-center gap-3 px-4 py-4 border-b border-gray-100">
                <div class="w-9 h-9 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M4 19.5A2.5 2.5 0 016.5 17H20" />
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-800 leading-tight">Peter</p>
                    <p class="text-xs text-gray-400">Admin panel</p>
                </div>
            </div>

            {{-- Nav --}}
            <nav class="flex-1 overflow-y-auto px-2 py-3 space-y-0.5">

                <p class="px-2 pt-2 pb-1 text-[10px] font-semibold uppercase tracking-widest text-gray-400">Main</p>

                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-medium transition-colors
   {{ request()->routeIs('admin.dashboard') ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <rect x="3" y="3" width="7" height="7" />
                        <rect x="14" y="3" width="7" height="7" />
                        <rect x="14" y="14" width="7" height="7" />
                        <rect x="3" y="14" width="7" height="7" />
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('admin.peminjaman') }}"
                    class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-medium transition-colors
   {{ request()->routeIs('admin.peminjaman') ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M4 19.5A2.5 2.5 0 016.5 17H20" />
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z" />
                    </svg>
                    Peminjaman
                </a>

                <a href="{{ route('admin.user') }}"
                    class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('admin.user') ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }} transition-colors">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 00-3-3.87" />
                        <path d="M16 3.13a4 4 0 010 7.75" />
                    </svg>
                    User
                </a>

                <a href="#"
                    class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <polyline points="9 11 12 14 22 4" />
                        <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" />
                    </svg>
                    Borrowing
                </a>

                <p class="px-2 pt-4 pb-1 text-[10px] font-semibold uppercase tracking-widest text-gray-400">Buku</p>

                <a href="{{ route('admin.buku') }}"
                    class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('admin.buku') ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}  transition-colors">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8" />
                        <line x1="21" y1="21" x2="16.65" y2="16.65" />
                    </svg>
                   Buku
                </a>

                <a href="{{ route('admin.kategori') }}"
                    class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('admin.kategori') ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}  transition-colors">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <line x1="8" y1="6" x2="21" y2="6" />
                        <line x1="8" y1="12" x2="21" y2="12" />
                        <line x1="8" y1="18" x2="21" y2="18" />
                        <line x1="3" y1="6" x2="3.01" y2="6" />
                        <line x1="3" y1="12" x2="3.01" y2="12" />
                        <line x1="3" y1="18" x2="3.01" y2="18" />
                    </svg>
                    Kategori
                </a>

                <a href="#"
                    class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                        <line x1="12" y1="9" x2="12" y2="13" />
                        <line x1="12" y1="17" x2="12.01" y2="17" />
                    </svg>
                    Overdue alerts
                    <span
                        class="ml-auto bg-red-100 text-red-700 text-[10px] font-semibold px-1.5 py-0.5 rounded-full">42</span>
                </a>

                <p class="px-2 pt-4 pb-1 text-[10px] font-semibold uppercase tracking-widest text-gray-400">System</p>

               

                <a href="#"
                    class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" y1="12" x2="9" y2="12" />
                    </svg>
                    Logout
                </a>
            </nav>

            {{-- User footer --}}
            <div class="px-3 py-3 border-t border-gray-100 flex items-center gap-2.5">
                <div
                    class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-xs font-semibold flex-shrink-0">
                    AD
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-800 leading-tight">Admin User</p>
                    <p class="text-xs text-gray-400">Super admin</p>
                </div>
            </div>
        </aside>

        {{-- ===================== MAIN CONTENT ===================== --}}
        @yield('content')

        <div id="modal" class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50 p-4">

            <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-4">

                <!-- Header -->
                <div class="flex justify-between items-center mb-3">
                    <h2 class="text-sm font-semibold text-gray-800">@yield('modal_title', 'Detail')</h2>
                    <button onclick="closeModal()" class="text-gray-400">✕</button>
                </div>

                <!-- Content -->
                <div>
                    @yield('modal_content')
                </div>

            </div>
        </div>
    </div>

    {{-- Chart.js via CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
    <script>
        // Sidebar toggle
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        // Bar chart
        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    data: [520, 610, 740, 874, null, null, null, null, null, null, null, null],
                    backgroundColor: ['#93c5fd', '#93c5fd', '#93c5fd', '#2563eb', 'transparent', 'transparent', 'transparent', 'transparent', 'transparent', 'transparent', 'transparent', 'transparent'],
                    borderRadius: 4,
                    borderSkipped: false,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: { callbacks: { label: c => c.raw ? `${c.raw} books` : '' } }
                },
                scales: {
                    x: { grid: { color: 'rgba(0,0,0,0.05)' }, ticks: { color: '#9ca3af', font: { size: 11 } } },
                    y: { grid: { color: 'rgba(0,0,0,0.05)' }, ticks: { color: '#9ca3af', font: { size: 11 } }, beginAtZero: true }
                }
            }
        });

        // Doughnut chart
        new Chart(document.getElementById('doughnutChart'), {
            type: 'doughnut',
            data: {
                labels: ['Fiction', 'Science', 'History', 'Technology', 'Children', 'Art & Design'],
                datasets: [{
                    data: [3820, 2140, 1870, 2230, 1540, 880],
                    backgroundColor: ['#2563eb', '#16a34a', '#d97706', '#ea580c', '#7c3aed', '#db2777'],
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
    </script>
    <script>
        const modal = document.getElementById('modal');

        function openModal() {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal() {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>

    @vite('resources/js/app.js')
</body>

</html>