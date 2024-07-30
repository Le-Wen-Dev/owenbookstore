@extends('layout')
@section('content')
@include('compoments.header')
<main>


    <!-- slider-area-start -->
    <section class="slider-area pb-25">
        <div class="container">
            <div class="row justify-content-xl-end">
                <div class="col-xl-9 col-xxl-7 col-lg-9">
                    <div class="tp-slider-area p-relative">
                        <div class="swiper-container slider-active">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="tp-slide-item">
                                        {{-- <div class="tp-slide-item__content ">
                                <h4 class="tp-slide-item__sub-title text-light">Accessories</h4>
                                <h3 class="tp-slide-item__title mb-25 text-light ">Up To 
                                   <i>40% Off 
                                      <img src="{{asset('uploads/banner1.png')}}" alt="">
                                        </i>
                                        latest Creations</h3>
                                        <a class="tp-slide-item__slide-btn tp-btn" href="shop.html">Shop Now <i
                                                class="fal fa-long-arrow-right"></i></a>
                                    </div> --}}
                                    <div class="tp-slide-item__img">
                                        <img src="{{asset('uploads/banner1.png')}}" alt="" height="400px" width="100%">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tp-slide-item">
                                    {{-- <div class="tp-slide-item__content text-light">
                                <h4 class="tp-slide-item__sub-title text-light" >Accessories</h4>
                                <h3 class="tp-slide-item__title mb-25 text-light">Up To <i>35% Off 
                           
                              </i> latest Creations</h3>
                                <a class="tp-slide-item__slide-btn tp-btn" href="shop.html">Shop Now <i class="fal fa-long-arrow-right"></i></a>
                             </div> --}}
                                    <div class="tp-slide-item__img">
                                        <img src="{{asset('uploads/banner2.png')}}" alt="" height="400px" width="100%">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tp-slide-item">
                                    {{-- <div class="tp-slide-item__content text-light" >
                                <h4 class="tp-slide-item__sub-title text-light">Accessories</h4>
                                <h3 class="tp-slide-item__title mb-25 text-light">Up To <i>45% Off <img src="" alt=""></i> latest Creations</h3>
                                <a class="tp-slide-item__slide-btn tp-btn" href="shop.html">Shop Now <i class="fal fa-long-arrow-right"></i></a>
                             </div> --}}
                                    <div class="tp-slide-item__img">
                                        <img src="{{asset('uploads/banner3.png')}}" alt="" height="400px" width="100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-pagination"></div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-lg-3">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="tpslider-banner tp-slider-sm-banner mb-30">
                            <a href="shop-details.html">
                                <div class="tpslider-banner__img">
                                    <img src="{{asset('uploads/banner4.png')}}" alt="">
                                    {{-- <div class="tpslider-banner__content">
                                <span class="tpslider-banner__sub-title">Hand made</span>
                                <h4 class="tpslider-banner__title">New Modern & Stylist <br> Crafts</h4>
                             </div> --}}
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6">
                        <div class="tpslider-banner">
                            <a href="shop-details.html">
                                <div class="tpslider-banner__img">
                                    <img src="{{asset('uploads/banner5.png')}}" alt="" width="100%" height="170px">
                                    {{-- <div class="tpslider-banner__content">
                                <span class="tpslider-banner__sub-title">Popular</span>
                                <h4 class="tpslider-banner__title">Energy with our <br> newest collection</h4>
                             </div> --}}
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- slider-area-end -->



    <!-- product-area-start -->
    <section class="product-area pt-95 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="tpsection mb-40">
                        <h4 class="tpsection__title">Sản Phẩm <span> Phổ biến <img
                                    src="assets/img/icon/title-shape-01.jpg" alt=""></span></h4>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="tpnavbar">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-all-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all"
                                    aria-selected="true">All</button>
                                <button class="nav-link" id="nav-popular-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-popular" type="button" role="tab" aria-controls="nav-popular"
                                    aria-selected="false">Popular</button>
                                <button class="nav-link" id="nav-sale-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-sale" type="button" role="tab" aria-controls="nav-sale"
                                    aria-selected="false">On Sale</button>
                                <button class="nav-link" id="nav-rate-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-rate" type="button" role="tab" aria-controls="nav-rate"
                                    aria-selected="false">Best Rated</button>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                    <div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
                        @if(isset($products) && is_object($products))
                        @foreach($products as $pro)
                        <div class="col">
                            <div class="tpproduct pb-15 mb-30" data-name="{{ $pro->name }}" data-img="{{ $pro->img }}"
                                data-price="{{ $pro->price }}" data-description="{{ $pro->description }}">
                                <div class="tpproduct__thumb p-relative">
                                    <a href="shop-details-2.html">
                                        <img src="{{ asset('uploads/'.$pro->img) }}" alt="product-thumb">
                                        <img class="product-thumb-secondary" src="{{ asset('$pro->img') }}" alt="">
                                    </a>
                                    <div class="tpproduct__thumb-action">
                                        <a class="comphare" href="#"><i class="fal fa-exchange"></i></a>
                                        <a class="quckview" href="detail/{{$pro->id}}"><i class="fal fa-eye"></i></a>
                                        <a class="wishlist" href="">
                                            <form action="/addToFavorites" method="POST">
                                                @csrf
                                                @if(Session::has('users'))
                                                @php
                                                $users = Session::get('users');
                                                @endphp
                                                <input type="hidden" name="id_user" value="{{ $users->id }}">
                                                @endif
                                                <input type="hidden" name="id" value="{{ $pro->id }}">
                                                <input type="hidden" name="name" value="{{ $pro->name }}">
                                                <input type="hidden" name="img" value="{{ $pro->img }}">
                                                <input type="hidden" name="price" value="{{ $pro->price }}">
                                                <input type="hidden" name="description" value="{{ $pro->description }}">
                                                <button type="submit">
                                                    <i class="fal fa-heart"></i>
                                                </button>
                                            </form>
                                        </a>
                                    </div>
                                </div>
                                <div class="tpproduct__content">
                                    <h3 class="tpproduct__title"><a href="shop-details.html">{{ $pro->name }}</a></h3>
                                    <div class="tpproduct__priceinfo p-relative">
                                        <div class="tpproduct__priceinfo-list">
                                            <span>{{ $pro->price }}</span>
                                        </div>
                                        <div class="tpproduct__cart">
                                            <form action="{{asset('addtocart')}}" method="POST">
                                                @csrf

                                                @if(Session::has('users'))
                                                @php
                                                $users = Session::get('users');
                                                @endphp
                                                <input type="hidden" name="id_user" value="{{ $users->id }}">
                                                @endif
                                                <input type="hidden" name="id" value="{{ $pro->id }}">
                                                <input type="hidden" name="name" value="{{ $pro->name }}">
                                                <input type="hidden" name="img" value="{{ $pro->img }}">
                                                <input type="hidden" name="price" value="{{ $pro->price }}">
                                                <input type="hidden" name="description" value="{{ $pro->description }}">
                                                <button class="add-to-cart-btn" type="submit">
                                                    <i class="fal fa-shopping-cart"></i>
                                                    Thêm vào giỏ hàng
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-popular" role="tabpanel" aria-labelledby="nav-popular-tab">
                    <div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
                        @if(isset($product_popular) && is_object($product_popular))
                        @foreach($product_popular as $pro)
                        <div class="col">
                            <div class="tpproduct pb-15 mb-30">
                                <div class="tpproduct__thumb p-relative">
                                    <span class="tpproduct__thumb-volt"><i class="fas fa-bolt"></i></span>
                                    <a href="shop-details-2.html">
                                        <img src="assets/img/product/home-one/product-11.jpg" alt="product-thumb">
                                        <img class="product-thumb-secondary"
                                            src="assets/img/product/home-one/product-12.jpg" alt="">
                                    </a>
                                    <div class="tpproduct__thumb-action">
                                        <a class="comphare" href="#"><i class="fal fa-exchange"></i></a>
                                        <a class="quckview" href="#"><i class="fal fa-eye"></i></a>
                                        <a class="wishlist" href="wishlist.html"><i class="fal fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="tpproduct__content">
                                    <h3 class="tpproduct__title"><a href="shop-details.html">{{ $pro->name }}</a></h3>
                                    <div class="tpproduct__priceinfo p-relative">
                                        <div class="tpproduct__priceinfo-list">
                                            <span>{{ $pro->price }}</span>
                                        </div>
                                        <div class="tpproduct__cart">
                                            <form action="{{asset('addtocart')}}" method="POST">
                                                @csrf

                                                @if(Session::has('users'))
                                                @php
                                                $users = Session::get('users');
                                                @endphp
                                                <input type="hidden" name="id_user" value="{{ $users->id }}">
                                                @endif
                                                <input type="hidden" name="id" value="{{ $pro->id }}">
                                                <input type="hidden" name="name" value="{{ $pro->name }}">
                                                <input type="hidden" name="img" value="{{ $pro->img }}">
                                                <input type="hidden" name="price" value="{{ $pro->price }}">
                                                <input type="hidden" name="description" value="{{ $pro->description }}">
                                                <button class="add-to-cart-btn" type="submit">
                                                    <i class="fal fa-shopping-cart"></i>
                                                    Add To Cart
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-sale" role="tabpanel" aria-labelledby="nav-sale-tab">
                    <div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
                        @foreach ($saleProducts as $product)
                        <div class="col">
                            <div class="tpproduct pb-15 mb-30">
                                <div class="tpproduct__thumb p-relative">
                                    <span class="tpproduct__thumb-topsall">On Sale {{ $product->sale }}%</span>
                                    <a href="shop-details-2.html">
                                        <img src="assets/img/product/home-one/product-7.jpg" alt="product-thumb">
                                        <img class="product-thumb-secondary"
                                            src="assets/img/product/home-one/product-8.jpg" alt="">
                                    </a>
                                    <div class="tpproduct__thumb-action">
                                        <a class="comphare" href="#"><i class="fal fa-exchange"></i></a>
                                        <a class="quckview" href="detail/{{$product->id}}"><i
                                                class="fal fa-eye"></i></a>
                                        <a class="wishlist" href="wishlist.html"><i class="fal fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="tpproduct__content">
                                    <h3 class="tpproduct__title"><a href="shop-details-2.html">{{ $product->name }}</a>
                                    </h3>
                                    <div class="tpproduct__priceinfo p-relative">
                                        <div class="tpproduct__priceinfo-list">
                                            <span>{{ $product->discounted_price }}</span>
                                        </div>
                                        <div class="tpproduct__cart">
                                            <a href="cart.html"><i class="fal fa-shopping-cart"></i>Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-rate" role="tabpanel" aria-labelledby="nav-rate-tab">
                    <div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product-area-end -->

    <!-- deal-product-area-start -->
    <section class="dealproduct-area pb-95">
        <div class="container">
            <div class="theme-bg pt-40 pb-40">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="tpdealproduct">
                            <div class="tpdealproduct__thumb p-relative text-center">
                                <img src="assets/img/floded/floded-01.png" alt="dealproduct-thumb">
                                <div class="tpdealproductd__offer">
                                    <h5 class="tpdealproduct__offer-price"><span>From</span>$49</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="tpdealcontact pt-30">
                            <div class="tpdealcontact__price mb-5">
                                <span>$49.00</span>
                                <del>$59.00</del>
                            </div>
                            <div class="tpdealcontact__text mb-30">
                                <h4 class="tpdealcontact__title mb-10"><a href="shop-details.html">Pro2 Abstract Folded
                                        Pots</a></h4>
                                <p>Elegant pink origami design three-dimensional view and decoration co-exist. Great for
                                    adding a decorative touch to any room’s decor. Wonderful accent piece for coffee
                                    tables or side tables.</p>
                            </div>
                            <div class="tpdealcontact__progress mb-30">
                                <div class="progress">
                                    <div class="progress-bar w-75" role="progressbar" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="tpdealcontact__count">
                                <div class="tpdealcontact__countdown" data-countdown="2022/12/29"></div>
                                <i>Remains until the <br> end of the offer</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- deal-product-area-end -->

    <!-- shop-area-start -->
    <section class="shop-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tpsectionarea text-center mb-35">
                        <h5 class="tpsectionarea__subtitle">Follow On</h5>
                        <h4 class="tpsectionarea__title"><i class="fab fa-instagram"></i> ninico-shop</h4>
                    </div>
                </div>
            </div>
            <div class="shopareaitem">
                <div class="shopslider-active swiper-container">
                    <div class="swiper-wrapper">
                        <div class="tpshopitem swiper-slide">
                            <a class="popup-image" href="assets/img/instagram/instagram-01.jpg">
                                <img src="assets/img/instagram/instagram-01.jpg" alt="shop-thumb">
                            </a>
                        </div>
                        <div class="tpshopitem swiper-slide">
                            <a class="popup-image" href="assets/img/instagram/instagram-02.jpg">
                                <img src="assets/img/instagram/instagram-02.jpg" alt="shop-thumb">
                            </a>
                        </div>
                        <div class="tpshopitem swiper-slide">
                            <a class="popup-image" href="assets/img/instagram/instagram-03.jpg">
                                <img src="assets/img/instagram/instagram-03.jpg" alt="shop-thumb">
                            </a>
                        </div>
                        <div class="tpshopitem swiper-slide">
                            <a class="popup-image" href="assets/img/instagram/instagram-04.jpg">
                                <img src="assets/img/instagram/instagram-04.jpg" alt="shop-thumb">
                            </a>
                        </div>
                        <div class="tpshopitem swiper-slide">
                            <a class="popup-image" href="assets/img/instagram/instagram-05.jpg">
                                <img src="assets/img/instagram/instagram-05.jpg" alt="shop-thumb">
                            </a>
                        </div>
                        <div class="tpshopitem swiper-slide">
                            <a class="popup-image" href="assets/img/instagram/instagram-06.jpg">
                                <img src="assets/img/instagram/instagram-06.jpg" alt="shop-thumb">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-area-end -->

</main>




@endsection