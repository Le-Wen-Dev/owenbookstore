$(document).ready(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    function checkFormComplete() {
        return $('#province-select').val() &&
            $('#district-select').val() &&
            $('#ward-select').val() &&
            $('input[name="address"]').val() &&
            $('input[name="shipping"]:checked').val();
    }

    function calculateShippingFee() {
        if (!checkFormComplete()) {
            $('#shipping-amount-saving').text('Nhập đủ thông tin!');
            return;
        }

        var selectedProvinceOption = $('#province-select option:selected');
        var provinceName = selectedProvinceOption.data('name');

        var selectedDistrictOption = $('#district-select option:selected');
        var districtName = selectedDistrictOption.data('name');

        var selectedWardOption = $('#ward-select option:selected');
        var wardName = selectedWardOption.data('name');

        var data = {
            pick_province: 'Tp Hồ Chí Minh',
            pick_district: 'Quận 12',
            province: provinceName,
            district: districtName,
            ward: wardName,
            address: $('input[name="address"]').val(),
            weight: 1000,
            transport: 'road',
            deliver_option: 'none',
        };

        $.ajax({
            url: '/calculate-shipping-fee',
            method: 'POST',
            data: data,
            success: function (response) {
                if (response.success) {
                    var shippingFee = response.fee.fee;
                    $('#shipping-amount-saving').text(formatCurrency(shippingFee) + ' vnđ');
                    updateTotal(shippingFee);
                } else {
                    $('#shipping-amount-saving').text('Lỗi tính phí vận chuyển');
                    updateTotal(0);
                }
            },
            error: function () {
                $('#shipping-amount-saving').text('Lỗi tính phí vận chuyển');
                updateTotal(0);
            }
        });
    }

    $('#province-select, #district-select, #ward-select, input[name="address"], input[name="shipping"]').on('change keyup', function () {
        if ($('input[name="shipping"]:checked').val() === 'saving') {
            calculateShippingFee();
        }
    });

    $('#apply-voucher').on('click', function () {
        var voucher = $('#voucher').val();
        var cartTotal = parseFloat($('.cart-subtotal .sub_total').text().replace(/\./g, '').replace(' vnđ', ''));
        var shippingFee = parseFloat($('#shipping-amount-saving').text().replace(/\./g, '').replace(' vnđ', ''));

        if (!shippingFee) {
            alert('Bạn cần nhập đủ thông tin trước khi áp mã giảm giá');
            return;
        }

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/apply-voucher',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            data: JSON.stringify({
                voucher: voucher,
                cart_total: cartTotal,
                shipping_fee: shippingFee
            }),
            contentType: 'application/json',
            success: function (data) {
                if (data.success) {
                    $('.order-total').text(data.new_total);
                    $('.totalorder').val(data.new_total.replace(/\./g, ''));
                    alert('Áp dụng mã giảm giá thành công!');
                } else {
                    alert(data.message || 'Mã giảm giá không hợp lệ!');
                }
            },
            error: function () {
                alert('Có lỗi xảy ra khi áp dụng mã giảm giá');
            }
        });
    });

    function parseCurrency(text) {
        return parseFloat(text.replace(/[^0-9.-]+/g, ''));
    }

    function formatCurrency(amount) {
        return amount.toLocaleString('vi-VN');
    }

    function updateTotal(shippingFee) {
        var subTotalText = $('.cart-subtotal .sub_total').text();
        var subTotal = parseCurrency(subTotalText);

        // console.log('SubTotal:', subTotal);
        // console.log('ShippingFee:', shippingFee);

        var total = subTotal + shippingFee;
        $('.order-total').text(formatCurrency(total) + ' vnđ');
        $('.totalorder').val(total);
    }
});


