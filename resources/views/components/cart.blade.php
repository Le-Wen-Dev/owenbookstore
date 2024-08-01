@extends('layout')
@section('content')
@php
$totalPrice = 0; // Khởi tạo biến tổng giá trị đơn hàng
$discount = 0; // Khởi tạo biến giảm giá
@endphp
<section class="breadcrumb__area pt-60 pb-60 tp-breadcrumb__bg" data-background="{{asset('img/bannerphu.png')}}">
    <div class="container">
       <div class="row align-items-center">
          <div class="col-xl-7 col-lg-12 col-md-12 col-12">
             <div class="tp-breadcrumb">
                <div class="tp-breadcrumb__link mb-10">
                   <span class="breadcrumb-item-active"><a href="{{route('home')}}">Trang chủ</a></span>
                </div>
                <h2 class="tp-breadcrumb__title">Giỏ hàng</h2>
             </div>
          </div>
       </div>
    </div>
 </section>
<main class="container">
    <section class="container stylization maincont mt-5">
        <ul class="b-crumbs">

        <h1 class="main-ttl"><span>Cart</span></h1>
        <!-- Cart Items - start -->
        <table class="table table-hover mt-4">
            <thead class="table-light">
                <tr>
                    <th scope="col">Sản Phẩm</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Đơn Giá</th>
                    <th scope="col">Tổng</th>
                </tr>
            </thead>
            <tbody>
                @php
                $totalPrice = 0;
                $user = Session::get('user');
                @endphp

                @foreach($cart as $item)
                <tr>
                    <td>
                        <img src="{{ asset('uploaded/'.$item->img) }}" width="70px" alt="">
                    </td>
                    <td>
                        <a href="/detail/{{ $item->id }}" style="text-decoration: none; color: black;">
                            <p>{{ $item->name_product }}</p>
                            <p>
                                <form action="{{asset('removecart')}}" method="POST">
                                    @csrf
                                    @if(Session::has('user'))
                                    <input type="hidden" name="id_user" value="{{ $user->id }}">
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-light">
                                        <i class="fa-solid fa-x"></i> Xóa
                                    </button>
                                    @endif
                                </form>
                            </p>
                        </a>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <form class="d-inline">
                                @csrf
                                <input type="hidden" name="id_user" value="{{ $user->id }}">
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button type="button" class="btn btn-light increaseQuantity">+</button>
                            </form>
                            <button class="btn btn-light mx-2 quantity">{{ $item->quantity }}</button>
                            <form class="d-inline">
                                @csrf
                                <input type="hidden" name="id_user" value="{{ $user->id }}">
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button type="button" class="btn btn-light decreaseQuantity">-</button>
                            </form>
                        </div>
                    </td>
                    <td>
                        
                        <p class="text-danger">{{ number_format($item->price, 0, ',', '.') . ' đ' }}</p>
                    </td>
                    <td>
                        <p class="text-danger subtotal">{{ number_format($item->quantity * $item->price, 0, ',', '.') . ' đ' }}</p>
                    </td>
                </tr>
                @php
                // Tính tổng giá trị của từng sản phẩm và cộng dồn vào tổng giá trị đơn hàng
                $totalPrice += $item->quantity * $item->price;
                @endphp
                @endforeach

            </tbody>
        </table>
        <div class="p-2 mb-3">
        <form action="{{ route('remove.all.cart') }}" method="POST">
            @csrf
            @if(Session::has('user'))
            <input type="hidden" name="id_user" value="{{ $user->id }}">
            <button type="submit" class="btn btn-danger">
                Xóa tất cả sản phẩm
            </button>
            @endif
        </form>
    </div>
        <table class="table">
            <h5>TỔNG ĐƠN HÀNG</h5>
            <tr>
                <td>Tạm tính</td>
                <td class="totalPrice">{{ number_format($totalPrice, 0, ',', '.') . ' đ' }}</td>
            </tr>
            <tr>
                <td>Giảm Giá</td>
                <td class="sale">{{ number_format($discount, 0, ',', '.') . ' đ' }}</td>
            </tr>
            <tr>
                <td>Tổng cộng</td>
                <td class="totalPrice1"><strong>{{ number_format($totalPrice - $discount, 0, ',', '.') . ' đ' }}</strong></td>
            </tr>
        </table>
        <!-- Cart Items - end -->
        <div class="d-flex justify-content-end">
            <button class="btn bg-danger text-white m-3">
                <a  href="{{route('checkout')}}" style="color:white;text-decoration: none">
                    Tiếp Tục Thanh toán
                </a>
        </div>
    </section>
</main>

<script>
    // Lắng nghe sự kiện khi nút tăng số lượng được click
    document.querySelectorAll('.increaseQuantity').forEach(button => {
        button.addEventListener('click', function () {
            const quantityElement = this.closest('td').querySelector('.quantity');
            const subtotalElement = this.closest('tr').querySelector('.subtotal');
            const totalPriceElement = document.querySelector('.totalPrice');
            const saleElement = document.querySelector('.sale');
            const totalPrice1Element = document.querySelector('.totalPrice1');

            let quantity = parseInt(quantityElement.textContent);
            quantity++;
            quantityElement.textContent = quantity;

            let price = parseFloat(subtotalElement.textContent.replace(/\D/g, ''));
            let unitPrice = price / (quantity - 1);
            subtotalElement.textContent = numberWithCommas((unitPrice * quantity).toFixed(0)) + ' đ';

            let total = parseFloat(totalPriceElement.textContent.replace(/\D/g, ''));
            total += unitPrice;
            totalPriceElement.textContent = numberWithCommas(total.toFixed(0)) + ' đ';

            // Cập nhật tổng cộng
            totalPrice1Element.textContent = numberWithCommas((total - parseFloat(saleElement.textContent.replace(/\D/g, ''))).toFixed(0)) + ' đ';
        });
    });

    // Lắng nghe sự kiện khi nút giảm số lượng được click
    document.querySelectorAll('.decreaseQuantity').forEach(button => {
        button.addEventListener('click', function () {
            const quantityElement = this.closest('td').querySelector('.quantity');
            const subtotalElement = this.closest('tr').querySelector('.subtotal');
            const totalPriceElement = document.querySelector('.totalPrice');
            const saleElement = document.querySelector('.sale');
            const totalPrice1Element = document.querySelector('.totalPrice1');

            let quantity = parseInt(quantityElement.textContent);
            if (quantity > 1) {
                quantity--;
                quantityElement.textContent = quantity;

                let price = parseFloat(subtotalElement.textContent.replace(/\D/g, ''));
                let unitPrice = price / (quantity + 1);
                subtotalElement.textContent = numberWithCommas((unitPrice * quantity).toFixed(0)) + ' đ';

                let total = parseFloat(totalPriceElement.textContent.replace(/\D/g, ''));
                total -= unitPrice;
                totalPriceElement.textContent = numberWithCommas(total.toFixed(0)) + ' đ';

                // Cập nhật tổng cộng
                totalPrice1Element.textContent = numberWithCommas((total - parseFloat(saleElement.textContent.replace(/\D/g, ''))).toFixed(0)) + ' đ';
            }
        });
    });

    // Hàm định dạng số có dấu phẩy ngăn cách hàng nghìn
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>

@endsection
