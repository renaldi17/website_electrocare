@extends('layout')

@section('content')
<div class="container mt-4">
    <h1>Checkout</h1>

    <div class="row">
        <div class="col-md-8">
            <!-- Alamat Pengiriman -->
            <div class="card mb-4">
                <div class="card-body">
                    <h2>Alamat Pengiriman</h2>
                    <textarea name="address" class="form-control" rows="4" required></textarea>
                </div>
            </div>

            <!-- Nomor HP -->
            <div class="card mb-4">
                <div class="card-body">
                    <h2>No. HP</h2>
                    <input type="text" name="phone" class="form-control" required>
                </div>
            </div>

            <!-- Detail Produk -->
            @foreach ($cartItems as $item)
                <div class="card mb-3">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/' . $item->product->gambar) }}" alt="{{ $item->product->nama }}" style="width: 100px; margin-right: 20px;">
                            <h3>{{ $item->product->nama }}</h3>
                        </div>
                        <div>
                            <h3>Rp. {{ number_format($item->product->harga * $item->quantity, 0, ',', '.') }}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Ringkasan Belanja -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h2>Ringkasan belanja</h2>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total Barang</span>
                        <span>Rp. {{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total Ongkos Kirim</span>
                        <span>Rp. {{ number_format($shippingCost, 0, ',', '.') }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Biaya Admin</span>
                        <span>Rp. {{ number_format($adminFee, 0, ',', '.') }}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <strong>Total Belanja</strong>
                        <strong>Rp. {{ number_format($total, 0, ',', '.') }}</strong>
                    </div>
                    <form action="{{ route('checkout.process') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100">Bayar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .card {
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        border-radius: 8px;
        border: none;
    }
    
    h1 {
        margin-bottom: 30px;
    }
    
    h2 {
        font-size: 1.2rem;
        margin-bottom: 1rem;
    }
    
    .btn-danger {
        background-color: #ff3333;
    }
    </style>
@endsection
