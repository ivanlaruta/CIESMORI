@extends('layouts.main')

@section('content')

<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Registro de personal</h2>
            <div class="pull-right" >
              <a  href="#" class="btn btn-success btn_nuevo " data-toggle="tooltip" data-placement="bottom" title="Agregar Nuevo" ><i class="fa fa-plus"></i></a>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <p>Lista del personal registrado, acceda a las opciones para editar la información</p>
            <div class="table-responsive">
            <table class="table table-striped " id="datatable1">
              <thead>
                <tr>
                 <th style="width: 1%">#</th>
                 <th style="width: 25%">Datos personales</th>
                 <th style="width: 15%">Educacion y Experiencia</th>
                 <th style="width: 15%">Área de trabajo</th>
                 <th style="width: 10%">Disponibilidad</th>
                 <th style="width: 10%">Encuestas Asignadas</th>
                 <th style="width: 10%">Calificacion</th>
                 <th style="width: 10%">Estado</th>
                 <th style="width: 1%">Obs</th>
                 <th style="width: 1%">Opciones</th>
                </tr>
              </thead>
              {{-- <tbody> --}}
              @foreach($encuestadores as $det)
              <tr>
                <td>{{$det->id}}</td>
                <td>
                  <div class="col-sm-12">
                    <h5 class="brief">
                      <i>
                      <strong>
                      {{$det->persona->primer_nombre}}
                      {{$det->persona->segundo_nombre}}
                      {{$det->persona->apellido_paterno}}
                      {{$det->persona->apellido_materno}}
                      </strong>
                      </i>
                    </h5>
                    <div class="right col-xs-4 text-center">
                      <img src="{{url('/images/personas/'.$det->persona->foto->archivo
                      )}}" alt="" class="img-circle img-responsive">
                    </div>
                    <div class="left col-xs-8">
                      <ul class="list-unstyled">
                        <li><i class="fa fa-credit-card"></i> Ci: {{$det->persona->ci}} {{$det->persona->expedido->nombre_corto}} </li>
                        <li><i class="fa fa-intersex"></i> Genero: {{$det->persona->genero()}} </li>
                        <li><i class="fa fa-child"></i> Estado civil: {{$det->persona->estado_civil()}} </li>
                        <li><i class="fa fa-calendar"></i> Nacimiento: {{date("d/m/Y",strtotime($det->persona->fecha_nacimiento)) }} </li>
                        <li><i class="fa fa-phone"></i> Telefonos: {{$det->persona->telefono1}} {{$det->persona->telefono2}}</li>
                        <li><i class="fa fa-map-marker"></i> Direccion: {{$det->persona->zona}}, {{$det->persona->direccion}},{{$det->persona->ciudad->nombre}}</li>
                      </ul>
                    </div>
                  </div>
                </td>

                <td>
                  <ul class="list-unstyled">
                    <br>
                    <li><i class="fa fa-mortar-board"></i> Educacion: {{$det->persona->nivel_educacion()}}  (Nivel: {{$det->persona->nivel_curso}} ) </li>
                    <li><i class="fa fa-briefcase"></i> Empresas en las que trabajo:
                      @if ($det->lista_empresas->count() > 0)
                        @foreach ($det->lista_empresas as $empresa)
                          <span class="label label-primary">{{strtoupper($empresa->empresa)}} &nbsp;</span>
                        @endforeach
                      @endif
                   </li>
                    <li><i class="fa fa-clock-o"></i> Años/experiencia: {{$det->experiencia}} </li>
                  </ul>
                </td>

                <td>
                  <ul class="list-unstyled">
                    <br>
                    {{-- <li><i class="fa fa-user"></i> Cargo: {{$det->cargo}} </li> --}}
                    <li><i class="fa fa-user"></i> Cargo:
                      @if ($det->lista_cargos->count() > 0)
                        @foreach ($det->lista_cargos as $lista)
                          <span class="label label-primary">{{strtoupper($lista->cargo_p()->valor_cadena)}} &nbsp;</span>
                        @endforeach
                      @endif
                   </li>
                   <li><i class="fa fa-cubes"></i> Tipo de estudio:
                      @if ($det->lista_tipo_estudio->count() > 0)
                        @foreach ($det->lista_tipo_estudio as $lista)
                          <span class="label label-primary">{{strtoupper($lista->tipo_estudio_p()->valor_cadena)}} &nbsp;</span>
                        @endforeach
                      @endif
                   </li>
                  </ul>
                </td>

                <td>
                  <ul class="list-unstyled">
                    <br>
                    <li><i class="fa fa-adjust"></i> Disponibilidad: {{strtoupper($det->disponibilidad_tiempo())}} </li>
                    <li><i class="fa fa-sun-o"></i> Turno disponible:
                      @if ($det->lista_turnos->count() > 0)
                        @foreach ($det->lista_turnos as $lista)
                          <span class="label label-primary">{{$lista->horario_disponible_p()->valor_cadena}} &nbsp;</span>
                        @endforeach
                      @endif
                   </li>
                   <li><i class="fa fa-clock-o"></i> Horas que puede trabajar: {{$det->horas_que_puede_trabajar}} </li>
                  </ul>
                </td>

                  <td>
                    <ul class="list-unstyled">
                      <br>

                      <li><i class="fa fa-file"></i> Encuestas asignadas:
                        @if ($det->lista_encuestas->count() > 0)
                          @foreach ($det->lista_encuestas as $lista)
                            <span class="label label-primary">{{strtoupper($lista->encuesta->nombre)}} &nbsp;</span>
                          @endforeach
                        @endif
                     </li>

                    </ul>
                  </td>
                  <td>{{$det->calificacion_desc()}}</td>
                  <td>{{$det->estado_enc()}}</td>
                <td>
                    <a><br>{{$det->observacion}}</a>
                </td>
                <td>

                       <button type="button" class="btn btn-info btn-block  btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg" title="Calificar" onclick="fn_idEncuestador({{$det->id}});"><span class="fa fa-star"></span></button>

                      <a href="#" class="btn-block btn btn-success btn-xs btn_agregar_encuesta" id_encuestador = '{{$det->id}}'  data-toggle="tooltip" data-placement="bottom" title="Administrar encuestas">
                        <span class="fa fa-file"></span>
                      </a>

                      <a href="#" class="btn-block btn btn-warning btn-xs btn_editar" id_encuestador = '{{$det->id}}'  data-toggle="tooltip" data-placement="bottom" title="Editar">
                        <span class="fa fa-edit"></span>
                      </a>

                      <a href="#" class="btn-block btn btn-default btn-xs btn_eliminar" id_encuestador = '{{$det->id}}'  data-toggle="tooltip" data-placement="bottom" title="Cambiar estado">
                        <span class="fa fa-refresh"></span>
                      </a>


                   
                  </td>
                </tr>
                @endforeach


              </tbody>
            </table>
            </div>

            <div class="modal fade modal_datos" id="Modal_nuevo" role="dialog" >
              <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Formulario de Registro de Personal</h4>
                  </div>
                  <div class="modal-body contenido"></div>
                  <div class="modal-footer">
                    <br>
                    <button type="button" class="btn btn-block btn-default" data-dismiss="modal">Cancelar</button>

                  </div>
                </div>
              </div>
            </div>

           <div class="modal fade modal_edita" id="modal_edita" role="dialog" >
              <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Formulario de Registro de Personal</h4>
                  </div>
                  <div class="modal-body contenido_edit"></div>
                  <div class="modal-footer">
                    <br>
                    <button type="button" class="btn btn-block btn-default" data-dismiss="modal">Cancelar</button>

                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade modal_dialog" id="modal_dialog" role="dialog" >
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <form method="get" action="{{  route('administracion.encuestadores.baja') }}" class="form-horizontal form-label-left" id="encuestadores_form" >
                  <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" id="id_encuestador_txt" name="id_encuestador_txt">
                    <input type="hidden" name="encuestador" id="encuestador">
                   
                    <label>Seleccione un estado</label>
                      <select name="estados" id="estados" class="form-control" required="required">
                        <option ></option>
                        @foreach($estados as $det)
                              <option value="{{$det->codigo}}">{{strtoupper($det->valor_cadena)}}</option>
                        @endforeach
                      </select>
                    <hr>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success btn_eliminar_run" id="btn_eliminar_run">Guardar </button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

          <div class="modal fade modal_admin_enc" id="modal_admin_enc" role="dialog" >
              <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Formulario Administrar encuestas</h4>
                  </div>
                  <div class="modal-body contenido_admin_enc"></div>
                  <div class="modal-footer">
                    <br>
                    <button type="button" class="btn btn-block btn-default" data-dismiss="modal">Cancelar</button>

                  </div>
                </div>
              </div>
            </div>

           
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Calificacion</h4>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="{{ route('encuestadores.store_califica') }}" class="form-horizontal form-label-left"  enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <input type="hidden" name="encuestador" id="encuestador">
                   
                    <label>Seleccione una Calificacion</label>
                      <select name="Calificacion" id="Calificacion" class="form-control" required="required">
                        <option ></option>
                        @foreach($calificaciones as $det)
                              <option value="{{$det->codigo}}">{{strtoupper($det->valor_cadena)}}</option>
                        @endforeach
                      </select>
                    <hr>

                    
                     <button type="submit" class="btn btn-block btn-success btn_guardar btn-block">Guardar</button>
                    </form>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
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
  $('#encuestas').tagsInput({
          width: 'auto',
          defaultText:'Encuestas',
          height:'auto',
        });

    $('#datatable1').DataTable( { "language": {

              "sProcessing":     "Procesando...",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla",
              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix":    "",
              "sSearch":         "Buscar:",
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

        "bLengthChange" : false,

        "bSort" : false,
         "dom": "lfrti",
        //"dom": "Brti",
       // "buttons": [ 'copy', 'excel'],
        // "lengthMenu": [[5,10, 25, 50, 100, -1], [5,10, 25, 50, 100, "TODO"]],
        "lengthMenu": [[-1], ["TODO"]],

    } );

function fn_idEncuestador(valor) {
    // alert(valor);
    $('#encuestador').val(valor);
  };
 
// =============== agrefar_ encuesta ============================
var id_asignar;

var btn_agregar_encuesta = $(".btn_agregar_encuesta");
  btn_agregar_encuesta.on("click",function(){
    fn_agrega_encuesta($(this));
  });

  var modalContent_asign_enc = $(".contenido_admin_enc");
  var modal_asig_enc=$(".modal_admin_enc");



  var fn_agrega_encuesta = function(objeto){
    $.ajax({
      type: "GET",
      cache: false,
      dataType: "html",
      url: "{{ route('administracion.encuestadores.admin_encuesta')}}",
      data: {
        id: objeto.attr("id_encuestador")
      },
      success: function(dataResult)
      {
        console.log(dataResult);
        modalContent_asign_enc.empty().html(dataResult);
        modal_asig_enc.modal('show');
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






// =============== eliminar ============================
var id_eliminar;

var btn_eliminar = $(".btn_eliminar");
  btn_eliminar.on("click",function(){
    fn_eliminar($(this));
  });

var fn_eliminar = function (objeto){
id_eliminar = objeto.attr("id_encuestador");
$('#id_encuestador_txt').val(id_eliminar);
$('#modal_dialog').modal('show');
};



// ======================= nuevo encuestadpr ==============================


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
      url: "{{ route('administracion.encuestadores.create.form')}}",
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



// ========================= edita encuestador ============================


var btn_editar = $(".btn_editar");
  btn_editar.on("click",function(){
    frm_edita($(this));
  });
  var modalContentEdit = $(".contenido_edit");
  var modal_edita=$(".modal_edita");

  var frm_edita = function(objeto){
    $.ajax({
      type: "GET",
      cache: false,
      dataType: "html",
      url: "{{ route('administracion.encuestadores.edit.form')}}",
      data: {
        formulario: "editar",
        id: objeto.attr("id_encuestador")
      },
      success: function(dataResult)
      {
        console.log(dataResult);
        modalContentEdit.empty().html(dataResult);
        modal_edita.modal('show');
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


</script>
@endsection
