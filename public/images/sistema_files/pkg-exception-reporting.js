!(function(e){if("object"==typeof exports&&"undefined"!=typeof module)module.exports=e();else if("function"==typeof define&&define.amd)define("external/flux",[],e);else{var t;"undefined"!=typeof window?t=window:"undefined"!=typeof global?t=global:"undefined"!=typeof self&&(t=self),t.Flux=e()}})(function(){return(function e(t,n,r){function i(a,c){if(!n[a]){if(!t[a]){var s="function"==typeof require&&require;if(!c&&s)return s(a,!0);if(o)return o(a,!0);var l=new Error("Cannot find module '"+a+"'");throw l.code="MODULE_NOT_FOUND",l}var u=n[a]={exports:{}};t[a][0].call(u.exports,function(e){var n=t[a][1][e];return i(n?n:e)},u,u.exports,e,t,n,r)}return n[a].exports}for(var o="function"==typeof require&&require,a=0;a<r.length;a++)i(r[a]);return i})({1:[function(e,t,n){t.exports.Dispatcher=e("./lib/Dispatcher")},{"./lib/Dispatcher":2}],2:[function(e,t,n){"use strict";function r(){this.$Dispatcher_callbacks={},this.$Dispatcher_isPending={},this.$Dispatcher_isHandled={},this.$Dispatcher_isDispatching=!1,this.$Dispatcher_pendingPayload=null}var i=e("./invariant"),o=1;r.prototype.register=function(e){var t="ID_"+o++;return this.$Dispatcher_callbacks[t]=e,t},r.prototype.unregister=function(e){i(this.$Dispatcher_callbacks[e],"Dispatcher.unregister(...): `%s` does not map to a registered callback.",e),delete this.$Dispatcher_callbacks[e]},r.prototype.waitFor=function(e){i(this.$Dispatcher_isDispatching,"Dispatcher.waitFor(...): Must be invoked while dispatching.");for(var t=0;t<e.length;t++){var n=e[t];this.$Dispatcher_isPending[n]?i(this.$Dispatcher_isHandled[n],"Dispatcher.waitFor(...): Circular dependency detected while waiting for `%s`.",n):(i(this.$Dispatcher_callbacks[n],"Dispatcher.waitFor(...): `%s` does not map to a registered callback.",n),this.$Dispatcher_invokeCallback(n))}},r.prototype.dispatch=function(e){i(!this.$Dispatcher_isDispatching,"Dispatch.dispatch(...): Cannot dispatch in the middle of a dispatch."),this.$Dispatcher_startDispatching(e);try{for(var t in this.$Dispatcher_callbacks)this.$Dispatcher_isPending[t]||this.$Dispatcher_invokeCallback(t)}finally{this.$Dispatcher_stopDispatching()}},r.prototype.isDispatching=function(){return this.$Dispatcher_isDispatching},r.prototype.$Dispatcher_invokeCallback=function(e){this.$Dispatcher_isPending[e]=!0,this.$Dispatcher_callbacks[e](this.$Dispatcher_pendingPayload),this.$Dispatcher_isHandled[e]=!0},r.prototype.$Dispatcher_startDispatching=function(e){for(var t in this.$Dispatcher_callbacks)this.$Dispatcher_isPending[t]=!1,this.$Dispatcher_isHandled[t]=!1;this.$Dispatcher_pendingPayload=e,this.$Dispatcher_isDispatching=!0},r.prototype.$Dispatcher_stopDispatching=function(){this.$Dispatcher_pendingPayload=null,this.$Dispatcher_isDispatching=!1},t.exports=r},{"./invariant":3}],3:[function(e,t,n){"use strict";var r=function(e,t,n,r,i,o,a,c){if(!e){var s;if(void 0===t)s=new Error("Minified exception occurred; use the non-minified dev environment for the full error message and additional helpful warnings.");else{var l=[n,r,i,o,a,c],u=0;s=new Error("Invariant Violation: "+t.replace(/%s/g,function(){return l[u++]}))}throw s.framesToPop=1,s}};t.exports=r},{}]},{},[1])(1)}),(function(e,t){function n(e,t){return Object.prototype.hasOwnProperty.call(e,t)}function r(e){return void 0===e}if(e){var i={},o=e.TraceKit,a=[].slice;i.noConflict=function(){return e.TraceKit=o,i},i.wrap=function(e){function t(){try{return e.apply(this,arguments)}catch(e){throw i.report(e),e}}return t},i.report=(function(){function t(e){s(),h.push(e)}function r(e){for(var t=h.length-1;t>=0;--t)h[t]===e&&h.splice(t,1)}function o(e,t){var r=null;if(!t||i.collectWindowErrors){for(var o in h)if(n(h,o))try{h[o].apply(null,[e].concat(a.call(arguments,2)))}catch(e){r=e}if(r)throw r}}function c(e,t,n,r,a){var c=null;if(m)i.computeStackTrace.augmentStackTraceWithInitialElement(m,t,n,e),l();else if(a)c=i.computeStackTrace(a),o(c,!0);else{var s={url:t,line:n,column:r};s.func=i.computeStackTrace.guessFunctionName(s.url,s.line),s.context=i.computeStackTrace.gatherContext(s.url,s.line),c={mode:"onerror",message:e,stack:[s]},o(c,!0)}return!!f&&f.apply(this,arguments)}function s(){p!==!0&&(f=e.onerror,e.onerror=c,p=!0)}function l(){var e=m,t=d;d=null,m=null,g=null,o.apply(null,[e,!1].concat(t))}function u(t){if(m){if(g===t)return;l()}var n=i.computeStackTrace(t);throw m=n,g=t,d=a.call(arguments,1),e.setTimeout(function(){g===t&&l()},n.incomplete?2e3:0),t}var f,p,h=[],d=null,g=null,m=null;return u.subscribe=t,u.unsubscribe=r,u})(),i.computeStackTrace=(function(){function t(t){if(!i.remoteFetching)return"";try{var n=function(){try{return new e.XMLHttpRequest}catch(t){return new e.ActiveXObject("Microsoft.XMLHTTP")}},r=n();return r.open("GET",t,!1),r.send(""),r.responseText}catch(e){return""}}function o(r){if("string"!=typeof r)return[];if(!n(k,r)){var i="",o="";try{o=e.document.domain}catch(e){}var a=/(.*)\:\/\/([^:\/]+)([:\d]*)\/{0,1}([\s\S]*)/.exec(r);a&&a[2]===o&&(i=t(r)),k[r]=i?i.split("\n"):[]}return k[r]}function a(e,t){var n,i=/function ([^(]*)\(([^)]*)\)/,a=/['"]?([0-9A-Za-z$_]+)['"]?\s*[:=]\s*(function|eval|new Function)/,c="",s=o(e);if(!s.length)return"?";for(var l=0;l<10;++l)if(c=s[t-l]+c,!r(c)){if(n=a.exec(c))return n[1];if(n=i.exec(c))return n[1]}return"?"}function c(e,t){var n=o(e);if(!n.length)return null;var a=[],c=Math.floor(i.linesOfContext/2),s=c+i.linesOfContext%2,l=Math.max(0,t-c-1),u=Math.min(n.length,t+s-1);t-=1;for(var f=l;f<u;++f)r(n[f])||a.push(n[f]);return a.length>0?a:null}function s(e){return e.replace(/[\-\[\]{}()*+?.,\\\^$|#]/g,"\\$&")}function l(e){return s(e).replace("<","(?:<|&lt;)").replace(">","(?:>|&gt;)").replace("&","(?:&|&amp;)").replace('"','(?:"|&quot;)').replace(/\s+/g,"\\s+")}function u(e,t){for(var n,r,i=0,a=t.length;i<a;++i)if((n=o(t[i])).length&&(n=n.join("\n"),r=e.exec(n)))return{url:t[i],line:n.substring(0,r.index).split("\n").length,column:r.index-n.lastIndexOf("\n",r.index)-1};return null}function f(e,t,n){var r,i=o(t),a=new RegExp("\\b"+s(e)+"\\b");return n-=1,i&&i.length>n&&(r=a.exec(i[n]))?r.index:null}function p(t){if(!r(e&&e.document)){for(var n,i,o,a,c=[e.location.href],f=e.document.getElementsByTagName("script"),p=""+t,h=/^function(?:\s+([\w$]+))?\s*\(([\w\s,]*)\)\s*\{\s*(\S[\s\S]*\S)\s*\}\s*$/,d=/^function on([\w$]+)\s*\(event\)\s*\{\s*(\S[\s\S]*\S)\s*\}\s*$/,g=0;g<f.length;++g){var m=f[g];m.src&&c.push(m.src)}if(o=h.exec(p)){var v=o[1]?"\\s+"+o[1]:"",x=o[2].split(",").join("\\s*,\\s*");n=s(o[3]).replace(/;$/,";?"),i=new RegExp("function"+v+"\\s*\\(\\s*"+x+"\\s*\\)\\s*{\\s*"+n+"\\s*}")}else i=new RegExp(s(p).replace(/\s+/g,"\\s+"));if(a=u(i,c))return a;if(o=d.exec(p)){var _=o[1];if(n=l(o[2]),i=new RegExp("on"+_+"=[\\'\"]\\s*"+n+"\\s*[\\'\"]","i"),a=u(i,c[0]))return a;if(i=new RegExp(n),a=u(i,c))return a}return null}}function h(e){if(!e.stack)return null;for(var t,n,i=/^\s*at (.*?) ?\(((?:file|https?|blob|chrome-extension|native|eval).*?)(?::(\d+))?(?::(\d+))?\)?\s*$/i,o=/^\s*(.*?)(?:\((.*?)\))?(?:^|@)((?:file|https?|blob|chrome|\[native).*?)(?::(\d+))?(?::(\d+))?\s*$/i,s=/^\s*at (?:((?:\[object object\])?.+) )?\(?((?:ms-appx|https?|blob):.*?):(\d+)(?::(\d+))?\)?\s*$/i,l=e.stack.split("\n"),u=[],p=/^(.*) is undefined$/.exec(e.message),h=0,d=l.length;h<d;++h){if(t=i.exec(l[h])){var g=t[2]&&t[2].indexOf("native")!==-1;n={url:g?null:t[2],func:t[1]||"?",args:g?[t[2]]:[],line:t[3]?+t[3]:null,column:t[4]?+t[4]:null}}else if(t=s.exec(l[h]))n={url:t[2],func:t[1]||"?",args:[],line:+t[3],column:t[4]?+t[4]:null};else{if(!(t=o.exec(l[h])))continue;n={url:t[3],func:t[1]||"?",args:t[2]?t[2].split(","):[],line:t[4]?+t[4]:null,column:t[5]?+t[5]:null}}!n.func&&n.line&&(n.func=a(n.url,n.line)),n.line&&(n.context=c(n.url,n.line)),u.push(n)}return u.length?(u[0]&&u[0].line&&!u[0].column&&p?u[0].column=f(p[1],u[0].url,u[0].line):u[0].column||r(e.columnNumber)||(u[0].column=e.columnNumber+1),{mode:"stack",name:e.name,message:e.message,stack:u}):null}function d(e){var t=e.stacktrace;if(t){for(var n,r=/ line (\d+).*script (?:in )?(\S+)(?:: in function (\S+))?$/i,i=/ line (\d+), column (\d+)\s*(?:in (?:<anonymous function: ([^>]+)>|([^\)]+))\((.*)\))? in (.*):\s*$/i,o=t.split("\n"),s=[],l=0;l<o.length;l+=2){var u=null;if((n=r.exec(o[l]))?u={url:n[2],line:+n[1],column:null,func:n[3],args:[]}:(n=i.exec(o[l]))&&(u={url:n[6],line:+n[1],column:+n[2],func:n[3]||n[4],args:n[5]?n[5].split(","):[]}),u){if(!u.func&&u.line&&(u.func=a(u.url,u.line)),u.line)try{u.context=c(u.url,u.line)}catch(e){}u.context||(u.context=[o[l+1]]),s.push(u)}}return s.length?{mode:"stacktrace",name:e.name,message:e.message,stack:s}:null}}function g(t){var r=t.message.split("\n");if(r.length<4)return null;var i,s=/^\s*Line (\d+) of linked script ((?:file|https?|blob)\S+)(?:: in function (\S+))?\s*$/i,f=/^\s*Line (\d+) of inline#(\d+) script in ((?:file|https?|blob)\S+)(?:: in function (\S+))?\s*$/i,p=/^\s*Line (\d+) of function script\s*$/i,h=[],d=e&&e.document&&e.document.getElementsByTagName("script"),g=[];for(var m in d)n(d,m)&&!d[m].src&&g.push(d[m]);for(var v=2;v<r.length;v+=2){var x=null;if(i=s.exec(r[v]))x={url:i[2],func:i[3],args:[],line:+i[1],column:null};else if(i=f.exec(r[v])){x={url:i[3],func:i[4],args:[],line:+i[1],column:null};var _=+i[1],k=g[i[2]-1];if(k){var y=o(x.url);if(y){y=y.join("\n");var b=y.indexOf(k.innerText);b>=0&&(x.line=_+y.substring(0,b).split("\n").length)}}}else if(i=p.exec(r[v])){var w=e.location.href.replace(/#.*$/,""),D=new RegExp(l(r[v+1])),E=u(D,[w]);x={url:w,func:"",args:[],line:E?E.line:i[1],column:null}}if(x){x.func||(x.func=a(x.url,x.line));var $=c(x.url,x.line),S=$?$[Math.floor($.length/2)]:null;$&&S.replace(/^\s*/,"")===r[v+1].replace(/^\s*/,"")?x.context=$:x.context=[r[v+1]],h.push(x)}}return h.length?{mode:"multiline",name:t.name,message:r[0],stack:h}:null}function m(e,t,n,r){var i={url:t,line:n};if(i.url&&i.line){e.incomplete=!1,i.func||(i.func=a(i.url,i.line)),i.context||(i.context=c(i.url,i.line));var o=/ '([^']+)' /.exec(r);if(o&&(i.column=f(o[1],i.url,i.line)),e.stack.length>0&&e.stack[0].url===i.url){if(e.stack[0].line===i.line)return!1;if(!e.stack[0].line&&e.stack[0].func===i.func)return e.stack[0].line=i.line,e.stack[0].context=i.context,!1}return e.stack.unshift(i),e.partial=!0,!0}return e.incomplete=!0,!1}function v(e,t){for(var n,r,o,c=/function\s+([_$a-zA-Z\xA0-\uFFFF][_$a-zA-Z0-9\xA0-\uFFFF]*)?\s*\(/i,s=[],l={},u=!1,h=v.caller;h&&!u;h=h.caller)if(h!==x&&h!==i.report){if(r={url:null,func:"?",args:[],line:null,column:null},h.name?r.func=h.name:(n=c.exec(h.toString()))&&(r.func=n[1]),void 0===r.func)try{r.func=n.input.substring(0,n.input.indexOf("{"))}catch(e){}if(o=p(h)){r.url=o.url,r.line=o.line,"?"===r.func&&(r.func=a(r.url,r.line));var d=/ '([^']+)' /.exec(e.message||e.description);d&&(r.column=f(d[1],o.url,o.line))}l[""+h]?u=!0:l[""+h]=!0,s.push(r)}t&&s.splice(0,t);var g={mode:"callers",name:e.name,message:e.message,stack:s};return m(g,e.sourceURL||e.fileName,e.line||e.lineNumber,e.message||e.description),g}function x(e,t){var n=null;t=null==t?0:+t;try{if(n=d(e))return n}catch(e){}try{if(n=h(e))return n}catch(e){}try{if(n=g(e))return n}catch(e){}try{if(n=v(e,t+1))return n}catch(e){}return{mode:"failed"}}function _(e){e=(null==e?0:+e)+1;try{throw new Error}catch(t){return x(t,e+1)}}var k={};return x.augmentStackTraceWithInitialElement=m,x.guessFunctionName=a,x.gatherContext=c,x.ofCaller=_,x.getSource=o,x})(),i.extendToAsynchronousCallbacks=function(){var t=function(t){var n=e[t];e[t]=function(){var e=a.call(arguments),t=e[0];return"function"==typeof t&&(e[0]=i.wrap(t)),n.apply?n.apply(this,e):n(e[0],e[1])}};t("setTimeout"),t("setInterval")},i.remoteFetching||(i.remoteFetching=!0),i.collectWindowErrors||(i.collectWindowErrors=!0),(!i.linesOfContext||i.linesOfContext<1)&&(i.linesOfContext=11),"undefined"!=typeof module&&module.exports&&this.module!==module?module.exports=i:"function"==typeof define&&define.amd?define("TraceKit",[],i):e.TraceKit=i}})("undefined"!=typeof window?window:global),define("modules/core/cookies",["require","exports"],function(e,t){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var assert=function(e,t){if(!e)throw new Error(t)},n=function(e){if(e.match(/^([0-9]{1,3}\.){3}[0-9]{1,3}$/))return[e];for(var t=e.split("."),n=[],r=0,i=t.length,o=0<=i;o?r<i:r>i;o?r++:r--)n.push(t.slice(r).join("."));return n},r=function(e){for(var t=e.split("/"),n=[],r=0,i=t.length,o=0<=i;o?r<i:r>i;o?r++:r--){var a=t.slice(0,t.length-r).join("/");""!==a&&n.push(a),n.push(a+"/")}return n},i=function(e){if(null==e)return!1;for(var t=0,n=["=",";"];t<n.length;t++){var r=n[t];if(Array.from(e).includes(r))return!0}return!1},o=function(e,t,n){void 0===n&&(n=!1),assert("string"==typeof e,t+" must be a string, but was "+typeof e),assert(n||(null!=e?e.length:void 0)>0,t+" must not be empty"),assert(!i(e),t+" contains illegal characters")},a=function(e){return o(e,"Cookie name",!1)},c=function(e){return o(e,"Cookie value",!0)},s=function(e){return o(e,"Cookie expiration date",!1)},l=function(e){return o(e,"Cookie domain",!1)},u=function(e){return o(e,"Cookie path",!1)},f=function(e,t,n){void 0===n&&(n={}),a(e),c(t),null!=n.expires&&s(n.expires),null!=n.domain&&l(n.domain),null!=n.path&&u(n.path),document.cookie=[e+"="+t,null!=n.expires?"expires="+n.expires:void 0,null!=n.domain?"domain="+n.domain:void 0,null!=n.path?"path="+n.path:void 0].join("; ")},p=new Date(1).toUTCString();t.Cookies={create:function(e,t,n,r){var i;if(null!=n){assert("number"==typeof n,"Cookie expiration must be a number");var o=new Date;o.setTime(o.getTime()+24*n*60*60*1e3),i=o.toUTCString()}f(e,t,{expires:i,path:"/",domain:r})},read:function(e){a(e);for(var t=[],n=0,r=document.cookie.split(";");n<r.length;n++){var i=r[n],o=i.split("=",1)[0];o.trim()===e&&t.push(i.substring(o.length+1,i.length).trim())}for(var c=!1,s=[],l=0;l<t.length;l++){var u=t[l];""===u?c=!0:s.push(u)}return 1===s.length?s[0]:s.length>1?(this.delete(e),null):c?"":null},delete:function(e){for(var t=[null].concat(n(window.location.hostname)),i=[null].concat(r(window.location.pathname)),o=0,a=Array.from(t);o<a.length;o++)for(var c=a[o],s=0,l=Array.from(i);s<l.length;s++){var u=l[s];f(e,"",{expires:p,domain:c,path:u})}},are_enabled:function(){return null!=navigator.cookieEnabled?navigator.cookieEnabled:(document.cookie="this_is_a_test_cookie",document.cookie.indexOf("this_is_a_test_cookie")!==-1)}}}),define("modules/core/exception",["require","exports","tslib","external/tracekit","modules/constants/page_load","modules/constants/request","modules/core/exception_tag_registry","modules/pagelet_config","modules/core/xhr"],function(e,t,n,r,i,o,a,c,s){"use strict";function l(e){p.push(e)}function reportException(e){var n=e.err,i=e.force,o=e.tags,a=e.severity,c=e.exc_extra;if(!n.reported){var s=r.computeStackTrace(n),l=null!=(s&&s.stack)?s.stack:[];t._reportException({msg:n.message,stack:l,force:i,tags:o,severity:a,exc_extra:c}),n.reported=!0}}function _reportException(e){var t=e.msg,l=e.stack,p=e.force,d=e.tags,g=e.severity,m=e.exc_extra;if(!h||p){var v=["\\b_reportException\\b","\\breportException\\b","\\bassert\\b","\\breportStack\\b"],x=l,_=l,k=[];l=u(l,v);try{throw new Error}catch(e){var y=r.computeStackTrace(e);null!=y&&null!=y.stack&&(k=y.stack),_=k,k=u(k,v)}var b=l.length-k.length;b<=0&&(b=1);var w=l.slice(0,b),D=l.slice(b);d||(d=[]),d=d.concat(a.get_registered_tags()),m=m?n.__assign({},m):{},m.client_time=(new Date).toString(),m.client_utc_time=(new Date).toUTCString(),f+=1,m.exception_number=f,m.page_repo_rev=i.REPO_REV,m.page_load_timestamp=o.PAGE_LOAD_TIME,m.metaserver_mdb_tags=i.METASERVER_MDB_TAGS,m.user_locale=i.USER_LOCALE;var E={};for(var $ in window.requireContexts)if(window.requireContexts.hasOwnProperty($)){var S={},C=window.requireContexts[$].firstUndefinedModule;C&&(S.first_undefined_module=C),E[$]=S}m.page_alameda_failures=E;var T=window.ensemble;if(null!=T&&null!=T.getAugmentedExceptionTags&&d.push.apply(d,T.getAugmentedExceptionTags(m.metaserver_mdb_tags)),null!=T&&null!=T.getPageletInfoForExceptionReporting){var O=T.getPageletInfoForExceptionReporting();m.pagelet_info=O,m.current_pagelet=c.REQUIREJS_CONFIG.context,m.page_load_timestamp=Math.floor(Math.max.apply(Math,O.map(function(e){return e.pagelet_client_load_time}))),d.push("maestro-website")}m.jsexclog_debug_stack_length=l.length,m.jsexclog_debug_context_length=k.length,m.jsexclog_debug_tracekit_stack1=x.reverse(),m.jsexclog_debug_tracekit_stack2=_.reverse();var R={e:t,loc:window.location.href,ref:document.referrer,stack:JSON.stringify(w.reverse()),context_tb:JSON.stringify(D.reverse()),tags:JSON.stringify(d),sev:g||"",exc_extra:JSON.stringify(m||{})};s.sendXhr("/jse",R),h=t}}function u(e,t){for(var n=function(e){if(!e)return!1;for(var n=0,r=t;n<r.length;n++){var i=r[n];if(e.search(i)!==-1)return!0}return!1};e.length>0&&n(e[0].func);)e=e.slice(1);return e}function assert(e,n,i){if(void 0===i&&(i={}),!e){var o=i.tags,a=void 0===o?[]:o,c=i.exc_extra,s=void 0===c?null:c;n="Assertion Error: "+n;try{throw new Error(n)}catch(e){var l=r.computeStackTrace(e);throw t._reportException({msg:n,stack:l&&null!=l.stack?l.stack:[],force:!0,tags:a.concat("module:exception","assert"),exc_extra:s}),e.reported=!0,p.forEach(function(e){return e(l)}),e}}}function reportStack(e,n){void 0===n&&(n={}),n={severity:n.severity||t.SEVERITY.NONCRITICAL,tags:n.tags||[],exc_extra:n.exc_extra||{}};var r=new Error(e);t.reportException({err:r,force:!0,tags:(n.tags||[]).concat("module:exception","reportStack"),severity:n.severity,exc_extra:n.exc_extra})}Object.defineProperty(t,"__esModule",{value:!0});var f=0,p=[],h=void 0;t.SEVERITY={CRITICAL:"critical",NONCRITICAL:"non-critical"},t.registerOnFailedAssert=l,t.reportException=reportException,t._reportException=_reportException,t.cleanup_stack_trace=u,t.assert=assert,t.reportStack=reportStack}),define("modules/core/exception_tag_registry",["require","exports"],function(e,t){"use strict";function n(){var e=[];for(var t in a)a.hasOwnProperty(t)&&e.push(t);return e}function r(e){a[e]=!0}function i(e){delete a[e]}function o(){a={}}Object.defineProperty(t,"__esModule",{value:!0});var a={};t.get_registered_tags=n,t.register_tag=r,t.unregister_tag=i,t.clear_all_tags=o}),define("modules/core/xhr",["require","exports","modules/core/cookies"],function(e,t,n){"use strict";function r(e){var t=document.createElement("a");t.href=e;var n=t.hostname||window.location.hostname;if(n.indexOf(".dropbox.com",n.length-".dropbox.com".length)===-1)throw new Error("Cannot send the CSRF token to "+n)}function i(e){var t=n.Cookies.read("__Host-js_csrf");e.is_xhr=!0,e.t=t}function o(e){var t=[];for(var n in e)e.hasOwnProperty(n)&&void 0!==e[n]&&t.push(encodeURIComponent(n)+"="+encodeURIComponent(String(e[n])));return t.join("&")}function a(e,t,n){void 0===n&&(n=c),r(e),i(t);var a=o(t),s=new XMLHttpRequest;return s.onreadystatechange=function(){s.readyState===XMLHttpRequest.DONE&&n(s.status)},s.open("POST",e),s.setRequestHeader("Content-Type","application/x-www-form-urlencoded"),s.send(a),s}Object.defineProperty(t,"__esModule",{value:!0}),t.assertDropboxDomain=r;var c=function(e){};t.sendXhr=a}),define("modules/pagelet_config",["require","exports","module"],function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.REQUIREJS_CONFIG=n.config().REQUIREJS_CONFIG}),define("modules/shims/tracekit",["require","exports","external/tracekit"],function(e,t,n){"use strict";return n.linesOfContext=1,n.remoteFetching=!1,n.noConflict()});
//# sourceMappingURL=pkg-exception-reporting.min.js-vflL_N91n.map