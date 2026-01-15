@extends('layouts.app')

@section('title', 'Login | PPID Garut')

@section('content')
<div class="container mt-5 d-flex justify-content-center align-items-center">
    <div class="card shadow-lg p-4" style="max-width: 500px; width: 100%;">
        <div class="text-center mb-4">
            <img src="{{ asset('assets/Garut.png') }}" alt="Logo Garut" style="width: 80px;">
            <h3 class="mt-2 text-gradient-gold">Login ke PPID Garut</h3>
            <p class="text-muted" style="font-size: 0.9rem;">Akses informasi publik dengan mudah dan aman</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="d-flex justify-content-between align-items-center mt-2">
                <a href="{{ route('password.request') }}" class="text-decoration-none">Lupa Password?</a>
            </div>

            <div class="d-grid mt-3">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>

        <p class="text-center mt-3 mb-0">
            Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
        </p>
    </div>
</div>
@endsection
