<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library Dashboard</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100 font-sans" x-data="{ open: false }">

<div class="flex min-h-screen">

    <!-- Overlay (mobile) -->
    <div x-show="open" @click="open = false"
         class="fixed inset-0 bg-black/40 z-40 md:hidden"></div>

    <!-- Sidebar -->
    <aside :class="open ? 'translate-x-0' : '-translate-x-full'"
           class="fixed md:static z-50 w-56 bg-white border-r transform md:translate-x-0 transition duration-200 flex flex-col">

        <!-- Brand -->
        <div class="p-4 border-b flex items-center gap-3">
            <div class="w-9 h-9 bg-blue-600 rounded flex items-center justify-center text-white">
                📚
            </div>
            <div>
                <div class="text-sm font-medium">LibraryOS</div>
                <div class="text-xs text-gray-500">Admin panel</div>
            </div>
        </div>

        <!-- Menu -->
        <nav class="flex-1 p-2 text-sm">

            <p class="text-gray-400 text-xs px-2 mt-3 mb-1 uppercase">Main</p>

            <a class="flex items-center gap-2 px-3 py-2 bg-blue-50 text-blue-600 border-l-2 border-blue-600">
                Dashboard
            </a>

            <a class="flex items-center gap-2 px-3 py-2 hover:bg-gray-100">
                Book Catalog
            </a>

            <a class="flex items-center gap-2 px-3 py-2 hover:bg-gray-100">
                Members
            </a>

            <a class="flex items-center gap-2 px-3 py-2 hover:bg-gray-100">
                Borrowing
            </a>

        </nav>

        <!-- Footer -->
        <div class="p-4 border-t flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center text-xs">
                AD
            </div>
            <div class="text-xs">
                <div class="font-medium">Admin</div>
                <div class="text-gray-500">Super admin</div>
            </div>
        </div>

    </aside>

    <!-- Main -->
    <main class="flex-1 p-6">
   
        <!-- Toggle -->
        <button @click="open = true"
                class="md:hidden mb-4 p-2 border rounded">
            ☰
        </button>

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-lg font-semibold">Dashboard</h1>
                <p class="text-sm text-gray-500">Welcome back, Admin</p>
            </div>

            <div class="flex items-center gap-2">
                <div class="text-sm bg-gray-200 px-3 py-1 rounded">
                    {{ now()->format('F d, Y') }}
                </div>
            </div>
        </div>

        <!-- Metrics -->
      
        @yield('content')
       

    </main>
</div>

<script>
new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
        labels: ['Jan','Feb','Mar','Apr'],
        datasets: [{
            data: [520, 610, 740, 874]
        }]
    }
});

new Chart(document.getElementById('pieChart'), {
    type: 'doughnut',
    data: {
        labels: ['Fiction','Science','Tech'],
        datasets: [{
            data: [40, 30, 30]
        }]
    }
});
</script>

</body>
</html>