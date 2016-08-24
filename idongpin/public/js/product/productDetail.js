
$(document).ready(function(){

	//鼠标移入小图，小图在大图出显示
	$(".moreImg img").each(function(){
		$(this).delegate("","mouseenter",function(){
			var imgUrl = $(this).attr("src"); 
			$(".bigImg img").attr("src",imgUrl);
		});
	});

	$(".aboutGoods div").each(function(){
		$(this).delegate("","click",function(){
			$(this).addClass("activeInfo");
			$(".aboutGoods div").not(this).removeClass("activeInfo");
			var flag = $(this).attr("data-flag");
			$(".block").each(function(){
				var f = $(this).attr("data-flag");
				if(flag == f){
					$(this).css({
						display : "block"
					});
				}else{
					$(this).css({
						display : "none"
					});
				}
			});
		});
	});
});