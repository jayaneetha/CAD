(function(n){n.fn.extend({slimScroll:function(i){var r=n.extend({width:"auto",height:"250px",size:"7px",color:"#000",position:"right",distance:"1px",start:"top",opacity:.4,alwaysVisible:!1,disableFadeOut:!1,railVisible:!1,railColor:"#333",railOpacity:.2,railDraggable:!0,railClass:"slimScrollRail",barClass:"slimScrollBar",wrapperClass:"slimScrollDiv",allowPageScroll:!1,wheelStep:20,touchScrollStep:200,borderRadius:"7px",railBorderRadius:"7px"},i);return this.each(function(){function p(t){if(v){t=t||window.event;var i=0;t.wheelDelta&&(i=-t.wheelDelta/120);t.detail&&(i=t.detail/3);n(t.target||t.srcTarget||t.srcElement).closest("."+r.wrapperClass).is(u.parent())&&s(i,!0);t.preventDefault&&!o&&t.preventDefault();o||(t.returnValue=!1)}}function s(n,t,i){o=!1;var s=n,h=u.outerHeight()-f.outerHeight();t&&(s=parseInt(f.css("top"))+n*parseInt(r.wheelStep)/100*f.outerHeight(),s=Math.min(Math.max(s,0),h),s=0<n?Math.ceil(s):Math.floor(s),f.css({top:s+"px"}));e=parseInt(f.css("top"))/(u.outerHeight()-f.outerHeight());s=e*(u[0].scrollHeight-u.outerHeight());i&&(s=n,n=s/u[0].scrollHeight*u.outerHeight(),n=Math.min(Math.max(n,0),h),f.css({top:n+"px"}));u.scrollTop(s);u.trigger("slimscrolling",~~s);b();c()}function w(){y=Math.max(u.outerHeight()/u[0].scrollHeight*u.outerHeight(),30);f.css({height:y+"px"});var n=y==u.outerHeight()?"none":"block";f.css({display:n})}function b(){w();clearTimeout(nt);e==~~e?(o=r.allowPageScroll,tt!=e&&u.trigger("slimscroll",0==~~e?"top":"bottom")):o=!1;tt=e;y>=u.outerHeight()?o=!0:(f.stop(!0,!0).fadeIn("fast"),r.railVisible&&h.stop(!0,!0).fadeIn("fast"))}function c(){r.alwaysVisible||(nt=setTimeout(function(){r.disableFadeOut&&v||k||d||(f.fadeOut("slow"),h.fadeOut("slow"))},1e3))}var v,k,d,nt,g,y,e,tt,o=!1,u=n(this),a;if(u.parent().hasClass(r.wrapperClass)){var l=u.scrollTop(),f=u.closest("."+r.barClass),h=u.closest("."+r.railClass);if(w(),n.isPlainObject(i)){if("height"in i&&"auto"==i.height&&(u.parent().css("height","auto"),u.css("height","auto"),a=u.parent().parent().height(),u.parent().css("height",a),u.css("height",a)),"scrollTo"in i)l=parseInt(r.scrollTo);else if("scrollBy"in i)l+=parseInt(r.scrollBy);else if("destroy"in i){f.remove();h.remove();u.unwrap();return}s(l,!1,!0)}}else if(!(n.isPlainObject(i)&&"destroy"in i)){r.height="auto"==r.height?u.parent().height():r.height;l=n("<div><\/div>").addClass(r.wrapperClass).css({position:"relative",overflow:"hidden",width:r.width,height:r.height});u.css({overflow:"hidden",width:r.width,height:r.height});var h=n("<div><\/div>").addClass(r.railClass).css({width:r.size,height:"100%",position:"absolute",top:0,display:r.alwaysVisible&&r.railVisible?"block":"none","border-radius":r.railBorderRadius,background:r.railColor,opacity:r.railOpacity,zIndex:90}),f=n("<div><\/div>").addClass(r.barClass).css({background:r.color,width:r.size,position:"absolute",top:0,opacity:r.opacity,display:r.alwaysVisible?"block":"none","border-radius":r.borderRadius,BorderRadius:r.borderRadius,MozBorderRadius:r.borderRadius,WebkitBorderRadius:r.borderRadius,zIndex:99}),a="right"==r.position?{right:r.distance}:{left:r.distance};h.css(a);f.css(a);u.wrap(l);u.parent().append(f);u.parent().append(h);r.railDraggable&&f.bind("mousedown",function(i){var r=n(document);return d=!0,t=parseFloat(f.css("top")),pageY=i.pageY,r.bind("mousemove.slimscroll",function(n){currTop=t+n.pageY-pageY;f.css("top",currTop);s(0,f.position().top,!1)}),r.bind("mouseup.slimscroll",function(){d=!1;c();r.unbind(".slimscroll")}),!1}).bind("selectstart.slimscroll",function(n){return n.stopPropagation(),n.preventDefault(),!1});h.hover(function(){b()},function(){c()});f.hover(function(){k=!0},function(){k=!1});u.hover(function(){v=!0;b();c()},function(){v=!1;c()});u.bind("touchstart",function(n){n.originalEvent.touches.length&&(g=n.originalEvent.touches[0].pageY)});u.bind("touchmove",function(n){o||n.originalEvent.preventDefault();n.originalEvent.touches.length&&(s((g-n.originalEvent.touches[0].pageY)/r.touchScrollStep,!0),g=n.originalEvent.touches[0].pageY)});w();"bottom"===r.start?(f.css({top:u.outerHeight()-f.outerHeight()}),s(0,!0)):"top"!==r.start&&(s(n(r.start).position().top,null,!0),r.alwaysVisible||f.hide());window.addEventListener?(this.addEventListener("DOMMouseScroll",p,!1),this.addEventListener("mousewheel",p,!1)):document.attachEvent("onmousewheel",p)}}),this}});n.fn.extend({slimscroll:n.fn.slimScroll})})(jQuery)