@extends('layout')
@section('content')
@include('compoments.header')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-sm-12">

            <div class="tptrack__product mb-40">
                <form action="{{route('register-post')}}" method="post">
                    @csrf

                    <div class="tptrack__content grey-bg-3">
                        <div class="tptrack__item d-flex mb-20">

                            <div class="tptrack__item-content">
                                <h1 class="tptrack__item-title text-danger">Đăng Ký</h1>

                            </div>
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Tên</label>
                            <input type="text" id="form3Example3" class="form-control" name="name"
                                value="{{ old('email') }}" placeholder="Tên của bạn" />
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Email</label>
                            <input type="email" id="form3Example3" class="form-control" name="email"
                                value="{{ old('email') }}" placeholder="Email" />
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form3Example4">Mật Khẩu</label>
                            <input type="password" id="form3Example4" class="form-control" name="password"
                                placeholder="Mật Khẩu" />
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="tpsign__remember d-flex align-items-center justify-content-between mb-15">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Ghi nhớ đăng nhập</label>
                            </div>

                            <div class="tpsign__pass">
                                <a href="{{route('send.otp.form')}}">Quên mật khẩu</a>
                            </div>
                        </div>
                        <div class="dflex justify-content-center text-center">
                            <p>hoặc</p>
                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-facebook-f fs-3"></i>
                            </button>
                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-google fs-3"></i>
                            </button>
                        </div>
                        <p>Bạn đã có tài khoản?<a href="{{route('login')}}" class="text-danger">Đăng nhập ngay</a></p>
                        <div class="tptrack__btn mt-3">
                            <button class="tptrack__submition" type="submit">Đăng kí<i
                                    class="fal fa-long-arrow-right"></i></button>
                        </div>

                    </div>
                </form>
            </div>

        </div>

    </div>
</div>
@endsection