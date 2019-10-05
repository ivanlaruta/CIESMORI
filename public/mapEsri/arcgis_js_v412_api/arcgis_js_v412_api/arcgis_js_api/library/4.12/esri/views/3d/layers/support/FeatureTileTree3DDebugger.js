// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../../../Graphic ../../../../core/Handles ../../../../core/watchUtils ../../../../symbols/FillSymbol3DLayer ../../../../symbols/PointSymbol3D ../../../../symbols/PolygonSymbol3D ../../../../symbols/TextSymbol3DLayer ../../support/mathUtils".split(" "),function(e,c,k,r,t,u,v,w,x,l){Object.defineProperty(c,"__esModule",{value:!0});var y=[[0,179,255],[117,62,128],[0,104,255],[215,189,166],[32,0,193],[98,162,206],[102,112,129],[52,125,0],[142,118,246],[138,83,0],[92,122,255],
[122,55,83],[0,142,255],[81,40,179],[0,200,244],[13,24,127],[0,170,147],[19,58,241],[22,44,35]];e=function(){function a(b){var a=this;this.view=b;this.graphics=[];this.handles=new r;this._enabled=!0;this.symbols=y.map(function(b){return new w(new u({material:{color:[b[0],b[1],b[2],.6]},outline:{color:"black",size:1}}))});this.handles.add([b.featureTiles.addClient(),t.on(b.featureTiles,"tiles","change",function(){return a.update()},function(){return a.update()})])}Object.defineProperty(a.prototype,
"enabled",{get:function(){return this._enabled},set:function(b){this._enabled=b;this.update()},enumerable:!0,configurable:!0});a.prototype.destroy=function(){this.handles&&(this.handles.destroy(),this.handles=null);this.view&&(this.clear(),this.view=null)};a.prototype.update=function(){var b=this;this.clear();if(this._enabled){var a=this.view.featureTiles,e=a.tilingScheme,c=a.tiles.toArray().sort(function(b,a){return b.loadPriority-a.loadPriority});c.forEach(function(a,f){var d=a.lij,h=d[0],m=d[1],
n=d[2],p=e.getExtentGeometry(h,m,n),d=new k({geometry:p,symbol:b.symbols[h%b.symbols.length]}),g=f/(c.length-1);f=l.lerp(0,200,g);var g=l.lerp(20,6,g),q=a.loadPriority>=c.length;a=new k({geometry:p.center,symbol:new v({verticalOffset:{screenLength:40/.75},callout:{type:"line",color:"white",border:{color:"black"}},symbolLayers:[new x({text:h+"/"+m+"/"+n+" ("+a.loadPriority+")",halo:{color:"white",size:1/.75},material:{color:[f,q?0:f,q?0:f]},size:g/.75})]})});b.graphics.push(d,a);b.view.graphics.addMany([d,
a])})}};a.prototype.clear=function(){this.view.graphics.removeMany(this.graphics);this.graphics=[]};return a}();c.FeatureTileTree3DDebugger=e;c.default=e});