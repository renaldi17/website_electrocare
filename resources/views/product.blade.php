@extends('layout')

@section('content')
<div class="container py-3">
    <h1 class="text-center pb-3">Products</h1>

    <!-- Search Bar -->
    <div class="search-container text-center mb-4">
        <input type="text" class="search-input" placeholder="Cari Produk..." id="searchInput" onkeyup="filterProducts()" />
    </div>

    <!-- Filter Buttons -->
    <div class="text-center mb-4">
        <button class="btn btn-danger" onclick="filterByCategory('mikrokontroler')">Mikrokontroler</button>
        <button class="btn btn-danger" onclick="filterByCategory('sensor')">Sensor</button>
        <button class="btn btn-danger" onclick="filterByCategory('aktuator')">Aktuator</button>
        <button class="btn btn-danger" onclick="filterByCategory('other')">Other</button>
    </div>

    <!-- Products Grid -->
    <div class="row" id="productGrid">
        @foreach ($products as $product)
            <div class="col-md-3 mb-4 product-item" data-category="{{ $product->kategori }}">
                <div class="card">
                    <a href="{{ route('detail_product', $product->id) }}">
                        <div class="product-images">
                            <img src="{{ asset('storage/' . $product->gambar) }}" class="card-img-top" alt="{{ $product->nama }}" style="height: 200px; object-fit: cover;">
                        </div>
                        <div class="card-body">
                            <span class="badge bg-warning">{{ ucfirst($product->kategori) }}</span>
                            <h5 class="card-title">{{ $product->nama }}</h5>
                            <p class="card-text">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="pagination justify-content-center">
        {{--  {{ $products->links() }}  --}}
    </div>
</div>

<script>
    function filterByCategory(category) {
        const products = document.querySelectorAll('.product-item');
        products.forEach(product => {
            if (product.getAttribute('data-category') === category || category === 'all') {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    }

    function resetFilter() {
        const products = document.querySelectorAll('.product-item');
        products.forEach(product => {
            product.style.display = 'block';
        });
    }

    function filterProducts() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const products = document.querySelectorAll('.product-item');
        products.forEach(product => {
            const title = product.querySelector('.card-title').textContent.toLowerCase();
            if (title.includes(input)) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    }
</script>

<style>
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

    .card a {
        text-decoration: none;
        color: inherit;
    }
</style>
@endsection
