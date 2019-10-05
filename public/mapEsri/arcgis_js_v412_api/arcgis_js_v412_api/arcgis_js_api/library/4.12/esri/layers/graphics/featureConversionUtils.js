// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../core/Error ../../core/Logger ../../geometry/support/jsonUtils ./OptimizedFeature ./OptimizedFeatureSet ./OptimizedGeometry".split(" "),function(ha,m,x,ca,F,y,da,q){function t(a,b){return a?b?4:3:b?3:2}function C(a,b){return Math.round((b-a.translate[0])/a.scale[0])}function D(a,b){return Math.round((a.translate[1]-b)/a.scale[1])}function J(a,b){return b*a.scale[0]+a.translate[0]}function K(a,b){return a.translate[1]-b*a.scale[1]}function G(a){a=a.coords;return{x:a[0],
y:a[1]}}function aa(a,b){a.coords[0]=b.x;a.coords[1]=b.y;return a}function L(a){a=a.coords;return{x:a[0],y:a[1],z:a[2]}}function ea(a,b){a.coords[0]=b.x;a.coords[1]=b.y;a.coords[2]=b.z;return a}function M(a){a=a.coords;return{x:a[0],y:a[1],m:a[2]}}function fa(a,b){a.coords[0]=b.x;a.coords[1]=b.y;a.coords[2]=b.m;return a}function N(a){a=a.coords;return{x:a[0],y:a[1],z:a[2],m:a[3]}}function ga(a,b){a.coords[0]=b.x;a.coords[1]=b.y;a.coords[2]=b.z;a.coords[3]=b.m;return a}function O(a,b){return a&&b?
ga:a?ea:b?fa:aa}function P(a,b,c){if(!a)return null;for(var d=t(b,c),g=[],f=0;f<a.coords.length;f+=d){for(var e=[],h=0;h<d;h++)e.push(a.coords[f+h]);g.push(e)}return b?c?{points:g,hasZ:b,hasM:c}:{points:g,hasZ:b}:c?{points:g,hasM:c}:{points:g}}function Q(a,b,c){void 0===c&&(c=t(b.hasZ,b.hasM));a.lengths[0]=b.points.length;var d=a.coords,g=0,f=0;for(b=b.points;f<b.length;f++)for(var e=b[f],h=0;h<c;h++)d[g++]=e[h];return a}function R(a,b,c){if(!a)return null;var d=t(b,c),g=a.coords,f=[],e=0,h=0;for(a=
a.lengths;h<a.length;h++){for(var k=a[h],l=[],p=0;p<k;p++){for(var n=[],r=0;r<d;r++)n.push(g[e++]);l.push(n)}f.push(l)}return b?c?{paths:f,hasZ:b,hasM:c}:{paths:f,hasZ:b}:c?{paths:f,hasM:c}:{paths:f}}function ba(a,b,c){void 0===c&&(c=t(b.hasZ,b.hasM));var d=a.lengths,g=a.coords,f=0,e=0;for(b=b.paths;e<b.length;e++){for(var h=b[e],k=0,l=h;k<l.length;k++)for(var p=l[k],n=0;n<c;n++)g[f++]=p[n];d.push(h.length)}return a}function S(a,b,c){if(!a)return null;var d=t(b,c),g=a.coords,f=[],e=0,h=0;for(a=a.lengths;h<
a.length;h++){for(var k=a[h],l=[],p=0;p<k;p++){for(var n=[],r=0;r<d;r++)n.push(g[e++]);l.push(n)}f.push(l)}return b?c?{rings:f,hasZ:b,hasM:c}:{rings:f,hasZ:b}:c?{rings:f,hasM:c}:{rings:f}}function T(a,b,c,d){void 0===c&&(c=b.hasZ);void 0===d&&(d=b.hasM);c=t(c,d);d=a.lengths;var g=a.coords,f=0,e=d.length=g.length=0;for(b=b.rings;e<b.length;e++){for(var h=b[e],k=0,l=h;k<l.length;k++)for(var p=l[k],n=0;n<c;n++)g[f++]=p[n];d.push(h.length)}return a}function U(a,b,c,d,g,f){a.length=0;if(!c){for(d=0;d<
b.length;d++)g=b[d],a.push(new y.default(null,g.attributes,null,g.attributes[f]));return a}switch(c){case "esriGeometryPoint":d=O(d,g);for(g=0;g<b.length;g++){var e=b[g];c=e.geometry;var e=e.attributes,h=void 0;c&&(h=d(new q.default,c));a.push(new y.default(h,e,null,e[f]))}break;case "esriGeometryMultipoint":d=t(d,g);for(g=0;g<b.length;g++)e=b[g],c=e.geometry,e=e.attributes,h=void 0,c&&(h=Q(new q.default,c,d)),a.push(new y.default(h,e,null,e[f]));break;case "esriGeometryPolyline":d=t(d,g);for(g=0;g<
b.length;g++)e=b[g],c=e.geometry,e=e.attributes,h=void 0,c&&(h=ba(new q.default,c,d)),a.push(new y.default(h,e,null,e[f]));break;case "esriGeometryPolygon":for(c=0;c<b.length;c++){var k=b[c],e=k.geometry,h=k.centroid,k=k.attributes,l=void 0;e&&(l=T(new q.default,e,d,g));h?a.push(new y.default(l,k,aa(new q.default,h),k[f])):a.push(new y.default(l,k,null,k[f]))}break;default:A.error("convertToFeatureSet:unknown-geometry",new x("Unable to parse unknown geometry type '"+c+"'")),a.length=0}return a}function V(a,
b,c,d,g){a.length=0;switch(c){case "esriGeometryPoint":c=G;d&&g?c=N:d?c=L:g&&(c=M);for(d=0;d<b.length;d++){var f=b[d];g=f.geometry;f=f.attributes;g=g?c(g):null;a.push({attributes:f,geometry:g})}break;case "esriGeometryMultipoint":for(c=0;c<b.length;c++){var e=b[c],f=e.geometry,e=e.attributes,h=void 0;f&&(h=P(f,d,g));a.push({attributes:e,geometry:h})}break;case "esriGeometryPolyline":for(c=0;c<b.length;c++)e=b[c],f=e.geometry,e=e.attributes,h=void 0,f&&(h=R(f,d,g)),a.push({attributes:e,geometry:h});
break;case "esriGeometryPolygon":for(c=0;c<b.length;c++){var h=b[c],e=h.geometry,f=h.attributes,k=h.centroid,h=void 0;e&&(h=S(e,d,g));k?(e=G(k),a.push({attributes:f,centroid:e,geometry:h})):a.push({attributes:f,geometry:h})}break;default:A.error("convertToFeatureSet:unknown-geometry",new x("Unable to parse unknown geometry type '"+c+"'"))}return a}function W(a,b,c,d,g,f){a.lengths.length&&(a.lengths.length=0);a.coords.length&&(a.coords.length=0);if(!b||!b.coords.length)return null;g=X[g];var e=b.coords;
b=b.lengths;var h=t(c,d);c=c?d?H:B:d?B:I;if(!b.length)return c(a.coords,e,0,0,C(f,e[0]),D(f,e[1])),a.lengths.length&&(a.lengths.length=0),a.coords.length=h,a;for(var k,l,p,n=0,r,m=0,u=0;u<b.length;u++){var v=b[u];if(!(v<g)){var z=0;r=m;l=d=C(f,e[n]);p=k=D(f,e[n+1]);c(a.coords,e,r,n,l,p);z++;n+=h;r+=h;for(var q=1;q<v;q++,n+=h)if(l=C(f,e[n]),p=D(f,e[n+1]),l!==d||p!==k)c(a.coords,e,r,n,l-d,p-k),r+=h,z++,d=l,k=p;z>=g&&(a.lengths.push(z),m=r)}}a.coords.length=m;return a.coords.length?a:null}function Y(a,
b,c,d,g,f,e){for(var h=e-c,k=0,l=0,p,n=f+c;n<e-c;n+=c){p=b[n];var r=b[n+1],m=b[f],u=b[f+1],v=b[h],t=b[h+1];m===v?p=Math.abs(p-m):(v=(t-u)/(v-m),p=Math.abs(v*p-r+(u-v*m))/Math.sqrt(v*v+1));p>k&&(l=n,k=p)}k>d?(Y(a,b,c,d,g,f,l+c),Y(a,b,c,d,g,l,e)):(g(a,b,a.length,f,b[f],b[f+1]),g(a,b,a.length,h,b[h],b[h+1]))}function Z(a,b,c,d,g){var f=b.coords,e=b.lengths,h=c?d?H:B:d?B:I;c=t(c,d);if(!f.length)return a!==b&&(a.lengths.length=0,a.coords.length=0),a;if(!e.length)return h(a.coords,f,0,0,J(g,f[0]),K(g,f[1])),
a!==b&&(a.lengths.length=0,a.coords.length=c),a;var k=g.scale;d=k[0];for(var k=k[1],l=0,p=0;p<e.length;p++){var n=e[p];a.lengths[p]=n;var m=J(g,f[l]),q=K(g,f[l+1]);h(a.coords,f,l,l,m,q);for(var l=l+c,u=1;u<n;u++,l+=c)m+=f[l]*d,q-=f[l+1]*k,h(a.coords,f,l,l,m,q)}a!==b&&(a.lengths.length=e.length,a.coords.length=f.length);return a}Object.defineProperty(m,"__esModule",{value:!0});var A=ca.getLogger("esri.tasks.support.optimizedFeatureSet"),X={esriGeometryPoint:0,esriGeometryPolyline:2,esriGeometryPolygon:3,
esriGeometryMultipoint:0},I=function(a,b,c,d,g,f){a[c]=g;a[c+1]=f},B=function(a,b,c,d,g,f){a[c]=g;a[c+1]=f;a[c+2]=b[d+2]},H=function(a,b,c,d,g,f){a[c]=g;a[c+1]=f;a[c+2]=b[d+2];a[c+3]=b[d+3]};m.quantizeX=C;m.quantizeY=D;m.hydrateX=J;m.hydrateY=K;m.convertToPoint=function(a,b,c){return a?b?c?N(a):L(a):c?M(a):G(a):null};m.convertFromPoint=function(a,b,c){void 0===c&&(c=O(null!=b.z,null!=b.m));return c(a,b)};m.convertToMultipoint=P;m.convertFromMultipoint=Q;m.convertToPolyline=R;m.convertToPolygon=S;
m.convertFromPolygon=T;var w=[],E=[];m.convertFromFeature=function(a,b,c,d,g){w[0]=a;a=U(E,w,b,c,d,g)[0];w.length=E.length=0;return a};m.convertFromFeatures=U;m.convertToFeature=function(a,b,c,d){E[0]=a;V(w,E,b,c,d);a=w[0];w.length=E.length=0;return a};m.convertFromGeometry=function(a,b,c){if(!a)return null;var d=new q.default;"hasZ"in a&&null==b&&(b=a.hasZ);"hasM"in a&&null==c&&(c=a.hasM);if(F.isPoint(a))return O(null!=b?b:null!=a.z,null!=c?c:null!=a.m)(d,a);if(F.isPolygon(a))return T(d,a,b,c);if(F.isPolyline(a))return ba(d,
a,t(b,c));if(F.isMultipoint(a))return Q(d,a,t(b,c));A.error("convertFromGeometry:unknown-geometry",new x("Unable to parse unknown geometry type '"+a+"'"))};m.convertToGeometry=function(a,b,c,d){a=a&&("coords"in a?a:a.geometry);if(!a)return null;switch(b){case "esriGeometryPoint":return b=G,c&&d?b=N:c?b=L:d&&(b=M),b(a);case "esriGeometryMultipoint":return P(a,c,d);case "esriGeometryPolyline":return R(a,c,d);case "esriGeometryPolygon":return S(a,c,d);default:A.error("convertToGeometry:unknown-geometry",
new x("Unable to parse unknown geometry type '"+b+"'"))}};m.convertToFeatures=V;m.convertToFeatureSet=function(a){var b=a.objectIdFieldName,c=a.spatialReference,d=a.transform,g=a.fields,f=a.hasM,e=a.hasZ,h=a.geometryType,k=a.exceededTransferLimit;a={features:V([],a.features,h,e,f),fields:g,geometryType:h,objectIdFieldName:b,spatialReference:c};d&&(a.transform=d);k&&(a.exceededTransferLimit=k);f&&(a.hasM=f);e&&(a.hasZ=e);return a};m.convertFromFeatureSet=function(a,b){var c=new da.default,d=a.hasM,
g=a.hasZ,f=a.features,e=a.objectIdFieldName,h=a.spatialReference,k=a.geometryType,l=a.exceededTransferLimit,p=a.transform;c.fields=a.fields;c.geometryType=k;c.objectIdFieldName=e||b;c.spatialReference=h;if(!c.objectIdFieldName)return A.error(new x("optimized-features:invalid-objectIdFieldName","objectIdFieldName is missing")),c;f&&U(c.features,f,k,g,d,c.objectIdFieldName);l&&(c.exceededTransferLimit=l);d&&(c.hasM=d);g&&(c.hasZ=g);p&&(c.transform=p);return c};m.hydrateOptimizedFeatureSet=function(a){var b=
a.transform,c=a.hasM,d=a.hasZ;if(!b)return a;for(var g=0,f=a.features;g<f.length;g++){var e=f[g];e.geometry&&Z(e.geometry,e.geometry,c,d,b);e.centroid&&Z(e.centroid,e.centroid,c,d,b)}a.transform=null;return a};m.quantizeOptimizedFeatureSet=function(a,b){var c=b.geometryType,d=b.features,g=b.hasM,f=b.hasZ;if(!a)return b;for(var e=0;e<d.length;e++){var h=d[e],k=new y.default(new q.default,h.attributes);W(k.geometry,h.geometry,g,f,c,a);h.centroid&&(k.centroid=new q.default,W(k.centroid,h.centroid,g,
f,"esriGeometryPoint",a));d[e]=k}b.transform=a;return b};m.quantizeOptimizedGeometry=W;m.quantizeOptimizedGeometryRemoveCollinear=function(a,b,c,d,g,f){a.lengths.length&&(a.lengths.length=0);a.coords.length&&(a.coords.length=0);if(!b||!b.coords.length)return null;g=X[g];var e=b.coords;b=b.lengths;var h=t(c,d);c=c?d?H:B:d?B:I;if(!b.length)return c(a.coords,e,0,0,C(f,e[0]),D(f,e[1])),a.lengths.length&&(a.lengths.length=0),a.coords.length=h,a;for(var k,l,p,n=0,m,q=0,u=0;u<b.length;u++){var v=b[u];if(!(v<
g)){var z=0;m=q;d=k=C(f,e[n]);p=l=D(f,e[n+1]);c(a.coords,e,m,n,d,p);z++;for(var n=n+h,y=!1,w=0,x=0,A=1;A<v;A++,n+=h)if(d=C(f,e[n]),p=D(f,e[n+1]),d!==k||p!==l)k=d-k,l=p-l,y&&(0===w&&0===k||0===x&&0===l)?(w+=k,x+=l):(y=!0,w=k,x=l,m+=h,z++),c(a.coords,e,m,n,w,x),k=d,l=p;y&&(m+=h,c(a.coords,e,m,n,w,x));z>=g&&(a.lengths.push(z),q=m)}}a.coords.length!==q&&(a.coords.length=q);return a.coords.length?a:null};m.generalizeOptimizedGeometry=function(a,b,c,d,g,f){a.lengths.length&&(a.lengths.length=0);a.coords.length&&
(a.coords.length=0);if(!b||!b.coords.length)return null;g=X[g];var e=b.coords;b=b.lengths;var h=t(c,d);c=c?d?H:B:d?B:I;if(!b.length)return c(a.coords,e,0,0,e[0],e[1]),a.lengths.length&&(a.lengths.length=0),a.coords.length=h,a;for(var k=d=0;k<b.length;k++){var l=b[k];if(!(l<g)){var m=a.coords.length/h;Y(a.coords,e,h,f,c,d,d+l*h);var n=a.coords.length/h-m;n>=g?a.lengths.push(n):a.coords.length=m*h}d+=l*h}return a.coords.length?a:null};m.getBoundsOptimizedGeometry=function(a,b,c,d){c=t(c,d);var g=d=
Number.POSITIVE_INFINITY,f=Number.NEGATIVE_INFINITY,e=Number.NEGATIVE_INFINITY;if(b&&b.coords){b=b.coords;for(var h=0;h<b.length;h+=c){var k=b[h],l=b[h+1];d=Math.min(d,k);f=Math.max(f,k);g=Math.min(g,l);e=Math.max(e,l)}}a[0]=d;a[1]=g;a[2]=f;a[3]=e;return a};m.getQuantizedBoundsOptimizedGeometry=function(a,b,c,d){c=t(c,d);d=b.coords;var g=Number.POSITIVE_INFINITY,f=Number.POSITIVE_INFINITY,e=Number.NEGATIVE_INFINITY,h=Number.NEGATIVE_INFINITY,k=0,l=0;for(b=b.lengths;l<b.length;l++)for(var m=b[l],n=
d[k],r=d[k+1],g=Math.min(n,g),f=Math.min(r,f),e=Math.max(n,e),h=Math.max(r,h),k=k+c,q=1;q<m;q++,k+=c){var u=d[k],v=d[k+1],n=n+u,r=r+v;0>u&&(g=Math.min(g,n));0<u&&(e=Math.max(e,n));0>v?f=Math.min(f,r):0<v&&(h=Math.max(h,r))}a[0]=g;a[1]=f;a[2]=e;a[3]=h;return a};m.hydrateOptimizedGeometry=Z});