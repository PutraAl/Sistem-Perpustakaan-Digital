<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans">

    @include('component.sidebaradmin')

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