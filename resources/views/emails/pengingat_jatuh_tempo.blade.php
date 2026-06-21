<!DOCTYPE html>
<html>
<head>
    <title>Pengingat Jatuh Tempo</title>
</head>
<body style="font-family: sans-serif; color: #333;">
    <h2>Halo, {{ $peminjaman->user->nama ?? $peminjaman->user->name }}!</h2>
    <p>Ini adalah pengingat otomatis bahwa masa peminjaman buku kamu tinggal <strong>1 hari lagi</strong>.</p>
    
    <div style="background: #fff1f2; border: 1px solid #fecdd3; padding: 15px; border-radius: 8px;">
        <p style="margin: 0; font-weight: bold; color: #991b1b;">Harap kembalikan buku sebelum atau tepat pada tanggal jatuh tempo untuk menghindari denda Rp 3.000 / hari.</p>
    </div>

    <p><strong>Buku yang harus dikembalikan:</strong></p>
    <ul>
        @foreach($peminjaman->detail as $item)
            <li>{{ $item->buku->judul }}</li>
        @endforeach
    </ul>
    <p>Tanggal Jatuh Tempo: <strong style="color: #e11d48;">{{ \Carbon\Carbon::parse($peminjaman->tanggal_jatuh_tempo)->format('d M Y') }}</strong></p>
    
    <br>
    <p>Terima kasih atas kerja samanya,<br><strong>Tim Perpustakaan</strong></p>
</body>
</html>