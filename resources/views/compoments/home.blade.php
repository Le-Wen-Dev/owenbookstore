{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang chủ</title>
  <!-- Link CSS của Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Sách giả </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/favorites">Yêu thích</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/cart">Giỏ hàng</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Dăng nhập</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}">Đăng kí</a>
          </li>
        </ul>
        
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    <h1 class="text-center mb-4">Danh sách sản phẩm</h1>
    <div class="row">
      <!-- Sản phẩm 1 -->
      @if(isset($products) && is_object($products))
                @foreach($products as $pro)
      <div class="col-md-3 mb-4">
        <div class="card">
          <img src="{{$pro->img}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$pro->title}}</h5>
            <p class="card-text">{{$pro->description}}</p>
            <form class="prod-add" action="/addtocart" method="POST">
              @csrf
              @if(Session::has('user'))
              @php
              $user = Session::get('user');
              @endphp
              <input type="hidden" name="id_user" value="{{ $user->id }}">
              @endif
              <input type="hidden" name="id" value="{{ $pro->id }}">
              <input type="hidden" name="name" value="{{ $pro->name }}">
              <input type="hidden" name="img" value="{{ $pro->img }}">
              <input type="hidden" name="price" value="{{ $pro->price }}">
              <input type="hidden" name="description" value="{{$pro->description}}">
              <button type="submit" class="btn bg-danger">
                  <i class="fa-solid fa-cart-shopping" style="color:white"></i>
                  Thêm Vào Giỏ Hàng
              </button>
          </form>
          <hr>
          <form class="prod-add" action="/addToFavorites" method="POST">
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
            <button type="submit" class="btn bg-danger">
                <i class="fa-solid fa-cart-shopping" style="color:white"></i>
                thêm vào yêu thích
            </button>
        </form>
          </div>
        </div>  
      </div> 
      @endforeach
      @endif    
    </div>
  </div>

  <!-- Script của Bootstrap 5 (để hoạt động các component Javascript của Bootstrap) -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html> --}}
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
                                <a class="tp-slide-item__slide-btn tp-btn" href="shop.html">Shop Now <i class="fal fa-long-arrow-right"></i></a>
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
                                <img src="{{asset('uploads/banner2.png')}}" alt=""  height="400px" width="100%">
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
                              <img src="{{asset('uploads/banner3.png')}}" alt=""  height="400px" width="100%">
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
                             <img src="{{asset('uploads/banner4.png')}}" alt="" >
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

  <!-- category-area-start -->
  <section class="category-area pt-70">
     <div class="container">
        <div class="row">
           <div class="col-md-12">
              <div class="tpsection mb-40">
                 <h4 class="tpsection__title">Top <span> Categories <img src="assets/img/icon/title-shape-01.jpg" alt=""></span></h4>
              </div>
           </div>
        </div>
        <div class="custom-row category-border pb-45 justify-content-xl-between">
         @if(isset($categories) && is_object($categories))
         @foreach($categories as $categories)
           <div class="tpcategory mb-40">
              <div class="tpcategory__icon p-relative">
                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="33" height="50" viewBox="0 0 33 50">
                 <image id="cat-icon-01.svg" width="33" height="50" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAyCAYAAADSprJaAAAEt0lEQVRYhcWYa2jVZRzHP5tzF9c0dFZr62Kz5VZ2p1AqhWgh2M3oSkG+CHwjVBK96F12gcJ3RfUmiIggKsoiipakZaQk64YutQvq1DJrzplzWzvxjM9/PDs7O2eX89cf/DnnOef/e37f53f/PYyDFgPrgB3AMaAf6Bvj6ffpAjYDjwPzC4koyfPfbOApYBXQA3wM/Ab8O449ZwKXAa3AAWAt8PJ4ThzTXGAjkAGeBuonugFQDiwE3nOfdRNhLgPWA0eBWychPBetFcgj42V4QIZVRQKAJnpbs15Y6OUKYBuwVY0Uk5qAE8ALhfa8GvgHWFNkAAm1AVuA6vjH0qyXQjidbnilQRuARuDsfCCCvQYMxTQo5Jo5QEM+EAHlHuDvlEB0APsN35w0QzOsTwkAUSIbQbEmqjXHjhRBhNCvNZsOUwxirk9HiiACPQa8GaeAGESSRHanDCL4W4u1aRSIZl/4M2UQ2/WNC3KBuBTYCxxKGUSQ0e2hR4FoNny6UgbRCRzJBWIWcB7wKzCYMoj92ZpIPPR8v2/Pw3yWKf00oMpiN137lphpQ1d13A6sxzoUBP4X7RM6sF2WiJC0+mIQyHAVcAVwMXAYeAa40c6oWsYyn2nylShoMKv9C4B6gX1qeacF7A9lhJTQmYAIHVAN8IYbddvUfKeg3+2Qjhk93ZGATKTVSoHONimdabFqUP33afoyeQOQznCCa4APgYPAu8DP1o8DnmCgCH5Q5qnr9b1LgIfU3lI84d7IJCeLFqmNZxHAhDvhIlAw8xeh0SmNPPtkU6nmKElAZE4BCJQ7BCJ4fN0pAFCpsx4psxV/EnjQKOkvMJlNlTICWG29eq5ENK8DywzPQ4KoiEzVqw0rJmC6hKc82ue4DpmE6kvAo8mJQwK525xxu6n5fR12ur8ddR6dVkA4Cr/XxNYmgJAMb7NpanPM/EDNj6LNvpRQs4ls9QTN8BrQ7gExYYV9Xsx+MXvKmmOq3RD9dj1whvZ7RZ58Jil1cp9pOQh8X6rVPXZwpXG1zgbRoNp2Rhsu0aYrLWgDBRw3ox/Uul4iCDTF5daWv8baYJnOs9x1nRXvB38r96nM85RbxFaajbdGfcsTCr8ozyF42JO0uL7F9c35mPLQGtWeCF3henHMkj2BNZm89rm+0z6gfZIgNur9d7nend3kZoMI388FfjEcQ/d0k+qcbPP7kzNG0rcmvciIe6zYMWf4Z4cmuNZo+XwKtaXXy5Y+1z0ecoRPZI+BjdEY2GokxDljMjSoQ16pqQOIBTlcYYgWeuL7tdsm4JspAsDsGzTyquvnNXdNLk00CiJoYp7I3ykCiB6LZKvyOgQ2fEcRg2iyRT9s6xXM81kRQAT6yPaxxab5xFhjYIuh2WNofl/E4XibEbbCCaw7ds4YxAJBZFTdJzpSMSjUjG893EFDdhSIKtWzywuM0Dd8VSQAmLA2KaPWcWL4PjMBUW8tCE3NHWpkSxFBBPrUXmSpzl+XXCUmIOYZRl3m9fYUrgh+1B9u0DmrnG+HQcwXRI2hmsbl2YA97CKvBoLmz4lfCDf5oYR/7edkbvXHQ6G3CI4fhp7weU/MdJ12CgCGxrKUKJz+LbUSHLUR4H/WLynTfCxBKgAAAABJRU5ErkJggg=="/>
                 </svg>
                 <span>{{ $categories->products_count }}</span>
              </div>
              <div class="tpcategory__content">
                 <h5 class="tpcategory__title"><a href="{{ route('products.by.category', $categories->id) }}">{{ $categories->name }}</a></h5>
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
               <h4 class="tpsection__title">Popular <span> Products <img src="assets/img/icon/title-shape-01.jpg" alt=""></span></h4>
            </div>
         </div>
         <div class="col-md-6 col-12">
            <div class="tpnavbar">
               <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all" aria-selected="true">All</button>
                    <button class="nav-link" id="nav-popular-tab" data-bs-toggle="tab" data-bs-target="#nav-popular" type="button" role="tab" aria-controls="nav-popular" aria-selected="false">Popular</button>
                    <button class="nav-link" id="nav-sale-tab" data-bs-toggle="tab" data-bs-target="#nav-sale" type="button" role="tab" aria-controls="nav-sale" aria-selected="false">On Sale</button>
                    <button class="nav-link" id="nav-rate-tab" data-bs-toggle="tab" data-bs-target="#nav-rate" type="button" role="tab" aria-controls="nav-rate" aria-selected="false">Best Rated</button>
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
              <div class="tpproduct pb-15 mb-30" data-name="{{ $pro->name }}" data-img="{{ $pro->img }}" data-price="{{ $pro->price }}" data-description="{{ $pro->description }}">
                 <div class="tpproduct__thumb p-relative">
                     <a href="shop-details-2.html">
                         <img src="{{ asset('$pro->img') }}" alt="product-thumb">
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
                         <img class="product-thumb-secondary" src="assets/img/product/home-one/product-12.jpg" alt="">
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
                         <img class="product-thumb-secondary" src="assets/img/product/home-one/product-8.jpg" alt="">
                      </a>
                      <div class="tpproduct__thumb-action">
                         <a class="comphare" href="#"><i class="fal fa-exchange"></i></a>
                         <a class="quckview" href="detail/{{$product->id}}"><i class="fal fa-eye"></i></a>
                         <a class="wishlist" href="wishlist.html"><i class="fal fa-heart"></i></a>
                      </div>
                   </div>
                   <div class="tpproduct__content">
                      <h3 class="tpproduct__title"><a href="shop-details-2.html">{{ $product->name }}</a></h3>
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
             {{-- <div class="col">
                <div class="tpproduct pb-15 mb-30">
                   <div class="tpproduct__thumb p-relative">
                      <a href="shop-details-2.html"><img src="assets/img/product/home-one/product-5.jpg" alt="product-thumb"></a>
                      <a class="product-thumb-secondary" href="shop-details.html"><img src="assets/img/product/home-one/product-6.jpg" alt=""></a>
                      <div class="tpproduct__thumb-action">
                         <a class="comphare" href="#"><i class="fal fa-exchange"></i></a>
                         <a class="quckview" href="#"><i class="fal fa-eye"></i></a>
                         <a class="wishlist" href="wishlist.html"><i class="fal fa-heart"></i></a>
                      </div>
                   </div>
                   <div class="tpproduct__content">
                      <h3 class="tpproduct__title"><a href="shop-details.html">Pinkol Enormous Granite Bottle</a></h3>
                      <div class="tpproduct__priceinfo p-relative">
                         <div class="tpproduct__priceinfo-list">
                            <span>$31.00</span>
                         </div>
                         <div class="tpproduct__cart">
                            <a href="cart.html"><i class="fal fa-shopping-cart"></i>Add To Cart</a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col">
                <div class="tpproduct pb-15 mb-30">
                   <div class="tpproduct__thumb p-relative">
                      <a href="shop-details-2.html">
                         <img src="assets/img/product/home-one/product-1.jpg" alt="product-thumb">
                      </a>
                      <a class="product-thumb-secondary" href="shop-details-2.html"><img src="assets/img/product/home-one/product-2.jpg" alt=""></a>
                      
                      <div class="tpproduct__thumb-action">
                         <a class="comphare" href="#"><i class="fal fa-exchange"></i></a>
                         <a class="quckview" href="#"><i class="fal fa-eye"></i></a>
                         <a class="wishlist" href="wishlist.html"><i class="fal fa-heart"></i></a>
                      </div>
                   </div>
                   <div class="tpproduct__content">
                      <h3 class="tpproduct__title"><a href="shop-details.html">Miko Wooden Bluetooth Speaker</a></h3>
                      <div class="tpproduct__priceinfo p-relative">
                         <div class="tpproduct__priceinfo-list">
                            <span>$31.00</span>
                         </div>
                         <div class="tpproduct__cart">
                            <a href="cart.html"><i class="fal fa-shopping-cart"></i>Add To Cart</a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col">
                <div class="tpproduct pb-15 mb-30">
                   <div class="tpproduct__thumb p-relative">
                      <a href="shop-details.html">
                         <img src="assets/img/product/home-one/product-3.jpg" alt="product-thumb">
                      </a>
                      <a class="product-thumb-secondary" href="shop-details-2.html"><img src="assets/img/product/home-one/product-4.jpg" alt=""></a>
                      
                      <div class="tpproduct__thumb-action">
                         <a class="comphare" href="#"><i class="fal fa-exchange"></i></a>
                         <a class="quckview" href="#"><i class="fal fa-eye"></i></a>
                         <a class="wishlist" href="wishlist.html"><i class="fal fa-heart"></i></a>
                      </div>
                   </div>
                   <div class="tpproduct__content">
                      <h3 class="tpproduct__title"><a href="shop-details-2.html">Gorgeous Wooden Gloves</a></h3>
                      <div class="tpproduct__priceinfo p-relative">
                         <div class="tpproduct__priceinfo-list">
                            <span>$31.00</span>
                         </div>
                         <div class="tpproduct__cart">
                            <a href="cart.html"><i class="fal fa-shopping-cart"></i>Add To Cart</a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col">
                <div class="tpproduct pb-15 mb-30">
                   <div class="tpproduct__thumb p-relative">
                      <a href="shop-details-2.html"><img src="assets/img/product/home-one/product-19.jpg" alt="product-thumb"></a>
                      <a class="product-thumb-secondary" href="#"><img src="assets/img/product/home-one/product-20.jpg" alt=""></a>
                      
                      <div class="tpproduct__thumb-action">
                         <a class="comphare" href="#"><i class="fal fa-exchange"></i></a>
                         <a class="quckview" href="#"><i class="fal fa-eye"></i></a>
                         <a class="wishlist" href="wishlist.html"><i class="fal fa-heart"></i></a>
                      </div>
                   </div>
                   <div class="tpproduct__content">
                      <h3 class="tpproduct__title"><a href="shop-details.html">Weddonix Mediocre Silk Hat</a></h3>
                      <div class="tpproduct__priceinfo p-relative">
                         <div class="tpproduct__priceinfo-list">
                            <span>$31.00</span>
                            <span class="tpproduct__priceinfo-list-oldprice">$39.00</span>
                         </div>
                         <div class="tpproduct__cart">
                            <a href="cart.html"><i class="fal fa-shopping-cart"></i>Add To Cart</a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col">
                <div class="tpproduct pb-15 mb-30">
                   <div class="tpproduct__thumb p-relative">
                      <span class="tpproduct__thumb-topsall">On Sale</span>
                      <a href="shop-details.html">
                         <img src="assets/img/product/home-one/product-7.jpg" alt="product-thumb">
                      </a>
                      <a class="product-thumb-secondary" href="shop-details-2.html"><img src="assets/img/product/home-one/product-8.jpg" alt=""></a>
                      
                      <div class="tpproduct__thumb-action">
                         <a class="comphare" href="#"><i class="fal fa-exchange"></i></a>
                         <a class="quckview" href="#"><i class="fal fa-eye"></i></a>
                         <a class="wishlist" href="wishlist.html"><i class="fal fa-heart"></i></a>
                      </div>
                   </div>
                   <div class="tpproduct__content">
                      <h3 class="tpproduct__title"><a href="shop-details-2.html">Gorgeous Aluminum Table</a></h3>
                      <div class="tpproduct__priceinfo p-relative">
                         <div class="tpproduct__priceinfo-list">
                            <span>$31.00</span>
                         </div>
                         <div class="tpproduct__cart">
                            <a href="cart.html"><i class="fal fa-shopping-cart"></i>Add To Cart</a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col">
                <div class="tpproduct pb-15 mb-30">
                   <div class="tpproduct__thumb p-relative">
                      <a href="shop-details-2.html"><img src="assets/img/product/home-one/product-9.jpg" alt="product-thumb"></a>
                      <a class="product-thumb-secondary" href="shop-details-2.html"><img src="assets/img/product/home-one/product-10.jpg" alt=""></a>
                      <div class="tpproduct__thumb-action">
                         <a class="comphare" href="#"><i class="fal fa-exchange"></i></a>
                         <a class="quckview" href="#"><i class="fal fa-eye"></i></a>
                         <a class="wishlist" href="wishlist.html"><i class="fal fa-heart"></i></a>
                      </div>
                   </div>
                   <div class="tpproduct__content">
                      <h3 class="tpproduct__title"><a href="shop-details.html">Evo Lightweight Granite Shirt</a></h3>
                      <div class="tpproduct__priceinfo p-relative">
                         <div class="tpproduct__priceinfo-list">
                            <span>$31.00</span>
                            <span class="tpproduct__priceinfo-list-oldprice">$39.00</span>
                         </div>
                         <div class="tpproduct__cart">
                            <a href="cart.html"><i class="fal fa-shopping-cart"></i>Add To Cart</a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col">
                <div class="tpproduct pb-15 mb-30">
                   <div class="tpproduct__thumb p-relative">
                      <a href="shop-details-2.html"><img src="assets/img/product/home-one/product-15.jpg" alt="product-thumb"></a>
                      <a class="product-thumb-secondary" href="shop-details-2.html"><img src="assets/img/product/home-one/product-16.jpg" alt=""></a>
                      
                      
                      <div class="tpproduct__thumb-action">
                         <a class="comphare" href="#"><i class="fal fa-exchange"></i></a>
                         <a class="quckview" href="#"><i class="fal fa-eye"></i></a>
                         <a class="wishlist" href="wishlist.html"><i class="fal fa-heart"></i></a>
                      </div>
                      <div class="tpproduct__variation">
                         <a class="tpproduct__variationitem" href="#">
                            <div class="tpproduct__termshape">
                               <span class="tpproduct__termshape-bg"></span>
                               <span class="tpproduct__termshape-border"></span>
                            </div>
                         </a>
                         <a class="tpproduct__variationitem" href="#">
                            <div class="tpproduct__termshape">
                               <span class="tpproduct__termshape-bg red-product-bg"></span>
                               <span class="tpproduct__termshape-border red-product-border"></span>
                            </div>
                         </a>
                         <a class="tpproduct__variationitem" href="#">
                            <div class="tpproduct__termshape">
                               <span class="tpproduct__termshape-bg yellow-product-bg"></span>
                               <span class="tpproduct__termshape-border yellow-product-border"></span>
                            </div>
                         </a>
                         <a class="tpproduct__variationitem" href="#">
                            <div class="tpproduct__termshape">
                               <span class="tpproduct__termshape-bg green-product-bg"></span>
                               <span class="tpproduct__termshape-border green-product-border"></span>
                            </div>
                         </a>
                      </div>
                   </div>
                   <div class="tpproduct__content">
                      <h3 class="tpproduct__title"><a href="shop-details.html">Purab Enormous Miranda Bottle</a></h3>
                      <div class="tpproduct__priceinfo p-relative">
                         <div class="tpproduct__priceinfo-list">
                            <span>$31.00</span>
                         </div>
                         <div class="tpproduct__cart">
                            <a href="cart.html"><i class="fal fa-shopping-cart"></i>Add To Cart</a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col">
                <div class="tpproduct pb-15 mb-30">
                   <div class="tpproduct__thumb p-relative">
                      <a href="shop-details-2.html"><img src="assets/img/product/home-one/product-17.jpg" alt="product-thumb"></a>
                      <a class="product-thumb-secondary" href="shop-details-2.html"><img src="assets/img/product/home-one/product-18.jpg" alt=""></a>
                      
                      <div class="tpproduct__thumb-action">
                         <a class="comphare" href="#"><i class="fal fa-exchange"></i></a>
                         <a class="quckview" href="#"><i class="fal fa-eye"></i></a>
                         <a class="wishlist" href="wishlist.html"><i class="fal fa-heart"></i></a>
                      </div>
                   </div>
                   <div class="tpproduct__content">
                      <h3 class="tpproduct__title"><a href="shop-details-2.html">Miklonda Co. Crafted Candles</a></h3>
                      <div class="tpproduct__priceinfo p-relative">
                         <div class="tpproduct__priceinfo-list">
                            <span>$31.00</span>
                            <span class="tpproduct__priceinfo-list-oldprice">$39.00</span>
                         </div>
                         <div class="tpproduct__cart">
                            <a href="cart.html"><i class="fal fa-shopping-cart"></i>Add To Cart</a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col">
                <div class="tpproduct pb-15 mb-30">
                   <div class="tpproduct__thumb p-relative">
                      <span class="tpproduct__thumb-volt"><i class="fas fa-bolt"></i></span>
                      <a href="shop-details-2.html"><img src="assets/img/product/home-one/product-11.jpg" alt="product-thumb"></a>
                      <a class="product-thumb-secondary" href="shop-details-2.html"><img src="assets/img/product/home-one/product-12.jpg" alt=""></a>
                      <div class="tpproduct__thumb-action">
                         <a class="comphare" href="#"><i class="fal fa-exchange"></i></a>
                         <a class="quckview" href="#"><i class="fal fa-eye"></i></a>
                         <a class="wishlist" href="wishlist.html"><i class="fal fa-heart"></i></a>
                      </div>
                   </div>
                   <div class="tpproduct__content">
                      <h3 class="tpproduct__title"><a href="shop-details.html">CLCo. Incredible Paper Car</a></h3>
                      <div class="tpproduct__priceinfo p-relative">
                         <div class="tpproduct__priceinfo-list">
                            <span>$31.00</span>
                         </div>
                         <div class="tpproduct__cart">
                            <a href="cart.html"><i class="fal fa-shopping-cart"></i>Add To Cart</a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col">
                <div class="tpproduct pb-15 mb-30">
                   <div class="tpproduct__thumb p-relative">
                      <a href="shop-details-2.html"><img src="assets/img/product/home-one/product-13.jpg" alt="product-thumb"></a>
                      <a class="product-thumb-secondary" href="shop-details-2.html"><img src="assets/img/product/home-one/product-14.jpg" alt=""></a>
                      <div class="tpproduct__thumb-action">
                         <a class="comphare" href="#"><i class="fal fa-exchange"></i></a>
                         <a class="quckview" href="#"><i class="fal fa-eye"></i></a>
                         <a class="wishlist" href="wishlist.html"><i class="fal fa-heart"></i></a>
                      </div>
                   </div>
                   <div class="tpproduct__content">
                      <h3 class="tpproduct__title"><a href="shop-details-2.html">Progash Durable Granite Hat</a></h3>
                      <div class="tpproduct__priceinfo p-relative">
                         <div class="tpproduct__priceinfo-list">
                            <span>$31.00</span>
                         </div>
                         <div class="tpproduct__cart">
                            <a href="cart.html"><i class="fal fa-shopping-cart"></i>Add To Cart</a>
                         </div>
                      </div>
                   </div>
                </div>
             </div> --}}
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
                       <h4 class="tpdealcontact__title mb-10"><a href="shop-details.html">Pro2 Abstract Folded Pots</a></h4>
                       <p>Elegant pink origami design three-dimensional view and decoration co-exist. Great for adding a decorative touch to any room’s decor. Wonderful accent piece for coffee tables or side tables.</p>
                    </div>
                    <div class="tpdealcontact__progress mb-30">
                       <div class="progress">
                          <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
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