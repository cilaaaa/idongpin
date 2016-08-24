/**
 * 此页面四一级分类页面的js文件
 * @author chenqin
 * @date 2016/7/1
 */
$(document).ready(function(){
	if($(".brandContent .brand").length < 6){
		$(".brands .more").css("visibility","hidden");
	}
	if($(".originContent .brand").length < 6){
		$(".origins .more").css("visibility","hidden");
	}
	if($(".varietieContent .brand").length < 6){
		$(".types .more").css("visibility","hidden");
	}

	//第一次进入页面后导航默认收起
	$("#firstCarte").attr("data-flag","show");

	//添加筛选条件
	$(".brand").each(function(){
		$(this).delegate("","click",function(){
			$(".showCondition").css({
				display : "block"
			});
			if($(this).attr("data-check") != "checked"){
				$(this).attr("data-check","checked");
				$(this).children("img").attr("src","images/product/checked.png");
			}else{
				$(this).attr("data-check","unchecked");
				$(this).children("img").attr("src","images/product/unchecked.png");
			}
		});
	});
	$(".brands .confirm").delegate("","click",function(){
		var url = $(this).attr('data-url');
		url+="&brand=";
		var count = 0 ;
		$(".brands .brand").each(function(){
			var check = $(this).attr("data-check");
			if(check == "checked") {
				var flag = $(this).attr("data-tag");
				url+=flag+";";
				count++;
			}
		});
		if(count!=0){
			url=url.substring(0,url.length-1);
		}else{
			url = $(this).attr('data-url');
		}
		$(this).find("a").attr("href",url);
	});
	$(".origins .confirm").delegate("","click",function(){
		var url = $(this).attr('data-url');
		url+="&madein=";
		var count = 0 ;
		$(".origins .brand").each(function(){
			var check = $(this).attr("data-check");
			if(check == "checked") {
				var flag = $(this).attr("data-tag");
				url+=flag+";";
				count++;
			}
		});
		if(count != 0){
			url=url.substring(0,url.length-1);
		}else{
			url = $(this).attr('data-url');
		}
		$(this).children("a").attr("href",url);
	});
	$(".types .confirm").delegate("","click",function(){
		var url = $(this).attr('data-url');
		url+="&subtype=";
		var count = 0;
		$(".types .brand").each(function(){
			var check = $(this).attr("data-check");
			if(check == "checked") {
				var flag = $(this).attr("data-tag");
				url+=flag+";";
				count++;
			}
		});
		if(count !=0){
			url=url.substring(0,url.length-1);
		}else{
			url = $(this).attr('data-url');
		}
		$(this).children("a").attr("href",url);
	});
	$(".prices .confirm").delegate("","click",function(){
		var url = $(this).attr('data-url');
		var count = 0 ;
		var from="&price_from=";
		var to="&price_to=";
		$(".prices .brand").each(function(){
			var check = $(this).attr("data-check");
			if(check == "checked") {
				from += $(this).attr("data-from")+";";
				to += $(this).attr("data-to")+";";
				count++;
			}
		});
		if(count!=0){
			from=from.substring(0,from.length-1);
			to=to.substring(0,to.length-1);
			url+=from+to;
		}else{
			url = $(this).attr('data-url')
		}
		$(this).children("a").attr("href",url);
	});
	$(".origin").each(function(){
		$(this).delegate("","click",function(){
			$(".showCondition").css({
				display : "block"
			});
			if($(this).attr("data-check") != "checked"){
				$(this).attr("data-check","checked");
				$(this).children("img").attr("src","images/product/checked.png");
			}else{
				$(this).attr("data-check","unchecked");
				$(this).children("img").attr("src","images/product/unchecked.png");
			}
		});
	});
	$(".varietie").each(function(){
		$(this).delegate("","click",function(){
			$(".showCondition").css({
				display : "block"
			});
			if($(this).attr("data-check") != "checked"){
				$(this).attr("data-check","checked");
				$(this).children("img").attr("src","images/product/checked.png");
			}else{
				$(this).attr("data-check","unchecked");
				$(this).children("img").attr("src","images/product/unchecked.png");
			}
		});
	});
	$(".price").each(function(){
		$(this).delegate("","click",function(){
			$(".showCondition").css({
				display : "block"
			});
			if($(this).attr("data-check") != "checked"){
				$(this).attr("data-check","checked");
				$(this).children("img").attr("src","images/product/checked.png");
			}else{
				$(this).attr("data-check","unchecked");
				$(this).children("img").attr("src","images/product/unchecked.png");
			}
		});
	});
	//点击查看更多
	$(".brands .more").delegate("","click",function(){
		if($(this).attr("data-flag") != "show"){
			$(".brandContent").css({
				height : "auto",
				overflow : "auto"
			});
			$(this).children("span").text("隐藏");
			$(this).children("img").css({
				transform : "rotate(180deg)",
				webkitTransform : "rotate(180deg)",
				mozTransform : "rotate(180deg)",
				msTransform : "rotate(180deg)",
				oTransform : "rotate(180deg)"
			});
			$(this).css({
				background : "#e8e8e8"
			});
			$(this).attr("data-flag","show");
		}else{
			$(".brandContent").css({
				height : "33px",
				overflow : "hidden"
			});
			$(this).children("span").text("更多");
			$(this).children("img").css({
				transform : "rotate(0deg)",
				webkitTransform : "rotate(0deg)",
				mozTransform : "rotate(0deg)",
				msTransform : "rotate(0deg)",
				oTransform : "rotate(0deg)"
			});
			$(this).css({
				background : "#ffffff"
			});
			$(this).attr("data-flag","hidden");
		}

	});
	$(".origins .more").delegate("","click",function(){
		if($(this).attr("data-flag") != "show"){
			$(".originContent").css({
				height : "auto",
				overflow : "auto"
			});
			$(this).children("span").text("隐藏");
			$(this).children("img").css({
				transform : "rotate(180deg)",
				webkitTransform : "rotate(180deg)",
				mozTransform : "rotate(180deg)",
				msTransform : "rotate(180deg)",
				oTransform : "rotate(180deg)"
			});
			$(this).css({
				background : "#e8e8e8"
			});
			$(this).attr("data-flag","show");
		}else{
			$(".originContent").css({
				height : "33px",
				overflow : "hidden"
			});
			$(this).children("span").text("更多");
			$(this).children("img").css({
				transform : "rotate(0deg)",
				webkitTransform : "rotate(0deg)",
				mozTransform : "rotate(0deg)",
				msTransform : "rotate(0deg)",
				oTransform : "rotate(0deg)"
			});
			$(this).css({
				background : "#ffffff"
			});
			$(this).attr("data-flag","hidden");
		}
	});
	$(".types .more").delegate("","click",function(){
		if($(this).attr("data-flag") != "show"){
			$(".varietieContent").css({
				height : "auto",
				overflow : "auto"
			});
			$(this).children("span").text("隐藏");
			$(this).children("img").css({
				transform : "rotate(180deg)",
				webkitTransform : "rotate(180deg)",
				mozTransform : "rotate(180deg)",
				msTransform : "rotate(180deg)",
				oTransform : "rotate(180deg)"
			});
			$(this).css({
				background : "#e8e8e8"
			});
			$(this).attr("data-flag","show");
		}else{
			$(".varietieContent").css({
				height : "33px",
				overflow : "hidden"
			});
			$(this).children("span").text("更多");
			$(this).children("img").css({
				transform : "rotate(0deg)",
				webkitTransform : "rotate(0deg)",
				mozTransform : "rotate(0deg)",
				msTransform : "rotate(0deg)",
				oTransform : "rotate(0deg)"
			});
			$(this).css({
				background : "#ffffff"
			});
			$(this).attr("data-flag","hidden");
		}
	});

	//点击多选按钮
	$(".selectMore").each(function(){
		$(this).delegate("","click",function(){
			var url=$(this).parent().parent().find(".brand").children("a").attr('data-msg');
			$(this).parent().parent().find(".brand").children("a").attr('href','javascript:void(0)');
			$(this).css("display","none");
			$(this).parent().children(".more").css("display","none");
			$(this).parent().children(".confirm").css({
				display : "block",
				float : "left",
				marginRight : "auto"
			});
			$(this).parent().children(".cancel").css({
				display : "block",
				float : "left",
				marginRight : "auto"
			});
			$(this).parent().prev().css({
				height : "auto",
				overflow : "auto"
			});
			$(this).parent().siblings().find(".checkBox").css("visibility","visible");
			$(this).parent().children(".cancel").delegate("","click",function(){
				$(this).parent().prev().css({
					height : "33px",
					overflow : "hidden"
				});
				$(this).css("display","none");
				$(this).parent().children(".more").css("display","block");
				$(this).parent().children(".selectMore").css("display","block");
				$(this).parent().children(".confirm").css("display","none");
				$(this).parent().siblings().find(".checkBox").css("visibility","hidden");
				$(this).parent().parent().find(".brand").children("a").attr('href',url);

			});
		});
	});

	//排列方式
	$(".option").each(function(){
		$(this).delegate("","click",function(){
			$(this).addClass("optionActive");
			$(".option").not(this).removeClass("optionActive");
		});
	});
});

//点击移除选择了的筛选条件
function deleteSelectedCondition(obj){
	$(obj).remove();
	if($(".selectedCondition").length <= 0){
		$(".showCondition").css({
			display : "none"
		});
	}
}