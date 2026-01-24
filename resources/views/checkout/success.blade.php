@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-24">
    <div class="bg-white p-6 rounded-xl shadow text-center">
        <h1 class="text-2xl font-bold text-green-800 mb-2">Pembayaran Diterima</h1>
        <p class="text-gray-600 mb-4">Terima kasih! Pesanan Anda telah dibuat.</p>

        <div class="mb-4">
            <p><strong>Order ID:</strong> #{{ $order->id }}</p>
            <p><strong>Total:</strong> Rp {{ number_format($order->total_amount,0,',','.') }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ strtoupper($order->payment_method) }}</p>
        </div>

        <div class="mt-4">
            <p class="text-sm text-gray-500">Tunggu instruksi pembayaran sesuai metode yang dipilih. (Ini adalah simulasi — integrasi payment gateway belum diterapkan.)</p>
        </div>

        <a href="{{ route('makanan.index') }}" class="mt-6 inline-block bg-green-600 text-white px-4 py-2 rounded">Kembali ke Katalog</a>
    </div>
</div>
@endsection
