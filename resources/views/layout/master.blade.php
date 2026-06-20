<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard')</title>

    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans">

    {{-- Overlay Mobile --}}
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden" onclick="toggleSidebar()">
    </div>

    {{-- Toggle Sidebar Mobile --}}
    <button onclick="toggleSidebar()"
        class="fixed top-3 left-3 z-50 lg:hidden bg-white border border-gray-200 rounded-lg p-2 shadow-sm">

        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            viewBox="0 0 24 24">

            <line x1="3" y1="6" x2="21" y2="6" />
            <line x1="3" y1="12" x2="21" y2="12" />
            <line x1="3" y1="18" x2="21" y2="18" />

        </svg>

    </button>

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        @include('components.sidebaradmin')

        {{-- Main Content --}}
        <main class="flex-1 lg:ml-72 w-full p-4">
            @yield('content')
        </main>

    </div>



    @vite('resources/js/app.js')

</body>
{{-- Alpine --}}
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

{{-- Flowbite --}}
<script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>

{{-- Chart.js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>

{{-- Tom Select --}}
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');

        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    }
</script>

<script>
    const barChart = document.getElementById('barChart');

    if (barChart) {
        new Chart(barChart, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    data: [520, 610, 740, 874, null, null, null, null, null, null, null, null],
                    backgroundColor: [
                        '#93c5fd',
                        '#93c5fd',
                        '#93c5fd',
                        '#2563eb',
                        'transparent',
                        'transparent',
                        'transparent',
                        'transparent',
                        'transparent',
                        'transparent',
                        'transparent',
                        'transparent'
                    ],
                    borderRadius: 4,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: (c) => c.raw ? `${c.raw} books` : ''
                        }
                    }
                }
            }
        });
    }

    const doughnutChart = document.getElementById('doughnutChart');

    if (doughnutChart) {
        new Chart(doughnutChart, {
            type: 'doughnut',
            data: {
                labels: ['Fiksi', 'Science', 'Sejarah', 'Teknologi', 'Anak-anak', 'Seni'],
                datasets: [{
                    data: [3820, 2140, 1870, 2230, 1540, 880],
                    backgroundColor: [
                        '#2563eb',
                        '#16a34a',
                        '#d97706',
                        '#ea580c',
                        '#7c3aed',
                        '#db2777'
                    ],
                    borderWidth: 0,
                    hoverOffset: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '68%',
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    }
</script>

<script>
    const modal = document.getElementById('modal');

    function openModal() {
        if (!modal) return;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModal() {
        if (!modal) return;

        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    // Menangkap session 'success' dari Controller (Store, Update, Destroy)
    @if(session('success'))
        Toast.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}'
        });
    @endif

    // Menangkap error validasi (Misal: Email sudah ada, password kurang panjang)
 // Menangkap error validasi
    @if($errors->any())
        Toast.fire({
            icon: 'error',
            title: 'Gagal Menyimpan!',
            // Ubah baris text ini agar menampilkan error pertama dari Laravel
            text: '{{ $errors->first() }}' 
        });
    @endif
    // @if($errors->any())
    //     Toast.fire({
    //         icon: 'error',
    //         title: 'Gagal Menyimpan!',
    //         text: 'Silakan periksa kembali isian form Anda.'
    //     });
    // @endif
</script>

</html>
