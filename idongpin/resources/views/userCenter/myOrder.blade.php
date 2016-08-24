@extends('layouts.user_center')
@section('csssheet')
	<link rel="stylesheet" type="text/css" href="{{url('css/userCenter/myOrder.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('css/public/laydateCore.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('css/public/laydate.css')}}">
@endsection

@section('rightSideContent')
	<div class="topMode">
		<div class="pageNav"><span>></span><span>我的订单</span></div>
		<!-- <div class="selectOrderTime">
			<span class="selectDate selectDateActive">近三个月订单</span>
			<span class="selectDate">三个月前订单</span>
		</div>
		<div class="orderInfoSearch">
			<form>
				<div class="conditions">
					<div class="condition_1">
						<span class="infoTtl">订单号：</span><input class="infoVal" type="text">
					</div>
					<div class="condition_2">
						<span class="infoTtl">货品名称：</span><input class="infoVal" type="text">
					</div>
					<div class="condition_3">
						<span class="infoTtl">供应商名:</span><input class="infoVal" type="text">
					</div>
				</div>
				<div class="conditions">
					<div class="condition_4">
						<span class="infoTtl">下单时间：</span><input class="infoVal" onclick="laydate()" type="text"><span class="space">至</span><input class="infoVal" onclick="laydate()" type="text">
						<span class="conditionSearch"><input class="conditionSearchBtn" type="submit" value="查询"></span>
					</div>
				</div>
			</form>
		</div>
		<div class="selectOrderStatus">
			<span class="infoTtl">订单状态：</span><span class="status statusActive">全部</span><span class="status">未完成</span><span class="status">已完成</span>
		</div> -->
	</div>
	<div  style="min-height: 80px;">
		<table class="orderDetail">
			<thead>
			{{--<td class="orderID"></td>--}}
			<td class="goodsName tr_center">商品</td>
			<td class="unit_price">单价</td>
			<td class="price">数量</td>
			<td class="amount tr_center">实付款</td>
			<td class="operation tr_center">操作</td>
			</thead>
			<tbody>
			@foreach($orders as $order)
				<tr class="tr_top" ></tr>
				<tr class="tr_background" >
					<td class="{{$order->order_status =='已修改'?'warning':''}}">
						<span class="tr_time_right" >{{$order->order_time}}</span><span>订单号：</span><span class="tr_cursor"
																										 onclick="getOrder(this)">{{isset($order->order_id)?$order->order_id:""}}</span>
					</td>
					<td colspan="4">{{isset($order->company_name)?$order->company_name:""}}</td>
				</tr>
				<tr style="border-bottom: 1px solid #e8e8e8;">
					<td class="tr_td_top">
						@if(isset($order->pro_img))
							<img  class="tr_img" src="{{$order->pro_img}}">
						@endif
						<span class="tr_name" >{{$order->pro_name}}</span>
						<div class="clear"></div>
					</td>
					<td class="tr_td_top">￥{{isset($order->unit_price)?$order->unit_price:""}}</td>
					<td  class="tr_center tr_td_top" >{{isset($order->qty)?$order->qty:""}}</td>
					<td class="tr_td_top">
						<div class="tr_center">￥<span>{{isset($order->amount)?$order->amount:""}}</span></div>
						@if(isset($order->freight) && $order->freight != 0)
							<div class="tr_yunFei tr_center">( <span>运费：￥</span><span>{{isset($order->freight)?$order->freight:""}}</span>)</div>
						@else
							<div class="tr_yunFei tr_center">( <span>运费：</span><span>免运费</span>)</div>
						@endif

					</td>

					@if($order->order_status =='已完成')
						<td class="operation tr_center tr_td_top"><span class="finish" style="color:#a1a1a1;">售后服务</span></td>
					@elseif($order->order_status =='已取消')
						<td class="operation tr_center tr_td_top"><span class="finish" style="color:#a1a1a1;">已取消</span></td>
					@elseif($order->order_status =='已确认')
						<td class="operation tr_center tr_td_top" data-id="{{isset($order->order_id)?$order->order_id:""}}">
							<span class="finish sure" onclick="finishOrder(this)">完成交易</span>
						</td>
					@else
						<td class="operation tr_td_top" data-id="{{isset($order->order_id)?$order->order_id:""}}">
							<a class="tr_confirm" onclick="confirmOrder(this)">完成</a>
							<a class="tr_cancel" onclick="cancelOrder(this)">取消</a>
							{{--<span class="cancel" onclick="cancelOrder(this)">取消</span>--}}
							{{--<span class="spacing">/</span>--}}
							{{--<span class="finish sure tr_confirm" onclick="confirmOrder(this)">确认</span>--}}
						</td>
					@endif


				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<div class="orderMode">
		<div class="modeTable">
			<div class="modeTableCell">
				<div class="modified">
					<div class="orderInfo1">
						<div class="orderInfoTtl">
							<div class="orderOpen">订单详情</div>
							<img src="{{url('images/userCenter/close.png')}}">
						</div>
						<div class="info">
							<ul class="topInfo">
								<li class="form-group supply_company">
									<span class="form-group-name">供应商：</span>
									<span class="form-group-text company_id"></span>
									<span class="supply_phone company_phone"></span>
									<div class="clear"></div>
								</li>
								<li class="form-group product_name">
									<div class="product_name_title">
										<span class="form-group-name">商品：</span><span class="product_price">单价</span>
										<div class="clear"></div>
									</div>
									<div class="product_item" >
										<img  class="product_item_img"  src="">
										<div class="product_item_center">
											<div class="product_item_style pro_name"></div>
											<div class="product_item_style pro_desc"></div>
										</div>
										<div style="float: right">
											<div class="product_item_style1">￥<span class="unit_price"></span></div>
											<div class="product_item_yunFei" >x<span class="qty"></span></div>
										</div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</li>
								<li class="form-group product_total">
									<span class="form-group-name">实付款：</span>
									<div style="float: right">
										<div class="form-group-text">￥<span  class="amount"></span></div>
										<div style="text-align: right;font-size: 12px;color: #808282;font-family: 'Microsoft Yahei';">
											( <span class="">运费：</span>￥<span class="freight"></span> )</div>
										<div class="clear"></div>
									</div>

									<div class="clear"></div>
								</li>
								<li class="name_tel">
									<div style="width: 60%;float: left">
										<span class="form-group-name">收货人</span><span class="form-group-text receipt_person"></span>
										<div class="clear"></div>
									</div>
									<div style="width: 40%;float: left">
										<span class="form-group-name">联系电话</span><span class="form-group-text receipt_person_phone" style="text-align: right;"></span>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</li>
								{{--<li class="form-group product_freight">--}}
									{{--<span class="form-group-name">运费：</span><span class="form-group-text freight"></span>--}}
									{{--<div class="clear"></div>--}}
								{{--</li>--}}
								<li class="form-group recive_address">
									<span class="form-group-name">收货地址</span><span class="form-group-text address"></span>
									<div class="clear"></div>
								</li>
							</ul>
								<!-- <li class="form-group product_count">
									<span class="form-group-name">商品数量：</span><span class="form-group-text qty"></span>
									<div class="clear"></div>
								</li>
								<li class="form-group product_price">
									<span class="form-group-name">商品单价：</span><span class="form-group-text price"></span>
									<div class="clear"></div>
								</li> -->
							<div class="hr"></div>
							<ul class="topInfo">	
								<li class="form-group order_number">
									<span class="form-group-name">订单号：</span><span class="form-group-text order_id"></span>
									<div class="clear"></div>
								</li>
								<li class="form-group orderStatus">
									<span class="form-group-name">订单状态：</span><span class="form-group-text order_status"></span>
									<div class="clear"></div>
								</li>
								
								<!-- <li class="form-group">
									<span class="form-group-name">商品库存id</span><span class="form-group-text inventory_id"></span>
									<div class="clear"></div>
								</li> -->
								<!-- <li class="form-group">
									<span class="form-group-name">收货地址</span><span class="form-group-text address"></span>
									<div class="clear"></div>
								</li>
								<li class="form-group">
									<span class="form-group-name">付款方式</span><span class="form-group-text pay_method"></span>
									<div class="clear"></div>
								</li>
								<li class="form-group">
									<span class="form-group-name">付款金额</span><span class="form-group-text pay_amount"></span>
									<div class="clear"></div>
								</li>
								<li class="form-group">
									<span class="form-group-name">支付单号</span><span class="form-group-text pay_id"></span>
									<div class="clear"></div>
								</li> -->
								<!-- <li class="form-group">
									<span class="form-group-name">订单状态</span><span class="form-group-text order_status"></span>
									<div class="clear"></div>
								</li> -->

								<li class="form-group order_create">
									<span class="form-group-name">创建时间：</span><span class="form-group-text order_time"></span>
									<div class="clear"></div>
								</li>
								<!-- <li class="form-group">
									<span class="form-group-name">订单付款时间</span><span class="form-group-text pay_time"></span>
									<div class="clear"></div>
								</li> -->
								<li class="form-group order_confirm">
									<label class="form-group-name">确认时间：</label><span class="form-group-text confirm_time"></span>
									<div class="clear"></div>
								</li>
								<!-- <li class="form-group">
									<span class="form-group-name">订单发货时间</span><span class="form-group-text send_time"></span>
									<div class="clear"></div>
								</li> -->
								<li class="form-group order_finish">
									<span class="form-group-name">完成时间：</span><span class="form-group-text finish_time"></span>
									<div class="clear"></div>
								</li>
								<!-- <li class="form-group">
									<span class="form-group-name">订单状态</span><span class="form-group-text order_status"></span>
									<div class="clear"></div>
								</li>
								<li class="form-group">
									<span class="form-group-name">订单付款金额</span><span class="form-group-text amount"></span>
									<div class="clear"></div>
								</li> -->
								{{--<li class="form-group">--}}
								{{--<span class="form-group-name">删除时间</span><span class="form-group-text canceled_at"></span>--}}
								{{--<div class="clear"></div>--}}
								{{--</li>--}}
								{{--<li class="form-group">--}}
								{{--<span class="form-group-name">取消时间</span><span class="form-group-text deleted_at"></span>--}}
								{{--<div class="clear"></div>--}}
								{{--</li>--}}
								<div class="clear"></div>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script type="text/javascript" src="{{url('js/PublicDomain.js')}}"></script>
	<script type="text/javascript" src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="{{url('js/userCenter/myOrder.js')}}"></script>
	<script type="text/javascript" src="{{url('js/laydate.js')}}"></script>
@endsection