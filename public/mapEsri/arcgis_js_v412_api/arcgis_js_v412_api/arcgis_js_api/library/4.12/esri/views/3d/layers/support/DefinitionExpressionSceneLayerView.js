// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../../../core/tsSupport/declareExtendsHelper ../../../../core/tsSupport/decorateHelper ../../../../core/Accessor ../../../../core/Logger ../../../../core/accessorSupport/decorators ../../../../core/sql/WhereClause ../i3s/I3SUtil".split(" "),function(c,g,k,f,l,m,d,n,p){Object.defineProperty(g,"__esModule",{value:!0});var e=m.getLogger("esri.views.3d.layers.support.DefinitionExpressionSceneLayerView");c=function(c){function b(){var a=null!==c&&c.apply(this,arguments)||this;
a._definitionExpressionErrors=0;a._maxDefinitionExpressionErrors=20;a.logError=function(b){a._definitionExpressionErrors<a._maxDefinitionExpressionErrors&&e.error("Error while evaluating definitionExpression: "+b);a._definitionExpressionErrors++;a._definitionExpressionErrors===a._maxDefinitionExpressionErrors&&e.error("Further errors are ignored")};return a}k(b,c);Object.defineProperty(b.prototype,"parsedDefinitionExpression",{get:function(){if(this.layer.definitionExpression)try{var a=n.WhereClause.create(this.layer.definitionExpression,
this.layer.fieldsIndex);if(!a.isStandardized)return e.error("definitionExpression is using non standard function"),null;var b=[];p.findFieldsCaseInsensitive(a.fieldNames,this.layer.fields,{missingFields:b});if(0<b.length)return e.error("definitionExpression references unknown fields: "+b.join(", ")),null;this._definitionExpressionErrors=0;return a}catch(h){e.error("Failed to parse definitionExpression: "+h)}return null},enumerable:!0,configurable:!0});Object.defineProperty(b.prototype,"definitionExpressionFields",
{get:function(){return this.parsedDefinitionExpression?this.parsedDefinitionExpression.fieldNames:null},enumerable:!0,configurable:!0});b.prototype._evaluateClause=function(a,b){try{return a.testFeature(b)}catch(h){return this.logError(h),!1}};b.prototype._addDefinitionExpressionToQuery=function(a){if(!this.parsedDefinitionExpression)return a;var b=this.layer.definitionExpression;a=a.clone();a.where=a.where?"("+b+") AND ("+a.where+")":b;return a};f([d.property()],b.prototype,"layer",void 0);f([d.property({readOnly:!0,
dependsOn:["layer.definitionExpression","layer.fieldsIndex"]})],b.prototype,"parsedDefinitionExpression",null);f([d.property({readOnly:!0,dependsOn:["parsedDefinitionExpression"]})],b.prototype,"definitionExpressionFields",null);return b=f([d.subclass("esri.views.3d.layers.support.DefinitionExpressionSceneLayerView")],b)}(d.declared(l));g.DefinitionExpressionSceneLayerView=c;g.default=c});