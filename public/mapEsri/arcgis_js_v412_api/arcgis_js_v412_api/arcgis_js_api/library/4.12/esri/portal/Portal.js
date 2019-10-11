// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../core/tsSupport/assignHelper ../core/tsSupport/awaiterHelper ../core/tsSupport/declareExtendsHelper ../core/tsSupport/decorateHelper ../core/tsSupport/generatorHelper ../core/tsSupport/paramHelper dojo/_base/kernel ../config ../kernel ../request ../core/Error ../core/JSONSupport ../core/lang ../core/Loadable ../core/maybe ../core/promiseUtils ../core/accessorSupport/decorators ../geometry/Extent ./PortalQueryParams ./PortalQueryResult ./PortalUser @dojo/framework/shim/Promise".split(" "),
function(f,K,p,l,A,d,m,B,x,u,q,C,r,D,E,F,G,e,c,H,v,I,J){var t,z={PortalGroup:function(){return e.create(function(c){return f(["./PortalGroup"],c)})},PortalItem:function(){return e.create(function(c){return f(["./PortalItem"],c)})},PortalUser:function(){return e.create(function(c){return f(["./PortalUser"],c)})}};return function(y){function a(b){b=y.call(this)||this;b.access=null;b.allSSL=!1;b.authMode="auto";b.authorizedCrossOriginDomains=null;b.basemapGalleryGroupQuery=null;b.bingKey=null;b.canListApps=
!1;b.canListData=!1;b.canListPreProvisionedItems=!1;b.canProvisionDirectPurchase=!1;b.canSearchPublic=!0;b.canShareBingPublic=!1;b.canSharePublic=!1;b.canSignInArcGIS=!1;b.canSignInIDP=!1;b.colorSetsGroupQuery=null;b.commentsEnabled=!1;b.created=null;b.culture=null;b.customBaseUrl=null;b.defaultBasemap=null;b.defaultExtent=null;b.defaultVectorBasemap=null;b.description=null;b.eueiEnabled=!1;b.featuredGroups=null;b.featuredItemsGroupQuery=null;b.galleryTemplatesGroupQuery=null;b.livingAtlasGroupQuery=
null;b.hasCategorySchema=!1;b.helperServices=null;b.homePageFeaturedContent=null;b.homePageFeaturedContentCount=null;b.httpPort=null;b.httpsPort=null;b.id=null;b.ipCntryCode=null;b.isPortal=!1;b.layerTemplatesGroupQuery=null;b.maxTokenExpirationMinutes=null;b.modified=null;b.name=null;b.portalHostname=null;b.portalMode=null;b.portalProperties=null;b.region=null;b.rotatorPanels=null;b.showHomePageDescription=!1;b.supportsHostedServices=!1;b.symbolSetsGroupQuery=null;b.templatesGroupQuery=null;b.units=
null;b.url=u.portalUrl;b.urlKey=null;b.user=null;b.useStandardizedQuery=!1;b.useVectorBasemaps=!1;b.vectorBasemapGalleryGroupQuery=null;return b}A(a,y);g=a;a.prototype.normalizeCtorArgs=function(b){return"string"===typeof b?{url:b}:b};a.prototype.destroy=function(){this._esriId_credentialCreateHandle&&(this._esriId_credentialCreateHandle.remove(),this._esriId_credentialCreateHandle=null)};a.prototype.readAuthorizedCrossOriginDomains=function(b){if(b)for(var a=0;a<b.length;a++){var c=b[a];-1===u.request.trustedServers.indexOf(c)&&
u.request.trustedServers.push(c)}return b};a.prototype.readDefaultBasemap=function(b){return b?(b=t.fromJSON(b),b.portalItem={portal:this},b):null};a.prototype.readDefaultVectorBasemap=function(b){return b?(b=t.fromJSON(b),b.portalItem={portal:this},b):null};Object.defineProperty(a.prototype,"extraQuery",{get:function(){var b=!(this.user&&this.user.orgId)||this.canSearchPublic;return this.id&&!b?" AND orgid:"+this.id:null},enumerable:!0,configurable:!0});Object.defineProperty(a.prototype,"isOrganization",
{get:function(){return!!this.access},enumerable:!0,configurable:!0});Object.defineProperty(a.prototype,"restUrl",{get:function(){var b=this.url;if(b)var a=b.indexOf("/sharing"),b=0<a?b.substring(0,a):this.url.replace(/\/+$/,""),b=b+"/sharing/rest";return b},enumerable:!0,configurable:!0});Object.defineProperty(a.prototype,"thumbnailUrl",{get:function(){var b=this.restUrl,a=this.thumbnail;return b&&a?this._normalizeSSL(b+"/portals/self/resources/"+a):null},enumerable:!0,configurable:!0});a.prototype.readUrlKey=
function(b){return b?b.toLowerCase():b};a.prototype.readUser=function(b){var a=null;b&&(a=J.fromJSON(b),a.portal=this);return a};a.prototype.load=function(b){var a=this,c=e.create(function(b){return f(["../Basemap"],b)}).then(function(a){e.throwIfAborted(b);t=a}).then(function(){return a._fetchSelf(a.authMode,!1,b)}).then(function(b){if(q.id){var c=q.id;a.credential=c.findCredential(a.restUrl);a.credential||a.authMode!==g.AUTH_MODE_AUTO||(a._esriId_credentialCreateHandle=c.on("credential-create",
function(){c.findCredential(a.restUrl)&&a._signIn()}))}a.read(b)});this.addResolvingPromise(c);return this.when()};a.prototype.createClosestFacilityTask=function(){return l(this,void 0,void 0,function(){var b,a;return m(this,function(c){switch(c.label){case 0:return[4,this.load()];case 1:return c.sent(),b=this._getHelperServiceUrl("closestFacility"),[4,new Promise(function(b,a){f(["../tasks/ClosestFacilityTask"],b,a)})];case 2:return a=c.sent(),[2,new a(b)]}})})};a.prototype.createElevationLayers=
function(){return l(this,void 0,void 0,function(){var b,a;return m(this,function(c){switch(c.label){case 0:return[4,this.load()];case 1:return c.sent(),b=this._getHelperService("defaultElevationLayers"),[4,new Promise(function(b,a){f(["../layers/ElevationLayer"],b,a)})];case 2:return a=c.sent(),[2,b?b.map(function(b){return new a({id:b.id,url:b.url})}):[]]}})})};a.prototype.createGeometryService=function(){return l(this,void 0,void 0,function(){var b,a;return m(this,function(c){switch(c.label){case 0:return[4,
this.load()];case 1:return c.sent(),b=this._getHelperServiceUrl("geometry"),[4,new Promise(function(b,a){f(["../tasks/GeometryService"],b,a)})];case 2:return a=c.sent(),[2,new a(b)]}})})};a.prototype.createPrintTask=function(){return l(this,void 0,void 0,function(){var b,a;return m(this,function(c){switch(c.label){case 0:return[4,this.load()];case 1:return c.sent(),b=this._getHelperServiceUrl("printTask"),[4,new Promise(function(b,a){f(["../tasks/PrintTask"],b,a)})];case 2:return a=c.sent(),[2,new a(b)]}})})};
a.prototype.createRouteTask=function(){return l(this,void 0,void 0,function(){var b,a;return m(this,function(c){switch(c.label){case 0:return[4,this.load()];case 1:return c.sent(),b=this._getHelperServiceUrl("route"),[4,new Promise(function(b,a){f(["../tasks/RouteTask"],b,a)})];case 2:return a=c.sent(),[2,new a(b)]}})})};a.prototype.createServiceAreaTask=function(){return l(this,void 0,void 0,function(){var b,a;return m(this,function(c){switch(c.label){case 0:return[4,this.load()];case 1:return c.sent(),
b=this._getHelperServiceUrl("serviceArea"),[4,new Promise(function(b,a){f(["../tasks/ServiceAreaTask"],b,a)})];case 2:return a=c.sent(),[2,new a(b)]}})})};a.prototype.fetchBasemaps=function(b,a){var c=new v;c.query=b||(this.useVectorBasemaps?this.vectorBasemapGalleryGroupQuery:this.basemapGalleryGroupQuery);c.disableExtraQuery=!0;return this.queryGroups(c,a).then(function(b){c.num=100;c.query='type:"Web Map" -type:"Web Application"';return b.total?(b=b.results[0],c.sortField=b.sortField||"name",c.sortOrder=
b.sortOrder||"desc",b.queryItems(c,a)):null}).then(function(b){return b&&b.total?b.results.filter(function(b){return"Web Map"===b.type}).map(function(b){return new t({portalItem:b})}):[]})};a.prototype.fetchCategorySchema=function(b){return this.hasCategorySchema?this._request(this.restUrl+"/portals/self/categorySchema",b).then(function(b){return b.categorySchema}):e.isAborted(b)?e.reject(e.createAbortError()):e.resolve([])};a.prototype.fetchFeaturedGroups=function(b){var a=this.featuredGroups,c=
new v;c.num=100;c.sortField="title";if(a&&a.length){for(var d=[],w=0;w<a.length;w++){var n=a[w];d.push('(title:"'+n.title+'" AND owner:'+n.owner+")")}c.query=d.join(" OR ");return this.queryGroups(c,b).then(function(b){return b.results})}return e.isAborted(b)?e.reject(e.createAbortError()):e.resolve([])};a.prototype.fetchRegions=function(b){return this._request(this.restUrl+"/portals/regions",p({},b,{query:{culture:this.user&&this.user.culture||this.culture||x.locale}}))};a.getDefault=function(){g._default||
(g._default=new g);return g._default};a.prototype.queryGroups=function(b,a){return this._queryPortal("/community/groups",b,"PortalGroup",a)};a.prototype.queryItems=function(b,a){return this._queryPortal("/search",b,"PortalItem",a)};a.prototype.queryUsers=function(b,a){b.sortField||(b.sortField="username");return this._queryPortal("/community/users",b,"PortalUser",a)};a.prototype.toJSON=function(){throw new r("internal:not-yet-implemented","Portal.toJSON is not yet implemented");};a.prototype._getHelperService=
function(b){var a=this.helperServices&&this.helperServices[b];if(!a)throw new r("portal:service-not-found",'The `helperServices` do not include an entry named "'+b+'"');return a};a.prototype._getHelperServiceUrl=function(b){var a=this._getHelperService(b);if(!a.url)throw new r("portal:service-url-not-found",'The `helperServices` entry "'+b+'" does not include a `url` value');return a.url};a.prototype._fetchSelf=function(b,a,c){void 0===b&&(b=this.authMode);void 0===a&&(a=!1);var d=this.restUrl+"/portals/self";
b=p({authMode:b,query:{culture:x.locale}},c);"auto"===b.authMode&&(b.authMode="no-prompt");a&&(b.query.default=!0);return this._request(d,b)};a.prototype._queryPortal=function(b,a,c,d){var k=this,h=function(c){return k._request(k.restUrl+b,p({},a.toRequestOptions(k),d)).then(function(b){var h=a.clone();h.start=b.nextStart;return new I({nextQueryParams:h,queryParams:a,total:b.total,results:g._resultsToTypedArray(c,{portal:k},b,d)})}).then(function(b){return e.all(b.results.map(function(a){return"function"===
typeof a.when?a.when():b})).then(function(){return b},function(a){e.throwIfAbortError(a);return b})})};return c&&z[c]?z[c]().then(function(b){e.throwIfAborted(d);return h(b)}):h()};a.prototype._signIn=function(){var b=this;if(this.authMode===g.AUTH_MODE_ANONYMOUS)return e.reject(new r("portal:invalid-auth-mode",'Current "authMode"\' is "'+this.authMode+'"'));if("failed"===this.loadStatus)return e.reject(this.loadError);var a=function(a){return e.resolve().then(function(){if("not-loaded"===b.loadStatus)return a||
(b.authMode="immediate"),b.load().then(function(){return null});if("loading"===b.loadStatus)return b.load().then(function(){if(b.credential)return null;b.credential=a;return b._fetchSelf("immediate")});if(b.user&&b.credential===a)return null;b.credential=a;return b._fetchSelf("immediate")}).then(function(a){a&&b.read(a)})};return q.id?q.id.getCredential(this.restUrl).then(function(b){return a(b)}):a(this.credential)};a.prototype._normalizeSSL=function(b){return b.replace(/^http:/i,"https:").replace(":7080",
":7443")};a.prototype._normalizeUrl=function(b){var a=this.credential&&this.credential.token;return this._normalizeSSL(a?b+(-1<b.indexOf("?")?"\x26":"?")+"token\x3d"+a:b)};a.prototype._requestToTypedArray=function(b,a,c){var d=this,k=function(c){return d._request(b,a).then(function(b){var a=g._resultsToTypedArray(c,{portal:d},b);return e.all(a.map(function(a){return"function"===typeof a.when?a.when():b})).then(function(){return a},function(){return a})})};return c?e.create(function(b){return f(["./"+
c],b)}).then(function(b){return k(b)}):k()};a.prototype._request=function(b,a){void 0===a&&(a={});var c=p({f:"json"},a.query),d=a.authMode,e=a.body,n=a.cacheBust,f=a.method,h=a.responseType;a={authMode:void 0===d?this.authMode===g.AUTH_MODE_ANONYMOUS?"anonymous":"auto":d,body:void 0===e?null:e,cacheBust:void 0===n?!1:n,method:void 0===f?"auto":f,query:c,responseType:void 0===h?"json":h,timeout:0,signal:a.signal};return C(this._normalizeSSL(b),a).then(function(a){return a.data})};a._resultsToTypedArray=
function(a,c,d,e){if(d){var b=G.isSome(e)?e.signal:null;d=d.listings||d.notifications||d.userInvitations||d.tags||d.items||d.groups||d.comments||d.provisions||d.results||d.relatedItems||d;if(a||c)d=d.map(function(d){d=E.mixin(a?a.fromJSON(d):d,c);"function"===typeof d.load&&d.load(b);return d})}else d=[];return d};var g;a.AUTH_MODE_ANONYMOUS="anonymous";a.AUTH_MODE_AUTO="auto";a.AUTH_MODE_IMMEDIATE="immediate";d([c.property()],a.prototype,"access",void 0);d([c.property()],a.prototype,"allSSL",void 0);
d([c.property()],a.prototype,"authMode",void 0);d([c.property()],a.prototype,"authorizedCrossOriginDomains",void 0);d([c.reader("authorizedCrossOriginDomains")],a.prototype,"readAuthorizedCrossOriginDomains",null);d([c.property()],a.prototype,"basemapGalleryGroupQuery",void 0);d([c.property()],a.prototype,"bingKey",void 0);d([c.property()],a.prototype,"canListApps",void 0);d([c.property()],a.prototype,"canListData",void 0);d([c.property()],a.prototype,"canListPreProvisionedItems",void 0);d([c.property()],
a.prototype,"canProvisionDirectPurchase",void 0);d([c.property()],a.prototype,"canSearchPublic",void 0);d([c.property()],a.prototype,"canShareBingPublic",void 0);d([c.property()],a.prototype,"canSharePublic",void 0);d([c.property()],a.prototype,"canSignInArcGIS",void 0);d([c.property()],a.prototype,"canSignInIDP",void 0);d([c.property()],a.prototype,"colorSetsGroupQuery",void 0);d([c.property()],a.prototype,"commentsEnabled",void 0);d([c.property({type:Date})],a.prototype,"created",void 0);d([c.property()],
a.prototype,"credential",void 0);d([c.property()],a.prototype,"culture",void 0);d([c.property()],a.prototype,"currentVersion",void 0);d([c.property()],a.prototype,"customBaseUrl",void 0);d([c.property()],a.prototype,"defaultBasemap",void 0);d([c.reader("defaultBasemap")],a.prototype,"readDefaultBasemap",null);d([c.property({type:H})],a.prototype,"defaultExtent",void 0);d([c.property()],a.prototype,"defaultVectorBasemap",void 0);d([c.reader("defaultVectorBasemap")],a.prototype,"readDefaultVectorBasemap",
null);d([c.property()],a.prototype,"description",void 0);d([c.property()],a.prototype,"eueiEnabled",void 0);d([c.property({dependsOn:["user","id","canSearchPublic"],readOnly:!0})],a.prototype,"extraQuery",null);d([c.property()],a.prototype,"featuredGroups",void 0);d([c.property()],a.prototype,"featuredItemsGroupQuery",void 0);d([c.property()],a.prototype,"galleryTemplatesGroupQuery",void 0);d([c.property()],a.prototype,"livingAtlasGroupQuery",void 0);d([c.property()],a.prototype,"hasCategorySchema",
void 0);d([c.property()],a.prototype,"helpBase",void 0);d([c.property()],a.prototype,"helperServices",void 0);d([c.property()],a.prototype,"helpMap",void 0);d([c.property()],a.prototype,"homePageFeaturedContent",void 0);d([c.property()],a.prototype,"homePageFeaturedContentCount",void 0);d([c.property()],a.prototype,"httpPort",void 0);d([c.property()],a.prototype,"httpsPort",void 0);d([c.property()],a.prototype,"id",void 0);d([c.property()],a.prototype,"ipCntryCode",void 0);d([c.property({dependsOn:["access"],
readOnly:!0})],a.prototype,"isOrganization",null);d([c.property()],a.prototype,"isPortal",void 0);d([c.property()],a.prototype,"layerTemplatesGroupQuery",void 0);d([c.property()],a.prototype,"maxTokenExpirationMinutes",void 0);d([c.property({type:Date})],a.prototype,"modified",void 0);d([c.property()],a.prototype,"name",void 0);d([c.property()],a.prototype,"portalHostname",void 0);d([c.property()],a.prototype,"portalMode",void 0);d([c.property()],a.prototype,"portalProperties",void 0);d([c.property()],
a.prototype,"region",void 0);d([c.property({dependsOn:["url"],readOnly:!0})],a.prototype,"restUrl",null);d([c.property()],a.prototype,"rotatorPanels",void 0);d([c.property()],a.prototype,"showHomePageDescription",void 0);d([c.property()],a.prototype,"staticImagesUrl",void 0);d([c.property()],a.prototype,"stylesGroupQuery",void 0);d([c.property()],a.prototype,"supportsHostedServices",void 0);d([c.property()],a.prototype,"symbolSetsGroupQuery",void 0);d([c.property()],a.prototype,"templatesGroupQuery",
void 0);d([c.property()],a.prototype,"thumbnail",void 0);d([c.property({dependsOn:["restUrl","thumbnail"],readOnly:!0})],a.prototype,"thumbnailUrl",null);d([c.property()],a.prototype,"units",void 0);d([c.property()],a.prototype,"url",void 0);d([c.property()],a.prototype,"urlKey",void 0);d([c.reader("urlKey")],a.prototype,"readUrlKey",null);d([c.property()],a.prototype,"user",void 0);d([c.reader("user")],a.prototype,"readUser",null);d([c.property()],a.prototype,"useStandardizedQuery",void 0);d([c.property()],
a.prototype,"useVectorBasemaps",void 0);d([c.property()],a.prototype,"vectorBasemapGalleryGroupQuery",void 0);d([B(1,c.cast(v))],a.prototype,"_queryPortal",null);return a=g=d([c.subclass("esri.portal.Portal")],a)}(c.declared(D,F))});