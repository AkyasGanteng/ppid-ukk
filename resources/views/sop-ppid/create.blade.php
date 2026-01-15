@extends('layouts.app')

@section('title', 'Tambah SOP PPID')

@section('content')
<div class="container mt-5">
    <h3 class="fw-bold text-center mb-4">Tambah SOP PPID</h3>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sop-ppid.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Judul SOP</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Masukkan judul SOP" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Upload File (PDF)</label>
            <input type="file" name="file" class="form-control" accept="application/pdf" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('sop-ppid.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>
@endsection
