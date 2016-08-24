@extends('layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('css/userCenter/public.css')}}">
    @yield('csssheet')
@endsection
@section('content')
	<div class="container">
		<div class="leftSide">
			<div class="tradeManage" data-show="show">
				<img class="tradeImg" src="{{url('images/userCenter/show.png')}}"><span class="tradeBtn">交易管理</span>
				<ul class="tradeMenu">
					<li><a href="{{url('/user/order')}}">我的订单</a></li>
					<li><a href="{{url('/user/myLaunch')}}">我的询价单</a></li>
				</ul>
			</div>
			<div class="vipCenter" data-show="show">
				<img class="vipImg" src="{{url('images/userCenter/show.png')}}"><span class="vipBtn">会员中心</span>
				<ul class='vipMenu'>
					<li><a href="{{url('/user/info')}}">账户信息</a></li>
					<li><a href="{{url('/user/address')}}">收货地址</a></li>
					<li><a href="{{url('/user/auth')}}">账户安全</a></li>
				</ul>
			</div>
		</div>
		<div class="rightSide">
			@yield('rightSideContent')
		</div>
		<div class="clear"></div>
	</div>
@endsection

@section('javascript')
	<script type="text/javascript" src="{{url('js/userCenter/public.js')}}"></script>
	@yield('js')
@endsection