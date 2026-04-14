@extends('layouts.app')

@section('title', 'Landing Page')

@section('content')

<!-- HERO SECTION -->
<section class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-2 gap-10 items-center">
    
    <!-- Text -->
    <div>
        <h1 class="text-4xl font-bold text-gray-900 mb-4">
            A Big Title
        </h1>
        <p class="text-gray-600 mb-6">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>

        <button class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            Get Started
        </button>
    </div>

    <!-- Image Placeholder -->
    <div class="bg-gray-200 h-60 rounded-lg flex items-center justify-center">
        <span class="text-gray-500">Image / Slider</span>
    </div>

</section>


<!-- FEATURE SECTION -->
<section class="max-w-6xl mx-auto px-6 py-16 text-center">

    <h2 class="text-2xl font-bold mb-10">A Big Title</h2>

    <div class="grid md:grid-cols-3 gap-8">

        @for($i = 0; $i < 3; $i++)
        <div>
            <div class="w-24 h-24 mx-auto bg-gray-200 mb-4 flex items-center justify-center">
                Img
            </div>

            <h3 class="font-semibold mb-2">A Subtitle</h3>

            <p class="text-gray-500 text-sm">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
        </div>
        @endfor

    </div>

</section>


<!-- INFO SECTION -->
<section class="bg-gray-100 py-16">

    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">

        <!-- Left -->
        <div>
            <p class="text-gray-600 mb-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Sed do eiusmod tempor incididunt ut labore.
            </p>
        </div>

        <!-- Right -->
        <div class="grid grid-cols-2 gap-6">

            <div class="flex items-center gap-3">
                <div class="w-5 h-5 bg-gray-400 rounded-full"></div>
                <span class="text-sm">A Subtitle</span>
            </div>

            <div class="flex items-center gap-3">
                <div class="w-5 h-5 bg-gray-400 rounded-full"></div>
                <span class="text-sm">A Subtitle</span>
            </div>

        </div>

    </div>

</section>


<!-- CTA SECTION -->
<section class="text-center py-16">

    <h2 class="text-2xl font-bold mb-4">Lorem Ipsum Dolor</h2>

    <p class="text-gray-600 mb-6 max-w-xl mx-auto">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    </p>

    <button class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
        Get Started
    </button>

</section>


<!-- FOOTER -->
<footer class="bg-gray-200 py-10 mt-10">

    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8 text-sm text-gray-700">

        <!-- Menu -->
        <div>
            <h3 class="font-semibold mb-3">Menu</h3>
            <ul class="space-y-2">
                <li><a href="#">Home</a></li>
                <li><a href="#">Category</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </div>

        <!-- Contact -->
        <div>
            <h3 class="font-semibold mb-3">Contact</h3>

            <form class="space-y-2">
                <input type="text" placeholder="Name" class="w-full border p-2 rounded">
                <input type="email" placeholder="Email" class="w-full border p-2 rounded">
                <textarea placeholder="Message" class="w-full border p-2 rounded"></textarea>

                <button class="bg-blue-600 text-white px-4 py-2 rounded">
                    Submit
                </button>
            </form>
        </div>

        <!-- Social -->
        <div>
            <h3 class="font-semibold mb-3">Follow Us</h3>
            <div class="flex gap-3">
                <div class="w-6 h-6 bg-gray-400 rounded-full"></div>
                <div class="w-6 h-6 bg-gray-400 rounded-full"></div>
                <div class="w-6 h-6 bg-gray-400 rounded-full"></div>
            </div>
        </div>

    </div>

</footer>

@endsection