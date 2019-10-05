// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../core/tsSupport/declareExtendsHelper ../core/tsSupport/decorateHelper dojo/i18n!../nls/common dojo/i18n!./CoordinateConversion/nls/CoordinateConversion ../core/events ../core/global ../core/Logger ../core/accessorSupport/decorators ./Widget ./CoordinateConversion/CoordinateConversionViewModel ./CoordinateConversion/support/Conversion ./support/widget".split(" "),function(x,y,t,d,l,e,u,m,v,h,w,n,p,b){var q=v.getLogger("esri.widgets.CoordinateConversion");return function(r){function c(a){a=
r.call(this)||this;a._popupMessage=null;a._popupId=null;a._coordinateInput=null;a._badInput=!1;a._goToEnabled=!1;a._conversionFormat=null;a._settingsFormat=null;a._previewConversion=null;a._expanded=!1;a._popupVisible=!1;a._settingsVisible=!1;a._inputVisible=!1;a.conversions=null;a.currentLocation=null;a.formats=null;a.goToOverride=null;a.mode=null;a.orientation="auto";a.requestDelay=null;a.view=null;a.viewModel=new n;return a}t(c,r);Object.defineProperty(c.prototype,"multipleConversions",{get:function(){var a=
this._get("multipleConversions");return"boolean"===typeof a?a:!0},set:function(a){!1===a&&(this._expanded=!1,this.conversions.splice(1,this.conversions.length-1));this._set("multipleConversions",a)},enumerable:!0,configurable:!0});c.prototype.reverseConvert=function(a,b){return null};c.prototype.render=function(){var a,k=this.get("viewModel.state"),c="disabled"===k?b.tsx("div",{key:"esri-coordinate__no-basemap"},e.noBasemap):null,g=!c&&this._inputVisible?this._renderInputForm():null,f=!c&&this._settingsVisible?
this._renderSettings():null,d=c||g||f?null:this._renderConversionsView(),h=this._popupVisible?this._renderPopup():null,k=(a={},a["esri-coordinate-conversion--capture-mode"]="capture"===this.mode,a["esri-disabled"]="loading"===k,a["esri-coordinate-conversion--no-basemap"]="disabled"===k,a);return b.tsx("div",{class:this.classes("esri-coordinate-conversion esri-widget",k)},h,c,d,f,g)};c.prototype._addConversion=function(a){a=a.target;var b=a["data-index"],c=new p({format:a.options[a.options.selectedIndex]["data-format"]});
a.options.selectedIndex=0;0<=b&&this.conversions.removeAt(b);this.conversions.add(c,b)};c.prototype._findSettingsFormat=function(){return this._settingsFormat||this.conversions.reduceRight(function(a,b,c){b=b.format;return b.get("hasDisplayProperties")?b:a},null)||this.formats.find(function(a){return a.hasDisplayProperties})};c.prototype._hidePopup=function(){this._popupId&&(clearTimeout(this._popupId),this._popupId=null);this._popupVisible=!1;this._popupMessage=null;this.scheduleRender()};c.prototype._onConvertComplete=
function(){this._inputVisible=!1;this._coordinateInput.value=""};c.prototype._onCopy=function(a){var b=a.currentTarget["data-conversion"].displayCoordinate;"clipboardData"in m?m.clipboardData.setData("text",b):a.clipboardData.setData("text/plain",b);this._showPopup(e.copySuccessMessage);a.preventDefault()};c.prototype._processUserInput=function(a){var b=this;a=u.eventKey(a);var c=this.viewModel;"Enter"!==a&&a?this._badInput&&(this._badInput=!1):this._reverseConvert(this._coordinateInput.value,this._coordinateInput["data-format"]).then(function(a){"capture"===
b.mode?c.resume():b.mode="capture";b.currentLocation=a;c.setLocation(a);b._onConvertComplete()}).catch(function(a){q.error(a);b._showPopup(e.invalidCoordinate);b._badInput=!0})};c.prototype._reverseConvert=function(a,b){var c=this,k=this.viewModel;return b.reverseConvert(a).then(function(a){c._goToEnabled&&k.goToLocation(a).catch(function(a){q.warn(a);c._showPopup(e.locationOffBasemap)});return a})};c.prototype._setInputFormat=function(a){a=a.target;this._conversionFormat=a[a.options.selectedIndex]["data-format"]};
c.prototype._setPreviewConversion=function(){var a=this._findSettingsFormat(),b=this.viewModel;if(a){var c=this.conversions.find(function(b){return b.format===a});this._previewConversion=new p({format:a,position:{location:this.currentLocation,coordinate:c&&c.position.coordinate}});this._previewConversion.position.coordinate||b.previewConversion(this._previewConversion)}};c.prototype._setSettingsFormat=function(a){a=a.target;this._settingsFormat=a[a.options.selectedIndex]["data-format"];this._setPreviewConversion()};
c.prototype._showPopup=function(a,b){var c=this;void 0===b&&(b=2500);this._popupMessage=a;this._popupVisible?clearTimeout(this._popupId):this._popupVisible=!0;this.scheduleRender();this._popupId=setTimeout(function(){c._popupId=null;c._hidePopup()},b)};c.prototype._toggleGoTo=function(){this._goToEnabled=!this._goToEnabled};c.prototype._updateCurrentPattern=function(a){a.stopPropagation();a=a.target;var b=this._findSettingsFormat();b&&(b.currentPattern=a.value)};c.prototype._renderConversion=function(a,
c){var k=this.id+"__list-item-"+c,g=a.format.name+" "+e.conversionOutputSuffix,f=0===c,d=f||this._expanded,h=f?this._renderFirstConversion(a,k):this._renderTools(c,a,k),f=f&&!a.displayCoordinate?e.noLocation:a.displayCoordinate,f=b.tsx("div",{"aria-label":f,class:"esri-coordinate-conversion__display","data-conversion":a,role:"listitem",tabindex:"0",title:f},f),l=this._renderOptions(this.formats.filter(function(b){return b!==a.format}));return d?b.tsx("li",{"aria-label":g,class:"esri-coordinate-conversion__row",
id:k,key:a,role:"group",title:g,tabindex:"0"},b.tsx("select",{"aria-controls":k,"aria-label":e.selectFormat,class:this.classes("esri-select","esri-coordinate-conversion__select-row"),bind:this,"data-index":c,onchange:this._addConversion,title:e.selectFormat},b.tsx("option",{"aria-label":a.format.name,selected:!0,title:a.format.name},a.format.name.toUpperCase()),l),f,h):null};c.prototype._renderCopyButton=function(a){return b.tsx("li",{"aria-label":l.copy,bind:this,class:this.classes("esri-widget--button",
"esri-coordinate-conversion__row-button"),"data-conversion":a,onclick:this._copyCoordinateOutput,onkeydown:this._copyCoordinateOutput,oncopy:this._onCopy,role:"button",tabindex:"0",title:l.copy},b.tsx("span",{"aria-hidden":"true",class:"esri-icon-duplicate"}))};c.prototype._renderFirstConversion=function(a,c){var k;c=this.id;var g=(k={},k["esri-icon-up"]=!this._expanded,k["esri-icon-down"]=this._expanded,k);k="live"===this.mode?e.captureMode:e.liveMode;var f=this._expanded?l.collapse:l.expand;a=a.displayCoordinate&&
"capture"===this.mode?this._renderCopyButton(a):null;c=this.multipleConversions?b.tsx("li",{"aria-controls":c+"__esri-coordinate-conversion__conversion-list","aria-label":f,bind:this,class:"esri-widget--button",key:"esri-coordinate-conversion__expand-button",onclick:this._toggleExpand,onkeydown:this._toggleExpand,role:"button",tabindex:"0",title:f},b.tsx("span",{"aria-hidden":"true",class:this.classes(g)})):b.tsx("li",{"aria-label":k,bind:this,class:this.classes("esri-widget--button","esri-coordinate-conversion__mode-toggle"),
key:"esri-coordinate-conversion__mode-toggle",onclick:this._toggleMode,onkeydown:this._toggleMode,role:"button",tabindex:"0",title:k},b.tsx("span",{"aria-hidden":"true",class:"esri-icon-map-pin"}));return b.tsx("ul",{class:"esri-coordinate-conversion__tools"},a,c)};c.prototype._renderInputForm=function(){var a,c=this._conversionFormat||this.conversions.getItemAt(0).format,d=this.formats.findIndex(function(a){return a.name===c.name}),g=this.id,f=g+"__esri-coordinate-conversion__input-coordinate",g=
g+"__esri-coordinate-conversion__input-coordinate__header",d=this._renderOptions(this.formats,!0,d),h=(a={},a["esri-coordinate-conversion__input-coordinate--rejected"]=this._badInput,a);return b.tsx("div",{"aria-labelledby":g,class:"esri-coordinate-conversion__input-form",key:"esri-coordinate-conversion__input-form",role:"search"},b.tsx("div",{class:"esri-coordinate-conversion__heading"},b.tsx("div",{"aria-label":l.back,bind:this,class:this.classes("esri-widget--button","esri-coordinate-conversion__back-button"),
onclick:this._toggleInputVisibility,onkeydown:this._toggleInputVisibility,role:"button",tabindex:"0",title:l.back},b.tsx("span",{"aria-hidden":"true",class:"esri-icon-left-arrow"})),b.tsx("h4",{class:"esri-widget__heading",id:g},e.inputCoordTitle)),b.tsx("div",{class:"esri-coordinate-conversion__input-group"},b.tsx("select",{"aria-controls":f,"aria-label":e.selectFormat,bind:this,class:this.classes("esri-select","esri-coordinate-conversion__select-row"),onchange:this._setInputFormat,title:e.selectFormat},
d),b.tsx("input",{afterCreate:b.storeNode,"aria-labelledby":g,"aria-required":"true",bind:this,class:this.classes("esri-coordinate-conversion__input-coordinate","esri-input",h),"data-format":c,"data-node-ref":"_coordinateInput",id:f,onkeydown:this._processUserInput,placeholder:e.inputCoordTitle,role:"textbox",spellcheck:!1,title:e.inputCoordTitle,type:"text"})),b.tsx("div",{class:"esri-coordinate-conversion__input-group"},b.tsx("label",{"aria-label":e.goTo},b.tsx("input",{bind:this,checked:this._goToEnabled,
onclick:this._toggleGoTo,title:e.goTo,type:"checkbox"}),e.goTo),b.tsx("button",{"aria-label":e.convert,bind:this,class:this.classes("esri-coordinate-conversion__button","esri-button"),onclick:this._processUserInput,title:e.convert,type:"button"},e.convert)))};c.prototype._renderConversionsView=function(){var a=this,c,d=this.id+"__esri-coordinate-conversion__conversion-list",g=this._renderPrimaryTools(),f=this._renderOptions(this.formats),h=this.conversions.map(function(b,c){return a._renderConversion(b,
c)}).toArray(),g=this._expanded?b.tsx("div",{class:"esri-coordinate-conversion__row"},b.tsx("select",{"aria-controls":d,"aria-label":e.addConversion,bind:this,class:this.classes("esri-select","esri-coordinate-conversion__select-primary"),onchange:this._addConversion,title:e.addConversion},b.tsx("option",{disabled:!0,selected:!0,value:""},e.addConversion),f),g):null,f=(c={},c["esri-coordinate-conversion__conversions-view--expanded"]=this._expanded,c["esri-coordinate-conversion__conversions-view--expand-up"]=
"expand-up"===this.orientation,c["esri-coordinate-conversion__conversions-view--expand-down"]="expand-down"===this.orientation,c);return b.tsx("div",{class:this.classes("esri-coordinate-conversion__conversions-view",f),key:"esri-coordinate-conversion__main-view"},b.tsx("ul",{"aria-expanded":this._expanded?"true":"false",class:"esri-coordinate-conversion__conversion-list",id:d},h),g)};c.prototype._renderOptions=function(a,c,e){var k=this,d=this.conversions.getItemAt(0);return a.map(function(a,f){var g=
c||!d?!1:d.format.name===a.name||k.conversions.map(function(a){return a.format.name}).includes(a.name);return b.tsx("option",{"aria-label":a.name,"data-format":a,disabled:g,key:a.name,selected:f===e,value:a.name},a.name.toUpperCase())}).toArray()};c.prototype._renderPopup=function(){return b.tsx("div",{class:"esri-coordinate-conversion__popup",role:"alert"},this._popupMessage)};c.prototype._renderPrimaryTools=function(){var a="live"===this.mode?e.captureMode:e.liveMode;return b.tsx("ul",{class:"esri-coordinate-conversion__tools"},
b.tsx("li",{bind:this,class:"esri-widget--button",onclick:this._toggleInputVisibility,onkeydown:this._toggleInputVisibility,role:"button",tabindex:"0",title:e.inputCoordTitle},b.tsx("span",{"aria-hidden":"true",class:"esri-icon-edit"})),b.tsx("li",{bind:this,class:this.classes("esri-widget--button","esri-coordinate-conversion__mode-toggle"),onclick:this._toggleMode,onkeydown:this._toggleMode,role:"button",tabindex:"0",title:a},b.tsx("span",{"aria-hidden":"true",class:"esri-icon-map-pin"})),b.tsx("li",
{bind:this,class:"esri-widget--button",onclick:this._toggleSettingsVisibility,onkeydown:this._toggleSettingsVisibility,role:"button",tabindex:"0",title:e.settingsTitle},b.tsx("span",{"aria-hidden":"true",class:"esri-icon-settings2"})))};c.prototype._renderSettings=function(){var a=this.id,c=a+"__esri-coordinate-conversion__pattern-input",d=a+"__esri-coordinate-conversion__pattern-input__header",a=a+"__esri-coordinate-conversion__preview-coordinate",g=this.formats.filter(function(a){return a.hasDisplayProperties}),
f=this._findSettingsFormat(),h=g.indexOf(f),g=this._renderOptions(g,!0,h),f=f.get("currentPattern");return b.tsx("div",{"aria-labelledby":d,class:"esri-coordinate__settings",key:"esri-coordinate-conversion__settings"},b.tsx("div",{class:"esri-coordinate-conversion__heading"},b.tsx("div",{bind:this,class:this.classes("esri-widget--button","esri-coordinate-conversion__back-button"),onclick:this._toggleSettingsVisibility,onkeydown:this._toggleSettingsVisibility,role:"button",tabindex:"0",title:l.back},
b.tsx("span",{"aria-hidden":"true",class:"esri-icon-left-arrow"})),b.tsx("h4",{class:"esri-widget__heading",id:d},e.settingsTitle)),b.tsx("div",{class:"esri-coordinate-conversion__settings-group"},b.tsx("label",{for:c},e.changeCoordinateDisplay),b.tsx("select",{"aria-label":e.selectFormat,class:"esri-select",bind:this,onchange:this._setSettingsFormat,title:e.selectFormat},g),b.tsx("div",{class:"esri-coordinate-conversion__settings-group-horizontal"},b.tsx("input",{"aria-controls":a,bind:this,class:this.classes("esri-coordinate-conversion__pattern-input",
"esri-input"),id:c,oninput:this._updateCurrentPattern,spellcheck:!1,title:e.changeCoordinateDisplay,type:"text",value:f}),b.tsx("div",{"aria-controls":c,bind:this,class:"esri-widget--button",onclick:this._setDefaultPattern,onkeydown:this._setDefaultPattern,role:"button",tabindex:"0",title:e.defaultPattern},b.tsx("span",{"aria-hidden":"true",class:"esri-icon-refresh"})))),b.tsx("div",{class:"esri-coordinate-conversion__settings-group"},b.tsx("label",null,l.preview,b.tsx("div",{class:"esri-coordinate-conversion__preview-coordinate",
id:a,tabindex:"0"},this._previewConversion.displayCoordinate))))};c.prototype._renderTools=function(a,c,d){c=c.displayCoordinate&&"capture"===this.mode?this._renderCopyButton(c):null;return b.tsx("ul",{class:"esri-coordinate-conversion__tools",role:"listitem"},c,b.tsx("li",{"aria-controls":d,"aria-label":e.removeConversion,bind:this,class:this.classes("esri-widget--button","esri-coordinate-conversion__row-button"),"data-index":a,key:d+"__esri-widget--button",onclick:this._removeConversion,onkeydown:this._removeConversion,
tabindex:"0",role:"button",title:e.removeConversion},b.tsx("span",{"aria-hidden":"true",class:"esri-icon-close"})))};c.prototype._copyCoordinateOutput=function(a){a=a.target;if(!("createTextRange"in document.body)){var b=window.getSelection(),c=document.createRange();c.selectNodeContents(a);b.removeAllRanges();b.addRange(c)}document.execCommand("copy")};c.prototype._removeConversion=function(a){this.conversions.removeAt(a.target["data-index"])};c.prototype._setDefaultPattern=function(a){a.stopPropagation();
if(a=this._findSettingsFormat())a.currentPattern=a.get("defaultPattern")};c.prototype._toggleExpand=function(){this._expanded=!this._expanded};c.prototype._toggleInputVisibility=function(a){this._inputVisible=!this._inputVisible;this._popupVisible&&this._hidePopup();this._inputVisible?this.viewModel.pause():this.viewModel.resume()};c.prototype._toggleMode=function(){this.mode="live"===this.mode?"capture":"live"};c.prototype._toggleSettingsVisibility=function(){this._settingsVisible=!this._settingsVisible;
this._popupVisible&&this._hidePopup();this._settingsVisible?(this._setPreviewConversion(),this.viewModel.pause()):this.viewModel.resume()};d([h.aliasOf("viewModel.conversions")],c.prototype,"conversions",void 0);d([h.aliasOf("viewModel.currentLocation"),b.renderable()],c.prototype,"currentLocation",void 0);d([h.aliasOf("viewModel.formats"),b.renderable()],c.prototype,"formats",void 0);d([h.aliasOf("viewModel.goToOverride")],c.prototype,"goToOverride",void 0);d([h.aliasOf("viewModel.mode"),b.renderable()],
c.prototype,"mode",void 0);d([h.property(),b.renderable()],c.prototype,"orientation",void 0);d([h.aliasOf("viewModel.requestDelay")],c.prototype,"requestDelay",void 0);d([h.property(),b.renderable()],c.prototype,"multipleConversions",null);d([h.aliasOf("viewModel.locationSymbol")],c.prototype,"locationSymbol",void 0);d([h.aliasOf("viewModel.view"),b.renderable()],c.prototype,"view",void 0);d([h.property({type:n}),b.renderable(["viewModel.state","viewModel.waitingForConversions"])],c.prototype,"viewModel",
void 0);d([h.aliasOf("viewModel.reverseConvert")],c.prototype,"reverseConvert",null);d([b.accessibleHandler()],c.prototype,"_copyCoordinateOutput",null);d([b.accessibleHandler()],c.prototype,"_removeConversion",null);d([b.accessibleHandler()],c.prototype,"_setDefaultPattern",null);d([b.accessibleHandler()],c.prototype,"_toggleExpand",null);d([b.accessibleHandler()],c.prototype,"_toggleInputVisibility",null);d([b.accessibleHandler()],c.prototype,"_toggleMode",null);d([b.accessibleHandler()],c.prototype,
"_toggleSettingsVisibility",null);return c=d([h.subclass("esri.widgets.CoordinateConversion")],c)}(h.declared(w))});