@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-5 px-5">
    <h1 class="mt-4">Users</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-5">
        <div class="card-header py-3 d-flex justify-content-end">
            <a href="{{ route('user.create') }}" class="btn btn-primary float-right mb-0" style="color: #ffffff;">
                <i class="fa-solid fa-plus"></i> Tambah
            </a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $i => $user)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning text-white">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin?')">
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
