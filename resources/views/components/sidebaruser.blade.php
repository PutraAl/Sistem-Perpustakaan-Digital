{{-- Mobile overlay --}}
<div id="sidebar-overlay" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden" onclick="toggleSidebar()">
</div>

{{-- Mobile menu toggle --}}
<button onclick="toggleSidebar()"
    class="fixed top-3 left-3 z-50 lg:hidden bg-white border border-gray-200 rounded-lg p-2 shadow-sm">
    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
        stroke-linecap="round" viewBox="0 0 24 24">
        <line x1="3" y1="6" x2="21" y2="6" />
        <line x1="3" y1="12" x2="21" y2="12" />
        <line x1="3" y1="18" x2="21" y2="18" />
    </svg>
</button>



    <aside id="sidebar"
        class="fixed top-0 left-0 h-screen w-56
        bg-gradient-to-b from-blue-600 via-blue-700 to-blue-800
        text-white flex flex-col z-40 shadow-xl
        -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">

        {{-- Header --}}
        <div class="flex items-center gap-3 px-4 py-5 border-b border-blue-500">

            <div
                class="w-10 h-10 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M4 19.5A2.5 2.5 0 016.5 17H20" />
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z" />
                </svg>
            </div>

            <div>
                <p class="text-lg font-semibold">
                   Hi, {{ auth()->user()?->nama ?? auth()->user()?->name ?? 'Pengguna' }}
                </p>
            </div>
        </div>

        {{-- Menu --}}
        <nav class="flex-1 px-3 py-4">

            <p class="text-xs uppercase tracking-widest text-blue-200 font-semibold mb-3 px-2">
                Main
            </p>

             {{-- Dashboard --}}
    <a href="{{ route('user.dashboard') }}"
        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 mb-2
        {{ request()->routeIs('user.dashboard')
            ? 'bg-white/20 text-white shadow'
            : 'text-blue-100 hover:bg-white/10 hover:text-white' }}">

        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8"
            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
            <path d="M3 9.75L12 3l9 6.75"></path>
            <path d="M5.25 10.5V21h13.5V10.5"></path>
        </svg>

        Dashboard
    </a>

            {{-- Buku --}}
            <a href="{{ route('user.buku') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 mb-2
                {{ request()->routeIs('user.buku')
                    ? 'bg-white/20 text-white shadow'
                    : 'text-blue-100 hover:bg-white/10 hover:text-white' }}">

                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <rect x="3" y="3" width="7" height="7" />
                    <rect x="14" y="3" width="7" height="7" />
                    <rect x="14" y="14" width="7" height="7" />
                    <rect x="3" y="14" width="7" height="7" />
                </svg>

                Buku
            </a>

            {{-- Peminjaman --}}
            <a href="{{ route('user.riwayat') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 mb-2
                {{ request()->routeIs('user.riwayat')
                    ? 'bg-white/20 text-white shadow'
                    : 'text-blue-100 hover:bg-white/10 hover:text-white' }}">

                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M4 19.5A2.5 2.5 0 016.5 17H20" />
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z" />
                </svg>

                Peminjaman
            </a>

            {{-- Logout --}}
            <a href="{{ route('landing') }}"
                onclick="return confirm('Apakah anda yakin ingin keluar?')"
                class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-blue-100 hover:bg-red-500 hover:text-white transition-all duration-200">

                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4" />
                    <polyline points="16 17 21 12 16 7" />
                    <line x1="21" y1="12" x2="9" y2="12" />
                </svg>

                Logout
            </a>

        </nav>

        {{-- Profile --}}
        <a href="{{ route('user.profil') }}">

            <div
                class="mt-auto border-t border-blue-500 px-4 py-4 flex items-center gap-3 transition-all duration-200
                {{ request()->routeIs('user.profil')
                    ? 'bg-white/20 text-white'
                    : 'text-blue-100 hover:bg-white/10' }}">

                <div
                    class="w-10 h-10 rounded-full bg-white text-blue-700 flex items-center justify-center font-bold">
                   {{ strtoupper(substr(auth()->user()?->nama ?? auth()->user()?->name ?? 'PG', 0, 2)) }}
                </div>

                <div>
                    <p class="text-sm font-semibold">
                       {{ auth()->user()?->nama ?? auth()->user()?->name ?? 'Pengguna' }}
                    </p>
                    <p class="text-xs text-blue-200">
                        Anggota
                    </p>
                </div>

            </div>

        </a>

    </aside>
