<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ProductController extends Controller
{
    // Menampilkan daftar produk + filter pencarian
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('kategori')) {
            $query->where('name', 'like', '%' . $request->kategori . '%');
        }

        $products = $query->get();

        return view('produk.index', compact('products'));
    }

    // Form tambah produk (khusus petani)
    public function create()
    {
        if (auth()->user()->role !== 'petani') {
            abort(403, 'Hanya petani yang bisa menambahkan produk.');
        }

        return view('produk.create');
    }

    // Simpan produk baru
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'petani') {
            abort(403, 'Hanya petani yang bisa menambahkan produk.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'kategori' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets'), $imageName);
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori' => $request->kategori,
            'image' => $imageName,
            'user_id' => auth()->id(), // Pastikan ada kolom ini kalau perlu
        ]);

        return redirect('/produk')->with('success', 'Produk berhasil ditambahkan.');
    }
    public function edit($id)
{
    $product = Product::findOrFail($id);

    // Hanya petani pemilik produk yang boleh mengedit
    if (Auth::user()->role === 'petani' && $product->user_id !== Auth::id()) {
        abort(403, 'Anda tidak memiliki akses untuk mengedit produk ini.');
    }

    return view('produk.edit', compact('product'));
}

public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    // Validasi pemilik
    if (Auth::user()->role === 'petani' && $product->user_id !== Auth::id()) {
        abort(403, 'Anda tidak memiliki akses untuk mengubah produk ini.');
    }

    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'harga' => 'required|numeric',
        'stok' => 'required|integer',
        'kategori' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $product->update($request->only(['name', 'description', 'harga', 'stok', 'kategori']));

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('assets', 'public');
        $product->image = basename($imagePath);
        $product->save();
    }

    return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
}

public function destroy($id)
{
    $product = Product::findOrFail($id);

    // Validasi hanya pemilik yang boleh hapus
    if (Auth::user()->role === 'petani' && $product->user_id !== Auth::id()) {
        abort(403, 'Anda tidak memiliki akses untuk menghapus produk ini.');
    }

    $product->delete();

    return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
}
}
