              <style type="text/css">

                  thead,
                  tbody {
                  display: block;
                  text-align: center;
                  }

                  thead {
                  text-align: center;
                  }

                  tbody {
                  background: white;
                  overflow-y: auto;
                  height: 60em;
                  }

                  thead th,
                  tbody td {
                  width: 4em;
                  padding: 2px;
                  }

                  thead tr th:first-child,
                  tbody tr td:first-child {
                    width: 8em;
                    min-width: 8em;
                    max-width: 8em;
                    word-break: break-all;
                  }


              </style>






                <h4>Lista de encuesta / {{$encuesta_Cab->nombre}}</h4>
                <table class="table table-bordered table-responsive table-hover" id="tabla_filtrada">
                  <thead>
                    <tr>
                      @for  ($i = 0; $i < sizeof($array_campos); $i++)
                        <th>{{$array_campos[$i]}}</th>
                      @endfor
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($detalle as $det)
                      <tr>
                        @for  ($i = 0; $i < sizeof($array_campos); $i++)
                        <td>
                          @php
                              echo $det->{$array_campos[$i]};
                          @endphp
                          </th>
                         @endfor
                      </tr>
                    @endforeach
                  </tbody>
                </table>
