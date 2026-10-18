@extends('layouts.auth')

@section('content')
<div class="container py-4 py-md-5">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-7 col-lg-5 col-xl-4">
            <div class="card shadow-lg border-0 rounded-4 p-4 p-md-5 bg-white">

                <div class="text-center mb-4">
                    <h3 class="fw-bold text-dark mb-1">Admin Login</h3>
                    <p class="text-muted small mb-0">PT Solusi Koneksi Anda - Panel Pengelola</p>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show small rounded-3" role="alert">
                        {{ $errors->first() }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                    </div>
                @endif

                <form action="{{ url('/admin/login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold small">Email Admin</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   placeholder="admin@solusikoneksi.com" value="{{ old('email') }}"
                                   autocomplete="username" required autofocus>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold small">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
                            <input type="password" id="password" name="password" class="form-control"
                                   placeholder="••••••••" autocomplete="current-password" required>
                            <button type="button" id="togglePassword" class="btn btn-outline-secondary" aria-label="Tampilkan password">
                                <i class="bi bi-eye" id="togglePasswordIcon"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 rounded-3 fw-semibold shadow-sm">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Masuk ke Dashboard
                    </button>
                </form>

                <div class="text-center mt-4">
                    <a href="{{ url('/') }}" class="text-decoration-none small text-muted">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Tombol lihat / sembunyikan password
    (function () {
        const input = document.getElementById('password');
        const tombol = document.getElementById('togglePassword');
        const ikon = document.getElementById('togglePasswordIcon');

        tombol.addEventListener('click', function () {
            const tampil = input.type === 'password';
            input.type = tampil ? 'text' : 'password';
            ikon.className = tampil ? 'bi bi-eye-slash' : 'bi bi-eye';
            tombol.setAttribute('aria-label', tampil ? 'Sembunyikan password' : 'Tampilkan password');
        });
    })();
</script>
@endpush