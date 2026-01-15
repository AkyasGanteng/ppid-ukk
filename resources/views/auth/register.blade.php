@extends('layouts.app')

@section('title', 'Register | PPID Garut')

@section('content')
<div class="container mt-5 d-flex justify-content-center align-items-center">
    <div class="card shadow-lg p-4" style="max-width: 500px; width: 100%;">
        <div class="text-center mb-4">
            <img src="{{ asset('assets/Garut.png') }}" alt="Logo Garut" style="width: 80px;">
            <h3 class="mt-2 text-gradient-gold">Daftar Akun PPID Garut</h3>
            <p class="text-muted" style="font-size: 0.9rem;">Dapatkan akses informasi publik kapan saja</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <div class="d-grid mt-3">
                <button type="submit" class="btn btn-success">Daftar</button>
            </div>
            <p class="text-center mt-3">
                Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
            </p>
        </form>
    </div>
</div>
@endsection
