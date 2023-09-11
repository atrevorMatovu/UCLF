import{Fragment as n,options as e,Component as t}from"preact";import"preact/devtools";var o={};function r(){o={}}function a(e){return e.type===n?"Fragment":"function"==typeof e.type?e.type.displayName||e.type.name:"string"==typeof e.type?e.type:"#text"}var i=[],c=[];function s(){return i.length>0?i[i.length-1]:null}var u=!1;function l(e){return"function"==typeof e.type&&e.type!=n}function f(n){for(var e=[n],t=n;null!=t.__o;)e.push(t.__o),t=t.__o;return e.reduce(function(n,e){n+="  in "+a(e);var t=e.__source;return t?n+=" (at "+t.fileName+":"+t.lineNumber+")":u||(u=!0,console.warn("Add @babel/plugin-transform-react-jsx-source to get a more detailed component stack. Note that you should not add it to production builds of your App for bundle size reasons.")),n+"\n"},"")}var p="function"==typeof WeakMap;function d(n){return n?"function"==typeof n.type?d(n.__):n:{}}var h=t.prototype.setState;t.prototype.setState=function(n,e){return null==this.__v&&null==this.state&&console.warn('Calling "this.setState" inside the constructor of a component is a no-op and might be a bug in your application. Instead, set "this.state = {}" directly.\n\n'+f(s())),h.call(this,n,e)};var y=t.prototype.forceUpdate;function v(n){var e=n.props,t=a(n),o="";for(var r in e)if(e.hasOwnProperty(r)&&"children"!==r){var i=e[r];"function"==typeof i&&(i="function "+(i.displayName||i.name)+"() {}"),i=Object(i)!==i||i.toString?i+"":Object.prototype.toString.call(i),o+=" "+r+"="+JSON.stringify(i)}var c=e.children;return"<"+t+o+(c&&c.length?">..</"+t+">":" />")}t.prototype.forceUpdate=function(n){return null==this.__v?console.warn('Calling "this.forceUpdate" inside the constructor of a component is a no-op and might be a bug in your application.\n\n'+f(s())):null==this.__P&&console.warn('Can\'t call "this.forceUpdate" on an unmounted component. This is a no-op, but it indicates a memory leak in your application. To fix, cancel all subscriptions and asynchronous tasks in the componentWillUnmount method.\n\n'+f(this.__v)),y.call(this,n)},function(){!function(){var n=e.__b,t=e.diffed,o=e.__,r=e.vnode,a=e.__r;e.diffed=function(n){l(n)&&c.pop(),i.pop(),t&&t(n)},e.__b=function(e){l(e)&&i.push(e),n&&n(e)},e.__=function(n,e){c=[],o&&o(n,e)},e.vnode=function(n){n.__o=c.length>0?c[c.length-1]:null,r&&r(n)},e.__r=function(n){l(n)&&c.push(n),a&&a(n)}}();var n=!1,t=e.__b,r=e.diffed,s=e.vnode,u=e.__e,h=e.__,y=e.__h,m=p?{useEffect:new WeakMap,useLayoutEffect:new WeakMap,lazyPropTypes:new WeakMap}:null,b=[];e.__e=function(n,e,t,o){if(e&&e.__c&&"function"==typeof n.then){var r=n;n=new Error("Missing Suspense. The throwing component was: "+a(e));for(var i=e;i;i=i.__)if(i.__c&&i.__c.__c){n=r;break}if(n instanceof Error)throw n}try{(o=o||{}).componentStack=f(e),u(n,e,t,o),"function"!=typeof n.then&&setTimeout(function(){throw n})}catch(n){throw n}},e.__=function(n,e){if(!e)throw new Error("Undefined parent passed to render(), this is the second argument.\nCheck if the element is available in the DOM/has the correct id.");var t;switch(e.nodeType){case 1:case 11:case 9:t=!0;break;default:t=!1}if(!t){var o=a(n);throw new Error("Expected a valid HTML node as a second argument to render.\tReceived "+e+" instead: render(<"+o+" />, "+e+");")}h&&h(n,e)},e.__b=function(e){var r=e.type,i=d(e.__);if(n=!0,void 0===r)throw new Error("Undefined component passed to createElement()\n\nYou likely forgot to export your component or might have mixed up default and named imports"+v(e)+"\n\n"+f(e));if(null!=r&&"object"==typeof r){if(void 0!==r.__k&&void 0!==r.__e)throw new Error("Invalid type passed to createElement(): "+r+"\n\nDid you accidentally pass a JSX literal as JSX twice?\n\n  let My"+a(e)+" = "+v(r)+";\n  let vnode = <My"+a(e)+" />;\n\nThis usually happens when you export a JSX literal and not the component.\n\n"+f(e));throw new Error("Invalid type passed to createElement(): "+(Array.isArray(r)?"array":r))}if("thead"!==r&&"tfoot"!==r&&"tbody"!==r||"table"===i.type?"tr"===r&&"thead"!==i.type&&"tfoot"!==i.type&&"tbody"!==i.type&&"table"!==i.type?console.error("Improper nesting of table. Your <tr> should have a <thead/tbody/tfoot/table> parent."+v(e)+"\n\n"+f(e)):"td"===r&&"tr"!==i.type?console.error("Improper nesting of table. Your <td> should have a <tr> parent."+v(e)+"\n\n"+f(e)):"th"===r&&"tr"!==i.type&&console.error("Improper nesting of table. Your <th> should have a <tr>."+v(e)+"\n\n"+f(e)):console.error("Improper nesting of table. Your <thead/tbody/tfoot> should have a <table> parent."+v(e)+"\n\n"+f(e)),void 0!==e.ref&&"function"!=typeof e.ref&&"object"!=typeof e.ref&&!("$$typeof"in e))throw new Error('Component\'s "ref" property should be a function, or an object created by createRef(), but got ['+typeof e.ref+"] instead\n"+v(e)+"\n\n"+f(e));if("string"==typeof e.type)for(var c in e.props)if("o"===c[0]&&"n"===c[1]&&"function"!=typeof e.props[c]&&null!=e.props[c])throw new Error("Component's \""+c+'" property should be a function, but got ['+typeof e.props[c]+"] instead\n"+v(e)+"\n\n"+f(e));if("function"==typeof e.type&&e.type.propTypes){if("Lazy"===e.type.displayName&&m&&!m.lazyPropTypes.has(e.type)){var s="PropTypes are not supported on lazy(). Use propTypes on the wrapped component itself. ";try{var u=e.type();m.lazyPropTypes.set(e.type,!0),console.warn(s+"Component wrapped in lazy() is "+a(u))}catch(n){console.warn(s+"We will log the wrapped component's name once it is loaded.")}}var l=e.props;e.type.__f&&delete(l=function(n,e){for(var t in e)n[t]=e[t];return n}({},l)).ref,function(n,e,t,r,a){Object.keys(n).forEach(function(t){var i;try{i=n[t](e,t,r,"prop",null,"SECRET_DO_NOT_PASS_THIS_OR_YOU_WILL_BE_FIRED")}catch(n){i=n}i&&!(i.message in o)&&(o[i.message]=!0,console.error("Failed prop type: "+i.message+(a&&"\n"+a()||"")))})}(e.type.propTypes,l,0,a(e),function(){return f(e)})}t&&t(e)},e.__h=function(e,t,o){if(!e||!n)throw new Error("Hook can only be invoked from render methods.");y&&y(e,t,o)};var w=function(n,e){return{get:function(){var t="get"+n+e;b&&b.indexOf(t)<0&&(b.push(t),console.warn("getting vnode."+n+" is deprecated, "+e))},set:function(){var t="set"+n+e;b&&b.indexOf(t)<0&&(b.push(t),console.warn("setting vnode."+n+" is not allowed, "+e))}}},g={nodeName:w("nodeName","use vnode.type"),attributes:w("attributes","use vnode.props"),children:w("children","use vnode.props.children")},E=Object.create({},g);e.vnode=function(n){var e=n.props;if(null!==n.type&&null!=e&&("__source"in e||"__self"in e)){var t=n.props={};for(var o in e){var r=e[o];"__source"===o?n.__source=r:"__self"===o?n.__self=r:t[o]=r}}n.__proto__=E,s&&s(n)},e.diffed=function(e){if(e.__k&&e.__k.forEach(function(n){if("object"==typeof n&&n&&void 0===n.type){var t=Object.keys(n).join(",");throw new Error("Objects are not valid as a child. Encountered an object with the keys {"+t+"}.\n\n"+f(e))}}),n=!1,r&&r(e),null!=e.__k)for(var t=[],o=0;o<e.__k.length;o++){var a=e.__k[o];if(a&&null!=a.key){var i=a.key;if(-1!==t.indexOf(i)){console.error('Following component has two or more children with the same key attribute: "'+i+'". This may cause glitches and misbehavior in rendering process. Component: \n\n'+v(e)+"\n\n"+f(e));break}t.push(i)}}}}();export{r as resetPropWarnings};
//# sourceMappingURL=debug.module.js.map