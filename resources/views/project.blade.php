@extends('layout')

@section('content')
<div class="container py-3">
    <h1 class="text-center pb-3">Projects</h1>

    <!-- Search Bar -->
    <div class="search-container text-center mb-4">
        <input type="text" class="search-input" placeholder="Cari Project..." id="searchInput" onkeyup="filterProjects()" />
    </div>

    <!-- Filter Buttons -->
    <div class="text-center mb-4">
        <button class="btn btn-danger" onclick="filterByCategory('Sistem Berbasis Komputer')">Sistem Berbasis Komputer</button>
        <button class="btn btn-danger" onclick="filterByCategory('Mekatronika')">Mekatronika</button>
        <button class="btn btn-danger" onclick="filterByCategory('Sistem Tertanam')">Sistem Tertanam</button>
    </div>

    <!-- Projects Grid -->
    <div class="row" id="projectGrid">
        @foreach ($projects as $project)
            <div class="col-md-4 mb-4 product-item" data-category="{{ $project->kategori }}">
                <div class="card">
                    <a href="{{ route('detail_project', $project->id) }}">
                        <div class="product-images">
                            <img src="{{ asset('storage/' . $project->gambar) }}" class="card-img-top" alt="{{ $project->nama }}" style="height: 200px; object-fit: cover;">
                        </div>
                        <div class="card-body">
                            <span class="badge bg-info">{{ ucfirst($project->kategori) }}</span>
                            <h5 class="card-title" style="color: black;">{{ $project->nama }}</h5>
                            <p class="card-text" style="color: black;">Rp {{ number_format($project->harga, 0, ',', '.') }}</p>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="pagination justify-content-center">
        {{--  {{ $projects->links() }}  --}}
    </div>
</div>

<script>
    function filterByCategory(category) {
        const projects = document.querySelectorAll('.product-item');
        projects.forEach(project => {
            if (project.getAttribute('data-category') === category || category === 'all') {
                project.style.display = 'block';
            } else {
                project.style.display = 'none';
            }
        });
    }

    function filterProjects() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const projects = document.querySelectorAll('.product-item');
        projects.forEach(project => {
            const title = project.querySelector('.card-title').textContent.toLowerCase();
            if (title.includes(input)) {
                project.style.display = 'block';
            } else {
                project.style.display = 'none';
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
