@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Kolom Gambar Project -->
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $project->gambar) }}" class="img-fluid" alt="{{ $project->nama }}">
        </div>

        <!-- Kolom Detail Project -->
        <div class="col-md-5">
            <h1>{{ $project->nama }}</h1>
            <span class="badge bg-primary">{{ ucfirst($project->kategori) }}</span>
            <h2>Rp {{ number_format($project->harga, 0, ',', '.') }}</h2>
            <div class="detail-section mt-4">
                <h4>Deskripsi:</h4>
                <p>{{ $project->deskripsi }}</p>
            </div>
            <div class="code-section mt-4">
                <h4>Source Code:</h4>
                @if ($project->code)
                    <a href="{{ asset('storage/' . $project->code) }}" target="_blank" class="btn btn-success">
                        Download
                    </a>
                @else
                    <p class="text-danger">Source code tidak tersedia.</p>
                @endif
            </div>
        </div>

        <!-- Kolom Card Jumlah (Kanan) -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h4>Atur Jumlah</h4>
                    <form action="{{ route('cart.add', ['type' => 'project', 'itemId' => $project->id]) }}" method="POST">
                        @csrf
                        <div class="quantity-control">
                            <button type="button" class="btn btn-outline-dark" id="minusBtn">-</button>
                            <input type="number" name="quantity" id="quantity" value="1" class="form-control" min="1">
                            <button type="button" class="btn btn-outline-dark" id="plusBtn">+</button>
                        </div>
                        <div class="subtotal">
                            <span>Subtotal</span>
                            <span id="subtotal">Rp {{ number_format($project->harga, 0, ',', '.') }}</span>
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Keranjang</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- Section Recommendation --}}
    <div class="container py-4">
        <h1>Recommend For You</h1>
        <div class="row">
            @foreach ($recommends as $project)
            <div class="col-md-3 mt-2 mb-4">
                <div class="card">
                    <a href="{{ route('detail_project', $project->id) }}" style="text-decoration: none; color: black;">
                        <div class="product-images">
                            <img src="{{ asset('storage/' . $project->gambar) }}" class="card-img-top" alt="">
                        </div>
                        <div class="card-body">
                            <span class="badge bg-primary">{{ $project->kategori }}</span>
                            <h5 class="card-title">{{ $project->nama }}</h5>
                            <p class="card-text">Rp. {{ $project->harga }}</p>
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
    .product-images img {
        width: 100%; /* Mengatur lebar gambar agar memenuhi kontainer */
        height: 200px; /* Mengatur tinggi gambar agar sama */
        object-fit: cover; /* Memastikan gambar tidak terdistorsi */
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
    const price = {{ $project->harga }};
    const quantity = document.getElementById('quantity').value;
    const subtotal = price * quantity;
    document.getElementById('subtotal').textContent = `Rp ${subtotal.toLocaleString()}`;
}
</script>
@endsection
