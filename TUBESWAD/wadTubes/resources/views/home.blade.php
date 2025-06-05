@extends('layouts.app')

@section('content')
<style>
    /* Warna tema maroon */
    :root {
        --maroon-primary: #800000;       
        --maroon-secondary: #4b0000;     
        --maroon-accent: #b22222;        
        --maroon-light: #f8f9fa;         
        --maroon-dark-text: #3a0000;     
    }

    .dashboard-header {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--maroon-primary);
    }

    .card-custom {
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .card-header-custom {
        font-weight: 600;
        background: linear-gradient(to right, var(--maroon-primary), var(--maroon-secondary));
        color: #fff;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .card-body-custom {
        background-color: var(--maroon-light);
        border-bottom-left-radius: 12px;
        border-bottom-right-radius: 12px;
    }

    .stat-box {
        background-color: #fff;
        border: 1px solid #e3e3e3;
        border-radius: 10px;
        padding: 1.2rem;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
    }

    .stat-box h3 {
        font-weight: bold;
        color: var(--maroon-secondary);
    }

    .stat-box p {
        margin-top: 0.5rem;
        font-size: 0.95rem;
        color: #555;
    }

    .btn-outline-primary {
        border-color: var(--maroon-primary);
        color: var(--maroon-primary);
    }

    .btn-outline-primary:hover {
        background-color: var(--maroon-primary);
        color: #fff;
    }

    .btn-primary {
        background-color: var(--maroon-primary);
        border-color: var(--maroon-primary);
        color: #fff;
    }

    .btn-primary:hover,
    .btn-primary:focus {
        background-color: var(--maroon-secondary);
        border-color: var(--maroon-secondary);
        color: #fff;
    }

    .btn-danger {
        background-color: var(--maroon-accent);
        border-color: var(--maroon-accent);
        color: #fff;
    }

    .btn-danger:hover {
        background-color: var(--maroon-secondary);
        border-color: var(--maroon-secondary);
        color: #fff;
    }

</style>

<div class="container py-4">
    <div class="row align-items-center mb-4">
        <div class="col-md-8">
            <h2 class="dashboard-header d-flex align-items-center">
                <i class="bi bi-speedometer2 me-2" style="font-size: 1.8rem; color: var(--maroon-primary);"></i>
                Dashboard - {{ Auth::user()->name }}
                @if(Auth::user()->is_admin)
                    <span class="badge bg-danger ms-3">Admin</span>
                @else
                    <span class="badge bg-success ms-3">Pelanggan</span>
                @endif
            </h2>
        </div>
        <div class="col-md-4 text-md-end mt-3 mt-md-0">
            <a href="{{ route('welcome') }}" class="btn btn-outline-secondary me-2">
                <i class="bi bi-person-lines-fill me-1"></i> Home
            </a>
            <a href="{{ route('logout') }}" class="btn btn-outline-danger"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right me-1"></i> Keluar
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        </div>
    </div>

    <div class="row">
        <!-- Profil Pengguna -->
        <div class="col-md-6">
            <div class="card card-custom mb-4">
                <div class="card-header card-header-custom">
                    <i class="bi bi-person-circle me-2"></i>Profil Saya
                </div>
                <div class="card-body card-body-custom">
                    <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Telepon:</strong> {{ Auth::user()->phone }}</p>
                    <div class="mt-3">
                        <a href="{{ route('profile.show') }}" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-eye me-1"></i> Lihat Profil
                        </a>
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil-square me-1"></i> Edit Profil
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panel Admin -->
        @if(Auth::user()->is_admin)
        <div class="col-md-6">
            <div class="card card-custom mb-4">
                <div class="card-header card-header-custom bg-danger">
                    <i class="bi bi-people-fill me-2"></i>Manajemen Pelanggan
                </div>
                <div class="card-body card-body-custom">
                    <p>Anda memiliki akses penuh untuk mengelola data pelanggan:</p>
                    <ul>
                        <li>Lihat daftar pelanggan</li>
                        <li>Tambah pelanggan baru</li>
                        <li>Edit data pelanggan</li>
                        <li>Hapus pelanggan</li>
                    </ul>
                    <div class="mt-3">
                        <a href="{{ route('customers.index') }}" class="btn btn-danger">
                            <i class="bi bi-gear-fill me-1"></i> Kelola Pelanggan
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- Statistik -->
    @if(Auth::user()->is_admin)
    <div class="card card-custom mt-3">
        <div class="card-header card-header-custom">
            <i class="bi bi-bar-chart-line-fill me-2"></i>Statistik Sistem
        </div>
        <div class="card-body card-body-custom">
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="stat-box">
                        <h3>{{ \App\Models\User::where('is_admin', false)->count() }}</h3>
                        <p>Total Pelanggan</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-box">
                        <h3>{{ \App\Models\User::count() }}</h3>
                        <p>Total Pengguna</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-box">
                        <h3>0</h3>
                        <p>Transaksi Hari Ini</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-box">
                        <h3>0</h3>
                        <p>Pendapatan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
