@extends("layouts.page_footer")
@section("css")
    <link rel="stylesheet" type="text/css" href="{{url('css/auth/findpassword.css')}}">
@endsection
@section("content")
{{--<header class='header'>--}}
    {{--<div class="container">--}}
        {{--<div class="img" onclick="window.location.href='{{url('/')}}'">--}}
            {{--<img src="{{url('images/auth/logo.png')}}">--}}
            {{--<div class="tips">安全、诚信的讯息平台</div>--}}
        {{--</div>--}}
        {{--<div class="find">找回密码</div>--}}
    {{--</div>--}}
{{--</header>--}}
<div class="header">
    <div class="loginBar">
        <div class="headerTitle" onclick="window.location.href='{{url('/')}}'">
            <img src="{{url('images/auth/idongpinLogo.png')}}">
            <div class="msg">安全、便宜的冻品平台</div>
        </div>
        <div class="spacing"></div>
        <div class="mainTitle">找回密码</div>
        <div class="right">
            <a class="login float" href="{{ url('/login') }}">去登录</a>
        </div>
    </div>

</div>
<div class="content">
    <div class="find">找回密码</div>
    <div class="line"></div>
    <form name='resetForm' action="{{ url('password/reset') }}" method="POST" >
        {!! csrf_field() !!}
        <div class="Item">
            <div class="phone">
                <label><a>*</a>手机号:</label>
                <input type="tel" id="telphone" class='input {{ $errors->has('phone') ? ' has_error' : '' }}' name="phone"  maxlength="11" placeholder="请输入11位的手机号" oninput="isPhoneRight(this)" onkeyup="this.value=this.value.replace(/\D/g,'')">
            </div>
            @if ($errors->has('phone'))
             <img class="tag" src="{{url('images/auth/error.png')}}">
            @endif
            <span>{{ $errors->first('phone') }}</span>
        </div>
        <div class="Item">
            <div class="phone">
                <label><a>*</a>短信验证码:</label>
                <input type="tel" id="message" class='input message {{ $errors->has('code') ? ' has_error' : '' }}' name="code" maxlength="6" placeholder="请输入短信验证码" oninput="getCode(this)" onkeyup="this.value=this.value.replace(/\D/g,'')">
                <div class='getCode'>获取验证码</div>
            </div>
            @if ($errors->has('code'))
                <img class="tag" src="{{url('images/auth/error.png')}}">
            @endif
            <span>{{ $errors->first('code') }}</span>
        </div>
        <div class="Item">
            <div class="phone">
                <label><a>*</a>设置密码:</label>
                <input type="password" id="password" class='input {{ $errors->has('password') ? ' has_error' : '' }}' name="password" minlength="6" maxlength="18" placeholder="请设置6-18位密码" oninput="IsPasswordRight(this)">
            </div>
            @if ($errors->has('password'))
                <img class="tag" src="{{url('images/auth/error.png')}}">
            @endif
            <span>{{ $errors->first('password') }}</span>
        </div>
        <div class="Item">
            <div class="phone">
                <label><a>*</a>确认密码:</label>
                <input type="password" id="comfirm_password" class='input {{ $errors->has('password_confirmation') ? ' has_error' : '' }}' name="password_confirmation" minlength="6" maxlength="18" placeholder="请再次设置6-18位密码" oninput="IsComfirmPasswordRight(this)">
            </div>
            @if ($errors->has('password_confirmation'))
                <img class="tag" src="{{url('images/auth/error.png')}}">
            @endif
            <span>{{ $errors->first('password_confirmation') }}</span>
        </div>
        <div class="Item">
            <div class="phone">
                <button class="button" type="submit" id="submit" onclick="return sendPost()" tap-mode="">确认</button>
            </div>
        </div>
    </form>
</div>
@endsection
@section("javascript")
    <script type="text/javascript" src="{{url('js/PublicDomain.js')}}"></script>
<script  src="{{url('js/auth/findpassword.js')}}"></script>
@endsection