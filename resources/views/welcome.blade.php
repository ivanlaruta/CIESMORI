<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CIESMORI</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <meta charset="utf-8">
        <title>CSWEB Bootstrap Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicons -->
        <link href="{{asset('Avilon/img/favicon.png')}}" rel="icon">
        <link href="{{asset('Avilon/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

        <!-- Bootstrap CSS File -->
        <link href="{{asset('Avilon/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Libraries CSS Files -->
        <link href="{{asset('Avilon/lib/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('Avilon/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('Avilon/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
        <link href="{{asset('Avilon/lib/magnific-popup/magnific-popup.css')}}" rel="stylesheet">

        <!-- Main Stylesheet File -->
        <link href="{{asset('Avilon/css/style.css')}}" rel="stylesheet">


    </head>
    <body>
    <header id="header">
  <div class="container">

    <div id="logo" class="pull-left">
      <img src="{{asset('Avilon/img/image002ant.png')}}"/>
    </div>

  </div>
</header><!-- #header -->

<!--==========================
  Intro Section
============================-->
<section id="intro">

            <div class="intro-text">
              <h2>Bienvenidos al sistema CSWEB</h2>
              <div>
              <a href="{{ route('administracion.encuestadores.create.nolog_form') }}" class="btn-get-started scrollto">Registrarse</a>
              <a href="{{ route('login') }}" class="btn-get-started scrollto">Ingresar</a>
              </div>
            </div>

            <div class="product-screens">

              <div class="product-screen-1 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.6s">
                <img src="{{asset('Avilon/img/product-screen-1.png')}}" alt="">
              </div>

              <div class="product-screen-2 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.6s">
                <img src="{{asset('Avilon/img/product-screen-2.png')}}" alt="">
              </div>

              <div class="product-screen-3 wow fadeInUp" data-wow-duration="0.6s">
                <img src="{{asset('Avilon/img/product-screen-3.png')}}" alt="">
              </div>

            </div>

          </section><!-- #intro -->

          <main id="main">

          <footer id="footer">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 text-lg-center text-center">
                  <div class="copyright">
                    &copy; Copyright <strong>CIESMORI</strong>. Todos los derechos reservados
                  </div>
                   <div class="credits">
                  </div>
                </div>

              </div>
            </div>
          </footer><!-- #footer -->

          <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

          <!-- JavaScript Libraries -->
          <script src="{{asset('Avilon/lib/jquery/jquery.min.js')}}"></script>
          <script src="{{asset('Avilon/lib/jquery/jquery-migrate.min.js')}}"></script>
          <script src="{{asset('Avilon/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
          <script src="{{asset('Avilon/lib/easing/easing.min.js')}}"></script>
          <script src="{{asset('Avilon/lib/wow/wow.min.js')}}"></script>
          <script src="{{asset('Avilon/lib/superfish/hoverIntent.js')}}"></script>
          <script src="{{asset('Avilon/lib/superfish/superfish.min.js')}}"></script>
          <script src="{{asset('Avilon/lib/magnific-popup/magnific-popup.min.js')}}"></script>

          <!-- Contact Form JavaScript File -->
          <script src="{{asset('Avilon/contactform/contactform.js')}}"></script>

          <!-- Template Main Javascript File -->
          <script src="{{asset('Avilon/js/main.js')}}"></script>







      <!-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('session') }}">Inicio</a>
                    @else
                        @if (Route::has('register'))
                            <a href="{{ route('administracion.encuestadores.create.nolog_form') }}">Registrarse</a>
                        @endif

                        <a href="{{ route('login') }}">Ingresar</a>

                    @endauth
                </div>
            @endif

        </div> -->


 @if (!session('mensaje')==null)
    <script type="text/javascript">
        var mensaje='{{session('mensaje')}}';
            alert(mensaje);

    </script>
    @endif

    </body>
</html>
