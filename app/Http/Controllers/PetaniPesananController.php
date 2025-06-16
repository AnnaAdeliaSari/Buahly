<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Product;

class PetaniPesananController extends Controller
{
    public function index()
    {
        // Hanya untuk role 'petani'
        if (auth()->user()->role !== 'petani') {
            abort(403, 'Akses ditolak.');
        }

        // Ambil ID produk yang dimiliki petani
        $produkSaya = Product::where('user_id', auth()->id())->pluck('id');

        // Ambil pesanan untuk produk-produk tersebut
        $pesanan = Order::with(['product', 'buyer'])
                    ->whereIn('product_id', $produkSaya)
                    ->orderByDesc('created_at')
                    ->get();

        return view('petani.pesanan', compact('pesanan'));
    }
    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:Menunggu,dikemas,dikirim,selesai,dibatalkan',
    ]);

    $order = Order::findOrFail($id);

    // Pastikan pesanan berasal dari produk milik petani yang sedang login
    if ($order->product->user_id !== auth()->id()) {
        abort(403, 'Anda tidak memiliki akses untuk mengubah status pesanan ini.');
    }

    $order->status = $request->status;
    $order->save();

    return back()->with('success', 'Status pesanan berhasil diperbarui.');
}
}
