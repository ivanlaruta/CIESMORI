@extends('layouts.main_map')

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
           
            <h2>Gis</h2>
            {{-- <div class="pull-right" >
              <a  href="#" class="btn btn-success btn_nuevo " data-toggle="tooltip" data-placement="bottom" title="Agregar Nuevo" ><i class="fa fa-plus"></i></a>
            </div> --}}
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

          	<div class="form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">Encuesta
	            </label>
	            <div class="col-md-6 col-sm-6 col-xs-12">
	              <select class="form-control col-md-6 col-xs-12 " id="enceusta" name="enceusta"  data-width="100%">
	                <option>Seleccione una Encuesta</option>
	               @foreach($encuestas as $det)
                      <option value="{{$det->id}}">{{strtoupper($det->nombre)}}</option>
                    @endforeach
	              </select>
	            </div>
	             <div class="col-md-3 col-sm-3 col-xs-12">
	             	<a href="#" class="btn btn-success btn-block  btn_genera" id_encuesta = '{{$det->id}}'  title="generar">
                          <span class="fa fa-globe fa-lg"></span> Ver mapa
                        </a>
	            </div>
	            <div class="contenido"></div>
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

var contenido = $(".contenido");
var select_Val = 0;


  $('#enceusta').change(function(){
  	// alert($(this).val());
    mapa($(this).val());
  });

  var btn = $(".btn_genera");
  btn.on("click",function(){
  	select_Val =$('#enceusta').val(); 
  	alert(select_Val);
    mapa(select_Val);
  });

  // $('#enceusta').change(function(){
  // 	// alert($(this).val());
  //   mapa($(this).val());
  // });


var mapa = function(encuesta){
  $.ajax({
    type: "GET",
    cache: false,
    dataType: "html",
    url: "{{ route('encuesta.map')}}",
    data: {
      id_encuesta: encuesta
    },
    success: function(dataResult)
    {
      $body.removeClass("loading");
      contenido.empty().html(dataResult);
    }
  });
};

mapa(select_Val);
	
</script>
@endsection

