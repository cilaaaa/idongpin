//手机号、密码验证
function  PwdNumConfirm(){
	var reg_pwd = /^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){5,17}$/;
	var phone_number=/^1[3|4|5|7|8]\d{9}$/;
	
	var writed_number=$(".number_input").val();
	var pwd = $(".pwd_input").val();
	var pwd_again = $(".pwd_confirm_input").val();
	if(pwd != "" && pwd_again !="" && writed_number != ""){
		
		var pwd_flag;
		var pwd_again_flag;
		var number_flag;
		
		phone_number.test($.trim(writed_number))? number_flag = true : number_flag = false;
		reg_pwd.test($.trim(pwd))? pwd_flag = true : account_flag = false;
		
		if (number_flag) {
			
			if(pwd_flag){
				
				if(pwd == pwd_again){
					return true;
				}else{
					alert("两次输入密码不一致，请重新输入");
					return false;
				}
			}else{
				alert("密码格式不正确请重新输入 密码应6-18位,以字母开头，可包含_和.");
				return false;
			}
		} else{
			alert("请输入正确的手机号");
			return false;
		}
				
	}else{
		alert("手机号或密码不能为空");
		return false;
	}
}

function isRightPhone(obj) {
	var phone_number=/^1[3|4|5|7|8]\d{9}$/;
	return phone_number.test(obj);
}
//发送验证码
function sendVerificateCode(obj){
	var getCodeBtn = $(".get_code");
	var originalText = getCodeBtn.text();
	var isFirstClick = true;
	var timestamp;
	var i = 60;
	$(obj).on("click",function(){
		if(isFirstClick && isRightPhone($(".number_input").val())){
			isFirstClick = false;
			$.ajax({
				url: host+'/getRegisterCode',
				type: 'post',
				cache: 'false',
				dataType: 'json',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: {
					user_phone: $('.number_input').val(),
				},
				success:function(result){
					if(result.status==200){
						timestamp = setInterval(function(){
							i--;
							if(i <= 0){
								clearInterval(timestamp);
								getCodeBtn.text(originalText);
								isFirstClick = true;
								i = 60;
							}else{
								getCodeBtn.text("请"+ i + "s后再发送");
							}
						},1000);
					}
				},
				error:function (result) {
					isFirstClick = true;
					alert(result.responseJSON.msg);
				}
			});
		}else if(isFirstClick && !isRightPhone($(".number_input").val())){
			alert("请输入正确的手机号码！")
		}
	});
}
$(document).ready(function(){
	var getCodeBtn = $(".get_code");
	sendVerificateCode(getCodeBtn);
});



function lookPwd(obj){
	var show = $(this).attr("data-show");
	if(show == "show"){
		$(".pwd_input").attr("type","password");
		$(this).attr("data-show","hidden");
	}else{
		$(".pwd_input").attr("type","text");
		$(this).attr("data-show","show");
	}
}




