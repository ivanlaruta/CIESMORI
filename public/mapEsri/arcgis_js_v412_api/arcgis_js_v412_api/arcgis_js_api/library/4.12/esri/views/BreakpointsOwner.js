// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../core/tsSupport/declareExtendsHelper ../core/tsSupport/decorateHelper ../core/tsSupport/assignHelper ../core/Accessor ../core/ArrayPool ../core/Handles ../core/watchUtils ../core/accessorSupport/decorators ./DOMContainer".split(" "),function(u,v,m,d,n,p,g,q,r,e,t){function k(a,b){return b?h[a].valueToClassName[b].split(" "):[]}var h={widthBreakpoint:{getValue:function(a){var b=a.viewSize[0];a=a.breakpoints;var c=this.values;return b<=a.xsmall?c.xsmall:b<=a.small?c.small:
b<=a.medium?c.medium:b<=a.large?c.large:c.xlarge},values:{xsmall:"xsmall",small:"small",medium:"medium",large:"large",xlarge:"xlarge"},valueToClassName:{xsmall:"esri-view-width-xsmall esri-view-width-less-than-small esri-view-width-less-than-medium esri-view-width-less-than-large esri-view-width-less-than-xlarge",small:"esri-view-width-small esri-view-width-greater-than-xsmall esri-view-width-less-than-medium esri-view-width-less-than-large esri-view-width-less-than-xlarge",medium:"esri-view-width-medium esri-view-width-greater-than-xsmall esri-view-width-greater-than-small esri-view-width-less-than-large esri-view-width-less-than-xlarge",
large:"esri-view-width-large esri-view-width-greater-than-xsmall esri-view-width-greater-than-small esri-view-width-greater-than-medium esri-view-width-less-than-xlarge",xlarge:"esri-view-width-xlarge esri-view-width-greater-than-xsmall esri-view-width-greater-than-small esri-view-width-greater-than-medium esri-view-width-greater-than-large"}},heightBreakpoint:{getValue:function(a){var b=a.viewSize[1];a=a.breakpoints;var c=this.values;return b<=a.xsmall?c.xsmall:b<=a.small?c.small:b<=a.medium?c.medium:
b<=a.large?c.large:c.xlarge},values:{xsmall:"xsmall",small:"small",medium:"medium",large:"large",xlarge:"xlarge"},valueToClassName:{xsmall:"esri-view-height-xsmall esri-view-height-less-than-small esri-view-height-less-than-medium esri-view-height-less-than-large esri-view-height-less-than-xlarge",small:"esri-view-height-small esri-view-height-greater-than-xsmall esri-view-height-less-than-medium esri-view-height-less-than-large esri-view-height-less-than-xlarge",medium:"esri-view-height-medium esri-view-height-greater-than-xsmall esri-view-height-greater-than-small esri-view-height-less-than-large esri-view-height-less-than-xlarge",
large:"esri-view-height-large esri-view-height-greater-than-xsmall esri-view-height-greater-than-small esri-view-height-greater-than-medium esri-view-height-less-than-xlarge",xlarge:"esri-view-height-xlarge esri-view-height-greater-than-xsmall esri-view-height-greater-than-small esri-view-height-greater-than-medium esri-view-height-greater-than-large"}},orientation:{getValue:function(a){a=a.viewSize;var b=this.values;return a[1]>=a[0]?b.portrait:b.landscape},values:{portrait:"portrait",landscape:"landscape"},
valueToClassName:{portrait:"esri-view-orientation-portrait",landscape:"esri-view-orientation-landscape"}}},l={xsmall:544,small:768,medium:992,large:1200};return function(a){function b(){var c=null!==a&&a.apply(this,arguments)||this;c._breakpointsHandles=new q;c.breakpoints=l;c.orientation=null;c.widthBreakpoint=null;c.heightBreakpoint=null;return c}m(b,a);b.prototype.initialize=function(){this._breakpointsHandles.add(r.init(this,["breakpoints","size"],this._updateClassNames))};b.prototype.destroy=
function(){this.destroyed||(this._removeActiveClassNames(),this._breakpointsHandles.destroy(),this._breakpointsHandles=null)};b.prototype._updateClassNames=function(){if(this.container){var c=g.acquire(),b=g.acquire(),a=!1,f,e,d;for(f in h)e=this[f],d=h[f].getValue({viewSize:this.size,breakpoints:this.breakpoints}),e!==d&&(a=!0,this[f]=d,k(f,e).forEach(function(c){return b.push(c)}),k(f,d).forEach(function(b){return c.push(b)}));a&&(this._applyClassNameChanges(c,b),g.release(c),g.release(b))}};b.prototype._applyClassNameChanges=
function(c,b){var a=this.container;a&&(b.forEach(function(b){return a.classList.remove(b)}),c.forEach(function(b){return a.classList.add(b)}))};b.prototype._removeActiveClassNames=function(){var b=this.container;if(b)for(var a in h)k(a,this[a]).forEach(function(a){return b.classList.remove(a)})};d([e.property({set:function(b){var a=this._get("breakpoints");if(b!==a){a=(a=b)&&a.xsmall<a.small&&a.small<a.medium&&a.medium<a.large;if(!a){var c=JSON.stringify(l,null,2);console.warn("provided breakpoints are not valid, using defaults:"+
c)}b=a?b:l;this._set("breakpoints",n({},b))}}})],b.prototype,"breakpoints",void 0);d([e.property()],b.prototype,"orientation",void 0);d([e.property()],b.prototype,"widthBreakpoint",void 0);d([e.property()],b.prototype,"heightBreakpoint",void 0);return b=d([e.subclass("esri.views.BreakpointsOwner")],b)}(e.declared(p,t))});