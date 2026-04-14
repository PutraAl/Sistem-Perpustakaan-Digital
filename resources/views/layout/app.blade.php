<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Siperdig — User Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans">

   {{-- Sidebar User --}}
@include('component.sidebaruser')
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