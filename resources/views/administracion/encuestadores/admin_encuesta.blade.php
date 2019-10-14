

          
        <div class="">
            <br />

          <form method="get" action="{{ route('administracion.encuestadores.agrega_encuesta') }}" class="form-horizontal form-label-left"  enctype="multipart/form-data">
            {{ csrf_field() }}

              <input type="hidden" name="encuestador_id" value="{{$encuestador_id}}" >
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rol_id">Encuesta
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12 "  data-width="100%" id="encuesta_id" name="encuesta_id" required="required">
                    <option></option>
                    @foreach($encuestas as $det)
                      <option value="{{$det->id}}">{{strtoupper($det->nombre)}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                 <button type="submit" class="btn btn-block btn-success btn_guardar">Agregar</button>
                </div>
              </div>

            </form>
            <div class="ln_solid"></div>

            <table class="table table-striped " id="datatable1">
              <thead>
                <tr>
                 <th style="width: 1%">#</th>
                 <th style="width: 25%">Encuesta</th>
                 <th style="width: 25%">BD</th>
                 <th style="width: 25%">Tabla</th>
                 <th style="width: 25%">opciones</th>
                 
                </tr>
              </thead>
              {{-- <tbody> --}}
              @foreach($encuestador_encuesta as $det)
              <tr>
                <td>{{$encuestador_id}}</td>
                <td>{{$det->encuesta_id}}</td>
                <td>{{$det->encuesta->nombre}}</td>
                <td>{{$det->encuesta->nombre_db}}</td>
                <td>{{$det->encuesta->nombre_tabla}}</td>
                <td>
                      <a href="#" class="btn btn-danger btn-xs btn_eliminar_enc" id_encuesta = '{{$det->encuesta_id}}'  data-toggle="tooltip" data-placement="bottom" title="Eliminar">
                        <span class="fa fa-trash"></span> 
                      </a>
                </td>
                
              </tr>
                @endforeach
                

              </tbody>
            </table>

          </div>
           <div class="modal fade modal_dialog_enc" id="modal_dialog_enc" role="dialog" >
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <form method="get" action="{{  route('administracion.encuestador_encuesta.baja') }}" class="form-horizontal form-label-left" id="encuestadores_form" >
                  <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_encuestador_txt" value="{{$encuestador_id}}" >
                    <input type="hidden" id="id_encuesta_txt" name="id_encuesta_txt">
                    <h4>Eliminar!</h4>
                    <p>Esta tratando de dar de baja este registro.</p>
                    <p>Desea continuar?.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger elimina" id="elimina">Continuar  <span class="fa fa-trash"></span></button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
       


<script type="text/javascript">


// =============== eliminar ============================
var id_eliminar_enc;
var id_eliminar_emp;

var btn_eliminar_enc = $(".btn_eliminar_enc");
  btn_eliminar_enc.on("click",function(){
    fn_eliminar_enc($(this));
  });

var fn_eliminar_enc = function (objeto){
id_eliminar_enc = objeto.attr("id_encuesta");

$('#id_encuesta_txt').val(id_eliminar_enc);
$('#modal_dialog_enc').modal('show');
};

</script>

