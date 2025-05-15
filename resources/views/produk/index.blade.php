@extends('layouts.app')

@section('title', 'Produk Buah')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-success">🍉 Produk Buah</h2>
    <form action="{{ url('/produk') }}" method="GET" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari buah..." value="{{ request('search') }}">
        <select name="kategori" class="form-select me-2">
            <option value="">Semua Kategori</option>
            <option value="Jeruk" {{ request('kategori') == 'Jeruk' ? 'selected' : '' }}>Jeruk</option>
            <option value="Mangga" {{ request('kategori') == 'Mangga' ? 'selected' : '' }}>Mangga</option>
            <option value="Apel" {{ request('kategori') == 'Apel' ? 'selected' : '' }}>Apel</option>
            <!-- tambahkan kategori lainnya -->
        </select>
        <button class="btn btn-success">Cari</button>
    </form>
</div>

<div class="row">
    @forelse ($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100 border-0">
            <div class="card-body">
                <h5 class="card-title text-success">{{ $product->name }}</h5>
                <p class="text-muted">{{ $product->description }}</p>
                <p><strong>Harga:</strong> Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                <p><strong>Stok:</strong> {{ $product->stok }}</p>

                @if(auth()->check() && in_array(auth()->user()->role, ['admin', 'petani']))
                <a href="{{ url('/produk/'.$product->id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ url('/produk/'.$product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus produk ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
                @endif
            </div>
        </div>
    </div>
    @empty
    <div class="alert alert-warning text-center">Produk tidak ditemukan.</div>
    @endforelse
</div>
@endsection
