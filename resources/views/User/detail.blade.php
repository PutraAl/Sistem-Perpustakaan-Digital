<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @media (prefers-reduced-motion: no-preference) {
            .fade-in { opacity: 0; animation: fadeIn 0.5s ease-out forwards; }
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(8px); }
                to { opacity: 1; transform: translateY(0); }
            }
        }
        @media (prefers-reduced-motion: reduce) {
            .fade-in { opacity: 1; }
        }
    </style>
</head>

<body class="bg-neutral-50 text-neutral-900 antialiased">

    {{-- Flash toast --}}
    @if(session('success'))
    <div id="toast-pinjam" class="fixed top-5 right-5 z-[60] flex items-center w-full max-w-xs p-4 bg-white rounded-xl shadow-lg border border-neutral-100" role="alert">
        <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-emerald-600 bg-emerald-50 rounded-lg">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 0 19 9.5 9.5 0 0 0 0-19Zm4.4 6.6-5 6a.75.75 0 0 1-1.12.06l-2.7-2.7a.75.75 0 1 1 1.06-1.06l2.1 2.1 4.46-5.36a.75.75 0 1 1 1.2.96Z"/></svg>
        </div>
        <div class="ms-3 text-sm font-medium text-neutral-800">{{ session('success') }}</div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 text-neutral-400 hover:text-neutral-600 rounded-lg p-1.5 inline-flex h-8 w-8 items-center justify-center"
                data-dismiss-target="#toast-pinjam" data-dismiss-action="hide" aria-label="Tutup">
            <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-width="2" d="M1 1l12 12M13 1 1 13"/></svg>
        </button>
    </div>
    @endif

    <header class="sticky top-0 bg-neutral-50/80 backdrop-blur border-b border-neutral-200 z-10">
        <div class="max-w-5xl mx-auto px-4 py-4 relative flex items-center">
            <a href="{{ url()->previous() != url()->current() ? url()->previous() : route('user.buku') }}"
               class="flex items-center gap-1.5 text-sm text-neutral-500 hover:text-neutral-900 transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                Kembali
            </a>
            <h1 class="absolute left-1/2 -translate-x-1/2 text-sm font-semibold truncate max-w-[50%]">
                {{ $data->judul }}
            </h1>
        </div>
    </header>

    <main class="max-w-5xl mx-auto px-4 py-12">
        <div class="grid md:grid-cols-2 gap-12 items-start">

            {{-- COVER --}}
            <div class="fade-in">
                <div class="group relative rounded-2xl overflow-hidden bg-white shadow-sm ring-1 ring-neutral-200 transition-shadow hover:shadow-lg">
                    <img src="{{ asset('img/' . $data->foto) }}" alt="Sampul {{ $data->judul }}"
                         class="w-full aspect-[3/4] object-cover transition-transform duration-300 group-hover:scale-[1.03]">
                </div>
            </div>

            {{-- DETAILS --}}
            <div class="flex flex-col justify-between h-full">

                <div class="fade-in" style="animation-delay: 0.08s">

                    <span class="inline-block text-xs font-medium px-2.5 py-1 rounded-full bg-neutral-100 text-neutral-600">
                        {{ $data->kategori->nama_kategori }}
                    </span>

                    <h2 class="mt-3 text-3xl font-bold leading-tight tracking-tight">
                        {{ $data->judul }}
                    </h2>
                    <p class="text-sm text-neutral-500 mt-1">{{ $data->penulis }}</p>

                    <div class="mt-6 grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <p class="text-neutral-400 text-xs">Tahun terbit</p>
                            <p class="font-medium mt-0.5">{{ $data->tahun_terbit }}</p>
                        </div>
                        <div>
                            <p class="text-neutral-400 text-xs">Penerbit</p>
                            <p class="font-medium mt-0.5">{{ $data->penerbit }}</p>
                        </div>
                        <div class="col-span-2">
                            <p class="text-neutral-400 text-xs">Stok tersedia</p>
                            <p class="font-medium mt-0.5">{{ $data->stok }} Stok</p>
                        </div>
                    </div>

                    <p class="text-sm leading-relaxed text-neutral-600 mt-6 max-w-md">
                        {{ $data->deskripsi }}
                    </p>
                </div>

                <div class="fade-in flex items-center justify-between mt-10" style="animation-delay: 0.16s">

                    @if($data->stok > 0)
                        <span class="inline-flex items-center gap-1.5 text-xs font-medium text-emerald-700">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            Tersedia
                        </span>

                         <form action="{{ route('user.buku.pinjam', $data->id_buku) }}" method="POST">
                                        @csrf
                                        <button type="submit" onclick="return confirm('Apakah anda yakin ingin meminjam buku ini?')"
                                            class="text-sm font-medium px-5 py-2.5 rounded-lg bg-neutral-900 text-white
                                       hover:bg-neutral-700 active:scale-95 transition-all">
                                            Pinjam Sekarang
                                        </button>
                                    </form>
                    @else
                        <span class="inline-flex items-center gap-1.5 text-xs font-medium text-red-600">
                            <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                            Tidak tersedia
                        </span>
                        <button type="button" disabled
                                class="text-sm font-medium px-5 py-2.5 rounded-lg bg-neutral-100 text-neutral-400 cursor-not-allowed">
                            Pinjam sekarang
                        </button>
                    @endif

                </div>

            </div>
        </div>
    </main>

    {{-- Confirmation modal --}}
   

</body>
</html>