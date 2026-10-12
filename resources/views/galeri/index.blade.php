@extends('layouts.app')

@section('content')
<!-- HERO SECTION -->
<section class="hero-section text-white py-5 position-relative" style="background: linear-gradient(rgba(10, 54, 99, 0.85), rgba(10, 54, 99, 0.85)), url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1920&q=80') no-repeat center center; background-size: cover; min-height: 250px;">
    <div class="container py-3">
        <!-- Breadcrumb Navigasi Kiri Atas -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}" class="text-white text-decoration-none fw-semibold">
                        <i class="bi bi-house-door-fill me-1"></i>Beranda
                    </a>
                </li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Galeri</li>
            </ol>
        </nav>

        <!-- Judul & Sub-judul Hero -->
        <h1 class="display-5 fw-bold mb-2">Galeri Foto</h1>
        <p class="lead mb-0">Dokumentasi kegiatan, fasilitas, jaringan infrastruktur, dan momen berharga di PT Solusi Koneksi Anda.</p>
    </div>
</section>

<!-- TOP NAVIGATION BAR / KATEGORI GALERI -->
<section class="bg-white border-bottom py-3 shadow-sm sticky-top" style="top: 56px; z-index: 1020;">
    <div class="container">
        <ul class="nav nav-pills justify-content-center flex-nowrap overflow-auto gap-2 py-1">
            <li class="nav-item">
                <a class="nav-link {{ request('kategori') == '' ? 'active bg-primary' : 'text-dark border' }}" href="{{ url('/galeri') }}">Semua</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request('kategori') == 'jaringan' ? 'active bg-primary' : 'text-dark border' }}" href="{{ url('/galeri?kategori=jaringan') }}">Infrastruktur & Jaringan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request('kategori') == 'kegiatan' ? 'active bg-primary' : 'text-dark border' }}" href="{{ url('/galeri?kategori=kegiatan') }}">Kegiatan & Pelatihan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request('kategori') == 'fasilitas' ? 'active bg-primary' : 'text-dark border' }}" href="{{ url('/galeri?kategori=fasilitas') }}">Fasilitas Kantor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request('kategori') == 'prestasi' ? 'active bg-primary' : 'text-dark border' }}" href="{{ url('/galeri?kategori=prestasi') }}">Prestasi & Penghargaan</a>
            </li>
        </ul>
    </div>
</section>

<!-- KONTEN ISI GALERI -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            @forelse($galeris ?? [] as $item)
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="bi bi-camera fs-1"></i>
                        </div>
                    @endif
                    <div class="card-body p-3 text-center">
                        <h6 class="fw-semibold text-dark mb-1">{{ $item->title }}</h6>
                        @if(isset($item->kategori))
                            <span class="badge bg-secondary text-capitalize">{{ $item->kategori }}</span>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <!-- Placeholder Jika Foto Masih Kosong / Belum Diisi Admin -->
            <div class="col-12 text-center py-5">
                <div class="p-5 bg-white rounded-4 shadow-sm border">
                    <i class="bi bi-images display-1 text-muted mb-3"></i>
                    <h4 class="fw-bold text-dark">Belum Ada Foto Galeri</h4>
                    <p class="text-muted col-lg-6 mx-auto mb-4">
                        Foto dokumentasi kegiatan dan fasilitas bersifat dinamis. Admin dapat mengunggah foto baru melalui panel admin.
                    </p>
                    <a href="{{ url('/admin/products') }}" class="btn btn-primary px-4 py-2">
                        <i class="bi bi-gear-fill me-1"></i> Ke Halaman Admin
                    </a>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination Galeri -->
        @if(method_exists($galeris ?? null, 'links'))
        <div class="d-flex justify-content-center mt-4">
            {{ $galeris->links() }}
        </div>
        @endif
    </div>
</section>
@endsection