@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-24">
    <h1 class="text-3xl font-bold text-green-800 mb-6">Checkout</h1>

    <div class="bg-white p-6 rounded-xl shadow mb-6">
        <h2 class="font-semibold mb-4">Ringkasan Pesanan</h2>
        @if(empty($cart))
            <p class="text-gray-600">Keranjang kosong.</p>
        @else
            <ul class="space-y-2">
                @foreach($cart as $c)
                    <li class="flex justify-between"><span>{{ $c['nama'] }} x{{ $c['qty'] }}</span><span>Rp {{ number_format($c['subtotal'],0,',','.') }}</span></li>
                @endforeach
            </ul>
            <div class="mt-4 text-right font-bold">Total: Rp {{ number_format($total,0,',','.') }}</div>
        @endif
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="font-semibold mb-4">Pilih Metode Pembayaran</h2>
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <label class="p-3 border rounded cursor-pointer">
                    <input type="radio" name="payment_method" value="qris" class="mr-2"> QRIS
                </label>
                <label class="p-3 border rounded cursor-pointer">
                    <input type="radio" name="payment_method" value="shopeepay" class="mr-2"> ShopeePay
                </label>
                <label class="p-3 border rounded cursor-pointer">
                    <input type="radio" name="payment_method" value="gopay" class="mr-2"> GoPay
                </label>
                <label class="p-3 border rounded cursor-pointer">
                    <input type="radio" name="payment_method" value="ovo" class="mr-2"> OVO
                </label>
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <a href="{{ route('cart.index') }}" class="text-gray-600">Kembali ke Keranjang</a>
                <button class="bg-green-600 text-white px-4 py-2 rounded">Bayar Sekarang</button>
            </div>
        </form>
    </div>
</div>
@endsection
