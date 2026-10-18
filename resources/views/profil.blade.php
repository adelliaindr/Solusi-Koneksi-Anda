@extends('layouts.app')

@section('content')

@php
    $namaPerusahaan = $profile->nama_perusahaan ?? 'PT Solusi Koneksi Anda';

    $misiList = collect(preg_split('/\r\n|\r|\n/', $profile->misi ?? ''))
        ->map(fn ($l) => trim(preg_replace('/^\s*(\d+[\.\)]|[-•*])\s*/', '', $l)))
        ->filter()
        ->values();
@endphp

<style>
    .card-hover { transition: transform .2s ease, box-shadow .2s ease; }
    .card-hover:hover { transform: translateY(-4px); box-shadow: 0 .75rem 1.5rem rgba(0, 0, 0, .1) !important; }
    .icon-box { width: 48px; height: 48px; }
</style>

<!-- HERO SECTION -->
<section
    class="text-white text-center d-flex align-items-center justify-content-center m-0"
    style="background: linear-gradient(rgba(10, 54, 99, 0.8), rgba(10, 54, 99, 0.8)), url('{{ asset('images/gedung-kantor.jpg') }}') center center / cover no-repeat; min-height: 50vh;">

    <div class="container py-5">
        <nav aria-label="breadcrumb" class="d-flex justify-content-center">
            <ol class="breadcrumb mb-3" style="--bs-breadcrumb-divider-color: rgba(255,255,255,.6);">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}" class="text-white text-decoration-none fw-semibold">
                        <i class="bi bi-house-door-fill me-1"></i>Beranda
                    </a>
                </li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Profil</li>
            </ol>
        </nav>

        <h1 class="display-4 fw-bold mb-3">Profil Perusahaan</h1>
        <p class="lead col-lg-8 mx-auto mb-0">
            Mengenal lebih dekat sejarah, visi, misi, dan komitmen {{ $namaPerusahaan }}.
        </p>
    </div>
</section>

<div class="bg-light">
<div class="container py-5">

    <!-- SAMBUTAN DIREKSI -->
    @if(!empty($profile->sambutan))
        <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 mb-4 mb-lg-5 bg-white">
            <div class="d-flex align-items-center gap-3 mb-3">
                <div class="icon-box bg-primary text-white rounded-3 d-flex align-items-center justify-content-center flex-shrink-0">
                    <i class="bi bi-quote fs-3"></i>
                </div>
                <h4 class="fw-bold text-dark mb-0">Sambutan Direksi</h4>
            </div>
            <p class="text-secondary lh-lg text-break mb-0" style="white-space: pre-line;">{{ $profile->sambutan }}</p>
        </div>
    @endif

    <!-- SEJARAH PERUSAHAAN -->
    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 mb-4 mb-lg-5 bg-white">
        <div class="d-flex align-items-center gap-3 mb-3">
            <div class="icon-box bg-primary text-white rounded-3 d-flex align-items-center justify-content-center flex-shrink-0">
                <i class="bi bi-clock-history fs-4"></i>
            </div>
            <h4 class="fw-bold text-dark mb-0">Sejarah Perusahaan</h4>
        </div>
        <p class="text-secondary lh-lg text-break mb-0" style="white-space: pre-line;">{{ $profile->sejarah ?? 'Informasi sejarah perusahaan akan segera diperbarui.' }}</p>
    </div>

    <!-- VISI & MISI -->
    <div class="row g-3 g-lg-4 mb-4 mb-lg-5">
        <div class="col-lg-6">
            <div class="card card-hover border-0 shadow-sm rounded-4 p-4 p-md-5 h-100 bg-white">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="icon-box bg-primary text-white rounded-3 d-flex align-items-center justify-content-center flex-shrink-0">
                        <i class="bi bi-eye-fill fs-4"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-0">Visi</h4>
                </div>
                <p class="text-secondary lh-lg text-break mb-0" style="white-space: pre-line;">{{ $profile->visi ?? 'Visi perusahaan belum diatur.' }}</p>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card card-hover border-0 shadow-sm rounded-4 p-4 p-md-5 h-100 bg-white">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="icon-box bg-primary text-white rounded-3 d-flex align-items-center justify-content-center flex-shrink-0">
                        <i class="bi bi-bullseye fs-4"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-0">Misi</h4>
                </div>

                @if($misiList->isEmpty())
                    <p class="text-secondary mb-0">Misi perusahaan belum diatur.</p>
                @else
                    <ul class="list-unstyled mb-0 d-flex flex-column gap-3">
                        @foreach($misiList as $poin)
                            <li class="d-flex align-items-start gap-3">
                                <i class="bi bi-check-circle-fill text-primary flex-shrink-0 mt-1"></i>
                                <span class="text-secondary lh-base text-break">{{ $poin }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

    <!-- STRUKTUR ORGANISASI -->
    @if(isset($struktur) && $struktur->count() > 0)
        <div class="text-center mb-4 mb-lg-5">
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1 bg-primary-subtle border border-primary-subtle rounded-pill text-primary fw-semibold small mb-3">
                <i class="bi bi-diagram-3"></i>
                <span>Tim Kami</span>
            </div>
            <h3 class="fw-bold text-dark mb-1">Struktur Organisasi &amp; Tim Kami</h3>
            <p class="text-muted mb-0">Orang-orang di balik kesuksesan {{ $namaPerusahaan }}</p>
        </div>

        <div class="row g-3 g-lg-4 justify-content-center">
            @foreach($struktur as $item)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card card-hover h-100 border-0 shadow-sm rounded-4 overflow-hidden text-center bg-white">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}"
                                 class="w-100 object-fit-cover"
                                 style="aspect-ratio: 1 / 1;" alt="{{ $item->nama }}">
                        @else
                            <div class="w-100 bg-light d-flex align-items-center justify-content-center text-secondary"
                                 style="aspect-ratio: 1 / 1;">
                                <i class="bi bi-person-fill display-1"></i>
                            </div>
                        @endif
                        <div class="card-body px-2 px-md-3 py-3 py-md-4">
                            <h5 class="fw-bold text-dark fs-6 mb-2">{{ $item->nama }}</h5>
                            <span class="badge bg-primary-subtle text-primary text-wrap px-3 py-2 rounded-pill fw-semibold">{{ $item->jabatan }}</span>
                            @if($item->deskripsi)
                                <p class="text-muted small mb-0 mt-3">{{ Str::limit($item->deskripsi, 80) }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>
</div>
@endsection