// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define(["require","exports","../request"],function(h,d,f){Object.defineProperty(d,"__esModule",{value:!0});d.serviceRequest=function(a,b,d,g,c){void 0===c&&(c=null);if(null!==c)return c.getToken().then(function(c){a=a+="?token\x3d"+c;if("get"===g.toLowerCase())return f(a,{responseType:"json",query:b});if(b)for(var e in b)a=-1<a.indexOf("?")?a+"\x26":a+"?",a+=encodeURIComponent(e)+"\x3d"+encodeURIComponent(b[e]);return f(a,{method:"post",query:d,responseType:"json"})});if("get"===g.toLowerCase())return f(a,
{responseType:"json",query:b});if(b)for(var e in b)a=-1<a.indexOf("?")?a+"\x26":a+"?",a+=encodeURIComponent(e)+"\x3d"+encodeURIComponent(b[e]);return f(a,{method:"post",responseType:"json",query:d})}});