{{-- Mobile overlay --}}
<div id="sidebar-overlay"
    class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden"
    onclick="toggleSidebar()">
</div>

{{-- Mobile button --}}
<button onclick="toggleSidebar()"
    class="fixed top-3 left-3 z-50 lg:hidden bg-white border border-gray-200 rounded-lg p-2 shadow-sm">

    <svg class="w-5 h-5 text-gray-600"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        viewBox="0 0 24 24">

        <line x1="3" y1="6" x2="21" y2="6" />
        <line x1="3" y1="12" x2="21" y2="12" />
        <line x1="3" y1="18" x2="21" y2="18" />

    </svg>

</button>

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside id="sidebar"
        class="fixed top-0 left-0 h-screen w-72
        bg-gradient-to-b from-white via-slate-50 to-slate-100
        border-r border-slate-200
        flex flex-col
        z-40
        -translate-x-full lg:translate-x-0
        transition-all duration-300 ease-in-out">

        <!-- LOGO -->
        <div class="px-5 py-5 border-b border-slate-200">

            <div class="flex items-center gap-3">

<<<<<<< HEAD
=======

                <a href="{{ route('landing') }}" onclick="return confirm('Apakah anda yakin ingin keluar?')"
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

            <a href="{{ route('admin.profil') }}">

            <div class="px-3 py-3 border-t {{ request()->routeIs('admin.profil') ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-200 hover:text-gray-900' }} flex items-center gap-2.5 ">
>>>>>>> 5fb8c51e1eef68950ebd3106c1b9dec4715a858c
                <div
                    class="w-12 h-12 rounded-2xl
                    bg-gradient-to-br from-blue-600 to-cyan-500
                    flex items-center justify-center
                    shadow-lg shadow-blue-200">

                    <svg class="w-6 h-6 text-white"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24">

                        <path d="M4 19.5A2.5 2.5 0 016.5 17H20" />
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z" />

                    </svg>

                </div>

                <div>

                    <h2 class="font-bold text-slate-800 text-lg">
                        LibraryHub
                    </h2>

                    <p class="text-xs text-slate-500">
                        Digital Library System
                    </p>

                </div>

            </div>

        </div>

        <!-- STATUS CARD -->
        <div class="px-4 pt-4">

            <div
                class="rounded-2xl
                bg-white
                border border-slate-200
                p-4
                shadow-sm">

                <p class="text-xs text-slate-500">
                    System Status
                </p>

                <h3 class="text-lg font-bold text-slate-800 mt-1">
                    Online
                </h3>

                <div class="flex items-center gap-2 mt-2">

                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>

                    <span class="text-xs text-slate-500">
                        Running Normally
                    </span>

                </div>

            </div>

        </div>

        <!-- MENU -->
        <nav class="flex-1 overflow-y-auto px-3 py-4">

            <p class="px-3 mb-2 text-[10px] uppercase tracking-widest font-semibold text-slate-400">
                Overview
            </p>

            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium mb-1 transition-all duration-300
                {{ request()->routeIs('admin.dashboard')
                    ? 'bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg shadow-blue-200'
                    : 'text-slate-600 hover:bg-blue-50 hover:text-blue-700 hover:translate-x-1' }}">
                Dashboard
            </a>

            <a href="{{ route('admin.peminjaman') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium mb-1 transition-all duration-300
                {{ request()->routeIs('admin.peminjaman')
                    ? 'bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg shadow-blue-200'
                    : 'text-slate-600 hover:bg-blue-50 hover:text-blue-700 hover:translate-x-1' }}">
                Circulation
            </a>

            <a href="{{ route('admin.user') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium mb-1 transition-all duration-300
                {{ request()->routeIs('admin.user')
                    ? 'bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg shadow-blue-200'
                    : 'text-slate-600 hover:bg-blue-50 hover:text-blue-700 hover:translate-x-1' }}">
                Members
            </a>

            <p class="px-3 mt-5 mb-2 text-[10px] uppercase tracking-widest font-semibold text-slate-400">
                Library
            </p>

            <a href="{{ route('admin.buku') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium mb-1 transition-all duration-300
                {{ request()->routeIs('admin.buku')
                    ? 'bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg shadow-blue-200'
                    : 'text-slate-600 hover:bg-blue-50 hover:text-blue-700 hover:translate-x-1' }}">
                Collection
            </a>

            <a href="{{ route('admin.kategori') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium mb-1 transition-all duration-300
                {{ request()->routeIs('admin.kategori')
                    ? 'bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg shadow-blue-200'
                    : 'text-slate-600 hover:bg-blue-50 hover:text-blue-700 hover:translate-x-1' }}">
                Categories
            </a>

            <p class="px-3 mt-5 mb-2 text-[10px] uppercase tracking-widest font-semibold text-slate-400">
                Account
            </p>

            <a href="#"
                class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium
                text-red-500 hover:bg-red-50 transition-all duration-300">
                Logout
            </a>

        </nav>

        <!-- PROFILE -->
        <div class="p-4 border-t border-slate-200 bg-white">

            <a href="{{ route('admin.profil') }}"
                class="flex items-center gap-3 p-3 rounded-2xl hover:bg-slate-50 transition">

                <div
                    class="w-11 h-11 rounded-2xl
                    bg-gradient-to-br from-blue-600 to-cyan-500
                    flex items-center justify-center
                    text-white font-bold
                    shadow-lg shadow-blue-200">

                    P

                </div>

                <div class="flex-1">

                    <p class="text-sm font-semibold text-slate-800">
                        Putra
                    </p>

                    <p class="text-xs text-slate-500">
                        Library Administrator
                    </p>

                </div>

                <svg class="w-4 h-4 text-slate-400"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24">

                    <path d="M9 18l6-6-6-6" />

                </svg>

            </a>

        </div>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 lg:ml-72">
        @yield('content')
    </main>

</div>