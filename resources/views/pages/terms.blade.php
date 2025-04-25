@extends('layouts.app')

@section('title', 'Syarat & Ketentuan')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Syarat & Ketentuan</h1>
    
    <div class="prose max-w-none">
        <h2>1. Umum</h2>
        <p>
            Dengan menggunakan layanan Rahasa, Anda menyetujui syarat dan ketentuan yang berlaku.
            Syarat dan ketentuan ini dapat berubah sewaktu-waktu tanpa pemberitahuan terlebih dahulu.
        </p>

        <h2>2. Akun Pengguna</h2>
        <ul>
            <li>Pengguna wajib memberikan informasi yang akurat dan lengkap saat mendaftar</li>
            <li>Pengguna bertanggung jawab atas keamanan akun dan password</li>
            <li>Rahasa berhak menonaktifkan akun yang melanggar ketentuan</li>
        </ul>

        <h2>3. Pemesanan dan Pembayaran</h2>
        <ul>
            <li>Harga yang tercantum adalah harga final termasuk pajak (jika ada)</li>
            <li>Pembayaran harus dilakukan dalam waktu 24 jam setelah pemesanan</li>
            <li>Pesanan yang belum dibayar akan otomatis dibatalkan</li>
            <li>Pembatalan pesanan yang sudah dibayar mengikuti kebijakan pengembalian</li>
        </ul>

        <h2>4. Pengiriman</h2>
        <ul>
            <li>Estimasi waktu pengiriman bersifat perkiraan</li>
            <li>Rahasa tidak bertanggung jawab atas keterlambatan yang disebabkan force majeure</li>
            <li>Pengguna wajib memastikan alamat pengiriman sudah benar</li>
            <li>Biaya pengiriman ditanggung oleh pembeli</li>
        </ul>

        <h2>5. Pengembalian dan Refund</h2>
        <ul>
            <li>Pengembalian barang harus dilakukan dalam waktu 24 jam setelah penerimaan</li>
            <li>Barang yang dikembalikan harus dalam kondisi asli dan belum digunakan</li>
            <li>Biaya pengiriman pengembalian ditanggung oleh pembeli</li>
            <li>Refund akan diproses dalam waktu 3-5 hari kerja</li>
        </ul>

        <h2>6. Hak Kekayaan Intelektual</h2>
        <p>
            Seluruh konten di website Rahasa dilindungi hak cipta. 
            Pengguna dilarang menyalin, memodifikasi, atau mendistribusikan konten tanpa izin tertulis.
        </p>

        <h2>7. Privasi</h2>
        <p>
            Rahasa berkomitmen melindungi privasi pengguna sesuai dengan kebijakan privasi yang berlaku.
            Data pengguna tidak akan dibagikan kepada pihak ketiga tanpa persetujuan.
        </p>

        <h2>8. Pembatasan Tanggung Jawab</h2>
        <p>
            Rahasa tidak bertanggung jawab atas kerugian yang timbul akibat:
        </p>
        <ul>
            <li>Kesalahan penggunaan layanan oleh pengguna</li>
            <li>Gangguan teknis di luar kendali Rahasa</li>
            <li>Force majeure atau kejadian di luar kendali wajar</li>
        </ul>

        <h2>9. Hukum yang Berlaku</h2>
        <p>
            Syarat dan ketentuan ini tunduk pada hukum yang berlaku di Republik Indonesia.
            Setiap perselisihan akan diselesaikan melalui musyawarah atau pengadilan yang berwenang.
        </p>
    </div>
</div>
@endsection
