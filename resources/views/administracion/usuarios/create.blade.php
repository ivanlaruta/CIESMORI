

<!-- page content -->
<div >
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Formulario de registro</h3>
      </div>

      

    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          
          <div class="x_content">
            <br />
      @if($request->formulario=="nuevo")
          <form method="get" action="{{  route('administracion.usuarios.create') }}" class="form-horizontal form-label-left" id="empleados_form" >
            {{ csrf_field() }}

              <input value="{{$request->formulario}}" type="text"  hidden id="formulario" name="formulario" >
              <div class="x_title">
                <h2> Informacion de usuario</h2>
                <div class="clearfix"></div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user">Usuario *
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="user" name="user" required="required" class="form-control col-md-7 col-xs-12" placeholder="Usuario" onblur="validar_user()">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ci">Password *
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="password" name="password" required="required" class="form-control col-md-7 col-xs-12" placeholder="Contraseña">
                </div>
                
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user">Nombre
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="nombre" name="nombre" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nombres">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user">Apellido
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="apellido" name="apellido" required="required" class="form-control col-md-7 col-xs-12" placeholder="Apellidos">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rol_id">Departamento
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12 "  data-width="100%" id="departamento_id" name="departamento_id" required="required">
                    <option></option>
                    @foreach($departamentos as $det)
                      <option value="{{$det->id}}">{{strtoupper($det->nombre)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rol_id">Rol *
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12 "  data-width="100%" id="rol_id" name="rol_id" required="required">
                    <option></option>
                    @foreach($roles as $det)
                      <option value="{{$det->id}}">{{strtoupper($det->descripcion)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>


            
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-success btn_guardar_nuevo">Guardar</button>
                </div>
              </div>
            </form>
          @endif
          @if($request->formulario=="editar")

          <form method="get" action="{{ route('administracion.usuarios.create')  }}" class="form-horizontal form-label-left" id="empleados_form" >
            {{ csrf_field() }}

              <input value="{{$request->formulario}}" type="text"  hidden id="formulario" name="formulario" >
              <input value="{{$usuario->id}}" type="text"  hidden id="id_usuario" name="id_usuario" >
              <div class="x_title">
                <h2> Informacion de usuario</h2>
                <div class="clearfix"></div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user">Usuario *
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="user" name="user" required="required" class="form-control col-md-7 col-xs-12" placeholder="Usuario" disabled="disabled" value="{{$usuario->user}}">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ci">Password *
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="password" name="password" class="form-control col-md-7 col-xs-12" placeholder="Contraseña">
                </div>
                
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user">Nombre
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="nombre" name="nombre" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nombres" value="{{$usuario->nombre}}">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user">Apellido
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="apellido" name="apellido" required="required" class="form-control col-md-7 col-xs-12" placeholder="Apellidos" value="{{$usuario->apellido}}">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rol_id">Departamento
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12 "  data-width="100%" id="departamento_id" name="departamento_id" required="required">
                    <option></option>
                    @foreach($departamentos as $det)
                      <option value="{{$det->id}}" @if($det->id==$usuario->departamento_id) selected @endif>{{strtoupper($det->nombre)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rol_id">Rol *
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12 "  data-width="100%" id="rol_id1" name="rol_id1" required="required">
                    <option></option>
                    @foreach($roles as $det)
                      <option value="{{$det->id}}" @if($det->id==$usuario->rol_id) selected @endif >{{strtoupper($det->descripcion)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>


            
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-success">Guardar</button>
                </div>
              </div>
            </form>



          @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

<script type="text/javascript">


function validar_user() {

var user = $("#user").val();

$.ajax({
    type: "GET",
    cache: false,
    dataType: "html",
    url: "{{ route('administracion.usuarios.validar_user')}}",
    data: {
      user: user
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
    // alert('Esta Cedula de Identidad ya se encuentra registrada. NO puede crear un registro duplicado.');

    new PNotify({title: "Error",type: "error",text: 'Ya existe un usuario con el mismo nombre, por favor intente con otro nombre de usuario.' ,styling: 'bootstrap3',});


    $(".btn_guardar_nuevo").attr("disabled", true);
  }
  else{
   $(".btn_guardar_nuevo").attr("disabled", false);

  }
};

</script>
