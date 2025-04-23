<template>
  <div class="container mx-auto py-8">
    <div class="flex flex-col md:flex-row gap-8">
      <img :src="product.image_url" class="w-full md:w-1/3 h-64 object-cover rounded-2xl shadow" />
      <div>
        <h1 class="text-3xl font-bold mb-2">{{ product.name }}</h1>
        <p class="text-blue-600 font-bold text-xl mb-2">Rp{{ product.price.toLocaleString() }}</p>
        <p class="mb-4">Kategori: <span class="font-semibold">{{ product.category?.name }}</span></p>
        <p class="mb-4">{{ product.description }}</p>
        <inertia-link v-if="$page.props.auth.user" :href="route('order.checkout', { product: product.id })" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-xl shadow transition">Checkout</inertia-link>
      </div>
    </div>
  </div>
</template>
<script setup>
const props = defineProps({ product: Object })
</script>
