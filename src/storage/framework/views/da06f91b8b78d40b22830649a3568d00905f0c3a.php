<!DOCTYPE html>
<html lang="en" ng-app="app" ng-controller="mainController as mainCtrl">
<head>
  <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
      setTimeout(function(){
        $('#page-loading').fadeOut();
        $('#container').show();
      }, 500);
    });
  </script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Home</title>

  <!-- Bootstrap CSS -->
  <link href="<?php echo asset('assets/backend/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="<?php echo asset('assets/backend/css/bootstrap-theme.css'); ?>" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="<?php echo asset('assets/backend/css/elegant-icons-style.css'); ?>" rel="stylesheet" />
  <link href="<?php echo asset('assets/backend/css/font-awesome.min.css'); ?>" rel="stylesheet" />    
  <!-- full calendar css-->
  <link href="<?php echo asset('assets/backend/fullcalendar/fullcalendar/bootstrap-fullcalendar.css'); ?>" rel="stylesheet" />
  <link href="<?php echo asset('assets/backend/fullcalendar/fullcalendar/fullcalendar.css'); ?>" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="<?php echo asset('assets/backend/jquery-easy-pie-chart/jquery.easy-pie-chart.css'); ?>" rel="stylesheet" type="text/css" media="screen"/>
  <!-- owl carousel -->
  <link rel="stylesheet" href="<?php echo asset('assets/backend/css/owl.carousel.css'); ?>" type="text/css">
  <link href="<?php echo asset('assets/backend/css/jquery-jvectormap-1.2.2.css'); ?>" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="<?php echo asset('assets/backend/css/fullcalendar.css'); ?>">
  <link href="<?php echo asset('assets/backend/css/widgets.css'); ?>" rel="stylesheet">
  <link href="<?php echo asset('assets/backend/css/style.css'); ?>" rel="stylesheet">
  <link href="<?php echo asset('assets/backend/css/style-responsive.css'); ?>" rel="stylesheet" />
  <link href="<?php echo asset('assets/backend/css/xcharts.min.css'); ?>" rel=" stylesheet">	
  <link href="<?php echo asset('assets/backend/css/jquery-ui-1.10.4.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo asset('assets/backend/css/icomoon/styles.css'); ?>" rel="stylesheet">
  <link href="<?php echo asset('assets/backend/css/sweetalert.css'); ?>" rel="stylesheet">
  <?php echo $__env->yieldContent('css'); ?>
</head>
<body>
<div id="page-loading" style="position: fixed;z-index: 999999;width: 100%;height: 100%;background: #1a2732;);color:white;text-align: center;vertical-align: middle;">
    <div style="position: fixed;left: 0;right: 0;top: 0;bottom: 0;height:120px;width:120px;margin:auto">
        <img src="/assets/images/admin/preload.svg" style="margin:0 auto;display:block;"> 
        <p align="center">กำลังโหลด . . .</p>
    </div>
</div>
 <section id="container">
   
  <?php echo $__env->make('admin.layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->make('admin.layout.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->make('admin.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
</section>

<!-- javascripts -->
<script src="<?php echo asset('assets/backend/js/jquery.js'); ?>"></script>
<script src="<?php echo asset('assets/backend/js/jquery-ui-1.10.4.min.js'); ?>"></script>
<script src="<?php echo asset('assets/backend/js/jquery-1.8.3.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/backend/js/jquery-ui-1.9.2.custom.min.js'); ?>"></script>

<!-- bootstrap -->
<script src="<?php echo asset('assets/backend/js/bootstrap.min.js'); ?>"></script>

<!-- nice scroll -->
<script src="<?php echo asset('assets/backend/js/jquery.scrollTo.min.js'); ?>"></script>
<script src="<?php echo asset('assets/backend/js/jquery.nicescroll.js'); ?>" type="text/javascript"></script>

<!-- charts scripts -->
<script src="<?php echo asset('assets/backend/jquery-knob/js/jquery.knob.js'); ?>"></script>
<script src="<?php echo asset('assets/backend/js/jquery.sparkline.js'); ?>" type="text/javascript"></script>
<script src="<?php echo asset('assets/backend/jquery-easy-pie-chart/jquery.easy-pie-chart.js'); ?>"></script>
<script src="<?php echo asset('assets/backend/js/owl.carousel.js'); ?>" ></script>

<!-- jQuery full calendar -->
<script src="<?php echo asset('assets/backend/js/fullcalendar.min.js'); ?>"></script> <!-- Full Google Calendar - Calendar -->
<script src="<?php echo asset('assets/backend/fullcalendar/fullcalendar/fullcalendar.js'); ?>"></script>
<!--script for this page only-->
<script src="<?php echo asset('assets/backend/js/calendar-custom.js'); ?>"></script>
<script src="<?php echo asset('assets/backend/js/jquery.rateit.min.js'); ?>"></script>
<!-- custom select -->
<script src="<?php echo asset('assets/backend/js/jquery.customSelect.min.js'); ?>" ></script>
<script src="<?php echo asset('assets/backend/chart-master/Chart.js'); ?>"></script>

<!--custome script for all page-->
<script src="<?php echo asset('assets/backend/js/scripts.js'); ?>"></script>
<!-- custom script for this page-->
<script src="<?php echo asset('assets/backend/js/sparkline-chart.js'); ?>"></script>
<script src="<?php echo asset('assets/backend/js/easy-pie-chart.js'); ?>"></script>
<script src="<?php echo asset('assets/backend/js/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
<script src="<?php echo asset('assets/backend/js/jquery-jvectormap-world-mill-en.js'); ?>"></script>
<script src="<?php echo asset('assets/backend/js/xcharts.min.js'); ?>"></script>
<script src="<?php echo asset('assets/backend/js/jquery.autosize.min.js'); ?>"></script>
<script src="<?php echo asset('assets/backend/js/jquery.placeholder.min.js'); ?>"></script>
<script src="<?php echo asset('assets/backend/js/gdp-data.js'); ?>"></script>	
<script src="<?php echo asset('assets/backend/js/morris.min.js'); ?>"></script>
<script src="<?php echo asset('assets/backend/js/sparklines.js'); ?>"></script>	
<script src="<?php echo asset('assets/backend/js/charts.js'); ?>"></script>
<script src="<?php echo asset('assets/backend/js/jquery.slimscroll.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/backend/js/sweetalert.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/js/angular.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/backend/angular/app.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/backend/angular/service.js'); ?>"></script>
<script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation : true,
          slideSpeed : 300,
          paginationSpeed : 400,
          singleItem : true

        });
      });

      //custom select box

      $(function(){
        $('select.styled').customSelect();
      });
      
      /* ---------- Map ---------- */
      $(function(){
       $('#map').vectorMap({
         map: 'world_mill_en',
         series: {
           regions: [{
             values: gdpData,
             scale: ['#000', '#000'],
             normalizeFunction: 'polynomial'
           }]
         },
         backgroundColor: '#eef3f7',
         onLabelShow: function(e, el, code){
           el.html(el.html()+' (GDP - '+gdpData[code]+')');
         }
       });
     });



   </script>
   <?php echo $__env->yieldContent('javascript'); ?>
 </body>

 </html>