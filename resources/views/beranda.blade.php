@extends('layouts.app')

@section('content')

@php
    $namaPerusahaan = $profile->nama_perusahaan ?? 'PT Solusi Koneksi Anda';

    // Nomor WhatsApp cukup diubah di sini (dipakai di hero & banner bawah)
    $linkWa = 'https://wa.me/6289516430243';

    // Pecah misi per baris supaya tampil sebagai daftar poin
    $misiList = collect(preg_split('/\r\n|\r|\n/', $profile->misi ?? ''))
        ->map(fn ($l) => trim(preg_replace('/^\s*(\d+[\.\)]|[-•*])\s*/', '', $l)))
        ->filter()
        ->values();

    // Pecah sejarah per paragraf
    $paragrafSejarah = collect(preg_split('/\R{2,}/', trim($profile->sejarah ?? '')))
        ->map(fn ($p) => trim($p))
        ->filter()
        ->values();

    // Section produk/artikel/galeri hanya tampil kalau datanya ada
    $adaProduk  = collect($produks ?? [])->isNotEmpty();
    $adaArtikel = collect($artikels ?? [])->isNotEmpty();
    $adaGaleri  = collect($galeris ?? [])->isNotEmpty();

    // Latar section berselang-seling (abu / putih) walau ada section yang disembunyikan
    $warnaSeksi = ['bg-light', 'bg-white'];
    $urutSeksi  = 0;
@endphp

<style>
    .card-hover { transition: transform .2s ease, box-shadow .2s ease; }
    .card-hover:hover { transform: translateY(-4px); box-shadow: 0 .75rem 1.5rem rgba(0, 0, 0, .1) !important; }
</style>

<!-- 1. HERO SECTION -->
<section
    class="text-white text-center d-flex align-items-center justify-content-center"
    style="background: linear-gradient(rgba(10, 54, 99, 0.85), rgba(10, 54, 99, 0.85)), url('{{ asset('images/gedung-kantor.jpg') }}') center center / cover no-repeat; min-height: 75vh;">

    <div class="container py-5">
        <h1 class="display-4 fw-bold mb-3">
            {{ $namaPerusahaan }}
        </h1>

        <p class="lead col-lg-8 mx-auto mb-4">
            Menghubungkan masa depan bisnis Anda dengan infrastruktur
            jaringan, telekomunikasi, dan solusi IT terdepan yang handal.
        </p>

        <div class="d-grid d-sm-flex justify-content-sm-center gap-3 col-10 col-sm-12 mx-auto">
            <a href="{{ url('/profil') }}" class="btn btn-primary btn-lg px-4 shadow rounded-3 fw-semibold">
                Pelajari Lebih Lanjut
            </a>
            <a href="{{ $linkWa }}" target="_blank" rel="noopener" class="btn btn-outline-light btn-lg px-4 rounded-3 fw-semibold">
                <i class="bi bi-whatsapp me-2"></i>Konsultasi Gratis
            </a>
        </div>
    </div>
</section>

<!-- 3. TENTANG KAMI / PROFIL PERUSAHAAN (data dari tabel profil) -->
<section class="py-5 bg-white">
    <div class="container py-lg-4">

        <!-- gy-5 (bukan g-5) supaya baris tidak keluar dari container di HP -->
        <div class="row align-items-center gy-5 gx-lg-5 mb-5">
            <!-- KIRI: NARASI -->
            <div class="{{ !empty($profile->sambutan) ? 'col-lg-7' : 'col-lg-12' }}">
                <span class="badge bg-primary text-uppercase px-3 py-2 rounded-2 mb-3">Tentang Kami</span>

                <h2 class="fw-bold text-dark display-6 mb-4">Mengenal Lebih Dekat {{ $namaPerusahaan }}</h2>

                @forelse($paragrafSejarah->take(2) as $para)
                    <p class="text-secondary lh-lg mb-3">{{ Str::limit($para, 420) }}</p>
                @empty
                    <p class="text-secondary lh-lg mb-3">Informasi profil perusahaan akan segera diperbarui.</p>
                @endforelse

                <a href="{{ url('/profil') }}" class="btn btn-primary btn-lg fw-semibold px-4 rounded-3 fs-6 mt-2">
                    Lihat Profil Lengkap <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>

            <!-- KANAN: SAMBUTAN DIREKSI (hanya jika diisi) -->
            @if(!empty($profile->sambutan))
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-xl-5 text-center bg-light">
                    <i class="bi bi-quote text-primary display-4 lh-1 mb-2"></i>
                    <h4 class="fw-bold text-dark mb-3">Sambutan Direksi</h4>
                    <p class="text-secondary lh-lg mb-0">{{ Str::limit($profile->sambutan, 240) }}</p>
                </div>
            </div>
            @endif
        </div>

        <!-- KARTU VISI & MISI -->
        <div class="row g-3 g-lg-4">
            <div class="col-md-6">
                <div class="card card-hover h-100 border-0 shadow-sm rounded-4 p-4 bg-light">
                    <div class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center mb-4" style="width: 64px; height: 64px;">
                        <i class="bi bi-eye fs-2"></i>
                    </div>
                    <h3 class="fw-bold text-dark mb-2">Visi</h3>
                    <p class="text-secondary lh-lg mb-0">
                        {{ Str::limit($profile->visi ?? 'Visi perusahaan belum diatur.', 240) }}
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-hover h-100 border-0 shadow-sm rounded-4 p-4 bg-light">
                    <div class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center mb-4" style="width: 64px; height: 64px;">
                        <i class="bi bi-rocket-takeoff fs-2"></i>
                    </div>
                    <h3 class="fw-bold text-dark mb-2">Misi</h3>

                    @if($misiList->count() > 1)
                        <ul class="list-unstyled mb-0 d-flex flex-column gap-2">
                            @foreach($misiList->take(3) as $poin)
                                <li class="d-flex align-items-start gap-2">
                                    <i class="bi bi-check-circle-fill text-primary flex-shrink-0 mt-1"></i>
                                    <span class="text-secondary">{{ Str::limit($poin, 120) }}</span>
                                </li>
                            @endforeach
                        </ul>
                        @if($misiList->count() > 3)
                            <a href="{{ url('/profil') }}" class="small fw-semibold text-decoration-none mt-3">
                                +{{ $misiList->count() - 3 }} misi lainnya <i class="bi bi-arrow-right"></i>
                            </a>
                        @endif
                    @else
                        <p class="text-secondary lh-lg mb-0">
                            {{ Str::limit($misiList->first() ?? 'Misi perusahaan belum diatur.', 240) }}
                        </p>
                    @endif
                </div>
            </div>
        </div>

    </div>
</section>

<!-- 5. PRODUK ATAU LAYANAN (tampil hanya jika ada data) -->
@if($adaProduk)
<section class="py-5 {{ $warnaSeksi[$urutSeksi++ % 2] }}">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-4">
            <div>
                <h3 class="fw-bold m-0">Produk atau Layanan</h3>
                <p class="text-muted small mb-0">Solusi terintegrasi untuk kebutuhan konektivitas bisnis Anda.</p>
            </div>
            <a href="{{ url('/produk') }}" class="btn btn-outline-primary btn-sm text-nowrap rounded-3 fw-semibold">Lihat Semua <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="row g-3 g-lg-4">
            @foreach($produks as $item)
            <div class="col-6 col-lg-3">
                <a href="{{ url('/produk/' . $item->id) }}" class="text-decoration-none d-block h-100">
                    <div class="card card-hover h-100 shadow-sm border-0 rounded-3 overflow-hidden d-flex flex-column">
                        @if($item->image)
                            <img src="{{ filter_var($item->image, FILTER_VALIDATE_URL) ? $item->image : asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}" style="height: 160px; object-fit: cover;">
                        @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 160px;">
                                <i class="bi bi-box-seam fs-1"></i>
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column p-3">
                            @if(isset($item->category) || isset($item->kategori))
                                <div class="mb-2">
                                    <span class="badge bg-primary bg-opacity-10 text-primary px-2 py-1 rounded">
                                        {{ $item->category ?? $item->kategori }}
                                    </span>
                                </div>
                            @endif
                            <h5 class="card-title fw-bold text-dark fs-6 mb-2 text-break">{{ $item->name }}</h5>
                            <p class="card-text text-muted small flex-grow-1 mb-0">{{ Str::limit($item->description, 70) }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- 6. ARTIKEL (tampil hanya jika ada data) -->
@if($adaArtikel)
<section class="py-5 {{ $warnaSeksi[$urutSeksi++ % 2] }}">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-4">
            <div>
                <h3 class="fw-bold m-0">Artikel Terkini</h3>
                <p class="text-muted small mb-0">Berita, edukasi teknologi, dan informasi terbaru dari perusahaan.</p>
            </div>
            <a href="{{ url('/artikel') }}" class="btn btn-outline-primary btn-sm text-nowrap rounded-3 fw-semibold">Lihat Semua <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="row g-3 g-lg-4">
            @foreach($artikels as $artikel)
            <div class="col-6 col-lg-3">
                <a href="{{ url('/artikel/' . $artikel->id) }}" class="text-decoration-none d-block h-100">
                    <div class="card card-hover h-100 shadow-sm border rounded-3 overflow-hidden d-flex flex-column">
                        @if(isset($artikel->image) && $artikel->image)
                            <img src="{{ filter_var($artikel->image, FILTER_VALIDATE_URL) ? $artikel->image : asset('storage/' . $artikel->image) }}" class="card-img-top" alt="{{ $artikel->title }}" style="height: 140px; object-fit: cover;">
                        @endif
                        <div class="card-body d-flex flex-column p-3">
                            @if(isset($artikel->category) || isset($artikel->kategori))
                                <div class="mb-2">
                                    <span class="badge bg-warning bg-opacity-10 text-dark px-2 py-1 rounded">
                                        {{ $artikel->category ?? $artikel->kategori }}
                                    </span>
                                </div>
                            @endif
                            <small class="text-muted mb-2">
                                <i class="bi bi-calendar3 me-1"></i> {{ \Carbon\Carbon::parse($artikel->tanggal_upload ?? $artikel->created_at)->format('d M Y') }}
                            </small>
                            <h5 class="card-title fw-bold fs-6 text-dark mb-2 text-break">{{ Str::limit($artikel->title, 45) }}</h5>
                            <p class="card-text text-muted small flex-grow-1 mb-0">{{ Str::limit($artikel->content ?? $artikel->description ?? '', 70) }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- 7. GALERI KEGIATAN (tampil hanya jika ada data) -->
@if($adaGaleri)
<section class="py-5 {{ $warnaSeksi[$urutSeksi++ % 2] }}">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-4">
            <div>
                <h3 class="fw-bold m-0">Galeri Kegiatan</h3>
                <p class="text-muted small mb-0">Dokumentasi operasional, pengerjaan instalasi, dan aktivitas tim.</p>
            </div>
            <a href="{{ url('/galeri') }}" class="btn btn-outline-primary btn-sm text-nowrap rounded-3 fw-semibold">Lihat Semua <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="row g-3 g-lg-4">
            @foreach($galeris as $galeri)
            <div class="col-6 col-lg-3">
                <a href="{{ url('/galeri/' . $galeri->id) }}" class="text-decoration-none d-block h-100">
                    <div class="card card-hover h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                        @if($galeri->image)
                            <img src="{{ filter_var($galeri->image, FILTER_VALIDATE_URL) ? $galeri->image : asset('storage/' . $galeri->image) }}" class="card-img-top" alt="{{ $galeri->title }}" style="height: 160px; object-fit: cover;">
                        @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 160px;">
                                <i class="bi bi-camera fs-1"></i>
                            </div>
                        @endif
                        <div class="card-body p-3 text-center">
                            @if(isset($galeri->category) || isset($galeri->kategori))
                                <span class="badge bg-success bg-opacity-10 text-success px-2 py-1 rounded mb-2 d-inline-block">
                                    {{ $galeri->category ?? $galeri->kategori }}
                                </span>
                            @endif
                            <small class="text-muted d-block mb-1">
                                <i class="bi bi-clock me-1"></i> {{ \Carbon\Carbon::parse($galeri->tanggal ?? $galeri->created_at)->format('d M Y') }}
                            </small>
                            <h6 class="fw-semibold text-dark mb-0 text-truncate">{{ $galeri->title }}</h6>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- 8. MITRA & KLIEN STRATEGIS -->
<section class="py-5 {{ $warnaSeksi[$urutSeksi++ % 2] }} text-center">
    <div class="container">
        <h5 class="fw-bold text-muted mb-4 text-uppercase small">Dipercaya Oleh Berbagai Perusahaan &amp; Instansi</h5>
        <div class="row align-items-center justify-content-center g-3 g-md-4">
            @foreach(['a', 'b', 'c', 'd'] as $huruf)
            <div class="col-6 col-md-3 col-lg-2">
                <div class="p-3 bg-white rounded-3 shadow-sm border d-flex align-items-center justify-content-center" style="height: 80px;">
                    <img src="{{ asset('images/logo_klien_' . $huruf . '.jpg') }}" alt="Logo Klien {{ strtoupper($huruf) }}" class="img-fluid" style="max-height: 40px; object-fit: contain;">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- 9. BANNER CALL TO ACTION (CTA) KONSULTASI -->
<section class="py-5 bg-primary text-white text-center">
    <div class="container py-3">
        <h3 class="fw-bold mb-3">Siap Mengembangkan Jaringan Bisnis Anda?</h3>
        <p class="lead col-lg-8 mx-auto mb-4">Konsultasikan kebutuhan infrastruktur telekomunikasi dan jaringan perusahaan Anda dengan tim konsultan ahli kami sekarang.</p>
        <a href="{{ $linkWa }}" target="_blank" rel="noopener" class="btn btn-light text-primary btn-lg px-4 rounded-3 fw-bold shadow">
            <i class="bi bi-whatsapp me-2"></i> Hubungi Tim Sales Via WhatsApp
        </a>
    </div>
</section>

@endsection