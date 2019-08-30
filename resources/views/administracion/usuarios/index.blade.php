@extends('layouts.main')

@section('content')

<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Usuarios</h2>
            <div class="pull-right" >
              <a  href="#" class="btn btn-success btn_nuevo " data-toggle="tooltip" data-placement="bottom" title="Agregar Nuevo" ><i class="fa fa-plus"></i></a>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <p>Lista de usuarios, acceda a las opciones para editar la informacion</p>

            <table class="table table-striped projects" id="datatable1">
              <thead>
                <tr>
                 <th>#</th>
                 <th>Usuario</th>
                 <th>Rol</th>
                 <th>Datos de Personal</th>
                 <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
              @foreach($usuario as $det)
              <tr>
                <td>{{$det->id}}</td>
                <td>{{$det->user}}</td>
                <td>
                    <a>{{$det->rol->descripcion}} </a>
                </td>
                <td>
                  @if(isset($det->empleado->persona->id))
                    <a>
                      {{$det->empleado->persona->primer_nombre}} {{$det->empleado->persona->segundo_nombre}} {{$det->empleado->persona->apellido_paterno}} {{$det->empleado->persona->apellido_materno}}
                    </a>
                    <br /><small><i class="fa fa-credit-card"></i> CI: {{$det->empleado->persona->ci}} </small>
                  @else
                    No asignado
                  @endif
                      
                </td> 
                  
                
                <td>
                   <div class="btn-group" role="group" >
                     

                      <a href="#" class="btn btn-warning btn-xs btn_editar" id_empleado = '{{$det->id}}'  data-toggle="tooltip" data-placement="bottom" title="Editar">
                        <span class="fa fa-edit"></span> 
                      </a>

                      <a href="#" class="btn btn-danger btn-xs btn_eliminar" id_empleado = '{{$det->id}}'  data-toggle="tooltip" data-placement="bottom" title="Eliminar">
                        <span class="fa fa-trash"></span> 
                      </a>

                      
                    </div>
                  </td>        
                </tr>
                @endforeach
                

              </tbody>
            </table>

            <div class="modal fade modal_datos" id="Modal_nuevo" role="dialog" >
              <div class="modal-dialog modal-lg">
                <div class="modal-content contenido">
                </div>
              </div>
            </div>

            <div class="modal fade modal_dialog" id="modal_dialog" role="dialog" >
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <form method="get" action="{{  route('administracion.usuarios.baja') }}" class="form-horizontal form-label-left" id="empleados_form" >
                  <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" id="id_usuarios_txt" name="id_usuarios_txt">
                    <h4>Eliminar!</h4>
                    <p>Esta tratando de dar de baja este registro.</p>
                    <p>Desea continuar?.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger btn_eliminar_run" id="btn_eliminar_run">Continuar  <span class="fa fa-trash"></span></button>
                  </div>
                  </form>
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

// =============== eliminar ============================
var id_eliminar;

var btn_eliminar = $(".btn_eliminar");
  btn_eliminar.on("click",function(){
    fn_eliminar($(this));
  });

var fn_eliminar = function (objeto){
id_eliminar = objeto.attr("id_empleado");
$('#id_usuarios_txt').val(id_eliminar);
$('#modal_dialog').modal('show');
};



// =====================================================


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
      url: "{{ route('administracion.usuarios.create.form')}}",
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


</script>
@endsection