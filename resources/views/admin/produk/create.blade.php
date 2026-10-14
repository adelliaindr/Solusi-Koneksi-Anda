@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0 bg-transparent p-0">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none text-muted"><i class="bi bi-house-door-fill me-1"></i>Dasbor</a></li>
        <li class="breadcrumb-item"><a href="{{ route('produk.index') }}" class="text-decoration-none text-muted">Produk</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Tambah Baru</li>
    </ol>
</nav>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 bg-white p-4 rounded-4 shadow-sm border-0 mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-1 d-flex align-items-center">
            <i class="bi bi-plus-circle-fill text-primary me-2"></i>Tambah Produk Baru
        </h3>
        <p class="text-muted small mb-0">Masukkan informasi detail produk atau layanan baru perusahaan.</p>
    </div>
    <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3 fw-semibold">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-md-8 mb-3">
                <label class="form-label fw-semibold">Nama Produk <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan nama produk..." value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label fw-semibold">Kategori Layanan <span class="text-danger">*</span></label>
                <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                    <option value="" disabled selected>-- Pilih Kategori --</option>
                    <option value="infrastruktur jaringan" {{ old('kategori') == 'infrastruktur jaringan' ? 'selected' : '' }}>Infrastruktur Jaringan</option>
                    <option value="telekomunikasi & konektivitas" {{ old('kategori') == 'telekomunikasi & konektivitas' ? 'selected' : '' }}>Telekomunikasi & Konektivitas</option>
                    <option value="solusi teknologi informasi" {{ old('kategori') == 'solusi teknologi informasi' ? 'selected' : '' }}>Solusi Teknologi Informasi</option>
                </select>
                @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Gambar Produk</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
            <small class="text-muted">Format yang didukung: JPG, PNG, WEBP (Maks: 2MB)</small>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Deskripsi Produk <span class="text-danger">*</span></label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="6" placeholder="Tuliskan deskripsi lengkap mengenai produk ini..." required>{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('produk.index') }}" class="btn btn-light border">Batal</a>
            <button type="submit" class="btn btn-primary fw-semibold px-4">
                <i class="bi bi-save me-1"></i> Simpan Produk
            </button>
        </div>
    </form>
</div>
@endsection