<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
       <!-- Place favicon.ico in the root directory -->
       <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/logo/favicon.png')}}">

       <!-- CSS here -->
       <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
       <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
       <link rel="stylesheet" href="{{asset('assets/css/swiper-bundle.css')}}">
       <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
       <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
       <link rel="stylesheet" href="{{asset('assets/css/fontawesome.min.css')}}">
       <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
       <link rel="stylesheet" href="{{asset('assets/css/meanmenu.css')}}">
       <link rel="stylesheet" href="{{asset('assets/css/spacing.css')}}">
       <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
</head>
<body>
<div class="container mt-15">
  <div class="row justify-content-center">
     <div class="col-lg-6 col-sm-12">
 
        <div class="tptrack__product mb-40">
     
          <form action="{{route('send.otp')}}" method="post">
            @csrf
           <div class="tptrack__content grey-bg-3">
              <div class="tptrack__item d-flex mb-20">
                 <div class="tptrack__item-icon">
                  <img src="{{asset('img/logo.png')}}" alt="" width="50px" height="40px">
                 </div>
                 <div class="tptrack__item-content">
                    <h4 class="tptrack__item-title">Gủi OTP </h4>
                    <p>Vui lòng chọn email bạn đã từng đăng nhập trước đó !</p>
                 </div>
              </div>
              @if (session('message'))
              <div>{{ session('message') }}</div>
              <a href="{{route('verify.otp.form')}}">Nhập Otp </a>
          @endif
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form3Example4">Nhập Email</label>
                <input type="email" id="form3Example4" class="form-control" name="email" placeholder="Email"/>
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
               @endif
              </div>
              <div class="dflex justify-content-center text-center">
                <div class="tpsign__pass">
                    <a href="{{route('forgot.password.form')}}">Xác nhận đổi mật khẩu qua email</a>
                  </div>
              </div>
              <p><a href="{{route('login')}}" class="text-danger">Quay lại</a></p>
              <div class="tptrack__btn mt-3">
                 <button class="tptrack__submition"  type="submit">Gửi OTP<i class="fal fa-long-arrow-right"></i></button>
              </div>
   
           </div>
          </form>
        </div>
  
     </div>

  </div>
</div>
