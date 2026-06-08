<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-neutral-50 text-neutral-800">

    <header class="sticky top-0 bg-neutral-50/80 backdrop-blur border-b border-neutral-200">
        <div class="max-w-5xl mx-auto px-4 py-4 relative flex items-center">

            <a href="{{ url()->previous() != url()->current() ? url()->previous() : route('user.buku') }}" class="text-2xl text-neutral-500 hover:text-black transition">
                ←
            </a>

            <h1 class="absolute left-1/2 -translate-x-1/2 
                       text-sm md:text-base font-semibold tracking-wide">
                {{ $data->judul }}
            </h1>
        </div>
    </header>
    
    <main class="max-w-5xl mx-auto px-4 py-10">

        <div class="grid md:grid-cols-2 gap-10 items-start">

            <div class="w-full h-full">
                <img src="{{ asset('img/aaaa.jpeg') }}" class="w-full h-full object-cover rounded-xl">
            </div>

            <div class="flex flex-col justify-between h-full">

                <div>
                    <h2 class="text-2xl font-semibold leading-tight">
                        {{ $data->judul }}
                    </h2>

                    <div class="mt-4 space-y-2 text-sm text-neutral-600">
                        <p><span class="text-neutral-400">Penulis</span> — {{ $data->penulis }}</p>
                        <p><span class="text-neutral-400">Kategori</span> — {{ $data->kategori->nama_kategori }}</p>
                        <p><span class="text-neutral-400">Tahun terbit</span> — {{ $data->tahun_terbit }}</p>
                        <p><span class="text-neutral-400">Penerbit</span> — {{ $data->penerbit }}</p>
                    </div>
                    {{-- Garis pembatas --}}

                    <div class="border-t border-neutral-200 my-6 w-16"></div>

                    <p class="text-sm leading-relaxed text-neutral-600 max-w-md">
                     {{$data->deskripsi}}
                    </p>
                </div>

                <div class="flex items-center justify-end mt-10">
                    @if($data->stok>0) 
                    <span class="text-xs font-medium px-3 py-1.5 
                                 rounded-full bg-green-50 text-green-700 
                                 ring-1 ring-green-200">
                        Tersedia 
                    </span> 
                    @else
                    
                    <span class="text-xs font-medium px-3 py-1.5 
                                 rounded-full bg-red-50 text-red-700 
                                 ring-1 ring-red-200">
                        Sedang Tidak Tersedia 
                    </span>
                    @endif


                </div>

            </div>

        </div>

    </main>

</body>

</html>