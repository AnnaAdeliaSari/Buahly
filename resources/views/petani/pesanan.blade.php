@extends('layouts.app')

@section('title', 'Pesanan Masuk')

@section('content')
<h2 class="mb-4 text-success">📦 Pesanan Masuk</h2>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($pesanan->isEmpty())
    <div class="alert alert-warning text-center">Belum ada pesanan untuk produk Anda.</div>
@else
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-success">
                <tr>
                    <th>No</th> 
                    <th>Produk</th>
                    <th>Pembeli</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Dipesan Pada</th>
                    <th>Ubah Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanan as $no => $order)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->buyer->name }}</td>
                    <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td>
                        <span class="badge bg-{{ 
                            $order->status == 'Menunggu' ? 'warning' : 
                            ($order->status == 'dikemas' ? 'info' : 
                            ($order->status == 'dikirim' ? 'primary' : 
                            ($order->status == 'selesai' ? 'success' : 'secondary'))) }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                    <td>
                        <form action="{{ url('/petani/pesanan/' . $order->id . '/status') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="input-group">
                                <select name="status" class="form-select form-select-sm" required>
                                    <option value="">-- Ubah Status --</option>
                                    <option value="Menunggu" {{ $order->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                    <option value="dikemas" {{ $order->status == 'dikemas' ? 'selected' : '' }}>Dikemas</option>
                                    <option value="dikirim" {{ $order->status == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                                    <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="dibatalkan" {{ $order->status == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                                <button class="btn btn-sm btn-outline-success" type="submit">Simpan</button>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection
