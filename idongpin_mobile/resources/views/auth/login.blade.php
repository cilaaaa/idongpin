@extends('layouts.app')
@section('title')登录@stop
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('css/public/common.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/auth/login.css')}}">
@stop
@section('content')
<div class="content">
    <div class="go_register">
        <a href="{{url('/register')}}">
            <span>注册</span>
        </a>
    </div>
    <div class="company_logo">
        <img src="{{url('images/auth/idongpinLogo.png')}}">
    </div>
    <form class="form_control" action="{{url('login')}}" method="post" onsubmit="return accountAndPwdVerification();" >
        {{ csrf_field() }}
        <div class="user_name">
            <label class="user_icon">手机号</label>
            <input class="user_input" type="text" placeholder="请输入手机号" name="user_phone" value="{{ old('user_phone') }}">
            <span class="clear"></span>
        </div>
        <div class="user_pwd">
            <label class="pwd_icon">密码</label>
            <input class="pwd_input" type="password" placeholder="请输入密码" name="password">
            <span class="showPwd" onclick="lookPwd(this)" data-show="hidden">
                <img src="{{url('images/auth/showPwd.png')}}">
            </span>
            <span class="clear"></span>
        </div>
        <div class="forget_pwd"><a href="{{url('/password/reset')}}">忘记密码</a></div>
        <div class="login">
            <input class="login_btn" type="submit" value="登录">
        </div>
    </form>
</div>
@stop
@section('js')
    <script type="text/javascript" src="{{url('js/auth/login.js')}}"></script>
    @if($errors->has('user_phone'))
        <script type="text/javascript">
            alert('{{ $errors->first('user_phone') }}');
        </script>
    @endif
@stop