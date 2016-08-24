$(document).ready(function(){
	var ul = $(".recommend_goods ul");
	setWidth(ul);
});

function setWidth(obj){
	var goodsWidth = $(obj).children(".goods").width();
	var length = $(obj).children(".goods").length;
	var fontSize = parseInt($("html").css("font-size"));
	$(obj).width((goodsWidth + ( fontSize*0.02 )) * length + "px");
}