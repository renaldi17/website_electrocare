@extends('admin.layouts.app')

@section('content')
<div class="container-fluid px-5">
    <h1 class="mt-4 mb-4">Tambah Project</h1>
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
                    <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama Project</label>
                                    <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select name="kategori" class="form-control" id="kategori" required>
                                        <option value="">Pilih Kategori</option>
                                        <option value="Sistem Berbasis Komputer">Sistem Berbasis Komputer</option>
                                        <option value="Mekatronika">Mekatronika</option>
                                        <option value="Sistem Tertanam">Sistem Tertanam</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" name="harga" class="form-control" id="harga" value="{{ old('harga') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gambar">Gambar Project</label>
                                    <input type="file" class="form-control" name="gambar" id="gambar">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">File Code</label>
                                    <input type="file" class="form-control" name="code" id="code">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control summernote" id="deskripsi" required>{{ old('deskripsi') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('project.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection