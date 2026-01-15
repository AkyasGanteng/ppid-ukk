@extends('layouts.app')

@section('title', 'Kelola Dasar Hukum')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 fw-bold">Data Dasar Hukum</h1>

    @if(auth()->check() && auth()->user()->role === 'admin')
        <a href="{{ route('dasar-hukum.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Judul</th>
                <th>PDF</th>
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $item->file) }}" target="_blank" class="btn btn-sm btn-outline-info">
                            <i class="bi bi-file-earmark-pdf"></i> Lihat PDF
                        </a>
                    </td>
                    @if(auth()->check() && auth()->user()->role === 'admin')
                        <td>
                            <a href="{{ route('dasar-hukum.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>
                            <form action="{{ route('dasar-hukum.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="{{ auth()->check() && auth()->user()->role === 'admin' ? '3' : '2' }}" class="text-center">Belum ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
