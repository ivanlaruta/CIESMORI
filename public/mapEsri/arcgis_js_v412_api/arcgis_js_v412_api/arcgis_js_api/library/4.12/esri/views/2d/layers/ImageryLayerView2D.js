// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../../core/tsSupport/declareExtendsHelper ../../../core/tsSupport/decorateHelper ../../../core/tsSupport/generatorHelper ../../../core/tsSupport/awaiterHelper ../../../Graphic ../../../core/Handles ../../../core/promiseUtils ../../../core/screenUtils ../../../core/watchUtils ../../../core/accessorSupport/decorators ../engine ./LayerView2D ./support/ExportStrategy ../../layers/ImageryLayerView".split(" "),function(y,z,h,k,l,m,n,p,d,q,r,f,t,u,v,w){var x=function(){function c(a){this.pixelBlock=
a}Object.defineProperty(c.prototype,"width",{get:function(){return this.pixelBlock?this.pixelBlock.width:0},enumerable:!0,configurable:!0});Object.defineProperty(c.prototype,"height",{get:function(){return this.pixelBlock?this.pixelBlock.height:0},enumerable:!0,configurable:!0});c.prototype.render=function(a){if(this.pixelBlock){var b=this.filter({pixelBlock:this.pixelBlock}),g=a.createImageData(b.pixelBlock.width,b.pixelBlock.height),b=b.pixelBlock.getAsRGBA();g.data.set(b);a.putImageData(g,0,0)}};
return c}();return function(c){function a(){var b=null!==c&&c.apply(this,arguments)||this;b._handles=new p;b.container=new t.BitmapContainer;return b}h(a,c);a.prototype.hitTest=function(b,a){if(this.suspended)return d.resolve(null);b=this.view.toMap(q.createScreenPoint(b,a));return d.resolve(new n({attributes:{},geometry:b}))};a.prototype.update=function(b){this.strategy.update(b);this.notifyChange("updating")};a.prototype.attach=function(){var b=this;this.strategy=new v({container:this.container,
fetchSource:this.fetchImage.bind(this),requestUpdate:function(){return b.requestUpdate()}});this._handles.add([r.watch(this,"layer.exportImageServiceParameters.version",function(a){b._exportImageVersion!==a&&(b._exportImageVersion=a,b.requestUpdate())}),this.watch("timeExtent",function(){return b.requestUpdate()}),this.layer.on("redraw",function(){b.strategy.updateExports(function(a){a.source.filter=b.layer.applyFilter.bind(b.layer);a.requestRender()})})])};a.prototype.detach=function(){this.strategy.destroy();
this._handles.removeAll();this.container.removeAllChildren()};a.prototype.moveStart=function(){};a.prototype.viewChange=function(){};a.prototype.moveEnd=function(){this.requestUpdate()};a.prototype.doRefresh=function(b){return m(this,void 0,void 0,function(){return l(this,function(b){this.requestUpdate();return[2]})})};a.prototype.isUpdating=function(){return this.attached&&(this.strategy.updating||this.updateRequested)};a.prototype.fetchImage=function(b,a,c,e){var d=this;this._exportImageVersion=
this.get("layer.exportImageServiceParameters.version");e=e||{};e.timeExtent=this.timeExtent;return this.layer.fetchImage(b,a,c,e).then(function(a){a=new x(a.pixelData.pixelBlock);a.filter=function(a){return d.layer.applyFilter(a)};d.notifyChange("updating");return a})};return a=k([f.subclass("esri.views.2d.layers.ImageryLayerView2D")],a)}(f.declared(u,w))});