// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define("require exports ../../../../core/tsSupport/extendsHelper ../../../../core/tsSupport/assignHelper ../../../../core/tsSupport/generatorHelper ../../../../core/tsSupport/awaiterHelper ../../../../core/Error ../../../../core/lang ../../../../core/maybe ../../../../core/libs/gl-matrix-2/vec2 ../../../../core/libs/gl-matrix-2/vec2f64 ../../../../core/libs/gl-matrix-2/vec3 ../../../../core/libs/gl-matrix-2/vec3f32 ../../../../core/libs/gl-matrix-2/vec3f64 ../../../../layers/graphics/dehydratedFeatures ./Graphics3DObject3DGraphicLayer ./Graphics3DSymbolCommonCode ./Graphics3DSymbolLayer ./graphicUtils ../support/FastSymbolUpdates ../../support/mathUtils ../../support/projectionUtils ../../webgl-engine/Stage ../../webgl-engine/lib/Geometry ../../webgl-engine/lib/Object3D ../../webgl-engine/lib/pathGeometryUtils ../../webgl-engine/materials/DefaultMaterial ../../webgl-engine/materials/PathMaterial".split(" "),
function(K,L,da,ra,ea,fa,ga,ha,E,N,ia,c,O,A,M,ja,B,H,P,Q,R,S,T,ka,la,h,ma,na){function U(l,a,d,b,w,y,C,D){switch(a){case "world":b=0;for(w=l.vertices;b<w.length;b++)a=w[b],c.vec3.add(e,a.pos,l.offset),d.worldUpAtPosition(e,f),a.setFrameFromUpVector(f),a.computeRotationAxisAndAngleFromUpVector();break;case "terrain":for(var n=0,z=l.vertices;n<z.length;n++){var m=a=z[n],I=l.offset,t=b,u=w,q=d,r=y,g=C,k=D,p=e;c.vec3.set(f,m.posGS[0]+k,m.posGS[1],m.posGS[2]);V(f,t,u,q,r,g,W);c.vec3.set(f,m.posGS[0],m.posGS[1]+
k,m.posGS[2]);V(f,t,u,q,r,g,X);c.vec3.add(f,m.pos,I);c.vec3.subtract(G,W,f);c.vec3.normalize(G,G);c.vec3.subtract(J,X,f);c.vec3.normalize(J,J);c.vec3.cross(Y,G,J);c.vec3.copy(p,Y);a.setFrameFromUpVector(e);a.computeRotationAxisAndAngleFromUpVector()}break;case "path":for(c.vec3.add(e,l.vertices[0].pos,l.offset),d.worldUpAtPosition(e,f),h.computeMinimumRotationTangentFrame(l,f),d=0,l=l.vertices;d<l.length;d++)a=l[d],b=R.sign(c.vec3.dot(a.frame.right,a.vRight)),c.vec3.cross(a.rotationFrame.up,a.vRight,
a.vLeft),c.vec3.scale(a.rotationFrame.up,a.rotationFrame.up,b),c.vec3.normalize(a.rotationFrame.up,a.rotationFrame.up),w=c.vec3.dot(a.rotationFrame.up,a.frame.up),y=c.vec3.dot(a.rotationFrame.up,a.frame.right),c.vec3.scale(e,a.frame.up,-y),c.vec3.scale(Z,a.frame.right,w),c.vec3.add(e,e,Z),c.vec3.normalize(a.rotationFrame.right,e),c.vec3.negate(e,a.vLeft),a.rotationAngle=-b*(Math.PI-R.acos(c.vec3.dot(e,a.vRight))),a.maxStretchDistance=Math.abs(Math.min(a.vLeftLength,a.vRightLength)/Math.cos(.5*(Math.PI-
a.rotationAngle)))}}function aa(c,a,d){switch(c){case "symbolValue":return d;case "proportional":return a;default:return c}}function V(c,a,d,b,w,y,C){S.bufferToBuffer(c,w,0,f,y,0,1);S.bufferToBuffer(f,y,0,C,b.spatialReference,0,1);x.x=f[0];x.y=f[1];x.z=f[2];c=B.computeElevation(d,x,a,b,null);b.setAltitude(c,C)}function oa(h,a,d,b){h=h.stageObject;var w=h.getGeometryRecords(),y=w.length,C=0,D=x.spatialReference=d.spatialReference;pa.spatialReference=b.spatialReference;for(var n=0;n<y;n++){var z=w[n].geometry,
m=z.metadata,I=m.pathGeometry,t=I.builder.path,u=m.geometrySR;ba.spatialReference=u;for(var q=t,r=a,g=d,k=b,p=0,v=0,l=q.vertices;v<l.length;v++){var e=l[v];x.x=e.posES[0];x.y=e.posES[1];x.z=e.posES[2];var A=B.computeElevation(g,x,r,k,ca),p=p+ca.terrainElevation;c.vec3.add(f,e.pos,q.offset);k.setAltitude(A,f);c.vec3.subtract(e.pos,f,q.offset)}q.updatePathVertexInformation();C+=p/q.vertices.length;"world"!==t.upVector&&U(t,m.upVectorAlignment,b,a,d,u,D,m.stencilWidth);I.onPathChanged();z.invalidateBoundingInfo();
h.geometryVertexAttrsUpdated(n)}return C/y}Object.defineProperty(L,"__esModule",{value:!0});K=function(e){function a(d,b,a,c){d=e.call(this,d,b,a,c)||this;d._intrinsicSize=ia.vec2f64.fromValues(1,1);d.upVectorAlignment="path";d.stencilWidth=.1;return d}da(a,e);a.prototype.doLoad=function(){return fa(this,void 0,void 0,function(){var d,b,a,c,f,D,n,z,m,e,t,u,q,r;return ea(this,function(g){d=E.isSome(this.symbolLayer.width)?this.symbolLayer.width:E.isSome(this.symbolLayer.height)?this.symbolLayer.height:
this.symbolLayer.size;b=E.isSome(this.symbolLayer.height)?this.symbolLayer.height:d;this._vvConvertOptions={modelSize:[1,1,1],symbolSize:[d,1,b],unitInMeters:this._context.renderCoordsHelper.unitInMeters,transformation:{anchor:[0,0,0],scale:[1,1,1],rotation:[0,0,0]},supportedTypes:{size:!0,color:!0,opacity:!0,rotation:!1}};this._fastUpdates=this._context.renderer&&this._context.renderer.visualVariables&&0<this._context.renderer.visualVariables.length?Q.initFastSymbolUpdatesState(this._context.renderer,
this._vvConvertOptions):{enabled:!1};a=this.symbolLayer.anchor||"center";this.upVectorAlignment="path";"heading"===this.symbolLayer.profileRotation&&(this.upVectorAlignment="world");c=this.symbolLayer.profile||"circle";switch(c){default:this._profile=h.Profile.circle(qa);break;case "quad":this._profile=h.Profile.rect()}f=[0,0];"center"!==a&&(f={left:[.5,0],right:[-.5,0],top:[0,-.5],bottom:[0,.5]}[a],this._profile.translate(f[0],f[1]));D=this.symbolLayer.join||"simple";switch(D){case "round":this._extruder=
new h.MiterExtruder(0,3);break;case "bevel":this._extruder=new h.MiterExtruder(0,1);break;case "miter":this._extruder=new h.MiterExtruder(.8*Math.PI,1);break;default:this._extruder=new h.SimpleExtruder}n=this.symbolLayer.cap||"butt";switch(n){case "none":this._startCap=new h.NoCapBuilder;this._endCap=new h.NoCapBuilder;break;default:this._startCap=new h.TriangulationCapBuilder(this._profile,0);this._endCap=new h.TriangulationCapBuilder(this._profile,0,!0);break;case "square":this._startCap=new h.TriangulationCapBuilder(this._profile,
-.5);this._endCap=new h.TriangulationCapBuilder(this._profile,.5,!0);break;case "round":z="quad"===c?!0:!1,this._startCap=new h.RoundCapBuilder({profile:this._profile,flip:!1,breakNormals:z}),this._endCap=new h.RoundCapBuilder({profile:this._profile,flip:!0,breakNormals:z})}m=this._getStageIdHint();e=E.get(this.symbolLayer,"material","color");t=this._getCombinedOpacityAndColor(e);u=A.vec3f64.fromArray(t);q=t[3];r={diffuse:u,ambient:u,opacity:q,transparent:1>q||this._isPropertyDriven("opacity"),vertexColors:!1,
slicePlaneEnabled:this._context.slicePlaneEnabled,castShadows:this.symbolLayer.castShadows,cullFace:"none"===n?"none":void 0};if(!this._isPropertyDriven("size")&&(N.vec2.set(this._intrinsicSize,d,b),!P.isValidSize(this._intrinsicSize[0])||!P.isValidSize(this._intrinsicSize[1])))throw new ga("graphics3dpathsymbollayer:invalid-size","Symbol sizes may not be negative values");this._fastUpdates.enabled&&this._fastUpdates.visualVariables.size||N.vec2.scale(this._intrinsicSize,this._intrinsicSize,1/this._context.renderCoordsHelper.unitInMeters);
this._fastUpdates.enabled?(ha.mixin(r,this._fastUpdates.materialParameters,{size:[this._intrinsicSize[0],this._intrinsicSize[1],0]}),this._material=new na(r,m+"_pathmat")):(r.vertexColors=this._isPropertyDriven("color")||this._isPropertyDriven("opacity"),this._material=new ma(r,m+"_pathmat"));this._context.stage.add(T.ModelContentType.MATERIAL,this._material);return[2]})})};a.prototype.destroy=function(){e.prototype.destroy.call(this);this._material&&(this._context.stage.remove(T.ModelContentType.MATERIAL,
this._material.id),this._material=null)};a.prototype.createGraphics3DGraphic=function(a){var b=a.graphic;if("polyline"!==b.geometry.type)return this.logger.warn("unsupported geometry type for path symbol: "+b.geometry.type),null;if(!this._validateGeometry(b.geometry))return null;var d="graphic"+b.uid,c=this.getGraphicElevationContext(b);return this._createAs3DShape(b,a.renderingInfo,c,d,b.uid)};a.prototype.layerOpacityChanged=function(){var a=E.get(this.symbolLayer,"material","color"),a=this._getCombinedOpacity(a),
b=1>a||this._isPropertyDriven("opacity");this._material.setParameterValues({opacity:a,transparent:b});return!0};a.prototype.layerElevationInfoChanged=function(a,b,c){var d=this;a.forEach(function(a){var c=b(a);c&&(a=d.getGraphicElevationContext(a.graphic),c.needsElevationUpdates=B.needsElevationUpdates3D(a.mode),c.elevationContext.set(a))});return!0};a.prototype.slicePlaneEnabledChanged=function(a,b){this._material.setParameterValues({slicePlaneEnabled:this._context.slicePlaneEnabled});return!0};
a.prototype.pixelRatioChanged=function(a,b){return!0};a.prototype.applyRendererDiff=function(a,b){for(var c in a.diff)switch(c){case "visualVariables":if(Q.updateFastSymbolUpdatesState(this._fastUpdates,b,this._vvConvertOptions))this._material.setParameterValues(this._fastUpdates.materialParameters);else return!1;break;default:return!1}return!0};a.prototype.getVertexData=function(a){for(var b=0,c=a.paths,d=[],f=a.spatialReference,D=this._context.elevationProvider.spatialReference,h=this._context.renderSpatialReference,
e=0;e<c.length;e++)var m=c[e],b=b+m.length;for(var e=new Float64Array(3*b),l=new Float64Array(3*b),t=new Float64Array(3*b),u=0,q=0;q<c.length;q++){m=c[q];d.push({index:u,numVertices:m.length});for(var r=0;r<m.length;r++){var g=m[r];e[u++]=g[0];e[u++]=g[1];e[u++]=a.hasZ?g[2]:0}}a=!0;f.equals(D)?B.copyVertices(e,0,l,0,b):a=B.reproject(e,0,f,l,0,D,b);D.equals(h)?B.copyVertices(l,0,t,0,b):B.reproject(l,0,D,t,0,h,b);return{pathVertexDataInfos:d,vertexDataGS:e,vertexDataES:l,vertexDataRS:t,projectionSuccess:a,
terrainElevation:0}};a.prototype._createAs3DShape=function(a,b,e,l,A){var d=a.geometry,n=[],z=[],m=[],w=d.spatialReference,t=this._context.elevationProvider.spatialReference,u=Array(6),q=this._context.renderCoordsHelper;ba.spatialReference=w;x.spatialReference=t;d=this.getVertexData(d);if(!d.projectionSuccess)return this.logger.warn("PathSymbol3DLayer geometry failed to be created (failed to project geometry to view spatial reference)"),null;if(0<d.pathVertexDataInfos.length){for(var r=0;r<d.pathVertexDataInfos.length;++r){var g=
d.pathVertexDataInfos[r],k=g.index,g=g.numVertices;if(2>g)this.logger.warn("PathSymbol3DLayer geometry failed to be created (paths should contain at least 2 vertices)");else{if(this._context.clippingExtent&&(B.computeBoundingBox(d.vertexDataES,k,g,u),B.boundingBoxClipped(u,this._context.clippingExtent)))continue;for(var p=[],v=k;v<k+3*g;){var y=v++,C=v++,E=v++,F=new h.PathVertex;c.vec3.set(F.posGS,d.vertexDataGS[y],d.vertexDataGS[C],d.vertexDataGS[E]);c.vec3.set(F.posES,d.vertexDataES[y],d.vertexDataES[C],
d.vertexDataES[E]);x.x=F.posES[0];x.y=F.posES[1];x.z=F.posES[2];var G=B.computeElevation(this._context.elevationProvider,x,e,q,null);c.vec3.set(f,d.vertexDataRS[y],d.vertexDataRS[C],d.vertexDataRS[E]);q.setAltitude(G,f);c.vec3.set(F.pos,f[0],f[1],f[2]);p.push(F)}k=new h.Path(p);U(k,this.upVectorAlignment,this._context.renderCoordsHelper,e,this._context.elevationProvider,w,t,this.stencilWidth);k=new h.Builder(k,this._profile,this._extruder,this._startCap,this._endCap);g=null;this._fastUpdates.enabled?
(v=this._fastUpdates.visualVariables,g=v.size?H.getAttributeValue(v.size.field,a):0,p=v.color?H.getAttributeValue(v.color.field,a):0,v=v.opacity?H.getAttributeValue(v.opacity.field,a):0,g=new h.FastUpdatePathGeometry(k,g,p,v)):(g=[this._intrinsicSize[0],this._intrinsicSize[1]],this._isPropertyDriven("size")&&(g[0]*=aa(b.size[0],b.size[2],this.symbolLayer.width),g[1]*=aa(b.size[2],b.size[0],this.symbolLayer.height)),p=null,this._isPropertyDriven("color")&&(p=b.color),this._isPropertyDriven("opacity")&&
null!=b.opacity&&(p=p?[p[0],p[1],p[2],b.opacity]:[1,1,1,b.opacity]),k=new h.StaticPathGeometry(k),k.bakeVertexPositions(g),p&&k.bakeVertexColors(p),k.computeNormals(),g=k);k=g.createGeometryData();k=new ka(k,l+"path"+r);p={pathGeometry:g,geometrySR:w,upVectorAlignment:this.upVectorAlignment,stencilWidth:this.stencilWidth};k.singleUse=!0;k.metadata=p;n.push(k);z.push(this._material);m.push(g.xform)}}a={layerUid:this._context.layer.uid,graphicUid:A};if(0<n.length)return l=new la({geometries:n,materials:z,
transformations:m,castShadow:!0,metadata:a,idHint:l}),n=new ja(this,l,n,null,null,oa,e),n.alignedTerrainElevation=d.terrainElevation,n.needsElevationUpdates=B.needsElevationUpdates3D(e.mode),n}else this.logger.warn("PathSymbol3DLayer geometry failed to be created (no paths were defined)");return null};return a}(H.Graphics3DSymbolLayer);L.Graphics3DPathSymbolLayer=K;var pa=M.makeDehydratedPoint(0,0,0,null),x=M.makeDehydratedPoint(0,0,0,null),ba=M.makeDehydratedPoint(0,0,0,null),G=A.vec3f64.create(),
J=A.vec3f64.create(),Y=A.vec3f64.create(),f=A.vec3f64.create(),e=O.vec3f32.create(),Z=O.vec3f32.create(),W=A.vec3f64.create(),X=A.vec3f64.create(),qa=10,ca={verticalDistanceToGround:0,terrainElevation:0};L.default=K});