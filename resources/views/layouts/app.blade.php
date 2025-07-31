<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🍽️ Pilihan Makanan Lezat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts: Poppins dan Pacifico -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            background: #fffaf4;
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            background-color: #ffe8dc;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }
        .navbar-brand {
            font-family: 'Pacifico', cursive;
            font-size: 1.8rem;
            color: #ff7043 !important;
        }
        .nav-link {
            color: #6c4f3d !important;
            font-weight: 500;
        }
        .nav-link:hover {
            color: #d35400 !important;
        }
        .btn-primary {
            background-color: #ff7043;
            border-color: #f4511e;
            font-weight: 500;
            border-radius: 1rem;
        }
        .alert-success {
            background-color: #d7f4e3;
            border-color: #b2e2c9;
            color: #2e7d32;
        }
        footer {
            background-color: #ffe8dc;
            padding: 1rem 0;
            text-align: center;
            color: #8b5e3c;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">🍰 Makanan Lezat</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-3">
                    @auth
                        <li class="nav-item"><a class="nav-link" href="/contents">🍱 Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="/categories">🗂️ Kategori</a></li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-link nav-link" type="submit">🚪 Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">🔐 Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">📝 Register</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mb-5">
        @if(session('success'))
            <div class="alert alert-success text-center rounded-pill shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- <footer>
        🍡 Dibuat dengan rasa dan cinta oleh <strong>Makanan Lezat</strong> • 2025
    </footer> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
