// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../core/tsSupport/assignHelper ../core/tsSupport/declareExtendsHelper ../core/tsSupport/decorateHelper ../core/tsSupport/awaiterHelper ../core/tsSupport/generatorHelper ../core/Accessor ../core/arrayUtils ../core/asyncUtils ../core/maybe ../core/Promise ../core/promiseUtils ../core/accessorSupport/decorators".split(" "),function(B,C,D,v,w,n,p,x,y,z,m,A,r,t){return function(q){function a(){return null!==q&&q.apply(this,arguments)||this}v(a,q);a.prototype.when=function(b,c){return this.inherited(arguments)};
a.prototype.fetchPopupFeatures=function(b,c){return z.safeCast(this._fetchPopupFeaturesAsync(b,c))};a.prototype._fetchPopupFeaturesAsync=function(b,c){return n(this,void 0,void 0,function(){var d,g,f,e,a,h;return p(this,function(l){switch(l.label){case 0:return[4,this.when()];case 1:return l.sent(),[4,this._prepareFetchPopupFeatures(b,c)];case 2:return d=l.sent(),g=d.location,f=this._queryLayerPopupFeatures(d,c),e=r.resolve(d.clientOnlyGraphics),a=[e].concat(f),h=r.eachAlwaysValues(a).then(y.flatten),
[2,{promise:h,location:g,promises:a}]}})})};a.prototype._queryLayerPopupFeatures=function(b,c){var d=b.queryArea;return b.layerViewsAndGraphics.map(function(b){var a=b.layerView;b={clientGraphics:b.graphics,signal:m.isSome(c)?c.signal:null,defaultPopupTemplateEnabled:m.isSome(c)?!!c.defaultPopupTemplateEnabled:!1};return a.fetchPopupFeatures(d,b)})};a.prototype._isValidPopupGraphic=function(b,c){return b&&!!b.getEffectivePopupTemplate(m.isSome(c)&&c.defaultPopupTemplateEnabled)};a.prototype._prepareFetchPopupFeatures=
function(b,c){return n(this,void 0,void 0,function(){var d,a,f,e,k,h,l,u;return p(this,function(g){switch(g.label){case 0:return[4,this._popupHitTestGraphics(b,c)];case 1:return d=g.sent(),a=d.clientGraphics,f=d.queryArea,e=d.location,k=this._getFetchPopupLayerViews(),h=this._graphicsPerFetchPopupLayerView(a,k),l=h.layerViewsAndGraphics,u=h.clientOnlyGraphics,[2,{clientOnlyGraphics:u,layerViewsAndGraphics:l,queryArea:f,location:e}]}})})};a.prototype._popupHitTestGraphics=function(b,c){return n(this,
void 0,void 0,function(){var a,g,f,e,k,h,l=this;return p(this,function(d){switch(d.label){case 0:return[4,this.popupHitTest(b)];case 1:return a=d.sent(),g=a.results,f=a.mapPoint,e=g.filter(function(b){return l._isValidPopupGraphic(b.graphic,c)}),k=e.length?e[0].mapPoint:null,h=e.map(function(b){return b.graphic}),[2,{clientGraphics:h,queryArea:f,location:f||k}]}})})};a.prototype._getFetchPopupLayerViews=function(){var b=this,a=[];this.allLayerViews.forEach(function(c){b._isValidPopupLayerView(c)&&
a.push(c)});this._isValidPopupLayerView(this.graphicsView)&&a.push(this.graphicsView);return a.reverse()};a.prototype._isValidPopupLayerView=function(b){return m.isSome(b)&&(!("layer"in b)||!b.suspended)&&"function"===typeof b.fetchPopupFeatures};a.prototype._graphicsPerFetchPopupLayerView=function(b,a){var c=[],g=new Map;a=a.map(function(a){var b=[];"layer"in a?g.set(a.layer,b):g.set(a.graphics,b);return{layerView:a,graphics:b}});for(var f=0;f<b.length;f++){var e=b[f],k=g.get(e.layer)||null;k?k.push(e):
c.push(e)}return{layerViewsAndGraphics:a,clientOnlyGraphics:c}};return a=w([t.subclass("esri.views.PopupView")],a)}(t.declared(x,A))});