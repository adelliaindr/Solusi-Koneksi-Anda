@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0 bg-transparent p-0">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none text-muted"><i class="bi bi-house-door-fill me-1"></i>Dasbor</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Edit Profil Admin</li>
    </ol>
</nav>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 bg-white p-4 rounded-4 shadow-sm border-0 mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-1 d-flex align-items-center">
            <i class="bi bi-person-gear text-primary me-2"></i>Pengaturan Akun Admin
        </h3>
        <p class="text-muted small mb-0">Perbarui nama pengguna, email, atau kata sandi akun super admin Anda.</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
    <form action="{{ route('admin.profil.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-semibold">Nama Admin <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $admin->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $admin->email) }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <hr class="my-4 text-muted">
        <h6 class="fw-bold text-dark mb-3">Ubah Kata Sandi (Opsional)</h6>
        <p class="text-muted small">Kosongkan bagian ini jika Anda tidak ingin mengubah kata sandi lama.</p>

        <div class="mb-3">
            <label class="form-label fw-semibold">Kata Sandi Baru</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Minimal 6 karakter">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Konfirmasi Kata Sandi Baru</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi kata sandi baru">
        </div>

        <div class="d-flex justify-content-end gap-2">
            <a href="{{ url('/admin/dashboard') }}" class="btn btn-light border">Batal</a>
            <button type="submit" class="btn btn-primary fw-semibold px-4">
                <i class="bi bi-check-lg me-1"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection