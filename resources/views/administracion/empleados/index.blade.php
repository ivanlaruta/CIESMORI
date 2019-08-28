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
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <p>Lista del personal registrado, acceda a las opciones para editar la informacion</p>
            <table class="table table-striped projects">
              <thead>
                <tr>
                 <th style="width: 1%">#</th>
                 <th style="width: 20%">Identificacion</th>
                 <th>Informacion general</th>
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
                <td>{{$det->id}}</td>
                <td>
                    <a>{{$det->primer_nombre}} {{$det->segundo_nombre}} {{$det->apellido_paterno}} {{$det->apellido_materno}}</a>
                    <br />
                    <small>CI: {{$det->ci}} {{$det->expedido}}</small>
                </td> 
                <td>
                    <a>{{$det->genero}} </a>
                    <br />
                    <a>{{$det->fecha_nacimiento}} </a>
                </td>
                <td>
                    <a>{{$det->residencia}} </a>
                    <br />
                    <a>{{$det->zona}}, {{$det->direccion}} </a>
                </td>
                <td>
                    <a>{{$det->telefono1}}, {{$det->telefono2}} </a>
                </td>
                <td>
                    <a>{{$det->nivel_educacion}} </a>
                    <br />
                    <a>Nivel {{$det->nivel_curso}} </a>
                </td>
                <td>
                    <a>{{$det->cargo}} </a>
                    <br />
                    <a>{{$det->tipo_estudio}} </a>
                </td>                <td>
                    <a>Tiempo: {{$det->disponibilidad_tiempo}} </a>
                    <br />
                    <a>Turno: {{$det->horario_disponible}} </a>
                    <br />
                    <a>hrs: {{$det->horas_que_puede_trabajar}} </a>
                </td>
                <td>
                    <a>{{$det->experiencia}} </a>
                    <br />
                   
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

          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection

@section('scripts')


@endsection