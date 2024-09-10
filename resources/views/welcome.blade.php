<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biicorp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        body {
            scroll-behavior: smooth;
            background-color: #f8f9fa;
            padding-top: 70px;
        }

        .profil-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 30px;
        }

        .profil-image {
            flex: 1;
            max-width: 400px;
            border-radius: 10px;
            overflow: hidden;
        }

        .profil-image img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            max-width: 1200px;
            border: 2px solid #06bdfa;
            border-radius: 50px;
            padding: 10px 20px;
            background-color: #ffffff;
            z-index: 1030;
            margin-top: 1.rem;
        }


        .navbar-brand img {
            width: 50px;
            height: auto;
        }

        .navbar-brand {
            color: #0d3b66;
        }

        .nav-link {
            color: #0d3b66 !important;
            font-weight: bold;
            transition: color 0.3s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: rgb(220, 38, 59) !important;
            border-bottom: 2px solid rgb(220, 38, 59);
        }

        .auth-buttons .btn {
            color: #0d3b66;
            border: 1px solid #0d3b66;
            border-radius: 30px;
        }

        .auth-buttons .btn:hover {
            color: white;
            background-color: #0d3b66;
            border-color: #0d3b66;
        }

        .section-title {
            color: #0d3b66;
            margin-top: 50px;
            margin-bottom: 30px;
            font-weight: bold;
            font-size: 2rem;
            padding-bottom: 10px;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
        }

        .footer {
            background-color: #0d3b66;
            color: white;
            padding: 30px 0;
            border-top: 5px solid #06bdfa;
        }

        .footer a {
            color: #06bdfa;
            text-decoration: none;
        }

        .footer a:hover {
            color: white;
            text-decoration: underline;
        }

        .footer .social-icons i {
            font-size: 24px;
            margin-right: 15px;
            transition: color 0.3s;
        }

        .footer .social-icons i:hover {
            color: #06bdfa;
        }

        .map-container {
            position: relative;
            padding-bottom: 40%;
            /* Adjusted for a more compact view */
            height: 0;
            overflow: hidden;
            max-width: 100%;
            background: #f0f0f0;
            border-radius: 10px;
        }

        .map-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 10px;
        }

        .comment-form textarea {
            resize: none;
        }

        .comment-form .form-control {
            border-radius: 30px;
        }

        .comment-form button {
            border-radius: 30px;
        }

        .comment-form .form-label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="biscorp.png" alt="Logo Posyandu">
                    <span
                        style="color: #800000; font-family: Arial, sans-serif; font-size: 1.4rem; font-weight: bold;">Biiscorp</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#jadwal">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#galeri">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Artikel">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#kontak">Kontak</a>
                        </li>
                    </ul>
                    @if (Route::has('login'))
                        <div class="auth-buttons d-flex ms-3">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary me-2">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2 fw-bold">
                                    Login
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-outline-secondary">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </nav>
    </div>
    <div id="jadwal" class="container mt-5">
        <h1 class="section-title text-center">Tentang</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
        
   
    <div id="galeri" class="container mt-5">
        <h1 class="section-title text-center">Galeri</h1>
        <div id="galleryCarousel" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="gallery-image1.jpg" class="d-block w-100" alt="Gallery Image 1">
                </div>
                <div class="carousel-item">
                    <img src="gallery-image2.jpg" class="d-block w-100" alt="Gallery Image 2">
                </div>
                <div class="carousel-item">
                    <img src="gallery-image3.jpg" class="d-block w-100" alt="Gallery Image 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container mt-5">
        <h1 class="section-title text-center">Artikel</h1>
        <div class="row">
            @if($artikels->isEmpty())
                <p>No articles found.</p>
            @else
                @foreach ($artikels as $artikel)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-lg " style="height: 400px;"> 
                            @if($artikel->gambar)
                                <img src="{{ asset('storage/' . $artikel->gambar) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                            @else
                                <img src="default-image.jpg" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Default Image">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $artikel->judul }}</h5>
                                <p class="card-text flex-grow-1">{{ Str::limit($artikel->isi, 100) }}</p>
                                <a href="{{ route('artikels.show', $artikel->id) }}" class="btn btn-primary mt-auto">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    
    <div id="kontak" class="container mt-5 text-center">
        <h1 class="section-title">Kontak Kami</h1>
        <div class="map-container mb-4">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12600.000000000001!2d-122.0842499!3d37.4220656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fbcf1e6d35e6d%3A0x75b60cdb9d8b74c8!2sGoogleplex!5e0!3m2!1sen!2sus!4v1602901610218!5m2!1sen!2sus"
                allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    <div class="container mt-5">
        <h2>Berikan Komentar</h2>
        <form action="#" method="post" class="comment-form">
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Komentar</label>
                <textarea class="form-control" id="comment" name="comment" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Komentar</button>
        </form>

    </div>

    <div class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Biiscorp Surakarta</h5>
                    <p>Alamat: Jl. Raya Surakarta</p>
                    <p>Email: bisscorp@email.com</p>
                    <p>Telepon: 88888888</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h5>Ikuti Kami</h5>
                    <div class="social-icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
