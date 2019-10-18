@extends('layouts.main_map')

@section('cabecera')




    <link href="{{asset('gis_shape/esri.css')}}" rel="stylesheet">
    <script src="{{asset('gis_shape/init.js')}}"></script>

    <script>

var posicionA = [];
var ubicacon_a  = <?php echo json_encode($ubicacon_a); ?>;
for (var i = 0; i < ubicacon_a.length; i++) {
  var data_temp = [];
  data_temp.push(parseFloat(ubicacon_a[i].longitud_a)) ;
  data_temp.push(parseFloat(ubicacon_a[i].latitud_a)) ;
  posicionA.push(data_temp);
}

var posicionB = [];
var ubicacon_b  = <?php echo json_encode($ubicacon_b); ?>;
for (var i = 0; i < ubicacon_b.length; i++) {
  var data_temp = [];
  data_temp.push(parseFloat(ubicacon_b[i].longitud_b)) ;
  data_temp.push(parseFloat(ubicacon_b[i].latitud_b)) ;
  posicionB.push(data_temp);
}

var posicionC = [];
var ubicacon_c  = <?php echo json_encode($ubicacon_c); ?>;
for (var i = 0; i < ubicacon_c.length; i++) {
  var data_temp = [];
  data_temp.push(parseFloat(ubicacon_c[i].longitud_c)) ;
  data_temp.push(parseFloat(ubicacon_c[i].latitud_c)) ;
  posicionC.push(data_temp);
}


console.log(posicionC);

      var map;

      require([
        "esri/config",
        "esri/InfoTemplate",
        "esri/map",

        "esri/geometry/Point",
        "esri/symbols/SimpleMarkerSymbol",
        "esri/graphic",

        "esri/request",
        "esri/geometry/scaleUtils",
        "esri/layers/FeatureLayer",
        "esri/renderers/SimpleRenderer",
        "esri/symbols/PictureMarkerSymbol",
        "esri/symbols/SimpleFillSymbol",
        "esri/symbols/SimpleLineSymbol",
        "dojo/dom",
        "dojo/json",
        "dojo/on",
        "dojo/parser",
        "dojo/sniff",
        "dojo/_base/array",
        "esri/Color",
        "dojo/_base/lang",
        "dijit/layout/BorderContainer",
        "dijit/layout/ContentPane",
        "dojo/domReady!"
      ],
        function (
        esriConfig, InfoTemplate, Map,  Point,
        SimpleMarkerSymbol, Graphic,request, scaleUtils, FeatureLayer,
        SimpleRenderer, PictureMarkerSymbol, SimpleFillSymbol, SimpleLineSymbol,
        dom, JSON, on, parser, sniff, arrayUtils, Color, lang
      ) {

          parser.parse();

          var portalUrl = "https://www.arcgis.com";

          esriConfig.defaults.io.proxyUrl = "/proxy/";
          esriConfig.defaults.io.alwaysUseProxy = false;

          on(dom.byId("uploadForm"), "change", function (event) {
            var fileName = event.target.value.toLowerCase();

            if (sniff("ie")) { //filename is full path in IE so extract the file name
              var arr = fileName.split("\\");
              fileName = arr[arr.length - 1];
            }
            if (fileName.indexOf(".zip") !== -1) {//is file a zip - if not notify user
              generateFeatureCollection(fileName);
            }
            else {
              dom.byId('upload-status').innerHTML = '<p style="color:red">Add shapefile as .zip file</p>';
            }
          });

          map = new Map("mapCanvas", {
            basemap: "topo",
            center: [-65.9197233,-16.7811482],
            zoom: 6
          });

          map.on("load", mapLoaded);
          map.on("load", mapLoaded2);
          map.on("load", mapLoaded3);




        function mapLoaded(){
          var points = posicionA;
          var iconPath = "M30 15.957V32H20V20h-8v12H2V16H0l6-6V0h6v4l4-4 16 15.957h-2z";
          var initColor = "#366EC3";
          arrayUtils.forEach(points, function(point) {
            var graphic = new Graphic(new Point(point), createSymbol(iconPath, initColor));
            map.graphics.add(graphic);
          });
        }

        function mapLoaded2(){
          var points = posicionB;
          var iconPath = "M16,3.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.143,7.5,18.121,7.5,18.121S23.5,15.143,23.5,11C23.5,6.858,20.143,3.5,16,3.5z M16,14.584c-1.979,0-3.584-1.604-3.584-3.584S14.021,7.416,16,7.416S19.584,9.021,19.584,11S17.979,14.584,16,14.584z";
          var initColor = "#003A4C";
          arrayUtils.forEach(points, function(point) {
            var graphic = new Graphic(new Point(point), createSymbol(iconPath, initColor));
            map.graphics.add(graphic);
          });
        }

        function mapLoaded3(){
          var points = posicionC;
          var iconPath = "M7.101 12C7.064 11.667 7 11.342 7 11c0-4.963 4.039-9 9.006-9C20.965 2 25 6.037 25 11s-4.035 9-8.994 9a1 1 0 0 0 0 2c5.022 0 9.258-3.39 10.568-8h1.716a1.65 1.65 0 0 0 1.65-1.65v-2.7A1.65 1.65 0 0 0 28.29 8h-1.716c-1.31-4.609-5.546-8-10.568-8C9.938 0 5 4.936 5 11c0 .338.021.67.051 1h2.051zM23 11c0-3.868-3.136-7-6.994-7A7 7 0 1 0 23 11zm8.666 19.848C31.258 25.401 21.447 24 16 24 10.569 24 .741 25.407.332 30.848L.249 32h31.5l-.083-1.152z";
          var initColor = "#009493";
          arrayUtils.forEach(points, function(point) {
            var graphic = new Graphic(new Point(point), createSymbol(iconPath, initColor));
            map.graphics.add(graphic);
          });
        }

        function createSymbol(path, color){
          var markerSymbol = new esri.symbol.SimpleMarkerSymbol({  "size": 20});
          markerSymbol.setPath(path);
          markerSymbol.setColor(new dojo.Color(color));
          markerSymbol.setOutline(null);
          return markerSymbol;
        }

          function generateFeatureCollection (fileName) {
            var name = fileName.split(".");
            //Chrome and IE add c:\fakepath to the value - we need to remove it
            //See this link for more info: http://davidwalsh.name/fakepath
            name = name[0].replace("c:\\fakepath\\", "");

            dom.byId('upload-status').innerHTML = '<b>Loading </b>' + name;

            //Define the input params for generate see the rest doc for details
            //http://www.arcgis.com/apidocs/rest/index.html?generate.html
            var params = {
              'name': name,
              'targetSR': map.spatialReference,
              'maxRecordCount': 1000,
              'enforceInputFileSizeLimit': true,
              'enforceOutputJsonSizeLimit': true
            };

            //generalize features for display Here we generalize at 1:40,000 which is approx 10 meters
            //This should work well when using web mercator.
            var extent = scaleUtils.getExtentForScale(map, 40000);
            var resolution = extent.getWidth() / map.width;
            params.generalize = true;
            params.maxAllowableOffset = resolution;
            params.reducePrecision = true;
            params.numberOfDigitsAfterDecimal = 0;

            var myContent = {
              'filetype': 'shapefile',
              'publishParameters': JSON.stringify(params),
              'f': 'json',
              'callback.html': 'textarea'
            };

            //use the rest generate operation to generate a feature collection from the zipped shapefile
            request({
              url: portalUrl + '/sharing/rest/content/features/generate',
              content: myContent,
              form: dom.byId('uploadForm'),
              handleAs: 'json',
              load: lang.hitch(this, function (response) {
                if (response.error) {
                  errorHandler(response.error);
                  return;
                }
                var layerName = response.featureCollection.layers[0].layerDefinition.name;
                dom.byId('upload-status').innerHTML = '<b>Loaded: </b>' + layerName;
                addShapefileToMap(response.featureCollection);
              }),
              error: lang.hitch(this, errorHandler)
            });
          }

          function errorHandler (error) {
            dom.byId('upload-status').innerHTML =
            "<p style='color:red'>" + error.message + "</p>";
          }

          function addShapefileToMap (featureCollection) {
            //add the shapefile to the map and zoom to the feature collection extent
            //If you want to persist the feature collection when you reload browser you could store the collection in
            //local storage by serializing the layer using featureLayer.toJson()  see the 'Feature Collection in Local Storage' sample
            //for an example of how to work with local storage.
            var fullExtent;
            var layers = [];

            arrayUtils.forEach(featureCollection.layers, function (layer) {
              var infoTemplate = new InfoTemplate("Details", "${*}");
              var featureLayer = new FeatureLayer(layer, {
                infoTemplate: infoTemplate
              });
              //associate the feature with the popup on click to enable highlight and zoom to
              featureLayer.on('click', function (event) {
                map.infoWindow.setFeatures([event.graphic]);
              });
              //change default symbol if desired. Comment this out and the layer will draw with the default symbology
              changeRenderer(featureLayer);
              fullExtent = fullExtent ?
                fullExtent.union(featureLayer.fullExtent) : featureLayer.fullExtent;
              layers.push(featureLayer);
            });
            map.addLayers(layers);
            map.setExtent(fullExtent.expand(1.25), true);

            dom.byId('upload-status').innerHTML = "";
          }

          function changeRenderer (layer) {
            //change the default symbol for the feature collection for polygons and points
            var symbol = null;
            switch (layer.geometryType) {
              case 'esriGeometryPoint':
                symbol = new PictureMarkerSymbol({
                  'angle': 0,
                  'xoffset': 0,
                  'yoffset': 0,
                  'type': 'esriPMS',

                  'width': 20,
                  'height': 20
                });
                break;
              case 'esriGeometryPolygon':
                symbol = new SimpleFillSymbol(SimpleFillSymbol.STYLE_SOLID,
                  new SimpleLineSymbol(SimpleLineSymbol.STYLE_SOLID,
                    new Color([112, 112, 112]), 1), new Color([136, 136, 136, 0.25]));
                break;
            }
            if (symbol) {
              layer.setRenderer(new SimpleRenderer(symbol));
            }
          }
        });
    </script>



@endsection


@section('content')


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
            <form method="get" action="{{ route('encuesta.gis') }}" class="form-horizontal form-label-left">
                      {{ csrf_field() }}
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Encuesta
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control col-md-6 col-xs-12 " id="id" name="id"  data-width="100%" required="">
                      <option ></option>
                 @foreach($encuestas as $det)
                      <option value="{{$det->id}}">{{strtoupper($det->nombre)}}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                          <button type="submit" class="btn btn-success btn-block">Generar</button>
                        </div>
           </div>
         </form>
           <br>

           @if(!empty($encuesta))
            <h3>{{strtoupper($encuesta->nombre)}}</h3>
            @endif
              <div>
    <div id="mainWindow" data-dojo-type="dijit/layout/BorderContainer" data-dojo-props="design:'headline',gutters:false" style="width:100%; height:100%;">

      <div data-dojo-type="dijit/layout/ContentPane" >

          <p>
              <form enctype="multipart/form-data" method="post" id="uploadForm">
              <div class="field">
                  <label class="file-upload">
                      <span><strong>Agregar archivo ZIP (Shapes)</strong></span>
                      <input type="file" name="file" id="inFile" />
                  </label>
              </div>
              </form>
              <span class="file-upload-status" style="opacity:1;" id="upload-status"></span>
              <div id="fileInfo"> </div>

    </div>

     <div id="mapCanvas"  style="width: 100%; height: 500px; "></div>
  </div>
</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')

@endsection
