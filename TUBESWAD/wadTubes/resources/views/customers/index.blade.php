@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary-color: #800000; 
        --primary-color-dark: #4d0000;
        --warning-color: #f77f00;
        --warning-color-dark: #d62828;
        --danger-color: #ef233c;
        --danger-color-dark: #d90429;
        --light-color: #fff;
        --text-dark: #212529;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: var(--text-dark);
    }

    .header-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: var(--primary-color);
    }

    .table-custom {
        background-color: var(--light-color);
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .table thead {
        background: linear-gradient(to right, var(--primary-color), var(--primary-color-dark));
        color: var(--light-color);
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: var(--light-color);
    }

    .btn-primary:hover {
        background-color: var(--primary-color-dark);
        border-color: var(--primary-color-dark);
        color: var(--light-color);
    }

    .btn-warning {
        color: var(--light-color);
        background-color: var(--warning-color);
        border-color: var(--warning-color);
    }

    .btn-warning:hover {
        background-color: var(--warning-color-dark);
        border-color: var(--warning-color-dark);
    }

    .btn-danger {
        background-color: var(--danger-color);
        border-color: var(--danger-color);
        color: var(--light-color);
    }

    .btn-danger:hover {
        background-color: var(--danger-color-dark);
        border-color: var(--danger-color-dark);
    }
</style>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="header-title mb-0">
            <i class="bi bi-people-fill me-2"></i> Manajemen Pelanggan
        </h2>
        <div class="d-flex gap-2">
            <a href="{{ route('welcome') }}" class="btn btn-outline-secondary">
                <i class="bi bi-house-door-fill me-1"></i> Home
            </a>
            <a href="{{ route('home') }}" class="btn btn-outline-dark">
                <i class="bi bi-arrow-left-circle me-1"></i> Kembali
            </a>
            <a href="{{ route('customers.create') }}" class="btn btn-primary">
                <i class="bi bi-person-plus-fill me-1"></i> Tambah Pelanggan
            </a>
        </div>
    </div>

    <div class="table-responsive table-custom">
        <table class="table table-bordered mb-0">
            <thead class="text-center">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th width="150px">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-warning me-1">
                            <i class="bi bi-pencil-square me-1"></i> Edit
                        </a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus pelanggan ini?')">
                                <i class="bi bi-trash-fill me-1"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Belum ada data pelanggan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
