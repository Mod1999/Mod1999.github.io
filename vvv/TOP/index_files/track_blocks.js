(function(l){function g(a,d,b){a=Array.isArray(a)?a:a.split(".");d=d||l;var k,m;b=!1!==b;for(var e=0;e<a.length&&(k=a[e],m=d[k],c(m,"object")||b&&(d[k]=m={}),d=m,null!==d&&!c(d,"undefined"));e+=1);return d}function u(a,d){var b=Array.isArray(a)?a:a.split("."),k=g(b.slice(0,b.length-1),d,!1),m;null===k||c(k,"undefined")||(m=k[b.pop()]);return m}function v(){var a,d,b,k,m,e,h;c(arguments[0],"boolean")&&(b=w.shift.apply(arguments));if(2>arguments.length)return arguments[0];a=w.shift.apply(arguments);
d=c(a);"object"!=d&&"function"!=d&&"array"!=d&&(a={});d=arguments;for(var D=0;D<d.length;D+=1)if(k=d[D],null!=k)for(var x in k)if(n.call(k,x)&&k[x]!==a){m=a[x];e=k[x];var B;if(!(B=h=Array.isArray(e))){var z=(B=e)&&c(B,"object")&&!(B.nodeType||B===B.window),F=void 0;try{z=z&&!(B.constructor&&!n.call(B,"constructor")&&!n.call(B.constructor.prototype,"isPrototypeOf"))}catch(G){z=!1}if(z){for(F in B);z=c(F,"undefined")||n.call(B,F)}B=z}B&&b?(m=h?Array.isArray(m)?m:[]:c(m,"object")?m:{},a[x]=v(!0,m,e)):
c(e,"undefined")||(a[x]=e)}return a}function f(){var a=[],d=!1,b,k,m,e,h,D,x,B;c(arguments[0],"boolean")&&(d=w.shift.call(arguments));a=w.reduce.call(arguments,function(k,e){var h=c(e),a=0<k.length&&c(k[0]);(a?h===a:"array"===h||"object"===h)&&k.push(e);return k},a);e=a.shift();x=Array.isArray(e);if(a.length)for(var z=0;z<a.length;z++){m=a[z];for(var F in m)n.call(m,F)&&(h=c(b=m[F]),D=c(k=e[F]),h===D&&("object"===h||(B="array"===h))&&b!==k&&d?e[F]=f(!0,B?[]:{},k,b):"undefined"!=D?x?e.push(b):e[F]=
[].concat(k,b):e[F]=b)}return e}function p(a,d){if("object"!==typeof a)throw new TypeError("invalid mixin");if("object"!==typeof d)throw new TypeError("invalid target");var b=Object.keys(d),k=Object.keys(a);return b.reduce(function(a,e){-1!==k.indexOf(e)&&(a=a.concat([e]));return a},[])}"DEBUG"in l||(l.DEBUG=!1);var r=0,A=Object.prototype,n=A.hasOwnProperty,w=Array.prototype,c=function(){for(var a="Object Array Boolean Date Function Number Null RegExp String Undefined Arguments Error Math JSON".split(" "),
d=A.toString,b={},k=a[0].toLowerCase(),m,e=a.length;e--;)m=a[e],b["["+k+" "+m+"]"]=m.toLowerCase();return function(e,a){var m=typeof e;if(m===k||"function"===m)m=null===e?"null":b[d.call(e)]||k;return a?a===m:m}}(),E=function(){var a=Array.isArray;c(a,"function")||(a=Array.isArray=function(a){return c(a,"array")});return function(d){return a(d)}}(),t=function(){var a=function(a,b){var k=u(["fest"].concat(a),l);if(c(k,"function"))return k(b);if(l.DEBUG)throw Error("\u0428\u0430\u0431\u043b\u043e\u043d "+
a+" \u043e\u0442\u0441\u0443\u0442\u0441\u0442\u0432\u0443\u0435\u0442.");};return function(d){if(d)return a.bind(null,d);if(l.DEBUG)throw Error("\u041d\u0435 \u0443\u043a\u0430\u0437\u0430\u043d\u043e \u0438\u043c\u044f \u0448\u0430\u0431\u043b\u043e\u043d\u0430");}}(),C=function(){return function(a){var d=a._options,b,k;if(null!=d)k=d;else{try{b=a.onclick,null!=b&&(k=b())}catch(m){DEBUG&&console.error("Broken onclick val:",a)}a.removeAttribute("onclick");a.onclick=null;a._options=k}return k}}(),
y=function(){function a(a){a||(a="location"in l&&l.location.hostname.split(".").slice(0,-2).join(".")||"");k=k||{};return g(a,k)}function d(k,e,h,b){b=a(b);var x=b[k];!x||h?x=b[k]=v(!0,{},e):v(!0,x,e);return x}function b(k,e){return a(e)[k]}var k;return{get:function(k,e){var a=b(k,e);return a&&a.options},set:function(k,a,h){var b=null;if(c(arguments[1],"string")||c(arguments[2],"object")||4===arguments.length)b=arguments[1],a=arguments[2],h=arguments[3];return d(k,{options:a},h,b).options},setParams:function(){return d.apply(null,
w.slice.call(arguments,0,3))},getParams:function(){return b.apply(null,w.slice.call(arguments,0,1))},registerModule:function(k,a){d(k,{initializer:a})}}}(),q=g("ru.mail.cpf");v(q,{Basic:{Extend:v,Merge:f,getOptions:C,moduleOpts:y,typeOf:c,getConstructor:function(a){var d=function(){var a=this,k;a instanceof d||(a=new d(d));"__id"in a||(a.__id=++r);if(arguments[0]!==d||1!==arguments.length)k=a._Init.apply(a,arguments),c(k,"object")?a=k:a._Init=null;return a};"_mixins"in a&&a._mixins.forEach(function(b){var k=
a,m=p(k,b);if(0<m.length)throw Error("methods '"+m.join("','")+"' exists in target");a=v(!0,{},b,k)});null===a||c(a,"undefined")||(d.prototype=a,d.prototype.constructor=d);return d},getByPath:u,debounce:function(a,d,b){var k=null;d=d||100;return function(){var m=this,e=arguments;null!==k?clearTimeout(k):b&&a.apply(m,e);k=setTimeout(function(){b||a.apply(m,e);k=null},d)}},throttle:function(a,d,b){d=d||100;var k,m=null;return function(){var e=b||this,h=+new Date,D=Array.prototype.slice.call(arguments);
k&&h<k+d?(clearTimeout(m),m=setTimeout(function(){k=h;a.apply(e,D)},d)):(clearTimeout(m),k=h,a.apply(e,arguments))}}},Tools:{getTemplate:t}});v(q,{Types:{Array:{isArray:E}}});l.getNameSpace=g})((new Function("return this"))());
(function(l){var g=l.getNameSpace;l=g("ru.mail.cpf",l);var u=l.Basic,v=u.typeOf;u.Extend(g("Types.String",l),function(){var f=String.prototype;return{getPlural:function(f,r){f%=100;if(10<f&&20>f)return r[2];switch(f%10){case 1:return r[0];case 2:case 3:case 4:return r[1];default:return r[2]}},trim:function(){var p=f.trim;v(p,"function")||(f.trim=function(){return this.replace(/^\s+|\s+$/g,"")});return function(r){return f.toString.call(r).trim()}}(),getNearest:function(f,r,g){var n,w,c=-1;g=g||0;
for(var E=0;E<r.length;E++)v(n=r[E],"string")&&-1<(w=f.indexOf(n,g))&&(c=Math[0>c?"max":"min"](w,c));return c},cutBySpace:function(f,r){var g;if(f.length<=r)return f;g=f.substr(0,r);" "!=f.charAt(r)&&(g=g.substr(0,g.lastIndexOf(" ")));return g},supplant:function(f,r){return f.replace(/\$\{([\w\d\-_]+)\}/g,function(f,n){return v(r[n],"undefined")?f:r[n]})},regExp:{Url:/^(?:http(?:s)?:\/\/)?(?:(?:[a-z0-9\-]+\.)+[a-z]{2,4})?\/?(?:[a-z0-9\-_]+(?:\/|(?:\.[a-z0-9]+)))*(?:\?.*)?$/i}}}())})((new Function("return this"))());
(function(l,g,u){function v(a,m,e,h){var b=a.isArray,x=h,d=t(e),z="array"===d;m&&(x=m,t(a.getParamName,"function")?x=a.getParamName(x,h):!z&&a.traditional&&b||(x+=["[",b&&!z?"":h,"]"].join("")));switch(d){case "array":case "object":e=f(e,a,x);break;default:a=[encodeURIComponent(x)],null!=e&&0!==e.length&&a.push("?"!==e?encodeURIComponent(e):e),e=a.join("=")}return e}function f(a,m,e){var h=[];m=C({},m);m.traditional=!1!==m.traditional;switch(t(a)){case "array":h=a.reduce(function(a,k,h){m.isArray=
!0;return a.concat(v(m,e,k,h))},[]);break;case "object":h=Object.keys(a).reduce(function(h,b){m.isArray=!1;return h.concat(v(m,e,a[b],b))},[])}return h}function p(a){var b={path:"",query:"",hash:""},e,h;if(!a)return b;a=a.replace(/\+/g," ").trim();"/"===a?(b.path="/",h=!0):0<=a.indexOf("?")?(e=a.split("?"),b.path=e[0],a=e[1]):y.test((e=a.split("#"))[0])||q.test(e[0])?(b.path=e[0]||"",b.hash=e[1]||"",h=!0):b.query=a;h||(e=a.split("#"),b.query=e[0]||"",b.hash=e[1]||"");return b}function r(a){a=a.replace(/]/g,
"").split("[");1===a.length&&(a=a[0].split("."));return a}function A(a){return a&&("number"===typeof a||d.test(a))?+a:a in b?b[a]:a}function n(a,b,e){var h=p(b);h.query=w(h.query,!1)||{};b=h.path;var d=h.hash,h=h.query;a=a||{};e=e||{};if(!1!==e.replace)for(var x in h)h.hasOwnProperty(x)&&x in a&&(h[x]=u);h=C(!0,{},h,a);a=f(h,e).join("&").replace(/%20/g,"+");return b+(b&&a?"?":"")+a+(d?"#"+d:"")}function w(b,d){var e={};if(t(d,"undefined")||d)b=p(b).query;if(!b)return null;b.split("&").forEach(function(h){var b=
h.split("="),d,k;t(b[1],"undefined")&&(b=(b=h.match(a))?b.slice(1):[h,null]);d=r(decodeURIComponent(b[0]));k=A(decodeURIComponent(b[1]));C(!0,e,d.reverse().reduce(function(a,e,b){b=isNaN(e)||b===d.length-1?{}:[];b[e||0]=t(a,"undefined")?k:a;return b},u))});return e}var c=l.getNameSpace,E=g.Basic,t=E.typeOf,C=E.Merge,y=/^\/?([^=&#\/]+\/)+[^=&#\/]*$/,q=/^(http(s?):)?\/\/[^\/]+/i,a=/([a-z-_]+)([0-9,]+)/i,d=/^-?[0-9]*\.?[0-9]*$/,b={"true":!0,"false":!1,"null":null,undefined:null,"":null};E.Extend(c("Types.String.Url",
g),{getAbs:function(a){var b=l.location;if(t(a,"string")||t(a,"undefined"))return a=a?a.trim():"",q.test(a)||(a=b.protocol+"//"+b.hostname+("/"==a.charAt(0)?"":b.pathname)+a),a},addParam:function(a,b,e,h){if(!b)return a;var d={};d[b]=e;return n(d,a,h)},addParams:n,getParams:w})})(this,this.ru.mail.cpf);
(function(l,g,u){var v=l.getNameSpace;l=g.Basic;var f=l.typeOf;l.Extend(v("Types.String.Html",g),function(){var p=function(){var r=/[a-z]+[a-z0-9-_]*/i;return function(g){var n={},w,c,p,t,l;if(f(g,"string")){if(1<(g=g.split(" ")).length)for(w=-1;f(c=g[++w],"string");)c.length&&(w?(l=c.indexOf("="),c=-1<l?[c.substr(0,l),c.substr(l+1)]:[c],r.test(t=c[0])&&(n[t]=f(p=c[1],"string")?p.slice(1,p.indexOf(p.charAt(0),1)):p)):n.tagName=c.substr(1));return n}}}();return{Split:function(f){for(var p=[],n,w,c,
l,t;f.length;){n=f.indexOf("<");if(0>n)break;l=w=n+1;t=v("Types.String",g).getNearest(f,[" ",">","/"],n);c=f.substr(l,-1<t?t-l:u);t="<"+c;c="!--"==c?"--\x3e":"</"+c;do w=f.indexOf(c,w+1);while(0<(l=f.indexOf(t,l+1))&&l<w);w=f.indexOf(">",w)+1;p.push(f.slice(n,w));f=f.slice(w)}return p},getParams:p,getAttr:function(g,l){if(f(g,"string")&&f(l,"string"))return p(g)[l]}}}())})(window,window.ru.mail.cpf);
(function(l,g){var u=g.Basic,v=u.Extend,f=u.typeOf,p=Array.prototype,r=u.getConstructor(function(){var g={Types:null,Expandable:!1,Memory:!1,Once:!1},n=function(y,q){var a=this._Types,d=this._Opts;f(y,"string")&&!(y in a)&&(a[y]=a={Handlers:null,handlerParams:null,Once:q&&!0===q.once},d=q&&q.memory||d.Memory)&&(a.History=[],f(d,"number")&&(a.History.maxLength=d))},l=function(y,q){var a=y.Handlers,d=y.handlerParams,b=f(q,"function")?a.indexOf(q):f(q,"number")?q:-1;-1<b&&(a.splice(b,1),d.splice(b,1))},
c=function(y,q,a,d){var b=!0===(this._Opts.Once||a.once),k=a.fired,m,e;f(q,"function")?m=q:f(q,"object")&&(f(m=q.handler)||(m=null),e=!0===q.once);if(m)if(y){if(d){y=m;q=a.History;for(var h,c,x=0;x<q.length;x++)h=q[x],c=h.context,h=h.args,y.apply(c,h)}k&&(b||e&&d)||(d=m,b=a.Handlers,a=a.handlerParams,-1<b.indexOf(d)||(b.push(d),a.push({once:!0===e})))}else l.call(this,a,m)},r=function(y,q,a){var d=this._Types,b,k;if(d&&q&&f(b=d[q],"object")){if(!Array.isArray(b.Handlers))if(y)b.Handlers=[],b.handlerParams=
[];else return;k=Array.isArray(b.History)&&0<b.History.length;if(Array.isArray(a))for(q=0;q<a.length;q++)c.call(this,y,a[q],b,k);else a?c.call(this,y,a,b,k):y||delete d[q]}},t=function(){var c=arguments,q=p.shift.apply(c),a=c[0],d=f(a);if("string"==d)for(var b=c[1],a=a.split(" "),c=a.length;c--;)r.call(this,q,a[c],b);else if("object"==d)for(b in a)if(a.hasOwnProperty(b))for(var c=q,d=a[b],k=b.split(" "),m=k.length;m--;)r.call(this,c,k[m],d)},u=function(c){var q,a,d;if(Array.isArray(c))for(d=0;d<c.length;d++)f(q=
c[d],"string")&&n.call(this,q);else if(f(c,"object"))for(var b in c)c.hasOwnProperty(b)&&(q=c[b],f(q,"object")?(a=q.handlers,d=q.opts):a=q,n.call(this,b,d),r.apply(this,[!0,b,a]))};return{_Init:function(c){c=this._Opts=v(!0,{},g,c);var f;this._Types={};(f=c.Types)&&u.call(this,f)},add:function(){var c=p.slice.call(arguments);c.unshift(!0);t.apply(this,c);return this},once:function(c,f){r.call(this,!0,c,{handler:f,once:!0});return this},remove:function(){p.slice.call(arguments).unshift(!1);t.apply(this,
arguments)},fire:function(c,q,a){var d=this._Types,b,k,m;if(!this._disabled&&!f(b=d[c],"undefined")){if(Array.isArray(c=b.Handlers)){d=b.handlerParams;a=a||null;q=q||[];Array.isArray(q)||q.hasOwnProperty("callee")||(q=[q]);for(var e=0;e<c.length;e++)c[e].apply(a,q),d[e].once&&(l.call(this,b,e),e--)}b.fired=!0;if(c=b.History)b.History.push({context:a,args:q}),(k=c.maxLength)&&(m=c.length)>k&&c.splice(0,m-k)}},_disable:function(){this._disabled=!0;this._Opts.Expandable=!1},_destroy:function(){this._disable();
delete this._Types},_addTypes:function(c){c&&!0===this._Opts.Expandable&&u.call(this,c)}}}()),u={Tools:{Callbacks:r},Methods:{initCallbacks:function(g){var n=r(g),l={bind:function(){n.add.apply(n,arguments)},once:function(){n.once.apply(n,arguments)},_fire:function(){var c=p.slice.call(arguments);f(c[2],"undefined")&&(c[2]=this);n.fire.apply(n,c)}};!0===g.Expandable&&(l._addCbkTypes=function(){n._addTypes.apply(n,arguments)});v(this,l)},registerEventTypes:function(g){var n,w;f(this,"object")&&this!==
l&&(f(this._addEventTypes,"function")?this._addEventTypes(g.Types):(w=g.Expandable=!1!==g.Expandable,n=r(g),v(this,{_trigger:function(){var c=p.slice.call(arguments);c[1]=c.splice(1,c.length);c[2]=this;n.fire.apply(n,c)},on:n.add.bind(n),once:n.once.bind(n),off:n.remove.bind(n)}),w&&(this._addEventTypes=n._addTypes.bind(n))))}}};v(!0,g,u);v(!0,l.getNameSpace("Comp",g),u)})(this,this.ru.mail.cpf);
(function(l,g){function u(f,c){return n(function(g,t){f?r(c,"object")&&r(c.then,"function")?c.then(g,t):g(c):t(c)})}var v=g.Tools,f=v.Callbacks,p=g.Basic,r=p.typeOf,A=p.Extend,n=function(){function g(c,a){r(a,"function")&&this.add(u(c),a)}function c(c,a){r(a,"boolean")&&setTimeout(function(){this.fire(u(a),c);this._disable()}.bind(this),0)}function l(c,a){return function(){var d;try{d=a.apply(this,arguments)}catch(b){console.error("Uncaught (in promise): "+b.stack);c.reject(b);return}r(d,"object")&&
r(d.then,"function")?d.then(function(a){c.resolve(a)},function(a){c.reject(a)}):c.resolve(d)}}var t=["resolve","reject"],p=["rejected","resolved","pending"],u=function(c){return r(c,"boolean")?t[c?0:1]:t.join(" ")};return function(q){function a(a,e){c.call(this,Array.prototype.slice.call(arguments,2),e);k=p[e?1:0];return a}function d(a,b){g.call(this,a,b);return e||m}var b=f({Types:t,Memory:!0,Once:!0}),k=p[2],m,e;m={};m=A(m,{done:d.bind(b,!0),fail:d.bind(b,!1),then:function(){for(var a=n(),e,c,d=
0;2>d;d++)c=0===d,e=arguments[d],e=r(e,"function")?l(a,e):a[c?"resolve":"reject"],g.call(b,c,e);return a},"catch":function(a){return m.then(null,a)},always:d.bind(b,null),state:function(){return k},promise:function(a){if(r(a,"object"))for(var e in m)m.hasOwnProperty(e)&&(a[e]=m[e]);else a=m;return a},progress:function(){}});r(q,"function")?q.call(m,a.bind(b,null,!0),a.bind(b,null,!1)):(e=m.promise({}),A(!0,e,{resolve:a.bind(b,e,!0),reject:a.bind(b,e,!1),destroy:function(){b._destroy()}}));return e||
m}}(),p=function(){function f(){var c=Array.prototype.slice.call(arguments),g=c.splice(0,2),l=g[0];l[g[1]]=c[0];0===--this.length&&this.promise.resolve.apply(null,l)}function c(){this.promise.reject()}return function(){for(var g=n(),l={length:arguments.length,promise:g},p=[],u,q,a=l.length;a--;)(u=arguments[a])&&(u.done&&r(u.done,"function")||(q=u.then&&r(u.then,"function")))?q?u.then(f.bind(l,p,a),c.bind(l)):u.done(f.bind(l,p,a)).fail(c.bind(l)):(p[a]=u,l.length--);0===l.length&&g.resolve.apply(null,
p);return g}}();n.all=function(f){return n(function(c,g){if(!Array.isArray(f))return g(new TypeError("Invalid argument type"));var l=f.length,p=[];f.forEach(function(f,q){try{f.then(function(a){p[q]=a;0===--l&&c(p)},g)}catch(a){return new TypeError("Invalid argument type")}})})};n.resolve=u.bind(null,!0);n.reject=u.bind(null,!1);n.when=p;p={Promise:n,Deferred:n};A(!0,v,p);A(!0,l.getNameSpace("Comp.Tools",g),p);"Promise"in l&&r(l.Promise,"function")||(l.Promise=function(f){if(r(f,"function"))return n(f);
throw new TypeError("Promise resolver undefined is not a function");},A(l.Promise,n))})(this,this.ru.mail.cpf);
(function(l,g,u){function v(e){var b=a[e];if(b){var c=b.promise,d=b.url;!c&&d&&(b.promise=c=C().promise(),y({url:d,type:"GET",success:function(a){c.done(a);b.contents=h(a)},error:function(b){c.fail();b&&404==b.status&&(a[e]=null)},complete:function(){b.promise=null}}));return c}}function f(e){var b;return!(!(b=a[e])||!b.contents)}var p=g.getNameSpace,r=u.Types.String,A=r.Html,n=r.Url,w=r.regExp.Url,c=A.Split,E=A.getParams,t=u.Basic.typeOf,C=u.Tools.Promise,y=l.ajax||u.DOM.Tools.Ajax.request,q=u.Basic.Extend,
a=[],d=function(a){(new Image).src=a},b=function(a){d(a.src)},k=function(a,e){var c=g.screen,h=e.URL;return{admail:{rqdPrms:"id",hitCntr:function(a){b({src:r.supplant(location.protocol+"//ad.mail.ru/${id}.gif",a)})},hitEvent:function(){}},radar:function(){var a=function(a){a.info=Object.keys(a.info).map(function(e){return e+":"+a.info[e]}).join(",");a.info=encodeURIComponent(a.info);b({src:r.supplant("//stat.radar.imgsmail.ru/update?t=${name}&p=${project}&v=${value}&i=${info}&rnd=${rnd}",a)})};return{rqdPrms:"project",
hitCntr:function(e,b){var c=(new Date).valueOf(),h;b&&b.promise&&b.promise.then&&(h=b.promise,delete b.promise);b=q({},e,b);b.name=encodeURIComponent(b.name);b.value=encodeURIComponent(b.value||0);b.info=t(b.info,"object")?b.info:{};b.rnd=Math.random();h?h.then(function(){b.info.success=(new Date).valueOf()-c;b.info.success=(new Date).valueOf()-c;a(b)},function(){b.info.error=(new Date).valueOf()-c;a(b)}):a(b)}}}(),topmail:function(){function b(){var a=g._tmr;return a&&t(a.push,"function")?a:null}
return{domain:"*.top.mail.ru",rqdPrms:["id",function(a){return null!==b()||"domain"in a}],hitCntr:function(e,f){var k=f&&f.referrer||h,g=f&&f.url,m=b();null!==m?m.push({id:e.id,type:"pageView",url:g,referrer:k,start:(new Date).getTime()}):(k=["//"+e.domain+"/counter?id="+e.id+";js=13",g?";u="+encodeURIComponent(g):"","undefined"!=typeof a.javaEnabled?";j="+a.javaEnabled():"",k?";r="+encodeURIComponent(k):"",c?";s="+c.width+"*"+c.height+";d="+(c.colorDepth||c.pixelDepth):"",";_="+Math.random()].join(""),
d(k))},hitEvent:function(a,e){var c=b();null!==c&&c.push(q({},a,e))}}}(),rbmail:{rqdPrms:"src|id",nrmlzPrms:function(a){var b=location.protocol+"//rs.mail.ru/${type}${id}.gif";a.type=a.type||"d";a.src||(a.src=r.supplant(b,a));return a},hitCntr:function(a,e){var c=e&&Object.keys(e).map(function(a){return a+"="+e[a]}).join("&");c&&(a=q({},a),a.src+="?"+c);b(a)},domain:"rs.mail.ru"},comscore:{rqdPrms:"src|id",hitCntr:function(a,b){var c=b&&b.referrer||h,z=b&&b.url,c=["http"+("s"==e.URL.charAt(4)?"s://sb":
"://b"),".scorecardresearch.com/b?c1=2","&c2="+a.id,"&ns__t="+(new Date).getTime(),"&ns_c="+(e.characterSet||e.defaultCharset||""),"&c7="+encodeURIComponent(z),"&c9="+encodeURIComponent(c)].join("");d(c)}},tns:{rqdPrms:"src",hitCntr:b,domain:"www.tns-counter.ru"},yaru:{rqdPrms:"id",hitCntr:function(a,b){var e=g["yaCounter"+a.id],c,d,z;e&&(b&&(c=b.url,d=b.title,z=b.referrer),z=z||h,e.hit(c,d,z))}},googl:function(){function a(b){var e=b.shift().split("."),h=1<e.length&&e[0];switch(e.pop()){case "_setAccount":c("create",
b.shift(),{name:h});b=null;break;case "_set":e.push("set");b.unshift(e.join("."));break;case "_trackPageview":e.push("send");b.unshift(e.join("."),"pageview");break;case "_setReferrerOverride":e.push("set");b.unshift(e.join("."),"referrer");break;case "_trackEvent":e.push("send"),b.unshift(e.join("."),"event")}null!==b&&c.apply(null,b)}function b(){var e=g._gaq,h;c=g.ga;if(t(c,"function")){if(h={push:a},Array.isArray(e))for(var d=0;d<e.length;d++)a(e[d])}else h=g._gaq=e||[];return h}function e(a){var c=
b(),h;t(z,"object")?h=z[a]:z={};h||(h="mrga"+d++,z[a]=h,c.push([h+"._setAccount",a]));return h}var c=g.ga,d=0,z;return{rqdPrms:"id",hitCntr:function(a,c){var d=b(),z=e(a.id)||a.name||c&&c.name,f=c&&c.referrer||h;f&&d.push([z+"._setReferrerOverride",f]);d.push([z+"._trackPageview",c&&c.url])},hitEvent:function(a,c,h){var d=b();a=e(a.id)||a.name;c.unshift(a+"._trackEvent");"function"==t(h)&&d.push([a+"._set","hitCallback",h]);d.push(c)}}}(),liru:{hitCntr:function(a,b){var f=b&&b.referrer||h,k=a&&a.domain?
a.domain:"counter.yadro.ru",g=["/hit"],m=a.personal;m&&g.push(m);f=["//"+k+g.join(";"),"?r"+encodeURIComponent(f),t(c,"undefined")?"":";s"+c.width+"*"+c.height+"*"+(c.colorDepth||c.pixelDepth),";u"+encodeURIComponent(b&&b.url||e.URL)+";"+Math.random()].join("");d(f)},domain:"counter.yadro.ru"}}}(navigator,document),m=function(){var a=function(a,b){var e=!1,c,h;if(t(a,"function"))e=a(b);else for(c=a.split("|"),h=0;(a=c[h++])&&!(e=b.hasOwnProperty(a)););return e};return function(b,e){var c=b in k,h,
d,f;c&&(c=k[b],c=!("rqdPrms"in c));if(!c)if(f=k[b].rqdPrms,Array.isArray(f))for(h=0;(d=f[h++])&&(c=a(d,e)););else c=a(f,e);return c}}(),e=function(a,b){var e=k[a],e=e&&e.nrmlzPrms;t(e,"function")&&(b=e(b));return b},h=function(){var a=function(){var a=/(\?|\/)/i;return function(b){var e,c,h,d,f;for(f in k)if(k.hasOwnProperty(f)&&(d=k[f].domain)&&(c=(e="*"!=d.charAt(0))?d:d.substr(1),c=b.indexOf(c),h=b.indexOf("//")+2,0<c&&(e?c==h:!a.test(b.slice(h,c)))))return f}}(),b=function(){var a=["tagName",
"mr_counter","type"];return function(b){for(var e=0,c;c=a[e++];)delete b[c];return b}}();return function(h){var d=null,f=!1,g,l,p,q,n,r;if((h=c(h)).length)for(l=[],g=-1;p=h[++g];)p=p.substr(0,p.indexOf(">")+1),p=E(p),"!--"==p.tagName?p.hasOwnProperty("mr_counter")?(f=!0,d=g,q=p.type,n=b(p)):f&&p.hasOwnProperty("/mr_counter")&&(f=!1,r=h.slice(d+1,g).join("")):!f&&"img"==p.tagName&&p.hasOwnProperty("src")&&(q=a(p.src))&&(n=b(p)),!f&&n&&(q in k&&(m(q,n)||r&&m(q,n))&&(d?(h.splice(d,g-d+1),g=d):h.splice(g,
1),g--,l.push({type:q,params:e(q,n)})),d=r=n=null);return l}}(),D=function(){var a={"referrer,url":n.getAbs};return function(b,e){var c=b.contents,h=0,d;if(e){var f,g;if(t(e,"object"))for(var m in a)if(a.hasOwnProperty(m)&&t(g=a[m],"function")){d=m.split(/,\s?/);for(var p=d.length;p--;)e.hasOwnProperty(f=d[p])&&(e[f]=g(e[f]))}}for(;d=c[h++];)f=e,g=(g=k[d.type])&&g.hitCntr,t(g,"function")&&g(d.params,f)}}();q(p("Instances",u),{cntrsCtrl:{add:function(){var b,c,d,f=arguments,g,p,l,q,n,r;g=p=!1;if(f.length){switch(t(r=
f[0])){case "string":1<f.length?r in k&&t(d=f[1],"object")&&(p=!0,(n=[]).push({type:r,params:d})):w.test(r)?(g=!0,b=r):c=r;break;case "array":p=!0;n=r;break;default:return}if(p&&n.length)for(r=0;r<n.length;r++)f=n[r],t(f,"object")&&m(q=f.type,d=f.params)?f.params=e(q,d):n.splice(r--,1);if(g&&b||p&&n.length||c)l=a.push({url:g?b:null,contents:g?null:p?n:h(c)})-1,g&&v(l);return l}},hit:function(b,e){var c=a[b];c&&C.when(f(b)||v(b)).done(function(){D(c,e)})},hitEvent:function(b,e,c,d){if(b=a[b]){var h=
b.contents;b=null;for(var f=h.length;f--;)if(h[f].type===e){b=h[f];break}null!==b&&(e=(e=k[b.type])&&e.hitEvent,t(e,"function")&&e(b.params,c,d))}}}})})(this.jQuery||this.$||this.$f,this,this.ru.mail.cpf);
(function(l,g,u){var v=document.documentElement;u.Basic.Extend(!0,u,{Tools:{Layout:{getScroll:function(f){var p={top:0,left:0};f&&"function"===typeof f.get&&"function"===typeof f.eq&&(f=f.get(0));f!==document.body&&f?(p.top=f.scrollTop,p.left=f.scrollLeft):(p.top=g.pageYOffset||v.scrollTop||document.body.scrollTop,p.left=g.pageXOffset||v.scrollLeft||document.body.scrollLeft);return p},setScroll:function(f,g){if(f){var l=document.body;g&&"function"===typeof g.get&&"function"===typeof g.eq&&(g=g.get(0));
isNaN(f.top)||(g&&g!==l?g.scrollTop=f.top:v.scrollTop=l.scrollTop=f.top);isNaN(f.left)||(g&&g!==l?g.scrollLeft=f.left:v.scrollLeft=l.scrollLeft=f.left)}},getClientRect:function(f){"function"===typeof f.get&&"function"===typeof f.eq&&(f=f.get(0));var g=f.getBoundingClientRect();return{left:g.left,top:g.top,width:g.width||l(f).width(),height:g.height||l(f).height()}}}}})})(this.jQuery||this.$||this.$f,this,this.ru.mail.cpf);
(function(l,g,u){function v(a,b,e){var c=h.total.ids,d=h.total.times,f,k=!1;e!==p(b)?D():(f=c.indexOf(a),~f?d[f]+=h.period:(c.push(a),d.push(0),f=d.length-1,k=!0),b.cumulative&&!k?a({value:d[f]/1E3}):b.cumulative||a({goal:(k?"v_":"t_")+location.pathname.replace(/\/$/,""),value:k?1:h.period/1E3}),h.tm=g.setTimeout(v.bind(null,a,b,e),h.period))}function f(){h.active=null;g.clearTimeout(h.tm)}function p(a){var b=e.getScroll().top,c=b+g.innerHeight/2,d=e.getClientRect(a.elem),h,f;if(d.height&&d.width)for(f=
a.counters.length-1||1,a=d.height/f,b=d.top+b;f--;)if(d=b+a*f,h=b+a*(f+1),d<=c&&c<=h)return f;return-1}function r(){if(h.isWindowActive){var a=h.blocks.slice();a.reverse();a.some(function(a){var b=p(a);if(~b){var e=a.counters[b];h.active!==e&&(h.active=e,g.clearTimeout(h.tm),v(e,a,b))}return~b})?B():f()}}function A(a,b){var e=Array.isArray(a)?a[b]:a,c="rnd="+(Math.random()+"").substr(2);e?(new Image).src=[e,c].join("?"):g.DEBUG&&console.log("\u041f\u043e\u043f\u044b\u0442\u043a\u0430 \u0437\u0430\u043f\u0440\u043e\u0441\u0430 \u043e\u0442\u0441\u0443\u0442\u0441\u0442\u0432\u0443\u044e\u0449\u0435\u0433\u043e rb-\u0441\u0447\u0435\u0442\u0447\u0438\u043a\u0430")}
function n(b,e,c){var d=c.jElem[0],h=c.counterParam,f=c.checkPos,k=!(0===d.offsetWidth&&0===d.offsetHeight);c=Array.isArray(h)&&h.length||1;var m=1<c,l=!1,n=0;if(k)if(f){f=(d&&d.ownerDocument).documentElement;f=d.getBoundingClientRect().top+(g.pageYOffset||f.scrollTop)-(f.clientTop||0);k=b.top;b=b.top+e.height;for(l=c;l--;)if(m&&null===h[l])n++;else if(e=d.offsetHeight,m&&(e=e/(c-1)*l),e=f+e,k<e&&e<b){if(a(h[l],"function"))h[l]({rnd:Math.random()});else A(h,l);m&&(h[l]=null);n++}l=n===c}else l=!0,
A(h,0);return l}function w(a,b,e){var c=0;if(e)return n.apply(null,arguments);if(t&&t.length)for(;e=t[c++];)!0===n.call(null,a,b,e)&&t.splice(--c,1)}function c(a,b){var e;a&&(e={jElem:this,counterParam:a,checkPos:b},!0!==w({top:g.pageYOffset,left:g.pageXOffset},{width:g.innerWidth,height:g.innerHeight},e)&&(t.push(e),C||(E(),C=!0)))}function E(){l(g).on("scroll resize",function(){h.isWindowActive=!0;w({top:g.pageYOffset,left:g.pageXOffset},{width:g.innerWidth,height:g.innerHeight});D()}).on("blur",
function(){f();h.isWindowActive=!1}).on("focus",function(){h.isWindowActive=!0;D()}).on("click touchstart keydown mousemove",function(){h.isWindowActive=!0;x()})}var t=[],C=!1,y=/,\s?/g,q=u.Basic.moduleOpts,a=u.Basic.typeOf,d,b,k,m=u.Basic.Extend,e=u.Tools.Layout,h={blocks:[],active:null,tm:null,total:{ids:[],times:[]},period:5E3,isWindowActive:!0},D=u.Basic.debounce(r,500),x=u.Basic.throttle(r,500),B=u.Basic.debounce(function(){f();h.isWindowActive=!1},3E4);l.fn.initVisibleCounter=function(a,b){return this.eachNode(function(){c.call(l(this),
a,b)})};l.fn.initScrollCounter=function(a,b){return this.each(function(){var e=l(this),d=e[0].getAttribute(a);d&&(d=d.split(y),!0===b&&(d=d.map(function(a){return a?["//rs.mail.ru/d",a,".gif"].join(""):""})),1===d.length&&(d=d.pop()),c.call(e,d,!0))})};q.setParams("TrackBlocks",{initializer:function(e,f,g,l){d=d||u.Instances.cntrsCtrl.add;b=b||u.Instances.cntrsCtrl.hit;k=k||u.Instances.cntrsCtrl.hitEvent;e.counters&&(a(e.counters,"string")&&(e.counters=e.counters.split(/\s*,\s*/).map(function(a){return{id:a}})),
a(e.counters,"array")&&(g=e.counters.map(function(a){return b.bind(f,d(e.counterType||"rbmail",a))}),c.call(f,g,!0),"topmail"===e.counterType&&e.duration&&(g=e.counters.map(function(a){var b={type:"reachGoal",goal:location.pathname.replace(/\/$/,"")};a=d(e.counterType||"rbmail",m(b,a));return k.bind(f,a,e.counterType||"rbmail")}),h.blocks.push({elem:f,cumalative:!!e.cumulative,counters:g}),D())))},paramAttrs:{counters:"data-counter-id",counterType:"data-counter-type"},options:{duration:!0}})})(this.jQuery||
this.$||this.$f,this,ru.mail.cpf);
(function(l,g,u){function v(a,b){var c=null,d;if(C(b,"object")){var c={},f;for(f in b)if(b.hasOwnProperty(f))if(d=b[f],C(d,"object"))y(!0,q(f,c),v(a,d));else if(C(d,"function"))c[f]=d(a);else if(d=a.getAttribute(d))c[f]=d}return c}function f(a){a=a.split(".");for(var b={},c,f=0;f<a.length;f++)c=a.slice(0,f+1).join("."),c=d.getParams(c),b=y(!0,b,c);b.type=a[0];return b}function p(b,c,d,f){var g=c.initializer,k=c.type,m=b&&b.data(k)||null,l,n,p;b&&(p=b&&b.get(0))&&(n=a(p));if(null===m&&C(g,"function")){l=
g.type;(n=n&&k in n?n[k]:null)&&("options"in n||"data"in n)?(d=y(!0,n.options,d),n=n.data):(d=y(!0,n,d),n=null);d=[y(!0,{},c.options,v(p,c.paramAttrs),d)];"model"!==l&&(d.push(b),d.push(c.model||null));d.push(y(!0,{},n,f));try{m=g.apply(null,d)}catch(q){console.error('Module "'+c.type+'" initialization failed.',q.stack)}b&&b.data(k,m)}return m}function r(a,b,c,d){var f;b&&(f=a.find(b).add(a.filter(b)));a.attr(c)&&(f=a.add(f));!C(d,"string")||f&&f.length||(f=a);return f}function A(a){m=y(!0,{},b,t.moduleOpts.get("ModulesInit"),
a)}function n(a,b){var c=!1;Array.isArray(b)||(b=[b]);for(var d,f=b.length;f--;)if(d=b[f],a===d||0===a.indexOf(d)&&"."===a.charAt(d.length)){c=!0;break}return c}function w(a,b,c,d){var f=m.attrs.moduleViewType;a=r(a,m.cssSels.moduleView,f);for(var g,k,l=0;l<a.length;l++)if(k=a.eq(l),g=m.viewType||k.attr(f)){g=g.split(",");for(var n,p=0;p<g.length;p++)n=g[p].split(".").shift(),E(g[p],k,b&&(b[n]||b.common),c&&(c[n]||c.common),d)}}function c(a,b,c,d){A(d);d=m.attrs.moduleType;a=r(a,m.cssSels.module,
d,m.moduleType);for(var f=1===a.length,g=[],l,n,p,q=0;q<a.length;q++)if(p=a.eq(q),n=m.moduleType||p.attr(d)){n=n.split(k);l=[];for(var u,t,v=0;v<n.length;v++)u=n[v],t=u.split(".").shift(),t=E(u,p,b&&(b[t]||b.common),c&&(c[t]||c.common)),null!==t&&(t={instance:t,type:u},g.push(t),l.push(t));g.length&&w(p,b,c,l)}return f&&1===g.length?g[0].instance:g}function E(a,b,c,d,g){Array.isArray(a)&&(a=a.filter(function(a){return C(a,"string")&&0<a.length}).join("."));var l=f(a),q,r,t=!0,u=null;b&&(q=b.attr(m.attrs.viewAcceptType))&&
(q=q.split(k));if((q=q||l.acceptTypes)&&Array.isArray(g))for(var t=!1,v=0;v<g.length;v++)if(r=g[v],n(r.type,q)){l.model=r.instance;t=!0;break}t&&(u=p(b,l,c,d),null!==u&&r&&(r.views=r.views||[],r.views.push({instance:u,type:a})));return u}var t=u.Basic,C=t.typeOf,y=t.Extend,q=g.getNameSpace,a=t.getOptions,d=t.moduleOpts,b={cssSels:{module:".js-module",moduleView:".js-view"},attrs:{moduleType:"data-module",moduleViewType:"data-view",viewAcceptType:"data-accepted-module"},moduleType:null,viewType:null},
k=/,\s*/ig,m=b;y(!0,u,{Tools:{initModules:c,initModuleElems:function(a,b){return c(a,b.options,b.data,{cssSels:{module:null,moduleView:null},moduleType:b.moduleType,viewType:b.viewType})},initViewElems:function(a,b){A({cssSels:{module:null,moduleView:null},viewType:b.viewType});return w(a,b.options,b.data,[b.model])},initModule:E}});l(function(){c(l(g.document.body))})})(this.jQuery||this.$||this.$f,this,this.ru.mail.cpf);