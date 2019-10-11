// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../../core/tsSupport/assignHelper ../../../core/tsSupport/generatorHelper ../../../core/tsSupport/awaiterHelper dojo/i18n!../../nls/smartMapping ../../../core/Error ../../../core/promiseUtils ./size ./type ./support/utils ../heuristics/outline ../statistics/summaryStatistics ../support/utils ../support/adapters/support/predominanceUtils ../symbology/predominance ../../support/AuthoringInfo ../../support/AuthoringInfoVisualVariable ../../support/numberUtils ../../visualVariables/OpacityVariable".split(" "),
function(ga,x,R,E,m,I,e,O,S,T,w,U,V,y,W,z,X,Y,Z,aa){function ba(b){return m(this,void 0,void 0,function(){var a,c,f,d,k,h,l;return E(this,function(g){switch(g.label){case 0:if(!(b&&b.layer&&b.view&&b.fields&&b.fields.length))throw new e("predominance-renderer:missing-parameters","'layer', 'view' and 'fields' parameters are required");if(2>b.fields.length)throw new e("predominance-renderer:invalid-parameters","Minimum 2 fields are required");if(10<b.fields.length)throw new e("predominance-renderer:invalid-parameters",
"Maximum 10 fields are supported");a=R({},b);a.symbolType=a.symbolType||"2d";a.defaultSymbolEnabled=null==a.defaultSymbolEnabled?!0:a.defaultSymbolEnabled;a.includeOpacityVariable=b.includeOpacityVariable||!1;a.includeSizeVariable=b.includeSizeVariable||!1;a.sortBy=null==a.sortBy?"count":a.sortBy;c=[0,2,1,3];f=y.createLayerAdapter(a.layer,c);a.layer=f;if(!f)throw new e("predominance-renderer:invalid-parameters","'layer' must be one of these types: "+y.getLayerTypeLabels(c).join(", "));return[4,f.load()];
case 1:g.sent();d=f.geometryType;k=-1<a.symbolType.indexOf("3d");a.outlineOptimizationEnabled="polygon"===d?a.outlineOptimizationEnabled:!1;if("mesh"===d)a.symbolType="3d-volumetric",a.colorMixMode=a.colorMixMode||"replace",a.edgesType=a.edgesType||"none";else{if(k&&("polyline"===d||"polygon"===d))throw new e("predominance-renderer:not-supported","3d symbols are not supported for polyline and polygon layers");if(-1<a.symbolType.indexOf("3d-volumetric")&&(!a.view||"3d"!==a.view.type))throw new e("predominance-renderer:invalid-parameters",
"'view' parameter should be an instance of SceneView when 'symbolType' parameter is '3d-volumetric' or '3d-volumetric-uniform'");}h=a.fields.map(function(a){return a.name});if(l=w.verifyBasicFieldValidity(f,h,"predominance-renderer:invalid-parameters"))throw l;return[2,a]}})})}function ca(b){var a=b.predominanceScheme,c=b.basemap;a?a=z.cloneScheme(a):(a=(b=z.getSchemes({basemap:b.basemap,geometryType:b.geometryType,numColors:b.numColors,theme:b.theme,worldScale:b.worldScale,view:b.view}))&&b.primaryScheme,
c=b&&b.basemapId);return{scheme:a,basemapId:c}}function da(b,a,c,f){return m(this,void 0,void 0,function(){var d,k,h,l,g,P,n,p,q,t,r,u,A,B,e,m,J,F,G,H,K,L,v,C,x,M,N,y,z,Q;return E(this,function(D){switch(D.label){case 0:return d=b.layer,k={layer:b.layer,view:b.view},n=(P=O).all,p=[d.getPredominantCategories(f,b.view)],b.outlineOptimizationEnabled?[4,U(k)]:[3,2];case 1:return q=D.sent(),[3,3];case 2:q=null,D.label=3;case 3:return[4,n.apply(P,[p.concat([q])])];case 4:return h=D.sent(),l=h[0],g=h[1],
(t=l)&&l.predominantCategoryInfos||(t={predominantCategoryInfos:f.map(function(a){return{value:a,count:0}})}),r=g&&g.opacity,[4,T.createRenderer({layer:d,basemap:b.basemap,valueExpression:a.valueExpression,valueExpressionTitle:I.predominantCategory,numTypes:-1,defaultSymbolEnabled:b.defaultSymbolEnabled,sortBy:b.sortBy,typeScheme:c,statistics:{uniqueValueInfos:t.predominantCategoryInfos},legendOptions:b.legendOptions,outlineOptimizationEnabled:!1,symbolType:b.symbolType,colorMixMode:b.colorMixMode,
edgesType:b.edgesType,view:b.view})];case 5:u=D.sent();A=u.renderer;B=A.uniqueValueInfos;e={};m=0;for(J=b.fields;m<J.length;m++)F=J[m],G=d.getField(F.name),e[G.name]=F.label||G&&G.alias||F.name;H=0;for(K=B;H<K.length;H++)L=K[H],L.label=e[L.value];b.includeSizeVariable&&(v=d.geometryType,C=null,"polygon"===v?(x=c,M=x.sizeScheme,N=M.background,A.backgroundFillSymbol=w.createSymbol(v,{type:b.symbolType,color:N.color,outline:w.getSymbolOutlineFromScheme(N,v,r)}),C=M.marker.size,v="point"):"polyline"===
v?(y=c,C=y.width):(z=c,C=z.size),Q=w.createColors(c.colors,B.length),B.forEach(function(a,d){a.symbol=w.createSymbol(v,{type:b.symbolType,color:Q[d],size:C,outline:w.getSymbolOutlineFromScheme(c,v,r),meshInfo:{colorMixMode:b.colorMixMode,edgesType:b.edgesType}})}));g&&g.visualVariables&&g.visualVariables.length&&(A.visualVariables=g.visualVariables.map(function(a){return a.clone()}));return[2,{renderer:A,predominantCategoryInfos:B,excludedCategoryInfos:u.excludedUniqueValueInfos,predominanceScheme:c,
basemapId:u.basemapId}]}})})}function ea(b,a,c){return S.createVisualVariables({layer:b.layer,basemap:b.basemap,valueExpression:a.valueExpression,sqlExpression:a.statisticsQuery.sqlExpression,sqlWhere:a.statisticsQuery.sqlWhere,sizeScheme:c,sizeOptimizationEnabled:b.sizeOptimizationEnabled,worldScale:-1<b.symbolType.indexOf("3d-volumetric"),legendOptions:{title:I.sumOfCategories},view:b.view})}function fa(b,a){return m(this,void 0,void 0,function(){var c,f,d,k,h,l,g,e;return E(this,function(n){switch(n.label){case 0:return[4,
V({layer:b.layer,valueExpression:a.valueExpression,sqlExpression:a.statisticsQuery.sqlExpression,sqlWhere:a.statisticsQuery.sqlWhere,view:b.view})];case 1:return c=n.sent(),f=null==c.avg||null==c.stddev,d=1/b.fields.length*100,k=f?100:c.avg+1.285*c.stddev,100<k&&(k=100),h=Z.round([d,k],{strictBounds:!0}),l=new aa({valueExpression:a.valueExpression,stops:[{value:h[0],opacity:.15},{value:h[1],opacity:1}],legendOptions:{title:I.strengthOfPredominance}}),g=new Y({type:"opacity",minSliderValue:c.min,maxSliderValue:c.max}),
e=new X({visualVariables:[g]}),[2,{visualVariable:l,statistics:c,defaultValuesUsed:f,authoringInfo:e}]}})})}Object.defineProperty(x,"__esModule",{value:!0});x.createRenderer=function(b){return m(this,void 0,void 0,function(){var a,c,f,d,k,h,e,g,m,n,p,q,t,r,u;return E(this,function(l){switch(l.label){case 0:return[4,ba(b)];case 1:return a=l.sent(),c=a.layer,f=ca({basemap:a.basemap,geometryType:c.geometryType,numColors:a.fields.length,predominanceScheme:a.predominanceScheme,worldScale:-1<a.symbolType.indexOf("3d-volumetric"),
view:a.view}),d=f.scheme,k=a.fields.map(function(a){return a.name}),h=W.getPredominanceExpressions(c,k),e=da(a,h.predominantCategory,d,k),g=a.includeSizeVariable?ea(a,h.size,d.sizeScheme):null,m=a.includeOpacityVariable?fa(a,h.opacity):null,[4,O.all([e,g,m])];case 2:return n=l.sent(),p=n[0],q=n[1],t=n[2],r=[],q&&(Array.prototype.push.apply(r,q.visualVariables.map(function(a){return a.clone()})),delete q.sizeScheme,p.size=q),t&&(r.push(t.visualVariable),p.opacity=t),r.length&&(u=p.renderer.visualVariables||
[],Array.prototype.push.apply(u,r),p.renderer.visualVariables=u),[2,p]}})})}});