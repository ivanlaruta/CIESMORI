
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
              <table class="table table-bordered table-responsive table-hover">
                <thead>
                  <tr>
                    <th style="width: 1%">#</th>
                   
                    <th style="width: 25%">Campo</th>
                    <th style="width: 25%">Codigo</th>
                    <th style="width: 1%">Valor</th>

                  </tr>
                </thead>
                <tbody>
                
                  @foreach($librodatos as $det)
                  <tr>
                    <td>{{$det->id}}</td>
                   
                    <td>{{$det->campo}}</td>
                    <td>{{$det->codigo}}</td>
                    <td>{{$det->valor}}</td>

                  
                  </tr>
                  @endforeach

                </tbody>
              </table>
              </div>
    
  </div>
</div>


<script type="text/javascript">

</script>

