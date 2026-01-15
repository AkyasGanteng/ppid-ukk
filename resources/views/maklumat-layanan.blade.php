@extends('layouts.app')

@section('title', 'Maklumat Layanan')

@section('content')
<div class="container mt-5 mb-5">
    <h1 class="text-center fw-bold mb-3">Maklumat Layanan</h1>
    <p class="text-center text-secondary mb-5">
        Dengan ini, Pejabat Pengelola Informasi dan Dokumentasi (PPID) menyatakan komitmennya untuk memberikan pelayanan informasi publik yang cepat, tepat, dan transparan.
    </p>

    <div class="text-center">
        <img src="{{ asset('assets/PPID_maklumat_2021_rev1.png') }}" alt="Maklumat PPID" class="img-fluid rounded-4 shadow-sm" style="max-width: 700px;">
    </div>

    <div class="mt-4 text-center text-muted small">
        <p>Maklumat ini ditetapkan sebagai bentuk komitmen terhadap amanah Undang-Undang No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik.</p>
        <p>Pelayanan informasi publik dilakukan secara profesional, bertanggung jawab, dan sesuai standar yang berlaku.</p>
    </div>
</div>
@endsection
