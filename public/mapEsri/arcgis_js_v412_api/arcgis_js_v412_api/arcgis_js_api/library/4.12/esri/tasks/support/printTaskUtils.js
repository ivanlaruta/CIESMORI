// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports @dojo/framework/shim/array ../../Color ../../core/screenUtils ../../renderers/visualVariables/support/visualVariableUtils".split(" "),function(r,b,n,p,f,l){function q(a){return a&&"esri.views.layers.GroupLayerView"===a.declaredClass}Object.defineProperty(b,"__esModule",{value:!0});b.applyVisualVariables=function(a,b){var e=b.graphic,d=b.renderer,c=b.symbol;b=c.type;if("text"!==b&&"shield-label-symbol"!==b&&"visualVariables"in d&&d.visualVariables){var g=d.getVisualVariablesForType("size"),
h=d.getVisualVariablesForType("color"),k=d.getVisualVariablesForType("opacity"),m=d.getVisualVariablesForType("rotation"),g=g&&g[0],h=h&&h[0],k=k&&k[0],m=m&&m[0];g&&(c=l.getSize(g,e,{shape:"simple-marker"===b?c.style:null}),null!=c&&("simple-marker"===b?a.size=f.px2pt(c):"picture-marker"===b?(a.width=f.px2pt(c),a.height=f.px2pt(c)):"simple-line"===b?a.width=f.px2pt(c):a.outline&&(a.outline.width=f.px2pt(c))));h&&((c=l.getColor(h,e))&&"simple-marker"===b||"simple-line"===b||"simple-fill"===b)&&(a.color=
p.toJSON(c));k&&(b=l.getOpacity(k,e),null!=b&&a.color&&(a.color[3]=Math.round(255*b)));m&&(a.angle=-l.getRotationAngle(d,e))}};b.createMultipointLayer=function(){return{layerDefinition:{name:"multipointLayer",geometryType:"esriGeometryMultipoint",drawingInfo:{renderer:null}},featureSet:{geometryType:"esriGeometryMultipoint",features:[]}}};b.createPolygonLayer=function(){return{layerDefinition:{name:"polygonLayer",geometryType:"esriGeometryPolygon",drawingInfo:{renderer:null}},featureSet:{geometryType:"esriGeometryPolygon",
features:[]}}};b.createPointLayer=function(){return{layerDefinition:{name:"pointLayer",geometryType:"esriGeometryPoint",drawingInfo:{renderer:null}},featureSet:{geometryType:"esriGeometryPoint",features:[]}}};b.createPolylineLayer=function(){return{layerDefinition:{name:"polylineLayer",geometryType:"esriGeometryPolyline",drawingInfo:{renderer:null}},featureSet:{geometryType:"esriGeometryPolyline",features:[]}}};b.getVisibleLayerViews=function(a,b){var e=a.allLayerViews.items;if(b===a.scale)a=e.filter(function(a){return!a.suspended});
else{a=[];for(var d=0;d<e.length;d++){var c=e[d];if(!q(c.parent)||n.includes(a,c.parent))!c.visible||b&&"isVisibleAtScale"in c&&!c.isVisibleAtScale(b)||a.push(c)}}return a};b.isBingMapsLayer=function(a){return a&&"bing-maps"===a.type};b.isCSVLayer=function(a){return a&&"csv"===a.type};b.isFeatureLayer=function(a){return a&&"feature"===a.type};b.isGraphicsLayer=function(a){return a&&"graphics"===a.type};b.isGroupLayer=function(a){return a&&"group"===a.type};b.isImageryLayer=function(a){return a&&"imagery"===
a.type};b.isKMLLayer=function(a){return a&&"kml"===a.type};b.isMapImageLayer=function(a){return a&&"map-image"===a.type};b.isMapNotesLayer=function(a){return a&&"map-notes"===a.type};b.isOpenStreetMapLayer=function(a){return a&&"open-street-map"===a.type};b.isStreamLayer=function(a){return a&&"stream"===a.type};b.isTileLayer=function(a){return a&&"tile"===a.type};b.isVectorTileLayer=function(a){return a&&"vector-tile"===a.type};b.isWebTileLayer=function(a){return a&&"web-tile"===a.type};b.isWMSLayer=
function(a){return a&&"wms"===a.type};b.isWMTSLayer=function(a){return a&&"wmts"===a.type}});