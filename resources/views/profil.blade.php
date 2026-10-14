@extends('layouts.app')

@section('content')

<!-- 1. HERO SECTION -->
<section
    class="text-white text-center d-flex align-items-center justify-content-center"
    style="background: linear-gradient(rgba(10, 54, 99, 0.85), rgba(10, 54, 99, 0.85)), url('{{ asset('images/gedung-kantor.jpg') }}') center center / cover no-repeat; min-height: 95vh;">

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
            Mengenal lebih dekat sejarah, visi, misi, dan komitmen PT Solusi Koneksi Anda.
        </p>
    </div>
</section>

<!-- 2. TENTANG KAMI -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="badge bg-primary mb-3 text-uppercase">Tentang Kami</span>
                <h2 class="fw-bold mb-3 text-dark">PT Solusi Koneksi Anda</h2>
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

<!-- 3. SEJARAH & LATAR BELAKANG -->
<section class="py-5 bg-light border-top">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <div class="p-4 bg-white rounded-4 shadow-sm border">
                    <i class="bi bi-clock-history text-primary display-4 mb-3 d-block"></i>
                    <h3 class="fw-bold mb-2">Perjalanan Kami</h3>
                    <p class="text-muted small mb-0">Tumbuh dan berkembang bersama mitra korporat di era transformasi digital.</p>
                </div>
            </div>
            <div class="col-lg-7">
                <span class="text-primary fw-semibold text-uppercase">Latar Belakang</span>
                <h2 class="fw-bold mt-2 mb-3">Sejarah Pendirian Perusahaan</h2>
                <p class="text-muted lh-lg">
                    Berawal dari kesadaran akan tingginya kebutuhan konektivitas internet yang stabil serta infrastruktur jaringan IT yang handal bagi dunia usaha, PT Solusi Koneksi Anda resmi didirikan di Kota Bogor.
                </p>
                <p class="text-muted lh-lg mb-0">
                    Seiring berjalannya waktu, kami telah memperluas cakupan layanan ke berbagai kota, menjalin kemitraan strategis dengan berbagai instansi, serta konsisten menghadirkan inovasi teknologi yang memenuhi standar kualitas tertinggi (SLA).
                </p>
            </div>
        </div>
    </div>
</section>

<!-- 4. VISI & MISI -->
<section class="py-5 bg-white border-top">
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
                            <h3 class="fw-bold m-0 text-dark">Visi</h3>
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
                            <h3 class="fw-bold m-0 text-dark">Misi</h3>
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

<!-- 5. NILAI PERUSAHAAN -->
<section class="py-5 bg-light border-top">
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

<!-- 6. TIM MANAJEMEN -->
<section class="py-5 bg-white border-top">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-primary fw-semibold text-uppercase">Kepemimpinan</span>
            <h2 class="fw-bold mt-2 mb-0">Tim Manajemen</h2>
        </div>

        <div class="row g-4 justify-content-center">
    <!-- Kartu Direktur Utama -->
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 text-center p-4 h-100">
            <!-- Frame Foto Bulat -->
            <div class="mx-auto mb-3" style="width: 120px; height: 120px;">
                <img src="{{ asset('images/direktur.jpg') }}" 
                     alt="Foto Direktur Utama" 
                     class="img-fluid rounded-circle shadow-sm border border-2 border-light object-fit-cover"
                     style="width: 100%; height: 100%;">
            </div>
            
            <h5 class="fw-bold mb-1 text-dark">Nama Direktur Utama</h5>
            <p class="text-primary small mb-2 fw-semibold">Direktur Utama</p>
            <p class="text-muted small mb-2">Pimpinan & Strategi Korporat</p>
            <p class="text-muted small mb-0 lh-base">
                Berpengalaman lebih dari 15 tahun di bidang infrastruktur jaringan telekomunikasi nasional.
            </p>
        </div>
    </div>

    <!-- Kartu Kepala Divisi Teknik -->
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 text-center p-4 h-100">
            <!-- Frame Foto Bulat -->
            <div class="mx-auto mb-3" style="width: 120px; height: 120px;">
                <img src="{{ asset('images/kepala_teknik.jpg') }}" 
                     alt="Foto Kepala Divisi Teknik" 
                     class="img-fluid rounded-circle shadow-sm border border-2 border-light object-fit-cover"
                     style="width: 100%; height: 100%;">
            </div>

            <h5 class="fw-bold mb-1 text-dark">Nama Kepala Teknik</h5>
            <p class="text-primary small mb-2 fw-semibold">Kepala Divisi Teknik</p>
            <p class="text-muted small mb-2">Operasional & NOC</p>
            <p class="text-muted small mb-0 lh-base">
                Memastikan kestabilan jaringan, keamanan server, dan standar operasional lapangan (K3).
            </p>
        </div>
    </div>
</div>
    </div>
</section>

<!-- 7. LEGALITAS & SERTIFIKASI -->
<section class="py-5 bg-light border-top">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-primary fw-semibold text-uppercase">Kredibilitas</span>
            <h2 class="fw-bold mt-2 mb-0">Legalitas & Sertifikasi</h2>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 shadow-sm border text-center h-100">
                    <i class="bi bi-file-earmark-check-fill text-primary display-5 mb-3"></i>
                    <h5 class="fw-bold mb-2">Badan Hukum Resmi</h5>
                    <p class="text-muted small mb-0">Terdaftar secara resmi sebagai Perseroan Terbatas (PT) dengan kelengkapan perizinan berusaha dan NIB.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 shadow-sm border text-center h-100">
                    <i class="bi bi-shield-shaded text-primary display-5 mb-3"></i>
                    <h5 class="fw-bold mb-2">Standar Mutu & K3</h5>
                    <p class="text-muted small mb-0">Penerapan prosedur Keselamatan dan Kesehatan Kerja (K3) yang ketat dalam setiap proyek instalasi.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 8. INFORMASI PERUSAHAAN -->
<section class="py-5 bg-white border-top">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-lg-5">
                        <h3 class="fw-bold text-primary mb-4 text-center">Informasi Perusahaan</h3>
                        <table class="table table-borderless align-middle mb-0">
                            <tbody>
                                <tr class="border-bottom">
                                    <th class="text-muted fw-semibold py-3" style="width: 35%;">Nama Perusahaan</th>
                                    <td class="py-3 fw-medium">PT Solusi Koneksi Anda</td>
                                </tr>
                                <tr class="border-bottom">
                                    <th class="text-muted fw-semibold py-3">Bidang Usaha</th>
                                    <td class="py-3">Infrastruktur jaringan, telekomunikasi, dan solusi teknologi informasi</td>
                                </tr>
                                <tr class="border-bottom">
                                    <th class="text-muted fw-semibold py-3">Kantor Pusat</th>
                                    <td class="py-3">Jl. Raya Pajajaran No. 88 F, Kota Bogor, Jawa Barat 16153</td>
                                </tr>
                                <tr>
                                    <th class="text-muted fw-semibold py-3">Legalitas</th>
                                    <td class="py-3">PT Berbadan Hukum Resmi & Tersertifikasi</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 9. CTA (CALL TO ACTION) -->
<section class="py-5 bg-light border-top">
    <div class="container py-4">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="row g-0 align-items-center justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="card-body p-4 p-lg-5 text-center">
                        <span class="badge bg-primary mb-3 text-uppercase">Hubungi Kami</span>
                        <h2 class="fw-bold text-dark mb-3">Siap Berkolaborasi dengan Kami?</h2>
                        <p class="text-muted lh-lg mb-4 col-lg-10 mx-auto">
                            Konsultasikan kebutuhan jaringan dan teknologi usaha Anda bersama tim konsultan kami.
                        </p>
                        <div class="d-flex flex-wrap justify-content-center gap-2">
                            <a href="{{ url('/kontak') }}" class="btn btn-primary px-4 py-2 rounded-3 fw-semibold">
                                <i class="bi bi-envelope-fill me-1"></i> Hubungi Tim Kami
                            </a>
                            <a href="{{ url('/produk') }}" class="btn btn-outline-primary px-4 py-2 rounded-3 fw-semibold">
                                Lihat Produk & Layanan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection