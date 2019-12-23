@extends('layouts.main')

@section('content')

<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Reporte de Personal</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <p>Lista del personal registrado, acceda a las opciones para editar la información</p>
            <div class="table-responsive">
          @foreach($encuestadores as $det)
            <table class="table table-bordered table-responsive table-hover" id="datatable1">
              <thead>

                <tr>
                  <th style="width: 25%">id</th>
                  <th style="width: 25%">ci</th>
                  <th style="width: 25%">expedido</th>
                  <th style="width: 25%">primer_nombre</th>
                  <th style="width: 25%">segundo_nombre</th>
                  <th style="width: 25%">apellido_paterno</th>
                  <th style="width: 25%">apellido_materno</th>
                  <th style="width: 25%">fecha_nacimiento</th>
                  <th style="width: 25%">genero</th>
                  <th style="width: 25%">estado_civil</th>
                   <th style="width: 25%">cod_residencia</th>
                   <th style="width: 25%">zona</th>
                   <th style="width: 25%">direccion</th>
                   <th style="width: 25%">telefono1</th>
                   <th style="width: 25%">cod_nivel_educacion</th>
                   <th style="width: 25%">nivel_curso</th>
                   <th style="width: 25%">horas_que_puede_trabajar</th>
                   <th style="width: 25%">experiencia</th>
                   <th style="width: 25%">calificacion</th>
                   <th style="width: 25%">estado</th>
                   <th style="width: 25%">observacion</th>
                </tr>

              </thead>
              @foreach ($det->detalle_encuestador as $lista)
              <tr>
                <td align="center">{{$lista->id}}</td>
                <td align="center">{{$lista->ci}}</td>
                <td align="center">{{$lista->expedido}}</td>
                <td align="center">{{$lista->primer_nombre}}</td>
                <td align="center">{{$lista->segundo_nombre}}</td>
                <td align="center">{{$lista->apellido_paterno}}</td>
                <td align="center">{{$lista->apellido_materno}}</td>
                <td align="center">{{$lista->fecha_nacimiento}}</td>
                <td align="center">{{$lista->genero}}</td>
                <td align="center">{{$lista->estado_civil}}</td>
                <td align="center">{{$lista->cod_residencia}}</td>
                <td align="center">{{$lista->zona}}</td>
                <td align="center">{{$lista->direccion}}</td>
                <td align="center">{{$lista->telefono1}}</td>
                <td align="center">{{$lista->cod_nivel_educacion}}</td>
                <td align="center">{{$lista->nivel_curso}}</td>
                <td align="center">{{$lista->horas_que_puede_trabajar}}</td>
                <td align="center">{{$lista->experiencia}}</td>
                <td align="center">{{$lista->calificacion}}</td>
                <td align="center">{{$lista->estado}}</td>
                <td align="center">{{$lista->observacion}}</td>
              </tr>
              @endforeach
            </table>
            </div>
            @endforeach
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
         // "dom": "lfrti",
        "dom": "Blfrti",
        
       "buttons": [ 'copy', 'excel'],

        "lengthMenu": [[5,10, 25, 50, 100, -1], [5,10, 25, 50, 100, "TODO"]],
        "lengthMenu": [[-1], ["TODO"]],

      
    } );

</script>
@endsection
