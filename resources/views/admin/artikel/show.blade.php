@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none">Dasbor</a></li>
        <li class="breadcrumb-item"><a href="{{ route('artikel.index') }}" class="text-decoration-none">Artikel</a></li>
        <li class="breadcrumb-item active" aria-current="page">Lihat Detail</li>
    </ol>
</nav>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark mb-0">Detail Artikel</h3>
    <div>
        <a href="{{ route('artikel.edit', $artikel->id) }}" class="btn btn-warning text-white btn-sm me-1">
            <i class="bi bi-pencil-square me-1"></i> Edit
        </a>
        <a href="{{ route('artikel.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
    <span class="badge bg-light text-primary border px-3 py-2 rounded-pill mb-2 align-self-start">{{ $artikel->kategori ?? 'Umum' }}</span>
    <h1 class="fw-bold text-dark mb-2">{{ $artikel->title }}</h1>
    <p class="text-muted small mb-4">
        <i class="bi bi-calendar3 me-1"></i> Dipublikasikan pada: {{ $artikel->created_at->format('d F Y, H:i') }}
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