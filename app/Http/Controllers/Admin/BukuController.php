<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
 public function index(Request $request)
{
    // 1. Ambil data kategori untuk dropdown
    $kategori = Kategori::all();

    // 2. Hitung total absolut buku di DB untuk Kartu Metrik (agar angkanya tidak menyusut pas di-filter)
    $totalBuku = Buku::count();

    // 3. Mulai merakit Query
    $query = Buku::with('kategori')->orderBy('id_buku', 'desc');

    // --- FILTER 1: Pencarian Judul ---
    if ($request->filled('search')) {
        $query->where('judul', 'like', '%' . $request->search . '%');
    }

    // --- FILTER 2: Berdasarkan Kategori ---
    if ($request->filled('id_kategori')) {
        $query->where('id_kategori', $request->id_kategori);
    }

    // 4. Eksekusi Paginasi 15 data + Kunci parameter URL-nya!
    $buku = $query->paginate(15)->withQueryString();

    return view('admin.buku', compact('buku', 'kategori', 'totalBuku'));
}   

    public function store(Request $request)
    {
        $request->validate([
            'judul'        => 'required|string|max:255',
            'penulis'      => 'required|string|max:255',
            'penerbit'     => 'required|string|max:255',
            'tahun_terbit' => 'required|numeric',
            'stok'         => 'required|numeric|min:0',
            'id_kategori'  => 'required|exists:tb_kategori,id_kategori',
            'deskripsi'    => 'nullable|string',
            'foto'         => 'required|image|mimes:jpeg,png,jpg', // Wajib upload saat tambah
        ]);

        $data = $request->except('_token', 'foto');

        // Handle upload foto
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            // Buat nama acak yang unik dan aman dari spasi
            $fotoName = $foto->hashName();

            // JURUS PAMUNGKAS: Pindahkan file LANGSUNG ke folder public/buku
            $foto->move(public_path('img'), $fotoName);

            $data['foto'] = $fotoName;
        }

        Buku::create($data);

        return redirect()->route('admin.buku')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id_buku'      => 'required|exists:tb_buku,id_buku',
            'judul'        => 'required|string|max:255',
            'penulis'      => 'required|string|max:255',
            'penerbit'     => 'required|string|max:255',
            'tahun_terbit' => 'required|numeric',
            'stok'         => 'required|numeric|min:0',
            'id_kategori'  => 'required|exists:tb_kategori,id_kategori',
            'deskripsi'    => 'nullable|string',
            'foto'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $buku = Buku::where('id_buku', $request->id_buku)->firstOrFail();

        // 1. Ambil semua data kecuali foto dan id_buku
        $data = $request->except('_token', '_method', 'foto', 'id_buku');

        // 2. Jika user upload foto baru, baru kita update kolom foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            $oldFotoPath = public_path('img/' . $buku->foto);
            if ($buku->foto && file_exists($oldFotoPath)) {
                unlink($oldFotoPath);
            }

            // Simpan foto baru
            $foto = $request->file('foto');
            $fotoName = $foto->hashName();
            $foto->move(public_path('img'), $fotoName);

            // Masukkan nama foto baru ke array $data agar ikut tersimpan
            $data['foto'] = $fotoName;
        }

        // 3. Update database
        $buku->update($data);

        return redirect()->route('admin.buku')->with('success', 'Data buku berhasil diperbarui!');
    }
    public function destroy(Request $request)
{
    // Cek apakah ID terkirim
    if (!$request->has('id_buku')) {
        return redirect()->back()->with('error', 'ID Buku tidak ditemukan!');
    }

    $buku = Buku::where('id_buku', $request->id_buku)->first();

    if (!$buku) {
        return redirect()->back()->with('error', 'Buku tidak ditemukan di database!');
    }

    // Hapus foto fisik
    $oldFotoPath = public_path('img/' . $buku->foto);
    if ($buku->foto && file_exists($oldFotoPath)) {
        unlink($oldFotoPath);
    }

    // Hapus data
    $buku->delete();

    return redirect()->route('admin.buku')->with('success', 'Buku berhasil dihapus!');
}
}