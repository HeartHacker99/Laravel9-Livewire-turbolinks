<!DOCTYPE html>
<html lang="en">
<head>
{{--    <title>@yield('title')</title>--}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    {{--    <link rel="stylesheet" href="{{asset('assets/client/css/open-iconic-bootstrap.min.css')}}">--}}
    <link rel="stylesheet" href="{{asset('assets/client/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('assets/client/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/magnific-popup.css')}}">

{{--    <link rel="stylesheet" href="{{asset('assets/client/css/aos.css')}}">--}}

    <link rel="stylesheet" href="{{asset('assets/client/css/ionicons.min.css')}}">

{{--    <link rel="stylesheet" href="{{asset('assets/client/css/bootstrap-datepicker.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('assets/client/css/jquery.timepicker.css')}}">--}}

 

{{--    <link rel="stylesheet" href="{{asset('assets/client/css/flaticon.css')}}">--}}
    <link rel="stylesheet" href="{{asset('assets/client/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@4.3.2/css/bootstrap5-toggle.min.css" rel="stylesheet">

    @livewireStyles
</head>
<body class="goto-here">

<!-- start Navbar -->
<livewire:clientlayout.navbar />
<!-- End content -->


<!-- Start content -->
{{$slot}}
<!-- End content -->


<!-- Start Footer -->
<livewire:clientlayout.footer />
<!-- End Footer -->

<script src="{{asset('assets/client/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/client/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('assets/client/js/popper.min.js')}}"></script>
<script src="{{asset('assets/client/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/client/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('assets/client/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/client/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('assets/client/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/client/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/client/js/aos.js')}}"></script>
<script src="{{asset('assets/client/js/jquery.animateNumber.min.js')}}"></script>
{{--<script src="{{asset('assets/client/js/bootstrap-datepicker.js')}}"></script>--}}
<script src="{{asset('assets/client/js/scrollax.min.js')}}"></script>
{{--<script src="{{asset('assets/client/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false')}}"></script>--}}
{{--<script src="{{asset('assets/client/js/google-map.js')}}"></script>--}}
<script src="{{asset('assets/client/js/main.js')}}"></script>
@yield('checkoutScript')
@yield('clientScript')
<script src="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@4.3.2/js/bootstrap5-toggle.min.js"></script> {{-- sidebar scripts  --}}
<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.4/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
@livewireScripts
</body>
</html>
