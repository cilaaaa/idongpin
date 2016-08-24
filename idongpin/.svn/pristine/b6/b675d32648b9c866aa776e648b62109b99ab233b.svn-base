@extends('layouts.page_footer')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('css/auth/login.css')}}">
@endsection

@section('content')
<div class="header">
    <div class="loginBar">
        <!-- <div class="logo" onclick="window.location.href='{{url('/')}}'">
            <div class="img">
                <img src="{{url('images/auth/idongpinLogo.png')}}">
            </div>
            <div class="logoText">
                安全、便宜的冻品平台
            </div>
        </div>
        <div class="welc">
            欢迎登录
        </div>
        <a class="registerNPhpne" href="{{ url('/register') }}">
            登录新号码
        </a> -->
        <div class="headerTitle" onclick="window.location.href='{{url('/')}}'">
            <img src="{{url('images/auth/idongpinLogo.png')}}">
            <div class="msg">安全、便宜的冻品平台</div>
        </div>
        <div class="spacing"></div>
        <div class="mainTitle">欢迎登录</div>
        <div class="right">
            <a class="login float" href="{{ url('/register') }}">注册新号码</a>
        </div>
    </div>
</div>
<div class="main">
    <div class="content">
        <div class="form">
            <div class="formHeader">
                <div class="headerFont">
                    i冻品账户登录
                </div>
                <div class="line"></div>
            </div>
            <div class="contentPadding">
                <div class="content">
                    <div class="formContent">
                        <form method="POST" action="{{ url('/login') }}">
                            {!! csrf_field() !!}
                            <div id="enteru" class="{{ $errors->has('phone') ? ' hasError' : '' }}">
                                <div class="userName_Pwd">
                                    <label class="userName_Pwd_Label">账号：　</label><input oninput="isphoneRight(this)" value="{{old('phone')}}" name="phone" id="username" type="text" class="userName_Pwd_Input" placeholder="请输入11位手机号">
                                </div>
                                <div class="userName_Pwd_Img">
                                    <img class="ufalse" src="{{url('images/auth/idcodefalse.png')}}">
                                    <label class="labelname">{{ $errors->first('phone') }}</label>
                                    <img class="uimg" src="{{url('images/auth/logininputtrue.png')}}">
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div id="enterp" class="{{ $errors->has('password') ? ' hasError' : '' }}">
                                <div class="userName_Pwd">
                                    <label class="userName_Pwd_Label">密码：　</label><input name="password" oninput="ispwdRight(this)" id="pwd" type="password" class="userName_Pwd_Input" placeholder="请输入密码">
                                </div>
                                <div class="userName_Pwd_Img">
                                    <img class="ufalse" src="{{url('images/auth/idcodefalse.png')}}">
                                    <label class="labelpwd" >{{ $errors->first('password') }}</label>
                                    <img class="upwd" src="{{url('images/auth/logininputtrue.png')}}">
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="autoLoginForget">
                                <div class="autoLogin">
                                    <img src="{{url('images/auth/btn_2_1.png')}}"  /><label >自动登录</label>
                                    <input type="checkbox" id="s" name="remember" style="display: none;">
                                </div>
                                <div class="forget">
                                    <a class="modifyPWD" href="{{ url('/password/reset') }}">忘记密码?</a>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="loginPadding">
                                <div class="logining">
                                    <button  id="logining" type="submit">登　　录</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
    <script type="text/javascript" src="{{url('js/PublicDomain.js')}}"></script>
<script type="text/javascript" src="{{url('js/auth/login.js')}}"></script>
@endsection
