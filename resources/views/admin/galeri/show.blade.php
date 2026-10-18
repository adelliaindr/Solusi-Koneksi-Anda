@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0 bg-transparent p-0">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none text-muted"><i class="bi bi-house-door-fill me-1"></i>Dasbor</a></li>
        <li class="breadcrumb-item"><a href="{{ route('galeri.index') }}" class="text-decoration-none text-muted">Galeri</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Detail & Komentar</li>
    </ol>
</nav>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 bg-white p-4 rounded-4 shadow-sm border-0 mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-1 d-flex align-items-center">
            <i class="bi bi-eye-fill text-primary me-2"></i>Detail Foto & Interaksi Galeri
        </h3>
        <p class="text-muted small mb-0">Tinjau informasi foto lengkap beserta komentar dan interaksi pengguna.</p>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ route('galeri.edit', $galeris->id) }}" class="btn btn-warning text-white btn-sm px-3 py-2 rounded-3 fw-semibold shadow-sm">
            <i class="bi bi-pencil-square me-1"></i> Edit Foto
        </a>
        <a href="{{ route('galeri.index') }}" class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3 fw-semibold">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<!-- INFORMASI UTAMA FOTO -->
<div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
    <div class="row g-4">
        <div class="col-md-5">
            @if($galeris->image)
                <img src="{{ filter_var($galeris->image, FILTER_VALIDATE_URL) ? $galeris->image : asset('storage/' . $galeris->image) }}" alt="{{ $galeris->title }}" class="img-fluid rounded-3 shadow-sm w-100 object-fit-cover" style="max-height: 350px;">
            @else
                <div class="bg-light rounded-3 d-flex align-items-center justify-content-center text-muted border" style="height: 250px;">
                    <i class="bi bi-image fs-1 me-2"></i> Tidak ada gambar
                </div>
            @endif
        </div>
        <div class="col-md-7">
            <span class="badge bg-light text-primary border px-3 py-2 rounded-pill mb-2">{{ $galeris->kategori ?? 'Umum' }}</span>
            <h2 class="fw-bold text-dark mb-2">{{ $galeris->title }}</h2>
            <p class="text-muted small mb-3">
                <i class="bi bi-calendar3 me-1"></i> Diunggah pada: {{ $galeris->created_at->format('d F Y, H:i') }}
            </p>
            <div class="d-flex gap-3 mb-4">
                <div class="bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-3 fw-semibold">
                    <i class="bi bi-heart-fill me-1"></i> {{ $galeris->likes->count() }} Suka
                </div>
                <div class="bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-3 fw-semibold">
                    <i class="bi bi-chat-fill me-1"></i> {{ $galeris->komentars->count() }} Komentar
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SECTION MODERASI KOMENTAR & LIKE -->
<div class="row g-4">
    <!-- Daftar Komentar -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
            <h5 class="fw-bold text-dark mb-3"><i class="bi bi-chat-dots me-2 text-primary"></i> Daftar Komentar Pengguna</h5>
            
            <!-- Bagian Daftar Komentar -->
<div class="d-flex flex-column gap-3">
    @forelse($galeris->komentars()->latest()->get() as $komentar)
        <div class="d-flex justify-content-between align-items-start border-bottom pb-3">
            <div>
                <h6 class="fw-bold text-dark mb-1" style="font-size: 0.95rem;">
                    <i class="bi bi-person-circle text-secondary me-1"></i> {{ $komentar->nama_pengirim ?? $komentar->name ?? 'Pengunjung' }}
                </h6>
                <p class="text-secondary mb-1" style="font-size: 0.9rem;">{{ $komentar->isi_komentar ?? $komentar->comment }}</p>
                <small class="text-muted" style="font-size: 0.75rem;"><i class="bi bi-clock me-1"></i> {{ $komentar->created_at->diffForHumans() }}</small>
            </div>
            <form action="{{ route('admin.komentar.destroy', $komentar->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus komentar ini?')" title="Hapus Komentar">
                    <i class="bi bi-trash"></i>
                </button>
            </form>
        </div>
    @empty
        <p class="text-muted text-center py-4 small">Belum ada komentar pada foto galeri ini.</p>
    @endforelse
</div>
        </div>
    </div>

    <!-- Daftar Pengguna yang Menyukai (Like) -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
            <h5 class="fw-bold text-dark mb-3"><i class="bi bi-heart me-2 text-danger"></i> Daftar Menyukai</h5>
            
            <ul class="list-group list-group-flush">
                @forelse($galeris->likes()->latest()->get() as $like)
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <span class="text-dark small fw-semibold"><i class="bi bi-person-fill text-secondary me-1"></i> {{ $like->name ?? 'Pengunjung' }}</span>
                        <small class="text-muted" style="font-size: 0.75rem;">{{ $like->created_at->format('d M Y') }}</small>
                    </li>
                @empty
                    <li class="list-group-item text-center text-muted small py-3 border-0">Belum ada yang menyukai foto ini.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection