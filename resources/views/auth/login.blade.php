@extends('layout')
@section('content')
@include('compoments.header1')
<div class="container">
  <div class="row justify-content-center">
     <div class="col-lg-6 col-sm-12">
 
        <div class="tptrack__product mb-40">
          <form action="{{route('login-post')}}" method="post">
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
                <label class="form-label" for="form3Example3">Gmail</label>
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
                    <a href="{{route('send.otp.form')}}">Quên mật khẩu</a>
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
              <p>Bạn chưa có tài khoản?<a href="{{route('register')}}" class="text-danger">Đăng kí ngay</a></p>
              <div class="tptrack__btn mt-3">
                 <button class="tptrack__submition"  type="submit">Đăng Nhập<i class="fal fa-long-arrow-right"></i></button>
              </div>
   
           </div>
          </form>
        </div>
  
     </div>

  </div>
</div>
@endsection