@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow rounded">
            <div class="card-header bg-success text-white text-center">
                <h4>Login</h4>
            </div>
            <div class="card-body">

                {{-- Pesan error umum --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        Email atau password salah.
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    {{-- Input Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email"
                               class="form-control @if($errors->any()) is-invalid @endif"
                               name="email"
                               value=""
                               required>
                    </div>

                    {{-- Input Password --}}
                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password"
                               class="form-control @if($errors->any()) is-invalid @endif"
                               name="password"
                               required>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Masuk</button>
                </form>

                <div class="text-center mt-3">
                    <p>Belum punya akun? 
                        <a href="{{ route('register.form') }}" class="text-decoration-none">
                            Daftar sekarang
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
