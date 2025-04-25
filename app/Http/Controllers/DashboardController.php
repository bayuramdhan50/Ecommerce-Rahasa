<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\StockRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            return $this->adminDashboard();
        } elseif ($user->hasRole('store')) {
            return $this->storeDashboard();
        } elseif ($user->hasRole('warehouse')) {
            return $this->warehouseDashboard();
        }

        // Default customer dashboard
        $orders = $user->orders()
            ->with(['items.product', 'shipping'])
            ->latest()
            ->get();

        $recentOrders = $orders->take(5);

        return view('dashboard', [
            'orders' => $orders,
            'recentOrders' => $recentOrders,
        ]);
    }

    protected function adminDashboard()
    {
        $totalUsers = User::count();
        $totalRevenue = Order::where('status', 'completed')->sum('total');
        $totalProducts = Product::count();
        $totalOrders = Order::count();

        $recentOrders = Order::with(['user', 'items.product'])
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalRevenue' => $totalRevenue,
            'totalProducts' => $totalProducts,
            'totalOrders' => $totalOrders,
            'recentOrders' => $recentOrders
        ]);
    }

    protected function storeDashboard()
    {
        $today = Carbon::today();
        
        $todaySales = Order::whereDate('created_at', $today)
            ->where('status', 'completed')
            ->sum('total');

        $pendingOrders = Order::where('status', 'pending')->count();
        
        $lowStockProducts = Product::where('stock', '<=', 10)->count();
        
        $totalStoreProducts = Product::count();

        $pendingOrdersList = Order::with(['user', 'items.product'])
            ->where('status', 'pending')
            ->latest()
            ->take(5)
            ->get();

        $lowStockProductsList = Product::with('category')
            ->where('stock', '<=', 10)
            ->latest()
            ->take(5)
            ->get();

        return view('store.dashboard', [
            'todaySales' => $todaySales,
            'pendingOrders' => $pendingOrders,
            'lowStockProducts' => $lowStockProducts,
            'totalStoreProducts' => $totalStoreProducts,
            'pendingOrdersList' => $pendingOrdersList,
            'lowStockProductsList' => $lowStockProductsList
        ]);
    }

    protected function warehouseDashboard()
    {
        $totalProducts = Product::count();
        $lowStockCount = Product::where('stock', '<=', 10)->count();
        $outOfStockCount = Product::where('stock', 0)->count();
        $pendingRequests = StockRequest::where('status', 'pending')->count();

        $recentStockRequests = StockRequest::with(['product', 'store'])
            ->latest()
            ->take(10)
            ->get();

        return view('warehouse.dashboard', [
            'totalProducts' => $totalProducts,
            'lowStockCount' => $lowStockCount,
            'outOfStockCount' => $outOfStockCount,
            'pendingRequests' => $pendingRequests,
            'recentStockRequests' => $recentStockRequests
        ]);
    }
}
