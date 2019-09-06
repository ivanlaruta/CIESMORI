@extends('layouts.main_nolog')

@section('content')

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Registro de Encuestadores</h3>
      </div>

      <div class="title_right">
         <a href="{{ route('inicio') }}" class="btn btn-link pull-right"> Cancelar <i class="fa fa-btn fa-sign-out"  ></i>
        </a>
      </div>

    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class=" col-md-10 col-sm-10 col-xs-12 col-md-offset-1 contenido"></div>

          
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
@endsection

@section('scripts')

<script type="text/javascript">


    var content = $(".contenido");
    generar();

  function generar() {
   cargar_formulario();
  };

  function cargar_formulario (){
      $.ajax({
        type: "GET",
        cache: false,
        dataType: "html",
        url: "{{ route('administracion.encuestadores.create.form')}}",
        
        success: function(dataResult)
        {
          content.html(dataResult); 
        },
      error: function(jqXHR, exception)
      {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
        alert(msg);
        NProgress.done();
      }
      });
    };

</script>

@endsection