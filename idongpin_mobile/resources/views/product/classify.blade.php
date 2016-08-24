@extends('layouts.app')
@section('title')商户首页@stop
@section('css')
	<link rel="stylesheet" type="text/css" href="{{url('css/public/common.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('css/public/footer.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('css/product/classify.css')}}">
@stop
@section('content')

		<header class="header">
			<div class="header_content">鸡
				<img class="dropDown" src="{{url('images/product/dropDown.png')}}"/>
								
			</div>
			<div class="back">
				<img class="backIcon" src="{{url('images/product/back_icon.png')}}" />
			</div>
						
		</header>
		<div class="popWindow">
			<ul class="pop_detail">
				<li>鸡翅</li>
				<li>鸡翅</li>
				<li>鸡翅</li>
				<li>鸡翅</li>
				<li>鸡翅</li>
				<li>鸡翅</li>
				<li>琵琶全腿</li>
				<li>琵琶全腿</li>
				<li>琵琶全腿</li>
				<li>琵琶全腿</li>
				<li>琵琶全腿</li>
				<li>琵琶全腿</li>
				<li>琵琶全腿</li>
				<li>琵琶全腿</li>			
			</ul>
		</div>	
	<div class="content">
		<div class="kinds">
			<ul class="kind_data">
				<li id="first_li"><a href="">鸡</a></li>
				<li><a href="">鸭</a></li>
				<li><a href="">鹅</a></li>
				<li><a href="">牛</a></li>
				<li><a href="">羊</a></li>
				<li><a href="">猪</a></li>
			</ul>
		</div>
		
		<div class="classify_detail_box">
			<ul class="classify_detail">
				<li>
					<div class="goods_detail">
						<div class="goodsImg">
							<img src="{{url('images/product/meat.png')}}"/>
						</div>							
						<div class="goodsImgRight">														
							<div class="goodsName">
								<a href="">百年栗园 北京油鸡老母鸡+童子鸡2只装礼盒1750g</a>
								<span class="chandi">澳大利亚</span>	
							</div>
												
							<div class="goodsFooter">
								<span class="goodsPrice">￥19.00</span>
								<img class="shoppingTrolley" src="{{url('images/product/shopping_trolley.png')}}" />
							</div>
						</div>
					</div>					
				</li>
				<li>
					<div class="goods_detail">
						<div class="goodsImg">
							<img src="{{url('images/product/meat.png')}}"/>
						</div>							
						<div class="goodsImgRight">														
							<div class="goodsName">
								<a href="">正宗邦杰牛肉 纯牛肉 （8*160g）</a>
								<span class="chandi">澳大利亚</span>	
							</div>
												
							<div class="goodsFooter">
								<span class="goodsPrice">￥19.00</span>
								<img class="shoppingTrolley" src="{{url('images/product/shopping_trolley.png')}}" />
							</div>
						</div>
					</div>					
				</li>
				<li>
					<div class="goods_detail">
						<div class="goodsImg">
							<img src="{{url('images/product/meat.png')}}"/>
						</div>							
						<div class="goodsImgRight">														
							<div class="goodsName">
								<a href="">百年栗园 北京油鸡老母鸡+童子鸡2只装礼盒1750g</a>
								<span class="chandi">澳大利亚</span>	
							</div>
												
							<div class="goodsFooter">
								<span class="goodsPrice">￥19.00</span>
								<img class="shoppingTrolley" src="{{url('images/product/shopping_trolley.png')}}" />
							</div>
						</div>
					</div>					
				</li>
				<li>
					<div class="goods_detail">
						<div class="goodsImg">
							<img src="{{url('images/product/meat.png')}}"/>
						</div>							
						<div class="goodsImgRight">														
							<div class="goodsName">
								<a href="">百年栗园 北京油鸡老母鸡+童子鸡2只装礼盒1750g</a>
								<span class="chandi">澳大利亚</span>	
							</div>
												
							<div class="goodsFooter">
								<span class="goodsPrice">￥19.00</span>
								<img class="shoppingTrolley" src="{{url('images/product/shopping_trolley.png')}}" />
							</div>
						</div>
					</div>					
				</li>
				<li>
					<div class="goods_detail">
						<div class="goodsImg">
							<img src="{{url('images/product/meat.png')}}"/>
						</div>							
						<div class="goodsImgRight">														
							<div class="goodsName">
								<a href="">百年栗园 北京油鸡老母鸡+童子鸡2只装礼盒1750g</a>
								<span class="chandi">澳大利亚</span>	
							</div>
												
							<div class="goodsFooter">
								<span class="goodsPrice">￥19.00</span>
								<img class="shoppingTrolley" src="{{url('images/product/shopping_trolley.png')}}" />
							</div>
						</div>
					</div>					
				</li>
				<li>
					<div class="goods_detail">
						<div class="goodsImg">
							<img src="{{url('images/product/meat.png')}}"/>
						</div>							
						<div class="goodsImgRight">														
							<div class="goodsName">
								<a href="">正宗邦杰牛肉 纯牛肉 （8*160g）</a>
								<span class="chandi">澳大利亚</span>	
							</div>
												
							<div class="goodsFooter">
								<span class="goodsPrice">￥19.00</span>
								<img class="shoppingTrolley" src="{{url('images/product/shopping_trolley.png')}}" />
							</div>
						</div>
					</div>					
				</li>
			</ul>
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