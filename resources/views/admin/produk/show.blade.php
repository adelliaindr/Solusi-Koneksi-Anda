@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0 bg-transparent p-0">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none text-muted"><i class="bi bi-house-door-fill me-1"></i>Dasbor</a></li>
        <li class="breadcrumb-item"><a href="{{ route('produk.index') }}" class="text-decoration-none text-muted">Produk</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Detail</li>
    </ol>
</nav>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 bg-white p-4 rounded-4 shadow-sm border-0 mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-1 d-flex align-items-center">
            <i class="bi bi-eye-fill text-primary me-2"></i>Detail Produk
        </h3>
        <p class="text-muted small mb-0">Tinjau informasi lengkap dari produk yang dipilih.</p>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning text-white btn-sm px-3 py-2 rounded-3 fw-semibold shadow-sm">
            <i class="bi bi-pencil-square me-1"></i> Edit Produk
        </a>
        <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3 fw-semibold">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
    <div class="row g-4">
        <div class="col-md-4">
            @if($produk->image)
                <img src="{{ filter_var($produk->image, FILTER_VALIDATE_URL) ? $produk->image : asset('storage/' . $produk->image) }}" alt="{{ $produk->name }}" class="img-fluid rounded-3 shadow-sm w-100 object-fit-cover" style="max-height: 300px;">
            @else
                <div class="bg-light rounded-3 d-flex align-items-center justify-content-center text-muted border" style="height: 250px;">
                    <i class="bi bi-image fs-1 me-2"></i> Tidak ada gambar
                </div>
            @endif
        </div>
        <div class="col-md-8">
            <div class="mb-2">
                <span class="badge bg-light text-primary border text-capitalize px-3 py-2">{{ $produk->kategori ?? 'Umum' }}</span>
            </div>
            <h2 class="fw-bold text-dark mb-2">{{ $produk->name }}</h2>
            <p class="text-muted small mb-4">
                <i class="bi bi-calendar3 me-1"></i> Ditambahkan pada: {{ $produk->created_at->format('d F Y, H:i') }}
            </p>
            <h6 class="fw-bold text-primary">Deskripsi Produk:</h6>
            <p class="text-secondary" style="white-space: pre-line; line-height: 1.7;">{{ $produk->description }}</p>
        </div>
    </div>
</div>
@endsection