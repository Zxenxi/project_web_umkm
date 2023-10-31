<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Costum CSS -->
    <link rel="stylesheet" href="{{ asset('css/style_user.css') }}" />

    <!-- AOS Animate -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <!-- Icon -->

    @yield('custom-css')

    <link rel="icon" href="{{  asset('/img/logo.svg')}}" />
    <title>UMKM Landing Page</title>
</head>

<body>
    <!-- Navbar Section Open -->
    <nav class=" navbar navbar-expand-lg sticky-top bg-white">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <img src="{{ asset('assets/img/logo.svg') }}" class="me-3" alt="brand" />
                <span class="text-dark">Pandawa|UMKM</span>
            </a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="bx bx-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#menu">Product</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            @yield('navcategory')

                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('mainCategory') }}">Lihat semua Kategori</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#newslatter">Kontak Admin</a>
                    </li>
                </ul>
                {{-- <a href="" class="btn btn-primary shadow-none">Pesan</a> --}}
            </div>
        </div>
    </nav>
    <!-- Navbar Section Close -->

    {{-- content opem --}}
    @yield('content')

    <!-- Footer Section Open -->
    <footer class="footer-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-5">
                    <div class="col-md-10">
                        <a href="#" class="footer-brand">
                            <img src={{ asset('assets/img/logo.svg') }} class="me-3" alt="brand" />
                            <span class="text-dark">Pandawa|UMKM</span>
                            <p class="text-secondary mt-3">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s,
                            </p>
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="footer-content">
                                <span>Services</span>
                                <ul class="footer-link mt-3 list-unstyled">
                                    <li>
                                        <a href="#" class="py-1 d-block">Delivery</a>
                                    </li>
                                    <li>
                                        <a href="#" class="py-1 d-block">Pricing</a>
                                    </li>
                                    <li>
                                        <a href="#" class="py-1 d-block">Fast food</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="footer-content">
                                <span>Info</span>
                                <ul class="footer-link mt-3 list-unstyled">
                                    <li>
                                        <a href="#" class="py-1 d-block">Promo date</a>
                                    </li>
                                    <li>
                                        <a href="#" class="py-1 d-block">Event</a>
                                    </li>
                                    <li>
                                        <a href="#" class="py-1 d-block">Careers</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="footer-content">
                                <span>Contact</span>
                                <ul class="footer-link mt-3 list-unstyled">
                                    <li>
                                        <a href="#" class="py-1 d-block">South Jakarta - Indonesia</a>
                                    </li>
                                    <li>
                                        <a href="#" class="py-1 d-block">+0628-2267-9981</a>
                                    </li>
                                    <li>
                                        <a href="#" class="py-1 d-block">contact@foodly.co.id</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <p class="copyright text-secondary text-center">
                    Copyright &copy; 2022 All rights reserved | By
                    <a class="text-primary" href="https://ilmaelfiraa.github.io">Firmansyah al fatoni</a>
                </p>
            </div>
        </div>
    </footer>
    <!-- Footer Section Close -->

    <!-- AOS Animate on Scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"
        integrity="sha512-+JZJvJZJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        AOS.init();
    </script>
    {{-- @yield('scripts') --}}
    <!-- Include custom JavaScript -->
    <!-- Include custom JavaScript -->
    <script src="{{ asset('js/slider.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</body>

</html>