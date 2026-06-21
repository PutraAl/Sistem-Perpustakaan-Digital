<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Siperdig — User Dashboard')</title>

    {{-- Tom Select CSS (Disamakan dengan master) --}}
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans">

    {{-- Overlay Mobile (Ditambahkan agar sidebar HP bisa ditutup) --}}
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden" onclick="toggleSidebar()">
    </div>

    {{-- Toggle Sidebar Mobile (Tombol Hamburger HP - Disamakan dengan master) --}}
    <button onclick="toggleSidebar()"
        class="fixed top-3 left-3 z-50 lg:hidden bg-white border border-gray-200 rounded-lg p-2 shadow-sm">
        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" viewBox="0 0 24 24">
            <line x1="3" y1="6" x2="21" y2="6" />
            <line x1="3" y1="12" x2="21" y2="12" />
            <line x1="3" y1="18" x2="21" y2="18" />
        </svg>
    </button>

    <div class="flex min-h-screen">

        {{-- Sidebar khusus User --}}
        @include('components.sidebaruser')

        {{-- Main Content --}}
        <main class="flex-1 lg:ml-72 w-full p-4">
            @yield('content')
        </main>

    </div>

    @vite('resources/js/app.js')

</body>

{{-- 1. ALPINE JS --}}
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

{{-- 2. FLOWBITE JS (INI DIA SANG JURU SELAMAT!) --}}
<script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>

{{-- 3. TOM SELECT JS --}}
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

{{-- 4. SWEETALERT 2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        if (sidebar && overlay) {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }
    }
</script>

<script>
    // Konfigurasi default Toast SweetAlert2
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    // Menangkap session 'success'
    @if(session('success'))
        Toast.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}'
        });
    @endif

    // Menangkap error validasi
    @if($errors->any())
        Toast.fire({
            icon: 'error',
            title: 'Gagal Menyimpan!',
            text: '{{ $errors->first() }}' 
        });
    @endif
</script>

</html>