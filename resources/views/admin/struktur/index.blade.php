@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0 bg-transparent p-0">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none text-muted"><i class="bi bi-house-door-fill me-1"></i>Dasbor</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Struktur Organisasi</li>
    </ol>
</nav>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 bg-white p-4 rounded-4 shadow-sm mb-4">
    <div>
        <h3 class="fw-bold text-dark fs-4 mb-1 d-flex align-items-center">
            <i class="bi bi-people-fill text-primary me-2"></i>Struktur Organisasi &amp; Tim
        </h3>
        <p class="text-muted small mb-0">Kelola jajaran direksi, pimpinan, dan anggota tim perusahaan.</p>
    </div>
    <a href="{{ route('struktur.create') }}" class="btn btn-primary px-4 py-2 rounded-3 shadow-sm fw-semibold d-inline-flex align-items-center justify-content-center">
        <i class="bi bi-plus-lg me-2"></i> Tambah Anggota Tim
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
    </div>
@endif

<div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="py-3 ps-4" style="width: 60px;">No</th>
                        <th class="py-3">Foto</th>
                        <th class="py-3">Nama</th>
                        <th class="py-3">Jabatan</th>
                        <!-- Deskripsi disembunyikan di HP supaya tabel tidak terlalu lebar -->
                        <th class="py-3 d-none d-md-table-cell">Deskripsi</th>
                        <th class="py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($struktur as $index => $item)
                        <tr>
                            <td class="ps-4 fw-semibold">{{ method_exists($struktur, 'firstItem') ? $struktur->firstItem() + $index : $loop->iteration }}</td>
                            <td>
                                @if($item->foto)
                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="rounded object-fit-cover" style="width: 50px; height: 50px;">
                                @else
                                    <div class="bg-light text-secondary border rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;" title="Belum ada foto">
                                        <i class="bi bi-person-fill fs-4"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="fw-bold text-dark">{{ $item->nama }}</td>
                            <td>
                                <span class="badge bg-light text-primary border px-2 py-1">{{ $item->jabatan }}</span>
                            </td>
                            <td class="text-muted d-none d-md-table-cell">{{ Str::limit($item->deskripsi ?? '-', 40) }}</td>
                            <td class="text-center text-nowrap">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('struktur.show', $item->id) }}" class="btn btn-sm btn-info text-white" title="Lihat" aria-label="Lihat {{ $item->nama }}">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="{{ route('struktur.edit', $item->id) }}" class="btn btn-sm btn-warning text-white" title="Edit" aria-label="Edit {{ $item->nama }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('struktur.destroy', $item->id) }}" method="POST" class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus" aria-label="Hapus {{ $item->nama }}" onclick="return confirm('Yakin ingin menghapus anggota tim ini?')">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-people display-6 d-block mb-2"></i>
                                Belum ada anggota tim yang ditambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@if(method_exists($struktur, 'links'))
    <div class="mt-3">
        {{ $struktur->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
@endif
@endsection