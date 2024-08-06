<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>@yield('title', 'Dasboard')</title>
<link rel="shortcut icon" href="{{ asset('assets/img/swathinfavicon.png') }}">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/feather.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/owl-carousel/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style1.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.css') }}">
<link rel="stylesheet" href="{{ asset('assets/toastr/css/toastr.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


@yield('styles')
@stack('styles')
@yield('head')
@stack('head')
