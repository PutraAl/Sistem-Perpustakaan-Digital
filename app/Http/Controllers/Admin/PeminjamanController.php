<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use App\Models\Buku;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    // =========================
    // LIST
    // =========================
    public function index(Request $request)
    {
        $query = Peminjaman::with('user', 'detail.buku');

        // filter (punya kamu)
if ($request->search) {

    $search = $request->search;

    $query->where(function ($q) use ($search) {

        $q->whereHas('user', function ($user) use ($search) {
            $user->where('name', 'like', "%{$search}%");
        })

        ->orWhereHas('detail.buku', function ($buku) use ($search) {
            $buku->where('judul', 'like', "%{$search}%");
        });

    });

if ($request->start_date) {
    $query->whereDate(
        'tanggal_pinjam',
        '>=',
        $request->start_date
    );
}

if ($request->end_date) {
    $query->whereDate(
        'tanggal_pinjam',
        '<=',
        $request->end_date
    );
}

//filter status
if ($request->status) {
    $query->where(
        'status',
        $request->status
    );
}
}

        $data = $query->latest()->get();

        // ✅ TAMBAH INI
        $users = User::all();
        $bukus = Buku::all();

        return view('admin.peminjaman', [
            'data' => $data,
            'users' => $users,
            'bukus' => $bukus
        ]);
    }

 public function store(Request $request)
{
    DB::beginTransaction();

    try {
        $peminjaman = Peminjaman::create([
            'user_id' => $request->user_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_jatuh_tempo' => $request->tanggal_jatuh_tempo,
            'status' => 'dipinjam'
        ]);

        foreach ($request->buku_id as $i => $buku_id) {
            DetailPeminjaman::create([
                'peminjaman_id' => $peminjaman->id,
                'buku_id' => $buku_id,
                'jumlah' => $request->jumlah[$i],
                'status' => $request->status_item[$i] ?? 'dipinjam', // default dipinjam
                'denda' => 0
            ]);

            // kurangi stok
            Buku::where('id', $buku_id)->decrement('stok', $request->jumlah[$i]);
        }

        DB::commit();

        return redirect()->route('admin.peminjaman')->with('success', 'Peminjaman berhasil ditambahkan');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', $e->getMessage())->withInput();
    }
}

    // =========================
    // RETURN BUKU
    // =========================
    public function returnBuku($id)
    {
        $detail = DetailPeminjaman::findOrFail($id);

        $today = Carbon::today();
        $jatuhTempo = Carbon::parse($detail->peminjaman->tanggal_jatuh_tempo);

        // 🔥 HITUNG DENDA
        $denda = 0;
        if ($today->gt($jatuhTempo)) {
            $hari = $today->diffInDays($jatuhTempo);
            $denda = $hari * 1000; // 1000/hari
        }

        $detail->update([
            'status' => 'dikembalikan',
            'denda' => $denda
        ]);

        // 🔥 kembalikan stok
        Buku::where('id', $detail->buku_id)
            ->increment('stok', $detail->jumlah);

        // 🔥 update status peminjaman
        $this->updateStatus($detail->peminjaman);

        return back()->with('success', 'Buku dikembalikan');
    }

    // =========================
    // UPDATE STATUS GLOBAL
    // =========================
    private function updateStatus($peminjaman)
    {
        $detail = $peminjaman->detail;

        $belumKembali = $detail->where('status', 'dipinjam')->count();

        if ($belumKembali > 0) {

            if (Carbon::today()->gt($peminjaman->tanggal_jatuh_tempo)) {
                $peminjaman->update(['status' => 'terlambat']);
            } else {
                $peminjaman->update(['status' => 'dipinjam']);
            }
        } else {
            $peminjaman->update(['status' => 'dikembalikan']);
        }
    }

    public function update(Request $request, $id)
{
    DB::beginTransaction();
    try {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_jatuh_tempo' => $request->tanggal_jatuh_tempo,
            'status' => $request->status,
        ]);

        DB::commit();
        return redirect()->route('admin.peminjaman')->with('success', 'Peminjaman berhasil diperbarui');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', $e->getMessage());
    }
}
}
