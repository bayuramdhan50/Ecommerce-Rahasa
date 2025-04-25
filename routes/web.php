<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PromoController;

// Admin Controllers
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\AdminSettingController;

// Store Controllers
use App\Http\Controllers\Store\StoreOrderController;
use App\Http\Controllers\Store\StoreProductController;
use App\Http\Controllers\Store\StoreStockRequestController;
use App\Http\Controllers\Store\StoreReportController;

// Warehouse Controllers
use App\Http\Controllers\Warehouse\WarehouseInventoryController;
use App\Http\Controllers\Warehouse\WarehouseStockRequestController;
use App\Http\Controllers\Warehouse\WarehouseStockAdjustmentController;
use App\Http\Controllers\Warehouse\WarehouseTransferController;
use App\Http\Controllers\Warehouse\WarehousePurchaseOrderController;
use App\Http\Controllers\Warehouse\WarehouseSupplierController;
use App\Http\Controllers\Warehouse\WarehouseReportController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Product Routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Category Routes
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [ProductController::class, 'byCategory'])->name('products.by-category');

// Promo Routes
Route::get('/promos', [PromoController::class, 'index'])->name('promos.index');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin Routes
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
        Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
        Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
        Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories.index');
        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [AdminUserController::class, 'create'])->name('users.create');
        Route::get('/roles', [AdminRoleController::class, 'index'])->name('roles.index');
        Route::get('/settings/general', [AdminSettingController::class, 'general'])->name('settings.general');
        Route::get('/settings/payment', [AdminSettingController::class, 'payment'])->name('settings.payment');
        Route::get('/settings/shipping', [AdminSettingController::class, 'shipping'])->name('settings.shipping');
    });

    // Store Routes
    Route::middleware(['role:store'])->prefix('store')->name('store.')->group(function () {
        Route::get('/orders/pending', [StoreOrderController::class, 'pending'])->name('orders.pending');
        Route::get('/orders/processing', [StoreOrderController::class, 'processing'])->name('orders.processing');
        Route::get('/orders', [StoreOrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{order}', [StoreOrderController::class, 'show'])->name('orders.show');
        Route::get('/products', [StoreProductController::class, 'index'])->name('products.index');
        Route::get('/products/low-stock', [StoreProductController::class, 'lowStock'])->name('products.low-stock');
        Route::get('/stock-requests/create', [StoreStockRequestController::class, 'create'])->name('stock-requests.create');
        Route::get('/stock-requests', [StoreStockRequestController::class, 'index'])->name('stock-requests.index');
        Route::get('/reports/sales', [StoreReportController::class, 'sales'])->name('reports.sales');
        Route::get('/reports/inventory', [StoreReportController::class, 'inventory'])->name('reports.inventory');
        Route::get('/reports/performance', [StoreReportController::class, 'performance'])->name('reports.performance');
    });

    // Warehouse Routes
    Route::middleware(['role:warehouse'])->prefix('warehouse')->name('warehouse.')->group(function () {
        Route::get('/inventory', [WarehouseInventoryController::class, 'index'])->name('inventory.index');
        Route::get('/stock-requests', [WarehouseStockRequestController::class, 'index'])->name('stock-requests.index');
        Route::get('/stock-requests/{request}', [WarehouseStockRequestController::class, 'show'])->name('stock-requests.show');
        Route::get('/stock-requests/{request}/process', [WarehouseStockRequestController::class, 'process'])->name('stock-requests.process');
        Route::get('/stock-adjustment/create', [WarehouseStockAdjustmentController::class, 'create'])->name('stock-adjustment.create');
        Route::get('/transfers/create', [WarehouseTransferController::class, 'create'])->name('transfers.create');
        Route::get('/purchase-orders/create', [WarehousePurchaseOrderController::class, 'create'])->name('purchase-orders.create');
        Route::get('/purchase-orders', [WarehousePurchaseOrderController::class, 'index'])->name('purchase-orders.index');
        Route::get('/suppliers', [WarehouseSupplierController::class, 'index'])->name('suppliers.index');
        Route::get('/reports/stock-movement', [WarehouseReportController::class, 'stockMovement'])->name('reports.stock-movement');
        Route::get('/reports/stock-value', [WarehouseReportController::class, 'stockValue'])->name('reports.stock-value');
        Route::get('/reports/stock-aging', [WarehouseReportController::class, 'stockAging'])->name('reports.stock-aging');
    });

    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::put('/cart/{cart}', [CartController::class, 'updateQuantity'])->name('cart.update-quantity');
    Route::delete('/cart/{cart}', [CartController::class, 'remove'])->name('cart.remove-item');
    
    // Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    
    // Checkout
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout.index');
    Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');
    
    // Profile & Addresses
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Static Pages
    Route::view('/how-to-shop', 'pages.how-to-shop')->name('how-to-shop');
    Route::view('/payment-info', 'pages.payment-info')->name('payment-info');
    Route::view('/shipping-info', 'pages.shipping-info')->name('shipping-info');
    Route::view('/faq', 'pages.faq')->name('faq');
    Route::view('/contact', 'pages.contact')->name('contact');
    Route::view('/terms', 'pages.terms')->name('terms');
});

require __DIR__.'/auth.php';
