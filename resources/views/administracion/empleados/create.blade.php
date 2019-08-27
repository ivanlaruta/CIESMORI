@extends('layouts.main_nolog')

@section('content')

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Formulario de registro</h3>
      </div>

      <div class="title_right">
         <a href="{{ route('inicio') }}" class="btn btn-link pull-right"> Cancelar <i class="fa fa-btn fa-sign-out"  ></i>
        </a>
      </div>

    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          
          <div class="x_content">
            <br />

          <form method="get" action="{{  route('administracion.empleados.create') }}" class="form-horizontal form-label-left" id="empleados_form" >
            {{ csrf_field() }}


              <div class="x_title">
                <h2> Informacion Personal</h2>
                <div class="clearfix"></div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ci">Cedula Idenidad *
                </label>
                <div class="col-md-3 col-sm-3 col-xs-8">
                  <input type="text" id="ci" name="ci" required="required" class="form-control col-md-7 col-xs-12" placeholder="Carnet de identidad">
                </div>
                <div class="col-md-3 col-sm-3 col-xs-4">
                  <select class="form-control col-md-7 col-xs-12 select_expedido"  id="cod_expedido" name="cod_expedido" required="required">
                    <option></option>
                    @foreach($expedido as $det)
                      <option value="{{$det->codigo}}">{{strtoupper($det->valor_cadena)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ci">Nombres *
                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" id="primer_nombre" name="primer_nombre" required="required" class="form-control col-md-7 col-xs-12" placeholder=" Primer nombre">
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" id="segundo_nombre" name="segundo_nombre" class="form-control col-md-7 col-xs-12" placeholder=" Segundo nombre">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ci">Apellidos *
                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" id="apellido_paterno" name="apellido_paterno" required="required" class="form-control col-md-7 col-xs-12" placeholder="Apellido paterno">
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" id="apellido_materno" name="apellido_materno"  class="form-control col-md-7 col-xs-12" placeholder="Apellido materno">
                </div>
              </div>               
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Genero</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div id="cod_genero" name="genero" class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                      <input type="radio" name="cod_genero" value="1" required="required"> &nbsp; Masculino &nbsp;
                    </label>
                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                      <input type="radio" name="cod_genero" value="2" required="required"> Femenino
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ci">Fecha de nacimiento *
                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ci">Estado civil *
                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12 select_estado_civil"  id="cod_estado_civil" name="cod_estado_civil" required="required">
                    <option></option>
                    @foreach($estado_civil as $det)
                      <option value="{{$det->codigo}}">{{strtoupper($det->valor_cadena)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ci">Residencia *
                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12 select_ciudad"  id="cod_residencia" name="cod_residencia" required="required">
                    <option></option>
                    @foreach($ciudad as $det)
                      <option value="{{$det->codigo}}">{{strtoupper($det->valor_cadena)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ci">Direccion *
                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" id="zona" name="zona" required="required" class="form-control col-md-7 col-xs-12" placeholder="Zona">
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" id="direccion" name="direccion" required="required" class="form-control col-md-7 col-xs-12" placeholder="Direccion">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ci">Telefonos *
                </label>
                <div class="col-md-3 col-sm-3 col-xs-6">
                  <input type="number" id="telefono1" name="telefono1" required="required" class="form-control col-md-7 col-xs-12" placeholder="Telefono 1">
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                  <input type="number" id="telefono2" name="telefono2" class="form-control col-md-7 col-xs-12" placeholder="Telefono 2">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ci">Educacion *
                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12 select_nivel_educacion"  id="cod_nivel_educacion" name="cod_nivel_educacion" required="required">
                    <option></option>
                    @foreach($nivel_educacion as $det)
                      <option value="{{$det->codigo}}">{{$det->valor_cadena}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-4">
                  <input type="number" id="nivel_curso" name="nivel_curso" required="required" class="form-control col-md-7 col-xs-12" placeholder="Ultimo curso">
                </div>
              </div>

              <div class="x_title">
                <h2> Informacion Profesional</h2>
                <div class="clearfix"></div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ci">Area de trabajo *
                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" id="cargo" name="cargo" required="required" class="form-control col-md-7 col-xs-12" placeholder="Cargo">
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12 select_tipo_estudio"  id="cod_tipo_estudio" name="cod_tipo_estudio" required="required">
                    <option></option>
                    @foreach($tipo_estudio as $det)
                      <option value="{{$det->codigo}}">{{strtoupper($det->valor_cadena)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ci">Disponibilidad *
                </label>
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12 select_disponibilidad_tiempo"  id="cod_disponibilidad_tiempo" name="cod_disponibilidad_tiempo" required="required">
                    <option></option>
                    @foreach($disponibilidad_tiempo as $det)
                      <option value="{{$det->codigo}}">{{strtoupper($det->valor_cadena)}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12 select_horario_disponible"  id="cod_horario_disponible" name="cod_horario_disponible" required="required">
                    <option></option>
                    @foreach($horario_disponible as $det)
                      <option value="{{$det->codigo}}">{{$det->valor_cadena}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-4">
                  <input type="number" id="horas_que_puede_trabajar" name="horas_que_puede_trabajar" required="required" class="form-control col-md-7 col-xs-12" placeholder="Horas que puede trabajar">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ci">Experiencia *
                </label>
                <div class="col-md-2 col-sm-2 col-xs-4">
                  <input type="number" id="experiencia" name="experiencia" required="required" class="form-control col-md-7 col-xs-12" placeholder="Años de Experiencia">
                </div>
                
                <div class="col-md-4 col-sm-2 col-xs-8">

                  <input id="empresas" name="empresas" type="text" class="tags form-control" value="" />
                 
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ci">Observacion
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="observacion" name="observacion"  class="form-control col-md-7 col-xs-12" placeholder="Observaciones">
                </div>
              </div>
            
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  
                  <a class="btn btn-primary" href="{{ route('inicio') }}" role="button">Cancelar</a>
                  <button type="submit" class="btn btn-success">Guardar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
@endsection

@section('scripts')
<script type="text/javascript">


 $('.select_expedido').select2({minimumResultsForSearch:-1,placeholder:"Expedido",allowClear:true});
 $('.select_estado_civil').select2({minimumResultsForSearch:-1,placeholder:"Estado civil",allowClear:true});
 $('.select_ciudad').select2({placeholder:"Ciudad de residencia",allowClear:true});
 $('.select_nivel_educacion').select2({minimumResultsForSearch:-1,placeholder:"Nivel de educacion",allowClear:true});
 $('.select_tipo_estudio').select2({placeholder:"Tipo de estudio",allowClear:true});
 $('.select_disponibilidad_tiempo').select2({minimumResultsForSearch:-1,placeholder:"Disponibilidad de tiempo",allowClear:true});
 $('.select_horario_disponible').select2({minimumResultsForSearch:-1,placeholder:"Horario disponible",allowClear:true});

$('#empresas').tagsInput({
          width: 'auto',
          defaultText:'Empresas',
          height:'auto',
        });

$(function() {
  $('input[name="fecha_nacimiento"]').daterangepicker({
    "singleDatePicker": true,
    "locale": {
      "format": "YYYY/MM/DD",
      "separator": " - ",
      "applyLabel": "Aceptar",
      "cancelLabel": "Cancelar",
      "fromLabel": "From",
      "toLabel": "To",
      "customRangeLabel": "Custom",
      "daysOfWeek": ["Do","Lu","Ma","Mi","Ju","Vi","Sa"],
      "monthNames": ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
      "firstDay": 1
    }
  })
});

</script>

@endsection