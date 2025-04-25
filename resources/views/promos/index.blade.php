@extends('layouts.app')

@section('title', 'Promo')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">Promo yang Sedang Berlangsung</h1>

    @if($activePromos->isNotEmpty())
        <div class="mt-6 grid grid-cols-1 gap-y-6 sm:grid-cols-2 lg:grid-cols-3 gap-x-6">
            @foreach($activePromos as $promo)
                <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
                    @if($promo->image_url)
                        <img src="{{ $promo->image_url }}" alt="{{ $promo->name }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-medium text-gray-900">{{ $promo->name }}</h3>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Aktif
                            </span>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">{{ $promo->description }}</p>
                        <div class="mt-4">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Kode Promo:</span>
                                <span class="font-mono font-medium text-blue-600">{{ $promo->code }}</span>
                            </div>
                            <div class="mt-1 flex items-center justify-between text-sm">
                                <span class="text-gray-500">Minimal Pembelian:</span>
                                <span class="font-medium">Rp {{ number_format($promo->min_purchase, 0, ',', '.') }}</span>
                            </div>
                            <div class="mt-1 flex items-center justify-between text-sm">
                                <span class="text-gray-500">Diskon:</span>
                                <span class="font-medium">
                                    @if($promo->discount_type === 'percentage')
                                        {{ $promo->discount_value }}%
                                    @else
                                        Rp {{ number_format($promo->discount_value, 0, ',', '.') }}
                                    @endif
                                </span>
                            </div>
                            <div class="mt-1 flex items-center justify-between text-sm">
                                <span class="text-gray-500">Berakhir:</span>
                                <span class="font-medium">{{ $promo->end_date->format('d M Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="mt-4 text-gray-500">Tidak ada promo yang sedang berlangsung.</p>
    @endif

    <h2 class="mt-16 text-2xl font-extrabold tracking-tight text-gray-900">Produk Diskon</h2>
    
    @if($discountedProducts->isNotEmpty())
        <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($discountedProducts as $product)
                <div class="group relative">
                    <div class="w-full min-h-80 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                        <img
                            src="{{ $product->image_url ?: asset('img/placeholder.jpg') }}"
                            alt="{{ $product->name }}"
                            class="w-full h-full object-center object-cover lg:w-full lg:h-full"
                        >
                        <div class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded text-sm font-medium">
                            -{{ $product->discount }}%
                        </div>
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="{{ route('products.show', $product) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $product->name }}
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">{{ $product->category->name }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="mt-1 text-sm text-gray-500 line-through">Rp {{ number_format($product->original_price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $discountedProducts->links() }}
        </div>
    @else
        <p class="mt-4 text-gray-500">Tidak ada produk yang sedang diskon.</p>
    @endif
</div>
@endsection
