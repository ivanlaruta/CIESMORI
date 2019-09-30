@extends('layouts.main')

@section('content')


        <div class="right_col" role="main">
          <div class="row tile_count">
            Mi primer mapita
            <div id="mapid" style="width: 600px; height: 400px; position: relative;"></div>
          </div>
        </div>

@endsection
@section('scripts')

<script type="text/javascript">
  
  var mymap = L.map('mapid', {
      center: [-16.5021244,-68.1312175],
      zoom: 15
  });

  // var mymap = L.map('mapid').setView([51.505, -0.09], 13);


  L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox.streets'
  }).addTo(mymap);

</script>
@endsection
