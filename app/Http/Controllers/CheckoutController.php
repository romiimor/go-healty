<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function show()
    {
        $cart = session()->get('cart', []);
        $total = array_sum(array_map(fn($i) => $i['subtotal'], $cart));
        return view('checkout.checkout', compact('cart','total'));
    }

    public function process(Request $request)
    {
        $request->validate(['payment_method' => 'required|in:qris,shopeepay,gopay,ovo']);

        $cart = session()->get('cart', []);
        if (empty($cart)) return redirect()->route('cart.index')->with('error','Keranjang kosong');

        $total = array_sum(array_map(fn($i) => $i['subtotal'], $cart));

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_amount' => $total,
            'payment_method' => $request->payment_method,
            'status' => 'pending',
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'makanan_id' => $item['id'],
                'nama' => $item['nama'],
                'price' => $item['price'],
                'qty' => $item['qty'],
                'subtotal' => $item['subtotal'],
            ]);
        }

        // clear cart
        session()->forget('cart');

        return redirect()->route('checkout.success', $order->id);
    }

    public function success(Order $order)
    {
        return view('checkout.success', compact('order'));
    }
}
