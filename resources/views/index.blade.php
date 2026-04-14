<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @vite('resources/css/app.css')
</head>

<body>

  <nav class="max-w-screen-xl mx-auto px-4 bg-white fixed w-full z-20 top-0 start-0 border-b border-default">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

      {{-- Logo --}}
      <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="{{ asset('img/logopolibatam.png') }}" class="h-8" alt="Logo" />
        <span class="self-center text-xl text-heading font-semibold whitespace-nowrap">SiPerDig</span>
      </a>

      {{-- Hamburger button (mobile only) --}}
      <button id="navbar-toggle" type="button"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-body rounded-base md:hidden hover:bg-neutral-secondary-soft hover:text-heading focus:outline-none focus:ring-2 focus:ring-neutral-tertiary"
        aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        {{-- Hamburger icon --}}
        <svg id="icon-open" class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
          viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
        </svg>
        {{-- Close icon (hidden by default) --}}
        <svg id="icon-close" class="w-6 h-6 hidden" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
          viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>

      {{-- Nav links --}}
      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul
          class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-default rounded-base bg-neutral-secondary-soft md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-neutral-primary">
          <li>
            <a href="#" class="block py-2 px-3 text-heading bg-brand rounded md:bg-transparent md:text-fg-brand md:p-0"
              aria-current="page">Home</a>
          </li>
          <li>
            <a href="#"
              class="block py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0">About</a>
          </li>
          <li>
            <a href="#"
              class="block py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0">Features</a>
          </li>
          <li>
            <a href="#"
              class="block py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0">Contact</a>
          </li>
        </ul>
      </div>

    </div>
  </nav>

  <div id="home" class="max-w-screen-xl mx-auto px-4 grid grid-cols-12 mt-[85px] md:mb-[70px]">
    <div class="col-span-12 md:col-span-6 place-items-center order-1 md:order-2">

      <img class="w-[250px] h-[250px]" src="{{ asset('img/logopolibatam.png') }}" alt="">
    </div>
<<<<<<< HEAD
    <div class="col-span-12 md:col-span-6 order-2 md:order-1 text-wrap">
      <div class="deskripsi">

        <h1 class="text-center font-bold text-2xl text-pretty py-2">Sistem Perpustakaan Digital</h1>
        <p class="px-5  indent-8">Sistem perpustakaan digital adalah sebuah sistem Lorem, ipsum dolor sit amet
          consectetur adipisicing elit. Dolorem, saepe nam id, in voluptas consectetur, veniam iure placeat illum autem
          vel! Quisquam ullam quos earum consectetur asperiores minima totam quod ducimus soluta quae ex deserunt
          eveniet odit expedita aliquam, enim, ab iure molestiae eius at modi. Ad eos nesciunt adipisci?</p>

      </div>
      <div class="link-start text-center mt-5  ">

        <a href=""
          class="bg-blue-400 text-white py-2 px-4 rounded-md hover:text-blue-400 hover:bg-white hover:border-1">

          Start From Here
        </a>
      </div>
=======
   <div class="link-start text-center mt-5">

    <a href="/login"
       class="inline-block bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 transition">
        Start From Here
    </a>

</div>
>>>>>>> fc3391e38e989e124db07ace8e4489f6a51c39e3
    </div>
  </div>

  <hr class="hidden md:block">

  <div id="features" class="mx-4 my-6">
    <div class="grid grid-cols-12 gap-6 max-w-screen-xl mx-auto px-4 ">

      <div
        class="col-span-12 md:col-span-4 border-2 border-transparent place-items-center py-3 text-white rounded-md bg-blue-400 hover:border-2 hover:border-blue-400 hover:bg-white hover:text-blue-400 ">
        <div class="flex justify-content-center ">

          <img src="{{ asset('img/logopolibatam.png') }}" class="h-[50px] w-[50px]" alt="">
          <p class="font-bold text-xl px-4 py-2 ">Manajemen Buku</p>
        </div>
        <p class="text-center text-sm px-4 py-2">
          Memiliki fitur Menambah, menghapus serta mengedit buku serta Lorem ipsum dolor sit amet consectetur
          adipisicing elit.
        </p>
      </div>
      <div
        class="col-span-12 md:col-span-4 border-2 border-transparent place-items-center py-3 text-white rounded-md bg-blue-400 hover:border-2 hover:border-blue-400 hover:bg-white hover:text-blue-400 ">
        <div class="flex justify-content-center ">

          <img src="{{ asset('img/logopolibatam.png') }}" class="h-[50px] w-[50px]" alt="">
          <p class="font-bold text-xl px-4 py-2 ">Manajemen Buku</p>
        </div>
        <p class="text-center text-sm px-4 py-2">
          Memiliki fitur Menambah, menghapus serta mengedit buku serta Lorem ipsum dolor sit amet consectetur
          adipisicing elit.
        </p>
      </div>
      <div
        class="col-span-12 md:col-span-4 border-2 border-transparent place-items-center py-3 text-white rounded-md bg-blue-400 hover:border-2 hover:border-blue-400 hover:bg-white hover:text-blue-400 ">
        <div class="flex justify-content-center ">

          <img src="{{ asset('img/logopolibatam.png') }}" class="h-[50px] w-[50px]" alt="">
          <p class="font-bold text-xl px-4 py-2 ">Manajemen Buku</p>
        </div>
        <p class="text-center text-sm px-4 py-2">
          Memiliki fitur Menambah, menghapus serta mengedit buku serta Lorem ipsum dolor sit amet consectetur
          adipisicing elit.
        </p>
      </div>


    </div>
  </div>

  <hr class="hidden md:block">

  <div id="contact">
    you can call us
  </div>

  {{-- Vanilla JS toggle (no Flowbite dependency needed) --}}
  <script>
    const toggle = document.getElementById('navbar-toggle');
    const menu = document.getElementById('navbar-default');
    const iconOpen = document.getElementById('icon-open');
    const iconClose = document.getElementById('icon-close');

    toggle.addEventListener('click', () => {
      const isOpen = !menu.classList.contains('hidden');

      menu.classList.toggle('hidden', isOpen);
      iconOpen.classList.toggle('hidden', !isOpen);
      iconClose.classList.toggle('hidden', isOpen);
      toggle.setAttribute('aria-expanded', String(!isOpen));
    });
  </script>

</body>

</html>