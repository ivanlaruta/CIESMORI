


        <div class="">
            <br />



          <form method="post" action="{{ route('encuestadores.store') }}" class="form-horizontal form-label-left"  enctype="multipart/form-data">
            {{ csrf_field() }}


              <div class="x_title">
                <h2> INFORMACIÓN PERSONAL</h2>
                <div class="clearfix"></div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Cédula de Identidad *
                </label>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="text" id="ci" name="ci" maxlength="8" required="required" class="form-control col-md-7 col-xs-12" placeholder="Carnet de identidad" onblur="validar_ci()" onkeypress="return event.charCode >= 48 && event.charCode <= 57"/>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12 select_expedido" data-width="100%" id="cod_expedido" name="cod_expedido" required="required" >
                    <option></option>
                    @foreach($expedido as $det)
                      <option value="{{$det->id}}">{{strtoupper($det->nombre_corto)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Nombres *
                </label>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="text" id="primer_nombre" name="primer_nombre" class="form-control col-md-7 col-xs-12" placeholder=" Primer nombre" onkeyup="this.value = this.value.toUpperCase();" maxlength="30" required pattern="[A-Za-z]+">
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="text" id="segundo_nombre" name="segundo_nombre" class="form-control col-md-7 col-xs-12" placeholder=" Segundo nombre" onkeyup="this.value = this.value.toUpperCase();" maxlength="30" pattern="[A-Za-z]+">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Apellidos
                </label>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="text" id="apellido_paterno" name="apellido_paterno" class="form-control col-md-7 col-xs-12" placeholder="Apellido paterno" onkeyup="this.value = this.value.toUpperCase();" maxlength="30" pattern="[A-Za-z]+">
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="text" id="apellido_materno" name="apellido_materno"  class="form-control col-md-7 col-xs-12" placeholder="Apellido materno" onkeyup="this.value = this.value.toUpperCase();" maxlength="30" pattern="[A-Za-z]+">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Género  *</label>
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
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Fecha de nacimiento *
                </label>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" required="required" class="form-control col-md-7 col-xs-12" value="01-01-1999" min="31-12-1960" max="01-01-2002">
                  <!-- <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required="required" value="1999-01-01" min="1960-12-31" max="2002-01-01" class="form-control col-md-7 col-xs-12"> -->
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Estado civil *
                </label>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12 select_estado_civil" data-width="100%" id="cod_estado_civil" name="cod_estado_civil" required="required">
                    <option></option>
                    @foreach($estado_civil as $det)
                      <option value="{{$det->codigo}}">{{strtoupper($det->valor_cadena)}}</option>
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
                      <option value="{{$det->id}}">{{strtoupper($det->nombre)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Dirección *
                </label>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="text" id="zona" name="zona" required="required" class="form-control col-md-7 col-xs-12" placeholder="Zona" onkeyup="this.value = this.value.toUpperCase();">
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="text" id="direccion" name="direccion" required="required" class="form-control col-md-7 col-xs-12" placeholder="Direccion" onkeyup="this.value = this.value.toUpperCase();">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Teléfonos *
                </label>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="text" id="telefono1" name="telefono1" minlengh="6" maxlength="8" required="required" class="form-control col-md-7 col-xs-12" placeholder="Telefono 1" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="text" id="telefono2" name="telefono2" minlengh="6" maxlength="8" class="form-control col-md-7 col-xs-12" placeholder="Telefono 2" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Educación *
                </label>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12 select_nivel_educacion" data-width="100%" id="cod_nivel_educacion" name="cod_nivel_educacion" required="required">
                    <option></option>
                    @foreach($nivel_educacion as $det)
                      <option value="{{$det->codigo}}" inicio="{{$det->inicio}}" fin="{{$det->fin}}" >{{$det->valor_cadena}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="number" id="nivel_curso" name="nivel_curso" required="required" class="form-control col-md-7 col-xs-12" placeholder="Ultimo curso" min="0" max="50" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Fotografia *
                </label>
                 <div class="col-md-10 col-sm-10 col-xs-12">
                  <img id="blah" src="#" alt="Su fotografia" width="50%" height="50%"/>
                  <input type="file" id="image" name="image" accept="image/*" >
                </div>
              </div>

              <div class="x_title">
                <h2> INFORMACIÓN DE CAMPO</h2>
                <div class="clearfix"></div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Área de trabajo *
                </label>

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
                      <option value="{{$det->codigo}}">{{strtoupper($det->valor_cadena)}}</option>
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
                  <input type="text" id="horas_que_puede_trabajar" name="horas_que_puede_trabajar" required="required" class="form-control col-md-7 col-xs-12" placeholder="Horas que puede trabajar" minlengh="0" maxlength="2" min="0" max="12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Experiencia *
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="empresas" name="empresas" type="text" class="tags form-control" value="" />
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <input type="text" id="experiencia" name="experiencia" required="required" class="form-control col-md-7 col-xs-12" placeholder="Años de Experiencia" minlengh="0" maxlength="2" min="0" max="60">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Observación
                </label>
                <div class="col-md-10 col-sm-10 col-xs-12">
                  <input type="text" id="observacion" name="observacion"  class="form-control col-md-7 col-xs-12" placeholder="Observaciones">
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
 var s3 = $('.select_nivel_educacion').select2({minimumResultsForSearch:-1,placeholder:"Nivel de educacion",allowClear:true});
 $('.select_tipo_estudio').select2({placeholder:"Tipo de estudio"});
 $('.select_cargos').select2({placeholder:"Cargo"});
 $('.select_disponibilidad_tiempo').select2({minimumResultsForSearch:-1,placeholder:"Disponibilidad de tiempo",allowClear:true});
 var s2 = $('.select_horario_disponible').select2({minimumResultsForSearch:-1,placeholder:"Horario disponible"});

$('#empresas').tagsInput({
          width: 'auto',
          defaultText:'Empresas',
          height:'auto',
        });

$(function() {
  $('input[name="fecha_nacimiento"]').daterangepicker({
    "singleDatePicker": true,
    "minDate": moment().subtract(80, 'years'),
    "maxDate": moment().subtract(17, 'years'),
    "startDate": moment().subtract(17, 'years'),
    "locale": {
      "format": "DD/MM/YYYY",
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

function validar_ci() {

var cid = $("#ci").val();

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
};


function func_alerta(resultado) {


var obj_php = "<?php echo json_encode("+resultado+"); ?>";
var ecnuestador = JSON.parse(obj_php );

  if (ecnuestador.length > 0){
   alert('Esta Cedula de Identidad ya se encuentra registrada. NO puede crear un registro duplicado.');
    new PNotify({title: "Error",type: "error",text: 'El Ci:'+ecnuestador[0].ci+' Ya se encuentra registrado como encuestador con el nombre de '+ecnuestador[0].primer_nombre+' '+ecnuestador[0].apellido_paterno+'. No puede registrarse nuevamente.' ,styling: 'bootstrap3',});


    $(".btn_guardar").attr("disabled", true);
  }
  else{
   $(".btn_guardar").attr("disabled", false);

  }
};

$("#cod_disponibilidad_tiempo").change(function() {
  var valor = $(this).children("option:selected").val();
  if (valor==2){
      var vals = ['1','2','3'];
    s2.val(vals).trigger("change");

  }
});

$("#cod_horario_disponible").change(function() {
  var valor = $("#cod_disponibilidad_tiempo").children("option:selected").val();
  if (valor==2){
      var vals = ['1','2','3'];
    s2.val(vals).trigger("change");
  }
});




$("#cod_nivel_educacion").change(function() {
  var inicio = $(this).children("option:selected").attr('inicio');
  var fin = $(this).children("option:selected").attr('fin');
  $("#nivel_curso").attr({
   "max" : fin,
   "min" : inicio
  });
});



</script>
