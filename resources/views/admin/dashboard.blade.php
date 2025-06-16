@extends('layouts.dashboardAdmin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Dashboard Admin</h1>

    <!-- Statistik Ringkas -->
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pengguna</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUsers }}</div>
                        </div>
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Produk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProduk }}</div>
                        </div>
                        <i class="fas fa-apple-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pesanan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPesanan }}</div>
                        </div>
                        <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigasi Aksi -->
    <div class="row">
        <div class="col-md-4 mb-4">
            <a href="{{ route('admin.users') }}" class="btn btn-primary btn-block">
                <i class="fas fa-users-cog"></i> Kelola Pengguna
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="{{ route('admin.products') }}" class="btn btn-success btn-block">
                <i class="fas fa-apple-alt"></i> Kelola Produk
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="{{ route('admin.orders') }}" class="btn btn-info btn-block">
                <i class="fas fa-file-invoice"></i> Lihat Transaksi
            </a>
        </div>
    </div>
</div>
@endsection
