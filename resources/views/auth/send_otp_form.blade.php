
@extends('layout')
@section('content')

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
@endsection