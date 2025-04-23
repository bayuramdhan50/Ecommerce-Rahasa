<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        // Dummy: tampilkan halaman checkout
        return Inertia::render('Order/Checkout', [
            // Data produk, alamat, ekspedisi, promo, dll
        ]);
    }
    public function store(Request $request)
    {
        // Dummy: proses simpan order
        // Validasi, simpan order, order item, update stok, dsb
        return redirect()->route('order.success');
    }
    public function success()
    {
        return Inertia::render('Order/Success');
    }
}
