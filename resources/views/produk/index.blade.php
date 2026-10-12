@extends('layouts.app')

@section('content')
<!-- HEADER HALAMAN PRODUK -->
<div class="bg-primary-custom text-white py-5 mb-5 shadow-sm">
    <div class="container text-center py-3">
        <h1 class="fw-bold display-5">Produk & Layanan Kami</h1>
        <p class="lead mb-0">Solusi infrastruktur jaringan dan teknologi terdepan untuk mendukung produktivitas usaha Anda</p>
    </div>
</div>

<!-- KONTEN DAFTAR PRODUK -->
<div class="container mb-5">
    <div class="row">
        @forelse($products ?? [] as $item)
        <!-- Jika data produk sudah diinput oleh admin -->
        <div class="col-md-4 mb-4">
            <a href="{{ url('/produk/' . $item->id) }}" class="text-decoration-none">
            <div class="card h-100 shadow-sm border-0">
                @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}" style="height: 200px; object-fit: cover;">
                @else
                    <div class="bg-light text-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="bi bi-hdd-network display-4 text-muted"></i>
                    </div>
                @endif
                <div class="card-body d-flex flex-column">
                    <h4 class="card-title fw-bold text-primary-custom">{{ $item->name }}</h4>
                    <p class="card-text text-muted flex-grow-1">{{ $item->description }}</p>
                    @if($item->price)
                        <div class="mb-3">
                            <span class="badge bg-success fs-6">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                        </div>
                    @endif
                    <a href="{{ url('/kontak') }}" class="btn btn-outline-primary btn-sm mt-auto"><i class="bi bi-chat-dots me-1"></i> Pesan / Konsultasi Layanan</a>
                </div>
            </div>
            </a>
        </div>
        @empty
        <!-- Tampilan Placeholder jika database masih kosong (sebelum admin melakukan CRUD) -->
        <div class="col-12 text-center py-5">
            <div class="p-5 bg-white rounded-4 shadow-sm border">
                <i class="bi bi-box-seam display-1 text-muted mb-3"></i>
                <h3 class="fw-bold text-dark">Belum Ada Produk atau Layanan yang Ditambahkan</h3>
                <p class="text-muted col-lg-6 mx-auto mb-4">
                    Data produk dan layanan ini bersifat dinamis. Admin perusahaan dapat segera menambahkan, memperbarui, atau menghapus daftar layanan melalui halaman admin panel.
                </p>
                <a href="{{ url('/admin/products') }}" class="btn btn-primary-custom px-4 py-2">
                    <i class="bi bi-gear-fill me-1"></i> Buka Halaman Admin (Kelola Produk)
                </a>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection