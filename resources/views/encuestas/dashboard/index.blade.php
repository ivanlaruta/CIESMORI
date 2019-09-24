@extends('layouts.main')

@section('content')

        <div class="right_col" role="main">
          <div class="row tile_count">
            <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-book"></i> Encuestas</span>
              <div class="count green">{{$total_encuestas}}</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i> Encuestas relacionadas</span>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-bar-chart"></i> Total Registros</span>
              <div class="count">{{$total_detalle_encuestas}}</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>En todas las encuestas</span>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-fast-forward"></i> Total Audios</span>
              <div class="count">512</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>Todos los audios</span>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-file-image-o"></i> Total Imagenes</span>
              <div class="count">1025</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>Todas las imagenes</span>
            </div>
          </div>
          <div class="row">
          @foreach($encuestas as $det)
            <div class="col-md-6 col-sm-6 col-xs-12">
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
                  @if(!empty($det->observacion))<p>{{$det->observacion}}</p><br />@endif
                  <div class="project_detail">
                    <p class="title">Origen Base de datos/tabla:</p>
                    <p>{{$det->nombre_db}}/{{$det->nombre_tabla}}</p>
                    @if(!empty($det->carpeta))
                      <p class="title">Carpeta multimedia</p>
                      <p>{{$det->carpeta}}</p>
                    @endif
                  </div>
                  <div class="row tile_count">
                    <div class="col-md-4 col-sm-12 col-xs-4 tile_stats_count">
                      <span class="count_top"><i class="fa fa-bar-chart"></i> Total Registros</span>
                      <div class="count">{{$det->num_registros()}}</div>
                      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>En todas las encuestas</span>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-4 tile_stats_count">
                      <span class="count_top"><i class="fa fa-fast-forward"></i> Total Audios</span>
                      <div class="count">12</div>
                      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>Todos los audios</span>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-4 tile_stats_count">
                      <span class="count_top"><i class="fa fa-file-image-o"></i> Total Imagenes</span>
                      <div class="count">152</div>
                      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>Todas las imagenes</span>
                    </div>
                  </div>
                  <h4>Distribucion por ciudad</h4>
                       
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    @if ($det->lista_ciudades->count() > 0)
                      @foreach ($det->lista_ciudades as $lista)
                        <div class="row">
                          <div class="col-md-4" align="right">{{strtoupper($lista->ciudad)}}
                            
                          </div>
                          <div class="col-md-4">
                            <div class="progress">
                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{$lista->porcentaje}}"></div>
                            </div>

                          </div>
                          <div class="col-md-4" align="left">{{strtoupper($lista->cantidad)}} Registros (<small>{{number_format((float)$lista->porcentaje, 2, '.', '')}}%</small>)
                           
                          </div>

                        </div>
                      @endforeach
                    @endif
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>

         
          
        </div>

@endsection

