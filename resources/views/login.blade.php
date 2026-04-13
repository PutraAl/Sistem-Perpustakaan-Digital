@extends('layout.auth')

@section('content')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">

    <div class="card shadow-lg border-0" style="width: 400px; border-radius: 15px;">
        <div class="card-body p-4">

            <h3 class="text-center mb-4 fw-bold">Login</h3>

            <form method="POST" action="#">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Masukkan email">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Masukkan password">
                </div>

                <button class="btn btn-primary w-100 mt-2">Login</button>

                <div class="text-center mt-3">
                    <small>Belum punya akun? <a href="#">Daftar</a></small>
                </div>

            </form>

        </div>
    </div>

</div>

</body>

@endsection