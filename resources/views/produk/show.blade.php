@extends('layouts.app')

@section('content')

@php
    $faqList = [
        [
            'tanya' => 'Bagaimana cara memesan atau berlangganan layanan ini?',
            'jawab' => 'Anda dapat mengklik tombol "Minta Penawaran / Pesan Layanan" di atas untuk langsung terhubung dengan tim sales dan konsultasi kami melalui WhatsApp atau formulir kontak resmi.',
        ],
        [
            'tanya' => 'Apakah layanan ini mencakup garansi dan pemeliharaan (maintenance)?',
            'jawab' => 'Ya, setiap instalasi dan layanan infrastruktur jaringan dari PT Solusi Koneksi Anda dilindungi oleh garansi SLA serta dukungan operasional Network Operations Center (NOC) 24/7.',
        ],
        [
            'tanya' => 'Apakah spesifikasi layanan dapat disesuaikan dengan skala perusahaan?',
            'jawab' => 'Tentu. Kami menyediakan layanan yang bersifat kustom (skalabel) menyesuaikan kebutuhan bandwidth, luas area cakupan, maupun kerumitan arsitektur sistem IT korporat Anda.',
        ],
    ];
@endphp

<div class="container py-4 py-lg-5">
    <!-- Tombol Kembali -->
    <div class="mb-4">
        <a href="{{ url('/produk') }}" class="btn btn-outline-secondary btn-sm rounded-3">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Produk
        </a>
    </div>

    <!-- DETAIL PRODUK -->
    <div class="bg-white p-4 p-lg-5 rounded-4 shadow-sm border mb-4 mb-lg-5">
        <div class="row align-items-center g-4 g-lg-5">
            <!-- Kolom Gambar Produk -->
            <div class="col-lg-6">
                @if($produks->image)
                    <div class="ratio ratio-4x3 rounded-3 shadow-sm overflow-hidden">
                        <img src="{{ filter_var($produks->image, FILTER_VALIDATE_URL) ? $produks->image : asset('storage/' . $produks->image) }}" class="w-100 h-100 object-fit-cover" alt="{{ $produks->name }}">
                    </div>
                @else
                    <div class="ratio ratio-4x3 rounded-3 border bg-light">
                        <div class="d-flex flex-column align-items-center justify-content-center text-center text-secondary">
                            <i class="bi bi-hdd-network display-1 text-muted mb-3"></i>
                            <p class="text-muted mb-0">Tidak ada foto untuk produk ini</p>
                        </div>
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
                <p class="text-secondary lh-lg mb-4 text-break" style="white-space: pre-line;">{{ $produks->description }}</p>

                <!-- Di HP tombol selebar layar agar teks panjangnya tidak keluar -->
                <div class="d-grid d-md-block">
                    <a href="{{ url('/kontak') }}" class="btn btn-primary btn-lg px-4 rounded-3 fw-semibold">
                        <i class="bi bi-chat-dots-fill me-2"></i> Minta Penawaran / Pesan Layanan
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ / PERTANYAAN UMUM TERKAIT LAYANAN -->
    <div class="bg-white p-4 p-lg-5 rounded-4 shadow-sm border">
        <h3 class="fw-bold fs-4 mb-4 text-center">Pertanyaan Umum (FAQ)</h3>
        <div class="accordion" id="faqProdukAccordion">
            @foreach($faqList as $faq)
            <div class="accordion-item border-0 shadow-sm rounded-3 overflow-hidden {{ $loop->last ? '' : 'mb-3' }}">
                <h2 class="accordion-header" id="heading{{ $loop->iteration }}">
                    <button class="accordion-button fw-semibold {{ $loop->first ? '' : 'collapsed' }}" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->iteration }}"
                            aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse{{ $loop->iteration }}">
                        {{ $faq['tanya'] }}
                    </button>
                </h2>
                <div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                     aria-labelledby="heading{{ $loop->iteration }}" data-bs-parent="#faqProdukAccordion">
                    <div class="accordion-body text-muted lh-lg">
                        {{ $faq['jawab'] }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection