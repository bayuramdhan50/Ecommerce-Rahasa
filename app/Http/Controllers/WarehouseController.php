<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class WarehouseController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Warehouse/Dashboard');
    }
}
