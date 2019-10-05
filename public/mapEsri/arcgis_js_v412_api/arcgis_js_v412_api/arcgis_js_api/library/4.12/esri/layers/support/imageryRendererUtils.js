// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../core/arrayUtils ../../core/lang ./RasterFunction ../../renderers/support/colorRampUtils ../../renderers/support/stretchRendererUtils".split(" "),function(B,l,v,q,h,r,w){function t(a){var b=a.Raster;return b&&"esri.layers.support.RasterFunction"===b.declaredClass?t(b.functionArguments):a}function x(a,b){var e=[],c=[],d=[],g=[],f=b.pixelType,m=(b=b.rasterAttributeTable)&&b.features,y=u(b);if(m&&Array.isArray(m)&&a.classBreakInfos)return a.classBreakInfos.forEach(function(b,
d){var e=b.symbol.color,c;e.a&&m.forEach(function(f){c=f.attributes[a.field];(c>=b.minValue&&c<b.maxValue||d===a.classBreakInfos.length-1&&c>=b.minValue)&&g.push([f.attributes[y],e.r,e.g,e.b])})}),f=f?n(g,f):g,b=new h,b.functionName="Colormap",b.functionArguments={},b.functionArguments.Colormap=f,b.variableName="Raster",b;a.classBreakInfos.forEach(function(a,b){var f=a.symbol&&a.symbol.color;f.a?(0===b?e.push(a.minValue,a.maxValue+1E-6):e.push(a.minValue+1E-6,a.maxValue+1E-6),c.push(b),g.push([b,
f.r,f.g,f.b])):d.push(a.minValue,a.maxValue)});f=f?n(g,f):g;b=new h;b.functionName="Remap";b.functionArguments={InputRanges:e,OutputValues:c,NoDataRanges:d};b.variableName="Raster";var p=new h;p.functionName="Colormap";p.functionArguments={Colormap:f,Raster:b};return p}function n(a,b){(b=z[String(b).toLowerCase()])&&a.push([Math.floor(b[0]-1),0,0,0],[Math.ceil(b[1]+1),0,0,0]);return a}function u(a){if(a)return(a=(a=a.fields)&&v.find(a,function(a){return a&&a.name&&"value"===a.name.toLowerCase()}))&&
a.name}function A(a,b){var e=[],c=b.pixelType,d=(b=b.rasterAttributeTable)&&b.features,g=u(b),f=!1;a.uniqueValueInfos&&a.uniqueValueInfos.forEach(function(b){var c=b.symbol.color;c.a&&(a.field!==g&&d?d&&d.forEach(function(d){String(d.attributes[a.field])===String(b.value)&&e.push([d.attributes[g],c.r,c.g,c.b])}):isNaN(b.value)?f=!0:e.push([b.value,c.r,c.g,c.b]))});if(f)return null;c=c&&0<e.length?n(e,c):e;b=new h;b.functionName="Colormap";b.functionArguments={};b.functionArguments.Colormap=c;b.variableName=
"Raster";return b}Object.defineProperty(l,"__esModule",{value:!0});var z={u1:[0,1],u2:[0,3],u4:[0,15],u8:[0,255],s8:[-128,127],u16:[0,65535],s16:[-32768,32767]};l.isSupportedRendererType=function(a){a=a.type;return"raster-stretch"===a||"unique-value"===a||"class-breaks"===a};l.combineRenderingRules=function(a,b){if(!a||!b)return q.clone(a||b);a=q.clone(a);"none"!==b.functionName.toLowerCase()&&(t(a.functionArguments).Raster=b);return a};l.convertRendererToRenderingRule=function(a,b){b=b||{};switch(a.type){case "raster-stretch":var e=
new h;e.functionName="Stretch";var c=k[w.stretchTypeJSONDict.toJSON(a.stretchType)],d={StretchType:c,Statistics:a.statistics,DRA:a.dynamicRangeAdjustment,UseGamma:a.useGamma,Gamma:a.gamma,ComputeGamma:a.computeGamma};null!=a.outputMin&&(d.Min=a.outputMin);null!=a.outputMax&&(d.Max=a.outputMax);c===k.standardDeviation?(d.NumberOfStandardDeviations=a.numberOfStandardDeviations,e.outputPixelType="u8"):c===k.percentClip?(d.MinPercent=a.minPercent,d.MaxPercent=a.maxPercent,e.outputPixelType="u8"):c===
k.minMax?e.outputPixelType="u8":c===k.sigmoid&&(d.SigmoidStrengthLevel=a.sigmoidStrengthLevel);e.functionArguments=d;e.variableName="Raster";if(a.colorRamp){var c=a.colorRamp,d=new h,g=r.getColorRampName(c);d.functionArguments=g?{colorRamp:g}:!b.convertColorRampToColormap||"algorithmic"!==c.type&&"multipart"!==c.type?{colorRamp:a.colorRamp.toJSON()}:{Colormap:r.convertColorRampToColormap(c,256)};d.variableName="Raster";d.functionName="Colormap";d.functionArguments.Raster=e;a=d}else a=e;return a;case "class-breaks":return x(a,
b);case "unique-value":return A(a,b)}};var k={none:0,standardDeviation:3,histogramEqualization:4,minMax:5,percentClip:6,sigmoid:9}});