<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PaymentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Produk & Kategori (Guest & User)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Checkout (User)
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
    Route::post('/checkout', [OrderController::class, 'store'])->name('order.store');
    Route::get('/checkout/success', [OrderController::class, 'success'])->name('order.success');
});

// Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // CRUD user, produk, promo, pesanan, dsb
});

// Toko
Route::middleware(['auth', 'role:toko'])->group(function () {
    Route::get('/store', [StoreController::class, 'dashboard'])->name('store.dashboard');
    // CRUD produk milik toko, riwayat penjualan
});

// Gudang
Route::middleware(['auth', 'role:gudang'])->group(function () {
    Route::get('/warehouse', [WarehouseController::class, 'dashboard'])->name('warehouse.dashboard');
    // Proses permintaan stok
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Midtrans Snap Token (AJAX)
Route::middleware('auth')->get('/payment/snap-token/{orderId}', [PaymentController::class, 'snapToken']);
// Midtrans Callback (POST, public)
Route::post('/payment/midtrans-callback', [PaymentController::class, 'midtransCallback']);

// Cart Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'addItem'])->name('cart.add-item');
    Route::post('/cart/remove', [CartController::class, 'removeItem'])->name('cart.remove-item');
    Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.update-quantity');
});

require __DIR__.'/auth.php';
