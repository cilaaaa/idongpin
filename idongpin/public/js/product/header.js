$(document).ready(function(){
	//鼠标移动到商品图片上图片放大，商品出现边框
	$(".goodsMode .goodsImg img").each(function(){
		$(this).hover(function(){
			$(this).animate({
				width : "120%",
				height : "120%",
				marginTop : "-10px",
				marginLeft : "-10px"
			},500);
		},function(){
			$(this).animate({
				width : "100%",
				height : "100%",
				marginTop : "0px",
				marginLeft : "0px"
			},500);
		});
	});

	$(".menuItem").mouseenter(function(){
		var number = $(this).attr("data-type");
		$("#secondCarte").animate({
			left : "240px"
		},100,"linear");
		if(number ==1){
			$(".one").css("display","block");
			$(".two").css("display","none");
			$(".three").css("display","none");
			$(".four").css("display","none");
			$(".five").css("display","none");
			$(".six").css("display","none");
		}else if(number ==2){
			$(".one").css("display","none");
			$(".two").css("display","block");
			$(".three").css("display","none");
			$(".four").css("display","none");
			$(".five").css("display","none");
			$(".six").css("display","none");
		}else if(number ==3){
			$(".one").css("display","none");
			$(".two").css("display","none");
			$(".three").css("display","block");
			$(".four").css("display","none");
			$(".five").css("display","none");
			$(".six").css("display","none");
		}else if(number ==4){
			$(".one").css("display","none");
			$(".two").css("display","none");
			$(".three").css("display","none");
			$(".four").css("display","block");
			$(".five").css("display","none");
			$(".six").css("display","none");
		}else if(number ==5){
			$(".one").css("display","none");
			$(".two").css("display","none");
			$(".three").css("display","none");
			$(".four").css("display","none");
			$(".five").css("display","block");
			$(".six").css("display","none");
		}else if(number ==6){
			$(".one").css("display","block");
			$(".two").css("display","none");
			$(".three").css("display","none");
			$(".four").css("display","none");
			$(".five").css("display","none");
			$(".six").css("display","block");
		}
	});
	$("#carte").mouseleave(function(){
		$("#secondCarte").animate({
			left : "0px"
		},100,"linear");
	});

	//二级菜单隐藏显示
	$(" .navTtlP").click(function(){
		var flag = $("#carte").attr("data-flag");
		if(flag != "show"){
			$("#carte").slideDown();
			$("#carte").attr("data-flag","show");
		}else{
			$("#carte").slideUp();
			$("#carte").attr("data-flag","hidden");
		}

	});

	$("#carte .firstCarte .menuItem .bigClass").each(function () {
		$(this).click(function () {
			$(".searchTerms .productNavOne").css("display","block");
			$(".searchTerms .productNav").css("display","none");
			$(" .productNavOne .delete").empty();
			$(" .productNavOne .delete").append($("<div class='productNavItem'></div>").append("> "+$(this).text()));
		});
	});

	$("#carte .firstCarte .menuItem .smallClass span").each(function () {
		$(this).click(function () {
			var s=$(this).parent().parent().children(".bigClass").text();
			$(".searchTerms .productNavOne").css("display","block");
			$(".searchTerms .productNav").css("display","none");
			$(" .productNavOne .delete").empty();
			$(" .productNavOne .delete").append($("<div class='productNavItem'></div>").append("> "+s));
			$(" .productNavOne .delete").append($("<div class='productNavItem'></div>").append("> "+$(this).text()));
		});
	});

	//二级菜单 获取分类及分类详情字段
	var number ;
	$("#carte .firstCarte .menuItem").each(function () {
		$(this).mouseenter(function () {
			number=$(this).children(".bigClass").text();
		});
	});
	$("#secondCarte ul li a").each(function () {

		$(this).click(function () {
			$(".searchTerms .productNavOne").css("display","block");
			$(".searchTerms .productNav").css("display","none");
			$(" .productNavOne .delete").empty();
			$(" .productNavOne .delete").append($("<div class='productNavItem'></div>").append("> "+number));
			$(" .productNavOne .delete").append($("<div class='productNavItem'></div>").append("> "+$(this).text()));
		});
	});
	$(".navTtlP").hover(function(){
		$(this).children("img").attr("src","../../images/product/down_02.png");
	},function(){
		$(this).children("img").attr("src","../../images/product/down_01.png");
	});
});

$('.productListCla .proS').click(function(){
	$(this).addClass('productListActive');
	$('.productListCla .proS').not(this).removeClass('productListActive');

});