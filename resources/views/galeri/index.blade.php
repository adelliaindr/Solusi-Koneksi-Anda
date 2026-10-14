@extends('layouts.app')

@section('content')
<!-- HERO SECTION -->
<section
    class="text-white text-center d-flex align-items-center justify-content-center m-0"
    style="background: linear-gradient(rgba(10, 54, 99, 0.8), rgba(10, 54, 99, 0.8)), url('{{ asset('images/gedung-kantor.jpg') }}') center center / cover no-repeat; min-height: 79vh;">

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

<!-- TOP NAVIGATION BAR / KATEGORI GALERI -->
<section class="bg-white border-bottom py-3 shadow-sm sticky-top m-0" style="top: 66px; z-index: 1019;">
    <div class="container">
        <ul class="nav nav-pills justify-content-center flex-nowrap overflow-auto gap-2 py-1">
            <li class="nav-item">
                <a class="nav-link rounded-pill px-4 fw-semibold {{ request('kategori') == '' ? 'active bg-primary text-white' : 'text-dark border' }}" href="{{ url('/galeri') }}">Semua</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-pill px-4 fw-semibold {{ request('kategori') == 'jaringan' ? 'active bg-primary text-white' : 'text-dark border' }}" href="{{ url('/galeri?kategori=jaringan') }}">Infrastruktur & Jaringan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-pill px-4 fw-semibold {{ request('kategori') == 'kegiatan' ? 'active bg-primary text-white' : 'text-dark border' }}" href="{{ url('/galeri?kategori=kegiatan') }}">Kegiatan & Pelatihan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-pill px-4 fw-semibold {{ request('kategori') == 'fasilitas' ? 'active bg-primary text-white' : 'text-dark border' }}" href="{{ url('/galeri?kategori=fasilitas') }}">Fasilitas Kantor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-pill px-4 fw-semibold {{ request('kategori') == 'prestasi' ? 'active bg-primary text-white' : 'text-dark border' }}" href="{{ url('/galeri?kategori=prestasi') }}">Prestasi & Penghargaan</a>
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
                <!-- Dibungkus a href agar bisa diklik menuju halaman show -->
                <a href="{{ url('/galeri/' . $item->id) }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden card-hover">
                        @if($item->image)
                            <img src="{{ filter_var($item->image, FILTER_VALIDATE_URL) ? $item->image : asset('storage/' . $item->image) }}" class="card-img-top object-fit-cover" alt="{{ $item->title }}" style="height: 200px;">
                        @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-camera fs-1"></i>
                            </div>
                        @endif
                        
                        <div class="card-body p-3 d-flex flex-column">
                            <small class="text-muted d-block mb-1" style="font-size: 0.8rem;">
                                <i class="bi bi-clock me-1"></i> {{ $item->created_at->translatedFormat('d F Y') }}
                            </small>
                            <h6 class="fw-bold text-dark mb-2">{{ Str::limit($item->title, 35) }}</h6>
                            <p class="card-text text-muted small flex-grow-1 mb-2">{{ Str::limit($item->description ?? '', 60) }}</p>
                            
                            @if(isset($item->kategori))
                                <div>
                                    <span class="badge bg-secondary text-capitalize">{{ $item->kategori }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </a>
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