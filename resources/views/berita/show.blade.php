@extends('layouts.app')

@section('title', 'Detail Berita')

@section('content')
<div class="container mt-4">
    <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary mb-4 rounded-pill px-3">
        ← Kembali ke Daftar Berita
    </a>

    <!-- Kartu Berita -->
    <div class="card shadow-sm border-0 mb-5 rounded-4 overflow-hidden">
        <div class="card-body px-4 py-4">
            <!-- Judul Berita -->
            <h1 class="fw-bold mb-3 text-dark" style="font-size: 1.8rem;">{{ $berita->judul }}</h1>
            
            <!-- Info Tanggal & Penulis -->
            <p class="text-muted mb-4" style="font-size: 0.9rem;">
                <i class="bi bi-calendar-event"></i>
                {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                <span class="text-secondary"> &middot; {{ \Carbon\Carbon::parse($berita->tanggal)->locale('id')->diffForHumans() }}</span>
                &nbsp;|&nbsp;
                <i class="bi bi-person-circle"></i> {{ $berita->penulis }}
            </p>

            <!-- Foto Utama -->
            @if($berita->foto && file_exists(public_path('storage/' . $berita->foto)))
            <div class="text-center mb-4">
                <img src="{{ asset('storage/' . $berita->foto) }}"
                     alt="Foto Berita"
                     class="rounded shadow-sm"
                     style="max-width: 720px; max-height: 400px; width: 100%; height: auto; object-fit: cover;">
            </div>
            @endif

            <hr class="mb-4">

            <!-- Isi Berita -->
            <article class="mt-3" style="line-height: 1.8; font-size: 1rem; color: #333;">
                {!! $berita->teks !!}
            </article>
        </div>
    </div>

   <!-- KOMENTAR -->
<div class="card shadow-sm border-0 mb-5 rounded-4">
    <div class="card-body">
        <h5 class="fw-bold text-dark mb-4">Komentar ({{ $berita->comments->count() }})</h5>

        <!-- Form komentar -->
        @auth
            <form action="{{ route('comments.store', $berita->id) }}" method="POST" class="d-flex mb-4">
                @csrf
                <div class="me-2 flex-grow-1">
                    <textarea name="content" class="form-control rounded-3" 
                              rows="2" placeholder="Tulis komentar..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary px-4 rounded-pill">
    Kirim
</button>

            </form>
            @else
<div class="d-flex align-items-center bg-light border rounded-3 p-3 mb-3 shadow-sm">
    <i class="bi bi-lock-fill text-secondary me-3" style="font-size: 1.5rem;"></i>
    <div>
        <p class="mb-0 text-muted">
            Anda harus <a href="{{ route('login') }}" class="fw-semibold text-decoration-none">login</a> 
            untuk menulis komentar.
        </p>
    </div>
</div>
@endauth


        <!-- Daftar komentar -->
        @forelse($berita->comments as $comment)
            <div class="d-flex mb-3 pb-2 border-bottom">
                <div class="me-3">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($comment->user->name) }}&background=random" 
                         class="rounded-circle shadow-sm" width="40" height="40" alt="Avatar">
                </div>
                <div class="flex-grow-1">
                    <div>
                        <strong>{{ $comment->user->name }}</strong>
                        <small class="text-muted"> • {{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                    <p class="mb-0 mt-1">{{ $comment->content }}</p>
                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada komentar.</p>
        @endforelse
    </div>
</div>


    {{-- BERITA LAINNYA --}}
    <h4 class="mb-4 fw-bold text-dark">Berita Lainnya</h4>
    <div class="row">
        @forelse($beritaLainnya as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0 rounded-3 hover-shadow transition">
                @if($item->foto && file_exists(public_path('storage/' . $item->foto)))
                <img src="{{ asset('storage/' . $item->foto) }}"
                     class="card-img-top rounded-top-3"
                     alt="Thumbnail Berita"
                     style="height: 180px; object-fit: cover;">
                @endif
                <div class="card-body d-flex flex-column">
                    <h6 class="card-title fw-semibold mb-2 text-dark" style="font-size: 1rem;">
                        {{ $item->judul }}
                    </h6>
                    <p class="card-text text-muted mb-3" style="font-size: 0.8rem;">
                        <i class="bi bi-calendar-event"></i>
                        {{ \Carbon\Carbon::parse($item->tanggal)->timezone('Asia/Jakarta')->translatedFormat('d F Y') }}
                        <span class="text-secondary"> &middot; 
                        {{ \Carbon\Carbon::parse($item->tanggal)->timezone('Asia/Jakarta')->locale('id')->diffForHumans() }}
                        </span>
                    </p>
                    <div class="mt-auto">
                        <a href="{{ route('berita.show', $item->id) }}" class="btn btn-sm btn-outline-dark rounded-pill px-3">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p class="text-muted">Tidak ada berita lainnya.</p>
        @endforelse
    </div>
</div>
@endsection

<style>
    .hover-shadow:hover {
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        transform: translateY(-2px);
        transition: all 0.3s ease;
    }

    .transition {
        transition: all 0.3s ease;
    }

    article p {
        margin-bottom: 1.2rem;
    }

    article img {
        max-width: 100%;
        height: auto;
        border-radius: 0.5rem;
        margin: 1.5rem 0;
    }

    .card-title {
        color: #212529;
    }

    .card-text {
        color: #6c757d;
    }
</style>
