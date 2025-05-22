<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
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

 // Method untuk menampilkan halaman login
    public function login()
    {
        return view(''); // atau ganti dengan view lain seperti 'auth.login' jika tersedia
    }

}
