// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../support/imageUtils ../../../webgl/BufferObject ../../../webgl/FramebufferObject ../../../webgl/Program ../../../webgl/renderState ../../../webgl/Texture ../../../webgl/VertexArrayObject".split(" "),function(l,r,m,n,h,g,k,p,q){return function(){function f(b){this.isEnabled=this._isLoadingResources=!1;this.vertexAttributeLocations={vPosition:0};this.vertexBufferLayout=[{name:"vPosition",count:2,type:5126,offset:0,stride:8,normalized:!1}];this.rctx=b}f.prototype.loadResources=
function(b){var d=this;return this.data?!0:(this._isLoadingResources=!0,l(["./SmaaRenderPassData"],function(a){d.data=a;d._isLoadingResources=!1;b&&b()}),!1)};Object.defineProperty(f.prototype,"isLoadingResources",{get:function(){return this._isLoadingResources},enumerable:!0,configurable:!0});f.prototype.enable=function(){if(this.isEnabled)return!0;if(!this.loadResources())return!1;var b=this.rctx;this.programEdgeDetect=new g(b,this.data.edgeDetectShader.vertex,this.data.edgeDetectShader.fragment,
this.vertexAttributeLocations);this.programBlendWeights=new g(b,this.data.blendWeightShader.vertex,this.data.blendWeightShader.fragment,this.vertexAttributeLocations);this.programBlur=new g(b,this.data.blurShader.vertex,this.data.blurShader.fragment,this.vertexAttributeLocations);this.pipelineState=k.makePipelineState({colorWrite:k.defaultColorWriteParams});var d=new Float32Array([-1,-1,3,-1,-1,3]);this.vao=new q(b,this.vertexAttributeLocations,{geometry:this.vertexBufferLayout},{geometry:new n(b,
34962,35044,d)});this.tmpFramebufferEdges=h.createWithAttachments(this.rctx,{target:3553,pixelFormat:6407,dataType:5121,samplingMode:9729,wrapMode:33071,width:4,height:4},{colorTarget:0,depthStencilTarget:0});this.tmpFramebufferBlend=h.createWithAttachments(this.rctx,{target:3553,pixelFormat:6408,dataType:5121,samplingMode:9729,wrapMode:33071,width:4,height:4},{colorTarget:0,depthStencilTarget:0});this.textureArea=this.loadTextureFromBase64(this.data.areaTexture,9729,6407);this.textureSearch=this.loadTextureFromBase64(this.data.searchTexure,
9728,6409);return this.isEnabled=!0};f.prototype.disable=function(){this.isEnabled&&(this.programEdgeDetect.dispose(),this.programEdgeDetect=null,this.programBlendWeights.dispose(),this.programBlendWeights=null,this.programBlur.dispose(),this.programBlur=null,this.vao.dispose(),this.vao=null,this.textureArea.dispose(),this.textureArea=null,this.textureSearch.dispose(),this.textureSearch=null,this.tmpFramebufferBlend.dispose(),this.tmpFramebufferBlend=null,this.tmpFramebufferEdges.dispose(),this.tmpFramebufferEdges=
null,this.isEnabled=!1)};f.prototype.render=function(b,d){this.enable();var a=this.rctx,c=0,e=0;null!=d?(c=d.descriptor.width,e=d.descriptor.height):(c=a.gl.canvas.width,e=a.gl.canvas.height);a.bindVAO(this.vao);a.setPipelineState(this.pipelineState);a.setViewport(0,0,c,e);this.tmpFramebufferEdges.resize(c,e);a.bindFramebuffer(this.tmpFramebufferEdges);a.setClearColor(0,0,0,1);a.clear(16384);a.bindProgram(this.programEdgeDetect);a.bindTexture(b.colorTexture,0);this.programEdgeDetect.setUniform1i("tColor",
0);this.programEdgeDetect.setUniform4f("uResolution",1/c,1/e,c,e);a.drawArrays(4,0,3);this.tmpFramebufferBlend.resize(c,e);a.bindFramebuffer(this.tmpFramebufferBlend);a.setClearColor(0,0,1,1);a.clear(16384);a.bindProgram(this.programBlendWeights);this.programBlendWeights.setUniform4f("uResolution",1/c,1/e,c,e);a.bindTexture(this.textureSearch,1);this.programBlendWeights.setUniform1i("tSearch",1);a.bindTexture(this.textureArea,2);this.programBlendWeights.setUniform1i("tArea",2);a.bindTexture(this.tmpFramebufferEdges.colorTexture,
3);this.programBlendWeights.setUniform1i("tEdges",3);a.drawArrays(4,0,3);a.bindFramebuffer(d);a.setClearColor(0,1,0,1);a.clear(16384);a.bindProgram(this.programBlur);this.programBlur.setUniform4f("uResolution",1/c,1/e,c,e);a.bindTexture(b.colorTexture,0);this.programBlur.setUniform1i("tColor",0);a.bindTexture(this.tmpFramebufferBlend.colorTexture,1);this.programBlur.setUniform1i("tBlendWeights",1);a.drawArrays(4,0,3)};f.prototype.loadTextureFromBase64=function(b,d,a){var c=new p(this.rctx,{pixelFormat:a,
dataType:5121,wrapMode:33071,samplingMode:d},null);m.requestImage(b).then(function(a){c.resize(a.width,a.height);c.setData(a)});return c};return f}()});