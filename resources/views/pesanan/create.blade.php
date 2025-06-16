@extends('layouts.app')

@section('title', 'Pesan Produk')

@section('content')
<div class="container">
    <h3 class="mb-4 text-success">🛒 Pesan Produk</h3>

    <div class="card mb-4">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('build/assets/' . $product->image) }}" class="img-fluid rounded-start" alt="{{ $product->name }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-success">{{ $product->name }}</h5>
                    <p>{{ $product->description }}</p>
                    <p><strong>Harga:</strong> Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                    <p><strong>Stok:</strong> {{ $product->stok }}</p>

                    <form action="{{ route('pesan.store', $product->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" max="{{ $product->stok }}" required>
                            @error('jumlah') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Pesan Sekarang</button>
                        <a href="{{ url('/produk') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
