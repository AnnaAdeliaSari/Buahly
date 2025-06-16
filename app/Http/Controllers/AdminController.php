<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    private function checkAdmin()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }
    }

    public function dashboard()
    {
        $this->checkAdmin();

        return view('admin.dashboard', [
            'totalUsers' => User::where('role', '!=', 'admin')->count(),
            'totalProduk' => Product::count(),
            'totalPesanan' => Order::count()
        ]);
    }

    public function users()
    {
        $this->checkAdmin();

        $users = User::where('role', '!=', 'admin')->get();
        return view('admin.users', compact('users'));
    }

    public function updateUserRole(Request $request, $id)
    {
        $this->checkAdmin();

        $request->validate([
            'role' => 'required|in:petani,pembeli'
        ]);

        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return back()->with('success', 'Role pengguna diperbarui.');
    }

    public function deleteUser($id)
    {
        $this->checkAdmin();

        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'Pengguna dihapus.');
    }

    public function products()
    {
        $this->checkAdmin();

        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    public function deleteProduct($id)
    {
        $this->checkAdmin();

        $product = Product::findOrFail($id);
        $product->delete();

        return back()->with('success', 'Produk dihapus.');
    }

    public function orders()
    {
        $this->checkAdmin();

        $orders = Order::with(['user', 'product'])->get();
        return view('admin.orders', compact('orders'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $this->checkAdmin();

        $request->validate([
            'status' => 'required|string|max:255'
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return back()->with('success', 'Status pesanan diperbarui.');
    }

    public function deleteOrder($id)
    {
        $this->checkAdmin();

        $order = Order::findOrFail($id);
        $order->delete();

        return back()->with('success', 'Pesanan dihapus.');
    }
}
