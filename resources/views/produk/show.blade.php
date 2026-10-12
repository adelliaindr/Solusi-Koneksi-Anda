@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Tombol Kembali -->
    <div class="mb-4">
        <a href="{{ url('/produk') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Produk
        </a>
    </div>

    <div class="row bg-white p-4 p-lg-5 rounded-4 shadow-sm border align-items-center">
        <!-- Kolom Gambar Produk -->
        <div class="col-lg-6 mb-4 mb-lg-0 text-center">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded-3 shadow-sm" alt="{{ $product->name }}" style="max-height: 400px; object-fit: cover; width: 100%;">
            @else
                <div class="bg-light text-secondary d-flex flex-column align-items-center justify-content-center rounded-3 p-5 border" style="height: 350px;">
                    <i class="bi bi-hdd-network display-1 text-muted mb-3"></i>
                    <p class="text-muted">Tidak ada foto untuk produk ini</p>
                </div>
            @endif
        </div>

        <!-- Kolom Informasi Detail Produk -->
        <div class="col-lg-6">
            <span class="badge bg-primary mb-2 text-uppercase tracking-wider">Detail Layanan</span>
            <h1 class="fw-bold text-primary-custom mb-3">{{ $product->name }}</h1>
            
            @if($product->price)
                <div class="mb-3">
                    <span class="badge bg-success fs-5 px-3 py-2">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                </div>
            @endif

            <hr class="my-4">

            <h5 class="fw-bold text-dark mb-2">Deskripsi Lengkap</h5>
            <p class="text-muted lh-base mb-4" style="white-space: pre-line;">{{ $product->description }}</p>

            <div class="d-flex gap-2">
                <a href="{{ url('/kontak') }}" class="btn btn-primary btn-lg px-4">
                    <i class="bi bi-chat-dots-fill me-2"></i> Konsultasi / Pesan Layanan
                </a>
            </div>
        </div>
    </div>
</div>
@endsection