@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-2xl font-bold text-gray-900">Keranjang Belanja</h1>

    @if($cartItems->isNotEmpty())
        <div class="mt-8 lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start">
            <div class="lg:col-span-7">
                @foreach($cartItems as $item)
                    <div class="flex py-6 border-b border-gray-200">
                        <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                            <img
                                src="{{ $item->product->image_url ?: asset('img/placeholder.jpg') }}"
                                alt="{{ $item->product->name }}"
                                class="h-full w-full object-cover object-center"
                            >
                        </div>

                        <div class="ml-4 flex flex-1 flex-col">
                            <div>
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                    <h3>
                                        <a href="{{ route('products.show', $item->product) }}">
                                            {{ $item->product->name }}
                                        </a>
                                    </h3>
                                    <p class="ml-4">
                                        Rp {{ number_format($item->price, 0, ',', '.') }}
                                    </p>
                                </div>
                                <p class="mt-1 text-sm text-gray-500">
                                    {{ $item->product->category->name }}
                                </p>
                            </div>
                            <div class="flex flex-1 items-end justify-between text-sm">
                                <form action="{{ route('cart.update-quantity', $item) }}" method="POST" class="flex items-center">
                                    @csrf
                                    @method('PUT')
                                    <div class="flex items-center border border-gray-300 rounded-md">
                                        <button
                                            type="button"
                                            class="p-2 text-gray-600 hover:text-gray-700"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown(); this.closest('form').submit();"
                                        >
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                            </svg>
                                        </button>
                                        <input
                                            type="number"
                                            name="quantity"
                                            value="{{ $item->quantity }}"
                                            min="1"
                                            class="w-12 text-center border-0 focus:ring-0"
                                            onchange="this.closest('form').submit()"
                                        >
                                        <button
                                            type="button"
                                            class="p-2 text-gray-600 hover:text-gray-700"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp(); this.closest('form').submit();"
                                        >
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                        </button>
                                    </div>
                                </form>

                                <form action="{{ route('cart.remove-item', $item) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="font-medium text-red-600 hover:text-red-500"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus item ini dari keranjang?')"
                                    >
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-16 rounded-lg bg-gray-50 px-4 py-6 sm:p-6 lg:col-span-5 lg:mt-0 lg:p-8">
                <h2 class="text-lg font-medium text-gray-900">Ringkasan Pesanan</h2>
                
                <div class="mt-6 space-y-4">
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-gray-600">Subtotal</p>
                        <p class="text-sm font-medium text-gray-900">
                            Rp {{ number_format($cartItems->sum(fn($item) => $item->price * $item->quantity), 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-gray-600">Pengiriman</p>
                        <p class="text-sm font-medium text-gray-900">
                            Rp {{ number_format(20000, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="flex items-center justify-between border-t border-gray-200 pt-4">
                        <p class="text-base font-medium text-gray-900">Total</p>
                        <p class="text-base font-medium text-gray-900">
                            Rp {{ number_format($cartItems->sum(fn($item) => $item->price * $item->quantity) + 20000, 0, ',', '.') }}
                        </p>
                    </div>
                </div>

                <div class="mt-6">
                    <a
                        href="{{ route('checkout.index') }}"
                        class="w-full flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-blue-700"
                    >
                        Lanjut ke Pembayaran
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-12">
            <svg
                class="mx-auto h-12 w-12 text-gray-400"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">Keranjang Kosong</h3>
            <p class="mt-1 text-sm text-gray-500">
                Mulailah berbelanja untuk menambahkan produk ke keranjang
            </p>
            <div class="mt-6">
                <a
                    href="{{ route('products.index') }}"
                    class="inline-flex items-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700"
                >
                    Lihat Produk
                </a>
            </div>
        </div>
    @endif
</div>
@endsection
