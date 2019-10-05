// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../../../core/tsSupport/generatorHelper ../../../../core/tsSupport/awaiterHelper ../../../../core/tsSupport/assignHelper ../../../../geometry ../../../../core/arrayUtils ../../../../core/asyncUtils ../../../../core/maybe ../../../../core/promiseUtils ../../../../core/scheduling".split(" "),function(d,h,q,l,u,v,w,x,r,g,y){Object.defineProperty(h,"__esModule",{value:!0});d=function(){function b(a,c){this.spatialReference=a;this.view=c;this.point=new v.Point;this.point.spatialReference=
a}b.prototype.getElevation=function(a,c,e){this.point.x=a;this.point.y=c;return this.view.elevationProvider.getElevation(this.point,e)};b.prototype.queryElevation=function(a,c,e,b,g){return l(this,void 0,void 0,function(){return q(this,function(f){this.point.x=a;this.point.y=c;return[2,this.view.elevationProvider.queryElevation(this.point,e,b,g)]})})};return b}();h.ViewElevationProvider=d;d=function(){function b(a,c,e){this.spatialReference=a;this._getElevationQueryProvider=c;this._queries=[];this._isScheduled=
!1;this._queryOptions=u({},e,{ignoreInvisibleLayers:!0})}b.prototype.queryElevation=function(a,c,e,b,d){void 0===b&&(b=0);return l(this,void 0,void 0,function(){var f=this;return q(this,function(d){return[2,g.create(function(d,n){var k={x:a,y:c,minDemResolution:b,result:{resolve:d,reject:n},signal:e};f._queries.push(k);g.onAbort(e,function(){w.remove(f._queries,k);n(g.createAbortError())});f._scheduleDoQuery()})]})})};b.prototype._scheduleDoQuery=function(){var a=this;this._isScheduled||(y.schedule(function(){return a._doQuery()}),
this._isScheduled=!0)};b.prototype._doQuery=function(){return l(this,void 0,void 0,function(){var a,b,e,d,h,f,l,t,n,k,p,m;return q(this,function(c){switch(c.label){case 0:this._isScheduled=!1;a=this._queries;this._queries=[];if(0===a.length)return[2];b=a.map(function(a){return[a.x,a.y]});e=a.reduce(function(a,b){return Math.min(a,b.minDemResolution)},Infinity);d=new v.Multipoint({points:b,spatialReference:this.spatialReference});h=this._getElevationQueryProvider();if(!h)return a.forEach(function(a,
b){return a.result.reject()}),[2];f=1<a.length&&a.some(function(a){return!!a.signal})?g.createAbortController():null;l=r.isSome(f)?f.signal:a[0].signal;r.isSome(f)&&(t=0,a.forEach(function(b){return g.onAbort(b.signal,function(){t++;b.result.reject(g.createAbortError());t===a.length&&f.abort()})}));n=u({},this._queryOptions,{minDemResolution:e,signal:l});return[4,x.result(h.queryElevation(d,n))];case 1:k=c.sent();for(p=0;p<a.length;p++)m=a[p],r.isSome(m.signal)&&m.signal.aborted?m.result.reject(g.createAbortError()):
!1===k.ok?m.result.reject(k.error):m.result.resolve(k.value.geometry.points[p][2]);return[2]}})})};return b}();h.ElevationQuery=d});