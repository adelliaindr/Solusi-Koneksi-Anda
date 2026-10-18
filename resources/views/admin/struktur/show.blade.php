@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0 bg-transparent p-0">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none text-muted"><i class="bi bi-house-door-fill me-1"></i>Dasbor</a></li>
        <li class="breadcrumb-item"><a href="{{ route('struktur.index') }}" class="text-decoration-none text-muted">Struktur Organisasi</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Detail</li>
    </ol>
</nav>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 bg-white p-4 rounded-4 shadow-sm mb-4">
    <div>
        <h3 class="fw-bold text-dark fs-4 mb-1 d-flex align-items-center">
            <i class="bi bi-eye-fill text-primary me-2"></i>Detail Anggota Tim
        </h3>
        <p class="text-muted small mb-0">Tinjau informasi lengkap dari anggota yang dipilih.</p>
    </div>
    <div class="d-flex flex-wrap align-items-center gap-2">
        <a href="{{ route('struktur.edit', $struktur->id) }}" class="btn btn-warning text-white btn-sm px-3 py-2 rounded-3 fw-semibold shadow-sm">
            <i class="bi bi-pencil-square me-1"></i> Edit Anggota
        </a>
        <a href="{{ route('struktur.index') }}" class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3 fw-semibold">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4 p-lg-5 bg-white">
    <div class="row g-4 align-items-center">
        <div class="col-md-4 col-lg-3">
            @if($struktur->foto)
                <div class="ratio ratio-1x1 rounded-3 shadow-sm overflow-hidden">
                    <img src="{{ asset('storage/' . $struktur->foto) }}" alt="{{ $struktur->nama }}" class="w-100 h-100 object-fit-cover">
                </div>
            @else
                <div class="ratio ratio-1x1 rounded-3 border bg-light">
                    <div class="d-flex flex-column align-items-center justify-content-center text-muted">
                        <i class="bi bi-person-fill display-3"></i>
                        <small>Tidak ada foto</small>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="mb-2">
                <span class="badge bg-light text-primary border px-3 py-2">{{ $struktur->jabatan }}</span>
            </div>
            <h2 class="fw-bold text-dark mb-2 text-break">{{ $struktur->nama }}</h2>
            <p class="text-muted small mb-3">Urutan tampil: {{ $struktur->urutan }}</p>
            <h6 class="fw-bold text-primary">Deskripsi / Peran Singkat:</h6>
            <p class="text-secondary lh-lg text-break mb-0" style="white-space: pre-line;">{{ $struktur->deskripsi ?: 'Belum ada deskripsi.' }}</p>
        </div>
    </div>
</div>
@endsection