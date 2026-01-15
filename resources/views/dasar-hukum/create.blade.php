@extends('layouts.app')

@section('title', 'Tambah Dasar Hukum')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 fw-bold">Tambah Dasar Hukum</h1>

    <form action="{{ route('dasar-hukum.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Judul</label>
            <input 
                type="text" 
                name="title" 
                class="form-control" 
                value="{{ old('title') }}" 
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
                required
            >
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('dasar-hukum.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>
@endsection
