<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - PT Solusi Koneksi Anda</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .sidebar { background-color: #ffffff; min-height: 100vh; }
        .nav-link.active { background-color: #0a3663 !important; color: white !important; }
        .nav-link:hover:not(.active) { background-color: #f1f3f5; color: #0a3663; }
        
        /* Tambahan agar saat di HP sidebar muncul rapi sebagai dropdown/toggle */
        @media (max-width: 767.98px) {
            .sidebar {
                min-height: auto;
            }
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <!-- NAVBAR KHUSUS MOBILE (DENGAN TOMBOL HAMBURGER) -->
    <div class="row d-md-none bg-white border-bottom p-3 align-items-center">
        <div class="col-6">
            <img src="{{ asset('images/logobiru.jpg') }}" alt="Logo" style="height: 28px; width: auto; object-fit: contain;">
        </div>
        <div class="col-6 text-end">
            <button class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list fs-4"></i> Menu
            </button>
        </div>
    </div>

    <div class="row">
        <!-- SIDEBAR DI KIRI (DIBERIKAN ID sidebarMenu AGAR BISA DI-TOGGLE) -->
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse border-end p-3 bg-white">
            <div class="position-sticky pt-3">
                <div class="text-center mb-4 pb-3 border-bottom d-none d-md-block">
                    <div class="d-flex align-items-center justify-content-center gap-2">
                        <img src="{{ asset('images/logobiru.jpg') }}" alt="Logo PT Solusi Koneksi Anda" style="height: 32px; width: auto; object-fit: contain;">
                    </div>
                </div>

                <ul class="nav flex-column gap-1">
                    <li class="nav-item">
                        <a href="{{ url('/admin/dashboard') }}" class="nav-link text-dark rounded-3 py-2 px-3 fw-semibold {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                            <i class="bi bi-speedometer2 me-2"></i> Dasbor
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('produk.index') }}" class="nav-link text-dark rounded-3 py-2 px-3 fw-semibold {{ Request::is('admin/produk*') ? 'active' : '' }}">
                            <i class="bi bi-box-seam me-2"></i> Produk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('artikel.index') }}" class="nav-link text-dark rounded-3 py-2 px-3 fw-semibold {{ Request::is('admin/artikel*') ? 'active' : '' }}">
                            <i class="bi bi-newspaper me-2"></i> Artikel
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('galeri.index') }}" class="nav-link text-dark rounded-3 py-2 px-3 fw-semibold {{ Request::is('admin/galeri*') ? 'active' : '' }}">
                            <i class="bi bi-images me-2"></i> Galeri
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kontak.index') }}" class="nav-link text-dark rounded-3 py-2 px-3 fw-semibold {{ Request::is('admin/kontak*') ? 'active' : '' }}">
                            <i class="bi bi-envelope-paper me-2"></i> Kontak Masuk
                        </a>
                    </li>
                    <hr class="my-2">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" target="_blank" class="nav-link text-success rounded-3 py-2 px-3 fw-semibold">
                            <i class="bi bi-globe me-2"></i> Lihat Website
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ url('/admin/logout') }}" method="POST" class="mt-1">
                            @csrf
                            <button type="submit" class="nav-link text-danger bg-transparent border-0 rounded-3 py-2 px-3 w-100 text-start fw-semibold">
                                <i class="bi bi-box-arrow-right me-2"></i> Keluar
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- KONTEN UTAMA DI KANAN -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <!-- AREA DINAMIS KONTEN HALAMAN ADMIN -->
            @yield('admin_content')
        </main>
    </div>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>