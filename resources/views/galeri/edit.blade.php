@extends('layouts.app')

@section('title', 'Edit Galeri')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Galeri</h1>

    <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $galeri->judul }}" required>
        </div>

        <div class="mb-3">
            <label for="kegiatan" class="form-label">Kegiatan</label>
            <input type="text" name="kegiatan" class="form-control" value="{{ $galeri->kegiatan }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $galeri->tanggal }}">
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto Saat Ini</label><br>
            <img src="{{ asset('storage/' . $galeri->foto) }}" alt="Foto Galeri" width="200" class="mb-2">
            <input type="file" name="foto" class="form-control mt-2">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
