

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

          <form method="get" action="{{  route('administracion.usuarios.create') }}" class="form-horizontal form-label-left" id="empleados_form" >
            {{ csrf_field() }}

              <input value="{{$request->formulario}}" type="text" hidden id="formulario" name="formulario" >
              <div class="x_title">
                <h2> Informacion de usuario</h2>
                <div class="clearfix"></div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user">USUARIO *
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="user" name="user" required="required" class="form-control col-md-7 col-xs-12" placeholder="Usuario">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ci">Password *
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="password" name="password" required="required" class="form-control col-md-7 col-xs-12" placeholder=" Contraseña">
                </div>
                
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rol_id">Rol *
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12 select_estado_civil"  data-width="100%" id="rol_id" name="rol_id" required="required">
                    <option></option>
                    @foreach($roles as $det)
                      <option value="{{$det->id}}">{{strtoupper($det->descripcion)}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ci">Personal asignado
                </label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <select id="empleado_id" name="empleado_id" class="form-control col-md-8 col-xs-12 empleado_id"  style="width: 100%;" >

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
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

<script type="text/javascript">



$('#empleado_id').select2({
    placeholder: 'Seleccione un empleado',
    minimumInputLength: 2,
    language: {
      noResults: function() { return "No hay resultado";},
      searching: function() { return "Buscando.."; },
      inputTooShort: function() { return "Por favor ingrese 2 o mas caracteres"; }
    },
    ajax: {
        url: "{{ route('administracion.usuarios.finder')}}",
        dataType: 'json',
        data: function (params) {
            return {
                q: $.trim(params.term),
                type: 'public'
            };
        },
        processResults: function (data) {
            return {
                results: data
            };
        },
        // processResults: function (data) {
        //     return {
        //         results: $.map(data, function(obj) {
        //             return { id: obj.id, text: obj.text, telf: obj.telf };
        //         })
        //     };
        // },
        cache: true
    }
});

 $('.rol_id').select2({minimumResultsForSearch:-1,placeholder:"Rol",allowClear:true});



</script>
