
          
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                
                 
                  
                    <br />
            
                    <form method="post" action="{{ route('encuesta.editar') }}" class="form-horizontal form-label-left">
                      {{ csrf_field() }}
                      
                      <input type="text" id="id" name="id" value="{{$encuesta->id}}" hidden="hidden">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nombre de encuesta 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nombre" name="nombre" required="required" class="form-control col-md-7 col-xs-12" value="{{$encuesta->nombre}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Base de datos
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" disabled class="form-control col-md-7 col-xs-12" value="{{$encuesta->nombre_db}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Tabla origen
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" disabled class="form-control col-md-7 col-xs-12" value="{{$encuesta->nombre_tabla}}">
                        </div>
                      </div>

                      

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ruta Audios
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="carpeta_audios" name="carpeta_audios"  class="form-control col-md-7 col-xs-12" placeholder="D:\Encuestas\encuesta ABC\audios"  value="{{$encuesta->carpeta_audios}}">
                        </div>
                      </div>

                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ruta Imagenes
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="carpeta_imagenes" name="carpeta_imagenes"  class="form-control col-md-7 col-xs-12" placeholder="D:\Encuestas\encuesta ABC\imagenes" value="{{$encuesta->carpeta_imagenes}}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Observacion
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="observacion" name="observacion"  class="form-control col-md-7 col-xs-12" placeholder="Observaciones" value="{{$encuesta->observacion}}">
                        </div>
                      </div>
                                            
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success btn-block">Aceptar</button>
                        </div>
                      </div>

                    </form>
                                
              </div>
            </div>



<script type="text/javascript">
  

</script>

