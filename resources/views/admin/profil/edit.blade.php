@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0 bg-transparent p-0">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none text-muted"><i class="bi bi-house-door-fill me-1"></i>Dasbor</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Edit Profil Admin</li>
    </ol>
</nav>

<div class="bg-white p-4 rounded-4 shadow-sm mb-4">
    <h3 class="fw-bold text-dark fs-4 mb-1 d-flex align-items-center">
        <i class="bi bi-person-gear text-primary me-2"></i>Pengaturan Akun Admin
    </h3>
    <p class="text-muted small mb-0">Perbarui nama pengguna, email, atau kata sandi akun super admin Anda.</p>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
    </div>
@endif

<div class="card border-0 shadow-sm rounded-4 p-4 p-lg-5 bg-white">
    <form action="{{ route('admin.profil.update') }}" method="POST">
        @csrf
        @method('PUT')

        <!-- DATA AKUN -->
        <h6 class="fw-bold text-dark mb-3"><i class="bi bi-person-circle text-primary me-2"></i>Data Akun</h6>
        <div class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label fw-semibold">Nama Admin <span class="text-danger">*</span></label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name', $admin->name) }}" autocomplete="name" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email', $admin->email) }}" autocomplete="email" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <hr class="my-4 text-muted">

        <!-- UBAH KATA SANDI -->
        <h6 class="fw-bold text-dark mb-1"><i class="bi bi-key-fill text-primary me-2"></i>Ubah Kata Sandi (Opsional)</h6>
        <p class="text-muted small mb-3">Kosongkan bagian ini jika Anda tidak ingin mengubah kata sandi lama.</p>

        <div class="row g-3">
            <div class="col-md-6">
                <label for="password" class="form-label fw-semibold">Kata Sandi Baru</label>
                <!-- autocomplete="new-password" mencegah browser mengisi otomatis kata sandi lama ke kolom ini -->
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"
                       placeholder="Minimal 6 karakter" autocomplete="new-password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Kata Sandi Baru</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                       placeholder="Ulangi kata sandi baru" autocomplete="new-password">
            </div>
        </div>

        <!-- TOMBOL AKSI: di HP tersusun penuh, di layar lebar rata kanan -->
        <div class="d-grid d-sm-flex justify-content-sm-end gap-2 mt-4 pt-2">
            <a href="{{ url('/admin/dashboard') }}" class="btn btn-light border rounded-3 px-4">Batal</a>
            <button type="submit" class="btn btn-primary rounded-3 fw-semibold px-4">
                <i class="bi bi-check-lg me-1"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection