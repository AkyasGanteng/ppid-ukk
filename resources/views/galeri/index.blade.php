@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
<div class="container mt-5">
    

    {{-- Tombol Tambah Galeri hanya untuk admin --}}
   <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">Galeri PPID</h1>

    @if(Auth::check() && Auth::user()->role === 'admin')
        <a href="{{ route('galeri.create') }}" class="btn btn-primary">
            + Tambah Galeri
        </a>
    @endif
</div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($galeris as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul }}</h5>
                        <p class="card-text">{{ $item->kegiatan }}</p>
                        <p class="text-muted">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</p>

                        <a href="{{ route('galeri.show', $item->id) }}" class="btn btn-sm btn-outline-primary">Lihat Selengkapnya</a>

                        {{-- Tombol Edit dan Hapus hanya untuk admin --}}
                        @if(Auth::check() && Auth::user()->role === 'admin')
                            <a href="{{ route('galeri.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('galeri.destroy', $item->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin hapus galeri ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
