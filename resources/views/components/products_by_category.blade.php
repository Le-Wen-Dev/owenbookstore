@extends('layout')
@section('content')

    
     <!-- main-area-start -->
     <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area pt-60 pb-60 tp-breadcrumb__bg" data-background="{{asset('img/bannerphu.png')}}">
           <div class="container">
              <div class="row align-items-center">
                 <div class="col-xl-7 col-lg-12 col-md-12 col-12">
                    <div class="tp-breadcrumb">
                       <div class="tp-breadcrumb__link mb-10">
                          <span class="breadcrumb-item-active"><a href="index.html">Trang chủ</a></span>
                       </div>
                       <h2 class="tp-breadcrumb__title">Sản Phẩm trong danh mục</h2>
                    </div>
                 </div>
              </div>
           </div>
        </section>
        <!-- breadcrumb-area-end -->
  
        <!-- product-filter-area-start -->
        <div class="product-filter-area pt-65 pb-80">
           <div class="container">
              <div class="row mb-50">
                 <div class="col-lg-12">
                    <div class="tab-content" id="nav-tabContent">
                       <div class="tab-pane fade" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                       </div>
                       <div class="tab-pane fade show active" id="nav-popular" role="tabpanel" aria-labelledby="nav-popular-tab">
                          <div
                             class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 tpproduct">
                             @foreach($products as $product)
                             <div class="col">
                              <div class="tpproduct tpproductitem mb-15 p-relative">
                                 <div class="tpproduct__thumb">
                                    <div class="tpproduct__thumbitem p-relative">
                                       <a href="shop-details-2.html">
                                        <img src="{{ asset('uploads/'.$product->img) }}" alt="product-thumb">
                                          <img class="thumbitem-secondary" src="{{ asset('uploads/'.$product->img) }}"alt="product-thumb">
                                       </a>
                                       <div class="tpproduct__thumb-bg">
                                          <div class="tpproductactionbg">
                                             <a href="detail/{{$product->id}}"><i class="fal fa-eye"></i></a>
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
                                    </div>
                                 </div>
                                 <div class="tpproduct__content-area">
                                    <h3 class="tpproduct__title mb-5"><a href="shop-details.html">{{ $product->name }}</a></h3>
                                    <div class="tpproduct__priceinfo p-relative">
                                       <div class="tpproduct__ammount">
                                          <span>{{ $product->price }}</span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tpproduct__ratingarea">
                                    <div class="d-flex align-items-center justify-content-between">
                                       
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
                    </div>
                 </div>
              </div>
              <div class="row">
                 <div class="col-xxl-12">
                    <div class="basic-pagination text-center">
                       <nav>
                          <ul>
                             <li>
                                <a href="shop.html">
                                   <i class="fal fa-long-arrow-left"></i>
                                </a>
                             </li>
                             <li>
                                <a href="shop.html">01</a>
                             </li>
                             <li>
                                <span class="current">02</span>
                             </li>
                             <li>
                                <a href="shop.html">- - -</a>
                             </li>
                             <li>
                                <a href="shop.html">07</a>
                             </li>
                             <li>
                                <a href="shop.html">08</a>
                             </li>
                             <li>
                                <a href="shop.html">
                                   <i class="fal fa-long-arrow-right"></i>
                                </a>
                             </li>
                          </ul>
                        </nav>
                    </div>
                 </div>
              </div>
            </div>
        </div>
        <!-- product-filter-area-end -->
  
     </main>
     <!-- main-area-end -->
    @endsection 
