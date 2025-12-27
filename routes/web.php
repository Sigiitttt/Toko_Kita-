<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Models\Product;

// Halaman Depan
Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard', [
        'totalProducts' => Product::count(),
        'totalValue'    => Product::sum('harga'),
        'latestProducts'=> Product::latest()->limit(5)->get()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

// Group Auth (Login Wajib)
Route::middleware('auth')->group(function () {
    
    // Route Produk (Ini yang paling penting untuk Video 4 & 5)
    Route::resource('products', ProductController::class);

    // Profile Bawaan Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Load auth routes
require __DIR__.'/auth.php';