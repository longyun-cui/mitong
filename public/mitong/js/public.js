/* ----------------------------------------------------- */
		
	/*固定元素*/
	
	$(window).scroll(function(){
		
		/*固定顶部*/
		if($(window).scrollTop() > $(".header").outerHeight() + $(".nav-container").outerHeight() ) {
			$(".nav-container").addClass("fixed");
		}else {
			$(".nav-container").removeClass("fixed");
		}
		
	})
	
	function resetNavLinePos(){
		if($("#nav").find("li.active").length>0) {
			var activePos = $("#nav").find("li.active").offset().left,
				activeWid = $("#nav").find("li.active").width();
				$("#nav-line").stop().animate({
					left : activePos,
					width : activeWid
				},{
					easing: "easeOutElastic",
					duration: 800
				})
		}
	}
	
	resetNavLinePos();
	
	$(function(){
		
		
		/*导航下拉*/
		$("#nav").mouseleave(function(){
			resetNavLinePos();
		})
		
		/*会员按钮*/
		$(".member-btns .member-btn").hover(function(){
			$(this).find("span").stop().animate({
				width: "90px"
			},{
				easing: "easeOutElastic",
				duration: 3000
			});
		},function(){
			$(this).find("span").stop().animate({
				width: "0"
			},100);
		})
		
		$("#nav > ul >li").hover(function(){
			
			/*判断是否有高亮*/
			if($("#nav >ul >li.active").length>0) {
				var posLeft = $(this).offset().left;
				var posWid = $(this).width();
				$("#nav-line").stop().animate({
					left : posLeft,
					width : posWid
				},{
					easing: "easeOutElastic",
					duration: 800
				})
			}
			
			$(this).find(".nav-childs").stop(true,true).fadeIn("fast");
		},function(){
			$(this).find(".nav-childs").stop(true,true).fadeOut("fast");
		})
		
		
	})
	
	// -----------------------------------------------------------------------
	
	/*搜索*/
	$("#search").click(function(e){
		e.stopPropagation();
	})
	$("#search-closed").click(function(){
		$("#search-main").stop().slideUp({
			duration: 300,
			easing: "swing"
		})
		$("#search-btn").removeClass("active");
	})
	$("#search-btn").click(function(e){
		e.stopPropagation();
		$(this).toggleClass("active");
		$("#search-main").stop().slideToggle({
			duration: 500,
			easing: "easeOutElastic"
		})
	})
	$(".search-type").click(function(e){
		e.stopPropagation();
		$("#search-type-chose").stop().slideToggle({
			duration: 800,
			easing: "easeOutElastic"
		})
	})
	$("#search-type-chose li").click(function(){
		$(this).addClass("active").siblings().removeClass("active");
		$("#search-type-this").text($(this).html());
		$(this).parent().stop().hide();
		$("#search-text").focus();
	})
	
	//阻止冒泡
	$(document).on("click",function(){
		$("#search-type-chose,#search-main").hide();
		$("#search-btn").removeClass("active");
	})
	
		
	// -----------------------------------------------------------------------
		
	/*底部更多*/
	$("#footer-more-btn").click(function(){
		$(this).parent().toggleClass("active");
		$("#footer-container").slideToggle({
			duration: 400,
			easing: "easeOutCubic"
		});
		
		if($(this).parent().hasClass("active")){
			$(this).find("span").text("收起");
//			$("html,body").animate({
//				scrollTop: $("body").height()
//			},200);
		}else {
			$(this).find("span").text("展开");
		}
		
	})
		
	// -----------------------------------------------------------------------
	
	/*侧边栏导航*/
	if($("#aside-nav").length>0) {
		$(function(){
			var roundSpeed = 1000, 	//小球运动速度
				lightSpeed = 800,	//指示点速度
				defaultActiveTop =""; 

			
			/*大球默认 位置*/
			$("#aside-round").animate({
				top: $("#aside-nav > ul > li.active").position().top + 10
			},{
				duration: roundSpeed,
				easing: "easeOutElastic"
			})
			
			$("#aside-nav > ul > li").each(function(){
				
				/*动态创建 二级栏目所需高亮  如果一级栏目 有 二级 栏目 并且 有高亮*/
				if($(this).children("ul").length>0 && $(this).hasClass("active")) {
					
					$(this).children("ul").append('<b class="light" id="aside-light">&nbsp;</b><b class="round-m" id="aside-round-m">&nbsp;</b>');
					
					/*高亮默认位置*/
					
					if($(this).children("ul").children("li.active").length > 0) {
						$("#aside-light").animate({
							top: $("#aside-nav > ul > li > ul > li.active").position().top + 2
						},{
							duration: lightSpeed,
							easing: "easeOutElastic"
						})
						
						/*小球默认位置*/
						$("#aside-round-m").animate({
							top: $("#aside-nav > ul > li > ul > li.active").position().top + 10
						},{
							duration: roundSpeed,
							easing: "easeOutElastic"
						})	
					}else {
						$(this).children("ul").addClass("noHeightLight");
						$("#aside-light,#aside-round-m").hide();
					}
				}
				
				/*一级栏目 动效*/
				$(this).hover(function(){
					var thisTop = $(this).position().top;
					$(this).addClass("cur").siblings().removeClass("cur");
					$("#aside-round").stop().animate({
						top: thisTop + 10
					},{
						duration: roundSpeed,
						easing: "easeOutElastic"
					})
				},function(){
					var activeTop = $("#aside-nav > ul >li.active").position().top;
					$("#aside-nav > ul > li.active").addClass("cur").siblings().removeClass("cur");
					$("#aside-round").stop().animate({
						top: activeTop + 10
					},{
						duration: roundSpeed,
						easing: "easeOutElastic"
					})
				})
				
				/*二级栏目动效*/
				$(this).find("li").hover(function(){
					var thisTop = $(this).position().top;
					$(this).addClass("cur").siblings().removeClass("cur");
					$("#aside-light").stop().animate({
						top: thisTop + 2
					},{
						duration: lightSpeed,
						easing: "easeOutElastic"
					})
					$("#aside-round-m").stop().animate({
						top: thisTop + 10
					},{
						duration: roundSpeed,
						easing: "easeOutElastic"
					})
				},function(){
					var activeTop = $("#aside-nav > ul > li > ul > li.active").position().top;
					$("#aside-nav > ul > li > ul > li.active").addClass("cur").siblings().removeClass("cur");
					$("#aside-light").stop().animate({
						top: activeTop + 2
					},{
						duration: lightSpeed,
						easing: "easeOutElastic"
					})
					$("#aside-round-m").stop().animate({
						top: activeTop + 10
					},{
						duration: roundSpeed,
						easing: "easeOutElastic"
					})
				})
				
			})
			
		})
	}
	

	$(function(){
		
		$(window).scroll(function(){
			$(window).scrollTop()>0 ? $("#returnTop").fadeIn('fast') : $("#returnTop").fadeOut('fast');
		})
		$("#returnTop").click(function(){
			$("html,body").animate({scrollTop: 0},500);
		})
		
		$("#toolbar .toolbar-items").hover(function(){
			$(this).find(".slide-float").stop(true,true).fadeIn("fast");
		},function(){
			$(this).find(".slide-float").stop(true,true).fadeOut("fast");
		})
		$("#toolbar-remove").click(function(){
			$("#toolbar").hide();
			$("#toolbar-show").show();
		})
		$("#toolbar-show").click(function(){
			$("#toolbar").show();
			$(this).hide();
		})
	})


$(function() {
    $(".btn-search-min").click(function() {


        if ($.trim($("#search-text").val()) == '请输入关键字' || $.trim($("#search-text").val()).length == 0) {
            alert("请输入关键字");
            $("#search-text").focus();
            return false;
        }
        else {
            if ($.trim($("#search-type-this").text()) == "新闻") { window.location.href = "/newsearch.shtml?keywords=" + escape($.trim($("#search-text").val())); return false; }
            if ($.trim($("#search-type-this").text()) == "产品") { window.location.href = "/productsearch.shtml?keywords=" + escape($.trim($("#search-text").val())); return false; }
            if ($.trim($("#search-type-this").text()) == "案例") { window.location.href = "/casesearch.shtml?keywords=" + escape($.trim($("#search-text").val())) + "&&industry=0&&yingyong=0"; return false; }

        }
    })
    $("#search-text").keydown(function(event) {

        if (event.keyCode == 13) {
            $(".btn-search-min").click();
        }

    })
});


$(function() {
    $("a").each(function() {
        if ($(this).text().indexOf("出版物") != -1) {
            $(this).attr("href", "http://imarketing.71360.com/");
            $(this).attr("target", "_blank");
        }
    })
})