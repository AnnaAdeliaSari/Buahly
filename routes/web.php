<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home');
});

Route::get('/produk', [ProductController::class, 'index']);
Route::get('/produk', [ProductController::class, 'index']);
Route::get('/produk/{id}/edit', [ProductController::class, 'edit']);
Route::delete('/produk/{id}', [ProductController::class, 'destroy']);
