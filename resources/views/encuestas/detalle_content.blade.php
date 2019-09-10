                <h4>Lista de encuesta / {{$encuesta_Cab->nombre}}</h4>
                <table class="table table-bordered " id="tabla_filtrada">
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
