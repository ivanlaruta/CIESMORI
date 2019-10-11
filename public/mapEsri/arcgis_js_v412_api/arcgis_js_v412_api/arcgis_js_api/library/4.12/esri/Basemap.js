// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ./core/tsSupport/assignHelper ./core/tsSupport/declareExtendsHelper ./core/tsSupport/decorateHelper ./core/asyncUtils ./core/collectionUtils ./core/compilerUtils ./core/Evented ./core/JSONSupport ./core/lang ./core/Loadable ./core/loadAll ./core/Logger ./core/promiseUtils ./core/urlUtils ./core/accessorSupport/decorators ./layers/support/LayerCollection ./portal/Portal ./portal/PortalItem ./support/basemapDefinitions".split(" "),function(u,G,l,v,f,n,g,w,x,y,z,A,B,C,m,p,d,h,
q,D,E){var F=0,r=C.getLogger("esri.Basemap");return function(t){function c(a){var b=t.call(this)||this;b.id=null;b.portalItem=null;b.thumbnailUrl=null;b.title="Basemap";b.id=Date.now().toString(16)+"-basemap-"+F++;b.baseLayers=new h.default;b.referenceLayers=new h.default;var e=function(a){a.parent&&a.parent!==b&&"remove"in a.parent&&a.parent.remove(a);a.parent=b;"elevation"===a.type&&r.error("Layer '"+a.title+", id:"+a.id+"' of type '"+a.type+"' is not supported as a basemap layer and will therefore be ignored.")};
b.baseLayers.on("after-add",function(a){return e(a.item)});b.referenceLayers.on("after-add",function(a){return e(a.item)});b.baseLayers.on("after-remove",function(a){a.item.parent=null});b.referenceLayers.on("after-remove",function(a){a.item.parent=null});return b}v(c,t);k=c;c.prototype.initialize=function(){var a=this;this.when().catch(function(b){r.error("#load()","Failed to load basemap (title: '"+a.title+"', id: '"+a.id+"')",b)});this.resourceInfo&&this.read(this.resourceInfo.data,this.resourceInfo.context)};
c.prototype.normalizeCtorArgs=function(a){a&&"resourceInfo"in a&&(this._set("resourceInfo",a.resourceInfo),a=l({},a),delete a.resourceInfo);return a};Object.defineProperty(c.prototype,"baseLayers",{set:function(a){this._set("baseLayers",g.referenceSetter(a,this._get("baseLayers"),h.default))},enumerable:!0,configurable:!0});c.prototype.writeBaseLayers=function(a,b,e,c){var d=[];a&&(c=l({},c,{layerContainerType:"basemap"}),this.baseLayers.forEach(function(a){if("write"in a){var b={};w.typeCast(a)().write(b,
c)&&d.push(b)}}),this.referenceLayers.forEach(function(a){if("write"in a&&a.write){var b={isReference:!0};a.write(b,c)&&d.push(b)}}));b[e]=d};Object.defineProperty(c.prototype,"referenceLayers",{set:function(a){this._set("referenceLayers",g.referenceSetter(a,this._get("referenceLayers"),h.default))},enumerable:!0,configurable:!0});c.prototype.writeTitle=function(a,b){b.title=a||"Basemap"};c.prototype.load=function(a){this.addResolvingPromise(this._loadFromSource(a));return this.when()};c.prototype.loadAll=
function(){var a=this;return n.safeCast(B.loadAll(this,function(b){b(a.baseLayers,a.referenceLayers)}))};c.prototype.clone=function(){var a={id:this.id,title:this.title,portalItem:this.portalItem,baseLayers:this.baseLayers.slice(),referenceLayers:this.referenceLayers.slice()};this.loaded&&(a.loadStatus="loaded");return(new k({resourceInfo:this.resourceInfo})).set(a)};c.prototype.read=function(a,b){this.resourceInfo||this._set("resourceInfo",{data:a,context:b});this.inherited(arguments)};c.prototype.write=
function(a,b){a=a||{};b&&b.origin||(b=l({origin:"web-map"},b));this.inherited(arguments,[a,b]);!this.loaded&&this.resourceInfo&&this.resourceInfo.data.baseMapLayers&&(a.baseMapLayers=this.resourceInfo.data.baseMapLayers.map(function(a){a=z.clone(a);a.url&&p.isProtocolRelative(a.url)&&(a.url="https:"+a.url);a.templateUrl&&p.isProtocolRelative(a.templateUrl)&&(a.templateUrl="https:"+a.templateUrl);return a}));return a};c.prototype._loadFromSource=function(a){var b=this.resourceInfo,c=this.portalItem;
return b?this._loadLayersFromJSON(b.data,b.context?b.context.url:null,a):c?this._loadFromItem(c,a):m.resolve(null)};c.prototype._loadLayersFromJSON=function(a,b,c){var d=this,e=this.resourceInfo&&this.resourceInfo.context,f=this.portalItem&&this.portalItem.portal||e&&e.portal||null,h=e&&"web-scene"===e.origin?"web-scene":"web-map";return m.create(function(a){return u(["./portal/support/layersCreator"],a)}).then(function(e){var g=[];m.throwIfAborted(c);if(a.baseMapLayers&&Array.isArray(a.baseMapLayers)){var k=
{context:{origin:h,url:b,portal:f,layerContainerType:"basemap"},defaultLayerType:"DefaultTileLayer"},l=e.populateOperationalLayers(d.baseLayers,a.baseMapLayers.filter(function(a){return!a.isReference}),k);g.push(n.safeCast(l));e=e.populateOperationalLayers(d.referenceLayers,a.baseMapLayers.filter(function(a){return a.isReference}),k);g.push(n.safeCast(e))}return m.eachAlways(g)}).then(function(){})};c.prototype._loadFromItem=function(a,b){var c=this;return a.load(b).then(function(a){return a.fetchData("json",
b)}).then(function(d){var e=p.urlToObject(a.itemUrl);c._set("resourceInfo",{data:d.baseMap,context:{origin:"web-map",portal:a.portal||q.getDefault(),url:e}});c.read(c.resourceInfo.data,c.resourceInfo.context);c.read({title:a.title,thumbnailUrl:a.thumbnailUrl},{origin:"portal-item",portal:a.portal||q.getDefault(),url:e});return c._loadLayersFromJSON(c.resourceInfo.data,e,b)})};c.fromId=function(a){return(a=E[a])?k.fromJSON(a):null};var k;f([d.property({type:h.default,json:{write:{ignoreOrigin:!0,target:"baseMapLayers"}}}),
d.cast(g.castForReferenceSetter)],c.prototype,"baseLayers",null);f([d.writer("baseLayers")],c.prototype,"writeBaseLayers",null);f([d.property({type:String,json:{origins:{"web-scene":{write:!0}}}})],c.prototype,"id",void 0);f([d.property({type:D})],c.prototype,"portalItem",void 0);f([d.property({type:h.default}),d.cast(g.castForReferenceSetter)],c.prototype,"referenceLayers",null);f([d.property({readOnly:!0})],c.prototype,"resourceInfo",void 0);f([d.property()],c.prototype,"thumbnailUrl",void 0);f([d.property({type:String,
json:{origins:{"web-scene":{write:{isRequired:!0}}}}})],c.prototype,"title",void 0);f([d.writer("title")],c.prototype,"writeTitle",null);return c=k=f([d.subclass("esri.Basemap")],c)}(d.declared(y,x,A))});