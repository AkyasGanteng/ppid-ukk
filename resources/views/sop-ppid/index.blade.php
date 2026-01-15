@extends('layouts.app')

@section('title', 'SOP PPID')

@section('content')
<div class="container mt-5">
    <h1 class="text-center fw-bold mb-3">Standar Operasional Prosedur PPID</h1>
    <p class="text-center text-secondary mb-5">Berikut adalah daftar SOP PPID yang dapat diunduh.</p>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        @if(auth()->check() && auth()->user()->role === 'admin')
            <a href="{{ route('sop-ppid.create') }}" class="btn btn-success">+ Tambah SOP</a>
        @endif
    </div>

    <div class="row">
        <!-- Daftar SOP -->
        <div class="col-lg-8 mb-4">
            <table class="table table-bordered text-center shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>File</th>
                        @if(auth()->check() && auth()->user()->role === 'admin')
                            <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                <a href="{{ asset('storage/'.$item->file) }}" target="_blank" class="btn btn-info btn-sm">Lihat PDF</a>
                            </td>
                            @if(auth()->check() && auth()->user()->role === 'admin')
                                <td>
                                    <a href="{{ route('sop-ppid.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('sop-ppid.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Kolom Berita -->
        <div class="col-lg-4">
            <h5 class="border-bottom border-3 border-warning pb-2 mb-4 fw-bold text-dark">Berita PPID</h5>
            @foreach(\App\Models\Berita::latest()->take(5)->get() as $berita)
                <div class="d-flex mb-4">
                    <img src="{{ asset('storage/' . $berita->foto) }}" alt="gambar"
                        style="width: 100px; height: 70px; object-fit: cover;" class="rounded-2 me-3">
                    <div>
                        <small class="text-muted d-block mb-1">
                            {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d M Y H:i') }}
                        </small>
                        <a href="{{ route('berita.show', $berita->id) }}" class="text-dark fw-semibold text-decoration-none">
                            {{ Str::limit($berita->judul, 60) }}
                        </a>
                        <p class="mb-0 text-muted small">{{ Str::limit($berita->deskripsi, 80) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
