<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Beranda  SIDOGAR')</title>
    <link rel="icon" href="{{ asset('assets/Garut.png') }}" type="image/png">

    <!-- Bootstrap & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
            background: linear-gradient(135deg, #f0f4f8, #e0e7f0);
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        body.no-scroll {
            overflow: hidden;
        }

        .navbar {
    background: linear-gradient(90deg, #FFD700, #FFCA28);
    z-index: 9999;
    padding: 15px 30px;

    /* Tambahkan shadow yang lebih kuat */
    box-shadow:
        0 6px 12px rgba(0, 0, 0, 0.5),
        0 12px 24px rgba(0, 0, 0, 0.3);

    /* Tambahan opsional: border bawah */
    border-bottom: 2px solid rgba(0, 0, 0, 0.2);
}

/* Menu navbar untuk mobile */
@media (max-width: 768px) {
    .mobile-menu-header {
        background: none;         /* Tidak ada warna atau gradasi */
        padding: 15px;
        border: none;             /* Hilangkan border bawah */
        animation: fadeSlide 0.4s ease;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    
    .mobile-logo {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: transparent;  /* Hilangkan background putih */
        padding: 0;               /* Hilangkan padding agar pas */
        box-shadow: none;          /* Hilangkan bayangan */
    }

    .mobile-menu-header h5 {
        font-size: 1.2rem;
        font-weight: 700;
        color: #003087;
        margin-left: 10px;
        background: transparent;
    }

    .btn-close {
        background: none;
        border: none;
        color: #003087;
        opacity: 0.8;
        font-size: 1.8rem;
        font-weight: bold;
        cursor: pointer;
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .btn-close:hover {
        transform: rotate(90deg);
        opacity: 1;
    }

    .mobile-menu-header hr {
        display: none; /* Hilangkan garis */
    }

    @keyframes fadeSlide {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
}



        
.navbar {
    top: 40px; /* saat topbar terlihat */
    transition: top 0.3s ease;
}


        .navbar a {
            color: #003087 !important;
            font-weight: 600;
            transition: color 0.3s ease, transform 0.2s ease;
        }

        .navbar a:hover {
            color: #001f5f !important;
            transform: translateY(-2px);
        }

        .navbar .dropdown-menu {
            background: linear-gradient(90deg, #FFB300, #FF8C00);
            border: none;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(255, 140, 0, 0.2);
            padding: 10px;
            animation: fadeIn 0.3s ease-in-out;
        }

        .navbar .dropdown-item {
            border-radius: 8px;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .navbar .dropdown-item:hover {
            background: #FF8C00;
            color: #003087;
        }

        .navbar-brand img {
            width: 50px;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .navbar-brand img:hover {
            transform: scale(1.1);
        }

        .navbar-brand span {
            font-size: 1.5rem;
            font-weight: 700;
            color: #003087;
            margin-left: 10px;
            letter-spacing: 0.5px;
        }

        .navbar-toggler {
            border: none;
            padding: 10px;
            transition: transform 0.3s ease, rotate 0.3s ease;
        }

        .navbar-toggler:hover {
            transform: scale(1.1) rotate(90deg);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(0, 48, 135, 0.8)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .navbar-collapse {
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.4s ease-in-out;
        }

        .navbar-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            opacity: 0;
            pointer-events: none;
            z-index: 9998;
            transition: opacity 0.4s ease-in-out;
        }

        .navbar-collapse.show ~ .navbar-backdrop {
            opacity: 1;
            pointer-events: auto;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .main-content {
            padding-top: 80px;
            flex: 1;
        }

        .highlight-section {
            padding: 60px 20px;
            background: linear-gradient(135deg, #0054A6, #003087);
            color: #fff;
        }

        .highlight-box {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .highlight-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .highlight-box h5 {
            color: #003087;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .highlight-box p {
            color: #444;
            font-size: 1rem;
            line-height: 1.6;
        }

        .footer {
    background: linear-gradient(135deg, #1a1f36cc, #2c3e50ee, #6c7a89cc); /* navy ke abu gelap ke silver */
    backdrop-filter: blur(6px);
    color: #f5f5f5;
    padding: 50px 20px;
    margin-top: 40px;
    border-top: 4px solid #ffffff33; /* putih transparan */
}


        .footer .widget-title {
            color: #FFD700;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .footer-links a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease, transform 0.2s ease;
        }

        .footer-links a:hover {
            color: #FFD700;
            transform: translateX(5px);
        }

        @media (max-width: 768px) {
            .navbar {
    /* ... yang tadi di atas */
    box-shadow:
        0 6px 12px rgba(0, 0, 0, 0.5),
        0 12px 24px rgba(0, 0, 0, 0.3),
        0 0 10px rgba(255, 215, 0, 0.6); /* efek glow emas */


}


    .navbar-collapse {
        background: linear-gradient(90deg, #FFB300, #FF8C00);
        border-radius: 0 12px 12px 0;
        padding: 20px;
        box-shadow: 0 8px 20px rgba(255, 140, 0, 0.3);
        backdrop-filter: blur(8px);
        transform: translateX(-100%);
        opacity: 0;
        position: fixed;
        top: 0;
        left: 0;
        width: 75%;
        max-width: 300px;
        height: 100%;
        z-index: 10000;
        overflow-y: auto;
    }

    .navbar-collapse.show {
        transform: translateX(0);
        opacity: 1;
    }

    .navbar-collapse .navbar-nav {
        padding-top: 30px;
        flex-direction: column;
        gap: 12px;
    }

    .highlight-section {
        padding: 30px 10px;
    }

    .highlight-box {
        margin-bottom: 20px;
    }
}

<!-- Bootstrap & FontAwesome -->

.text-gradient-gold {
    background: linear-gradient(to right, #FFD700, #FFA500);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: bold;
}

 /* Untuk Galeri pada halaman utama*/

section.container.mt-5 {
    background-color: #ffffff !important;
    border-radius: 12px;
    padding: 40px 30px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
}

/* Untuk Card pada halaman utama*/

.card-img {
    filter: brightness(60%); /* Gelapkan latar belakang */
    transform: scale(1.05);  /* Sedikit diperbesar agar tidak ada pinggiran kosong */
}

.card-img-overlay img[alt="Garut"] {
    filter: brightness(110%) contrast(110%); /* Perjelas logo */
    z-index: 2;
}

.card-img-overlay h5 {
    position: relative;
    z-index: 2;
}

                                    /* ==== TOPBAR ==== */
.topbar {
    background: linear-gradient(90deg, #003087, #0054A6);
    color: #fff;
    font-size: 0.9rem;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 10000;
    transition: top 0.3s ease;
    height: 40px;
}

.topbar a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s ease;
}

.topbar a:hover {
    color: #FFD700;
}

.navbar {
    top: 40px; /* geser navbar agar tidak menimpa topbar */
}






       

    </style>

    @stack('styles')
</head>
<body>

                                    <!-- TOPBAR -->
<div id="topbar" class="topbar d-flex justify-content-between align-items-center px-4 py-2">
    <div class="topbar-left">
        <a href="mailto:ppid@garutkab.go.id" class="me-3">
            <i class="fas fa-envelope"></i> ppid@garutkab.go.id
        </a>
        <a href="https://instagram.com/ppidgarut" target="_blank">
            <i class="fab fa-instagram"></i> @ppidgarut
        </a>
    </div>
</div>




                                    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top px-4 shadow-sm" style="background: linear-gradient(90deg, #FFD700, #FFCA28);">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('assets/LogoSidogar.png') }}" alt="Logo">
            <span>PPID GARUT</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

       
        <div class="collapse navbar-collapse" id="mainNav">
    <!-- Header menu mobile -->
    <div class="mobile-menu-header d-lg-none">
        <div class="d-flex justify-content-between align-items-center px-3">
            <div class="d-flex align-items-center">
                <img src="{{ asset('assets/LogoSidogar.png') }}" alt="Logo" class="mobile-logo me-2">
                <h5 class="m-0">PPID GARUT</h5>
            </div>
            <button class="btn-close text-white fs-3" id="closeMobileMenu">&times</button>
        </div>
        <hr>
    </div>

   

            <ul class="navbar-nav ms-auto gap-2">
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-bold" href="#" data-bs-toggle="dropdown">Profil</a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('profil.ppid') }}">Profil PPID</a></li>

                       
                        <li><a class="dropdown-item" href="{{ route('sop-ppid.index') }}">SOP PPID</a></li>
                        <li><a class="dropdown-item" href="{{ route('maklumat-layanan') }}">Maklumat Layanan</a></li>
                        <li><a class="dropdown-item" href="{{ route('dasar-hukum.index') }}">Dasar Hukum</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-bold" href="#" data-bs-toggle="dropdown">PPID</a>
                    <ul class="dropdown-menu">
                        <li><span class="dropdown-item-text">Laporan</span></li>
                        <li><a class="dropdown-item" href="#">Statistik</a></li>
                        <li><a class="dropdown-item" href="#">Pertanyaan Sering Diajukan</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-bold" href="{{ route('ppid-pembantu') }}">PPID Pembantu</a>
                </li>

                

                <li class="nav-item">
                <a class="nav-link fw-bold" href="#kontak" style="color: #0054A6;">Kontak Kami</a>


</li>


                @if(Auth::check())
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger ms-2">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ route('register') }}">Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    <main class="flex-fill main-content">
        @yield('content')
    </main>

    <div class="navbar-backdrop"></div>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navbarToggler = document.querySelector('.navbar-toggler');
            const navbarCollapse = document.querySelector('#mainNav');
            const navbarBackdrop = document.querySelector('.navbar-backdrop');

            navbarToggler.addEventListener('click', function (e) {
                e.stopPropagation();
                const isShown = navbarCollapse.classList.contains('show');
                document.body.classList.toggle('no-scroll', !isShown);
                navbarBackdrop.style.opacity = isShown ? '0' : '1';
                navbarBackdrop.style.pointerEvents = isShown ? 'none' : 'auto';
            });

            document.addEventListener('click', function (e) {
                if (
                    e.target.classList.contains('navbar-backdrop') ||
                    (e.target.classList.contains('nav-link') && !e.target.classList.contains('dropdown-toggle')) ||
                    e.target.classList.contains('dropdown-item')
                ) {
                    document.body.classList.remove('no-scroll');
                    navbarCollapse.classList.remove('show');
                    navbarBackdrop.style.opacity = '0';
                    navbarBackdrop.style.pointerEvents = 'none';
                }
            });

            // Inisialisasi dropdown (opsional karena Bootstrap bundle sudah otomatis)
            document.querySelectorAll('.dropdown-toggle').forEach(el => new bootstrap.Dropdown(el));
        });
    </script>

<script>
    const topbar = document.getElementById('topbar');
    const navbar = document.querySelector('.navbar');
    let lastScroll = 0;

    window.addEventListener('scroll', function() {
        let currentScroll = window.pageYOffset;

        if (currentScroll > 50 && currentScroll > lastScroll) {
            // sembunyikan topbar dan geser navbar ke atas
            topbar.style.top = '-40px';
            navbar.style.top = '0';
        } else {
            // tampilkan kembali topbar dan kembalikan posisi navbar
            topbar.style.top = '0';
            navbar.style.top = '40px';
        }

        lastScroll = currentScroll;
    });
</script>

<script>
    document.getElementById('closeMobileMenu').addEventListener('click', function() {
        const navbarCollapse = document.getElementById('mainNav');
        const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
            toggle: true
        });
    });
</script>



    @stack('scripts')
</body>
</html>
