// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define(["require","exports","./shared","./sqlUtils","../../../core/promiseUtils"],function(w,e,m,n,k){function l(c){for(var a=0,b=0;b<c.length;b++)a+=c[b];return a/c.length}function p(c){for(var a=l(c),b=0,d=0;d<c.length;d++)b+=Math.pow(a-c[d],2);return b/c.length}function q(c){for(var a=l(c),b=0,d=0;d<c.length;d++)b+=Math.pow(a-c[d],2);return b/(c.length-1)}function r(c){for(var a=0,b=0;b<c.length;b++)a+=c[b];return a}function h(c,a,b,d){void 0===d&&(d=!1);try{var g=c.iterator(b);return t(g,[],a,
d)}catch(f){return k.reject(f)}}function t(c,a,b,d){return c.next().then(function(g){return null!==g?(g=b.calculateValue(g),null===g?!1===d&&(a[a.length]=g):a[a.length]=g,t(c,a,b,d)):a})}function u(c,a,b,d,g){return c.next().then(function(f){return null!==f?(f=d.calculateValue(f),void 0!==f&&null!==f&&void 0===a[f]&&(b.push(f),a[f]=1),b.length>=g&&-1!==g?b:u(c,a,b,d,g)):b})}Object.defineProperty(e,"__esModule",{value:!0});e.decodeStatType=function(c){switch(c.toLowerCase()){case "distinct":return"distinct";
case "avg":case "mean":return"avg";case "min":return"min";case "sum":return"sum";case "max":return"max";case "stdev":case "stddev":return"stddev";case "var":case "variance":return"var";case "count":return"count"}return""};e.calculateStat=function(c,a,b){void 0===b&&(b=1E3);switch(c.toLowerCase()){case "distinct":a:{c=b;b=[];for(var d={},g=[],f=0;f<a.length;f++){if(void 0!==a[f]&&null!==a[f]){var e=a[f];if(m.isNumber(e)||m.isString(e))void 0===d[e]&&(b.push(e),d[e]=1);else{for(var h=!1,k=0;k<g.length;k++)!0===
m.equalityTest(g[k],e)&&(h=!0);!1===h&&(g.push(e),b.push(e))}}if(b.length>=c&&-1!==c){a=b;break a}}a=b}return a;case "avg":case "mean":return l(a);case "min":return Math.min.apply(Math,a);case "sum":return r(a);case "max":return Math.max.apply(Math,a);case "stdev":case "stddev":return Math.sqrt(p(a));case "var":case "variance":return p(a);case "count":return a.length}return 0};e.min=function(c,a,b){return h(c,a,b,!0).then(function(a){return 0===a.length?null:Math.min.apply(Math,a)})};e.max=function(c,
a,b){return h(c,a,b,!0).then(function(a){return 0===a.length?null:Math.max.apply(Math,a)})};e.mean=function(c,a,b){var d="";!1===n.isSingleField(a)&&(d=n.predictType(a,c.fields,null));return h(c,a,b,!0).then(function(a){if(0===a.length)return null;a=l(a);if(null===a)return a;"integer"===d&&(a=+a,a=isFinite(a)?a-a%1||(0>a?-0:0===a?a:0):a);return a})};e.variance=function(c,a,b){return h(c,a,b,!0).then(function(a){return 0===a.length?null:q(a)})};e.stdev=function(c,a,b){return h(c,a,b,!0).then(function(a){return 0===
a.length?null:Math.sqrt(q(a))})};e.sum=function(c,a,b){return h(c,a,b,!0).then(function(a){return 0===a.length?null:r(a)})};e.count=function(c,a){try{return c.iterator(a).count()}catch(b){return k.reject(b)}};e.distinct=function(c,a,b,d){void 0===b&&(b=1E3);void 0===d&&(d=null);var e;try{var f=c.iterator(d);e=u(f,{},[],a,b)}catch(v){e=k.reject(v)}return e}});