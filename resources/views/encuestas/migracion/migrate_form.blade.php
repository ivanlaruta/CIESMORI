

  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Creacion de encuesta</h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                
                 
                  
                    <br />
            
                    <form method="post" action="{{ route('encuesta.migrar') }}" class="form-horizontal form-label-left">
                      {{ csrf_field() }}
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nombre de encuesta 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nombre" name="nombre" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Base de datos
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-6 col-xs-12 " id="db" name="db" required="required" data-width="100%">
                            <option>Seleccione una Base de datos</option>
                            @for ($i = 0; $i <= sizeof($name_db)-1; $i++) 
                              <option value="{{$name_db[$i]->Database}}">{{$name_db[$i]->Database}}</option>
                            @endfor
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tabla origen
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-6 col-xs-12 " id="origen" name="origen" required="required" data-width="100%">
                            <option>Seleccione una tabla</option>                          
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ruta Audios
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="carpeta_audios" name="carpeta_audios"  class="form-control col-md-7 col-xs-12" placeholder="D:\Encuestas\encuesta ABC\audios">
                        </div>
                      </div>

                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ruta Imagenes
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="carpeta_imagenes" name="carpeta_imagenes"  class="form-control col-md-7 col-xs-12" placeholder="D:\Encuestas\encuesta ABC\imagenes">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Observacion
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="observacion" name="observacion"  class="form-control col-md-7 col-xs-12" placeholder="Observaciones">
                        </div>
                      </div>
                                            
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success btn-block">Migrar</button>
                        </div>
                      </div>

                    </form>
                                
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>




<script type="text/javascript">
  
function selectFolder(e) {
    var theFiles = e.target.files;
    var relativePath = theFiles[0].mozFullPath;
    var folder = relativePath.split("/");
    alert(folder[0]);
    
}



  $('#db').change(function(){

    detalle($(this).val());

  });


  function detalle (db){

      $.ajax({
        type: "GET",
        cache: false,
        dataType: "html",
        url: "{{ route('listar_tablas_db')}}",
        data: {
          name_db: db
        },
        success: function(dataResult)
        {
          // alert(dataResult);
          $('option', '#origen').remove();
          $('#origen').append('<option>Seleccione una tabla</option>');

          var obj_php = "<?php echo json_encode("+dataResult+"); ?>";
          var tablas = JSON.parse(obj_php );

          for (var i = 0; i < tablas.length; i++) {
            $('#origen').append($('<option>', {value:tablas[i].tables, text:tablas[i].tables}));
            console.log(tablas[i].tables);
          }
        },

      });
    };

</script>

