@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0 bg-transparent p-0">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none text-muted"><i class="bi bi-house-door-fill me-1"></i>Dasbor</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Artikel</li>
    </ol>
</nav>

<!-- HEADER -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 bg-white p-4 rounded-4 shadow-sm border-0 mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-1 d-flex align-items-center">
            <i class="bi bi-newspaper text-primary me-2"></i>Kelola Artikel
        </h3>
        <p class="text-muted small mb-0">Daftar berita, pengumuman, dan artikel informatif perusahaan.</p>
    </div>
    <a href="{{ route('artikel.create') }}" class="btn btn-primary px-4 py-2 rounded-3 shadow-sm fw-semibold d-inline-flex align-items-center justify-content-center">
        <i class="bi bi-plus-lg me-2"></i> Tambah Artikel
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-4 border-0 shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
    </div>
@endif

<!-- FILTER -->
<form action="{{ route('artikel.index') }}" method="GET" class="card border-0 shadow-sm rounded-4 bg-white mb-4">
    <div class="card-body p-3">
        <div class="row g-2">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-search text-muted"></i></span>
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control border-start-0" placeholder="Cari judul artikel...">
                </div>
            </div>
            <div class="col-md-4">
                <select name="kategori" class="form-select">
                    <option value="">Semua Kategori</option>
                    @foreach(['Berita', 'Teknologi', 'Tips & Trik', 'Pengumuman'] as $kat)
                        <option value="{{ $kat }}" {{ request('kategori') == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 d-grid d-md-flex gap-2">
                <button type="submit" class="btn btn-primary flex-fill fw-semibold">Cari</button>
                @if(request('search') || request('kategori'))
                    <a href="{{ route('artikel.index') }}" class="btn btn-light border" title="Reset"><i class="bi bi-x-lg"></i></a>
                @endif
            </div>
        </div>
    </div>
</form>

<!-- TABEL -->
<div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="py-3 ps-4" style="width: 60px;">No</th>
                        <th class="py-3" style="width: 80px;">Gambar</th>
                        <th class="py-3">Judul Artikel</th>
                        <th class="py-3 d-none d-md-table-cell">Kategori</th>
                        <th class="py-3 d-none d-lg-table-cell text-nowrap">Tanggal</th>
                        <th class="py-3 text-center text-nowrap" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($artikels as $index => $artikel)
                        @php
                            $tanggal = $artikel->tanggal_upload ?? $artikel->created_at;
                            $tanggal = $tanggal ? \Carbon\Carbon::parse($tanggal)->format('d M Y') : '-';
                        @endphp
                        <tr>
                            <td class="ps-4 fw-semibold text-muted">{{ $artikels->firstItem() + $index }}</td>
                            <td>
                                @if($artikel->image)
                                    <img src="{{ filter_var($artikel->image, FILTER_VALIDATE_URL) ? $artikel->image : asset('storage/' . $artikel->image) }}"
                                         alt="{{ $artikel->title }}" class="rounded-3 border object-fit-cover" style="width: 56px; height: 56px;">
                                @else
                                    <div class="rounded-3 bg-light border d-flex align-items-center justify-content-center text-muted" style="width: 56px; height: 56px;">
                                        <i class="bi bi-image"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ Str::limit($artikel->title, 60) }}</div>
                                <div class="d-lg-none small text-muted mt-1">
                                    <span class="badge bg-light text-primary border d-md-none me-1">{{ $artikel->kategori ?? 'Umum' }}</span>
                                    <i class="bi bi-calendar3 me-1"></i>{{ $tanggal }}
                                </div>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <span class="badge bg-light text-primary border px-3 py-2 rounded-pill">{{ $artikel->kategori ?? 'Umum' }}</span>
                            </td>
                            <td class="text-muted small d-none d-lg-table-cell text-nowrap">{{ $tanggal }}</td>
                            <td class="text-center text-nowrap">
                                <a href="{{ route('artikel.show', $artikel->id) }}" class="btn btn-sm btn-info text-white" title="Lihat">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('artikel.edit', $artikel->id) }}" class="btn btn-sm btn-warning text-white" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('artikel.destroy', $artikel->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
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
                                Belum ada artikel yang diunggah.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-3 d-flex justify-content-center justify-content-md-end">
    {{ $artikels->appends(request()->query())->links('pagination::bootstrap-5') }}
</div>
@endsection