@extends('layout')
@section('content')
@php
    use Illuminate\Support\Str;
@endphp

<style>
    @media (max-width: 1024px) {
     .tp-slide-item__img img{
         background-size: cover;
         background-position: center;
         height:200px;
     }
     .tpslider-banner__img img{
       background-size: cover;
       background-position: center;
       height:200px;
       }
 }
 </style>
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
                                    <div class="tp-slide-item__img">
                                        <img src="{{asset('uploads/banner1.png')}}" alt="" height="400px" width="100%">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tp-slide-item">
                                    <div class="tp-slide-item__img">
                                        <img src="{{asset('uploads/banner2.png')}}" alt="" height="400px" width="100%">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tp-slide-item">
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
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6">
                        <div class="tpslider-banner">
                            <a href="shop-details.html">
                                <div class="tpslider-banner__img">
                                    <img src="{{asset('uploads/banner5.png')}}" alt="" width="100%" height="170px">
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

    <!-- category-area-start -->
    <section class="category-area pt-70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tpsection mb-40">
                        <h4 class="tpsection__title"> Danh mục <span> hàng đầu 
                                  </span></h4>
                    </div>
                </div>
            </div>
            <div class="custom-row category-border pb-45 justify-content-xl-between">
                @if(isset($categories) && is_object($categories))
                @foreach($categories as $categories)
                <div class="tpcategory mb-40">
                    <div class="tpcategory__icon p-relative">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="33"
                            height="50" viewBox="0 0 33 50">
                            <image id="cat-icon-01.svg" width="33" height="50"
                                xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAyCAYAAADSprJaAAAEt0lEQVRYhcWYa2jVZRzHP5tzF9c0dFZr62Kz5VZ2p1AqhWgh2M3oSkG+CHwjVBK96F12gcJ3RfUmiIggKsoiipakZaQk64YutQvq1DJrzplzWzvxjM9/PDs7O2eX89cf/DnnOef/e37f53f/PYyDFgPrgB3AMaAf6Bvj6ffpAjYDjwPzC4koyfPfbOApYBXQA3wM/Ab8O449ZwKXAa3AAWAt8PJ4ThzTXGAjkAGeBuonugFQDiwE3nOfdRNhLgPWA0eBWychPBetFcgj42V4QIZVRQKAJnpbs15Y6OUKYBuwVY0Uk5qAE8ALhfa8GvgHWFNkAAm1AVuA6vjH0qyXQjidbnilQRuARuDsfCCCvQYMxTQo5Jo5QEM+EAHlHuDvlEB0APsN35w0QzOsTwkAUSIbQbEmqjXHjhRBhNCvNZsOUwxirk9HiiACPQa8GaeAGESSRHanDCL4W4u1aRSIZl/4M2UQ2/WNC3KBuBTYCxxKGUSQ0e2hR4FoNny6UgbRCRzJBWIWcB7wKzCYMoj92ZpIPPR8v2/Pw3yWKf00oMpiN137lphpQ1d13A6sxzoUBP4X7RM6sF2WiJC0+mIQyHAVcAVwMXAYeAa40c6oWsYyn2nylShoMKv9C4B6gX1qeacF7A9lhJTQmYAIHVAN8IYbddvUfKeg3+2Qjhk93ZGATKTVSoHONimdabFqUP33afoyeQOQznCCa4APgYPAu8DP1o8DnmCgCH5Q5qnr9b1LgIfU3lI84d7IJCeLFqmNZxHAhDvhIlAw8xeh0SmNPPtkU6nmKElAZE4BCJQ7BCJ4fN0pAFCpsx4psxV/EnjQKOkvMJlNlTICWG29eq5ENK8DywzPQ4KoiEzVqw0rJmC6hKc82ue4DpmE6kvAo8mJQwK525xxu6n5fR12ur8ddR6dVkA4Cr/XxNYmgJAMb7NpanPM/EDNj6LNvpRQs4ls9QTN8BrQ7gExYYV9Xsx+MXvKmmOq3RD9dj1whvZ7RZ58Jil1cp9pOQh8X6rVPXZwpXG1zgbRoNp2Rhsu0aYrLWgDBRw3ox/Uul4iCDTF5daWv8baYJnOs9x1nRXvB38r96nM85RbxFaajbdGfcsTCr8ozyF42JO0uL7F9c35mPLQGtWeCF3henHMkj2BNZm89rm+0z6gfZIgNur9d7nend3kZoMI388FfjEcQ/d0k+qcbPP7kzNG0rcmvciIe6zYMWf4Z4cmuNZo+XwKtaXXy5Y+1z0ecoRPZI+BjdEY2GokxDljMjSoQ16pqQOIBTlcYYgWeuL7tdsm4JspAsDsGzTyquvnNXdNLk00CiJoYp7I3ykCiB6LZKvyOgQ2fEcRg2iyRT9s6xXM81kRQAT6yPaxxab5xFhjYIuh2WNofl/E4XibEbbCCaw7ds4YxAJBZFTdJzpSMSjUjG893EFDdhSIKtWzywuM0Dd8VSQAmLA2KaPWcWL4PjMBUW8tCE3NHWpkSxFBBPrUXmSpzl+XXCUmIOYZRl3m9fYUrgh+1B9u0DmrnG+HQcwXRI2hmsbl2YA97CKvBoLmz4lfCDf5oYR/7edkbvXHQ6G3CI4fhp7weU/MdJ12CgCGxrKUKJz+LbUSHLUR4H/WLynTfCxBKgAAAABJRU5ErkJggg==" />
                        </svg>
                        <span>{{ $categories->products_count }}</span>
                    </div>
                    <div class="tpcategory__content">
                        <h5 class="tpcategory__title"><a
                                href="{{ route('products.by.category', $categories->id) }}">{{ $categories->name }}</a>
                        </h5>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </div>
    </section>
    <!-- category-area-end -->

    <!-- product-area-start -->
    <section class="product-area pt-95 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="tpsection mb-40">
                        <h4 class="tpsection__title">Sản phẩm <span> Phổ biến </span></h4>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="tpnavbar">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-all-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all"
                                    aria-selected="true">Tất cả sản phẩm</button>
                                <button class="nav-link" id="nav-popular-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-popular" type="button" role="tab" aria-controls="nav-popular"
                                    aria-selected="false">Phổ biến</button>
                                <button class="nav-link" id="nav-sale-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-sale" type="button" role="tab" aria-controls="nav-sale"
                                    aria-selected="false">Đang giảm giá</button>
                                {{-- <button class="nav-link" id="nav-rate-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-rate" type="button" role="tab" aria-controls="nav-rate"
                                    aria-selected="false">Được đánh giá tốt nhất</button> --}}
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
                                data-price="{{ $pro->discounted_price }}" data-description="{{ $pro->description }}">
                                <div class="tpproduct__thumb p-relative">
                                    <a href="detail/{{$pro->id}}">
                                        <img src="{{ asset('uploads/'.$pro->img) }}" alt="product-thumb">
                                        <img class="product-thumb-secondary" src="{{ asset('uploads/'.$pro->img) }}" alt="">
                                    </a>
                                    <div class="tpproduct__thumb-action">
                                        {{-- <a class="comphare" href="#"><i class="fal fa-exchange"></i></a> --}}
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
                                                <input type="hidden" name="price" value="{{ $pro->discounted_price }}">
                                                <input type="hidden" name="description" value="{{ $pro->description }}">
                                                <button type="submit">
                                                    <i class="fal fa-heart"></i>
                                                </button>
                                            </form>
                                        </a>
                                    </div>
                                </div>
                                <div class="tpproduct__content">
                                    <h3 class="tpproduct__title"><a href="detail/{{$pro->id}}">{{ $pro->name }}</a></h3>
                                    <div class="tpproduct__priceinfo p-relative">
                                        <div class="tpproduct__priceinfo-list">
                                            <span>{{ $pro->discounted_price  }}</span>
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
                                                <input type="hidden" name="price" value="{{ $pro->discounted_price }}">
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
                <div class="mt-3 container d-flex justify-content-center align-items-center">
                    {{$products->links('pagination::bootstrap-4')}}
                </div>
                <div class="tab-pane fade" id="nav-popular" role="tabpanel" aria-labelledby="nav-popular-tab">
                    <div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
                        @if(isset($product_popular) && is_object($product_popular))
                        @foreach($product_popular as $pro)
                        <div class="col">
                            <div class="tpproduct pb-15 mb-30">
                                <div class="tpproduct__thumb p-relative">
                                    <span class="tpproduct__thumb-volt"><i class="fas fa-bolt"></i></span>
                                    <a href="detail/{{$pro->id}}">
                                        <img src="{{ asset('uploads/'.$pro->img) }}" alt="product-thumb">
                                        <img class="product-thumb-secondary"
                                        src="{{ asset('uploads/'.$pro->img) }}" alt="">
                                    </a>
                                    <div class="tpproduct__thumb-action">
                                        {{-- <a class="comphare" href="#"><i class="fal fa-exchange"></i></a> --}}
                                        <a class="quckview" href="detail/{{$pro->id}}">><i class="fal fa-eye"></i></a>
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
                                                <input type="hidden" name="price" value="{{ $pro->discounted_price }}">
                                                <input type="hidden" name="description" value="{{ $pro->description }}">
                                                <button type="submit">
                                                    <i class="fal fa-heart"></i>
                                                </button>
                                            </form>
                                        </a>
                                    </div>
                                </div>
                                <div class="tpproduct__content">
                                    <h3 class="tpproduct__title"><a href="detail/{{$pro->id}}">{{ $pro->name }}</a></h3>
                                    <div class="tpproduct__priceinfo p-relative">
                                        <div class="tpproduct__priceinfo-list">
                                            <span>{{ $pro->discounted_price  }}</span>
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
                                                <input type="hidden" name="price" value="{{ $pro->discounted_price }}">
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
                <div class="tab-pane fade" id="nav-sale" role="tabpanel" aria-labelledby="nav-sale-tab">
                    <div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
                        @foreach ($saleProducts as $product)
                        <div class="col">
                            <div class="tpproduct pb-15 mb-30">
                                <div class="tpproduct__thumb p-relative">
                                    <span class="tpproduct__thumb-topsall">Giảm  {{ $product->sale }}%</span>
                                    <a href="detail/{{$product->id}}">
                                        <img src="{{ asset('uploads/'.$product->img) }}" alt="product-thumb">
                                        <img class="product-thumb-secondary"
                                        src="{{ asset('uploads/'.$product->img) }}" alt="">
                                    </a>
                                    <div class="tpproduct__thumb-action">
                                        <a class="comphare" href="#"><i class="fal fa-exchange"></i></a>
                                        <a class="quckview" href="detail/{{$product->id}}"><i
                                                class="fal fa-eye"></i></a>
                                                <a class="wishlist" href="">
                                                    <form action="/addToFavorites" method="POST">
                                                        @csrf
                                                        @if(Session::has('users'))
                                                        @php
                                                        $users = Session::get('users');
                                                        @endphp
                                                        <input type="hidden" name="id_user" value="{{ $users->id }}">
                                                        @endif
                                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                                        <input type="hidden" name="name" value="{{ $product->name }}">
                                                        <input type="hidden" name="img" value="{{ $product->img }}">
                                                        <input type="hidden" name="price" value="{{$product->discounted_price }}">
                                                        <input type="hidden" name="description" value="{{ $product->description }}">
                                                        <button type="submit">
                                                            <i class="fal fa-heart"></i>
                                                        </button>
                                                    </form>
                                                </a>
                                    </div>
                                </div>
                                <div class="tpproduct__content">
                                    <h3 class="tpproduct__title"><a href="detail/{{$product->id}}">{{ $product->name }}</a>
                                    </h3>
                                    <div class="tpproduct__priceinfo p-relative">
                                        <div class="tpproduct__priceinfo-list">
                                            <span>{{ $product->discounted_price }}</span>
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
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <input type="hidden" name="name" value="{{ $product->name }}">
                                                <input type="hidden" name="img" value="{{ $product->img }}">
                                                <input type="hidden" name="price" value="{{ $product->discounted_price }}">
                                                <input type="hidden" name="description" value="{{ $product->description }}">
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
                    
                    </div>
                </div>
            
                <div class="tab-pane fade" id="nav-rate" role="tabpanel" aria-labelledby="nav-rate-tab">
                    <div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- phụ kiện kèm --}}
    <section class="dealproduct-area pb-95">
        <div class="container">
            <div class="theme-bg pt-40 pb-40">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="tpdealproduct">
                            <div class="tpdealproduct__thumb p-relative text-center">
                                <img src="{{ asset('uploads/'.$bannersale->img) }}" alt="dealproduct-thumb" width="430px" height="410px">
                                <div class="tpdealproductd__offer">
                                    <h5 class="tpdealproduct__offer-price"><span>Giảm</span>{{$bannersale->sale}}%</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="tpdealcontact pt-30">
                            <div class="tpdealcontact__price mb-5">
                                @php
                                $originalPrice = $bannersale->price;
                                $discountPercentage = 10; // Fixed 10% discount
                                $discountAmount = ($discountPercentage / 100) * $originalPrice;
                                $discountedPrice = $originalPrice - $discountAmount;
                            @endphp
                         <div class="tpdealcontact__price mb-5">
                            <del>Giá gốc: {{ number_format($originalPrice, 0, ',', '.') }} VNĐ</del><br>
                            <span>Giảm còn: {{ number_format($discountedPrice, 0, ',', '.') }} VNĐ</span><br>
                        </div>
                        
                            </div>
                            
                            <div class="tpdealcontact__text mb-30">
                                <h4 class="tpdealcontact__title mb-10"><a href="shop-details.html">{{$bannersale->name}}</a></h4>
                                <p>{{ Str::limit($bannersale->description, 250, '...') }}</p>
                            </div>
                            <div class="tpdealcontact__progress mb-30">
                                <div class="progress">
                                    <div class="progress-bar w-75" role="progressbar" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="tpdealcontact__count">
                                <a href="detail/{{$bannersale->id}}" class="btn tpcheck-btn">Xem ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container mb-5 ">
        <div class="row">
            <div class="col-md-12">
                <div class="tpsectionarea text-center mb-35">
                    <h5 class="tpsectionarea__subtitle">Bài viết chia sẽ kinh nghiệm</h5>
                    <h4 class="tpsectionarea__title"><i class="fab fa-instagram">Owen Blog</i></h4>
                </div>
            </div>
        </div>
        <div class="row mb-5">
         
  
        @foreach($apiProducts as $item)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card shadow-lg">
                    <img src="https://blog.owenbook.store/{{ $item['image'] }}"class="card-img-top" height="250px">
                    <div class="card-body">
                      <h5 class="card-title">{{ $item['title'] }}</h5>
                      <p class="card-text text-body-secondary"> {{ Str::limit($item['meta_description'], 50, '...') }}</p>
                      <a href="https://blog.owenbook.store" class="btn tpcheck-btn">Đọc thêm</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>

    </div>
    <!-- shop-area-end -->

</main>




@endsection