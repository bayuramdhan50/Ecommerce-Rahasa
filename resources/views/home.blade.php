@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gray-900">
        <div class="absolute inset-0">
            <img src="{{ asset('img/hero-bg.jpg') }}" alt="Hero background" class="w-full h-full object-cover opacity-50">
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">Rahasa</h1>
            <p class="mt-6 text-xl text-gray-300 max-w-3xl">
                Temukan berbagai produk berkualitas dengan harga terbaik
            </p>
            <div class="mt-10">
                <a href="{{ route('products.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    Lihat Produk
                </a>
            </div>
        </div>
    </div>

    <!-- Featured Products Section -->
    @if($featuredProducts->isNotEmpty())
        <div class="bg-white">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Produk Unggulan</h2>
                <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach($featuredProducts as $product)
                        <div class="group relative">
                            <div class="w-full aspect-w-1 aspect-h-1 rounded-lg overflow-hidden bg-gray-200">
                                <img
                                    src="{{ $product->image_url ?: asset('img/placeholder.jpg') }}"
                                    alt="{{ $product->name }}"
                                    class="w-full h-full object-center object-cover group-hover:opacity-75"
                                >
                                @if($product->discount > 0)
                                    <div class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded text-sm font-medium">
                                        -{{ $product->discount }}%
                                    </div>
                                @endif
                            </div>
                            <div class="mt-4">
                                <h3 class="text-sm text-gray-700">
                                    <a href="{{ route('products.show', $product) }}">
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">{{ $product->category->name }}</p>
                                <div class="mt-2 flex items-center justify-between">
                                    <div>
                                        @if($product->discount > 0)
                                            <span class="text-sm text-gray-500 line-through">
                                                Rp {{ number_format($product->original_price, 0, ',', '.') }}
                                            </span>
                                            <span class="ml-2 text-sm font-medium text-gray-900">
                                                Rp {{ number_format($product->price, 0, ',', '.') }}
                                            </span>
                                        @else
                                            <span class="text-sm font-medium text-gray-900">
                                                Rp {{ number_format($product->price, 0, ',', '.') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Categories Section -->
    @if($categories->isNotEmpty())
        <div class="bg-gray-50">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Kategori</h2>
                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($categories as $category)
                        <a
                            href="{{ route('products.by-category', $category) }}"
                            class="relative rounded-lg overflow-hidden group"
                        >
                            <div class="w-full aspect-w-3 aspect-h-2">
                                <img
                                    src="{{ $category->image_url ?: asset('img/category-placeholder.jpg') }}"
                                    alt="{{ $category->name }}"
                                    class="w-full h-full object-center object-cover group-hover:opacity-75"
                                >
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black p-4">
                                <h3 class="text-lg font-medium text-white">{{ $category->name }}</h3>
                                <p class="text-sm text-gray-300">{{ $category->products_count }} Produk</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Latest Products Section -->
    @if($latestProducts->isNotEmpty())
        <div class="bg-white">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Produk Terbaru</h2>
                <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach($latestProducts as $product)
                        <div class="group relative">
                            <div class="w-full aspect-w-1 aspect-h-1 rounded-lg overflow-hidden bg-gray-200">
                                <img
                                    src="{{ $product->image_url ?: asset('img/placeholder.jpg') }}"
                                    alt="{{ $product->name }}"
                                    class="w-full h-full object-center object-cover group-hover:opacity-75"
                                >
                            </div>
                            <div class="mt-4">
                                <h3 class="text-sm text-gray-700">
                                    <a href="{{ route('products.show', $product) }}">
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">{{ $product->category->name }}</p>
                                <p class="mt-1 text-sm font-medium text-gray-900">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Features Section -->
    <div class="bg-gray-50">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-y-12 gap-x-6 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Fast Shipping -->
                <div class="text-center">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white mx-auto">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                    </div>
                    <h3 class="mt-6 text-lg font-medium text-gray-900">Pengiriman Cepat</h3>
                    <p class="mt-2 text-sm text-gray-500">
                        Pengiriman cepat ke seluruh Indonesia dengan berbagai pilihan kurir
                    </p>
                </div>

                <!-- Secure Payment -->
                <div class="text-center">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white mx-auto">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="mt-6 text-lg font-medium text-gray-900">Pembayaran Aman</h3>
                    <p class="mt-2 text-sm text-gray-500">
                        Transaksi aman dengan berbagai metode pembayaran
                    </p>
                </div>

                <!-- Customer Service -->
                <div class="text-center">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white mx-auto">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="mt-6 text-lg font-medium text-gray-900">Layanan Pelanggan</h3>
                    <p class="mt-2 text-sm text-gray-500">
                        Dukungan pelanggan 24/7 untuk membantu Anda
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
