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
           
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
          <form action="{{ route('forgot.password.email') }}" method="post">
            @csrf
           <div class="tptrack__content grey-bg-3">
              <div class="tptrack__item d-flex mb-20">
                 <div class="tptrack__item-icon">
                    <img src="{{asset('img/logo.png')}}" alt="" width="50px" height="40px">
                 </div>
                 <div class="tptrack__item-content">
                    <h4 class="tptrack__item-title">Tìm tài khoản </h4>
                    <p>Vui lòng chọn email bạn đã từng đăng nhập trước đó !!</p>
                 </div>
              </div>
              <div data-mdb-input-init class="form-outline mb-4">
                <label for="email" class="form-label">Email </label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="dflex justify-content-center text-center">
                <div class="tpsign__pass">
                    <a href="{{route('send.otp.form')}}">Xác nhận qua OTP</a>
                  </div>
              </div>
              <p><a href="{{route('login')}}" class="text-danger">Quay lại</a></p>
              <div class="tptrack__btn mt-3">
                 <button class="tptrack__submition"  type="submit">Xác Nhận<i class="fal fa-long-arrow-right"></i></button>
              </div>
           
           </div>
          </form>
        </div>
  
     </div>

  </div>
</div>
