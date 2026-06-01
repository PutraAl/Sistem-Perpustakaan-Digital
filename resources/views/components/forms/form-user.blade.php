@props([
    'action' => '#',
    'method' => 'POST',
    'user' => null,
    // 'dummy' =>null
])

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
                value="{{ old('password') }}"
                class="w-full px-3 py-2.5 border rounded-base">
        </div>
        <div class="col-span-2">
            <label class="block mb-2 text-sm font-medium">Alamat</label>
            <textarea name="address" id="" class="w-full border rounded-base">
                {{ old('address', $user->address ?? '') }}
            </textarea>
               
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

    @if($user)
    <input type="hidden" name="id" value="{{ $user->id }}">
    @endif



    <div class="flex gap-3 border-t pt-4">
        <button type="submit" class="bg-brand text-white px-4 py-2 rounded-base">
            {{ $user ? 'Update' : 'Tambah' }}
        </button>
       
    </div>
    

</form>

   @if($user)
<form action="{{ route('hapus.user') }}" method="POST">
    @csrf
    <input type="hidden" value="{{ $user->id }}" name="id">
   <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-base cursor-pointer">
        Hapus
    </button>
</form>
@endif
    {{-- @if($dummy) {
         <div class="flex gap-3 border-t pt-4">
        <button type="submit" class="bg-brand text-white px-4 py-2 rounded-base">
          Hapus
        </button>
       
    </div>
    } --}}