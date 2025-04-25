<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Product;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index()
    {
        $activePromos = Promo::where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->orderBy('end_date')
            ->get();

        $discountedProducts = Product::where('discount', '>', 0)
            ->with('category')
            ->orderBy('discount', 'desc')
            ->paginate(12);

        return view('promos.index', compact('activePromos', 'discountedProducts'));
    }
}
