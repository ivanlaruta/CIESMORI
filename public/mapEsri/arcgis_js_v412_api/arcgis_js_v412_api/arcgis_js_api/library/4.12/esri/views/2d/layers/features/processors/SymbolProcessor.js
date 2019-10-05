// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../../../../core/tsSupport/declareExtendsHelper ../../../../../core/tsSupport/decorateHelper ../../../../../core/tsSupport/assignHelper ../../../../../core/tsSupport/generatorHelper ../../../../../core/tsSupport/awaiterHelper ../../../../../core/asyncUtils ../../../../../core/Error ../../../../../core/has ../../../../../core/Logger ../../../../../core/MapPool ../../../../../core/maybe ../../../../../core/promiseUtils ../../../../../core/accessorSupport/decorators ../../../../../geometry/SpatialReference ../../../../../layers/support/LabelClass ../../../../../layers/support/labelFormatUtils ../../../../../renderers/support/jsonUtils ../../../engine ../../../arcade/utils ./BaseProcessor".split(" "),
function(z,v,D,m,V,p,q,w,W,ea,X,x,M,n,h,N,Y,Z,aa,r,ba,ca){Object.defineProperty(v,"__esModule",{value:!0});var O=X.getLogger("esri.views.2d.layers.features.processors.SymbolProcessor");z=function(t){function b(){var c=null!==t&&t.apply(this,arguments)||this;c._symbolToMosaicItemMap=new Map;c._visualSetPromises=new Map;c.type="symbol";return c}D(b,t);b.prototype.destroy=function(){this._visualSetPromises.clear();this._symbolToMosaicItemMap.clear();this.notifyChange("updating")};Object.defineProperty(b.prototype,
"supportsTileUpdates",{get:function(){return!0},enumerable:!0,configurable:!0});Object.defineProperty(b.prototype,"labelingInfo",{get:function(){return!this.config||M.isNone(this.config.labelingInfo)?null:this.config.labelingInfo.map(function(c){return Y.fromJSON(c)})},enumerable:!0,configurable:!0});Object.defineProperty(b.prototype,"labelClassInfos",{get:function(){var c=this;return this.labelingInfo?n.all(this.labelingInfo.map(function(a,b){return q(c,void 0,void 0,function(){var c;return p(this,
function(e){switch(e.label){case 0:return c={index:b,minScale:a.minScale,maxScale:a.maxScale},[4,Z.createLabelFunction(a,this.fields,this.spatialReference)];case 1:return[2,(c.builder=e.sent(),c.symbol=a.symbol,c)]}})})})):n.resolve()},enumerable:!0,configurable:!0});Object.defineProperty(b.prototype,"hydrate",{get:function(){return ba.createHydrateFactory(this.service.geometryType)},enumerable:!0,configurable:!0});Object.defineProperty(b.prototype,"factory",{get:function(){var c=this;if(!this.config)return O.error(W("mapview-processor",
"Unable to create factory without a configuration")),null;var a=this.service,b=a.geometryType,d=a.objectIdField,a=a.fields,e=N.fromJSON(this.spatialReference),a={geometryType:b,fields:a,spatialReference:e},e=new r.WGLTemplateStore(function(a,b){return c.remoteClient.invoke("tileRenderer.getMaterialItems",a,b)}),g=this.tileStore.tileScheme.tileInfo;this._matcher=r.createMatcher(this.renderer,e,a);return new r.WGLMeshFactory(b,d,this.renderer,e,this.labelingInfo,g)},enumerable:!0,configurable:!0});
Object.defineProperty(b.prototype,"renderer",{get:function(){return this.config?aa.fromJSON(this.config.renderer):null},enumerable:!0,configurable:!0});Object.defineProperty(b.prototype,"updating",{get:function(){return 0<this._visualSetPromises.size},enumerable:!0,configurable:!0});Object.defineProperty(b.prototype,"fields",{get:function(){return this.service.fields},enumerable:!0,configurable:!0});b.prototype.update=function(c){return q(this,void 0,void 0,function(){return p(this,function(a){this._set("config",
c);return[2]})})};b.prototype.onTileData=function(c,a,b){var d=this,e=a.addOrUpdate,k=a.remove,da=a.clear;a=e&&e.length?this._processFeatures(c,e,a.transformParams):n.resolve();var l=b.signal;a=a.then(function(a){return d.remoteClient.invoke("tileRenderer.onTileData",{tileKey:c.id,data:{addOrUpdate:a&&a.message||null,remove:k,clear:da}},{transferList:a&&a.transferList||null,signal:l})}).catch(function(a){return d._handleError(c,a,b)});this._visualSetPromises.set(c,a);n.always(a,function(){return d._cleanPromise(c)});
this.notifyChange("updating");return a};b.prototype.onTileError=function(c,a,b){var d=this;a=this.remoteClient.invoke("tileRenderer.onTileError",{tileKey:c.id,error:a},{signal:b.signal});this._visualSetPromises.set(c,a);n.always(a,function(){return d._cleanPromise(c)});this.notifyChange("updating");return a};b.prototype._cleanPromise=function(c){this._visualSetPromises.delete(c);this.notifyChange("updating")};b.prototype._processFeatures=function(c,a,b){var d=this;if(!a||!a.length)return n.resolve(null);
var e=this.factory,g={viewingMode:"",scale:c.scale};return w.safeCast(this._matcher.then(function(c){return e.analyze(a,c,b,g)})).then(function(a){return w.safeCast(d._getLabelMosaicItems(c,a,b)).then(function(g){return d._writeFeatures(c,a,b,g,e)})})};b.prototype._writeFeatures=function(c,a,b,d,e){for(var g=e.createMeshData(a.length),k={viewingMode:"",scale:c.scale},l=this._symbolToMosaicItemMap,f=0;f<a.length;f++)e.write(g,a[f],b,k,c.level,d,l);return this._encodeDisplayData(g)};b.prototype._encodeDisplayData=
function(b){var a={},c=[];b.encode(a,c);return{message:a,transferList:c}};b.prototype._handleError=function(b,a,k){k=k.signal;if(!n.isAbortError(a))return this.remoteClient.invoke("tileRenderer.onTileError",{tileKey:b.id,error:a.message},{signal:k})};b.prototype._getLabelMosaicItems=function(b,a,k){return q(this,void 0,void 0,function(){var c,e,g,h,l,f;return p(this,function(d){switch(d.label){case 0:return c=x.acquire(),[4,this._createLabelFeatures(b.scale,a,c,k)];case 1:e=d.sent();g=this._symbolToMosaicItemMap;
h=x.acquire();l=[];f=0;c.forEach(function(a,b){if(g.has(b.id)){var c=g.get(b.id).glyphMosaicItems,e=[];a.forEach(function(a){if(c&&c.length<a||!c[a])e[a]=a});0<e.length&&(h.set(f,b),l.push({symbol:b.toJSON(),id:f,glyphIds:e}),f++)}else{h.set(f,b);var d=[];a.forEach(function(a){return d.push(a)});l.push({symbol:b.toJSON(),id:f,glyphIds:d});f++}});if(0<l.length)return[2,this.remoteClient.invoke("tileRenderer.getMaterialItems",l).then(function(a){for(var b=0;b<a.length;b++){var c=a[b],d=h.get(c.id);
if(d)if(r.Utils.isTextSymbol(d))if(g.has(d.id)){if(d=g.get(d.id).glyphMosaicItems,c=c.mosaicItem.glyphMosaicItems)for(var f=0;f<c.length;f++)null!=c[f]&&(d[f]=c[f])}else g.set(d.id,c.mosaicItem);else g.set(d.id,c.mosaicItem)}x.release(h);return e})];x.release(c);return[2,n.resolve(e)]}})})};b.prototype._getLabelClassInfosForScale=function(b){return q(this,void 0,void 0,function(){var a;return p(this,function(c){switch(c.label){case 0:return[4,this.labelClassInfos];case 1:return a=c.sent(),[2,a.filter(function(a){var c=
a.minScale;a=a.maxScale;return(!c||c>=b||0===c)&&(!a||a<=b||0===a)})]}})})};b.prototype._createLabelFeatures=function(b,a,h,d){return q(this,void 0,void 0,function(){var c,g,m,l,f,k,n,q,A,t,z,E,F,B,C,v,w,P,G,Q,R,S,H,T,u,I,J,K,U;return p(this,function(e){switch(e.label){case 0:return this.labelingInfo&&a&&0!==a.length?[4,this._getLabelClassInfosForScale(b)]:[2,null];case 1:c=e.sent();if(0===c.length)return[2,null];g=x.acquire();m=new r.CollisionGrid(r.definitions.COLLISION_EARLY_REJECT_BUCKET_SIZE);
l=0;for(f=a;l<f.length;l++){k=f[l];n=this.service.geometryType;A=q=0;if("esriGeometryPoint"===n||"esriGeometryPolygon"===n)if("esriGeometryPoint"===n?(t=k.geometry,q=t.x,A=t.y):(q=k.centroid.x,A=k.centroid.y),z=m.checkOverlap(q,A))continue;E=k.localId;F=[];for(B=0;B<c.length;B++){C=c[B];v=C.index;w=C.builder;P=C.symbol;G=k;if(!d)return O.error("mapview-labeling","Tried to evaluate geometry expression but no transformation found"),[2];Q=d.transform;R=d.hasZ;S=d.hasM;H=this.hydrate(k.geometry,Q,R,S);
T=V({},k,{geometry:H});H.spatialReference=N.fromJSON(this.spatialReference);G=T;u=w.evaluate(G);if(!M.isNone(u)){r.definitions.DEBUG_LABELS&&(I="-"+E,u=u.substring(0,u.length-I.length)+I);J=r.bidiText(u);K=J[0];U=J[1];var p=P;e=K;var y=h;y.has(p)||y.set(p,new Set);for(var p=y.get(p),y=e.length,L=0;L<y;L++){var D=e.charCodeAt(L);p.add(D)}F.push({text:K,rtl:U,id:v})}}g.set(E,F)}return[2,g]}})})};m([h.property({readOnly:!0})],b.prototype,"supportsTileUpdates",null);m([h.property()],b.prototype,"config",
void 0);m([h.property({dependsOn:["config"]})],b.prototype,"labelingInfo",null);m([h.property({dependsOn:["labelingInfo","fields","spatialReference"]})],b.prototype,"labelClassInfos",null);m([h.property({dependsOn:["service"]})],b.prototype,"hydrate",null);m([h.property({dependsOn:["config","service","renderer","fields","tileStore"]})],b.prototype,"factory",null);m([h.property({dependsOn:["config"],readOnly:!0})],b.prototype,"renderer",null);m([h.property({readOnly:!0})],b.prototype,"updating",null);
m([h.property({dependsOn:["service"]})],b.prototype,"fields",null);return b=m([h.subclass("esri.views.2d.layers.features.processors.SymbolProcessor")],b)}(h.declared(ca.default));v.default=z});