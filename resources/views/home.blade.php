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
                <div class="card-body">
                    <h5 class="card-title text-success">🍎 Buah Segar</h5>
                    <p class="card-text">Dapatkan buah berkualitas terbaik yang dipetik langsung dari kebun.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title text-success">🚚 Pengiriman Cepat</h5>
                    <p class="card-text">Pengiriman aman dan cepat langsung ke alamat pelanggan.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title text-success">🤝 Dukungan Petani</h5>
                    <p class="card-text">Setiap pembelian mendukung petani lokal dan pertanian berkelanjutan.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
