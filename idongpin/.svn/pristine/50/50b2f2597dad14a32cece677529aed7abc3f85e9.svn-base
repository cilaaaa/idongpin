
$(document).ready(function(){
	//第一次进入页面后导航默认收起
	$("#firstCarte").attr("data-flag","show");

	
	$(".goods img").each(function(){
		$(this).hover(function(){
			$(this).siblings(".shadow").css({
				display : "block"
			});
			$(this).siblings(".shadow").hover(function(){
				$(this).css({
					display : "block"
				});
			},function(){
				$(this).css({
					display : "none"
				});
			});
		},function(){
			$(this).siblings(".shadow").css({
				display : "none"
			});
		});
	});
});