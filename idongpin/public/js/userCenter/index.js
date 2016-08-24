
$(document).ready(function(){
	var windowHeight = $(window).height();
	var loginInfoHeight = $(".loginInfo").height();
	var searchToolHeight = $(".searchTool").height();
	var minHeight = windowHeight - loginInfoHeight -searchToolHeight - 103;

	$(".orderInfo").css("minHeight",minHeight);
	$(".modifiedMode .orderInfoTtl img").delegate("","click",function(){
		$(".modifiedMode ul li input,textarea").val("");
		$(".modifiedMode .has-error .help-block").remove();
		$(".modifiedMode .has-error").removeClass("has-error");
		$(".modifiedMode").css("display","none");
	});
	$(".modifiedMode .btn .protocol span").delegate("","click",function(){
		$(".agreementMode").css("display","block");
	});
	$(".agreementMode .agreementTtl img").delegate("","click",function(){
		$(".agreementMode").css("display","none");
	});
	$(".orderMode .orderInfoTtl img").delegate("","click",function(){
		$(".orderMode").css("display","none");
	});
	$(".modifiedMode .checkbox").each(function(){
		$(this).delegate("","click",function(){
			var check = $(this).attr("data-check");
			var src = $(this).attr("src");
			if(check == "unselected"){
				var src = src.replace("unchecked.png","checked.png");
				$(this).attr("data-check","selected");
				$(this).attr("src",src);
			}else{
				var src = src.replace("checked.png","unchecked.png");
				$(this).attr("data-check","unselected");
				$(this).attr("src",src);
			}
		});
	});


});

function releaseOrder(){
	$(".modifiedMode").css("display","block");
	// $(".orderMode").css("display","block");
}
function getOrder(obj){
		$.ajax({
			url: host+'/user/getOrder',
			type: 'get',
			cache: 'false',
			dataType: 'json',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: {
				orderid:$(obj).html(),
			},
			success: function (data) {
				for(var da in data){
					if(da == 'pro_info'){
						$('.product_item_img').hide();
						for(var prokey in data[da]){
							if(prokey == 'pro_img'){
								$('.product_item_img').attr('src',data[da][prokey]);
								$('.product_item_img').show();
								$('.product_name').attr('oncxlick','window.location.href=\''+data[da]['pro_url']+'\'');
							}else{
								$("."+prokey).html(data[da][prokey]);
							}
						}
					}else{
						$(".orderMode .info .topInfo").find("."+da).html(data[da]);
						if((da =="confirm_time"||da =="finish_time")&& data[da] ==null){
							$(".orderMode .info .topInfo").find("."+da).parent().hide();
						}else{
							$(".orderMode .info .topInfo").find("."+da).parent().show();
						}
					}
				}
				$(".orderMode").css("display","block");
			},
			error: function (data) {
				alert('网络或服务器错误，请检查网络连接！');
				console.log(data);
			}
		});
}
function cancelOrder(obj){
	if(confirm("您确定要取消此订单吗?")){
		$.ajax({
			url: host+'/user/order/update',
			type: 'post',
			cache: 'false',
			dataType: 'json',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: {
				orderid: $(obj).parent().attr('data-id'),
				do_method:'cancel',
			},
			success: function (data) {
				if (data.msg == 'success') {
					alert('已取消该笔订单');
					window.location.reload();
				}
			},
			error: function (data) {
				console.log(data);
			}
		});
	}
}

function confirmOrder(obj){
	$.ajax({
		url: host+'/user/order/update',
		type: 'post',
		cache: 'false',
		dataType: 'json',
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		data: {
			orderid: $(obj).parent().attr('data-id'),
			do_method:'confirm',
		},
		success: function (data) {
			if (data.msg == 'success') {
				window.location.reload();
			}
		},
		error: function (data) {
			alert(data.responseJSON.msg);
			window.location.href=host+'/company/contact?companyid='+data.responseJSON.companyid;
		}
	});
}

function finishOrder(obj){
	if(confirm('您确定要完成该条订单吗?')){
		$.ajax({
			url: host+'/user/order/update',
			type: 'post',
			cache: 'false',
			dataType: 'json',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: {
				orderid: $(obj).parent().attr('data-id'),
				do_method:'finish',
			},
			success: function (data) {
				if (data.msg == 'success') {
					window.location.reload();
				}
			},
			error: function (data) {
				console.log(data);
			}
		});
	}
}
