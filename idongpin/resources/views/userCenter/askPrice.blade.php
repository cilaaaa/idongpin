@extends('layouts.user_center')
@section('csssheet')
    <link rel="stylesheet" type="text/css" href="{{url('css/userCenter/askPrice.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/public/laydateCore.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/public/laydate.css')}}">
@endsection
@section('rightSideContent')
    <div class="topMode">
        <div class="pageNav"><span>></span><span>我的询价单</span></div>
       <!--  <div class="selectOrderTime">
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
                        <span class="infoTtl">下单时间：</span><input class="infoVal" onclick="laydate()" type="text"><span
                                class="space">至</span><input class="infoVal" type="text" onclick="laydate()">
                        <span class="conditionSearch"><input class="conditionSearchBtn" type="submit" value="查询"></span>
                    </div>
                </div>
            </form>
        </div>
        <div class="selectOrderStatus">
            <span class="infoTtl">订单状态：</span><span class="status statusActive">全部</span><span class="status">未报价</span><span
                    class="status">已报价</span><span class="status">已过期</span>
        </div> -->
    </div>
    <div class="afterThreeMonth">
        <div class="orderTab">
            <ul class="th">
                <li class="goodsName">货品名称</li>
                <li class="merchant">商家</li>
                <li class="offer">报价</li>
                <li class="freight">运费</li>
                <li class="operation">操作</li>
            </ul>
            <ul>
                @foreach($launchorders as $key => $value)
                    <li class="tr" data-order="{{$value->launch_order_id}}">
                        <div class="goodsName">{{$value->launch_order_name}}</div>
                        <div class="merchant" data-count="{{$value->quote_count}}">
                            @if($value->quote_count != 0)
                                <img src="{{url('images/userCenter/down_01.png')}}">
                            @endif
                            {{$value->quote_status}}
                        </div>
                        <div class="offer"></div>
                        <div class="freight"></div>
                        <div class="operation">
                            @if($value->canceled_at == null)
                                <span class="cancel"
                                      data-launchid="{{$value->launch_order_id}}"onclick="cancelAskPrice(this)
                                ;">取消</span>
                                <span class="spacing">/</span>
                                <span class="finish" data-launchid="{{$value->launch_order_id}}">详情</span>
                            @else
                                <span class="cancel-span">已取消</span>
                            @endif
                        </div>

                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="beforeThreeMonth">
        <div class="orderTab">
            <ul class="th">
                <li class="goodsName">货品名称</li>
                <li class="merchant">商家</li>
                <li class="offer">报价</li>
                <li class="freight">运费</li>
                <li class="operation">操作</li>
            </ul>
            <ul>
                <li class="tr">
                    <div class="goodsName">货物名称</div>
                    <div class="merchant">
                        <img src="{{url('images/userCenter/down_01.png')}}">
                    </div>
                    <div class="offer">¥2000.00</div>
                    <div class="freight">2000</div>
                    <div class="operation"><span class="cancel">取消</span><span class="spacing">/</span><span
                                class="finish">详情</span></div>
                </li>
            </ul>
        </div>
    </div>
    <div class="detailMode">
        <div class="detail">
            <div class="orderInfo">
                <form>
                    <div class="orderInfoTtl">
                        <span class="askPriceOrder">
                            <span>询价单：</span>
                            <span class="launch_order_id"></span>
                        </span>
                        <span class="publishDate">
                            <span>发布日期：</span>
                            <span class="created_at"></span>
                        </span>
                        <img src="{{url('images/userCenter/close.png')}}">
                    </div>
                    <div class="infowrap">
                        <ul class="info">
                            <li class="list">
                                <label>商品名：</label>
                                <span class="launch_order_name">牛跟腱</span>
                                <div class="form-control">
                                    <input type="text" name="launch_order_name" value="">
                                     <span class="help-block ">
                                            <strong></strong>
                                     </span>
                                </div>
                                <div class="clear"></div>
                            </li>
                            <li class="list">
                                <label>商品数量：</label>
                                <span class="amount">牛跟腱</span>
                                <div class="form-control">
                                    <input type="text" name="amount" value="">
                                    <span class="help-block ">
                                            <strong></strong>
                                     </span>
                                </div>
                                <div class="clear"></div>
                            </li>
                            <li class="list">
                                <label>发布时间：</label>
                                <span class="limit_time_from">牛跟腱</span>
                                <div class="form-control">
                                    <input id="timeFrom" type="text" name="limit_time_from" value="">
                                    <span class="help-block ">
                                            <strong></strong>
                                     </span>
                                </div>
                                <div class="clear"></div>
                            </li>
                            <li class="list">
                                <label>订单结束时间：</label>
                                <span class="limit_time_to">牛跟腱</span>
                                <div class="form-control">
                                    <input id="timeTo" type="text" name="limit_time_to" value="">
                                    <span class="help-block ">
                                            <strong></strong>
                                     </span>
                                </div>
                                <div class="clear"></div>
                            </li>
                            <li class="list">
                                <label>含油量：</label>
                                <span class="oil_content">牛跟腱</span>
                                <div class="form-control">
                                    <input type="text" name="oil_content" value="">
                                    <span class="help-block ">
                                            <strong></strong>
                                     </span>
                                </div>
                                <div class="clear"></div>
                            </li>
                            <li class="list">
                                <label>含水量：</label>
                                <span class="water_content">牛跟腱</span>
                                <div class="form-control">
                                    <input type="text" name="water_content" value="">
                                    <span class="help-block ">
                                            <strong></strong>
                                     </span>
                                </div>
                                <div class="clear"></div>
                            </li>
                            <li class="list">
                                <label>保质期：</label>
                                <span class="shelf_life">牛跟腱</span>
                                <div class="form-control">
                                    <input type="text" name="shelf_life" value="">
                                    <span class="help-block ">
                                            <strong></strong>
                                     </span>
                                </div>
                                <div class="clear"></div>
                            </li>
                            <li class="list">
                                <label>单只重量：</label>
                                <span class="per_weight">牛跟腱</span>
                                <div class="form-control">
                                    <input type="text" name="per_weight" value="">
                                    <span class="help-block ">
                                            <strong></strong>
                                     </span>
                                </div>
                                <div class="clear"></div>
                            </li>
                            <li class="list">
                                <label>单只长度：</label>
                                <span class="per_length">牛跟腱</span>
                                <div class="form-control">
                                    <input type="text" name="per_length" value="">
                                    <span class="help-block ">
                                            <strong></strong>
                                     </span>
                                </div>
                                <div class="clear"></div>
                            </li>
                            <li class="list">
                                <label>产地：</label>
                                <span class="madein">牛跟腱</span>
                                <select name="madein">
                                    @foreach($madein as $value)
                                        <option value="{{$value->madein_name}}">{{$value->madein_text}}</option>
                                    @endforeach
                                </select>
                            </li>
                            <li class="list">
                                <label>发布者：</label>
                                <span class="user_id unedit">牛跟腱</span>
                            </li>
                            <li class="list">
                                <label>审核状态：</label>
                                <span class="review_status unedit">未完成</span>
                            </li>
                            <li class="list">
                                <label>审核时间：</label>
                                <span class="review_time unedit">未完成</span>
                            </li>
                            <li class="list">
                                <label>审核人：</label>
                                <span class="review_account unedit">未完成</span>
                            </li>
                            <br style="clear: both">
                        </ul>
                    </div>
                </form>
            </div>
            <div class="offerInfo">
                <ul>
                    <li class="offer offerTh">
                        <span class="select selectTh"></span>
                        <span class="Business BusinessTh">商家</span>
                        <span class="quote quoteTh">报价</span>
                        <span class="carriage carriageTh">运费</span>
                    </li>
                </ul>
                <input type="hidden" name="quote_id" id="quote_id">
            </div>
            <div class="btn order">
				<span>
					<button class="confirm" onclick="makeOrder()">确定</button>
				</span>
            </div>
            <div class="btn update" style="display: none;">
				<span>
					<button class="modify">取消</button>
					<button class="confirm" onclick="sendUpdatelaunchOrderAjax();">保存</button>
				</span>
            </div>
        </div>
    </div>

    <div class="agreementMode">
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
                    <div class="transportVal">采用洁净车辆运输；保持车内阴凉通风且无动物存在；运输过程中须防尘、防蝇，严防暴晒和雨淋；严禁与有毒、有害物质混装混运，并随车提供车辆消毒记录。
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="stockpile">
                    <div class="stockpileTtl">储存与保质期：</div>
                    <div class="stockpileVal">应储存在低于零下18摄氏度的冷冻库内，送达我司的产品从产品生产日期到我司收货日期的时间长度不得超过产品的保质期限总长的一半。</div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{url('js/PublicDomain.js')}}"></script>
    <script type="text/javascript" src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="{{url('js/userCenter/askPrice.js')}}"></script>
    <script type="text/javascript" src="{{url('js/laydate.js')}}"></script>
    <script type="text/javascript">
        laydate({
            elem: "#timeFrom",
            fixed: true,
            istoday: true
        });
        laydate({
            elem: "#timeTo",
            fixed: true,
            istoday: true
        });

    </script>
@endsection