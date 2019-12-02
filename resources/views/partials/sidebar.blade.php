        <div class="col-md-3 left_col   ">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a  class="site_title"><i class="fa fa-paw"></i> <span>CIESMORI</span></a>
            </div>
            <div class="clearfix"></div>
            <br />
            @if(Auth::user()->rol_id == 5)
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bar-chart"></i> Encuestas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('encuesta.index')}}">Lista de encuestas</a></li>
                      <li><a href="{{ route('encuesta.admin_libro')}}">Libro de datos</a></li>
                      <li><a href="{{ route('encuesta.cuota_ciudad')}}">Cuotas por Ciudad</a></li>
                      <li><a href="{{ route('encuesta.dashboard')}}">Dashboard</a></li>
                      {{-- <li><a href="{{ route('encuesta.gis2')}}">GIS PUNTOS</a></li> --}}
                      <li><a href="{{ route('encuesta.gis')}}">GIS</a></li>
                      {{-- <li><a href="{{ route('encuesta.migracion')}}">Migración de encuestas</a></li> --}}
                      {{-- <li><a href="{{ route('encuesta.libroDatos')}}">Libro de datos</a></li> --}}
z
                    </ul>
                  </li>

                  <li><a><i class="fa fa-home"></i> Administracion <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('administracion.encuestadores.index')}}">Registro de Personal</a></li>
                      <li><a href="{{ route('administracion.usuarios.index')}}">Usuarios</a></li>
                    </ul>
                  </li>

                </ul>
              </div>
            </div>

            @else

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> OTRAS OPCIONES <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="AD">opciones1</a></li>

                      <li><a href="BC">Opciones 2</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            @endif
          </div>
        </div>
