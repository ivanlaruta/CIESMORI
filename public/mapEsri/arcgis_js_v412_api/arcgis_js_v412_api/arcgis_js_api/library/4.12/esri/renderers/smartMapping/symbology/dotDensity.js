// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../../core/tsSupport/extendsHelper ../../../core/tsSupport/assignHelper ../../../Color ../creators/support/utils ./support/colors ./support/SymbologyBase".split(" "),function(d,q,g,h,c,k,l,m){function f(a,b,e){if(a=l[a])return b={name:a.name,tags:a.tags,colors:a[e]||k.createColors(a.stops,e),opacity:b.fillOpacity,outline:b.outline},n(b)}function n(a){return{name:a.name,tags:a.tags.slice(),colors:a.colors.map(function(a){return new c(a)}),outline:{color:new c(a.outline.color),
width:a.outline.width},opacity:a.opacity}}d="vibrant-rainbow cat-dark predominant-v2 predominant-v1 predominance-race desert-blooms tropical-bliss under-the-sea ocean-bay cat-light predominant-v4 predominance-money predominant-v3 predominance-race-ethnic pastel-chalk predominance-rainbow predominance-sequence".split(" ");var p={default:{name:"default",label:"Default",description:"Default theme for visualizing features using the density of randomly placed dots.",schemes:{default:{light:{primary:"predominant-v5",
secondary:d,common:{outline:{color:[153,153,153,.25],width:"1px"},fillOpacity:.8}},dark:{primary:"predominant-v5",secondary:d,common:{outline:{color:[153,153,153,.25],width:"1px"},fillOpacity:.8}}}}}};return new (function(a){function b(){return a.call(this,{themeDictionary:p})||this}g(b,a);b.prototype.getSchemes=function(e){var a=this.getRawSchemes({theme:"default",basemap:e.basemap});if(a){var b=this.getBasemapId(e.basemap,"default"),c=a.common,d=e.numColors;return{primaryScheme:f(a.primary,c,d),
secondarySchemes:a.secondary.map(function(a){return f(a,c,d)}).filter(Boolean),basemapId:b}}};b.prototype.getSchemeByName=function(a){return this.filterSchemesByName(a)};b.prototype.getSchemesByTag=function(a){return this.filterSchemesByTag(a)};b.prototype.cloneScheme=function(a){if(a)return a=h({},a),a.colors&&(a.colors=a.colors.map(function(a){return new c(a)})),a.outline&&(a.outline={color:a.outline.color&&new c(a.outline.color),width:a.outline.width}),a};return b}(m))});