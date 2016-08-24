/**
 * 本文件是首页的样式表
 * @author chenqin
 * @date 2016/6/28
 */
$(document).ready(function(){
	InitStarPro();
	// Carousel_star_pro("start");
	//点击分类，样式发生改变
	// $(".option").delegate("","click",function(){
	// 	clearInterval(Interval);
	// 	optionChangeStyle($(this));
	// 	var type_id = $(this).attr("data-type");
	// 	index = type_id;
	// 	$("#goodsMode"+type_id).addClass("modeActive");
	// 	$(".goodsMode").not($("#goodsMode"+type_id)).removeClass("modeActive");
	// });
	specialOffer();
});
function InitStarPro(){
	$("#goodsMode7").addClass("modeActive");
	// $(".option").each(function(){
	// 	if($(this).attr("data-type") == $("#goodsMode7").attr("data-type")){
	// 		optionChangeStyle($(this));
	// 	}
	// });
}
/**
 * 此方法是优质产商轮播
 * @param  类型为整型，是需要轮播的产商的数量除以8向上取整
 * @return null
 */
// function showBusiness(size){
// 	var i = 1;
// 	var time = setInterval(function(){
// 		i++;
// 		$(".showBusiness div").not("#show_"+i).css("display","none");
// 		$("#show_"+i).css("display","block");
// 		if(i>=size){
// 			i = 0;
// 		}
// 	},5000);
// }
function optionChangeStyle(obj){
	$(obj).addClass("optionActive");
	$(".option").not(obj).removeClass("optionActive");
	var width = $(obj).css("width").split("px")[0];
	var imgWidth = $(obj).children(".choiceIcon").children("img").css("width").split("px")[0];
	var left = ((width - imgWidth)/2)+"px";
	$(obj).children(".choiceIcon").children("img").css({
		display : "block",
		marginLeft : left
	});
	$(".option").not(obj).children(".choiceIcon").children("img").css({
		display : "none"
	});
	var url=host+"/search?searchType=product&page=1&protype=";
	$(obj).parent().parent().children("a").attr("href",url+$(obj).attr("data-type"));
}
/**
 * 参数传入stop表示停止轮播
 * 参数传入star表示开始轮播
 * */
// var index=7;
// var Interval;
// function Carousel_star_pro(flag){
// 	if(flag =="start"){
// 		Interval=setInterval(function(){
// 			$("#goodsMode"+index).addClass("modeActive");
// 			$(".goodsMode").not("#goodsMode"+index).removeClass("modeActive");
// 			$(".option").each(function(){
// 				if($(this).attr("data-type") == index){
// 					optionChangeStyle($(this));
// 				}
// 			});
// 			index++;
// 			if(index > 13){
// 				index = 7;
// 			}
// 		},5000);
// 	}else{
// 		clearInterval(Interval);
// 	}
// }
// $(".content").mouseenter(function(){
// 	Carousel_star_pro("stop");
// });
// $(".content").mouseleave(function(){
// 	Carousel_star_pro("start");
// });

//特卖商品轮播
function specialOffer(){
	var i = 1;
	var interval;
	var lunbo = function saleLunBo(){
		var marginLeft = parseInt($(".saleBanner").css("marginLeft"));
		if(marginLeft > -2940){
			marginLeft = marginLeft - 980;
			$(".saleBanner").animate({
				marginLeft : marginLeft + "px"
			},500);
			i++;
			$(".saleDot[data-flag='specialSell_"+i+"']").addClass("saleDotActive");
			$(".saleDot").not($(".saleDot[data-flag='specialSell_"+i+"']")).removeClass("saleDotActive");
		}else{
			$(".saleBanner").animate({
				marginLeft : "0px"
			},500);
			i = 1;
			$(".saleDot[data-flag='specialSell_"+i+"']").addClass("saleDotActive");
			$(".saleDot").not($(".saleDot[data-flag='specialSell_"+i+"']")).removeClass("saleDotActive");
		}
	}
	interval = setInterval(lunbo,3000);

	// $(".saleDot").hover(function(){
	// 	$(this).addClass("saleDotActive");
	// 	$(".saleDot").not(this).removeClass("saleDotActive");
	// 	var dot = $(this).attr("data-flag");
	// 	var left = parseInt($(".specialSell[data-flag='"+dot+"']").css("marginLeft"));
	// 	$(".saleBanner").animate({
	// 			marginLeft : left + "px"
	// 	},500);
	// });	
	
	$(".saleDot").delegate("","mouseenter",function(){
		clearInterval(interval);
		$(this).addClass("saleDotActive");
		$(".saleDot").not(this).removeClass("saleDotActive");
		var dot = parseInt($(this).attr("data-flag").split("_")[1]);
		i = dot;
		var left = -((dot - 1) * 980);
		$(".saleBanner").animate({
			marginLeft : left + "px"
		},500);
	});
	$(".saleDot").delegate("","mouseleave",function(){
		interval = setInterval(lunbo,3000);
	});

	$(".saleBanner").delegate("","mouseenter",function(){
		clearInterval(interval);
	});
	$(".saleBanner").delegate("","mouseleave",function(){
		interval = setInterval(lunbo,3000);
	});
}