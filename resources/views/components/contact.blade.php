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
                      <span class="breadcrumb-item-active"><a href="{{route('home')}}">Trang chủ</a></span>
                      <span>Liên hệ</span>
                   </div>
                   <h2 class="tp-breadcrumb__title">Liên lạc</h2>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- breadcrumb-area-end -->
        
    <!-- contact-area-start -->
    <section class="contact-area pt-80 pb-80">
       <div class="container">
          <div class="row">
             <div class="col-lg-4 col-12">
                <div class="tpcontact__right mb-40">
                   <div class="tpcontact__shop mb-30">
                      <h4 class="tpshop__title mb-25">Liên lạc</h4>
                      <div class="tpshop__info">
                         <ul>
                            <li><i class="fal fa-map-marker-alt"></i> <a href="#">Quận 12, Công viên phần mềm Quang Trung</a></li>
                            <li>
                               <i class="fal fa-phone"></i>
                               <a href="0832575905">0832 57 59 05</a>
                               <a href="gmail:trunghau2004318@gmail.com">trunghau2004318@gmail.com</a>
                            </li>
                            <li>
                               <i class="fal fa-clock"></i>
                               <span>Giờ hoạt động:</span>
                               <span>10 am - 10 pm , 7 ngày trong tuần</span>
                            </li>
                         </ul>
                      </div>
                   </div>
                   <div class="tpcontact__support">
                      <a href="tel:0832575905">Nhận hỗ trợ khi gọi <i class="fal fa-headphones"></i></a>
                      <a target="_blank" href="https://maps.app.goo.gl/z6Ur6UgVSRiFXbKa7">Nhận chỉ đường <i class="fal fa-map-marker-alt"></i></a>
                   </div>
                </div>
             </div>
             <div class="col-lg-8 col-12">
                <div class="map-area">
                    <div class="tpshop__location-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.42318016912!2d106.62563184439529!3d10.855382931576816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752a272ac90551%3A0xfdedca96b3ea5e15!2zQ8O0bmcgVmnDqm4gUGjhuqduIE3hu4FtIFF1YW5nIFRydW5nIC0gQ8O0bmcgVmnDqm4gUGjDosyAbiBNw6rMgG0gUXVhbmcgVHJ1bmcgLSBUw7QgS8O9!5e0!3m2!1svi!2s!4v1722446300679!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- contact-area-end -->

    {{-- <!-- map-area-start -->
    <div class="map-area">
       <div class="tpshop__location-map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193313.696093143!2d-74.25983952323838!3d40.794422695521675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1663062642075!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
       </div>
    </div>
    <!-- map-area-end --> --}}

    </main>
    <!-- main-area-end -->
    @endsection 
