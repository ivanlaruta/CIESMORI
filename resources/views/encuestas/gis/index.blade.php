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
  
  // var mymap = L.map('mapid', {
      // center: [-16.5021244,-68.1312175],
      // zoom: 15
  // });

  var mymap = L.map('mapid').setView([-16.5021244,-68.1312175], 13);


  L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', 
  {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox.streets'
  }).addTo(mymap);

  var LeafIcon = L.Icon.extend({
    options: {
      iconSize:     [30, 30],
      iconAnchor:   [30, 30],
      popupAnchor:  [-3, -76]
    }
  });

  var greenIcon = new LeafIcon({iconUrl: "{{url('/leaflet/package/dist/images/caminando.png')}}" });


  L.marker([-16.500536, -68.133468]).addTo(mymap).bindPopup("<b>Puntito1!</b><br />Mesajito.").openPopup();
  L.marker([-16.503807, -68.131183]).addTo(mymap).bindPopup("<b>Puntito2!</b>").openPopup();
  L.marker([-16.495816, -68.134163]).addTo(mymap).bindPopup("<b>Puntito3!</b>").openPopup();
  L.marker([-16.495225, -68.127429], {icon: greenIcon}).addTo(mymap);
  L.marker([-16.501309, -68.147591], {icon: greenIcon}).addTo(mymap);
  L.marker([-16.493228, -68.155520], {icon: greenIcon}).addTo(mymap);

  L.circle([-16.499556, -68.124226], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 500
  }).addTo(mymap).bindPopup("circuloo.");

  L.polygon([
    [-16.501382, -68.134659],
    [-16.500446, -68.137577],
    [-16.501350, -68.144138],
    [-16.513599, -68.146047],
    [-16.519623, -68.137925]
  ]).addTo(mymap).bindPopup("Poligonooooo.");


  var popup = L.popup();


</script>
@endsection
