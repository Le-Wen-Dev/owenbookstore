<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>
    <header>
        @include('components.header')
    </header>
    <main>
        @yield('content')
    </main>

    @include('components.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/waypoints.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/swiper-bundle.js')}}"></script>
    <script src="{{asset('assets/js/slick.js')}}"></script>
    <script src="{{asset('assets/js/magnific-popup.js')}}"></script>
    <script src="{{asset('assets/js/nice-select.js')}}"></script>
    <script src="{{asset('assets/js/counterup.js')}}"></script>
    <script src="{{asset('assets/js/wow.js')}}"></script>
    <script src="{{asset('assets/js/isotope-pkgd.js')}}"></script>
    <script src="{{asset('assets/js/imagesloaded-pkgd.js')}}"></script>
    <script src="{{asset('assets/js/countdown.js')}}"></script>
    <script src="{{asset('assets/js/ajax-form.js')}}"></script>
    <script src="{{asset('assets/js/meanmenu.js')}}"></script>
    <script src="{{asset('assets/js/jquery.knob.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.js-select-basic-single').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#province-select').change(function() {
                var provinceId = $(this).val();
                if (provinceId) {
                    $.ajax({
                        url: "{{ route('districts.byProvince') }}",
                        type: 'GET',
                        data: {
                            province_id: provinceId
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('#district-select').empty();
                            $('#ward-select').empty(); // Clear ward select when province changes
                            $.each(data, function(key, district) {
                                $('#district-select').append('<option value="' + district.code + '" data-name="' + district.name + '" >' + district.full_name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#district-select').empty();
                    $('#ward-select').empty();
                }
            });



            $('#district-select').change(function() {
                var districtId = $(this).val();
                if (districtId) {
                    $.ajax({
                        url: "{{ route('wards.byDistrict') }}",
                        type: 'GET',
                        data: {
                            district_id: districtId
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('#ward-select').empty();
                            $.each(data, function(key, ward) {
                                $('#ward-select').append('<option value="' + ward.code + '" data-name="' + ward.name + '">' + ward.full_name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#ward-select').empty();
                }
            });
        });
    </script>

    <script src="{{asset('assets/js/checkout.js')}}"></script>




</body>

</html>