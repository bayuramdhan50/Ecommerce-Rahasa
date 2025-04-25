@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Filter Section -->
    <div class="mb-8">
        <form action="{{ route('products.index') }}" method="GET" class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <div>
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari produk..."
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                >
            </div>
            <div>
                <select
                    name="category"
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                >
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <select
                    name="sort"
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                >
                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                    <option value="price-low" {{ request('sort') == 'price-low' ? 'selected' : '' }}>Harga Terendah</option>
                    <option value="price-high" {{ request('sort') == 'price-high' ? 'selected' : '' }}>Harga Tertinggi</option>
                </select>
            </div>
        </form>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4">
        @forelse($products as $product)
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
                        <div class="text-sm text-gray-500">
                            Stok: {{ $product->stock }}
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="w-full bg-blue-600 border border-transparent rounded-md py-2 px-4 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Tambah ke Keranjang
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada produk</h3>
                <p class="mt-1 text-sm text-gray-500">
                    Belum ada produk yang tersedia saat ini.
                </p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto-submit form when filters change
    document.querySelectorAll('select[name="category"], select[name="sort"]').forEach(select => {
        select.addEventListener('change', () => {
            select.closest('form').submit();
        });
    });
</script>
@endpush
