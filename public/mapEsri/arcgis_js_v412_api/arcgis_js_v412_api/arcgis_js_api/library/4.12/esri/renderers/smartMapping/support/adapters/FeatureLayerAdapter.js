// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../../../core/tsSupport/assignHelper ../../../../core/tsSupport/declareExtendsHelper ../../../../core/tsSupport/decorateHelper ../../../../core/tsSupport/generatorHelper ../../../../core/tsSupport/awaiterHelper ../../../../geometry ../../../../core/Error ../../../../core/maybe ../../../../core/promiseUtils ../../../../core/watchUtils ../../../../core/accessorSupport/decorators ../../../../geometry/support/quantizationUtils ../../../../geometry/support/spatialReferenceUtils ../../../../layers/support/arcgisLayerUrl ../../../../layers/support/fieldUtils ../../statistics/support/utils ../utils ./LayerAdapter ./support/predominanceUtils ./support/utils ../../../../tasks/GenerateRendererTask ../../../../tasks/support/GenerateRendererParameters ../../../../tasks/support/QuantizationParameters ../../../../tasks/support/Query ../../../../tasks/support/StatisticDefinition ../../../../tasks/support/UniqueValueDefinition".split(" "),
function(U,V,w,J,F,K,L,M,m,N,h,x,A,G,H,O,y,l,u,P,B,k,Q,C,R,S,D,T){return function(I){function f(a){return I.call(this,a)||this}J(f,I);f.prototype.destroy=function(){this._hasLocalSource=null};f.prototype._isStatsSupportedOnService=function(){var a=this.layer;return!a.get("capabilities.query.supportsStatistics")||"multipatch"===this.geometryType&&!O.isHostedAgolService(a.url)&&10.5>a.version?h.reject(new m("feature-layer-adapter:not-supported","Layer does not support statistics query")):h.resolve()};
f.prototype._fetchFeaturesFromMemory=function(a,c){var b=this.layer;return this._hasLocalSource?h.resolve(b.source):a?a.whenLayerView(b).then(function(a){var b=x.whenFalseOnce(a,"updating").then(function(){return a.queryFeatures(c)}).then(function(a){return a.features});return h.timeout(b,1E4,null)}):h.reject(new m("feature-layer-adapter:insufficient-data","view is required to fetch the features from layerView"))};f.prototype._fetchFeaturesFromService=function(a){return this.layer.queryFeatures(a).then(function(a){return a&&
a.features})};f.prototype._fetchFeaturesForStats=function(a){var c=this,b=this.layer,d=u.getFieldsList({field:a.field,normalizationField:a.normalizationField,valueExpression:a.valueExpression}),b=b.createQuery();b.returnGeometry=!1;b.outFields=d;return this.layer.queryFeatures(b).then(function(a){return a&&a.features}).catch(function(b){return c._fetchFeaturesFromMemory(a.view)})};f.prototype._summaryStatsFromGenRend=function(a){var c=a.normalizationType,b=a.normalizationField;return this.classBreaks({field:a.field,
numClasses:5,classificationMethod:"standard-deviation",standardDeviationInterval:.25,normalizationType:c,normalizationField:"field"===c?b:void 0,minValue:a.minValue,maxValue:a.maxValue}).then(function(a){var b,c,d;a.classBreakInfos.some(function(a){a.hasAvg&&(b=a);return!!b});b&&(d=b.maxValue-b.minValue,c=b.minValue+d/2,d*=4);return k.processSummaryStatisticsResult({min:a.minValue,max:a.maxValue,avg:c,stddev:d})})};f.prototype._getSummaryStatsQuery=function(a,c){var b=a.field,d=(c=this.supportsSQLExpression&&
c?k.msSinceUnixEpochSQL(this,b):a.sqlExpression)||b,b=d?l.getRangeExpr(d,a.minValue,a.maxValue):null;a=l.mergeWhereClauses(a.sqlWhere,b);b=this.layer.createQuery();b.where=l.mergeWhereClauses(b.where,a);b.sqlFormat=c?"standard":null;b.outStatistics=k.statisticTypes.map(function(a){var b=new D;b.statisticType="variance"===a?"var":a;b.onStatisticField=d;b.outStatisticFieldName=a+"_value";return b});return b};f.prototype._summaryStatsFromServiceQuery=function(a,c){var b=this;return this._isStatsSupportedOnService().then(function(){return b.layer.queryFeatures(b._getSummaryStatsQuery(a,
c))}).then(function(a){return k.getSummaryStatisticsFromFeatureSet(a,c)}).then(k.processSummaryStatisticsResult)};f.prototype._summaryStatsFromClientQuery=function(a,c){var b=this,d=a.view;return d?d.whenLayerView(this.layer).then(function(d){var e=x.whenFalseOnce(d,"updating").then(function(){return d.queryFeaturesJSON(b._getSummaryStatsQuery(a,c))}).then(function(a){return k.getSummaryStatisticsFromFeatureSet(a,c)}).then(k.processSummaryStatisticsResult);h.timeout(e,1E4,null);return e}):h.reject(new m("feature-layer-adapter:insufficient-data",
"view is required to query stats from layerView"))};f.prototype._summaryStatsFromMemory=function(a,c){var b=a.field,d=a.valueExpression,g=(d||a.sqlExpression)&&!a.sqlExpression,e=a.view,d={field:b,valueExpression:d,normalizationField:a.normalizationField,view:e};return(this._hasLocalSource||a.features||"function"!==typeof b&&!g?a.features?h.resolve(a.features):this._fetchFeaturesFromMemory(e):this._fetchFeaturesForStats(d)).then(function(d){if(!d||!d.length)return h.reject(new m("feature-layer-adapter:insufficient-data",
"No features are available to calculate statistics"));var e=w({},a);if("percent-of-total"===e.normalizationType){var g=k.calculateStatsFromMemory({field:b},d).sum;if(null==g)return h.reject(new m("feature-layer-adapter:invalid","invalid normalizationTotal"));e.normalizationTotal=g}d=k.calculateStatsFromMemory(e,d,c);return k.processSummaryStatisticsResult(d)})};f.prototype._uvFromGenRenderer=function(a,c){var b=this,d=a.field,g=new T;g.attributeField=d;var e=new C;e.classificationDefinition=g;return this.generateRenderer(e).then(function(a){var c=
{},e=b.getField(d);a.uniqueValues.forEach(function(a){var b=a.value;if(null==b||""===b||"string"===typeof b&&(""===b.trim()||"\x3cnull\x3e"===b.toLowerCase()))b=null;null==c[b]?c[b]={count:a.count,data:y.isNumericField(e)&&b?Number(b):b}:c[b].count+=a.count});return{count:c}}).then(function(b){return k.createUVResult(b,"service-generate-renderer",c,a.returnAllCodedValues)})};f.prototype._getUVQuery=function(a){var c=a.field,b=a.sqlExpression,d="countOF"+(c||"Expr"),g=new D;g.statisticType="count";
g.onStatisticField=b?"1":c;g.outStatisticFieldName=d;d=this.layer.createQuery();d.where=l.mergeWhereClauses(d.where,a.sqlWhere);d.sqlFormat=b?"standard":null;d.outStatistics=[g];d.groupByFieldsForStatistics=[c||b];return d};f.prototype._uvFromServiceQuery=function(a,c){var b=this;return this._isStatsSupportedOnService().then(function(){return b.layer.queryFeatures(b._getUVQuery(a))}).then(function(c){return k.getUniqueValuesFromFeatureSet(c,b,a.field)}).then(function(b){return k.createUVResult(b,
"service-query",c,a.returnAllCodedValues)})};f.prototype._uvFromClientQuery=function(a,c){var b=this,d=a.view;return d?d.whenLayerView(this.layer).then(function(d){var e=x.whenFalseOnce(d,"updating").then(function(){return d.queryFeaturesJSON(b._getUVQuery(a))}).then(function(c){return k.getUniqueValuesFromFeatureSet(c,b,a.field)}).then(function(b){return k.createUVResult(b,"service-query",c,a.returnAllCodedValues)});h.timeout(e,1E4,null);return e}):h.reject(new m("feature-layer-adapter:insufficient-data",
"view is required to query stats from layerView"))};f.prototype._uvFromMemory=function(a,c){var b=a.valueExpression,d=a.sqlExpression,g=a.view,e={field:a.field,valueExpression:b,view:g};return(this._hasLocalSource||a.features||!b||d?a.features?h.resolve(a.features):this._fetchFeaturesFromMemory(g):this._fetchFeaturesForStats(e)).then(function(b){return k.calculateUniqueValuesFromMemory(a,b,c)})};f.prototype._calcBinsSQL=function(a,c){var b=[],d=c.length;c.forEach(function(c,e){c=l.mergeWhereClauses(a+
" \x3e\x3d "+c[0],a+(e===d-1?" \x3c\x3d ":" \x3c ")+c[1]);b.push("WHEN ("+c+") THEN "+(e+1))});return["CASE",b.join(" "),"ELSE 0 END"].join(" ")};f.prototype._getNormalizationTotal=function(a,c){return a&&"percent-of-total"===c?this.summaryStatistics({field:a}).then(function(a){return a.sum}):h.resolve(null)};f.prototype._getQueryParamsForExpr=function(a,c){if(!a.valueExpression&&!a.sqlExpression){var b=a.field,d=b?this.getField(b):null,d=y.isDateField(d);c={field:b,normalizationType:a.normalizationType,
normalizationField:a.normalizationField,normalizationTotal:c};return{sqlExpression:d?k.msSinceUnixEpochSQL(this,b):k.getFieldExpr(c),sqlWhere:d?null:a.sqlWhere||l.getSQLFilterForNormalization(a)}}return{valueExpression:a.valueExpression,sqlExpression:a.sqlExpression,sqlWhere:a.sqlWhere}};f.prototype._getDataRange=function(a,c,b){return null!=c&&null!=b?h.resolve({min:c,max:b}):this.summaryStatistics(a).then(function(a){return{min:a.min,max:a.max}})};f.prototype._histogramForExpr=function(a){var c=
this;return this._getNormalizationTotal(a.field,a.normalizationType).then(function(b){var d=c._getQueryParamsForExpr(a,b);return c._getDataRange(d,a.minValue,a.maxValue).then(function(g){var e=g.min,p=g.max,f=a.numBins||10;g=k.getEqualIntervalBins(e,p,f);g=c._calcBinsSQL(d.sqlExpression,g);var h=new D({statisticType:"count",outStatisticFieldName:"countOFExpr",onStatisticField:"1"}),n=c.layer.createQuery();n.where=l.mergeWhereClauses(n.where,d.sqlWhere);n.sqlFormat="standard";n.outStatistics=[h];n.groupByFieldsForStatistics=
[g];n.orderByFields=[g];return c._isStatsSupportedOnService().then(function(){return c.layer.queryFeatures(n)}).then(function(a){return k.getHistogramFromFeatureSet(a,e,p,f,b)})})})};f.prototype._histogramForField=function(a){var c=this,b=null,b=null!=a.minValue&&null!=a.maxValue?h.resolve({min:a.minValue,max:a.maxValue}):this.summaryStatistics(a).then(function(a){return a.count?{min:a.min,max:a.max}:h.reject(new m("feature-layer-adapter:insufficient-data","Either the layer has no features or none of the features have data for the field"))});
return b.then(function(b){return c._getBins({min:b.min,max:b.max},a.field,a.numBins)})};f.prototype._getBins=function(a,c,b){void 0===b&&(b=10);var d=a.min,g=a.max,e=a.normTotal,p=a.excludeZerosExpr,f=a.intervals||k.getEqualIntervalBins(d,g,b);return this._queryBins(f,a.sqlExpr||c,p).then(function(a){return{bins:a.map(function(a,b){return{minValue:f[b][0],maxValue:f[b][1],count:a.value}}),minValue:d,maxValue:g,normalizationTotal:e}})};f.prototype._queryBins=function(a,c,b){for(var d=this,g=[],e=a.length,
p=0;p<e;p++){var f=l.mergeWhereClauses(b,l.mergeWhereClauses(c+" \x3e\x3d "+a[p][0],null!==a[p][1]?c+(p===e-1?" \x3c\x3d ":" \x3c ")+a[p][1]:""));g.push(f)}return h.eachAlways(g.map(function(a){return d.queryFeatureCount(a)}))};f.prototype._binParamsFromGenRend=function(a,c){var b=a.field,d=a.normalizationType,g=a.normalizationField,e=l.getSQLFilterForNormalization({field:b,normalizationType:d,normalizationField:g});a=new C({classificationDefinition:k.createCBDefn({field:b,normalizationType:d,normalizationField:g,
classificationMethod:a.classificationMethod,standardDeviationInterval:a.standardDeviationInterval,breakCount:a.numBins||10}),where:l.mergeWhereClauses(e,c)});return this.generateRenderer(a).then(function(a){return k.generateBinParams({field:b,normalizationType:d,normalizationField:g,normalizationTotal:a.normalizationTotal,classBreaks:a.classBreaks,where:e})})};f.prototype._histogramFromMemory=function(a){var c=this,b=a.field,d=a.normalizationType,g=a.valueExpression,e=a.classificationMethod,p=a.minValue,
f=a.maxValue,t=a.view,n=g&&!a.sqlExpression,l={field:b,valueExpression:g,normalizationField:a.normalizationField,view:t};return(this._hasLocalSource||a.features||!n?a.features?h.resolve(a.features):this._fetchFeaturesFromMemory(t):this._fetchFeaturesForStats(l)).then(function(n){if(!n||!n.length)return h.reject(new m("feature-layer-adapter:insufficient-data","No features are available to calculate histogram"));var q=null!=p&&null!=f,l=null;e&&"equal-interval"!==e||d?(q=w({},a),q.features=n,l=c._getBinParamsFromMemory(q)):
l=q?h.resolve({min:p,max:f,source:"parameters"}):c.summaryStatistics({field:b,valueExpression:g,features:n,view:t}).then(function(a){return a.count?{min:a.min,max:a.max}:h.reject(new m("feature-layer-adapter:insufficient-data","No features are available to calculate histogram"))});return l.then(function(b){return k.calculateHistogramFromMemory(a,b,n)})})};f.prototype._getBinParamsFromMemory=function(a){var c=a.field,b=a.normalizationType,d=a.normalizationField;return this._classBreaksFromMemory({field:c,
valueExpression:a.valueExpression,normalizationType:b,normalizationField:d,classificationMethod:a.classificationMethod,standardDeviationInterval:a.standardDeviationInterval,minValue:a.minValue,maxValue:a.maxValue,numClasses:a.numBins,features:a.features,view:a.view}).then(function(a){var e=a.normalizationTotal;a=a.classBreakInfos;var g=l.getSQLFilterForNormalization({field:c,normalizationType:b,normalizationField:d});return k.generateBinParams({field:c,normalizationType:b,normalizationField:d,normalizationTotal:e,
classBreaks:a,where:g})})};f.prototype._classBreaksFromGenRend=function(a){var c=a.field,b=a.normalizationType,d=a.normalizationField,g=a.normalizationTotal,e=l.getSQLFilterForNormalization({field:c,normalizationType:b,normalizationField:d}),g=k.getFieldExpr({field:c,normalizationType:b,normalizationField:d,normalizationTotal:g}),g=l.getRangeExpr(g,a.minValue,a.maxValue),c=k.createCBDefn({field:c,normalizationType:b,normalizationField:d,classificationMethod:a.classificationMethod,standardDeviationInterval:a.standardDeviationInterval,
breakCount:a.numClasses||5}),b=new C;b.classificationDefinition=c;b.where=l.mergeWhereClauses(e,g);return this.generateRenderer(b).then(function(b){return k.resolveCBResult(a,b)})};f.prototype._classBreaksFromInterpolation=function(a){for(var c=a.minValue,b=a.maxValue,d=a.numClasses||5,g=[],e=(b-c)/d,f=0;f<d;f++){var q=c+f*e;g.push({minValue:q,maxValue:q+e})}g[d-1].maxValue=b;a=k.resolveCBResult(a,{classBreaks:g,normalizationTotal:a.normalizationTotal});return h.resolve(a)};f.prototype._classBreaksFromMemory=
function(a){var c=a.field,b=a.valueExpression,d=a.view,g={field:c,valueExpression:b,normalizationField:a.normalizationField,view:d};return(this._hasLocalSource||a.features||!b?a.features?h.resolve(a.features):this._fetchFeaturesFromMemory(d):this._fetchFeaturesForStats(g)).then(function(b){if(!b||!b.length)return h.reject(new m("feature-layer-adapter:insufficient-data","No features are available to calculate statistics"));var d=w({},a);if("percent-of-total"===d.normalizationType){var e=k.calculateStatsFromMemory({field:c},
b).sum;if(null==e)return h.reject(new m("feature-layer-adapter:invalid","invalid normalizationTotal"));d.normalizationTotal=e}return k.calculateClassBreaksFromMemory(d,b)})};f.prototype._heatmapStatsFromMemory=function(a,c){var b=this,d=a.blurRadius,g=a.field,e=a.view,f=e.state,q=f.size,t=new R.default({extent:e.extent,tolerance:f.resolution}),f=new S({returnGeometry:!0,geometry:e.extent,quantizationParameters:t});return(a.features?h.resolve(a.features):this._fetchFeaturesFromMemory(e,f)).then(function(a){a=
b._quantizeFeatures(a,t,e);return a&&a.length?(a=k.calculateHeatmapStats(a,d,c,g,q[0],q[1]))?{count:a.count,min:a.min,max:a.max,avg:a.mean,stddev:a.stdDev}:h.reject(new m("feature-layer-adapter:invalid","unable to calculate heatmap statistics")):{count:0,min:null,max:null,avg:null,stddev:null}})};f.prototype._quantizeFeatures=function(a,c,b){var d=this,g=G.toQuantizationTransform(c);c=b.spatialReference;var e=b.size,f=H.isWrappable(c);b=H.getInfo(c);var h=Math.round((b.valid[1]-b.valid[0])/g.scale[0]);
return a.map(function(a){var b=new M.Point(N.unwrap(a.geometry));G.quantizePoint(g,b,b,b.hasZ,b.hasM);a.geometry=f?d._wrapPoint(b,h,e[0]):b;return a})};f.prototype._wrapPoint=function(a,c,b){0>a.x?a.x+=c:a.x>b&&(a.x-=c);return a};f.prototype.getField=function(a){void 0===a&&(a="");return this.layer.getField(a)};f.prototype.getFieldUsageInfo=function(a){return this.getField(a)?{supportsLabelingInfo:!0,supportsRenderer:!0,supportsPopupTemplate:!0,supportsLayerQuery:!0,supportsStatistics:!0}:null};f.prototype.getFieldDomain=
function(a,c){return this.layer.getFieldDomain(a,c)};f.prototype.summaryStatistics=function(a){var c=this,b=a.field,d=b?this.getField(b):null,g=y.isDateField(d),e=(d=a.valueExpression||a.sqlExpression)&&!a.sqlExpression,b="function"===typeof b||e,e=(e=a.view)&&"3d"===e.type;return this._hasLocalSource||a.features||b?b||a.features||e?this._summaryStatsFromMemory(a,g):this._summaryStatsFromClientQuery(a,g):this.supportsSQLExpression||!g&&!d?(a.normalizationType?this._summaryStatsFromGenRend(a):this._summaryStatsFromServiceQuery(a,
g)).catch(function(b){return c._summaryStatsFromMemory(a,g)}):h.reject(new m("feature-layer-adapter:not-supported","Layer does not support standardized SQL expression for queries"))};f.prototype.uniqueValues=function(a){var c=this,b=a.field,d=a.valueExpression,g=a.sqlExpression,e=(b?this.getField(b):null)&&this.getFieldDomain(b),f=d&&(!g||!this.supportsSQLExpression),h=(b=a.view)&&"3d"===b.type;return this._hasLocalSource||a.features||f?f||a.features||h?this._uvFromMemory(a,e):this._uvFromClientQuery(a,
e):this._uvFromServiceQuery(a,e).catch(function(b){return a.field?c._uvFromGenRenderer(a,e):b}).catch(function(b){return f||a.features||h?c._uvFromMemory(a,e):c._uvFromClientQuery(a,e)})};f.prototype.histogram=function(a){var c=this,b=a.field,d=a.normalizationType,g=a.normalizationField,e=a.classificationMethod,f=b?this.getField(b):null,f=y.isDateField(f),q=a.valueExpression||a.sqlExpression,t=q&&!a.sqlExpression,n=this.supportsSQLExpression,z=!e||"equal-interval"===e,r=a.minValue,v=a.maxValue,u=
null!=r&&null!=v,E=a.numBins||10;return this._hasLocalSource||a.features||t?this._histogramFromMemory(a):(q||n)&&z?q&&!n?h.reject(new m("feature-layer-adapter:not-supported","Layer does not support standardized SQL expression for queries")):this._histogramForExpr(a):f&&z?h.reject(new m("feature-layer-adapter:not-supported","Normalization and date field are not allowed when layer does not support standardized SQL expression for queries")):d||!z?this._binParamsFromGenRend(a).then(function(e){if(!u)return c._getBins(e,
b,E);if(r>e.max||v<e.min)return h.reject(new m("histogram:insufficient-data","Range defined by 'minValue' and 'maxValue' does not intersect available data range of the field"));if(z)return c._getBins({min:r,max:v,sqlExpr:e.sqlExpr,excludeZerosExpr:e.excludeZerosExpr},b,E);e=k.getFieldExpr({field:b,normalizationType:d,normalizationField:g,normalizationTotal:e.normTotal});e=l.getRangeExpr(e,r,v);return c._binParamsFromGenRend(a,e).then(function(a){return c._getBins(a,b,E)})}):this._histogramForField(a)};
f.prototype.classBreaks=function(a){var c=this,b=!1!==a.analyzeData,d=this._hasLocalSource||a.features||a.valueExpression;return b&&d?this._classBreaksFromMemory(a):(b?this._classBreaksFromGenRend(a):this._classBreaksFromInterpolation(a)).catch(function(b){return c._classBreaksFromMemory(a)})};f.prototype.queryFeatureCount=function(a){if(this._hasLocalSource)return h.reject(new m("feature-layer-adapter:not-supported","Layer does not support count query"));var c=this.layer,b=c.createQuery();b.where=
l.mergeWhereClauses(b.where,a);return c.queryFeatureCount(b)};f.prototype.generateRenderer=function(a){var c=this.layer;if(this._hasLocalSource||10.1>c.version)return h.reject(new m("feature-layer-adapter:not-supported","Layer does not support generateRenderer operation (requires ArcGIS Server version 10.1+)"));var b=new Q({url:c.parsedUrl.path,source:c.dynamicDataSource,gdbVersion:c.gdbVersion}),c=c.createQuery();a.where=l.mergeWhereClauses(a.where,c.where);return b.execute(a)};f.prototype.heatmapStatistics=
function(a){var c=this,b=a.field,d=a.fieldOffset;return(b&&null==d?this.summaryStatistics({field:b}):h.resolve(null)).then(function(b){var e=d||0;if(b){var f=b.min,g=b.max;b.count?f===g&&0===f?e=1:0>=g?e="abs":0>f&&(e=-1.01*f):e=1}return c._heatmapStatsFromMemory(a,e).then(function(a){return w({},a,{summaryStatistics:b,fieldOffset:e})})})};f.prototype.getPredominantCategories=function(a,c){if(!this._hasLocalSource&&!this.supportsSQLExpression)return h.reject(new m("feature-layer-adapter:not-supported",
"Layer does not support advanced SQL expressions and standardized queries"));var b=B.getArcadeForPredominantCategory(a),d=B.getSQLForPredominantCategoryName(a),f=c&&"3d"===c.type;return(this._hasLocalSource?f?this._uvFromMemory({valueExpression:b,view:c}):this._uvFromClientQuery({valueExpression:b,view:c}):this._uvFromServiceQuery({sqlExpression:d.expression,valueExpression:b})).then(function(b){b=b.uniqueValueInfos;for(var c=b.map(function(a){return a.value}),d=0,e=a.filter(function(a){return-1===
c.indexOf(a)});d<e.length;d++)b.push({value:e[d],count:0});b.sort(function(b,c){return a.indexOf(b.value)-a.indexOf(c.value)});for(d=0;d<b.length;d++)e=b[d],e.value===B.noDominantCategoryField&&(e.value=null);return{predominantCategoryInfos:b}})};f.prototype.getSampleFeatures=function(a){return L(this,void 0,void 0,function(){var c,b,d,f,e,h,k,l,n,m,r,v,w=this;return K(this,function(g){switch(g.label){case 0:c=a.view,b=a.sampleSize,d=a.requiredFields,f=c.extent.width/c.width/c.scale*4E5,e=this.layer.createQuery(),
e.outFields=null,e.outSpatialReference=a.spatialReference||c.spatialReference,e.returnGeometry=!0,e.maxAllowableOffset=a.resolution||f,e.outFields=d,h=[],g.label=1;case 1:return g.trys.push([1,7,,8]),k=!0,d&&d.length?[4,c.whenLayerView(this.layer)]:[3,4];case 2:return l=g.sent(),[4,x.whenFalseOnce(l,"updating")];case 3:g.sent(),k=d.every(function(a){a=w.getField(a);return-1<l.availableFields.indexOf(a.name)}),g.label=4;case 4:return k?[4,this._fetchFeaturesFromMemory(c,e)]:[3,6];case 5:h=g.sent();
if(h.length&&0<b&&b<=h.length)return[2,u.pickRandomItems(h,b)];g.label=6;case 6:return[3,8];case 7:return g.sent(),[3,8];case 8:return g.trys.push([8,12,,13]),[4,this.queryFeatureCount()];case 9:return n=g.sent(),m=this.layer.maxRecordCount,r=-1===b?n:b,r=m&&r>m?m:r,n<=h.length||h.length>=m?[2,u.pickRandomItems(h,h.length)]:n<=r?[2,this._fetchFeaturesFromService(e)]:2E4>=n?[4,this.layer.queryObjectIds()]:[3,11];case 10:return v=g.sent(),e.objectIds=u.pickRandomItems(v,r),[2,this._fetchFeaturesFromService(e)];
case 11:return this.layer.get("capabilities.query.supportsPagination")&&(e.num=r),[2,this._fetchFeaturesFromService(e)];case 12:return g.sent(),[2,u.pickRandomItems(h,h.length)];case 13:return[2]}})})};f.prototype.load=function(a){var c=this;a=this.layer.load(a).then(function(a){c.geometryType=a.geometryType;c.objectIdField=a.objectIdField;c.supportsSQLExpression=a.get("capabilities.query.supportsSqlExpression");c._hasLocalSource=!a.url&&!!a.source;c.hasQueryEngine=c._hasLocalSource;c.minScale=a.minScale;
c.maxScale=a.maxScale;c.fullExtent=a.fullExtent});this.addResolvingPromise(a);return this.when()};F([A.property({constructOnly:!0})],f.prototype,"layer",void 0);return f=F([A.subclass("esri.renderers.smartMapping.support.adapters.FeatureLayerAdapter")],f)}(A.declared(P))});