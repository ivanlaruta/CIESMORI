// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define(["require","exports","./SimpleIndexManager","./TextureBackedBuffer"],function(d,b,e,f){Object.defineProperty(b,"__esModule",{value:!0});b.MAX_INDEX_COUNT=65536;d=function(){function a(a,c){void 0===c&&(c=1);this.textureBuffer=new f.TextureBackedBuffer(a,c);this.indexManager=new e.SimpleIndexManager(b.MAX_INDEX_COUNT)}a.prototype.dispose=function(){this.textureBuffer.dispose();this.textureBuffer=void 0};Object.defineProperty(a.prototype,"availableCount",{get:function(){return this.indexManager.availableCount},
enumerable:!0,configurable:!0});Object.defineProperty(a.prototype,"activeCount",{get:function(){return this.indexManager.activeCount},enumerable:!0,configurable:!0});a.prototype.acquireIndex=function(){var a=this.indexManager.acquire();this.textureBuffer.resizeToFit(a);return a};a.prototype.releaseIndex=function(a){this.indexManager.release(a)};return a}();b.ManagedTextureBackedBuffer=d});