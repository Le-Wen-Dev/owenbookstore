@component('mail::message')
# Product Out of Stock Notification

Hello,

The product '{{ $product->name }}' is out of stock. Please replenish your stock.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
