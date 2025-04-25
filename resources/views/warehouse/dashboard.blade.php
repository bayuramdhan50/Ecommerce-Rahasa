@extends('layouts.app')

@section('title', 'Dashboard Gudang')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Welcome Section -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-800">
                    Dashboard Gudang
                </h2>
                <p class="mt-1 text-gray-600">
                    Kelola inventori dan permintaan stok di sini.
                </p>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 gap-6 mb-6 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Total Products -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">
                                {{ $totalProducts }}
                            </h3>
                            <p class="text-sm text-gray-500">Total Produk</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Low Stock -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-red-500 rounded-md p-3">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">
                                {{ $lowStockCount }}
                            </h3>
                            <p class="text-sm text-gray-500">Stok Menipis</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">
                                {{ $pendingRequests }}
                            </h3>
                            <p class="text-sm text-gray-500">Request Menunggu</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Out of Stock -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-gray-500 rounded-md p-3">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">
                                {{ $outOfStockCount }}
                            </h3>
                            <p class="text-sm text-gray-500">Stok Habis</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stock Requests -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Permintaan Stok Terbaru
                    </h3>
                    <a href="{{ route('warehouse.stock-requests.index') }}" class="text-sm text-blue-600 hover:text-blue-900">
                        Lihat Semua
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID Request
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Toko
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Produk
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Jumlah
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($recentStockRequests as $request)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        #{{ $request->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $request->store->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" src="{{ $request->product->image_url }}" alt="{{ $request->product->name }}">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $request->product->name }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    SKU: {{ $request->product->sku }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $request->quantity }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            @if($request->status === 'approved') bg-green-100 text-green-800
                                            @elseif($request->status === 'rejected') bg-red-100 text-red-800
                                            @else bg-yellow-100 text-yellow-800
                                            @endif">
                                            {{ ucfirst($request->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        @if($request->status === 'pending')
                                            <a href="{{ route('warehouse.stock-requests.process', $request) }}" class="text-blue-600 hover:text-blue-900">
                                                Proses
                                            </a>
                                        @else
                                            <a href="{{ route('warehouse.stock-requests.show', $request) }}" class="text-blue-600 hover:text-blue-900">
                                                Detail
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                        Tidak ada permintaan stok
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Stock Management -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Manajemen Stok</h3>
                    <div class="space-y-4">
                        <a href="{{ route('warehouse.inventory.index') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-blue-50 rounded-md">
                            Lihat Inventori
                        </a>
                        <a href="{{ route('warehouse.stock-adjustment.create') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-blue-50 rounded-md">
                            Penyesuaian Stok
                        </a>
                        <a href="{{ route('warehouse.transfers.create') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-blue-50 rounded-md">
                            Transfer Stok
                        </a>
                    </div>
                </div>
            </div>

            <!-- Procurement -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Pengadaan</h3>
                    <div class="space-y-4">
                        <a href="{{ route('warehouse.purchase-orders.create') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-blue-50 rounded-md">
                            Buat PO Baru
                        </a>
                        <a href="{{ route('warehouse.purchase-orders.index') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-blue-50 rounded-md">
                            Daftar PO
                        </a>
                        <a href="{{ route('warehouse.suppliers.index') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-blue-50 rounded-md">
                            Kelola Supplier
                        </a>
                    </div>
                </div>
            </div>

            <!-- Reports -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Laporan</h3>
                    <div class="space-y-4">
                        <a href="{{ route('warehouse.reports.stock-movement') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-blue-50 rounded-md">
                            Pergerakan Stok
                        </a>
                        <a href="{{ route('warehouse.reports.stock-value') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-blue-50 rounded-md">
                            Nilai Inventori
                        </a>
                        <a href="{{ route('warehouse.reports.stock-aging') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-blue-50 rounded-md">
                            Umur Stok
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
