@extends('layout')
@section('content')

    
   <!-- main-area-start -->
   <main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb__area pt-60 pb-60 tp-breadcrumb__bg" >
      {{-- data-background="assets/img/banner/breadcrumb-01.jpg" --}}
       <div class="container">
          <div class="row align-items-center">
             <div class="col-xl-7 col-lg-12 col-md-12 col-12">
                <div class="tp-breadcrumb">
                   <div class="tp-breadcrumb__link mb-10">
                      <span class="breadcrumb-item-active"><a href="index.html">Trang chủ</a></span>
                      <span>Yêu thích</span>
                   </div>
                   <h3 class="tp-breadcrumb__title">Sản phẩm yêu thích</h3>
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
                                  <th class="product-thumbnail">Ảnh</th>
                                  <th class="cart-product-name">Tên sản phẩm</th>
                                  <th class="product-price">Giá</th>
                                  <th class="product-add-to-cart">Thêm</th>
                                  <th class="product-remove">Hành động</th>
                               </tr>
                            </thead>
                            <tbody>
                              @php
                              $totalPrice = 0;
                              $user = Session::get('user');
                              @endphp
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
                                     <button class="tp-btn tp-color-btn  tp-wish-cart banner-animation">Thêm vào sản phẩm</button>
                                  </td>
                                  <td class="product-remove">
                                    <form action="{{asset('removefavorites')}}" method="POST">
                                       @csrf
                                       @if(Session::has('user'))
                                       <input type="hidden" name="id_user" value="{{ $user->id }}">
                                       <input type="hidden" name="id" value="{{ $item->id }}">
                                       <button type="submit" class="btn btn-light">
                                         <i class="fa fa-times"></i>
                                       </button>
                                       @endif
                                   </form>
                                     
                                  </td>
                               </tr>
                               @endforeach
                            </tbody>
                      </table>
                   </div>
                </form>
                <div class="p-2 mb-3">
                  <form action="{{ route('remove.all.favorites') }}" method="POST">
                      @csrf
                      @if(Session::has('user'))
                      <input type="hidden" name="id_user" value="{{ $user->id }}">
                      <button type="submit" class="btn btn-danger">
                          Xóa tất cả sản phẩm
                      </button>
                      @endif
                  </form>
              </div>
          </div>
       </div>
       </div>
    </div>
    <!-- cart area end-->

    </main>
    <!-- main-area-end -->
    @endsection 
