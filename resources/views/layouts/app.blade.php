<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Solusi Koneksi Anda</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        .bg-primary-custom { background-color: #0a3663 !important; }
        .text-primary-custom { color: #0a3663 !important; }
        .btn-primary-custom { background-color: #0d6efd; border-color: #0d6efd; color: white; }
        .btn-primary-custom:hover { background-color: #0b5ed7; border-color: #0a58ca; }

        /* Efek tebal/aktif pada menu navbar */
        .navbar-nav .nav-link.active {
            font-weight: bold !important;
            color: #ffffff !important;
                text-decoration: underline;
                text-decoration-thickness: 2px;
                text-underline-offset: 8px;
        }
    </style>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary-custom sticky-top shadow py-3">
        <div class="container">
            <!-- Logo sekarang mengarah langsung ke halaman login -->
            <a class="navbar-brand fw-bold text-white fs-5 d-flex align-items-center" href="{{ route('login') }}" title="Klik untuk Login Admin">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo PT Solusi Koneksi Anda" class="me-2" style="height: 40px; width: auto; object-fit: contain;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Buka menu navigasi">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-lg-3 align-items-lg-center mt-3 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->is('profil*') ? 'active' : '' }}" href="{{ url('/profil') }}">Profil Perusahaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->is('produk*') ? 'active' : '' }}" href="{{ url('/produk') }}">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->is('artikel*') ? 'active' : '' }}" href="{{ url('/artikel') }}">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->is('galeri*') ? 'active' : '' }}" href="{{ url('/galeri') }}">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->is('kontak*') ? 'active' : '' }}" href="{{ url('/kontak') }}">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content Section -->
    <main class="py-0 flex-grow-1 overflow-x-hidden">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-primary-custom text-white text-center py-4 mt-auto">
        <div class="container">
            <p class="mb-1">&copy; 2026 PT Solusi Koneksi Anda. Dibuat Oleh PT Edukasi4id.</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>