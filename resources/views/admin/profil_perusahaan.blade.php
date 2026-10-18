@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0 bg-transparent p-0">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none text-muted"><i class="bi bi-house-door-fill me-1"></i>Dasbor</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Kelola Profil Perusahaan</li>
    </ol>
</nav>

<div class="bg-white p-4 rounded-4 shadow-sm mb-4">
    <h3 class="fw-bold text-dark fs-4 mb-1 d-flex align-items-center">
        <i class="bi bi-building-gear text-primary me-2"></i>Profil Perusahaan
    </h3>
    <p class="text-muted small mb-0">Perbarui informasi profil statis perusahaan untuk ditampilkan di halaman depan.</p>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
    </div>
@endif

<div class="card border-0 shadow-sm rounded-4 p-4 p-lg-5 bg-white">
    <form action="{{ route('profil_perusahaan.update') }}" method="POST">
        @csrf
        @method('PUT')

        <!-- NAMA PERUSAHAAN -->
        <div class="mb-4">
            <label for="nama_perusahaan" class="form-label fw-bold text-dark">Nama Perusahaan <span class="text-danger">*</span></label>
            <input type="text" id="nama_perusahaan" name="nama_perusahaan"
                   class="form-control form-control-lg @error('nama_perusahaan') is-invalid @enderror"
                   value="{{ old('nama_perusahaan', $profile->nama_perusahaan ?? '') }}" required>
            @error('nama_perusahaan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- SAMBUTAN -->
        <div class="mb-4">
            <label for="sambutan" class="form-label fw-bold text-dark">Sambutan Pimpinan / Direktural</label>
            <textarea id="sambutan" name="sambutan" class="form-control @error('sambutan') is-invalid @enderror" rows="4"
                      placeholder="Tuliskan kata sambutan singkat...">{{ old('sambutan', $profile->sambutan ?? '') }}</textarea>
            @error('sambutan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">Di beranda hanya 240 karakter pertama yang tampil. Halaman Profil menampilkan seluruhnya.</div>
        </div>

        <!-- SEJARAH -->
        <div class="mb-4">
            <label for="sejarah" class="form-label fw-bold text-dark">Sejarah Perusahaan</label>
            <textarea id="sejarah" name="sejarah" class="form-control @error('sejarah') is-invalid @enderror" rows="6"
                      placeholder="Ceritakan sejarah ringkas berdirinya perusahaan...">{{ old('sejarah', $profile->sejarah ?? '') }}</textarea>
            @error('sejarah')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">Pisahkan paragraf dengan satu baris kosong. Di beranda hanya 2 paragraf pertama yang tampil (maks. 420 karakter per paragraf).</div>
        </div>

        <!-- VISI & MISI -->
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label for="visi" class="form-label fw-bold text-dark">Visi Perusahaan</label>
                <textarea id="visi" name="visi" class="form-control @error('visi') is-invalid @enderror" rows="5"
                          placeholder="Tuliskan visi perusahaan...">{{ old('visi', $profile->visi ?? '') }}</textarea>
                @error('visi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Di beranda hanya 240 karakter pertama yang tampil.</div>
            </div>

            <div class="col-md-6">
                <label for="misi" class="form-label fw-bold text-dark">Misi Perusahaan</label>
                <textarea id="misi" name="misi" class="form-control @error('misi') is-invalid @enderror" rows="5"
                          placeholder="1. Misi pertama&#10;2. Misi kedua">{{ old('misi', $profile->misi ?? '') }}</textarea>
                @error('misi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Tekan Enter untuk poin berikutnya. Nomor terisi otomatis.</div>
            </div>
        </div>

        <!-- TOMBOL SIMPAN: di HP selebar layar, di layar lebar rata kanan -->
        <div class="d-grid d-sm-flex justify-content-sm-end">
            <button type="submit" class="btn btn-primary fw-semibold px-4 py-2 rounded-3">
                <i class="bi bi-save me-1"></i> Perbarui Profil Perusahaan
            </button>
        </div>
    </form>
</div>

<!-- Penomoran otomatis untuk kolom Misi -->
<script>
    (function () {
        const misi = document.getElementById('misi');
        if (!misi) return;

        // Kolom kosong lalu diklik: mulai dari "1. "
        misi.addEventListener('focus', function () {
            if (misi.value.trim() === '') misi.value = '1. ';
        });

        // Enter: buat baris baru dengan nomor berikutnya
        misi.addEventListener('keydown', function (e) {
            if (e.key !== 'Enter') return;

            const pos = misi.selectionStart;
            const before = misi.value.substring(0, pos);
            const after = misi.value.substring(pos);
            const currentLine = before.split('\n').pop();
            const match = currentLine.match(/^(\d+)\.\s*(.*)$/);
            if (!match) return;

            e.preventDefault();

            // Enter pada baris yang hanya berisi nomor: hapus nomornya (selesai menulis poin)
            if (match[2].trim() === '') {
                const start = before.length - currentLine.length;
                misi.value = before.substring(0, start) + after;
                misi.selectionStart = misi.selectionEnd = start;
                return;
            }

            const next = '\n' + (parseInt(match[1], 10) + 1) + '. ';
            misi.value = before + next + after;
            misi.selectionStart = misi.selectionEnd = pos + next.length;
        });

        // Jangan menyimpan nomor kosong, misalnya "1. " saja
        misi.addEventListener('blur', function () {
            if (/^\d+\.\s*$/.test(misi.value.trim())) misi.value = '';
        });
    })();
</script>
@endsection