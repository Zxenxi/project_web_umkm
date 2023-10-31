@extends('layouts.userlayout')
<!-- Home Section Open -->
@section('navcategory')
@foreach ($category as $item)
<li>
    <a class="dropdown-item" href="{{ url('/categories/'. $item->id) }}">{{
        $item->name}}</a>
</li>
@endforeach

@endsection
@section('content')
<section class="home" id="home">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="home-content" data-aos="fade-up" data-aos-duration="1000">

                    <h1 class="text-home-bold fw-bold text-dark mt-1">
                        Kuatkan ekonomi lokal dukung
                        <span class="text-primary">UMKM</span>
                        dan beli Produk lokal!
                    </h1>
                    <h4 class="text-home-reguler fw-normal text-secondary">
                        Ayo dukung UMKM dan bersama-sama memajukan
                        perekonomian kita!
                    </h4>
                    <div class="home-btn mt-5">
                        <a href="#" class="btn btn-primary shadow-none">Order now</a>
                        <a href="#" class="btn btn-video-play">
                            <i class="bx bx-play"></i>
                        </a>
                        <span class="video-play text-dark">See video</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="home-img" data-aos="fade-up" data-aos-duration="2000">
                    <img src="assets/img/home-img.svg" class="w-100" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Home Section Close -->

<!-- About Section Open -->
<section class="about" id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="row">
                    <div class="col-md-11">
                        <div class="gallery-img mt-3" data-aos="fade-up" data-aos-duration="1000">
                            <img src="assets/img/about-img.svg" class="w-100" alt="" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="about-content" data-aos="fade-up" data-aos-duration="2000">
                    <span class="text-primary">About</span>
                    <h2 class="fw-bold text-dark mt-3">
                        Selamat datang di Pandawa UMKM!
                    </h2>
                    <p class="text-secondary mt-3">
                        Kami hadir untuk membantu Anda meningkatkan pemasaran produk
                        dan memperkuat brand bisnis Anda. Bergabunglah dengan kami sekarang dan rasakan manfaatnya!
                    </p>
                    <a href="#services" class="btn btn-primary shadow-none mt-5">Load more</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section Close -->

<!-- Services Section Open -->
<section class="services text-center" id="services">
    <div class="container">
        <span class="text-primary">About us</span>
        <h2 class="fw-bold text-dark mt-3">
            Mengapa harus memilih kami?
        </h2>
        <div class="row">
            <div class="col-lg-4 col-md-6 content mt-5" data-aos="fade-up" data-aos-duration="1000">
                <img src="assets/img/services-1.svg" alt="" />
                <h5 class="services-title text-dark mt-4">
                    Produk Berkualitas
                </h5>
                <p class="text-secondary mt-3">
                    Temukan berbagai produk UMKM berkualitas dan
                    terjangkau di sini.
                </p>
            </div>
            <div class="col-lg-4 col-md-6 content mt-5" data-aos="fade-up" data-aos-duration="2000">
                <img src="assets/img/services-2.svg" alt="" />
                <h5 class="services-title text-dark mt-4">
                    Harga yang terjangkau
                </h5>
                <p class="text-secondary mt-3">
                    Rasakan manfaat dan keunggulan produk UMKM kami
                    dibandingkan dengan produk lainnya
                </p>
            </div>
            <div class="col-lg-4 col-md-6 content mt-5" data-aos="fade-up" data-aos-duration="3000">
                <img src="assets/img/services-3.svg" alt="" />
                <h5 class="services-title text-dark mt-4">
                    Pemesanan mudah
                </h5>
                <p class="text-secondary mt-3">
                    Tunggu apa lagi? Segera pesan produk UMKM kami
                    sekarang juga
                </p>
            </div>
        </div>
    </div>
</section>
<section class="menu" id="menu">
    <div class="container">
        <span class="text-primary">Product</span>
        <h2 class="fw-bold text-dark mt-3">Pilih product kita!</h2>
        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($products->chunk(3) as $key => $productChunk)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <div class="row">
                        @foreach ($productChunk as $product)
                        <div class="col-md-4">
                            <div class="card-menu-dashboard bg-white mt-3 " data-aos="fade-up" data-aos-duration="1000">
                                <a href="/details/{{ $product->id }}">
                                    <div class="item">
                                        <!-- <img src="{{ asset('storage/'. $product->image ) }}" alt="{{ $product->name }}"
                                            class="w-100 h-200 object-fit-cover"> -->
                                            <img src="{{ Storage::url($product->image) }}" height="200" width="200" alt="" />
                                        <h5 class="menu-title text-dark mt-3">{{ $product->name }}</h5>
                                        <div class="card-menu__description-container">
                                            <p class="text-desc-menu mt-2">{{ $product->description }}</p>
                                        </div>
                                        <div class="itemb">
                                            <h4 class="text-primary fw-bold mt-4">Rp{{ $product->price }}</h4>
                                            <a href="https://wa.me/{{ $product->phone_number }}"
                                                class="btn btn-cart shadow-none text-white bg-primary">
                                                <i class="bx bx-cart fs-5"></i>
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev"
                data-bs-slide="3" style="position: absolute; top: 50%; left: -50px; transform: translateY(-50%);">
                <span class="carousel-control-prev-icon" aria-hidden="true"
                    style="background-color: #696969; padding: 10px;"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next"
                data-bs-slide="3" style="position: absolute; top: 50%; right: -50px; transform: translateY(-50%);">
                <span class="carousel-control-next-icon" aria-hidden="true"
                    style="background-color: #696969; padding: 10px;"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="text-center">
            <div class="about-content" data-aos="fade-up" data-aos-duration="2000">
                <a href="{{ route('mainCategory') }}" class="btn btn-primary shadow-none mt-5">All Kategori</a>
            </div>
        </div>
    </div>
</section>
{{-- menu section close --}}

<!-- Testimonials Section Open -->
<section class="testimonials text-center">
    <div class="container">
        <span class="text-primary">Testimonials</span>
        <h2 class="fw-bold text-dark mt-3">What our customers say?</h2>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active rounded-circle bg-primary" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            class="rounded-circle bg-primary" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="content-testimonials mt-5" data-aos="fade-up" data-aos-duration="1000">
                                <img class="rounded-circle" src="assets/img/img-testimonials-1.svg"
                                    style="width: 80px" />
                                <h5 class="name-testimonials text-dark mt-3">
                                    Ananda Ayu Gempita
                                </h5>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star-half"></i>
                                <p class="text-secondary mt-3">
                                    I love the food here. The atmosphere
                                    is comfortable and every time I come
                                    here it is always crowded with
                                    people.
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="content-testimonials mt-5" data-aos="fade-up" data-aos-duration="1000">
                                <img class="rounded-circle" src="assets/img/img-testimonials-2.svg"
                                    style="width: 80px" />
                                <h5 class="name-testimonials text-dark mt-3">
                                    Alya Farhana
                                </h5>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <p class="text-secondary mt-3">
                                    I really like the food here, it's
                                    delicious and the price is very
                                    affordable. I often come here with
                                    my friends on weekends. Love it!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonials Section Close -->

<!-- Gallery Section Open -->
<section class="gallery" id="gallery">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="row">
                    <div class="col-md-11">
                        <div class="gallery-content" data-aos="fade-up" data-aos-duration="1000">
                            <span class="text-primary">Gallery</span>
                            <h2 class="fw-bold text-dark mt-3">
                                Food gallery on our menu
                            </h2>
                            <p class="text-secondary mt-3">
                                Our food gallery contains a collection
                                of pictures that we take when customers
                                order food, we have a large selection of
                                delicious food and drinks with various
                                variants and affordable prices, you can
                                see them here.
                            </p>
                            <a href="#" class="btn btn-primary shadow-none mt-5">Load more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="gallery-img" data-aos="fade-up" data-aos-duration="2000">
                    <img src="assets/img/gallery-img.svg" class="w-100" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Gallery Section Close -->

<!-- Newslatter Section Open -->
<section class="newslatter" id="newslatter">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="newslatter-content bg-primary text-center" data-aos="fade-up" data-aos-duration="1000">
                    <h2 class="title-newslatter fw-bold text-white">
                        Yuk, promosikan UMKM-mu di sini dan jadilah
                        bagian dari komunitas UMKM yang berkembang pesat
                        di Indonesia.
                    </h2>
                    <p class="text-white mt-3">
                        Bersama-sama kita bisa menguatkan perekonomian
                        bangsa.
                    </p>
                    <div class="form-newslatter mt-5">
                        <input type="email" class="form-control w-50 shadow-none"
                            placeholder="Daftarkan produk anda sekarang!" />
                        {{-- <a href="#" class="btn btn-primary-light shadow-none">Chat admin</a> --}}
                        <a href="https://api.whatsapp.com/send?phone=085865201181"
                            class="btn btn-primary-light shadow-none">Chat admin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
{{-- <script>
    var productCarousel = new bootstrap.Carousel(document.getElementById('productCarousel'));
</script> --}}