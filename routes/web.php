<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AutController;

Route::get('/', function () {
    return view('home');
});

Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');
Route::get('/produk', [ProductController::class, 'index']);
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