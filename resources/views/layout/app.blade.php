<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Siperdig — User Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans">

     <div class="">

        {{-- Sidebar --}}
        @include('components.sidebaruser')

        {{-- Main Content --}}
        <main class="flex-1 ml-0 lg:ml-56 w-full max-w-full p-4">
            @yield('content')
        </main>

    </div>

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