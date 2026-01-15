@extends('layouts.app')

@section('title', 'Detail Galeri')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">{{ $galeri->judul }}</h1>

    <div class="card shadow-sm border-0 rounded-4">
        <img src="{{ asset('storage/' . $galeri->foto) }}" class="card-img-top" alt="Foto Galeri" style="max-height: 400px; object-fit: cover;">

        <div class="card-body">
            <h5 class="card-title">Kegiatan: {{ $galeri->kegiatan }}</h5>
            @if($galeri->tanggal)
                <p class="card-text text-muted">Tanggal: {{ \Carbon\Carbon::parse($galeri->tanggal)->translatedFormat('d F Y') }}</p>
            @endif
            <a href="{{ route('galeri.index') }}" class="btn btn-secondary mt-3">← Kembali ke Galeri</a>
        </div>
    </div>
</div>
@endsection
