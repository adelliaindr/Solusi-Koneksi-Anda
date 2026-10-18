@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0 bg-transparent p-0">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none text-muted"><i class="bi bi-house-door-fill me-1"></i>Dasbor</a></li>
        <li class="breadcrumb-item"><a href="{{ route('kontak.index') }}" class="text-decoration-none text-muted">Kontak Masuk</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Baca Pesan</li>
    </ol>
</nav>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 bg-white p-4 rounded-4 shadow-sm border-0 mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-1 d-flex align-items-center">
            <i class="bi bi-envelope-open-fill text-primary me-2"></i>Detail Pesan Masuk
        </h3>
        <p class="text-muted small mb-0">Baca pesan dan pertanyaan lengkap yang dikirim oleh pengunjung.</p>
    </div>
    <a href="{{ route('kontak.index') }}" class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3 fw-semibold">
        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Pesan
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
    <div class="row mb-3">
        <div class="col-md-6">
            <span class="text-muted small d-block">Nama Pengirim:</span>
            <h5 class="fw-bold text-dark mb-0">{{ $kontak->name ?? $kontak->nama }}</h5>
        </div>
        <div class="col-md-6 text-md-end">
            <span class="text-muted small d-block">Waktu Kirim:</span>
            <span class="fw-semibold text-secondary">{{ $kontak->created_at->format('d F Y, H:i') }}</span>
        </div>
    </div>

    <div class="mb-3">
        <span class="text-muted small d-block">Email:</span>
        <a href="mailto:{{ $kontak->email }}" class="text-decoration-none fw-semibold fs-6">{{ $kontak->email }}</a>
    </div>

    <div class="mb-4">
        <span class="text-muted small d-block">Subjek Pesan:</span>
        <h5 class="fw-bold text-primary">{{ $kontak->subject ?? $kontak->subjek }}</h5>
    </div>

    <hr class="my-3">

    <div class="mb-4">
        <span class="text-muted small d-block mb-2">Isi Pesan:</span>
        <!-- Tambahkan word-break: break-word; di sini -->
        <div class="p-3 bg-light rounded-3 text-secondary" style="white-space: pre-line; word-break: break-word; line-height: 1.7; font-size: 1.05rem;">{{ $kontak->message ?? $kontak->pesan }}</div>
    </div>

    <div class="d-flex justify-content-between align-items-center">
    <!-- Tombol Balas via Email yang otomatis terisi data pengunjung -->
    <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ urlencode($kontak->email) }}&su=Re:%20{{ urlencode($kontak->subject ?? $kontak->subjek) }}&body=Halo%20{{ urlencode($kontak->name ?? $kontak->nama) }},%0A%0ATerima%20kasih%20telah%20menghubungi%20PT%20Solusi%20Koneksi%20Anda.%0A%0ABerkaitan%20dengan%20pesan%20Anda:%0A%22{{ urlencode($kontak->message ?? $kontak->pesan) }}%22%0A%0A[Tulis%20balasan%20Anda%20di%20sini]" 
   target="_blank" 
   class="btn btn-primary fw-semibold">
    <i class="bi bi-reply-fill me-1"></i> Balas via Email
</a>

    <form action="{{ route('kontak.destroy', $kontak->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger fw-semibold" onclick="return confirm('Yakin ingin menghapus pesan ini?')">
            <i class="bi bi-trash-fill me-1"></i> Hapus Pesan
        </button>
    </form>
</div>
</div>
@endsection