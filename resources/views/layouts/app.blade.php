<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lingua</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Lingua project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
    <link href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
    @if(Request::is('lessons/*'))
    <link rel="stylesheet" type="text/css" href="{{asset('css/courses.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/courses_responsive.css')}}">
    @endif
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <div class="super_container">

        <!-- Header -->
        @include('layouts.header')



        <!-- Home -->
        @yield('content')


        <!-- Footer -->

        @include('layouts.footer')
    </div>

    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('css/bootstrap4/popper.js')}}"></script>
    <script src="{{asset('css/bootstrap4/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
    <script src="{{asset('plugins/easing/easing.js')}}"></script>
    @if(Request::is('lessons/*'))
    <script src="{{asset('js/courses.js')}}"></script>
    @endif
    <script src="{{asset('js/app_custom.js')}}"></script>
</body>

</html>
