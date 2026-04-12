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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0        ">
    <
    <title>KATEGORI</title>
</head>
<body>                                      

</body>
</html>

