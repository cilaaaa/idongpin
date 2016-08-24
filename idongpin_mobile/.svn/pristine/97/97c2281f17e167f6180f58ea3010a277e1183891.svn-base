
$(document).ready(function(){
	counter();
});

function counter(){
	
	$(".subtract").on("click",function(){
		var count = parseInt($(".count").text());
		if(count > 1){
			count = count - 1;
			$(".count").text(count);
			if(count <= 1){
				$(this).css("color","#999999");
			}
		}
	});

	$(".add").on("click",function(){
		var count = parseInt($(".count").text());
		count = count + 1;
		$(".count").text(count);
		if(count > 1){
			$(".subtract").css("color","#4d4d4d");
		}
	});
}