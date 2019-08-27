    <!DOCTYPE html>
    <html lang="{{ config('app.locale') }}">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='shortcut icon' type='image/x-icon' href='{{URL::asset('favicon.ico')}}' />
        <title> CIESMORI </title>

        <!-- Bootstrap -->

        <link href="{{asset('gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{asset('gentelella-master/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{asset('gentelella-master/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
        <!-- bootstrap-progressbar -->
        <link href="{{asset('gentelella-master/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
        <!-- bootstrap-daterangepicker -->
        <link href="{{asset('gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
        <!-- Switchery -->
        <link href="{{asset('gentelella-master/vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
        <!-- starrr -->
        <link href="{{asset('gentelella-master/vendors/starrr/dist/starrr.css')}}" rel="stylesheet">
        <!-- bootstrap-daterangepicker -->
        <link href="{{asset('gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
        
        
        <!-- PNotify -->
        <link href="{{asset('gentelella-master/vendors/pnotify/dist/pnotify.css')}}" rel="stylesheet">
        <link href="{{asset('gentelella-master/vendors/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
        <link href="{{asset('gentelella-master/vendors/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">
        <!-- Select2 -->
        <link href="{{asset('gentelella-master/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
        
        <!-- iCheck -->
    <link href="{{asset('gentelella-master/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="{{asset('gentelella-master/vendors/google-code-prettify/bin/prettify.min.css')}}" rel="stylesheet">

        <!-- bootstrap-daterangepicker -->
        <link href="{{asset('gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
        <!-- Ion.RangeSlider -->
        <link href="{{asset('gentelella-master/vendors/normalize-css/normalize.css')}}" rel="stylesheet">
        <link href="{{asset('gentelella-master/vendors/ion.rangeSlider/css/ion.rangeSlider.css')}}" rel="stylesheet">
        <link href="{{asset('gentelella-master/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
        <!-- Bootstrap Colorpicker -->
        <link href="{{asset('gentelella-master/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">

        <link href="{{asset('gentelella-master/vendors/cropper/dist/cropper.min.css')}}" rel="stylesheet">

        <!-- Dtatables -->
        <link href="{{asset('gentelella-master/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('gentelella-master/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('gentelella-master/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('gentelella-master/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('gentelella-master/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">


        
        <!-- Custom Theme Style -->
        <link href="{{asset('gentelella-master/build/css/custom.min.css')}}" rel="stylesheet">


        <!-- animate.css -->
        <link href="{{asset('animate.css/animate.min.css')}}" rel="stylesheet">
    </head>

    <body >

        <div class="container body">
            <div class="main_container">

                


                @yield('content')


                <!-- /page content -->



               

            </div>
        </div>


        <!-- jQuery -->

        <script src="{{asset('gentelella-master/vendors/jquery/dist/jquery.min.js')}}"></script>
        <!-- Bootstrap -->
        <script src="{{asset('gentelella-master/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <!-- FastClick -->
        <script src="{{asset('gentelella-master/vendors/fastclick/lib/fastclick.js')}}"></script>
        <!-- NProgress -->
        <script src="{{asset('gentelella-master/vendors/nprogress/nprogress.js')}}"></script>
        <!-- Chart.js -->
        <script src="{{asset('gentelella-master/vendors/Chart.js/dist/Chart.min.js')}}"></script>
        <!-- jQuery Sparklines -->
        <script src="{{asset('gentelella-master/vendors/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
        <!-- morris.js -->
        <script src="{{asset('gentelella-master/vendors/raphael/raphael.min.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/morris.js/morris.min.js')}}"></script>
        <!-- gauge.js -->
        <script src="{{asset('gentelella-master/vendors/gauge.js/dist/gauge.min.js')}}"></script>
        <!-- bootstrap-progressbar -->
        <script src="{{asset('gentelella-master/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
        <!-- Skycons -->
        <script src="{{asset('gentelella-master/vendors/skycons/skycons.js')}}"></script>
        <!-- Flot -->
        <script src="{{asset('gentelella-master/vendors/Flot/jquery.flot.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/Flot/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/Flot/jquery.flot.time.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/Flot/jquery.flot.stack.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/Flot/jquery.flot.resize.js')}}"></script>
        <!-- Flot plugins -->
        <script src="{{asset('gentelella-master/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/flot.curvedlines/curvedLines.js')}}"></script>
        <!-- DateJS -->
        <script src="{{asset('gentelella-master/vendors/DateJS/build/date.js')}}"></script>

    
        <!-- bootstrap-daterangepicker -->
        <script src="{{asset('gentelella-master/vendors/moment/min/moment.min.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
        <!-- Ion.RangeSlider -->
        <script src="{{asset('gentelella-master/vendors/ion.rangeSlider/js/ion.rangeSlider.min.js')}}"></script>
        <!-- Bootstrap Colorpicker -->
        <script src="{{asset('gentelella-master/vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
        <!-- jquery.inputmask -->
        <script src="{{asset('gentelella-master/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
        <!-- jQuery Knob -->
        <script src="{{asset('gentelella-master/vendors/jquery-knob/dist/jquery.knob.min.js')}}"></script>
        <!-- Cropper -->
        {{-- <script src="{{asset('gentelella-master/vendors/cropper/dist/cropper.min.js')}}"></script> --}}

        <!-- PNotify -->
        <script src="{{asset('gentelella-master/vendors/pnotify/dist/pnotify.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/pnotify/dist/pnotify.buttons.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/pnotify/dist/pnotify.nonblock.js')}}"></script>


        <!-- Datatables -->
        <script src="{{asset('gentelella-master/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/jszip/dist/jszip.min.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>

        <!-- Switchery -->
        <script src="{{asset('gentelella-master/vendors/switchery/dist/switchery.min.js')}}"></script>
        <!-- Select2 -->
        <script src="{{asset('gentelella-master/vendors/select2/dist/js/select2.full.min.js')}}"></script>
        <!-- iCheck -->
        <script src="{{asset('gentelella-master/vendors/iCheck/icheck.min.js')}}"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="{{asset('gentelella-master/vendors/moment/min/moment.min.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
        <!-- bootstrap-wysiwyg -->
        <script src="{{asset('gentelella-master/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/google-code-prettify/src/prettify.js')}}"></script>
        <!-- jQuery Tags Input -->
        <script src="{{asset('gentelella-master/vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>
    
        <!-- Parsley -->
        <script src="{{asset('gentelella-master/vendors/parsleyjs/dist/parsley.min.js')}}"></script>

        {{-- <script src="{{asset('gentelella-master/vendors/parsleyjs/dist/parsley.min.js')}}"></script> --}}
        <!-- Autosize -->
        <script src="{{asset('gentelella-master/vendors/autosize/dist/autosize.min.js')}}"></script>


    <!-- validator -->
    <script src="{{asset('gentelella-master/vendors/validator/validator.js')}}"></script>

    
        <!-- ECharts -->
        <script src="{{asset('gentelella-master/vendors/echarts/dist/echarts.min.js')}}"></script>
        <script src="{{asset('gentelella-master/vendors/echarts/map/js/world.js')}}"></script>

        <!-- jQuery Smart Wizard -->
        <script src="{{asset('gentelella-master/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}"></script>

        <!-- Select2 -->
        <script src="{{asset('gentelella-master/vendors/select2/dist/js/select2.full.min.js')}}"></script>
        



        <script src="{{asset('js/custom.js')}}"></script>

    @yield('scripts')






    </body>

    </html>


