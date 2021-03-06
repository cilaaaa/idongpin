@extends('layouts.app')
@section('title')重置@stop
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('css/public/common.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/auth/forgetPwd.css')}}">
@stop
@section('content')
<header class="header">
    <div class="">
        <span class="back">&#xe612;</span>
        <span class="page_ttl">忘记密码</span>
    </div>
</header>
<div class="content">
    <form action="{{url('password/reset')}}" method="post" onsubmit="return formVerification()">
        {{ csrf_field() }}
        <ul>
            <li class="phone_number">
                <label class="user_icon">手机号</label>
                <input class="user_input" type="text" placeholder="请输入手机号" name="user_phone" value="{{ old('user_phone') }}">
                <div class="clear"></div>
            </li>
            <li class="verification_code">
                <label class="code_icon">验证码</label>
                <input class="code_input" type="text" placeholder="验证码" maxlength="6" name="code">
                <div class="get_code_btn">获取验证码</div>
                <div class="clear"></div>
            </li>
            <li class="pwd">
                <label class="pwd_icon">密码</label>
                <input class="pwd_input" type="password" placeholder="密码" name="password">
                <span class="showPwd" onclick="lookPwd(this)" data-show="hidden">
                    <img src="{{url('images/auth/showPwd.png')}}">
                </span>
                <div class="clear"></div>
            </li>
            <li class="pwd_again">
                <label class="pwd_again_icon">确认密码</label>
                <input class="pwd_again_input" type="password" placeholder="确认密码" name="password_confirmation">
                <div class="clear"></div>
            </li>
        </ul>
        <input type="submit" class="confirm" value="确认">
    </form>
</div>
@stop
@section('js')
<script type="text/javascript" src="{{url('js/auth/forgetPwd.js')}}"></script>
@if($errors->has('code'))
    <script type="text/javascript">
        alert('{{ $errors->first('code') }}');
    </script>
@elseif($errors->has('user_phone'))
    <script type="text/javascript">
        alert('{{ $errors->first('user_phone') }}');
    </script>
@endif
@stop