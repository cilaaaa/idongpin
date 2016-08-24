@extends('layouts.app')
@section('title')首页@stop
@section('css')
	<link rel="stylesheet" type="text/css" href="{{url('css/public/common.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('css/public/footer.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('css/index/index.css')}}">
@stop
@section('content')
	<!-- <header class="header">
		<div class="header_content">
			<div class="location">
				<img class="location_icon" src="{{url('images/index/location.png')}}">
				<span class="location_address">上海</span>
				<img class="address_dropdown" src="{{url('images/index/dropDown.png')}}">
				<span class="clear"></span>
			</div>
			<div class="search_box">
				<img class="search_icon" src="{{url('images/index/search.png')}}">
				<span class="search_keyword">请输入关键字搜索</span>
				<span class="clear"></span>
			</div>
			<div class="news">
				<div class="news_icon">
					<img class="news_pic" src="{{url('images/index/news.png')}}">
					<div class="news_count">0</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</header> -->
	<div class="content">
		<div class="container">
			<div id="carousel" class="slider">
			    <img src="{{url('images/index/image1.jpg')}}"/>
			    <img src="{{url('images/index/image2.jpg')}}"/>
			    <img src="{{url('images/index/image3.jpg')}}"/>
			    <img src="{{url('images/index/image4.jpg')}}"/>
			    <img src="{{url('images/index/image5.jpg')}}"/>	
			</div>
			<div class="menu">
				<ul>
					<li class="classify">
						<a href="#">
							<img src="{{url('images/index/chicken.png')}}">
							<span>鸡</span>
						</a>
					</li>
					<li class="classify">
						<a href="#">
							<img src="{{url('images/index/duck.png')}}">
							<span>鸭</span>
						</a>
					</li>
					<li class="classify">
						<a href="#">
							<img src="{{url('images/index/goose.png')}}">
							<span>鹅</span>
						</a>
					</li>
					<li class="classify">
						<a href="#">
							<img src="{{url('images/index/cow.png')}}">
							<span>牛</span>
						</a>
					</li>
					<li class="classify">
						<a href="#">
							<img src="{{url('images/index/sheep.png')}}">
							<span>羊</span>
						</a>
					</li>
					<li class="classify">
						<a href="#">
							<img src="{{url('images/index/pig.png')}}">
							<span>猪</span>
						</a>
					</li>
					<li class="clear"></li>
				</ul>
			</div>
			<div class="discount">
				<div class="slogan">
					<a href="#"></a>
				</div>
				<div class="discountGoods">
					<div class="dailyLowPrice">
						<a href=""></a>
					</div>
					<div class="privilege">
						<div class="hotSale">
							<a href="#"></a>
						</div>
						<div class="promotionToday">
							<a href="#"></a>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear "></div>
			</div>
			<div class="recommend_host">
				<div class="recommend_ttl">
					<span class="ttl">推/荐/热/品</span>
					<span class="more">
						<span class="text">更多</span>
						<span class="icon">
							<img src="{{url('images/index/more.png')}}">
						</span>
					</span>
				</div>
				<div class="recommend_goods">
					<div class="slideContainer">
						<ul>
							<li class="goods">
								<a href="#">
									<img class="goods_picture" src="{{url('images/index/goods_img.png')}}">
									<span class="goods_name">鲜五花肉　散装</span>
									<span class="goods_price">
										<span class="price">
											<span>¥</span>
											<span>175.00</span>
											<span>/</span>
										</span>
										<span class="unit">kg</span>
									</span>
								</a>
							</li>
							<li class="goods">
								<a href="#">
									<img class="goods_picture" src="{{url('images/index/goods_img.png')}}">
									<span class="goods_name">鲜五花肉　散装</span>
									<span class="goods_price">
										<span class="price">
											<span>¥</span>
											<span>175.00</span>
											<span>/</span>
										</span>
										<span class="unit">kg</span>
									</span>
								</a>
							</li>
							<li class="goods">
								<a href="#">
									<img class="goods_picture" src="{{url('images/index/goods_img.png')}}">
									<span class="goods_name">鲜五花肉　散装</span>
									<span class="goods_price">
										<span class="price">
											<span>¥</span>
											<span>175.00</span>
											<span>/</span>
										</span>
										<span class="unit">kg</span>
									</span>
								</a>
							</li>
							<li class="goods">
								<a href="#">
									<img class="goods_picture" src="{{url('images/index/goods_img.png')}}">
									<span class="goods_name">鲜五花肉　散装</span>
									<span class="goods_price">
										<span class="price">
											<span>¥</span>
											<span>175.00</span>
											<span>/</span>
										</span>
										<span class="unit">kg</span>
									</span>
								</a>
							</li>
							<li class="goods">
								<a href="#">
									<img class="goods_picture" src="{{url('images/index/goods_img.png')}}">
									<span class="goods_name">鲜五花肉　散装</span>
									<span class="goods_price">
										<span class="price">
											<span>¥</span>
											<span>175.00</span>
											<span>/</span>
										</span>
										<span class="unit">kg</span>
									</span>
								</a>
							</li>
							<li class="clear"></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="brand_zone">
				<div class="brand_ttl">
					<span class="ttl">品/牌/专/区</span>
					<span class="more">
						<span class="text">更多</span>
						<span class="icon">
							<img src="{{url('images/index/more.png')}}">
						</span>
					</span>
				</div>
				<ul class="brands">
					<li class="brand">
						<img class="brand_pic" src="{{url('images/index/baiyoujia.png')}}">
						<span class="brand_name">百佑佳</span>
					</li>
					<li class="brand">
						<img class="brand_pic" src="{{url('images/index/jinluo.png')}}">
						<span class="brand_name">金锣</span>
					</li>
					<li class="brand">
						<img class="brand_pic" src="{{url('images/index/liuhe.png')}}">
						<span class="brand_name">六合</span>
					</li>
					<li class="brand">
						<img class="brand_pic" src="{{url('images/index/taisen.png')}}">
						<span class="brand_name">泰森</span>
					</li>
					<li class="brand">
						<img class="brand_pic" src="{{url('images/index/liuhe.png')}}">
						<span class="brand_name">六合</span>
					</li>
					<li class="clear"></li>
				</ul>
			</div>
		</div>
	</div>
	<footer class="footer">
		<ul>
			<li class="modeMenu">
				<a href="#">
					<img src="{{url('images/index/homePage.png')}}">
					<span class="spanActive">首页</span>
				</a>
			</li>
			<li class="modeMenu">
				<a href="#">
					<img src="{{url('images/index/kind.png')}}">
					<span>分类</span>
				</a>
			</li>
			<li class="modeMenu">
				<a href="#">
					<img src="{{url('images/index/purcherCar.png')}}">
					<span>购物车</span>
				</a>
			</li>
			<li class="modeMenu">
				<a href="#">
					<img src="{{url('images/index/userCenter.png')}}">
					<span>我的</span>
				</a>
			</li>
			<li class="clear"></li>
		</ul>
	</footer>
@stop
@section('js')
	<script type="text/javascript" src="{{url('js/index/index.js')}}"></script>
	<script type="text/javascript" src="{{url('js/lib/jquery.excoloSlider.js')}}"></script>
	<script type="text/javascript">
		$(function () {
			$("#carousel").excoloSlider({
				width : "100%",
				height : "auto",
				autoSize : true,
				interval : 3000,
				prevButtonImage : "{{url('images/index/prev.png')}}",
				nextButtonImage : "{{url('images/index/next.png')}}",
				pagerImage : "{{url('images/index/pagericon.png')}}"
			});
			$(".slide-prev").remove();
			$(".slide-next").remove();
			$(".es-pager").remove();
		});
	</script>
@stop