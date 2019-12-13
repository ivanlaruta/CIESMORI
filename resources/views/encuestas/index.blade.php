@extends('layouts.main')

@section('content')
<style type="text/css" media="screen">

</style>

<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">


            <h2>Lista de encuestas</h2>
            @if(Auth::user()->rol->descripcion != 'CLIENTE')
            <div class="pull-right" >
              <a  href="#" class="btn btn-success btn_nuevo " data-toggle="tooltip" data-placement="bottom" title="Agregar Nuevo" ><i class="fa fa-plus"></i></a>

            </div>
            @endif
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="cabecera">
              <div class="table-responsive">
              <table class="table table-bordered table-responsive table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre asignado</th>
                    <th>Base de datos</th>
                    <th>Tabla</th>

                    <th>Carpeta Audios</th>
                    <th>Carpeta Imagenes</th>
                    <th>Ultima Actualizacion</th>
                    <th style="width: 1%">Obs</th>
                    <th style="width: 1%">Libro de Datos</th>
                    <th style="width: 1%">Meta del Estudio</th>
                    <th style="width: 1%">registros</th>
                    @if(Auth::user()->rol->descripcion != 'CLIENTE')
                    <th style="width: 1%">Opciones</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @foreach($encuesta as $det)
                  <tr>
                    <td>{{$det->id}}</td>
                    <td>{{$det->nombre}}</td>
                    <td>{{$det->nombre_db}}</td>
                    <td>{{$det->nombre_tabla}}</td>
                    <td>{{$det->carpeta_audios}}</td>
                    <td>{{$det->carpeta_imagenes}}</td>
                    <td>{{$det->updated_at}}</td>
                    <td>{{$det->observacion}}</td>
                    <td align="center">
                        <a href="#" class="btn btn-success btn-xs btn_libro" id_encuesta = '{{$det->id}}'  title="Libro de datos">
                          <span class="fa fa-book fa-lg"></span>
                        </a>
                    </td>

                    <td>{{$det->meta_estudio}}</td>

                    <td align="right">
                      <div class="btn-group" role="group" >
                        <a href="#" class="btn btn-primary btn-xs btn_ver" id_encuesta = '{{$det->id}}'  >
                           {{$det->num_registros()}} <span class="fa fa-arrow-circle-right fa-lg"></span>
                        </a>
                      </div>
                    </td>
                    @if(Auth::user()->rol->descripcion != 'CLIENTE')
                    <td align="center">
                        <form method="get" action="{{  route('encuesta.actualizar') }}" >
                          {{ csrf_field() }}
                          <input type="hidden" id="id_encuesta" name="id_encuesta" value="{{$det->id}}">

                          <button type="submit" class="btn btn-success btn-xs btn-block btn_refresh" id="btn_eliminar_run"  title="Actualizar" onclick="func_load();"><span class="fa fa-refresh fa-lg"></span></button>
                        </form>

                        <a href="#" class="btn btn-warning btn-xs  btn_edit btn-block" id_encuesta = '{{$det->id}}'  title="Modificar">
                          <span class="fa fa-edit fa-lg"></span>
                        </a>
                        <a href="#" class="btn btn-info btn-xs  btn_ciudad btn-block" id_encuesta = '{{$det->id}}'  title="Cuota por ciudad">
                          <span class="fa fa-map fa-lg"></span>
                        </a>
                        <a href="#" class="btn btn-default btn-xs  btn_cliente btn-block" id_encuesta = '{{$det->id}}'  title="Asignar clientes">
                          <span class="fa fa-user fa-lg"></span>
                        </a>

                    </td>@endif

                  </tr>
                  @endforeach
                </tbody>
              </table>
              </div>
            </div>

            <div class="detalle">




              <a href="#" class="btn btn-primary  btn_volver" data-toggle="tooltip" data-placement="bottom" title="Volver a la lista de encuestas">
                <span class="fa fa-arrow-circle-left fa-lg"></span>
              </a>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".campos_tabla">editar campos</button>
              <div class="modal fade campos_tabla"  role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Lista de Campos</h4>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                          <p>Por defecto se obtienen todos los campos, Por favor selccione solo los campos que desea ver en el reporte</p>
                          </div>
                          <div class="row">
                            <div class="checkbox">
                            @for($i = 0; $i < sizeof($campos_tabla); $i++)
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <label>
                                  <input type="checkbox" class="flat" value="{{$campos_tabla[$i]->Field}}" name="campos_tabla"> {{$campos_tabla[$i]->Field}}
                                </label>

                              </div>
                            @endfor
                            </div>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          <button type="button" class="btn btn-primary btn_campos">Aceptar</button>
                        </div>

                      </div>
                    </div>
                  </div>

              <div class="contenido_detalle  table-responsive"></div>

            </div>

            <div class="modal fade modal_datos" id="Modal_nuevo" role="dialog" >
              <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Migracion de dato</h4>
                  </div>
                  <div class="modal-body contenido"></div>
                  <div class="modal-footer">
                    <br>
                    <button type="button" class="btn btn-block btn-default" data-dismiss="modal">Cancelar</button>

                  </div>
                </div>
              </div>
            </div>


            <div class="modal fade modal_libro_datos" id="modal_libro_datos" role="dialog" >
              <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Migración de datos</h4>
                  </div>
                  <div class="modal-body contenido_libro_datos"></div>
                  <div class="modal-footer">
                    <br>
                    <button type="button" class="btn btn-block btn-default" data-dismiss="modal">Cancelar</button>

                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade modal_datos_editar_enc" id="Modal_nuevo_editar_enc" role="dialog" >
              <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Formulario</h4>
                  </div>
                  <div class="modal-body contenido_editar_enc"></div>
                  <div class="modal-footer">
                    <br>
                    <button type="button" class="btn btn-block btn-default" data-dismiss="modal">Cancelar</button>

                  </div>
                </div>
              </div>
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


// ======================= nuevo encuesta ==============================


var btn_nuevo = $(".btn_nuevo");
  btn_nuevo.on("click",function(){
    frm_nuevo($(this));
  });
  var modalContent = $(".contenido");
  var modal=$(".modal_datos");

  var frm_nuevo = function(objeto){
    $.ajax({
      type: "GET",
      cache: false,
      dataType: "html",
      url: "{{ route('encuesta.migracion')}}",
      data: {
        formulario: "nuevo"
      },
      success: function(dataResult)
      {
        console.log(dataResult);
        modalContent.empty().html(dataResult);
        modal.modal('show');
        NProgress.done();
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

/*====================================================*/

// ======================= LIBRO DE DATOS ==============================

var btn_libro_datos = $(".btn_libro");
  btn_libro_datos.on("click",function(){
    frm_libro_datos($(this));
  });
  var modalContent = $(".contenido_libro_datos");
  var modal=$(".modal_libro_datos");

  var frm_libro_datos = function(objeto){
    $.ajax({
      type: "GET",
      cache: false,
      dataType: "html",
      url: "{{ route('encuesta.libroDatos')}}",
      data: {
        id: objeto.attr("id_encuesta")
      },
      success: function(dataResult)
      {
        console.log(dataResult);
        modalContent.empty().html(dataResult);
        modal.modal('show');
        NProgress.done();
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

/*====================================================*/
var cabecera = $(".cabecera");


// ======================= edits encuesta ==============================


var btn_edit = $(".btn_edit");
  btn_edit.on("click",function(){
    frm_edit($(this));
  });
  var modalContent_edit = $(".contenido_editar_enc");
  var modal_edit=$(".modal_datos_editar_enc");

  var frm_edit = function(objeto){
    $.ajax({
      type: "GET",
      cache: false,
      dataType: "html",
      url: "{{ route('encuesta.update_form')}}",
      data: {
        id: objeto.attr("id_encuesta")
      },
      success: function(dataResult)
      {
        console.log(dataResult);
        modalContent_edit.empty().html(dataResult);
        modal_edit.modal('show');
        NProgress.done();
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

/*====================================================*/

// ======================= cuota ciudad ==============================
var btn_ciudad = $(".btn_ciudad");
  btn_ciudad.on("click",function(){
    frm_cuota_ciudad($(this));
  });
  var modalContent_edit = $(".contenido_editar_enc");
  var modal_edit=$(".modal_datos_editar_enc");

  var frm_cuota_ciudad = function(objeto){
    $.ajax({
      type: "GET",
      cache: false,
      dataType: "html",
      url: "{{ route('encuesta.cuota_cuidad')}}",
      data: {
        id: objeto.attr("id_encuesta")
      },
      success: function(dataResult)
      {
        modalContent_edit.empty();
        console.log(dataResult);
        modalContent_edit.empty().html(dataResult);
        modal_edit.modal('show');
        NProgress.done();
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

/*====================================================*/

// ======================= asigncion cliente==============================
var btn_cliente = $(".btn_cliente");
  btn_cliente.on("click",function(){
    frm_cliente($(this));
  });
  var modalContent_edit = $(".contenido_editar_enc");
  var modal_edit=$(".modal_datos_editar_enc");

  var frm_cliente = function(objeto){
    $.ajax({
      type: "GET",
      cache: false,
      dataType: "html",
      url: "{{ route('encuesta.asigna_cliente')}}",
      data: {
        id: objeto.attr("id_encuesta")
      },
      success: function(dataResult)
      {
        console.log(dataResult);
        modalContent_edit.empty().html(dataResult);
        modal_edit.modal('show');
        NProgress.done();
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

/*====================================================*/
var cabecera = $(".cabecera");
var detalle = $(".detalle").hide();
var contenido_detalle = $(".contenido_detalle");
var modal_lista_campos = $(".campos_tabla");
var puntero_encuesta;
var lista_campos = [];

var btnVolver = $(".btn_volver");
  btnVolver.on("click",function(){
    cabecera.show();
    detalle.hide();
});

var btnVer = $(".btn_campos");
  btnVer.on("click",function(){
    modal_lista_campos.modal('toggle');
    prepara();
});

var btnVer = $(".btn_ver");
  btnVer.on("click",function(){
    cabecera.hide();
    detalle.show();
    puntero_encuesta=$(this).attr("id_encuesta");
    prepara();
});

function func_load() {
  $body.addClass("loading");
}

function prepara() {
  lista_campos = [];
            $.each($("input[name='campos_tabla']:checked"), function(){
                lista_campos.push($(this).val());
            });


  ejecuta_ajax(puntero_encuesta,lista_campos);
}

var ejecuta_ajax = function(encuesta,campos){
  $.ajax({
    type: "GET",
    cache: false,
    dataType: "html",
    url: "{{ route('encuesta.contenido_detalle')}}",
    data: {
      id_encuesta: encuesta,
      lista_campos: campos
    },
    success: function(dataResult)
    {
      contenido_detalle.empty().html(dataResult);
      aplicardatatable();
    }
  });
};


function prepara() {
  lista_campos = [];
            $.each($("input[name='campos_tabla']:checked"), function(){
                lista_campos.push($(this).val());
            });


  ejecuta_ajax(puntero_encuesta,lista_campos);
}

var ejecuta_ajax = function(encuesta,campos){
  $.ajax({
    type: "GET",
    cache: false,
    dataType: "html",
    url: "{{ route('encuesta.contenido_detalle')}}",
    data: {
      id_encuesta: encuesta,
      lista_campos: campos
    },
    success: function(dataResult)
    {
      contenido_detalle.empty().html(dataResult);
      aplicardatatable();
    }
  });
};


function aplicardatatable() {


    $('#tabla_filtrada').DataTable( { "language": {

              "sProcessing":     "Procesando...",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla",
              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix":    "",
              "sSearch":         "Buscar en Todo:",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
                  "sFirst":    "Primero",
                  "sLast":     "Último",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
              },
              "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              },
        },

        // "bLengthChange" : false,
        "dom": "Bfrti",
        // "dom": "Brti",

       "buttons": [ 'copy', 'excel'],

       "lengthMenu": [[-1], ["TODO"]],

    } );
}

</script>
@endsection
