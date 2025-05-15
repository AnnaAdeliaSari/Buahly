@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="p-5 mb-4 bg-white rounded-3 shadow-sm">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold text-success">Selamat Datang di Sistem Jual Buah</h1>
        <p class="col-md-8 fs-5">Kami menyediakan berbagai jenis buah segar hasil pertanian lokal langsung dari petani.</p>
        <a class="btn btn-success btn-lg" href="/produk">Lihat Produk</a>
    </div>
</div>
@endsection
