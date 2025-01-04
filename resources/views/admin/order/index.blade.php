@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-5 px-5">
    <h1 class="mt-4">Orders</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-5">
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Invoice No</th>
                        <th>Tanggal</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Pembeli</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $i => $order)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $order->snapToken }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->alamat }}</td>
                            <td>{{ $order->no_hp }}</td>
                            <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td>{{ $order->user->username ?? 'N/A' }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    {{-- <a href="{{ route('order.show', $order->id) }}" class="btn btn-info text-white">
                                        <i class="fa-solid fa-eye"></i> View
                                    </a> --}}
                                    <form action="{{ route('order.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin?')">
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
