@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Tombol Kembali -->
    <div class="mb-4">
        <a href="{{ url('/galeri') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Galeri
        </a>
    </div>

    <!-- Alert Notifikasi -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- DETAIL FOTO GALERI -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="row g-0">

            <!-- KOLOM KIRI: FOTO -->
            <div class="col-lg-8 bg-dark d-flex align-items-center justify-content-center">
                @if($galeris->image)
                    <img src="{{ asset('storage/' . $galeris->image) }}"
                         class="img-fluid"
                         alt="{{ $galeris->title }}"
                         style="max-height: 85vh; object-fit: contain;">
                @else
                    <div class="text-center text-secondary py-5">
                        <i class="bi bi-image display-1 d-block mb-2"></i>
                        <p class="mb-0">Tidak ada foto</p>
                    </div>
                @endif
            </div>

            <!-- KOLOM KANAN: INFO, KOMENTAR, FORM -->
            <div class="col-lg-4 bg-white d-flex flex-column">

                <!-- Judul & Tanggal -->
                <div class="p-4 border-bottom">
                    <h4 class="fw-bold mb-2 text-break">{{ $galeris->title }}</h4>
                    <div class="text-muted d-flex flex-wrap align-items-center gap-2">
                        <div class="mb-3 text-muted small">
                            <i class="bi bi-calendar3 me-1"></i> Diunggah pada: {{ $galeris->created_at->format('d M Y, H:i') }} WIB
                        </div>
                        @if(!empty($galeris->kategori))
                            <span class="badge bg-secondary text-capitalize">{{ $galeris->kategori }}</span>
                        @endif
                    </div>
                </div>

                <!-- Suka & Jumlah Komentar -->
                <div class="px-4 py-3 bg-light border-bottom d-flex align-items-center justify-content-between">
                    <form action="{{ route('galeri.like', $galeris->id) }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 text-decoration-none text-dark d-flex align-items-center gap-2 fw-semibold fs-5">
                            <i class="bi bi-heart-fill fs-3 {{ $galeris->likes->count() > 0 ? 'text-danger' : 'text-secondary' }}"></i>
                            {{ $galeris->likes->count() }} Suka
                        </button>
                    </form>
                    <span class="text-muted">
                        <i class="bi bi-chat-left-text me-1"></i>{{ $galeris->komentars->count() }} Komentar
                    </span>
                </div>

                <!-- Daftar Komentar -->
                <div class="flex-grow-1 overflow-auto px-4 py-2" style="max-height: 420px;">
                    @forelse($galeris->komentars as $komentar)
                        <div class="border-bottom py-3">
                            <div class="d-flex align-items-baseline gap-2 mb-1">
                                <span class="fw-bold">{{ $komentar->nama_pengirim }}</span>
                                <small class="text-muted">{{ $komentar->created_at->diffForHumans() }}</small>
                            </div>
                            <p class="text-muted mb-0 text-break">{{ $komentar->isi_komentar }}</p>
                        </div>
                    @empty
                        <p class="text-muted text-center py-5 mb-0">Belum ada komentar untuk foto ini.</p>
                    @endforelse
                </div>

                <!-- Form Komentar -->
                <div class="p-3 border-top">
                    <form action="{{ route('galeri.comment', $galeris->id) }}" method="POST">
                        @csrf
                        <input type="text" name="nama_pengirim" class="form-control mb-2" placeholder="Nama Kamu.." value="{{ old('nama_pengirim') }}" required>
                        <div class="input-group">
                            <input type="text" name="isi_komentar" class="form-control" placeholder="Tulis komentar.." value="{{ old('isi_komentar') }}" required>
                            <button type="submit" class="btn btn-primary" aria-label="Kirim komentar">
                                <i class="bi bi-send"></i>
                            </button>
                        </div>
                        @error('nama_pengirim')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                        @error('isi_komentar')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection