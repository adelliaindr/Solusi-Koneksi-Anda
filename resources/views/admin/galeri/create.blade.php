@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0 bg-transparent p-0">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none text-muted"><i class="bi bi-house-door-fill me-1"></i>Dasbor</a></li>
        <li class="breadcrumb-item"><a href="{{ route('galeri.index') }}" class="text-decoration-none text-muted">Galeri</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Tambah Foto</li>
    </ol>
</nav>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 bg-white p-4 rounded-4 shadow-sm border-0 mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-1 d-flex align-items-center">
            <i class="bi bi-plus-circle-fill text-primary me-2"></i>Tambah Foto Galeri
        </h3>
        <p class="text-muted small mb-0">Unggah foto dokumentasi kegiatan atau fasilitas baru ke website.</p>
    </div>
    <a href="{{ route('galeri.index') }}" class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3 fw-semibold">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Judul Foto / Kegiatan <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Contoh: Peresmian Jaringan Fiber Optik Baru" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label fw-semibold">Pilih Kategori <span class="text-danger">*</span></label>
                <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                    <option value="" disabled selected>-- Pilih Kategori --</option>
                    <option value="jaringan" {{ old('kategori') == 'jaringan' ? 'selected' : '' }}>Infrastruktur & Jaringan</option>
                    <option value="kegiatan" {{ old('kategori') == 'kegiatan' ? 'selected' : '' }}>Kegiatan & Pelatihan</option>
                    <option value="fasilitas" {{ old('kategori') == 'fasilitas' ? 'selected' : '' }}>Fasilitas Kantor</option>
                    <option value="prestasi" {{ old('kategori') == 'prestasi' ? 'selected' : '' }}>Prestasi & Penghargaan</option>
                </select>
                @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input Tanggal Dokumentasi -->
            <div class="col-md-3 mb-3">
                <label class="form-label fw-semibold">Tanggal Kegiatan <span class="text-danger">*</span></label>
                <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Upload Foto <span class="text-danger">*</span></label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" required>
            <small class="text-muted">Format yang didukung: JPG, PNG, WEBP (Maks: 2MB)</small>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-end gap-2 mb-3">
            <a href="{{ route('galeri.index') }}" class="btn btn-light border">Batal</a>
            <button type="submit" class="btn btn-primary fw-semibold px-4">
                <i class="bi bi-save me-1"></i> Simpan Foto
            </button>
        </div>
    </form>
    </div>
@endsection