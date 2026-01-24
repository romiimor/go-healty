@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-24">
    <h1 class="text-3xl font-bold text-green-800 mb-6">Keranjang Saya</h1>

    @if(session('success'))<div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>@endif
    @if(session('error'))<div class="bg-red-100 text-red-700 p-3 rounded mb-4">{{ session('error') }}</div>@endif

    @if(empty($cart))
        <p class="text-gray-600">Keranjang kosong.</p>
    @else
        <div class="bg-white p-6 rounded-xl shadow">
            <table class="w-full text-sm">
                <thead class="text-left text-gray-600 border-b">
                    <tr><th class="py-2">Produk</th><th class="py-2">Harga</th><th class="py-2">Jumlah</th><th class="py-2">Subtotal</th><th></th></tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                    <tr class="border-b">
                        <td class="py-3">{{ $item['nama'] }}</td>
                        <td class="py-3">Rp {{ number_format($item['price'],0,',','.') }}</td>
                        <td class="py-3">
                            <form action="{{ route('cart.update') }}" method="POST" class="flex items-center">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                <input type="number" name="qty" value="{{ $item['qty'] }}" min="1" class="w-20 p-1 border rounded">
                                <button class="ml-2 bg-green-600 text-white px-3 py-1 rounded">Update</button>
                            </form>
                        </td>
                        <td class="py-3">Rp {{ number_format($item['subtotal'],0,',','.') }}</td>
                        <td class="py-3">
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                <button class="text-red-500">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-6 flex justify-end items-center gap-4">
                <div class="text-lg font-bold">Total: Rp {{ number_format($total,0,',','.') }}</div>
                <a href="{{ route('checkout.show') }}" class="bg-orange-500 text-white px-4 py-2 rounded">Checkout</a>
            </div>
        </div>
    @endif
</div>
@endsection
