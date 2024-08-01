@php
$id_user = auth()->id();
$cart = \App\Models\Carts::where('id_user', $id_user)->get();
$count = count($cart);
$categories = \App\Models\Categories::all();
$total = 0;
foreach ($cart as $item) {
$item->total = $item->price * $item->quantity;
$total += $item->total;
}
@endphp
<style>
    /* CSS cho hình ảnh trên màn hình lớn (desktop) */
    .desktop-img {
        width: 100px;
        /* Hoặc kích thước bạn muốn */
        height: 100px;
        /* Hoặc kích thước bạn muốn */
        border-radius: 100%;
    }


    /* CSS cho hình ảnh trên màn hình lớn (desktop) */
    .desktop-img {
        width: 100px;
        /* Hoặc kích thước bạn muốn */
        height: 70px;
        /* Hoặc kích thước bạn muốn */
        border-radius: 100%;
    }

    /* Tùy chỉnh để đảm bảo hình ảnh hiển thị đúng */
    .img-fluid {
        max-width: 100%;
        height: auto;
    }
</style>

<div id="preloader">
    <div class="preloader">
        <span></span>
        <span></span>
    </div>
</div>
<button class="scroll-top scroll-to-target" data-target="html">
    <i class="fas fa-angle-up"></i>
</button>
<header>
    <div class="header-top space-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">

                </div>
            </div>
        </div>
    </div>
    <div class="logo-area mt-30 d-none d-xl-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-3">
                    <div class="logo">
                        <a href="{{route('home')}}"><img src="{{asset('img/owenbook.jpg')}}" width="150px" alt="logo"></a>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-9">
                    <div class="header-meta-info d-flex align-items-center justify-content-between">
                        <div class="header-search-bar">
                            <form method="GET" action="{{ route('products.search') }}">
                                <div class="search-info p-relative">
                                    <button class="header-search-icon"><i class="fal fa-search"></i></button>

                                    <button type="submit" class="header-search-icon"><i class="fal fa-search"></i></button>
                                    <input type="text" name="search" placeholder="Tìm kiếm sản phẩm. ">
                                </div>
                            </form>
                        </div>
                        <div class="header-meta header-language d-flex align-items-center">
                            <div class="header-meta__lang">

                            </div>
                            <div class="header-meta__value mr-15">

                            </div>
                            <div class="header-meta__social d-flex align-items-center ml-25">
                                {{-- <button class="header-cart p-relative tp-cart-toggle">
                                <i class="fal fa-shopping-cart"></i>
                                <span class="tp-product-count">2</span>
                             </button> --}}

                                @if(Auth::check())
                                {{-- <p>{{ Auth::user()->name }}</p> --}}
                                <div class="main-menu mt-3">
                                    <ul>
                                        <img src="{{ asset('uploads/'.Auth::user()->img) }}" alt="" class="d-block d-sm-none" width="50px" height="50px">
                                        <li class="has-dropdown cvx">
                                            <a>
                                                <img src="{{ asset('uploads/'.Auth::user()->img) }}" alt="" class="img-fluid  d-none d-sm-block desktop-img">
                                            </a>
                                            <ul class="submenu">
                                                <li><a href="index.html">Xin chào : {{ Auth::user()->name }}</a>
                                                </li>
                                                <li><a href="{{route('profile')}}">Thông tin tài khoản c</a></li>
                                                <li><a href="index-3.html">Đổi mật khẩu</a></li>
                                                <li><a href="#" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">Đăng xuất </a></li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </ul>
                                        </li>
                                    </ul>

                                </div>
                                @else
                                <a href="{{route('login')}}"><i class="fal fa-user p-3"></i></a>
                                @endif
                                <button class="header-cart p-relative tp-cart-toggle">
                                    <i class="fal fa-shopping-cart"></i>
                                    <span class="tp-product-count">{{$count}}</span>
                                </button>

                                <a href="{{asset('favorites')}}"><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-menu-area mt-20 d-none d-xl-block">
        <div class="for-megamenu p-relative">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-3">
                        <div class="cat-menu__category p-relative">
                            <a class="tp-cat-toggle" href="#" role="button"><i class="fal fa-bars"></i>Danh Mục</a>
                            <div class="category-menu category-menu-off">
                                <!-- category-menuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu -->
                                <ul class="cat-menu__list">
                                    @if(isset($category) && is_object($category))
                                    @foreach($category as $category)
                                    <li><a href="{{ route('products.by.category', $category->id) }}"><i class="fal fa-smile"></i>{{ $category->name }}</a></li>
                                    @endforeach
                                    @endif
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li>
                                        <a href="{{route('home')}}">Trang Chủ</a>

                                    </li>
                                    <li>
                                        <a href="{{route('allproduct')}}">Sản phẩm</a>
                                    </li>

                                    <li>
                                        <a href="https://blog.owenbook.store/">Bài Viết</a>

                                    </li>
                                    <li><a href="{{route('contact')}}">Liên Hệ</a></li>

                                </ul>

                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3">
                        <div class="menu-contact">
                            <ul>
                                <li>
                                    <div class="menu-contact__item">
                                        <div class="menu-contact__icon">
                                            <i class="fal fa-phone"></i>
                                        </div>
                                        <div class="menu-contact__info">
                                            <a href="tel:0123456">0832 57 59 05</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="menu-contact__item">
                                        <div class="menu-contact__icon">
                                            <i class="fal fa-map-marker-alt"></i>
                                        </div>
                                        <div class="menu-contact__info">
                                            <a href="shop-location.html">Tìm cửa hàng</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div id="header-sticky" class="logo-area tp-sticky-one mainmenu-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-2 col-lg-3">
                <div class="logo">
                    <a href="{{route('home')}}"><img src="{{asset('img/owenbook.jpg')}}" width="150px" alt="
                            logo"></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="main-menu">
                    <nav>
                        <ul>
                            <li>
                                <a href="{{route('home')}}">Trang Chủ</a>

                            </li>
                            <li>
                                <a href="shop.html">Cửa hàng</a>

                            </li>
                            <li>
                                <a href="about.html">Giới Thiệu</a>

                            </li>
                            <li>
                                <a href="blog.owenbook.store">Bài Viết</a>

                            </li>
                            <li><a href="contact.html">Liên Hệ</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-xl-4 col-lg-9">
                <div class="header-meta-info d-flex align-items-center justify-content-end">
                    <div class="header-meta__social  d-flex align-items-center">

                        @if(Auth::check())
                        {{-- <p>{{ Auth::user()->name }}</p> --}}
                        <div class="main-menu mt-3">
                            <ul>
                                <li class="has-dropdown">
                                    <a href="index.html">
                                        <img src="uploads/{{ Auth::user()->img }}" alt="" width="40px" height="40px" style="border-radius: 50%">
                                    </a>
                                    <ul class="submenu">
                                        <li><a href="index.html">Xin chào : {{ Auth::user()->name }}</a></li>
                                        <li><a href="index-2.html">Thông tin tài khoản</a></li>
                                        <li><a href="index-3.html">Đổi mật khẩu</a></li>
                                        {{-- <li><a href="index-4.html">Cosmetics Home</a></li>
                                          <li><a href="index-5.html">Food Grocery</a></li> --}}
                                        <li><a href="#" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">Đăng xuất </a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        @else
                        <a href="{{route('login')}}"><i class="fal fa-user p-3"></i></a>
                        @endif

                        <button class="header-cart p-relative tp-cart-toggle">
                            <i class="fal fa-shopping-cart"></i>
                            <span class="tp-product-count">{{$count}}</span>
                        </button>
                        <a href="{{asset('favorites')}}"><i class="fal fa-heart"></i></a>
                    </div>
                    <div class="header-meta__search-5 ml-25">
                        <div class="header-search-bar-5">
                            <form action="#">
                                <form method="GET" action="{{ route('products.search') }}">
                                    <div class="search-info-5 p-relative">
                                        <button class="header-search-icon-5"><i class="fal fa-search"></i></button>

                                        <button class="header-search-icon-5" type="submit"><i class="fal fa-search"></i></button>
                                        <input type="text" name="search" placeholder="Search products...">
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- header-xl-sticky-end -->

<!-- header-md-lg-area -->
<div id="header-tab-sticky" class="tp-md-lg-header d-none d-md-block d-xl-none pt-30 pb-30">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 d-flex align-items-center">
                <div class="header-canvas flex-auto">
                    <button class="tp-menu-toggle"><i class="far fa-bars"></i></button>
                </div>
                <div class="logo">
                    <a href="{{route('home')}}"><img src="{{asset('img/owenbook.jpg')}}" width="150px" alt="logo"></a>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="header-meta-info d-flex align-items-center justify-content-between">
                    <div class="header-search-bar">

                        <form method="GET" action="{{ route('products.search') }}">
                            <div class="search-info p-relative">
                                <button class="header-search-icon"><i class="fal fa-search"></i></button>

                                <button type="submit" class="header-search-icon"><i class="fal fa-search"></i></button>
                                <input type="text" name="search" placeholder="Search products...">
                            </div>
                        </form>
                    </div>
                    <div class="header-meta__social d-flex align-items-center ml-25">
                        <button class="header-cart p-relative tp-cart-toggle">
                            <i class="fal fa-shopping-cart"></i>
                            <span>2</span>
                        </button>
                        <a href="{{route('login')}}"><i class="fal fa-user"></i></a>
                        <a href="{{asset('favorites')}}"><i class="fal fa-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="header-mob-sticky" class="tp-md-lg-header d-md-none pt-20 pb-20">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-3 d-flex align-items-center">
                <div class="header-canvas flex-auto">
                    <button class="tp-menu-toggle"><i class="far fa-bars"></i></button>
                </div>
            </div>
            <div class="col-6">
                <div class="logo text-center">
                    <a href="{{route('home')}}"><img src="{{asset('img/owenbook.jpg')}}" width="150px" alt="logo"></a>
                </div>
            </div>
            <div class="col-3">
                <div class="header-meta-info d-flex align-items-center justify-content-end ml-25">
                    <div class="header-meta m-0 d-flex align-items-center">
                        <div class="header-meta__social d-flex align-items-center">
                            <button class="header-cart p-relative tp-cart-toggle">
                                <i class="fal fa-shopping-cart"></i>
                                <span></span>
                            </button>
                            <a href="{{route('login')}}"><i class="fal fa-user"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- header-md-lg-area -->

<!-- sidebar-menu-area -->
<div class="tpsideinfo">
    <button class="tpsideinfo__close">Thoát<i class="fal fa-times ml-10"></i></button>
    <div class="tpsideinfo__search text-center pt-35">
        <span class="tpsideinfo__search-title mb-20">Bạn đang tìm cái gì ?</span>
        <form action="#">
            <input type="text" placeholder="Bạn đang tìm gì?...">
            <button><i class="fal fa-search"></i></button>
        </form>
    </div>
    <div class="tpsideinfo__nabtab">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Menu</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Danh mục</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="10">
                <div class="mobile-menu">
                    <nav id="mobile-menu">
                    </nav>

                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                <div class="tpsidebar-categories">
                    <ul>
                        @foreach($categories as $categoryc)
                        <li><a href="{{ route('products.by.category', $categoryc->id) }}">{{ $categoryc->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>

    @if(Auth::check())
    <br>
    <div class="mt-3 p-2">
        <a href="profile"><img src="uploads/{{ Auth::user()->img }}" alt="" width="40px" height="40px" style="border-radius: 50%"> </a>
        <div class="tpsideinfo__account-link text-light">
            Xin Chào :{{ Auth::user()->name }}
            <br>
            <div class="tpsideinfo__wishlist-link">
                <a href="{{asset('favorites')}}" target="_parent"><i class="fal fa-heart"></i> Yêu thích</a>
            </div>
            <br>
            <a href="#" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">Đăng xuất </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
    @else
    <div class="tpsideinfo__account-link">
        <a href="{{route('login')}}"><i class="fal fa-user"></i> Đăng Nhập / Đăng Ký</a>
    </div>
    <div class="tpsideinfo__wishlist-link">
        <a href="{{asset('favorites')}}" target="_parent"><i class="fal fa-heart"></i> Yêu thích</a>
    </div>
    @endif

</div>
<div class="body-overlay"></div>
<!-- sidebar-menu-area-end -->

<!-- header-cart-start -->
<div class="tpcartinfo tp-cart-info-area p-relative">
    <button class="tpcart__close"><i class="fal fa-times"></i></button>
    <div class="tpcart">
        <h4 class="tpcart__title">Giỏ Hàng</h4>
        <div class="tpcart__product">
            <div class="tpcart__product-list">
                <ul>
                    @foreach($cart as $item)
                    <li>
                        <div class="tpcart__item">
                            <div class="tpcart__img">
                                <img src="{{ asset('uploads/'.$item->img) }}" alt="">
                                <div class="tpcart__del">
                                    <a href="#" onclick="event.preventDefault();

                               document.getElementById('remove_{{ $item->id }}').submit();">
                                        <i class="far fa-times-circle"></i>
                                    </a>
                                    <form id="remove_{{ $item->id }}" action="{{ route('remove.cart.header') }}" method="POST" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                    </form>
                                </div>
                            </div>
                            <div class="tpcart__content">
                                <span class="tpcart__content-title"><a href="shop-details.html">{{$item->name_product}}</a>
                                </span>
                                <div class="tpcart__cart-price">
                                    <span class="quantity">{{$item->quantity}}x</span>
                                    <span class="new-price">{{$item->price}}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </>
                </ul>
            </div>
            <div class="tpcart__checkout">
                <div class="tpcart__total-price d-flex justify-content-between align-items-center">
                    <span> Tổng tiền:</span>
                    <span class="heilight-price">{{$total}}</span>
                </div>
                <div class="tpcart__checkout-btn">
                    <a class="tpcart-btn mb-10" href="{{route('cart')}}">Xem giỏ hàng</a>
                    <a class="tpcheck-btn" href="{{route('checkout')}}">Thanh Toán</a>
                </div>
            </div>
        </div>
        <div class="tpcart__free-shipping text-center">
            <span>Miễn phí vận chuyển các đơn hàng <b>dưới 10km</b></span>
        </div>
    </div>
</div>
<div class="cartbody-overlay"></div>