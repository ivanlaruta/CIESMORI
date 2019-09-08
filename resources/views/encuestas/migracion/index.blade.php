@extends('layouts.main')

@section('content')

<div class="right_col" role="main">
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
            
                    <form method="get" action="{{ route('encuesta.migrar') }}" class="form-horizontal form-label-left">
                      {{ csrf_field() }}
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nombre de encuesta 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nombre" name="nombre" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tabla origen
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-6 col-xs-12 " id="origen" name="origen" required="required" data-width="100%">
                            <option>Seleccione una tabla</option>
                            @for ($i = 0; $i <= sizeof($tablas_db)-1; $i++) 
                              <option value="{{$tablas_db[$i]->Tables_in_tablas_ciesmori}}">{{$tablas_db[$i]->Tables_in_tablas_ciesmori}}</option>
                            @endfor
                          </select>
                        </div>
                      </div>
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                          
                          <button type="submit" class="btn btn-success">Crear</button>
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
</div>

@endsection

@section('scripts')

<script type="text/javascript">
  


</script>
@endsection