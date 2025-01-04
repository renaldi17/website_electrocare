@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $product->gambar) }}" class="img-fluid" alt="{{ $product->nama }}">
        </div>

        <div class="col-md-5">
            <h3>{{ $product->nama }}</h1>
            <h2>Rp {{ number_format($product->harga, 0, ',', '.') }}</h2>
            <p>{{ $product->deskripsi }}</p>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h4>Atur Jumlah</h4>
                    <form action="{{ route('cart.add', ['type' => 'product', 'itemId' => $product->id]) }}" method="POST">
                        @csrf
                        <div class="quantity-control">
                            <button type="button" class="btn btn-outline-dark" id="minusBtn">-</button>
                            <input type="number" name="quantity" id="quantity" value="1" class="form-control" min="1">
                            <button type="button" class="btn btn-outline-dark" id="plusBtn">+</button>
                        </div>
                        <div class="subtotal">
                            <span>Subtotal</span>
                            <span id="subtotal">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Keranjang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Section Reccmendation --}}
    <div class="container py-4">
        <h1>Recommend For You</h1>
        <div class="row">
            @foreach ($recommends as $product)
                <div class="col-md-3 mt-2 mb-4">
                    <div class="card">
                        <a href="{{ route('detail_product', $product->id) }}">
                            <div class="product-images">
                                <img src="{{  asset('storage/' . $product->gambar) }}" class="card-img-top" alt="">
                            </div>
                            <div class="card-body">
                                <span class="badge bg-warning">{{ $product->kategori }}</span>
                                <h5 class="card-title">{{ $product->nama }}</h5>
                                <p class="card-text">Rp. {{ $product->harga }}</p>
                                {{-- <a href="" class="btn btn-primary">Detail</a> --}}
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    .product-image {
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 8px;
    }
    
    .product-details {
        padding-right: 20px;
    }

    .card-rec {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

    .badge {
        margin-bottom: 10px;
    }

    .card {
        /* position: sticky; */
        top: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .quantity-control {
        display: flex;
        gap: 10px;
        align-items: center;
        margin: 20px 0;
    }
    
    .quantity-control input {
        width: 60px;
        text-align: center;
    }
    
    .subtotal {
        display: flex;
        justify-content: space-between;
        margin: 20px 0;
        font-weight: bold;
    }
    
    .detail-section {
        margin: 30px 0;
    }
    
    h1 {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }
    
    h2 {
        color: #ff0000;
        font-size: 1.8rem;
        margin-bottom: 20px;
    }
    
    .btn-danger {
        background-color: #ff0000;
        border: none;
    }
    
    .btn-danger:hover {
        background-color: #dd0000;
    }

    .code-section pre {
    overflow-x: auto;
    font-size: 0.9em;
    line-height: 1.5;
    }
</style>
<script>
document.getElementById('plusBtn').addEventListener('click', function() {
    const quantityInput = document.getElementById('quantity');
    quantityInput.value = parseInt(quantityInput.value) + 1;
    updateSubtotal();
});

document.getElementById('minusBtn').addEventListener('click', function() {
    const quantityInput = document.getElementById('quantity');
    if (parseInt(quantityInput.value) > 1) {
        quantityInput.value = parseInt(quantityInput.value) - 1;
        updateSubtotal();
    }
});

function updateSubtotal() {
    const price = {{ $product->harga }};
    const quantity = document.getElementById('quantity').value;
    const subtotal = price * quantity;
    document.getElementById('subtotal').textContent = `Rp ${subtotal.toLocaleString()}`;
}
</script>
@endsection
