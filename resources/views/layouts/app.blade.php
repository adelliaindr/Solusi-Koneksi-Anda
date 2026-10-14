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
    </style>
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary-custom sticky-top shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-white fs-5 d-flex align-items-center" href="{{ url('/') }}">
                <!-- Tambahkan tag img di sini -->
                 <img src="{{ asset('images/logo.jpg') }}" alt="Logo PT Solusi Koneksi Anda" class="me-2" style="height: 35px; width: auto; object-fit: contain;">
                </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-lg-auto gap-2 align-items-lg-center">
                    <li class="nav-item "><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/profil') }}">Profil Perusahaan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/produk') }}">Produk / Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/artikel') }}">Artikel</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/galeri') }}">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/kontak') }}">Kontak Kami</a></li>
                </ul>
                <a class="btn btn-outline-light btn-sm mt-1" href="{{ route('login') }}">
                    Masuk
                </a>
            </div>
        </div>
    </nav>

    <!-- Content Section -->
    <main class="py-0">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-primary-custom text-white text-center py-4">
        <div class="container">
            <p class="mb-1">&copy; 2026 PT Solusi Koneksi Anda. All rights reserved.</p>
            <small class="text-white">Didukung oleh PT Edukasi4id • Jl. Raya Pajajaran No. 88 F Kota Bogor</small>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>