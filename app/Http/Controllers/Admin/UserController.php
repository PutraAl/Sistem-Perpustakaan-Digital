<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Buku;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Dashboard Admin
     */
    public function dashboard()
    {
        $user = User::where('role', 'anggota')->get();
        $buku = Buku::all();

        return view('admin.dashboard', compact('user', 'buku'));
    }

    /**
     * Daftar User
     */
    public function index()
    {
        $user = User::all();

        return view('admin.user', compact('user'));
    }

    /**
     * Tambah User
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'nim' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|max:55',
            'role' => 'required',
            'address' => 'required|max:255'
        ]);

        User::create([
            'name' => $request->nama,
            'nim' => $request->nim,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()
            ->route('admin.user')
            ->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Detail User
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update User (Admin)
     */
    public function update(Request $request, User $user)
    {
        $user = User::find($request->id);

        $request->validate([
            'name' => 'required|max:255',
            'nim' => 'required|max:255',
            'email' => 'required|email',
            'role' => 'required',
            'address' => 'required|max:255'
        ]);

        $data = [
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'role' => $request->role,
            'address' => $request->address,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()
            ->route('admin.user')
            ->with('success', 'User berhasil diupdate');
    }

    /**
     * Update Profil User Login
     */
    public function updateProfil(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
        ]);

        $user = auth()->user();

        $user->name = $request->name;
        $user->nim = $request->nim;
        $user->address = $request->address;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui');
    }

    /**
     * Hapus User
     */
    public function destroy(Request $request)
    {
        $id = $request->id;

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()
            ->route('admin.user')
            ->with('success', 'User berhasil dihapus');
    }
}