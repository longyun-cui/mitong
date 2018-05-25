﻿/*
	通用插件库

	Create Time : 2014-07-22
	Update Time : 2015-11-25
	Author      : yoyo
	
	-------------------目录 -------------------
	
	★ 无缝滚动插件
	
	★ 下拉菜单
	
	★ 选项卡
	
	★ placeholder 兼容处理

	★ 浏览器版本接口
	
	-------------------------------------------
*/

;(function($){
	
	/*
		----------------------------------------------------------------------------------------
		无缝滚动插件  HOW TO USE :
		$("#marquee-main").kxbdMarquee({
			
			isEqual:true,//所有滚动的元素长宽是否相等,true,false
			loop: 0,//循环滚动次数，0时无限
			direction: 'left',//滚动方向，'left','right','up','down'
			scrollAmount:1,//步长
			scrollDelay:25,//时长
			newAmount:3,//加速滚动的步长
			eventA:'mousedown',//鼠标事件，加速
			eventB:'mouseup'//鼠标事件，原速

		});
		----------------------------------------------------------------------------------------
	
	*/
	
	$.fn.kxbdMarquee = function(options){
		var opts = $.extend({},$.fn.kxbdMarquee.defaults, options);
		
		return this.each(function(){
			var $marquee = $(this);//滚动元素容器
			var _scrollObj = $marquee.get(0);//滚动元素容器DOM
			var scrollW = $marquee.width();//滚动元素容器的宽度
			var scrollH = $marquee.height();//滚动元素容器的高度
			var $element = $marquee.children(); //滚动元素
			var $kids = $element.children();//滚动子元素
			var scrollSize=0;//滚动元素尺寸
			var _type = (opts.direction == 'left' || opts.direction == 'right') ? 1:0;//滚动类型，1左右，0上下

			//防止滚动子元素比滚动元素宽而取不到实际滚动子元素宽度
			$element.css(_type?'width':'height',10000);
			//获取滚动元素的尺寸
			if (opts.isEqual) {
				scrollSize = $kids[_type?'outerWidth':'outerHeight']() * $kids.length;
			}else{
				$kids.each(function(){
					scrollSize += $(this)[_type?'outerWidth':'outerHeight']();
				});
			}
			//滚动元素总尺寸小于容器尺寸，不滚动
			if (scrollSize<(_type?scrollW:scrollH)) return; 
			//克隆滚动子元素将其插入到滚动元素后，并设定滚动元素宽度
			$element.append($kids.clone()).css(_type?'width':'height',scrollSize*2);
			
			var numMoved = 0;
			function scrollFunc(){
				var _dir = (opts.direction == 'left' || opts.direction == 'right') ? 'scrollLeft':'scrollTop';
				if (opts.loop > 0) {
					numMoved+=opts.scrollAmount;
					if(numMoved>scrollSize*opts.loop){
						_scrollObj[_dir] = 0;
						return clearInterval(moveId);
					} 
				}
				if(opts.direction == 'left' || opts.direction == 'up'){
					var newPos = _scrollObj[_dir] + opts.scrollAmount;
					if(newPos>=scrollSize){
						newPos -= scrollSize;
					}
					_scrollObj[_dir] = newPos;
				}else{
					var newPos = _scrollObj[_dir] - opts.scrollAmount;
					if(newPos<=0){
						newPos += scrollSize;
					}
					_scrollObj[_dir] = newPos;
				}
			};
			//滚动开始
			var moveId = setInterval(scrollFunc, opts.scrollDelay);
			//鼠标划过停止滚动
			$marquee.hover(
				function(){
					clearInterval(moveId);
				},
				function(){
					clearInterval(moveId);
					moveId = setInterval(scrollFunc, opts.scrollDelay);
				}
			);
			
			//控制加速运动
			if(opts.controlBtn){
				$.each(opts.controlBtn, function(i,val){
					$(val).bind(opts.eventA,function(){
						opts.direction = i;
						opts.oldAmount = opts.scrollAmount;
						opts.scrollAmount = opts.newAmount;
					}).bind(opts.eventB,function(){
						opts.scrollAmount = opts.oldAmount;
					});
				});
			}
		});
	};
	$.fn.kxbdMarquee.defaults = {
		isEqual:true,//所有滚动的元素长宽是否相等,true,false
		loop: 0,//循环滚动次数，0时无限
		direction: 'left',//滚动方向，'left','right','up','down'
		scrollAmount:1,//步长
		scrollDelay:25,//时长
		newAmount:3,//加速滚动的步长
		eventA:'mousedown',//鼠标事件，加速
		eventB:'mouseup'//鼠标事件，原速
	};
	
	$.fn.kxbdMarquee.setDefaults = function(settings) {
		$.extend( $.fn.kxbdMarquee.defaults, settings );
	};
	
	/*
		--------------------------------------------------------------------------------------------------
		下拉菜单 HOW TO USE :
		$.dropdpwn_Menu(".nav > ul > li > ul");

		选项卡 	 HOW TO USE :
		$.easy_Tab(".tabHead",".tabCont","click","li","active"); 
		--------------------------------------------------------------------------------------------------
	*/

	$.extend({

		'dropdpwn_Menu' : function(nName){

			$(nName).css('display','none');
			$(nName).parent('li').hover(function() {
				$(this).children(nName).stop(true, true).slideDown(200);
			}, function() {
				$(this).children(nName).stop(true, true).slideUp(200);
			});

			return this;
		},

		'easy_Tab' : function(tHead,tConn,tType,childEleName,activeName){

			$(tHead).children(childEleName).bind(tType, function() {

				var index = $(this).index();
                $(this).addClass(activeName).siblings().removeClass(activeName);
                $(tConn).children(childEleName).eq(index).show().siblings().hide();
	
			});

            return this;
		}
		
	})
	
})(jQuery);

	/*
		-------------------------------------------------------------------------------------
		placeholder 兼容处理 默认调用 创建的类是 : placeholder
		-------------------------------------------------------------------------------------
	*/
	if (!('placeholder' in document.createElement('input'))) {

		$('input[placeholder],textarea[placeholder]').each(function() {
			var that = $(this),
				text = that.attr('placeholder');
			if (that.val() === "") {
				that.val(text).addClass('placeholder');
			}
			that.focus(function() {
				if (that.val() === text) {
					that.val("").removeClass('placeholder');
				}
			}).blur(function() {
				if (that.val() === "") {
					that.val(text).addClass('placeholder');
		        }    
		    }).closest('form').submit(function(){    
		        if(that.val() === text){    
		          that.val('');    
		        }    
		   	});    
		});    
		
	}

	/*
		----------------------------------------------------------------------------------------
		浏览器版本接口
		使用： 
		if (getIEVersion() == "IE8") alert("yes!");
		----------------------------------------------------------------------------------------
	*/

	function getIEVersion(){

		if(navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion .split(";")[1].replace(/[ ]/g,"")=="MSIE6.0") { 
			return "IE6";
		} 

		else if(navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion .split(";")[1].replace(/[ ]/g,"")=="MSIE7.0") { 
			return "IE7";
		} 

		else if(navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion .split(";")[1].replace(/[ ]/g,"")=="MSIE8.0") { 
			return "IE8";
		} 

		else if(navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion .split(";")[1].replace(/[ ]/g,"")=="MSIE9.0") { 
			return "IE9";
		} 

	}


       var system = {

           win: false,

           mac: false,

           xll: false

       };

       //检测平台   

       var p = navigator.platform;



       system.win = p.indexOf("Win") == 0;

       system.mac = p.indexOf("Mac") == 0;

       system.x11 = (p == "X11") || (p.indexOf("Linux") == 0);

     

       if (system.win || system.mac || system.xll) {



       } else {
       	
       }  

 