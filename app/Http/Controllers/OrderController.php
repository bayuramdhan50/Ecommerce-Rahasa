<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Address;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function checkout()
    {
        $cartItems = auth()->user()->cart()
            ->with('product.category')
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('products.index')
                ->with('error', 'Keranjang belanja kosong');
        }

        return Inertia::render('Checkout', [
            'cartItems' => $cartItems,
            'addresses' => auth()->user()->addresses,
            'shippingMethods' => Shipping::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'address_id' => 'required_without:new_address|exists:addresses,id',
            'shipping_method_id' => 'required|exists:shippings,id',
            'notes' => 'nullable|string',
            'new_address' => 'required_without:address_id|array',
            'new_address.name' => 'required_with:new_address|string',
            'new_address.phone' => 'required_with:new_address|string',
            'new_address.address' => 'required_with:new_address|string',
            'new_address.city' => 'required_with:new_address|string',
            'new_address.postal_code' => 'required_with:new_address|string',
        ]);

        // Begin transaction
        \DB::beginTransaction();

        try {
            // Create new address if provided
            if (isset($validated['new_address'])) {
                $address = auth()->user()->addresses()->create($validated['new_address']);
                $addressId = $address->id;
            } else {
                $addressId = $validated['address_id'];
            }

            // Get cart items
            $cartItems = auth()->user()->cart()->with('product')->get();
            
            // Calculate totals
            $subtotal = $cartItems->sum(function ($item) {
                return $item->price * $item->quantity;
            });
            
            $shipping = Shipping::find($validated['shipping_method_id']);
            $total = $subtotal + $shipping->cost;

            // Create order
            $order = Order::create([
                'user_id' => auth()->id(),
                'address_id' => $addressId,
                'shipping_id' => $validated['shipping_method_id'],
                'subtotal' => $subtotal,
                'shipping_cost' => $shipping->cost,
                'total' => $total,
                'notes' => $validated['notes'],
                'status' => 'pending'
            ]);

            // Create order items
            foreach ($cartItems as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price
                ]);
            }

            // Clear cart
            auth()->user()->cart()->delete();

            \DB::commit();

            return redirect()->route('orders.show', $order)
                ->with('success', 'Pesanan berhasil dibuat');

        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error', 'Terjadi kesalahan saat membuat pesanan');
        }
    }

    public function show(Order $order)
    {
        $order->load(['items.product', 'address', 'shipping']);

        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        return Inertia::render('Orders/Show', [
            'order' => $order
        ]);
    }
}
