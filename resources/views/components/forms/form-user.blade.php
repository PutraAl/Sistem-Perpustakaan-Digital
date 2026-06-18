@props([
    'action' => '#',
    'method' => 'POST',
    'user' => null,
])

<div class="flex flex-col gap-2">
    {{-- Main Form --}}
  <form id="form-user-{{ $user ? $user->id : 'add' }}" action="{{ $action }}" method="POST" class="flex flex-col gap-5">
        @csrf
        @if($method !== 'POST')
            @method($method)
        @endif

        @if($user)
            <input type="hidden" name="id" value="{{ $user->id }}">
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div class="space-y-1.5">
                <label for="nama" class="block text-sm font-medium text-slate-700">Nama Lengkap</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <input type="text" id="nama" name="nama" 
                        value="{{ old('nama', $user->nama ?? '') }}"
                        class="block w-full pl-10 pr-3 py-2.5 border border-slate-300 rounded-xl bg-slate-50 text-slate-900 text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-500/30 focus:border-sky-500 transition-all duration-200" 
                        placeholder="Masukkan nama lengkap">
                </div>
            </div>

            <div class="space-y-1.5">
                <label for="nim" class="block text-sm font-medium text-slate-700">NIM / NIK</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                        </svg>
                    </div>
                    <input type="number" id="nim" name="nim" 
                        value="{{ old('nim', $user->nim ?? '') }}"
                        class="block w-full pl-10 pr-3 py-2.5 border border-slate-300 rounded-xl bg-slate-50 text-slate-900 text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-500/30 focus:border-sky-500 transition-all duration-200" 
                        placeholder="Contoh: 1123345">
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div class="space-y-1.5">
                <label for="email" class="block text-sm font-medium text-slate-700">Email Address</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <input type="text" id="email" name="email" 
                        value="{{ old('email', $user->email ?? '') }}"
                        class="block w-full pl-10 pr-3 py-2.5 border border-slate-300 rounded-xl bg-slate-50 text-slate-900 text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-500/30 focus:border-sky-500 transition-all duration-200" 
                        placeholder="email@domain.com">
                </div>
            </div>

            <div class="space-y-1.5">
                <label for="role" class="block text-sm font-medium text-slate-700">Role Pengguna</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.956 11.956 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <select id="role" name="role" 
                        class="block w-full pl-10 pr-10 py-2.5 border border-slate-300 rounded-xl bg-slate-50 text-slate-900 text-sm appearance-none focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-500/30 focus:border-sky-500 transition-all duration-200">
                        <option value="" disabled {{ old('role', $user->role ?? '') == '' ? 'selected' : '' }}>Pilih Role</option>
                        <option value="admin" {{ old('role', $user->role ?? '') == 'admin' ? 'selected' : '' }}>Administrator</option>
                        <option value="anggota" {{ old('role', $user->role ?? '') == 'anggota' ? 'selected' : '' }}>Anggota</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-1.5">
            <label for="password" class="block text-sm font-medium text-slate-700">
                Password {!! $user ? '<span class="text-xs text-slate-400 font-normal ml-1">(Kosongkan jika tidak ingin mengubah)</span>' : '' !!}
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <input type="password" id="password" name="password" 
                    value="{{ old('password') }}"
                    class="block w-full pl-10 pr-3 py-2.5 border border-slate-300 rounded-xl bg-slate-50 text-slate-900 text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-500/30 focus:border-sky-500 transition-all duration-200" 
                    placeholder="••••••••">
            </div>
        </div>

        <div class="space-y-1.5">
            <label for="address" class="block text-sm font-medium text-slate-700">Alamat Lengkap</label>
            <div class="relative">
                <div class="absolute top-3 left-0 pl-3 flex items-start pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <textarea id="address" name="address" rows="3" 
                    class="block w-full pl-10 pr-3 py-2.5 border border-slate-300 rounded-xl bg-slate-50 text-slate-900 text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-sky-500/30 focus:border-sky-500 transition-all duration-200 resize-none" 
                    placeholder="Masukkan alamat domisili...">{{ trim(old('address', $user->address ?? '')) }}</textarea>
            </div>
        </div>
    </form>

    {{-- Action Footer --}}
    <div class="mt-4 pt-5 border-t border-slate-100 flex items-center justify-between">
        
        {{-- Kiri: Form & Tombol Hapus (Hanya muncul jika mode edit/user ada) --}}
        <div>
            @if($user)
            <form action="{{ route('hapus.user') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $user->id }}" name="id">
                <button type="submit" 
                    class="px-4 py-2.5 text-sm font-medium text-red-600 bg-red-50 hover:bg-red-100 rounded-xl transition-all duration-200 flex items-center gap-2 group">
                    <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Hapus Data
                </button>
            </form>
            @endif
        </div>

        {{-- Kanan: Tombol Batal & Simpan --}}
        <div class="flex items-center gap-3">
            <button 
                type="button" 
                data-modal-hide="modal" 
                class="px-5 py-2.5 text-sm font-medium text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition-all duration-200">
                Batal
            </button>
            
            {{-- Tombol submit ini terhubung ke form utama melalui atribut form="form-user" --}}
       <button 
                type="submit" 
                form="form-user-{{ $user ? $user->id : 'add' }}"
                class="px-5 py-2.5 text-sm font-medium text-white {{ $user ? 'bg-green-500 hover:bg-green-600' : 'bg-sky-500 hover:bg-sky-600' }} rounded-xl shadow-sm hover:shadow-md transition-all duration-200 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
                {{ $user ? 'Update Data' : 'Simpan User' }}
            </button>
        </div>
    </div>
</div>