<template>
  <div>
    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
    <div v-if="notifications.length" class="mb-6">
      <h2 class="font-semibold mb-2">Notifikasi Real-time</h2>
      <ul>
        <li v-for="notif in notifications" :key="notif.id" class="bg-blue-50 border-l-4 border-blue-500 p-3 mb-2 rounded">
          {{ notif.data.message }} <span class="text-xs text-gray-500">({{ notif.created_at }})</span>
        </li>
      </ul>
    </div>
    <p>Selamat datang di dashboard. Notifikasi real-time akan muncul di sini.</p>
  </div>
</template>
<script setup>
import { ref, onMounted } from 'vue';
const notifications = ref([]);

onMounted(() => {
  if (window.Echo && window.Laravel?.user) {
    window.Echo.private(`App.Models.User.${window.Laravel.user.id}`)
      .notification((notification) => {
        notifications.value.unshift(notification);
      });
  }
});
</script>
