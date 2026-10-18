@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0 bg-transparent p-0">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none text-muted"><i class="bi bi-house-door-fill me-1"></i>Dasbor</a></li>
        <li class="breadcrumb-item"><a href="{{ route('produk.index') }}" class="text-decoration-none text-muted">Produk</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Edit</li>
    </ol>
</nav>

<!-- HEADER -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 bg-white p-4 rounded-4 shadow-sm border-0 mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-1 d-flex align-items-center">
            <i class="bi bi-pencil-square text-primary me-2"></i>Edit Produk
        </h3>
        <p class="text-muted small mb-0">Perbarui spesifikasi, deskripsi, atau foto produk.</p>
    </div>
    <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary px-3 py-2 rounded-3 fw-semibold">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @if($errors->any())
        <div class="alert alert-danger rounded-4 border-0 shadow-sm">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>Periksa kembali isian formulir di bawah ini.
        </div>
    @endif

    <div class="row g-4">
        <!-- KOLOM UTAMA -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 bg-white">
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nama Produk <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $produk->name) }}" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="kategori" class="form-label fw-semibold">Kategori Layanan <span class="text-danger">*</span></label>
                        <select id="kategori" name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                            <option value="" disabled>-- Pilih Kategori --</option>
                            @foreach(['infrastruktur jaringan' => 'Infrastruktur Jaringan', 'telekomunikasi & konektivitas' => 'Telekomunikasi & Konektivitas', 'solusi teknologi informasi' => 'Solusi Teknologi Informasi'] as $value => $label)
                                <option value="{{ $value }}" {{ old('kategori', $produk->kategori) == $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div>
                        <label for="description" class="form-label fw-semibold">Deskripsi Produk <span class="text-danger">*</span></label>
                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                  rows="8" required>{{ old('description', $produk->description) }}</textarea>
                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- KOLOM GAMBAR -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 bg-white">
                <div class="card-body p-4">
                    <label for="image" class="form-label fw-semibold">Gambar Produk</label>

                    @php
                        $currentImage = $produk->image
                            ? (filter_var($produk->image, FILTER_VALIDATE_URL) ? $produk->image : asset('storage/' . $produk->image))
                            : null;
                    @endphp

                    <div class="ratio ratio-4x3 bg-light rounded-3 border overflow-hidden mb-3">
                        <div id="previewPlaceholder" class="d-flex flex-column align-items-center justify-content-center text-muted {{ $currentImage ? 'd-none' : '' }}">
                            <i class="bi bi-image fs-1 mb-1"></i>
                            <span class="small">Belum ada gambar</span>
                        </div>
                        <img id="previewImage" src="{{ $currentImage }}" alt="{{ $produk->name }}"
                             class="w-100 h-100 object-fit-cover {{ $currentImage ? '' : 'd-none' }}">
                    </div>

                    <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                    <div class="form-text">Pilih file baru jika ingin mengganti gambar lama (Maks: 2MB).</div>
                    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
        </div>
    </div>

    <!-- AKSI -->
    <div class="d-flex flex-column-reverse flex-sm-row justify-content-end gap-2 mt-4">
        <a href="{{ route('produk.index') }}" class="btn btn-light border px-4">Batal</a>
        <button type="submit" class="btn btn-primary fw-semibold px-4">
            <i class="bi bi-check-lg me-1"></i> Perbarui Produk
        </button>
    </div>
</form>

<script>
    document.getElementById('image').addEventListener('change', function (e) {
        const file = e.target.files[0];
        const img = document.getElementById('previewImage');
        const placeholder = document.getElementById('previewPlaceholder');
        if (file) {
            img.src = URL.createObjectURL(file);
            img.classList.remove('d-none');
            placeholder.classList.add('d-none');
        }
    });
</script>
@endsection