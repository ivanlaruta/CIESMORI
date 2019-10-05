// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ./arcadeCompiler ./arcadeRuntime ./parser ./treeAnalysis ../core/has ../core/promiseUtils".split(" "),function(r,c,e,k,l,p,t,m){function L(a,b){if(null===d)throw Error("Async Arcade must be enabled for this script");return t("csp-restrictions")||!1===M?function(b){return d.executeScript(a,b)}:e.compileScript(a,b,!0)}function C(a,b){void 0===b&&(b=[]);return l.parseScript(a,b)}function D(a,b){if(!0===b.useAsync||!0===a.isAsync){if(null===d)throw Error("Async Arcade must be enabled for this script");
return d.executeScript(a,b)}return k.executeScript(a,b)}function E(a,b){return k.referencesMember(a,b)}function u(a,b){void 0===b&&(b=[]);void 0===a.usesGeometry&&p.findScriptDependencies(a,b);return!0===a.usesGeometry}function F(){return v?v:v=m.create(function(a,b){r(["../geometry/geometryEngine","./functions/geomsync"],function(b,c){w=!0;c.setGeometryEngine(b);a(!0)},function(a){b(a)})})}function x(){return null!==y?y:y=e.enableAsyncSupport().then(function(){return m.create(function(a,b){r(["./arcadeAsyncRuntime"],
function(n){try{d=n;n=0;for(var c=z;n<c.length;n++){var f=c[n];d.extend(f);e.extend(f,"async")}z=null;a(!0)}catch(q){b(q)}},b)})})}function H(){return d?!0:!1}function I(){return A?A:A=x().then(function(){return m.create(function(a,b){r(["./featureSetUtils","./functions/featuresetbase","./functions/featuresetgeom","./functions/featuresetstats","./functions/featuresetstring"],function(c,G,f,q,g){try{J=c,d.extend([G,f,q,g]),e.extend([G,f,q,g],"async"),B=!0,a(!0)}catch(h){b(h)}},b)})})}function K(a,
b){void 0===b&&(b=[]);void 0===a.usesFeatureSet&&p.findScriptDependencies(a,b);return!0===a.usesFeatureSet}function N(a,b){if(b)for(var c=0;c<b.length;c++)if(E(a,b[c]))return!0;return!1}Object.defineProperty(c,"__esModule",{value:!0});var M=function(){if(t("csp-restrictions"))return!1;try{return(new Function("function* test() {}; return true"))()}catch(a){return!1}}(),B=!1,w=!1,d=null,z=[];c.compileScript=function(a,b){return!0===b.useAsync||!0===a.isAsync?L(a,b):t("csp-restrictions")?function(b){return k.executeScript(a,
b)}:e.compileScript(a,b)};c.extend=function(a){k.extend(a);e.extend(a,"sync");null===d?z.push(a):(e.extend(a,"async"),d.extend(a))};c.parseScript=C;c.validateScript=function(a,b,c){void 0===c&&(c="");return l.validateScript(a,b,c)};c.scriptCheck=function(a,b,c,d){void 0===d&&(d="");return l.scriptCheck(a,b,c,d)};c.parseAndExecuteScript=function(a,b,c){void 0===c&&(c=[]);a=l.parseScript(a,c);return D(a,b)};c.executeScript=D;c.referencesMember=E;c.referencesFunction=function(a,b){return k.referencesFunction(a,
b)};c.extractFieldLiterals=function(a,b){void 0===b&&(b=!1);return l.extractFieldLiterals(a,b)};c.scriptUsesGeometryEngine=u;var v=null;c.enableGeometrySupport=F;var y=null;c.enableAsyncSupport=x;c.isFeatureSetSupportEnabled=function(){return B};c.isAsyncEnabled=H;c.isGeometryEnabled=function(){return w};var A=null;c.enableFeatureSetSupport=I;c.scriptUsesFeatureSet=K;c.scriptIsAsync=function(a,b){void 0===b&&(b=[]);void 0===a.isAsync&&p.findScriptDependencies(a,b);return!0===a.isAsync};c.loadScriptDependencies=
function(a,b,c,d){void 0===c&&(c=[]);void 0===d&&(d=!1);return m.create(function(f,e){var g="string"===typeof a?C(a):a,h=[];g&&(!1===w&&(u(g)||d)&&h.push(F()),!1===H()&&(!0===g.isAsync||b)&&h.push(x()),!1===B&&(K(g)||N(g,c))&&h.push(I()));h?m.all(h).then(function(){f(!0)},e):f(!0)})};c.scriptTouchesGeometry=function(a){if(u(a))return!0;a=p.findFunctionCalls(a,!0);return-1<a.indexOf("geometry")||-1<a.indexOf("feature")?!0:!1};var J=null;c.featureSetUtils=function(){return J}});