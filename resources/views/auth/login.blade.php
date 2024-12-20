@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="login-box">
                <h2 class="text-center">Login</h2>
                <!-- Form Login -->
                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email">Masukkan Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Masukkan Kata Sandi</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <div class="text-center mt-3">
                    <!-- Tombol Buat Akun -->
                    <form action="{{ route('createAccount') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link">Buat Akun</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
