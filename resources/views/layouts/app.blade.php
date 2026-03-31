<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library System</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* RESET TOTAL */
        html, body {
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
            overflow-x: hidden !important;
            background-color: #ffffff;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        header {
            width: 100%;
            position: relative;
        }

        .hero-banner {
            width: 100% !important;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }

        /* NAVIGASI SINGLE & RAPI */
        .top-nav {
            position: absolute;
            top: 30px;
            right: 50px;
            z-index: 9999;
        }

        .top-nav a {
            color: #ffffff !important;
            text-decoration: none !important;
            margin-left: 25px;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 1.5px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            transition: 0.3s;
        }

        .top-nav a:hover, .top-nav a.active {
            border-bottom: 2px solid white;
            padding-bottom: 5px;
        }

        .hero-content h1 {
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 5px;
            text-shadow: 2px 2px 15px rgba(0,0,0,0.8);
            margin: 0;
        }

        .no-bg { background-color: #555555 !important; }
        
        /* Smooth Fade untuk Carousel */
        .carousel-fade .carousel-item { opacity: 0; transition-duration: 0.8s; transition-property: opacity; }
        .carousel-fade .carousel-item.active { opacity: 1; }
    </style>
</head>
<body>

    <header>
        <nav class="top-nav">
            <a href="{{ route('beranda') }}" class="{{ Request::is('home') ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('books.index') }}" class="{{ Request::is('books*') ? 'active' : '' }}">Data Buku</a>
            <a href="{{ route('categories.index') }}" class="{{ Request::is('categories*') ? 'active' : '' }}">Data Kategori</a>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: #ff4d4d !important;">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </nav>

        @if(Request::is('home'))
            @php
                $hasBg1 = file_exists(public_path('img_buku/hero.jpg'));
                $hasBg2 = file_exists(public_path('img_buku/hero-bg2.jpg'));
                $hasBg3 = file_exists(public_path('img_buku/hero-bg3.jpg'));
            @endphp
            
            <div id="libraryCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="5000">
                        <div class="hero-banner" style="height: 100vh; background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ $hasBg1 ? asset("img_buku/hero.jpg") : "" }}');">
                            <div class="hero-content">
                                <h1 style="font-size: clamp(2.5rem, 8vw, 5rem);">LIBRARY SYSTEM</h1>
                                <p class="lead">Kelola Koleksi Buku dalam Satu Genggaman</p>
                            </div>
                        </div>
                    </div>
                    
                    @if($hasBg2)
                    <div class="carousel-item" data-bs-interval="5000">
                        <div class="hero-banner" style="height: 100vh; background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset("img_buku/hero-bg2.jpg") }}');">
                            <div class="hero-content">
                                <h1 style="font-size: clamp(2.5rem, 8vw, 5rem);">DIGITAL ARCHIVE</h1>
                                <p class="lead">Pencatatan yang Lebih Rapi dan Akurat</p>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    @if($hasBg3)
                    <div class="carousel-item" data-bs-interval="5000">
                        <div class="hero-banner" style="height: 100vh; background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset("img_buku/hero-bg3.jpg") }}');">
                            <div class="hero-content">
                                <h1 style="font-size: clamp(2.5rem, 8vw, 5rem);">EASY ACCESS</h1>
                                <p class="lead">Temukan Informasi dengan Sekali Klik</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                @if($hasBg2 || $hasBg3)
                    <button class="carousel-control-prev" type="button" data-bs-target="#libraryCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#libraryCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                @endif
            </div>
        @else
            @php $hasBgHeader = file_exists(public_path('img_buku/hero.jpg')); @endphp
            <div class="hero-banner" style="height: 280px; background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ $hasBgHeader ? asset("img_buku/hero.jpg") : "" }}');">
                <div class="hero-content">
                    <h1 style="font-size: 3rem;">{{ Request::is('books*') ? 'DATA BUKU' : 'DATA KATEGORI' }}</h1>
                    <p class="opacity-75">Kelola data inventaris perpustakaan anda</p>
                </div>
            </div>
        @endif
    </header>

    <main class="container py-5">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>