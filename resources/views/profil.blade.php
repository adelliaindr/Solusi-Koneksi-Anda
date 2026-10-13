@extends('layouts.app')

@section('content')

<!-- 1. HERO -->
<section
    class="text-white text-center d-flex align-items-center justify-content-center"
    style="background: linear-gradient(rgba(10, 54, 99, 0.8), rgba(10, 54, 99, 0.8)), url('{{ asset('images/gedung-kantor.jpg') }}') center center / cover no-repeat; min-height: 100vh;">

    <div class="container py-5">
        <nav aria-label="breadcrumb" class="d-flex justify-content-center">
            <ol class="breadcrumb mb-3" style="--bs-breadcrumb-divider-color: rgba(255,255,255,.6);">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}" class="text-white text-decoration-none fw-semibold">
                        <i class="bi bi-house-door-fill me-1"></i>Beranda
                    </a>
                </li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Profil</li>
            </ol>
        </nav>
        <h1 class="display-4 fw-bold mb-3">Profil Perusahaan</h1>
        <p class="lead col-lg-8 mx-auto mb-0">
            Mengenal lebih dekat visi, misi, dan komitmen PT Solusi Koneksi Anda
        </p>
    </div>
</section>

<!-- 2. TENTANG KAMI -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="badge bg-primary mb-3 text-uppercase">Tentang Kami</span>
                <h2 class="fw-bold mb-3 text-primary-custom">PT Solusi Koneksi Anda</h2>
                <p class="text-muted lh-lg">
                    <strong>PT Solusi Koneksi Anda</strong> adalah perusahaan yang bergerak di bidang penyedia infrastruktur jaringan telekomunikasi, solusi teknologi informasi, dan layanan konektivitas digital. Kami didirikan dengan komitmen untuk mempercepat transformasi digital bagi dunia usaha di Indonesia melalui layanan yang handal, aman, dan berstandar tinggi.
                </p>
                <p class="text-muted lh-lg mb-4">
                    Berkantor pusat di Kota Bogor, kami didukung tenaga ahli berpengalaman di bidang teknik jaringan, manajemen sistem IT, serta pelayanan pelanggan profesional.
                </p>
                <ul class="list-unstyled text-muted mb-0">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Infrastruktur jaringan yang stabil dan aman</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Tim teknis berpengalaman dan profesional</li>
                    <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Solusi disesuaikan dengan kebutuhan usaha Anda</li>
                </ul>
            </div>

            <div class="col-lg-5">
                <div class="card border-0 shadow-sm bg-light rounded-4">
                    <div class="card-body p-4 p-lg-5 text-center">
                        <i class="bi bi-building-fill-gear text-primary display-3 d-block mb-3"></i>
                        <h5 class="fw-bold mb-2">Kantor Pusat</h5>
                        <p class="text-muted mb-0 lh-base">
                            Jl. Raya Pajajaran No. 88 F<br>
                            Kota Bogor, Jawa Barat 16153<br>
                            Indonesia
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. VISI & MISI -->
<section class="py-5">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-primary fw-semibold text-uppercase">Arah Perusahaan</span>
            <h2 class="fw-bold mt-2 mb-0">Visi & Misi</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-lg-5">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center me-3" style="width: 56px; height: 56px;">
                                <i class="bi bi-eye-fill fs-3"></i>
                            </div>
                            <h3 class="fw-bold m-0 text-primary-custom">Visi</h3>
                        </div>
                        <p class="text-muted lh-lg mb-0">
                            Menjadi penyedia layanan koneksi dan infrastruktur IT terdepan dan terpercaya di Indonesia yang mendukung kemajuan ekosistem digital nasional.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-lg-5">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center me-3" style="width: 56px; height: 56px;">
                                <i class="bi bi-rocket-takeoff-fill fs-3"></i>
                            </div>
                            <h3 class="fw-bold m-0 text-primary-custom">Misi</h3>
                        </div>
                        <ul class="list-unstyled text-muted lh-lg mb-0">
                            <li class="mb-2"><i class="bi bi-check2-circle text-primary me-2"></i>Memberikan layanan jaringan dan internet berkualitas tinggi yang stabil dan aman.</li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-primary me-2"></i>Mengembangkan inovasi teknologi yang relevan dengan kebutuhan dunia usaha modern.</li>
                            <li><i class="bi bi-check2-circle text-primary me-2"></i>Memberikan pelayanan profesional demi kepuasan mitra dan pelanggan.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. NILAI PERUSAHAAN -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-primary fw-semibold text-uppercase">Budaya Kerja</span>
            <h2 class="fw-bold mt-2 mb-0">Nilai-Nilai Perusahaan</h2>
        </div>

        <div class="row g-4">
            <div class="col-sm-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 text-center">
                    <div class="card-body p-4">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 64px; height: 64px;">
                            <i class="bi bi-shield-check fs-3"></i>
                        </div>
                        <h5 class="fw-bold">Integritas</h5>
                        <p class="text-muted small mb-0">Bekerja jujur, transparan, dan bertanggung jawab kepada mitra dan pelanggan.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 text-center">
                    <div class="card-body p-4">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 64px; height: 64px;">
                            <i class="bi bi-people-fill fs-3"></i>
                        </div>
                        <h5 class="fw-bold">Profesional</h5>
                        <p class="text-muted small mb-0">Ditangani tenaga ahli dengan standar kerja dan layanan yang tinggi.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 text-center">
                    <div class="card-body p-4">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 64px; height: 64px;">
                            <i class="bi bi-lightbulb-fill fs-3"></i>
                        </div>
                        <h5 class="fw-bold">Inovasi</h5>
                        <p class="text-muted small mb-0">Terus mengembangkan solusi teknologi yang sesuai kebutuhan usaha modern.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 text-center">
                    <div class="card-body p-4">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 64px; height: 64px;">
                            <i class="bi bi-hdd-network-fill fs-3"></i>
                        </div>
                        <h5 class="fw-bold">Handal</h5>
                        <p class="text-muted small mb-0">Menyediakan koneksi yang stabil dan aman untuk mendukung operasional Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. BIDANG LAYANAN -->
<section class="py-5">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-primary fw-semibold text-uppercase">Apa yang Kami Kerjakan</span>
            <h2 class="fw-bold mt-2 mb-0">Bidang Layanan</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <i class="bi bi-diagram-3-fill text-primary display-5 d-block mb-3"></i>
                        <h5 class="fw-bold">Infrastruktur Jaringan</h5>
                        <p class="text-muted mb-0">Perancangan dan penyediaan infrastruktur jaringan yang stabil, aman, dan siap berkembang bersama usaha Anda.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <i class="bi bi-broadcast-pin text-primary display-5 d-block mb-3"></i>
                        <h5 class="fw-bold">Telekomunikasi & Konektivitas</h5>
                        <p class="text-muted mb-0">Layanan konektivitas digital untuk menunjang komunikasi dan operasional bisnis sehari-hari.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <i class="bi bi-pc-display-horizontal text-primary display-5 d-block mb-3"></i>
                        <h5 class="fw-bold">Solusi Teknologi Informasi</h5>
                        <p class="text-muted mb-0">Manajemen sistem dan solusi IT yang disesuaikan dengan kebutuhan dan skala usaha.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="{{ url('/produk') }}" class="btn btn-outline-primary px-4">
                Lihat Produk & Layanan <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>

<!-- 6. MENGAPA MEMILIH KAMI -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <span class="badge bg-primary mb-3 text-uppercase">Keunggulan</span>
                <h2 class="fw-bold mb-3 text-primary-custom">Mengapa Memilih Kami?</h2>
                <p class="text-muted lh-lg mb-0">
                    Dalam setiap proyek, kami menjunjung tinggi standar Keselamatan dan Kesehatan Kerja (K3), protokol operasional yang ketat, serta kemitraan strategis demi hasil terbaik bagi klien.
                </p>
            </div>

            <div class="col-lg-7">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="d-flex p-3 bg-light rounded-4 h-100">
                            <i class="bi bi-check-circle-fill text-primary fs-4 me-3"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Layanan Berstandar Tinggi</h6>
                                <p class="text-muted small mb-0">Kualitas layanan yang konsisten dan terukur.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex p-3 bg-light rounded-4 h-100">
                            <i class="bi bi-check-circle-fill text-primary fs-4 me-3"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Tenaga Ahli Berpengalaman</h6>
                                <p class="text-muted small mb-0">Teknisi dan konsultan di bidang jaringan dan IT.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex p-3 bg-light rounded-4 h-100">
                            <i class="bi bi-check-circle-fill text-primary fs-4 me-3"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Keamanan Terjaga</h6>
                                <p class="text-muted small mb-0">Jaringan yang aman untuk data dan operasional usaha.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex p-3 bg-light rounded-4 h-100">
                            <i class="bi bi-check-circle-fill text-primary fs-4 me-3"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Pelayanan Profesional</h6>
                                <p class="text-muted small mb-0">Responsif terhadap kebutuhan mitra dan pelanggan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 7. INFORMASI PERUSAHAAN -->
<section class="py-5">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-lg-5">
                        <h3 class="fw-bold text-primary-custom mb-4 text-center">Informasi Perusahaan</h3>
                        <table class="table table-borderless align-middle mb-0">
                            <tbody>
                                <tr class="border-bottom">
                                    <th class="text-muted fw-semibold py-3" style="width: 35%;">Nama Perusahaan</th>
                                    <td class="py-3">PT Solusi Koneksi Anda</td>
                                </tr>
                                <tr class="border-bottom">
                                    <th class="text-muted fw-semibold py-3">Bidang Usaha</th>
                                    <td class="py-3">Infrastruktur jaringan, telekomunikasi, dan solusi teknologi informasi</td>
                                </tr>
                                <tr>
                                    <th class="text-muted fw-semibold py-3">Kantor Pusat</th>
                                    <td class="py-3">Jl. Raya Pajajaran No. 88 F, Kota Bogor, Jawa Barat 16153</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 8. CTA -->
<section class="py-5">
    <div class="container py-4">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="row g-0 align-items-center">

                <div class="col-lg-8">
                    <div class="card-body p-4 p-lg-5">
                        <span class="badge bg-primary mb-3 text-uppercase">Hubungi Kami</span>
                        <h2 class="fw-bold text-primary-custom mb-3">Siap Berkolaborasi dengan Kami?</h2>
                        <p class="text-muted lh-lg mb-4">
                            Konsultasikan kebutuhan jaringan dan teknologi usaha Anda bersama tim kami.
                        </p>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{ url('/kontak') }}" class="btn btn-primary px-4">
                                <i class="bi bi-envelope-fill me-1"></i> Hubungi Tim Kami
                            </a>
                            <a href="{{ url('/produk') }}" class="btn btn-outline-primary px-4">
                                Lihat Produk & Layanan
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 d-none d-lg-flex bg-primary-custom text-white align-items-center justify-content-center py-5">
                    <i class="bi bi-headset display-1"></i>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection