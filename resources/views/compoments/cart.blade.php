@extends('layout')
@section('content')
@php
$totalPrice = 0; // Khởi tạo biến tổng giá trị đơn hàng
@endphp
<main class="container">
    <section class="container stylization maincont mt-5">
        <ul class="b-crumbs">
            <li class="">
                <a href="{{route('home')}}">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ul>
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
                                <form action="/removecart" method="POST">
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
                            <form action="/increasecart" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="id_user" value="{{ $user->id }}">
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-light">+</button>
                            </form>
                            <button class="btn btn-light mx-2">{{ $item->quantity }}</button>
                            <form action="/decreasecart" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="id_user" value="{{ $user->id }}">
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-light">-</button>
                            </form>
                        </div>
                    </td>
                    <td>
                        <del>{{ number_format($item->price, 3, ',', '.') . ' đ' }}</del>
                        <p class="text-danger">{{ number_format($item->price, 3, ',', '.') . ' đ' }}</p>
                    </td>
                    <td>
                        <p class="text-danger">{{ number_format($item->quantity * $item->price, 3, ',', '.') . ' đ' }}</p>
                    </td>
                </tr>
                @php
                    // Tính tổng giá trị của từng sản phẩm và cộng dồn vào tổng giá trị đơn hàng
                    $totalPrice += $item->quantity * $item->price;
                @endphp
            @endforeach
            
            </tbody>
        </table>
        <table class="table">
            <h5>TỔNG ĐƠN HÀNG</h5>
            <tr>
                <td>Tạm tính</td>
                <td>{{number_format($totalPrice, 3, ',', '.') . ' đ';}}</td>
            </tr>
            <tr>
                <td>Giảm Giá</td>
                <td>0 đ</td>
            </tr>
            <tr>
                <td>Tổng</td>
                <td class="text-danger"><strong>{{number_format($totalPrice, 3, ',', '.') . ' đ';}}</strong></td>
            </tr>
        </table>
        <!-- Cart Items - end -->
        <div class="d-flex justify-content-end">
            <button class="btn bg-danger text-white  m-3">
                <a href="/bill" style="color:white;text-decoration: none">
                    Tiếp Tục Thanh toán
                </a>
        </div>
    </section>
</main>

  <!-- Link to Bootstrap JS and dependencies (optional for certain components) -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  @endsection 
