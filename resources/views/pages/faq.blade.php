@extends('layouts.app')

@section('title', 'FAQ')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Frequently Asked Questions</h1>
    
    <div class="space-y-8">
        <!-- Pemesanan -->
        <div>
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Pemesanan</h2>
            <div class="space-y-4">
                <div>
                    <h3 class="font-medium text-gray-900">Bagaimana cara memesan di Rahasa?</h3>
                    <p class="mt-2 text-gray-600">
                        Pilih produk yang Anda inginkan, tambahkan ke keranjang, pilih metode pengiriman dan pembayaran, lalu checkout. Anda perlu login atau membuat akun terlebih dahulu untuk melakukan pemesanan.
                    </p>
                </div>
                <div>
                    <h3 class="font-medium text-gray-900">Apakah saya bisa mengubah pesanan yang sudah dibuat?</h3>
                    <p class="mt-2 text-gray-600">
                        Pesanan hanya bisa diubah sebelum pembayaran dilakukan. Setelah pembayaran dikonfirmasi, pesanan tidak dapat diubah.
                    </p>
                </div>
            </div>
        </div>

        <!-- Pembayaran -->
        <div>
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Pembayaran</h2>
            <div class="space-y-4">
                <div>
                    <h3 class="font-medium text-gray-900">Metode pembayaran apa saja yang tersedia?</h3>
                    <p class="mt-2 text-gray-600">
                        Kami menerima pembayaran melalui transfer bank, virtual account, e-wallet (OVO, GoPay, DANA, LinkAja, ShopeePay), dan kartu kredit.
                    </p>
                </div>
                <div>
                    <h3 class="font-medium text-gray-900">Berapa lama batas waktu pembayaran?</h3>
                    <p class="mt-2 text-gray-600">
                        Batas waktu pembayaran adalah 24 jam sejak pesanan dibuat. Jika melewati batas waktu, pesanan akan otomatis dibatalkan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Pengiriman -->
        <div>
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Pengiriman</h2>
            <div class="space-y-4">
                <div>
                    <h3 class="font-medium text-gray-900">Berapa lama waktu pengiriman?</h3>
                    <p class="mt-2 text-gray-600">
                        Estimasi pengiriman bervariasi tergantung lokasi: 1-2 hari untuk JABODETABEK, 2-4 hari untuk Pulau Jawa, dan 4-7 hari untuk luar Pulau Jawa.
                    </p>
                </div>
                <div>
                    <h3 class="font-medium text-gray-900">Bagaimana cara melacak pesanan?</h3>
                    <p class="mt-2 text-gray-600">
                        Anda akan mendapatkan nomor resi melalui email dan dapat melacak pesanan melalui dashboard akun Anda atau website/aplikasi jasa pengiriman.
                    </p>
                </div>
            </div>
        </div>

        <!-- Pengembalian -->
        <div>
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Pengembalian & Refund</h2>
            <div class="space-y-4">
                <div>
                    <h3 class="font-medium text-gray-900">Bagaimana jika barang yang saya terima rusak?</h3>
                    <p class="mt-2 text-gray-600">
                        Silakan ajukan pengembalian dalam waktu 24 jam setelah barang diterima dengan melampirkan foto barang dan bukti kerusakan melalui halaman Pesanan Saya.
                    </p>
                </div>
                <div>
                    <h3 class="font-medium text-gray-900">Berapa lama proses refund?</h3>
                    <p class="mt-2 text-gray-600">
                        Setelah pengembalian barang diterima dan diverifikasi, proses refund akan dilakukan dalam waktu 3-5 hari kerja.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
