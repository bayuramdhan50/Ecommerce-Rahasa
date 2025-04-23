<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->cart()
            ->with('products')
            ->latest()
            ->first();

        return Inertia::render('Cart/Index', [
            'cart' => $cart
        ]);
    }

    public function addItem(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = auth()->user()->cart()->firstOrCreate([
            'status' => 'active'
        ]);

        $cart->products()->attach($request->product_id, [
            'quantity' => $request->quantity
        ]);

        return back()->with('message', 'Product added to cart successfully');
    }

    public function removeItem(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $cart = auth()->user()->cart()->where('status', 'active')->first();
        
        if ($cart) {
            $cart->products()->detach($request->product_id);
        }

        return back()->with('message', 'Product removed from cart successfully');
    }

    public function updateQuantity(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = auth()->user()->cart()->where('status', 'active')->first();
        
        if ($cart) {
            $cart->products()->updateExistingPivot($request->product_id, [
                'quantity' => $request->quantity
            ]);
        }

        return back()->with('message', 'Cart updated successfully');
    }
}
