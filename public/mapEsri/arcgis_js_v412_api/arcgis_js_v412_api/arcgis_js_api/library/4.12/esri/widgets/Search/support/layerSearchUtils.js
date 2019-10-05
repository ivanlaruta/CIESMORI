// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports dojo/date/locale ../../../intl ../../../core/Error ../../../core/lang ../../../core/Logger ../../../core/promiseUtils ../../../core/unitUtils ./geometryUtils".split(" "),function(U,r,I,J,w,K,L,f,M,B){function C(a,b){var c=a.filter,h=a.searchExtent;b=b&&b.extent;a=a.withinViewEnabled&&b?b:void 0;return c&&c.geometry||h||a}function D(a){return a?a.load().then(f.resolve).catch(f.reject):f.resolve()}function E(a){return a&&!!a.get("capabilities.query.supportsPagination")}function F(a){var b=
"";a&&(a=a.fields)&&a.some(function(a){if("string"===a.type)return b=a.name,!0});return b}function z(a,b){return a&&b?b.every(function(b){return!!a.getField(b)}):!1}function N(a){for(var b=0;b<a.length;b++)if(255<a.charCodeAt(b))return!0;return!1}function O(a,b,c){var h=null;(a=a.codedValues)&&a.some(function(a){var k=a.name,k=c?k:k.toLowerCase();if((c?b:b.toLowerCase())===k)return h=a.code.toString(),!0});return h}function q(a,b){return(b=b&&b.where)?"("+a+") AND ("+b+")":a}function G(a,b,c,h,t){var k=
b.definitionExpression,d="";if(a){var f=P.test(b.url)&&N(a)?"N":"";c&&c.forEach(function(c){var g=b.getField(c);c=((c="function"===typeof b.getFieldDomain&&b.getFieldDomain(c))&&"coded-value"===c.type?O(c,a,t):null)||a||null;if(null!==c){var e=g.type,g=g.name;"string"===e||"date"===e?t?g=q(g+" \x3d "+f+"'"+c+"'",h):(c=c.toUpperCase(),g=q("UPPER("+g+") LIKE "+f+"'%"+c+"%'",h)):"oid"===e||"small-integer"===e||"integer"===e||"single"===e||"double"===e?(c=Number(c),g=isNaN(c)?null:q(g+" \x3d "+c,h)):
g=q(g+" \x3d "+c,h);g&&(d+=d?" OR ("+g+")":"("+g+")")}})}return k?"("+k+") AND ("+d+")":d}function Q(a,b){var c=null;(a=a.codedValues)&&a.length&&a.some(function(a){if(a.code===b)return c=a.name,!0});return c}function H(a,b,c){var h=a.layer,f=a.attributes,k="function"===typeof h.getFieldDomain&&h.getFieldDomain(c);return b?J.substitute(b,f):c&&a.hasOwnProperty("attributes")&&f.hasOwnProperty(c)?(a=f[c],c=h.getField(c),k&&"coded-value"===k.type?Q(k,a):c&&"date"===c.type?I.format(new Date(a)):"number"===
typeof a?a.toString():"string"!==typeof a?"":a.trim()):""}function R(a,b,c,f){return a.features.map(function(a){var k=a.attributes[a.layer.objectIdField];return{text:H(a,b.suggestionTemplate,f),key:k,sourceIndex:c}})}function S(a,b,c,f,t,k,d){return a.features.map(function(a){var h=a.clone(),g=a.layer,g=(g=g&&g.objectIdField)&&a.attributes[g];a=H(a,c.searchTemplate,t);var e=B.createExtentFromGeometry(h.geometry,b,k);return{extent:d?B.scaleExtent(K.clone(e),b,d):e,feature:h,key:g,name:a,sourceIndex:f}})}
Object.defineProperty(r,"__esModule",{value:!0});var P=/https?:\/\/services.*\.arcgis\.com/i,T=/(?:\{([^}]+)\})/g,y=L.getLogger("esri.widgets.Search.support.layerSearchUtils");r.getResults=function(a){var b=a.exactMatch,c=void 0===b?!1:b,h=a.location,t=a.maxResults,k=a.spatialReference,d=a.source,q=a.sourceIndex,x=a.suggestResult,g=a.view,e=d.layer,p=d.filter,l=d.zoomScale,m=g&&g.scale,u=C(d,g);return D(e).then(function(){return f.create(function(a,b){var c=e.popupTemplate;if(c)return c.getRequiredFields(e.fields).then(function(b){return a(b)},
b);a(null)})}).then(function(a){var b=e.objectIdField,v=e.returnZ,A=d.displayField||d.layer.displayField||F(d.layer);if(!e.getField(A))return y.error("invalid-field: displayField is invalid."),f.reject(new w("getResults():invalid-field","displayField is invalid."));a=a&&a.length?a:[A];var n=(a=d.outFields||a)&&-1!==a.indexOf("*");-1!==a.indexOf(b)||n||a.push(b);if(!n&&!z(e,a))return y.error("invalid-field: outField is invalid."),f.reject(new w("getResults():invalid-field","outField is invalid."));
b=e.createQuery();(n=d.searchQueryParams)&&b.set(n);k&&(b.outSpatialReference=k,n=1/M.getMetersPerUnitForSR(k))&&(b.maxAllowableOffset=n);n=!!e.get("capabilities.data.supportsZ");b.returnZ=n&&!1!==v;b.returnGeometry=!0;a&&(b.outFields=a);if(h)b.geometry=h;else if(x.key)b.objectIds=[parseInt(x.key,10)];else{v=d.searchFields||[A];if(!z(e,v))return y.error("invalid-field: search field is invalid."),f.reject(new w("getResults():invalid-field","search field is invalid."));E(e)&&(b.num=t);u&&(b.geometry=
u);a=x.text.trim();if(!a)return f.resolve();var n=d.prefix,r=d.suffix;a=(""+(void 0===n?"":n)+a+(void 0===r?"":r)).replace(/\'/g,"''");v=G(a,e,v,p,c);if(!v)return f.resolve();b.where=v}return e.queryFeatures(b).then(function(a){return S(a,g,d,q,A,m,l)})})};r.getSuggestions=function(a){var b=a.source,c=a.spatialReference,h=a.suggestTerm,t=a.maxSuggestions,k=a.sourceIndex,d=b.layer,r=b.filter,q=C(b,a.view);return D(d).then(function(){if(!E(d))return f.resolve();var a=b.displayField||b.layer.displayField||
F(b.layer),e=b.searchFields||[a],p=[];b.suggestionTemplate?b.suggestionTemplate.replace(T,function(a,b){p.push(b);return a}):p.push(a);var l=p&&-1!==p.indexOf("*");-1!==p.indexOf(d.objectIdField)||l||p.push(d.objectIdField);var m=!!d.getField(a),l=l||z(d,p),u=z(d,e);if(!m)return y.error("invalid-field: displayField is invalid."),f.reject(new w("getSuggestions():invalid-field","displayField is invalid."));if(!l)return y.error("invalid-field: outField is invalid."),f.reject(new w("getSuggestions():invalid-field",
"outField is invalid."));if(!u)return y.error("invalid-field: search field is invalid."),f.reject(new w("getSuggestions():invalid-field","search field is invalid."));m=d.createQuery();(l=b.suggestQueryParams)&&m.set(l);m.outSpatialReference=c;m.returnGeometry=!1;m.num=t;m.outFields=p;q&&(m.geometry=q);l=h.trim();if(!l)return f.resolve();var u=b.prefix,x=b.suffix,l=(""+(void 0===u?"":u)+l+(void 0===x?"":x)).replace(/\'/g,"''"),e=G(l,d,e,r,!1);if(!e)return f.resolve();m.where=e;return d.queryFeatures(m).then(function(c){return R(c,
b,k,a)})})}});