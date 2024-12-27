@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-5 px-5">
    <h1 class="mt-4">Projects</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-5">
        <div class="card-header py-3 d-flex justify-content-end">
            <a href="{{ route('project.create') }}" class="btn btn-primary float-right mb-0" style="color: #ffffff;">
                <i class="fa-solid fa-plus"></i> Tambah
            </a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Project</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Code</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $i => $project)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $project->nama }}</td>
                            <td><span class="badge bg-warning">{{ ucfirst($project->kategori) }}</span></td>
                            <td>{{ Str::limit($project->deskripsi, 50) }}</td>
                            <td>
                                @if ($project->gambar)
                                    <img src="{{ asset('storage/' . $project->gambar) }}" alt="{{ $project->nama }}" width="100px">
                                @else
                                    <img src="/assets/img/no_img.jpg" alt="No Image" width="100px">
                                @endif
                            </td>
                            <td>
                                @if ($project->code)
                                    <a href="{{ asset('storage/' . $project->code) }}" target="_blank">Download</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>Rp {{ number_format($project->harga, 0, ',', '.') }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('project.edit', $project->id) }}" class="btn btn-warning text-white">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                    <form action="{{ route('project.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger text-white">
                                            <i class="fa-solid fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection