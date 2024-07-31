$(document).ready(function () {
    $('#province-select').change(function () {
        var provinceId = $(this).val();
        if (provinceId) {
            $.ajax({
                url: "{{ route('districts.byProvince') }}",
                type: 'GET',
                data: {
                    province_id: provinceId
                },
                dataType: 'json',
                success: function (data) {
                    $('#district-select').empty();
                    $('#ward-select').empty(); // Clear ward select when province changes
                    $.each(data, function (key, district) {
                        $('#district-select').append('<option value="' + district.code + '" data-name="' + district.name + '" >' + district.full_name + '</option>');
                    });
                }
            });
        } else {
            $('#district-select').empty();
            $('#ward-select').empty();
        }
    });



    $('#district-select').change(function () {
        var districtId = $(this).val();
        if (districtId) {
            $.ajax({
                url: "{{ route('wards.byDistrict') }}",
                type: 'GET',
                data: {
                    district_id: districtId
                },
                dataType: 'json',
                success: function (data) {
                    $('#ward-select').empty();
                    $.each(data, function (key, ward) {
                        $('#ward-select').append('<option value="' + ward.code + '" data-name="' + ward.name + '">' + ward.full_name + '</option>');
                    });
                }
            });
        } else {
            $('#ward-select').empty();
        }
    });
});