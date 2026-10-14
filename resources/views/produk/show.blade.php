@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Tombol Kembali -->
    <div class="mb-4">
        <a href="{{ url('/produk') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Produk
        </a>
    </div>

    <div class="row bg-white p-4 p-lg-5 rounded-4 shadow-sm border align-items-center mb-5">
        <!-- Kolom Gambar Produk -->
        <div class="col-lg-6 mb-4 mb-lg-0 text-center">
            @if($produks->image)
                <img src="{{ filter_var($produks->image, FILTER_VALIDATE_URL) ? $produks->image : asset('storage/' . $produks->image) }}" class="img-fluid rounded-3 shadow-sm" alt="{{ $produks->name }}" style="max-height: 400px; object-fit: cover; width: 100%;">
            @else
                <div class="bg-light text-secondary d-flex flex-column align-items-center justify-content-center rounded-3 p-5 border" style="height: 350px;">
                    <i class="bi bi-hdd-network display-1 text-muted mb-3"></i>
                    <p class="text-muted">Tidak ada foto untuk produk ini</p>
                </div>
            @endif
        </div>

        <!-- Kolom Informasi Detail Produk -->
        <div class="col-lg-6">
            <div class="mb-2">
                <span class="badge bg-primary bg-opacity-10 text-primary border-0 text-capitalize px-3 py-2">{{ $produks->kategori ?? $produks->category ?? 'Layanan' }}</span>
            </div>
            
            <h1 class="fw-bold text-dark mb-3 text-break display-6">{{ $produks->name }}</h1>
            
            @if($produks->price)
                <div class="mb-3">
                    <span class="badge bg-success fs-5 px-3 py-2">Rp {{ number_format($produks->price, 0, ',', '.') }}</span>
                </div>
            @endif

            <hr class="my-4">

            <h5 class="fw-bold text-dark mb-2">Deskripsi Lengkap</h5>
            <p class="text-secondary lh-base mb-4 text-break" style="white-space: pre-line;">{{ $produks->description }}</p>

            <div class="d-flex gap-2">
                <a href="{{ url('/kontak') }}" class="btn btn-primary btn-lg px-4 rounded-3 fw-semibold">
                    <i class="bi bi-chat-dots-fill me-2"></i> Minta Penawaran / Pesan Layanan
                </a>
            </div>
        </div>
    </div>

    <!-- FAQ / PERTANYAAN UMUM TERKAIT LAYANAN -->
    <div class="bg-white p-4 p-lg-5 rounded-4 shadow-sm border">
        <h3 class="fw-bold mb-4 text-center">Pertanyaan Umum (FAQ)</h3>
        <div class="accordion" id="faqProdukAccordion">
            <div class="accordion-item border-0 mb-3 shadow-sm rounded-3 overflow-hidden">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Bagaimana cara memesan atau berlangganan layanan ini?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqProdukAccordion">
                    <div class="accordion-body text-muted">
                        Anda dapat mengklik tombol "Minta Penawaran / Pesan Layanan" di atas untuk langsung terhubung dengan tim sales dan konsultasi kami melalui WhatsApp atau formulir kontak resmi.
                    </div>
                </div>
            </div>
            <div class="accordion-item border-0 mb-3 shadow-sm rounded-3 overflow-hidden">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Apakah layanan ini mencakup garansi dan pemeliharaan (maintenance)?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqProdukAccordion">
                    <div class="accordion-body text-muted">
                        Ya, setiap instalasi dan layanan infrastruktur jaringan dari PT Solusi Koneksi Anda dilindungi oleh garansi SLA serta dukungan operasional Network Operations Center (NOC) 24/7.
                    </div>
                </div>
            </div>
            <div class="accordion-item border-0 shadow-sm rounded-3 overflow-hidden">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Apakah spesifikasi layanan dapat disesuaikan dengan skala perusahaan?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqProdukAccordion">
                    <div class="accordion-body text-muted">
                        Tentu. Kami menyediakan layanan yang bersifat kustom (skalabel) menyesuaikan kebutuhan bandwidth, luas area cakupan, maupun kerumitan arsitektur sistem IT korporat Anda.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection