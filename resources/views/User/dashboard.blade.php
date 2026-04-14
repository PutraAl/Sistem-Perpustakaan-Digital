@extends('layout.app')

@section('content')
<div class="container">
    <h1>Dashboard Anggota</h1>
    <p>Selamat datang, Admin!</p>

    <div class="row">
        <div class="col-md-6">
            <a href="/buku" class="btn btn-primary w-100">
                Lihat Daftar Buku
            </a>
        </div>
<a href="{{ route('user.riwayat') }}" class="btn btn-success w-100">
    Riwayat Peminjaman
</a>
        </div>
    </div>
</div>
@endsection