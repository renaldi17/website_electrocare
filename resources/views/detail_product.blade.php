@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $product->gambar) }}" class="img-fluid" alt="{{ $product->nama }}">
        </div>

        <div class="col-md-5">
            <h1>{{ $product->nama }}</h1>
            <h2>Rp {{ number_format($product->harga, 0, ',', '.') }}</h2>
            <p>{{ $product->deskripsi }}</p>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h4>Atur Jumlah</h4>
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
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
</div>

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
