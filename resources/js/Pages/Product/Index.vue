<template>
  <div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Daftar Produk</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div v-for="product in products.data" :key="product.id" class="bg-white rounded-2xl shadow p-4">
        <img :src="product.image_url" class="w-full h-40 object-cover rounded-xl mb-2" />
        <h2 class="font-semibold text-lg">{{ product.name }}</h2>
        <p class="text-blue-600 font-bold">Rp{{ product.price.toLocaleString() }}</p>
        <inertia-link :href="route('products.show', product.id)" class="mt-2 inline-block text-sm text-white bg-blue-600 hover:bg-blue-700 rounded-lg px-4 py-2 transition">Lihat Detail</inertia-link>
      </div>
    </div>
  </div>
</template>
<script setup>
const props = defineProps({ products: Object })
</script>
