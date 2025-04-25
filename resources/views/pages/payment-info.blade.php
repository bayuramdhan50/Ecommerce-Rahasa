@extends('layouts.app')

@section('title', 'Informasi Pembayaran')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Metode Pembayaran</h1>
    
    <div class="prose max-w-none">
        <h2>Transfer Bank</h2>
        <p>Kami menerima pembayaran melalui transfer bank ke rekening berikut:</p>
        <ul>
            <li>BCA: 1234567890 (a.n. PT Rahasa)</li>
            <li>Mandiri: 1234567890 (a.n. PT Rahasa)</li>
            <li>BNI: 1234567890 (a.n. PT Rahasa)</li>
            <li>BRI: 1234567890 (a.n. PT Rahasa)</li>
        </ul>

        <h2>Virtual Account</h2>
        <p>Pembayaran melalui virtual account tersedia untuk bank:</p>
        <ul>
            <li>BCA Virtual Account</li>
            <li>Mandiri Virtual Account</li>
            <li>BNI Virtual Account</li>
            <li>BRI Virtual Account</li>
        </ul>

        <h2>E-Wallet</h2>
        <p>Kami menerima pembayaran melalui e-wallet:</p>
        <ul>
            <li>OVO</li>
            <li>GoPay</li>
            <li>DANA</li>
            <li>LinkAja</li>
            <li>ShopeePay</li>
        </ul>

        <h2>Kartu Kredit</h2>
        <p>Kami menerima pembayaran menggunakan kartu kredit dari:</p>
        <ul>
            <li>Visa</li>
            <li>Mastercard</li>
            <li>JCB</li>
        </ul>

        <h2>Proses Konfirmasi</h2>
        <ul>
            <li>Pembayaran virtual account dan e-wallet akan dikonfirmasi otomatis</li>
            <li>Pembayaran transfer bank akan dikonfirmasi dalam 1x24 jam</li>
            <li>Pembayaran kartu kredit akan dikonfirmasi secara instan</li>
        </ul>

        <h2>Batas Waktu Pembayaran</h2>
        <p>Batas waktu pembayaran adalah 24 jam sejak pesanan dibuat. Jika pembayaran tidak dilakukan dalam waktu tersebut, pesanan akan otomatis dibatalkan.</p>
    </div>
</div>
@endsection
