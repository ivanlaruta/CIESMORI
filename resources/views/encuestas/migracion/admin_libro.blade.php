@extends('layouts.main')

@section('content')
<style type="text/css" media="screen">

</style>

<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
           
            <h2>Libro de Datos</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <br />
                <form method="post" action="{{ route('encuesta.migrar') }}" class="form-horizontal form-label-left">
                  {{ csrf_field() }}
                  
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Encuesta
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control col-md-6 col-xs-12 " id="encuesta_id" name="encuesta_id" required="required" data-width="100%">
                        <option>Seleccione una encuesta</option>
                        @foreach($encuestas as $det)
                          <option value="{{$det->id}}">{{strtoupper($det->nombre)}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Dato
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control col-md-6 col-xs-12 " id="parametrica_libro" name="parametrica_libro" required="required" data-width="100%">
                        <option>Seleccione un dato</option>
                        @foreach($parametrica as $det)
                          <option value="{{$det->codigo}}">{{strtoupper($det->codigo)}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Codigo
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="codigo" name="codigo" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Valor
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="valor"  name="valor"  required="required" class="form-control col-md-7 col-xs-12">
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
</div>

@endsection

@section('scripts')
<script type="text/javascript">


</script>
@endsection

