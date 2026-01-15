@extends('layouts.app')

@section('title', 'Edit SOP PPID')

@section('content')
<div class="container mt-5">
    <h3 class="fw-bold text-center mb-4">Edit SOP PPID</h3>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sop-ppid.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Judul SOP</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $item->title) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">File Saat Ini</label><br>
            <a href="{{ asset('storage/'.$item->file) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                Lihat PDF
            </a>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Upload File Baru (Opsional)</label>
            <input type="file" name="file" class="form-control" accept="application/pdf">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti file.</small>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('sop-ppid.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-warning">Update</button>
        </div>
    </form>
</div>
@endsection
