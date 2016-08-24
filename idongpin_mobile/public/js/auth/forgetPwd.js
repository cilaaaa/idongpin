$(document).ready(function(){
	var getCodeBtn = $(".get_code_btn");
	sendVerificateCode(getCodeBtn);

	var back = $(".back");
	goBack(back);
});

//表单验证
function formVerification(){
	var reg_account = /^1[3|4|5|7|8]\d{9}$/;
	var reg_pwd = /^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){5,17}$/;

	var account = $(".user_input").val();
	var pwd = $(".pwd_input").val();
	var pwd_again = $(".pwd_again_input").val();
	if(account != "" && pwd !="" && pwd_again != ""){
		var account_flag;
		var pwd_flag;
		var pwd_again_flag;
		reg_account.test($.trim(account))? account_flag = true : account_flag = false;
		reg_pwd.test($.trim(pwd))? pwd_flag = true : pwd_flag = false;
		reg_pwd.test($.trim(pwd_again))? pwd_again_flag = true : pwd_again_flag = false;
		if( account_flag && pwd_flag ){
			if(pwd == pwd_again){
				return true;
			}else{
				alert("两次密码不一样");
			}
		}else{
			alert("用户名或密码错误");
			return false;
		}
	}else{
		alert("用户名或密码不能为空");
		return false;
	}
}
function isRightPhone(obj) {
	var phone_number=/^1[3|4|5|7|8]\d{9}$/;
	return phone_number.test(obj);
}

//发送验证码
function sendVerificateCode(obj){
	var getCodeBtn = $(".get_code_btn");
	var originalText = getCodeBtn.text();
	var isFirstClick = true;
	var timestamp;
	var i = 60;
	$(obj).on("click",function(){
		if(isFirstClick  && isRightPhone($(".user_input").val())){
			isFirstClick = false;
			$.ajax({
				url: host+'/getResetCode',
				type: 'post',
				cache: 'false',
				dataType: 'json',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: {
					user_phone: $('.user_input').val(),
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
		}else if(isFirstClick && !isRightPhone($(".user_input").val())) {
			alert("请输入正确的手机号码！")
		}
	});
}

function goBack(obj){
	$(obj).on("click",function(){
		history.back(-1);
	});
}

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