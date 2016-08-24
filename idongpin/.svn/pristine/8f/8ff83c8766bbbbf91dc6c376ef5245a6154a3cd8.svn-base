
$(document).ready(function(){
	var height = $(window).height();
	var top = (height-508)/2;
	$(".bookkeepingInfo").css({
		height : height+"px",
		paddingTop : top+"px"
	});

	$("#bookkeeping").delegate("","click",function(){
		$(".bookkeepingInfo").css({
			display : "block"
		});
	});

	$(".bookkeepingInfo").delegate("","click",function(){
		$(this).css("display","none");
	});

	//点击证书大图查看证书
	$(".certificate").each(function(){
		$(this).delegate("","click",function(){
			lookCertificates(this);
		});
	});
});

//证书查看
function lookCertificates(obj){
	var count = $(".allCertificates").children(".certificate").length;
	var windowHeight = $(window).height();
	var url = window.location.href;
	var src = $(obj).children("img").attr("src");
	//创建模块
	var certificateDiv = "<div class='lookCertificateMode'></div>";
	$("body").append(certificateDiv);
	$(".lookCertificateMode").append("<div class='certificateContent'></div>");
	$(".lookCertificateMode").append("<img class='close' src='../../images/product/close.png'>");
	$(".certificateContent").append("<div class='pre'></div>");
	$(".certificateContent").append("<div class='certificatePic'></div>");
	$(".certificatePic").append("<div class='imgBoxes'></div>");
	$(".certificate").each(function(index){
		var url = $(this).children("img").attr("src");
		$(".imgBoxes").append("<div class='certificateImg'><img src='"+url+"'></div>");
		if(url == src){
			$(".imgBoxes").css("marginLeft",-(index  * 960) + "px");
		}
	});

	$(".certificateContent").append("<div class='next'></div>");

	//给创建的模块添加css
	$(".lookCertificateMode").css({
		width : "100%",
		height : windowHeight + "px",
		position : "fixed",
		top : "0px",
		left : "0px",
		background : "#ffffff"
	});
	$(".certificateContent").css({
		position : "relative",
		width : "980px",
		margin : "0  auto",
		height : (windowHeight) + "px",
	});
	$(".close").css({
		position : "absolute",
		width : "20px",
		height : "20px",
		top : "10px",
		right : "10px"
	});
	$(".pre").css({
		width : "50px",
		height : "50px",
		position : "absolute",
		top : (windowHeight -50) /2 +"px",
		left : "0px",
		background : "url('../../images/product/preBtn.png')",
		backgroundPosition : "0px 52px",
		borderRadius : "25px",
		webkitBorderRadius : "25px",
		mozBorderRadius : "25px",
		msBorderRadius : "25px",
		oBorderRadius : "25px",
		overflow : "hidden"
	});
	$(".pre img").css({
		width : "50px",
		height : "50px"
	});
	$(".certificatePic").css({
		width : "960px",
		height : "495px",
		margin : "0 auto",
		marginTop : (windowHeight -495) /2 +"px",
		overflow : "hidden"
	});
	$(".next").css({
		width : "50px",
		height : "50px",
		position : "absolute",
		top : (windowHeight -50) /2 +"px",
		right : "0px",
		background : "url('../../images/product/preBtn.png')",
		backgroundPosition : "52px 0px",
		borderRadius : "25px",
		webkitBorderRadius : "25px",
		mozBorderRadius : "25px",
		msBorderRadius : "25px",
		oBorderRadius : "25px",
		overflow : "hidden"
	});
	$(".next img").css({
		width : "50px",
		height : "50px"
	});
	$(".imgBoxes").css({
		width : (count * 960) + "px",
		height : "495px",
		marginleft : "0px"
	});
	$(".certificateImg").css({
		width : "960px",
		height : "495px",
		display : "inline-block",
		textAlign : "center"
	});
	$(".certificateImg img").height("495px");
	//查看上一张/下一张
	var marginLeft;
	$(".pre").delegate("","click",function(){
		marginLeft = parseInt($(".imgBoxes").css("marginLeft"));
		if(marginLeft < 0){
			marginLeft = marginLeft + 960;
			$(".imgBoxes").animate({
				marginLeft : marginLeft + "px"
			},100);
			if(marginLeft > -960){
				$(this).css({
					backgroundPosition : "0px 52px"
				});
			}
			if(marginLeft > (-(960 * (count - 1)))){
				$(".next").css({
					backgroundPosition : "52px 0px"
				});
			}
		}
	});
	$(".next").delegate("","click",function(){
		marginLeft = parseInt($(".imgBoxes").css("marginLeft"));
		if(marginLeft > (-(960 * (count - 1)))){
			marginLeft = marginLeft - 960;
			$(".imgBoxes").animate({
				marginLeft : marginLeft + "px"
			},100);
			if(marginLeft <= -960){
				$(".pre").css({
					backgroundPosition : "0px 0px"
				});
			}
			if(marginLeft <= (-(960 * (count - 1)))){
				$(this).css({
					backgroundPosition : "52px 52px"
				});
			}
		}
	});
	$(".close").delegate("","click",function(){
		$(".lookCertificateMode").remove();
	});
}