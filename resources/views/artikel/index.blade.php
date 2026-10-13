@extends('layouts.app')

@section('content')
<!-- HERO SECTION -->
<section
    class="text-white text-center d-flex align-items-center justify-content-center mb-5"
    style="background: linear-gradient(rgba(10, 54, 99, 0.8), rgba(10, 54, 99, 0.8)), url('{{ asset('images/gedung-kantor.jpg') }}') center center / cover no-repeat; min-height: 100vh;">

    <div class="container py-5">
        <nav aria-label="breadcrumb" class="d-flex justify-content-center">
            <ol class="breadcrumb mb-3" style="--bs-breadcrumb-divider-color: rgba(255,255,255,.6);">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}" class="text-white text-decoration-none fw-semibold">
                        <i class="bi bi-house-door-fill me-1"></i>Beranda
                    </a>
                </li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Artikel</li>
            </ol>
        </nav>

        <h1 class="display-4 fw-bold mb-3">Artikel & Berita</h1>
        <p class="lead col-lg-8 mx-auto mb-0">
            Informasi terbaru seputar kegiatan, prestasi, dan informasi penting dari PT Solusi Koneksi Anda.
        </p>
    </div>
</section>

<!-- KONTEN ARTIKEL & BERITA -->
<section class="py-5 bg-light">
    <div class="container">
        <!-- Grid Artikel: 1 Baris = 3 Kolom (col-md-4) -->
        <div class="row">
            @forelse($artikels ?? [] as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 rounded-3">
                    <!-- Gambar Artikel -->
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="bi bi-newspaper fs-1"></i>
                        </div>
                    @endif

                    <div class="card-body d-flex flex-column p-4">
                        <!-- Tanggal Rilis -->
                        <div class="text-muted small mb-2">
                            <i class="bi bi-calendar3 me-1"></i> {{ $item->created_at ? $item->created_at->format('d M Y') : date('d M Y') }}
                        </div>

                        <!-- Judul Artikel -->
                        <h5 class="card-title fw-bold text-dark mb-2">{{ $item->title }}</h5>

                        <!-- Cuplikan Isi Artikel -->
                        <p class="card-text text-muted small flex-grow-1">
                            {{ Str::limit(strip_tags($item->content), 120) }}
                        </p>

                        <!-- Tombol Baca Selengkapnya -->
                        <div class="mt-3 pt-2 border-top">
                            <a href="{{ url('/artikel/' . $item->id) }}" class="btn btn-primary btn-sm w-100">
                                Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <!-- Placeholder jika belum ada data artikel dari Admin -->
            <div class="col-12 text-center py-5">
                <div class="p-5 bg-white rounded-4 shadow-sm border">
                    <i class="bi bi-journal-text display-1 text-muted mb-3"></i>
                    <h4 class="fw-bold text-dark">Belum Ada Artikel atau Berita</h4>
                    <p class="text-muted col-lg-6 mx-auto mb-4">
                        Data artikel bersifat dinamis dan dikelola melalui halaman admin. Silakan isi artikel melalui panel admin terlebih dahulu.
                    </p>
                    <a href="{{ url('/admin/produk') }}" class="btn btn-primary px-4 py-2">
                        <i class="bi bi-gear-fill me-1"></i> Ke Halaman Admin
                    </a>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination jika data artikel banyak -->
        @if(method_exists($artikels ?? null, 'links'))
        <div class="d-flex justify-content-center mt-4">
            {{ $artikels->links() }}
        </div>
        @endif
    </div>
</section>
@endsection