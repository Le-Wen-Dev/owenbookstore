
@extends('layout')
@section('content')
@include('compoments.header1')
<div class="container">
  <div class="row justify-content-center">
     <div class="col-lg-6 col-sm-12">
 
        <div class="tptrack__product mb-40">
            <div class="card-header">{{ __('Verify OTP') }}</div>
         @if (session('message'))
         <div>{{ session('message') }}</div>
         <a href="{{route('verify.otp.form')}}">Quay lại OTP </a>
     @endif
          <form action="{{ route('verify.otp') }}" method="post">
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
                    <h4 class="tptrack__item-title">Nhập OTP </h4>
                    <p>Vui lòng nhập dãy 5 số trong gmail của bạn !</p>
                 </div>
              </div>
              <div data-mdb-input-init class="form-outline mb-4">
                <label for="otp" class="col-md-4 col-form-label text-md-right">{{ __('OTP') }}</label>
                <input id="otp" type="text" class="form-control @error('otp') is-invalid @enderror" name="otp" required autofocus>

                @error('otp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="dflex justify-content-center text-center">
                <div class="tpsign__pass">
                    <a href="{{route('forgot.password.form')}}">Xác nhận đổi mật khẩu qua email</a>
                  </div>
              </div>
              <p><a href="{{route('login')}}" class="text-danger">Quay lại</a></p>
              <div class="tptrack__btn mt-3">
                 <button class="tptrack__submition"  type="submit">Nhập OTP<i class="fal fa-long-arrow-right"></i></button>
              </div>
           
           </div>
          </form>
        </div>
  
     </div>

  </div>
</div>
@endsection