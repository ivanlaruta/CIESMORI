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
                          <a href="#" class="btn btn-success btn-xs btn-block btn_ver" id_encuesta = '{{$det->id}}'  >
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
              <a href="#" class="btn btn-primary  btn_volver" data-toggle="tooltip" data-placement="bottom" title="Volver a la lista de encuestas">
                <span class="fa fa-arrow-circle-left fa-lg"></span> 
              </a>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".campos_tabla">editar campos</button>
              <div class="modal fade campos_tabla"  role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog ">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Lista de Campos</h4>
                        </div>
                        <div class="modal-body">
                          
                          <p>Por defecto se seleccionaron todos los campos, Por favor selccione solo los campos que desea ver en el reporte</p>
                          <div class="checkbox">
                          @for($i = 0; $i < sizeof($campos_tabla); $i++) 
                            <label>
                              <input type="checkbox" class="flat" value="{{$campos_tabla[$i]->Field}}" name="campos_tabla"> {{$campos_tabla[$i]->Field}}
                            </label>
                            <br>
                          @endfor
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

