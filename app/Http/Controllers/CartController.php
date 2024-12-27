<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $quantity = $request->input('quantity');
        $subtotal = $product->harga * $quantity;

        // Mengecek apakah produk sudah ada di keranjang
        $cartItem = Cart::where('user_id', Auth::id())
                        ->where('product_id', $productId)
                        ->first();

        if ($cartItem) {
            // Jika ada, update jumlah dan subtotal
            $cartItem->quantity += $quantity;
            $cartItem->subtotal += $subtotal;
            $cartItem->save();
        } else {
            // Jika belum ada, tambahkan produk ke keranjang
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => $quantity,
                'subtotal' => $subtotal,
            ]);
        }

        return redirect()->route('cart.index');
    }

    public function showCart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();

        $total = $cartItems->sum(function ($item) {
            return $item->product->harga * $item->quantity;
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
