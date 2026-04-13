@extends('layout.app')

@section('content')

<div class="w-full max-w-5xl mx-auto px-6 ">

    <div class="border-b border-neutral-200 bg-white">
        <div class="max-w-3xl mx-auto px-4 py-4 flex items-center justify-center">
            
            <h1 class="text-sm  md:text-base font-semibold tracking-wide">
                Edit Profil
            </h1>

            <div></div>
        </div>
    </div>

    <div class="max-w-3xl mx-auto px-4 py-6 md:py-10">

        <div class="bg-white border border-neutral-200 rounded-2xl p-5 sm:p-6 md:p-8">

            @if(session('success'))
                <div class="mb-4 text-sm text-green-700 bg-green-50 border border-green-200 px-4 py-2 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <form action="" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm text-neutral-600 mb-1">
                        Nama Lengkap
                    </label>
                    <input type="text" name="name"
                        value=""
                        class="w-full px-4 py-2.5 rounded-lg border border-neutral-300 
                               text-sm focus:outline-none focus:ring-2 focus:ring-black/10 focus:border-black">

                    @error('name')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm text-neutral-600 mb-1">
                        NIM
                    </label>
                    <input type="number" name="name"
                        value=""
                        class="w-full px-4 py-2.5 rounded-lg border border-neutral-300 
                               text-sm focus:outline-none focus:ring-2 focus:ring-black/10 focus:border-black">

                    @error('name')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm text-neutral-600 mb-1">
                        Email
                    </label>
                    <input type="email" name="email"
                        value=""
                        class="w-full px-4 py-2.5 rounded-lg border border-neutral-300 
                               text-sm focus:outline-none focus:ring-2 focus:ring-black/10 focus:border-black">

                    @error('email')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm text-neutral-600 mb-1">
                        Password Baru
                    </label>
                    <input type="password" name="password"
                        placeholder="Kosongkan jika tidak ingin mengubah password"
                        class="w-full px-4 py-2.5 rounded-lg border border-neutral-300 
                               text-sm focus:outline-none focus:ring-2 focus:ring-black/10 focus:border-black">

                    @error('password')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm text-neutral-600 mb-1">
                        Konfirmasi Password
                    </label>
                    <input type="password" name="password_confirmation"
                        class="w-full px-4 py-2.5 rounded-lg border border-neutral-300 
                               text-sm focus:outline-none focus:ring-2 focus:ring-black/10 focus:border-black">
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 pt-4 border-t border-neutral-200">

                 

                    <button type="submit"
                        class="w-full sm:w-auto px-5 py-2.5 text-sm rounded-lg 
                               bg-blue-600 text-white hover:bg-neutral-800 transition">
                        Simpan Perubahan
                    </button>

                </div>

            </form>
        </div>

    </div>

</div>

@endsection