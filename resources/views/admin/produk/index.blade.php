@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0 bg-transparent p-0">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none text-muted"><i class="bi bi-house-door-fill me-1"></i>Dasbor</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Produk</li>
    </ol>
</nav>

<!-- HEADER -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 bg-white p-4 rounded-4 shadow-sm border-0 mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-1 d-flex align-items-center">
            <i class="bi bi-box-seam text-primary me-2"></i>Kelola Produk
        </h3>
        <p class="text-muted small mb-0">Daftar semua layanan dan produk perusahaan.</p>
    </div>
    <a href="{{ route('produk.create') }}" class="btn btn-primary px-4 py-2 rounded-3 shadow-sm fw-semibold d-inline-flex align-items-center justify-content-center">
        <i class="bi bi-plus-lg me-2"></i> Tambah Produk
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-4 border-0 shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
    </div>
@endif

<!-- TABEL -->
<div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="py-3 ps-4" style="width: 60px;">No</th>
                        <th class="py-3" style="width: 80px;">Gambar</th>
                        <th class="py-3">Nama Produk</th>
                        <th class="py-3 d-none d-md-table-cell">Kategori</th>
                        <th class="py-3 d-none d-lg-table-cell">Deskripsi Singkat</th>
                        <th class="py-3 text-center text-nowrap" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produks as $index => $produk)
                        <tr>
                            <td class="ps-4 fw-semibold text-muted">{{ $produks->firstItem() + $index }}</td>
                            <td>
                                @if($produk->image)
                                    <img src="{{ filter_var($produk->image, FILTER_VALIDATE_URL) ? $produk->image : asset('storage/' . $produk->image) }}"
                                         alt="{{ $produk->name }}" class="rounded-3 border object-fit-cover" style="width: 56px; height: 56px;">
                                @else
                                    <div class="rounded-3 bg-light border d-flex align-items-center justify-content-center text-muted" style="width: 56px; height: 56px;">
                                        <i class="bi bi-image"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $produk->name }}</div>
                                <span class="badge bg-light text-primary border text-capitalize mt-1 d-md-none">{{ $produk->kategori ?? 'Umum' }}</span>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <span class="badge bg-light text-primary border text-capitalize px-2 py-1">{{ $produk->kategori ?? 'Umum' }}</span>
                            </td>
                            <td class="text-muted d-none d-lg-table-cell">{{ Str::limit($produk->description, 60) }}</td>
                            <td class="text-center text-nowrap">
                                <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-sm btn-info text-white" title="Lihat">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-sm btn-warning text-white" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                Belum ada data produk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-3 d-flex justify-content-center justify-content-md-end">
    {{ $produks->appends(request()->query())->links('pagination::bootstrap-5') }}
</div>
@endsection