<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PetaniPesananController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AutController;

// Halaman utama
Route::get('/', function () {
    return view('home');
});

// Produk umum
Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');
Route::get('/produk/create', [ProductController::class, 'create'])->middleware('auth')->name('produk.create');
Route::post('/produk', [ProductController::class, 'store'])->name('produk.store');
Route::get('/produk/{id}/edit', [ProductController::class, 'edit']);
Route::delete('/produk/{id}', [ProductController::class, 'destroy']);

// Resource produk (optional, jika kamu pakai resource controller penuh)
Route::resource('produk', ProductController::class);

// Autentikasi
Route::get('/login', [AutController::class, 'login'])->name('login');
Route::post('/login', [AutController::class, 'loginProses']);
Route::get('/register', [AutController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AutController::class, 'register'])->name('register');
Route::post('/logout', [AutController::class, 'logout'])->name('logout');

// Setelah login
Route::get('/index', function () {
    return view('index');
});

// Pesanan (untuk pembeli)
Route::get('/pesanan', [PesananController::class, 'index'])->middleware('auth');
Route::put('/pesanan/{id}/batal', [PesananController::class, 'batalkan'])->middleware('auth');
Route::get('/pesan/{id}', [PesananController::class, 'create'])->middleware('auth')->name('pesan.create');
Route::post('/pesan/{id}', [PesananController::class, 'store'])->middleware('auth')->name('pesan.store');

// Pesanan oleh petani
Route::get('/petani/pesanan', [PetaniPesananController::class, 'index'])->middleware('auth');
Route::put('/petani/pesanan/{id}/status', [PetaniPesananController::class, 'updateStatus'])->middleware('auth');

// Admin routes TANPA middleware admin
Route::prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Users
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/users/{id}/role', [AdminController::class, 'updateUserRole'])->name('admin.users.updateRole');
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.destroy');

    // Products
    Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/products/{id}/edit', [AdminController::class, 'editProduct'])->name('admin.products.edit');
    Route::delete('/products/{id}', [AdminController::class, 'deleteProduct'])->name('admin.products.destroy');

    // Orders
    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::put('/orders/{id}/status', [AdminController::class, 'updateOrderStatus'])->name('admin.orders.updateStatus');
    Route::delete('/orders/{id}', [AdminController::class, 'deleteOrder'])->name('admin.orders.destroy');
});

// Rute tambahan akses edit user & produk langsung (bila diperlukan)
Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
Route::get('/products/{id}/edit', [AdminController::class, 'editProduct'])->name('admin.products.edit');
