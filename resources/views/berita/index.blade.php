@extends('layouts.app')

@section('title', 'Daftar Berita')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4 fw-bold text-center">Berita Terbaru</h3>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @auth
        @if(auth()->user()->role === 'admin')
            <div class="text-end mb-4">
                <a href="{{ route('berita.create') }}" class="btn btn-primary">+ Tambah Berita</a>
            </div>
        @endif
    @endauth

    <div class="row">
        @forelse($beritas as $berita)
        <div class="col-md-4 mb-4 pop-out">
            <div class="card border-0 rounded-4 shadow-sm h-100 hover-shadow transition">
                @if($berita->foto && file_exists(public_path('storage/' . $berita->foto)))
                    <img src="{{ asset('storage/' . $berita->foto) }}" class="card-img-top rounded-top-4" alt="Foto Berita" style="height: 200px; object-fit: cover;">
                @else
                    <img src="https://via.placeholder.com/400x200?text=Tidak+Ada+Gambar" class="card-img-top rounded-top-4" alt="Foto Default">
                @endif

                <div class="card-body d-flex flex-column">
                    @php
                        $tanggal = \Carbon\Carbon::parse($berita->tanggal)->timezone('Asia/Jakarta');
                        $formatted = $tanggal->translatedFormat('d F Y');
                        $diff = $tanggal->locale('id')->diffForHumans();
                    @endphp

                    <small class="text-muted d-block mb-1" style="font-size: 0.75rem;">
                        {{ $formatted }}
                        <span class="text-secondary"> &middot; {{ $diff }}</span>
                        &nbsp;|&nbsp;
                        <strong>{{ $berita->penulis }}</strong>
                    </small>

                    <h5 class="card-title fw-bold text-dark mb-2" style="font-size: 1.1rem;">
                        {{ $berita->judul ? Str::limit($berita->judul, 60) : Str::limit(strip_tags($berita->teks), 60) }}
                    </h5>

                    <p class="card-text text-muted small mb-3">
                        {{ Str::limit(strip_tags($berita->teks), 100) }}
                    </p>

                    <div class="mt-auto">
                        <a href="{{ route('berita.show', $berita) }}" class="btn btn-sm btn-outline-dark rounded-pill w-100 mb-2">
                            Baca Selengkapnya
                        </a>
                    </div>

                    @auth
                        @if(auth()->user()->role === 'admin')
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('berita.edit', $berita) }}" class="btn btn-sm btn-warning w-50 me-1">Edit</a>
                                <form action="{{ route('berita.destroy', $berita) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?')" class="w-50">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger w-100">Hapus</button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                Belum ada berita yang tersedia.
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection

<style>
    .hover-shadow:hover {
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        transform: translateY(-2px);
    }

    .transition {
        transition: all 0.3s ease;
    }

    .pop-out {
        animation: popout 0.6s ease;
    }

    @keyframes popout {
        0% {
            opacity: 0;
            transform: scale(0.95);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }
</style>
