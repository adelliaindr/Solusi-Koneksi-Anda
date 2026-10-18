@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0 bg-transparent p-0">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none text-muted"><i class="bi bi-house-door-fill me-1"></i>Dasbor</a></li>
        <li class="breadcrumb-item"><a href="{{ route('struktur.index') }}" class="text-decoration-none text-muted">Struktur Organisasi</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Tambah Baru</li>
    </ol>
</nav>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 bg-white p-4 rounded-4 shadow-sm mb-4">
    <div>
        <h3 class="fw-bold text-dark fs-4 mb-1 d-flex align-items-center">
            <i class="bi bi-person-plus-fill text-primary me-2"></i>Tambah Anggota Tim Baru
        </h3>
        <p class="text-muted small mb-0">Masukkan informasi detail anggota struktur organisasi perusahaan.</p>
    </div>
    <a href="{{ route('struktur.index') }}" class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3 fw-semibold">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4 p-lg-5 bg-white">
    <form action="{{ route('struktur.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-3 mb-3">
            <div class="col-md-8">
                <label for="nama" class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror"
                       placeholder="Contoh: Budi Santoso, S.T." value="{{ old('nama') }}" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="jabatan" class="form-label fw-semibold">Jabatan <span class="text-danger">*</span></label>
                <input type="text" id="jabatan" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror"
                       placeholder="Contoh: Direktur Utama" value="{{ old('jabatan') }}" required>
                @error('jabatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <label for="urutan" class="form-label fw-semibold">Nomor Urutan Tampil <span class="text-danger">*</span></label>
                <input type="number" id="urutan" name="urutan" class="form-control @error('urutan') is-invalid @enderror"
                       value="{{ old('urutan', 1) }}" min="1" required>
                @error('urutan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Semakin kecil angkanya (misal 1, 2, 3), posisinya tampil lebih tinggi.</div>
            </div>

            <div class="col-md-8">
                <label for="foto" class="form-label fw-semibold">Foto Profil</label>
                <input type="file" id="foto" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Format yang didukung: JPG, PNG, WEBP (Maks: 2MB)</div>
            </div>
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="form-label fw-semibold">Deskripsi / Peran Singkat</label>
            <textarea id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="6"
                      placeholder="Tulis deskripsi singkat tugas atau latar belakang anggota tim...">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid d-sm-flex justify-content-sm-end gap-2">
            <a href="{{ route('struktur.index') }}" class="btn btn-light border rounded-3 px-4">Batal</a>
            <button type="submit" class="btn btn-primary rounded-3 fw-semibold px-4">
                <i class="bi bi-save me-1"></i> Simpan Anggota
            </button>
        </div>
    </form>
</div>
@endsection