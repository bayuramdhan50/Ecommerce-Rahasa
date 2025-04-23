<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class StoreController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Store/Dashboard');
    }
}
