@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Kategori</h1>
    <ul>
        @foreach($data as $kategori)
            <li>{{ $kategori->nama }}</li>
        @endforeach
    </ul>
</div>
@endsection
