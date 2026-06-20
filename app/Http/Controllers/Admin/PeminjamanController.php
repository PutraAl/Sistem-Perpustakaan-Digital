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
                'status' => 'dipinjam',
                'denda' => 0
            ]);

            foreach ($request->buku_id as $i => $buku_id) {

                DetailPeminjaman::create([
                    'id_peminjaman' => $peminjaman->id_peminjaman,
                    'id_buku'       => $buku_id,
                    'jumlah'        => $request->jumlah[$i],
                    'status_item'   => 'dipinjam',
                    'denda_item'    => 0
                ]);

                Buku::where('id_buku', $buku_id)
                    ->decrement('stok', $request->jumlah[$i]);
            }

            DB::commit();

            return redirect()
                ->route('admin.peminjaman')
                ->with('success', 'Peminjaman berhasil ditambahkan');
        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->with('error', $e->getMessage())
                ->withInput();
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
        Buku::where('id_buku', $buku_id)
            ->decrement('stok', $request->jumlah[$i]);

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
            // Ambil data peminjaman beserta seluruh item detailnya
            $peminjaman = Peminjaman::with('detail')->findOrFail($id);

            $statusBaru = $request->status;
            $hariIni    = Carbon::today()->toDateString();
            $jatuhTempo = Carbon::parse($request->tanggal_jatuh_tempo);

            // Data bawaan yang pasti diupdate
            $dataUpdate = [
                'tanggal_pinjam'      => $request->tanggal_pinjam,
                'tanggal_jatuh_tempo' => $request->tanggal_jatuh_tempo,
                'status'              => $statusBaru,
            ];

            // ─────────────────────────────────────────────────────────────────
            // SKENARIO A: STATUS DIUBAH JADI "DIKEMBALIKAN"
            // (Pastikan status sebelumnya belum dikembalikan, agar stok tidak nambah 2x)
            // ─────────────────────────────────────────────────────────────────
            if ($statusBaru === 'dikembalikan' && $peminjaman->status !== 'dikembalikan') {

                $dataUpdate['tanggal_kembali'] = $hariIni;

                // 1. Hitung Denda Otomatis (Tarif: Rp 1.000 / hari telat)
                $denda = 0;
                if (Carbon::today()->gt($jatuhTempo)) {
                    $selisihHari = Carbon::today()->diffInDays($jatuhTempo);
                    $denda = $selisihHari * 1000;
                }
                $dataUpdate['denda'] = $denda;

                // 2. Ubah status seluruh item di tabel anak jadi 'dikembalikan'
                DetailPeminjaman::where('id_peminjaman', $peminjaman->id_peminjaman)
                    ->update([
                        'status_item'     => 'dikembalikan',
                        'tanggal_kembali' => $hariIni
                    ]);

                // 3. Kembalikan buku ke rak (+stok)
                foreach ($peminjaman->detail as $item) {
                    Buku::where('id_buku', $item->id_buku)->increment('stok', $item->jumlah);
                }
            }

            // ─────────────────────────────────────────────────────────────────
            // SKENARIO B: STATUS DIUBAH JADI "DIBATALKAN" / "DITOLAK"
            // ─────────────────────────────────────────────────────────────────
            elseif (in_array($statusBaru, ['dibatalkan', 'ditolak']) && !in_array($peminjaman->status, ['dibatalkan', 'ditolak'])) {

                $dataUpdate['tanggal_kembali'] = $hariIni;
                $dataUpdate['denda']           = 0; // Batal pinjam tidak boleh didenda

                // Item dianggap kembali ke perpustakaan
                DetailPeminjaman::where('id_peminjaman', $peminjaman->id_peminjaman)
                    ->update([
                        'status_item'     => 'dikembalikan',
                        'tanggal_kembali' => $hariIni
                    ]);

                // Kembalikan buku ke rak (+stok)
                foreach ($peminjaman->detail as $item) {
                    Buku::where('id_buku', $item->id_buku)->increment('stok', $item->jumlah);
                }
            }

            // Eksekusi simpan ke MySQL
            $peminjaman->update($dataUpdate);

            DB::commit();
            return redirect()->route('admin.peminjaman')->with('success', 'Status berhasil diperbarui! Denda & stok telah disesuaikan otomatis.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memproses: ' . $e->getMessage());
        }
    }

    // 1. FUNGSI JIKA ADMIN MENG-ACC PINJAMAN
    public function konfirmasi($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        DB::transaction(function () use ($peminjaman) {
            // A. Ubah status Master jadi 'dipinjam'
            // Argo 7 hari baru mulai dihitung HARI INI (saat di-ACC admin), bukan saat user klik kemarin!
            $peminjaman->update([
                'status'              => 'dipinjam',
                'tanggal_pinjam'      => now()->toDateString(),
                'tanggal_jatuh_tempo' => now()->addDays(7)->toDateString(),
            ]);

            // B. Ubah status semua item di dalamnya jadi 'dipinjam'
            DetailPeminjaman::where('id_peminjaman', $peminjaman->id_peminjaman)
                ->update(['status_item' => 'dipinjam']);
        });

        return redirect()->back()->with('success', 'Peminjaman berhasil dikonfirmasi! Buku resmi dipinjamkan.');
    }


    // 2. FUNGSI JIKA ADMIN MENOLAK PINJAMAN (Stok dikembalikan)
    public function tolak($id)
    {
        $peminjaman = Peminjaman::with('detail')->findOrFail($id);

        DB::transaction(function () use ($peminjaman) {
            $peminjaman->update(['status' => 'ditolak']);

            DetailPeminjaman::where('id_peminjaman', $peminjaman->id_peminjaman)
                ->update(['status_item' => 'rusak']); // atau buat enum 'ditolak' di detail

            // KEMBALIKAN STOK BUKU KE RAK (+1) KARENA GAGAL PINJAM
            foreach ($peminjaman->detail as $item) {
                Buku::where('id_buku', $item->id_buku)->increment('stok', $item->jumlah);
            }
        });

        return redirect()->back()->with('success', 'Pengajuan pinjam ditolak. Stok buku dikembalikan ke sistem.');
    }
    // Di dalam Controller atau Model Peminjaman
    public function hitungDendaOtomatis($peminjaman)
    {
        $jatuhTempo = \Carbon\Carbon::parse($peminjaman->tanggal_jatuh_tempo);
        $hariIni = \Carbon\Carbon::today();

        if ($hariIni > $jatuhTempo) {
            $selisihHari = $hariIni->diffInDays($jatuhTempo);
            $tarif = 2000; // Bisa diambil dari tabel config/setting

            $peminjaman->denda = $selisihHari * $tarif;
            $peminjaman->status = 'terlambat';
            $peminjaman->save();
        }
    }
}
