@extends('layouts.app')

@section('content')
<!-- HEADER HALAMAN PRODUK -->
<section
    class="text-white text-center d-flex align-items-center justify-content-center mb-0"
    style="background: linear-gradient(rgba(10, 54, 99, 0.8), rgba(10, 54, 99, 0.8)), url('{{ asset('images/gedung-kantor.jpg') }}') center center / cover no-repeat; min-height: 100vh;">

    <div class="container py-5">
        <h1 class="display-4 fw-bold mb-3">Produk & Layanan Kami</h1>
        <p class="lead col-lg-8 mx-auto mb-0">
            Solusi infrastruktur jaringan dan teknologi terdepan untuk mendukung produktivitas usaha Anda
        </p>
    </div>
</section>

<!-- TOP NAVIGATION BAR / KATEGORI PRODUK -->
<section class="bg-white border-bottom py-3 shadow-sm sticky-top" style="top: 56px; z-index: 1020;">
    <div class="container">
        <ul class="nav nav-pills justify-content-center flex-nowrap overflow-auto gap-2 py-1">
            <li class="nav-item">
                <a class="nav-link {{ request('kategori') == '' ? 'active bg-primary text-white fw-bold' : 'text-dark border' }}" href="{{ url('/produk') }}">Semua</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request('kategori') == 'infrastruktur jaringan' ? 'active bg-primary text-white fw-bold' : 'text-dark border' }}" href="{{ url('/produk?kategori=infrastruktur jaringan') }}">Infrastruktur Jaringan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request('kategori') == 'telekomunikasi & konektivitas' ? 'active bg-primary text-white fw-bold' : 'text-dark border' }}" href="{{ url('/produk?kategori=telekomunikasi & konektivitas') }}">Telekomunikasi & Konektivitas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request('kategori') == 'solusi teknologi informasi' ? 'active bg-primary text-white fw-bold' : 'text-dark border' }}" href="{{ url('/produk?kategori=solusi teknologi informasi') }}">Solusi Teknologi Informasi</a>
            </li>
        </ul>
    </div>
</section>

<!-- KONTEN DAFTAR PRODUK -->
<div class="container py-5">
    <div class="row">
        @forelse($produk ?? [] as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0 d-flex flex-column">
                @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}" style="height: 200px; object-fit: cover;">
                @else
                    <div class="bg-light text-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="bi bi-hdd-network display-4 text-muted"></i>
                    </div>
                @endif
                <div class="card-body d-flex flex-column">
                    <!-- Badge Kategori -->
                    <div class="mb-2">
                        <span class="badge bg-light text-primary border text-capitalize px-2 py-1">{{ $item->kategori ?? 'Umum' }}</span>
                    </div>

                    <h4 class="card-title fw-bold text-primary-custom fs-5">{{ $item->name }}</h4>
                    <p class="card-text text-muted small flex-grow-1">{{ Str::limit($item->description, 90) }}</p>
                    
                    @if($item->price)
                        <div class="mb-3">
                            <span class="badge bg-success fs-6">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                        </div>
                    @endif

                    <div class="d-grid gap-2 mt-auto">
                        <a href="{{ url('/produk/' . $item->id) }}" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-info-circle me-1"></i> Lihat Detail
                        </a>
                        <a href="{{ url('/kontak') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-chat-dots me-1"></i> Pesan / Konsultasi
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <div class="p-5 bg-white rounded-4 shadow-sm border">
                <i class="bi bi-box-seam display-1 text-muted mb-3"></i>
                <h3 class="fw-bold text-dark">Belum Ada Produk atau Layanan dalam Kategori Ini</h3>
                <p class="text-muted col-lg-6 mx-auto mb-4">
                    Data produk dan layanan ini bersifat dinamis. Admin perusahaan dapat segera menambahkan daftar layanan melalui panel admin.
                </p>
                <a href="{{ url('/admin/produk') }}" class="btn btn-primary px-4 py-2">
                    <i class="bi bi-gear-fill me-1"></i> Buka Halaman Admin (Kelola Produk)
                </a>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if(method_exists($produk ?? null, 'links'))
    <div class="d-flex justify-content-center mt-4">
        {{ $produk->links() }}
    </div>
    @endif
</div>
@endsection