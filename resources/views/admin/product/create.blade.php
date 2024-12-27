@extends('admin.layouts.app')

@section('content')
<div class="container-fluid px-5">
    <h1 class="mt-4 mb-4">Tambah Produk</h1>
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
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama Produk</label>
                                    <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select name="kategori" class="form-control" id="kategori" required>
                                        <option value="">Pilih Kategori</option>
                                        <option value="mikrokontroler">Mikrokontroler</option>
                                        <option value="sensor">Sensor</option>
                                        <option value="aktuator">Aktuator</option>
                                        <option value="other">Other</option>
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
                                    <label for="gambar">Gambar Produk</label>
                                    <input type="file" class="form-control" name="gambar" id="gambar" onchange="previewFile()">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control summernote" id="deskripsi" required>{{ old('deskripsi') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('product.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
