@extends('layouts.app')

@section('title', 'Cara Belanja')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Cara Belanja di Rahasa</h1>
    
    <div class="prose max-w-none">
        <h2>1. Cari Produk</h2>
        <p>Anda dapat mencari produk yang diinginkan melalui:</p>
        <ul>
            <li>Menggunakan kolom pencarian</li>
            <li>Menjelajahi kategori produk</li>
            <li>Melihat produk terbaru dan rekomendasi</li>
        </ul>

        <h2>2. Tambahkan ke Keranjang</h2>
        <p>Setelah menemukan produk yang diinginkan:</p>
        <ul>
            <li>Pilih jumlah yang diinginkan</li>
            <li>Klik tombol "Tambah ke Keranjang"</li>
            <li>Atau klik "Beli Sekarang" untuk langsung ke checkout</li>
        </ul>

        <h2>3. Checkout</h2>
        <p>Proses checkout meliputi:</p>
        <ul>
            <li>Memilih alamat pengiriman</li>
            <li>Memilih metode pengiriman</li>
            <li>Memilih metode pembayaran</li>
            <li>Mengisi catatan pesanan (opsional)</li>
        </ul>

        <h2>4. Pembayaran</h2>
        <p>Anda dapat melakukan pembayaran melalui:</p>
        <ul>
            <li>Transfer bank</li>
            <li>Virtual account</li>
            <li>E-wallet</li>
            <li>Kartu kredit</li>
        </ul>

        <h2>5. Pengiriman</h2>
        <p>Setelah pembayaran dikonfirmasi:</p>
        <ul>
            <li>Pesanan akan diproses</li>
            <li>Anda akan mendapat notifikasi status pesanan</li>
            <li>Nomor resi akan dikirimkan melalui email</li>
        </ul>
    </div>
</div>
@endsection
