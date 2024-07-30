@extends('layout')
@section('content')
@include('compoments.header1')
    
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
                          <span>Shop</span>
                       </div>
                       <h2 class="tp-breadcrumb__title">Shop Grid</h2>
                    </div>
                 </div>
              </div>
           </div>
        </section>
        <!-- breadcrumb-area-end -->
  
        <!-- product-filter-area-start -->
        <div class="product-filter-area pt-65 pb-80">
           <div class="container">
              <div class="product-filter-content mb-40">
                 <div class="row align-items-center">
                    <div class="col-sm-6">
                       <div class="product-item-count">
                          <span><b>112</b> Item On List</span>
                       </div>
                    </div>
                    <div class="col-sm-6">
                       <div class="product-navtabs d-flex justify-content-end align-items-center">
                          <div class="tp-shop-selector">
                             <select>
                                <option>Show 12</option>
                                <option>Show 14</option>
                                <option>Show 08</option>
                                <option>Show 20</option>
                             </select>
                          </div>
                          <div class="tpproductnav tpnavbar product-filter-nav">
                             <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                   <button class="nav-link" id="nav-all-tab" data-bs-toggle="tab"
                                      data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all"
                                      aria-selected="true"><i class="fal fa-list-ul"></i></button>
     
                                   <button class="nav-link active" id="nav-popular-tab" data-bs-toggle="tab" data-bs-target="#nav-popular" type="button" role="tab" aria-controls="nav-popular"
                                      aria-selected="false"><i class="fal fa-th"></i></button>
                                </div>
                             </nav>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="row mb-50">
                 <div class="col-lg-12">
                    <div class="tab-content" id="nav-tabContent">
                       <div class="tab-pane fade" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                       
                          
                        

                       </div>
                       <div class="tab-pane fade show active" id="nav-popular" role="tabpanel" aria-labelledby="nav-popular-tab">
                          <div
                             class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 tpproduct">
                             @if (count($results) > 0)
                             @foreach ($results as $re)
                             <div class="col">
                                <div class="tpproduct tpproductitem mb-15 p-relative">
                                   <div class="tpproduct__thumb">
                                      <div class="tpproduct__thumbitem p-relative">
                                         <a href="shop-details-2.html">
                                            <img src="assets/img/product/home-two/product-31.jpg" alt="product-thumb">
                                            <img class="thumbitem-secondary" src="assets/img/product/home-two/product-32.jpg" alt="product-thumb">
                                         </a>
                                         <div class="tpproduct__thumb-bg">
                                            <div class="tpproductactionbg">
                                               <a href="cart.html"><i class="fal fa-shopping-basket"></i></a>
                                               <a href="#"><i class="fal fa-exchange"></i></a>
                                               <a href="detail/{{$re->id}}"><i class="fal fa-eye"></i></a>
                                               <a href="wishlist.html"><i class="fal fa-heart"></i></a>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                   <div class="tpproduct__content-area">
                                      <h3 class="tpproduct__title mb-5"><a href="shop-details.html">{{ $re->name }}</a></h3>
                                      <div class="tpproduct__priceinfo p-relative">
                                         <div class="tpproduct__ammount">
                                            <span>{{ $re->price }}</span>
                                         </div>
                                      </div>
                                   </div>
                                   <div class="tpproduct__ratingarea">
                                      <div class="d-flex align-items-center justify-content-between">
                                         <div class="tpproductdot">
                                            <a class="tpproductdot__variationitem" href="shop-details.html">
                                               <div class="tpproductdot__termshape">
                                                  <span class="tpproductdot__termshape-bg"></span>
                                                  <span class="tpproductdot__termshape-border"></span>
                                               </div>
                                            </a>
                                            <a class="tpproductdot__variationitem" href="shop-details.html">
                                               <div class="tpproductdot__termshape">
                                                  <span class="tpproductdot__termshape-bg red-product-bg"></span>
                                                  <span class="tpproductdot__termshape-border red-product-border"></span>
                                               </div>
                                            </a>
                                            <a class="tpproductdot__variationitem" href="shop-details.html">
                                               <div class="tpproductdot__termshape">
                                                  <span class="tpproductdot__termshape-bg orange-product-bg"></span>
                                                  <span class="tpproductdot__termshape-border orange-product-border"></span>
                                               </div>
                                            </a>
                                            <a class="tpproductdot__variationitem" href="shop-details.html">
                                               <div class="tpproductdot__termshape">
                                                  <span class="tpproductdot__termshape-bg purple-product-bg"></span>
                                                  <span class="tpproductdot__termshape-border purple-product-border"></span>
                                               </div>
                                            </a>
                                         </div>
                                         <div class="tpproduct__rating">
                                            <ul>
                                               <li>
                                                  <a href="#"><i class="fas fa-star"></i></a>
                                                  <a href="#"><i class="fas fa-star"></i></a>
                                                  <a href="#"><i class="fas fa-star"></i></a>
                                                  <a href="#"><i class="fas fa-star"></i></a>
                                                  <a href="#"><i class="far fa-star"></i></a>
                                               </li>
                                               <li>
                                                  <span>(81)</span>
                                               </li>
                                            </ul>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             @endforeach

        @else
    <p>Không có kết quả nào được tìm thấy.</p>
        @endif
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="row">
                 <div class="col-xxl-12">
                    <div class="basic-pagination text-center">
                        <div class="d-flex justify-content-center">
                            {{$results->links('pagination::bootstrap-4')}}
                        </div>
                    </div>
                 </div>
              </div>
            </div>
        </div>
        <!-- product-filter-area-end -->
  
     </main>
     <!-- main-area-end -->
    @endsection 
