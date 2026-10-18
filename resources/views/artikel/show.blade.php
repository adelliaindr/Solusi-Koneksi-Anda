@extends('layouts.app')

@section('content')

@php
    // Samakan format teks: huruf kecil, "&" jadi "dan", spasi ganda dirapikan
    $normalisasi = fn ($teks) => preg_replace('/\s+/', ' ', str_replace('&', 'dan', strtolower(trim((string) $teks))));

    $labelKat = $artikels->category ?? $artikels->kategori ?? 'Berita';

    $badgeClass = match($normalisasi($labelKat)) {
        'teknologi'     => 'bg-primary bg-opacity-10 text-primary',
        'tips dan trik' => 'bg-success bg-opacity-10 text-success',
        'pengumuman'    => 'bg-warning bg-opacity-10 text-dark',
        default         => 'bg-secondary bg-opacity-10 text-secondary',
    };

    $tanggal = \Carbon\Carbon::parse($artikels->tanggal_upload ?? $artikels->created_at ?? now())->format('d M Y');
@endphp

<div class="container py-4 py-lg-5">
    <div class="col-lg-10 col-xl-9 mx-auto">

        <!-- Tombol Kembali -->
        <div class="mb-4">
            <a href="{{ url('/artikel') }}" class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3 fw-semibold">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Artikel
            </a>
        </div>

        <!-- Card Konten Artikel Utama -->
        <article class="bg-white p-4 p-lg-5 rounded-4 shadow-sm border">
            <!-- Metadata: Kategori & Tanggal Rilis -->
            <div class="d-flex flex-wrap align-items-center gap-2 gap-md-3 mb-3">
                <span class="badge {{ $badgeClass }} px-3 py-2 rounded text-capitalize fw-semibold">
                    <i class="bi bi-tag-fill me-1"></i> {{ $labelKat }}
                </span>

                <div class="text-muted small">
                    <i class="bi bi-calendar3 me-1"></i> {{ $tanggal }}
                </div>
            </div>

            <!-- Judul Artikel -->
            <h1 class="fw-bold text-dark mb-4 display-6 text-break">{{ $artikels->title }}</h1>

            <!-- Gambar Utama Artikel -->
            @if($artikels->image)
                <div class="ratio ratio-16x9 mb-4 overflow-hidden rounded-4 shadow-sm">
                    <img src="{{ filter_var($artikels->image, FILTER_VALIDATE_URL) ? $artikels->image : asset('storage/' . $artikels->image) }}"
                         class="w-100 h-100 object-fit-cover"
                         alt="{{ $artikels->title }}">
                </div>
            @endif

            <!-- Isi Konten Artikel -->
            <div class="lh-lg text-secondary text-break mt-4" style="white-space: pre-line;">{{ $artikels->content }}</div>
        </article>

    </div>
</div>
@endsection