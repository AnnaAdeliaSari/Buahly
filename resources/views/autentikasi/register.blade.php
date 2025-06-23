@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow rounded">
            <div class="card-header bg-success text-white text-center">
                <h4>Register</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Daftar Sebagai</label>
                        <select name="role" class="form-select" required>
                            <option value="" disabled selected>-- Pilih Role --</option>
                            <option value="admin">Admin</option>
                            <option value="petani">Petani / Penjual</option>
                            <option value="pembeli">Pembeli</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Daftar</button>
                </form>

                <div class="text-center mt-3">
                    <a href="{{ route('login') }}">Sudah punya akun? Login di sini</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
