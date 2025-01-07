@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-4 text-center mt-3">
            <i class="fas fa-user-circle" style="font-size: 8rem; color: #ff2323;"></i>
            <br>
        </div>
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    {{--  <h5 class="card-title">Informasi Tambahan</h5>  --}}
                    <h5 class="card-title">{{ $user->username }}</h5>

                    <p class="card-text">Nama: {{ $user->name }}</p>
                    <p class="card-text">Email: {{ $user->email }}</p>
                    <p class="card-text">Nomor Hp: {{ $user->phone_number }}</p>
                    {{--  <p class="card-text">Di sini Anda bisa menambahkan informasi tambahan tentang pengguna, seperti alamat, tanggal lahir, atau informasi lainnya yang relevan.</p>
                    <!-- Tambahkan informasi tambahan di sini -->  --}}
                </div>
            </div>
            <br>
            <button class="btn btn-danger" id="editButton">Edit</button>

        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" action="{{ route('user.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Hp</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('editButton').addEventListener('click', function() {
        var modal = new bootstrap.Modal(document.getElementById('editModal'));
        modal.show();
    });
</script>
@endsection
