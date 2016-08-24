@extends('layouts.app')
@section('title')忘记密码@stop
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('css/public/common.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/auth/forgetPwd.css')}}">
@stop
@section('content')
    <header class="header">
        <span class="back">返回</span>
        <span class="page_ttl">忘记密码</span>
    </header>
    <div class="content">
        <form action="#" onsubmit="return formVerification()">
            <ul>
                <li class="phone_number">
                    <label class="user_icon">&#xe601;</label>
                    <input class="user_input" type="text" placeholder="请输入手机号">
                    <div class="clear"></div>
                </li>
                <li class="verification_code">
                    <label class="code_icon">&#xe647;</label>
                    <input class="code_input" type="text" placeholder="验证码" maxlength="6">
                    <div class="get_code_btn">获取验证码</div>
                    <div class="clear"></div>
                </li>
                <li class="pwd">
                    <label class="pwd_icon">&#xe645;</label>
                    <input class="pwd_input" type="password" placeholder="密码">
                    <div class="clear"></div>
                </li>
                <li class="pwd_again">
                    <label class="pwd_again_icon">&#xe645;</label>
                    <input class="pwd_again_input" type="password" placeholder="确认密码">
                    <div class="clear"></div>
                </li>
            </ul>
            <input type="submit" class="confirm" value="确认">
        </form>
    </div>
@stop
@section('js')
    <script type="text/javascript" src="{{url('js/auth/forgetPwd.js')}}"></script>
@stop