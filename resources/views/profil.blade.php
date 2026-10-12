@extends('layouts.app')

@section('content')
<!-- HEADER / BANNER PROFIL -->
<div class="bg-primary-custom text-white py-5 mb-5 shadow-sm">
    <div class="container text-center py-4">
        <h1 class="fw-bold display-5">Profil Perusahaan</h1>
        <p class="lead mb-0">Mengenal lebih dekat visi, misi, dan komitmen PT Solusi Koneksi Anda</p>
    </div>
</div>

<!-- KONTEN UTAMA PROFIL -->
<div class="container mb-5">
    <!-- Bagian 1: Tentang Perusahaan -->
    <div class="row align-items-center mb-5 bg-white p-4 p-lg-5 rounded-4 shadow-sm border">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <span class="badge bg-primary mb-2 text-uppercase tracking-wider">Tentang Kami</span>
            <h2 class="fw-bold mb-3 text-primary-custom">PT Solusi Koneksi Anda</h2>
            <p class="text-muted lh-base">
                <strong>PT Solusi Koneksi Anda</strong> adalah perusahaan yang bergerak di bidang penyedia infrastruktur jaringan telekomunikasi, solusi teknologi informasi, dan layanan konektivitas digital terkemuka. Didirikan dengan komitmen untuk mempercepat transformasi digital bagi dunia usaha di Indonesia, kami menyediakan layanan yang handal, aman, dan berstandar tinggi.
            </p>
            <p class="text-muted lh-base">
                Berkantor pusat di Kota Bogor, kami didukung oleh tenaga ahli yang berpengalaman di bidang teknik jaringan, manajemen sistem IT, serta pelayanan pelanggan profesional.
            </p>
        </div>
        <div class="col-lg-6 text-center">
            <div class="p-3 bg-light rounded-4 border">
                <i class="bi bi-building-fill-gear text-primary display-1 mb-3"></i>
                <h5 class="fw-bold text-dark">Kantor Pusat</h5>
                <p class="text-muted small mb-0">
                    Jl. Raya Pajajaran No. 88 F<br>
                    Kota Bogor, Jawa Barat 16153<br>
                    Indonesia
                </p>
            </div>
        </div>
    </div>

    <!-- Bagian 2: Visi & Misi -->
    <div class="row g-4 mb-5">
        <!-- Visi -->
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm p-4 bg-white">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary text-white rounded-circle p-3 me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-eye-fill fs-4"></i>
                        </div>
                        <h3 class="fw-bold m-0 text-primary-custom">Visi Perusahaan</h3>
                    </div>
                    <p class="text-muted lh-base fs-5 mb-0">
                        "Menjadi penyedia layanan koneksi dan infrastruktur IT terdepan dan terpercaya di Indonesia yang mendukung kemajuan ekosistem digital nasional."
                    </p>
                </div>
            </div>
        </div>

        <!-- Misi -->
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm p-4 bg-white">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary text-white rounded-circle p-3 me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-rocket-takeoff-fill fs-4"></i>
                        </div>
                        <h3 class="fw-bold m-0 text-primary-custom">Misi Perusahaan</h3>
                    </div>
                    <ul class="text-muted ps-3 mb-0 lh-lg">
                        <li>Memberikan layanan jaringan dan internet berkualitas tinggi yang stabil dan aman.</li>
                        <li>Mengembangkan inovasi teknologi yang relevan dengan kebutuhan dunia usaha modern.</li>
                        <li>Memberikan pelayanan profesional demi kepuasan mitra dan pelanggan.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian 3: Legalitas & Kemitraan -->
    <div class="bg-white p-4 p-lg-5 rounded-4 shadow-sm border text-center">
        <h3 class="fw-bold mb-3 text-primary-custom">Komitmen Layanan & Kolaborasi</h3>
        <p class="text-muted col-lg-8 mx-auto mb-4">
            Dalam menjalankan setiap proyek operasionalnya, PT Solusi Koneksi Anda selalu menjunjung tinggi standar Keselamatan dan Kesehatan Kerja (K3), protokol operasional yang ketat, serta kemitraan strategis guna memberikan hasil terbaik bagi klien.
        </p>
        <a href="{{ url('/kontak') }}" class="btn btn-primary px-4 py-2">Hubungi Tim Kami</a>
    </div>
</div>
@endsection