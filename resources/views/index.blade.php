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
    <h1 class="text-center text-semibold text-4xl text-blue-500 my-3">US</h1>

    <div class="grid grid-cols-12">
      <div class="col-span-12 md:col-span-4">


        <div class="relative bg-neutral-primary-soft max-w-xs w-full p-6 border border-default rounded-base shadow-xs">
          <button id="dropdownButton" data-dropdown-toggle="dropdown"
            class="absolute top-2 end-2 text-body hover:text-heading bg-neutral-primary-soft box-border border border-transparent hover:bg-neutral-tertiary focus:ring-4 focus:ring-neutral-tertiary rounded-base p-1.5 focus:outline-none"
            type="button">
            <span class="sr-only">Open dropdown</span>
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
              fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-width="3" d="M6 12h.01m6 0h.01m5.99 0h.01" />
            </svg>
          </button>
          <!-- Dropdown menu -->
          <div id="dropdown"
            class="z-10 bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-36 block hidden">
            <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdownButton">
              <li>
                <a href="#"
                  class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">Edit</a>
              </li>
              <li>
                <a href="#"
                  class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">Export
                  Data</a>
              </li>
              <li>
                <a href="#"
                  class="inline-flex items-center w-full p-2 text-fg-danger hover:bg-neutral-tertiary-medium rounded-md">Delete</a>
              </li>
            </ul>
          </div>
          <div class="flex flex-col items-center">
            <img class="w-24 h-24 mb-6 rounded-full" src="{{ asset('img/logopolibatam.png') }}" alt="Bonnie image" />
            <h5 class="mb-0.5 text-xl font-semibold tracking-tight text-heading">Putra Alamsyah</h5>
            <span class="text-sm text-body">Team</span>
            <div class="flex mt-4 md:mt-6 gap-4">
              <button type="button"
                class="inline-flex items-center text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                  height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                Follow me
              </button>
              <button type="button"
                class="inline-flex self-start w-auto text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                Message
              </button>
            </div>
          </div>
        </div>

      </div>
      <div class="col-span-12 md:col-span-4">
        <div class="relative bg-neutral-primary-soft max-w-xs w-full p-6 border border-default rounded-base shadow-xs">
          <button id="dropdownButton" data-dropdown-toggle="dropdown"
            class="absolute top-2 end-2 text-body hover:text-heading bg-neutral-primary-soft box-border border border-transparent hover:bg-neutral-tertiary focus:ring-4 focus:ring-neutral-tertiary rounded-base p-1.5 focus:outline-none"
            type="button">
            <span class="sr-only">Open dropdown</span>
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
              fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-width="3" d="M6 12h.01m6 0h.01m5.99 0h.01" />
            </svg>
          </button>
          <!-- Dropdown menu -->
          <div id="dropdown"
            class="z-10 bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-36 block hidden">
            <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdownButton">
              <li>
                <a href="#"
                  class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">Edit</a>
              </li>
              <li>
                <a href="#"
                  class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">Export
                  Data</a>
              </li>
              <li>
                <a href="#"
                  class="inline-flex items-center w-full p-2 text-fg-danger hover:bg-neutral-tertiary-medium rounded-md">Delete</a>
              </li>
            </ul>
          </div>
          <div class="flex flex-col items-center">
            <img class="w-24 h-24 mb-6 rounded-full" src="{{ asset('img/logopolibatam.png') }}"
              alt="Bonnie image" />
            <h5 class="mb-0.5 text-xl font-semibold tracking-tight text-heading">Della Desriani</h5>
            <span class="text-sm text-body">Leader</span>
            <div class="flex mt-4 md:mt-6 gap-4">
              <button type="button"
                class="inline-flex items-center text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                  height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                Follow me
              </button>
              <button type="button"
                class="inline-flex self-start w-auto text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                Message
              </button>
            </div>
          </div>
        </div>

      </div>
      <div class="col-span-12 md:col-span-4">


        <div class="relative bg-neutral-primary-soft max-w-xs w-full p-6 border border-default rounded-base shadow-xs">
          <button id="dropdownButton" data-dropdown-toggle="dropdown"
            class="absolute top-2 end-2 text-body hover:text-heading bg-neutral-primary-soft box-border border border-transparent hover:bg-neutral-tertiary focus:ring-4 focus:ring-neutral-tertiary rounded-base p-1.5 focus:outline-none"
            type="button">
            <span class="sr-only">Open dropdown</span>
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
              fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-width="3" d="M6 12h.01m6 0h.01m5.99 0h.01" />
            </svg>
          </button>
          <!-- Dropdown menu -->
          <div id="dropdown"
            class="z-10 bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-36 block hidden">
            <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdownButton">
              <li>
                <a href="#"
                  class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">Edit</a>
              </li>
              <li>
                <a href="#"
                  class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">Export
                  Data</a>
              </li>
              <li>
                <a href="#"
                  class="inline-flex items-center w-full p-2 text-fg-danger hover:bg-neutral-tertiary-medium rounded-md">Delete</a>
              </li>
            </ul>
          </div>
          <div class="flex flex-col items-center">
            <img class="w-24 h-24 mb-6 rounded-full" src="{{ asset('img/logopolibatam.png') }}"
              alt="Bonnie image" />
            <h5 class="mb-0.5 text-xl font-semibold tracking-tight text-heading">Muhammad Nurferli</h5>
            <span class="text-sm text-body">Team  </span>
            <div class="flex mt-4 md:mt-6 gap-4">
              <button type="button"
                class="inline-flex items-center text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                  height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                Follow me
              </button>
              <button type="button"
                class="inline-flex self-start w-auto text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                Message
              </button>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
  <hr class="hidden md:block">
  
  

<footer class="bg-neutral-primary-soft rounded-base shadow-xs border border-default m-4">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('img/logopolibatam.png') }}" class="h-7" alt="Flowbite Logo" />
                <span class="text-heading self-center text-2xl font-semibold whitespace-nowrap">Siperdig</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-body sm:mb-0">
              <li>
                  <a href="#" class="hover:underline me-4 md:me-6">Home</a>
              </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">About</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Feature</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-default sm:mx-auto lg:my-8" />
        <span class="block text-sm text-body sm:text-center">© 2026 <a href="" class="hover:underline">SistemPerpustakaanDigital</a>. All Rights Reserved.</span>
    </div>
</footer>


  <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>


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