@extends('layouts.app')

@section('title', 'Informasi Pengiriman')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Informasi Pengiriman</h1>
    
    <div class="prose max-w-none">
        <h2>Jasa Pengiriman</h2>
        <p>Kami bekerja sama dengan beberapa jasa pengiriman terpercaya:</p>
        <ul>
            <li>JNE (Regular, YES, OKE)</li>
            <li>J&T Express</li>
            <li>SiCepat (REG, BEST)</li>
            <li>Gosend (Same Day)</li>
            <li>Grab Express (Same Day)</li>
        </ul>

        <h2>Estimasi Pengiriman</h2>
        <p>Estimasi waktu pengiriman:</p>
        <ul>
            <li>JABODETABEK: 1-2 hari kerja</li>
            <li>Pulau Jawa: 2-4 hari kerja</li>
            <li>Luar Pulau Jawa: 4-7 hari kerja</li>
            <li>Same Day Delivery (khusus area tertentu): pengiriman di hari yang sama</li>
        </ul>

        <h2>Biaya Pengiriman</h2>
        <p>Biaya pengiriman dihitung berdasarkan:</p>
        <ul>
            <li>Berat paket</li>
            <li>Dimensi paket</li>
            <li>Lokasi pengiriman</li>
            <li>Jenis layanan pengiriman yang dipilih</li>
        </ul>

        <h2>Packing Barang</h2>
        <p>Kami memastikan barang Anda dikemas dengan aman:</p>
        <ul>
            <li>Bubble wrap untuk barang pecah belah</li>
            <li>Kardus double layer untuk elektronik</li>
            <li>Plastik waterproof untuk fashion items</li>
            <li>Packing kayu untuk barang bernilai tinggi</li>
        </ul>

        <h2>Tracking Pesanan</h2>
        <p>Anda dapat melacak pesanan melalui:</p>
        <ul>
            <li>Dashboard akun Rahasa</li>
            <li>Email notifikasi dengan nomor resi</li>
            <li>Website/aplikasi jasa pengiriman</li>
        </ul>

        <h2>Kebijakan Pengiriman</h2>
        <ul>
            <li>Pesanan akan diproses maksimal 1x24 jam setelah pembayaran dikonfirmasi</li>
            <li>Pengiriman dilakukan pada hari kerja (Senin-Jumat)</li>
            <li>Anda akan mendapat notifikasi saat pesanan dikirim</li>
            <li>Tracking number akan dikirim melalui email dan dashboard</li>
        </ul>
    </div>
</div>
@endsection
