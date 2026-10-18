@extends('layouts.app')

@section('content')

@php
    // Kategori produk: label tampil => nilai filter
    $kategoriList = [
        'Infrastruktur Jaringan'        => 'infrastruktur jaringan',
        'Telekomunikasi & Konektivitas' => 'telekomunikasi & konektivitas',
        'Solusi Teknologi Informasi'    => 'solusi teknologi informasi',
    ];
    $kategoriAktif = strtolower(trim((string) request('kategori', '')));

    $manfaat = [
        ['icon' => 'bi-shield-check',  'judul' => 'Keandalan Tinggi & Uptime', 'teks' => 'Infrastruktur dirancang untuk meminimalisir gangguan dan menjaga kelangsungan bisnis 24/7.'],
        ['icon' => 'bi-headset',       'judul' => 'Dukungan Tim Ahli',         'teks' => 'Didukung oleh teknisi tersertifikasi yang sigap menangani kendala teknis di lapangan maupun jarak jauh.'],
        ['icon' => 'bi-graph-up-arrow','judul' => 'Skalabilitas Usaha',        'teks' => 'Sistem yang fleksibel dan mudah ditingkatkan kapasitasnya seiring berkembangnya skala perusahaan Anda.'],
    ];

    $alur = [
        ['judul' => 'Konsultasi Kebutuhan',   'teks' => 'Hubungi tim kami untuk menyampaikan kendala atau spesifikasi kebutuhan jaringan Anda.'],
        ['judul' => 'Survei & Penawaran',     'teks' => 'Tim teknis melakukan analisis lokasi dan menyusun skema penawaran terbaik.'],
        ['judul' => 'Implementasi & Instalasi','teks' => 'Pengerjaan proyek sesuai standar operasional ketat dan protokol K3.'],
        ['judul' => 'Maintenance & Dukungan', 'teks' => 'Monitoring berkala dan layanan purna jual berkelanjutan (NOC 24/7).'],
    ];
@endphp

<style>
    .card-hover { transition: transform .2s ease, box-shadow .2s ease; }
    .card-hover:hover { transform: translateY(-4px); box-shadow: 0 .75rem 1.5rem rgba(0, 0, 0, .1) !important; }
</style>

<!-- HEADER HALAMAN PRODUK -->
<section
    class="text-white text-center d-flex align-items-center justify-content-center mb-0"
    style="background: linear-gradient(rgba(10, 54, 99, 0.8), rgba(10, 54, 99, 0.8)), url('{{ asset('images/gedung-kantor.jpg') }}') center center / cover no-repeat; min-height: 50vh;">

    <div class="container py-5">
        <nav aria-label="breadcrumb" class="d-flex justify-content-center">
            <ol class="breadcrumb mb-3" style="--bs-breadcrumb-divider-color: rgba(255,255,255,.6);">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}" class="text-white text-decoration-none fw-semibold">
                        <i class="bi bi-house-door-fill me-1"></i>Beranda
                    </a>
                </li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Produk</li>
            </ol>
        </nav>
        <h1 class="display-4 fw-bold mb-3">Produk / Layanan Kami</h1>
        <p class="lead col-lg-8 mx-auto mb-0">
            Solusi infrastruktur jaringan dan teknologi terdepan untuk mendukung produktivitas usaha Anda
        </p>
    </div>
</section>

<!-- KATEGORI PRODUK -->
<section class="bg-white border-bottom py-3 shadow-sm">
    <div class="container">
        <!-- justify-content-lg-center: di HP rata kiri agar semua tab bisa digeser/dijangkau -->
        <ul class="nav nav-pills justify-content-lg-center flex-nowrap overflow-auto gap-2 py-1">
            <li class="nav-item">
                <a class="nav-link rounded-pill px-4 fw-semibold text-nowrap {{ $kategoriAktif === '' ? 'active' : 'text-dark border' }}"
                   href="{{ url('/produk') }}">Semua</a>
            </li>
            @foreach($kategoriList as $label => $nilai)
            <li class="nav-item">
                <a class="nav-link rounded-pill px-4 fw-semibold text-nowrap {{ $kategoriAktif === $nilai ? 'active' : 'text-dark border' }}"
                   href="{{ url('/produk') . '?' . http_build_query(['kategori' => $nilai]) }}">{{ $label }}</a>
            </li>
            @endforeach
        </ul>
    </div>
</section>

<!-- KONTEN DAFTAR PRODUK -->
<div class="container py-5">
    <div class="row g-3 g-lg-4">
        @forelse($produk ?? [] as $item)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card card-hover h-100 shadow-sm border-0 rounded-4 overflow-hidden d-flex flex-column">
                @if($item->image)
                    <img src="{{ filter_var($item->image, FILTER_VALIDATE_URL) ? $item->image : asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}" style="height: 200px; object-fit: cover;">
                @else
                    <div class="bg-light text-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="bi bi-hdd-network display-4 text-muted"></i>
                    </div>
                @endif
                <div class="card-body d-flex flex-column p-4">
                    <!-- Badge Kategori -->
                    <div class="mb-2">
                        <span class="badge bg-primary bg-opacity-10 text-primary border-0 text-capitalize px-2 py-1">{{ $item->kategori ?? 'Umum' }}</span>
                    </div>

                    <h4 class="card-title fw-bold text-dark fs-5">{{ $item->name }}</h4>
                    <p class="card-text text-muted small flex-grow-1">{{ Str::limit($item->description, 90) }}</p>

                    @if($item->price)
                        <div class="mb-3">
                            <span class="badge bg-success fs-6">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                        </div>
                    @endif

                    <div class="d-grid gap-2 mt-auto">
                        <a href="{{ url('/produk/' . $item->id) }}" class="btn btn-outline-primary btn-sm rounded-3">
                            <i class="bi bi-info-circle me-1"></i> Lihat Detail
                        </a>
                        <a href="{{ url('/kontak') }}" class="btn btn-primary btn-sm rounded-3">
                            <i class="bi bi-chat-dots me-1"></i> Pesan / Konsultasi
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <div class="p-4 p-md-5 bg-white rounded-4 shadow-sm border">
                <i class="bi bi-box-seam display-1 text-muted mb-3 d-block"></i>
                <h3 class="fw-bold text-dark fs-4">Belum Ada Produk atau Layanan dalam Kategori Ini</h3>
                <p class="text-muted col-lg-6 mx-auto mb-0">
                    Data produk dan layanan ini bersifat dinamis. Admin perusahaan dapat segera menambahkan daftar layanan melalui panel admin.
                </p>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if(isset($produk) && method_exists($produk, 'links'))
    <div class="d-flex justify-content-center mt-4">
        {{ $produk->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>

<!-- MANFAAT BAGI PELANGGAN -->
<section class="py-5 bg-white border-top">
    <div class="container py-lg-4">
        <div class="text-center mb-5">
            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-2">Keuntungan Mitra</span>
            <h2 class="fw-bold">Manfaat Layanan Bagi Pelanggan</h2>
            <p class="text-muted col-lg-6 mx-auto">Kami memastikan setiap solusi yang diberikan memberikan dampak positif langsung pada efisiensi operasional.</p>
        </div>
        <div class="row g-3 g-lg-4">
            @foreach($manfaat as $m)
            <div class="col-md-4">
                <div class="p-4 bg-light rounded-4 h-100 border-0">
                    <i class="bi {{ $m['icon'] }} text-primary fs-1 mb-3 d-block"></i>
                    <h5 class="fw-bold">{{ $m['judul'] }}</h5>
                    <p class="text-muted small mb-0">{{ $m['teks'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ALUR PENGERJAAN / PEMESANAN -->
<section class="py-5 bg-light border-top">
    <div class="container py-lg-4">
        <div class="text-center mb-5">
            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-2">Prosedur Kerja</span>
            <h2 class="fw-bold">Alur Pengerjaan &amp; Pemesanan</h2>
            <p class="text-muted col-lg-6 mx-auto">Langkah mudah dalam bermitra bersama PT Solusi Koneksi Anda.</p>
        </div>
        <div class="row g-3 g-lg-4 text-center">
            @foreach($alur as $langkah)
            <div class="col-sm-6 col-lg-3">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3 fw-bold fs-5" style="width: 48px; height: 48px;">{{ $loop->iteration }}</div>
                    <h6 class="fw-bold">{{ $langkah['judul'] }}</h6>
                    <p class="text-muted small mb-0">{{ $langkah['teks'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection