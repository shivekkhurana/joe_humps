"use strict";var cookie={get:function(a){var b=document.cookie.split(";"),c;while(b.length){c=b.pop().split("=");if(decodeURIComponent(c[0]).replace(/^\s+|\s+$/g,"")===a){return decodeURIComponent(c[1])}}return null},remove:function(a,b){return b?this.set(a,0,-1,b):this.set(a,0,-1)},set:function(a,c,f,e,b,d){document.cookie=[encodeURIComponent(a),"=",encodeURIComponent(c),f?"; expires="+new Date((new Date()).getTime()+f).toGMTString():"",e?"; path="+e:"",b?"; domain="+b:"",d?"; secure":""].join("");return document.cookie}};