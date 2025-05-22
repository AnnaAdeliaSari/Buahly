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

// Rute untuk halaman login
Route::post('/login', [AutController::class, 'login'])->name('login');
// Route::post('/login', [AutController::class, 'loginProses']);