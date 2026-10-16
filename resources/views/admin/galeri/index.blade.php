@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<!-- BREADCRUMB MODERN -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0 bg-transparent p-0">
        <li class="breadcrumb-item">
            <a href="{{ url('/admin/dashboard') }}" class="text-decoration-none text-muted fw-medium">
                <i class="bi bi-house-door-fill me-1"></i>Dasbor
            </a>
        </li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Galeri</li>
    </ol>
</nav>

<!-- HEADER SECTION DENGAN SENTUHAN MODERN -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 bg-white p-4 rounded-4 shadow-sm border-0 mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-1 d-flex align-items-center">
            <i class="bi bi-images text-primary me-2"></i>Kelola Galeri
        </h3>
        <p class="text-muted small mb-0">Daftar album, foto dokumentasi, serta interaksi like & komentar pengguna secara real-time.</p>
    </div>
    <div>
        <a href="{{ route('galeri.create') }}" class="btn btn-primary px-4 py-2 rounded-3 shadow-sm fw-semibold d-inline-flex align-items-center">
            <i class="bi bi-plus-lg me-2"></i> Tambah Foto Galeri
        </a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="py-3 ps-4" style="width: 50px;">No</th>
                        <th class="py-3">Foto</th>
                        <th class="py-3">Judul Foto</th>
                        <th class="py-3">Kategori</th>
                        <th class="py-3">Tanggal Upload</th> <!-- Kolom Tanggal Upload Ditambahkan di Sini -->
                        <th class="py-3 text-center">Interaksi</th>
                        <th class="py-3 text-center" style="width: 250px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galeris as $index => $galeri)
                        <tr>
                            <td class="ps-4 fw-semibold">{{ $galeris->firstItem() + $index }}</td>
                            <td>
                                @if($galeri->image)
                                    <img src="{{ filter_var($galeri->image, FILTER_VALIDATE_URL) ? $galeri->image : asset('storage/' . $galeri->image) }}" alt="{{ $galeri->title }}" class="rounded object-fit-cover" style="width: 55px; height: 55px;">
                                @else
                                    <span class="badge bg-secondary">No Image</span>
                                @endif
                            </td>
                            <td class="fw-bold text-dark">{{ $galeri->title }}</td>
                            <td><span class="badge bg-light text-primary border px-3 py-2 rounded-pill">{{ $galeri->category ?? 'Umum' }}</span></td>
                            
                            <!-- Menampilkan Tanggal Upload -->
                            <td>
                                <span class="text-dark fw-semibold small">{{ $galeri->created_at->format('d M Y') }}</span>
                                <small class="text-muted d-block" style="font-size: 0.75rem;">{{ $galeri->created_at->format('H:i') }} WIB</small>
                            </td>

                            <td class="text-center">
                                <span class="badge bg-danger bg-opacity-10 text-danger px-2 py-1 rounded me-1" title="Jumlah Like">
                                    <i class="bi bi-heart-fill me-1"></i> {{ method_exists($galeri, 'likes') ? $galeri->likes->count() : 0 }}
                                </span>
                                <span class="badge bg-primary bg-opacity-10 text-primary px-2 py-1 rounded" title="Jumlah Komentar">
                                    <i class="bi bi-chat-fill me-1"></i> {{ method_exists($galeri, 'komentars') ? $galeri->komentars->count() : 0 }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('galeri.show', $galeri->id) }}" class="btn btn-sm btn-info text-white me-1" title="Lihat Detail & Komentar">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('galeri.edit', $galeri->id) }}" class="btn btn-sm btn-warning text-white me-1" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('galeri.destroy', $galeri->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus foto galeri ini?')">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">Belum ada foto galeri yang diunggah.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-3">
    {{ $galeris->appends(request()->query())->links('pagination::bootstrap-5') }}
</div>
@endsection