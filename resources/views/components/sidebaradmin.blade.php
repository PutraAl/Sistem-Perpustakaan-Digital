```blade
{{-- MOBILE OVERLAY --}}
<div id="sidebar-overlay"
    class="fixed inset-0 bg-slate-900/50 z-40 hidden lg:hidden"
    onclick="toggleSidebar()">
</div>

{{-- MOBILE BUTTON --}}
<button onclick="toggleSidebar()"
    class="fixed top-4 left-4 z-50 lg:hidden
    bg-[#0F172A] text-white p-2.5 rounded-xl shadow-lg">

    <svg class="w-5 h-5"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
        stroke-width="2">

        <line x1="3" y1="6" x2="21" y2="6"/>
        <line x1="3" y1="12" x2="21" y2="12"/>
        <line x1="3" y1="18" x2="21" y2="18"/>

    </svg>

</button>

<div class="flex min-h-screen bg-slate-50">

    {{-- SIDEBAR --}}
    <aside id="sidebar"
        class="fixed top-0 left-0 h-screen w-64
        bg-[#0F172A]
        text-white
        flex flex-col
        z-40
        shadow-2xl
        -translate-x-full lg:translate-x-0
        transition-all duration-300">

        {{-- HEADER --}}
<div class="px-5 py-4 border-b border-slate-700">
            <div class="flex items-center gap-4">

                <div
                    class="w-9 h-9 rounded-xl
                    bg-blue-600
                    flex items-center justify-center
                    shadow-lg">

                    <svg class="w-5 h-5 text-white"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24">

                        <path d="M22 10L12 5 2 10l10 5 10-5z"/>
                        <path d="M6 12v5c0 1.5 3 3 6 3s6-1.5 6-3v-5"/>

                    </svg>

                </div>

                <div>

                    <h2 class="text-lg font-bold">
                        LibraryHub
                    </h2>

                    <p class="text-xs text-slate-400">
                        Digital Library System
                    </p>

                </div>

            </div>

        </div>

        {{-- WELCOME CARD --}}
        <div class="p-2">

            <div
              class="rounded-xl
bg-gradient-to-r
from-blue-500
to-cyan-500
p-3
shadow-lg shadow-blue-500/20"

                <p class="text-blue-100 text-sm">
                    Selamat Datang
                </p>

<h3 class="font-semibold text-base mt-">
                    {{ Auth::user()->name ?? 'Administrator' }}

                </h3>

               

            </div>

        </div>

        {{-- MENU --}}
        <nav class="flex-1 px-4 overflow-y-auto">

        <p class="text-[11px] text-blue-100 mt-">

                Main Navigation

            </p>

            {{-- Dashboard --}}
<a href="{{ route('admin.dashboard') }}"
    class="flex items-center gap-3 px-3 py-2 rounded-xl mb-2 transition-all duration-300
    {{ request()->routeIs('admin.dashboard')
        ? 'bg-gradient-to-r from-blue-500 to-cyan-500 text-white shadow-lg shadow-blue-500/20'
        : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

    <svg class="w-4 h-4 flex-shrink-0"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        viewBox="0 0 24 24">
        <path d="M3 13h8V3H3v10z"/>
        <path d="M13 21h8V11h-8v10z"/>
        <path d="M13 3h8v4h-8z"/>
        <path d="M3 21h8v-6H3z"/>
    </svg>

    <span>Dashboard</span>

</a>

            {{-- Koleksi Buku --}}
<a href="{{ route('admin.buku') }}"
    class="flex items-center gap-3 px-3 py-2 rounded-xl mb-2 transition-all duration-300
    {{ request()->routeIs('admin.buku')
        ? 'bg-gradient-to-r from-blue-500 to-cyan-500 text-white shadow-lg shadow-blue-500/20'
        : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

    <svg class="w-4 h-4 flex-shrink-0"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        viewBox="0 0 24 24">
        <path d="M4 19.5A2.5 2.5 0 016.5 17H20"/>
        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/>
    </svg>

    <span>Koleksi Buku</span>

</a>


<a href="{{ route('admin.peminjaman') }}"
    class="flex items-center gap-3 px-3 py-2 rounded-xl mb-2 transition-all duration-300
    {{ request()->routeIs('admin.peminjaman')
        ? 'bg-gradient-to-r from-blue-500 to-cyan-500 text-white shadow-lg shadow-blue-500/20'
        : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

    <svg class="w-4 h-4 flex-shrink-0"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        viewBox="0 0 24 24">
        <path d="M9 11l3 3L22 4"/>
        <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/>
    </svg>

    <span>Peminjaman</span>

</a>

            {{-- Anggota --}}
<a href="{{ route('admin.user') }}"
    class="flex items-center gap-3 px-3 py-2 rounded-xl mb-2 transition-all duration-300
    {{ request()->routeIs('admin.user')
        ? 'bg-gradient-to-r from-blue-500 to-cyan-500 text-white shadow-lg shadow-blue-500/20'
        : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

    <svg class="w-4 h-4 flex-shrink-0"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        viewBox="0 0 24 24">
        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
        <circle cx="9" cy="7" r="4"/>
        <path d="M23 21v-2a4 4 0 00-3-3.87"/>
        <path d="M16 3.13a4 4 0 010 7.75"/>
    </svg>

    <span>Anggota</span>

</a>

            {{-- Kategori --}}
<a href="{{ route('admin.kategori') }}"
    class="flex items-center gap-3 px-3 py-2 rounded-xl mb-2 transition-all duration-300
    {{ request()->routeIs('admin.kategori')
        ? 'bg-gradient-to-r from-blue-500 to-cyan-500 text-white shadow-lg shadow-blue-500/20'
        : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

    <svg class="w-4 h-4 flex-shrink-0"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        viewBox="0 0 24 24">
        <path d="M20.59 13.41L11 3H4v7l9.59 9.59a2 2 0 002.82 0l4.18-4.18a2 2 0 000-2.82z"/>
        <line x1="7" y1="7" x2="7.01" y2="7"/>
    </svg>

    <span>Kategori</span>

</a>

            {{-- QUICK ACCESS --}}
            <div class="mt-4">

                <p class="text-[11px]
                    uppercase
                    tracking-widest
                    text-slate-500
                    px-4 mb-2">

                    Quick Access

                </p>

                <div class="space-y-2">

                    <a href="#"
                        class="block px-4 py-1.5 text-sm text-slate-300 hover:text-white hover:bg-slate-800 rounded-lg">

                        + Tambah Buku

                    </a>

                    <a href="#"
                        class="block px-4 py-1.5 text-sm text-slate-300 hover:text-white hover:bg-slate-800 rounded-lg">

                        + Tambah Anggota

                    </a>

                    <a href="#"
                        class="block px-4 py-1.5 text-sm text-slate-300 hover:text-white hover:bg-slate-800 rounded-lg">

                        + Tambah Kategori

                    </a>

                </div>

            </div>

        </nav>

        {{-- PROFILE --}}
        <div class="border-t border-slate-700 p-3">

            <a href="{{ route('admin.profil') }}"
                class="flex items-center gap-3 p-2.5 rounded-xl hover:bg-slate-800 transition">

                <div
                    class="w-10 h-10 rounded-full
                    bg-blue-600
                    flex items-center justify-center
                    font-bold">

                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}

                </div>

                <div class="flex-1">

                    <p class="text-sm font-medium">
                        {{ Auth::user()->name ?? 'Administrator' }}
                    </p>

                    <p class="text-xs text-slate-400">
                        Library Administrator
                    </p>

                </div>

            </a>

            <a href="{{ route('landing') }}"
                onclick="return confirm('Apakah yakin ingin logout?')"
                class="mt-2 flex justify-center items-center py-2 rounded-xl
                bg-red-500/10 text-red-400 hover:bg-red-500/20 transition">

                Logout

            </a>

        </div>

    </aside>

</div>

<script>
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('-translate-x-full');
    document.getElementById('sidebar-overlay').classList.toggle('hidden');
}
</script>
```
