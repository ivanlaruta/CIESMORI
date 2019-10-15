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
           
            <h2>Libro de Datos</h2>
          
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <div class="table-responsive">
              <table class="table table-bordered table-responsive table-hover">
                <thead>
                  <tr>
                    <th style="width: 1%">#</th>
                    <th style="width: 25%">Encuesta</th>
                    <th style="width: 25%">Campo</th>
                    <th style="width: 15%">Codigo</th>
                    <th style="width: 15%">Valor</th>
                    <th style="width: 1%">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                     <form method="post" action="{{ route('encuesta.store_libro') }}" class="form-horizontal form-label-left">
                  {{ csrf_field() }}
                    <td></td>
                    <td><select class="form-control col-md-6 col-xs-12 " id="encuesta_id" name="encuesta_id" required="required" data-width="100%">
                        <option></option>
                        @foreach($encuestas as $det)
                          <option value="{{$det->id}}">{{strtoupper($det->nombre)}}</option>
                        @endforeach
                      </select>
                    </td>
                    <td><select class="form-control col-md-6 col-xs-12 " id="parametrica_libro" name="parametrica_libro" required="required" data-width="100%">
                        <option></option>
                        @foreach($parametrica as $det)
                          <option value="{{$det->codigo}}">{{strtoupper($det->codigo)}}</option>
                        @endforeach
                      </select></td>
                    <td><input type="text" id="codigo" name="codigo" required="required" class="form-control col-md-7 col-xs-12"></td>
                    <td><input type="text" id="valor"  name="valor"  required="required" class="form-control col-md-7 col-xs-12"></td>

                    <td align="center">
                                            <button type="submit" class="btn btn-success btn-block">Agregar</button>

                    </td> 
                    </form>   
                  </tr>
                  @foreach($librodatos as $det)
                  <tr>
                    <td>{{$det->id}}</td>
                    <td>{{$det->encuesta->nombre}}</td>
                    <td>{{$det->campo}}</td>
                    <td>{{$det->codigo}}</td>
                    <td>{{$det->valor}}</td>

                    <td align="center">
                      <div class="btn-group btn-group-justified" role="group" >
                        <a href="#" class="btn btn-warning btn-xs  btn_edit" id_encuesta = '{{$det->id}}'  title="Modificar">
                          <span class="fa fa-edit fa-lg"></span> 
                        </a>
                        <a href="#" class="btn btn-danger btn-xs  btn_elimina" id_encuesta = '{{$det->id}}'  title="eliminar">
                          <span class="fa fa-trash fa-lg"></span> 
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
</div>

@endsection

@section('scripts')
<script type="text/javascript">


</script>
@endsection

