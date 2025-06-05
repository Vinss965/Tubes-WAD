@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-danger text-white rounded-top-4 fw-bold fs-5">
                    <i class="bi bi-envelope-paper-fill me-2"></i> Reset Password
                </div>

                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success rounded-pill text-center">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email"
                                class="form-control rounded-pill @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <!-- Tombol Kembali -->
                            <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg rounded-pill shadow-sm">
                                <i class="bi bi-arrow-left-circle-fill me-2"></i> Kembali
                            </a>

                            <!-- Tombol Kirim -->
                            <button type="submit" class="btn btn-danger btn-lg rounded-pill shadow-sm">
                                <i class="bi bi-send-check-fill me-2"></i> Kirim Link Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
