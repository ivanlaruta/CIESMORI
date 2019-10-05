// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../core/tsSupport/declareExtendsHelper ../core/tsSupport/decorateHelper ../core/tsSupport/assignHelper dojo/i18n!../nls/common dojo/i18n!./TimeSlider/nls/TimeSlider ../TimeInterval ../core/arrayUtils ../core/Collection ../core/compilerUtils ../core/Error ../core/events ../core/mathUtils ../core/maybe ../core/throttle ../core/accessorSupport/decorators ../intl/date ../layers/support/timeUtils ./Slider ./Widget ./TimeSlider/TimeSliderViewModel ./support/widget ./support/widgetUtils".split(" "),
function(K,L,z,c,M,k,A,a,B,C,u,w,D,E,q,F,d,r,x,G,H,y,f,I){var J=new C([{minor:new a({value:100,unit:"milliseconds"}),major:new a({value:1,unit:"seconds"}),format:{second:"numeric"}},{minor:new a({value:500,unit:"milliseconds"}),major:new a({value:5,unit:"seconds"}),format:{second:"numeric"}},{minor:new a({value:1,unit:"seconds"}),major:new a({value:20,unit:"seconds"}),format:{minute:"numeric",second:"numeric"}},{minor:new a({value:2,unit:"seconds"}),major:new a({value:30,unit:"seconds"}),format:{minute:"numeric",
second:"numeric"}},{minor:new a({value:10,unit:"seconds"}),major:new a({value:1,unit:"minutes"}),format:{minute:"numeric"}},{minor:new a({value:15,unit:"seconds"}),major:new a({value:5,unit:"minutes"}),format:{hour:"numeric",minute:"numeric"}},{minor:new a({value:1,unit:"minutes"}),major:new a({value:20,unit:"minutes"}),format:{hour:"numeric",minute:"numeric"}},{minor:new a({value:5,unit:"minutes"}),major:new a({value:2,unit:"hours"}),format:{hour:"numeric",minute:"numeric"}},{minor:new a({value:15,
unit:"minutes"}),major:new a({value:6,unit:"hours"}),format:{hour:"numeric",minute:"numeric"}},{minor:new a({value:1,unit:"hours"}),major:new a({value:1,unit:"days"}),format:{day:"numeric",month:"short"}},{minor:new a({value:6,unit:"hours"}),major:new a({value:1,unit:"weeks"}),format:{day:"numeric",month:"short"}},{minor:new a({value:1,unit:"days"}),major:new a({value:1,unit:"months"}),format:{month:"long"}},{minor:new a({value:2,unit:"days"}),major:new a({value:1,unit:"months"}),format:{month:"short"}},
{minor:new a({value:3,unit:"days"}),major:new a({value:1,unit:"months"}),format:{month:"short"}},{minor:new a({value:4,unit:"days"}),major:new a({value:3,unit:"months"}),format:{month:"short",year:"numeric"}},{minor:new a({value:1,unit:"weeks"}),major:new a({value:1,unit:"years"}),format:{year:"numeric"}},{minor:new a({value:1,unit:"months"}),major:new a({value:1,unit:"years"}),format:{year:"numeric"}},{minor:new a({value:2,unit:"months"}),major:new a({value:2,unit:"years"}),format:{year:"numeric"}},
{minor:new a({value:1,unit:"years"}),major:new a({value:1,unit:"decades"}),format:{year:"numeric"}},{minor:new a({value:2,unit:"years"}),major:new a({value:5,unit:"decades"}),format:{year:"numeric"}},{minor:new a({value:5,unit:"decades"}),major:new a({value:10,unit:"centuries"}),format:{era:"short",year:"numeric"}},{minor:new a({value:1,unit:"centuries"}),major:new a({value:10,unit:"centuries"}),format:{era:"short",year:"numeric"}},{minor:new a({value:2,unit:"centuries"}),major:new a({value:20,unit:"centuries"}),
format:{era:"short",year:"numeric"}},{minor:new a({value:5,unit:"centuries"}),major:new a({value:50,unit:"centuries"}),format:{era:"short",year:"numeric"}},{minor:new a({value:10,unit:"centuries"}),major:new a({value:100,unit:"centuries"}),format:{era:"short",year:"numeric"}},{minor:new a({value:20,unit:"centuries"}),major:new a({value:200,unit:"centuries"}),format:{era:"short",year:"numeric"}},{minor:new a({value:50,unit:"centuries"}),major:new a({value:500,unit:"centuries"}),format:{era:"short",
year:"numeric"}},{minor:new a({value:100,unit:"centuries"}),major:new a({value:1E3,unit:"centuries"}),format:{era:"short",year:"numeric"}},{minor:new a({value:200,unit:"centuries"}),major:new a({value:1E3,unit:"centuries"}),format:{era:"short",year:"numeric"}},{minor:new a({value:500,unit:"centuries"}),major:new a({value:5E3,unit:"centuries"}),format:{era:"short",year:"numeric"}},{minor:new a({value:1E3,unit:"centuries"}),major:new a({value:1E4,unit:"centuries"}),format:{era:"short",year:"numeric"}}]);
return function(a){function b(e){e=a.call(this)||this;e._slider=null;e._tickFormat=null;e.effectiveStops=null;e.fullTimeExtent=null;e.iconClass="esri-icon-time-clock";e.label=A.widgetLabel;e.loop=!0;e.playRate=1E3;e.mode="time-window";e.stops={count:10};e.timeExtent=null;e.timeVisible=!1;e.values=null;e.view=null;e.viewModel=new y;return e}z(b,a);b.prototype.postInitialize=function(){var a=this;this._slider=new G({precision:0,rangeLabelsVisible:!0,rangeLabelInputsEnabled:!1,labelFormatFunction:function(e,
b){return"min"!==b&&"max"!==b||!e?null:(b=new Date(e),e=a._formateDate(b),b=a._formateTime(b),a.timeVisible?e+"\n"+b:""+e)}});var b=F.throttle(function(){return a.scheduleRender()},100);this.own([this._slider.on(["value-change","values-change"],function(){a.set("values",a._slider.values.map(function(a){return new Date(a)}))}),D.on(window,"resize",b),this.watch("effectiveStops",function(){a._updateSliderSteps()}),this.watch(["stops","fullTimeExtent"],function(){a._createDefaultValues()})]);this._updateSliderSteps();
this._createDefaultValues();this._validateTimeExtent()};b.prototype.destroy=function(){this.view=null;this._slider.destroy();this._tickFormat=null};b.prototype.next=function(){};b.prototype.play=function(){};b.prototype.previous=function(){};b.prototype.stop=function(){return null};b.prototype.render=function(){var a=this.fullTimeExtent,b=this.mode,c=this._slider,d=this.effectiveStops,l=this.timeVisible,h=this.values,m=this.viewModel;if(null!=a){var g=a.start,a=a.end;if(null==g||null==a)return;c.min=
g.valueOf();c.max=a.valueOf();var n=c.trackElement?c.trackElement.offsetWidth:400,u=(a.getTime()-g.getTime())/n,p=J.find(function(a){return a.minor.toMilliseconds()>3*u});this._tickFormat!==p&&null!=p&&(this._tickFormat=p,g={mode:"position",values:this._getTickPositions(p.minor),labelsVisible:!1,tickCreatedFunction:function(a,b,e){b.classList.add("minorTick")}},a={mode:"position",values:this._getTickPositions(p.major),labelsVisible:!0,tickCreatedFunction:function(a,b,e){b.classList.add("majorTick");
e.classList.add("majorLabel")},labelFormatFunction:function(a){return r.formatDate(a,p.format)}},c.tickConfigs=[g,a])}g=h?h.map(function(a){return a.getTime()}):null;B.equals(c.values,g)||(c.values=g);var v=n=a=g=null;if(h&&0<h.length){var t=h[0],g=this._formateDate(t);l&&(a=this._formateTime(t))}"time-window"===b&&h&&1<h.length&&(t=h[1],n=this._formateDate(t),l&&(v=this._formateTime(t)));m=m.state;h="ready"===m;l="playing"===m;d="disabled"===m||0===d.length;h=f.tsx("button",{"aria-disabled":d?"true":
"false","aria-label":l?k.control.stop:k.control.play,bind:this,class:this.classes("esri-widget--button esri-time-slider__play",d&&"esri-button--disabled"),disabled:d,title:l?k.control.stop:k.control.play,onclick:this._playOrStopClick},f.tsx("div",{class:this.classes((h||d)&&"esri-icon-play esri-time-slider__play-icon",l&&"esri-icon-pause esri-time-slider__pause-icon")}));m=f.tsx("div",{class:"esri-time-slider__dates"},q.isSome(g)?f.tsx("div",{key:"start-date",class:"esri-time-slider__time-extent-date"},
g):null,q.isSome(a)?f.tsx("div",{key:"start-time",class:"esri-time-slider__time-extent-time"},a):null,q.isSome(n)?f.tsx("div",{key:"separator",class:"esri-time-slider__time-extent-separator"},"\u2013"):null,q.isSome(n)?f.tsx("div",{key:"end-date",class:"esri-time-slider__time-extent-date"},n):null,q.isSome(v)?f.tsx("div",{key:"end-time",class:"esri-time-slider__time-extent-time"},v):null);c=f.tsx("div",{class:"esri-time-slider__track"},c.render());g=f.tsx("button",{"aria-disabled":d?"true":"false",
"aria-label":k.pagination.previous,bind:this,class:this.classes("esri-widget--button esri-time-slider__previous",(l||d)&&"esri-button--disabled"),disabled:d,title:k.pagination.previous,onclick:this._previousClick},f.tsx("div",{class:"esri-icon-reverse esri-time-slider__previous-icon"}));d=f.tsx("button",{"aria-disabled":d?"true":"false","aria-label":k.pagination.next,bind:this,class:this.classes("esri-widget--button esri-time-slider__next",(l||d)&&"esri-button--disabled"),disabled:d,title:k.pagination.next,
onclick:this._nextClick},f.tsx("div",{class:"esri-icon-forward esri-time-slider__next-icon"}));c=[h,m,c,g,d];I.isRTL()&&c.reverse();return f.tsx("div",{class:this.classes("esri-time-slider esri-widget","esri-time-slider--"+b)},c)};b.prototype._createDefaultValues=function(){var a=this.effectiveStops,b=this.mode,c=this.values;this.fullTimeExtent&&a&&b&&!c&&(this.values="time-window"===b?1<a.length?[a[0],a[1]]:null:0<a.length?[a[0]]:null)};b.prototype._getTickPositions=function(a){for(var b=this.fullTimeExtent,
c=b.start,b=b.end,e=[],d=x.truncateDate(c,a.unit);d.getTime()<=b.getTime();)d.getTime()>=c.getTime()&&e.push(d.getTime()),d=x.appendDate(d,a);return e};b.prototype._formateDate=function(a){return r.formatDate(a,r.convertDateFormatToIntlOptions("short-date"))};b.prototype._formateTime=function(a){return r.formatDate(a,r.convertDateFormatToIntlOptions("long-time"))};b.prototype._updateSliderSteps=function(){this._slider.steps=0<this.effectiveStops.length?this.effectiveStops.map(function(a){return a.getTime()}):
null};b.prototype._validateTimeExtent=function(){var a=this;if(this.fullTimeExtent&&this.mode&&this.values){if(!Array.isArray(this.values))throw new w("time-slider:invalid-values","Values must be an array of dates.");if(0===this.values.length||this.values.some(function(a){return!(a instanceof Date)}))throw new w("time-slider:invalid-values","Values must be an array of dates.");this.values=this.values.map(function(b){b=b.getTime();b=E.clamp(b,a.fullTimeExtent.start.getTime(),a.fullTimeExtent.end.getTime());
return new Date(b)});switch(this.mode){case "instant":case "cumulative-from-start":case "cumulative-from-end":1<this.values.length&&this.values.splice(1);break;case "time-window":1===this.values.length?this.values.push(this.fullTimeExtent.end):2<this.values.length&&this.values.splice(2);this.values.sort(function(a,b){return a.getTime()-b.getTime()});break;default:u.neverReached(this.mode)}}};b.prototype._playOrStopClick=function(){switch(this.viewModel.state){case "ready":this.viewModel.play();break;
case "playing":this.viewModel.stop();break;case "disabled":break;default:u.neverReached(this.viewModel.state)}};b.prototype._previousClick=function(){this.viewModel.previous()};b.prototype._nextClick=function(){this.viewModel.next()};c([d.aliasOf("viewModel.effectiveStops"),f.renderable()],b.prototype,"effectiveStops",void 0);c([d.aliasOf("viewModel.fullTimeExtent"),f.renderable()],b.prototype,"fullTimeExtent",void 0);c([d.property()],b.prototype,"iconClass",void 0);c([d.property()],b.prototype,"label",
void 0);c([d.aliasOf("viewModel.loop")],b.prototype,"loop",void 0);c([d.aliasOf("viewModel.playRate")],b.prototype,"playRate",void 0);c([d.aliasOf("viewModel.mode"),f.renderable()],b.prototype,"mode",void 0);c([d.aliasOf("viewModel.stops")],b.prototype,"stops",void 0);c([d.aliasOf("viewModel.timeExtent")],b.prototype,"timeExtent",void 0);c([d.property({nonNullable:!0}),f.renderable()],b.prototype,"timeVisible",void 0);c([d.aliasOf("viewModel.values"),f.renderable()],b.prototype,"values",void 0);c([d.aliasOf("viewModel.view")],
b.prototype,"view",void 0);c([d.property({type:y}),f.renderable(["viewModel.state"])],b.prototype,"viewModel",void 0);c([d.aliasOf("viewModel.next")],b.prototype,"next",null);c([d.aliasOf("viewModel.play")],b.prototype,"play",null);c([d.aliasOf("viewModel.previous")],b.prototype,"previous",null);c([d.aliasOf("viewModel.stop")],b.prototype,"stop",null);c([f.accessibleHandler()],b.prototype,"_playOrStopClick",null);c([f.accessibleHandler()],b.prototype,"_previousClick",null);c([f.accessibleHandler()],
b.prototype,"_nextClick",null);return b=c([d.subclass("esri.widgets.TimeSlider")],b)}(d.declared(H))});