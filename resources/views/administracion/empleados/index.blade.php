@extends('layouts.main')

@section('content')

  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Empleados</h3>
        </div>
        <div class="pull-right" >
          <a  href="#" class="btn btn-success btn_nuevo " data-toggle="tooltip" data-placement="bottom" title="Agregar nuevo usuario" ><i class="fa fa-plus"></i> Nuevo</a>
        </div>
         <div class="title_right"></div>
      </div>
      <div class="clearfix"></div>
        
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_content animated fadeIn">
          {{-- <p class="text-muted font-13 m-b-30"></p> --}}
          <div class="table-responsive" {{-- style="max-height: 450px; width: 100%; margin: 0; overflow-y: auto; --}}">
            <table class="table table-striped jambo_table bulk_action" id="datatable1">
              <thead>
                 <tr>
                 <th>Identificacion</th>
                 <th>informacion general</th>
                 <th>Residencia</th>
                 <th>Contacto</th>
                 <th>Educacion</th>
                 <th>Area de trabajo</th>
                 <th>Disponibilidad</th>
                 <th>Experiencia</th>
                 <th>observaciones</th>
                 <th>Opciones</th>
                </tr>
              </thead>
             
              <tbody>
                @foreach($empleados as $det)
                <tr>

                 <td>{{$det->persona->primer_nombre}} {{$det->persona->segundo_nombre}} {{$det->persona->apellido_paterno}} {{$det->persona->apellido_materno}}
                   <br> {{$det->persona->ci}} 
                 </td> 
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
             
              
                 {{-- <td>{{$det->paterno}}</td> 
                 <td>{{$det->id_ubicacion}}-{{$det->sucursal->nom_sucursal}}</td> 
                 <td>{{$det->rol}}</td>  --}}
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
          </div>
        </div>
      </div>

      <div class="modal fade modal_datos" id="Modal_nuevo" role="dialog" >
        <div class="modal-dialog modal-lg">
          <div class="modal-content contenido">
          </div>
        </div>
      </div>

    </div>
  </div>       


@endsection

@section('scripts')


@endsection