<script setup>
import { Head } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
    cart: {
        type: Object,
        required: true
    }
});

const updateQuantity = (productId, quantity) => {
    router.post(route('cart.update-quantity'), {
        product_id: productId,
        quantity: quantity
    }, { preserveScroll: true });
};

const removeItem = (productId) => {
    router.post(route('cart.remove-item'), {
        product_id: productId
    }, { preserveScroll: true });
};

const calculateTotal = () => {
    return props.cart.products.reduce((total, product) => {
        return total + (product.price * product.pivot.quantity);
    }, 0);
};
</script>

<template>
    <Head title="Shopping Cart" />

    <AppLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold mb-6">Shopping Cart</h2>

                        <div v-if="cart && cart.products && cart.products.length > 0">
                            <!-- Cart Items -->
                            <div class="space-y-4">
                                <div v-for="product in cart.products" :key="product.id" 
                                    class="flex items-center justify-between border-b pb-4">
                                    <div class="flex items-center space-x-4">
                                        <img :src="product.image_url" :alt="product.name" 
                                            class="w-16 h-16 object-cover rounded">
                                        <div>
                                            <h3 class="font-medium">{{ product.name }}</h3>
                                            <p class="text-gray-600">Rp {{ product.price }}</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center space-x-4">
                                        <div class="flex items-center border rounded">
                                            <button 
                                                @click="updateQuantity(product.id, product.pivot.quantity - 1)"
                                                class="px-3 py-1 border-r"
                                                :disabled="product.pivot.quantity <= 1"
                                            >-</button>
                                            <span class="px-4">{{ product.pivot.quantity }}</span>
                                            <button 
                                                @click="updateQuantity(product.id, product.pivot.quantity + 1)"
                                                class="px-3 py-1 border-l"
                                            >+</button>
                                        </div>

                                        <button @click="removeItem(product.id)" 
                                            class="text-red-600 hover:text-red-800">
                                            Remove
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Cart Summary -->
                            <div class="mt-8 border-t pt-6">
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-medium">Total:</span>
                                    <span class="text-xl font-bold">Rp {{ calculateTotal() }}</span>
                                </div>

                                <div class="mt-6">
                                    <Link
                                        :href="route('checkout')"
                                        class="w-full bg-blue-600 text-white py-3 px-4 rounded-md text-center hover:bg-blue-700"
                                    >
                                        Proceed to Checkout
                                    </Link>
                                </div>
                            </div>
                        </div>
                        <div v-else class="text-center py-12">
                            <p class="text-gray-600">Your cart is empty</p>
                            <Link
                                :href="route('products.index')"
                                class="mt-4 inline-block text-blue-600 hover:text-blue-800"
                            >
                                Continue Shopping
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
