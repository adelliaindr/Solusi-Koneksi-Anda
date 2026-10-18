@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0 bg-transparent p-0">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none text-muted"><i class="bi bi-house-door-fill me-1"></i>Dasbor</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Kontak Masuk</li>
    </ol>
</nav>

<!-- HEADER -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 bg-white p-4 rounded-4 shadow-sm border-0 mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-1 d-flex align-items-center">
            <i class="bi bi-chat-dots-fill text-primary me-2"></i>Pesan Masuk Kontak
        </h3>
        <p class="text-muted small mb-0">Daftar pesan dan pertanyaan yang dikirimkan oleh pengunjung melalui website.</p>
    </div>
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
                        <th class="py-3">Nama Pengirim</th>
                        <th class="py-3 d-none d-md-table-cell">Email</th>
                        <th class="py-3 d-none d-lg-table-cell">Subjek</th>
                        <th class="py-3 d-none d-lg-table-cell text-nowrap">Tanggal</th>
                        <th class="py-3 text-center text-nowrap" style="width: 110px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kontaks as $index => $kontak)
                        @php
                            $nama = $kontak->name ?? $kontak->nama;
                            $subjek = $kontak->subject ?? $kontak->subjek;
                        @endphp
                        <tr>
                            <td class="ps-4 fw-semibold text-muted">{{ $kontaks->firstItem() + $index }}</td>
                            <td>
                                <div class="fw-bold text-dark">{{ $nama }}</div>
                                <div class="small text-muted d-md-none text-break">{{ $kontak->email }}</div>
                                <div class="small text-muted d-lg-none">
                                    @if($subjek)<span class="d-block">{{ Str::limit($subjek, 40) }}</span>@endif
                                    <i class="bi bi-clock me-1"></i>{{ optional($kontak->created_at)->format('d M Y, H:i') ?? '-' }}
                                </div>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <a href="mailto:{{ $kontak->email }}" class="text-decoration-none text-break">{{ $kontak->email }}</a>
                            </td>
                            <td class="d-none d-lg-table-cell">{{ Str::limit($subjek, 40) }}</td>
                            <td class="text-muted small d-none d-lg-table-cell text-nowrap">{{ optional($kontak->created_at)->format('d M Y, H:i') ?? '-' }}</td>
                            <td class="text-center text-nowrap">
                                <a href="{{ route('kontak.show', $kontak->id) }}" class="btn btn-sm btn-info text-white" title="Baca Pesan">
                                    <i class="bi bi-envelope-open-fill"></i>
                                </a>
                                <form action="{{ route('kontak.destroy', $kontak->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus Pesan">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                Belum ada pesan masuk dari pengunjung.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-3 d-flex justify-content-center justify-content-md-end">
    {{ $kontaks->appends(request()->query())->links('pagination::bootstrap-5') }}
</div>
@endsection