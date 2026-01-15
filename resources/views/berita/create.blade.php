@extends('layouts.app')

@section('title', 'Tambah Berita')

@section('content')
<div class="container mt-4">
    <h3>Tambah Berita</h3>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Berita</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="teks" class="form-label">Isi Berita</label>
            <textarea name="teks" class="form-control" rows="5" required>{{ old('teks') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal & Waktu</label>
            <input type="datetime-local" name="tanggal" class="form-control"
                value="{{ old('tanggal', isset($berita) ? \Carbon\Carbon::parse($berita->tanggal)->format('Y-m-d\TH:i') : '') }}" required>
        </div>

        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" name="penulis" class="form-control" value="{{ old('penulis') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<!-- TinyMCE Enhance Editor -->
<script src="https://cdn.jsdelivr.net/npm/tinymce@5/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea[name="teks"]',
        plugins: 'lists link image table code help wordcount',
        toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | link image table | code',
        menubar: false,
        height: 300,
        setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave(); // 🔑 Memastikan textarea terupdate
            });
        }
    });

    document.getElementById('formBerita').addEventListener('submit', function () {
        tinymce.triggerSave(); // ✅ Update sebelum submit
    });
</script>


@endsection
