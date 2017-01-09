<!DOCTYPE html>
<html lang="en" ng-app="app" ng-controller="mainController as main">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - title</title>

    <link href="{!! asset('https://fonts.googleapis.com/css?family=Lato:300,400,700') !!}" rel="stylesheet">
    <link href="{!! asset('https://fonts.googleapis.com/css?family=Kaushan+Script') !!}" rel="stylesheet">

    <!-- Animate.css -->
    <link href="{!! asset('assets/css/animate.css') !!}" rel="stylesheet">
    <!-- Icomoon Icon Fonts-->
    <link href="{!! asset('assets/css/icomoon.css') !!}" rel="stylesheet">
    <!-- Themify Icons-->
    <link href="{!! asset('assets/css/themify-icons.css') !!}" rel="stylesheet">
    <!-- Bootstrap  -->
    <link href="{!! asset('assets/css/bootstrap.css') !!}" rel="stylesheet">
    <!-- Magnific Popup -->
    <link href="{!! asset('assets/css/magnific-popup.css') !!}" rel="stylesheet">
    <!-- Bootstrap DateTimePicker -->
    <link href="{!! asset('assets/css/bootstrap-datetimepicker.min.css') !!}" rel="stylesheet">
    <!-- Owl Carousel  -->
    <link href="{!! asset('assets/css/owl.carousel.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/css/owl.theme.default.min.css') !!}" rel="stylesheet">
    <!-- Theme style  -->
    <link href="{!! asset('assets/css/style.css') !!}" rel="stylesheet">
    <!-- Modernizr JS -->
    <script type="text/javascript" src="{!! asset('assets/js/modernizr-2.6.2.min.js') !!}"></script>

    @yield('css')

</head>
<body>
    <div class="gtco-loader"></div>
        <div id="page">
            @include('layout.header')
            @yield('content')
            @include('layout.subscribe')
            @include('layout.footer')
        </div>
    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>

    <!-- jQuery -->
    <script type="text/javascript" src="{!! asset('assets/js/jquery.min.js') !!}"></script>
    <!-- jQuery Easing -->
    <script type="text/javascript" src="{!! asset('assets/js/jquery.easing.1.3.js') !!}"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="{!! asset('assets/js/bootstrap.min.js') !!}"></script>
    <!-- Waypoints -->
    <script type="text/javascript" src="{!! asset('assets/js/jquery.waypoints.min.js') !!}"></script>
    <!-- Carousel -->
    <script type="text/javascript" src="{!! asset('assets/js/owl.carousel.min.js') !!}"></script>
    <!-- countTo -->
    <script type="text/javascript" src="{!! asset('assets/js/jquery.countTo.js') !!}"></script>

    <!-- Stellar Parallax -->
    <script type="text/javascript" src="{!! asset('assets/js/jquery.stellar.min.js') !!}"></script>

    <!-- Magnific Popup -->
    <script type="text/javascript" src="{!! asset('assets/js/jquery.magnific-popup.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/js/magnific-popup-options.js') !!}"></script>

    <script type="text/javascript" src="{!! asset('assets/js/moment.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/js/bootstrap-datetimepicker.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/js/angular.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/js/angular/app.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/js/angular/service.js') !!}"></script>


    <!-- Main -->
    <script type="text/javascript" src="{!! asset('assets/js/main.js') !!}"></script>
    @yield('javascript')
</body>

</html>