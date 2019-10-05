// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../../core/tsSupport/extendsHelper ../../../Graphic ./Adapted ./AttributeFilter ./OrderBy ../support/FeatureSet ../support/IdSet ../support/OrderbyClause ../support/sha ../support/shared ../support/sqlUtils ../support/sqlUtils ../support/stats ../support/StatsField ../../../core/promiseUtils ../../../core/sql/WhereClause ../../../geometry/SpatialReference ../../../layers/support/Field ../../../layers/support/FieldsIndex".split(" "),function(I,J,B,v,r,C,D,w,q,E,F,m,t,k,n,
x,h,p,G,y,H){var A=function(z){function g(b){var a=z.call(this,b)||this;a._decodedStatsfield=[];a._decodedGroupbyfield=[];a._candosimplegroupby=!0;a.phsyicalgroupbyfields=[];a.objectIdField="GENID";a._internalObjectIdField="GENID";a._adaptedFields=[];a.declaredClass="esri.arcade.featureset.actions.Aggregate";a._uniqueIds=1;a._maxQuery=10;a._maxProcessing=10;a._parent=b.parentfeatureset;a._config=b;return a}B(g,z);g.prototype.isTable=function(){return!0};g.prototype._getSet=function(b){var a=this;
return null===this._wset?this._getFilteredSet("",null,null,null,b).then(function(b){a._wset=b;return a._wset}):h.resolve(this._wset)};g.prototype._isInFeatureSet=function(b){return m.IdState.InFeatureSet};g.prototype.nextUniqueName=function(b){for(;1===b["T"+this._uniqueIds.toString()];)this._uniqueIds++;var a="T"+this._uniqueIds.toString();b[a]=1;return a};g.prototype.convertToEsriFieldType=function(b){return b};g.prototype._initialiseFeatureSet=function(){var b={},a=!1,d=1,c=this._parent?this._parent.getFieldsIndex():
new H([]);for(this.objectIdField="GENID";!1===a;){for(var f=!1,e=0;e<this._config.groupbyfields.length;e++)if(this._config.groupbyfields[e].name.toLowerCase()===this.objectIdField.toLowerCase()){f=!0;break}if(!1===f)for(e=0;e<this._config.statsfields.length;e++)if(this._config.statsfields[e].name.toLowerCase()===this.objectIdField.toLowerCase()){f=!0;break}!1===f?a=!0:(this.objectIdField="GENID"+d.toString(),d++)}a=0;for(d=this._config.statsfields;a<d.length;a++)e=d[a],f=new x,f.field=e.name,f.tofieldname=
e.name,f.workingexpr=e.expression instanceof p.WhereClause?e.expression:p.WhereClause.create(e.expression,c),f.typeofstat=e.statistic.toUpperCase(),this._decodedStatsfield.push(f);this._decodedGroupbyfield=[];a=0;for(d=this._config.groupbyfields;a<d.length;a++)e=d[a],e={name:e.name,singlefield:null,tofieldname:e.name,expression:e.expression instanceof p.WhereClause?e.expression:p.WhereClause.create(e.expression,c)},this._decodedGroupbyfield.push(e);if(null!==this._parent){this.geometryType=this._parent.geometryType;
this.spatialReference=this._parent.spatialReference;this.hasM=this._parent.hasM;this.hasZ=this._parent.hasZ;this.typeIdField="";c=0;for(a=this._parent.fields;c<a.length;c++)e=a[c],b[e.name.toUpperCase()]=1;this.types=null}else this.geometryType=m.layerGeometryEsriConstants.point,this.typeIdField="",this.types=null,this.spatialReference=new G({wkid:4326});this.fields=[];c=new x;c.field=this.nextUniqueName(b);c.tofieldname=this.objectIdField;c.workingexpr=p.WhereClause.create(this._parent.objectIdField,
this._parent.getFieldsIndex());c.typeofstat="MIN";this._decodedStatsfield.push(c);e=0;for(f=this._decodedGroupbyfield;e<f.length;e++){a=f[e];c=new y;a.name=this.nextUniqueName(b);c.name=a.tofieldname;c.alias=c.name;if(t.isSingleField(a.expression)){d=this._parent.getField(k.toWhereClause(a.expression,m.FeatureServiceDatabaseType.Standardised));if(!d)throw Error("Field is not present for Aggregation");a.name=d.name;a.singlefield=d.name;this.phsyicalgroupbyfields.push(d.name);c.type=d.type}else c.type=
this.convertToEsriFieldType(k.predictType(a.expression,this._parent.fields)),this.phsyicalgroupbyfields.push(a.name),this._adaptedFields.push(new r.SqlExpressionAdapted(c,a.expression)),this._candosimplegroupby=!1;this.fields.push(c)}if(0<this._adaptedFields.length)for(c=0,a=this._parent.fields;c<a.length;c++)e=a[c],this._adaptedFields.push(new r.OriginalField(e));for(e=0;e<this._decodedStatsfield.length;e++){c=new y;d=null;a=this._decodedStatsfield[e];a.field=this.nextUniqueName(b);a.tofieldname===
this.objectIdField&&(this._internalObjectIdField=a.field);c.name=a.tofieldname;c.alias=c.name;a=null!==a.workingexpr?t.isSingleField(a.workingexpr)?k.toWhereClause(a.workingexpr,m.FeatureServiceDatabaseType.Standardised):"":"";switch(this._decodedStatsfield[e].typeofstat){case "SUM":if(""!==a){d=this._parent.getField(a);if(!d)throw Error("Field is not present for Aggregation");c.type=d.type}else c.type="double";break;case "MIN":case "MAX":if(""!==a){d=this._parent.getField(a);if(!d)throw Error("Field is not present for Aggregation");
c.type=d.type}else c.type="double";break;case "COUNT":c.type="integer";break;case "STDEV":case "VARIANCE":case "MEAN":case "AVERAGE":if(""!==a&&(d=this._parent.getField(a),!d))throw Error("Field is not present for Aggregation");c.type="double"}this.fields.push(c)}};g.prototype._canDoAggregates=function(b,a,d,c,f){return h.resolve(!1)};g.prototype._getFeatures=function(b,a,d,c){var f=this,e=[];-1!==a&&void 0===this._featureCache[a]&&e.push(a);e=this._maxQuery;return!0===this._checkIfNeedToExpandKnownPage(b,
e,c)?this._expandPagedSet(b,e,0,0,c).then(function(e){return f._getFeatures(b,a,d,c)}):h.resolve("success")};g.prototype._getFilteredSet=function(b,a,d,c,f){var e=this;if(""!==b)return h.resolve(new q([],[],!0,null));var g=null,l=!1,u=!1;return this._ensureLoaded().then(function(){if(null!==d)for(var a=0;a<e._decodedStatsfield.length;a++)if(!0===t.scanForField(d,e._decodedStatsfield[a].tofieldname)){u=!0;d=null;break}if(null!==c){l=!0;for(a=0;a<e._decodedStatsfield.length;a++)if(!0===c.scanForField(e._decodedStatsfield[a].tofieldname)){c=
null;l=!1;break}for(var a=0,b=e._decodedGroupbyfield;a<b.length;a++){var f=b[a];if(null===f.singlefield&&!0===c.scanForField(f.tofieldname)){c=null;l=!1;break}}}return!1===e._candosimplegroupby?h.resolve(!1):e._parent._canDoAggregates(e.phsyicalgroupbyfields,e._decodedStatsfield,"",null,null)}).then(function(a){if(a)return a=null,d&&(a=e._reformulateWhereClauseWithoutGroupByFields(d)),e._parent._getAggregatePagesDataSourceDefinition(e.phsyicalgroupbyfields,e._decodedStatsfield,"",null,a,c,e._internalObjectIdField).then(function(a){e._checkCancelled(f);
return g=!0===u?new q(a._candidates.slice(0).concat(a._known.slice(0)),[],!0===l?a._ordered:!1,e._clonePageDefinition(a.pagesDefinition)):new q(a._candidates.slice(0),a._known.slice(0),!0===l?a._ordered:!1,e._clonePageDefinition(a.pagesDefinition))});a=e._parent;0<e._adaptedFields.length&&(a=new r.AdaptedFeatureSet({parentfeatureset:e._parent,adaptedFields:e._adaptedFields,extraFilter:null}));!0!==u&&null!==d&&(a=new C({parentfeatureset:a,whereclause:d}));return g=new q(["GETPAGES"],[],!1,{aggregatefeaturesetpagedefinition:!0,
resultOffset:0,resultRecordCount:e._maxQuery,internal:{fullyResolved:!1,workingItem:null,type:"manual",iterator:null,set:[],subfeatureset:new D({parentfeatureset:a,orderbyclause:new E(e.phsyicalgroupbyfields.join(",")+","+e._parent.objectIdField+" ASC")})}})})};g.prototype._reformulateWhereClauseWithoutStatsFields=function(b){for(var a=0,d=this._decodedStatsfield;a<d.length;a++){var c=d[a];b=k.reformulateWithoutField(b,c.tofieldname,k.toWhereClause(c.workingexpr,m.FeatureServiceDatabaseType.Standardised),
this._parent.getFieldsIndex())}return b};g.prototype._reformulateWhereClauseWithoutGroupByFields=function(b){for(var a=0,d=this._decodedGroupbyfield;a<d.length;a++){var c=d[a];c.tofieldname!==c.name&&(b=k.reformulateWithoutField(b,c.tofieldname,k.toWhereClause(c.expression,m.FeatureServiceDatabaseType.Standardised),this._parent.getFieldsIndex()))}return b};g.prototype._clonePageDefinition=function(b){return null===b?null:!0===b.aggregatefeaturesetpagedefinition?{aggregatefeaturesetpagedefinition:!0,
resultRecordCount:b.resultRecordCount,resultOffset:b.resultOffset,internal:b.internal}:this._parent._clonePageDefinition(b)};g.prototype._refineSetBlock=function(b,a,d){var c=this;try{if(!0===this._checkIfNeedToExpandCandidatePage(b,this._maxQuery,d))return this._expandPagedSet(b,this._maxQuery,0,0,d).then(function(f){return c._refineSetBlock(b,a,d)});this._checkCancelled(d);this._refineKnowns(b,a);return h.resolve(b)}catch(f){return h.reject(f)}};g.prototype._expandPagedSet=function(b,a,d,c,f){return this._expandPagedSetFeatureSet(b,
a,d,c,f)};g.prototype._getPhysicalPage=function(b,a,d){var c=this;return!0===b.pagesDefinition.aggregatefeaturesetpagedefinition?this._sequentialGetPhysicalItem(b,b.pagesDefinition.resultRecordCount,d):this._getAgregagtePhysicalPage(b,a,d).then(function(a){for(var b=0;b<a.length;b++){for(var d=a[b],f={geometry:d.geometry,attributes:{}},g=0,h=c._decodedGroupbyfield;g<h.length;g++){var k=h[g];f.attributes[k.tofieldname]=d.attributes[k.name]}g=0;for(h=c._decodedStatsfield;g<h.length;g++)k=h[g],f.attributes[k.tofieldname]=
d.attributes[k.field];c._featureCache[f.attributes[c.objectIdField]]=new v(f)}return a.length})};g.prototype._sequentialGetPhysicalItem=function(b,a,d){var c=this;null===b.pagesDefinition.internal.iterator&&(b.pagesDefinition.internal.iterator=b.pagesDefinition.internal.subfeatureset.iterator(d));return!0===b.pagesDefinition.internal.fullyResolved||0===a?h.resolve("success"):b.pagesDefinition.internal.iterator.next().then(function(f){if(null===f){if(null!==b.pagesDefinition.internal.workingItem)return c._calculateAndAppendAggregateItemDeferred(b.pagesDefinition.internal.workingItem).then(function(a){b.pagesDefinition.internal.workingItem=
null;b.pagesDefinition.internal.set.push(a);b.pagesDefinition.internal.fullyResolved=!0;return"success"});b.pagesDefinition.internal.fullyResolved=!0;return"success"}var e=c._generateAggregateHash(f);if(null===b.pagesDefinition.internal.workingItem)b.pagesDefinition.internal.workingItem={features:[f],id:e};else{if(e!==b.pagesDefinition.internal.workingItem.id)return c._calculateAndAppendAggregateItemDeferred(b.pagesDefinition.internal.workingItem).then(function(g){b.pagesDefinition.internal.workingItem=
null;b.pagesDefinition.internal.set.push(g);--a;b.pagesDefinition.internal.workingItem={features:[f],id:e};return c._sequentialGetPhysicalItem(b,a,d)});b.pagesDefinition.internal.workingItem.features.push(f)}return c._sequentialGetPhysicalItem(b,a,d)})};g.prototype._calculateFieldStat=function(b,a,d){for(var c=[],f=0;f<b.features.length;f++)if(null!==a.workingexpr){var e=a.workingexpr.calculateValue(b.features[f]);null!==e?c.push(e):"COUNT"!==a.typeofstat&&c.push(e)}else c.push(null);switch(a.typeofstat){case "MIN":d.attributes[a.tofieldname]=
n.calculateStat("min",c,-1);break;case "MAX":d.attributes[a.tofieldname]=n.calculateStat("max",c,-1);break;case "SUM":d.attributes[a.tofieldname]=n.calculateStat("sum",c,-1);break;case "COUNT":d.attributes[a.tofieldname]=c.length;break;case "VARIANCE":d.attributes[a.tofieldname]=n.calculateStat("variance",c,-1);break;case "STDEV":d.attributes[a.tofieldname]=n.calculateStat("stdev",c,-1);break;case "MEAN":case "AVERAGE":d.attributes[a.tofieldname]=n.calculateStat("mean",c,-1)}return!0};g.prototype._calculateAndAppendAggregateItemDeferred=
function(b){try{for(var a={attributes:{},geometry:null},d=0,c=this._decodedGroupbyfield;d<c.length;d++){var f=c[d],e=f.singlefield?b.features[0].attributes[f.singlefield]:f.expression.calculateValue(b.features[0]);a.attributes[f.tofieldname]=e}for(var d=0,g=this._decodedStatsfield;d<g.length;d++)this._calculateFieldStat(b,g[d],a);g=[];for(d=0;d<this._decodedStatsfield.length;d++)g.push(this._calculateFieldStat(b,this._decodedStatsfield[d],a));this._featureCache[a.attributes[this.objectIdField]]=new v({attributes:a.attributes,
geometry:a.geometry});return h.resolve(a.attributes[this.objectIdField])}catch(l){return h.reject(l)}};g.prototype._generateAggregateHash=function(b){for(var a="",d=0,c=this._decodedGroupbyfield;d<c.length;d++)var f=c[d],f=f.singlefield?b.attributes[f.singlefield]:f.expression.calculateValue(b),a=null===f||void 0===f?a+":":a+(":"+f.toString());return(new F(a,"TEXT")).getHash("SHA-1","B64")};g.prototype._stat=function(b,a,d,c,f,e,g){return h.resolve({calculated:!1})};return g}(w);w._featuresetFunctions.groupby=
function(h,g){return new A({parentfeatureset:this,groupbyfields:h,statsfields:g})};return A});