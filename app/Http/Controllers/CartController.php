<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makanan;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = array_sum(array_map(fn($i) => $i['subtotal'], $cart));
        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate(['makanan_id' => 'required|integer', 'qty' => 'nullable|integer|min:1']);

        $makanan = Makanan::findOrFail($request->makanan_id);
        $qty = $request->qty ?? 1;

        $cart = session()->get('cart', []);

        if (isset($cart[$makanan->id])) {
            $cart[$makanan->id]['qty'] += $qty;
            $cart[$makanan->id]['subtotal'] = $cart[$makanan->id]['qty'] * $cart[$makanan->id]['price'];
        } else {
            $cart[$makanan->id] = [
                'id' => $makanan->id,
                'nama' => $makanan->nama,
                'price' => $makanan->price,
                'qty' => $qty,
                'subtotal' => $makanan->price * $qty,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Berhasil ditambahkan ke keranjang');
    }

    public function update(Request $request)
    {
        $request->validate(['id' => 'required|integer', 'qty' => 'required|integer|min:1']);
        $cart = session()->get('cart', []);
        if (isset($cart[$request->id])) {
            $cart[$request->id]['qty'] = $request->qty;
            $cart[$request->id]['subtotal'] = $cart[$request->id]['qty'] * $cart[$request->id]['price'];
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.index');
    }

    public function remove(Request $request)
    {
        $request->validate(['id' => 'required|integer']);
        $cart = session()->get('cart', []);
        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.index');
    }
}
