<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <style>
        :root {
            --primary-color: #800000;      /* Maroon */
            --secondary-color: #4b0000;    /* Dark Maroon */
            --primary-color-light: #b22222; /* Slightly lighter maroon */
            --text-on-primary: #ffffff;
        }

        /* Navbar Custom Styles Merah Maroon */
        .navbar-custom {
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 4px 10px rgba(75, 0, 0, 0.7);
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: var(--text-on-primary);
            font-weight: 600;
            transition: color 0.3s ease;
        }
        .navbar-custom .nav-link:hover,
        .navbar-custom .nav-link:focus {
            color: var(--primary-color-light);
        }
        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.3);
        }
        .navbar-toggler-icon {
            filter: invert(1);
        }

        /* Override Bootstrap btn-primary jadi maroon */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: var(--text-on-primary);
        }

        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active,
        .btn-primary.active,
        .show > .btn-primary.dropdown-toggle {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            color: var(--text-on-primary);
        }

        /* Tombol outline primary (misal btn-outline-primary) */
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover,
        .btn-outline-primary:focus {
            background-color: var(--primary-color-light);
            color: var(--text-on-primary);
            border-color: var(--primary-color-light);
        }

        /* Card header dengan bg-primary jadi maroon */
        .bg-primary {
            background-color: var(--primary-color) !important;
            color: var(--text-on-primary) !important;
        }
    </style>
</head>
<body>
    <main class="py-5">
        @yield('content')
    </main>
</body>
</html>
