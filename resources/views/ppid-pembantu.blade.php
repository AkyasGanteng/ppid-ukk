@extends('layouts.app')

@section('title', 'PPID Pembantu')

@section('content')
<div class="container mt-5">
    <h1 class="text-center fw-bold text-dark mb-4">PPID Pembantu</h1>

    <div class="card shadow-sm border-0 p-4 rounded-4 mb-5">
        <p class="text-justify mb-3">
            <strong>PPID Pembantu</strong> adalah pejabat yang bertanggung jawab membantu PPID Utama dalam melaksanakan pengelolaan dan pelayanan informasi publik di setiap unit kerja/satuan kerja pada instansi pemerintah. PPID Pembantu memiliki peran penting untuk menjamin keterbukaan informasi, sesuai dengan amanat Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik.
        </p>
        <p class="text-justify">
            Tugas utama dari PPID Pembantu meliputi pengumpulan data dan informasi, pendokumentasian, serta penyampaian informasi publik kepada PPID Utama untuk diteruskan kepada masyarakat. Mereka juga wajib memastikan bahwa seluruh informasi publik yang dikelola unit kerjanya dapat diakses dengan mudah dan cepat.
        </p>
    </div>

    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-3">
                <h5 class="fw-bold text-primary">Tugas</h5>
                <p class="mb-0">Mengumpulkan dan mendokumentasikan informasi publik dari unit kerja.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-3">
                <h5 class="fw-bold text-success">Fungsi</h5>
                <p class="mb-0">Sebagai penghubung antara unit kerja dan PPID Utama dalam layanan informasi.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-3">
                <h5 class="fw-bold text-warning">Tanggung Jawab</h5>
                <p class="mb-0">Menjamin ketersediaan dan aksesibilitas informasi publik yang valid dan terkini.</p>
            </div>
        </div>
    </div>
</div>
@endsection
