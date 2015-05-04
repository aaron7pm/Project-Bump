/*! js-cookie v1.5.1 | MIT */
!function(a){var b;if("function"==typeof define&&define.amd)define(["jquery"],a);else if("object"==typeof exports){try{b=require("jquery")}catch(c){}module.exports=a(b)}else{var d=window.Cookies,e=window.Cookies=a(window.jQuery);e.noConflict=function(){return window.Cookies=d,e}}}(function(a){function b(a){return j.raw?a:encodeURIComponent(a)}function c(a){return j.raw?a:decodeURIComponent(a)}function d(a){return b(j.json?JSON.stringify(a):String(a))}function e(a){0===a.indexOf('"')&&(a=a.slice(1,-1).replace(/\\"/g,'"').replace(/\\\\/g,"\\"));try{return a=decodeURIComponent(a.replace(i," ")),j.json?JSON.parse(a):a}catch(b){}}function f(a,b){var c=j.raw?a:e(a);return h(b)?b(c):c}function g(){for(var a,b,c=0,d={};c<arguments.length;c++){b=arguments[c];for(a in b)d[a]=b[a]}return d}function h(a){return"[object Function]"===Object.prototype.toString.call(a)}var i=/\+/g,j=function(a,e,i){if(arguments.length>1&&!h(e)){if(i=g(j.defaults,i),"number"==typeof i.expires){var k=i.expires,l=i.expires=new Date;l.setMilliseconds(l.getMilliseconds()+864e5*k)}return document.cookie=[b(a),"=",d(e),i.expires?"; expires="+i.expires.toUTCString():"",i.path?"; path="+i.path:"",i.domain?"; domain="+i.domain:"",i.secure?"; secure":""].join("")}for(var m=a?void 0:{},n=document.cookie?document.cookie.split("; "):[],o=0,p=n.length;p>o;o++){var q=n[o].split("="),r=c(q.shift()),s=q.join("=");if(a===r){m=f(s,e);break}a||void 0===(s=f(s))||(m[r]=s)}return m};return j.get=j.set=j,j.defaults={},j.remove=function(a,b){return j(a,"",g(b,{expires:-1})),!j(a)},a&&(a.cookie=j,a.removeCookie=j.remove),j});

if (Cookies.get('UserID')) {
	$("#user").removeClass("hidden");
	$("#add").removeClass("hidden");
	$("#username").text(Cookies.get("Username"));
	$("#profile").attr("href", "user.php?id=" + Cookies.get("UserID"));
} else {
	$("#registerbtn").removeClass("hidden");
	$("#loginbtn").removeClass("hidden");
}

function logout() {
	Cookies.remove("UserID");
	Cookies.remove("Username");
	window.location = './index.php';
}

function vote(id) {
	if (!$("#vote" + id).hasClass("voted")) {
		$("#vote" + id).addClass("voted");
		$("#vote" + id).children(".votecount").text(parseInt($("#vote" + id).children(".votecount").text()) + 1);
	    var data = "ProjectID=" + id + "&UserID=" + Cookies.get("UserID");
	    $.ajax({type:'POST', url: 'submit/vote.php', data:data, success: function(response) {
	        $('body').append(response);
	    }});
	} else {
		$("#vote" + id).removeClass("voted");
		$("#vote" + id).children(".votecount").text(parseInt($("#vote" + id).children(".votecount").text()) - 1);
	    var data = "ProjectID=" + id + "&UserID=" + Cookies.get("UserID");
	    $.ajax({type:'POST', url: 'submit/unvote.php', data:data, success: function(response) {
	        $('body').append(response);
	    }});
	}
}