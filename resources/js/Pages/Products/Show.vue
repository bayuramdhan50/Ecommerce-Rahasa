<script setup>
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue';

const props = defineProps({
    product: {
        type: Object,
        required: true,
    },
});

const quantity = ref(1);
</script>

<template>
    <Head :title="product.name" />

    <AppLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Product Image -->
                        <div class="aspect-w-1 aspect-h-1">
                            <img :src="product.image_url" :alt="product.name" class="object-cover w-full h-96 rounded-lg">
                        </div>

                        <!-- Product Details -->
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">{{ product.name }}</h1>
                            <div class="mt-4">
                                <span class="text-2xl font-bold text-gray-900">Rp {{ product.price }}</span>
                            </div>
                            <div class="mt-4">
                                <h2 class="text-sm font-medium text-gray-900">Description</h2>
                                <p class="mt-2 text-gray-600">{{ product.description }}</p>
                            </div>

                            <!-- Quantity Selector -->
                            <div class="mt-6">
                                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <button
                                        type="button"
                                        class="px-4 py-2 border border-gray-300 rounded-l-md"
                                        @click="quantity > 1 ? quantity-- : null"
                                    >
                                        -
                                    </button>
                                    <input
                                        type="number"
                                        v-model="quantity"
                                        min="1"
                                        class="block w-20 border-gray-300 text-center"
                                    >
                                    <button
                                        type="button"
                                        class="px-4 py-2 border border-gray-300 rounded-r-md"
                                        @click="quantity++"
                                    >
                                        +
                                    </button>
                                </div>
                            </div>

                            <!-- Add to Cart Button -->
                            <div class="mt-6">
                                <button
                                    type="button"
                                    class="w-full bg-blue-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                >
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
