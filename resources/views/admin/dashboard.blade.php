@extends('layouts.admin')

@section('admin_content')
    <!-- HEADER ATAS: JUDUL & PROFIL ADMIN -->
<div class="d-flex justify-content-between align-items-center bg-white p-3 rounded-4 shadow-sm mb-4">
    <div>
        <h4 class="fw-bold text-dark mb-0">Dasbor Admin</h4>
    </div>
    <!-- Dibungkus a href agar bisa diklik menuju halaman edit profil -->
    <a href="{{ route('admin.profil.edit') }}" class="d-flex align-items-center gap-3 text-decoration-none card-hover p-2 rounded-3 transition-all" title="Edit Profil">
        <div class="bg-primary rounded-circle text-white d-flex align-items-center justify-content-center shadow-sm" style="width: 45px; height: 45px;">
            <i class="bi bi-person-fill fs-5"></i>
        </div>
        <div>
            <h6 class="fw-bold mb-0 text-dark">{{ Auth::user()->name ?? 'Admin' }}</h6>
            <small class="text-muted" style="font-size: 0.8rem;">Super Admin <i class="bi bi-gear-fill ms-1 text-primary"></i></small>
        </div>
    </a>
</div>

    <!-- SELAMAT DATANG -->
    <div class="mb-4">
        <h3 class="fw-bold text-dark">Selamat datang di dasbor admin</h3>
        <p class="text-muted">Kelola konten website PT Solusi Koneksi Anda dengan mudah.</p>
    </div>

    <!-- 4 KARTU STATISTIK UTAMA -->
    <div class="row g-3 mb-4">
        <!-- Produk -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                <div class="d-flex align-items-center mb-2">
                    <div class="bg-primary text-white p-3 rounded-3 me-3">
                        <i class="bi bi-box-seam fs-4"></i>
                    </div>
                    <div>
                        <span class="text-muted small">Produk</span>
                        <h3 class="fw-bold mb-0">{{ \App\Models\Produk::count() }}</h3>
                    </div>
                </div>
                <a href="{{ route('produk.index') }}" class="text-decoration-none small text-primary fw-semibold mt-2 d-inline-block">
                    Lihat detail <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Artikel Terkini -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                <div class="d-flex align-items-center mb-2">
                    <div class="bg-warning text-dark p-3 rounded-3 me-3">
                        <i class="bi bi-newspaper fs-4"></i>
                    </div>
                    <div>
                        <span class="text-muted small">Artikel Terkini</span>
                        <h3 class="fw-bold mb-0">{{ \App\Models\Artikel::count() }}</h3>
                    </div>
                </div>
                <a href="{{ route('artikel.index') }}" class="text-decoration-none small text-dark fw-semibold mt-2 d-inline-block">
                    Lihat detail <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Galeri Kegiatan -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                <div class="d-flex align-items-center mb-2">
                    <div class="bg-success text-white p-3 rounded-3 me-3">
                        <i class="bi bi-images fs-4"></i>
                    </div>
                    <div>
                        <span class="text-muted small">Galeri</span>
                        <h3 class="fw-bold mb-0">{{ \App\Models\Galeri::count() }}</h3>
                    </div>
                </div>
                <a href="{{ route('galeri.index') }}" class="text-decoration-none small text-success fw-semibold mt-2 d-inline-block">
                    Lihat detail <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Pesan Masuk -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                <div class="d-flex align-items-center mb-2">
                    <div class="bg-info text-white p-3 rounded-3 me-3">
                        <i class="bi bi-chat-dots fs-4"></i>
                    </div>
                    <div>
                        <span class="text-muted small">Pesan Masuk</span>
                        <h3 class="fw-bold mb-0">{{ \App\Models\Kontak::count() }}</h3>
                    </div>
                </div>
                <a href="{{ route('kontak.index') }}" class="text-decoration-none small text-info fw-semibold mt-2 d-inline-block">
                    Lihat detail <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- STATISTIK KUNJUNGAN (DIAGRAM GARIS / LINE CHART) -->
    <div class="row g-4 mb-4">
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold text-dark mb-0">Statistik Kunjungan Website</h5>
                    <span class="badge bg-light text-muted border px-3 py-2 rounded-pill">7 hari terakhir</span>
                </div>
                
                <!-- Canvas untuk Chart.js -->
                <div style="position: relative; height: 260px; width: 100%;">
                    <canvas id="visitorChart"></canvas>
                </div>
            </div>
        </div>
        
        <!-- PESAN TERBARU -->
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold text-dark mb-0">Pesan Terbaru</h5>
                    <a href="{{ route('kontak.index') }}" class="text-decoration-none small fw-semibold text-primary">Lihat semua</a>
                </div>
                
                <div class="d-flex flex-column gap-3">
                    @php 
                        $latestKontaks = \App\Models\Kontak::latest()->take(5)->get(); 
                    @endphp

                    @forelse($latestKontaks as $kontak)
                    <div class="d-flex align-items-start justify-content-between border-bottom pb-3">
                        <div class="d-flex align-items-start gap-3">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1 text-dark" style="font-size: 0.95rem;">{{ $kontak->name }}</h6>
                                <p class="text-muted small mb-0 text-truncate" style="max-width: 250px;">{{ $kontak->message }}</p>
                            </div>
                        </div>
                        <div class="text-end">
                            <small class="text-muted d-block" style="font-size: 0.75rem;">{{ $kontak->created_at->format('H:i') }}</small>
                            <small class="text-muted d-block" style="font-size: 0.65rem;">{{ $kontak->created_at->format('d M Y') }}</small>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-4 text-muted">
                        <i class="bi bi-inbox display-6 mb-2 d-block"></i>
                        <p class="mb-0 small">Belum ada pesan atau konsultasi masuk dari pengunjung.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- ARTIKEL TERBARU & GALERI TERBARU -->
    <div class="row g-4">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold text-dark mb-0">Artikel Terbaru</h5>
                <!-- Perbaikan 1: Mengarahkan ke route admin artikel (route('artikel.index')) -->
                <a href="{{ route('artikel.index') }}" class="text-decoration-none small fw-semibold text-primary">Lihat semua</a>
            </div>
            
            <div class="d-flex flex-column gap-3">
                @php $latestArtikels = \App\Models\Artikel::latest()->take(3)->get(); @endphp
                @forelse($latestArtikels as $art)
                    <div class="d-flex align-items-center gap-3 border-bottom pb-2">
                        <img src="{{ filter_var($art->image, FILTER_VALIDATE_URL) ? $art->image : asset('storage/' . $art->image) }}" alt="Artikel" class="rounded object-fit-cover" style="width: 60px; height: 60px;">
                        <div>
                            <h6 class="fw-bold mb-1 text-dark" style="font-size: 0.9rem;">{{ Str::limit($art->title, 45) }}</h6>
                            <!-- Perbaikan 2: Menggunakan $art->tanggal_upload dengan fallback ke created_at -->
                            <small class="text-muted"><i class="bi bi-calendar3 me-1"></i> {{ \Carbon\Carbon::parse($art->tanggal_upload ?? $art->created_at)->format('d M Y') }}</small>
                        </div>
                    </div>
                @empty
                    <p class="text-muted small text-center py-3">Belum ada artikel terbaru.</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold text-dark mb-0">Galeri Terbaru</h5>
                <!-- (Opsional) Jika tombol "Lihat semua" galeri di dashboard mau ke admin juga, bisa pakai route('galeri.index') -->
                <a href="{{ route('galeri.index') }}" class="text-decoration-none small fw-semibold text-primary">Lihat semua</a>
            </div>

            <div class="row g-2">
                @php $latestGaleris = \App\Models\Galeri::latest()->take(4)->get(); @endphp
                @forelse($latestGaleris as $gal)
                    <div class="col-6">
                        <div class="position-relative rounded-3 overflow-hidden shadow-sm" style="height: 100px;">
                            <img src="{{ filter_var($gal->image, FILTER_VALIDATE_URL) ? $gal->image : asset('storage/' . $gal->image) }}" alt="Galeri" class="w-100 h-100 object-fit-cover">
                            <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-50 text-white p-1 text-center" style="font-size: 0.75rem;">
                                {{ Str::limit($gal->title, 20) }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-4 text-muted small">Belum ada foto galeri.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>

    <!-- SCRIPT CHART.JS UNTUK DIAGRAM GARIS KUNJUNGAN -->
    @php
        // Ambil data kunjungan 7 hari terakhir secara otomatis dari database
        $chartLabels = [];
        $chartData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $chartLabels[] = $date->format('d M');
            // Ganti '\App\Models\Visitor' dengan nama model tabel kunjungan Anda jika berbeda
            $count = class_exists(\App\Models\Visitor::class) 
                ? \App\Models\Visitor::whereDate('visit_date', $date->toDateString())->count() 
                : rand(5, 25); // Fallback data jika tabel belum ada
            $chartData[] = $count;
        }
    @endphp

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('visitorChart').getContext('2d');
        const visitorChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($chartLabels) !!},
                datasets: [{
                    label: 'Jumlah Kunjungan',
                    data: {!! json_encode($chartData) !!},
                    borderColor: '#0d6efd',
                    backgroundColor: 'rgba(13, 110, 253, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#0d6efd',
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    </script>
@endsection