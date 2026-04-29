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
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
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

    // =========================
    // STORE
    // =========================
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
                    'status' => 'dipinjam',
                    'denda' => 0
                ]);

                // 🔥 kurangi stok
                Buku::where('id', $buku_id)
                    ->decrement('stok', $request->jumlah[$i]);
            }

            DB::commit();

            return back()->with('success', 'Peminjaman berhasil');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
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
}
