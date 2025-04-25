<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category')
            ->when($request->category, function($query, $category) {
                $query->where('category_id', $category);
            })
            ->when($request->search, function($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->when($request->sort, function($query, $sort) {
                switch($sort) {
                    case 'price-low':
                        $query->orderBy('price', 'asc');
                        break;
                    case 'price-high':
                        $query->orderBy('price', 'desc');
                        break;
                    case 'newest':
                        $query->latest();
                        break;
                }
            })
            ->paginate(12)
            ->withQueryString();

        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        $product->load('category');
        
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function byCategory(Category $category)
    {
        $products = $category->products()
            ->with('category')
            ->paginate(12);

        $categories = Category::all();

        return view('products.index', [
            'products' => $products,
            'categories' => $categories,
            'currentCategory' => $category
        ]);
    }
}
