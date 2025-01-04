@extends('layout')

@section('content')
<div class="container">
    <h1 class="text-center">Projects</h1>

    <!-- Search Bar -->
    <div class="search-container text-center mb-4">
        <input type="text" class="search-input" placeholder="Cari Project..." />
    </div>

    <!-- Projects Grid -->
    <div class="row">
        @foreach ($projects as $project)
        <div class="col-md-4 mb-4">
            <div class="card">
                <a href="{{ route('detail_project', $project->id) }}">
                    <img src="{{ asset('storage/' . $project->gambar) }}" class="card-img-top" alt="{{ $project->nama }}">
                    <div class="card-body">
                        <span class="badge bg-info">{{ ucfirst($project->kategori) }}</span>
                        <h5 class="card-title">{{ $project->nama }}</h5>
                        <p class="card-text">Rp {{ number_format($project->harga, 0, ',', '.') }}</p>
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
</style>
@endsection
