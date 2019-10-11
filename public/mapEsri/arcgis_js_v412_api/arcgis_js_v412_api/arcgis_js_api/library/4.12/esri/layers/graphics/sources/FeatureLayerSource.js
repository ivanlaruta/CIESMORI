// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../../core/tsSupport/declareExtendsHelper ../../../core/tsSupport/decorateHelper ../../../core/tsSupport/assignHelper ../../../core/tsSupport/generatorHelper ../../../core/tsSupport/awaiterHelper ../../../request ../../../core/Accessor ../../../core/Error ../../../core/Loadable ../../../core/maybe ../../../core/promiseUtils ../../../core/urlUtils ../../../core/accessorSupport/decorators ../../../tasks/QueryTask ../../../tasks/operations/queryAttachments".split(" "),function(r,
t,w,f,l,x,y,m,z,u,A,v,p,B,g,C,D){Object.defineProperty(t,"__esModule",{value:!0});r=function(q){function b(){var a=null!==q&&q.apply(this,arguments)||this;a.type="feature-layer";return a}w(b,q);b.prototype.load=function(a){a=v.isSome(a)?a.signal:null;this.addResolvingPromise(this._fetchService(a));return this.when()};Object.defineProperty(b.prototype,"queryTask",{get:function(){var a=this.layer,c=a.parsedUrl,d=a.gdbVersion;return new C({url:null!=a.dynamicDataSource?c.path+"?"+B.objectToQuery(c.query):
c.path,gdbVersion:d})},enumerable:!0,configurable:!0});b.prototype.addAttachment=function(a,c){var d=this;return this.load().then(function(){var b=a.attributes[d.layer.objectIdField],h=d.layer.parsedUrl.path+"/"+b+"/addAttachment",n=l({f:"json"},d.layer.parsedUrl.query),n=d._getFormDataForAttachment(c,n);return m(h,{body:n}).then(function(a){return d._createFeatureEditResult(a.data.addAttachmentResult)}).catch(function(a){return p.reject(d._createAttachmentErrorResult(b,a))})})};b.prototype.updateAttachment=
function(a,c,d){var b=this;return this.load().then(function(){var e=a.attributes[b.layer.objectIdField],n=b.layer.parsedUrl.path+"/"+e+"/updateAttachment",k=l({f:"json"},b.layer.parsedUrl.query,{attachmentId:c}),k=b._getFormDataForAttachment(d,k);return m(n,{body:k}).then(function(a){return b._createFeatureEditResult(a.data.updateAttachmentResult)}).catch(function(a){return p.reject(b._createAttachmentErrorResult(e,a))})})};b.prototype.applyEdits=function(a){var c=this;return this.load().then(function(){var d=
a.addFeatures.map(c._serializeFeature,c),b=a.updateFeatures.map(c._serializeFeature,c),h=c._getFeatureIds(a.deleteFeatures),d={f:"json",adds:d.length?JSON.stringify(d):null,updates:b.length?JSON.stringify(b):null,deletes:h.length?h.join(","):null};return m(c.layer.parsedUrl.path+"/applyEdits",{query:d,method:"post",responseType:"json"})}).then(function(a){return c._createEditsResult(a)})};b.prototype.deleteAttachments=function(a,c){var d=this;return this.load().then(function(){var b=a.attributes[d.layer.objectIdField];
return m(d.layer.parsedUrl.path+"/"+b+"/deleteAttachments",{query:l({f:"json"},d.layer.parsedUrl.query,{attachmentIds:c.join(",")}),method:"post",responseType:"json"}).then(function(a){return a.data.deleteAttachmentResults.map(d._createFeatureEditResult)}).catch(function(a){return p.reject(d._createAttachmentErrorResult(b,a))})})};b.prototype.queryAttachments=function(a,c){var d=this;void 0===c&&(c={});var b=this.layer.parsedUrl,h=b.path;return this.load().then(function(){var e=l({},c,{query:l({},
b.query,{f:"json"}),responseType:"json"});if(!d.layer.get("capabilities.operations.supportsQueryAttachments")){for(var k=a.objectIds,g=[],f=0;f<k.length;f++)g.push(m(h+"/"+k[f]+"/attachments",e));return p.all(g).then(function(a){return k.map(function(c,b){return{parentObjectId:c,attachmentInfos:a[b].data.attachmentInfos}})}).then(function(a){return D.processAttachmentQueryResult(a,h)})}return d.queryTask.executeAttachmentQuery(a,e)})};b.prototype.queryFeatures=function(a,c){var b=this;return this.load().then(function(){return b.queryTask.execute(a,
c)})};b.prototype.queryFeaturesJSON=function(a,c){var b=this;return this.load().then(function(){return b.queryTask.executeJSON(a,c)})};b.prototype.queryObjectIds=function(a,c){var b=this;return this.load().then(function(){return b.queryTask.executeForIds(a,c)})};b.prototype.queryFeatureCount=function(a,c){var b=this;return this.load().then(function(){return b.queryTask.executeForCount(a,c)})};b.prototype.queryExtent=function(a,c){var b=this;return this.load().then(function(){return b.queryTask.executeForExtent(a,
c)})};b.prototype.queryRelatedFeatures=function(a,c){var b=this;return this.load().then(function(){return b.queryTask.executeRelationshipQuery(a,c)})};b.prototype._fetchService=function(a){return y(this,void 0,void 0,function(){var c,b;return x(this,function(d){switch(d.label){case 0:return(c=this.layer.resourceInfo)?(this.layerDefinition=c,[2]):[4,m(this.layer.parsedUrl.path,{query:l({f:"json"},this.layer.parsedUrl.query),responseType:"json",signal:a})];case 1:return this.layerDefinition=b=d.sent().data,
[2]}})})};b.prototype._serializeFeature=function(a){var b=a.geometry;a=a.attributes;return v.isNone(b)?{attributes:a}:"mesh"===b.type||"extent"===b.type?null:{geometry:b.toJSON(),attributes:a}};b.prototype._getFeatureIds=function(a){var b=a[0];return b?"objectId"in b?this._getIdsFromFeatureIdentifier(a):this._getIdsFromFeatures(a):[]};b.prototype._getIdsFromFeatures=function(a){var b=this.layer.objectIdField;return a.map(function(a){return a.attributes&&a.attributes[b]})};b.prototype._getIdsFromFeatureIdentifier=
function(a){return a.map(function(a){return a.objectId})};b.prototype._createEditsResult=function(a){a=a.data;return{addFeatureResults:a.addResults?a.addResults.map(this._createFeatureEditResult,this):[],updateFeatureResults:a.updateResults?a.updateResults.map(this._createFeatureEditResult,this):[],deleteFeatureResults:a.deleteResults?a.deleteResults.map(this._createFeatureEditResult,this):[]}};b.prototype._createFeatureEditResult=function(a){var b=!0===a.success?null:a.error||{code:void 0,description:void 0};
return{objectId:a.objectId,globalId:a.globalId,error:b?new u("feature-layer-source:edit-failure",b.description,{code:b.code}):null}};b.prototype._createAttachmentErrorResult=function(a,b){return{objectId:a,globalId:null,error:new u("feature-layer-source:attachment-failure",b.details.messages&&b.details.messages[0]||b.message,{code:b.details.httpStatus||b.details.messageCode})}};b.prototype._getFormDataForAttachment=function(a,b){if(a=a instanceof FormData?a:a&&a.elements?new FormData(a):null)for(var c in b){var e=
b[c];null!=e&&(a.set?a.set(c,e):a.append(c,e))}return a};f([g.property()],b.prototype,"type",void 0);f([g.property({constructOnly:!0})],b.prototype,"layer",void 0);f([g.property({readOnly:!0,dependsOn:["layer.parsedUrl","layer.gdbVersion","layer.dynamicDataSource"]})],b.prototype,"queryTask",null);return b=f([g.subclass("esri.layers.graphics.sources.FeatureLayerSource")],b)}(g.declared(z,A));t.default=r});