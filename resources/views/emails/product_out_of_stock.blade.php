@component('mail::message')
# Thông báo sản phẩm hết hàng

Xin chào,

Sản phẩm '{{ $product->name }}' đã hết hàng. Vui lòng bổ sung hàng.

Cảm ơn,<br>
{{ config('app.name') }}
@endcomponent
