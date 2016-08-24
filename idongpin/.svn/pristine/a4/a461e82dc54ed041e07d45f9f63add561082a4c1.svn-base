@extends('layouts.page_footer')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('css/auth/register.css')}}">
@endsection
@section('content')
    <div class="main">
        <div class="header">
            <div class="headerTitle" onclick="window.location.href='{{url('/')}}'">
                <img src="{{url('images/auth/idongpinLogo.png')}}">
                <div class="msg">安全、便宜的冻品平台</div>
            </div>
            <div class="line"></div>
            <div class="mainTitle">欢迎注册</div>
            <div class="right">
                <a href="{{ url('/login') }}" class="account float">已有账号</a>
                <div class="float center">|</div>
                <a class="login float" href="{{ url('/login') }}">登录</a>
            </div>
        </div>
    </div>
    <div class="registerPersonal">
        <form method="POST" action="{{ url('/register') }}">
            {!! csrf_field() !!}
            <div class="personalBox">
                <div class="title">
                    {{--<div class="personalTitle only float dd">个人账户</div>--}}
                    {{--<div class="float center">|</div>--}}
                    <div class="enterpriseTitle only float">企业账户</div>
                    <div class="clear"></div>
                </div>
                <div class="titleLine">
                    <div class="phone enter {{ $errors->has('phone') ? ' has_error' : '' }}">
                        <div class="enterTitle"><span>*</span>手机号：</div>
                        <input type="text" id="phone" name="phone" placeholder="请输入十一位手机号" value="{{old('phone')}}">
                        <img src="images/auth/idongpin_01.png">
                        <span class="redspan">{{ $errors->first('phone') }}</span>
                        <div class="clear"></div>
                    </div>
                    <div class="codes enter {{ $errors->has('code') ? ' has_error' : '' }}">
                        <div class="enterTitle"><span>*</span>短信验证码：</div>
                        <input  name="code" type="text" placeholder="请输入短信验证码">
                        <button class="codesBtn" type="button">获取验证码</button>
                        <img src="images/auth/idongpin_01.png">
                        <span class="redspan">{{ $errors->first('code') }}</span>
                        <div class="clear"></div>
                    </div>
                    <div class="setPassword enter {{ $errors->has('password') ? ' has_error' : '' }}">
                        <div class="enterTitle"><span>*</span>设置密码：</div>
                        <input name="password" type="password" placeholder="请设置6-18位密码">
                        <img src="images/auth/idongpin_01.png">
                        <span class="redspan">{{ $errors->first('password') }}</span>
                        <div class="clear"></div>
                    </div>
                    <div class="confirmPassword enter {{ $errors->has('password_confirmation') ? ' has_error' : '' }}">
                        <div class="enterTitle"><span>*</span>确认密码：</div>
                        <input name="password_confirmation" type="password" placeholder="请再次输入6-18位密码">
                        <img src="images/auth/idongpin_01.png">
                        <span class="redspan">{{ $errors->first('password_confirmation') }}</span>
                        <div class="clear"></div>
                    </div>
                    <div class="userName enter {{ $errors->has('username') ? ' has_error' : '' }}">
                        <div class="enterTitle"><span>*</span>会员名称：</div>
                        <input name="username" type="text" placeholder="请输入会员名" value="{{old('username')}}">
                        <img src="images/auth/idongpin_01.png">
                        <span class="redspan">{{ $errors->first('username') }}</span>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="enterpriseLine">
                    <div class="enterprisemsg">企业信息</div>
                    <div class="companyName enter {{ $errors->has('company_name') ? ' has_error' : '' }}">
                        <div class="enterTitle"><span>*</span>公司名称：</div>
                        {{--<input name="company_name" type="text" placeholder="请输入公司名称" value="{{old('company_name')}}">--}}
                        {{--<img src="images/auth/idongpin_01.png">--}}
                        <select name="company_name" class="company_name" value="">
                            <option value="">请选择公司</option>
                            @foreach($company as $item)
                                <option value="{{$item->company_id}}">{{$item->company_name}}</option>
                            @endforeach
                        </select>
                        <span class="redspan"></span>
                        <div class="clear"></div>
                    </div>
                    <div class="companyType enter {{ $errors->has('company_type') ? ' has_error' : '' }}">
                        {{--<div class="enterTitle"><span>*</span>公司类型：</div>--}}
                        {{--<div class="companyType_c">--}}
                            {{--<span>请选择...</span>--}}
                            {{--<input type="hidden" name="company_type" id="company_type" value="{{old('company_type')}}">--}}
                            {{--<div class="down type_t"></div>--}}
                        {{--</div>--}}
                        {{--<img src="images/auth/idongpin_01.png">--}}
                        {{--<span class="redspan">{{ $errors->first('company_type') }}</span>--}}
                        {{--<div class="clear"></div>--}}
                        {{--<ul class="type_c">--}}
                            {{--<li>企业单位</li>--}}
                            {{--<li>事业单位</li>--}}
                            {{--<li>社会团体</li>--}}
                            {{--<li>个体经营</li>--}}
                        {{--</ul>--}}
                        <div class="enterTitle">公司类型：</div>
                        <span class="comIonfo company_type">　</span>
                    </div>
                    <div class="companyAddress enter {{ $errors->has('company_name') ? ' has_error' : '' }}">
                        <div class="enterTitle"><span>*</span>经营地址：</div>
                        <span  class="comIonfo company_address">　</span>
                        {{--<input name="company_address" type="text" placeholder="请输入地址" value="{{old('company_address')}}">--}}
                        {{--<img src="images/auth/idongpin_01.png">--}}
                        {{--<span class="redspan">{{ $errors->first('phone') }}</span>--}}
                        <div class="clear"></div>
                    </div>
                    <div class="companyIndustry enter {{ $errors->has('company_major') ? ' has_error' : '' }}">
                        <div class="enterTitle"><span>*</span>主营行业：</div>
                        <span  class='comIonfo company_major'>　</span>
                        {{--<div class="companyIndustry_c">--}}
                            {{--<span>请选择...</span>--}}
                            {{--<input type="hidden" name="company_major" id="company_major" value="{{old('company_major')}}">--}}
                            {{--<div class="down industry_t"></div>--}}
                        {{--</div>--}}
                        {{--<img class="img" src="images/auth/idongpin_01.png">--}}
                        {{--<span class="redspan">{{ $errors->first('company_major') }}</span>--}}
                        {{--<div class="clear"></div>--}}
                        {{--<ul class="industry_c">--}}
                            {{--<li>--}}
                                {{--<img src="images/auth/btn_2_1.png">--}}
                                {{--<span>鸡</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<img src="images/auth/btn_2_1.png">--}}
                                {{--<span>鸭</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<img src="images/auth/btn_2_1.png">--}}
                                {{--<span>鹅</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<img src="images/auth/btn_2_1.png">--}}
                                {{--<span>牛</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<img src="images/auth/btn_2_1.png">--}}
                                {{--<span>羊</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<img src="images/auth/btn_2_1.png">--}}
                                {{--<span>猪</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<div class="confirm"></div>--}}
                                {{--<div class="cancel"></div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    </div>
                    <div class="mainProducts enter {{ $errors->has('company_product') ? ' has_error' : '' }}">
                        <div class="enterTitle"><span>*</span>主营产品：</div>
                        <span class="comIonfo company_product">　</span>
                        {{--<div class="products">--}}
                            {{--<div class="products_c">--}}
                                {{--<img src="images/auth/btn_1_1.png">--}}
                                {{--<span>销售</span>--}}
                            {{--</div>--}}
                            {{--<div class="products_c">--}}
                                {{--<img src="images/auth/btn_1_1.png">--}}
                                {{--<span>采购</span>--}}
                            {{--</div>--}}
                            {{--<div class="products_c">--}}
                                {{--<img src="images/auth/btn_1_1.png">--}}
                                {{--<span>两者都有</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<input type="hidden" name="company_product" id="company_product" value="{{old('company_product')}}">--}}
                        {{--<img class="img" src="images/auth/idongpin_01.png">--}}
                        {{--<span class="redspan">{{ $errors->first('company_product') }}</span>--}}
                        {{--<div class="clear"></div>--}}
                    {{--</div>--}}
                </div>
                    <br style="clear: both">
                <div class="protocol">
                    <img src="images/auth/btn_2_1.png">
                    <a>阅读并同意《i冻品网用户服务协议》</a>
                </div>
                <input type="hidden" name="register_type" id="register_type" value="company">
                <div class="btn-wrap">
                    <button class="btn" type="submit">注　　册</button>
                    <span>注册企业账号优势:</span>
                    <br/>
                    <span>能够收到更加精准的企业供求信息</span>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript" src="{{url('js/PublicDomain.js')}}"></script>
    {{--<script type="text/javascript" src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>--}}
    <script type="text/javascript" src="{{url('js/auth/register.js')}}"></script>
    @endsection
