@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none">Dasbor</a></li>
        <li class="breadcrumb-item"><a href="{{ route('produk.index') }}" class="text-decoration-none">Produk</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark mb-0">Edit Produk</h3>
    <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
    <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-semibold">Nama Produk <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $produk->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Gambar Produk Saat Ini</label>
            @if($produk->image)
                <div class="mb-2">
                    <img src="{{ filter_var($produk->image, FILTER_VALIDATE_URL) ? $produk->image : asset('storage/' . $produk->image) }}" alt="Preview" class="rounded border" style="width: 100px; height: 100px; object-fit: cover;">
                </div>
            @endif
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
            <small class="text-muted">Pilih file baru jika ingin mengganti gambar lama.</small>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Deskripsi Produk <span class="text-danger">*</span></label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="6" required>{{ old('description', $produk->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('produk.index') }}" class="btn btn-light border">Batal</a>
            <button type="submit" class="btn btn-primary fw-semibold px-4">
                <i class="bi bi-check-lg me-1"></i> Perbarui Produk
            </button>
        </div>
    </form>
</div>
@endsection