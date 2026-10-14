@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0 bg-transparent p-0">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none text-muted"><i class="bi bi-house-door-fill me-1"></i>Dasbor</a></li>
        <li class="breadcrumb-item"><a href="{{ route('artikel.index') }}" class="text-decoration-none text-muted">Artikel</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Detail</li>
    </ol>
</nav>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 bg-white p-4 rounded-4 shadow-sm border-0 mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-1 d-flex align-items-center">
            <i class="bi bi-eye-fill text-primary me-2"></i>Detail Artikel
        </h3>
        <p class="text-muted small mb-0">Tinjau pratinjau keseluruhan isi artikel yang diterbitkan.</p>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ route('artikel.edit', $artikel->id) }}" class="btn btn-warning text-white btn-sm px-3 py-2 rounded-3 fw-semibold shadow-sm">
            <i class="bi bi-pencil-square me-1"></i> Edit
        </a>
        <a href="{{ route('artikel.index') }}" class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3 fw-semibold">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
    <span class="badge bg-light text-primary border px-3 py-2 rounded-pill mb-2 align-self-start">{{ $artikel->kategori ?? 'Umum' }}</span>
    <h1 class="fw-bold text-dark mb-2">{{ $artikel->title }}</h1>
    <p class="text-muted small mb-4">
        <i class="bi bi-calendar3 me-1"></i> Dipublikasikan pada: {{ ($artikel->tanggal_upload ?? $artikel->created_at)->format('d F Y') }}
    </p>

    @if($artikel->image)
        <div class="mb-4">
            <img src="{{ filter_var($artikel->image, FILTER_VALIDATE_URL) ? $artikel->image : asset('storage/' . $artikel->image) }}" alt="{{ $artikel->title }}" class="img-fluid rounded-3 shadow-sm w-100 object-fit-cover" style="max-height: 400px;">
        </div>
    @endif

    <div class="text-secondary" style="white-space: pre-line; line-height: 1.8; font-size: 1.05rem;">
        {{ $artikel->content }}
    </div>
</div>
@endsection