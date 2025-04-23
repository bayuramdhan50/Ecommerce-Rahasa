<script setup>
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    products: {
        type: Array,
        default: () => [],
    },
    categories: {
        type: Array,
        default: () => [],
    },
});
</script>

<template>
    <Head title="Products" />

    <AppLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Category Filter -->
                <div class="mb-6">
                    <div class="flex space-x-4">
                        <button
                            v-for="category in categories"
                            :key="category.id"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50"
                        >
                            {{ category.name }}
                        </button>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    <div v-for="product in products" :key="product.id" class="bg-white overflow-hidden shadow-sm rounded-lg">
                        <div class="aspect-w-1 aspect-h-1">
                            <img :src="product.image_url" :alt="product.name" class="object-cover w-full h-48">
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold">{{ product.name }}</h3>
                            <p class="text-gray-600 mt-1">{{ product.description }}</p>
                            <div class="mt-4 flex justify-between items-center">
                                <span class="text-lg font-bold">Rp {{ product.price }}</span>
                                <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
