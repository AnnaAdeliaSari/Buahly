@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <div class="p-5 mb-4 bg-white rounded-4 shadow-sm text-center">
        <h1 class="display-4 fw-bold text-success">Selamat Datang di <span class="text-dark">Toko Buah</span></h1>
        <p class="lead mt-3">Kami menyediakan berbagai buah segar berkualitas langsung dari petani lokal.</p>
        <a href="/produk" class="btn btn-success btn-lg mt-3 px-4">Lihat Produk</a>
    </div>

    <div class="row text-center mt-5">
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <img src="{{ asset('build/assets/mangga1.jpg') }}" class="card-img-top" alt="Mangga">
                <div class="card-body">
                    <h5 class="card-title text-success">🍋 Mangga Harum Manis</h5>
                    <p class="card-text">Dapatkan mangga harum manis yang dipetik langsung dari kebun petani.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <img src="{{ asset('build/assets/jeruk.jpg') }}" class="card-img-top" alt="Jeruk">
                <div class="card-body">
                    <h5 class="card-title text-success">🍊 Jeruk Manis Lokal</h5>
                    <p class="card-text">Jeruk manis dan segar, kaya vitamin C dan rasa alami.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <img src="{{ asset('build/assets/apel.jpg') }}" class="card-img-top" alt="Apel">
                <div class="card-body">
                    <h5 class="card-title text-success">🍎 Apel Fuji</h5>
                    <p class="card-text">Apel fuji renyah dan manis, cocok dinikmati kapan saja.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
