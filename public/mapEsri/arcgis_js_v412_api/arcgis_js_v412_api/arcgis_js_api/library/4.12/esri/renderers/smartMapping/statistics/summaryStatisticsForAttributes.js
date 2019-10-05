// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../../core/tsSupport/assignHelper ../../../core/tsSupport/generatorHelper ../../../core/tsSupport/awaiterHelper ../../../core/Error ../../../core/promiseUtils ./support/utils ../support/utils".split(" "),function(u,v,n,g,h,k,p,q,l){function r(c){return h(this,void 0,void 0,function(){var e,a,f,d,m,b,h;return g(this,function(g){switch(g.label){case 0:if(!(c&&c.layer&&c.attributes))throw new k("summary-statistics-for-attributes:missing-parameters","'layer' and 'attributes' parameters are required");
if((e=c.attributes.some(function(a){return!!a.valueExpression}))&&!c.view)throw new k("summary-statistics-for-attributes:missing-parameters","View is required when 'valueExpression' is specified in attributes");a=n({},c);f=[2,1];d=l.createLayerAdapter(a.layer,f);a.layer=d;if(!d)throw new k("summary-statistics-for-attributes:invalid-parameters","'layer' must be one of these types: "+l.getLayerTypeLabels(f).join(", "));m=a.view;return[4,p.all([m&&m.when(),d.load()])];case 1:g.sent();b=[];a.attributes.forEach(function(a){a=
l.getFieldsList({field:a.field,valueExpression:a.valueExpression});Array.prototype.push.apply(b,a)});if(h=q.verifyBasicFieldValidity(d,b,"summary-statistics-for-attributes:invalid-parameters"))throw h;return[2,a]}})})}function t(c){for(var e=[],a=[],f=0;f<c.length;f++){var d=c[f];d.field?e.push(d.field):d.valueExpression&&a.push(d.valueExpression)}if(!a.length)return a=e.reduce(function(a,b){return a+" + "+b}),{valueExpression:e.map(function(a){return'$feature["'+a+'"]'}).join(" + "),sqlExpression:a,
sqlWhere:"( "+a+" ) \x3e 0"};c=a.map(function(a,b){return"function getValueForExpr"+b+"() {\n  "+a+" \n}"}).join("\n");f=a.map(function(a,b){return"var expression"+b+" \x3d Number(getValueForExpr"+b+"());"}).join("\n");a=a.map(function(a,b){return"expression"+b}).join(" + ");e.length&&(a=e.reduce(function(a,b){return a+' + $feature["'+b+'"]'},a));return{valueExpression:c+" \n\n"+f+" \n\nreturn "+a+";"}}return function(c){return h(this,void 0,void 0,function(){var e,a,f;return g(this,function(d){switch(d.label){case 0:return[4,
r(c)];case 1:return e=d.sent(),a=t(e.attributes),f=e.layer,[2,f.summaryStatistics({valueExpression:a.valueExpression,sqlExpression:a.sqlExpression,sqlWhere:a.sqlWhere,view:e.view})]}})})}});