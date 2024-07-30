
@extends('layout')
@section('content')
<div class="container mt-15">
  <div class="row justify-content-center">
     <div class="col-lg-6 col-sm-12">
 
        <div class="tptrack__product mb-40">
           
            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
          <form action="{{ route('password.update') }}" method="post">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
           <div class="tptrack__thumb">
            <img src="{{asset('img/logo.png')}}" alt="" width="50px" height="40px">
           </div>
           <div class="tptrack__content grey-bg-3">
              <div class="tptrack__item d-flex mb-20">
                 <div class="tptrack__item-icon">
                    <img src="assets/img/icon/lock.png" alt="">
                 </div>
                 <div class="tptrack__item-content">
                    <h4 class="tptrack__item-title">Đổi mật khẩu </h4>
                    <p>Vui lòng chọn email bạn đã từng đăng nhập trước đó và mật khẩu mới !!</p>
                 </div>
              </div>
              <div data-mdb-input-init class="form-outline mb-4">
                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
              </div>
              <div data-mdb-input-init class="form-outline mb-4">
                <label for="password" class="form-label">Mật Khẩu</label>
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
              </div>
              <div data-mdb-input-init class="form-outline mb-4">
                <label for="password_confirmation" class="form-label">Nhập Lại Mật Khẩu</label>
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
              <div class="dflex justify-content-center text-center">
                <div class="tpsign__pass">
                    <a href="{{route('forgot.password.form')}}">Xác nhận qua OTP</a>
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
@endsection

