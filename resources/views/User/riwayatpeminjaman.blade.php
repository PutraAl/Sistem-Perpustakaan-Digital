@extends('layout.app')

@section('content')

<div class="container py-4">

    <h2 class="mb-4">Riwayat Peminjaman Buku</h2>

    <div class="card shadow-sm">
        <div class="card-body p-4">

            <div class="table-responsive">
<table class="table table-striped table-hover align-middle">

    <thead class="table-dark">
        <tr>
            <th class="px-3 py-2">No</th>
            <th class="px-3 py-2">Judul Buku</th>
            <th class="px-3 py-2">Tanggal Pinjam</th>
            <th class="px-3 py-2">Tanggal Kembali</th>
            <th class="px-3 py-2">Status</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td class="px-3 py-3">1</td>
            <td class="px-3 py-3">Laskar Pelangi</td>
            <td class="px-3 py-3">2026-04-10</td>
            <td class="px-3 py-3">2026-04-15</td>
            <td class="px-3 py-3">
                <span class="badge bg-success px-3 py-2">Dikembalikan</span>
            </td>
        </tr>

        <tr>
            <td class="px-3 py-3">2</td>
            <td class="px-3 py-3">Bumi Manusia</td>
            <td class="px-3 py-3">2026-04-12</td>
            <td class="px-3 py-3">-</td>
            <td class="px-3 py-3">
                <span class="badge bg-warning text-dark px-3 py-2">Dipinjam</span>
            </td>
        </tr>
    </tbody>

</table>

@endsection