@extends('layouts.main')

@section('cabecera')


  <link rel="stylesheet" href="https://js.arcgis.com/4.12/esri/css/main.css">
<script src="https://js.arcgis.com/4.12/"></script>
  
  <script>
require([
  "esri/Map",
  "esri/views/MapView",
  "esri/Graphic",
  "esri/geometry/Point",
  "esri/symbols/SimpleMarkerSymbol",
  "esri/geometry/Polyline",
  "esri/symbols/SimpleLineSymbol",
  "esri/geometry/Polygon",
  "esri/symbols/SimpleFillSymbol"
], function(Map, MapView, Graphic
) {
  
  var map = new Map({
    basemap: "topo-vector"
  });
    
  var view = new MapView({
    container: "viewDiv",  
    map: map,
    center: [-68.14444,-16.500577],
    zoom: 12
  });
 

      var point = {
        type: "point",
        latitude: -16.500577,
        longitude: -68.14444
      };

      var simpleMarkerSymbol = {
        type: "simple-marker",
        color: [226, 119, 40],  // orange
        outline: {
          color: [255, 255, 255], // white
          width: 1
        }
      };

      var pointGraphic = new Graphic({
        geometry: point,
        symbol: simpleMarkerSymbol
      });

      view.graphics.add(pointGraphic);

      var point = {
        type: "point",
        latitude: -16.496,
        longitude: -68.134
      };

      var simpleMarkerSymbol = {
        type: "simple-marker",
        color: [0, 0, 0],  // orange
        outline: {
          color: [255, 255, 255], // white
          width: 1
        }
      };

      var pointGraphic = new Graphic({
        geometry: point,
        symbol: simpleMarkerSymbol
      });

      view.graphics.add(pointGraphic);
 

});

</script>

@endsection


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
           
            <h2>Mapa</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            holaaaaaaaaaaaaaaaaaaaa
              <div id="viewDiv" style="width: 100%; height: 800px; position: relative;"></div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
 
@endsection

