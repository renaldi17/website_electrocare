<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $type, $id)
    {
        $quantity = $request->input('quantity');
        $subtotal = 0;
        $cartItem = null;

        if ($type === 'product') {
            $product = Product::findOrFail($id);
            $subtotal = $product->harga * $quantity;

            // Mengecek apakah produk sudah ada di keranjang
            $cartItem = Cart::where('user_id', Auth::id())
                ->where('product_id', $id)
                ->whereNull('order_id')
                ->first();
        } elseif ($type === 'project') {
            $project = Project::findOrFail($id);
            $subtotal = $project->harga * $quantity;

            // Mengecek apakah proyek sudah ada di keranjang
            $cartItem = Cart::where('user_id', Auth::id())
                ->where('project_id', $id)
                ->whereNull('order_id')
                ->first();
        }

        if ($cartItem) {
            // Jika ada, update jumlah dan subtotal
            $cartItem->quantity += $quantity;
            $cartItem->subtotal += $subtotal;
            $cartItem->save();
        } else {

            // Jika belum ada, tambahkan produk atau proyek ke keranjang
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $type === 'product' ? $id : null,
                'project_id' => $type === 'project' ? $id : null,
                'quantity' => $quantity,
                'subtotal' => $subtotal,
            ]);
        }

        return redirect()->route('cart.index');
    }

    public function showCart()
    {
        $cartItems = Cart::with(['product', 'project'])
            ->where('user_id', Auth::id())
            ->whereNull('order_id')
            ->get();

        $total = $cartItems->sum(function ($item) {
            return ($item->product->harga ?? 0) * $item->quantity + ($item->project->harga ?? 0) * $item->quantity;
        });

        return view('cart', compact('cartItems', 'total'));
    }

    public function remove($id)
    {
        // Cari item cart berdasarkan ID dan hapus
        $cartItem = Cart::find($id);

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->route('cart.index')->with('success', 'Item berhasil dihapus dari keranjang');
        }

        return redirect()->route('cart.index')->with('error', 'Item tidak ditemukan');
    }
}
