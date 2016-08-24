<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    	<script type="text/javascript" src="{{url('js/lib/flexible.js')}}"></script>
    	<title>i冻品</title>
    	<link rel="stylesheet" type="text/css" href="{{url('css/public/common.css')}}">
    	<link rel="stylesheet" type="text/css" href="{{url('css/public/footer.css')}}">
    	<link rel="stylesheet" type="text/css" href="{{url('css/order/myOrder.css')}}">
	</head>
	<body id="myOrder">
		<header class="header">
			<div class="header_content">我的订单
				<!--
                	<img class="dropDown" src="{{url('images/product/dropDown.png')}}"/>
               -->												
			</div>
			<div class="back">
				<img class="backIcon" src="{{url('images/product/back_icon.png')}}" />
			</div>						
		</header>
		
		<div class="content">
			<div class="orderStatus">
				<ul statusDetail>
					<li id="first">全部订单</li>
					<li>未付款</li>
					<li>已付款</li>
					<li>已完成</li>
				</ul>
			</div>
			<div class="orderDetail">
				<ul>
					<li id="first_item">
						<div class="company">
							<img class="companyIcon" src="{{url('images/order/companyIcon.png')}}" />
							<span class="conpanyName">百佑佳食品贸易</span>
							<img class="more" src="{{url('images/index/more.png')}}" />
							<span class="status">已付款</span>
						</div>
					</li>
					<li class="orderItem">
						<div class="orderBox">
							<div class="goodsImg">
								<img class="Img" src="{{url('images/product/meat.png')}}" />
							</div>
							<div class="goodsExp">
								<a href="">百年栗园 北京油鸡老母鸡+童子鸡2只装礼盒1750g</a>
								<span class="ChanDi">澳大利亚</span>
								<span class="price">￥19.00</span>
								<span class="ShuLiang">×10</span>
							</div>
						</div>						
					</li>
					<li class="orderItem">
						<div class="orderBox">
							<div class="goodsImg">
								<img class="Img" src="{{url('images/product/meat.png')}}" />
							</div>
							<div class="goodsExp">
								<a href="">百年栗园 北京油鸡老母鸡+童子鸡2只装礼盒1750g</a>
								<span class="ChanDi">澳大利亚</span>
								<span class="price">￥19.00</span>
								<span class="ShuLiang">×10</span>
							</div>
						</div>						
					</li>
					<li class="last_li">
						<div class="submit">
							<span class="ShiFuKuan">实付款：￥190.00</span>
							<button class="submitBtn">确认收货</button>
						</div>
					</li>
				</ul>
				<div class="Line"></div>
				
				<ul class="weiFuKuan">
					<li id="first_item">
						<div class="company">
							<img class="companyIcon" src="{{url('images/order/companyIcon.png')}}" />
							<span class="conpanyName">百佑佳食品贸易</span>
							<img class="more" src="{{url('images/index/more.png')}}" />
							<span class="status1">未付款</span>
						</div>
					</li>
					<li class="orderItem">
						<div class="orderBox">
							<div class="goodsImg">
								<img class="Img" src="{{url('images/product/meat.png')}}" />
							</div>
							<div class="goodsExp">
								<a href="">百年栗园 北京油鸡老母鸡+童子鸡2只装礼盒1750g</a>
								<span class="ChanDi">澳大利亚</span>
								<span class="price">￥19.00</span>
								<span class="ShuLiang">×10</span>
							</div>
						</div>						
					</li>
					<li class="orderItem">
						<div class="orderBox">
							<div class="goodsImg">
								<img class="Img" src="{{url('images/product/meat.png')}}" />
							</div>
							<div class="goodsExp">
								<a href="">百年栗园 北京油鸡老母鸡+童子鸡2只装礼盒1750g</a>
								<span class="ChanDi">澳大利亚</span>
								<span class="price">￥19.00</span>
								<span class="ShuLiang">×10</span>
							</div>
						</div>						
					</li>
					<li class="last_li">
						<div class="submit">
							<span class="ShiFuKuan">实付款：￥190.00</span>
							<button class="submitBtn">去结算</button>
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
	</body>
</html>