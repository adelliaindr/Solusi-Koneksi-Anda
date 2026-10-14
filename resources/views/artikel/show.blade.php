@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Tombol Kembali & Breadcrumb Singkat -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ url('/artikel') }}" class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3 fw-semibold">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Artikel
        </a>
    </div>

    <!-- Card Konten Artikel Utama -->
    <article class="bg-white p-4 p-lg-5 rounded-4 shadow-sm border border-0">
        <!-- Metadata: Kategori & Tanggal Rilis -->
        <div class="d-flex align-items-center gap-3 mb-3">
            @php
                $kategori = strtolower($artikels->category ?? $artikels->kategori ?? 'berita');
                $badgeClass = match($kategori) {
                    'teknologi' => 'bg-primary bg-opacity-10 text-primary',
                    'tips dan trik' => 'bg-success bg-opacity-10 text-success',
                    'pengumuman' => 'bg-warning bg-opacity-10 text-dark',
                    default => 'bg-secondary bg-opacity-10 text-secondary'
                };
            @endphp
            <span class="badge {{ $badgeClass }} px-3 py-2 rounded text-capitalize fw-semibold" style="font-size: 0.85rem;">
                <i class="bi bi-tag-fill me-1"></i> {{ $artikels->category ?? $artikels->kategori ?? 'Berita' }}
            </span>

            <div class="text-muted small">
                <i class="bi bi-calendar3 me-1"></i> {{ ($item->tanggal_upload ?? $item->created_at ?? now())->format('d M Y') }}
            </div>
        </div>
        
        <!-- Judul Artikel -->
        <h1 class="fw-bold text-dark mb-4 display-6">{{ $artikels->title }}</h1>

        <!-- Gambar Utama Artikel -->
        @if($artikels->image)
            <div class="text-center mb-4 overflow-hidden rounded-4 shadow-sm">
                <img src="{{ filter_var($artikels->image, FILTER_VALIDATE_URL) ? $artikels->image : asset('storage/' . $artikels->image) }}" 
                     class="img-fluid w-100 object-fit-cover" 
                     alt="{{ $artikels->title }}" 
                     style="max-height: 480px;">
            </div>
        @endif

        <!-- Isi Konten Artikel -->
        <div class="lh-lg text-secondary fs-5 mt-4" style="white-space: pre-line; text-align: justify;">
            {{ $artikels->content }}
        </div>
    </article>
</div>
@endsection