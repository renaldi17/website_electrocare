<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Checkout;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function showCart()
    {
        $cartItems = Cart::all(); // Ambil semua data dari cart
        $total = $cartItems->sum(function($item) {
            return $item->product->harga * $item->quantity;
        });

        return view('cart', compact('cartItems', 'total'));
    }

    public function checkout(Request $request)
    {
        // Ambil data cart
        $cartItems = Cart::all();
        $subtotal = $cartItems->sum(function($item) {
            return $item->product->harga * $item->quantity;
        });

        // Ongkos kirim dan biaya admin
        $shippingCost = 10000;
        $adminFee = 3000;

        // Hitung total belanja
        $total = $subtotal + $shippingCost + $adminFee;

        return view('checkout', compact('cartItems', 'subtotal', 'shippingCost', 'adminFee', 'total'));
    }

    public function processCheckout(Request $request)
    {
        // Simpan data checkout ke database
        $checkout = new Checkout();
        $checkout->alamat = $request->alamat;
        $checkout->no_hp = $request->no_hp;
        $checkout->total = $request->total;
        $checkout->save();

        // Hapus cart setelah checkout
        Cart::truncate();

        return redirect()->route('checkout.success');
    }

    public function success()
    {
        return view('checkout.success');
    }
}
