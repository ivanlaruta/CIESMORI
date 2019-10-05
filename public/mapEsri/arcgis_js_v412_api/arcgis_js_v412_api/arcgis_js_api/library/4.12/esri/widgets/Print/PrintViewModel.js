// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../core/tsSupport/declareExtendsHelper ../../core/tsSupport/decorateHelper ../../core/tsSupport/generatorHelper ../../core/tsSupport/awaiterHelper ../../core/tsSupport/assignHelper ../../request ../../Viewpoint ../../core/Accessor ../../core/Error ../../core/Handles ../../core/Loadable ../../core/promiseUtils ../../core/accessorSupport/decorators ../../geometry/Extent ../../tasks/PrintTask ../../tasks/support/fileFormat ../../tasks/support/layoutTemplate ../../tasks/support/PrintParameters ../../views/2d/viewpointUtils".split(" "),
function(C,D,p,d,q,r,t,u,v,w,g,x,y,h,c,z,k,l,m,A,B){return function(n){function b(a){a=n.call(this,a)||this;a._handles=new x;a._viewpoint=null;a.view=null;a.printServiceUrl=null;a.updateDelay=1E3;a.templatesInfo=null;a.scaleEnabled=!1;a.error=null;a.print=a.print.bind(a);return a}p(b,n);b.prototype.destroy=function(){this._handles.destroy();this.view=this._handles=null};Object.defineProperty(b.prototype,"_printTask",{get:function(){return new k(this.printServiceUrl,{updateDelay:this.updateDelay})},
enumerable:!0,configurable:!0});Object.defineProperty(b.prototype,"state",{get:function(){return"loading"===this.loadStatus?"initializing":this.error||"failed"===this.loadStatus?"error":this.get("view.ready")&&"loaded"===this.loadStatus?"ready":"disabled"},enumerable:!0,configurable:!0});b.prototype.load=function(a){this.addResolvingPromise(this._loadServiceDescription(a));return this.when()};b.prototype.print=function(a){var b;if(!this.view)return h.reject(new g("print:view-required","view is not set"));
this.scaleEnabled?(this._viewpoint||(this._viewpoint=this.view.viewpoint.clone()),b=this._getExtent(this._viewpoint,a.outScale)):(this._viewpoint=null,b=this._getExtent(this.view.viewpoint));a=new A({view:this.view,template:a,extent:b});return this._printTask.execute(a).catch(function(a){return h.reject(new g("print:export-error","An error occurred while exporting the web map.",{error:a}))})};b.prototype._loadServiceDescription=function(a){return r(this,void 0,void 0,function(){var b;return q(this,
function(e){switch(e.label){case 0:return[4,this._getPrintTemplatesFromService(a)];case 1:return b=e.sent(),this._set("templatesInfo",b),[2]}})})};b.prototype._getPrintTemplatesFromService=function(a){var b=this;return-1===this.printServiceUrl.toLowerCase().split("/").indexOf("gpserver")?(this.error=new g("print:invalid-print-service-url","Can't fetch print templates information from provided URL",{url:this.printServiceUrl}),h.reject(this.error)):u(this.printServiceUrl,t({},a,{query:{f:"json"},timeout:6E4})).then(function(a){a=
a&&a.data;var c=null,d=null;(a&&a.parameters).forEach(function(a){var b=a.choiceList&&a.choiceList.slice(),e;b&&b.length&&a.defaultValue&&(e=b.indexOf(a.defaultValue));-1<e&&(b.splice(e,1),b.unshift(a.defaultValue));if("Format"===a.name)c={defaultValue:l.fromJSON(a.defaultValue),choiceList:b.map(l.fromJSON)};else if("Layout_Template"===a.name){var b=b.filter(function(a){return"map_only"!==a.toLowerCase()}),f;e=void 0;b.some(function(a,b){a=a.toLowerCase();if(-1<a.indexOf("letter")&&-1<a.indexOf("landscape"))return f=
b,!0;-1<a.indexOf("a4")&&-1<a.indexOf("landscape")&&(f=b);return!1});f&&(e=b[f],b.splice(f,1),b.unshift(e));d={defaultValue:m.fromJSON(b&&b[0]||a.defaultValue),choiceList:b.map(m.fromJSON)}}});b.error=null;return{format:c,layout:d}}).catch(function(a){b.error=new g("print:unavailable-service-info","Can't fetch templates info from service",{error:a});return h.reject(b.error)})};b.prototype._getExtent=function(a,b){b=b||this.view.scale;var c=this.get("view.size");a=a?a.targetGeometry:null;return B.getExtent(new z,
new v({scale:b,targetGeometry:a}),c)};d([c.property()],b.prototype,"view",void 0);d([c.property()],b.prototype,"printServiceUrl",void 0);d([c.property({dependsOn:["printServiceUrl"],type:k})],b.prototype,"_printTask",null);d([c.property({dependsOn:["view.ready","error","loadStatus"],readOnly:!0})],b.prototype,"state",null);d([c.property()],b.prototype,"updateDelay",void 0);d([c.property({readOnly:!0})],b.prototype,"templatesInfo",void 0);d([c.property()],b.prototype,"scaleEnabled",void 0);d([c.property()],
b.prototype,"error",void 0);return b=d([c.subclass("esri.widgets.Print.PrintViewModel")],b)}(c.declared(w,y))});