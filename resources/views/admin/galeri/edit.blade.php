@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0 bg-transparent p-0">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none text-muted"><i class="bi bi-house-door-fill me-1"></i>Dasbor</a></li>
        <li class="breadcrumb-item"><a href="{{ route('galeri.index') }}" class="text-decoration-none text-muted">Galeri</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Edit Foto</li>
    </ol>
</nav>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 bg-white p-4 rounded-4 shadow-sm border-0 mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-1 d-flex align-items-center">
            <i class="bi bi-pencil-square text-primary me-2"></i>Edit Foto Galeri
        </h3>
        <p class="text-muted small mb-0">Perbarui informasi judul, kategori, tanggal, deskripsi, atau file gambar foto dokumentasi.</p>
    </div>
    <a href="{{ route('galeri.index') }}" class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3 fw-semibold">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
    <form action="{{ route('galeri.update', $galeris->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Judul Foto / Kegiatan <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $galeris->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label fw-semibold">Pilih Kategori <span class="text-danger">*</span></label>
                <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                    <option value="" disabled>-- Pilih Kategori --</option>
                    <option value="jaringan" {{ old('kategori', $galeris->kategori) == 'jaringan' ? 'selected' : '' }}>Infrastruktur & Jaringan</option>
                    <option value="kegiatan" {{ old('kategori', $galeris->kategori) == 'kegiatan' ? 'selected' : '' }}>Kegiatan & Pelatihan</option>
                    <option value="fasilitas" {{ old('kategori', $galeris->kategori) == 'fasilitas' ? 'selected' : '' }}>Fasilitas Kantor</option>
                    <option value="prestasi" {{ old('kategori', $galeris->kategori) == 'prestasi' ? 'selected' : '' }}>Prestasi & Penghargaan</option>
                </select>
                @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input Tanggal Kegiatan (Bisa Diedit) -->
            <div class="col-md-3 mb-3">
                <label class="form-label fw-semibold">Tanggal Kegiatan <span class="text-danger">*</span></label>
                <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $galeris->tanggal ?? $galeris->created_at->format('Y-m-d')) }}" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Foto Saat Ini</label>
            @if($galeris->image)
                <div class="mb-2">
                    <img src="{{ filter_var($galeris->image, FILTER_VALIDATE_URL) ? $galeris->image : asset('storage/' . $galeris->image) }}" alt="Preview" class="rounded border" style="width: 120px; height: 120px; object-fit: cover;">
                </div>
            @endif
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
            <small class="text-muted">Pilih foto baru jika ingin mengganti foto yang lama.</small>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('galeri.index') }}" class="btn btn-light border">Batal</a>
            <button type="submit" class="btn btn-primary fw-semibold px-4">
                <i class="bi bi-check-lg me-1"></i> Perbarui Foto
            </button>
        </div>
    </form>
</div>
@endsection