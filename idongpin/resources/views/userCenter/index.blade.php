@extends('layouts.user_center')
@section('csssheet')
	<link rel="stylesheet" type="text/css" href="{{url('css/userCenter/index.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('css/public/laydate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('css/public/laydateCore.css')}}">

@endsection

@section('rightSideContent')
	<div class="userInfo">
		<div class="photo">
			<img src="{{url('images/userCenter/headPhoto.png')}}">
		</div>
		<div class="info">
			<div class="useName"><span>IDP</span><span class="userType">（个人用户）</span></div>
			<div class="orders">
				<span class="deal">已报价订单（<span>12</span>）</span>
				<span class="undeal">未处理订单（<span>12</span>）</span>
			</div>
		</div>
		<div class="orderRelease">
			@if(Auth::guest())
				<div class="releaseBtn" onclick="window.location.href='{{url('/login')}}'">我要发布订单</div>
			@else
				<div class="releaseBtn" onclick="releaseOrder()">我要发布订单</div>
			@endif
		</div>
		<div class="clear"></div>
	</div>
	<div class="orderInfo">
		<div class="recentOrder"><span>最近订单信息</span><img src="{{url('images/userCenter/down_01.png')}}"></div>
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
						<td  class="tr_td_top">
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

	{{--<div class="orderInfo">--}}
		{{--<div class="recentOrder"><span>最近订单信息</span><img src="{{url('images/userCenter/down_01.png')}}"></div>--}}
		{{--<table class="orderDetail">--}}
			{{--<thead>--}}
			{{--<td class="orderID">订单号</td>--}}
			{{--<td class="goodsName">商品名</td>--}}
			{{--<td class="unit_price">单价</td>--}}
			{{--<td class="price">数量</td>--}}
			{{--<td class="amount">订单总价</td>--}}
			{{--<td class="freight">运费</td>--}}
			{{--<td class="operation">操作</td>--}}
			{{--</thead>--}}
			{{--<tbody>--}}
			{{--@foreach($orders as $order)--}}
				{{--<tr>--}}
					{{--<td class="orderID" onclick="getOrder(this)">{{isset($order->order_id)?$order->order_id:""}}</td>--}}
					{{--<td class="goodsName">{{isset($order->pro_name)?$order->pro_name:""}}</td>--}}
					{{--<td class="unit_price">{{isset($order->unit_price)?$order->unit_price:""}}</td>--}}
					{{--<td class="price">{{isset($order->qty)?$order->qty:""}}</td>--}}
					{{--<td class="amount">{{isset($order->amount)?$order->amount:""}}</td>--}}
					{{--@if(isset($order->freight) && $order->freight != 0)--}}
						{{--<td class="freight">{{isset($order->freight)?$order->freight:""}}</td>--}}
					{{--@else--}}
						{{--<td class="freight">免运费</td>--}}
					{{--@endif--}}
					{{--@if($order->order_status =='已完成')--}}
						{{--<td class="operation"><span class="finish" style="color:#a1a1a1;">售后服务</span></td>--}}
					{{--@elseif($order->order_status =='已取消')--}}
						{{--<td class="operation"><span class="finish" style="color:#a1a1a1;">已取消</span></td>--}}
					{{--@elseif($order->order_status =='已确认')--}}
						{{--<td class="operation" data-id="{{isset($order->order_id)?$order->order_id:""}}">--}}
							{{--<span class="finish sure" onclick="finishOrder(this)">完成交易</span>--}}
						{{--</td>--}}
					{{--@else--}}
						{{--<td class="operation" data-id="{{isset($order->order_id)?$order->order_id:""}}">--}}
							{{--<span class="cancel" onclick="cancelOrder(this)">取消</span>--}}
							{{--<span class="spacing">/</span>--}}
							{{--<span class="finish sure" onclick="confirmOrder(this)">确认</span>--}}
						{{--</td>--}}
					{{--@endif--}}
				{{--</tr>--}}
			{{--@endforeach--}}
			{{--</tbody>--}}
		{{--</table>--}}
		{{--<div class="orderTab">--}}
		{{--<ul class="th">--}}
		{{--<li class="orderID">订单号</li>--}}
		{{--<li class="goodsName">货品名称</li>--}}
		{{--<li class="price">数量</li>--}}
		{{--<li class="count">运费</li>--}}
		{{--<li class="freight">总价</li>--}}
		{{--<li class="operation">操作</li>--}}
		{{--</ul>--}}
		{{--<ul class="ts">--}}
		{{--@foreach($orders as $order)--}}
		{{--<li class="tr">--}}
		{{--<div class="orderID" onclick="getOrder(this)">{{$order->order_id}}</div>--}}
		{{--<div class="goodsName">{{$order->pro_name}}</div>--}}
		{{--<div class="price"> {{$order->qty}} </div>--}}
		{{--<div class="count">{{$order->freight}}</div>--}}
		{{--<div class="freight">{{$order->amount}}</div>--}}
		{{--@if($order->order_status =='已完成')--}}
		{{--<div class="operation"><span class="finish">售后服务</span></div>--}}
		{{--@elseif($order->order_status =='已取消')--}}
		{{--<div class="operation"><span class="finish">已取消</span></div>--}}
		{{--@elseif($order->order_status =='已确认')--}}
		{{--<div class="operation" data-id="{{isset($order->order_id)?$order->order_id:""}}">--}}
		{{--<span class="finish" onclick="finishOrder(this)">完成</span>--}}
		{{--</div>--}}
		{{--@else--}}
		{{--<div class="operation" data-id="{{isset($order->order_id)?$order->order_id:""}}">--}}
		{{--<span class="cancel" onclick="cancelOrder(this)">取消</span>--}}
		{{--<span class="spacing">/</span>--}}
		{{--<span class="finish" onclick="confirmOrder(this)">确认</span>--}}
		{{--</div>--}}
		{{--@endif--}}
		{{--</li>--}}
		{{--@endforeach--}}
		{{--</ul>--}}
		{{--</div>--}}
	{{--</div>--}}
	<div class="modifiedMode" style="{{ $errors->count()>0 ? 'display:block' : '' }}">
		<div class="modeTable">
			<div class="modeTableCell">
				<form method="post" action="{{url('launchOrder')}}">
					{{csrf_field()}}
					<div class="modified">
						<div class="orderInfo1">
							<div class="orderInfoTtl">
								<div class="orderOpen">发布订单</div>
								<img src="{{url('images/userCenter/close.png')}}">
							</div>
							<div class="info">
								<ul class="topInfo">
									<div>
										<li class="form-group formItem{{ $errors->has('launch_order_name') ? ' has-error' : '' }}">
											<label class="infoTopic"><img src="">商品名称：</label>
											<div class="form-control ">
												<input class="infoInput" name="launch_order_name" type="text">
												@if ($errors->has('launch_order_name'))
													<span class="help-block">
                                                    <strong>{{ $errors->first('launch_order_name') }}</strong>
                                                </span>
												@endif
											</div>
											<br style="clear: both;"/>
										</li>
										<li class="form-group formItem{{ $errors->has('amount') ? ' has-error' : '' }} right-input">
											<label class="infoTopic"><img src="">需求量：</label>
											<div class="form-control ">
												<input class="infoInput" type="text" name="amount">
												@if ($errors->has('amount'))
													<span class="help-block">
                                                    <strong>{{ $errors->first('amount') }}</strong>
                                                </span>
												@endif
											</div>
											<br style="clear: both;"/>
										</li>
										<div class="clear"></div>
									</div>
									<div>
										<li  class="form-group formItem{{ $errors->has('limit_time_from') ? ' has-error' : '' }}">
											<label class="infoTopic"><img src="">发布时限开始：</label>
											<div class="form-control ">
												<input class="infoInput" name="limit_time_from" id="timeFrom" type="text">
												@if ($errors->has('limit_time_from'))
													<span class="help-block">
                                                    <strong>{{ $errors->first('limit_time_from') }}</strong>
                                                </span>
												@endif
											</div>
											<br style="clear: both;"/>
										</li>
										<li  class="form-group formItem {{ $errors->has('limit_time_to') ? ' has-error' : '' }} right-input">
											<label class="infoTopic"><img src="">发布时限结束：</label>
											<div class="form-control">
												<input class="infoInput" id="timeTo" type="text" name="limit_time_to">
												@if ($errors->has('limit_time_to'))
													<span class="help-block">
                                                    <strong>{{ $errors->first('limit_time_to') }}</strong>
                                                </span>
												@endif
											</div>
											<br style="clear: both;"/>
										</li>
										<div class="clear"></div>
									</div>
									<div>
										<li  class="form-group formItem {{ $errors->has('shelf_life') ? ' has-error' : '' }}">
											<label class="infoTopic"><img src="">保质期限：</label>
											<div class="form-control">
												<input class="infoInput" name="shelf_life" type="text">
												@if ($errors->has('shelf_life'))
													<span class="help-block">
                                                    <strong>{{ $errors->first('shelf_life') }}</strong>
                                                </span>
												@endif
											</div>
											<br style="clear: both;"/>
										</li>
										<li  class="form-group formItem {{ $errors->has('madein') ? ' has-error' : '' }} right-input">
											<label class="infoTopic"><img src="">产地：</label>
											<div class="form-control">
												<select class="infoInput" name="madein">
													@foreach($madein as $value)
														<option value="{{$value->madein_name}}">{{$value->madein_text}}</option>
													@endforeach
												</select>
												@if ($errors->has('madein'))
													<span class="help-block">
                                                    <strong>{{ $errors->first('madein') }}</strong>
                                                </span>
												@endif
											</div>
											<br style="clear: both;"/>
										</li>
										<div class="clear"></div>
									</div>
									<div>
										<li  class="form-group formItem {{ $errors->has('per_weight') ? ' has-error' : '' }}">
											<label class="infoTopic"><img src="">单只重量：</label>
											<div class="form-control">
												<input class="infoInput" name="per_weight" type="text">
												@if ($errors->has('shelf_life'))
													<span class="help-block">
                                                    <strong>{{ $errors->first('per_weight') }}</strong>
                                                </span>
												@endif
											</div>
											<br style="clear: both;"/>
										</li>
										<li  class="form-group formItem {{ $errors->has('per_length') ? ' has-error' : '' }} right-input">
											<label class="infoTopic"><img src="">单只长度：</label>
											<div class="form-control">
												<input class="infoInput" name="per_length" type="text">
												@if ($errors->has('per_length'))
													<span class="help-block">
                                                    <strong>{{ $errors->first('per_length') }}</strong>
                                                </span>
												@endif
											</div>
											<br style="clear: both;"/>
										</li>
										<div class="clear"></div>
									</div>
									<div>
										<li  class="form-group formItem {{ $errors->has('oil_content') ? ' has-error' : '' }}">
											<label class="infoTopic"><img src="">原料油皮量：</label>
											<div class="form-control">
												<input class="infoInput" name="oil_content" type="text">
												@if ($errors->has('oil_content'))
													<span class="help-block">
                                                    <strong>{{ $errors->first('oil_content') }}</strong>
                                                </span>
												@endif
											</div>
											<br style="clear: both;"/>
										</li>
										<li  class="form-group formItem {{ $errors->has('water_content') ? ' has-error' : '' }} right-input">
											<label class="infoTopic"><img src="">原料肉水分含量：</label>
											<div class="form-control">
												<input class="infoInput" name="water_content" type="text">
												@if ($errors->has('water_content'))
													<span class="help-block">
                                                    <strong>{{ $errors->first('water_content') }}</strong>
                                                </span>
												@endif
											</div>
											<br style="clear: both;"/>
										</li>
										<div class="clear"></div>
									</div>

									<li  class="form-group formItem {{ $errors->has('launch_order_detail') ? ' has-error' :
                                    '' }}" style="width: 100%;">
										<label class="infoTopic" style="width: 20%;"><img src="">其他需求：</label>
										<div class="form-control" style="width: 80%;">
											<textarea class="otherNeed" name="launch_order_detail"></textarea>
											@if ($errors->has('water_content'))
												<span class="help-block">
                                                    <strong>{{ $errors->first('water_content') }}</strong>
                                                </span>
											@endif
										</div>
										<br style="clear: both;"/>
									</li>
									<br style="clear: both;"/>
								</ul>
							</div>
						</div>
						<div class="btn">
							<div class="protocol"><img class="checkbox" src="{{url('images/userCenter/checked.png')}}" data-check="selected"><span>i冻品食品安检标准</span></div>
							<span>
							<button class="confirm" type="submit">发布</button>
						</span>
						</div>
					</div>
				</form>
			</div>
		</div>
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
									<span class="form-group-name">供应商：</span><span class="form-group-text company_id"></span><span class="supply_phone company_phone"></span>
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
								{{--<li class="form-group product_freight">--}}
									{{--<span class="form-group-name">运费：</span><span class="form-group-text freight"></span>--}}
									{{--<div class="clear"></div>--}}
								{{--</li>--}}
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
								<li class="form-group recive_address">
									<span class="form-group-name">收货地址</span><span class="form-group-text address"></span>
									<div class="clear"></div>
								</li>
								<div class="clear"></div>
							</ul>
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
								<li class="form-group order_create">
									<span class="form-group-name">创建时间：</span><span class="form-group-text order_time"></span>
									<div class="clear"></div>
								</li>
								<li class="form-group order_confirm">
									<label class="form-group-name">确认时间：</label><span class="form-group-text confirm_time"></span>
									<div class="clear"></div>
								</li>
								<li class="form-group order_finish">
									<span class="form-group-name">完成时间：</span><span class="form-group-text finish_time"></span>
									<div class="clear"></div>
								</li>
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
	<div class="agreementMode">
		<div class="modeTable">
			<div class="modeTableCell">
				<div class="agreement">
					<div class="agreementTtl">i冻品食品安检标准<img src="{{url('images/userCenter/close.png')}}"></div>
					<div class="agreementContent">
						<div class="pack">
							<div class="packTtl">包装：</div>
							<div class="packVal">使用洁净、符合食品卫生要求的内外包装</div>
							<div class="clear"></div>
						</div>
						<div class="sign">
							<div class="signTtl">标志：</div>
							<div class="signVal">注明产品名称、制造厂名、厂址、净重、批号、生产日期、保质期、执行标准号、规格及等级。</div>
							<div class="clear"></div>
						</div>
						<div class="transport">
							<div class="transportTtl">运输：</div>
							<div class="transportVal">
								采用洁净车辆运输；保持车内阴凉通风且无动物存在；运输过程中须防尘、防蝇，严防暴晒和雨淋；严禁与有毒、有害物质混装混运，并随车提供车辆消毒记录。
							</div>
							<div class="clear"></div>
						</div>
						<div class="stockpile">
							<div class="stockpileTtl">储存与保质期：</div>
							<div class="stockpileVal">应储存在低于零下18摄氏度的冷冻库内，送达我司的产品从产品生产日期到我司收货日期的时间长度不得超过产品的保质期限总长的一半。
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	{{--<div class="modifiedMode" style="{{ $errors->count()>0 ? 'display:block' : '' }}">--}}
	{{--<div class="modeTable">--}}
	{{--<div class="modeTableCell">--}}
	{{--<form method="post" action="{{url('launchOrder')}}">--}}
	{{--{{csrf_field()}}--}}
	{{--<div class="modified">--}}
	{{--<div class="orderInfo">--}}
	{{--<div class="orderInfoTtl">--}}
	{{--<div class="orderOpen">发布订单</div>--}}
	{{--<img src="{{url('images/userCenter/close.png')}}">--}}
	{{--</div>--}}
	{{--<div class="info">--}}
	{{--<ul class="topInfo">--}}
	{{--<li class="form-group {{ $errors->has('launch_order_name') ? ' has-error' : '' }}">--}}
	{{--<label class="infoTopic"><img src="">商品名称：</label>--}}
	{{--<div class="form-control">--}}
	{{--<input class="infoInput" name="launch_order_name" type="text">--}}
	{{--@if ($errors->has('launch_order_name'))--}}
	{{--<span class="help-block">--}}
	{{--<strong>{{ $errors->first('launch_order_name') }}</strong>--}}
	{{--</span>--}}
	{{--@endif--}}
	{{--</div>--}}
	{{--<br style="clear: both;"/>--}}
	{{--</li>--}}
	{{--<li class="form-group right-input {{ $errors->has('amount') ? ' has-error' : '' }}">--}}
	{{--<label class="infoTopic"><img src="">需求量：</label>--}}
	{{--<div class="form-control">--}}
	{{--<input class="infoInput" type="text" name="amount">--}}
	{{--@if ($errors->has('amount'))--}}
	{{--<span class="help-block">--}}
	{{--<strong>{{ $errors->first('amount') }}</strong>--}}
	{{--</span>--}}
	{{--@endif--}}
	{{--</div>--}}
	{{--<br style="clear: both;"/>--}}
	{{--</li>--}}
	{{--<li  class="form-group {{ $errors->has('limit_time_from') ? ' has-error' : '' }}">--}}
	{{--<label class="infoTopic"><img src="">发布时限开始：</label>--}}
	{{--<div class="form-control">--}}
	{{--<input class="infoInput"--}}
	{{--name="limit_time_from"--}}
	{{--id="timeFrom"--}}
	{{--type="text">--}}
	{{--@if ($errors->has('limit_time_from'))--}}
	{{--<span class="help-block">--}}
	{{--<strong>{{ $errors->first('limit_time_from') }}</strong>--}}
	{{--</span>--}}
	{{--@endif--}}
	{{--</div>--}}
	{{--<br style="clear: both;"/>--}}
	{{--</li>--}}
	{{--<li  class="form-group right-input {{ $errors->has('limit_time_to') ? ' has-error' : '' }}">--}}
	{{--<label class="infoTopic"><img src="">发布时限结束：</label>--}}
	{{--<div class="form-control">--}}
	{{--<input class="infoInput" id="timeTo" type="text"--}}
	{{--name="limit_time_to">--}}
	{{--@if ($errors->has('limit_time_to'))--}}
	{{--<span class="help-block">--}}
	{{--<strong>{{ $errors->first('limit_time_to') }}</strong>--}}
	{{--</span>--}}
	{{--@endif--}}
	{{--</div>--}}
	{{--<br style="clear: both;"/>--}}
	{{--</li>--}}
	{{--<li  class="form-group {{ $errors->has('shelf_life') ? ' has-error' : '' }}">--}}
	{{--<label class="infoTopic"><img src="">保质期限：</label>--}}
	{{--<div class="form-control">--}}
	{{--<input class="infoInput"--}}
	{{--name="shelf_life"--}}
	{{--type="text">--}}
	{{--@if ($errors->has('shelf_life'))--}}
	{{--<span class="help-block">--}}
	{{--<strong>{{ $errors->first('shelf_life') }}</strong>--}}
	{{--</span>--}}
	{{--@endif--}}
	{{--</div>--}}
	{{--<br style="clear: both;"/>--}}
	{{--</li>--}}
	{{--<li  class="form-group right-input {{ $errors->has('madein') ? ' has-error' : '' }}">--}}
	{{--<label class="infoTopic"><img src="">产地：</label>--}}
	{{--<div class="form-control">--}}
	{{--<select class="infoInput" name="madein">--}}
	{{--@foreach($madein as $value)--}}
	{{--<option value="{{$value->madein_name}}">{{$value->madein_text}}</option>--}}
	{{--@endforeach--}}
	{{--</select>--}}
	{{--@if ($errors->has('madein'))--}}
	{{--<span class="help-block">--}}
	{{--<strong>{{ $errors->first('madein') }}</strong>--}}
	{{--</span>--}}
	{{--@endif--}}
	{{--</div>--}}
	{{--<br style="clear: both;"/>--}}
	{{--</li>--}}
	{{--<li  class="form-group {{ $errors->has('per_weight') ? ' has-error' : '' }}">--}}
	{{--<label class="infoTopic"><img src="">单只重量：</label>--}}
	{{--<div class="form-control">--}}
	{{--<input class="infoInput"--}}
	{{--name="per_weight"--}}
	{{--type="text">--}}
	{{--@if ($errors->has('shelf_life'))--}}
	{{--<span class="help-block">--}}
	{{--<strong>{{ $errors->first('per_weight') }}</strong>--}}
	{{--</span>--}}
	{{--@endif--}}
	{{--</div>--}}
	{{--<br style="clear: both;"/>--}}
	{{--</li>--}}
	{{--<li  class="form-group right-input {{ $errors->has('per_length') ? ' has-error' : '' }}">--}}
	{{--<label class="infoTopic"><img src="">单只长度：</label>--}}
	{{--<div class="form-control">--}}
	{{--<input class="infoInput"--}}
	{{--name="per_length"--}}
	{{--type="text">--}}
	{{--@if ($errors->has('per_length'))--}}
	{{--<span class="help-block">--}}
	{{--<strong>{{ $errors->first('per_length') }}</strong>--}}
	{{--</span>--}}
	{{--@endif--}}
	{{--</div>--}}
	{{--<br style="clear: both;"/>--}}
	{{--</li>--}}
	{{--<li  class="form-group {{ $errors->has('oil_content') ? ' has-error' : '' }}">--}}
	{{--<label class="infoTopic"><img src="">原料油皮量：</label>--}}
	{{--<div class="form-control">--}}
	{{--<input class="infoInput"--}}
	{{--name="oil_content"--}}
	{{--type="text">--}}
	{{--@if ($errors->has('oil_content'))--}}
	{{--<span class="help-block">--}}
	{{--<strong>{{ $errors->first('oil_content') }}</strong>--}}
	{{--</span>--}}
	{{--@endif--}}
	{{--</div>--}}
	{{--<br style="clear: both;"/>--}}
	{{--</li>--}}
	{{--<li  class="form-group right-input {{ $errors->has('water_content') ? ' has-error' : '' }}">--}}
	{{--<label class="infoTopic"><img src="">原料肉水分含量：</label>--}}
	{{--<div class="form-control">--}}
	{{--<input class="infoInput"--}}
	{{--name="water_content"--}}
	{{--type="text">--}}
	{{--@if ($errors->has('water_content'))--}}
	{{--<span class="help-block">--}}
	{{--<strong>{{ $errors->first('water_content') }}</strong>--}}
	{{--</span>--}}
	{{--@endif--}}
	{{--</div>--}}
	{{--<br style="clear: both;"/>--}}
	{{--</li>--}}
	{{--<li  class="form-group {{ $errors->has('launch_order_detail') ? ' has-error' :--}}
	{{--'' }}" style="width: 100%;">--}}
	{{--<label class="infoTopic" style="width: 20%;"><img src="">其他需求：</label>--}}
	{{--<div class="form-control" style="width: 80%;">--}}
	{{--<textarea class="otherNeed" name="launch_order_detail"></textarea>--}}
	{{--@if ($errors->has('water_content'))--}}
	{{--<span class="help-block">--}}
	{{--<strong>{{ $errors->first('water_content') }}</strong>--}}
	{{--</span>--}}
	{{--@endif--}}
	{{--</div>--}}
	{{--<br style="clear: both;"/>--}}
	{{--</li>--}}
	{{--<br style="clear: both;"/>--}}
	{{--</ul>--}}
	{{--</div>--}}
	{{--</div>--}}
	{{--<div class="btn">--}}
	{{--<div class="protocol"><img class="checkbox" src="{{url('images/userCenter/checked.png')}}"--}}
	{{--data-check="selected"><span>i冻品食品安检标准</span></div>--}}
	{{--<span>--}}
	{{--<button class="confirm" type="submit">发布</button>--}}
	{{--</span>--}}
	{{--</div>--}}
	{{--</div>--}}
	{{--</form>--}}
	{{--</div>--}}
	{{--</div>--}}
	{{--</div>--}}
	{{--<div class="agreementMode">--}}
	{{--<div class="modeTable">--}}
	{{--<div class="modeTableCell">--}}
	{{--<div class="agreement">--}}
	{{--<div class="agreementTtl">i冻品食品安检标准<img src="{{url('images/userCenter/close.png')}}"></div>--}}
	{{--<div class="agreementContent">--}}
	{{--<div class="pack">--}}
	{{--<div class="packTtl">包装：</div>--}}
	{{--<div class="packVal">使用洁净、符合食品卫生要求的内外包装</div>--}}
	{{--<div class="clear"></div>--}}
	{{--</div>--}}
	{{--<div class="sign">--}}
	{{--<div class="signTtl">标志：</div>--}}
	{{--<div class="signVal">注明产品名称、制造厂名、厂址、净重、批号、生产日期、保质期、执行标准号、规格及等级。</div>--}}
	{{--<div class="clear"></div>--}}
	{{--</div>--}}
	{{--<div class="transport">--}}
	{{--<div class="transportTtl">运输：</div>--}}
	{{--<div class="transportVal">--}}
	{{--采用洁净车辆运输；保持车内阴凉通风且无动物存在；运输过程中须防尘、防蝇，严防暴晒和雨淋；严禁与有毒、有害物质混装混运，并随车提供车辆消毒记录。--}}
	{{--</div>--}}
	{{--<div class="clear"></div>--}}
	{{--</div>--}}
	{{--<div class="stockpile">--}}
	{{--<div class="stockpileTtl">储存与保质期：</div>--}}
	{{--<div class="stockpileVal">应储存在低于零下18摄氏度的冷冻库内，送达我司的产品从产品生产日期到我司收货日期的时间长度不得超过产品的保质期限总长的一半。--}}
	{{--</div>--}}
	{{--<div class="clear"></div>--}}
	{{--</div>--}}
	{{--</div>--}}
	{{--</div>--}}
	{{--</div>--}}
	{{--</div>--}}
	{{--</div>--}}
@endsection

@section('js')
	<script type="text/javascript" src="{{url('js/PublicDomain.js')}}"></script>
	<script type="text/javascript" src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="{{url('js/userCenter/index.js')}}"></script>
	<script type="text/javascript" src="{{url('js/laydate.js')}}"></script>
	<script type="text/javascript">
		laydate({
			elem: "#timeFrom",
			fixed: true
		});
		laydate({
			elem: "#timeTo",
			fixed: true
		});
	</script>
@endsection