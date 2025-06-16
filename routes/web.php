<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PetaniPesananController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\AutController;

Route::get('/', function () {
    return view('home');
});

Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');

Route::get('/produk/{id}/edit', [ProductController::class, 'edit']);
Route::delete('/produk/{id}', [ProductController::class, 'destroy']);

// Login
Route::get('/login', [AutController::class, 'login'])->name('login'); // Menampilkan form login
Route::post('/login', [AutController::class, 'loginProses']);        // Proses login

// Register
Route::get('/register', [AutController::class, 'showRegisterForm'])->name('register.form'); // Form register
Route::post('/register', [AutController::class, 'register'])->name('register');;                         // Proses register

// Logout
Route::post('/logout', [AutController::class, 'logout'])->name('logout');

// Setelah login sukses
Route::get('/index', function () {
    return view('index'); // pastikan file resources/views/index.blade.php ada

});

Route::get('/pesanan', [PesananController::class, 'index'])->middleware('auth');
Route::put('/pesanan/{id}/batal', [PesananController::class, 'batalkan'])->middleware('auth');

Route::get('/petani/pesanan', [PetaniPesananController::class, 'index'])->middleware('auth');
Route::put('/petani/pesanan/{id}/status', [PetaniPesananController::class, 'updateStatus'])->middleware('auth');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Users
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::put('/users/{id}/role', [AdminController::class, 'updateUserRole'])->name('admin.users.updateRole');
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');

    // Products
    Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
    Route::delete('/products/{id}', [AdminController::class, 'deleteProduct'])->name('admin.products.delete');

    // Orders
    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::put('/orders/{id}/status', [AdminController::class, 'updateOrderStatus'])->name('admin.orders.updateStatus');
    Route::delete('/orders/{id}', [AdminController::class, 'deleteOrder'])->name('admin.orders.destroy');
});

Route::get('/produk/create', [ProdukController::class, 'create'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/produk/create', [ProductController::class, 'create'])->name('produk.create');
    Route::post('/produk', [ProductController::class, 'store'])->name('produk.store');
});

Route::resource('produk', ProductController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/pesan/{id}', [PesananController::class, 'create'])->name('pesan.create');
    Route::post('/pesan/{id}', [PesananController::class, 'store'])->name('pesan.store');
});


