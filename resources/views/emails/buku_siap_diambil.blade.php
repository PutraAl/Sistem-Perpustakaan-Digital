<!DOCTYPE html>
<html>
<head>
    <title>Buku Siap Diambil</title>
</head>
<body style="font-family: sans-serif; color: #333;">
    <h2>Halo, {{ $peminjaman->user->nama ?? $peminjaman->user->name }}!</h2>
    <p>Pengajuan peminjaman bukumu telah <strong>Dikonfirmasi</strong> oleh Admin Perpustakaan.</p>
    
    <div style="background: #f0fdf4; border: 1px solid #bbf7d0; padding: 15px; border-radius: 8px;">
        <p style="margin: 0; font-weight: bold; color: #166534;">Silakan ambil buku ke perpustakaan dengan membawa kartu anggota.</p>
    </div>

    <p><strong>Detail Peminjaman:</strong></p>
    <ul>
        @foreach($peminjaman->detail as $item)
            <li>{{ $item->buku->judul }} ({{ $item->jumlah }} Buku)</li>
        @endforeach
    </ul>
    <p>Batas maksimal pengembalian: <strong>{{ \Carbon\Carbon::parse($peminjaman->tanggal_jatuh_tempo)->format('d M Y') }}</strong></p>
    
    <br>
    <p>Salam hangat,<br><strong>Tim Perpustakaan</strong></p>
</body>
</html>