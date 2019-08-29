@extends('layouts.main')

@section('content')

<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Empleados</h2>
            <div class="pull-right" >
              <a  href="#" class="btn btn-success btn_nuevo " data-toggle="tooltip" data-placement="bottom" title="Agregar Nuevo" ><i class="fa fa-plus"></i></a>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <p>Lista del personal registrado, acceda a las opciones para editar la informacion</p>

            <table class="table table-striped projects" id="datatable1">
              <thead>
                <tr>
                 <th style="width: 1%">#</th>
                 <th style="width: 12%">Identificacion</th>
                 <th style="width: auto">Genero/ Fecha nacimiento</th>
                 <th>Residencia</th>
                 <th style="width: auto">Contacto</th>
                 <th style="width: 15%">Educacion</th>
                 <th>Area de trabajo</th>
                 <th>Disponibilidad</th>
                 <th style="width: 1%">Experiencia</th>
                 <th style="width: 1%">Obs</th>
                 <th style="width: 1%">Opciones</th>
                </tr>
              </thead>
              <tbody>
              @foreach($empleados as $det)
              <tr>
                <td>{{$det->id}}</td>
                <td>
                    <a>{{$det->primer_nombre}} {{$det->segundo_nombre}} {{$det->apellido_paterno}} {{$det->apellido_materno}}</a>
                    <br />
                    <small><i class="fa fa-credit-card"></i> CI: {{$det->ci}} {{$det->expedido}}</small>
                </td> 
                <td>
                    <a><i class="fa fa-intersex"></i> {{$det->genero}} </a>
                    <br />
                    <a><i class="fa fa-calendar"></i> {{$det->fecha_nacimiento}} </a>
                </td>
                <td>
                    <a> {{$det->residencia}} </a>
                    <br />
                    <a><i class="fa fa-map-marker"></i> {{$det->zona}}, {{$det->direccion}} </a>
                </td>
                <td>
                    <a> {{$det->telefono1}} / {{$det->telefono2}} </a>
                </td>
                <td>
                    <a><i class="fa fa-mortar-board"></i> {{$det->nivel_educacion}} </a>
                    <br />
                    <a>Nivel {{$det->nivel_curso}} </a>
                </td>
                <td>
                    <a>{{$det->cargo}} </a>
                    <br />
                    <a>{{$det->tipo_estudio}} </a>
                </td>                <td>
                    <a>dispnibilidad {{$det->disponibilidad_tiempo}} </a>
                    <br />
                    <a><span class="label label-default">{{$det->horario_disponible}} &nbsp;</span>  </a>

                    <br />
                    <a><i class="fa fa-clock-o"></i> {{$det->horas_que_puede_trabajar}} horas</a>
                </td>
                <td>
                
                    @if ($det->lista_empresas->count() > 0)
                      @foreach ($det->lista_empresas as $empresa)
                        <span class="badge bg-green">{{strtoupper($empresa->empresa)}} &nbsp;</span>
                      @endforeach
                    @endif
                  
                    <br />
                    <a><i class="fa fa-clock-o"></i> {{$det->experiencia}} Años</a>
                   
                </td>  
                <td>
                    <a>{{$det->observaciones}} </a>
                    <br />
                   
                </td>  
                
                <td>
                   <div class="btn-group" role="group" >
                     

                      <a href="#" class="btn btn-warning btn-xs btn_editar" id_usuario = 'as'  data-toggle="tooltip" data-placement="bottom" title="Editar">
                        <span class="fa fa-edit"></span> 
                      </a>
                      <a href="#" class="btn btn-danger btn-xs">
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
      url: "{{ route('administracion.empleados.create.form')}}",
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