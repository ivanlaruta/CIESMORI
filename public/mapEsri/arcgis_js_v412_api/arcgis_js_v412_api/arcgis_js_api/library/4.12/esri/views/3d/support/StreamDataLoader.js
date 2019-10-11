// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../../request ../../../core/arrayUtils ../../../core/Error ../../../core/lang ../../../core/maybe ../../../core/now ../../../core/promiseUtils ./AsyncQuotaRoundRobinQueue ../webgl-engine/lib/Util".split(" "),function(f,k,n,p,q,r,t,m,h,u,v){Object.defineProperty(k,"__esModule",{value:!0});f=function(){function b(a,c){var e=this;this.tasks=new Map;this.doneQueue=[];this.loadQueue=new u.AsyncQuotaRoundRobinQueue(this.startLoading.bind(this),this.doneLoadingCallback,this,a);
c&&(this.taskHandle=c.registerTask(1,function(a){return e.update(a)},function(){return 0<e.doneQueue.length}))}b.prototype.destroy=function(){this.taskHandle&&(this.taskHandle.remove(),this.taskHandle=null);this.tasks.forEach(function(a){a.abortController&&a.abortController.abort()});this.loadQueue.clear();this.tasks=this.doneQueue=this.loadQueue=null};b.prototype.request=function(a,c,e,d){var b=this,g=h.createResolver(),f=t.isSome(d)&&d.uid||a,k=this.createOrUpdateTask(a,c,e,f,g);h.onAbort(d,function(){return b.cancelRequest(k,
g)});return g.promise};b.prototype.createTask=function(a,c,e,d,b){a={url:a,docType:c,clientType:e,key:d,result:null,status:1,resourceRequest:null,abortController:null,resolvers:[],_cancelledInQueue:!1,startTime:0,duration:0,size:0};this.updateTask(a,b);this.tasks.set(d,a);this.loadQueue.push(a);return a};b.prototype.cancelRequest=function(a,c){p.removeUnordered(a.resolvers,c);c.reject(h.createAbortError());0===a.resolvers.length&&(2===a.status&&(a.status=4,this.loadQueue.workerCancelled(a),a.abortController.abort(),
a.resourceRequest=null,a.abortController=null),a.status=4,this.tasks.delete(a.key))};Object.defineProperty(b.prototype,"hasPendingDownloads",{get:function(){return 0<this.tasks.size},enumerable:!0,configurable:!0});b.prototype.taskKey=function(a,c,b){return a+":"+c+":"+b};b.prototype.updateTask=function(a,c){a.resolvers.push(c)};b.prototype.createOrUpdateTask=function(a,c,b,d,l){d=this.taskKey(d,c,b);var e=this.tasks.get(d);return e?(this.updateTask(e,l),e):this.createTask(a,c,b,d,l)};b.prototype.doneLoadingCallback=
function(a,c){v.assert(2===a.status);a.status=3;this.taskHandle?this.doneQueue.push({task:a,err:c}):this.doneLoading(a,c)};b.prototype.update=function(a){for(;!a.done&&0<this.doneQueue.length;){var c=this.doneQueue.shift();3!==c.task.status&&(c.err=c.err||h.createAbortError());this.doneLoading(c.task,c.err);a.madeProgress()}};b.prototype.doneLoading=function(a,c){for(var b=a.result instanceof HTMLImageElement?0:a.resolvers.length,d=0,l=a.resolvers;d<l.length;d++){var g=l[d];if(c)h.isAbortError(c)?
g.reject(c):g.reject(new q("stream-data-loader:request-error","Failed to request resource at '"+a.url+"'. "+c,{url:a.url,error:c}));else{--b;var f=0>=b?a.result:r.clone(a.result);g.resolve(f)}}this.tasks.delete(a.key)};b.prototype.startLoading=function(a,c){if(4===a.status)return!1;a.status=2;var b,d;switch(a.docType){case "binary":d="array-buffer";b=0;break;case "image":d="image";break;default:d="json"}a.startTime=m();a.abortController=h.createAbortController();a.resourceRequest=n(a.url,{responseType:d,
timeout:b,signal:a.abortController.signal});a.resourceRequest.then(function(b){a.duration=m()-a.startTime;a.size="binary"===a.docType?b.data.byteLength:0;a.result=b.data;a.abortController=null;c(a)},function(b){2===a.status&&c(a,b)});return!0};Object.defineProperty(b.prototype,"test",{get:function(){return{loadQueue:this.loadQueue}},enumerable:!0,configurable:!0});return b}();k.StreamDataLoader=f;k.default=f});