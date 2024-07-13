      <!-- preloader -->
      <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- preloader end  -->

     <!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
           <i class="fas fa-angle-up"></i>
        </button>
     <!-- Scroll-top-end-->

     <!-- header-area-start -->
     <header>
        <div class="header-top space-bg">
           <div class="container">
              <div class="row">
                 <div class="col-12">
                    <div class="header-welcome-text text-start ">
                       <span>Welcome to our international shop! Enjoy free shipping on orders $100 & up.</span>
                       <a href="shop.html">Shop Now <i class="fal fa-long-arrow-right"></i> </a>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <div class="logo-area mt-30 d-none d-xl-block">
           <div class="container">
              <div class="row align-items-center">
                 <div class="col-xl-2 col-lg-3">
                    <div class="logo">
                       <a href="{{route('home')}}"><img src="assets/img/logo/logo.png" alt="logo"></a>
                    </div>
                 </div>
                 <div class="col-xl-10 col-lg-9">
                    <div class="header-meta-info d-flex align-items-center justify-content-between">
                       <div class="header-search-bar">
                          <form action="#">
                             <div class="search-info p-relative">
                                <button class="header-search-icon"><i class="fal fa-search"></i></button>
                                <input type="text" placeholder="Search products...">
                             </div>
                          </form>
                       </div>
                       <div class="header-meta header-language d-flex align-items-center">
                          <div class="header-meta__lang">
                             <ul>
                                <li>
                                   <a href="#">
                                      <img src="assets/img/icon/lang-flag.png" alt="flag">English
                                      <span><i class="fal fa-angle-down"></i></span>
                                   </a>
                                   <ul class="header-meta__lang-submenu">
                                      <li>
                                         <a href="#">Arabic</a>
                                      </li>
                                      <li>
                                         <a href="#">Spanish</a>
                                      </li>
                                      <li>
                                         <a href="#">Mandarin</a>
                                      </li>
                                   </ul>
                                </li>
                             </ul>
                          </div>
                          <div class="header-meta__value mr-15">
                             <select>
                                <option>USD</option>
                                <option>YEAN</option>
                                <option>EURO</option>
                             </select>
                          </div>
                          <div class="header-meta__social d-flex align-items-center ml-25">
                             <button class="header-cart p-relative tp-cart-toggle">
                                <i class="fal fa-shopping-cart"></i>
                                <span class="tp-product-count">2</span>
                             </button>
                             <a href="{{route('login')}}"><i class="fal fa-user"></i></a>
                             <a href="wishlist.html"><i class="fal fa-heart"></i></a>
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
                          <a class="tp-cat-toggle" href="#" role="button"><i class="fal fa-bars"></i>Categories</a>
                          <div class="category-menu category-menu-off">
                           <!-- category-menuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu -->
                             <ul class="cat-menu__list">    
                                    @if(isset($category) && is_object($category))
                                        @foreach($category as $category)
                                      <li><a href="{{ route('products.by.category', $category->id) }}"><i class="fal fa-smile"></i>{{ $category->name }}</a></li>
                                      @endforeach
                                      @endif  
                             </ul>
                             <div class="daily-offer">
                                <ul>
                                   <li><a href="shop.html">Value of the Day</a></li>
                                   <li><a href="shop.html">Top 100 Offers</a></li>
                                   <li><a href="shop.html">New Arrivals</a></li>
                                </ul>
                             </div>
                          </div>
                       </div> 
                    </div>
                    <div class="col-xl-7 col-lg-6">
                       <div class="main-menu">
                          <nav id="mobile-menu">
                             <ul>
                                <li class="has-dropdown">
                                   <a href="index.html">Home</a>
                                   <ul class="submenu">
                                      <li><a href="index.html">Wooden  Home</a></li>
                                      <li><a href="index-2.html">Fashion Home</a></li>
                                      <li><a href="index-3.html">Furniture Home</a></li>
                                      <li><a href="index-4.html">Cosmetics Home</a></li>
                                      <li><a href="index-5.html">Food Grocery</a></li>
                                   </ul>
                                </li>
                                <li class="has-dropdown">
                                   <a href="shop.html">Shop</a>
                                   <ul class="submenu">
                                      <li><a href="shop.html">Shop</a></li>
                                      <li><a href="shop-2.html">Shop 2</a></li>
                                      <li><a href="shop-details.html">Shop Details </a></li>
                                      <li><a href="shop-details-2.html">Shop Details 2</a></li>
                                      <li><a href="shop-location.html">Shop Location</a></li>
                                      <li><a href="cart.html">Cart</a></li>
                                      <li><a href="sign-in.html">Sign In</a></li>
                                      <li><a href="checkout.html">Checkout</a></li>
                                      <li><a href="wishlist.html">Wishlist</a></li>
                                      <li><a href="track.html">Product Track</a></li>
                                   </ul>
                                </li>
                                <li class="has-dropdown has-megamenu">
                                   <a href="about.html">Pages</a>
                                   <ul class="submenu mega-menu">
                                      <li>
                                         <a class="mega-menu-title">Page layout</a>
                                         <ul>
                                            <li><a href="shop.html">Shop filters v1</a></li>
                                            <li><a href="shop-2.html">Shop filters v2</a></li>
                                            <li><a href="shop-details.html">Shop sidebar</a></li>
                                            <li><a href="shop-details-2.html">Shop Right sidebar</a></li>
                                            <li><a href="shop-location.html">Shop List view</a></li>
                                         </ul>
                                      </li>
                                      <li>
                                         <a class="mega-menu-title">Page layout</a>
                                         <ul>
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="sign-in.html">Sign In</a></li>
                                            <li><a href="sign-in.html">Log In</a></li>
                                         </ul>
                                      </li>
                                      <li>
                                         <a class="mega-menu-title">Page type</a>
                                         <ul>
                                            <li><a href="track.html">Product Track</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="error.html">404 / Error</a></li>
                                            <li><a href="coming-soon.html">Coming Soon</a></li>
                                         </ul>
                                      </li>
                                   </ul>
                                </li>
                                <li class="has-dropdown">
                                   <a href="blog.html">Blog</a>
                                   <ul class="submenu">
                                      <li><a href="blog.html">Blog</a></li>
                                      <li><a href="blog-details.html">Blog Details</a></li>
                                   </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
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
                                      <a href="tel:0123456">908. 408. 501. 89</a>
                                   </div>
                                </div>
                             </li>
                             <li>
                                <div class="menu-contact__item">
                                   <div class="menu-contact__icon">
                                      <i class="fal fa-map-marker-alt"></i>
                                   </div>
                                   <div class="menu-contact__info">
                                      <a href="shop-location.html">Find Store</a>
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
                    <a href="{{route('home')}}"><img src="assets/img/logo/logo.png" alt="logo"></a>
                 </div>
              </div>
              <div class="col-xl-6 col-lg-6">
                 <div class="main-menu">
                    <nav>
                       <ul>
                          <li class="has-dropdown">
                             <a href="{{route('home')}}">Home</a>
                             <ul class="submenu">
                                <li><a href="index.html">Wooden  Home</a></li>
                                <li><a href="index-2.html">Fashion Home</a></li>
                                <li><a href="index-3.html">Furniture Home</a></li>
                                <li><a href="index-4.html">Cosmetics Home</a></li>
                                <li><a href="index-5.html">Food Grocery</a></li>
                             </ul>
                          </li>
                          <li class="has-dropdown">
                             <a href="shop.html">Shop</a>
                             <ul class="submenu">
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="shop-2.html">Shop 2</a></li>
                                <li><a href="shop-details.html">Shop Details </a></li>
                                <li><a href="shop-details-2.html">Shop Details 2</a></li>
                                <li><a href="shop-location.html">Shop Location</a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="sign-in.html">Sign In</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                <li><a href="track.html">Product Track</a></li>
                             </ul>
                          </li>
                          <li class="has-dropdown has-megamenu">
                             <a href="about.html">Pages</a>
                             <ul class="submenu mega-menu">
                                <li>
                                   <a class="mega-menu-title">Page layout</a>
                                   <ul>
                                      <li><a href="shop.html">Shop filters v1</a></li>
                                      <li><a href="shop-2.html">Shop filters v2</a></li>
                                      <li><a href="shop-details.html">Shop sidebar</a></li>
                                      <li><a href="shop-details-2.html">Shop Right sidebar</a></li>
                                      <li><a href="shop-location.html">Shop List view</a></li>
                                   </ul>
                                </li>
                                <li>
                                   <a class="mega-menu-title">Page layout</a>
                                   <ul>
                                      <li><a href="about.html">About</a></li>
                                      <li><a href="cart.html">Cart</a></li>
                                      <li><a href="checkout.html">Checkout</a></li>
                                      <li><a href="sign-in.html">Sign In</a></li>
                                      <li><a href="sign-in.html">Log In</a></li>
                                   </ul>
                                </li>
                                <li>
                                   <a class="mega-menu-title">Page type</a>
                                   <ul>
                                      <li><a href="track.html">Product Track</a></li>
                                      <li><a href="wishlist.html">Wishlist</a></li>
                                      <li><a href="error.html">404 / Error</a></li>
                                      <li><a href="coming-soon.html">Coming Soon</a></li>
                                   </ul>
                                </li>
                             </ul>
                          </li>
                          <li class="has-dropdown">
                             <a href="blog.html">Blog</a>
                             <ul class="submenu">
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="blog-details.html">Blog Details</a></li>
                             </ul>
                          </li>
                          <li><a href="contact.html">Contact</a></li>
                       </ul>
                    </nav>
                 </div>
              </div>
              <div class="col-xl-4 col-lg-9">
                 <div class="header-meta-info d-flex align-items-center justify-content-end">
                    <div class="header-meta__social  d-flex align-items-center"> 
                       <button class="header-cart p-relative tp-cart-toggle">
                          <i class="fal fa-shopping-cart"></i>
                          <span class="tp-product-count">2</span>
                       </button>
                       <a href="sign-in.html"><i class="fal fa-user"></i></a>
                       <a href="wishlist.html"><i class="fal fa-heart"></i></a>
                    </div>
                    <div class="header-meta__search-5 ml-25">
                       <div class="header-search-bar-5">
                          <form action="#">
                             <div class="search-info-5 p-relative">
                                <button class="header-search-icon-5"><i class="fal fa-search"></i></button>
                                <input type="text" placeholder="Search products...">
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
                    <a href="index.html"><img src="assets/img/logo/logo.png" alt="logo"></a>
                 </div>
              </div>
              <div class="col-lg-9 col-md-8">
                 <div class="header-meta-info d-flex align-items-center justify-content-between">
                    <div class="header-search-bar">
                       <form action="#">
                          <div class="search-info p-relative">
                             <button class="header-search-icon"><i class="fal fa-search"></i></button>
                             <input type="text" placeholder="Search products...">
                          </div>
                       </form>
                    </div>
                    <div class="header-meta__social d-flex align-items-center ml-25">
                       <button class="header-cart p-relative tp-cart-toggle">
                          <i class="fal fa-shopping-cart"></i>
                          <span>2</span>
                       </button>
                       <a href="sign-in.html"><i class="fal fa-user"></i></a>
                       <a href="wishlist.html"><i class="fal fa-heart"></i></a>
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
                    <a href="index.html"><img src="assets/img/logo/logo.png" alt="logo"></a>
                 </div>
              </div>
              <div class="col-3">
                 <div class="header-meta-info d-flex align-items-center justify-content-end ml-25">
                    <div class="header-meta m-0 d-flex align-items-center">
                       <div class="header-meta__social d-flex align-items-center"> 
                          <button class="header-cart p-relative tp-cart-toggle">
                             <i class="fal fa-shopping-cart"></i>
                             <span>2</span>
                          </button>
                          <a href="sign-in.html"><i class="fal fa-user"></i></a>
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
        <button class="tpsideinfo__close">Close<i class="fal fa-times ml-10"></i></button>
        <div class="tpsideinfo__search text-center pt-35">
           <span class="tpsideinfo__search-title mb-20">What Are You Looking For?</span>
           <form action="#">
              <input type="text" placeholder="Search Products...">
              <button><i class="fal fa-search"></i></button>
           </form>
        </div>
        <div class="tpsideinfo__nabtab">
           <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Menu</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Categories</button>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                 <div class="mobile-menu"></div>
              </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                 <div class="tpsidebar-categories">
                    <ul>
                       <li><a href="shop.html">Furniture</a></li>
                       <li><a href="shop.html">Wooden</a></li>
                       <li><a href="shop.html">Lifestyle</a></li>
                       <li><a href="shop-2.html">Shopping</a></li>
                       <li><a href="track.html">Track Product</a></li>
                    </ul>
                 </div>
              </div>
            </div>
        </div>
        <div class="tpsideinfo__account-link">							
           <a href="{{route('login')}}"><i class="fal fa-user"></i> Login / Register</a>
        </div>
        <div class="tpsideinfo__wishlist-link">
           <a href="wishlist.html" target="_parent"><i class="fal fa-heart"></i> Wishlist</a>
        </div>
     </div> 
     <div class="body-overlay"></div>
     <!-- sidebar-menu-area-end -->

     <!-- header-cart-start -->
     <div class="tpcartinfo tp-cart-info-area p-relative">
     <button class="tpcart__close"><i class="fal fa-times"></i></button>
     <div class="tpcart">
        <h4 class="tpcart__title">Your Cart</h4>
        <div class="tpcart__product">
           <div class="tpcart__product-list">
              <ul>
                 <li>
                    <div class="tpcart__item">
                       <div class="tpcart__img">
                          <img src="assets/img/product/home-one/product-1.jpg" alt="">
                          <div class="tpcart__del">
                             <a href="#"><i class="far fa-times-circle"></i></a>
                          </div>
                       </div>
                       <div class="tpcart__content">
                          <span class="tpcart__content-title"><a href="shop-details.html">Miko Wooden Bluetooth Speaker</a>
                          </span>
                          <div class="tpcart__cart-price">
                             <span class="quantity">1 x</span>
                             <span class="new-price">$162.80</span>
                          </div>
                       </div>
                    </div>
                 </li>
                 <li>
                    <div class="tpcart__item">
                       <div class="tpcart__img">
                          <img src="assets/img/product/home-one/product-3.jpg" alt="">
                          <div class="tpcart__del">
                             <a href="#"><i class="far fa-times-circle"></i></a>
                          </div>
                       </div>
                       <div class="tpcart__content">
                          <span class="tpcart__content-title"><a href="shop-details.html">Evo Lightweight Granite Shirt</a>
                          </span>
                          <div class="tpcart__cart-price">
                             <span class="quantity">1 x</span>
                             <span class="new-price">$138.00</span>
                          </div>
                       </div>
                    </div>
                 </li>
              </ul>
           </div>
           <div class="tpcart__checkout">
              <div class="tpcart__total-price d-flex justify-content-between align-items-center">
                 <span> Subtotal:</span>
                 <span class="heilight-price"> $300.00</span>
              </div>
              <div class="tpcart__checkout-btn">
                 <a class="tpcart-btn mb-10" href="cart.html">View Cart</a>
                 <a class="tpcheck-btn" href="checkout.html">Checkout</a>
              </div>
           </div>
        </div>
        <div class="tpcart__free-shipping text-center">
           <span>Free shipping for orders <b>under 10km</b></span>
        </div>
     </div>
     </div>
     <div class="cartbody-overlay"></div>