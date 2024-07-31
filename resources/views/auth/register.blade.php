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
                    <form action="{{route('register-post')}}" method="post">
                        @csrf
                        <div class="tptrack__content grey-bg-3">
                            <div class="tptrack__item d-flex mb-20">
                                <div class="tptrack__item-icon">
                                    <img src="{{asset('img/logo.png')}}" alt="" width="50px" height="40px">
                                </div>
                                <div class="tptrack__item-content">
                                    <h4 class="tptrack__item-title">Đăng kí ngay</h4>
                                    <p>Chào mừng bạn đã đến với owenbook</p>
                                </div>
                            </div>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Tên</label>
                                <input type="text" id="form3Example3" class="form-control" name="name" value="{{ old('email') }}" placeholder="Tên của bạn" />
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Email</label>
                                <input type="email" id="form3Example3" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" />
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form3Example4">Mật khẩu</label>
                                <input type="password" id="form3Example4" class="form-control" name="password" placeholder="Mật Khẩu" />
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="tpsign__remember d-flex align-items-center justify-content-between mb-15">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Nhớ tài khoản</label>
                                </div>

                                <div class="tpsign__pass">
                                    <a href="{{route('send.otp.form')}}">Quên Mật Khẩu</a>
                                </div>
                            </div>
                            <div class="dflex justify-content-center text-center">
                                <p>hoặc</p>
                                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-facebook-f fs-3"></i>
                                </button>
                                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-google fs-3"></i>
                                </button>
                            </div>
                            <p>Bạn đã có tài khoản?<a href="{{route('login')}}" class="text-danger">Đăng nhập ngay</a></p>
                            <p><a href="{{route('home')}}" class="text-danger">Quay lại</a></p>
                            <div class="tptrack__btn mt-3">
                                <button class="tptrack__submition" type="submit">Đăng kí<i class="fal fa-long-arrow-right"></i></button>
                            </div>


                        </div>
                    </form>
                </div>

            </div>

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
                            <input type="text" id="form3Example3" class="form-control" name="name" value="{{ old('email') }}" placeholder="Tên của bạn" />
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Email</label>
                            <input type="email" id="form3Example3" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" />
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form3Example4">Mật Khẩu</label>
                            <input type="password" id="form3Example4" class="form-control" name="password" placeholder="Mật Khẩu" />
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
                            <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-facebook-f fs-3"></i>
                            </button>
                            <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-google fs-3"></i>
                            </button>
                        </div>
                        <p>Bạn đã có tài khoản?<a href="{{route('login')}}" class="text-danger">Đăng nhập ngay</a></p>
                        <div class="tptrack__btn mt-3">
                            <button class="tptrack__submition" type="submit">Đăng kí<i class="fal fa-long-arrow-right"></i></button>
                        </div>

                    </div>
                </form>
            </div>

        </div>

    </div>
    </div>