@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">Kategori</h1>

    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($categories as $category)
            <a
                href="{{ route('products.by-category', $category) }}"
                class="group relative rounded-lg overflow-hidden hover:opacity-75"
            >
                <div class="w-full h-80 bg-gray-200 aspect-w-3 aspect-h-2">
                    <img
                        src="{{ $category->image_url ?: asset('img/category-placeholder.jpg') }}"
                        alt="{{ $category->name }}"
                        class="w-full h-full object-center object-cover"
                    >
                </div>
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black p-6">
                    <h3 class="text-xl font-semibold text-white">{{ $category->name }}</h3>
                    <p class="mt-2 text-sm text-gray-300">{{ $category->products_count }} Produk</p>
                    @if($category->description)
                        <p class="mt-2 text-sm text-gray-300">{{ $category->description }}</p>
                    @endif
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
