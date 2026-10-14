@extends('layouts.app')

@section('content')

@php
    // Samakan format teks: huruf kecil, "&" jadi "dan", spasi ganda dirapikan
    $normalisasi = fn ($teks) => preg_replace('/\s+/', ' ', str_replace('&', 'dan', strtolower(trim((string) $teks))));

    $aktif = $normalisasi(request('kategori', ''));

    $tabs = [
        'berita'        => ['Berita', 'bi-newspaper'],
        'teknologi'     => ['Teknologi', 'bi-cpu'],
        'tips dan trik' => ['Tips & Trik', 'bi-lightbulb'],
        'pengumuman'    => ['Pengumuman', 'bi-megaphone'],
    ];

    $daftar = collect($artikels ?? []);

    if ($aktif !== '') {
        $daftar = $daftar->filter(fn ($a) => $normalisasi($a->kategori) === $aktif)->values();
    }
@endphp

<!-- HERO SECTION -->
<section
    class="text-white text-center d-flex align-items-center justify-content-center"
    style="background: linear-gradient(rgba(10, 54, 99, 0.8), rgba(10, 54, 99, 0.8)), url('{{ asset('images/gedung-kantor.jpg') }}') center center / cover no-repeat; min-height: 79vh;">

    <div class="container py-5">
        <nav aria-label="breadcrumb" class="d-flex justify-content-center">
            <ol class="breadcrumb mb-3" style="--bs-breadcrumb-divider-color: rgba(255,255,255,.6);">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}" class="text-white text-decoration-none fw-semibold">
                        <i class="bi bi-house-door-fill me-1"></i>Beranda
                    </a>
                </li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Artikel</li>
            </ol>
        </nav>

        <h1 class="display-4 fw-bold mb-3">Artikel Informasi</h1>
        <p class="lead col-lg-8 mx-auto mb-0">
            Informasi terbaru seputar kegiatan, perkembangan teknologi, tips, dan pengumuman penting dari PT Solusi Koneksi Anda.
        </p>
    </div>
</section>

<!-- TOP NAVIGATION BAR / FILTER KATEGORI ARTIKEL -->
<section class="bg-white border-bottom py-3 shadow-sm sticky-top" style="top: 78px; z-index: 1019;">
    <div class="container">
        <ul class="nav nav-pills justify-content-center flex-nowrap overflow-auto gap-2 py-1">
            <li class="nav-item">
                <a class="nav-link rounded-pill px-4 fw-semibold text-nowrap {{ $aktif === '' ? 'active bg-primary' : 'text-dark border' }}"
                   href="{{ url('/artikel') }}">
                    <i class="bi bi-grid-fill me-1"></i> Semua
                </a>
            </li>

            @foreach($tabs as $key => [$label, $ikon])
                <li class="nav-item">
                    <a class="nav-link rounded-pill px-4 fw-semibold text-nowrap {{ $aktif === $key ? 'active bg-primary' : 'text-dark border' }}"
                       href="{{ url('/artikel') }}?{{ http_build_query(['kategori' => $key]) }}">
                        <i class="bi {{ $ikon }} me-1"></i> {{ $label }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>

<!-- KONTEN ARTIKEL & BERITA -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            @forelse($daftar as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden d-flex flex-column">
                    <!-- Gambar Artikel -->
                    @if($item->image)
                        <img src="{{ filter_var($item->image, FILTER_VALIDATE_URL) ? $item->image : asset('storage/' . $item->image) }}"
                             class="card-img-top object-fit-cover" alt="{{ $item->title }}" style="height: 200px;">
                    @else
                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="bi bi-newspaper fs-1"></i>
                        </div>
                    @endif

                    <div class="card-body d-flex flex-column p-4">
                        <!-- Baris Kategori & Tanggal Rilis -->
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            @php
                                $kat = $normalisasi($item->kategori ?? 'berita');
                                $badgeClass = match($kat) {
                                    'teknologi'     => 'bg-primary bg-opacity-10 text-primary',
                                    'tips dan trik' => 'bg-success bg-opacity-10 text-success',
                                    'pengumuman'    => 'bg-warning bg-opacity-10 text-dark',
                                    default         => 'bg-secondary bg-opacity-10 text-secondary'
                                };
                            @endphp
                            <span class="badge {{ $badgeClass }} px-2 py-1 rounded text-capitalize" style="font-size: 0.75rem;">
                                {{ $item->category ?? $item->kategori ?? 'Berita' }}
                            </span>

                            <div class="text-muted small">
                                <i class="bi bi-calendar3 me-1"></i> {{ ($item->tanggal_upload ?? $item->created_at ?? now())->format('d M Y') }}
                            </div>
                        </div>

                        <!-- Judul Artikel -->
                        <h5 class="card-title fw-bold text-dark mb-2 text-break">{{ $item->title }}</h5>

                        <!-- Cuplikan Isi Artikel -->
                        <p class="card-text text-muted small flex-grow-1 text-break">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 120) }}
                        </p>

                        <!-- Tombol Baca Selengkapnya -->
                        <div class="mt-3 pt-2 border-top">
                            <a href="{{ url('/artikel/' . $item->id) }}" class="btn btn-primary btn-sm w-100 rounded-3">
                                Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <!-- Placeholder jika belum ada artikel -->
            <div class="col-12 text-center py-5">
                <div class="p-5 bg-white rounded-4 shadow-sm border border-0">
                    <i class="bi bi-journal-x display-1 text-muted mb-3"></i>
                    <h4 class="fw-bold text-dark">Belum Ada Artikel</h4>
                    <p class="text-muted col-lg-6 mx-auto mb-4">
                        @if($aktif !== '')
                            Belum ada artikel yang diterbitkan untuk kategori <strong>"{{ ucfirst($aktif) }}"</strong>.
                        @else
                            Data artikel bersifat dinamis dan dikelola melalui halaman admin. Silakan isi artikel melalui panel admin terlebih dahulu.
                        @endif
                    </p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection