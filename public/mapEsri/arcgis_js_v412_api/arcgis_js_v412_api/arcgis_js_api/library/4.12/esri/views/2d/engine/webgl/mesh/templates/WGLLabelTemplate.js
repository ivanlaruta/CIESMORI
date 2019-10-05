// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../../../../../core/tsSupport/extendsHelper ../../../../../../core/Error ../../../../../../core/Logger ../../../../../../core/mathUtils ../../../../../../core/libs/gl-matrix-2/mat2d ../../../../../../core/libs/gl-matrix-2/mat2df32 ../../../../../../core/libs/gl-matrix-2/vec2 ../../../../../../core/libs/gl-matrix-2/vec2f32 ../../../vectorTiles/GeometryUtils ../../color ../../definitions ../../enums ../../number ../../TextShaping ../../collisions/Metric ../../materialKey/MaterialKey ./GlyphGroup ./util ./WGLTextTemplate ../../../../support/mathUtils".split(" "),
function(M,B,T,U,V,N,D,W,O,X,Y,P,u,Z,G,H,Q,K,E,C,aa,ba){function ca(u){switch(u){case "above-left":return[-1,-1];case "above-center":case "above-along":return[0,-1];case "above-right":return[1,-1];case "center-left":return[-1,0];case "center-center":case "center-along":return[0,0];case "center-right":return[1,0];case "below-left":return[-1,1];case "below-center":case "below-along":return[0,1];case "below-right":return[1,1];case "always-horizontal":return[0,0];default:L("Found invalid placement type "+
u)}}Object.defineProperty(B,"__esModule",{value:!0});var da=V.getLogger("esri.views.2d.engine.webgl.WGLLabelTemplate"),R=X.vec2f32.create(),ea=W.mat2df32.create(),S={xOffset:0,yOffset:0,width:0,height:0},L=function(u,h){void 0===h&&(h="mapview-labeling");return da.error(U(h,u))};B.isMapAligned=function(u){switch(u){case "above-along":case "below-along":case "center-along":return 1;default:return 0}};M=function(B){function h(c,b,a,f){a=B.call(this,c,a.font.size,a.haloSize||0,a.color&&P.premultiplyAlphaRGBA(a.color)||
0,a.haloColor&&P.premultiplyAlphaRGBA(a.haloColor)||0,a.horizontalAlignment,a.verticalAlignment,a.font.decoration,a.angle||0,a.xoffset,a.yoffset,a.id)||this;a._refTemplate=S;a.geometryType=Z.WGLGeometryType.LABEL;var k=b.symbol,d;d=!!b.minScale&&f.scaleToZoom(b.minScale)||0;d=N.clamp(d,0,25.5);f=!!b.maxScale&&f.scaleToZoom(b.maxScale)||255;f=N.clamp(f,0,25.5);var t=ca(b.labelPlacement),r=t[0],t=t[1];a._justify=(-1*r+1)/2;a._xAlignD=r;a._yAlignD=t;a._xPlacementD=r;a._yPlacementD=t;a._minZoom=d;a._maxZoom=
f;c=K.LabelMaterialKey.load(K.createMaterialKey(a.geometryType,c,!1,b));c.sdf=!0;a._materialKey=c.data;c=k.font.decoration.toLowerCase();"underline"===c?a._decorationTop=6:"line-through"===c&&(a._decorationTop=-5);return a}T(h,B);h.fromLabelClass=function(c,b,a){return new h(c,b,b.symbol,a)};h.prototype.bindTextInfo=function(c,b,a){c=this._computeShaping(c,this._justify).getShaping(b,a);isNaN(this._decorationTop)||H.TextShaping.addDecoration(c,this._decorationTop);this._shapedGlyphs=c;this._shapedBox=
H.TextShaping.getBox(c)};h.prototype._computeShaping=function(c,b){return new H.TextShaping([c],u.TEXT_MAX_WIDTH,u.TEXT_LINE_HEIGHT,u.TEXT_SPACING,[0,0],.5,.5,b)};Object.defineProperty(h.prototype,"bounds",{get:function(){return this._bounds},enumerable:!0,configurable:!0});h.prototype.bindReferenceTemplate=function(c){this._refTemplate=c||S};h.prototype._placeGlyphs=function(c,b,a,f){var k=this._size,d=this._haloSize,t=this._shapedBox,r=this._shapedGlyphs,y=this._computeGlyphTransform(t);if("esriGeometryPolyline"!==
c)for(var n=0;n<a.length;n++)for(var q=a[n],m=0,e=r;m<e.length;m++){var g=e[m];q.place(g,c,b,y,this._materialKey,k,d,t,f,this._minZoom,this._maxZoom)}else for(n=0;n<a.length;n++)for(var q=a[n],m=g=q.order,e=m-(m-1)/2-1,p=e-(e-1)/2-1,l=p-(p-1)/2-1,g=-1===g?0:m%2?e%2?p%2?l%2?0:f-3.1:f-2.1:f-1.1:f-.1,m=Math.max(f+ba.log2((this._shapedBox.width*this._scale+48)/q.pathLen),Math.max(g,this._minZoom)),e=0,p=r;e<p.length;e++)g=p[e],q.place(g,c,b,y,this._materialKey,k,d,t,f,m,this._maxZoom)};h.prototype.writeMesh=
function(c,b,a,f,k,d,t){var r=this,y=this._computeAnchors(a,k),n=G.i8888to32(0,0,0,this._bitset);if(y.length&&this._shapedGlyphs.length){this._placeGlyphs(a,k,y,d);var q=K.LabelMaterialKey.load(this._materialKey);if("esriGeometryPolyline"!==a){a=y[0];k=this._computeGlyphTransform(this._shapedBox);k=this._createBounds(this._shapedBox,k);d=a.glyphs.get(0);var m=d[0],e=m.anchorX,g=m.anchorY,p=Math.floor(10*m.minZoom),m=Math.floor(10*m.maxZoom),l=c.length;d.forEach(function(a){a.minZoom=25.5;a.maxZoom=
25.5});l=new Q.default(f,{from:l,count:c.length-l},e,g,p);e=Math.floor(e/u.COLLISION_BUCKET_SIZE);g=Math.floor(g/u.COLLISION_BUCKET_SIZE);e>=u.COLLISION_TILE_BOX_SIZE||g>=u.COLLISION_TILE_BOX_SIZE||0>e||0>g||(this._writeVertices(c,b,f,d,q,n,p,m),d=Math.max(this._refTemplate.height,this._refTemplate.width),q.vvSizeFieldStops||q.vvSizeMinMaxValue||q.vvSizeScaleStops||q.vvSizeUnitValue?l.setVV(d,this._xPlacementD,this._yPlacementD):(l.offsetX=(d/2+u.COLLISION_PLACEMENT_PADDING)*this._xPlacementD,l.offsetY=
(d/2+u.COLLISION_PLACEMENT_PADDING)*this._yPlacementD),l.bounds=k,t.push(l),a.clear())}else{a=function(a){var d=y[a],e=d.x,k=d.y;a=c.length;var l=new Q.default(f,{from:a,count:-1},e,k,25.5);d.glyphs.forEach(function(a){for(var m=0;m<a.length;m++){var g=a[m];g.minZoom=Math.max(d.minZoom,g.minZoom);if(g.bounds){var p=g.anchorY-k;g.bounds.center[0]+=g.anchorX-e;g.bounds.center[1]+=p;l.add(g.bounds)}}l.bounds&&r._writeHalos(c,b,f,a,q,n)});d.glyphs.forEach(function(a){l.bounds&&r._writeText(c,b,f,a,q,
n)});l.range.count=c.length-a;l.bounds&&t.push(l);d.clear()};for(k=0;k<y.length;k++)a(k);this._computedGlyphs=[]}}};h.prototype._outsideTile=function(c,b){return 0>c||512<=c||0>b||512<=b};h.prototype._smoothVertices=function(c,b){if(!(0>=b)){var a=c.length;if(!(3>a)){var f=[],k=0;f.push(0);for(var d=1;d<a;d++)k+=C.dist(c[d],c[d-1]),f.push(k);b=Math.min(b,.2*k);k=[];k.push(c[0][0]);k.push(c[0][1]);var t=c[a-1][0],r=c[a-1][1],d=C.sub([0,0],c[0],c[1]);C.normalize(d);c[0][0]+=b*d[0];c[0][1]+=b*d[1];C.sub(d,
c[a-1],c[a-2]);C.normalize(d);c[a-1][0]+=b*d[0];c[a-1][1]+=b*d[1];for(d=1;d<a;d++)f[d]+=b;f[a-1]+=b;for(var y=.5*b,d=1;d<a-1;d++){for(var n=0,q=0,m=0,e=d-1;0<=e&&!(f[e+1]<f[d]-y);e--){var g=y+f[e+1]-f[d],p=f[e+1]-f[e],l=f[d]-f[e]<y?1:g/p;if(1E-6>Math.abs(l))break;var h=l*l,u=l*g-.5*h*p,w=l*p/b,v=c[e+1],x=c[e][0]-v[0],z=c[e][1]-v[1],n=n+w/u*(v[0]*l*g+.5*h*(g*x-p*v[0])-h*l*p*x/3),q=q+w/u*(v[1]*l*g+.5*h*(g*z-p*v[1])-h*l*p*z/3),m=m+w}for(e=d+1;e<a&&!(f[e-1]>f[d]+y);e++){g=y-f[e-1]+f[d];p=f[e]-f[e-1];
l=f[e]-f[d]<y?1:g/p;if(1E-6>Math.abs(l))break;h=l*l;u=l*g-.5*h*p;w=l*p/b;v=c[e-1];x=c[e][0]-v[0];z=c[e][1]-v[1];n+=w/u*(v[0]*l*g+.5*h*(g*x-p*v[0])-h*l*p*x/3);q+=w/u*(v[1]*l*g+.5*h*(g*z-p*v[1])-h*l*p*z/3);m+=w}k.push(n/m);k.push(q/m)}k.push(t);k.push(r);for(e=d=0;d<a;d++)c[d][0]=k[e++],c[d][1]=k[e++]}}};h.prototype._computeLineAnchors=function(c,b,a){b=b.paths;var f=this._scale*this._shapedBox.width;a=f/2+a;for(var f=f/2+16,k=this._shapedBox.width*this._scale,d=0;d<b.length;d++){var t=b[d],r=[];r.push(t[0]);
for(var h=1;h<t.length;h++){var n=r[h-1],q=n[0],n=n[1],q=q+t[h][0],n=n+t[h][1];r.push([q,n])}this._smoothVertices(r,k);t=[];t.push(r[0]);for(h=1;h<r.length;h++){var n=r[h-1],m=r[h],q=Math.round(m[0]-n[0]),n=Math.round(m[1]-n[1]);t.push([q,n])}b[d]=t;r=this._getPathLength(t);if(!(r<2*f))for(var h=r/2,e=0,m=t[0][0],g=t[0][1],p=1;p<t.length;p++){var q=t[p][0],n=t[p][1],l=Math.sqrt(q*q+n*n),e=e+l;if(0<=e-h){var u=e-h,B=l-u,w=B/l,v=m+q*w,x=g+n*w;this._outsideTile(v,x)||(e=new E.default(v,x,w,d,p,m,g,l,
r,-1),c.push(e));for(var z=-1,x=0,x=B-a;0<=x;x-=a){var w=x/l,v=m+q*w,A=g+n*w;z++;this._outsideTile(v,A)||(e=new E.default(v,A,w,d,p,m,g,l,r,z),c.push(e))}e=x+a;x=l-u;w=m;v=g;for(A=p-1;0!==A;A--){var C=t[A][0],I=t[A][1],F=Math.sqrt(C*C+I*I);if(e+F>=a){for(var J=e=a-e;J<F;J+=a){var D=J/F,G=w-C*D,H=v-I*D;z++;(e=J+x+f<h)&&!this._outsideTile(G,H)&&(e=new E.default(G,H,1-D,d,A,w-C,v-I,F,r,z),c.push(e))}e=F-(J-a)}else e+=F;x+=F;w-=C;v-=I}z=-1;for(x=B+a;x<=l;x+=a)w=x/l,v=m+q*w,B=g+n*w,z++,this._outsideTile(v,
B)||(e=new E.default(v,B,w,d,p,m,g,l,r,z),c.push(e));w=m+q;v=g+n;e=l-(x-a);x=u;for(A=p+1;A<t.length;A++){q=t[A][0];n=t[A][1];m=Math.sqrt(q*q+n*n);if(e+m>=a){for(g=e=a-e;g<m;g+=a)p=g/m,l=w+q*p,u=v+n*p,z++,(e=g+x+f<h)&&!this._outsideTile(l,u)&&(e=new E.default(l,u,p,d,A,w,v,m,r,z),c.push(e));e=m-(g-a)}else e+=m;x+=m;w+=q;v+=n}break}m+=q;g+=n}}return c};h.prototype._computeAnchors=function(c,b){var a=[];switch(c){case "esriGeometryPoint":return b=b.geometry,c=b.x,b=b.y,c=new E.default(c,b),a.push(c),
a;case "esriGeometryPolygon":if(b.centroid)return b=b.centroid,c=b.x,b=b.y,c=new E.default(c,b),a.push(c),a;L("Non-centroid polygon anchor placement not supported");break;case "esriGeometryPolyline":return this._computeLineAnchors(a,b.geometry,376);default:return L("Unable to handle geometryType: "+c),a}};h.prototype._getPathLength=function(c){for(var b=0,a=1;a<c.length;a++)var f=c[a][0],k=c[a][1],b=b+Math.sqrt(f*f+k*k);return b};h.prototype._computeGlyphTransform=function(c){var b=this._scale,a=
this._angle*Y.C_DEG_TO_RAD,f=c.width/2,k=c.height/2,f=this._xAlignD*f*b+(this._xOffset+this._refTemplate.xOffset)+(c.x+f);c=this._yAlignD*k*b-(this._yOffset+this._refTemplate.yOffset)-(c.y+k);k=D.mat2d.identity(ea);D.mat2d.translate(k,k,O.vec2.set(R,f,c));D.mat2d.scale(k,k,O.vec2.set(R,b,b));D.mat2d.rotate(k,k,a);return k};h.prototype._writeVertex=function(c,b,a,f,k,d,h,r,u){b=b.get("geometry");h=Math.min(Math.floor(Math.max(this._refTemplate.width,this._refTemplate.height)),255);var n=this._xPlacementD+
1,q=this._yPlacementD+1;r=G.i8888to32(r,u,0,0);this._refSymbolAndPlacementOffset=G.i8888to32(d.angle,h,n,q);b.push(f);b.push(a);b.push(k);b.push(d.vertexOffsetUpperLeft);b.push(d.texFontSizeUpperLeft);b.push(this._refSymbolAndPlacementOffset);b.push(r);b.push(f);b.push(a);b.push(k);b.push(d.vertexOffsetUpperRight);b.push(d.texFontSizeUpperRight);b.push(this._refSymbolAndPlacementOffset);b.push(r);b.push(f);b.push(a);b.push(k);b.push(d.vertexOffsetLowerLeft);b.push(d.texFontSizeLowerLeft);b.push(this._refSymbolAndPlacementOffset);
b.push(r);b.push(f);b.push(a);b.push(k);b.push(d.vertexOffsetLowerRight);b.push(d.texFontSizeLowerRight);b.push(this._refSymbolAndPlacementOffset);b.push(r);c.vertexCount+=4};return h}(aa.default);B.default=M});