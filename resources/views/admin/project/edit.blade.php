@extends('admin.layouts.app')

@section('content')
<div class="container-fluid px-5">
    <h1 class="mt-4 mb-4">Edit Project</h1>
    <div class="row">
        <div class="col-lg-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama Project</label>
                                    <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $project->nama) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select name="kategori" class="form-control" id="kategori" required>
                                        <option value="">Pilih Kategori</option>
                                        <option value="Sistem Berbasis Komputer" {{ $project->kategori == 'Sistem Berbasis Komputer' ? 'selected' : '' }}>Sistem Berbasis Komputer</option>
                                        <option value="Mekatronika" {{ $project->kategori == 'Mekatronika' ? 'selected' : '' }}>Mekatronika</option>
                                        <option value="Sistem Tertanam" {{ $project->kategori == 'Sistem Tertanam' ? 'selected' : '' }}>Sistem Tertanam</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" name="harga" class="form-control" id="harga" value="{{ old('harga', $project->harga) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gambar">Gambar Project</label>
                                    <input type="file" class="form-control" name="gambar" id="gambar" onchange="previewFile()">
                                </div>
                                <img src="{{ $project->gambar ? asset('storage/' . $project->gambar) : '/assets/img/no_img.jpg' }}" class="img-thumbnail mt-3" width="150px" id="previewImage">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">File Code Project</label>
                                    <input type="file" class="form-control" name="code" id="code">
                                </div>
                                @if($project->code)
                                    <p class="mt-2">File saat ini: <a href="{{ asset('storage/' . $project->code) }}" target="_blank">{{ basename($project->code) }}</a></p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control summernote" id="deskripsi" required>{{ old('deskripsi', $project->deskripsi) }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('project.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
