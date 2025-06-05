<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>TMart - Sistem Informasi Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" />
    <style>
        :root {
            --primary-color: #800000;    
            --secondary-color: #4b0000;     
            --accent-color: #b22222;       
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }

        body {
            background-color: #f8fafc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark-color);
        }

        /* Navbar Custom Styles */
        .navbar-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 0.8rem 1rem;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
            display: flex;
            align-items: center;
        }

        .navbar-brand i {
            margin-right: 10px;
            font-size: 1.8rem;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            margin: 0 0.2rem;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        .nav-link:hover,
        .nav-link:focus {
            color: white !important;
            background-color: rgba(255, 255, 255, 0.15);
        }

        .nav-link.active {
            color: white !important;
            background-color: rgba(255, 255, 255, 0.2);
        }

        .nav-link i {
            margin-right: 8px;
            font-size: 1.1rem;
        }

        .logout-btn {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            border-radius: 30px;
            padding: 0.5rem 1.2rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        /* Main Content */
        .hero-section {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            margin-top: 2rem;
        }

        .feature-card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 12px;
            overflow: hidden;
            background-color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
            color: white;
            font-size: 28px;
        }

        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 40px;
            font-weight: 700;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(to right, var(--accent-color), var(--primary-color));
            border-radius: 2px;
        }

        footer {
            background: white;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            margin-top: 3rem;
        }

        /* Override tombol btn-primary supaya jadi merah maroon */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active,
        .btn-primary.active,
        .show > .btn-primary.dropdown-toggle {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            color: white;
        }

        /* Override btn-outline-primary jadi merah maroon */
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover,
        .btn-outline-primary:focus,
        .btn-outline-primary:active,
        .btn-outline-primary.active,
        .show > .btn-outline-primary.dropdown-toggle {
            background-color: var(--primary-color);
            border-color: var(--secondary-color);
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <i class="bi bi-shop"></i>
                TMart
            </a>

            <!-- Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Items -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Katalog -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-grid"></i>
                            Katalog
                        </a>
                    </li>

                    <!-- Akun -->
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">
                            <i class="bi bi-person-circle"></i>Akun
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Hero Section -->
                <div class="hero-section p-4 p-md-5 text-center">
                    <h1 class="display-5 fw-bold mb-3">Selamat Datang di TMart</h1>
                    <p class="lead mb-4">Selamat Datang di TMart dimana kebutuhan sehari hari anda ada disini</p>

                    <div class="d-grid gap-2 d-md-flex justify-content-center mt-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('index') }}" class="btn btn-primary btn-lg px-4 me-md-2">
                                    <i class="bi bi-cart"></i>Belanja
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4 me-md-2">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>Login
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg px-4">
                                        <i class="bi bi-person-plus me-2"></i>Register
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
