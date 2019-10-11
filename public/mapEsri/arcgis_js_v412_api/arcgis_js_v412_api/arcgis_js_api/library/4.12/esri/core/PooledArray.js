// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define(["require","exports","./tsSupport/generatorHelper","./arrayUtils","./HeapSort"],function(k,l,g,f,h){return function(){function b(a){var c=this;this.data=[];this._length=0;this._allocator=null;this._deallocator=function(){};this._shrink=function(){};this._hint=new f.RemoveHint;a&&(a.initialSize&&(this.data=Array(a.initialSize)),a.allocator?(this._allocator=a.allocator,this._deallocator=a.deallocator):"deallocator"in a&&(this._deallocator=a.deallocator),a.shrink&&(this._shrink=function(){c.data.length>
1.5*c.length&&(c.data.length=Math.floor(1.1*c.length))}))}b.prototype.toArray=function(){return this.data.slice(0,this.length)};Object.defineProperty(b.prototype,"length",{get:function(){return this._length},set:function(a){if(a>this._length)if(this._allocator)for(;this._length<a;)this.data[this._length++]=this._allocator(this.data[this._length]);else this._length=a;else{if(this._deallocator)for(var c=a;c<this._length;++c)this.data[c]=this._deallocator(this.data[c]);this._length=a;this._shrink()}},
enumerable:!0,configurable:!0});b.prototype.clear=function(){this.length=0};b.prototype.prune=function(){this.clear();this.data=[]};b.prototype.equal=function(a){return f.equals(this.data,a.data)};b.prototype.push=function(a){return this.data[this._length++]=a};b.prototype.pushArray=function(a,c){void 0===c&&(c=a.length);for(var d=0;d<c;d++)this.data[this._length++]=a[d];return this.back()};b.prototype.pushNew=function(){this._allocator&&(this.data[this.length]=this._allocator(this.data[this.length]));
++this._length;return this.back()};b.prototype.pop=function(){if(0!==this.length){var a=this.data[this.length-1];--this.length;this._shrink();return a}};b.prototype.removeMany=function(a){var c=this,d=[];this.data=this.data.filter(function(e,b){if(b>=c.length)return!1;if(0>a.indexOf(e))return!0;d.push(e);return!1});this._length=this.data.length;return d};b.prototype.iterableRemoveMany=function(a,c){var d,e;return g(this,function(b){switch(b.label){case 0:d=[],e=0,b.label=1;case 1:if(!(e<this.length)||
e>=this.length)return[3,4];0>a.indexOf(this.data[e])&&d.push(this.data[e]);return c()?[4]:[3,3];case 2:b.sent(),b.label=3;case 3:return++e,[3,1];case 4:return this.data=d,this._length=this.data.length,[2]}})};b.prototype.removeUnordered=function(a){a=f.removeUnordered(this.data,a,this.length,this._hint);void 0!==a&&--this.length;return a};b.prototype.removeUnorderedIndex=function(a){if(!(a>=this.length||0>a))return this.swapElements(a,this.length-1),this.pop()};b.prototype.removeUnorderedMany=function(a,
c,d){void 0===c&&(c=a.length);this.length=f.removeUnorderedMany(this.data,a,this.length,c,this._hint,d)};b.prototype.front=function(){if(0!==this.length)return this.data[0]};b.prototype.back=function(){if(0!==this.length)return this.data[this.length-1]};b.prototype.swapElements=function(a,c){var d;a>=this.length||c>=this.length||a===c||(d=[this.data[c],this.data[a]],this.data[a]=d[0],this.data[c]=d[1])};b.prototype.sort=function(a){h.sort(this.data,0,this.length,a)};b.prototype.iterableSort=function(a,
c){return h.iterableSort(this.data,0,this.length,a,c)};b.prototype.some=function(a,c){for(var d=0;d<this.length;++d)if(a.call(c,this.data[d],d,this.data))return!0;return!1};b.prototype.find=function(a,c){for(var d=0;d<this.length;++d){var e=this.data[d];if(a.call(c,e,d,this.data))return e}};b.prototype.filterInPlace=function(a,c){for(var d=0,e=0;e<this._length;++e){var b=this.data[e];a.call(c,b,e,this.data)&&(this.data[e]=this.data[d],this.data[d]=b,d++)}if(this._deallocator)for(e=d;e<this._length;e++)this.data[e]=
this._deallocator(this.data[e]);this._length=d;return this};b.prototype.forEach=function(a,c){for(var d=this.length,b=0;b<Math.min(this.length,d);++b)a.call(c,this.data[b],b,this.data)};b.prototype.iterableForEach=function(){var a;return g(this,function(c){switch(c.label){case 0:a=0,c.label=1;case 1:return a<this.length?[4,this.data[a]]:[3,4];case 2:c.sent(),c.label=3;case 3:return++a,[3,1];case 4:return[2]}})};b.prototype.map=function(a,c){for(var b=Array(this.length),e=0;e<this.length;++e)b[e]=
a.call(c,this.data[e],e,this.data);return b};return b}()});