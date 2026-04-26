<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SiPerDig — Sistem Perpustakaan Digital</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')
  <style>
    .font-display { font-family: 'Playfair Display', serif; }
    .font-body { font-family: 'DM Sans', sans-serif; }
  </style>
</head>

<body class="font-body bg-white text-gray-800 antialiased">

  {{-- ==============================
       NAVBAR
  ============================== --}}
  <nav class="fixed w-full z-50 top-0 start-0 bg-white/90 backdrop-blur-sm border-b border-sky-100 shadow-sm">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-4 py-3">

      {{-- Logo --}}
      <a href="#home" class="flex items-center space-x-3">
        <img src="{{ asset('img/logopolibatam.png') }}" class="h-9 rounded" alt="Logo Polibatam" />
        <span class="font-display text-xl text-sky-600 tracking-wide">SiPerDig</span>
      </a>

      {{-- Mobile hamburger --}}
      <button data-collapse-toggle="navbar-main" type="button"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-gray-500 rounded-lg md:hidden hover:bg-sky-50 focus:outline-none focus:ring-2 focus:ring-sky-300"
        aria-controls="navbar-main" aria-expanded="false">
        <span class="sr-only">Buka menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
      </button>

      {{-- Nav links --}}
      <div class="hidden w-full md:flex md:w-auto items-center gap-1" id="navbar-main">
        <ul class="flex flex-col md:flex-row md:items-center gap-1 mt-4 md:mt-0 font-medium">
          <li><a href="#home"     class="block px-4 py-2 text-sm text-sky-600 font-semibold rounded-lg transition">Beranda</a></li>
          <li><a href="#about"    class="block px-4 py-2 text-sm text-gray-600 rounded-lg hover:text-sky-600 hover:bg-sky-50 transition">Tentang</a></li>
          <li><a href="#features" class="block px-4 py-2 text-sm text-gray-600 rounded-lg hover:text-sky-600 hover:bg-sky-50 transition">Fitur</a></li>
          <li><a href="#team"     class="block px-4 py-2 text-sm text-gray-600 rounded-lg hover:text-sky-600 hover:bg-sky-50 transition">Tim</a></li>
        </ul>
        <a href="{{ route('login') }}"
          class="ms-4 text-sm font-medium text-white bg-sky-500 hover:bg-sky-600 focus:ring-4 focus:ring-sky-300 rounded-lg px-5 py-2 transition">
          Masuk
        </a>
      </div>

    </div>
  </nav>


  {{-- ==============================
       HERO
  ============================== --}}
  <section id="home" class="pt-28 pb-20 px-4 max-w-screen-xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

      {{-- Left: copy --}}
      <div>
        <span class="inline-block text-xs font-semibold tracking-widest uppercase text-sky-500 mb-4">Politeknik Negeri Batam</span>
        <h1 class="font-display text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight mb-6">
          Perpustakaan Digital <span class="text-sky-500">Masa Depan</span>
        </h1>
        <p class="text-gray-500 text-lg leading-relaxed mb-8 font-light">
          Akses ribuan koleksi buku, jurnal, dan referensi akademik kapan saja dan di mana saja. Perpustakaan tanpa batas untuk seluruh civitas akademika Polibatam.
        </p>
        <div class="flex flex-wrap gap-4">
          <a href="{{ route('login') }}"
            class="inline-flex items-center gap-2 px-6 py-3 text-sm font-medium text-white bg-sky-500 hover:bg-sky-600 rounded-lg transition focus:ring-4 focus:ring-sky-300 shadow-md shadow-sky-100">
            Mulai Sekarang
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
          </a>
          <a href="#features"
            class="inline-flex items-center gap-2 px-6 py-3 text-sm font-medium text-sky-600 border border-sky-300 hover:bg-sky-50 rounded-lg transition">
            Lihat Fitur
          </a>
        </div>

        {{-- Trust badges --}}
        <div class="flex flex-wrap items-center gap-6 mt-10 text-gray-400 text-sm">
          <span class="flex items-center gap-2">
            <svg class="w-4 h-4 text-sky-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/></svg>
            Akses 24/7
          </span>
          <span class="flex items-center gap-2">
            <svg class="w-4 h-4 text-sky-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/></svg>
            Gratis untuk Mahasiswa
          </span>
          <span class="flex items-center gap-2">
            <svg class="w-4 h-4 text-sky-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/></svg>
            Mudah Digunakan
          </span>
        </div>
      </div>

      {{-- Right: decorative book cards --}}
      <div class="hidden lg:flex flex-col gap-4">
        <div class="flex items-center gap-4 bg-white border border-gray-200 rounded-xl p-4 ms-10 shadow-sm hover:shadow-md transition-shadow">
          <div class="w-2 h-14 rounded-full bg-sky-400 shrink-0"></div>
          <div>
            <p class="text-gray-800 font-medium text-sm">Pemrograman Web Modern</p>
            <p class="text-gray-400 text-xs mt-1">Teknik Informatika · 2024</p>
          </div>
          <span class="ms-auto text-xs bg-sky-50 text-sky-600 border border-sky-200 px-2 py-1 rounded-md font-medium">Tersedia</span>
        </div>
        <div class="flex items-center gap-4 bg-sky-500 border border-sky-400 rounded-xl p-4 shadow-sm">
          <div class="w-2 h-14 rounded-full bg-white shrink-0"></div>
          <div>
            <p class="text-white font-medium text-sm">Sistem Basis Data Lanjut</p>
            <p class="text-sky-200 text-xs mt-1">Manajemen Informatika · 2023</p>
          </div>
          <span class="ms-auto text-xs bg-white/20 text-white border border-white/30 px-2 py-1 rounded-md font-medium">Tersedia</span>
        </div>
        <div class="flex items-center gap-4 bg-white border border-gray-200 rounded-xl p-4 ms-6 shadow-sm hover:shadow-md transition-shadow">
          <div class="w-2 h-14 rounded-full bg-gray-400 shrink-0"></div>
          <div>
            <p class="text-gray-800 font-medium text-sm">Jaringan Komputer & Keamanan</p>
            <p class="text-gray-400 text-xs mt-1">Teknik Elektro · 2024</p>
          </div>
          <span class="ms-auto text-xs bg-gray-100 text-gray-600 border border-gray-200 px-2 py-1 rounded-md font-medium">Dipinjam</span>
        </div>
        <div class="flex items-center gap-4 bg-white border border-gray-200 rounded-xl p-4 ms-14 shadow-sm hover:shadow-md transition-shadow">
          <div class="w-2 h-14 rounded-full bg-sky-300 shrink-0"></div>
          <div>
            <p class="text-gray-800 font-medium text-sm">Kalkulus & Matematika Diskrit</p>
            <p class="text-gray-400 text-xs mt-1">Matematika · 2023</p>
          </div>
          <span class="ms-auto text-xs bg-sky-50 text-sky-600 border border-sky-200 px-2 py-1 rounded-md font-medium">Tersedia</span>
        </div>
      </div>

    </div>
  </section>


  {{-- ==============================
       STATS
  ============================== --}}
  <section class="border-y border-sky-100 bg-sky-50 py-12 px-4">
    <div class="max-w-screen-xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
      <div>
        <p class="font-display text-4xl md:text-5xl font-bold text-sky-500">5.000+</p>
        <p class="text-gray-500 text-sm mt-2 tracking-wide">Koleksi Buku</p>
      </div>
      <div>
        <p class="font-display text-4xl md:text-5xl font-bold text-sky-500">1.200+</p>
        <p class="text-gray-500 text-sm mt-2 tracking-wide">Pengguna Aktif</p>
      </div>
      <div>
        <p class="font-display text-4xl md:text-5xl font-bold text-sky-500">300+</p>
        <p class="text-gray-500 text-sm mt-2 tracking-wide">Jurnal Ilmiah</p>
      </div>
      <div>
        <p class="font-display text-4xl md:text-5xl font-bold text-sky-500">24/7</p>
        <p class="text-gray-500 text-sm mt-2 tracking-wide">Akses Online</p>
      </div>
    </div>
  </section>


  {{-- ==============================
       ABOUT
  ============================== --}}
  <section id="about" class="py-20 px-4 max-w-screen-xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
      <div>
        <span class="inline-block text-xs font-semibold tracking-widest uppercase text-sky-500 mb-4">Tentang Kami</span>
        <h2 class="font-display text-3xl md:text-4xl font-bold text-gray-900 mb-6">Apa itu SiPerDig?</h2>
        <p class="text-gray-500 leading-relaxed mb-4 font-light">
          SiPerDig (Sistem Perpustakaan Digital) adalah platform pengelolaan perpustakaan berbasis web yang dikembangkan khusus untuk Politeknik Negeri Batam.
        </p>
        <p class="text-gray-500 leading-relaxed mb-6 font-light">
          Sistem ini memungkinkan mahasiswa untuk mencari, melihat status kesediaan buku dan melihat riwayat peminjaman secara digital — tanpa harus antre atau datang langsung ke perpustakaan fisik.
        </p>
        <ul class="space-y-3 text-sm text-gray-700">
          <li class="flex items-center gap-3">
            <span class="w-5 h-5 rounded-full bg-sky-100 flex items-center justify-center shrink-0">
              <svg class="w-3 h-3 text-sky-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"/></svg>
            </span>
            Terintegrasi dengan data mahasiswa 
          </li>
          <li class="flex items-center gap-3">
            <span class="w-5 h-5 rounded-full bg-sky-100 flex items-center justify-center shrink-0">
              <svg class="w-3 h-3 text-sky-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"/></svg>
            </span>
            Melihat jatuh tempo pengembalian
          </li>
          <li class="flex items-center gap-3">
            <span class="w-5 h-5 rounded-full bg-sky-100 flex items-center justify-center shrink-0">
              <svg class="w-3 h-3 text-sky-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"/></svg>
            </span>
            Dashboard admin untuk monitoring seluruh aktivitas
          </li>
        </ul>
      </div>

      <div class="space-y-4">
        {{-- White card --}}
        <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition-shadow">
          <div class="flex items-start gap-4">
            <div class="p-3 bg-sky-50 rounded-lg shrink-0">
              <svg class="w-6 h-6 text-sky-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg>
            </div>
            <div>
              <h3 class="text-gray-900 font-semibold mb-1">Koleksi Lengkap</h3>
              <p class="text-gray-500 text-sm leading-relaxed">Dari buku teks kuliah hingga jurnal internasional, semua tersedia dalam satu platform yang mudah diakses.</p>
            </div>
          </div>
        </div>
        {{-- Sky card --}}
        <div class="p-6 bg-sky-500 rounded-xl shadow-sm">
          <div class="flex items-start gap-4">
            <div class="p-3 bg-white/20 rounded-lg shrink-0">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 8.25h3m-3 3.75h3"/></svg>
            </div>
            <div>
              <h3 class="text-white font-semibold mb-1">Peminjaman Digital</h3>
              <p class="text-sky-100 text-sm leading-relaxed">Pinjam buku hanya dengan beberapa klik. Tidak perlu antre, tidak perlu datang ke gedung perpustakaan.</p>
            </div>
          </div>
        </div>
        {{-- Dark card --}}
        <div class="p-6 bg-gray-900 rounded-xl shadow-sm">
          <div class="flex items-start gap-4">
            <div class="p-3 bg-sky-500/20 rounded-lg shrink-0">
              <svg class="w-6 h-6 text-sky-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
            </div>
            <div>
              <h3 class="text-white font-semibold mb-1">Aman & Terpercaya</h3>
              <p class="text-gray-400 text-sm leading-relaxed">Data pengguna dilindungi dengan sistem autentikasi dan enkripsi yang memenuhi standar keamanan modern.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>


  {{-- ==============================
       FEATURES
  ============================== --}}
  <section id="features" class="py-20 px-4 bg-gray-50">
    <div class="max-w-screen-xl mx-auto">
      <div class="text-center mb-14">
        <span class="inline-block text-xs font-semibold tracking-widest uppercase text-sky-500 mb-4">Fitur Unggulan</span>
        <h2 class="font-display text-3xl md:text-4xl font-bold text-gray-900 mb-4">Semua yang Kamu Butuhkan</h2>
        <p class="text-gray-500 max-w-xl mx-auto font-light">Dirancang untuk memudahkan pengelolaan perpustakaan dan pengalaman membaca civitas akademika.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        @php
          $features = [
            ['icon' => 'M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25',                                                                                                                                                                                                                                                                                                                                'style' => 'sky',   'title' => 'Manajemen Koleksi',   'desc' => 'Tambah, edit, dan kelola seluruh koleksi buku dengan mudah. Dilengkapi kategori, tag, dan pencarian cepat.'],
            ['icon' => 'M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z',                                                                                                                                                                                                                                                                                                                                                                                                              'style' => 'dark',  'title' => 'Manajemen Anggota',   'desc' => 'Kelola data mahasiswa dan dosen. Riwayat peminjaman tersimpan otomatis per pengguna.'],
            ['icon' => 'M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m-6 3.75l3 3m0 0l3-3m-3 3V1.5m6 9h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75',                                                                                                                                                                                                                                                                                              'style' => 'white', 'title' => 'Peminjaman Digital',   'desc' => 'Proses peminjaman dan pengembalian buku secara online. Notifikasi otomatis saat jatuh tempo.'],
            ['icon' => 'M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 15.803 7.5 7.5 0 0015.803 15.803z',                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   'style' => 'sky',   'title' => 'Pencarian Cerdas',     'desc' => 'Temukan buku berdasarkan judul, pengarang, atau kategori dengan filter yang canggih.'],
            ['icon' => 'M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z',  'style' => 'dark',  'title' => 'Laporan & Statistik',  'desc' => 'Dashboard analitik untuk memantau aktivitas perpustakaan, buku terpopuler, dan tren peminjaman.'],
            ['icon' => 'M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z',                                                                                                                                                                                                                                                                                                                                               'style' => 'white', 'title' => 'Keamanan Berlapis',    'desc' => 'Data pengguna dilindungi enkripsi dan sistem autentikasi berlapis sesuai standar keamanan.'],
          ];
        @endphp

        @foreach ($features as $f)
          @if ($f['style'] === 'sky')
            <div class="p-6 bg-white border border-sky-100 hover:border-sky-300 rounded-xl shadow-sm hover:shadow-md transition-all duration-200">
              <div class="p-3 bg-sky-50 rounded-lg w-fit mb-4">
                <svg class="w-6 h-6 text-sky-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="{{ $f['icon'] }}"/>
                </svg>
              </div>
              <h3 class="text-gray-900 font-semibold mb-2">{{ $f['title'] }}</h3>
              <p class="text-gray-500 text-sm leading-relaxed font-light">{{ $f['desc'] }}</p>
            </div>
          @elseif ($f['style'] === 'dark')
            <div class="p-6 bg-gray-900 border border-gray-800 rounded-xl shadow-sm hover:shadow-lg transition-all duration-200">
              <div class="p-3 bg-sky-500/20 rounded-lg w-fit mb-4">
                <svg class="w-6 h-6 text-sky-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="{{ $f['icon'] }}"/>
                </svg>
              </div>
              <h3 class="text-white font-semibold mb-2">{{ $f['title'] }}</h3>
              <p class="text-gray-400 text-sm leading-relaxed font-light">{{ $f['desc'] }}</p>
            </div>
          @else
            <div class="p-6 bg-sky-500 rounded-xl shadow-sm hover:shadow-lg transition-all duration-200">
              <div class="p-3 bg-white/20 rounded-lg w-fit mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="{{ $f['icon'] }}"/>
                </svg>
              </div>
              <h3 class="text-white font-semibold mb-2">{{ $f['title'] }}</h3>
              <p class="text-sky-100 text-sm leading-relaxed font-light">{{ $f['desc'] }}</p>
            </div>
          @endif
        @endforeach

      </div>
    </div>
  </section>


  {{-- ==============================
       TEAM
  ============================== --}}
  <section id="team" class="py-20 px-4 bg-white">
    <div class="max-w-screen-xl mx-auto">
      <div class="text-center mb-14">
        <span class="inline-block text-xs font-semibold tracking-widest uppercase text-sky-500 mb-4">Tim Pengembang</span>
        <h2 class="font-display text-3xl md:text-4xl font-bold text-gray-900 mb-4">Orang-orang di Balik SiPerDig</h2>
        <p class="text-gray-500 max-w-xl mx-auto font-light">Mahasiswa Politeknik Negeri Batam yang berdedikasi membangun solusi digital untuk kampus.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">

        @php
          $team = [
            ['name' => 'Della Desriani',    'role' => 'Developer',     'bio' => 'Memimpin pengembangan sistem dan memastikan seluruh fitur berjalan sesuai kebutuhan pengguna.', 'initial' => 'D', 'style' => 'sky'],
            ['name' => 'Putra Alamsyah',    'role' => 'Developer',  'bio' => 'Bertanggung jawab atas pengembangan backend, API, dan integrasi sistem database perpustakaan.', 'initial' => 'P', 'style' => 'dark'],
            ['name' => 'Muhammad Nurferli', 'role' => 'Developer', 'bio' => 'Mengembangkan antarmuka pengguna yang responsif dan pengalaman yang intuitif bagi seluruh civitas.', 'initial' => 'M', 'style' => 'sky'],
          ];
        @endphp

        @foreach ($team as $member)
          @if ($member['style'] === 'sky')
            <div class="p-6 bg-white border border-sky-100 hover:border-sky-300 rounded-xl text-center shadow-sm hover:shadow-md transition-all duration-200">
              <div class="w-20 h-20 rounded-full bg-sky-50 border-2 border-sky-200 flex items-center justify-center mx-auto mb-4">
                <span class="font-display text-2xl font-bold text-sky-500">{{ $member['initial'] }}</span>
              </div>
              <h3 class="text-gray-900 font-semibold text-lg mb-1">{{ $member['name'] }}</h3>
              <span class="inline-block text-xs tracking-widest uppercase text-sky-500 font-semibold mb-3">{{ $member['role'] }}</span>
              <p class="text-gray-500 text-sm leading-relaxed font-light">{{ $member['bio'] }}</p>
            </div>
          @else
            <div class="p-6 bg-gray-900 border border-gray-800 rounded-xl text-center shadow-sm hover:shadow-lg transition-all duration-200">
              <div class="w-20 h-20 rounded-full bg-sky-500/20 border-2 border-sky-400/40 flex items-center justify-center mx-auto mb-4">
                <span class="font-display text-2xl font-bold text-sky-400">{{ $member['initial'] }}</span>
              </div>
              <h3 class="text-white font-semibold text-lg mb-1">{{ $member['name'] }}</h3>
              <span class="inline-block text-xs tracking-widest uppercase text-sky-400 font-semibold mb-3">{{ $member['role'] }}</span>
              <p class="text-gray-400 text-sm leading-relaxed font-light">{{ $member['bio'] }}</p>
            </div>
          @endif
        @endforeach

      </div>
    </div>
  </section>


  {{-- ==============================
       CTA BANNER
  ============================== --}}
  <section class="py-16 px-4 bg-sky-500">
    <div class="max-w-2xl mx-auto text-center">
      <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-4">Siap Menjelajahi Koleksi?</h2>
      <p class="text-sky-100 mb-8 font-light leading-relaxed">Bergabunglah dengan ribuan mahasiswa dan dosen yang sudah memanfaatkan SiPerDig untuk kebutuhan akademik mereka.</p>
      <a href="{{ route('login') }}"
        class="inline-flex items-center gap-2 px-8 py-4 text-base font-medium text-sky-600 bg-white hover:bg-sky-50 rounded-xl transition focus:ring-4 focus:ring-sky-300 shadow-lg">
        Daftar Sekarang — Gratis
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
      </a>
    </div>
  </section>


  {{-- ==============================
       FOOTER
  ============================== --}}
  <footer class="bg-gray-900 border-t border-gray-800">
    <div class="max-w-screen-xl mx-auto px-4 py-10">
      <div class="sm:flex sm:items-center sm:justify-between">
        <a href="#home" class="flex items-center space-x-3 mb-4 sm:mb-0">
          <img src="{{ asset('img/logopolibatam.png') }}" class="h-8 rounded" alt="Logo" />
          <span class="font-display text-xl text-sky-400">SiPerDig</span>
        </a>
        <ul class="flex flex-wrap gap-x-6 gap-y-2 text-sm text-gray-400">
          <li><a href="#home"     class="hover:text-sky-400 transition">Beranda</a></li>
          <li><a href="#about"    class="hover:text-sky-400 transition">Tentang</a></li>
          <li><a href="#features" class="hover:text-sky-400 transition">Fitur</a></li>
          <li><a href="#team"     class="hover:text-sky-400 transition">Tim</a></li>
        </ul>
      </div>
      <hr class="my-6 border-gray-800" />
      <p class="text-center text-sm text-gray-600">
        © 2026 <a href="#" class="hover:text-sky-400 transition">SiPerDig</a> · Politeknik Negeri Batam. All Rights Reserved.
      </p>
    </div>
  </footer>


  {{-- Scripts --}}
  <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
  @vite('resources/js/app.js')

</body>
</html>