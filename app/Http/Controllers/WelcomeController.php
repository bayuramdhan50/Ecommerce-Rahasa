<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    public function index()
    {
        // Get featured products
        $featuredProducts = Product::with('category')
            ->latest()
            ->take(8)
            ->get();

        // Get all categories
        $categories = Category::all();

        // Render the Home page with data
        return Inertia::render('Home', [
            'featuredProducts' => $featuredProducts,
            'categories' => $categories,
        ]);
    }
}
