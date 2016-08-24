
$(document).ready(function(){
	var windowHeight = $(window).height();
	var loginInfoHeight = $(".loginInfo").height();
	var searchToolHeight = $(".searchTool").height();
	// var minHeight = windowHeight - loginInfoHeight -searchToolHeight - 183;
    //
	// $(".afterThreeMonth").css("minHeight",minHeight);
	// $(".beforeThreeMonth").css("minHeight",minHeight);

	//切换订单日期
	$(".selectDate").each(function(){
		$(this).click(function(){
			$(this).addClass("selectDateActive");
			var txt = $(this).text();
			$(".selectDate").not(this).removeClass("selectDateActive");
			if(txt == "近三个月订单"){
				$(".afterThreeMonth").css("display","block");
				$(".beforeThreeMonth").css("display","none");
			}else if(txt == "三个月前订单"){
				$(".afterThreeMonth").css("display","none");
				$(".beforeThreeMonth").css("display","block");
			}
		});
	});
	
	//
	$(".tradeMenu li").each(function(){
		var liTxt = $(this).children("a").text();
		if(liTxt == "我的订单"){
			$(this).children("a").css("color","#ff6c00");
		}
	});

	//状态筛选
	$(".status").each(function(){
		$(this).delegate("","click",function(){
			$(this).addClass("statusActive");
			$(".status").not(this).removeClass("statusActive");
		});
	});

	$(".orderInfoTtl img").delegate("","click",function(){
		$(".orderMode").css("display","none");
	})
});

function cancelOrder(obj){
	if(confirm("您确定取消此次订单吗?")) {
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
	if(confirm("您确定此次订单吗?")){
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
				window.location.href='http://www.idongpin.com.cn/company/contact?companyid='+data.responseJSON.companyid;
			}
		});
	}
}

function finishOrder(obj){
	if(confirm("您确定完成此次订单?")){
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
								$('.product_name').attr('onclick','window.location.href=\''+data[da]['pro_url']+'\'');
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