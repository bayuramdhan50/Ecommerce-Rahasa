@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
        <!-- Product Image -->
        <div class="flex flex-col">
            <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden">
                <img
                    src="{{ $product->image_url ?: asset('img/placeholder.jpg') }}"
                    alt="{{ $product->name }}"
                    class="w-full h-full object-center object-cover"
                >
            </div>
        </div>

        <!-- Product Info -->
        <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
            <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">{{ $product->name }}</h1>
            
            <!-- Price -->
            <div class="mt-3">
                <h2 class="sr-only">Product information</h2>
                <div class="flex items-center">
                    @if($product->discount > 0)
                        <div class="flex items-center">
                            <p class="text-3xl text-gray-900 font-bold">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </p>
                            <p class="ml-2 text-lg text-gray-500 line-through">
                                Rp {{ number_format($product->original_price, 0, ',', '.') }}
                            </p>
                            <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                Hemat {{ $product->discount }}%
                            </span>
                        </div>
                    @else
                        <p class="text-3xl text-gray-900 font-bold">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>
                    @endif
                </div>
            </div>

            <!-- Description -->
            <div class="mt-6">
                <h3 class="sr-only">Description</h3>
                <div class="text-base text-gray-700 space-y-6">
                    {!! $product->description !!}
                </div>
            </div>

            <!-- Add to Cart Form -->
            <form action="{{ route('cart.add') }}" method="POST" class="mt-6">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                
                <div class="flex items-center">
                    <span class="mr-3">Jumlah:</span>
                    <div class="flex items-center border border-gray-300 rounded-md">
                        <button
                            type="button"
                            class="p-2 text-gray-600 hover:text-gray-700"
                            onclick="decrementQuantity()"
                        >
                            <span class="sr-only">Kurangi jumlah</span>
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                            </svg>
                        </button>
                        <input
                            type="number"
                            name="quantity"
                            id="quantity"
                            value="1"
                            min="1"
                            class="w-16 text-center border-0 focus:ring-0"
                        >
                        <button
                            type="button"
                            class="p-2 text-gray-600 hover:text-gray-700"
                            onclick="incrementQuantity()"
                        >
                            <span class="sr-only">Tambah jumlah</span>
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="mt-8 flex flex-col space-y-4">
                    <button
                        type="submit"
                        class="w-full bg-blue-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                    >
                        Tambah ke Keranjang
                    </button>
                    
                    <a
                        href="{{ route('checkout.index', ['product_id' => $product->id]) }}"
                        class="w-full bg-gray-800 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                    >
                        Beli Sekarang
                    </a>
                </div>
            </form>

            <!-- Product Details -->
            <section class="mt-12 pt-12 border-t border-gray-200">
                <h3 class="text-sm font-medium text-gray-900">Detail Produk</h3>
                <div class="mt-4 prose prose-sm text-gray-500">
                    <ul role="list">
                        <li>Kategori: {{ $product->category->name }}</li>
                        <li>Berat: {{ $product->weight }} gram</li>
                        <li>Stok: {{ $product->stock }} unit</li>
                        @if($product->specifications)
                            @foreach($product->specifications as $spec)
                                <li>{{ $spec }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </section>
        </div>
    </div>

    <!-- Related Products -->
    @if($relatedProducts->isNotEmpty())
        <section class="mt-16 sm:mt-24">
            <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Produk Terkait</h2>
            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($relatedProducts as $relatedProduct)
                    <div class="group relative">
                        <div class="w-full aspect-w-1 aspect-h-1 rounded-lg overflow-hidden bg-gray-200">
                            <img
                                src="{{ $relatedProduct->image_url ?: asset('img/placeholder.jpg') }}"
                                alt="{{ $relatedProduct->name }}"
                                class="w-full h-full object-center object-cover group-hover:opacity-75"
                            >
                        </div>
                        <div class="mt-4">
                            <h3 class="text-sm text-gray-700">
                                <a href="{{ route('products.show', $relatedProduct) }}">
                                    {{ $relatedProduct->name }}
                                </a>
                            </h3>
                            <p class="mt-1 text-sm font-medium text-gray-900">
                                Rp {{ number_format($relatedProduct->price, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
</div>
@endsection

@push('scripts')
<script>
    function incrementQuantity() {
        const input = document.getElementById('quantity');
        input.value = parseInt(input.value) + 1;
    }

    function decrementQuantity() {
        const input = document.getElementById('quantity');
        const newValue = parseInt(input.value) - 1;
        if (newValue >= 1) {
            input.value = newValue;
        }
    }
</script>
@endpush
