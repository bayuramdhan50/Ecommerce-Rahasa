<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = auth()->user()->cart()
            ->with('product.category')
            ->get();

        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($validated['product_id']);

        // Check if product already in cart
        $cartItem = auth()->user()->cart()
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            // Update quantity if product exists
            $cartItem->update([
                'quantity' => $cartItem->quantity + $validated['quantity']
            ]);
        } else {
            // Add new item to cart
            auth()->user()->cart()->create([
                'product_id' => $product->id,
                'quantity' => $validated['quantity'],
                'price' => $product->price
            ]);
        }

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }

    public function updateQuantity(Request $request, Cart $cart)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart->update([
            'quantity' => $validated['quantity']
        ]);

        return back()->with('success', 'Jumlah produk berhasil diperbarui');
    }

    public function remove(Cart $cart)
    {
        $cart->delete();

        return back()->with('success', 'Produk berhasil dihapus dari keranjang');
    }
}
