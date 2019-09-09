@extends('layouts.main')

@section('content')

<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
           
            <h2>Lista de encuesta</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="cabecera">
              <table class="table table-bordered table-responsive table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre asiganado</th>
                    <th>Base de datos</th>
                    <th>Tabla</th>
                    <th>Observaciones</th>
                    <th>fecha migracion</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($encuesta as $det)
                  <tr>
                    <td>{{$det->id}}</td>
                    <td>{{$det->nombre}}</td>
                    <td>{{$det->nombre_db}}</td>
                    <td>{{$det->nombre_tabla}}</td>
                    <td>{{$det->observacion}}</td>
                    <td>{{$det->created_at}}</td>
                    <td align="center">
                       <div class="btn-group" role="group" >
                          <a href="#" class="btn btn-success btn-xs btn-block btn_ver" id_encuesta = '{{$det->id}}'  data-toggle="tooltip" data-placement="bottom" title="Ingresar">
                            <span class="fa fa-arrow-circle-right fa-lg"></span> 
                          </a>
                        </div>
                      </td>        
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

            <div class="detalle">
              <a href="#" class="btn btn-primary btn-xs btn_volver" data-toggle="tooltip" data-placement="bottom" title="Volver a la lista de encuestas">
                <span class="fa fa-arrow-circle-left fa-lg"></span> 
              </a>

              <div class="contenido_detalle"></div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">

var cabecera = $(".cabecera");
var detalle = $(".detalle").hide();
var contenido_detalle = $(".contenido_detalle");

var btnVolver = $(".btn_volver");
  btnVolver.on("click",function(){
    cabecera.show();
    detalle.hide();
});

var btnVer = $(".btn_ver");
  btnVer.on("click",function(){
    cabecera.hide();
    detalle.show();
    ejecuta_ajax($(this));
});

var ejecuta_ajax = function(objeto){
  $.ajax({
    type: "GET",
    cache: false,
    dataType: "html",
    url: "{{ route('encuesta.contenido_detalle')}}",
    data: {
      id_encuesta: objeto.attr("id_encuesta")
    },
    success: function(dataResult)
    {
      contenido_detalle.empty().html(dataResult);
    }
  });
};


</script>
@endsection

