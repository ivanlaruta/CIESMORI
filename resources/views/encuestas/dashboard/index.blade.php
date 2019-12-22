<?php $cont_acordion = 0; ?>
@extends('layouts.main')

@section('content')

        <div class="right_col" role="main">
          <div class="row tile_count">
            @if(Auth::user()->rol->descripcion == 'ADMINISTRADOR')
            <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-book"></i> Encuestas</span>
              <div class="count">{{$total_encuestas}}</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i> Encuestas relacionadas</span>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-bar-chart"></i> Total Registros</span>
              <div class="count green">{{$total_detalle_encuestas}}</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>En todas las encuestas</span>
            </div>
            @endif
<!--             <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-fast-forward"></i> Total Audios</span>
              <div class="count">512</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>Todos los audios</span>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-file-image-o"></i> Total Imagenes</span>
              <div class="count">1025</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>Todas las imagenes</span>
            </div> -->
          </div>

          @foreach($encuestas as $det)
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel tile">
                <div class="x_title">
                  <h2>{{$det->id}}.- {{strtoupper($det->nombre)}} </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="row tile_count">
                    <div class="col-md-2 col-sm-12 col-xs-3 tile_stats_count">
                      <span class="count_top"><i class="fa fa-bar-chart"></i> Total Registros</span>
                      <div class="count">{{$det->num_registros()}}</div>
                      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i><?php $val=($det->num_registros() * 100)/ $det->meta_estudio;?>{{$val}}% </span>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-3 tile_stats_count">
                      <span class="count_top"><i class="fa fa-file-image-o"></i> Meta del Estudio</span>
                      <div class="count">{{$det->meta_estudio}}</div>
                      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>Meta del Estudio</span>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-3 tile_stats_count">
                      <span class="count_top"><i class="fa fa-fast-forward"></i> Total Audios</span>
                      <div class="count">{{$det->cantidad_audios()}}</div>
                      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>Todos los audios</span>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-3 tile_stats_count">
                      <span class="count_top"><i class="fa fa-file-image-o"></i> Total Imagenes</span>
                      <div class="count">{{$det->cantidad_imagenes()}}</div>
                      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>Todas las imagenes</span>
                    </div>

                    <div class="col-md-2 col-sm-12 col-xs-3 tile_stats_count">
                      <span class="count_top"><i class="fa fa-users"></i> Total de Personal Asignado</span>
                      <div class="count">{{$det->cantidad_empleados()}}</div>
                      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>Número de Encuestadores</span>
                    </div>

                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <h4>Distribucion por Ciudad</h4>
                    <canvas id="myChart_{{$det->id}}" width="400" height="400"></canvas>
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                         <th>Ciudad</th>
                         <th>Total</th>
                         <th>% Cuota</th>
                         <th>Personal por ciudad</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($det->lista_departamento as $lista)
                      <tr>
                        <td>{{$lista->departamento}}</td>
                        <td align="center">{{$lista->cantidad}}</td>
                        <td align="center">{{number_format((float)$lista->porcentaje, 2, '.', '')}}%</td>
                        <td align="center">{{$lista->nro_ciudad}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  </div>



                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <h4>Distribucion por ciudad</h4>
                    @if ($det->lista_ciudades->count() > 0)
                      @foreach ($det->lista_ciudades as $lista)
                        <div>
                          <p>{{strtoupper($lista->ciudad)}} <small>{{strtoupper($lista->departamento)}}</small></p>
                          <div class="row">
                            <div class="col-md-5">
                              <div class="progress progress_sm" style="width: 100%;">
                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{$lista->porcentaje}}"></div>
                              </div>
                            </div>
                            <div class="col-md-3" align="left">
                                  {{strtoupper($lista->cantidad)}}
                                  <small>({{number_format((float)$lista->porcentaje, 2, '.', '')}}%)</small>
                            </div>
                            <div class="col-md-2 pull-right" align="left">
                                 <i class="fa fa-file-image-o fa-2x"></i> {{$lista->cant_img}}
                            </div><div class="col-md-2 pull-right" align="left">
                                 <i class="fa fa-fast-forward fa-2x"></i> {{$lista->cant_audios}}
                            </div>
                          </div>
                        </div>


                      @endforeach
                    @endif
                  </div>
              </div>
          <!---DESDE ACA -->
            @if(Auth::user()->rol->descripcion == 'ADMINISTRADOR')
               <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2><i class="fa fa-align-left"></i> Detalle Multimedia / Personal Asignado </h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#">Settings 1</a>
                              </li>
                              <li><a href="#">Settings 2</a>
                              </li>
                            </ul>
                          </li>
                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">

                        <!-- start accordion -->

                        <div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
                          @foreach ($det->encabezado_multimedia as $lista)
                          <?php $cont_acordion = $cont_acordion + 1; ?>
                          <div class="panel">
                            <a class="panel-heading collapsed" role="tab" id="heading<?php echo $cont_acordion; ?>" data-toggle="collapse" data-parent="#accordion1" href="#collapse<?php echo $cont_acordion; ?>" aria-expanded="false" aria-controls="collapse<?php echo $cont_acordion; ?>">
                              <h4 class="panel-title">
                                <table class="table table-responsive table-hover">
                                  <body>
                                    <tr>
                                     <th>Nombre del encuestador</th>
                                      <th>Ciudad</th>
                                      <th>Numero de boletas</th>
                                      <th>cantidad_de_archivos</th>

                                    </tr>
                                    <tr>
                                      <td align="center">{{$lista->nomb_enc}}</td>
                                      <td align="center"> {{$lista->ciudad}}</td>
                                      <td align="center">{{$lista->numero_boletas_cuidad}}</td>
                                      <td align="center">{{$lista->cantidad_de_archivos}}</td>

                                    </tr>
                                  </body>
                              </table>

                              </h4>
                            </a>
                            <div id="collapse<?php echo $cont_acordion; ?>" class="panel-collapse collapse" role="tabpane<?php echo $cont_acordion; ?>" aria-labelledby="heading<?php echo $cont_acordion; ?>">
                              <div class="panel-body">
                                <table class="table table-striped table-sm" id="datatable1" >
                                  <thead>
                                    <tr>
                                     <th>Nombre del encuestador</th>
                                     <th>Ciudad</th>
                                     <th>id_auxiliar</th>
                                     <th>Nombre del archivo</th>
                                     <th>Tipo de archivo</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  @foreach ($det->multimedia_encuestadores as $lista1)
                                  @if($lista1->nomb_enc == $lista->nomb_enc )
                                  <tr>
                                    <td>{{$lista1->nomb_enc}}</td>
                                    <td>{{$lista1->ciudad}}</td>
                                    <td>{{$lista1->id_auxiliar}}</td>
                                    <td>{{$lista1->nombre_archivo}}</td>
                                    <td>{{$lista1->tipo}}</td>

                                  </tr>
                                  @endif
                                  @endforeach
                                </tbody>
                              </table>
                              </div>
                            </div>
                          </div>
                          @endforeach
                        </div>

                        <!-- end of accordion -->


                      </div>
                    </div>
                  </div>



                  <!-- HASTA ACA- -->
            @endif
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="ln_solid"></div>
                    <div class="project_detail">
                      <p class="title">Origen Base de datos/tabla:</p>
                      <p>{{$det->nombre_db}}/{{$det->nombre_tabla}}</p>
                      @if(!empty($det->carpeta))
                        <p class="title">Carpeta multimedia</p>
                        <p>{{$det->carpeta}}</p>
                      @endif
                    </div>
                    @if(!empty($det->observacion))<p>{{$det->observacion}}</p>@endif
                  </div>
              </div>
            </div>
            @endforeach
        </div>

@endsection
@section('scripts')

<script type="text/javascript">


$('.collapse').on('show.bs.collapse', function () {
    $('.collapse.in').collapse('hide');
});

@foreach ($encuestas as $det)
  canvas_id='myChart_'+<?php echo json_encode($det->id); ?> ;
  ctx = document.getElementById(canvas_id);
  var pie_labels = [];
  var  pie_data = [];
  var data_canvas = <?php echo json_encode($det->lista_departamento); ?>;
  for (var i = 0; i < data_canvas.length; i++) {
    pie_labels.push(data_canvas[i].departamento.trim()) ;
    pie_data.push(data_canvas[i].cantidad) ;
  }
  content_pie = {
          labels: pie_labels,
          datasets: [{
            data:pie_data,
             backgroundColor: [
                "#26B99A","#9B59B6","#E74C3C","#BDC3C7","#3498DB","#26B99A","#9B59B6","#E74C3C","#BDC3C7","#3498DB"],
              hoverBackgroundColor: [
                "#36CAAB","#B370CF","#E95E4F","#CFD4D8","#49A9EA","#36CAAB","#B370CF","#E95E4F","#CFD4D8","#49A9EA"]
            }]
        };
  pie_settings = {
        type: 'doughnut',
        data: content_pie,
        options: {
          legend: false,
          responsive: true
        }
      }
  var ctx1 = document.getElementById('myChart_1');


  new Chart(ctx, pie_settings);
@endforeach


</script>
@endsection
