@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none">Dasbor</a></li>
        <li class="breadcrumb-item"><a href="{{ route('galeri.index') }}" class="text-decoration-none">Galeri</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
    </ol>
</nav>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark mb-0">Tambah Foto Galeri</h3>
    <a href="{{ route('galeri.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-md-8 mb-3">
                <label class="form-label fw-semibold">Judul Foto / Kegiatan <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Contoh: Peresmian Jaringan Fiber Optik Baru" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label fw-semibold">Pilih Kategori <span class="text-danger">*</span></label>
                <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                    <option value="" disabled selected>-- Pilih Kategori --</option>
                    <option value="jaringan" {{ old('kategori', $galeri->kategori ?? '') == 'jaringan' ? 'selected' : '' }}>Infrastruktur & Jaringan</option>
                    <option value="kegiatan" {{ old('kategori', $galeri->kategori ?? '') == 'kegiatan' ? 'selected' : '' }}>Kegiatan & Pelatihan</option>
                    <option value="fasilitas" {{ old('kategori', $galeri->kategori ?? '') == 'fasilitas' ? 'selected' : '' }}>Fasilitas Kantor</option>
                    <option value="prestasi" {{ old('kategori', $galeri->kategori ?? '') == 'prestasi' ? 'selected' : '' }}>Prestasi & Penghargaan</option>
                </select>
                @error('category')
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

        <div class="mb-4">
            <label class="form-label fw-semibold">Keterangan / Deskripsi Foto</label>
            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="5" placeholder="Tuliskan catatan singkat mengenai dokumentasi foto ini...">{{ old('deskripsi', $galeri->deskripsi ?? '') }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('galeri.index') }}" class="btn btn-light border">Batal</a>
            <button type="submit" class="btn btn-primary fw-semibold px-4">
                <i class="bi bi-save me-1"></i> Simpan Foto
            </button>
        </div>
    </form>
</div>
@endsection