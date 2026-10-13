@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none">Dasbor</a></li>
        <li class="breadcrumb-item active" aria-current="page">Produk</li>
    </ol>
</nav>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-0">Kelola Produk</h3>
        <p class="text-muted small mb-0">Daftar semua layanan dan produk perusahaan.</p>
    </div>
    <a href="{{ route('produk.create') }}" class="btn btn-primary fw-semibold">
        <i class="bi bi-plus-lg me-1"></i> Tambah Produk
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
                        <th class="py-3 ps-4" style="width: 60px;">No</th>
                        <th class="py-3">Gambar</th>
                        <th class="py-3">Nama Produk</th>
                        <th class="py-3">Deskripsi Singkat</th>
                        <th class="py-3 text-center" style="width: 220px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produks as $index => $produk)
                        <tr>
                            <td class="ps-4 fw-semibold">{{ $produks->firstItem() + $index }}</td>
                            <td>
                                @if($produk->image)
                                    <img src="{{ filter_var($produk->image, FILTER_VALIDATE_URL) ? $produk->image : asset('storage/' . $produk->image) }}" alt="{{ $produk->name }}" class="rounded object-fit-cover" style="width: 50px; height: 50px;">
                                @else
                                    <span class="badge bg-secondary">No Image</span>
                                @endif
                            </td>
                            <td class="fw-bold text-dark">{{ $produk->name }}</td>
                            <td class="text-muted">{{ Str::limit($produk->description, 50) }}</td>
                            <td class="text-center">
                                <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-sm btn-info text-white me-1" title="Lihat">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-sm btn-warning text-white me-1" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">Belum ada data produk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-3">
    {{ $produks->links() }}
</div>
@endsection