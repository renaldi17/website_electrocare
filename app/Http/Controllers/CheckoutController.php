<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    public function showCart()
    {
        $cartItems =  Cart::whereNull('order_id')->get();; // Ambil semua data dari cart
        $total = $cartItems->sum(function($item) {
            return $item->product->harga * $item->quantity;
        });
        return view('cart', compact('cartItems', 'total'));
    }

    public function checkout(Request $request)
    {
        // Ambil data cart
        $cartItems = Cart::with(['product', 'project'])
        ->where('user_id', Auth::id())
        ->whereNull('order_id')
        ->get();

        $subtotal = $cartItems->sum(function($item) {
        return ($item->product->harga ?? 0) * $item->quantity + ($item->project->harga ?? 0) * $item->quantity;
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
        $request->validate([
            'alamat' => 'required|string|max:250',
            'no_hp' => 'required|string',
            'total' => 'required',
        ]);

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->total,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            )
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $checkout = new Order();
        $checkout->alamat = $request->alamat;
        $checkout->no_hp = $request->no_hp;
        $checkout->total = $request->total;
        $checkout->user_id = Auth::user()->id;
        $checkout->snapToken = $snapToken;
        $checkout->save();

        Cart::where('user_id', Auth::user()->id)
        ->update([
            'order_id' => $checkout->id, // Removed the trailing space
        ]);
        return redirect()->route('showOrder');
    }

    public function success(Request $request, string $id)
    {
        Order::where('id', $id)
        ->update([
            'status' => 'paid', // Removed the trailing space
        ]);

        return response()->json([
            'message' => 'Payment successful',
            'order_id' => $id
        ]);
    }

    public function failed(Request $request, string $id)
    {
        Order::where('id', $id)
        ->update([
            'status' => 'failed', // Removed the trailing space
        ]);

        return response()->json([
            'message' => 'Payment Failure, kamu harus order ulang',
            'order_id' => $id
        ]);
    }
}
