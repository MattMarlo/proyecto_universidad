<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación Laravel')</title>

    {{-- Bootstrap 5 CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-rXYl0lT1gY9h0l/8cO6Y9rYtJg1v8vQaNNq7Q/3c6R0t9Q0sHqX7Ndx0CZBxM0r2tn5A6u1u3PbbG5yX3aXRPQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    {{-- Fuente moderna --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .navbar-brand {
            font-weight: 600;
            color: #4b49ac !important;
        }
        .navbar-nav .nav-link {
            color: #333 !important;
            transition: color 0.3s ease;
        }
        .navbar-nav .nav-link:hover {
            color: #4b49ac !important;
        }
        main {
            padding-top: 100px;
            padding-bottom: 50px;
        }
        footer {
            background-color: #1e1e2f;
            color: #bbb;
            padding: 25px 0;
        }
        footer p {
            margin: 0;
        }
        .card-custom {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 16px rgba(0,0,0,0.15);
        }
    </style>

    @stack('styles')
</head>
<body>

    <!-- ===== HEADER ===== -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">SCHOOL MANAGEMENT 2025</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">MAIN</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('profesores.index') }}">PROFESSORS</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('carreras.index') }}">CAREERS</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ===== MAIN ===== -->
    <main class="container">
        @yield('content')
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="text-center">
        <div class="container">
            <p>&copy; {{ date('Y') }} <strong>UTC</strong> — ALL RIGHTS RESERVED</p>
        </div>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>
