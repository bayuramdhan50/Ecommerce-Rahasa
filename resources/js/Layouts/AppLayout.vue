<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <Link :href="route('Welcome')" class="text-xl font-bold">
                            Rahasa
                        </Link>
                    </div>
                </div>
            </div>
        </nav>

        <main>
            <slot />
        </main>
    </div>
</template>
