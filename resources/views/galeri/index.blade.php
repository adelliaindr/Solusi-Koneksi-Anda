@extends('layouts.app')

@section('content')

@php
    // Kategori galeri: nilai filter => label tampil
    $tabs = [
        'jaringan'  => 'Infrastruktur & Jaringan',
        'kegiatan'  => 'Kegiatan & Pelatihan',
        'fasilitas' => 'Fasilitas Kantor',
        'prestasi'  => 'Prestasi & Penghargaan',
    ];
    $aktif = strtolower(trim((string) request('kategori', '')));
@endphp

<style>
    .card-hover { transition: transform .2s ease, box-shadow .2s ease; }
    .card-hover:hover { transform: translateY(-4px); box-shadow: 0 .75rem 1.5rem rgba(0, 0, 0, .1) !important; }
</style>

<!-- HERO SECTION -->
<section
    class="text-white text-center d-flex align-items-center justify-content-center m-0"
    style="background: linear-gradient(rgba(10, 54, 99, 0.8), rgba(10, 54, 99, 0.8)), url('{{ asset('images/gedung-kantor.jpg') }}') center center / cover no-repeat; min-height: 50vh;">

    <div class="container py-5">
        <nav aria-label="breadcrumb" class="d-flex justify-content-center">
            <ol class="breadcrumb mb-3" style="--bs-breadcrumb-divider-color: rgba(255,255,255,.6);">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}" class="text-white text-decoration-none fw-semibold">
                        <i class="bi bi-house-door-fill me-1"></i>Beranda
                    </a>
                </li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Galeri</li>
            </ol>
        </nav>

        <h1 class="display-4 fw-bold mb-3">Galeri Foto</h1>
        <p class="lead col-lg-8 mx-auto mb-0">
            Dokumentasi kegiatan, fasilitas, jaringan infrastruktur, dan momen berharga di PT Solusi Koneksi Anda.
        </p>
    </div>
</section>

<!-- KATEGORI GALERI -->
<section class="bg-white border-bottom py-3 shadow-sm m-0">
    <div class="container">
        <!-- justify-content-lg-center: di HP rata kiri agar semua tab bisa digeser/dijangkau -->
        <ul class="nav nav-pills justify-content-lg-center flex-nowrap overflow-auto gap-2 py-1">
            <li class="nav-item">
                <a class="nav-link rounded-pill px-4 fw-semibold text-nowrap {{ $aktif === '' ? 'active' : 'text-dark border' }}"
                   href="{{ url('/galeri') }}">Semua</a>
            </li>
            @foreach($tabs as $key => $label)
            <li class="nav-item">
                <a class="nav-link rounded-pill px-4 fw-semibold text-nowrap {{ $aktif === $key ? 'active' : 'text-dark border' }}"
                   href="{{ url('/galeri') . '?' . http_build_query(['kategori' => $key]) }}">{{ $label }}</a>
            </li>
            @endforeach
        </ul>
    </div>
</section>

<!-- KONTEN ISI GALERI -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-3 g-lg-4">
            @forelse($galeris ?? [] as $item)
            <div class="col-6 col-lg-3">
                <!-- Dibungkus a href agar bisa diklik menuju halaman show -->
                <a href="{{ url('/galeri/' . $item->id) }}" class="text-decoration-none h-100 d-block">
                    <div class="card card-hover h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                        @if($item->image)
                            <img src="{{ filter_var($item->image, FILTER_VALIDATE_URL) ? $item->image : asset('storage/' . $item->image) }}" class="card-img-top object-fit-cover" alt="{{ $item->title }}" style="height: 200px;">
                        @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-camera fs-1"></i>
                            </div>
                        @endif

                        <div class="card-body p-3 d-flex flex-column">
                            <div class="text-muted small mb-2">
                                <i class="bi bi-calendar3 me-1"></i> {{ \Carbon\Carbon::parse($item->tanggal ?? $item->created_at)->format('d M Y') }}
                            </div>

                            <h6 class="fw-bold text-dark mb-2 text-break">{{ Str::limit($item->title, 35) }}</h6>

                            <!-- mt-auto mendorong badge ke dasar kartu supaya sejajar antar kartu -->
                            @if(isset($item->kategori))
                                <div class="mt-auto pt-2">
                                    <span class="badge bg-secondary text-capitalize">{{ $item->kategori }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <!-- Placeholder Jika Foto Masih Kosong / Belum Diisi Admin -->
            <div class="col-12 text-center">
                <div class="p-4 p-md-5 bg-white rounded-4 shadow-sm border">
                    <i class="bi bi-images display-1 text-muted mb-3 d-block"></i>
                    <h4 class="fw-bold text-dark">Belum Ada Foto Galeri</h4>
                    <p class="text-muted col-lg-6 mx-auto mb-0">
                        Foto dokumentasi kegiatan dan fasilitas bersifat dinamis. Admin dapat mengunggah foto baru melalui panel admin.
                    </p>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination Galeri -->
        @if(isset($galeris) && method_exists($galeris, 'links'))
        <div class="d-flex justify-content-center mt-4">
            {{ $galeris->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
        @endif
    </div>
</section>
@endsection