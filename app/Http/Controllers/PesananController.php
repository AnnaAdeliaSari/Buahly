<?php

namespace App\Http\Controllers;
use App\Models\Order; 
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
{
    $orders = Order::with('product')->where('buyer_id', auth()->id())->latest()->get();
    return view('produk.pesanan', compact('orders'));
}
    public function batalkan($id)
{
    $order = Order::where('id', $id)->where('buyer_id', auth()->id())->firstOrFail();
    if ($order->status == 'Menunggu') {
        $order->status = 'dibatalkan';
        $order->save();
        return back()->with('success', 'Pesanan berhasil dibatalkan.');
    }
    return back()->with('success', 'Pesanan tidak bisa dibatalkan.');
}
public function create($id)
{
    $product = Product::findOrFail($id);
    return view('pesanan.create', compact('product'));
}

public function store(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $request->validate([
        'jumlah' => 'required|integer|min:1|max:' . $product->stok,
    ]);

    $jumlah = $request->jumlah;
    $total = $jumlah * $product->harga;

    // Kurangi stok produk
    $product->stok -= $jumlah;
    $product->save();

    // Simpan pesanan
    Order::create([
        'buyer_id' => auth()->id(),
        'product_id' => $product->id,
        'status' => 'Menunggu',
        'total_price' => $total,
    ]);

    return redirect('/produk')->with('success', 'Pesanan berhasil dibuat.');
}

}
