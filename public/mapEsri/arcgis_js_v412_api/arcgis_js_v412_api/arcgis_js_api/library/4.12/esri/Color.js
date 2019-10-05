// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See https://js.arcgis.com/4.12/esri/copyright.txt for details.
//>>built
define(["require","exports","./core/mathUtils","./core/accessorSupport/ensureType"],function(k,p,m,n){function g(b){return m.clamp(n.ensureInteger(b),0,255)}function h(b,a,d){b=Number(b);return isNaN(b)?d:b<a?a:b>d?d:b}function l(b,a,d){0>d&&++d;1<d&&--d;var c=6*d;return 1>c?b+(a-b)*c:1>2*d?a:2>3*d?b+(a-b)*(2/3-d)*6:b}k=function(){function b(a){this.b=this.g=this.r=255;this.a=1;a&&this.setColor(a)}b.blendColors=function(a,d,c,e){void 0===e&&(e=new b);e.r=Math.round(a.r+(d.r-a.r)*c);e.g=Math.round(a.g+
(d.g-a.g)*c);e.b=Math.round(a.b+(d.b-a.b)*c);e.a=a.a+(d.a-a.a)*c;return e._sanitize()};b.fromRgb=function(a,d){var c=a.toLowerCase().match(/^(rgba?|hsla?)\(([\s\.\-,%0-9]+)\)/);if(c){a=c[2].split(/\s*,\s*/);c=c[1];if("rgb"===c&&3===a.length||"rgba"===c&&4===a.length)return c=a[0],"%"===c.charAt(c.length-1)?(c=a.map(function(a){return 2.56*parseFloat(a)}),4===a.length&&(c[3]=parseFloat(a[3])),b.fromArray(c,d)):b.fromArray(a.map(function(a){return parseFloat(a)}),d);if("hsl"===c&&3===a.length||"hsla"===
c&&4===a.length){var c=(parseFloat(a[0])%360+360)%360/360,e=parseFloat(a[1])/100,f=parseFloat(a[2])/100,e=.5>=f?f*(e+1):f+e-f*e,f=2*f-e,c=[256*l(f,e,c+1/3),256*l(f,e,c),256*l(f,e,c-1/3),1];4===a.length&&(c[3]=parseFloat(a[3]));return b.fromArray(c,d)}}return null};b.fromHex=function(a,d){void 0===d&&(d=new b);var c=4===a.length?4:8,e=(1<<c)-1,f=Number("0x"+a.substr(1));if(isNaN(f))return null;["b","g","r"].forEach(function(a){var b=f&e;f>>=c;d[a]=4===c?17*b:b});d.a=1;return d};b.fromArray=function(a,
d){void 0===d&&(d=new b);d._set(Number(a[0]),Number(a[1]),Number(a[2]),Number(a[3]));isNaN(d.a)&&(d.a=1);return d._sanitize()};b.fromString=function(a,d){var c=b.named[a];return c&&b.fromArray(c,d)||b.fromRgb(a,d)||b.fromHex(a,d)};b.toJSON=function(a){return a&&[g(a.r),g(a.g),g(a.b),1<a.a?a.a:g(255*a.a)]};b.fromJSON=function(a){return a&&new b([a[0],a[1],a[2],a[3]/255])};b.toUnitRGB=function(a){return[a.r/255,a.g/255,a.b/255]};b.toUnitRGBA=function(a){return[a.r/255,a.g/255,a.b/255,null!=a.a?a.a:
1]};b.prototype.setColor=function(a){"string"===typeof a?b.fromString(a,this):Array.isArray(a)?b.fromArray(a,this):(this._set(a.r,a.g,a.b,a.a),a instanceof b||this._sanitize());return this};b.prototype.toRgb=function(){return[this.r,this.g,this.b]};b.prototype.toRgba=function(){return[this.r,this.g,this.b,this.a]};b.prototype.toHex=function(){var a=this.r.toString(16),b=this.g.toString(16),c=this.b.toString(16);return"#"+(2>a.length?"0"+a:a)+(2>b.length?"0"+b:b)+(2>c.length?"0"+c:c)};b.prototype.toCss=
function(a){void 0===a&&(a=!1);var b=this.r+", "+this.g+", "+this.b;return a?"rgba("+b+", "+this.a+")":"rgb("+b+")"};b.prototype.toString=function(){return this.toCss(!0)};b.prototype.toJSON=function(){return[g(this.r),g(this.g),g(this.b),1<this.a?this.a:g(255*this.a)]};b.prototype.clone=function(){return new b(this.toRgba())};b.prototype._sanitize=function(){this.r=Math.round(h(this.r,0,255));this.g=Math.round(h(this.g,0,255));this.b=Math.round(h(this.b,0,255));this.a=h(this.a,0,1);return this};
b.prototype._set=function(a,b,c,e){this.r=a;this.g=b;this.b=c;this.a=e};b.named={transparent:[0,0,0,0],black:[0,0,0],silver:[192,192,192],gray:[128,128,128],white:[255,255,255],maroon:[128,0,0],red:[255,0,0],purple:[128,0,128],fuchsia:[255,0,255],green:[0,128,0],lime:[0,255,0],olive:[128,128,0],yellow:[255,255,0],navy:[0,0,128],blue:[0,0,255],teal:[0,128,128],aqua:[0,255,255],aliceblue:[240,248,255],antiquewhite:[250,235,215],aquamarine:[127,255,212],azure:[240,255,255],beige:[245,245,220],bisque:[255,
228,196],blanchedalmond:[255,235,205],blueviolet:[138,43,226],brown:[165,42,42],burlywood:[222,184,135],cadetblue:[95,158,160],chartreuse:[127,255,0],chocolate:[210,105,30],coral:[255,127,80],cornflowerblue:[100,149,237],cornsilk:[255,248,220],crimson:[220,20,60],cyan:[0,255,255],darkblue:[0,0,139],darkcyan:[0,139,139],darkgoldenrod:[184,134,11],darkgray:[169,169,169],darkgreen:[0,100,0],darkgrey:[169,169,169],darkkhaki:[189,183,107],darkmagenta:[139,0,139],darkolivegreen:[85,107,47],darkorange:[255,
140,0],darkorchid:[153,50,204],darkred:[139,0,0],darksalmon:[233,150,122],darkseagreen:[143,188,143],darkslateblue:[72,61,139],darkslategray:[47,79,79],darkslategrey:[47,79,79],darkturquoise:[0,206,209],darkviolet:[148,0,211],deeppink:[255,20,147],deepskyblue:[0,191,255],dimgray:[105,105,105],dimgrey:[105,105,105],dodgerblue:[30,144,255],firebrick:[178,34,34],floralwhite:[255,250,240],forestgreen:[34,139,34],gainsboro:[220,220,220],ghostwhite:[248,248,255],gold:[255,215,0],goldenrod:[218,165,32],
greenyellow:[173,255,47],grey:[128,128,128],honeydew:[240,255,240],hotpink:[255,105,180],indianred:[205,92,92],indigo:[75,0,130],ivory:[255,255,240],khaki:[240,230,140],lavender:[230,230,250],lavenderblush:[255,240,245],lawngreen:[124,252,0],lemonchiffon:[255,250,205],lightblue:[173,216,230],lightcoral:[240,128,128],lightcyan:[224,255,255],lightgoldenrodyellow:[250,250,210],lightgray:[211,211,211],lightgreen:[144,238,144],lightgrey:[211,211,211],lightpink:[255,182,193],lightsalmon:[255,160,122],lightseagreen:[32,
178,170],lightskyblue:[135,206,250],lightslategray:[119,136,153],lightslategrey:[119,136,153],lightsteelblue:[176,196,222],lightyellow:[255,255,224],limegreen:[50,205,50],linen:[250,240,230],magenta:[255,0,255],mediumaquamarine:[102,205,170],mediumblue:[0,0,205],mediumorchid:[186,85,211],mediumpurple:[147,112,219],mediumseagreen:[60,179,113],mediumslateblue:[123,104,238],mediumspringgreen:[0,250,154],mediumturquoise:[72,209,204],mediumvioletred:[199,21,133],midnightblue:[25,25,112],mintcream:[245,
255,250],mistyrose:[255,228,225],moccasin:[255,228,181],navajowhite:[255,222,173],oldlace:[253,245,230],olivedrab:[107,142,35],orange:[255,165,0],orangered:[255,69,0],orchid:[218,112,214],palegoldenrod:[238,232,170],palegreen:[152,251,152],paleturquoise:[175,238,238],palevioletred:[219,112,147],papayawhip:[255,239,213],peachpuff:[255,218,185],peru:[205,133,63],pink:[255,192,203],plum:[221,160,221],powderblue:[176,224,230],rebeccapurple:[102,51,153],rosybrown:[188,143,143],royalblue:[65,105,225],saddlebrown:[139,
69,19],salmon:[250,128,114],sandybrown:[244,164,96],seagreen:[46,139,87],seashell:[255,245,238],sienna:[160,82,45],skyblue:[135,206,235],slateblue:[106,90,205],slategray:[112,128,144],slategrey:[112,128,144],snow:[255,250,250],springgreen:[0,255,127],steelblue:[70,130,180],tan:[210,180,140],thistle:[216,191,216],tomato:[255,99,71],turquoise:[64,224,208],violet:[238,130,238],wheat:[245,222,179],whitesmoke:[245,245,245],yellowgreen:[154,205,50]};return b}();k.prototype.declaredClass="esri.Color";return k});