@extends('layouts.admin')

@section('admin_content')
<!-- BREADCRUMB -->
<nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none">Dasbor</a></li>
        <li class="breadcrumb-item active" aria-current="page">Kontak Masuk</li>
    </ol>
</nav>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-0">Pesan Masuk Kontak</h3>
        <p class="text-muted small mb-0">Daftar pesan dan pertanyaan yang dikirimkan oleh pengunjung melalui website.</p>
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
                        <th class="py-3">Nama Pengirim</th>
                        <th class="py-3">Email</th>
                        <th class="py-3">Subjek</th>
                        <th class="py-3">Tanggal</th>
                        <th class="py-3 text-center" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kontaks as $index => $kontak)
                        <tr>
                            <td class="ps-4 fw-semibold">{{ $kontaks->firstItem() + $index }}</td>
                            <td class="fw-bold text-dark">{{ $kontak->name ?? $kontak->nama }}</td>
                            <td><a href="mailto:{{ $kontak->email }}" class="text-decoration-none">{{ $kontak->email }}</a></td>
                            <td>{{ Str::limit($kontak->subject ?? $kontak->subjek, 30) }}</td>
                            <td class="text-muted small">{{ $kontak->created_at->format('d M Y, H:i') }}</td>
                            <td class="text-center">
                                <a href="{{ route('kontak.show', $kontak->id) }}" class="btn btn-sm btn-info text-white me-1" title="Baca Pesan">
                                    <i class="bi bi-envelope-open-fill"></i>
                                </a>
                                <form action="{{ route('kontak.destroy', $kontak->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus Pesan" onclick="return confirm('Yakin ingin menghapus pesan ini?')">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">Belum ada pesan masuk dari pengunjung.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-3">
    {{ $kontaks->links() }}
</div>
@endsection