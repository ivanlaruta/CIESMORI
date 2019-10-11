// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../../core/tsSupport/declareExtendsHelper ../../../core/tsSupport/decorateHelper ../../../core/tsSupport/assignHelper dojo/i18n!../../../nls/common dojo/i18n!../../Legend/nls/Legend dojox/gfx ../../../intl ../../../core/Handles ../../../core/screenUtils ../../../core/accessorSupport/decorators ../../Widget ./support/utils ../support/styleUtils ../../support/colorUtils ../../support/widget".split(" "),function(H,I,y,r,J,z,v,A,B,C,w,p,D,E,t,F,e){var u=window.devicePixelRatio;
return function(x){function f(a){a=x.call(this)||this;a._handles=new C;a._hasIndicators=!1;a._selectedSectionName=null;a._sectionNames=[];a._sectionMap=new Map;a.activeLayerInfos=null;a.layout="stack";a.type="card";a.view=null;return a}y(f,x);f.prototype.postInitialize=function(){var a=this;this.own([this.watch("activeLayerInfos",function(c){a._handles.removeAll();a._watchForSectionChanges(c)})])};f.prototype.destroy=function(){this._handles.destroy();this._handles=null};f.prototype.render=function(){var a=
this,c;this._hasIndicators="auto"===this.layout&&768>=this.view.container.clientWidth||"stack"===this.layout;var d=this.activeLayerInfos,b=d&&d.toArray().map(function(b){return a._renderLegendForLayer(b)}).filter(function(a){return!!a});this._hasIndicators?this._selectedSectionName&&-1!==this._sectionNames.indexOf(this._selectedSectionName)||(this._selectedSectionName=this._sectionNames&&this._sectionNames[0]):this._selectedSectionName=null;var g=this._sectionNames.length,d=this._sectionNames.map(function(b,
c){var d;c=B.substitute(z.pagination.pageText,{index:c+1,total:g});return e.tsx("div",{key:b,"aria-label":c,title:c,tabIndex:0,onclick:a._selectSection,onkeydown:a._selectSection,bind:a,class:a.classes("esri-legend--card__carousel-indicator",(d={},d["esri-legend--card__carousel-indicator--activated"]=a._selectedSectionName===b,d)),"data-section-name":b})}),d=this._hasIndicators&&1<g?e.tsx("div",{class:"esri-legend--card__carousel-indicator-container",key:"carousel-navigation"},d):null,b=this._hasIndicators?
this._sectionMap.get(this._selectedSectionName):b&&b.length?b:null,m=(c={},c["esri-legend--stacked"]=this._hasIndicators,c);return e.tsx("div",{class:this.classes("esri-legend--card esri-widget",m)},d,b?b:e.tsx("div",{class:"esri-legend--card__message"},v.noLegend))};f.prototype._selectSection=function(a){if(a=a.target.getAttribute("data-section-name"))this._selectedSectionName=a};f.prototype._watchForSectionChanges=function(a){var c=this;this._generateSectionNames();a&&(a.forEach(function(a){var b=
"activeLayerInfo-"+a.layer.uid+"-version-change";c._handles.remove(b);c._watchForSectionChanges(a.children);c._handles.add(a.watch("version",function(){return c._generateSectionNames()}),b)}),this._handles.remove("activeLayerInfos-collection-change"),this._handles.add(a.on("change",function(){return c._watchForSectionChanges(a)}),"activeLayerInfos-collection-change"))};f.prototype._generateSectionNames=function(){this._sectionNames.length=0;this.activeLayerInfos&&this.activeLayerInfos.forEach(this._generateSectionNamesForActiveLayerInfo,
this)};f.prototype._generateSectionNamesForActiveLayerInfo=function(a){var c=this;a.children.forEach(this._generateSectionNamesForActiveLayerInfo,this);a.legendElements&&a.legendElements.forEach(function(d,b){c._sectionNames.push("esri-legend--card__"+a.layer.uid+"-type-"+d.type+"-"+b)})};f.prototype._renderLegendForLayer=function(a){var c=this,d;if(!a.ready)return null;if(a.children.length)return d=a.children.map(function(a){return c._renderLegendForLayer(a)}).toArray(),e.tsx("div",{key:a.layer.uid,
class:this.classes("esri-legend--card__service","esri-legend--card__group-layer")},e.tsx("div",{class:"esri-legend--card__service-caption-container"},a.title),d);var b=a.legendElements;if(b&&!b.length)return null;var g=b.some(function(a){return"relationship-ramp"===a.type}),b=b.map(function(b,d){return c._renderLegendForElement(b,a,d,g)}).filter(function(a){return!!a});if(!b.length)return null;var m=(d={},d["esri-legend--card__group-layer-child"]=!!a.parent,d);return e.tsx("div",{key:a.layer.uid,
class:this.classes("esri-legend--card__service",m)},e.tsx("div",{class:"esri-legend--card__service-caption-container"},e.tsx("div",{class:"esri-legend--card__service-caption-text"},a.title)),e.tsx("div",{class:"esri-legend--card__service-content"},b))};f.prototype._renderLegendForElement=function(a,c,d,b){var g=this;void 0===b&&(b=!1);var m,G="color-ramp"===a.type,h="opacity-ramp"===a.type,l="size-ramp"===a.type,f=c.layer,k=a.title,n=null;"string"===typeof k?n=k:k&&(n=t.getTitle(k,G||h),n=k.title?
k.title+" ("+n+")":n);d="esri-legend--card__"+f.uid+"-type-"+a.type+"-"+d;k=this._hasIndicators?e.tsx("div",null,e.tsx("h3",{class:this.classes("esri-widget__heading","esri-legend--card__carousel-title")},c.title),e.tsx("h4",{class:this.classes("esri-widget__heading","esri-legend--card__layer-caption")},n)):n?e.tsx("h4",{class:this.classes("esri-widget__heading","esri-legend--card__layer-caption")},n):null;n=null;"symbol-table"===a.type?(l=a.infos.map(function(b,d){return g._renderLegendForElementInfo(b,
c,a.legendType,d)}).filter(function(a){return!!a}),l.length&&(f=l[0].properties.classes&&l[0].properties.classes["esri-legend--card__symbol-row"],b=(m={},m["esri-legend--card__label-container"]=!f&&!b,m["esri-legend--card__relationship-label-container"]=b,m),n=e.tsx("div",{key:d,class:"esri-legend--card__section"},k,e.tsx("div",{class:this.classes(b)},l)))):"color-ramp"===a.type||"opacity-ramp"===a.type||"heatmap-ramp"===a.type?n=e.tsx("div",{key:d,class:"esri-legend--card__section"},k,this._renderLegendForRamp(a,
f.opacity)):l?n=e.tsx("div",{key:d,class:"esri-legend--card__section"},k,this._renderSizeRamps(a,f.opacity)):"relationship-ramp"===a.type&&(n=e.tsx("div",{key:d,class:this.classes("esri-legend--card__section","esri-legend--card__relationship-section")},k,E.renderRelationshipRamp(a,this.id,f.opacity)));if(!n)return null;this._sectionMap.set(d,n);return n};f.prototype._renderLegendForElementInfo=function(a,c,d,b){var g,m,f,h=c.layer;if(a.type)return this._renderLegendForElement(a,c,b);c=t.isImageryStretchedLegend(h,
d);if(a.symbol&&a.preview){if(-1===a.symbol.type.indexOf("simple-fill")){if(!a.label)return e.tsx("div",{key:b,bind:a.preview,afterCreate:t.attachToNode});h=(g={},g["esri-legend--card__symbol-cell"]=this._hasIndicators,g);return e.tsx("div",{key:b,class:this.classes("esri-legend--card__layer-row",(m={},m["esri-legend--card__symbol-row"]=this._hasIndicators,m))},e.tsx("div",{class:this.classes(h),bind:a.preview,afterCreate:t.attachToNode}),e.tsx("div",{class:this.classes("esri-legend--card__image-label",
(f={},f["esri-legend--card__label-cell"]=this._hasIndicators,f))},t.getTitle(a.label,!1)||""))}f=m=g=255;c=0;var l=d=255,q=255,k=0,n=a.symbol.color&&a.symbol.color.a,r=a.symbol.outline&&a.symbol.outline.color.a;n&&(g=a.symbol.color.r,m=a.symbol.color.g,f=a.symbol.color.b,c=a.symbol.color.a*h.opacity);r&&(d=a.symbol.outline.color.r,l=a.symbol.outline.color.g,q=a.symbol.outline.color.b,k=a.symbol.outline.color.a*h.opacity);var p=(h=a.symbol.color?F.isBright(a.symbol.color):!0)?"rgba(255, 255, 255, .6)":
"rgba(0, 0, 0, .6)";return e.tsx("div",{key:b,class:"esri-legend--card__layer-row"},e.tsx("div",{class:"esri-legend--card__label-element",styles:{background:n?"rgba("+g+", "+m+", "+f+", "+c+")":"none",color:h?"black":"white",textShadow:"-1px -1px 0 "+p+",\n                                              1px -1px 0 "+p+",\n                                              -1px 1px 0 "+p+",\n                                              1px 1px 0 "+p,border:r?"1px solid rgba("+d+", "+l+", "+q+", "+k+")":
"none"}}," ",a.label," "))}if(a.src)return h=this._renderImage(a,h,c),e.tsx("div",{key:b,class:"esri-legend--card__layer-row"},h,e.tsx("div",{class:"esri-legend--card__image-label"},a.label||""))};f.prototype._renderImage=function(a,c,d){var b,g=a.label,m=a.src,f=a.opacity;d=(b={},b["esri-legend--card__imagery-layer-image--stretched"]=d,b["esri-legend--card__symbol"]=!d,b);c={opacity:""+(null!=f?f:c.opacity)};return e.tsx("img",{alt:g,src:m,border:0,width:a.width,height:a.height,class:this.classes(d),
styles:c})};f.prototype._drawImageOnSizeRamp=function(a,c,d){var b=d.x,g=d.y,m=d.width,e=d.height,h=new Image;h.src=c;h.onload=function(){a.drawImage(h,b,g,m,e);URL.revokeObjectURL(c)}};f.prototype._attachSizeRampToNode=function(a){var c=a["data-layer-opacity"];null!=c&&(a.style.opacity=c.toString());var c=a["data-legend-element"].infos,d=c[0],b=c[c.length-1],g=d.symbol,e=b.symbol,f="picture-marker"===g.type;g?-1<g.type.indexOf("3d")?(c=g.symbolLayers&&g.symbolLayers.length)?(c=g.symbolLayers.getItemAt(c-
1).get("resource.primitive"),c="triangle"===c||"cone"===c||"tetrahedron"===c):c=void 0:c="triangle"===g.style:c=void 0;var h;g?-1<g.type.indexOf("3d")?(h=g.symbolLayers&&g.symbolLayers.length)?(h=g.symbolLayers.getItemAt(h-1),h=h.resource&&h.resource.primitive,h="circle"===h||"cross"===h||"kite"===h||"sphere"===h||"cube"===h||"diamond"===h):h=void 0:(h=g.style,h="circle"===h||"diamond"===h||"cross"===h):h=void 0;var l,q;f?(l=g.url,q=e.url):(d.preview&&(d.preview.firstChild.setAttributeNS("http://www.w3.org/2000/xmlns/",
"xmlns","http://www.w3.org/2000/svg"),l=new Blob([d.preview.innerHTML],{type:"image/svg+xml"}),l=URL.createObjectURL(l)),b.preview&&(b.preview.firstChild.setAttributeNS("http://www.w3.org/2000/xmlns/","xmlns","http://www.w3.org/2000/svg"),q=new Blob([b.preview.innerHTML],{type:"image/svg+xml"}),q=URL.createObjectURL(q)));var k=w.pt2px(d.size+d.outlineSize)*u,g=w.pt2px(b.size+b.outlineSize)*u,e=this._hasIndicators?k:k+100*u,f=this._hasIndicators?e+50*u:k,d=document.createElement("canvas");d.width=
e;d.height=f;d.style.width=d.width/u+"px";d.style.height=d.height/u+"px";b=d.getContext("2d");this._hasIndicators?(this._drawImageOnSizeRamp(b,l,{x:0,y:0,width:k,height:k}),this._drawImageOnSizeRamp(b,q,{x:e/2-g/2,y:f-g,width:g,height:g}),b.beginPath(),l=e/2-g/2,q=f-(c?0:h?g/2:g),b.moveTo(0,h?e/2:e),b.lineTo(l,q),l=e/2+g/2,c=f-(c?0:h?g/2:g),b.moveTo(e,h?e/2:e),b.lineTo(l,c)):(this._drawImageOnSizeRamp(b,l,{x:e-k,y:0,width:k,height:k}),this._drawImageOnSizeRamp(b,q,{x:0,y:f/2-g/2,width:g,height:g}),
b.beginPath(),l=e-(h||c?k/2:k),b.moveTo(g-(h||c?g/2:0),f/2-g/2),b.lineTo(l,0),c=e-(h?k/2:k),b.moveTo(g-(h?g/2:0),f/2+g/2),b.lineTo(c,f));b.strokeStyle="#ddd";b.stroke();a.appendChild(d)};f.prototype._renderSizeRamps=function(a,c){var d,b=a.infos,g=b[0].label,b=b[b.length-1].label;return e.tsx("div",{class:this.classes("esri-legend--card__layer-row",(d={},d["esri-legend--card__size-ramp-row"]=this._hasIndicators,d))},e.tsx("div",{class:"esri-legend--card__ramp-label"},this._hasIndicators?g:b),e.tsx("div",
{class:"esri-legend--card__size-ramp-container"},e.tsx("div",{bind:this,"data-layer-opacity":c,"data-legend-element":a,afterCreate:this._attachSizeRampToNode})),e.tsx("div",{class:"esri-legend--card__ramp-label"},this._hasIndicators?b:g))};f.prototype._renderLegendForRamp=function(a,c){var d=a.infos,b="heatmap-ramp"===a.type,g=d.length-1,f=2<g&&!b?25*g:100,p=f+20;a=document.createElement("div");a.style.width=p+"px";null!=c&&(a.style.opacity=c.toString());c=A.createSurface(a,p,25);var h=d.slice(0).reverse();
try{h.forEach(function(a,c){a.offset=b?a.ratio:c/g}),b||c.createPath("M0 12.5 L10 0 L10 25 Z").setFill(h[0].color).setStroke(null),c.createRect({x:10,y:0,width:f,height:25}).setFill({type:"linear",x1:10,y1:0,x2:f+10,y2:0,colors:h}).setStroke(null),b||c.createPath("M"+(f+10)+" 0 L"+p+" 12.5 L"+(f+10)+" 25 Z").setFill(h[h.length-1].color).setStroke(null)}catch(l){c.clear(),c.destroy()}if(!c)return null;c=h.filter(function(a,b){return!!a.label&&0!==b&&b!==h.length-1}).map(function(a){return e.tsx("div",
{class:"esri-legend--card__interval-separators-container"},e.tsx("div",{class:"esri-legend--card__interval-separator"},"|"),e.tsx("div",{class:"esri-legend--card__ramp-label"},a.label))});f=d[d.length-1].label;d=d[0].label;return e.tsx("div",{class:"esri-legend--card__layer-row"},e.tsx("div",{class:"esri-legend--card__ramp-label"},b?v[f]:f),e.tsx("div",{class:"esri-legend--card__symbol-container"},e.tsx("div",{bind:a,afterCreate:t.attachToNode}),c),e.tsx("div",{class:"esri-legend--card__ramp-label"},
b?v[d]:d))};r([e.renderable(),p.property()],f.prototype,"activeLayerInfos",void 0);r([p.property()],f.prototype,"layout",void 0);r([p.property({readOnly:!0})],f.prototype,"type",void 0);r([p.property()],f.prototype,"view",void 0);r([e.accessibleHandler()],f.prototype,"_selectSection",null);return f=r([p.subclass("esri.widgets.Legend.styles.Card")],f)}(p.declared(D))});