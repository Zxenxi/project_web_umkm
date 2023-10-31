@extends('layouts.userlayout')

@section('navcategory')
@foreach ($categories as $item)
<li>
    <a class="dropdown-item" href="{{ url('/categories/'.$item->id) }}">{{
        $item->name}}</a>
</li>
@endforeach
@endsection

@section('content')
<section class="menu" id="menu">
    <div class="container">
        <form class="form" method="get" action="{{ route('search') }}">
            <div class="form-group w-100 mb-3">
                <label for="search" class="d-block mr-2">Pencarian</label>
                <input type="text" name="search" class="form-control w-75 d-inline" id="search"
                    placeholder="Masukkan keyword">
                <button type="submit" class="btn btn-primary mb-1">Cari</button>
            </div>
        </form>
        <span class="text-primary">Product</span>
        <h2 class="fw-bold text-dark mt-3">Pilih product kita!</h2>
        <div class="d-flex flex-wrap justify-content-center justify-content-lg-start">
            @foreach ($products->take(10) as $product)
            <div class="card-menu bg-white mt-3 mx-2" data-aos="fade-up" data-aos-duration="1000">
                <a href="/details/{{ $product->id }}">
                    <div class="item">
                        <!-- <img src="{{ asset('storage/'. $product->image ) }}" alt="{{ $product->name }}"
                            class="w-100 h-200 object-fit-cover"> -->
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                            class="w-100 h-200 object-fit-cover"/>

                        <h5 class="menu-title text-dark mt-3">{{ $product->name }}</h5>
                        <div class="card-menu__description-container">
                            <p class="text-desc-menu mt-2">{{ $product->description }}</p>
                        </div>
                        <h4 class="text-primary fw-bold mt-4">Rp{{ $product->price }}</h4>
                        <a href="https://wa.me/{{ $product->phone_number }}"
                            class="btn btn-cart shadow-none text-white bg-primary">
                            <i class="bx bx-cart fs-5"></i>
                        </a>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Home Section Close -->

<!-- About Section Open -->

@endsection