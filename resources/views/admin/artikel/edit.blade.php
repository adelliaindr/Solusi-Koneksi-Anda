@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0 bg-transparent p-0">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none text-muted"><i class="bi bi-house-door-fill me-1"></i>Dasbor</a></li>
        <li class="breadcrumb-item"><a href="{{ route('artikel.index') }}" class="text-decoration-none text-muted">Artikel</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Edit</li>
    </ol>
</nav>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 bg-white p-4 rounded-4 shadow-sm border-0 mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-1 d-flex align-items-center">
            <i class="bi bi-pencil-square text-primary me-2"></i>Edit Artikel
        </h3>
        <p class="text-muted small mb-0">Perbarui konten teks, judul, atau gambar artikel.</p>
    </div>
    <a href="{{ route('artikel.index') }}" class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3 fw-semibold">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
    <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Judul Artikel <span class="text-danger">*</span></label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $artikel->title) }}" required>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
        <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
            <option value="" disabled>-- Pilih Kategori --</option>
            <option value="Berita" {{ old('kategori', $artikel->kategori) == 'Berita' ? 'selected' : '' }}>Berita</option>
            <option value="Teknologi" {{ old('kategori', $artikel->kategori) == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
            <option value="Tips & Trik" {{ old('kategori', $artikel->kategori) == 'Tips & Trik' ? 'selected' : '' }}>Tips & Trik</option>
            <option value="Pengumuman" {{ old('kategori', $artikel->kategori) == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
        </select>
        @error('kategori')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label fw-semibold">Tanggal Upload <span class="text-danger">*</span></label>
        <input type="date" name="tanggal_upload" class="form-control @error('tanggal_upload') is-invalid @enderror" value="{{ old('tanggal_upload', ($artikel->tanggal_upload ?? $artikel->created_at)->format('Y-m-d')) }}" required>
        @error('tanggal_upload')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Gambar Saat Ini</label>
            @if($artikel->image)
                <div class="mb-2">
                    <img src="{{ filter_var($artikel->image, FILTER_VALIDATE_URL) ? $artikel->image : asset('storage/' . $artikel->image) }}" alt="Preview" class="rounded border" style="width: 120px; height: 120px; object-fit: cover;">
                </div>
            @endif
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
            <small class="text-muted">Pilih gambar baru jika ingin mengganti gambar yang lama.</small>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Isi Konten Artikel <span class="text-danger">*</span></label>
            <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="8" required>{{ old('content', $artikel->content) }}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('artikel.index') }}" class="btn btn-light border">Batal</a>
            <button type="submit" class="btn btn-primary fw-semibold px-4">
                <i class="bi bi-check-lg me-1"></i> Perbarui Artikel
            </button>
        </div>
    </form>
</div>
@endsection