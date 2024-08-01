@extends('layout')
@section('content')
<div class="container success-page">
    <div class="text-center">
        <div class="icon">
            <i class="bi bi-check-circle"></i>
        </div>
        <h1 class="display-4">Thanh Toán Thành Công</h1>
        <p class="lead">Cảm ơn bạn đã mua hàng từ chúng tôi. Đơn hàng của bạn đã được xử lý thành công.</p>
        <hr class="my-4">
        <h3>Chi Tiết Đơn Hàng</h3>
        <ul class="list-group">
            <li class="list-group-item">Mã Đơn Hàng: <strong>#{{ session('order_id') }}</strong></li>
            <li class="list-group-item">Tổng Tiền: <strong>{{ number_format(session('total'), 0, ',', '.') }} VNĐ</strong></li>
            <li class="list-group-item">Ngày Thanh Toán: <strong>{{session('payment_date') }}</strong></li>
        </ul>
        <hr class="my-4">
        <a href="{{route('home')}}" class="btn btn-link border border-1 text-black" style="border-color: #d51243!important;">Quay lại trang chủ</a>
        <a href="{{route('profile.order')}}" class="btn btn-secondary">Xem đơn hàng đã đặt</a>
    </div>
</div>
@endsection