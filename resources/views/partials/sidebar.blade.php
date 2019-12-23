        <div class="col-md-3 left_col   ">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a  class="site_title"><i class="fa fa-paw"></i> <span>CIESMORI</span></a>
            </div>
            <div class="clearfix"></div>
            <br />

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">

                  @if(Auth::user()->rol->descripcion == 'ADMINISTRADOR')
                  <li><a><i class="fa fa-bar-chart"></i> Encuestas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('encuesta.index')}}">Lista de encuestas</a></li>
                      <li><a href="{{ route('encuesta.admin_libro')}}">Libro de datos</a></li>
                      <li><a href="{{ route('encuesta.dashboard')}}">Dashboard</a></li>
                      <li><a href="{{ route('encuesta.gis')}}">GIS</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-home"></i> Administracion <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('administracion.encuestadores.index')}}">Registro de Personal</a></li>
                      <li><a href="{{ route('administracion.usuarios.index')}}">Usuarios</a></li>
                      <li><a href="{{ route('administracion.personal')}}">Reporte de Personal</a></li>
                    </ul>
                  </li>
                  @endif

                  @if(Auth::user()->rol->descripcion == 'GERENTE')
                  <li><a><i class="fa fa-bar-chart"></i> Encuestas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('encuesta.admin_libro')}}">Libro de datos</a></li>
                      <li><a href="{{ route('encuesta.dashboard')}}">Dashboard</a></li>
                      <li><a href="{{ route('encuesta.gis')}}">GIS</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-home"></i> Administracion <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('administracion.encuestadores.index')}}">Registro de Personal</a></li>
                      <li><a href="{{ route('administracion.usuarios.index')}}">Usuarios</a></li>
                    </ul>
                  </li>
                  @endif

                  @if(Auth::user()->rol->descripcion == 'CLIENTE')
                  <li><a><i class="fa fa-bar-chart"></i> Encuestas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('encuesta.index')}}">Lista de encuestas</a></li>
                      <li><a href="{{ route('encuesta.dashboard')}}">Dashboard</a></li>
                    </ul>
                  </li>
                  @endif

                  @if(Auth::user()->rol->descripcion == 'SUPERVISOR')
                  <li><a><i class="fa fa-bar-chart"></i> Encuestas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('encuesta.index')}}">Lista de encuestas</a></li>
                      <li><a href="{{ route('encuesta.dashboard')}}">Dashboard</a></li>
                    </ul>
                  </li>
                  @endif

                  @if(Auth::user()->rol->descripcion == 'SUPERVISOR')
                  <li><a><i class="fa fa-bar-chart"></i> Encuestas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <li><a href="{{ route('encuesta.admin_libro')}}">Libro de datos</a></li>
                      <li><a href="{{ route('encuesta.dashboard')}}">Dashboard</a></li>
                      <li><a href="{{ route('encuesta.gis')}}">GIS</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-home"></i> Administracion <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('administracion.encuestadores.index')}}">Registro de Personal</a></li>
                    </ul>
                  </li>
                  @endif

                   @if(Auth::user()->rol->descripcion == 'EDITOR/CODIFICADOR')
                  <li><a><i class="fa fa-bar-chart"></i> Encuestas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('encuesta.index')}}">Lista de encuestas</a></li>
                      <li><a href="{{ route('encuesta.admin_libro')}}">Libro de datos</a></li>
                      <li><a href="{{ route('encuesta.dashboard')}}">Dashboard</a></li>
                      <li><a href="{{ route('encuesta.gis')}}">GIS</a></li>
                    </ul>
                  </li>

                  @endif

                   @if(Auth::user()->rol->descripcion == 'PROGRAMADOR')
                  <li><a><i class="fa fa-bar-chart"></i> Encuestas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('encuesta.index')}}">Lista de encuestas</a></li>
                      <li><a href="{{ route('encuesta.admin_libro')}}">Libro de datos</a></li>
                      <li><a href="{{ route('encuesta.dashboard')}}">Dashboard</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-home"></i> Administracion <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <li><a href="{{ route('administracion.usuarios.index')}}">Usuarios</a></li>
                    </ul>
                  </li>
                  @endif

                   @if(Auth::user()->rol->descripcion == 'GESTOR OPERACIONES')
                  <li><a><i class="fa fa-bar-chart"></i> Encuestas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('encuesta.index')}}">Lista de encuestas</a></li>
                      <li><a href="{{ route('encuesta.dashboard')}}">Dashboard</a></li>
                      <li><a href="{{ route('encuesta.gis')}}">GIS</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-home"></i> Administracion <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('administracion.encuestadores.index')}}">Registro de Personal</a></li>
                    </ul>
                  </li>
                  @endif

                   @if(Auth::user()->rol->descripcion == 'GESTOR PROYECTO')
                  <li><a><i class="fa fa-bar-chart"></i> Encuestas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('encuesta.index')}}">Lista de encuestas</a></li>
                      <li><a href="{{ route('encuesta.admin_libro')}}">Libro de datos</a></li>
                      <li><a href="{{ route('encuesta.dashboard')}}">Dashboard</a></li>
                      <li><a href="{{ route('encuesta.gis')}}">GIS</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-home"></i> Administracion <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('administracion.encuestadores.index')}}">Registro de Personal</a></li>
                    </ul>
                  </li>
                  @endif

                   @if(Auth::user()->rol->descripcion == 'ADM. PERSONAL')

                  <li><a><i class="fa fa-home"></i> Administracion <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('administracion.encuestadores.index')}}">Registro de Personal</a></li>
                      <li><a href="{{ route('administracion.usuarios.index')}}">Usuarios</a></li>
                    </ul>
                  </li>
                  @endif

                  @if(Auth::user()->rol->descripcion == 'ADM. BD')
                  <li><a><i class="fa fa-bar-chart"></i> Encuestas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('encuesta.index')}}">Lista de encuestas</a></li>
                      <li><a href="{{ route('encuesta.admin_libro')}}">Libro de datos</a></li>
                      <li><a href="{{ route('encuesta.gis')}}">GIS</a></li>
                    </ul>
                  </li>
                  @endif

                   @if(Auth::user()->rol->descripcion == 'USUARIO 1')
                  <li><a><i class="fa fa-bar-chart"></i> Encuestas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('encuesta.index')}}">Lista de encuestas</a></li>
                    </ul>
                  </li>

                  @endif

                   @if(Auth::user()->rol->descripcion == 'USUARIO 2')
                  <li><a><i class="fa fa-bar-chart"></i> Encuestas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('encuesta.admin_libro')}}">Libro de datos</a></li>
                    </ul>
                  </li>
                  @endif

                   @if(Auth::user()->rol->descripcion == 'USUARIO 3')

                  <li><a><i class="fa fa-home"></i> Administracion <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('administracion.encuestadores.index')}}">Registro de Personal</a></li>
                    </ul>
                  </li>
                  @endif

                  @if(Auth::user()->rol->descripcion == 'USUARIO 4')
                  <li><a><i class="fa fa-home"></i> Administracion <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('administracion.usuarios.index')}}">Usuarios</a></li>
                    </ul>
                  </li>
                  @endif

                </ul>
              </div>
            </div>

          </div>
        </div>
