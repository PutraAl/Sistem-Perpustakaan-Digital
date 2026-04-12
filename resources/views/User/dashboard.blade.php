@extends('layout.member')

@section('content')
<div class="container">
    <h1>Dashboard Anggota</h1>
    <p>Selamat datang, {{ Auth::user()->name }}!</p>
    <div class="row">
        <div class="col-md-6">
            <a href="/member/buku" class="btn btn-primary w-100">Lihat Daftar Buku</a>
        </div>
        <div class="col-md-6">
            <a href="/member/peminjaman" class="btn btn-success w-100">Riwayat Peminjaman</a>
        </div>
    </div>
</div>
@endsection
