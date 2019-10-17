    <!DOCTYPE html>
    <html>

    <head>
   
        <link rel='shortcut icon' type='image/x-icon' href='{{URL::asset('favicon.ico')}}' />
        <title> CIESMORI </title>

        <!-- Bootstrap -->

        <link href="{{asset('gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{asset('gentelella-master/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
       
        <!-- Custom Theme Style -->
        <link href="{{asset('gentelella-master/build/css/custom.min.css')}}" rel="stylesheet">


    @yield('cabecera')
    </head>

    <body class="nav-md ">
    <style type="text/css">
         tfoot {
    display: table-header-group;
    background: #9aadc0;
  }

      .mimodal {
      display:    none;
      position:   fixed;
      z-index:    1000;
      top:        0;
      left:       0;
      text-align: center;
      height:     100%;
      justify-content: center;
      align-items: center; 
      width:      100%;
      background: rgba( 255, 255, 255, .8 ) no-repeat;
  }
  body.loading .mimodal {
      overflow: hidden;   
  }
  body.loading .mimodal {
      display: flex;
  }
    </style>
        <div class="container body">
            <div class="main_container">

                <!-- sidebar menu -->
                @include('partials.sidebar')
                <!-- /sidebar menu -->
<div class="mimodal">
                <div class="">
                     <i class="fa fa-spinner fa-spin fa-10x" style="font-size:60px"></i>
                      <h4> Estamos trabajando en su solicitud....</h4>
                </div>
              </div>
                <!-- top navigation -->
                @include('partials.top')

                <!-- /top navigation -->

                <!-- page content -->


                @yield('content')


                <!-- /page content -->



                <!-- footer content -->
                @include('partials.footer')
                <!-- /footer content -->

                <div class="modal fade modal_generico " id="modal_generico" role="dialog" data-backdrop="static">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content contenido_generico">
                      </div>
                    </div>
                  </div>

            </div>
        </div>


        <!-- jQuery -->

        <script src="{{asset('gentelella-master/vendors/jquery/dist/jquery.min.js')}}"></script>
        <!-- Bootstrap -->
        <script src="{{asset('gentelella-master/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
   

        <script src="{{asset('js/custom.js')}}"></script>

    @yield('scripts')
<script type="text/javascript">
    $body = $("body");

$(document).on({
    ajaxStart: function() { $body.addClass("loading");    },
    ajaxStop: function() { $body.removeClass("loading"); }    
});
</script>





    </body>

    </html>


