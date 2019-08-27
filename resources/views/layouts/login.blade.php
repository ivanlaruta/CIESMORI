<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='shortcut icon' type='image/x-icon' href='{{URL::asset('favicon.ico')}}' />
    <title>CIESMORI</title>

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
    <!-- Custom Theme Style -->
    <link href="{{asset('gentelella-master/build/css/custom.min.css')}}" rel="stylesheet">
    <!-- animate.css -->
    <link href="{{asset('animate.css/animate.min.css')}}" rel="stylesheet">


  </head>
    <body class="login">
    {{-- <div class="animated bounceInLeft"> --}}
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper" >
        <div class="animate form login_form">
          <section class="login_content">
            @yield('content')
            </section>
        </div>
       </div>
    {{-- </div> --}}
  </body>
  </html>