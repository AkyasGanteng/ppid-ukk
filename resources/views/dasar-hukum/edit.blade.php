@extends('layouts.app')

@section('title', 'Edit Dasar Hukum')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 fw-bold">Edit Dasar Hukum</h1>

    <form action="{{ route('dasar-hukum.update', $dasarHukum->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-semibold">Judul</label>
            <input 
                type="text" 
                name="title" 
                value="{{ old('title', $dasarHukum->title) }}" 
                class="form-control" 
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Upload PDF</label>
            <input 
                type="file" 
                name="file" 
                class="form-control" 
                accept="application/pdf"
            >
            <small class="text-muted d-block mt-1">
                File saat ini: 
                <a href="{{ asset('storage/' . $dasarHukum->file) }}" target="_blank">
                    <i class="bi bi-file-earmark-pdf"></i> Lihat
                </a>
            </small>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('dasar-hukum.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </div>
    </form>
</div>
@endsection
