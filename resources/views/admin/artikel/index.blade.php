@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0 bg-transparent p-0">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none text-muted"><i class="bi bi-house-door-fill me-1"></i>Dasbor</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Artikel</li>
    </ol>
</nav>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 bg-white p-4 rounded-4 shadow-sm border-0 mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-1 d-flex align-items-center">
            <i class="bi bi-newspaper text-primary me-2"></i>Kelola Artikel
        </h3>
        <p class="text-muted small mb-0">Daftar berita, pengumuman, dan artikel informatif perusahaan.</p>
    </div>
    <a href="{{ route('artikel.create') }}" class="btn btn-primary px-4 py-2 rounded-3 shadow-sm fw-semibold d-inline-flex align-items-center">
        <i class="bi bi-plus-lg me-2"></i> Tambah Artikel Baru
    </a>
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
                        <th class="py-3">Gambar</th>
                        <th class="py-3">Judul Artikel</th>
                        <th class="py-3">Kategori</th>
                        <th class="py-3">Tanggal</th>
                        <th class="py-3 text-center" style="width: 220px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($artikels as $index => $artikel)
                        <tr>
                            <td class="ps-4 fw-semibold">{{ $artikels->firstItem() + $index }}</td>
                            <td>
                                @if($artikel->image)
                                    <img src="{{ filter_var($artikel->image, FILTER_VALIDATE_URL) ? $artikel->image : asset('storage/' . $artikel->image) }}" alt="{{ $artikel->title }}" class="rounded object-fit-cover" style="width: 60px; height: 60px;">
                                @else
                                    <span class="badge bg-secondary">No Image</span>
                                @endif
                            </td>
                            <td class="fw-bold text-dark">{{ Str::limit($artikel->title, 45) }}</td>
                            <td><span class="badge bg-light text-primary border px-3 py-2 rounded-pill">{{ $artikel->kategori ?? 'Umum' }}</span></td>
                            <td class="text-muted small">{{ ($artikel->tanggal_upload ?? $artikel->created_at)->format('d M Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('artikel.show', $artikel->id) }}" class="btn btn-sm btn-info text-white me-1" title="Lihat">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('artikel.edit', $artikel->id) }}" class="btn btn-sm btn-warning text-white me-1" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('artikel.destroy', $artikel->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus artikel ini?')">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">Belum ada artikel yang diunggah.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-3">
    {{ $artikels->links() }}
</div>
@endsection