/**
 * @version     1.0.1 (July 19th, 2013)
 * @package     Akhtarma
 * @author      Nuevvo - http://nuevvo.com
 * @copyright   Copyright (c) 2010 - 2013 Nuevvo Webware Ltd. All rights reserved.
 * @license     http://nuevvo.com/license
 */

// jQuery Swipebox
;(function(e,t,n,r){n.swipebox=function(i,s){var o={useCSS:true,hideBarsDelay:3e3},u=this,a=n(i),i=i,f=i.selector,l=n(f),c=t.createTouch!==r||"ontouchstart"in e||"onmsgesturechange"in e||navigator.msMaxTouchPoints,h=!!e.SVGSVGElement,p='<div id="swipebox-overlay"><div id="swipebox-slider"></div><div id="swipebox-caption"></div><div id="swipebox-action"><a id="swipebox-close"></a><a id="swipebox-prev"></a><a id="swipebox-next"></a></div>			</div>';u.settings={};u.init=function(){u.settings=n.extend({},o,s);l.click(function(e){e.preventDefault();e.stopPropagation();index=a.index(n(this));d.target=n(e.target);d.init(index)})};var d={init:function(e){this.target.trigger("swipebox-start");this.build();this.openSlide(e);this.openImg(e);this.preloadImg(e+1);this.preloadImg(e-1)},build:function(){var t=this;n("body").append(p);if(t.doCssTrans()){n("#swipebox-slider").css({"-webkit-transition":"left 0.4s ease","-moz-transition":"left 0.4s ease","-o-transition":"left 0.4s ease","-khtml-transition":"left 0.4s ease",transition:"left 0.4s ease"});n("#swipebox-overlay").css({"-webkit-transition":"opacity 1s ease","-moz-transition":"opacity 1s ease","-o-transition":"opacity 1s ease","-khtml-transition":"opacity 1s ease",transition:"opacity 1s ease"});n("#swipebox-action, #swipebox-caption").css({"-webkit-transition":"0.5s","-moz-transition":"0.5s","-o-transition":"0.5s","-khtml-transition":"0.5s",transition:"0.5s"})}if(h){var r=n("#swipebox-action #swipebox-close").css("background-image");r=r.replace("png","svg");n("#swipebox-action #swipebox-prev,#swipebox-action #swipebox-next,#swipebox-action #swipebox-close").css({"background-image":r})}a.each(function(){n("#swipebox-slider").append('<div class="slide"></div>')});t.setDim();t.actions();t.keyboard();t.gesture();t.animBars();n(e).resize(function(){t.setDim()}).resize()},setDim:function(){var t={width:n(e).width(),height:e.innerHeight?e.innerHeight:n(e).height()};n("#swipebox-overlay").css(t)},supportTransition:function(){var e="transition WebkitTransition MozTransition OTransition msTransition KhtmlTransition".split(" ");for(var n=0;n<e.length;n++){if(t.createElement("div").style[e[n]]!==r){return e[n]}}return false},doCssTrans:function(){if(u.settings.useCSS&&this.supportTransition()){return true}},gesture:function(){if(c){var e=this,t=null,r=10,i={},s={};var o=n("#swipebox-caption, #swipebox-action");o.addClass("visible-bars");e.setTimeout();n("body").bind("touchstart",function(e){n(this).addClass("touching");s=e.originalEvent.targetTouches[0];i.pageX=e.originalEvent.targetTouches[0].pageX;n(".touching").bind("touchmove",function(e){e.preventDefault();e.stopPropagation();s=e.originalEvent.targetTouches[0]});return false}).bind("touchend",function(u){u.preventDefault();u.stopPropagation();t=s.pageX-i.pageX;if(t>=r){e.getPrev()}else if(t<=-r){e.getNext()}else{if(!o.hasClass("visible-bars")){e.showBars();e.setTimeout()}else{e.clearTimeout();e.hideBars()}}n(".touching").off("touchmove").removeClass("touching")})}},setTimeout:function(){if(u.settings.hideBarsDelay>0){var t=this;t.clearTimeout();t.timeout=e.setTimeout(function(){t.hideBars()},u.settings.hideBarsDelay)}},clearTimeout:function(){e.clearTimeout(this.timeout);this.timeout=null},showBars:function(){var e=n("#swipebox-caption, #swipebox-action");if(this.doCssTrans()){e.addClass("visible-bars")}else{n("#swipebox-caption").animate({top:0},500);n("#swipebox-action").animate({bottom:0},500);setTimeout(function(){e.addClass("visible-bars")},1e3)}},hideBars:function(){var e=n("#swipebox-caption, #swipebox-action");if(this.doCssTrans()){e.removeClass("visible-bars")}else{n("#swipebox-caption").animate({top:"-50px"},500);n("#swipebox-action").animate({bottom:"-50px"},500);setTimeout(function(){e.removeClass("visible-bars")},1e3)}},animBars:function(){var e=this;var t=n("#swipebox-caption, #swipebox-action");t.addClass("visible-bars");e.setTimeout();n("#swipebox-slider").click(function(n){if(!t.hasClass("visible-bars")){e.showBars();e.setTimeout()}});n("#swipebox-action").hover(function(){e.showBars();t.addClass("force-visible-bars");e.clearTimeout()},function(){t.removeClass("force-visible-bars");e.setTimeout()})},keyboard:function(){var t=this;n(e).bind("keyup",function(e){e.preventDefault();e.stopPropagation();if(e.keyCode==37){t.getPrev()}else if(e.keyCode==39){t.getNext()}else if(e.keyCode==27){t.closeSlide()}})},actions:function(){var e=this;if(a.length<2){n("#swipebox-prev, #swipebox-next").hide()}else{n("#swipebox-prev").bind("click touchend",function(t){t.preventDefault();t.stopPropagation();e.getPrev();e.setTimeout()});n("#swipebox-next").bind("click touchend",function(t){t.preventDefault();t.stopPropagation();e.getNext();e.setTimeout()})}n("#swipebox-close").bind("click touchend",function(t){e.closeSlide()})},setSlide:function(e,t){t=t||false;var r=n("#swipebox-slider");if(this.doCssTrans()){r.css({left:-e*100+"%"})}else{r.animate({left:-e*100+"%"})}n("#swipebox-slider .slide").removeClass("current");n("#swipebox-slider .slide").eq(e).addClass("current");this.setTitle(e);if(t){r.fadeIn()}n("#swipebox-prev, #swipebox-next").removeClass("disabled");if(e==0){n("#swipebox-prev").addClass("disabled")}else if(e==a.length-1){n("#swipebox-next").addClass("disabled")}},openSlide:function(t){n("html").addClass("swipebox");n(e).trigger("resize");this.setSlide(t,true)},preloadImg:function(e){var t=this;setTimeout(function(){t.openImg(e)},1e3)},openImg:function(e){var t=this;if(e<0||e>=a.length){return false}t.loadImg(a.eq(e).attr("href"),function(){n("#swipebox-slider .slide").eq(e).html(this)})},setTitle:function(e,t){n("#swipebox-caption").empty();if(a.eq(e).attr("title")){n("#swipebox-caption").append(a.eq(e).attr("title"))}},loadImg:function(e,t){var r=n("<img>").on("load",function(){t.call(r)});r.attr("src",e)},getNext:function(){var e=this;index=n("#swipebox-slider .slide").index(n("#swipebox-slider .slide.current"));if(index+1<a.length){index++;e.setSlide(index);e.preloadImg(index+1)}else{n("#swipebox-slider").addClass("rightSpring");setTimeout(function(){n("#swipebox-slider").removeClass("rightSpring")},500)}},getPrev:function(){var e=this;index=n("#swipebox-slider .slide").index(n("#swipebox-slider .slide.current"));if(index>0){index--;e.setSlide(index);e.preloadImg(index-1)}else{n("#swipebox-slider").addClass("leftSpring");setTimeout(function(){n("#swipebox-slider").removeClass("leftSpring")},500)}},closeSlide:function(){var t=this;n(e).trigger("resize");n("html").removeClass("swipebox");t.destroy()},destroy:function(){var t=this;n(e).unbind("keyup");n("body").unbind("touchstart");n("body").unbind("touchmove");n("body").unbind("touchend");n("#swipebox-slider").unbind();n("#swipebox-overlay").remove();a.removeData("_swipebox");t.target.trigger("swipebox-destroy")}};u.init()};n.fn.swipebox=function(e){if(!n.data(this,"_swipebox")){var t=new n.swipebox(this,e);this.data("_swipebox",t)}}})(window,document,jQuery);

// jQuery MiniColors - http://labs.abeautifulsite.net/jquery-miniColors/
if(jQuery)(function($){$.minicolors={defaultSettings:{animationSpeed:100,animationEasing:'swing',change:null,changeDelay:0,control:'hue',defaultValue:'',hide:null,hideSpeed:100,inline:false,letterCase:'lowercase',opacity:false,position:'default',show:null,showSpeed:100,swatchPosition:'left',textfield:true,theme:'default'}};$.extend($.fn,{minicolors:function(method,data){switch(method){case'destroy':$(this).each(function(){destroy($(this));});return $(this);case'hide':hide();return $(this);case'opacity':if(data===undefined){return $(this).attr('data-opacity');}else{$(this).each(function(){refresh($(this).attr('data-opacity',data));});return $(this);}
case'rgbObject':return rgbObject($(this),method==='rgbaObject');case'rgbString':case'rgbaString':return rgbString($(this),method==='rgbaString')
case'settings':if(data===undefined){return $(this).data('minicolors-settings');}else{$(this).each(function(){var settings=$(this).data('minicolors-settings')||{};destroy($(this));$(this).minicolors($.extend(true,settings,data));});return $(this);}
case'show':show($(this).eq(0));return $(this);case'value':if(data===undefined){return $(this).val();}else{$(this).each(function(){refresh($(this).val(data));});return $(this);}
case'create':default:if(method!=='create')data=method;$(this).each(function(){init($(this),data);});return $(this);}}});function init(input,settings){var minicolors=$('<span class="minicolors" />'),defaultSettings=$.minicolors.defaultSettings;if(input.data('minicolors-initialized'))return;settings=$.extend(true,{},defaultSettings,settings);minicolors.addClass('minicolors-theme-'+settings.theme).addClass('minicolors-swatch-position-'+settings.swatchPosition).toggleClass('minicolors-swatch-left',settings.swatchPosition==='left').toggleClass('minicolors-with-opacity',settings.opacity);if(settings.position!==undefined){$.each(settings.position.split(' '),function(){minicolors.addClass('minicolors-position-'+this);});}
input.addClass('minicolors-input').data('minicolors-initialized',true).data('minicolors-settings',settings).prop('size',7).prop('maxlength',7).wrap(minicolors).after('<span class="minicolors-panel minicolors-slider-'+settings.control+'">'+'<span class="minicolors-slider">'+'<span class="minicolors-picker"></span>'+'</span>'+'<span class="minicolors-opacity-slider">'+'<span class="minicolors-picker"></span>'+'</span>'+'<span class="minicolors-grid">'+'<span class="minicolors-grid-inner"></span>'+'<span class="minicolors-picker"><span></span></span>'+'</span>'+'</span>');input.parent().find('.minicolors-panel').on('selectstart',function(){return false;}).end();if(settings.swatchPosition==='left'){input.before('<span class="minicolors-swatch"><span></span></span>');}else{input.after('<span class="minicolors-swatch"><span></span></span>');}
if(!settings.textfield)input.addClass('minicolors-hidden');if(settings.inline)input.parent().addClass('minicolors-inline');updateFromInput(input,false,true);}
function destroy(input){var minicolors=input.parent();input.removeData('minicolors-initialized').removeData('minicolors-settings').removeProp('size').removeProp('maxlength').removeClass('minicolors-input');minicolors.before(input).remove();}
function refresh(input){updateFromInput(input);}
function show(input){var minicolors=input.parent(),panel=minicolors.find('.minicolors-panel'),settings=input.data('minicolors-settings');if(!input.data('minicolors-initialized')||input.prop('disabled')||minicolors.hasClass('minicolors-inline')||minicolors.hasClass('minicolors-focus'))return;hide();minicolors.addClass('minicolors-focus');panel.stop(true,true).fadeIn(settings.showSpeed,function(){if(settings.show)settings.show.call(input.get(0));});}
function hide(){$('.minicolors-input').each(function(){var input=$(this),settings=input.data('minicolors-settings'),minicolors=input.parent();if(settings.inline)return;minicolors.find('.minicolors-panel').fadeOut(settings.hideSpeed,function(){if(minicolors.hasClass('minicolors-focus')){if(settings.hide)settings.hide.call(input.get(0));}
minicolors.removeClass('minicolors-focus');});});}
function move(target,event,animate){var input=target.parents('.minicolors').find('.minicolors-input'),settings=input.data('minicolors-settings'),picker=target.find('[class$=-picker]'),offsetX=target.offset().left,offsetY=target.offset().top,x=Math.round(event.pageX-offsetX),y=Math.round(event.pageY-offsetY),duration=animate?settings.animationSpeed:0,wx,wy,r,phi;if(event.originalEvent.changedTouches){x=event.originalEvent.changedTouches[0].pageX-offsetX;y=event.originalEvent.changedTouches[0].pageY-offsetY;}
if(x<0)x=0;if(y<0)y=0;if(x>target.width())x=target.width();if(y>target.height())y=target.height();if(target.parent().is('.minicolors-slider-wheel')&&picker.parent().is('.minicolors-grid')){wx=75-x;wy=75-y;r=Math.sqrt(wx*wx+wy*wy);phi=Math.atan2(wy,wx);if(phi<0)phi+=Math.PI*2;if(r>75){r=75;x=75-(75*Math.cos(phi));y=75-(75*Math.sin(phi));}
x=Math.round(x);y=Math.round(y);}
if(target.is('.minicolors-grid')){picker.stop(true).animate({top:y+'px',left:x+'px'},duration,settings.animationEasing,function(){updateFromControl(input,target);});}else{picker.stop(true).animate({top:y+'px'},duration,settings.animationEasing,function(){updateFromControl(input,target);});}}
function updateFromControl(input,target){function getCoords(picker,container){var left,top;if(!picker.length||!container)return null;left=picker.offset().left;top=picker.offset().top;return{x:left-container.offset().left+(picker.outerWidth()/2),y:top-container.offset().top+(picker.outerHeight()/2)};}
var hue,saturation,brightness,rgb,x,y,r,phi,hex=input.val(),opacity=input.attr('data-opacity'),minicolors=input.parent(),settings=input.data('minicolors-settings'),panel=minicolors.find('.minicolors-panel'),swatch=minicolors.find('.minicolors-swatch'),grid=minicolors.find('.minicolors-grid'),slider=minicolors.find('.minicolors-slider'),opacitySlider=minicolors.find('.minicolors-opacity-slider'),gridPicker=grid.find('[class$=-picker]'),sliderPicker=slider.find('[class$=-picker]'),opacityPicker=opacitySlider.find('[class$=-picker]'),gridPos=getCoords(gridPicker,grid),sliderPos=getCoords(sliderPicker,slider),opacityPos=getCoords(opacityPicker,opacitySlider);if(target.is('.minicolors-grid, .minicolors-slider')){switch(settings.control){case'wheel':x=(grid.width()/2)-gridPos.x;y=(grid.height()/2)-gridPos.y;r=Math.sqrt(x*x+y*y);phi=Math.atan2(y,x);if(phi<0)phi+=Math.PI*2;if(r>75){r=75;gridPos.x=69-(75*Math.cos(phi));gridPos.y=69-(75*Math.sin(phi));}
saturation=keepWithin(r/0.75,0,100);hue=keepWithin(phi*180/Math.PI,0,360);brightness=keepWithin(100-Math.floor(sliderPos.y*(100/slider.height())),0,100);hex=hsb2hex({h:hue,s:saturation,b:brightness});slider.css('backgroundColor',hsb2hex({h:hue,s:saturation,b:100}));break;case'saturation':hue=keepWithin(parseInt(gridPos.x*(360/grid.width())),0,360);saturation=keepWithin(100-Math.floor(sliderPos.y*(100/slider.height())),0,100);brightness=keepWithin(100-Math.floor(gridPos.y*(100/grid.height())),0,100);hex=hsb2hex({h:hue,s:saturation,b:brightness});slider.css('backgroundColor',hsb2hex({h:hue,s:100,b:brightness}));minicolors.find('.minicolors-grid-inner').css('opacity',saturation/100);break;case'brightness':hue=keepWithin(parseInt(gridPos.x*(360/grid.width())),0,360);saturation=keepWithin(100-Math.floor(gridPos.y*(100/grid.height())),0,100);brightness=keepWithin(100-Math.floor(sliderPos.y*(100/slider.height())),0,100);hex=hsb2hex({h:hue,s:saturation,b:brightness});slider.css('backgroundColor',hsb2hex({h:hue,s:saturation,b:100}));minicolors.find('.minicolors-grid-inner').css('opacity',1-(brightness/100));break;default:hue=keepWithin(360-parseInt(sliderPos.y*(360/slider.height())),0,360);saturation=keepWithin(Math.floor(gridPos.x*(100/grid.width())),0,100);brightness=keepWithin(100-Math.floor(gridPos.y*(100/grid.height())),0,100);hex=hsb2hex({h:hue,s:saturation,b:brightness});grid.css('backgroundColor',hsb2hex({h:hue,s:100,b:100}));break;}
input.val(convertCase(hex,settings.letterCase));}
if(target.is('.minicolors-opacity-slider')){if(settings.opacity){opacity=parseFloat(1-(opacityPos.y/opacitySlider.height())).toFixed(2);}else{opacity=1;}
if(settings.opacity)input.attr('data-opacity',opacity);}
swatch.find('SPAN').css({backgroundColor:hex,opacity:opacity});doChange(input,hex,opacity);}
function updateFromInput(input,preserveInputValue,firstRun){var hex,hsb,opacity,x,y,r,phi,minicolors=input.parent(),settings=input.data('minicolors-settings'),swatch=minicolors.find('.minicolors-swatch'),grid=minicolors.find('.minicolors-grid'),slider=minicolors.find('.minicolors-slider'),opacitySlider=minicolors.find('.minicolors-opacity-slider'),gridPicker=grid.find('[class$=-picker]'),sliderPicker=slider.find('[class$=-picker]'),opacityPicker=opacitySlider.find('[class$=-picker]');hex=convertCase(parseHex(input.val(),true),settings.letterCase);if(!hex)hex=convertCase(parseHex(settings.defaultValue,true));hsb=hex2hsb(hex);if(!preserveInputValue)input.val(hex);if(settings.opacity){opacity=input.attr('data-opacity')===''?1:keepWithin(parseFloat(input.attr('data-opacity')).toFixed(2),0,1);if(isNaN(opacity))opacity=1;input.attr('data-opacity',opacity);swatch.find('SPAN').css('opacity',opacity);y=keepWithin(opacitySlider.height()-(opacitySlider.height()*opacity),0,opacitySlider.height());opacityPicker.css('top',y+'px');}
swatch.find('SPAN').css('backgroundColor',hex);switch(settings.control){case'wheel':r=keepWithin(Math.ceil(hsb.s*0.75),0,grid.height()/2);phi=hsb.h*Math.PI/180;x=keepWithin(75-Math.cos(phi)*r,0,grid.width());y=keepWithin(75-Math.sin(phi)*r,0,grid.height());gridPicker.css({top:y+'px',left:x+'px'});y=150-(hsb.b/(100/grid.height()));if(hex==='')y=0;sliderPicker.css('top',y+'px');slider.css('backgroundColor',hsb2hex({h:hsb.h,s:hsb.s,b:100}));break;case'saturation':x=keepWithin((5*hsb.h)/12,0,150);y=keepWithin(grid.height()-Math.ceil(hsb.b/(100/grid.height())),0,grid.height());gridPicker.css({top:y+'px',left:x+'px'});y=keepWithin(slider.height()-(hsb.s*(slider.height()/100)),0,slider.height());sliderPicker.css('top',y+'px');slider.css('backgroundColor',hsb2hex({h:hsb.h,s:100,b:hsb.b}));minicolors.find('.minicolors-grid-inner').css('opacity',hsb.s/100);break;case'brightness':x=keepWithin((5*hsb.h)/12,0,150);y=keepWithin(grid.height()-Math.ceil(hsb.s/(100/grid.height())),0,grid.height());gridPicker.css({top:y+'px',left:x+'px'});y=keepWithin(slider.height()-(hsb.b*(slider.height()/100)),0,slider.height());sliderPicker.css('top',y+'px');slider.css('backgroundColor',hsb2hex({h:hsb.h,s:hsb.s,b:100}));minicolors.find('.minicolors-grid-inner').css('opacity',1-(hsb.b/100));break;default:x=keepWithin(Math.ceil(hsb.s/(100/grid.width())),0,grid.width());y=keepWithin(grid.height()-Math.ceil(hsb.b/(100/grid.height())),0,grid.height());gridPicker.css({top:y+'px',left:x+'px'});y=keepWithin(slider.height()-(hsb.h/(360/slider.height())),0,slider.height());sliderPicker.css('top',y+'px');grid.css('backgroundColor',hsb2hex({h:hsb.h,s:100,b:100}));break;}
if(!firstRun)doChange(input,hex,opacity);}
function doChange(input,hex,opacity){var settings=input.data('minicolors-settings');if(hex+opacity!==input.data('minicolors-lastChange')){input.data('minicolors-lastChange',hex+opacity);if(settings.change){if(settings.changeDelay){clearTimeout(input.data('minicolors-changeTimeout'));input.data('minicolors-changeTimeout',setTimeout(function(){settings.change.call(input.get(0),hex,opacity);},settings.changeDelay));}else{settings.change.call(input.get(0),hex,opacity);}}}}
function rgbObject(input){var hex=parseHex($(input).val(),true),rgb=hex2rgb(hex),opacity=$(input).attr('data-opacity');if(!rgb)return null;if(opacity!==undefined)$.extend(rgb,{a:parseFloat(opacity)});return rgb;}
function rgbString(input,alpha){var hex=parseHex($(input).val(),true),rgb=hex2rgb(hex),opacity=$(input).attr('data-opacity');if(!rgb)return null;if(opacity===undefined)opacity=1;if(alpha){return'rgba('+rgb.r+', '+rgb.g+', '+rgb.b+', '+parseFloat(opacity)+')';}else{return'rgb('+rgb.r+', '+rgb.g+', '+rgb.b+')';}}
function convertCase(string,letterCase){return letterCase==='uppercase'?string.toUpperCase():string.toLowerCase();}
function parseHex(string,expand){string=string.replace(/[^A-F0-9]/ig,'');if(string.length!==3&&string.length!==6)return'';if(string.length===3&&expand){string=string[0]+string[0]+string[1]+string[1]+string[2]+string[2];}
return'#'+string;}
function keepWithin(value,min,max){if(value<min)value=min;if(value>max)value=max;return value;}
function hsb2rgb(hsb){var rgb={};var h=Math.round(hsb.h);var s=Math.round(hsb.s*255/100);var v=Math.round(hsb.b*255/100);if(s===0){rgb.r=rgb.g=rgb.b=v;}else{var t1=v;var t2=(255-s)*v/255;var t3=(t1-t2)*(h%60)/60;if(h===360)h=0;if(h<60){rgb.r=t1;rgb.b=t2;rgb.g=t2+t3;}else if(h<120){rgb.g=t1;rgb.b=t2;rgb.r=t1-t3;}else if(h<180){rgb.g=t1;rgb.r=t2;rgb.b=t2+t3;}else if(h<240){rgb.b=t1;rgb.r=t2;rgb.g=t1-t3;}else if(h<300){rgb.b=t1;rgb.g=t2;rgb.r=t2+t3;}else if(h<360){rgb.r=t1;rgb.g=t2;rgb.b=t1-t3;}else{rgb.r=0;rgb.g=0;rgb.b=0;}}
return{r:Math.round(rgb.r),g:Math.round(rgb.g),b:Math.round(rgb.b)};}
function rgb2hex(rgb){var hex=[rgb.r.toString(16),rgb.g.toString(16),rgb.b.toString(16)];$.each(hex,function(nr,val){if(val.length===1)hex[nr]='0'+val;});return'#'+hex.join('');}
function hsb2hex(hsb){return rgb2hex(hsb2rgb(hsb));}
function hex2hsb(hex){var hsb=rgb2hsb(hex2rgb(hex));if(hsb.s===0)hsb.h=360;return hsb;}
function rgb2hsb(rgb){var hsb={h:0,s:0,b:0};var min=Math.min(rgb.r,rgb.g,rgb.b);var max=Math.max(rgb.r,rgb.g,rgb.b);var delta=max-min;hsb.b=max;hsb.s=max!==0?255*delta/max:0;if(hsb.s!==0){if(rgb.r===max){hsb.h=(rgb.g-rgb.b)/delta;}else if(rgb.g===max){hsb.h=2+(rgb.b-rgb.r)/delta;}else{hsb.h=4+(rgb.r-rgb.g)/delta;}}else{hsb.h=-1;}
hsb.h*=60;if(hsb.h<0){hsb.h+=360;}
hsb.s*=100/255;hsb.b*=100/255;return hsb;}
function hex2rgb(hex){hex=parseInt(((hex.indexOf('#')>-1)?hex.substring(1):hex),16);return{r:hex>>16,g:(hex&0x00FF00)>>8,b:(hex&0x0000FF)};}
$(document).on('mousedown.minicolors touchstart.minicolors',function(event){if(!$(event.target).parents().add(event.target).hasClass('minicolors')){hide();}}).on('mousedown.minicolors touchstart.minicolors','.minicolors-grid, .minicolors-slider, .minicolors-opacity-slider',function(event){var target=$(this);event.preventDefault();$(document).data('minicolors-target',target);move(target,event,true);}).on('mousemove.minicolors touchmove.minicolors',function(event){var target=$(document).data('minicolors-target');if(target)move(target,event);}).on('mouseup.minicolors touchend.minicolors',function(){$(this).removeData('minicolors-target');}).on('mousedown.minicolors touchstart.minicolors','.minicolors-swatch',function(event){var input=$(this).parent().find('.minicolors-input'),minicolors=input.parent();if(minicolors.hasClass('minicolors-focus')){hide(input);}else{show(input);}}).on('focus.minicolors','.minicolors-input',function(event){var input=$(this);if(!input.data('minicolors-initialized'))return;show(input);}).on('blur.minicolors','.minicolors-input',function(event){var input=$(this),settings=input.data('minicolors-settings');if(!input.data('minicolors-initialized'))return;input.val(parseHex(input.val(),true));if(input.val()==='')input.val(parseHex(settings.defaultValue,true));input.val(convertCase(input.val(),settings.letterCase));}).on('keydown.minicolors','.minicolors-input',function(event){var input=$(this);if(!input.data('minicolors-initialized'))return;switch(event.keyCode){case 9:hide();break;case 27:hide();input.blur();break;}}).on('keyup.minicolors','.minicolors-input',function(event){var input=$(this);if(!input.data('minicolors-initialized'))return;updateFromInput(input,true);}).on('paste.minicolors','.minicolors-input',function(event){var input=$(this);if(!input.data('minicolors-initialized'))return;setTimeout(function(){updateFromInput(input,true);},1);});})(jQuery);

/*!
 * jQuery Tools v1.2.7 - The missing UI library for the Web
 * tabs/tabs.js
 * NO COPYRIGHTS OR LICENSES. DO WHAT YOU LIKE.
 * http://flowplayer.org/tools/
 */
(function(a){a.tools=a.tools||{version:"v1.2.7"},a.tools.tabs={conf:{tabs:"a",current:"current",onBeforeClick:null,onClick:null,effect:"default",initialEffect:!1,initialIndex:0,event:"click",rotate:!1,slideUpSpeed:400,slideDownSpeed:400,history:!1},addEffect:function(a,c){b[a]=c}};var b={"default":function(a,b){this.getPanes().hide().eq(a).show(),b.call()},fade:function(a,b){var c=this.getConf(),d=c.fadeOutSpeed,e=this.getPanes();d?e.fadeOut(d):e.hide(),e.eq(a).fadeIn(c.fadeInSpeed,b)},slide:function(a,b){var c=this.getConf();this.getPanes().slideUp(c.slideUpSpeed),this.getPanes().eq(a).slideDown(c.slideDownSpeed,b)},ajax:function(a,b){this.getPanes().eq(0).load(this.getTabs().eq(a).attr("href"),b)}},c,d;a.tools.tabs.addEffect("horizontal",function(b,e){if(!c){var f=this.getPanes().eq(b),g=this.getCurrentPane();d||(d=this.getPanes().eq(0).width()),c=!0,f.show(),g.animate({width:0},{step:function(a){f.css("width",d-a)},complete:function(){a(this).hide(),e.call(),c=!1}}),g.length||(e.call(),c=!1)}});function e(c,d,e){var f=this,g=c.add(this),h=c.find(e.tabs),i=d.jquery?d:c.children(d),j;h.length||(h=c.children()),i.length||(i=c.parent().find(d)),i.length||(i=a(d)),a.extend(this,{click:function(d,i){var k=h.eq(d),l=!c.data("tabs");typeof d=="string"&&d.replace("#","")&&(k=h.filter("[href*=\""+d.replace("#","")+"\"]"),d=Math.max(h.index(k),0));if(e.rotate){var m=h.length-1;if(d<0)return f.click(m,i);if(d>m)return f.click(0,i)}
if(!k.length){if(j>=0)return f;d=e.initialIndex,k=h.eq(d)}
if(d===j)return f;i=i||a.Event(),i.type="onBeforeClick",g.trigger(i,[d]);if(!i.isDefaultPrevented()){var n=l?e.initialEffect&&e.effect||"default":e.effect;b[n].call(f,d,function(){j=d,i.type="onClick",g.trigger(i,[d])}),h.removeClass(e.current),k.addClass(e.current);return f}},getConf:function(){return e},getTabs:function(){return h},getPanes:function(){return i},getCurrentPane:function(){return i.eq(j)},getCurrentTab:function(){return h.eq(j)},getIndex:function(){return j},next:function(){return f.click(j+1)},prev:function(){return f.click(j-1)},destroy:function(){h.off(e.event).removeClass(e.current),i.find("a[href^=\"#\"]").off("click.T");return f}}),a.each("onBeforeClick,onClick".split(","),function(b,c){a.isFunction(e[c])&&a(f).on(c,e[c]),f[c]=function(b){b&&a(f).on(c,b);return f}}),e.history&&a.fn.history&&(a.tools.history.init(h),e.event="history"),h.each(function(b){a(this).on(e.event,function(a){f.click(b,a);return a.preventDefault()})}),i.find("a[href^=\"#\"]").on("click.T",function(b){f.click(a(this).attr("href"),b)}),location.hash&&e.tabs=="a"&&c.find("[href=\""+location.hash+"\"]").length?f.click(location.hash):(e.initialIndex===0||e.initialIndex>0)&&f.click(e.initialIndex)}
a.fn.tabs=function(b,c){var d=this.data("tabs");d&&(d.destroy(),this.removeData("tabs")),a.isFunction(c)&&(c={onBeforeClick:c}),c=a.extend({},a.tools.tabs.conf,c),this.each(function(){d=new e(a(this),b,c),a(this).data("tabs",d)});return c.api?d:this}})(jQuery);

// Init
var $nu = jQuery.noConflict();

// Function for loading a font family from Nuevvo CDN
function nuLoadFont(font) {
	var loadedClass = 'wf-' + font + '-n4-inactive';
	if (!$nu('html').hasClass(loadedClass)) {
		WebFont.load({
			custom : {
				families : [font],
				urls : ['http://cdn.nuevvo.net/webfonts/' + font + '/css/fontello.css']
			}
		});
	}
}

// Function to get the font definitions
nuFontDefinitions = Array;
function nuLoadFontDefinitions(font) {
	if ( typeof (nuFontDefinitions[font]) == 'undefined') {
		$nu.getScript('//cdn.nuevvo.net/webfonts/' + font + '/embed.js', function(data, textStatus, jqxhr) {
			var tmp = $nu('<div></div>');
			$nu.each(fontDefinitions, function(index, className) {
				var i = jQuery('<i>').addClass(className);
				tmp.append(i);
			});
			nuFontDefinitions[font] = tmp.html();
		});
	}
	return nuFontDefinitions[font];
}

$nu(document).ready(function() {
	// Tabs
	$nu("ul#nuParamsTabs").tabs("div#nuParamsPanes > div");

	// Colorpicker
	$nu('input.nuColorPicker').minicolors({});

	// Category Colors
	$nu('#nuAddJCategoryButton').click(function(event) {
		event.preventDefault();
		var clone = $nu('#nuJCategoryPlaceholder').clone();
		clone.removeAttr('id').css('display', 'block').children().removeAttr('disabled');
		clone.find('select').removeAttr('id');
		clone.find('input[type="text"]').minicolors({});
		var inputs = clone.find('select, input');
		inputs.each(function() {
			var input = $nu(this);
			var name = input.attr('name');
			input.attr('name', name.replace('[]', '['+event.timeStamp+']'));
		});
		clone.appendTo('#nuCategoryColors');
	});
	$nu('#nuAddK2CategoryButton').click(function(event) {
		event.preventDefault();
		var clone = $nu('#nuK2CategoryPlaceholder').clone();
		clone.removeAttr('id').css('display', 'block').children().removeAttr('disabled');
		clone.find('select').removeAttr('id');
		clone.find('input[type="text"]').minicolors({});
		var inputs = clone.find('select, input');
		inputs.each(function() {
			var input = $nu(this);
			var name = input.attr('name');
			input.attr('name', name.replace('[]', '['+event.timeStamp+']'));
		});
		clone.appendTo('#nuCategoryColors');
	});

	// Highlights
	$nu('#nuAddHighlightButton').click(function(event) {
		event.preventDefault();
		var clone = $nu('#nuHighlightPlaceholder').clone();
		var inputs = clone.find('textarea, input');
		clone.removeAttr('id').css('display', 'block');
		inputs.removeAttr('disabled');
		var counter = $nu('.nuHighlight').length - 1;
		inputs.each(function() {
			var input = $nu(this);
			var name = input.attr('name');
			input.attr('name', name.replace('[]', '['+counter+']'));
		});
		var nuImageId = clone.find('.nuImage').attr('id');
		var newId = 'nuImage' + event.timeStamp;
		clone.find('.nuImage').attr('id', newId);
		clone.find('.nuImagePreviewButton').data('nuimage-id', newId);
		clone.find('#' + nuImageId + '_field').attr('id', newId + '_field');
		clone.find('.nuImageModalButton').data('nuimage-id', newId);
		clone.find('.nuImageClearButton').data('nuimage-id', newId);
		clone.appendTo('#nuHighlights');
	});
	$nu('body').on('click', '.nuRemoveButton', function(event) {
		var nextHighlights = $nu(this).parent().nextAll();
		// Compact the indices of dynamic variables so Joomla! gives us back an array of objects 
		nextHighlights.each(function() {
			var currentIndex = $nu('.nuHighlight').index($nu(this))-1;
			var newIndex = currentIndex-1;
			var inputs = $nu(this).find('textarea, input');
			inputs.each(function() {
				var input = $nu(this);
				var name = input.attr('name');
				input.attr('name', name.replace('['+currentIndex+']', '['+newIndex+']'));
			});
		});
		$nu(this).parent().remove();
	});

	// Image selector
	$nu('#nuImagePreview').swipebox();
	$nu('body').on('click', '.nuImagePreviewButton', function(event) {
		event.preventDefault();
		var id = $nu(this).data('nuimage-id');
		var image = $nu('#' + id + '_field').val();
		if (image) {
			$nu('#nuImagePreview').attr('href', '../' + image);
			$nu('#nuImagePreview').trigger('click');
		}
	});
	$nu('body').on('click', '.nuImageModalButton', function(event) {
		event.preventDefault();
		var id = $nu(this).data('nuimage-id');
		this.href = 'index.php?option=com_media&view=images&tmpl=component&asset=com_templates&author=&folder=&fieldid=' + id + '_field';
		event.preventDefault();
		SqueezeBox.initialize();
		SqueezeBox.fromElement(this, {
			handler: 'iframe',
			size: {
				x: 800,
				y: 560
			}
		});
	});
	$nu('body').on('click', '.nuImageClearButton', function(event) {
		event.preventDefault();
		var id = $nu(this).data('nuimage-id');
		$nu('#' + id + '_field').val('');
	});

	// Load the selected icon font family while the page is loading and append the needed classes
	var activeFont = $nu('#nuHighlightsFont').val();
	if($nu.trim(activeFont)!='') {
		nuLoadFont(activeFont);
		nuLoadFontDefinitions(activeFont);
	} else {
		$nu('#nuHighlights').addClass('nuHighlightsIconsDisabled');
	}

	// Load additional icon fonts on the font change event
	$nu('#nuHighlightsFont').change(function() {
		$nu('.nuHighlightsIconPreview').empty();
		$nu('.nuHighlightsIconContainer input').val('');
		$nu('.nuHighlightIconsList').addClass('nuHighlightIconsListHidden');
		var font = $nu(this).val();
		if(font) {
			$nu('#nuHighlights').removeClass('nuHighlightsIconsDisabled');
			nuLoadFont(font);
			nuLoadFontDefinitions(font);
		} else {
			$nu('#nuHighlights').addClass('nuHighlightsIconsDisabled');
		}
	});

	$nu('body').on('click', '.nuHighlightSelectIconButton', function(event) {
		event.preventDefault();
		var activeFont = $nu('#nuHighlightsFont').val();
		var parent = $nu(this).parents('.nuHighlightsIconContainer')
		var target = parent.find('.nuHighlightIconsList');
		if($nu.trim(activeFont) == '') {
			target.addClass('nuHighlightIconsListHidden');
			return;
		}
		if (target.hasClass('nuHighlightIconsListHidden')) {
			target.empty().removeClass('nuHighlightIconsListHidden').addClass('nuHighlightIconsListLoading');
			var interval = window.setInterval(function() {
				var definitions = nuLoadFontDefinitions(activeFont);
				if ( typeof (definitions) != 'undefined') {
					window.clearInterval(interval);
					target.append(definitions).removeClass('nuHighlightIconsListLoading');
					target.off('click', 'i');
					target.on('click', 'i', function() {
						var icon = $nu(this).clone().wrap('<div/>').parent().html();
						parent.find('.nuHighlightsIconPreview').empty().html(icon);
						parent.find('input[type="hidden"]').val(icon);
						target.addClass('nuHighlightIconsListHidden');
					});
				}
			}, 500);

		} else {
			target.addClass('nuHighlightIconsListHidden');
		}
	});

});
