@props([
    'action' => '#',
    'method' => 'POST',
    'user' => null,
    'dummy' =>null
])
@php
    if ($dummy && !$user) {
        $user = (object) [
            'nama' => 'Putra Parker',
            'nim' => '3312511127',
            'email' => 'palamsyah120@gmail.com',
            'password' => '12345',
            'role' => 'admin',
        ];
    }
@endphp
<form action="{{ $action }}" method="POST">
    @csrf

    @if($method !== 'POST')
        @method($method)
    @endif
    
    <div class="grid gap-4 grid-cols-2 py-4 md:py-6">

        <div class="col-span-2">
            <label class="block mb-2 text-sm font-medium">Nama</label>
            <input type="text" name="nama"
                value="{{ old('nama', $user->nama ?? '') }}"
                class="w-full px-3 py-2.5 border rounded-base">
        </div>
        <div class="col-span-2">
            <label class="block mb-2 text-sm font-medium">NIM/NIK</label>
            <input type="number" name="nim"
                value="{{ old('nim', $user->nim ?? '') }}"
                class="w-full px-3 py-2.5 border rounded-base">
        </div>
        <div class="col-span-2">
            <label class="block mb-2 text-sm font-medium">Email</label>
            <input type="text" name="email"
                value="{{ old('email', $user->email ?? '') }}"
                class="w-full px-3 py-2.5 border rounded-base">
        </div>
        <div class="col-span-2">
            <label class="block mb-2 text-sm font-medium">Password</label>
            <input type="password" name="password"
                value="{{ old('password', $user->password ?? '') }}"
                class="w-full px-3 py-2.5 border rounded-base">
        </div>
       <div class="col-span-2">
    <label class="block mb-2 text-sm font-medium">Role</label>

    <select name="role" class="w-full px-3 py-2.5 border rounded-base">
        <option value="" selected disabled>Pilih Role</option>
        <option value="admin" {{ ($user->role ?? '') == 'admin' ? 'selected' : '' }}>
            Admin
        </option>
        <option value="anggota" {{ ($user->role ?? '') == 'anggota' ? 'selected' : '' }}>
            Anggota
        </option>
    </select>
</div>

        

        

       
    </div>

    <div class="flex gap-3 border-t pt-4">
        <button type="submit" class="bg-brand text-white px-4 py-2 rounded-base">
            {{ $user ? 'Update' : 'Tambah' }}
        </button>
       
    </div>
    {{-- @if($dummy) {
         <div class="flex gap-3 border-t pt-4">
        <button type="submit" class="bg-brand text-white px-4 py-2 rounded-base">
          Hapus
        </button>
       
    </div>
    } --}}
</form>