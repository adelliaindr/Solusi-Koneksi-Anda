@extends('layouts.app')

@section('content')

@php
    // Hitung sekali saja supaya relasi tidak dimuat berulang kali
    $jumlahSuka     = method_exists($galeris, 'likes') ? $galeris->likes->count() : 0;
    $daftarKomentar = method_exists($galeris, 'komentars') ? $galeris->komentars : collect();
    $jumlahKomentar = $daftarKomentar->count();
@endphp

<div class="container py-4 py-lg-5">
    <!-- Tombol Kembali -->
    <div class="mb-4">
        <a href="{{ url('/galeri') }}" class="btn btn-outline-secondary btn-sm rounded-3">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Galeri
        </a>
    </div>

    <!-- Alert Notifikasi -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif
    @if(session('info'))
        <div class="alert alert-info alert-dismissible fade show rounded-3" role="alert">
            {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    <!-- DETAIL FOTO GALERI -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="row g-0">

            <!-- KOLOM KIRI: FOTO -->
            <div class="col-lg-8 bg-dark d-flex align-items-center justify-content-center" style="min-height: 280px;">
                @if($galeris->image)
                    <img src="{{ filter_var($galeris->image, FILTER_VALIDATE_URL) ? $galeris->image : asset('storage/' . $galeris->image) }}"
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
                        <div class="small">
                            <i class="bi bi-calendar3 me-1"></i> Diunggah pada: {{ \Carbon\Carbon::parse($galeris->tanggal ?? $galeris->created_at)->format('d M Y') }}
                        </div>
                        @if(!empty($galeris->kategori))
                            <span class="badge bg-secondary text-capitalize">{{ $galeris->kategori }}</span>
                        @endif
                    </div>
                </div>

                <!-- Suka & Jumlah Komentar -->
                <div class="px-4 py-3 bg-light border-bottom d-flex align-items-center justify-content-between gap-2">
                    <form action="{{ route('galeri.like', $galeris->id) }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 text-decoration-none text-dark d-flex align-items-center gap-2 fw-semibold" aria-label="Sukai foto ini">
                            <i class="bi bi-heart-fill fs-4 {{ $jumlahSuka > 0 ? 'text-danger' : 'text-secondary' }}"></i>
                            {{ $jumlahSuka }} Suka
                        </button>
                    </form>
                    <span class="text-muted small">
                        <i class="bi bi-chat-left-text me-1"></i>{{ $jumlahKomentar }} Komentar
                    </span>
                </div>

                <!-- Daftar Komentar -->
                <div class="flex-grow-1 overflow-auto px-4 py-2" style="max-height: 420px;">
                    @forelse($daftarKomentar as $komentar)
                        <div class="border-bottom py-3 d-flex justify-content-between align-items-start">
                            <div class="min-w-0">
                                <div class="d-flex flex-wrap align-items-baseline column-gap-2 mb-1">
                                    <span class="fw-bold text-break">{{ $komentar->nama_pengirim ?? $komentar->name }}</span>
                                    <small class="text-muted">{{ $komentar->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="text-muted mb-0 text-break">{{ $komentar->isi_komentar ?? $komentar->comment }}</p>
                            </div>

                            <!-- Tombol Hapus Komentar untuk Pengunjung -->
                            <form action="{{ route('galeri.komentar.destroy', $komentar->id) }}" method="POST" class="m-0 ms-2 flex-shrink-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger p-0 text-decoration-none small" onclick="return confirm('Hapus komentar ini?')" title="Hapus" aria-label="Hapus komentar">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </form>
                        </div>
                    @empty
                        <p class="text-muted text-center py-4 mb-0">Belum ada komentar untuk foto ini.</p>
                    @endforelse
                </div>

                <!-- Form Komentar -->
                <div class="p-3 border-top bg-light">
                    <form action="{{ route('galeri.comment', $galeris->id) }}" method="POST">
                        @csrf
                        <input type="text" name="nama_pengirim" class="form-control mb-2" placeholder="Nama Kamu.." value="{{ old('nama_pengirim') }}" autocomplete="name" required>
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