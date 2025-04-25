<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')
            ->whereHas('products')
            ->orderBy('name')
            ->get();

        return view('categories.index', compact('categories'));
    }
}
