<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category')->latest();

        if ($request->category) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('id', $request->category);
            });
        }

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->paginate(12);
        $categories = Category::all();

        return Inertia::render('Products/Index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function show(Product $product)
    {
        $product->load('category');
        
        return Inertia::render('Products/Show', [
            'product' => $product
        ]);
    }
}
