@extends('layouts.app')

@section('title', 'Profil dan Informasi PPID')

@section('content')
<div class="container mt-5">
    <!-- Profil PPID Section -->
    <h1 class="mb-4 fw-bold text-dark">Profil PPID</h1>

    <div class="card shadow-sm border-0 rounded-4 p-4 mb-5">
        <p style="line-height: 1.8; font-size: 1rem; color: #333;">
            Pejabat Pengelola Informasi dan Dokumentasi (PPID) adalah pejabat yang bertanggung jawab di bidang penyimpanan, pendokumentasian, penyediaan, dan/atau pelayanan informasi di instansi pemerintah.
        </p>

        <p style="line-height: 1.8; font-size: 1rem; color: #333;">
            Tugas PPID meliputi pengelolaan permintaan informasi publik, menyusun daftar informasi yang dikecualikan, serta menjamin ketersediaan dan aksesibilitas informasi publik bagi masyarakat.
        </p>

        <p style="line-height: 1.8; font-size: 1rem; color: #333;">
            Dalam rangka mewujudkan keterbukaan informasi publik, PPID berkomitmen memberikan pelayanan informasi yang cepat, tepat, dan sederhana sesuai peraturan yang berlaku.
        </p>
    </div>

    <!-- Visi dan Misi Section -->
    <h1 class="mb-4 fw-bold text-dark">Visi dan Misi PPID</h1>

    <div class="card shadow-sm border-0 rounded-4 p-4 mb-5">
        <h3 class="fw-bold text-dark mb-3">Visi</h3>
        <p style="line-height: 1.8; font-size: 1rem; color: #333;">
            Mewujudkan pelayanan informasi publik yang transparan, akuntabel, dan mudah diakses oleh masyarakat untuk mendukung tata kelola pemerintahan yang baik.
        </p>

        <h3 class="fw-bold text-dark mt-4 mb-3">Misi</h3>
        <ul style="line-height: 1.8; font-size: 1rem; color: #333; padding-left: 20px;">
            <li>Menyediakan informasi publik yang akurat, tepat waktu, dan mudah diakses oleh masyarakat.</li>
            <li>Meningkatkan kualitas pengelolaan dan dokumentasi informasi publik sesuai dengan peraturan perundang-undangan.</li>
            <li>Membangun sistem pelayanan informasi yang efisien dan responsif untuk memenuhi kebutuhan masyarakat.</li>
            <li>Meningkatkan kesadaran dan partisipasi masyarakat dalam memanfaatkan hak atas informasi publik.</li>
            <li>Menjalin kerja sama dengan berbagai pihak untuk mendukung keterbukaan informasi publik.</li>
        </ul>
    </div>

    <!-- Bagan Organisasi Section -->
    <h1 class="mb-4 fw-bold text-center text-dark">Bagan Organisasi PPID</h1>

    <div class="card border-0 shadow-sm rounded-4 p-3 p-md-4 mb-5">
        <div class="position-relative overflow-auto" style="max-height: 600px; border: 1px solid #e0e0e0; border-radius: 1rem; padding: 1rem;">
            <img src="{{ asset('assets/Strukturppid.png') }}" alt="Bagan Organisasi"
                class="img-fluid rounded-3 shadow-sm mx-auto d-block" style="transition: all 0.3s ease-in-out;">
        </div>
    </div>

    <p class="text-center text-muted mt-3 fs-6 px-2">
        Struktur organisasi PPID menggambarkan susunan dan hubungan antar unit dalam pelaksanaan tugas pelayanan informasi publik.
    </p>
</div>
@endsection