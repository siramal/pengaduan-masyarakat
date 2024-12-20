<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Pengaduan Masyarakat') }}</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            margin-bottom: 20px;
        }
        /* Layout dasar */
html, body {
    height: 100%;  /* Memastikan elemen ini mengisi seluruh tinggi layar */
    margin: 0;     /* Menghapus margin default */
}

#app {
    display: flex;
    flex-direction: column;
    min-height: 100vh;  /* Memastikan tinggi minimal 100% dari layar */
}

.main-content {
    flex-grow: 1; /* Konten utama akan mengisi ruang yang tersedia */
}

footer {
    background-color: #333;  /* Ganti dengan warna yang sesuai */
    color: white;             /* Ganti dengan warna teks yang sesuai */
    text-align: center;
    padding: 20px;
    width: 100%;
}

    </style>
</head>
<body>

    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">Pengaduan Masyarakat</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('articles') }}">Artikel</a>
                        </li>
                      <li>
                        <a class="nav-link" href="{{ route('report.myreport') }}">Pengaduan saya</a>
                      </li>
                        {{-- @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @endauth --}}
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Konten Utama -->
        <div class="main-content">
            @yield('content')
        </div>

        <!-- Footer -->
        <footer>
            <p>&copy; 2024 Pengaduan Masyarakat. All Rights Reserved.</p>
        </footer>
    </div>

</body>
</html>
