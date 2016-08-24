/**
 * 正则判断手机号的合法性
 */
function IsPhone(string){
	var reg=/^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$/;
	if(reg.test(string)){
		return true;
	}
	return false;
}
/**
 * 判断密码的合法性
 * @param  string [检验字符串]
 * @return boolean
 */
function IsValidPassword(string){
	reg=/^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){5,17}$/;
	if(reg.test(string)){
		return true;
	}
	return false;
}
/**
 * 判断验证码
 */
function getCode(obj){
	if($(obj).val().length < 6){
		if($(obj).parent().parent().find("img").length==0){
			$(obj).parent().parent().find("span").before("<img class='tag' src='../../images/auth/error.png'>");
			$(obj).addClass("has_error");
			$("#message").parent().parent().find("span").text("验证码位数错误！");
		}else{
			$(obj).parent().parent().find("img").attr("src","../images/auth/error.png");
			$(obj).addClass("has_error");
			$("#message").parent().parent().find("span").text("验证码位数错误！");
		}
	}else{
		if($(obj).parent().parent().find("img").length==0){
			$(obj).parent().parent().find("span").before("<img class='tag' src='../../images/auth/right.png'>");
			$(obj).removeClass("has_error");
			$(obj).parent().parent().find("span").text("");
		}
		else{
			$(obj).parent().parent().find("img").attr("src","../images/auth/right.png");
			$(obj).removeClass("has_error");
			$(obj).parent().parent().find("span").text("");
		}
	}
}
/**
 * 判断输入手机号正误
 */
function isPhoneRight(obj){
	if(IsPhone($(obj).val())){
		if($(obj).parent().parent().find("img").length==0){
			$(obj).parent().parent().find("span").before("<img class='tag' src='../../images/auth/right.png'>");
			$(obj).removeClass("has_error");
			$(obj).parent().parent().find("span").text("");
		}else{
			$(obj).parent().parent().find("img").attr("src","../images/auth/right.png");
			$(obj).removeClass("has_error");
			$(obj).parent().parent().find("span").text("");
		}

	}else{
		if($(obj).parent().parent().find("img").length==0){
			$(obj).parent().parent().find("span").before("<img class='tag' src='../../images/auth/error.png'>");
			if(!$(obj).hasClass("has_error")){
				$(obj).addClass("has_error");
			}
			$("#telphone").parent().parent().find("span").text("手机号不合法！");
		}
		else{
			$(obj).parent().parent().find("img").attr("src","../images/auth/error.png");

			if(!$(obj).hasClass("has_error")){
				$(obj).addClass("has_error");
			}
			$("#telphone").parent().parent().find("span").text("手机号不合法！");
		}
	}
}
/**
 * 判断设置密码的正误
 */
function IsPasswordRight(obj){
	if(IsValidPassword($(obj).val())){
		if($(obj).parent().parent().find("img").length==0){
			$(obj).parent().parent().find("span").before("<img class='tag' src='../../images/auth/right.png'>");
			$(obj).removeClass("has_error");
			$(obj).parent().parent().find("span").text("");
		}else{
			$(obj).parent().parent().find("img").attr("src","../images/auth/right.png");
			$(obj).removeClass("has_error");
			$(obj).parent().parent().find("span").text("");
		}
	}else{
		if($(obj).parent().parent().find("img").length==0){
			$(obj).parent().parent().find("span").before("<img class='tag' src='../../images/auth/error.png'>");
			if(!$(obj).hasClass("has_error")){
				$(obj).addClass("has_error");
			}
			$(obj).parent().parent().find("span").text("密码设置不合法！");

		}
		else{
			$(obj).parent().parent().find("img").attr("src","../images/auth/error.png");
			if(!$(obj).hasClass("has_error")){
				$(obj).addClass("has_error");
			}
			$(obj).parent().parent().find("span").text("密码设置不合法！");
		}
	}
	if($("#comfirm_password").val()!=""){
		if($(obj).val() != $("#comfirm_password").val()){
			$("#comfirm_password").addClass("has_error");
			$("#comfirm_password").parent().parent().find("span").text("两次输入密码不相同！");
		}else{
			$("#comfirm_password").removeClass("has_error");
			$("#comfirm_password").parent().parent().find("span").text("");
			$("#comfirm_password").parent().parent().find("img").attr("src","../../images/auth/right.png");
		}
	}
}
/**
 * 判断确认密码的正误
 * */
function IsComfirmPasswordRight(obj){
	if($(obj).val() == ""){
			if($(obj).parent().parent().find("img").length==0) {
				$(obj).parent().parent().find("span").before("<img class='tag' src='../../images/auth/error.png'>");
				$(obj).addClass("has_error");
				$(obj).parent().parent().find("span").text("请再次输入您的密码！");
			}else{
				$(obj).parent().parent().find("img").attr("src","../images/auth/error.png");
				$(obj).addClass("has_error");
				$(obj).parent().parent().find("span").text("请再次输入您的密码！");
			}
	}else{
		if($(obj).val()!=$("#password").val()) {
			if ($(obj).parent().parent().find("img").length == 0) {
				$(obj).parent().parent().find("span").before("<img class='tag' src='../../images/auth/error.png'>");
				if (!$(obj).hasClass("has_error")) {
					$(obj).addClass("has_error");
				}
				$(obj).parent().parent().find("span").text("两次输入密码不相同！");
			}else{
				$(obj).parent().parent().find("img").attr("src","../images/auth/error.png");
				$(obj).addClass("has_error");
				$(obj).parent().parent().find("span").text("两次输入密码不相同！");
			}
		}else{
			if($(obj).parent().parent().find("img").length==0){
				$(obj).parent().parent().find("span").before("<img class='tag' src='../../images/auth/right.png'>");
				$(obj).removeClass("has_error");
				$(obj).parent().parent().find("span").text("");
			}else{
				$(obj).parent().parent().find("img").attr("src","../images/auth/right.png");
				$(obj).removeClass("has_error");
				$(obj).parent().parent().find("span").text("");
			}
		}
	}
}
/**
 * 获取验证码倒计时效果
 */
var secound = 60;
var x = "";
function timer() {
	if (secound > 0) {
		$(".getCode").unbind();
		$(".getCode").css("background-color","#a1a1a1");
		secound = secound - 1;
		$(".getCode").text("剩余：" + secound + "s");
	} else {
		secound = 60;
		$(".getCode").bind('click',function(){
			x = setInterval("aa()", "1000");
		});
		// $(".getCode").attr("disabled", false);
		$(".getCode").text("获取验证码");
		$(".getCode").css("background-color", "#ff6c00");
		clearInterval(x);
	}
}
/**
 * 执行倒计时
 */
$(".getCode").click(function(){
	if(IsPhone($("#telphone").val())){
		$.ajax({
			type:'POST',
			url:'/getResetCode',
			data:{phone:$("#telphone").val()},
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			dataType:'json',
			success:function(result){
				if(result.status==200){
					x = setInterval("timer()", "1000");
				}
			},
			error:function (result) {
				if ($("#telphone").parent().parent().find("img").length==0){
					$("#telphone").parent().parent().find("span").before("<img class='tag' src='../../images/auth/error.png'>");
				}else{
					$("#telphone").parent().parent().find("img").attr('src','../../images/auth/error.png');
				}
				if(!$("#telphone").hasClass("has_error")){
					$("#telphone").addClass("has_error");
				}
				$("#telphone").parent().parent().find("span").text(result.responseJSON.msg);
			}
		});
	}else{
		if ($("#telphone").parent().parent().find("img").length==0){
			$("#telphone").parent().parent().find("span").before("<img class='tag' src='../../images/auth/error.png'>");
		}else{
			$("#telphone").parent().parent().find("img").attr('src','../../images/auth/error.png');
		}
		if(!$("#telphone").hasClass("has_error")){
			$("#telphone").addClass("has_error");
		}
		$("#telphone").parent().parent().find("span").text("手机号不合法！");
	}

});

/**
 * 检验提交数据
 * */
function checkTelphone(){
	if($("#telphone").val() == ""){
		if($("#telphone").parent().parent().find("img").length == 0){
			$("#telphone").parent().parent().find("span").before("<img class='tag' src='../../images/auth/error.png'>");
		}
		$("#telphone").parent().parent().find("span").text("手机号不能为空！");
		$("#telphone").addClass("has_error");
	}else if(!IsPhone($("#telphone").val())){
		$("#telphone").parent().parent().find("span").text("手机号不合法！");
		$("#telphone").addClass("has_error");
	}else{
		$("#telphone").removeClass("has_error");
		return true;
	}
}
function checkCode(){
	if($("#message").val()==""){
		if($("#message").parent().parent().find("img").length == 0){
			$("#message").parent().parent().find("span").before("<img class='tag' src='../../images/auth/error.png'>");
		}
		$("#message").parent().parent().find("span").text("验证码不能为空！");
		$("#message").addClass("has_error");
		return false;
	}else if($("#message").val().length < 4){
		if($("#message").parent().parent().find("img").length == 0){
			$("#message").parent().parent().find("span").before("<img class='tag' src='../../images/auth/error.png'>");
		}
		$("#message").parent().parent().find("span").text("验证码位数错误！");
		$("#message").addClass("has_error");
		return false;
	}
	else{
		$("#message").removeClass("has_error");
		return true;
	}
}
function cheakpassword(){
	if($("#password").val() == ""){
		if($("#password").parent().parent().find("img").length == 0){
			$("#password").parent().parent().find("span").before("<img class='tag' src='../../images/auth/error.png'>");
		}
		$("#password").parent().parent().find("span").text("密码不能为空！");
		$("#password").addClass("has_error");
		return false;
	}else if(!IsValidPassword($("#password").val())){
		$("#password").parent().parent().find("span").text("密码设置不合法！");
		$("#password").addClass("has_error");
		return false;
	}else{
		$("#password").removeClass("has_error");
		return true;
	}
}
function cheakComfirm_password(){
	if($("#comfirm_password").val() == ""){
		if($("#comfirm_password").parent().parent().find("img").length == 0){
			$("#comfirm_password").parent().parent().find("span").before("<img class='tag' src='../../images/auth/error.png'>");
		}
		$("#comfirm_password").parent().parent().find("span").text("请再次输入您的密码！");
		$("#comfirm_password").addClass("has_error");
		return false;
	}else if($("#comfirm_password").val() !== $("#password").val()){
		if($("#comfirm_password").parent().parent().find("img").length == 0){
			$("#comfirm_password").parent().parent().find("span").before("<img class='tag' src='../../images/auth/error.png'>");
		}else{
			$("#comfirm_password").parent().parent().find("img").attr("src","../images/auth/error.png");
		}
		$("#comfirm_password").parent().parent().find("span").text("两次输入密码不相同！");
		$("#comfirm_password").addClass("has_error");
		return false;
	}else{
		$("#comfirm_password").removeClass("has_error");
		return true;
	}
}

$(".input").keyup(function(){
	if(checkTelphone()&&checkCode()&&cheakpassword()&&cheakComfirm_password()){
		$("#submit").removeClass("btn_disabled");
		$("#submit").attr("disabled",false);
	}else{
		$("#submit").addClass("btn_disabled");
		$("#submit").attr("disabled",true);
	}
});
function sendPost(){
	if(checkTelphone()&&checkCode()&&cheakpassword()&&cheakComfirm_password()){
		return true;
	}else{
		$("#submit").addClass("btn_disabled");
		$("#submit").attr("disabled",true);
		return false;
	}
}