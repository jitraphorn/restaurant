<!DOCTYPE html>
<html lang="en" ng-app="app" ng-controller="mainControl as main">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - title</title>

    <link href="<?php echo asset('https://fonts.googleapis.com/css?family=Lato:300,400,700'); ?>" rel="stylesheet">
    <link href="<?php echo asset('https://fonts.googleapis.com/css?family=Kaushan+Script'); ?>" rel="stylesheet">

    <!-- Animate.css -->
    <link href="<?php echo asset('assets/css/animate.css'); ?>" rel="stylesheet">
    <!-- Icomoon Icon Fonts-->
    <link href="<?php echo asset('assets/css/icomoon.css'); ?>" rel="stylesheet">
    <!-- Themify Icons-->
    <link href="<?php echo asset('assets/css/themify-icons.css'); ?>" rel="stylesheet">
    <!-- Bootstrap  -->
    <link href="<?php echo asset('assets/css/bootstrap.css'); ?>" rel="stylesheet">
    <!-- Magnific Popup -->
    <link href="<?php echo asset('assets/css/magnific-popup.css'); ?>" rel="stylesheet">
    <!-- Bootstrap DateTimePicker -->
    <link href="<?php echo asset('assets/css/bootstrap-datetimepicker.min.css'); ?>" rel="stylesheet">
    <!-- Owl Carousel  -->
    <link href="<?php echo asset('assets/css/owl.carousel.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo asset('assets/css/owl.theme.default.min.css'); ?>" rel="stylesheet">
    <!-- Theme style  -->
    <link href="<?php echo asset('assets/css/style.css'); ?>" rel="stylesheet">
    <!-- Modernizr JS -->
    <script type="text/javascript" src="<?php echo asset('assets/js/modernizr-2.6.2.min.js'); ?>"></script>

    <?php echo $__env->yieldContent('css'); ?>

</head>
<body>
    <div class="gtco-loader"></div>
        <div id="page">
            <?php echo $__env->make('layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->make('layout.subscribe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>

    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo asset('assets/js/jquery.min.js'); ?>"></script>
    <!-- jQuery Easing -->
    <script type="text/javascript" src="<?php echo asset('assets/js/jquery.easing.1.3.js'); ?>"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="<?php echo asset('assets/js/bootstrap.min.js'); ?>"></script>
    <!-- Waypoints -->
    <script type="text/javascript" src="<?php echo asset('assets/js/jquery.waypoints.min.js'); ?>"></script>
    <!-- Carousel -->
    <script type="text/javascript" src="<?php echo asset('assets/js/owl.carousel.min.js'); ?>"></script>
    <!-- countTo -->
    <script type="text/javascript" src="<?php echo asset('assets/js/jquery.countTo.js'); ?>"></script>

    <!-- Stellar Parallax -->
    <script type="text/javascript" src="<?php echo asset('assets/js/jquery.stellar.min.js'); ?>"></script>

    <!-- Magnific Popup -->
    <script type="text/javascript" src="<?php echo asset('assets/js/jquery.magnific-popup.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('assets/js/magnific-popup-options.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo asset('assets/js/moment.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('assets/js/bootstrap-datetimepicker.min.js'); ?>"></script>


    <!-- Main -->
    <script type="text/javascript" src="<?php echo asset('assets/js/main.js'); ?>"></script>
    <?php echo $__env->yieldContent('javascript'); ?>
</body>

</html>