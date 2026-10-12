@extends('layouts.app')

@section('content')
<!-- 1. HERO SECTION (Background Foto Gedung Kantor) -->
<section class="hero-section text-white text-center d-flex align-items-center position-relative" style="background: linear-gradient(rgba(10, 54, 99, 0.8), rgba(10, 54, 99, 0.8)), url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1920&q=80') no-repeat center center; background-size: cover; min-height: 450px;">
    <div class="container py-5">
        <h1 class="display-4 fw-bold mb-3">PT Solusi Koneksi Anda</h1>
        <p class="lead col-lg-8 mx-auto mb-4">Menghubungkan masa depan bisnis Anda dengan infrastruktur jaringan, telekomunikasi, dan solusi IT terdepan yang handal.</p>
        <a href="{{ url('/profil') }}" class="btn btn-primary btn-lg px-4 shadow">Pelajari Lebih Lanjut</a>
    </div>
</section>

<!-- 2. TENTANG KAMI / MENGENAL LEBIH DEKAT -->
<section class="py-5 bg-white">
    <div class="container text-center py-3">
        <span class="text-primary fw-semibold text-uppercase tracking-wide">Tentang PT Solusi Koneksi Anda</span>
        <h2 class="fw-bold mb-4 mt-2">Mengenal Lebih Dekat PT Solusi Koneksi Anda</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <p class="text-muted fs-5 lh-base">
                    PT Solusi Koneksi Anda adalah perusahaan penyedia layanan teknologi informasi dan jaringan telekomunikasi terpercaya. Kami berdedikasi tinggi untuk membantu berbagai skala usaha dalam memperluas jangkauan operasional melalui sistem koneksi yang cepat, stabil, aman, dan efisien sesuai kebutuhan era digital modern.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- 3. PRODUK ATAU LAYANAN -->
<section class="py-5 bg-light border-top">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold m-0 mx-auto text-center">Produk atau Layanan PT Solusi Koneksi Anda</h3>
            <a href="{{ url('/produk') }}" class="btn btn-outline-primary btn-sm text-nowrap">Lihat Semua <i class="bi bi-arrow-right"></i></a>
        </div>
        
        <div class="row">
            @forelse($produks ?? [] as $item)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}" style="height: 160px; object-fit: cover;">
                    @else
                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 160px;">
                            <i class="bi bi-box-seam fs-1"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $item->name }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit($item->description, 80) }}</p>
                    </div>
                </div>
            </div>
            @empty
            <!-- 4 Kartu Placeholder Kosong Sebelum Admin Mengisi -->
            @for($i = 1; $i <= 4; $i++)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-0 bg-white">
                    <div class="bg-light text-secondary d-flex align-items-center justify-content-center border-bottom" style="height: 160px;">
                        <i class="bi bi-image fs-2 text-muted"></i>
                    </div>
                    <div class="card-body text-center py-4">
                        <h6 class="text-muted fw-semibold">Layanan / Produk #{{ $i }}</h6>
                        <p class="text-muted small mb-0">Akan segera diisi melalui panel admin setelah fitur CRUD aktif.</p>
                    </div>
                </div>
            </div>
            @endfor
            @endforelse
        </div>
    </div>
</section>

<!-- 4. GALERI KEGIATAN -->
<section class="py-5 bg-white border-top">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold m-0 mx-auto text-center">Galeri Kegiatan PT Solusi Koneksi Anda</h3>
            <a href="{{ url('/galeri') }}" class="btn btn-outline-primary btn-sm text-nowrap">Lihat Semua <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="row">
            @forelse($galeris ?? [] as $galeri)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset('storage/' . $galeri->image) }}" class="card-img-top" alt="{{ $galeri->title }}" style="height: 160px; object-fit: cover;">
                    <div class="card-body p-2 text-center">
                        <small class="fw-semibold text-dark">{{ $galeri->title }}</small>
                    </div>
                </div>
            </div>
            @empty
            <!-- 4 Kartu Placeholder Galeri -->
            @for($i = 1; $i <= 4; $i++)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-0 bg-light">
                    <div class="d-flex align-items-center justify-content-center text-muted" style="height: 160px;">
                        <i class="bi bi-camera-fill fs-2"></i>
                    </div>
                    <div class="card-body text-center py-3">
                        <small class="text-muted">Dokumentasi Kegiatan #{{ $i }}</small>
                    </div>
                </div>
            </div>
            @endfor
            @endforelse
        </div>
    </div>
</section>

<!-- 5. ARTIKEL TERKINI -->
<section class="py-5 bg-light border-top">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold m-0 mx-auto text-center">Artikel Terkini PT Solusi Koneksi Anda</h3>
            <a href="{{ url('/artikel') }}" class="btn btn-outline-primary btn-sm text-nowrap">Lihat Semua <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="row">
            @forelse($artikels ?? [] as $artikel)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title fw-bold fs-6">{{ $artikel->title }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit($artikel->content, 90) }}</p>
                    </div>
                </div>
            </div>
            @empty
            <!-- 4 Kartu Placeholder Artikel -->
            @for($i = 1; $i <= 4; $i++)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-0 bg-white">
                    <div class="card-body">
                        <span class="badge bg-secondary mb-2">Berita</span>
                        <h6 class="fw-bold text-dark">Judul Artikel Terkini #{{ $i }}</h6>
                        <p class="text-muted small mb-0">Informasi seputar perkembangan teknologi jaringan dan tips bisnis akan muncul di sini.</p>
                    </div>
                </div>
            </div>
            @endfor
            @endforelse
        </div>
    </div>
</section>

@endsection