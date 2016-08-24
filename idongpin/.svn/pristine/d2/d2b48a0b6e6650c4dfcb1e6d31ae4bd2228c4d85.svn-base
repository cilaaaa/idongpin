<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" href="{{url('favicon.png')}}" type="image/png">
	<title>{{$company->company_name}}</title>
	<link rel="stylesheet" type="text/css" href="{{url('css/public/public.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('css/public/carousel.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('css/public/searchTool.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('css/public/footer.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('css/product/header.css')}}">
	@yield('css')
</head>
<body>
<div class="main">
	<div class="loginInfo">
		<div class="topBar">
			<div class="welcome">
				<span class="welcomeTo">欢迎来到i冻品</span>
					<span class="login">
                        @if(Auth::guest())
							<a class="loginBtn" href="{{url('login')}}">登录</a>
							<span>|</span>
							<a href="{{url('register')}}">注册</a>
						@else
							<span class="manage">
                            	<a href="{{url('/user')}}" class="userName">{{ Auth::user()->user_name }}的i冻品</a>
                            	<a href="{{url('logout')}}" class="loginOut">【注销】</a>
                        	</span>
						@endif
					</span>
			</div>

			<div class="help">
				<a href="{{url('/')}}">i冻品首页</a>
				<span>|</span>
				<a href="">在线客服</a>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="searchTool">
		<div>
			<div class="searchBar">
				<div class="logo" onclick="window.location.href='{{url('company?companyid='.$_GET['companyid'])}}'">
					<img src="{{$company->logo}}">
					<div class="nature">{{$company->company_name}}</div>
				</div>
				<div class="search">
					<form id="searchForm" method="get">
						<div>
							<div class="searchBox">
								<input type="text" value="{{old('keyword')}}" name="keyword"/>
								<input type="hidden" id="option">
								<div class="searchBtn">搜本旺铺</div>
							</div>
							<div class="searchBtnQ">搜全站</div>
							<div class="clear"></div>
						</div>
					</form>
				</div>
				<div class="clear"></div>
			</div>

			<div class="nav">
				<div class="navMenuP">
					<ul class="selectOption">
						@if(starts_with(url($_SERVER['REQUEST_URI']),"http://www.idongpin.com.cn/company?"))
							<li><a class="menu menuActive" href="{{url('company?companyid='.$_GET['companyid'])}}">首页</a></li>
						@else
							<li><a class="menu" href="{{url('company?companyid='.$_GET['companyid'])}}">首页</a></li>
						@endif
						<li>
							@if(starts_with(url($_SERVER['REQUEST_URI']),"http://www.idongpin.com.cn/company/supply"))
								<a class="menu menuActive navTtlP">供应产品<img id="showMenu" src="{{url('images/product/down_01.png')}}"></a>
							@else
								<a class="menu navTtlP">供应产品<img id="showMenu" src="{{url('images/product/down_01.png')}}"></a>
							@endif
							<div class="carte" id="carte">
								<div class="firstCarte" id="firstCarte">
									<div class="menuItem menuAll" onclick="window.location.href='{{url('company/supply?companyid='.$_GET['companyid'])}}'">
										<a class="bigAll">所有分类</a>
									</div>
									@foreach($pro_types as $key=>$value)
										<div class="menuItem" onclick="window.location.href='{{url('company/supply?companyid='.$_GET['companyid'].'&typeid='.$value['type_id'])}}'">
											<div class="bigClass">{{$value['type_name']}}</div>
										</div>
									@endforeach
								</div>
							</div>
						</li>
						@if(starts_with(url($_SERVER['REQUEST_URI']),"http://www.idongpin.com.cn/company/introduce"))
							<li><a class="menu menuActive" href="{{url('company/introduce?companyid='.$_GET['companyid'])}}">公司介绍</a></li>
						@else
							<li><a class="menu" href="{{url('company/introduce?companyid='.$_GET['companyid'])}}">公司介绍</a></li>
						@endif
						@if(starts_with(url($_SERVER['REQUEST_URI']),"http://www.idongpin.com.cn/company/contact"))
							<li><a class="menu menuActive" href="{{url('company/contact?companyid='.$_GET['companyid'])}}">联系我们</a></li>
						@else
							<li><a class="menu" href="{{url('company/contact?companyid='.$_GET['companyid'])}}">联系我们</a></li>
						@endif
						<div class="clear"></div>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
@yield('content')

<div class="footer">
	<div>
		<div class="otherLink">
			<a href="">关于我们</a>
			<span>|</span>
			<a href="">公司荣耀</a>
			<span>|</span>
			<a href="">联系方式</a>
			<span>|</span>
			<a href="">客服中心</a>
			<span>|</span>
			<a href="">设为首页</a>
			<span>|</span>
			<a href="">加为收藏</a>
			<span>|</span>
			<a href="">网站导航</a>
		</div>
		<div class="copyright">
			<span>© 2016-2026 idongpin.com.cn 版权所有</span>
		</div>
	</div>
</div>

<script type="text/javascript" src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="{{url('js/searchTool.js')}}"></script>
<script type="text/javascript" src="{{url('js/product/header.js')}}"></script>
@yield('javascript')
</body>
</html>