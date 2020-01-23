<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/')}}assets/images/logodoang_soerja.png">
    <title>ROOF-INNO</title>
    <!-- chartist CSS -->
    <link href="{{url('/')}}assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="{{url('/')}}assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="{{url('/')}}assets/dist/js/pages/chartist/chartist-init.css" rel="stylesheet">

    <!--c3 CSS -->
    <link href="{{url('/')}}assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!-- Place your kit's code here -->
    <script src="https://kit.fontawesome.com/7fe2999734.js"></script>
    <!-- font awesome CSS -->
    <link href="{{url('/')}}assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"  integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" rel="stylesheet" >
    <!-- Custom CSS -->
    <link href="{{url('/')}}assets/dist/css/style.min.css" rel="stylesheet">
    <link href="{{url('/')}}assets/extra-libs/DataTables/datatables.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{url('/')}}assets/extensions/dataTables.colVis.css" />
    <link type="text/css" rel="stylesheet" href="{{url('/')}}assets/extensions/dataTables.tableTools.css" />
    <link href="{{url('/')}}assets/extra-libs/toastr0/build/toastr.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{url('/')}}assets/libs/rickshaw/rickshaw.css" />

    <script src="{{url('/')}}assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{url('/')}}assets/libs/d3/d3.min.js"></script>
    <script src="{{url('/')}}assets/libs/d3/d3.v3.js"></script>
    <script src="{{url('/')}}assets/libs/rickshaw/rickshaw.min.js"></script>
    <script src="{{url('/')}}assets/js/moment-with-locales.js"></script>
    <style media="screen">
      .ct-point{stroke-width: 5px;}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @yield('header')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @yield('sidemenu')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
          @yield('content')
          <footer class="footer text-center">
             Designed with <i class="fas fa-heart" style="color: red"></i> by <a href="{{url('/')}}" style="color: black">roof-inno</a>
          </footer>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{url('/')}}assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{url('/')}}assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="{{url('/')}}assets/dist/js/app.min.js"></script>
    <script src="{{url('/')}}assets/dist/js/app.init.js"></script>
    <script src="{{url('/')}}assets/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{url('/')}}assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="{{url('/')}}assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="{{url('/')}}assets/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{url('/')}}assets/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="{{url('/')}}assets/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="{{url('/')}}assets/extra-libs/toastr0/build/toastr.min.js"></script>
    <script src="{{url('/')}}assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="{{url('/')}}assets/extensions/ColVis/js/dataTables.colVis.min.js"></script>
    <script src="{{url('/')}}assets/extensions/TableTools/js/dataTables.tableTools.js"></script>

    <script src="{{url('/')}}assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="{{url('/')}}assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="{{url('/')}}assets/extra-libs/c3/d3.min.js"></script>
    <script src="{{url('/')}}assets/extra-libs/c3/c3.min.js"></script>
    <script src="{{url('/')}}assets/libs/chart.js/dist/Chart.min.js"></script>
    <script src="{{url('/')}}assets/libs/gaugeJS/dist/gauge.min.js"></script>
    <script src="{{url('/')}}assets/extra-libs/c3/d3.min.js"></script>
    <script src="{{url('/')}}assets/extra-libs/c3/c3.min.js"></script>
    <script src="{{url('/')}}assets/libs/chart.js/dist/Chart.min.js"></script>
    <script src="{{url('/')}}assets/libs/gaugeJS/dist/gauge.min.js"></script>
    <script src="{{url('/')}}assets/libs/flot/excanvas.min.js"></script>
    <script src="{{url('/')}}assets/libs/flot/jquery.flot.js"></script>
    <script src="{{url('/')}}assets/libs/jquery.flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="{{url('/')}}assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{url('/')}}assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{url('/')}}assets/dist/js/pages/dashboards/dashboard2.js"></script>
    <script src="{{url('/')}}assets/dist/js/pages/dashboards/dashboard9.js"></script>
    <script src="{{url('/')}}assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>


    <script src="{{url('/')}}assets/libs/echarts/dist/echarts-en.min.js"></script>

    <script src="{{url('/')}}assets/dist/js/pages/dashboards/dashboard1monitor.js"></script>
    <script src="{{url('/')}}assets/dist/js/pages/dashboards/dashboard1mingguan.js"></script>
    <script src="{{url('/')}}assets/dist/js/pages/dashboards/dashboardpenghematan.js"></script>
    <script src="{{url('/')}}assets/dist/js/pages/dashboards/dashboardpenjadwalan.js"></script>
    <script src="{{url('/')}}assets/dist/js/pages/dashboards/dashboardperforma.js"></script>

    <script src="{{url('/')}}assets/dist/js/pages/dashboards/dashboard1bulanan.js"></script>


    <script src="{{url('/')}}assets/dist/js/pages/dashboards/dashboardkonsumsimonitor.js"></script>
    <script src="{{url('/')}}assets/dist/js/pages/dashboards/dashboardkonsumsi.js"></script>
    <!-- DATE PICKER -->
    <script src="{{url('/')}}assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script>
    // Date Picker
    jQuery('.mydatepicker, #datepicker, .input-group.date').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({
        todayHighlight: true
    });
    </script>

</body>

</html>
