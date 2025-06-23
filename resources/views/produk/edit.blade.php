@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow rounded">
            <div class="card-header bg-warning text-white text-center">
                <h4>Edit Produk</h4>
            </div>
            <div class="card-body">
                {{-- Tampilkan error validasi jika ada --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('produk.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Nama Produk --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Produk</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $product->description) }}</textarea>
                    </div>

                    {{-- Harga --}}
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" value="{{ old('harga', $product->harga) }}" required>
                    </div>

                    {{-- Stok --}}
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" name="stok" class="form-control" value="{{ old('stok', $product->stok) }}" required>
                    </div>

                    {{-- Kategori (Jenis Buah) --}}
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Jenis Buah</label>
                        <select name="kategori" class="form-control" required>
                            <option value="">-- Pilih Jenis Buah --</option>
                            <option value="mangga" {{ old('kategori', $product->kategori) == 'mangga' ? 'selected' : '' }}>Mangga</option>
                            <option value="apel" {{ old('kategori', $product->kategori) == 'apel' ? 'selected' : '' }}>Apel</option>
                            <option value="jeruk" {{ old('kategori', $product->kategori) == 'jeruk' ? 'selected' : '' }}>Jeruk</option>
                        </select>
                    </div>

                    {{-- Gambar --}}
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Produk (opsional)</label>
                        <input type="file" name="image" class="form-control">
                        @if ($product->image)
                            <small class="text-muted">Gambar saat ini:</small><br>
                            <img src="{{ asset('assets/' . $product->image) }}" alt="Gambar Produk" class="img-thumbnail mt-2" width="150">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-warning">Update Produk</button>
                    <a href="{{ route('produk.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
