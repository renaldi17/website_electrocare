@extends('layout')

@section('content')
<div class="container">
    <h1 class="text-center">Products Microcontroller</h1>
    
    <!-- Search Bar -->
    <div class="search-container text-center mb-4">
        <input type="text" class="search-input" placeholder="Cari Produk..." />
    </div>

    <!-- Products Grid -->
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <a href="{{ route('detail_product', $product->id) }}">
                        <div class="product-images">
                            <img src="{{ asset('storage/' . $product->gambar) }}" class="card-img-top" alt="{{ $product->nama }}">
                        </div>
                        <div class="card-body">
                            <span class="badge bg-warning">{{ ucfirst($product->kategori) }}</span>
                            <h5 class="card-title">{{ $product->nama }}</h5>
                            <p class="card-text">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                            {{-- <a href="{{ route('detail_product', $product->id) }}" class="btn btn-primary">Detail</a> --}}
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="pagination justify-content-center">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
        </nav>
    </div>
</div>

<style>

/* .product-images {
    width: 300px;
    height: 120px;
} */

.search-input {
    width: 50%;
    padding: 8px;
    border-radius: 20px;
    border: 1px solid #ddd;
}

.card {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.badge {
    margin-bottom: 10px;
}

.pagination .page-link {
    border-radius: 5px;
    margin: 0 2px;
}

.pagination .active .page-link {
    background-color: #ff3333;
    border-color: #ff3333;
}
</style>
@endsection