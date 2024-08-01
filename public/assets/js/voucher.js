document.getElementById('apply-voucher').addEventListener('click', function () {
    var voucher = document.getElementById('voucher').value;
    var cartTotal = parseFloat(document.querySelector('.sub_total').innerText.replace(/\./g, '').replace(' vnđ', ''));
    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/apply-voucher', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify({ voucher: voucher, cart_total: cartTotal })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Cập nhật tổng tiền sau khi áp dụng mã khuyến mãi
                document.querySelector('.order-total').innerText = data.new_total;
                // console.log(document.querySelector('.totalorder').value);
                // document.querySelector('.totalorder').value = data.new_total;
                // alert('Áp dụng mã khuyến mãi thành công!');
                // alert(document.querySelector('.totalorder').value);
            } else {
                alert(data.message || 'Mã khuyến mãi không hợp lệ!');
            }
        })
        .catch(error => console.error('Error:', error));
});
