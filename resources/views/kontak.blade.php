@extends('layouts.app')

@section('content')
<!-- HERO SECTION -->
<section
    class="text-white text-center d-flex align-items-center justify-content-center"
    style="background: linear-gradient(rgba(10, 54, 99, 0.8), rgba(10, 54, 99, 0.8)), url('{{ asset('images/gedung-kantor.jpg') }}') center center / cover no-repeat; min-height: 50vh;">

    <div class="container py-5">
        <nav aria-label="breadcrumb" class="d-flex justify-content-center">
            <ol class="breadcrumb mb-3" style="--bs-breadcrumb-divider-color: rgba(255,255,255,.6);">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}" class="text-white text-decoration-none fw-semibold">
                        <i class="bi bi-house-door-fill me-1"></i>Beranda
                    </a>
                </li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Kontak</li>
            </ol>
        </nav>

        <h1 class="display-4 fw-bold mb-3">Hubungi Kami</h1>
        <p class="lead col-lg-8 mx-auto mb-0">
            Kami siap membantu, menjawab pertanyaan, saran, dan informasi yang Anda butuhkan.
        </p>
    </div>
</section>

<!-- KONTEN UTAMA: FORM & GMAPS -->
<section class="py-5 bg-light">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        <div class="row g-3 g-lg-4">
            <!-- Bagian Kiri: Form Kirim Pesan -->
            <div class="col-lg-6">
                <div class="bg-white p-4 p-lg-5 rounded-4 shadow-sm border h-100">
                    <h3 class="fw-bold text-primary-custom fs-4 mb-4"><i class="bi bi-envelope-paper-fill me-2"></i>Kirim Pesan</h3>

                    <form action="{{ route('kontak.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                   placeholder="Masukkan nama lengkap..." value="{{ old('nama') }}" autocomplete="name" required>
                            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   placeholder="nama@email.com" value="{{ old('email') }}" autocomplete="email" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label fw-semibold">Judul / Subjek</label>
                            <input type="text" id="judul" name="judul" class="form-control @error('judul') is-invalid @enderror"
                                   placeholder="Perihal pesan..." value="{{ old('judul') }}" required>
                            @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="pesan" class="form-label fw-semibold">Pesan</label>
                            <textarea id="pesan" name="pesan" class="form-control @error('pesan') is-invalid @enderror" rows="5"
                                      placeholder="Tuliskan pesan atau pertanyaan Anda di sini..." required>{{ old('pesan') }}</textarea>
                            @error('pesan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary-custom w-100 py-2 rounded-3 fw-semibold">
                            <i class="bi bi-send-fill me-1"></i> Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>

            <!-- Bagian Kanan: Google Maps & Info Alamat -->
            <div class="col-lg-6">
                <div class="bg-white p-4 p-lg-5 rounded-4 shadow-sm border h-100 d-flex flex-column">
                    <h3 class="fw-bold text-primary-custom fs-4 mb-3"><i class="bi bi-geo-alt-fill me-2"></i>Lokasi Kantor</h3>
                    <p class="text-muted small mb-3">
                        <i class="bi bi-building me-1"></i> Jl. Raya Pajajaran No. 88 F, Bogor 16153
                    </p>

                    <!-- Google Maps Embed: iframe dibuat absolut agar selalu memenuhi kotak -->
                    <div class="position-relative flex-grow-1 rounded-3 overflow-hidden shadow-sm border" style="min-height: 350px;">
                        <iframe
                            title="Lokasi kantor PT Solusi Koneksi Anda"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.3975713437537!2d106.8077!3d-6.5971!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMzUnNDkuNiJTIDEwNsKwNDgnMjcuNyJF!5e0!3m2!1sid!2sid!4v1620000000000!5m2!1sid!2sid"
                            class="position-absolute top-0 start-0 w-100 h-100 border-0"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection