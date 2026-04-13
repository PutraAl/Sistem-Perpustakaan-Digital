<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Siperdig — User Dashboard</title>
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

    <div class="flex min-h-screen  ">

        <aside id="sidebar"
            class="fixed top-0 left-0 h-full w-56 bg-white border-r border-gray-200 flex flex-col z-50
                   -translate-x-full lg:translate-x-0 lg:static lg:z-auto transition-transform duration-300 ease-in-out">

            <div class="flex items-center gap-3 px-4 py-4 border-b border-gray-100">
                <div class="w-9 h-9 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M4 19.5A2.5 2.5 0 016.5 17H20" />
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-800 leading-tight">Hi, Peter</p>
                </div>
            </div>

            {{-- Nav --}}
            <nav class="flex-1 overflow-y-auto px-2 py-3 space-y-0.5">

                <p class="px-2 pt-2 pb-1 text-[10px] font-semibold uppercase tracking-widest text-gray-400">Main</p>

                <a href="{{ route('user.buku') }}"
                    class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-medium transition-colors
   {{ request()->routeIs('user.buku') ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <rect x="3" y="3" width="7" height="7" />
                        <rect x="14" y="3" width="7" height="7" />
                        <rect x="14" y="14" width="7" height="7" />
                        <rect x="3" y="14" width="7" height="7" />
                    </svg>
                    Buku
                </a>

                <a href="{{ route('user.riwayat') }}"
                    class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-medium transition-colors
   {{ request()->routeIs('user.riwayat') ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M4 19.5A2.5 2.5 0 016.5 17H20" />
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z" />
                    </svg>
                    Peminjaman
                </a>



              










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
            <a href="{{ route('user.profil') }}">

            <div class="px-3 py-3 mt-[300px] border-t {{ request()->routeIs('user.profil') ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }} flex items-center gap-2.5">
                <div
                    class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-xs font-semibold flex-shrink-0">
                    AD
                </div>
                <div>
                    <p class="text-sm font-medium  leading-tight">Peter</p>
                    <p class="text-xs ">Anggota</p>
                </div>
            </div>
            </a>

        </aside>

        {{-- ===================== MAIN CONTENT ===================== --}}
        @yield('content')



        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
        <script>
            function toggleSidebar() {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebar-overlay');
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            }

        </script>
        @vite('resources/js/app.js')
</body>

</html>