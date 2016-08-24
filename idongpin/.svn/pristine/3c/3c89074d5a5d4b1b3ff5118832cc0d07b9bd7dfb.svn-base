
$(document).ready(function(){
	//为左右两边模块设置高度
	var windowHeight = $(window).height();

	var loginInfoHeight = $(".loginInfo").height();
	var searchToolHeight = $(".searchTool").height();
	var minHeight = windowHeight - loginInfoHeight -searchToolHeight ;

	$(".rightSide").css("minHeight",minHeight+"px");
	var rightSideHeight = $(".rightSide").height();
	$(".leftSide").height(rightSideHeight - 20);
	
	//点击展开二级菜单
	$(".tradeManage").delegate(".tradeBtn","click",function(){
		var show = $(this).parent().attr("data-show");
		if(show == "show"){
			$(this).parent().attr("data-show","hidden");
			$(this).parent().children(".tradeMenu").css("display","none");
			$(this).parent().children(".tradeImg").css({
				transform : "rotate(-90deg)",
				webkitTransform : "rotate(-90deg)",
				mozTransform : "rotate(-90deg)",
				msTransform : "rotate(-90deg)",
				oTransform : "rotate(-90deg)"
			});
		}else{
			$(this).parent().attr("data-show","show");
			$(this).parent().children(".tradeMenu").css("display","block");
			$(this).parent().children(".tradeImg").css({
				transform : "rotate(0deg)",
				webkitTransform : "rotate(0deg)",
				mozTransform : "rotate(0deg)",
				msTransform : "rotate(0deg)",
				oTransform : "rotate(0deg)"
			});
		}
	});
	$(".vipCenter").delegate(".vipBtn","click",function(){
		var show = $(this).parent().attr("data-show");
		if(show == "show"){
			$(this).parent().attr("data-show","hidden");
			$(this).parent().children(".vipMenu").css("display","none");
			$(this).parent().children(".vipImg").css({
				transform : "rotate(-90deg)",
				webkitTransform : "rotate(-90deg)",
				mozTransform : "rotate(-90deg)",
				msTransform : "rotate(-90deg)",
				oTransform : "rotate(-90deg)"
			});
		}else{
			$(this).parent().attr("data-show","show");
			$(this).parent().children(".vipMenu").css("display","block");
			$(this).parent().children(".vipImg").css({
				transform : "rotate(0deg)",
				webkitTransform : "rotate(0deg)",
				mozTransform : "rotate(0deg)",
				msTransform : "rotate(0deg)",
				oTransform : "rotate(0deg)"
			});
		}
	});
});