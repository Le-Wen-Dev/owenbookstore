@extends('layout')
@section('content')
    
   <!-- main-area-start -->
   <main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb__area pt-60 pb-60 tp-breadcrumb__bg" data-background="assets/img/banner/breadcrumb-01.jpg">
       <div class="container">
          <div class="row align-items-center">
             <div class="col-xl-7 col-lg-12 col-md-12 col-12">
                <div class="tp-breadcrumb">
                   <div class="tp-breadcrumb__link mb-10">
                      <span class="breadcrumb-item-active"><a href="index.html">Home</a></span>
                      <span>Wishlist</span>
                   </div>
                   <h2 class="tp-breadcrumb__title">Product Wishlist</h2>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- breadcrumb-area-end -->
        
    <!-- cart area -->
    <div class="cart-area pt-80 pb-80 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
       <div class="container">
       <div class="row">
          <div class="col-12">
                <form action="#">
                   <div class="table-content table-responsive">
                      <table class="table">
                            <thead>
                               <tr>
                                  <th class="product-thumbnail">Images</th>
                                  <th class="cart-product-name">Courses</th>
                                  <th class="product-price">Unit Price</th>
                                  <th class="product-add-to-cart">Add To Cart</th>
                                  <th class="product-remove">Remove</th>
                               </tr>
                            </thead>
                            <tbody>
                                @foreach($favorites as $item)
                               <tr>
                                  <td class="product-thumbnail">
                                     <a href="shop-details.html"><img src="{{ $item->img }}" alt="">
                                     </a>
                                  </td>
                                  <td class="product-name">
                                     <a href="shop-details.html">{{ $item->name_product }}</a>
                                  </td>
                                  <td class="product-price">
                                     <span class="amount">{{ $item->price }}</span>
                                  </td>
                                  <td class="product-add-to-cart">
                                     <button class="tp-btn tp-color-btn  tp-wish-cart banner-animation">Add To Cart</button>
                                  </td>
                                  <td class="product-remove">
                                     <a href="#"><i class="fa fa-times"></i></a>
                                  </td>
                               </tr>
                               @endforeach
                            </tbody>
                      </table>
                   </div>
                </form>
          </div>
       </div>
       </div>
    </div>
    <!-- cart area end-->

    </main>
    <!-- main-area-end -->
    @endsection 
