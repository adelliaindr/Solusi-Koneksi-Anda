@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- SIDEBAR DI KIRI -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-white sidebar collapse border-end min-vh-100 p-3">
            <div class="position-sticky pt-3">
                <!-- Logo & Judul Perusahaan -->
                <div class="text-center mb-4 pb-3 border-bottom">
                    <h5 class="fw-bold text-primary mb-0" style="color: #0a3663 !important;">
                        <i class="bi bi-hdd-network-fill me-2"></i>PT Solusi Koneksi Anda
                    </h5>
                </div>

                <!-- Menu Navigasi Sidebar -->
                <ul class="nav flex-column gap-1">
                    <li class="nav-item">
                        <a href="{{ url('/admin/dashboard') }}" class="nav-link active text-white rounded-3 py-2 px-3 fw-semibold" style="background-color: #0a3663;">
                            <i class="bi bi-speedometer2 me-2"></i> Dasbor
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('products.index') }}" class="nav-link text-dark rounded-3 py-2 px-3">
                            <i class="bi bi-box-seam me-2"></i> Produk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/galeri') }}" class="nav-link text-dark rounded-3 py-2 px-3">
                            <i class="bi bi-images me-2"></i> Galeri
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/artikel') }}" class="nav-link text-dark rounded-3 py-2 px-3">
                            <i class="bi bi-newspaper me-2"></i> Artikel
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/kontak') }}" class="nav-link text-dark rounded-3 py-2 px-3">
                            <i class="bi bi-envelope-paper me-2"></i> Kontak
                        </a>
                    </li>
                    <hr class="my-2">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" target="_blank" class="nav-link text-success rounded-3 py-2 px-3">
                            <i class="bi bi-globe me-2"></i> Lihat Website
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ url('/admin/logout') }}" method="POST" class="mt-1">
                            @csrf
                            <button type="submit" class="nav-link text-danger bg-transparent border-0 rounded-3 py-2 px-3 w-100 text-start">
                                <i class="bi bi-box-arrow-right me-2"></i> Keluar
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- KONTEN UTAMA DI KANAN -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4 bg-light">
            
            <!-- HEADER ATAS: JUDUL & PROFIL ADMIN -->
            <div class="d-flex justify-content-between align-items-center bg-white p-3 rounded-4 shadow-sm mb-4">
                <div>
                    <h4 class="fw-bold text-dark mb-0">Dasbor Admin</h4>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <!-- Profil Kosong (Avatar) -->
                    <div class="bg-secondary rounded-circle text-white d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                        <i class="bi bi-person-fill fs-5"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0 text-dark">Admin</h6>
                        <small class="text-muted" style="font-size: 0.8rem;">super admin</small>
                    </div>
                </div>
            </div>

            <!-- SELAMAT DATANG -->
            <div class="mb-4">
                <h3 class="fw-bold text-dark">Selamat datang di dasbor admin</h3>
                <p class="text-muted">Kelola konten website PT Solusi Koneksi Anda dengan mudah.</p>
            </div>

            <!-- 4 KARTU STATISTIK UTAMA -->
            <div class="row g-3 mb-4">
                <!-- Produk -->
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                        <div class="d-flex align-items-center mb-2">
                            <div class="bg-primary text-white p-3 rounded-3 me-3">
                                <i class="bi bi-box-seam fs-4"></i>
                            </div>
                            <div>
                                <span class="text-muted small">Produk</span>
                                <h3 class="fw-bold mb-0">{{ isset($totalProduk) ? $totalProduk : \App\Models\Produk::count() }}</h3>
                            </div>
                        </div>
                        <a href="{{ route('products.index') }}" class="text-decoration-none small text-primary fw-semibold mt-2 d-inline-block">
                            Lihat detail <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Artikel Terkini -->
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                        <div class="d-flex align-items-center mb-2">
                            <div class="bg-warning text-dark p-3 rounded-3 me-3">
                                <i class="bi bi-newspaper fs-4"></i>
                            </div>
                            <div>
                                <span class="text-muted small">Artikel Terkini</span>
                                <h3 class="fw-bold mb-0">{{ isset($totalArtikel) ? $totalArtikel : \App\Models\Artikel::count() }}</h3>
                            </div>
                        </div>
                        <a href="{{ url('/artikel') }}" class="text-decoration-none small text-warning fw-semibold mt-2 d-inline-block text-dark">
                            Lihat detail <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Galeri Kegiatan -->
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                        <div class="d-flex align-items-center mb-2">
                            <div class="bg-success text-white p-3 rounded-3 me-3">
                                <i class="bi bi-images fs-4"></i>
                            </div>
                            <div>
                                <span class="text-muted small">Galeri</span>
                                <h3 class="fw-bold mb-0">{{ isset($totalGaleri) ? $totalGaleri : \App\Models\Galeri::count() }}</h3>
                            </div>
                        </div>
                        <a href="{{ url('/galeri') }}" class="text-decoration-none small text-success fw-semibold mt-2 d-inline-block">
                            Lihat detail <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Pesan Masuk -->
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                        <div class="d-flex align-items-center mb-2">
                            <div class="bg-info text-white p-3 rounded-3 me-3">
                                <i class="bi bi-chat-dots fs-4"></i>
                            </div>
                            <div>
                                <span class="text-muted small">Pesan Masuk</span>
                                <h3 class="fw-bold mb-0">0</h3>
                            </div>
                        </div>
                        <a href="{{ url('/kontak') }}" class="text-decoration-none small text-info fw-semibold mt-2 d-inline-block">
                            Lihat detail <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- STATISTIK KUNJUNGAN & PESAN TERBARU -->
            <div class="row g-4 mb-4">
                <!-- Kiri: Statistik Kunjungan Website -->
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold text-dark mb-0">Statistik Kunjungan Website</h5>
                            <span class="badge bg-light text-muted border px-3 py-2 rounded-pill">7 hari terakhir</span>
                        </div>
                        <div class="py-4 text-center my-auto">
                            <h1 class="display-4 fw-bold text-primary">1,280</h1>
                            <p class="text-muted small mb-0"><i class="bi bi-graph-up-arrow text-success me-1"></i> Peningkatan kunjungan aktif minggu ini</p>
                        </div>
                    </div>
                </div>

                <!-- Kanan: Pesan Terbaru -->
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold text-dark mb-0">Pesan Terbaru</h5>
                            <a href="{{ url('/kontak') }}" class="text-decoration-none small fw-semibold text-primary">Lihat semua</a>
                        </div>
                        
                        <!-- List Pesan -->
                        <div class="d-flex flex-column gap-3">
                            <!-- Contoh Item Pesan (Bisa diloping dari database nanti) -->
                            <div class="d-flex align-items-start justify-content-between border-bottom pb-3">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1 text-dark" style="font-size: 0.95rem;">Budi Santoso</h6>
                                        <p class="text-muted small mb-0 text-truncate" style="max-width: 180px;">Halo, saya ingin bertanya mengenai layanan jaringan...</p>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <small class="text-muted d-block" style="font-size: 0.75rem;">10:30</small>
                                    <!-- Indikator belum dibaca (biru) / sudah dibaca (abu) -->
                                    <span class="badge bg-primary rounded-circle p-1 mt-1 d-inline-block" title="Belum dibaca"></span>
                                </div>
                            </div>

                            <div class="d-flex align-items-start justify-content-between">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1 text-dark" style="font-size: 0.95rem;">Siti Aminah</h6>
                                        <p class="text-muted small mb-0 text-truncate" style="max-width: 180px;">Terima kasih informasinya sangat membantu...</p>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <small class="text-muted d-block" style="font-size: 0.75rem;">Kemarin</small>
                                    <span class="badge bg-secondary rounded-circle p-1 mt-1 d-inline-block" title="Sudah dibaca"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ARTIKEL TERBARU & GALERI TERBARU -->
            <div class="row g-4">
                <!-- Kiri: Artikel Terbaru -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold text-dark mb-0">Artikel Terbaru</h5>
                            <a href="{{ url('/artikel') }}" class="text-decoration-none small fw-semibold text-primary">Lihat semua</a>
                        </div>
                        
                        <div class="d-flex flex-column gap-3">
                            @php
                                $latestArtikels = \App\Models\Artikel::latest()->take(3)->get();
                            @endphp

                            @forelse($latestArtikels as $art)
                                <div class="d-flex align-items-center gap-3 border-bottom pb-2">
                                    <img src="{{ filter_var($art->image, FILTER_VALIDATE_URL) ? $art->image : asset('storage/' . $art->image) }}" alt="Artikel" class="rounded object-fit-cover" style="width: 60px; height: 60px;">
                                    <div>
                                        <h6 class="fw-bold mb-1 text-dark" style="font-size: 0.9rem;">{{ Str::limit($art->title, 45) }}</h6>
                                        <small class="text-muted"><i class="bi bi-calendar3 me-1"></i> {{ $art->created_at->format('d M Y') }}</small>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted small text-center py-3">Belum ada artikel terbaru.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Kanan: Galeri Terbaru -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold text-dark mb-0">Galeri Terbaru</h5>
                            <a href="{{ url('/galeri') }}" class="text-decoration-none small fw-semibold text-primary">Lihat semua</a>
                        </div>

                        <!-- 4 Foto dari Kategori (diambil 1 1 fotonya) -->
                        <div class="row g-2">
                            @php
                                $latestGaleris = \App\Models\Galeri::latest()->take(4)->get();
                            @endphp

                            @forelse($latestGaleris as $gal)
                                <div class="col-6">
                                    <div class="position-relative rounded-3 overflow-hidden shadow-sm" style="height: 100px;">
                                        <img src="{{ filter_var($gal->image, FILTER_VALIDATE_URL) ? $gal->image : asset('storage/' . $gal->image) }}" alt="Galeri" class="w-100 h-100 object-fit-cover">
                                        <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-50 text-white p-1 text-center" style="font-size: 0.75rem;">
                                            {{ Str::limit($gal->title, 20) }}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center py-4 text-muted small">Belum ada foto galeri.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection