<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\BukuSiapDiambilMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use App\Models\Buku;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{

    public function index(Request $request)
    {
        Peminjaman::perbaruiDendaOtomatis();

        $query = Peminjaman::with('user', 'detail.buku');

        // Filter Pencarian (Search)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('user', fn($user) => $user->where('nama', 'like', "%{$search}%"))
                    ->orWhereHas('detail.buku', fn($buku) => $buku->where('judul', 'like', "%{$search}%"));
            });
        }

        if ($request->filled('start_date')) {
            $query->whereDate('tanggal_pinjam', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('tanggal_pinjam', '<=', $request->end_date);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $data = $query->latest()->paginate(15)->withQueryString();

        $users = User::all();
        $bukus = Buku::all();

        return view('admin.peminjaman', compact('data', 'users', 'bukus'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // 🔒 LAPIS 1: CEK STOK DI SERVER SEBELUM MENYIMPAN DATA
            foreach ($request->buku_id as $i => $buku_id) {
                $buku = Buku::find($buku_id);
                $diminta = (int) $request->jumlah[$i];

                if ($buku->stok < 1) {
                    throw new \Exception("Gagal: Buku '{$buku->judul}' sudah habis (Stok 0).");
                }
                if ($diminta > $buku->stok) {
                    throw new \Exception("Gagal: Stok '{$buku->judul}' sisa {$buku->stok}, tidak bisa meminjam sebanyak {$diminta}.");
                }
            }
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

            // 🚀 KIRIM EMAIL OTOMATIS (Karena diinput langsung oleh admin, status langsung 'dipinjam' dan siap ambil)
            $peminjamanTerbaru = Peminjaman::with('user', 'detail.buku')->find($peminjaman->id_peminjaman);
            if ($peminjamanTerbaru->user && $peminjamanTerbaru->user->email) {
                Mail::to($peminjamanTerbaru->user->email)->queue(new BukuSiapDiambilMail($peminjamanTerbaru));
            }

            return redirect()
                ->route('admin.peminjaman')
                ->with('success', 'Peminjaman berhasil ditambahkan dan email notifikasi terkirim!');
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
            $peminjaman = Peminjaman::with('user', 'detail.buku')->findOrFail($id);

            // 🕵️ Tangkap status sebelum di-save vs status baru dari dropdown
            $statusLama = $peminjaman->getOriginal('status');
            $statusBaru = $request->status;
            $hariIni    = Carbon::today()->toDateString();

            $peminjaman->tanggal_pinjam      = $request->tanggal_pinjam;
            $peminjaman->tanggal_jatuh_tempo = $request->tanggal_jatuh_tempo;
            $peminjaman->status              = $statusBaru;

            // ─────────────────────────────────────────────────────────────────
            // 1. SKENARIO DIKEMBALIKAN
            // ─────────────────────────────────────────────────────────────────
            if ($statusBaru === 'dikembalikan' && $statusLama !== 'dikembalikan') {
                $peminjaman->tanggal_kembali = $hariIni;
                $peminjaman->denda           = $peminjaman->hitungDenda();

                DetailPeminjaman::where('id_peminjaman', $peminjaman->id_peminjaman)
                    ->update(['status_item' => 'dikembalikan', 'tanggal_kembali' => $hariIni]);

                foreach ($peminjaman->detail as $item) {
                    Buku::where('id_buku', $item->id_buku)->increment('stok', $item->jumlah);
                }
            }
            // ─────────────────────────────────────────────────────────────────
            // 2. SKENARIO DIBATALKAN / DITOLAK
            // ─────────────────────────────────────────────────────────────────
            elseif (in_array($statusBaru, ['dibatalkan', 'ditolak']) && !in_array($statusLama, ['dibatalkan', 'ditolak'])) {
                $peminjaman->tanggal_kembali = $hariIni;
                $peminjaman->denda           = 0;

                DetailPeminjaman::where('id_peminjaman', $peminjaman->id_peminjaman)
                    ->update(['status_item' => 'dikembalikan', 'tanggal_kembali' => $hariIni]);

                foreach ($peminjaman->detail as $item) {
                    Buku::where('id_buku', $item->id_buku)->increment('stok', $item->jumlah);
                }
            }
            // ─────────────────────────────────────────────────────────────────
            // 🚀 3. SKENARIO BUKU BARU SAJA RESMI DI-ACC (KIRIM EMAIL!)
            // ─────────────────────────────────────────────────────────────────
            elseif ($statusLama === 'menunggu_konfirmasi' && $statusBaru === 'dipinjam') {

                // Reset argo pinjam dimulai HARI INI (saat di-ACC)
                $peminjaman->tanggal_pinjam      = now()->toDateString();
                $peminjaman->tanggal_jatuh_tempo = now()->addDays(7)->toDateString();

                DetailPeminjaman::where('id_peminjaman', $peminjaman->id_peminjaman)
                    ->update(['status_item' => 'dipinjam']);

                // 🔥 TEMBAK EMAILNYA! (Pakai ->send() dulu agar kalau gagal langsung tampil error di layar)
                if ($peminjaman->user && $peminjaman->user->email) {
                    Mail::to($peminjaman->user->email)->send(new BukuSiapDiambilMail($peminjaman));
                }
            }

            // Eksekusi simpan ke MySQL
            $peminjaman->save();

            DB::commit();
            return redirect()->route('admin.peminjaman')->with('success', 'Data dan Status berhasil diperbarui! Email otomatis terkirim.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memproses: ' . $e->getMessage());
        }
    }

    // 1. FUNGSI JIKA ADMIN MENG-ACC PINJAMAN
    public function konfirmasi($id)
    {
        $peminjaman = Peminjaman::with('user', 'detail.buku')->findOrFail($id);

        DB::transaction(function () use ($peminjaman) {
            $peminjaman->update([
                'status'              => 'dipinjam',
                'tanggal_pinjam'      => now()->toDateString(),
                'tanggal_jatuh_tempo' => now()->addDays(7)->toDateString(),
            ]);

            DetailPeminjaman::where('id_peminjaman', $peminjaman->id_peminjaman)
                ->update(['status_item' => 'dipinjam']);
        });

        // 🚀 KIRIM EMAIL OTOMATIS (Menggunakan Queue agar cepat)
        if ($peminjaman->user && $peminjaman->user->email) {
            Mail::to($peminjaman->user->email)->queue(new BukuSiapDiambilMail($peminjaman));
        }

        return redirect()->back()->with('success', 'Peminjaman berhasil dikonfirmasi! Email notifikasi telah dikirim ke user.');
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
public function exportExcel()
{
    $data = Peminjaman::with('user')->get();

    $filename = "laporan_peminjaman_" . now()->format('Ymd_His') . ".xls";

    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");

    echo "
    <table border='1'>
        <tr style='font-weight:bold; background:#D9EAF7;'>
            <th>ID</th>
            <th>Nama User</th>
            <th>Tanggal Pinjam</th>
            <th>Jatuh Tempo</th>
            <th>Status</th>
            <th>Denda</th>
        </tr>";

    foreach ($data as $row) {
        echo "
        <tr>
            <td>{$row->id_peminjaman}</td>
            <td>".($row->user->nama ?? '-')."</td>
            <td>{$row->tanggal_pinjam}</td>
            <td>{$row->tanggal_jatuh_tempo}</td>
            <td>{$row->status}</td>
            <td>{$row->denda}</td>
        </tr>";
    }

    echo "</table>";
    exit;
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::with('detail')->findOrFail($id);

        DB::transaction(function () use ($peminjaman) {
            // Kembalikan stok buku sebelum menghapus data
            foreach ($peminjaman->detail as $item) {
                Buku::where('id_buku', $item->id_buku)->increment('stok', $item->jumlah);
            }

            // Hapus detail dan header
            $peminjaman->detail()->delete();
            $peminjaman->delete();
        });

        return redirect()->route('admin.peminjaman')->with('success', 'Data peminjaman berhasil dihapus.');
    }
}
