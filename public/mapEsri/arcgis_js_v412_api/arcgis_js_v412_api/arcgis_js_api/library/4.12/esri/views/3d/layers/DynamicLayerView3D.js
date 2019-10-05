// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../../core/tsSupport/declareExtendsHelper ../../../core/tsSupport/decorateHelper ../../../core/tsSupport/assignHelper ../../../core/tsSupport/generatorHelper ../../../core/tsSupport/awaiterHelper ../../../core/asyncUtils ../../../core/Logger ../../../core/promiseUtils ../../../core/watchUtils ../../../core/accessorSupport/decorators ../../../core/libs/gl-matrix-2/mat4f64 ../../../geometry/Extent ../../../geometry/support/aaBoundingRect ./LayerView3D ./support/overlayImageUtils ./support/projectExtentUtils ../support/debugFlags ../webgl-engine/Stage ../webgl-engine/lib/RenderGeometry ../webgl-engine/lib/Texture ../webgl-engine/materials/DefaultMaterial ../../layers/RefreshableLayerView".split(" "),
function(u,M,x,f,y,q,r,z,A,p,B,g,C,v,h,D,w,E,F,n,G,H,I,J){var K=A.getLogger("esri.views.3d.layers.DynamicLayerView3D");u=function(t){function d(){var a=null!==t&&t.apply(this,arguments)||this;a.supportsDraping=!0;a.hasDraped=!0;a.fullExtentInLocalViewSpatialReference=null;a.overlayUpdating=!1;a.maximumDataResolution=null;a._images=[];a._extents=[];a.updateWhenStationary=!0;return a}x(d,t);Object.defineProperty(d.prototype,"drawingOrder",{get:function(){return this._get("drawingOrder")},set:function(a){if(a!==
this._get("drawingOrder")){this._set("drawingOrder",a);var b=new Set;this._images.forEach(function(e){e&&e.material&&(e.material.renderPriority=a,b.add(e.material.id))});0<b.size&&(this.view._stage.renderView.getDrapedRenderer().updateRenderOrder(b),this.emit("draped-data-change"))}},enumerable:!0,configurable:!0});d.prototype.initialize=function(){var a=this;this.drawingOrder=this.view.getDrawingOrder(this.layer.uid);this.addResolvingPromise(E.toViewIfLocal(this).then(function(b){return a._set("fullExtentInLocalViewSpatialReference",
b)}));this.handles.add(this.watch("suspended",function(){return a._suspendedChangeHandler()}));this.handles.add(this.view.resourceController.scheduler.registerIdleStateCallbacks(function(){a._isScaleRangeActive()&&a.notifyChange("suspended")},function(){}));this._isScaleRangeLayer()&&this.handles.add([this.layer.watch("minScale",function(){return a.notifyChange("suspended")}),this.layer.watch("maxScale",function(){return a.notifyChange("suspended")})]);this.handles.add(this.watch("fullOpacity",this._opacityChangeHandler.bind(this)))};
d.prototype.destroy=function(){this.clear()};d.prototype.setDrapingExtent=function(a,b,e,c,d,k){c=this._extentAndSizeAtResolution(b,e,c);b=c.size;c=c.extent;k*=this.view.pixelRatio;if("imageMaxWidth"in this.layer||"imageMaxHeight"in this.layer){var l=this.layer.imageMaxWidth,g=this.layer.imageMaxHeight;if(b.width>l){var f=l/b.width;b.height=Math.floor(b.height*f);b.width=l;k*=f}b.height>g&&(f=g/b.height,b.width=Math.floor(b.width*f),b.height=g,k*=f)}l=this._extents[a];l&&h.equals(l.extent,c)&&!this._imageSizeDiffers(c,
e,l.imageSize,b)||(this._extents[a]={extent:h.create(c),spatialReference:e,imageSize:b,renderLocalOrigin:d,pixelRatio:k},this.suspended||this._fetch(a))};d.prototype.getGraphicFromGraphicUid=function(a){return null};d.prototype.clear=function(){for(var a=0;a<this._images.length;a++)this._clearImage(a)};d.prototype.doRefresh=function(a){return r(this,void 0,void 0,function(){var b,e;return q(this,function(c){switch(c.label){case 0:if(this.suspended)return[2];b=[];for(e=0;e<this._extents.length;e++)this._extents[e]&&
b.push(this._fetch(e,a));return[4,p.eachAlways(b)];case 1:return c.sent(),[2]}})})};d.prototype.canResume=function(){if(!this.inherited(arguments))return!1;if(this._isScaleRangeLayer()){var a=this.layer,b=a.minScale,a=a.maxScale;if(0<b||0<a){var e=this.view.scale;if(e<a||0<b&&e>b)return!1}}return!0};d.prototype.isUpdating=function(){if(this.overlayUpdating)return!0;for(var a=0,b=this._images;a<b.length;a++)if(b[a].loadingPromise)return!0;return!1};d.prototype.processResult=function(a,b){if(b instanceof
HTMLImageElement||b instanceof HTMLCanvasElement)a.image=b};d.prototype.findExtentInfoAt=function(a){for(var b=0,e=this._extents;b<e.length;b++){var c=e[b],d=c.extent;if((new v(d[0],d[1],d[2],d[3],c.spatialReference)).contains(a))return c}return null};d.prototype.getFetchOptions=function(){};d.prototype.redraw=function(a){for(var b=!1,e=0;e<this._images.length;e++){var c=this._images[e];c&&a(c)&&(b=!0,this._createStageObjects(e,c.image))}b&&this.emit("draped-data-change")};d.prototype._imageSizeDiffers=
function(a,b,e,c){if(!this.maximumDataResolution||F.TESTS_DISABLE_UPDATE_THROTTLE_THRESHOLDS)return!0;b=h.width(a)/this.maximumDataResolution.x;a=h.height(a)/this.maximumDataResolution.y;a=Math.abs(a/e.height-a/c.height);return 1.5<Math.abs(b/e.width-b/c.width)||1.5<a?!0:!1};d.prototype._fetch=function(a,b){return r(this,void 0,void 0,function(){var e,c,d,k,f,g,n,m=this;return q(this,function(l){switch(l.label){case 0:if(this.suspended)return[2];e=this._extents[a];c=e.extent;d=new v(c[0],c[1],c[2],
c[3],e.spatialReference);this._images[a]||(this._images[a]={texture:null,material:null,rendergeometry:null,loadingPromise:null,loadingAbortController:null,image:null,pixelData:null,renderExtent:h.create(c)});k=this._images[a];k.loadingAbortController&&(k.loadingAbortController.abort(),k.loadingAbortController=null);if(0===d.width||0===d.height)return this._clearImage(a),[2];f=p.createAbortController();k.loadingAbortController=f;p.onAbort(b,function(){return f.abort()});g=z.safeCast(this._waitFetchReady(f.signal)).then(function(){var a=
y({requestAsImageElement:!0,pixelRatio:e.pixelRatio},m.getFetchOptions(),{signal:f.signal});return m.layer.fetchImage(d,e.imageSize.width,e.imageSize.height,a)});k.loadingPromise=g;p.always(g,function(){k.loadingPromise=null;k.loadingAbortController=null});n=g.then(function(b){h.set(k.renderExtent,c);m.processResult(k,b);m._createStageObjects(a,k.image);0===a&&m._images[1]&&m._images[1].rendergeometry&&m._createStageObjects(1,null);m.notifyChange("updating");m.emit("draped-data-change")}).catch(function(a){a&&
!p.isAbortError(a)&&K.error(a);m.notifyChange("updating");throw a;});this.notifyChange("updating");return[4,n];case 1:return l.sent(),[2]}})})};d.prototype._clearImage=function(a){a=this._images[a];var b=this.view._stage;a&&(a.rendergeometry&&(b.renderView.getDrapedRenderer().removeRenderGeometries([a.rendergeometry]),a.rendergeometry=null),a.texture&&(b.remove(n.ModelContentType.TEXTURE,a.texture.id),a.texture=null),a.material&&(b.remove(n.ModelContentType.MATERIAL,a.material.id),a.material=null),
a.loadingAbortController&&(a.loadingAbortController.abort(),a.loadingAbortController=null),a.loadingPromise=null,a.image=null,a.pixelData=null)};d.prototype._createStageObjects=function(a,b){var e=this.view._stage,c=this._images[a];c.texture&&(e.remove(n.ModelContentType.TEXTURE,c.texture.id),c.texture=null);b?(c.texture=new H(b,"dynamicLayer",{width:b.width,height:b.height,wrap:{s:33071,t:33071}}),e.add(n.ModelContentType.TEXTURE,c.texture)):c.material&&(e.remove(n.ModelContentType.MATERIAL,c.material.id),
c.material=null);!c.material&&c.texture?(c.material=new I({ambient:[1,1,1],diffuse:[0,0,0],transparent:!0,opacity:this.fullOpacity,textureId:c.texture.id,receiveSSAO:!1},"dynamicLayer"),c.material.renderPriority=this.drawingOrder,e.add(n.ModelContentType.MATERIAL,c.material)):c.material&&b&&c.material.setParameterValues({textureId:c.texture.id});b=e.renderView.getDrapedRenderer();if(c.material){var d=void 0,e=this._extents[a].renderLocalOrigin;if(0===a)d=w.createGeometryForExtent(c.renderExtent,-1);
else if(1===a){a=this._images[0].renderExtent;if(!a)return;d=w.createOuterImageGeometry(a,c.renderExtent,-1)}else{console.error("DynamicLayerView3D._createStageObjects: Invalid extent idx");return}a=new G(d);a.material=c.material;a.origin=e;a.transformation=C.mat4f64.create();a.name="dynamicLayer";a.uniqueName="dynamicLayer#"+d.id;b.addRenderGeometries([a]);c.rendergeometry&&b.removeRenderGeometries([c.rendergeometry]);c.rendergeometry=a}else c.rendergeometry&&(b.removeRenderGeometries([c.rendergeometry]),
c.rendergeometry=null)};d.prototype._isScaleRangeLayer=function(){return"minScale"in this.layer&&"maxScale"in this.layer};d.prototype._isScaleRangeActive=function(){return this._isScaleRangeLayer()?0<this.layer.minScale||0<this.layer.maxScale:!1};d.prototype._extentAndSizeAtResolution=function(a,b,e){var c=h.width(a)/h.height(a),d={width:e,height:e};1.0001<c?d.height=e/c:.9999>c&&(d.width=e*c);b=this._clippedExtent(a,b,L);d.width=Math.round(d.width/(h.width(a)/h.width(b)));d.height=Math.round(d.height/
(h.height(a)/h.height(b)));return{size:d,extent:b}};d.prototype._clippedExtent=function(a,b,d){if("local"!==this.view.viewingMode)return h.set(d,a);b=this.view.basemapTerrain;var c=b.extent;return b.ready&&c?h.intersection(a,c,d):h.set(d,a)};d.prototype._opacityChangeHandler=function(a){for(var b=0,d=this._images;b<d.length;b++){var c=d[b];c&&c.material&&c.material.setParameterValues({opacity:a})}this.emit("draped-data-change")};d.prototype._suspendedChangeHandler=function(){this.suspended?(this.clear(),
this.emit("draped-data-change")):this.refresh()};d.prototype._waitFetchReady=function(a){return r(this,void 0,void 0,function(){return q(this,function(b){switch(b.label){case 0:return this.updateWhenStationary?[4,B.whenOnce(this.view,"stationary",a)]:[3,2];case 1:b.sent(),b.label=2;case 2:return[2]}})})};f([g.property()],d.prototype,"layer",void 0);f([g.property({dependsOn:["view.scale","layer.minScale","layer.maxScale"]})],d.prototype,"suspended",void 0);f([g.property({type:Boolean})],d.prototype,
"supportsDraping",void 0);f([g.property({type:Boolean})],d.prototype,"hasDraped",void 0);f([g.property({value:0,type:Number})],d.prototype,"drawingOrder",null);f([g.property({readOnly:!0})],d.prototype,"fullExtentInLocalViewSpatialReference",void 0);f([g.property()],d.prototype,"overlayUpdating",void 0);f([g.property({dependsOn:["overlayUpdating"]})],d.prototype,"updating",void 0);return d=f([g.subclass("esri.views.3d.layers.DynamicLayerView3D")],d)}(g.declared(D,J));var L=h.create();return u});