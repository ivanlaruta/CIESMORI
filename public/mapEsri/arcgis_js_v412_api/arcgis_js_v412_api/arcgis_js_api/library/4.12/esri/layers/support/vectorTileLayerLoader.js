// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../core/tsSupport/assignHelper ../../core/tsSupport/generatorHelper ../../core/tsSupport/awaiterHelper ../../config ../../request ../../core/promiseUtils ../../core/urlUtils ../../views/2d/engine/vectorTiles/style/VectorTileSource".split(" "),function(I,B,E,q,u,C,F,w,n,G){function r(a){a&&(a=n.getOrigin(a),x&&-1===x.indexOf(a)&&x.push(a))}function p(){for(var a=[],b=0;b<arguments.length;b++)a[b]=arguments[b];for(var b=void 0,c=0;c<a.length;++c)n.isProtocolRelative(a[c])?
b&&(b=b.split("://")[0]+":"+a[c].trim()):b=n.isAbsolute(a[c])?a[c]:n.join(b,a[c]);return b}function t(a,b,c,m,e){return u(this,void 0,void 0,function(){var g,d,h,f,k,l;return q(this,function(p){switch(p.label){case 0:w.throwIfAborted(e);if("string"!==typeof c)return[3,2];f=n.normalize(c);r(f);k=n.urlToObject(f);return[4,F(k.path,E({query:{f:"json"},responseType:"json"},e))];case 1:return h=p.sent(),d=g=f,[3,3];case 2:h={data:c},g=c.jsonUrl||null,d=m,p.label=3;case 3:return l=h.data,h.ssl&&(g&&(g=
g.replace(/^http:/i,"https:")),d&&(d=d.replace(/^http:/i,"https:"))),l.sources?(a.styleUrl=g||null,[2,H(a,l,d,e)]):l.sources?[2,w.reject("You must specify the URL or the JSON for a service or for a style.")]:a.sourceUrl?[2,D(a,l,d,!1,b,e)]:(a.sourceUrl=g||null,[2,D(a,l,d,!0,b,e)])}})})}function H(a,b,c,m){return u(this,void 0,void 0,function(){var e,g,d,h,f,k;return q(this,function(l){switch(l.label){case 0:e=c?n.removeFile(c):n.appBaseUrl;a.styleBase=e;a.style=b;a.styleUrl&&r(a.styleUrl);g=[];if(!b.sources||
!b.sources.esri)return[3,3];d=b.sources.esri;return d.url?[4,t(a,"esri",p(e,d.url),void 0,m)]:[3,2];case 1:return l.sent(),[3,3];case 2:g.push(t(a,"esri",d,e,m)),l.label=3;case 3:h=0;for(f=Object.keys(b.sources);h<f.length;h++)k=f[h],"esri"!==k&&"vector"===b.sources[k].type&&(b.sources[k].url?g.push(t(a,k,p(e,b.sources[k].url),void 0,m)):g.push(t(a,k,b.sources[k],e,m)));return[4,w.all(g)];case 4:return l.sent(),[2]}})})}function D(a,b,c,m,e,g){return u(this,void 0,void 0,function(){var d,h,f,k;return q(this,
function(l){d=c?n.removeTrailingSlash(c)+"/":n.appBaseUrl;l=d;if(b.hasOwnProperty("tileInfo"))h=b;else{for(var q={xmin:-2.0037507067161843E7,ymin:-2.0037507067161843E7,xmax:2.0037507067161843E7,ymax:2.0037507067161843E7,spatialReference:{wkid:102100}},v=78271.51696400007,y=2.958287637957775E8,z=[],u=b.hasOwnProperty("minzoom")?parseFloat(b.minzoom):0,x=b.hasOwnProperty("maxzoom")?parseFloat(b.maxzoom):16,A=0;A<=x;A++)A>=u&&z.push({level:A,scale:y,resolution:v}),v/=2,y/=2;v=0;for(y=b.tiles;v<y.length;v++)r(p(l,
y[v]));h={capabilities:"TilesOnly",initialExtent:q,fullExtent:q,minScale:z[0].scale,maxScale:z[z.length-1].scale,tiles:b.tiles,tileInfo:{rows:512,cols:512,dpi:96,format:"pbf",origin:{x:-2.0037508342787E7,y:2.0037508342787E7},lods:z,spatialReference:{wkid:102100}}}}f=new G(e,d,h);if(!m&&a.primarySourceName in a.sourceNameToSource){k=a.sourceNameToSource[a.primarySourceName];if(!k.isCompatibleWith(f))return[2,w.resolve()];null!=f.fullExtent&&(null!=k.fullExtent?k.fullExtent.union(f.fullExtent):k.fullExtent=
f.fullExtent.clone());k.tileInfo.lods.length<f.tileInfo.lods.length&&(k.tileInfo=f.tileInfo)}m?(a.sourceBase=d,a.source=b,a.validatedSource=h,a.primarySourceName=e,a.sourceUrl&&r(a.sourceUrl)):r(d);a.sourceNameToSource[e]=f;return a.style?[2]:null==b.defaultStyles?[2,w.reject()]:"string"===typeof b.defaultStyles?[2,t(a,"",p(d,b.defaultStyles,"root.json"),void 0,g)]:[2,t(a,"",b.defaultStyles,p(d,"root.json"),g)]})})}Object.defineProperty(B,"__esModule",{value:!0});var x=C.defaults&&C.defaults.io.corsEnabledServers;
B.loadMetadata=function(a,b){return u(this,void 0,void 0,function(){var c,m,e,g,d,h;return q(this,function(f){switch(f.label){case 0:return c={source:null,sourceBase:null,sourceUrl:null,validatedSource:null,style:null,styleBase:null,styleUrl:null,sourceNameToSource:{},primarySourceName:""},m="string"===typeof a?[a,null]:[null,a.jsonUrl],e=m[0],g=m[1],d=e?n.urlToObject(e):null,[4,t(c,"esri",a,g,b)];case 1:return f.sent(),h={layerDefinition:c.validatedSource,url:e,parsedUrl:d,serviceUrl:c.sourceUrl,
style:c.style,styleUrl:c.styleUrl,spriteUrl:c.style.sprite&&p(c.styleBase,c.style.sprite),glyphsUrl:c.style.glyphs&&p(c.styleBase,c.style.glyphs),sourceNameToSource:c.sourceNameToSource,primarySourceName:c.primarySourceName},r(h.spriteUrl),r(h.glyphsUrl),[2,h]}})})}});