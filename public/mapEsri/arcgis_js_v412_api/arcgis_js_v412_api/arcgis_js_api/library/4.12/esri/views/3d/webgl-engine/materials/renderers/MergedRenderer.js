// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../../../../core/libs/gl-matrix-2/mat4 ../../../../../core/libs/gl-matrix-2/mat4f64 ../../../support/buffer/glUtil ../../lib/DefaultVertexAttributeLocations ../../lib/Float32ArrayList ../../lib/IntervalUtilities ../../lib/Util ../WaterGLMaterial ./Instance ./utils ../../../../webgl/BufferObject ../../../../webgl/Util ../../../../webgl/VertexArrayObject".split(" "),function(y,N,w,r,C,D,E,z,v,F,G,m,H,x,I){function J(h,a,b,d){for(var f=new Map,k=a.vertexBufferLayout.stride/
4,c=function(b,d){var c=b.origin,g=h.get(c.id),e=f.get(c.id);null==e&&(e={optimalCount:null==g?0:g.optimalCount,sparseCount:null==g?0:g.buffer.getSize(),toAdd:[],toRemove:[],origin:c.vec3},f.set(c.id,e));c=a.elementCount(b.data)*k;d?(e.optimalCount+=c,e.sparseCount+=c,e.toAdd.push(b)):(e.optimalCount-=c,e.toRemove.push(b))},l=0;l<b.length;l++){var e=b[l];c(e,!0)}for(b=0;b<d.length;b++)e=d[b],c(e,!1);return f}y=function(){function h(a,b,d,f){void 0===f&&(f=D.Default3D);this._dataByOrigin=new Map;this._highlightCount=
0;this._hasWater=!1;this._rctx=a;this._vertexAttributeLocations=f;this._material=d;this._materialRep=b;this._glMaterials=m.acquireMaterials(this._material,this._materialRep);this._bufferWriter=d.createBufferWriter()}h.prototype.dispose=function(){m.releaseMaterials(this._material,this._materialRep)};Object.defineProperty(h.prototype,"isEmpty",{get:function(){return 0===this._dataByOrigin.size},enumerable:!0,configurable:!0});Object.defineProperty(h.prototype,"hasHighlights",{get:function(){return 0<
this._highlightCount},enumerable:!0,configurable:!0});h.prototype.hasWater=function(){return this._hasWater};h.prototype.renderPriority=function(){return this._material.renderPriority};h.prototype.modify=function(a){var b=this,d=K;d.clear();this.updateGeometries(a.toUpdate,d);this.addAndRemoveGeometries(a.toAdd,a.toRemove,d);this.updateHighlightCount();d.forEach(function(a){return b.updateDisplayedIndexRanges(a)})};h.prototype.addAndRemoveGeometries=function(a,b,d){var f=this,k=this._material,c=this._bufferWriter,
l=c.vertexBufferLayout,e=l.stride/4,g=this._dataByOrigin,A=J(g,c,a,b);A.forEach(function(a,b){A.delete(b);var c=a.optimalCount,h=a.sparseCount,n=g.get(b);null==n&&(v.assert(0<c),n=f.createData(l,c,a.origin),g.set(b,n));if(0===c)n.vao.dispose(!0),n.vao=null,g.delete(b);else{var t=(b=c<a.sparseCount/2)?c:h,c=L,h=n.buffer.getSize(),m=n.buffer.getArray(),t=n.buffer.resize(t);b||t?f.removeAndRebuild(n,a.toRemove,e,m,c):0<a.toRemove.length?(f.removeByErasing(n,a.toRemove,e,c),0<a.toAdd.length&&(c.end=h)):
(c.begin=h,c.end=h,c.eraseEnd=0);b=M;v.setMatrixTranslation3(b,-a.origin[0],-a.origin[1],-a.origin[2]);f.append(n,k,a.toAdd,e,b,c);a=n.vao.vertexBuffers.geometry;c.eraseEnd>c.end&&(n.buffer.erase(c.end,c.eraseEnd),c.end=c.eraseEnd);a.byteSize!==n.buffer.getArray().buffer.byteLength?a.setData(n.buffer.getArray()):(m=c.begin,b=c.end,m<b&&(h=n.buffer.getArray(),m*=4,a.setSubData(h,m,m,4*b)));(c.updatedDisplayedIndexRange||n.displayedIndexRanges)&&d.add(n)}})};h.prototype.updateGeometries=function(a,
b){for(var d=this._bufferWriter,f=d.vertexBufferLayout.stride/4,k=0;k<a.length;k++){var c=a[k],l=c.updateType,c=c.renderGeometry,e=this._dataByOrigin.get(c.origin.id),g=e&&e.instances.get(c.uniqueName);if(!g)break;l&1&&(g.displayedIndexRange=m.generateRenderGeometryVisibleIndexRanges(c),b.add(e));l&17&&(g.highlightedIndexRanges=m.generateRenderGeometryHighlightRanges(c),e.highlightCount=null);l&6&&(l=e.buffer.getArray(),e=e.vao,m.calculateTransformRelToOrigin(c,u,q),d.write({transformation:u,invTranspTransformation:q},
c.data,d.vertexBufferLayout.createView(l.buffer),g.from),v.assert(g.from+d.elementCount(c.data)===g.to,"material VBO layout has changed"),e.vertexBuffers.geometry.setSubData(l,g.from*f*4,g.from*f*4,g.to*f*4))}};h.prototype.updateDisplayedIndexRanges=function(a){var b=a.instances;a.displayedIndexRanges=[];var d=!0;b.forEach(function(b){b.displayedIndexRange?(a.displayedIndexRanges.push.apply(a.displayedIndexRanges,z.offsetIntervals(b.displayedIndexRange,b.from)),d=!1):a.displayedIndexRanges.push([b.from,
b.to-1])});a.displayedIndexRanges=d?null:z.mergeIntervals(a.displayedIndexRanges)};h.prototype.updateHighlightCount=function(){var a=this;this._highlightCount=0;this._dataByOrigin.forEach(function(b){if(null==b.highlightCount){var d=0;b.instances.forEach(function(a){a.highlightedIndexRanges&&++d});b.highlightCount=d}a._highlightCount+=b.highlightCount})};h.prototype.updateAnimations=function(a){var b=this,d=!1;this._hasWater=!1;this._glMaterials.forEach(function(f){f&&(d=f.updateAnimation(a)||d);
f instanceof F.WaterGLMaterial&&(b._hasWater=!0)});return d};h.prototype.render=function(a,b,d,f){var k=this,c=this._rctx,l=this._glMaterials.get(b.pass),e=4===b.pass;2===b.pass&&null===a&&(a=20);if(!l||null!=a&&!l.beginSlot(a)||e&&0===this._highlightCount)return!1;l.bind(c,d);b=l.getProgram();b.setUniformMatrix4fv("model",B);b.hasUniform("modelNormal")&&b.setUniformMatrix4fv("modelNormal",B);var g=!1;this._dataByOrigin.forEach(function(a){e&&0===a.highlightCount||(d.origin=a.origin,l.bindView(c,
d),g=e?k.renderHighlightPass(l,a,f)||g:k.renderDefaultPass(l,a,f)||g)});l.release(c,d);return g};h.prototype.renderDefaultPass=function(a,b,d){var f=this._rctx,k=a.getProgram();a=a.getDrawMode();var c=b.displayedIndexRanges;if(c&&0===c.length)return!1;x.assertCompatibleVertexAttributeLocations(b.vao,k);f.bindVAO(b.vao);c?m.drawArraysFaceRange(f,c,0,a,d):m.drawArrays(f,a,0,x.vertexCount(b.vao,"geometry"),d);return!0};h.prototype.renderHighlightPass=function(a,b,d){var f=this._rctx,k=a.getProgram(),
c=a.getDrawMode();a=b.vao;x.assertCompatibleVertexAttributeLocations(a,k);f.bindVAO(a);var l=!1;b.instances.forEach(function(a){var b=a.highlightedIndexRanges;if(b&&0!==b.length)for(var e=0;e<b.length;e++){var k=b[e];m.drawArrays(f,c,k.range?k.range[0]+a.from:a.from,k.range?k.range[1]-k.range[0]+1:a.to-a.from,d);l=!0}});return l};h.prototype.createData=function(a,b,d){return{instances:new Map,vao:new I(this._rctx,this._vertexAttributeLocations,{geometry:C.glLayout(a)},{geometry:H.createVertex(this._rctx,
35044)}),buffer:new E(b),optimalCount:0,origin:d,highlightCount:0}};h.prototype.removeAndRebuild=function(a,b,d,f,k){for(var c=k.eraseEnd=0;c<b.length;c++){var l=b[c].uniqueName,e=a.instances.get(l);a.optimalCount-=(e.to-e.from)*d;a.instances.delete(l);k.eraseEnd=Math.max(k.eraseEnd,e.to*d)}var g=0,h=a.buffer.getArray();k.begin=0;k.end=0;var m=-1,p=-1,q=0;a.instances.forEach(function(a){var b=a.from*d,c=a.to*d,e=c-b;m!==p&&p!==b?(h.set(f.subarray(m,p),q),q+=p-m,m=b):-1===m&&(m=b);p=c;a.from=g/d;g+=
e;a.to=g/d});m!==p&&h.set(f.subarray(m,p),q);k.end=g};h.prototype.removeByErasing=function(a,b,d,f){f.begin=Infinity;f.end=-Infinity;f.eraseEnd=-Infinity;for(var k=-1,c=-1,l=0;l<b.length;l++){var e=b[l].uniqueName,g=a.instances.get(e),h=g.from*d,g=g.to*d;k!==c&&c!==h?(a.buffer.erase(k,c),k=h):-1===k&&(k=h);c=g;a.instances.delete(e);a.optimalCount-=g-h;h<f.begin&&(f.begin=h);g>f.end&&(f.end=g)}k!==c&&a.buffer.erase(k,c)};h.prototype.append=function(a,b,d,f,h,c){c.updatedDisplayedIndexRange=!1;b=this._bufferWriter;
for(var l=0;l<d.length;l++){var e=d[l],g=e.data;w.mat4.multiply(u,h,e.transformation);w.mat4.invert(q,u);w.mat4.transpose(q,q);var k=c.end;b.write({transformation:u,invTranspTransformation:q},g,b.vertexBufferLayout.createView(a.buffer.getArray().buffer),c.end/f);var g=b.elementCount(g)*f,t=k+g;v.assert(null==a.instances.get(e.uniqueName));var p=m.generateRenderGeometryVisibleIndexRanges(e),r=m.generateRenderGeometryHighlightRanges(e);r&&(a.highlightCount=null);k=new G(e.name,k/f,t/f,p,r,void 0,void 0,
e.idx);a.instances.set(e.uniqueName,k);p&&(c.updatedDisplayedIndexRange=!0);a.optimalCount+=g;c.end+=g}};return h}();var L={updatedDisplayedIndexRange:!1,begin:0,end:0,eraseEnd:0},M=r.mat4f64.create(),u=r.mat4f64.create(),q=r.mat4f64.create(),B=r.mat4f64.create(),K=new Set;return y});