<nav class="bg-white/80 backdrop-blur border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <div class="w-9 h-9 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold">L</div>
            <span class="text-lg font-semibold text-gray-800">LibraryOS</span>
        </div>

        <div class="hidden md:flex gap-8 text-sm font-medium text-gray-600">
            <a href="{{ route('landing') }}" class="hover:text-blue-600">Home</a>
            <a href="{{ route('buku') }}" class="hover:text-blue-600">Koleksi</a>
            <a href="{{ route('kategori') }}" class="hover:text-blue-600">Kategori</a>
        </div>

        <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700">
            Login
        </a>
    </div>
</nav>