// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../../../core/tsSupport/declareExtendsHelper ../../../../core/tsSupport/decorateHelper ../../../../core/Accessor ../../../../core/Evented ../../../../core/maybe ../../../../core/accessorSupport/decorators ../../../../layers/graphics/dehydratedFeatures ../../../../layers/graphics/OptimizedFeature ../../../../layers/graphics/OptimizedGeometry ../../../../layers/graphics/data/optimizedFeatureQueryEngineAdapter ../../support/projectionUtils".split(" "),function(g,k,n,f,p,q,
l,e,r,t,u,h,v){Object.defineProperty(k,"__esModule",{value:!0});g=function(g){function b(b){var c=g.call(this)||this;c.events=new q;c.hasZ=null;c.hasM=null;c.objectIdField=null;c.spatialReference=null;c.featureAdapter={getAttribute:function(a,c){return"graphic"in a?a.graphic.attributes[c]:h.default.getAttribute(a,c)},getAttributes:function(a){return"graphic"in a?a.graphic.attributes:h.default.getAttributes(a)},getObjectId:function(a){return"graphic"in a?r.getObjectId(a.graphic,c.objectIdField):h.default.getObjectId(a)},
getGeometry:function(a){return"graphic"in a?a.getAsOptimizedGeometry(c.hasZ,c.hasM):h.default.getGeometry(a)},getCentroid:function(a,b){if("graphic"in a){var d=null;l.isSome(a.centroid)?d=a.centroid:"point"===a.graphic.geometry.type&&v.pointToPoint(a.graphic.geometry,m,c.spatialReference)&&(d=m);a=Array(2+(b.hasZ?1:0)+(b.hasM?1:0));l.isNone(d)?(a[0]=0,a[1]=0,a[2]=0,a[3]=0):(a[0]=d.x,a[1]=d.y,b.hasZ&&(a[2]=d.hasZ?d.z:0),b.hasM&&(a[b.hasZ?3:2]=d.hasM?d.m:0));return new u.default([],a)}return h.default.getCentroid(a,
b)},cloneWithGeometry:function(a,b){return"graphic"in a?new t.default(b,c.featureAdapter.getAttributes(a),null,c.featureAdapter.getObjectId(a)):h.default.cloneWithGeometry(a,b)}};return c}n(b,g);b.prototype.forEach=function(b){this.forAllGraphics(function(c){b(c)})};b.prototype.forEachInBounds=function(b,c){this.getSpatialIndex().forEachInBounds(b,c)};b.prototype.forEachBounds=function(b,c,a){for(var e=this.getSpatialIndex(),d=0;d<b.length;d++){var f=this.featureAdapter.getObjectId(b[d]);l.isSome(e.getBounds(f,
a))&&c(a)}};f([e.property({constructOnly:!0})],b.prototype,"getSpatialIndex",void 0);f([e.property({constructOnly:!0})],b.prototype,"forAllGraphics",void 0);f([e.property({constructOnly:!0})],b.prototype,"hasZ",void 0);f([e.property({constructOnly:!0})],b.prototype,"hasM",void 0);f([e.property({constructOnly:!0})],b.prototype,"objectIdField",void 0);f([e.property({constructOnly:!0})],b.prototype,"spatialReference",void 0);return b=f([e.subclass("esri.views.3d.layers.graphics.Graphics3DFeatureStore")],
b)}(e.declared(p));k.Graphics3DFeatureStore=g;var m={type:"point",x:0,y:0,hasZ:!1,hasM:!1,spatialReference:null};k.default=g});