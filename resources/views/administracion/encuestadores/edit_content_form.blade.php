

          
        <div class="">
            <br />

          

          <form method="get" action="{{ route('encuestadores.editar') }}" class="form-horizontal form-label-left"  enctype="multipart/form-data">
            {{ csrf_field() }}


              <div class="x_title">
                <h2> INFORMACION PERSONAL</h2>
                <div class="clearfix"></div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Cedula Idenidad *
                </label>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="text" id="ci" name="ci" required="required" class="form-control col-md-7 col-xs-12" placeholder="Carnet de identidad" onblur="validar_ci()" value="{{$encuestador->persona->ci}}">
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12 select_expedido" data-width="100%" id="cod_expedido" name="cod_expedido" required="required" >
                    <option></option>
                    @foreach($expedido as $det)
                      <option value="{{$det->id}}" @if($det->id==$encuestador->persona->cod_expedido) selected @endif>{{strtoupper($det->nombre_corto)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Nombres *
                </label>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="text" id="primer_nombre" name="primer_nombre" required="required" class="form-control col-md-7 col-xs-12" placeholder=" Primer nombre"  value="{{$encuestador->persona->primer_nombre}}" onkeyup="this.value = this.value.toUpperCase();">
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="text" id="segundo_nombre" name="segundo_nombre" class="form-control col-md-7 col-xs-12" placeholder=" Segundo nombre" value="{{$encuestador->persona->segundo_nombre}}"  onkeyup="this.value = this.value.toUpperCase();">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Apellidos *
                </label>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="text" id="apellido_paterno" name="apellido_paterno" required="required" class="form-control col-md-7 col-xs-12" placeholder="Apellido paterno" value="{{$encuestador->persona->apellido_paterno}}"  onkeyup="this.value = this.value.toUpperCase();">
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="text" id="apellido_materno" name="apellido_materno"  class="form-control col-md-7 col-xs-12" placeholder="Apellido materno" value="{{$encuestador->persona->apellido_materno}}"  onkeyup="this.value = this.value.toUpperCase();">
                </div>
              </div>               
              
              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Genero *</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div id="cod_genero" name="genero" class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default @if($encuestador->persona->cod_genero ==1) active @endif" data-toggle-class="btn-primary " data-toggle-passive-class="btn-default">
                      <input type="radio" name="cod_genero" value="1" required="required"> &nbsp; Masculino &nbsp;
                    </label>
                    <label class="btn btn-default @if($encuestador->persona->cod_genero ==2) active @endif" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                      <input type="radio" name="cod_genero" value="2" required="required"> Femenino
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Fecha de nacimiento *
                </label>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="text" id="fecha_nacimiento" value="2000/12/04" name="fecha_nacimiento" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Estado civil *
                </label>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12 select_estado_civil" data-width="100%" id="cod_estado_civil" name="cod_estado_civil" required="required">
                    <option></option>
                    @foreach($estado_civil as $det)
                      <option value="{{$det->codigo}}" @if($det->codigo==$encuestador->persona->cod_estado_civil) selected @endif>{{strtoupper($det->valor_cadena)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Residencia *
                </label>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12 select_ciudad" data-width="100%" id="cod_residencia" name="cod_residencia" required="required">
                    <option></option>
                    @foreach($ciudad as $det)
                      <option value="{{$det->id}}" @if($det->id==$encuestador->persona->cod_residencia) selected @endif >{{strtoupper($det->nombre)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Direccion *
                </label>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="text" id="zona" name="zona" required="required" class="form-control col-md-7 col-xs-12" placeholder="Zona" value="{{$encuestador->persona->zona}}" onkeyup="this.value = this.value.toUpperCase();">
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="text" id="direccion" name="direccion" required="required" class="form-control col-md-7 col-xs-12" placeholder="Direccion" value="{{$encuestador->persona->direccion}}"onkeyup="this.value = this.value.toUpperCase();">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Telefonos *
                </label>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="number" id="telefono1" name="telefono1" required="required" class="form-control col-md-7 col-xs-12" placeholder="Telefono 1" value="{{$encuestador->persona->telefono1}}">
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="number" id="telefono2" name="telefono2" class="form-control col-md-7 col-xs-12" placeholder="Telefono 2" value="{{$encuestador->persona->telefono2}}">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Educacion *
                </label>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12 select_nivel_educacion" data-width="100%" id="cod_nivel_educacion" name="cod_nivel_educacion" required="required">
                    <option></option>
                    @foreach($nivel_educacion as $det)
                      <option value="{{$det->codigo}}"  @if($det->codigo==$encuestador->persona->cod_nivel_educacion) selected @endif>{{$det->valor_cadena}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="number" id="nivel_curso" name="nivel_curso" required="required" class="form-control col-md-7 col-xs-12" placeholder="Ultimo curso" min="0" max="50" value="{{$encuestador->persona->nivel_curso}}">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Fotografia *
                </label>
                 <div class="col-md-10 col-sm-10 col-xs-12">
                  <img src="{{url('/images/personas/'.$encuestador->persona->foto->archivo)}}" id="blah" src="#" alt="Su fotografia" width="50%" height="50%"/>
                  <input type="file" id="image" name="image" accept="image/*" >
                </div>        
              </div>

              <div class="x_title">
                <h2> INFORMACION DE CAMPO</h2>
                <div class="clearfix"></div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Area de trabajo *
                </label>
               {{--  <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" id="cargo" name="cargo" required="required" class="form-control col-md-7 col-xs-12" placeholder="Cargo" onkeyup="this.value = this.value.toUpperCase();">
                </div> --}}
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12 select_cargos" data-width="100%" id="cargos" name="cargos[]" required="required" multiple="multiple">
                    <option></option>
                    @foreach($cargos as $det)
                      <option value="{{$det->codigo}}">{{strtoupper($det->valor_cadena)}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12 select_tipo_estudio" data-width="100%" id="cod_tipo_estudio" name="cod_tipo_estudio[]" required="required" multiple="multiple">
                    <option></option>
                    @foreach($tipo_estudio as $det)
                      <option value="{{$det->codigo}}">{{strtoupper($det->valor_cadena)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Disponibilidad *
                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12 select_disponibilidad_tiempo" data-width="100%" id="cod_disponibilidad_tiempo" name="cod_disponibilidad_tiempo" required="required">
                    <option></option>
                    @foreach($disponibilidad_tiempo as $det)
                      <option value="{{$det->codigo}}"  @if($det->codigo==$encuestador->cod_disponibilidad_tiempo) selected @endif>{{strtoupper($det->valor_cadena)}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12 select_horario_disponible" data-width="100%" id="cod_horario_disponible" name="cod_horario_disponible[]" required="required"  multiple="multiple">
                    <option></option>
                    @foreach($horario_disponible as $det)
                      <option value="{{$det->codigo}}">{{$det->valor_cadena}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <input type="number" id="horas_que_puede_trabajar" name="horas_que_puede_trabajar" required="required" class="form-control col-md-7 col-xs-12" placeholder="Horas que puede trabajar" value="{{$encuestador->horas_que_puede_trabajar}}" min="1" max="24">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Experiencia *
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="empresas" name="empresas" type="text" class="tags form-control" value="{{$cadena_empresas}}" />
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <input type="number" id="experiencia" name="experiencia" required="required" class="form-control col-md-7 col-xs-12" placeholder="Años de Experiencia" value="{{$encuestador->experiencia}}" min="1" max="60">
                </div>                
              </div>              

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Observacion
                </label>
                <div class="col-md-10 col-sm-10 col-xs-12">
                  <input type="text" id="observacion" name="observacion"  class="form-control col-md-7 col-xs-12" placeholder="Observaciones" value="{{$encuestador->observacion}}">
                </div>
              </div>
            
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  
                  {{-- <a class="btn btn-primary" href="{{ route('inicio') }}" role="button">Cancelar</a> --}}
                  <button type="submit" class="btn btn-block btn-success btn_guardar">Guardar</button>
                </div>
              </div>
            </form>
          </div>
       
<!-- /page content -->

<script type="text/javascript">

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#image").change(function() {
  // alert('asd');
  readURL(this);
});


 $('.select_expedido').select2({minimumResultsForSearch:-1,placeholder:"Expedido",allowClear:true});
 $('.select_estado_civil').select2({minimumResultsForSearch:-1,placeholder:"Estado civil",allowClear:true});
 $('.select_ciudad').select2({placeholder:"Ciudad de residencia",allowClear:true});
 $('.select_nivel_educacion').select2({minimumResultsForSearch:-1,placeholder:"Nivel de educacion",allowClear:true});

var select_cargos_val = $('.select_cargos').select2({placeholder:"Cargo"});

var cargos =[];
var data_cargos = '<?php echo json_encode($encuestador->lista_cargos); ?>';
var lista_cargos = JSON.parse(data_cargos );
for (var i = 0; i < lista_cargos.length; i++) {
  var data_temp = [];
  data_temp.push(lista_cargos[i].cod_cargo) ;
  cargos.push(data_temp);
}
select_cargos_val.val(cargos).trigger("change"); 


var select_tipo_estudio_val = $('.select_tipo_estudio').select2({placeholder:"Tipo de estudio"});

var tipo_estudios =[];
var data_tipo_estudio = '<?php echo json_encode($encuestador->lista_tipo_estudio); ?>';
var lista_tipo_estudio = JSON.parse(data_tipo_estudio );
for (var i = 0; i < lista_tipo_estudio.length; i++) {
  var data_temp = [];
  data_temp.push(lista_tipo_estudio[i].cod_tipo_estudio) ;
  tipo_estudios.push(data_temp);
}
select_tipo_estudio_val.val(tipo_estudios).trigger("change"); 


 $('.select_disponibilidad_tiempo').select2({minimumResultsForSearch:-1,placeholder:"Disponibilidad de tiempo",allowClear:true});

 
var select_horario_disponible = $('.select_horario_disponible').select2({minimumResultsForSearch:-1,placeholder:"Horario disponible"});
var horario_disponibles =[];
var data_horario_disponible = '<?php echo json_encode($encuestador->lista_turnos); ?>';
var lista_horario_disponible = JSON.parse(data_horario_disponible );
for (var i = 0; i < lista_horario_disponible.length; i++) {
  var data_temp = [];
  data_temp.push(lista_horario_disponible[i].cod_horario_disponible) ;
  horario_disponibles.push(data_temp);
}
select_horario_disponible.val(horario_disponibles).trigger("change");





$('#empresas').tagsInput({
          width: 'auto',
          defaultText:'Empresas',
          height:'auto',
        });

$(function() {
  
  var fnac = '<?php echo $encuestador->persona->fecha_nacimiento;?>';
  var res = fnac.replace(/-/g, "/");

  $('input[name="fecha_nacimiento"]').daterangepicker({
    "singleDatePicker": true,
    "minDate": moment().subtract(80, 'years'),
    "maxDate": moment().subtract(17, 'years'),
    "startDate": res,
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

var cior = '<?php echo $encuestador->persona->ci ;?>';

function validar_ci() {

var cid = $("#ci").val();
if(cid != cior){
$.ajax({
    type: "GET",
    cache: false,
    dataType: "html",
    url: "{{ route('administracion.encuestadores.validar_ci')}}",
    data: {
      ci: cid
    },
    success: function(dataResult)
    {
      
       func_alerta(dataResult);
    }
  });
}
};


function func_alerta(resultado) {


var obj_php = "<?php echo json_encode("+resultado+"); ?>";
var ecnuestador = JSON.parse(obj_php );

  if (ecnuestador.length > 0){
    // alert('Esta Cedula de Identidad ya se encuentra registrada. NO puede crear un registro duplicado.');

    new PNotify({title: "Error",type: "error",text: 'El Ci:'+ecnuestador[0].ci+' Ya se encuentra registrado como encuestador con el nombre de '+ecnuestador[0].primer_nombre+' '+ecnuestador[0].apellido_paterno+'. No puede registrarse nuevamente.' ,styling: 'bootstrap3',});


    $(".btn_guardar").attr("disabled", true);
  }
  else{
   $(".btn_guardar").attr("disabled", false);

  }
};

</script>

