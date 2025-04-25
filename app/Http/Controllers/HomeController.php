<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get featured products
        $featuredProducts = Product::with('category')
            ->where('featured', true)
            ->orWhere('discount', '>', 0)
            ->latest()
            ->take(8)
            ->get();

        // Get latest products
        $latestProducts = Product::with('category')
            ->latest()
            ->take(8)
            ->get();        // Get categories with their products count
        $categories = Category::withCount('products')
            ->whereHas('products')
            ->take(6)
            ->get();

        return view('home', compact('featuredProducts', 'latestProducts', 'categories'));
    }
}
