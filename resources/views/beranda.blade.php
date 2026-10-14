@extends('layouts.app')

@section('content')

<!-- 1. HERO SECTION -->
<section
    class="text-white text-center d-flex align-items-center justify-content-center"
    style="background: linear-gradient(rgba(10, 54, 99, 0.85), rgba(10, 54, 99, 0.85)), url('{{ asset('images/gedung-kantor.jpg') }}') center center / cover no-repeat; min-height: 75vh;">

    <div class="container py-5">
        <h1 class="display-4 fw-bold mb-3">
            PT Solusi Koneksi Anda
        </h1>

        <p class="lead col-lg-8 mx-auto mb-4">
            Menghubungkan masa depan bisnis Anda dengan infrastruktur
            jaringan, telekomunikasi, dan solusi IT terdepan yang handal.
        </p>

        <div class="d-flex justify-content-center gap-3">
            <a href="{{ url('/profil') }}" class="btn btn-primary btn-lg px-4 shadow rounded-3 fw-semibold">
                Pelajari Lebih Lanjut
            </a>
            <a href="https://wa.me/6289516430243" target="_blank" class="btn btn-outline-light btn-lg px-4 rounded-3 fw-semibold">
                <i class="bi bi-whatsapp me-2"></i>Konsultasi Gratis
            </a>
        </div>
    </div>
</section>

<!-- 2. STATISTIK & PENGALAMAN KERJA -->
<section class="py-4 bg-primary text-white shadow-sm">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-6 col-md-3">
                <h2 class="fw-bold display-6 mb-0">500+</h2>
                <p class="small text-white-50 mb-0">Klien Korporat</p>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="fw-bold display-6 mb-0">99.9%</h2>
                <p class="small text-white-50 mb-0">Uptime Network SLA</p>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="fw-bold display-6 mb-0">50+</h2>
                <p class="small text-white-50 mb-0">Kota Terjangkau</p>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="fw-bold display-6 mb-0">24/7</h2>
                <p class="small text-white-50 mb-0">Dukungan Teknis</p>
            </div>
        </div>
    </div>
</section>

<!-- 3. TENTANG KAMI / MENGENAL LEBIH DEKAT -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <!-- Baris 1: Teks + Info Kantor -->
        <div class="row align-items-center g-5 mb-5">
            <div class="col-lg-7">
                <span class="badge bg-primary mb-3 text-uppercase">Tentang Kami</span>
                <h2 class="fw-bold mb-3">Mengenal Lebih Dekat PT Solusi Koneksi Anda</h2>
                <p class="text-muted lh-lg mb-3">
                    PT Solusi Koneksi Anda adalah perusahaan penyedia infrastruktur jaringan telekomunikasi, solusi teknologi informasi, dan layanan konektivitas digital. Kami berkomitmen mempercepat transformasi digital bagi dunia usaha di Indonesia melalui layanan yang handal, aman, dan berstandar tinggi.
                </p>
                <p class="text-muted lh-lg mb-4">
                    Didukung tenaga ahli berpengalaman di bidang teknik jaringan, manajemen sistem IT, dan pelayanan pelanggan profesional.
                </p>
                <a href="{{ url('/profil') }}" class="btn btn-primary px-4 rounded-3 fw-semibold">
                    Lihat Profil Lengkap <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="col-lg-5">
                <div class="card border-0 shadow-sm bg-light rounded-4">
                    <div class="card-body p-4 p-lg-5 text-center">
                        <i class="bi bi-building-fill-gear text-primary display-3 d-block mb-3"></i>
                        <h5 class="fw-bold mb-2">Kantor Pusat</h5>
                        <p class="text-muted mb-0 lh-base">
                            Jl. Raya Pajajaran No. 88 F<br>
                            Kota Bogor, Jawa Barat 16153
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Baris 2: Visi, Misi, Komitmen -->
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <div class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center mb-3" style="width: 56px; height: 56px;">
                            <i class="bi bi-eye-fill fs-3"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Visi</h5>
                        <p class="text-muted mb-0">
                            Menjadi penyedia layanan koneksi dan infrastruktur IT terdepan dan terpercaya di Indonesia.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <div class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center mb-3" style="width: 56px; height: 56px;">
                            <i class="bi bi-rocket-takeoff-fill fs-3"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Misi</h5>
                        <p class="text-muted mb-0">
                            Memberikan layanan jaringan yang stabil dan aman, inovasi teknologi, serta pelayanan profesional.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <div class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center mb-3" style="width: 56px; height: 56px;">
                            <i class="bi bi-shield-check fs-3"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Komitmen</h5>
                        <p class="text-muted mb-0">
                            Standar K3, protokol operasional yang ketat, dan kemitraan strategis demi hasil terbaik.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. KEUNGGULAN PERUSAHAAN (WHY CHOOSE US) -->
<section class="py-5 bg-light border-top">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-2">Mengapa Memilih Kami</span>
            <h3 class="fw-bold">Keunggulan PT Solusi Koneksi Anda</h3>
            <p class="text-muted col-lg-6 mx-auto">Kami memberikan jaminan standar tinggi dalam setiap instalasi dan pemeliharaan infrastruktur jaringan.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100 text-center">
                    <i class="bi bi-speedometer2 text-primary fs-1 mb-3 d-block"></i>
                    <h6 class="fw-bold">Koneksi Berkecepatan Tinggi</h6>
                    <p class="text-muted small mb-0">Dukungan infrastruktur Fiber Optic dan Dedicated Bandwidth tanpa throttling.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100 text-center">
                    <i class="bi bi-headset text-primary fs-1 mb-3 d-block"></i>
                    <h6 class="fw-bold">Dukungan Teknis 24/7</h6>
                    <p class="text-muted small mb-0">Tim NOC profesional siap membantu memantau dan menangani kendala teknis kapan saja.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100 text-center">
                    <i class="bi bi-shield-lock-fill text-primary fs-1 mb-3 d-block"></i>
                    <h6 class="fw-bold">Keamanan Terjamin</h6>
                    <p class="text-muted small mb-0">Proteksi firewall bertingkat dan enkripsi data untuk menjaga privasi jaringan bisnis Anda.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100 text-center">
                    <i class="bi bi-award-fill text-primary fs-1 mb-3 d-block"></i>
                    <h6 class="fw-bold">Garansi SLA 99.9%</h6>
                    <p class="text-muted small mb-0">Komitmen stabilitas sistem yang diprioritaskan demi keberlangsungan bisnis Anda.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. PRODUK ATAU LAYANAN -->
<section class="py-5 bg-white border-top">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold m-0">Produk atau Layanan</h3>
                <p class="text-muted small mb-0">Solusi terintegrasi untuk kebutuhan konektivitas bisnis Anda.</p>
            </div>
            <a href="{{ url('/produk') }}" class="btn btn-outline-primary btn-sm text-nowrap rounded-3 fw-semibold">Lihat Semua <i class="bi bi-arrow-right"></i></a>
        </div>
        
        <div class="row">
            @forelse($produks ?? [] as $item)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden d-flex flex-column">
                    @if($item->image)
                        <img src="{{ filter_var($item->image, FILTER_VALIDATE_URL) ? $item->image : asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}" style="height: 160px; object-fit: cover;">
                    @else
                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 160px;">
                            <i class="bi bi-box-seam fs-1"></i>
                        </div>
                    @endif
                    <div class="card-body d-flex flex-column p-3">
                        @if(isset($item->category) || isset($item->kategori))
                            <div class="mb-2">
                                <span class="badge bg-primary bg-opacity-10 text-primary px-2 py-1 rounded" style="font-size: 0.75rem;">
                                    {{ $item->category ?? $item->kategori }}
                                </span>
                            </div>
                        @endif
                        <h5 class="card-title fw-bold fs-6 mb-2">{{ $item->name }}</h5>
                        <p class="card-text text-muted small flex-grow-1 mb-0">{{ Str::limit($item->description, 70) }}</p>
                    </div>
                </div>
            </div>
            @empty
            @for($i = 1; $i <= 4; $i++)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-0 bg-light rounded-3 overflow-hidden">
                    <div class="bg-white text-secondary d-flex align-items-center justify-content-center border-bottom" style="height: 160px;">
                        <i class="bi bi-image fs-2 text-muted"></i>
                    </div>
                    <div class="card-body text-center py-4">
                        <span class="badge bg-secondary mb-2" style="font-size: 0.7rem;">Kategori</span>
                        <h6 class="text-muted fw-semibold">Layanan / Produk #{{ $i }}</h6>
                        <p class="text-muted small mb-0">Akan segera diisi melalui panel admin.</p>
                    </div>
                </div>
            </div>
            @endfor
            @endforelse
        </div>
    </div>
</section>

<!-- 6. GALERI KEGIATAN -->
<section class="py-5 bg-light border-top">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold m-0">Galeri Kegiatan</h3>
                <p class="text-muted small mb-0">Dokumentasi operasional, pengerjaan instalasi, dan aktivitas tim.</p>
            </div>
            <a href="{{ url('/galeri') }}" class="btn btn-outline-primary btn-sm text-nowrap rounded-3 fw-semibold">Lihat Semua <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="row">
            @forelse($galeris ?? [] as $galeri)
            <div class="col-md-3 mb-4">
                <a href="{{ route('galeri.show', $galeri->id) }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                        @if($galeri->image)
                            <img src="{{ filter_var($galeri->image, FILTER_VALIDATE_URL) ? $galeri->image : asset('storage/' . $galeri->image) }}" class="card-img-top" alt="{{ $galeri->title }}" style="height: 160px; object-fit: cover;">
                        @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 160px;">
                                <i class="bi bi-camera fs-1"></i>
                            </div>
                        @endif
                        <div class="card-body p-3 text-center">
                            @if(isset($galeri->category) || isset($galeri->kategori))
                                <span class="badge bg-success bg-opacity-10 text-success px-2 py-1 rounded mb-2 d-inline-block" style="font-size: 0.7rem;">
                                    {{ $galeri->category ?? $galeri->kategori }}
                                </span>
                            @endif
                            <small class="text-muted d-block mb-1" style="font-size: 0.75rem;">
                                <i class="bi bi-clock me-1"></i> {{ $galeri->created_at->format('d M Y') }}
                            </small>
                            <h6 class="fw-semibold text-dark mb-0 text-truncate">{{ $galeri->title }}</h6>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            @for($i = 1; $i <= 4; $i++)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-0 bg-white rounded-3 overflow-hidden">
                    <div class="d-flex align-items-center justify-content-center text-muted border-bottom bg-light" style="height: 160px;">
                        <i class="bi bi-camera-fill fs-2"></i>
                    </div>
                    <div class="card-body text-center py-3">
                        <span class="badge bg-secondary mb-1" style="font-size: 0.65rem;">Album</span>
                        <small class="text-muted d-block">Dokumentasi Kegiatan #{{ $i }}</small>
                    </div>
                </div>
            </div>
            @endfor
            @endforelse
        </div>
    </div>
</section>

<!-- 7. ARTIKEL TERKINI -->
<section class="py-5 bg-white border-top">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold m-0">Artikel Terkini</h3>
                <p class="text-muted small mb-0">Berita, edukasi teknologi, dan informasi terbaru dari perusahaan.</p>
            </div>
            <a href="{{ url('/artikel') }}" class="btn btn-outline-primary btn-sm text-nowrap rounded-3 fw-semibold">Lihat Semua <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="row">
            @forelse($artikels ?? [] as $artikel)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden d-flex flex-column">
                    @if(isset($artikel->image) && $artikel->image)
                        <img src="{{ filter_var($artikel->image, FILTER_VALIDATE_URL) ? $artikel->image : asset('storage/' . $artikel->image) }}" class="card-img-top" alt="{{ $artikel->title }}" style="height: 140px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column p-3">
                        @if(isset($artikel->category) || isset($artikel->kategori))
                            <div class="mb-2">
                                <span class="badge bg-warning bg-opacity-10 text-dark px-2 py-1 rounded" style="font-size: 0.75rem;">
                                    {{ $artikel->category ?? $artikel->kategori }}
                                </span>
                            </div>
                        @endif
                        <small class="text-muted mb-2" style="font-size: 0.75rem;">
                            <i class="bi bi-calendar3 me-1"></i> {{ $artikel->created_at->format('d M Y') }}
                        </small>
                        <h5 class="card-title fw-bold fs-6 text-dark mb-2">{{ Str::limit($artikel->title, 45) }}</h5>
                        <p class="card-text text-muted small flex-grow-1 mb-0">{{ Str::limit($artikel->content ?? $artikel->description ?? '', 70) }}</p>
                    </div>
                </div>
            </div>
            @empty
            @for($i = 1; $i <= 4; $i++)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-0 bg-light rounded-3 overflow-hidden">
                    <div class="card-body p-3">
                        <span class="badge bg-secondary mb-2" style="font-size: 0.7rem;">Berita</span>
                        <h6 class="fw-bold text-dark fs-6">Judul Artikel Terkini #{{ $i }}</h6>
                        <p class="text-muted small mb-0">Informasi seputar perkembangan teknologi jaringan dan tips bisnis akan muncul di sini.</p>
                    </div>
                </div>
            </div>
            @endfor
            @endforelse
        </div>
    </div>
</section>

<!-- 8. MITRA & KLIEN STRATEGIS -->
<section class="py-5 bg-light border-top text-center">
    <div class="container">
        <h5 class="fw-bold text-muted mb-4 text-uppercase tracking-wide">Dipercaya Oleh Berbagai Perusahaan & Instansi</h5>
        <div class="row align-items-center justify-content-center g-4 opacity-75">
            <div class="col-6 col-md-2">
                <div class="p-3 bg-white rounded-3 shadow-sm border d-flex align-items-center justify-content-center" style="height: 80px;">
                    <img src="{{ asset('images/logo_klien_a.jpg') }}" alt="Logo Klien A" class="img-fluid" style="max-height: 40px; object-fit: contain;">
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="p-3 bg-white rounded-3 shadow-sm border d-flex align-items-center justify-content-center" style="height: 80px;">
                    <img src="{{ asset('images/logo_klien_b.jpg') }}" alt="Logo Klien B" class="img-fluid" style="max-height: 40px; object-fit: contain;">
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="p-3 bg-white rounded-3 shadow-sm border d-flex align-items-center justify-content-center" style="height: 80px;">
                    <img src="{{ asset('images/logo_klien_a.jpg') }}" alt="Logo Klien C" class="img-fluid" style="max-height: 40px; object-fit: contain;">
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="p-3 bg-white rounded-3 shadow-sm border d-flex align-items-center justify-content-center" style="height: 80px;">
                    <img src="{{ asset('images/logo_klien_a.jpg') }}" alt="Logo Klien D" class="img-fluid" style="max-height: 40px; object-fit: contain;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 9. BANNER CALL TO ACTION (CTA) KONSULTASI -->
<section class="py-5 bg-primary text-white text-center">
    <div class="container py-3">
        <h3 class="fw-bold mb-3">Siap Mengembangkan Jaringan Bisnis Anda?</h3>
        <p class="lead col-lg-8 mx-auto mb-4">Konsultasikan kebutuhan infrastruktur telekomunikasi dan jaringan perusahaan Anda dengan tim konsultan ahli kami sekarang.</p>
        <a href="https://wa.me/6289516430243" target="_blank" class="btn btn-light text-primary btn-lg px-4 rounded-3 fw-bold shadow">
            <i class="bi bi-whatsapp me-2"></i> Hubungi Tim Sales Via WhatsApp
        </a>
    </div>
</section>

@endsection