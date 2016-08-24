@extends('layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('css/findorder/findorder.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/product/productPageNav.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/public/laydateCore.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/public/laydate.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="orderReleased">
            <div class="release">
                <img src="{{url('images/findorder/showOrderBG.png')}}">
                <span class="showOrder">还在等什么，快点秀出你的订单</span>
                @if(Auth::guest())
                    <span class="releaseBtn" onclick="window.location.href='{{url('/login')}}'">我要发布订单</span>
                @else
                    <span class="releaseBtn" onclick="releaseOrder()">我要发布订单</span>
                @endif
            </div>
            <div class="tooltip">
                <div class="tip">
                    <div class="topTipBar"><img src="{{url('images/findorder/close.png')}}"></div>
                    <div class="bottomTipBar">
                        <div class="jurisdiction"><img
                                    src="{{url('images/findorder/sadface.png')}}"><span>对不起，您还没有权限！</span></div>
                        <div class="qualification"><span>请申请企业资质，并通过认证后前来抢单</span></div>
                    </div>
                </div>
            </div>
            <div class="recomendOrders">
                @foreach($launchorders as $key=> $value)
                    @if($key == 0)
                        <div class="leftOrder" onclick="SureCompany();">
                            <img class="buyPic" src="{{url('images/findorder/buy_01.png')}}">
                            <div class="order">
                                <div class="leftPart">
                                    <div class="describe">{{isset($value->launch_order_name)?$value->launch_order_name:""}}</div>
                                    <div class="detailNeed">具体需求:</div>
                                    <ul class="needs">
                                        <li class="brandNeed">
                                            <img class="dot" src="{{url('images/findorder/dot.png')}}"><span
                                                    class="needTtl">品牌：</span><span class="needVal">双汇</span>
                                        </li>
                                        <li class="warrantyNeed">
                                            <img class="dot" src="{{url('images/findorder/dot.png')}}"><span class="needTtl">保质期：</span><span
                                                    class="needVal">{{isset($value->shelf_life)?$value->shelf_life:""}}</span>
                                        </li>
                                        <li class="otherNeed">
                                            <img class="dot" src="{{url('images/findorder/dot.png')}}"><span class="needTtl">其他需求：</span><span
                                                    class="needVal">{{isset($value->launch_order_detail)?$value->launch_order_detail:""}}</span>
                                        </li>
                                    </ul>
                                    <div class="status"><span class="needTtl">交易状态：</span><span class="needVal">买家比价中</span>
                                    </div>
                                </div>
                                <div class="rightPart">
                                    <div class="topPart">
                                        <img src="{{url('images/findorder/buyAway.png')}}">
                                    </div>
                                    <div class="bottomPart"><img
                                                src="{{url('images/findorder/clock_01.png')}}"><span>一天前发布</span></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    @endif
                @endforeach
                    @foreach($launchorders as $key=> $value)
                        @if($key == 1)
                            <div class="rightOrder" onclick="SureCompany();">
                                <img class="buyPic" src="{{url('images/findorder/buy_01.png')}}">
                                <div class="order">
                                    <div class="leftPart">
                                        <div class="describe">{{isset($value->launch_order_name)?$value->launch_order_name:""}}</div>
                                        <div class="detailNeed">具体需求:</div>
                                        <ul class="needs">
                                            <li class="brandNeed">
                                                <img class="dot" src="{{url('images/findorder/dot.png')}}"><span
                                                        class="needTtl">品牌：</span><span class="needVal">双汇</span>
                                            </li>
                                            <li class="warrantyNeed">
                                                <img class="dot" src="{{url('images/findorder/dot.png')}}"><span class="needTtl">保质期：</span><span
                                                        class="needVal">{{isset($value->shelf_life)?$value->shelf_life:""}}</span>
                                            </li>
                                            <li class="otherNeed">
                                                <img class="dot" src="{{url('images/findorder/dot.png')}}"><span class="needTtl">其他需求：</span><span
                                                        class="needVal">{{isset($value->launch_order_detail)?$value->launch_order_detail:""}}</span>
                                            </li>
                                        </ul>
                                        <div class="status"><span class="needTtl">交易状态：</span><span class="needVal">买家比价中</span>
                                        </div>
                                    </div>
                                    <div class="rightPart">
                                        <div class="topPart">
                                            <img src="{{url('images/findorder/buyAway.png')}}">
                                        </div>
                                        <div class="bottomPart"><img
                                                    src="{{url('images/findorder/clock_01.png')}}"><span>{{isset($value->order_time_status)?$value->order_time_status:""}}发布</span></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                {{--<div class="rightOrder">--}}
                    {{--<img class="buyPic" src="{{url('images/findorder/buy_01.png')}}">--}}
                    {{--<div class="order">--}}
                        {{--<div class="leftPart">--}}
                            {{--<div class="describe">进口澳洲牛眼肉</div>--}}
                            {{--<div class="detailNeed">具体需求</div>--}}
                            {{--<ul class="needs">--}}
                                {{--<li class="brandNeed">--}}
                                    {{--<img class="dot" src="{{url('images/findorder/dot.png')}}"><span--}}
                                            {{--class="needTtl">品牌：</span><span class="needVal">双汇</span>--}}
                                {{--</li>--}}
                                {{--<li class="warrantyNeed">--}}
                                    {{--<img class="dot" src="{{url('images/findorder/dot.png')}}"><span class="needTtl">保质期：</span><span--}}
                                            {{--class="needVal">24个月</span>--}}
                                {{--</li>--}}
                                {{--<li class="otherNeed">--}}
                                    {{--<img class="dot" src="{{url('images/findorder/dot.png')}}"><span class="needTtl">其他需求：</span><span--}}
                                            {{--class="needVal">精肉比75%</span>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="status"><span class="needTtl">交易状态：</span><span class="needVal">买家比价中</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="rightPart">--}}
                            {{--<div class="topPart">--}}
                                {{--<img src="{{url('images/findorder/buyAway.png')}}">--}}
                            {{--</div>--}}
                            {{--<div class="bottomPart"><img--}}
                                        {{--src="{{url('images/findorder/clock_01.png')}}"><span>一天前发布</span></div>--}}
                        {{--</div>--}}
                        {{--<div class="clear"></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="clear"></div>
            </div>
            <div class="orders">
                <ul>
                    @foreach($launchorders as $key=>$value)
                        @if($key>=2)
                            <li class="indent" onclick="SureCompany();">
                                <img src="{{url('images/findorder/buy_02.png')}}">
                                <div class="indentContent">
                                    <div class="indentTop">
                                        <div class="goodsDescribe">{{isset($value->launch_order_name)?$value->launch_order_name:""}}</div>
                                        <div class="specificNeeds">具体需求</div>
                                        <div class="trademark"><span class="needTtl">含油量：</span><span class="needVal">{{isset($value->oil_content)?$value->oil_content:""}}</span>
                                        </div>
                                        <div class="shelfLife"><span class="needTtl">保质期：</span><span
                                                    class="needVal">{{isset($value->shelf_life)?$value->shelf_life:""}}</span></div>
                                        <div class="elseNeeds"><span class="needTtl">其他需求：</span><span
                                                    class="needVal">{{isset($value->launch_order_detail)?$value->launch_order_detail:""}}</span></div>

                                    </div>
                                    <div class="indentBottom">
                                        <div class="publishDate"><img
                                                    src="{{url('images/findorder/clock_02.png')}}"><span>{{isset($value->order_time_status)?$value->order_time_status:""}}</span></div>
                                        <div class="immediatelyRob">马上抢</div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                    {{--<li class="indent">--}}
                        {{--<img src="{{url('images/findorder/buy_02.png')}}">--}}
                        {{--<div class="indentContent">--}}
                            {{--<div class="indentTop">--}}
                                {{--<div class="goodsDescribe">进口澳洲牛眼肉</div>--}}
                                {{--<div class="specificNeeds">具体需求</div>--}}
                                {{--<div class="trademark"><span class="needTtl">品牌：</span><span class="needVal">双汇</span>--}}
                                {{--</div>--}}
                                {{--<div class="shelfLife"><span class="needTtl">保质期：</span><span--}}
                                            {{--class="needVal">24个月</span></div>--}}
                                {{--<div class="elseNeeds"><span class="needTtl">其他需求：</span><span--}}
                                            {{--class="needVal">精肉比75%</span></div>--}}
                                {{--<div class="state"><span class="needTtl">交易状态</span><span class="needVal">买家比家中</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="indentBottom">--}}
                                {{--<div class="publishDate"><img--}}
                                            {{--src="{{url('images/findorder/clock_02.png')}}"><span>一天前发布</span></div>--}}
                                {{--<div class="immediatelyRob">马上抢</div>--}}
                                {{--<div class="clear"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<li class="indent">--}}
                        {{--<img src="{{url('images/findorder/buy_02.png')}}">--}}
                        {{--<div class="indentContent">--}}
                            {{--<div class="indentTop">--}}
                                {{--<div class="goodsDescribe">进口澳洲牛眼肉</div>--}}
                                {{--<div class="specificNeeds">具体需求</div>--}}
                                {{--<div class="trademark"><span class="needTtl">品牌：</span><span class="needVal">双汇</span>--}}
                                {{--</div>--}}
                                {{--<div class="shelfLife"><span class="needTtl">保质期：</span><span--}}
                                            {{--class="needVal">24个月</span></div>--}}
                                {{--<div class="elseNeeds"><span class="needTtl">其他需求：</span><span--}}
                                            {{--class="needVal">精肉比75%</span></div>--}}
                                {{--<div class="state"><span class="needTtl">交易状态</span><span class="needVal">买家比家中</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="indentBottom">--}}
                                {{--<div class="publishDate"><img--}}
                                            {{--src="{{url('images/findorder/clock_02.png')}}"><span>一天前发布</span></div>--}}
                                {{--<div class="immediatelyRob">马上抢</div>--}}
                                {{--<div class="clear"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<li class="indent">--}}
                        {{--<img src="{{url('images/findorder/buy_02.png')}}">--}}
                        {{--<div class="indentContent">--}}
                            {{--<div class="indentTop">--}}
                                {{--<div class="goodsDescribe">进口澳洲牛眼肉</div>--}}
                                {{--<div class="specificNeeds">具体需求</div>--}}
                                {{--<div class="trademark"><span class="needTtl">品牌：</span><span class="needVal">双汇</span>--}}
                                {{--</div>--}}
                                {{--<div class="shelfLife"><span class="needTtl">保质期：</span><span--}}
                                            {{--class="needVal">24个月</span></div>--}}
                                {{--<div class="elseNeeds"><span class="needTtl">其他需求：</span><span--}}
                                            {{--class="needVal">精肉比75%</span></div>--}}
                                {{--<div class="state"><span class="needTtl">交易状态</span><span class="needVal">买家比家中</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="indentBottom">--}}
                                {{--<div class="publishDate"><img--}}
                                            {{--src="{{url('images/findorder/clock_02.png')}}"><span>一天前发布</span></div>--}}
                                {{--<div class="immediatelyRob">马上抢</div>--}}
                                {{--<div class="clear"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<li class="indent">--}}
                        {{--<img src="{{url('images/findorder/buy_02.png')}}">--}}
                        {{--<div class="indentContent">--}}
                            {{--<div class="indentTop">--}}
                                {{--<div class="goodsDescribe">进口澳洲牛眼肉</div>--}}
                                {{--<div class="specificNeeds">具体需求</div>--}}
                                {{--<div class="trademark"><span class="needTtl">品牌：</span><span class="needVal">双汇</span>--}}
                                {{--</div>--}}
                                {{--<div class="shelfLife"><span class="needTtl">保质期：</span><span--}}
                                            {{--class="needVal">24个月</span></div>--}}
                                {{--<div class="elseNeeds"><span class="needTtl">其他需求：</span><span--}}
                                            {{--class="needVal">精肉比75%</span></div>--}}
                                {{--<div class="state"><span class="needTtl">交易状态</span><span class="needVal">买家比家中</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="indentBottom">--}}
                                {{--<div class="publishDate"><img--}}
                                            {{--src="{{url('images/findorder/clock_02.png')}}"><span>一天前发布</span></div>--}}
                                {{--<div class="immediatelyRob">马上抢</div>--}}
                                {{--<div class="clear"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                </ul>
                <div class="clear"></div>
            </div>
        </div>
        <!-- 分页 -->
        <!-- 分页 -->
        <div  class="pageNav">
            <?php $URL = $_SERVER['REQUEST_URI'];?>
            <?php
            if (isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }
            ?>
            <div class="pageNavRight" data-pageCount="{{isset($page_number)?$page_number:1}}">
                @if(isset($_GET['page']))
                    <a href="{{url(str_replace('page='.$_GET['page'],'page=1',$URL))}}" class="n pageHeader"><span><img src="{{url('images/product/pageNavBefore.jpg')}}"><img src="{{url('images/product/pageNavBefore.jpg')}}">首页</span></a>
                @else
                    <a href="{{url($URL.'&page=1')}}" class="n pageHeader"><span><img src="{{url('images/product/pageNavBefore.jpg')}}"><img src="{{url('images/product/pageNavBefore.jpg')}}">首页</span></a>
                @endif
                @if(isset($_GET['page']))
                    <a class="n" id="pageNavBefore" href="{{$page!=1?url(str_replace('page='.$_GET['page'],'page='.($page-1),$URL)):" "}}">
                        <img src="{{url('images/product/pageNavBefore.jpg')}}">上一页
                    </a>
                @else
                    <a class="n" id="pageNavBefore" href="{{$page!=1?url($URL.'page='.($page-1)):" "}}">
                        <img src="{{url('images/product/pageNavBefore.jpg')}}">上一页
                    </a>
                @endif
                <a class="preMore">...</a>
                @for($i = 1 ; $i <=$page_number;$i++)
                    @if($page == $i)
                        @if(isset($_GET['page']))
                            <a href="{{url(str_replace('page='.$_GET['page'],'page='.$i,$URL))}}">
                                <span class="initSpan pc">{{$i}}</span>
                            </a>
                        @else
                            <a href="{{url($URL.'page='.$i)}}">
                                <span class="initSpan pc">{{$i}}</span>
                            </a>
                        @endif
                    @else
                        @if($page > 2 && $page <= $page_number-3)
                            @if($page -2<= $i && $i <=$page+3)
                                @if(isset($_GET['page']))
                                    <a class="pageActive" href="{{url(str_replace('page='.$_GET['page'],'page='.$i,$URL))}}">
                                        <span class="initSpan">{{$i}}</span>
                                    </a>
                                @else
                                    <a class="pageActive" href="{{url($URL."&page=".$i)}}">
                                        <span class="initSpan">{{$i}}</span>
                                    </a>
                                @endif
                            @else
                                @if(isset($_GET['page']))
                                    <a class="pageNotActive" href="{{url(str_replace('page='.$_GET['page'],'page='.$i,$URL))}}">
                                        <span class="initSpan">{{$i}}</span>
                                    </a>
                                @else
                                    <a class="pageNotActive" href="{{url($URL."&page=".$i)}}">
                                        <span class="initSpan">{{$i}}</span>
                                    </a>
                                @endif
                            @endif
                        @elseif($page<=2)
                            @if($i <= 6)
                                @if(isset($_GET['page']))
                                    <a class="pageActive" href="{{url(str_replace('page='.$_GET['page'],'page='.$i,$URL))}}">
                                        <span class="initSpan">{{$i}}</span>
                                    </a>
                                @else
                                    <a class="pageActive" href="{{url($URL."page=".$i)}}">
                                        <span class="initSpan">{{$i}}</span>
                                    </a>
                                @endif
                            @else
                                @if(isset($_GET['page']))
                                    <a class="pageNotActive" href="{{url(str_replace('page='.$_GET['page'],'page='.$i,$URL))}}">
                                        <span class="initSpan">{{$i}}</span>
                                    </a>
                                @else
                                    <a class="pageNotActive" href="{{url($URL."page=".$i)}}">
                                        <span class="initSpan">{{$i}}</span>
                                    </a>
                                @endif
                            @endif
                        @else
                            @if($i >$page_number-6)
                                @if(isset($_GET['page']))
                                    <a class="pageActive" href="{{url(str_replace('page='.$_GET['page'],'page='.$i,$URL))}}">
                                        <span class="initSpan">{{$i}}</span>
                                    </a>
                                @else
                                    <a class="pageActive" href="{{url($URL."&page=".$i)}}">
                                        <span class="initSpan">{{$i}}</span>
                                    </a>
                                @endif
                            @else
                                @if(isset($_GET['page']))
                                    <a class="pageNotActive" href="{{url(str_replace('page='.$_GET['page'],'page='.$i,$URL))}}">
                                        <span class="initSpan">{{$i}}</span>
                                    </a>
                                @else
                                    <a class="pageNotActive" href="{{url($URL."&page=".$i)}}">
                                        <span class="initSpan">{{$i}}</span>
                                    </a>
                                @endif
                            @endif
                        @endif
                    @endif
                @endfor
                <a class="nextMore">...</a>
                @if(isset($_GET['page']))
                    <a class="n" id="pageNavNext" href="{{$page!=$page_number?url(str_replace("page=".$_GET['page'],"page=".($page+1),$URL)):''}}">
                        下一页<img src="{{url('images/product/pageNavNext.jpg')}}">
                    </a>
                @else
                    <a class="n" id="pageNavNext" href="{{$page!=$page_number?url($URL."&page=".($page+1)):''}}">
                        下一页<img src="{{url('images/product/pageNavNext.jpg')}}">
                    </a>
                @endif
                @if(isset($_GET['page']))
                    <a href="{{url(str_replace('page='.$_GET['page'],'page='.$page_number,$URL))}}" class="n pagefooter"><span>尾页<img src="{{url('images/product/pageNavNext.jpg')}}"><img src="{{url('images/product/pageNavNext.jpg')}}"></span></a>
                @else
                    <a href="{{url($URL.'&page='.$page_number)}}" class="n pagefooter"><span>尾页<img src="{{url('images/product/pageNavNext.jpg')}}"><img src="{{url('images/product/pageNavNext.jpg')}}"></span></a>
                @endif
            </div>
        </div>
        {{--<div class="goodsTeme">--}}
            {{--<div class="recomend">--}}
                {{--<span class="hostGoods">推荐热品</span>--}}
                {{--<span class="spot">.</span>--}}
                {{--<span class="purpose">我们只选对的不选贵的</span>--}}
            {{--</div>--}}
            {{--<div class="sort">--}}
                {{--<div class="sortGoods">--}}
                    {{--<div class="option" data-type="">--}}
                        {{--<div class="choice">鸡</div>--}}
                        {{--<div class="choiceIcon">--}}
                            {{--<img src="{{url('images/selected.png')}}">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<span>|</span>--}}
                    {{--<div class="option" data-type="">--}}
                        {{--<div class="choice">鸭</div>--}}
                        {{--<div class="choiceIcon">--}}
                            {{--<img src="{{url('images/selected.png')}}">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<span>|</span>--}}
                    {{--<div class="option" data-type="">--}}
                        {{--<div class="choice">鹅</div>--}}
                        {{--<div class="choiceIcon">--}}
                            {{--<img src="{{url('images/selected.png')}}">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<span>|</span>--}}
                    {{--<div class="option" data-type="">--}}
                        {{--<div class="choice">牛</div>--}}
                        {{--<div class="choiceIcon">--}}
                            {{--<img src="{{url('images/selected.png')}}">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<span>|</span>--}}
                    {{--<div class="option" data-type="">--}}
                        {{--<div class="choice">羊</div>--}}
                        {{--<div class="choiceIcon">--}}
                            {{--<img src="{{url('images/selected.png')}}">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<span>|</span>--}}
                    {{--<div class="option" data-type="">--}}
                        {{--<div class="choice">猪</div>--}}
                        {{--<div class="choiceIcon">--}}
                            {{--<img src="{{url('images/selected.png')}}">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="clear"></div>--}}
                {{--</div>--}}
                {{--<a href="" class="more">更多</a>--}}
                {{--<div class="clear"></div>--}}
            {{--</div>--}}
            {{--<div class="clear"></div>--}}
        {{--</div>--}}
        <!-- 推荐热门产品 -->
        {{--<div class="content">--}}

            {{--<ul class="goodsMode" id="goodsMode}" data-type="">--}}

                {{--<li onclick="">--}}
                    {{--<div class="border">--}}
                        {{--<div class="hotGoodsSign">--}}
                            {{--<img src="images/host.png">--}}
                        {{--</div>--}}
                        {{--<div class="goodsImg">--}}
                            {{--<img src="{{url('images/product/product.png')}}">--}}
                        {{--</div>--}}
                        {{--<div class="goodsIntroduce">--}}
                            {{--<div class="goodsName">澳门豆捞极品牛肋骨</div>--}}
                            {{--<div class="goodsKind">--}}
                                {{--<span>牛排</span>--}}
                                {{--<span>酒店</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="goodsInfo">--}}
                            {{--<div class="priceNow">--}}
                                {{--<span class="now">￥<span>75.00</span></span></span>--}}
                            {{--</div>--}}
                            {{--<div class="regularPrice ">--}}
                                {{--<span class="oldPrice">￥<span>150.00</span></span>--}}
                                {{--<span class="proUnitPrice"><span>10.0</span>/<span>斤</span></span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="belong">--}}
                            {{--<img class="icon" src="images/goodsIcon.png">--}}
                            {{--<span class="company">双汇</span>--}}
                            {{--<span class="address">上海</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li onclick="">--}}
                    {{--<div class="border">--}}
                        {{--<div class="hotGoodsSign">--}}
                            {{--<img src="images/host.png">--}}
                        {{--</div>--}}
                        {{--<div class="goodsImg">--}}
                            {{--<img src="{{url('images/product/product.png')}}">--}}
                        {{--</div>--}}
                        {{--<div class="goodsIntroduce">--}}
                            {{--<div class="goodsName">澳门豆捞极品牛肋骨</div>--}}
                            {{--<div class="goodsKind">--}}
                                {{--<span>牛排</span>--}}
                                {{--<span>酒店</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="goodsInfo">--}}
                            {{--<div class="priceNow">--}}
                                {{--<span class="now">￥<span>75.00</span></span></span>--}}
                            {{--</div>--}}
                            {{--<div class="regularPrice ">--}}
                                {{--<span class="oldPrice">￥<span>150.00</span></span>--}}
                                {{--<span class="proUnitPrice"><span>10.0</span>/<span>斤</span></span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="belong">--}}
                            {{--<img class="icon" src="images/goodsIcon.png">--}}
                            {{--<span class="company">双汇</span>--}}
                            {{--<span class="address">上海</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li onclick="">--}}
                    {{--<div class="border">--}}
                        {{--<div class="hotGoodsSign">--}}
                            {{--<img src="images/host.png">--}}
                        {{--</div>--}}
                        {{--<div class="goodsImg">--}}
                            {{--<img src="{{url('images/product/product.png')}}">--}}
                        {{--</div>--}}
                        {{--<div class="goodsIntroduce">--}}
                            {{--<div class="goodsName">澳门豆捞极品牛肋骨</div>--}}
                            {{--<div class="goodsKind">--}}
                                {{--<span>牛排</span>--}}
                                {{--<span>酒店</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="goodsInfo">--}}
                            {{--<div class="priceNow">--}}
                                {{--<span class="now">￥<span>75.00</span></span></span>--}}
                            {{--</div>--}}
                            {{--<div class="regularPrice ">--}}
                                {{--<span class="oldPrice">￥<span>150.00</span></span>--}}
                                {{--<span class="proUnitPrice"><span>10.0</span>/<span>斤</span></span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="belong">--}}
                            {{--<img class="icon" src="images/goodsIcon.png">--}}
                            {{--<span class="company">双汇</span>--}}
                            {{--<span class="address">上海</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li onclick="">--}}
                    {{--<div class="border">--}}
                        {{--<div class="hotGoodsSign">--}}
                            {{--<img src="images/host.png">--}}
                        {{--</div>--}}
                        {{--<div class="goodsImg">--}}
                            {{--<img src="{{url('images/product/product.png')}}">--}}
                        {{--</div>--}}
                        {{--<div class="goodsIntroduce">--}}
                            {{--<div class="goodsName">澳门豆捞极品牛肋骨</div>--}}
                            {{--<div class="goodsKind">--}}
                                {{--<span>牛排</span>--}}
                                {{--<span>酒店</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="goodsInfo">--}}
                            {{--<div class="priceNow">--}}
                                {{--<span class="now">￥<span>75.00</span></span></span>--}}
                            {{--</div>--}}
                            {{--<div class="regularPrice ">--}}
                                {{--<span class="oldPrice">￥<span>150.00</span></span>--}}
                                {{--<span class="proUnitPrice"><span>10.0</span>/<span>斤</span></span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="belong">--}}
                            {{--<img class="icon" src="images/goodsIcon.png">--}}
                            {{--<span class="company">双汇</span>--}}
                            {{--<span class="address">上海</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li onclick="">--}}
                    {{--<div class="border">--}}
                        {{--<div class="hotGoodsSign">--}}
                            {{--<img src="images/host.png">--}}
                        {{--</div>--}}
                        {{--<div class="goodsImg">--}}
                            {{--<img src="{{url('images/product/product.png')}}">--}}
                        {{--</div>--}}
                        {{--<div class="goodsIntroduce">--}}
                            {{--<div class="goodsName">澳门豆捞极品牛肋骨</div>--}}
                            {{--<div class="goodsKind">--}}
                                {{--<span>牛排</span>--}}
                                {{--<span>酒店</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="goodsInfo">--}}
                            {{--<div class="priceNow">--}}
                                {{--<span class="now">￥<span>75.00</span></span></span>--}}
                            {{--</div>--}}
                            {{--<div class="regularPrice ">--}}
                                {{--<span class="oldPrice">￥<span>150.00</span></span>--}}
                                {{--<span class="proUnitPrice"><span>10.0</span>/<span>斤</span></span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="belong">--}}
                            {{--<img class="icon" src="images/goodsIcon.png">--}}
                            {{--<span class="company">双汇</span>--}}
                            {{--<span class="address">上海</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li onclick="">--}}
                    {{--<div class="border">--}}
                        {{--<div class="hotGoodsSign">--}}
                            {{--<img src="images/host.png">--}}
                        {{--</div>--}}
                        {{--<div class="goodsImg">--}}
                            {{--<img src="{{url('images/product/product.png')}}">--}}
                        {{--</div>--}}
                        {{--<div class="goodsIntroduce">--}}
                            {{--<div class="goodsName">澳门豆捞极品牛肋骨</div>--}}
                            {{--<div class="goodsKind">--}}
                                {{--<span>牛排</span>--}}
                                {{--<span>酒店</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="goodsInfo">--}}
                            {{--<div class="priceNow">--}}
                                {{--<span class="now">￥<span>75.00</span></span></span>--}}
                            {{--</div>--}}
                            {{--<div class="regularPrice ">--}}
                                {{--<span class="oldPrice">￥<span>150.00</span></span>--}}
                                {{--<span class="proUnitPrice"><span>10.0</span>/<span>斤</span></span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="belong">--}}
                            {{--<img class="icon" src="images/goodsIcon.png">--}}
                            {{--<span class="company">双汇</span>--}}
                            {{--<span class="address">上海</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    </div>
    <div class="modifiedMode" style="{{ $errors->count()>0 ? 'display:block' : '' }}">
        <div class="modeTable">
            <div class="modeTableCell">
                <form method="post" action="{{url('launchOrder')}}">
                    {{csrf_field()}}
                    <div class="modified">
                        <div class="orderInfo">
                            <div class="orderInfoTtl">
                                <div class="orderOpen">发布订单</div>
                                <img src="{{url('images/userCenter/close.png')}}">
                            </div>
                            <div class="info">
                                <ul class="topInfo">
                                    <div>
                                        <li class="form-group {{ $errors->has('launch_order_name') ? ' has-error' : '' }}">
                                            <label class="infoTopic"><img src="">商品名称：</label>
                                            <div class="form-control">
                                                <input class="infoInput" name="launch_order_name" type="text">
                                                @if ($errors->has('launch_order_name'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('launch_order_name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <br style="clear: both;"/>
                                        </li>
                                        <li class="form-group {{ $errors->has('amount') ? ' has-error' : '' }} right-input">
                                            <label class="infoTopic"><img src="">需求量：</label>
                                            <div class="form-control">
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
                                        <li  class="form-group {{ $errors->has('limit_time_from') ? ' has-error' : '' }}">
                                            <label class="infoTopic"><img src="">发布时限开始：</label>
                                            <div class="form-control">
                                                <input class="infoInput"
                                                       name="limit_time_from"
                                                       id="timeFrom"
                                                       type="text">
                                                @if ($errors->has('limit_time_from'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('limit_time_from') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <br style="clear: both;"/>
                                        </li>
                                        <li  class="form-group {{ $errors->has('limit_time_to') ? ' has-error' : '' }} right-input">
                                            <label class="infoTopic"><img src="">发布时限结束：</label>
                                            <div class="form-control">
                                                <input class="infoInput" id="timeTo" type="text"
                                                       name="limit_time_to">
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
                                        <li  class="form-group {{ $errors->has('shelf_life') ? ' has-error' : '' }}">
                                            <label class="infoTopic"><img src="">保质期限：</label>
                                            <div class="form-control">
                                                <input class="infoInput"
                                                       name="shelf_life"
                                                       type="text">
                                                @if ($errors->has('shelf_life'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('shelf_life') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <br style="clear: both;"/>
                                        </li>
                                        <li  class="form-group {{ $errors->has('madein') ? ' has-error' : '' }} right-input">
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
                                        <li  class="form-group {{ $errors->has('per_weight') ? ' has-error' : '' }}">
                                            <label class="infoTopic"><img src="">单只重量：</label>
                                            <div class="form-control">
                                                <input class="infoInput"
                                                       name="per_weight"
                                                       type="text">
                                                @if ($errors->has('shelf_life'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('per_weight') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <br style="clear: both;"/>
                                        </li>
                                        <li  class="form-group {{ $errors->has('per_length') ? ' has-error' : '' }} right-input">
                                            <label class="infoTopic"><img src="">单只长度：</label>
                                            <div class="form-control">
                                                <input class="infoInput"
                                                       name="per_length"
                                                       type="text">
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
                                        <li  class="form-group {{ $errors->has('oil_content') ? ' has-error' : '' }}">
                                            <label class="infoTopic"><img src="">原料油皮量：</label>
                                            <div class="form-control">
                                                <input class="infoInput"
                                                       name="oil_content"
                                                       type="text">
                                                @if ($errors->has('oil_content'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('oil_content') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <br style="clear: both;"/>
                                        </li>
                                        <li  class="form-group {{ $errors->has('water_content') ? ' has-error' : '' }} right-input">
                                            <label class="infoTopic"><img src="">原料肉水分含量：</label>
                                            <div class="form-control">
                                                <input class="infoInput"
                                                       name="water_content"
                                                       type="text">
                                                @if ($errors->has('water_content'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('water_content') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <br style="clear: both;"/>
                                        </li>
                                        <li  class="form-group {{ $errors->has('launch_order_detail') ? ' has-error' :
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
                                        <div class="clear"></div>
                                    </div>

                                    <br style="clear: both;"/>
                                </ul>
                            </div>
                        </div>
                        <div class="btn">
                            <div class="protocol"><img class="checkbox" src="{{url('images/userCenter/checked.png')}}"
                                                       data-check="selected"><span>i冻品食品安检标准</span></div>
                            <span>
							<button class="confirm" type="submit">发布</button>
						</span>
                        </div>
                    </div>
                </form>
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
@endsection

@section('javascript')
    <script type="text/javascript" src="{{url('js/PublicDomain.js')}}"></script>
    <script type="text/javascript" src="{{url('js/findorder/findorder.js')}}"></script>
    <script type="text/javascript" src="{{url('js/product/productPageNav.js')}}"></script>
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
        function SureCompany(){
            alert('请审核公司注册信息!');
        }
    </script>
@endsection