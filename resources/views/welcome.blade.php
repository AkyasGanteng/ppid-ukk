@extends('layouts.app')

@section('title', 'PPID KOTA GARUT')

@section('content')


<!-- SLIDER --> 
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
            class="active" aria-label="Slide 1" style="background-color: #FFD700;"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2" style="background-color: #FFD700;"></button>
    </div>

    <!-- Slides -->
    <div class="carousel-inner">
        {{-- Slide 1 --}}
        <div class="carousel-item active">
            <picture>
             <!-- Untuk Desktop -->
        <source srcset="{{ asset('assets/slidermobile1.png') }}" media="(max-width: 1024px)">
            <img src="{{ asset('assets/slider3.png') }}" class="d-block w-100" alt="Slider 1"
                style="max-height: 100vh; object-fit: cover; filter: brightness(0.7);">
</picture>
            <div class="carousel-caption text-center" style="position: absolute; top: 50%; left: 5%; right: 5%; transform: translateY(-50%); padding: 15px; border-radius: 15px; animation: fadeIn 1s; z-index: 2;">
                <div class="it-background">
                    <div class="data-stream"></div>
                    <div class="data-stream"></div>
                    <div class="data-stream"></div>
                    <div class="particle"></div>
                    <div class="particle"></div>
                    <div class="particle"></div>
                </div>

            </div>
        </div>

        {{-- Slide 2 --}}
        <div class="carousel-item">
        <picture>
              <!-- Untuk mobile -->
              <source srcset="{{ asset('assets/slidermobile2.png') }}" media="(max-width: 1024px)">
               <!-- Untuk Desktop -->
            <img src="{{ asset('assets/slider2.png') }}" class="d-block w-100" alt="Slider 2"
                style="max-height: 100vh; object-fit: cover; filter: brightness(0.7);">
</picture>
            <div class="carousel-caption text-center" style="position: absolute; top: 50%; left: 5%; right: 5%; transform: translateY(-50%); padding: 15px; border-radius: 15px; animation: fadeIn 1s; z-index: 2;">
                <div class="it-background">
                    <div class="data-stream"></div>
                    <div class="data-stream"></div>
                    <div class="data-stream"></div>
                    <div class="particle"></div>
                    <div class="particle"></div>
                    <div class="particle"></div>
                </div>

              
            </div>
        </div>
    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Animasi -->
<style>
/* Efek Partikel & Data Stream */
.it-background {
    position: absolute;
    inset: 0;
    z-index: 1;
    overflow: hidden;
    pointer-events: none;
    mix-blend-mode: screen;
}

.data-stream {
    position: absolute;
    width: 2px;
    height: 100%;
    background: rgba(0, 255, 255, 0.35);
    box-shadow: 0 0 8px rgba(0, 255, 255, 0.5);
    animation: moveStream 3s linear infinite;
}

.data-stream:nth-child(1) {
    left: 20%;
    animation-delay: 0s;
}
.data-stream:nth-child(2) {
    left: 50%;
    animation-delay: 1s;
}
.data-stream:nth-child(3) {
    left: 80%;
    animation-delay: 2s;
}

@keyframes moveStream {
    0% {
        transform: translateY(-100%);
        opacity: 0.2;
    }
    50% {
        opacity: 0.6;
    }
    100% {
        transform: translateY(100%);
        opacity: 0.2;
    }
}

.particle {
    position: absolute;
    width: 6px;
    height: 6px;
    background: rgba(0, 255, 255, 0.3);
    border-radius: 50%;
    box-shadow: 0 0 8px rgba(0, 255, 255, 0.8);
    animation: floatParticle 5s linear infinite;
}

.particle:nth-child(4) {
    top: 30%;
    left: 40%;
    animation-delay: 0s;
}
.particle:nth-child(5) {
    top: 60%;
    left: 70%;
    animation-delay: 2s;
}
.particle:nth-child(6) {
    top: 80%;
    left: 20%;
    animation-delay: 4s;
}

@keyframes floatParticle {
    0% {
        transform: translateY(0) scale(1);
        opacity: 0.4;
    }
    50% {
        transform: translateY(-20px) scale(1.3);
        opacity: 0.9;
    }
    100% {
        transform: translateY(0) scale(1);
        opacity: 0.4;
    }
}

/* Teks Gradient */
.text-gradient-gold {
    background: linear-gradient(to right, #FFD700, #FFA500);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Tambahan efek masuk */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

/* Pop-out animation */
.pop-out {
    opacity: 0;
    transform: scale(0.85);
    transition: opacity 0.6s ease, transform 0.6s ease;
}
.pop-out.show {
    opacity: 1;
    transform: scale(1);
}

/* Animasi scroll untuk gambar slider */
.carousel-item img {
    transition: transform 0.5s ease-out, opacity 0.5s ease-out;
}

/* Efek fade pada caption saat scroll */
.carousel-caption {
    transition: transform 0.5s ease-out, opacity 0.5s ease-out;
}

/* Animasi saat halaman pertama kali dimuat */
@keyframes sliderZoomIn {
    0% {
        transform: scale(1.2);
        opacity: 0;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

.carousel-item img.initial-animate {
    animation: sliderZoomIn 1.5s ease-out forwards;
}


/* Efek masuk dengan gerogotan lebih smooth */
@keyframes erodeIn {
    0% {
        clip-path: circle(0% at 50% 50%);
        opacity: 0;
        transform: scale(1.08);
        filter: blur(10px);
    }
    50% {
        opacity: 0.7;
        filter: blur(5px);
    }
    100% {
        clip-path: circle(150% at 50% 50%);
        opacity: 1;
        transform: scale(1);
        filter: blur(0px);
    }
}

/* Efek keluar dengan gerogotan lebih smooth */
@keyframes erodeOut {
    0% {
        clip-path: circle(150% at 50% 50%);
        opacity: 1;
        transform: scale(1);
        filter: blur(0px);
    }
    50% {
        opacity: 0.6;
        filter: blur(5px);
    }
    100% {
        clip-path: circle(0% at 50% 50%);
        opacity: 0;
        transform: scale(0.95);
        filter: blur(10px);
    }
}

/* Terapkan durasi dan easing lebih lembut */
.carousel-item.animate-in img {
    animation: erodeIn 1.8s ease-in-out forwards;
}
.carousel-item.animate-out img {
    animation: erodeOut 1.8s ease-in-out forwards;
}

</style>




<!-- HIGHLIGHT SECTION -->
<section class="highlight-section">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-md-4 col-sm-6 pop-out">
                <div class="highlight-box">
                    <h5>Informasi Berkala</h5>
                    <p>Dapatkan Informasi Mengenai Pemerintah Kabupaten Garut.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 pop-out">
                <div class="highlight-box">
                    <h5>Informasi Setiap Saat</h5>
                    <p>Lakukan permohonan informasi secara cepat dan mudah.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 pop-out">
                <div class="highlight-box">
                    <h5>Informasi Serta Merta</h5>
                    <p>Komitmen PPID Kabupaten Garut untuk transparansi.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: INFORMASI PUBLIK -->
<section class="py-5 text-white text-center position-relative overflow-hidden" 
    style="background: linear-gradient(to right, #2e7bcf, #155fa0);">
    <div class="container">
        <h2 class="display-5 fw-bold pop-out">INFORMASI PUBLIK</h2>
        <p class="lead mt-3 pop-out">Informasi Publik adalah informasi yang dihasilkan, disimpan, dikelola, 
            dikirim, dan/atau diterima oleh suatu badan publik yang berkaitan dengan penyelenggara 
            negara serta informasi lain yang sesuai dengan Undang-Undang ini dan berkaitan dengan 
            kepentingan publik.</p>

        <!-- Cards: Dua atas -->
        <div class="row justify-content-center mt-5 g-4">
            <div class="col-md-5 pop-out">
                <div class="card card-hover shadow-sm border-0 rounded-3 overflow-hidden">
                    <img src="{{ asset('assets/stasiun.png') }}" class="card-img" alt="Stasiun">
                    <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('assets/Garut.png') }}" alt="Garut" style="width: 120px;">
                        <h5 class="mt-3 text-primary fw-bold bg-white px-4 py-2 rounded shadow">
                            INFORMASI BERKALA
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-md-5 pop-out">
                <div class="card card-hover shadow-sm border-0 rounded-3 overflow-hidden">
                    <img src="{{ asset('assets/stasiun.png') }}" class="card-img" alt="Stasiun">
                    <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('assets/Garut.png') }}" alt="Garut" style="width: 120px;">
                        <h5 class="mt-3 text-primary fw-bold bg-white px-4 py-2 rounded shadow">
                            INFORMASI SERTA MERTA
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card: Satu bawah -->
        <div class="row justify-content-center mt-4">
            <div class="col-md-5 pop-out">
                <div class="card card-hover shadow-sm border-0 rounded-3 overflow-hidden">
                    <img src="{{ asset('assets/stasiun.png') }}" class="card-img" alt="Stasiun">
                    <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('assets/Garut.png') }}" alt="Garut" style="width: 120px;">
                        <h5 class="mt-3 text-primary fw-bold bg-white px-4 py-2 rounded shadow">
                            INFORMASI SETIAP SAAT
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- SECTION: PERMOHONAN INFORMASI -->
<section class="py-5 pop-out" style="
    background: linear-gradient(to right, #a1c4fd, #c2e9fb);
    position: relative;
    overflow: hidden;
">
    <!-- Background Image -->
    <img src="{{ asset('assets/bertanya.png') }}" 
         alt="Bertanya" 
         style="
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.35; /* lebih jelas (default 0.15) */
            width: 420px;
            height: auto;
            pointer-events: none;
         ">
         
    




<!-- SECTION: BERITA -->
<section id="berita" class="py-5 bg-light pop-out">
    <div class="container">
        <h2 class="text-center text-dark fw-bold mb-5">Berita Terkini</h2>
        <div class="row justify-content-center">
            @php use Illuminate\Support\Str; @endphp
            @foreach($berita_terkini as $berita)
                <div class="col-md-4 mb-4 pop-out">
                    <div class="card border-0 rounded-4 shadow-sm h-100 hover-shadow transition">
                        @if($berita->foto)
                            <img src="{{ asset('storage/' . $berita->foto) }}" class="card-img-top rounded-top-4"
                                alt="{{ $berita->judul }}" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            @php
                                $tanggal = \Carbon\Carbon::parse($berita->tanggal)->timezone('Asia/Jakarta');
                                $formatted = $tanggal->translatedFormat('d F Y');
                                $diff = $tanggal->locale('id')->diffForHumans();
                            @endphp
                            <small class="text-muted d-block mb-1" style="font-size: 0.75rem;">
    {{ $formatted }} 
    <span class="text-secondary time-diff" data-datetime="{{ $tanggal->toIso8601String() }}">
        {{ $diff }}
    </span>
</small>

                            <h5 class="card-title fw-bold text-dark mb-2" style="font-size: 1.1rem;">
                                {{ $berita->judul }}
                            </h5>
                            <p class="card-text text-muted small mb-3">
                                {{ Str::limit(strip_tags($berita->teks), 100) }}
                            </p>
                            <div class="mt-auto">
                                <a href="{{ route('berita.show', $berita->id) }}" class="btn btn-sm btn-outline-dark rounded-pill">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('berita.index') }}" class="btn btn-dark rounded-pill px-4">Berita Lainnya</a>
        </div>
    </div>
</section>

<!-- SECTION: GALERI -->
<section class="container mt-5 bg-light p-4 rounded shadow-sm pop-out">
    <h2 class="mb-4 fw-bold text-center">Galeri Terbaru</h2>
    <div class="row">
        @foreach($galeris as $item)
            <div class="col-md-3 mb-4 pop-out">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top"
                        style="height: 180px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($item->kegiatan, 50) }}</p>
                        <a href="{{ route('galeri.show', $item->id) }}" class="btn btn-sm btn-outline-primary">
                            Lihat Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center mt-5">
        <a href="{{ route('galeri.index') }}" class="btn btn-secondary btn-lg">
            Galeri Lainnya
        </a>
    </div>
</section>


<!-- STYLING (inline tetap dipertahankan agar tidak konflik) -->
<style>
    /* Semua CSS tetap, bisa dipisahkan ke file eksternal jika ingin lebih bersih */
</style>

<script>
    function updateTimeDiff() {
        document.querySelectorAll('.time-diff').forEach(el => {
            const datetime = new Date(el.dataset.datetime);
            const now = new Date();
            const diffMs = now - datetime;
            const diffMins = Math.floor(diffMs / 60000);
            let text = diffMins < 1 ? 'Baru saja' : diffMins + ' menit lalu';
            if (diffMins >= 60) {
                const hours = Math.floor(diffMins / 60);
                text = hours + ' jam lalu';
                if (hours >= 24) {
                    const days = Math.floor(hours / 24);
                    text = days + ' hari lalu';
                }
            }
            el.textContent = text;
        });
    }
    updateTimeDiff();
    setInterval(updateTimeDiff, 60000);

    // Intersection Observer for pop-out
    document.addEventListener("DOMContentLoaded", () => {
        const elements = document.querySelectorAll('.pop-out');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });

        elements.forEach(el => observer.observe(el));
    });
</script>

<script>
document.addEventListener('scroll', function () {
    const scrollY = window.scrollY;
    const sliders = document.querySelectorAll('.carousel-item img');
    const captions = document.querySelectorAll('.carousel-caption');

    sliders.forEach(img => {
        img.style.transform = `translateY(${scrollY * 0.2}px)`; // Parallax
        img.style.opacity = Math.max(1 - scrollY / 400, 0.6);   // Fade
    });

    captions.forEach(caption => {
        caption.style.transform = `translateY(${scrollY * 0.3}px)`;
        caption.style.opacity = Math.max(1 - scrollY / 300, 0.5);
    });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const carousel = document.querySelector('#carouselExampleIndicators');
    const items = carousel.querySelectorAll('.carousel-item');
    let lastIndex = 0;

    carousel.addEventListener('slide.bs.carousel', function (event) {
        items.forEach(item => {
            item.classList.remove('animate-in', 'animate-out');
        });

        // Slide yang akan masuk
        items[event.to].classList.add('animate-in');

        // Slide yang keluar
        items[lastIndex].classList.add('animate-out');

        lastIndex = event.to;
    });
});
</script>

<style>
/* Responsif untuk perangkat dengan lebar <= 768px */
@media (max-width: 768px) {
    /* Gambar slider */
    .carousel-item img {
        max-height: 60vh;
        object-fit: cover;
    }

    /* Caption agar lebih kecil */
    .carousel-caption {
        font-size: 0.85rem;
        padding: 10px;
        top: 50%;
        left: 10%;
        right: 10%;
        transform: translateY(-50%);
    }

    /* Partikel lebih kecil */
    .particle {
        width: 4px;
        height: 4px;
    }

    /* Tombol navigasi lebih kecil */
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 25px;
        height: 25px;
        background-size: 100% 100%;
    }
}

/* Responsif untuk perangkat sangat kecil (mobile < 480px) */
@media (max-width: 480px) {
    .carousel-item img {
        max-height: 50vh;
    }

    .carousel-caption {
        font-size: 0.75rem;
        padding: 8px;
    }

    .particle {
        width: 3px;
        height: 3px;
    }

    .carousel-indicators button {
        width: 8px;
        height: 8px;
    }
}

/* --- Responsivitas Gambar Slider --- */
.carousel-item img {
    width: 100%;
    height: auto;
    max-height: 100vh;
    object-fit: cover;
}

/* Tablet (<= 768px) */
@media (max-width: 768px) {
    .carousel-item img {
        max-height: 65vh;
    }
    .carousel-caption {
        font-size: 0.9rem;
        padding: 12px;
        top: 50%;
        left: 8%;
        right: 8%;
    }
}

/* Mobile (<= 480px) */
@media (max-width: 480px) {
    .carousel-item img {
        max-height: 55vh;
    }
    .carousel-caption {
        font-size: 0.8rem;
        padding: 10px;
    }
}

/* Existing animations remain unchanged */

/* Responsiveness based on the left example */
.carousel-item img {
    width: 100%;
    height: auto;
    max-height: 480px;
    object-fit: cover;
}

@media (max-width: 1200px) {
    .carousel-item img {
        max-height: 400px;
    }
}

@media (max-width: 992px) {
    .carousel-item img {
        max-height: 350px;
    }
}

@media (max-width: 768px) {
    .carousel-item img {
        max-height: 300px;
    }
    .carousel-caption {
        font-size: 0.9rem;
        padding: 10px;
    }
}

@media (max-width: 576px) {
    .carousel-item img {
        max-height: 250px;
    }
    .carousel-caption {
        font-size: 0.8rem;
        padding: 8px;
    }
}

@media (max-width: 480px) {
    .carousel-item img {
        max-height: 200px;
    }
    .carousel-caption {
        font-size: 0.7rem;
        padding: 6px;
    }
    .particle {
        width: 3px;
        height: 3px;
    }
    .carousel-indicators button {
        width: 6px;
        height: 6px;
    }
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 20px;
        height: 20px;
        background-size: 100% 100%;
    }
}

/* Slider gambar responsive skala 1:1 tanpa terpotong */
.carousel-item img {
    width: 100%;
    aspect-ratio: 1 / 1;   /* menjaga kotak persegi */
    object-fit: contain;   /* seluruh gambar terlihat */
    background: #000;      /* warna latar belakang hitam agar rapi */
}

/* Desktop - tetap tinggi penuh tanpa terpotong */
@media (min-width: 992px) {
    .carousel-item img {
        aspect-ratio: auto;
        height: 100vh;
        object-fit: contain;
    }
}



</style>




@endsection
