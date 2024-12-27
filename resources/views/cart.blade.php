@extends('layout')

@section('content')
<div class="container mt-4">
    <h1>Keranjang Belanja</h1>
    <div class="row">
        <div class="col-md-9">

            <div class="cart-items">
                @foreach ($cartItems as $item)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex">
                                <img src="{{ asset('storage/' . $item->product->gambar) }}" class="img-fluid" style="width: 100px;">
                                <div class="flex-grow-1">
                                    <h5>{{ $item->product->nama }}</h5>
                                    <p>Rp {{ number_format($item->product->harga, 0, ',', '.') }} x {{ $item->quantity }}</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-light"><i class="fas fa-trash"></i> Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="col-md-3">
            <!-- Total Subtotal -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="mb-4">Ringkasan Belanja</h5>
                    <div class="d-flex justify-content-between mb-4">
                        <span>Total</span>
                        <span style="font-weight: bold;">Rp. {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <a href="{{ route('checkout.show') }}" class="btn btn-danger w-100">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection