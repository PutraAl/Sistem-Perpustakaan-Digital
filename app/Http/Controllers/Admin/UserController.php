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
     * Display a listing of the resource.
     */
    public function dashboard() {
        $user = User::all()->where('role', 'anggota');
        $buku = Buku::all();
        return view('admin.dashboard', compact('user', 'buku'));
    }
    public function index()
    {
        $user = User::all();
        return view('admin.user', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'nim' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|max:55',
            'role' => 'required',
            'address' => 'required|max:255'
        ]);
        // dd($request->all());

        User::create([
            'nama' => $request->nama,
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user = User::find($request->id);
        $request->validate([
            'nama' => 'required|max:255',
            'nim' => 'required|max:255',
            'email' => 'required|email',
            'role' => 'required',
            'address' => 'required|max:255'
        ]);

        $data = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'role' => $request->role,
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
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()
            ->route('admin.user')
            ->with('success', 'User berhasil diupdate');
    }
}
