@extends('layouts.app')
@section('title')注册@stop
@section('css')
	<link rel="stylesheet" type="text/css" href="{{url('css/public/common.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('css/auth/register.css')}}">
@stop
@section('content')
<div class="registe_content">
	<div class="go_login">
		<a href="{{url('/login')}}">
			<span>登录</span>
		</a>
	</div>
	<div class="company_logo">
		<img src="{{url('images/auth/idongpinLogo.png')}}">
	</div>
	<form class="form_control" action="{{url('register')}}" onsubmit="return PwdNumConfirm()" method="post">
		{{ csrf_field() }}
		<div class="phone_number">
			<label class="user_icon">手机号</label>
			<input class="number_input" type="text" placeholder="请输入手机号" name="user_phone" value="{{ old('user_phone') }}">
			<span class="clear"></span>
		</div>

		<div class="user_pwd">
			<label class="pwd_icon">密码</label>
			<input class="pwd_input" type="password" placeholder="请输入密码" name="password">
			<span class="showPwd" onclick="lookPwd(this)" data-show="hidden">
			<img src="http://m.idongpin.com.cn/images/auth/showPwd.png">
		</span>
		<span class="clear"></span>
		</div>

		<div class="user_pwd_confirm">
			<label class="pwd_icon">确认密码</label>
			<input class="pwd_confirm_input" type="password" placeholder="请再次输入密码" name="password_confirmation">
			<span class="clear"></span>
		</div>

		<div class="salesperson">
			<label class="mysaler">我的销售员</label>
			<input class="mysaler_input" type="text" placeholder="请输入销售员工号">
		</div>

		<div class="verification_code">
			<label class="code_icon">验证码</label>
			<input class="code_input" type="text" placeholder="请输入验证码" maxlength="6" name="code">
		</div>

		<div class="get_code" >获取验证码</div>

		<div class="user_agreement">
				点击注册表示你已阅读并同意
				<a id="agreement" href=" ">i冻品用户协议</a>
		</div>

		<div class="register">
			<input class="register_btn" id="register_button" type="submit" value="注册">
		</div>

	</form>
</div>
@stop
@section('js')
	<script type="text/javascript" src="{{url('js/auth/register.js')}}"></script>
	@if($errors->has('code'))
		<script type="text/javascript">
			alert('{{ $errors->first('code') }}');
		</script>
	@endif
@stop
