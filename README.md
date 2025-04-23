# Ecommerce Rahasa

Aplikasi eCommerce modern berbasis Laravel 12, PostgreSQL, Inertia.js, dan Vue.js. Mendukung multi-role (Admin, User, Toko, Gudang) dengan fitur checkout, promo, ekspedisi, dan manajemen produk.

## ✨ Fitur Utama
- **Role & Permission**: Admin, User, Toko, Gudang (Spatie Laravel Permission)
- **Autentikasi**: Login, register, multi-role
- **Produk & Kategori**: CRUD produk, kategori, detail produk
- **Checkout**: Alamat, ekspedisi (JNE, J&T, POS), ongkir, kode promo, ringkasan pesanan
- **Manajemen**:
  - Admin: CRUD semua data
  - Toko: Kelola produk sendiri, riwayat penjualan
  - Gudang: Proses permintaan stok
- **Notifikasi**: Order via Laravel Notification/Mail
- **SPA Modern**: Inertia.js + Vue.js, Tailwind CSS, Heroicons
- **UI/UX**: Desain modern, responsif, warna biru, oranye/hijau, font Inter/Poppins

## 🛠️ Teknologi
- Laravel 12
- PostgreSQL
- Laravel Breeze + Inertia.js + Vue.js
- Tailwind CSS + Heroicons
- Spatie Laravel Permission
- Laravel Notification/Mail

## 🚀 Cara Menjalankan
```bash
composer install
npm install
php artisan migrate --seed
php artisan serve
npm run dev
```

## 👤 Akun Dummy
- **Admin**: admin@demo.com / password
- **User**: user@demo.com / password
- **Toko**: toko@demo.com / password
- **Gudang**: gudang@demo.com / password

## 📁 Struktur Folder (Ringkasan)
```
app/
  Models/
  Http/Controllers/
  ...
database/
  migrations/
  seeders/
resources/
  js/
    Pages/
    Components/
    Layouts/
  css/
routes/
  web.php
  auth.php
```

## 🖼️ Preview UI
_Screenshot coming soon_

## 📄 Lisensi
MIT
