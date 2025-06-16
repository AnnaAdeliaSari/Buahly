@extends('layouts.app')

@section('title', 'Produk Buah')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-success">🍉 Produk Buah</h2>

    <div class="d-flex">
        <form action="{{ url('/produk') }}" method="GET" class="d-flex me-3">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari buah..." value="{{ request('search') }}">
            <select name="kategori" class="form-select me-2">
                <option value="">Semua Kategori</option>
                <option value="Jeruk" {{ request('kategori') == 'Jeruk' ? 'selected' : '' }}>Jeruk</option>
                <option value="Mangga" {{ request('kategori') == 'Mangga' ? 'selected' : '' }}>Mangga</option>
                <option value="Apel" {{ request('kategori') == 'Apel' ? 'selected' : '' }}>Apel</option>
            </select>
            <button class="btn btn-success">Cari</button>
        </form>

        {{-- Tombol tambah produk untuk petani --}}
        @auth
            @if(auth()->user()->role === 'petani')
                <a href="{{ url('/produk/create') }}" class="btn btn-primary">+ Tambah Produk</a>
            @endif
        @endauth
    </div>
</div>

<div class="row">
    @forelse ($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100 border-0">

            {{-- Tampilkan gambar jika ada --}}
            @php
                $imagePath = $product->image ? 'build/assets/' . $product->image : 'build/assets/default.jpg';
            @endphp
            <img src="{{ asset($imagePath) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">

            <div class="card-body">
                <h5 class="card-title text-success">{{ $product->name }}</h5>
                <p class="text-muted">{{ $product->description }}</p>
                <p><strong>Harga:</strong> Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                <p><strong>Stok:</strong> {{ $product->stok }}</p>

                {{-- Tombol Beli hanya untuk pembeli --}}
                @auth
                    @if(auth()->user()->role === 'pembeli')
                        <a href="{{ url('/pesan/' . $product->id) }}" class="btn btn-sm btn-primary mb-2">Beli Sekarang</a>
                    @endif
                @endauth

                {{-- Tombol Edit & Hapus untuk admin atau petani pemilik produk --}}
                @auth
                    @if(auth()->user()->role === 'admin' || (auth()->user()->role === 'petani' && auth()->id() === $product->user_id))
                        <a href="{{ url('/produk/'.$product->id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ url('/produk/'.$product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    @endif
                @endauth

            </div>
        </div>
    </div>
    @empty
    <div class="alert alert-warning text-center">Produk tidak ditemukan.</div>
    @endforelse
</div>
@endsection
