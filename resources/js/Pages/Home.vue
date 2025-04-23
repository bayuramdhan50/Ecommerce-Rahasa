<template>
    <Head title="Rahasa - E-commerce Terpercaya" />

    <div class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">                            <Link :href="route('home')" class="text-2xl font-bold text-blue-600">
                                Rahasa
                            </Link>
                        </div>
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                            <Link 
                                :href="route('products.index')"
                                class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium text-gray-900 border-transparent hover:border-gray-300"
                            >
                                Produk
                            </Link>
                            <a href="#categories" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium text-gray-900 border-transparent hover:border-gray-300">
                                Kategori
                            </a>
                        </div>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:items-center">
                        <template v-if="$page.props.auth?.user">
                            <Link
                                :href="route('cart')"
                                class="p-2 text-gray-600 hover:text-gray-900"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </Link>
                        </template>
                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="text-sm text-gray-700 hover:text-gray-900 mr-4"
                            >
                                Masuk
                            </Link>
                            <Link
                                :href="route('register')"
                                class="text-sm text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md"
                            >
                                Daftar
                            </Link>
                        </template>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="relative bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto">
                <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                    <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                        <div class="sm:text-center lg:text-left">
                            <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                                <span class="block">Belanja Online</span>
                                <span class="block text-blue-600">Mudah & Terpercaya</span>
                            </h1>
                            <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                                Temukan berbagai produk berkualitas dengan harga terbaik. Pengiriman cepat dan pembayaran aman.
                            </p>
                            <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                                <div class="rounded-md shadow">
                                    <Link
                                        :href="route('products.index')"
                                        class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg md:px-10"
                                    >
                                        Mulai Belanja
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>

        <!-- Categories Section -->
        <div id="categories" class="bg-gray-50 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-extrabold tracking-tight text-gray-900 mb-8">Kategori Produk</h2>
                <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6">
                    <div v-for="category in categories" :key="category.id" class="group relative">
                        <div class="relative w-full h-40 bg-white rounded-lg overflow-hidden group-hover:opacity-75">
                            <img 
                                :src="category.image_url || '/img/placeholder.jpg'"
                                :alt="category.name"
                                class="w-full h-full object-center object-cover"
                            >
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700 text-center">{{ category.name }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Featured Products -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <h2 class="text-2xl font-extrabold tracking-tight text-gray-900 mb-8">Produk Unggulan</h2>
            <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4">
                <div v-for="product in featuredProducts" :key="product.id" class="group relative">
                    <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-lg overflow-hidden group-hover:opacity-75">
                        <img
                            :src="product.image_url || '/img/placeholder.jpg'"
                            :alt="product.name"
                            class="w-full h-full object-center object-cover"
                        >
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <Link :href="route('products.show', product.id)">
                                    {{ product.name }}
                                </Link>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">{{ product.category?.name }}</p>
                        </div>
                        <p class="text-sm font-medium text-gray-900">Rp {{ formatPrice(product.price) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="bg-gray-50 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-y-12 gap-x-6 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="text-center">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white mx-auto">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="mt-6 text-lg font-medium text-gray-900">Pengiriman Cepat</h3>
                        <p class="mt-2 text-base text-gray-500">Pengiriman cepat ke seluruh Indonesia</p>
                    </div>

                    <div class="text-center">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white mx-auto">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="mt-6 text-lg font-medium text-gray-900">Pembayaran Aman</h3>
                        <p class="mt-2 text-base text-gray-500">Transaksi aman dengan berbagai metode pembayaran</p>
                    </div>

                    <div class="text-center">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white mx-auto">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                            </svg>
                        </div>
                        <h3 class="mt-6 text-lg font-medium text-gray-900">Produk Berkualitas</h3>
                        <p class="mt-2 text-base text-gray-500">Jaminan kualitas untuk setiap produk</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    featuredProducts: {
        type: Array,
        default: () => [],
    },
    categories: {
        type: Array,
        default: () => [],
    }
});

const formatPrice = (price) => {
    return new Intl.NumberFormat('id-ID').format(price);
};
</script>
