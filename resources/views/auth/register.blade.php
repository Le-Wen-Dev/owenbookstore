{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
  <style>
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(218, 41%, 35%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%);
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>

  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          The best offer <br />
          <span style="color: hsl(218, 81%, 75%)">for your business</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit.
          Temporibus, expedita iusto veniam atque, magni tempora mollitia
          dolorum consequatur nulla, neque debitis eos reprehenderit quasi
          ab ipsum nisi dolorem modi. Quos?
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            <form action="{{route('register-post')}}" method="post">
              @csrf
              <h4 class="text-center p-2">Đăng Ký</h4>
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-12 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="form3Example1" class="form-control" name="name"/>
                    <label class="form-label" for="form3Example1">Tên</label>
                    @if ($errors->has('name'))
                    <span class="" style="color: red ; font-size:14px">{{ $errors->first('name') }}</span>
                   @endif
                  </div>
                </div>
               
              </div>

              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control" name="email"/>
                <label class="form-label" for="form3Example3">Gmail</label>
                @if ($errors->has('email'))
                <span class="" style="color: red ; font-size:14px">{{ $errors->first('email') }}</span>
               @endif
              </div>

              <!-- Password input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" id="form3Example4" class="form-control" name="password"/>
                <label class="form-label" for="form3Example4">Password</label>
                @if ($errors->has('password'))
                <span class="" style="color: red ; font-size:14px">{{ $errors->first('password') }}</span>
               @endif
              </div>

              <!-- Submit button -->
              <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">
                Đăng ký
              </button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>or sign up with:</p>
                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-facebook-f"></i>
                </button>

                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-google"></i>
                </button>

                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-twitter"></i>
                </button>

                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-github"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html> --}}
@extends('layout')
@section('content')
@include('compoments.header1')
<div class="container">
  <div class="row justify-content-center">
     <div class="col-lg-6 col-sm-12">
 
        <div class="tptrack__product mb-40">
          <form action="{{route('register-post')}}" method="post">
            @csrf
           <div class="tptrack__thumb">
              <img src="assets/img/banner/login-bg.jpg" alt="">
           </div>
           <div class="tptrack__content grey-bg-3">
              <div class="tptrack__item d-flex mb-20">
                 <div class="tptrack__item-icon">
                    <img src="assets/img/icon/lock.png" alt="">
                 </div>
                 <div class="tptrack__item-content">
                    <h4 class="tptrack__item-title">Login Here</h4>
                    <p>Your personal data will be used to support your experience throughout this website, to manage access to your account.</p>
                 </div>
              </div>
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Tên</label>
                <input type="text" id="form3Example3" class="form-control" name="name" value="{{ old('email') }}" placeholder="Tên của bạn"/>
                @if ($errors->has('name'))
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                          @endif
              </div>
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Email</label>
                <input type="email" id="form3Example3" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email"/>
                @if ($errors->has('email'))
                          <span class="text-danger">{{ $errors->first('email') }}</span>
                          @endif
              </div>
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form3Example4">Password</label>
                <input type="password" id="form3Example4" class="form-control" name="password" placeholder="Mật Khẩu"/>
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
               @endif
              </div>
              
              <div class="tpsign__remember d-flex align-items-center justify-content-between mb-15">
                 <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                  </div>
                  
                  <div class="tpsign__pass">
                    <a href="#">Quên Mật Khẩu</a>
                  </div>
              </div>
              <div class="dflex justify-content-center text-center">
                <p>hoặc</p>
                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-facebook-f fs-3"></i>
                </button>
                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-google fs-3"></i>
                </button>
              </div>
              <p>Bạn đã có tài khoản?<a href="{{route('login')}}" class="text-danger">Đăng nhập ngay</a></p>
              <div class="tptrack__btn mt-3">
                 <button class="tptrack__submition"  type="submit">Đăng kí<i class="fal fa-long-arrow-right"></i></button>
              </div>
   
           </div>
          </form>
        </div>
  
     </div>

  </div>
</div>
@endsection