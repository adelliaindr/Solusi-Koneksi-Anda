@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold text-dark"><i class="bi bi-box-seam me-2"></i>Kelola Produk</h2>
                <p class="text-muted mb-0">Tambah, ubah, atau hapus daftar layanan dan produk PT Solusi Koneksi Anda.</p>
            </div>
            <div>
                <a href="{{ url('/admin/dashboard') }}" class="btn btn-outline-secondary btn-sm me-2">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
                <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-lg me-1"></i> Tambah Produk
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="py-3 ps-4">No</th>
                            <th class="py-3">Gambar</th>
                            <th class="py-3">Nama Produk</th>
                            <th class="py-3">Deskripsi Singkat</th>
                            <th class="py-3 text-center" style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produks as $index => $produk)
                            <tr>
                                <td class="ps-4 fw-semibold">{{ $index + 1 }}</td>
                                <td>
                                    @if($produk->image)
                                        <img src="{{ asset('storage/' . $produk->image) }}" alt="{{ $produk->name }}" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <span class="badge bg-secondary">No Image</span>
                                    @endif
                                </td>
                                <td class="fw-semibold text-dark">{{ $produk->name }}</td>
                                <td class="text-muted text-truncate" style="max-width: 300px;">{{ Str::limit($produk->description, 60) }}</td>
                                <td class="text-center">
                                    <form action="{{ route('products.destroy', $produk->id) }}" method="POST" class="d-inline">
                                        <a href="{{ route('products.edit', $produk->id) }}" class="btn btn-sm btn-warning text-white me-1">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">Belum ada data produk tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection