<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use Carbon\Carbon;
use DB;

class UserController extends Controller
{
    /**
     * Dashboard Admin
     */
    public function dashboard()
    {
        // 1. Jalankan sinkronisasi denda realtime setiap kali admin membuka dashboard
        if (method_exists(Peminjaman::class, 'perbaruiDendaOtomatis')) {
            Peminjaman::perbaruiDendaOtomatis();
        }

        // 2. Hitung Angka Rekap untuk 4 Kotak Metrik Utama
        $totalBuku    = Buku::sum('stok'); // Menghitung total eksemplar fisik buku
        $totalAnggota = User::where('role', 'anggota')->count();
        $bukuDipinjam = DetailPeminjaman::where('status_item', 'dipinjam')->sum('jumlah');
        $telatKembali = Peminjaman::where('status', 'terlambat')->count();

        // 3. Ambil Data Grafik Batang (Peminjaman Bulanan Tahun Ini)
        $peminjamanPerBulan = Peminjaman::selectRaw('MONTH(tanggal_pinjam) as bulan, COUNT(*) as total')
            ->whereYear('tanggal_pinjam', date('Y'))
            ->groupBy('bulan')
            ->pluck('total', 'bulan')
            ->toArray();
            
        // Buat susunan array dari bulan 1 sampai 12 (jika kosong diisi angka 0)
        $dataBar = array_map(fn($i) => $peminjamanPerBulan[$i] ?? 0, range(1, 12));

        // 4. Ambil Data Grafik Donat (Distribusi Buku per Kategori via JOIN)
        $genreData = Buku::select('tb_kategori.nama_kategori', DB::raw('COUNT(tb_buku.id_buku) as total'))
            ->join('tb_kategori', 'tb_buku.id_kategori', '=', 'tb_kategori.id_kategori')
            ->groupBy('tb_kategori.nama_kategori')
            ->get();
            
        $totalSemua = $genreData->sum('total') ?: 1; // Proteksi pembagian dengan angka 0
        
        $genreList = $genreData->map(fn($item) => [
            'label'  => $item->nama_kategori ?: 'Lainnya',
            'count'  => (int) $item->total,
            'persen' => round(($item->total / $totalSemua) * 100)
        ]);

        // 5. Kirimkan seluruh paket data ke halaman view dashboard
        return view('admin.dashboard', compact(
            'totalBuku', 'totalAnggota', 'bukuDipinjam', 'telatKembali', 'dataBar', 'genreList'
        ));
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
            'nama'     => 'required|max:255', 
            'nim'      => 'required|max:255|unique:users,nim',
            'email'    => 'required|email|unique:users,email', 
            'password' => 'required|min:3|max:55',
            'role'     => 'required',
            'address'  => 'required|max:255'
        ]);

        User::create([
            'nama'     => $request->nama, 
            'nim'      => $request->nim,
            'address'  => $request->address,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect()
            ->route('admin.user')
            ->with('success', 'Data user berhasil ditambahkan!');
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
   public function update(Request $request)
    {
        $user = User::findOrFail($request->id);

        $request->validate([
            'nama'    => 'required|max:255', 
            'nim'     => 'required|max:255|unique:users,nim',
            'email'   => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'role'    => 'required',
            'address' => 'required|max:255'
        ]);

        $data = [
            'nama'    => $request->nama, 
            'nim'     => $request->nim,
            'email'   => $request->email,
            'role'    => $request->role,
            'address' => $request->address,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()
            ->route('admin.user')
            ->with('success', 'Data user berhasil diperbarui!');
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
        $user = User::findOrFail($request->id);
        $user->delete();

        return redirect()
            ->route('admin.user')
            ->with('success', 'Data user berhasil dihapus!');
    }
}