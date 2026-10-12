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
    <div class="bg-white p-4 p-lg-5 rounded-4 shadow-sm border mb-5 text-center">
        <h2 class="fw-bold text-primary-custom mb-3">{{ $galeri->title }}</h2>
        @if(isset($galeri->kategori))
            <span class="badge bg-secondary mb-4 text-capitalize px-3 py-2">Kategori: {{ $galeri->kategori }}</span>
        @endif

        @if($galeri->image)
            <div class="mb-4">
                <img src="{{ asset('storage/' . $galeri->image) }}" class="img-fluid rounded-3 shadow-sm border" alt="{{ $galeri->title }}" style="max-height: 500px; width: 100%; object-fit: contain; background: #000;">
            </div>
        @endif

        <hr class="my-4">

        <!-- TOMBOL LIKE FOTO -->
        <div class="d-flex align-items-center justify-content-center gap-4">
            <form action="{{ route('galeri.like', $galeri->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-lg rounded-pill px-4">
                    <i class="bi bi-heart-fill me-1"></i> Suka Foto Ini ({{ $galeri->likes->count() }})
                </button>
            </form>
            <span class="text-muted fs-5"><i class="bi bi-chat-left-text me-1"></i> {{ $galeri->komentars->count() }} Komentar</span>
        </div>
    </div>

    <!-- BAGIAN KOMENTAR FOTO -->
    <div class="row">
        <!-- Form Tulis Komentar -->
        <div class="col-lg-6 mb-4">
            <div class="bg-white p-4 rounded-4 shadow-sm border">
                <h4 class="fw-bold mb-3 text-dark"><i class="bi bi-pencil-square me-2"></i>Tulis Komentar untuk Foto Ini</h4>
                <form action="{{ route('galeri.comment', $galeri->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Anda</label>
                        <input type="text" name="nama_pengirim" class="form-control" placeholder="Masukkan nama..." required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Komentar</label>
                        <textarea name="isi_komentar" class="form-control" rows="4" placeholder="Tuliskan tanggapan Anda..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary px-4"><i class="bi bi-send me-1"></i> Kirim Komentar</button>
                </form>
            </div>
        </div>

        <!-- Daftar Komentar Pengunjung -->
        <div class="col-lg-6">
            <div class="bg-white p-4 rounded-4 shadow-sm border">
                <h4 class="fw-bold mb-3 text-dark"><i class="bi bi-chat-dots me-2"></i>Komentar Pengunjung</h4>
                @forelse($galeri->komentars as $komentar)
                    <div class="border-bottom py-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h6 class="fw-bold m-0 text-primary-custom"><i class="bi bi-person-circle me-1"></i>{{ $komentar->nama_pengirim }}</h6>
                            <small class="text-muted">{{ $komentar->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="text-muted small mb-0">{{ $komentar->isi_komentar }}</p>
                    </div>
                @empty
                    <p class="text-muted text-center py-4 mb-0">Belum ada komentar untuk foto ini.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection