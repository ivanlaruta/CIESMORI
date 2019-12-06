

<div class="row">


            <p>Lista clentes asignads a la encuesta.</p>

            <form method="get" action="{{ route('encuesta.asigna_cliente_store') }}" class="form-horizontal form-label-left"  >
            {{ csrf_field() }}

              <input type="hidden" name="encuesta_id" value="{{$encuesta_id}}" >
              <div class="form-group">
                
                <div class="col-md-8 col-sm-8 col-xs-6">
                  <select class="form-control col-md-7 col-xs-12 "  data-width="100%" id="usuario_id" name="usuario_id" required="required">
                    <option> Seleccione un cliente ...</option>
                    @foreach($users as $det)
                      <option value="{{$det->id}}">{{strtoupper($det->nombre)}} {{strtoupper($det->apellido)}}</option>
                    @endforeach
                  </select>
                </div>
                
                <div class="col-md-4 col-sm-4 col-xs-6">
                 <button type="submit" class="btn btn-block btn-success btn_guardar">Agregar</button>
                </div>
              </div>
            </form>

            <div class="ln_solid"></div>

            <table class="table table-striped projects" id="datatable1">
              <thead>
                <tr>
                 <th>Cliente</th>
                 <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
              @foreach($clientes as $det)
              <tr>
                <td>{{$det->cliente->nombre}} {{$det->cliente->apellido}}</td>
                
                <td>
                   <div class="btn-group" role="group" >
                      <a href="#" class="btn btn-danger btn-xs btn_eliminar" id_cliente = '{{$det->id}}'  data-toggle="tooltip" data-placement="bottom" title="Eliminar">
                        <span class="fa fa-trash"></span> 
                      </a>
                    </div>
                  </td>        
                </tr>
                @endforeach
                

              </tbody>
            </table>


</div>

<div class="modal fade modal_dialog_enc" id="modal_dialog_enc" role="dialog" >
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <form method="get" action="{{  route('encuesta.asigna_cliente_delete') }}" class="form-horizontal form-label-left" id="encuestadores_form" >
                  <div class="modal-body">
                    {{ csrf_field() }}
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
var id_eliminar_enc;
var id_eliminar_emp;
var btn_eliminar_enc = $(".btn_eliminar");
  btn_eliminar_enc.on("click",function(){
    fn_eliminar_enc($(this));
  });
var fn_eliminar_enc = function (objeto){
id_eliminar_enc = objeto.attr("id_cliente");
$('#id_encuesta_txt').val(id_eliminar_enc);
$('#modal_dialog_enc').modal('show');
};
</script>
