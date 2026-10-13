@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="mb-4">
        <a href="{{ url('/artikel') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Artikel
        </a>
    </div>

    <div class="bg-white p-4 p-lg-5 rounded-4 shadow-sm border">
        <div class="text-muted mb-2">
            <i class="bi bi-calendar3 me-1"></i> {{ $artikels->created_at ? $artikels->created_at->format('d M Y') : date('d M Y') }}
        </div>
        
        <h1 class="fw-bold text-primary-custom mb-4">{{ $artikels->title }}</h1>

        @if($artikels->image)
            <div class="text-center mb-4">
                <img src="{{ asset('storage/' . $artikels->image) }}" class="img-fluid rounded-3 shadow-sm" alt="{{ $artikels->title }}" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        @endif

        <div class="lh-lg text-secondary fs-5" style="white-space: pre-line;">
            {{ $artikels->content }}
        </div>
    </div>
</div>
@endsection