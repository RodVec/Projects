<!DOCTYPE html>

<html  dir="ltr" lang="es" xml:lang="es">
<head>
    <title>COMILLAS: Entrar al sitio</title>
<link rel="shortcut icon" href="//sifo.comillas.edu/pluginfile.php/1/theme_snap/favicon/1643070692/favicon.ico"/>
<meta name="apple-itunes-app" content="app-id=1553337282, app-argument=https://sifo.comillas.edu/login/index.php"/><link rel="manifest" href="https://sifo.comillas.edu/admin/tool/mobile/mobile.webmanifest.php" /><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><script type="text/javascript">(window.NREUM||(NREUM={})).init={ajax:{deny_list:["bam-cell.nr-data.net"]}};(window.NREUM||(NREUM={})).loader_config={licenseKey:"06560f3a30",applicationID:"136601874"};window.NREUM||(NREUM={}),__nr_require=function(t,e,n){function r(n){if(!e[n]){var i=e[n]={exports:{}};t[n][0].call(i.exports,function(e){var i=t[n][1][e];return r(i||e)},i,i.exports)}return e[n].exports}if("function"==typeof __nr_require)return __nr_require;for(var i=0;i<n.length;i++)r(n[i]);return r}({1:[function(t,e,n){function r(){}function i(t,e,n,r){return function(){return s.recordSupportability("API/"+e+"/called"),o(t+e,[u.now()].concat(c(arguments)),n?null:this,r),n?void 0:this}}var o=t("handle"),a=t(10),c=t(11),f=t("ee").get("tracer"),u=t("loader"),s=t(4),d=NREUM;"undefined"==typeof window.newrelic&&(newrelic=d);var p=["setPageViewName","setCustomAttribute","setErrorHandler","finished","addToTrace","inlineHit","addRelease"],l="api-",v=l+"ixn-";a(p,function(t,e){d[e]=i(l,e,!0,"api")}),d.addPageAction=i(l,"addPageAction",!0),d.setCurrentRouteName=i(l,"routeName",!0),e.exports=newrelic,d.interaction=function(){return(new r).get()};var m=r.prototype={createTracer:function(t,e){var n={},r=this,i="function"==typeof e;return o(v+"tracer",[u.now(),t,n],r),function(){if(f.emit((i?"":"no-")+"fn-start",[u.now(),r,i],n),i)try{return e.apply(this,arguments)}catch(t){throw f.emit("fn-err",[arguments,this,t],n),t}finally{f.emit("fn-end",[u.now()],n)}}}};a("actionText,setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","),function(t,e){m[e]=i(v,e)}),newrelic.noticeError=function(t,e){"string"==typeof t&&(t=new Error(t)),s.recordSupportability("API/noticeError/called"),o("err",[t,u.now(),!1,e])}},{}],2:[function(t,e,n){function r(t){if(NREUM.init){for(var e=NREUM.init,n=t.split("."),r=0;r<n.length-1;r++)if(e=e[n[r]],"object"!=typeof e)return;return e=e[n[n.length-1]]}}e.exports={getConfiguration:r}},{}],3:[function(t,e,n){var r=!1;try{var i=Object.defineProperty({},"passive",{get:function(){r=!0}});window.addEventListener("testPassive",null,i),window.removeEventListener("testPassive",null,i)}catch(o){}e.exports=function(t){return r?{passive:!0,capture:!!t}:!!t}},{}],4:[function(t,e,n){function r(t,e){var n=[a,t,{name:t},e];return o("storeMetric",n,null,"api"),n}function i(t,e){var n=[c,t,{name:t},e];return o("storeEventMetrics",n,null,"api"),n}var o=t("handle"),a="sm",c="cm";e.exports={constants:{SUPPORTABILITY_METRIC:a,CUSTOM_METRIC:c},recordSupportability:r,recordCustom:i}},{}],5:[function(t,e,n){function r(){return c.exists&&performance.now?Math.round(performance.now()):(o=Math.max((new Date).getTime(),o))-a}function i(){return o}var o=(new Date).getTime(),a=o,c=t(12);e.exports=r,e.exports.offset=a,e.exports.getLastTimestamp=i},{}],6:[function(t,e,n){function r(t){return!(!t||!t.protocol||"file:"===t.protocol)}e.exports=r},{}],7:[function(t,e,n){function r(t,e){var n=t.getEntries();n.forEach(function(t){"first-paint"===t.name?l("timing",["fp",Math.floor(t.startTime)]):"first-contentful-paint"===t.name&&l("timing",["fcp",Math.floor(t.startTime)])})}function i(t,e){var n=t.getEntries();if(n.length>0){var r=n[n.length-1];if(u&&u<r.startTime)return;var i=[r],o=a({});o&&i.push(o),l("lcp",i)}}function o(t){t.getEntries().forEach(function(t){t.hadRecentInput||l("cls",[t])})}function a(t){var e=navigator.connection||navigator.mozConnection||navigator.webkitConnection;if(e)return e.type&&(t["net-type"]=e.type),e.effectiveType&&(t["net-etype"]=e.effectiveType),e.rtt&&(t["net-rtt"]=e.rtt),e.downlink&&(t["net-dlink"]=e.downlink),t}function c(t){if(t instanceof y&&!w){var e=Math.round(t.timeStamp),n={type:t.type};a(n),e<=v.now()?n.fid=v.now()-e:e>v.offset&&e<=Date.now()?(e-=v.offset,n.fid=v.now()-e):e=v.now(),w=!0,l("timing",["fi",e,n])}}function f(t){"hidden"===t&&(u=v.now(),l("pageHide",[u]))}if(!("init"in NREUM&&"page_view_timing"in NREUM.init&&"enabled"in NREUM.init.page_view_timing&&NREUM.init.page_view_timing.enabled===!1)){var u,s,d,p,l=t("handle"),v=t("loader"),m=t(9),g=t(3),y=NREUM.o.EV;if("PerformanceObserver"in window&&"function"==typeof window.PerformanceObserver){s=new PerformanceObserver(r);try{s.observe({entryTypes:["paint"]})}catch(h){}d=new PerformanceObserver(i);try{d.observe({entryTypes:["largest-contentful-paint"]})}catch(h){}p=new PerformanceObserver(o);try{p.observe({type:"layout-shift",buffered:!0})}catch(h){}}if("addEventListener"in document){var w=!1,b=["click","keydown","mousedown","pointerdown","touchstart"];b.forEach(function(t){document.addEventListener(t,c,g(!1))})}m(f)}},{}],8:[function(t,e,n){function r(t,e){if(!i)return!1;if(t!==i)return!1;if(!e)return!0;if(!o)return!1;for(var n=o.split("."),r=e.split("."),a=0;a<r.length;a++)if(r[a]!==n[a])return!1;return!0}var i=null,o=null,a=/Version\/(\S+)\s+Safari/;if(navigator.userAgent){var c=navigator.userAgent,f=c.match(a);f&&c.indexOf("Chrome")===-1&&c.indexOf("Chromium")===-1&&(i="Safari",o=f[1])}e.exports={agent:i,version:o,match:r}},{}],9:[function(t,e,n){function r(t){function e(){t(c&&document[c]?document[c]:document[o]?"hidden":"visible")}"addEventListener"in document&&a&&document.addEventListener(a,e,i(!1))}var i=t(3);e.exports=r;var o,a,c;"undefined"!=typeof document.hidden?(o="hidden",a="visibilitychange",c="visibilityState"):"undefined"!=typeof document.msHidden?(o="msHidden",a="msvisibilitychange"):"undefined"!=typeof document.webkitHidden&&(o="webkitHidden",a="webkitvisibilitychange",c="webkitVisibilityState")},{}],10:[function(t,e,n){function r(t,e){var n=[],r="",o=0;for(r in t)i.call(t,r)&&(n[o]=e(r,t[r]),o+=1);return n}var i=Object.prototype.hasOwnProperty;e.exports=r},{}],11:[function(t,e,n){function r(t,e,n){e||(e=0),"undefined"==typeof n&&(n=t?t.length:0);for(var r=-1,i=n-e||0,o=Array(i<0?0:i);++r<i;)o[r]=t[e+r];return o}e.exports=r},{}],12:[function(t,e,n){e.exports={exists:"undefined"!=typeof window.performance&&window.performance.timing&&"undefined"!=typeof window.performance.timing.navigationStart}},{}],ee:[function(t,e,n){function r(){}function i(t){function e(t){return t&&t instanceof r?t:t?u(t,f,a):a()}function n(n,r,i,o,a){if(a!==!1&&(a=!0),!l.aborted||o){t&&a&&t(n,r,i);for(var c=e(i),f=m(n),u=f.length,s=0;s<u;s++)f[s].apply(c,r);var p=d[w[n]];return p&&p.push([b,n,r,c]),c}}function o(t,e){h[t]=m(t).concat(e)}function v(t,e){var n=h[t];if(n)for(var r=0;r<n.length;r++)n[r]===e&&n.splice(r,1)}function m(t){return h[t]||[]}function g(t){return p[t]=p[t]||i(n)}function y(t,e){l.aborted||s(t,function(t,n){e=e||"feature",w[n]=e,e in d||(d[e]=[])})}var h={},w={},b={on:o,addEventListener:o,removeEventListener:v,emit:n,get:g,listeners:m,context:e,buffer:y,abort:c,aborted:!1};return b}function o(t){return u(t,f,a)}function a(){return new r}function c(){(d.api||d.feature)&&(l.aborted=!0,d=l.backlog={})}var f="nr@context",u=t("gos"),s=t(10),d={},p={},l=e.exports=i();e.exports.getOrSetContext=o,l.backlog=d},{}],gos:[function(t,e,n){function r(t,e,n){if(i.call(t,e))return t[e];var r=n();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(t,e,{value:r,writable:!0,enumerable:!1}),r}catch(o){}return t[e]=r,r}var i=Object.prototype.hasOwnProperty;e.exports=r},{}],handle:[function(t,e,n){function r(t,e,n,r){i.buffer([t],r),i.emit(t,e,n)}var i=t("ee").get("handle");e.exports=r,r.ee=i},{}],id:[function(t,e,n){function r(t){var e=typeof t;return!t||"object"!==e&&"function"!==e?-1:t===window?0:a(t,o,function(){return i++})}var i=1,o="nr@id",a=t("gos");e.exports=r},{}],loader:[function(t,e,n){function r(){if(!P++){var t=M.info=NREUM.info,e=g.getElementsByTagName("script")[0];if(setTimeout(u.abort,3e4),!(t&&t.licenseKey&&t.applicationID&&e))return u.abort();f(O,function(e,n){t[e]||(t[e]=n)});var n=a();c("mark",["onload",n+M.offset],null,"api"),c("timing",["load",n]);var r=g.createElement("script");0===t.agent.indexOf("http://")||0===t.agent.indexOf("https://")?r.src=t.agent:r.src=v+"://"+t.agent,e.parentNode.insertBefore(r,e)}}function i(){"complete"===g.readyState&&o()}function o(){c("mark",["domContent",a()+M.offset],null,"api")}var a=t(5),c=t("handle"),f=t(10),u=t("ee"),s=t(8),d=t(6),p=t(2),l=t(3),v=p.getConfiguration("ssl")===!1?"http":"https",m=window,g=m.document,y="addEventListener",h="attachEvent",w=m.XMLHttpRequest,b=w&&w.prototype,E=!d(m.location);NREUM.o={ST:setTimeout,SI:m.setImmediate,CT:clearTimeout,XHR:w,REQ:m.Request,EV:m.Event,PR:m.Promise,MO:m.MutationObserver};var x=""+location,O={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-1214.min.js"},T=w&&b&&b[y]&&!/CriOS/.test(navigator.userAgent),M=e.exports={offset:a.getLastTimestamp(),now:a,origin:x,features:{},xhrWrappable:T,userAgent:s,disabled:E};if(!E){t(1),t(7),g[y]?(g[y]("DOMContentLoaded",o,l(!1)),m[y]("load",r,l(!1))):(g[h]("onreadystatechange",i),m[h]("onload",r)),c("mark",["firstbyte",a.getLastTimestamp()],null,"api");var P=0}},{}],"wrap-function":[function(t,e,n){function r(t,e){function n(e,n,r,f,u){function nrWrapper(){var o,a,s,p;try{a=this,o=d(arguments),s="function"==typeof r?r(o,a):r||{}}catch(l){i([l,"",[o,a,f],s],t)}c(n+"start",[o,a,f],s,u);try{return p=e.apply(a,o)}catch(v){throw c(n+"err",[o,a,v],s,u),v}finally{c(n+"end",[o,a,p],s,u)}}return a(e)?e:(n||(n=""),nrWrapper[p]=e,o(e,nrWrapper,t),nrWrapper)}function r(t,e,r,i,o){r||(r="");var c,f,u,s="-"===r.charAt(0);for(u=0;u<e.length;u++)f=e[u],c=t[f],a(c)||(t[f]=n(c,s?f+r:r,i,f,o))}function c(n,r,o,a){if(!v||e){var c=v;v=!0;try{t.emit(n,r,o,e,a)}catch(f){i([f,n,r,o],t)}v=c}}return t||(t=s),n.inPlace=r,n.flag=p,n}function i(t,e){e||(e=s);try{e.emit("internal-error",t)}catch(n){}}function o(t,e,n){if(Object.defineProperty&&Object.keys)try{var r=Object.keys(t);return r.forEach(function(n){Object.defineProperty(e,n,{get:function(){return t[n]},set:function(e){return t[n]=e,e}})}),e}catch(o){i([o],n)}for(var a in t)l.call(t,a)&&(e[a]=t[a]);return e}function a(t){return!(t&&t instanceof Function&&t.apply&&!t[p])}function c(t,e){var n=e(t);return n[p]=t,o(t,n,s),n}function f(t,e,n){var r=t[e];t[e]=c(r,n)}function u(){for(var t=arguments.length,e=new Array(t),n=0;n<t;++n)e[n]=arguments[n];return e}var s=t("ee"),d=t(11),p="nr@original",l=Object.prototype.hasOwnProperty,v=!1;e.exports=r,e.exports.wrapFunction=c,e.exports.wrapInPlace=f,e.exports.argsToArray=u},{}]},{},["loader"]);</script>
<meta name="keywords" content="moodle, COMILLAS: Entrar al sitio" />
<link rel="stylesheet" type="text/css" href="https://sifo.comillas.edu/theme/yui_combo.php?3.17.2/cssgrids/cssgrids.css" /><link rel="stylesheet" type="text/css" href="https://sifo.comillas.edu/theme/yui_combo.php?rollup/3.17.2/yui-moodlesimple.css" /><script id="firstthemesheet" type="text/css">/** Required in order to fix style inclusion problems in IE with YUI **/</script><link rel="stylesheet" type="text/css" href="https://sifo.comillas.edu/theme/styles.php/snap/1643070692_1640827460/all" />
<link rel="stylesheet" type="text/css" href="https://sifo.comillas.edu/local/comillasppi/style/comillasppi_style.css" />
<script>
//<![CDATA[
var M = {}; M.yui = {};
M.pageloadstarttime = new Date();
M.cfg = {"wwwroot":"https:\/\/sifo.comillas.edu","sesskey":"CDs3oCZ0u3","sessiontimeout":"14400","sessiontimeoutwarning":1200,"themerev":"1643070692","slasharguments":1,"theme":"snap","iconsystemmodule":"core\/icon_system_fontawesome","jsrev":"1643070692","admin":"admin","svgicons":true,"usertimezone":"Europa\/Madrid","contextid":1,"langrev":1643070692,"templaterev":"1643070692","developerdebug":true};var yui1ConfigFn = function(me) {if(/-skin|reset|fonts|grids|base/.test(me.name)){me.type='css';me.path=me.path.replace(/\.js/,'.css');me.path=me.path.replace(/\/yui2-skin/,'/assets/skins/sam/yui2-skin')}};
var yui2ConfigFn = function(me) {var parts=me.name.replace(/^moodle-/,'').split('-'),component=parts.shift(),module=parts[0],min='-min';if(/-(skin|core)$/.test(me.name)){parts.pop();me.type='css';min=''}
if(module){var filename=parts.join('-');me.path=component+'/'+module+'/'+filename+min+'.'+me.type}else{me.path=component+'/'+component+'.'+me.type}};
YUI_config = {"debug":true,"base":"https:\/\/sifo.comillas.edu\/lib\/yuilib\/3.17.2\/","comboBase":"https:\/\/sifo.comillas.edu\/theme\/yui_combo.php?","combine":true,"filter":"RAW","insertBefore":"firstthemesheet","groups":{"yui2":{"base":"https:\/\/sifo.comillas.edu\/lib\/yuilib\/2in3\/2.9.0\/build\/","comboBase":"https:\/\/sifo.comillas.edu\/theme\/yui_combo.php?","combine":true,"ext":false,"root":"2in3\/2.9.0\/build\/","patterns":{"yui2-":{"group":"yui2","configFn":yui1ConfigFn}}},"moodle":{"name":"moodle","base":"https:\/\/sifo.comillas.edu\/theme\/yui_combo.php?m\/1643070692\/","combine":true,"comboBase":"https:\/\/sifo.comillas.edu\/theme\/yui_combo.php?","ext":false,"root":"m\/1643070692\/","patterns":{"moodle-":{"group":"moodle","configFn":yui2ConfigFn}},"filter":"DEBUG","modules":{"moodle-core-languninstallconfirm":{"requires":["base","node","moodle-core-notification-confirm","moodle-core-notification-alert"]},"moodle-core-actionmenu":{"requires":["base","event","node-event-simulate"]},"moodle-core-maintenancemodetimer":{"requires":["base","node"]},"moodle-core-tooltip":{"requires":["base","node","io-base","moodle-core-notification-dialogue","json-parse","widget-position","widget-position-align","event-outside","cache-base"]},"moodle-core-handlebars":{"condition":{"trigger":"handlebars","when":"after"}},"moodle-core-blocks":{"requires":["base","node","io","dom","dd","dd-scroll","moodle-core-dragdrop","moodle-core-notification"]},"moodle-core-dragdrop":{"requires":["base","node","io","dom","dd","event-key","event-focus","moodle-core-notification"]},"moodle-core-event":{"requires":["event-custom"]},"moodle-core-popuphelp":{"requires":["moodle-core-tooltip"]},"moodle-core-formchangechecker":{"requires":["base","event-focus","moodle-core-event"]},"moodle-core-notification":{"requires":["moodle-core-notification-dialogue","moodle-core-notification-alert","moodle-core-notification-confirm","moodle-core-notification-exception","moodle-core-notification-ajaxexception"]},"moodle-core-notification-dialogue":{"requires":["base","node","panel","escape","event-key","dd-plugin","moodle-core-widget-focusafterclose","moodle-core-lockscroll"]},"moodle-core-notification-alert":{"requires":["moodle-core-notification-dialogue"]},"moodle-core-notification-confirm":{"requires":["moodle-core-notification-dialogue"]},"moodle-core-notification-exception":{"requires":["moodle-core-notification-dialogue"]},"moodle-core-notification-ajaxexception":{"requires":["moodle-core-notification-dialogue"]},"moodle-core-chooserdialogue":{"requires":["base","panel","moodle-core-notification"]},"moodle-core-lockscroll":{"requires":["plugin","base-build"]},"moodle-core_availability-form":{"requires":["base","node","event","event-delegate","panel","moodle-core-notification-dialogue","json"]},"moodle-backup-confirmcancel":{"requires":["node","node-event-simulate","moodle-core-notification-confirm"]},"moodle-backup-backupselectall":{"requires":["node","event","node-event-simulate","anim"]},"moodle-course-categoryexpander":{"requires":["node","event-key"]},"moodle-course-management":{"requires":["base","node","io-base","moodle-core-notification-exception","json-parse","dd-constrain","dd-proxy","dd-drop","dd-delegate","node-event-delegate"]},"moodle-course-dragdrop":{"requires":["base","node","io","dom","dd","dd-scroll","moodle-core-dragdrop","moodle-core-notification","moodle-course-coursebase","moodle-course-util"]},"moodle-course-util":{"requires":["node"],"use":["moodle-course-util-base"],"submodules":{"moodle-course-util-base":{},"moodle-course-util-section":{"requires":["node","moodle-course-util-base"]},"moodle-course-util-cm":{"requires":["node","moodle-course-util-base"]}}},"moodle-course-formatchooser":{"requires":["base","node","node-event-simulate"]},"moodle-form-dateselector":{"requires":["base","node","overlay","calendar"]},"moodle-form-shortforms":{"requires":["node","base","selector-css3","moodle-core-event"]},"moodle-form-passwordunmask":{"requires":[]},"moodle-question-searchform":{"requires":["base","node"]},"moodle-question-chooser":{"requires":["moodle-core-chooserdialogue"]},"moodle-question-preview":{"requires":["base","dom","event-delegate","event-key","core_question_engine"]},"moodle-core_outcome-outcomepanel":{"requires":["base","handlebars","moodle-core_outcome-models","moodle-core_outcome-scrollpanel","moodle-core_outcome-ariacontrol","moodle-core_outcome-ariacontrolled","moodle-core-notification-dialogue","moodle-core-notification-alert","moodle-core_outcome-simpleio"]},"moodle-core_outcome-scrollpanel":{"requires":["plugin","widget","panel"]},"moodle-core_outcome-mapoutcome":{"requires":["widget","handlebars","json-parse","json-stringify","moodle-core_outcome-models","moodle-core_outcome-outcomepanel","moodle-core-notification-exception"]},"moodle-core_outcome-dynamicpanel":{"requires":["base","moodle-core_outcome-simpleio","classnamemanager","moodle-core-notification-dialogue","moodle-core_outcome-scrollpanel"]},"moodle-core_outcome-models":{"requires":["base","model","model-list","moodle-core_outcome-simpleio","json-stringify"]},"moodle-core_outcome-ariacontrol":{"requires":["plugin","widget","escape"]},"moodle-core_outcome-ariacontrolled":{"requires":["plugin","widget"]},"moodle-core_outcome-simpleio":{"requires":["base","io-base","json-parse","moodle-core-notification-exception","moodle-core-notification-ajaxexception"]},"moodle-core_outcome-editoutcome":{"requires":["widget","event-valuechange","handlebars","json-parse","json-stringify","moodle-core_outcome-models","moodle-core-notification-dialogue","moodle-core-notification-exception"]},"moodle-core_outcome-mapoutcomeset":{"requires":["widget","model","model-list","handlebars","json-parse","json-stringify","moodle-core_outcome-models","moodle-core-notification-dialogue","moodle-core-notification-exception","moodle-core-notification-alert","moodle-core_outcome-simpleio"]},"moodle-availability_completion-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-availability_date-form":{"requires":["base","node","event","io","moodle-core_availability-form"]},"moodle-availability_grade-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-availability_group-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-availability_grouping-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-availability_profile-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-availability_releasecode-form":{"requires":["base","node","event","event-valuechange","moodle-core_availability-form"]},"moodle-mod_assign-history":{"requires":["node","transition"]},"moodle-mod_attendance-groupfilter":{"requires":["base","node"]},"moodle-mod_customcert-rearrange":{"requires":["dd-delegate","dd-drag"]},"moodle-mod_hsuforum-io":{"requires":["base","io-base","io-form","io-upload-iframe","json-parse"]},"moodle-mod_hsuforum-livelog":{"requires":["widget"]},"moodle-mod_hsuforum-article":{"requires":["base","node","event","router","core_rating","querystring","moodle-mod_hsuforum-io","moodle-mod_hsuforum-livelog","moodle-core-formchangechecker"]},"moodle-mod_quiz-dragdrop":{"requires":["base","node","io","dom","dd","dd-scroll","moodle-core-dragdrop","moodle-core-notification","moodle-mod_quiz-quizbase","moodle-mod_quiz-util-base","moodle-mod_quiz-util-page","moodle-mod_quiz-util-slot","moodle-course-util"]},"moodle-mod_quiz-util":{"requires":["node","moodle-core-actionmenu"],"use":["moodle-mod_quiz-util-base"],"submodules":{"moodle-mod_quiz-util-base":{},"moodle-mod_quiz-util-slot":{"requires":["node","moodle-mod_quiz-util-base"]},"moodle-mod_quiz-util-page":{"requires":["node","moodle-mod_quiz-util-base"]}}},"moodle-mod_quiz-toolboxes":{"requires":["base","node","event","event-key","io","moodle-mod_quiz-quizbase","moodle-mod_quiz-util-slot","moodle-core-notification-ajaxexception"]},"moodle-mod_quiz-modform":{"requires":["base","node","event"]},"moodle-mod_quiz-quizbase":{"requires":["base","node"]},"moodle-mod_quiz-autosave":{"requires":["base","node","event","event-valuechange","node-event-delegate","io-form"]},"moodle-mod_quiz-questionchooser":{"requires":["moodle-core-chooserdialogue","moodle-mod_quiz-util","querystring-parse"]},"moodle-message_airnotifier-toolboxes":{"requires":["base","node","io"]},"moodle-block_gapps-gmail":{"requires":["base","event","handlebars"]},"moodle-block_gapps-popup":{"requires":["base","event"]},"moodle-filter_glossary-autolinker":{"requires":["base","node","io-base","json-parse","event-delegate","overlay","moodle-core-event","moodle-core-notification-alert","moodle-core-notification-exception","moodle-core-notification-ajaxexception"]},"moodle-filter_mathjaxloader-loader":{"requires":["moodle-core-event"]},"moodle-editor_atto-editor":{"requires":["node","transition","io","overlay","escape","event","event-simulate","event-custom","node-event-html5","node-event-simulate","yui-throttle","moodle-core-notification-dialogue","moodle-core-notification-confirm","moodle-editor_atto-rangy","handlebars","timers","querystring-stringify"]},"moodle-editor_atto-plugin":{"requires":["node","base","escape","event","event-outside","handlebars","event-custom","timers","moodle-editor_atto-menu"]},"moodle-editor_atto-menu":{"requires":["moodle-core-notification-dialogue","node","event","event-custom"]},"moodle-editor_atto-rangy":{"requires":[]},"moodle-report_eventlist-eventfilter":{"requires":["base","event","node","node-event-delegate","datatable","autocomplete","autocomplete-filters"]},"moodle-report_loglive-fetchlogs":{"requires":["base","event","node","io","node-event-delegate"]},"moodle-report_outcome-autocomplete":{"requires":["base","autocomplete","autocomplete-filters","autocomplete-highlighters"]},"moodle-report_outcome-resetoptions":{"requires":["base","moodle-core_outcome-simpleio"]},"moodle-gradereport_grader-gradereporttable":{"requires":["base","node","event","handlebars","overlay","event-hover"]},"moodle-gradereport_history-userselector":{"requires":["escape","event-delegate","event-key","handlebars","io-base","json-parse","moodle-core-notification-dialogue"]},"moodle-tool_capability-search":{"requires":["base","node"]},"moodle-tool_lp-dragdrop-reorder":{"requires":["moodle-core-dragdrop"]},"moodle-tool_monitor-dropdown":{"requires":["base","event","node"]},"moodle-local_kaltura-lticontainer":{"requires":["base","node"]},"moodle-local_kaltura-ltitinymcepanel":{"requires":["base","node","panel","node-event-simulate"]},"moodle-local_kaltura-ltiservice":{"requires":["base","node","node-event-simulate"]},"moodle-local_kaltura-ltipanel":{"requires":["base","node","panel","node-event-simulate"]},"moodle-assignfeedback_editpdf-editor":{"requires":["base","event","node","io","graphics","json","event-move","event-resize","transition","querystring-stringify-simple","moodle-core-notification-dialog","moodle-core-notification-alert","moodle-core-notification-warning","moodle-core-notification-exception","moodle-core-notification-ajaxexception"]},"moodle-atto_accessibilitychecker-button":{"requires":["color-base","moodle-editor_atto-plugin"]},"moodle-atto_accessibilityhelper-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_align-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_bold-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_bsgrid-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_charmap-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_chemistry-button":{"requires":["moodle-editor_atto-plugin","moodle-core-event","io","event-valuechange","tabview","array-extras"]},"moodle-atto_clear-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_collapse-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_count-button":{"requires":["io","json-parse","moodle-editor_atto-plugin"]},"moodle-atto_emojipicker-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_emoticon-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_equation-button":{"requires":["moodle-editor_atto-plugin","moodle-core-event","io","event-valuechange","tabview","array-extras"]},"moodle-atto_filedragdrop-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_fullscreen-button":{"requires":["event-resize","moodle-editor_atto-plugin"]},"moodle-atto_h5p-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_hr-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_html-beautify":{},"moodle-atto_html-codemirror":{"requires":["moodle-atto_html-codemirror-skin"]},"moodle-atto_html-button":{"requires":["promise","moodle-editor_atto-plugin","moodle-atto_html-beautify","moodle-atto_html-codemirror","event-valuechange"]},"moodle-atto_htmlplus-beautify":{},"moodle-atto_htmlplus-codemirror":{"requires":["moodle-atto_htmlplus-codemirror-skin"]},"moodle-atto_htmlplus-button":{"requires":["moodle-editor_atto-plugin","moodle-atto_htmlplus-beautify","moodle-atto_htmlplus-codemirror","event-valuechange"]},"moodle-atto_image-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_imagedragdrop-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_indent-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_italic-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_kalturamedia-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_link-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_managefiles-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_managefiles-usedfiles":{"requires":["node","escape"]},"moodle-atto_media-button":{"requires":["moodle-editor_atto-plugin","moodle-form-shortforms"]},"moodle-atto_noautolink-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_orderedlist-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_rtl-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_strike-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_subscript-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_superscript-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_table-button":{"requires":["moodle-editor_atto-plugin","moodle-editor_atto-menu","event","event-valuechange"]},"moodle-atto_teamsmeeting-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_title-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_underline-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_undo-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_unorderedlist-button":{"requires":["moodle-editor_atto-plugin"]}}},"gallery":{"name":"gallery","base":"https:\/\/sifo.comillas.edu\/lib\/yuilib\/gallery\/","combine":true,"comboBase":"https:\/\/sifo.comillas.edu\/theme\/yui_combo.php?","ext":false,"root":"gallery\/1643070692\/","patterns":{"gallery-":{"group":"gallery"}}}},"modules":{"core_filepicker":{"name":"core_filepicker","fullpath":"https:\/\/sifo.comillas.edu\/lib\/javascript.php\/1643070692\/repository\/filepicker.js","requires":["base","node","node-event-simulate","json","async-queue","io-base","io-upload-iframe","io-form","yui2-treeview","panel","cookie","datatable","datatable-sort","resize-plugin","dd-plugin","escape","moodle-core_filepicker","moodle-core-notification-dialogue"]},"core_comment":{"name":"core_comment","fullpath":"https:\/\/sifo.comillas.edu\/lib\/javascript.php\/1643070692\/comment\/comment.js","requires":["base","io-base","node","json","yui2-animation","overlay","escape"]},"mathjax":{"name":"mathjax","fullpath":"https:\/\/cdn.jsdelivr.net\/npm\/mathjax@2.7.9\/MathJax.js?delayStartupUntil=configured"}}};
M.yui.loader = {modules: {}};

//]]>
</script>

<meta name="robots" content="noindex" /><meta name="theme-color" content="#F6B729">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='//fonts.googleapis.com/css?family=Roboto:500,100,400,300' rel='stylesheet' type='text/css'>

</head>

<body  id="page-login-index" class="format-site  path-login chrome dir-ltr lang-es yui-skin-sam yui3-skin-sam sifo-comillas-edu pagelayout-login course-1 context-1 notloggedin device-type-default snap-resource-card theme-snap layout-login">

<div>
    <a class="sr-only sr-only-focusable" href="#maincontent">Saltar a contenido principal</a>
</div><script src="https://sifo.comillas.edu/lib/javascript.php/1643070692/lib/babel-polyfill/polyfill.min.js"></script>
<script src="https://sifo.comillas.edu/lib/javascript.php/1643070692/lib/polyfills/polyfill.js"></script>
<script src="https://sifo.comillas.edu/theme/yui_combo.php?rollup/3.17.2/yui-moodlesimple.js"></script><script src="https://sifo.comillas.edu/theme/jquery.php/core/jquery-3.5.1.js"></script>
<script src="https://sifo.comillas.edu/lib/javascript.php/1643070692/lib/javascript-static.js"></script>
<script>
//<![CDATA[
document.body.className += ' jsenabled';
//]]>
</script>


<script>
// CUANDO BODY ESTA ABIERTO
// CAMBIOS DE 03-09-2018
$(function() {
    var bodyid = $('body').attr('id');
    if (bodyid == 'page-login-index') { 
        var googlediv = '';
        $("a[title='Google']").addClass('btn btn-default');
        var egoogle = $("a[title='Google']");
        if(egoogle.length){
            googlediv = egoogle.parent().html();
            if(googlediv!=null && googlediv!=undefined && googlediv!=''){
                googlediv = '<div id="googlelogin">'+googlediv+'</div>';
            }
        }
        var html = '<div class="login"><div class="container"><div class="col-lg-12 login-box"><div class="col-lg-4 col-md-12 right-box"><div class="text-left-login">Inicie sesión mediante<br/> su cuenta organizativa</div><div class="form comillas-login-form"><form action="/login/index.php" method="post" id="login" autocomplete="off"><div class="form-group"><div class="input-group user-box-login"><span class="input-group-addon"><i class="fas fa-user-circle"></i></span> <input id="username" name="username" class="form-control" type="text" placeholder="Usuario" /></div><div class="input-group password-box-login"><span class="input-group-addon"><i class="fas fa-unlock-alt"></i></span><input id="password" name="password" class="form-control" type="password" placeholder="*******" /></div></div><div class="login-button"><input id="loginbtn" type="submit" class="form-control btn btn-default" value="Acceder" /></div></form><div class="officebuttoncontainer"><a href="/auth/oidc/" class="btn btn-default officelogin password-link">Acceso Comillas</a></div>'+googlediv+'<br/><a href="/login/forgot_password.php" class="password-link">¿Ha olvidado su usuario o contraseña?</a></div></div> <div class="col-lg-8 col-md-12 left-box"><div class="col-md-12"><img class="comillas-logo-login" src="https://www.comillas.edu/templates/comillas_estudios/images/vertical_B_COMILLAS_COLOR.png" /><img class="comillas-logo-login logo-login2" src="https://www.comillas.edu/templates/comillas_estudios/images/vertical_B_COMILLAS_COLOR.png" /><br/><br/><br/><p id="comillas-login-desc" style="font-size:18px;text-align: justify">Comillas ICAI-ICADE te propone formar parte de una universidad que en su larga trayectoria ha alcanzado el reconocimiento académico y el empresarial, mediante una oferta educativa que combina títulos sólidos, sentido práctico, internacionalización y, especialmente, formación integral. Para ello, te ofrecemos toda la información y orientación que podáis necesitar para hacer una buena elección.<br/>Elige tu titulación y forma parte de nuestra comunidad.</p><br/></div></div></div></div></div>';
        $('#region-main').html(html);
        $('#loginbtn').val('Acceso Ramón Llull');
        $("a[title='Google']").html($("a[title='Google']").html().replace('Google','Acceso Deusto'));
    }
});

$(function(){
$(".notloggedin .snap-login-button").click(function(e){
    e.stopPropagation();
    e.preventDefault();
    var url = "";

    if (getCookie('theme') != null) {        
        url = M.cfg.wwwroot + '/login/index.php?theme=' + getCookie('theme');
    } else {
        url = M.cfg.wwwroot + '/login/index.php';
    }
    window.location.replace(url);

});
});

</script>
<header id='mr-nav' class='clearfix moodle-has-zindex'>
<div id="snap-header">
<a aria-label="inicio" id="snap-home" title="COMILLAS" class="logo" href="https://sifo.comillas.edu"><span class="sr-only">COMILLAS</span></a>
<div class="pull-right js-only row">
    <span class="hidden-md-down"></span></div>
</div>
</header>

<!-- moodle js hooks -->
<div id="page">
<div id="page-content">
<!--
////////////////////////// MAIN  ///////////////////////////////
-->
<main id="moodle-page" class="clearfix">
<div id="page-header" class="clearfix">
</div>

<section id="region-main">
<div role="main"><span id="maincontent"></span><div class="m-y-3 hidden-sm-down"></div>
<div class="row snap-login-row"  id="logins">
    <div class="snap-login snap-login-option snap-login-cell" id="base-login">
        <h2 class="snap-logo-sitename text-center">COMILLAS</h2>

            <div class="loginerrors">
                <a href="#" id="loginerrormessage" class="accesshide">Su sesión ha excedido el tiempo límite. Por favor, ingrese de nuevo.</a>
                <div class="alert alert-danger" role="alert">Su sesión ha excedido el tiempo límite. Por favor, ingrese de nuevo.</div>
            </div>

        <form action="https://sifo.comillas.edu/login/index.php" method="post" id="login" autocomplete="off" class="snap-custom-form">
            <input type="hidden" name="logintoken" value="yFPIYs6FIp2HFwqBtll52H7YsKNWJLLL">
            <input id="anchor" type="hidden" name="anchor" value="">
            <script>document.getElementById('anchor').value = location.hash;</script>

            <label for="username" class="sr-only">
                    Nombre de usuario
            </label>
            <input type="text" name="username" id="username"
                class="form-control"
                value=""
                placeholder="Nombre de usuario">
            <label for="password" class="sr-only">Contraseña</label>
            <input type="password" name="password" id="password" value=""
                class="form-control"
                placeholder="Contraseña"
                autocomplete="off">
            <br>
            <button type="submit" class="btn btn-primary btn-block" id="loginbtn">Acceder</button>
            <a class="small btn btn-link btn-block" href="https://sifo.comillas.edu/login/forgot_password.php">¿Olvidó su nombre de usuario o contraseña?</a>
        </form>
    </div>
        <div class="snap-login snap-login-option snap-login-cell" id="alt-login">
                <h5>Identifíquese usando su cuenta en:</h5>
                <div class="potentialidplist">
                        <div class="potentialidp">
                            <a href="https://sifo.comillas.edu/auth/oidc/"  class="btn btn-primary btn-block" title="Office 365">
                                    <img class="auth-icon" src="https://sifo.comillas.edu/theme/image.php/snap/auth_oidc/1643070692/o365" onerror="this.style.display='none'"/>
                                Office 365
                            </a>
                        </div>
                        <div class="potentialidp">
                            <a href="https://sifo.comillas.edu/auth/oauth2/login.php?id=1&amp;wantsurl=https%3A%2F%2Fsifo.comillas.edu%2Fpluginfile.php%2F2870370%2Fmod_resource%2Fcontent%2F0%2F02%2520Ecuaci%25C3%25B3n%2520diferencial%2520de%2520conducci%25C3%25B3n.pdf&amp;sesskey=CDs3oCZ0u3"  class="btn btn-primary btn-block" title="Google">
                                    <img class="auth-icon" src="https://accounts.google.com/favicon.ico" onerror="this.style.display='none'"/>
                                Google
                            </a>
                        </div>
                </div>
        </div>

</div>


<span class="snap-log-in-more snap-log-in-loading-spinner"></span></div></section>
</main>
</div>
</div>
<!-- close moodle js hooks -->


<footer id="moodle-footer" role="contentinfo" class="clearfix">
<div id="snap-site-footer"><div id="snap-footer-content"><div class="atto_bsgrid container-fluid">
    <div class="row-fluid">
        <div class="col-md-6 span6">
            <h3 class="footer-title">Contacto</h3>
            <h6><i class="fa fa-map-marker" aria-hidden="true"></i> C. Alberto Aguilera 23 Madrid-28015</h6>
            <h6><i class="fa fa-phone" aria-hidden="true"></i> +34 91 542 28 00</h6>
            <h6><i class="far fa-envelope"></i> <a href="mailto:nuevosalumnos@comillas.edu">nuevosalumnos@comillas.edu</a>&nbsp;</h6>
            <h6><i class="fa fa-globe" aria-hidden="true"></i> <a href="http://www.comillas.edu/es/" target="_blank">http://www.comillas.edu</a></h6>
            <h6><span class="footer-icon"><i class="fas fa-tv"></i> <a href="https://tv.comillas.edu/" target="_blank">Tv Comillas</a></span></h6>



        </div>
        <div class="col-md-4 span4">
            <h3 class="footer-title">Moodle Mobile</h3>
            <table class="table borderless">
                <tbody>
                    <tr>
                        <td style="text-align: right;"><a href="https://play.google.com/store/apps/details?id=com.openlms.openlmsmobile" target="_blank"><img src="https://i.imgur.com/zd0fvvf.jpg" alt="Moodle Mobile" class="img-responsive atto_image_button_text-bottom" width="129" height="37"></a></td>
                        <td style="text-align: left;"><a href="https://apps.apple.com/us/app/open-lms/id1553337282" target="_blank"><img src="https://i.imgur.com/puuBVSV.jpg" alt="Moode Mobile" class="img-responsive atto_image_button_text-bottom" width="130" height="36"></a></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;"><a href="https://www.comillas.edu/app" target="_blank"><img src="https://www.comillas.edu/app/images/comillas.png" alt="app comillas" class="img-responsive atto_image_button_text-bottom"></a></td>
                        <td><a href="https://www.openlms.net/open-lms-mobile-app/" target="_blank"><img src="https://web.upcomillas.es/webcorporativo/openlms.png" class="img-responsive atto_image_button_text-bottom" alt="OPEN LMS comillas"></a></td>
                    </tr>
                </tbody>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
<p><a href="https://www.comillas.edu/cumplimiento-online" target="_blank">Antes de continuar en la sesión lea los avisos sobre derechos y obligaciones legales de uso de la imagen y respeto de la propiedad intelectual en las TIC</a><br></p></div></div>

<div class="row">
    <div id="mrooms-footer" class="helplink col-sm-6">
        <small>
            Diseñado con <a href="https://es.openlms.net/" target="_blank" rel="noopener">Open LMS</a>,
un producto basado en <a href="https://moodle.com/" target="_blank" rel="noopener">Moodle</a>.<br>
Copyright &#169; 2022 Open LMS, todos los derechos reservados.        </small>
    </div>
    <div class="langmenu col-sm-6 text-right">
        <div class="langmenu d-inline-block">
    <form method="get" action="https://sifo.comillas.edu/login/index.php" class="form-inline" id="single_select_f61f185dc3a8cd2">
            <label for="single_select61f185dc3a8cd3">
                <span class="accesshide " >Idioma</span>
            </label>
        <select  id="single_select61f185dc3a8cd3" class="custom-select langmenu" name="lang"
                 >
                    <option  value="de" >Deutsch ‎(de)‎</option>
                    <option  value="en" >English ‎(en)‎</option>
                    <option  value="es" selected>Español - Internacional ‎(es)‎</option>
                    <option  value="fr" >Français ‎(fr)‎</option>
                    <option  value="it" >Italiano ‎(it)‎</option>
                    <option  value="pt" >Português - Portugal ‎(pt)‎</option>
                    <option  value="ar" >عربي ‎(ar)‎</option>
                    <option  value="zh_cn" >简体中文 ‎(zh_cn)‎</option>
        </select>
        <noscript>
            <input type="submit" class="btn btn-secondary ml-1" value="Ir">
        </noscript>
    </form>
</div>    </div>
</div>
<div id="goto-top-link">
        <a class="btn btn-light" role="button" href="javascript:void(0)">
            <i class="icon fa fa-arrow-up fa-fw" title="Ir arriba" aria-label="Ir arriba"></i>
        </a>
    </div><div id="page-footer">
<br/>
<div class="tool_dataprivacy"><a href="https://sifo.comillas.edu/admin/tool/dataprivacy/summary.php">Resumen de conservación de datos</a></div><a href="https://www.openlms.net/open-lms-mobile-app/">Descargar la app para dispositivos móviles</a></div>
</footer>

<style>
    /* COMPETENCES COURSE HEADER */
    .comillas-online #page-mast {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
    }

    .comillas-online #page-course-view-topics #page-header {
        min-height: 200px;
    }

    .comillas-online .course-header-info {
        margin-top: -80px;
        padding: .5em 1em;
        background: rgba(0, 0, 0, 0.5);
        border-radius: 8px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-left: auto;
        width: 100%;
        -webkit-box-flex: 0;
            -ms-flex: 0 0 30%;
                flex: 0 0 30%;
    }

    .comillas-online .course-header-competences {
        width: 100%;
    }

    @media screen and (max-width: 1280px) {
        .comillas-online #page-mast {
            -ms-flex-wrap: wrap;
                flex-wrap: wrap;
        }
        .comillas-online .course-header-info {
            width: 100%;
            -webkit-box-flex: 0;
                -ms-flex: 0 0 90%;
                    flex: 0 0 90%;
            margin-top: 0;
            margin: 0 5% 1em !important;
        }
    }

    @media screen and (max-width: 991px) {
        .comillas-online .course-header-info {
            -ms-flex-wrap: wrap;
                flex-wrap: wrap;
        }
        .comillas-online .course-header-progress {
            width: 100%;
        }
        .comillas-online .progress-test {
            margin-top: -3em;
            margin-bottom: 1em;
        }
    }

    .comillas-online .course-header-progress {
        padding: 0;
        text-align: center;
    }

    .comillas-online .course-header-competence-row {
        min-width: 200px;
        padding-bottom: 10px;
        text-transform: uppercase;
    }

    .comillas-online .course-header-info .comp-title {
        font-size: 15px;
        line-height: 20px;
    }

    .comillas-online .course-header-info .comp-bar {
        padding: 4px;
        background: #fff;
        position: relative;
        border-radius: 10px;
        overflow: hidden;
    }

    .comillas-online .course-header-info .comp-bar .comp-bar-bg {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        background-color: #273877;
    }

    .comillas-online #svg {
        -webkit-transform: rotate(-90deg);
                transform: rotate(-90deg);
    }

    .comillas-online #svg circle {
        stroke-dashoffset: 0;
        -webkit-transition: stroke-dashoffset 1s linear;
        transition: stroke-dashoffset 1s linear;
        stroke: #666;
        stroke-width: 1em;
    }

    .comillas-online #svg #bar {
        stroke: #FF9F1E;
    }

    .comillas-online #cont {
        margin: 0 auto;
        -webkit-box-shadow: 0 0 1em rgba(0, 0, 0, 0.25);
                box-shadow: 0 0 1em rgba(0, 0, 0, 0.25);
        border-radius: 100%;
        position: relative;
        -webkit-transform: scale(0.5);
                transform: scale(0.5);
    }

    .comillas-online .progress-test, .comillas-online #cont {
        margin-top: -2em;
    }

    .comillas-online #cont:after {
        position: absolute;
        display: block;
        height: 160px;
        width: 160px;
        left: 50%;
        top: 50%;
        -webkit-box-shadow: inset 0 0 1em rgba(0, 0, 0, 0.25);
                box-shadow: inset 0 0 1em rgba(0, 0, 0, 0.25);
        content: attr(data-pct) "%";
        margin-top: -80px;
        margin-left: -80px;
        border-radius: 100%;
        line-height: 160px;
        font-size: 2em;
        text-shadow: 0 0 0.5em rgba(0, 0, 0, 0.25);
    }

    .comillas-online .course-header-info .comp-bar .comp-bar-bg.green,
    .comillas-online #svg #bar.green {
        background-color: #8BC34A;
        stroke: #8BC34A;
    }

    .comillas-online .course-header-info .comp-bar .comp-bar-bg.blue,
    .comillas-online #svg #bar.blue {
        background-color: #7BA4DB;
        stroke: #7BA4DB;
    }

    .comillas-online .course-header-info .comp-bar .comp-bar-bg.yellow,
    .comillas-online #svg #bar.yellow {
        background-color: #FDBF2C;
        stroke: #FDBF2C;
    }

    .comillas-online .course-header-info .comp-bar .comp-bar-bg.red,
    .comillas-online #svg #bar.red {
        background-color: #A4123F;
        stroke: #A4123F;
    }
    /* END COMPETENCES COURSE HEADER */
    /* COURSE LEFT MENU TOGGLE */
    .theme-snap.collapse-menu-enabled #snap-course-wrapper > .row.sidebar-wrapper > .col-lg-9,
    .theme-snap.collapse-menu-enabled #snap-course-wrapper > .row.sidebar-wrapper > .col-lg-3 {
        -webkit-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    .theme-snap.collapse-menu-enabled div#collapse-left-menu {
        display: none;
    }

    @media screen and (min-width: 992px) {
        .theme-snap.collapse-menu-enabled #snap-course-wrapper > .row.sidebar-wrapper {
            position: relative;
        }
        .theme-snap.collapse-menu-enabled #snap-course-wrapper > .row.sidebar-wrapper.toggled > .col-lg-3 {
            margin-left: -30%;
        }
        .theme-snap.collapse-menu-enabled #snap-course-wrapper > .row.sidebar-wrapper.toggled > .col-lg-9 {
            max-width: 100%;
        }
        .theme-snap.collapse-menu-enabled #snap-course-wrapper > .row.sidebar-wrapper > .col-lg-9 {
            position: relative;
        }
        .theme-snap.collapse-menu-enabled div#collapse-left-menu {
            display: block;
        }
        .theme-snap.collapse-menu-enabled div#collapse-left-menu {
            position: absolute;
            top: 1.6em;
            left: 0.3em;
            z-index: 666;
            cursor: pointer;
            opacity: .5;
        }
        .theme-snap.collapse-menu-enabled div#collapse-left-menu svg {
            margin-left: 15px;
        }
    }
    /* END COURSE LEFT MENU TOGGLE */
</style>

<script>
var logo, logo2, imgurl, title, subtitle = "";
 
title = "Universidad de DEUSTO";
subtitle = "La universidad como servicio y compromiso";
logo = '//i.imgur.com/b3fZBet.png';
logo2 = '//i.imgur.com/l1JThS1.jpg';
imgurl = '//i.imgur.com/C7x0C8M.jpg';
           
// Function declarations
function change_background(theme) {
    $(function() {
        if (theme == "deusto") {
            if ( jQuery('.carousel-slide').length > 0 ) {
                // avoid JS error
                jQuery('.carousel-item.carousel-slide_two').remove();
                jQuery('.carousel-item.carousel-slide_three').remove();
                jQuery('.carousel-indicators').remove();
                jQuery('.carousel-item.carousel-slide_one .carousel-slide').css('background-image', 'url(' + imgurl + ')');
                jQuery('.carousel-caption.d-none.d-md-block h1').text(title);
                jQuery('.carousel-caption.d-none.d-md-block p').text(subtitle);
            }
            //jQuery('#snap-home').css('background-image', 'url(' + logo + ')');
        }
    });
}
 
// Function declarations
function showMenus(theme) { 
    // ocultar menus
    jQuery("#menu-frontpage-comillas").css('display', 'none');
    jQuery("#menu-frontpage-deusto").css('display', 'none');
   
    //mostrar menu especifico
    if ( theme  == "deusto" ) {
        jQuery("#menu-frontpage-deusto").css('display', 'inherit');
    } else {
        jQuery("#menu-frontpage-comillas").css('display', 'inherit');
    }
}
 
function setCookie(key, value) {
    var expires = new Date();
    expires.setTime(expires.getTime() + (31 * 24 * 60 * 60 * 1000));
    document.cookie = key + '=' + value + ';expires=' + expires.toUTCString() + "; path=/";
 
}
 
function getCookie(key) {
    var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
    return keyValue ? keyValue[2] : null;
}
 
function deleteCookie(key) {
    document.cookie = key + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
}
 
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;
 
    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');
 
        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

// CHANGE THEME LOGIC
$(function() {
    var theme;
   
    if ( jQuery('body:not(".notloggedin")').length > 0 ) {
        // change background only if user is logged in
        if ( getCookie('theme') != "" ) {
            change_background(getCookie('theme'));           
        }
    } else {
        // delete if exists a cookie with 'theme' index and set the new one following url parameter ...
        var theme ;
 
        if ( getUrlParameter("theme") != "" && getUrlParameter('theme') !== undefined ) {
            deleteCookie('theme');
            theme = getUrlParameter("theme");
            setCookie('theme', theme);
        } else {
            if ( getCookie('theme') != "" && getCookie('theme') !== undefined ) {
                theme = getCookie('theme');
            } else {
                theme = 'default';
                setCookie('theme', theme);
            }
        }
 
        if ( theme  == "deusto" ) {
            // Users who are not students from deusto must login by username
            jQuery('#login').css('display', 'none');  //caja validacion local
            jQuery('.comillas-logo-login').attr('src', logo);
            jQuery('.comillas-logo-login.logo-login2').css('display', 'none');
            jQuery(':not(".officelogin").password-link').remove();
            // jQuery('.logo-login2').attr('src', logo2); // modificacion 03-09-2018
            jQuery('.officelogin').css('display', 'none'); // modificacion 03-09-2018
            jQuery('#comillas-login-desc').html('Nota: Acceso exclusivo para usuarios de Deusto.<br><br> - Los usuarios de Comillas deben  acceder con las credenciales de <a href=https://sifo.comillas.edu/login/index.php?theme=comillas> Office 365</a><br>- Los usuarios de Ramon Llull  pueden acceder desde el <a href=https://sifo.comillas.edu/login/index.php?theme=externos> siguiente enlace</a>.');
            jQuery('.text-left-login').html('Alumnos de DEUSTO<br/>Pulsar en el botón azul e introducir a continuación las credenciales de opendeusto.es');
        } else if ( theme == "externos" ) {
            jQuery('.comillas-logo-login.logo-login2').css('display', 'none'); // modificacion 03-09-2018
            jQuery('#googlelogin').hide();
            jQuery('.officebuttoncontainer').hide();
            $('#loginbtn').val('Acceso Moodlerooms');
        } else if ( theme != "-comillas-online-" ) { // ahora solo entramos aquÃ­ si NO es comillas-online
            // Office login only can viewed for Comillas or others, but not deusto students
            jQuery('.comillas-logo-login.logo-login2').css('display', 'none'); // modificacion 03-09-2018
            jQuery('#login').css('display', 'none');
            jQuery(':not(".officelogin").password-link').remove();
            jQuery('#googlelogin').hide();
        }
    }
    showMenus(getCookie('theme'));
    jQuery('body').addClass('theme-' + getCookie('theme'));
 
    // Search box move
    if ( jQuery('.pagelayout-frontpage').length > 0 ) {
        // execute when viewing front-page
        var tempobj = jQuery('.box.mdl-align.p-y-1');
        tempobj.prependTo(jQuery('#region-main div[role=main]'));
    }

    // NEW COMILLAS-ONLINE THEME CSS
    if (getCookie('theme') == "comillas-online") {
        // add theme class to HTML tag
        jQuery('html').addClass(getCookie('theme'));
        // print compentences course header box
        printCompt();
        
        // redirect to course page on finish mod quiz
        loadFinishModQuizRedirect();

        // print left menu collapse only con comillas-online
         loadMenuCollapse();
    }
    // END NEW COMILLAS-ONLINE THEME CSS
    
    // load menu collapse on all snap sites
    //loadMenuCollapse();

});

// REDIRECT TO COURSE PAGE ON FINISH MOD QUIZ
function loadFinishModQuizRedirect() {
    if (document.getElementById('page-mod-quiz-review')) {
        $alink = $('a.mod_quiz-next-nav');
        if ($alink.length > 0) {
            var classList = document.getElementById('page-mod-quiz-review').className.split(/\s+/);
            for (var i = 0; i < classList.length; i++) {
                if (classList[i].startsWith('course-')) {
                    var courseId = classList[i].split('-')[1];
                    $alink.attr("href", "/course/view.php?id=" + courseId);
                }
            }
        }
    }
}
// END REDIRECT TO COURSE PAGE ON FINISH MOD QUIZ

/* COURSE LEFT MENU TOGGLE */
function loadMenuCollapse(){
    $colnine = $('#snap-course-wrapper > .row > .col-lg-9');
    if ($colnine.length > 0) {
        jQuery('body').addClass('collapse-menu-enabled');
        $('#snap-course-wrapper > .row').addClass('sidebar-wrapper');
        $('#snap-course-wrapper > .row > .col-lg-9').prepend(
            '<div id="collapse-left-menu"><svg viewBox="0 0 100 80" width="30" height="40" id="yui_3_17_2_1_1640072003920_657">'+
            '<rect width="100" height="10" rx="4"></rect><rect y="30" width="100" height="10" rx="4" id="yui_3_17_2_1_1640072003920_656"></rect>'+
            '<rect y="60" width="100" height="10" rx="4"></rect></svg></div>');
        $("#collapse-left-menu").click(function(e) {
            e.preventDefault();
            $("#snap-course-wrapper > .row").toggleClass("toggled");
        });
    }
}
/* END COURSE LEFT MENU TOGGLE */

// COMPETENCES COURSE HEADER BOX (only for comillas-theme)
function printCompt(){
    var $body=$("body"),$notifele=$("#nav-notification-popover-container"),tk="f4844bebc412aff1d5b89c549e66ccc5";if("page-course-view-topics"==$body.attr("id")&&$notifele.length>0){$("#page-mast").append('<div class="course-header-info"></div>');const queryString=window.location.search,urlParams=new URLSearchParams(queryString),courseid=urlParams.get("id");$userid=$notifele.attr("data-userid"),null!=$userid&&null!=$userid&&$.ajax({type:"POST",dataType:"json",url:"/webservice/rest/server.php",data:"wsfunction=core_completion_get_activities_completion_status&moodlewsrestformat=json&wstoken="+tk+"&courseid="+courseid+"&userid="+$userid,headers:{"Content-Type":"application/x-www-form-urlencoded"},complete:function(data){if($total=0,$completed=0,200==data.status){var json=data.responseJSON,comps={};switch($(json.statuses).each((function(index){$total++,$state=$(this)[0].state>0?1:0,$completed+=$state,$.ajax({type:"POST",async:!1,dataType:"json",url:"/webservice/rest/server.php",data:"wsfunction=core_competency_list_course_module_competencies&moodlewsrestformat=json&wstoken="+tk+"&cmid="+$(this)[0].cmid,headers:{"Content-Type":"application/x-www-form-urlencoded"},complete:function(data2){200==data2.status&&$(data2.responseJSON).each((function(index){$found=!1,$compid=$(this)[0].competency.id,$shortname=$(this)[0].competency.shortname,null!=comps[$compid]&&null!=comps[$compid]&&(comps[$compid][1]++,comps[$compid][2]+=$state,$found=!0),$found||(comps[$compid]=[$shortname,1,$state])}))},error:function(data){var json=$.parseJSON(data);console.log("ERROR: "+json.error)}})})),$perc=$total>0?100*$completed/$total:0,$perc=Math.ceil($perc),color="green",!0){case $perc<33:color="red";break;case $perc<66:color="yellow";break;case $perc<99:color="blue";break;default:color="green"}var val=parseInt($perc);isNaN(val)&&(val=100);var c=Math.PI*(2*r);val<0&&(val=0),val>100&&(val=100);var r=90,c,pct=(100-val)/100*(Math.PI*(2*r));$(".course-header-info").append('<div class="course-header-progress"><div id="cont" data-pct="'+$perc+'"><svg id="svg" width="200" height="200" viewPort="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg"><circle r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.48" stroke-dashoffset="0"></circle><circle id="bar" class="'+color+'" r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.48" stroke-dashoffset="0" style="stroke-dashoffset:'+pct+'"></circle></svg></div><div class="progress-test">Mi progreso</div></div>'),Object.keys(comps).length>0&&($(".course-header-info").append('<div class="course-header-competences"></div>'),Object.keys(comps).forEach((function(pos){switch($nombre=comps[pos][0],$total=comps[pos][1],$completos=comps[pos][2],$perc=$total>0?100*$completos/$total:0,$color="green",!0){case $perc<33:$color="red";break;case $perc<66:$color="yellow";break;case $perc<99:$color="blue";break;default:$color="green"}$(".course-header-competences").append('<div class="course-header-competence-row"><div class="comp-title">'+$nombre+'</div><div class="comp-bar"><div class="comp-bar-bg '+$color+'" style="width:'+$perc+'%"></div></div></div>')})))}},error:function(data){var json=$.parseJSON(data);alert(json.error)}})}
}
// END COMPETENCES COURSE HEADER BOX 
 
</script><script>
//<![CDATA[
var require = {
    baseUrl : 'https://sifo.comillas.edu/lib/requirejs.php/1643070692/',
    // We only support AMD modules with an explicit define() statement.
    enforceDefine: true,
    skipDataMain: true,
    waitSeconds : 0,

    paths: {
        jquery: 'https://sifo.comillas.edu/lib/javascript.php/1643070692/lib/jquery/jquery-3.5.1.min',
        jqueryui: 'https://sifo.comillas.edu/lib/javascript.php/1643070692/lib/jquery/ui-1.12.1/jquery-ui.min',
        jqueryprivate: 'https://sifo.comillas.edu/lib/javascript.php/1643070692/lib/requirejs/jquery-private'
    },

    // Custom jquery config map.
    map: {
      // '*' means all modules will get 'jqueryprivate'
      // for their 'jquery' dependency.
      '*': { jquery: 'jqueryprivate' },
      // Stub module for 'process'. This is a workaround for a bug in MathJax (see MDL-60458).
      '*': { process: 'core/first' },

      // 'jquery-private' wants the real jQuery module
      // though. If this line was not here, there would
      // be an unresolvable cyclic dependency.
      jqueryprivate: { jquery: 'jquery' }
    }
};

//]]>
</script>
<script src="https://sifo.comillas.edu/lib/javascript.php/1643070692/lib/requirejs/require.min.js"></script>
<script>
//<![CDATA[
M.util.js_pending("core/first");
require(['core/first'], function() {
require(['core/prefetch'])
;
require(["media_videojs/loader"], function(loader) {
    loader.setUp('es');
});;
require(['theme_boost/loader']);;
M.util.js_pending('theme_snap/snap'); require(['theme_snap/snap'], function(amd) {amd.snapInit({"id":"1","shortname":"Sifo","contextid":1,"categoryid":false,"ajaxurl":"\/course\/rest.php","unavailablesections":[],"unavailablemods":[],"enablecompletion":false,"format":"site","partialrender":true,"toctype":"list","loadPageInCourse":true}, false, 524288000, false, false, 0, false, false, {"primary":"#82009e !default;","success":"#3d5c1f;","warning":"#b55600;","danger":"#990f3d;","info":"#02567e;"}, {"gradepercentage":2,"gradepercentagereal":21,"gradepercentageletter":23,"gradereal":1,"graderealpercentage":12,"graderealletter":13}); M.util.js_complete('theme_snap/snap');});;
M.util.js_pending('theme_snap/accessibility'); require(['theme_snap/accessibility'], function(amd) {amd.snapAxInit(true, true, true); M.util.js_complete('theme_snap/accessibility');});;
M.util.js_pending('theme_snap/login_render-lazy'); require(['theme_snap/login_render-lazy'], function(amd) {amd.loginRender("0", "0"); M.util.js_complete('theme_snap/login_render-lazy');});;
M.util.js_pending('report_allylti/main'); require(['report_allylti/main'], function(amd) {amd.init(); M.util.js_complete('report_allylti/main');});;
M.util.js_pending('filter_oembed/oembed'); require(['filter_oembed/oembed'], function(amd) {amd.init(); M.util.js_complete('filter_oembed/oembed');});;

require(['jquery', 'core/custom_interaction_events'], function($, CustomEvents) {
    CustomEvents.define('#single_select61f185dc3a8cd3', [CustomEvents.events.accessibleChange]);
    $('#single_select61f185dc3a8cd3').on(CustomEvents.events.accessibleChange, function() {
        var ignore = $(this).find(':selected').attr('data-ignore');
        if (typeof ignore === typeof undefined) {
            $('#single_select_f61f185dc3a8cd2').submit();
        }
    });
});
;

require(['theme_boost/loader']);
;

    require(['jquery', 'core/yui'], function($, Y) {
        $(function() {
            M.util.focus_login_error(Y);
        });
    });



;
M.util.js_pending('theme_snap/wcloader'); require(['theme_snap/wcloader'], function(amd) {amd.init("{\"theme_snap\\\/snapce\":[\"https:\\\/\\\/sifo.comillas.edu\\\/pluginfile.php\\\/1\\\/theme_snap\\\/vendorjs\\\/snap-custom-elements\\\/snap-ce\"]}"); M.util.js_complete('theme_snap/wcloader');});;
M.util.js_pending('core/notification'); require(['core/notification'], function(amd) {amd.init(1, []); M.util.js_complete('core/notification');});;
M.util.js_pending('core/log'); require(['core/log'], function(amd) {amd.setConfig({"level":"trace"}); M.util.js_complete('core/log');});;
M.util.js_pending('core/page_global'); require(['core/page_global'], function(amd) {amd.init(); M.util.js_complete('core/page_global');});
    M.util.js_complete("core/first");
});
//]]>
</script>
<script>
//<![CDATA[
M.str = {"moodle":{"lastmodified":"\u00daltima modificaci\u00f3n","name":"Nombre","error":"Error","info":"Informaci\u00f3n","yes":"S\u00ed","no":"No","ok":"OK","cancel":"Cancelar","unknownerror":"Error desconocido","closebuttontitle":"Cerrar","modhide":"Ocultar","modshow":"Mostrar","hiddenoncoursepage":"Disponibles pero no visibles en la p\u00e1gina del curso","showoncoursepage":"Mostrar en la p\u00e1gina del curso","switchrolereturn":"Volver a mi rol normal","confirm":"Confirmar","areyousure":"\u00bfEst\u00e0 seguro?","file":"Archivo","url":"URL","collapseall":"Colapsar todo","expandall":"Expandir todo"},"repository":{"type":"Tipo","size":"Tama\u00f1o","invalidjson":"Cadena JSON no v\u00e1lida","nofilesattached":"No se han adjuntado archivos","filepicker":"Selector de archivos","logout":"Salir","nofilesavailable":"No hay archivos disponibles","norepositoriesavailable":"Lo sentimos, ninguno de sus repositorios actuales puede devolver archivos en el formato solicitado.","fileexistsdialogheader":"El archivo existe","fileexistsdialog_editor":"Un archivo con el mismo nombre ya se ha adjuntado al texto que est\u00e1 editando.","fileexistsdialog_filemanager":"Un archivo con ese nombre ya ha sido adjuntado","renameto":"Cambiar el nombre a \"{$a}\"","referencesexist":"Existen {$a} archivos de alias\/atajos que emplean este archivo como su or\u00edgen","select":"Seleccionar"},"admin":{"confirmdeletecomments":"Est\u00e1 a punto de eliminar comentarios, \u00bfest\u00e1 seguro?","confirmation":"Confirmaci\u00f3n"},"theme_snap":{"coursecontacts":"Contactos del curso","debugerrors":"Depurar errores","problemsfound":"Problemas encontrados","error:coverimageexceedsmaxbytes":"La imagen de tapa supera el tama\u00f1o de archivo m\u00e1ximo permitido den el nivel del sitio ({$a})","error:coverimageresolutionlow":"Para lograr la mejor calidad, se recomienda una imagen m\u00e1s grande de, al menos, 1024 p\u00edxeles de ancho.","forumtopic":"Tema","forumauthor":"Autor","forumpicturegroup":"Grupo","forumreplies":"Respuestas","forumlastpost":"\u00daltimo mensaje","hiddencoursestoggle":"Cursos ocultos","loading":"Cargando...","more":"M\u00e1s","moving":"Moviendo \"{$a}\"","movingcount":"Moviendo {$a} objetos","movehere":"Mover aqu\u00ed","movefailed":"Mover fallidos para \"{$a}\"","movingdropsectionhelp":"Coloque la secci\u00f3n \"{$a->moving}\" antes de la secci\u00f3n \"{$a->before}\"","movingstartedhelp":"Navegue hasta donde desea colocar la secci\u00f3n \"{$a}\"","notpublished":"No publicado a los estudiantes","visibility":"Visibilidad"},"booktool_print":{"printbook":"Imprimir el Libro Completo"},"completion":{"progresstotal":"Progreso: {$a->complete} \/ {$a->total}"},"debug":{"debuginfo":"Informaci\u00f3n de depuraci\u00f3n","line":"L\u00ednea","stacktrace":"Rastreo de pila"},"langconfig":{"labelsep":":"}};
//]]>
</script>
<script>
//<![CDATA[
(function() {Y.use("moodle-filter_glossary-autolinker",function() {M.filter_glossary.init_filter_autolinking({"courseid":0});
});
Y.use("moodle-filter_mathjaxloader-loader",function() {M.filter_mathjaxloader.configure({"mathjaxconfig":"\nMathJax.Hub.Config({\n    config: [\"Accessible.js\", \"Safe.js\"],\n    errorSettings: { message: [\"!\"] },\n    skipStartupTypeset: true,\n    messageStyle: \"none\"\n});\n","lang":"es"});
});
M.util.help_popups.setup(Y);
 M.util.js_pending('random61f185dc3a8cd4'); Y.on('domready', function() { M.util.js_complete("init");  M.util.js_complete('random61f185dc3a8cd4'); });
})();
//]]>
</script>
<!-- bye! -->
<script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"bam-cell.nr-data.net","licenseKey":"06560f3a30","applicationID":"136601874","transactionName":"YFxbZkVQW0ZRARBaDlkWbEBeHllaVwsKHAhZXVxKGUFdRQ==","queueTime":0,"applicationTime":110,"atts":"TBtMEA1KSBkSA0YJGkpE","errorBeacon":"bam-cell.nr-data.net","agent":""}</script></body>
</html>
