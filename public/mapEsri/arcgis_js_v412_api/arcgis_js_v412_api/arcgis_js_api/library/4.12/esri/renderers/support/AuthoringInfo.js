// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../core/tsSupport/declareExtendsHelper ../../core/tsSupport/decorateHelper ../../core/jsonMap ../../core/JSONSupport ../../core/lang ../../core/accessorSupport/decorators ../../core/accessorSupport/ensureType ./AuthoringInfoFieldInfo ./AuthoringInfoVisualVariable ../../tasks/support/colorRamps".split(" "),function(u,v,p,d,g,q,h,c,r,l,t,m){var e=new g.default({esriClassifyDefinedInterval:"defined-interval",esriClassifyEqualInterval:"equal-interval",esriClassifyManual:"manual",
esriClassifyNaturalBreaks:"natural-breaks",esriClassifyQuantile:"quantile",esriClassifyStandardDeviation:"standard-deviation"}),f=new g.default({classedSize:"class-breaks-size",classedColor:"class-breaks-color",univariateColorSize:"univariate-color-size",relationship:"relationship",predominance:"predominance",dotDensity:"dot-density"}),n="inches feet yards miles nautical-miles millimeters centimeters decimeters meters kilometers decimal-degrees".split(" ");return function(g){function b(a){a=g.call(this)||
this;a.colorRamp=null;a.lengthUnit=null;a.maxSliderValue=null;a.minSliderValue=null;a.visualVariables=null;return a}p(b,g);k=b;Object.defineProperty(b.prototype,"classificationMethod",{get:function(){var a=this._get("classificationMethod"),b=this.type;return b&&"relationship"!==b?"class-breaks-size"===b||"class-breaks-color"===b?a||"manual":null:a},set:function(a){this._set("classificationMethod",a)},enumerable:!0,configurable:!0});b.prototype.readColorRamp=function(a,b){if(a)return m.fromJSON(a)};
Object.defineProperty(b.prototype,"fields",{get:function(){return this.type&&"predominance"!==this.type?null:this._get("fields")},set:function(a){this._set("fields",a)},enumerable:!0,configurable:!0});Object.defineProperty(b.prototype,"field1",{get:function(){return this.type&&"relationship"!==this.type?null:this._get("field1")},set:function(a){this._set("field1",a)},enumerable:!0,configurable:!0});Object.defineProperty(b.prototype,"field2",{get:function(){return this.type&&"relationship"!==this.type?
null:this._get("field2")},set:function(a){this._set("field2",a)},enumerable:!0,configurable:!0});Object.defineProperty(b.prototype,"focus",{get:function(){return this.type&&"relationship"!==this.type?null:this._get("focus")},set:function(a){this._set("focus",a)},enumerable:!0,configurable:!0});Object.defineProperty(b.prototype,"numClasses",{get:function(){return this.type&&"relationship"!==this.type?null:this._get("numClasses")},set:function(a){this._set("numClasses",a)},enumerable:!0,configurable:!0});
Object.defineProperty(b.prototype,"standardDeviationInterval",{get:function(){var a=this.type;return a&&"relationship"!==a&&"class-breaks-size"!==a&&"class-breaks-color"!==a?null:this.classificationMethod&&"standard-deviation"!==this.classificationMethod?null:this._get("standardDeviationInterval")},set:function(a){this._set("standardDeviationInterval",a)},enumerable:!0,configurable:!0});Object.defineProperty(b.prototype,"type",{get:function(){return this._get("type")},set:function(a){var b=a;"classed-size"===
a?b="class-breaks-size":"classed-color"===a&&(b="class-breaks-color");this._set("type",b)},enumerable:!0,configurable:!0});b.prototype.clone=function(){return new k({classificationMethod:this.classificationMethod,colorRamp:h.clone(this.colorRamp),fields:this.fields&&this.fields.slice(0),field1:h.clone(this.field1),field2:h.clone(this.field2),focus:this.focus,numClasses:this.numClasses,maxSliderValue:this.maxSliderValue,minSliderValue:this.minSliderValue,lengthUnit:this.lengthUnit,standardDeviationInterval:this.standardDeviationInterval,
type:this.type,visualVariables:this.visualVariables&&this.visualVariables.map(function(a){return a.clone()})})};var k;d([c.property({type:e.apiValues,value:null,dependsOn:["type"],json:{type:e.jsonValues,read:e.read,write:e.write,origins:{"web-document":{default:"manual",type:e.jsonValues,read:e.read,write:e.write}}}})],b.prototype,"classificationMethod",null);d([c.property({types:m.types,json:{write:!0}})],b.prototype,"colorRamp",void 0);d([c.reader("colorRamp")],b.prototype,"readColorRamp",null);
d([c.property({type:[String],value:null,dependsOn:["type"],json:{write:!0}})],b.prototype,"fields",null);d([c.property({type:l.default,value:null,dependsOn:["type"],json:{write:!0}})],b.prototype,"field1",null);d([c.property({type:l.default,value:null,dependsOn:["type"],json:{write:!0}})],b.prototype,"field2",null);d([c.property({type:["HH","HL","LH","LL"],value:null,dependsOn:["type"],json:{write:!0}})],b.prototype,"focus",null);d([c.property({type:Number,value:null,dependsOn:["type"],json:{type:r.Integer,
write:!0}})],b.prototype,"numClasses",null);d([c.property({type:n,json:{type:n,read:!1,write:!1,origins:{"web-scene":{read:!0,write:!0}}}})],b.prototype,"lengthUnit",void 0);d([c.property({type:Number,json:{write:!0}})],b.prototype,"maxSliderValue",void 0);d([c.property({type:Number,json:{write:!0}})],b.prototype,"minSliderValue",void 0);d([c.property({type:[.25,.33,.5,1],value:null,dependsOn:["classificationMethod","type"],json:{type:[.25,.33,.5,1],write:!0}})],b.prototype,"standardDeviationInterval",
null);d([c.property({type:String,value:null,json:{type:f.jsonValues,read:f.read,write:f.write,origins:{"web-scene":{type:f.jsonValues.filter(function(a){return"dotDensity"!==a}),read:f.read,write:f.write}}}})],b.prototype,"type",null);d([c.property({type:[t],json:{write:!0}})],b.prototype,"visualVariables",void 0);return b=k=d([c.subclass("esri.renderers.support.AuthoringInfo")],b)}(c.declared(q))});