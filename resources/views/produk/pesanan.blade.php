@extends('layouts.app')

@section('title', 'Daftar Pesanan')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-success">📦 Daftar Pesanan Anda</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($orders->isEmpty())
        <div class="alert alert-info">Belum ada pesanan yang dibuat.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-success text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Waktu Pesan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $index => $order)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $order->product->name }}</td>
                        <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td>
                            @php
                                $badge = match($order->status) {
                                    'Menunggu' => 'secondary',
                                    'dikemas' => 'warning',
                                    'dikirim' => 'info',
                                    'selesai' => 'success',
                                    'dibatalkan' => 'danger',
                                };
                            @endphp
                            <span class="badge bg-{{ $badge }}">{{ ucfirst($order->status) }}</span>
                        </td>
                        <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                        <td class="text-center">
                            @if($order->status == 'Menunggu')
                            <form action="{{ url('/pesanan/'.$order->id.'/batal') }}" method="POST" onsubmit="return confirm('Yakin batalkan pesanan ini?')">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-sm btn-danger">Batalkan</button>
                            </form>
                            @else
                            <em>-</em>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
