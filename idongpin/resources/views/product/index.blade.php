@extends('layouts.app')
@section('title')@if(isset($_GET['keyword'])&&!empty($_GET['keyword'])){!!$_GET['keyword'].'-'!!}@endif
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('css/product/products.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/product/productPageNav.css')}}">
    @endsection

    @section('content')
            <!-- 主体部分 -->
    <div class="content">
        <!--  -->
        <div class="filter">
            @if(isset($_GET['protype']))
                @foreach($group['protype'] as $key =>$value)
                    @if($_GET['protype'] == $value['type_id'])
                        <div class="filterNav"><a class="startNav">冻品导航</a><span>></span><a>{{$value['type_name']}}</a></div>
                    @endif
                @endforeach
            @endif
            <ul class="filterCondition">
                <li class="showCondition">
                    <div class="conditionTopic"><span>已选条件：</span></div>
                    <div class="conditionContent">
                        @if(isset($_GET['protype']))
                            @foreach($group['protype'] as $key =>$value)
                                @if($_GET['protype'] == $value['type_id'])
                                    <a href="{{isset($_GET['keyword']) ? explode('&',url($_SERVER['REQUEST_URI']),3)[0].'&'.explode('&',url($_SERVER['REQUEST_URI']),3)[1].'&page=1':explode('&',url($_SERVER['REQUEST_URI']),2)[0].'&page=1'}}">
                                        <div class="selectedCondition" onclick='deleteSelectedCondition(this)'>
                                            <div class="conditionKind">品种：</div>
                                            <div class="condition">{{$value['type_name']}}</div>
                                            <div class="close">
                                                <img src="{{url('images/product/cancel.png')}}">
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        @endif
                        @if(isset($_GET['subtype']))
                            <a href="{{str_replace("&subtype=".$_GET['subtype'],'',url($_SERVER['REQUEST_URI']))}}">
                                <div class="selectedCondition" onclick='deleteSelectedCondition(this)'>
                                    <div class="conditionKind">品种类别：</div>
                                    <div class="condition">
                                        @for($i=0;$i< count(explode(";",$_GET['subtype']));$i++)
                                            @foreach($group['subtypes'] as $key =>$value)
                                                @if(explode(";",$_GET['subtype'])[$i] == $value['attributes']['type_id'])
                                                    @if($i != count(explode(";",$_GET['subtype']))-1)
                                                        {{$value['attributes']['type_name']."、"}}
                                                    @else
                                                        {{$value['attributes']['type_name']}}
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endfor
                                    </div>
                                    <div class="close">
                                        <img src="{{url('images/product/cancel.png')}}">
                                    </div>
                                </div>
                            </a>
                        @endif
                        @if(isset($_GET['brand']))
                            <a href="{{str_replace("&brand=".$_GET['brand'],'',url($_SERVER['REQUEST_URI']))}}">
                                <div class="selectedCondition" onclick='deleteSelectedCondition(this)'>
                                    <div class="conditionKind">品牌：</div>
                                    <div class="condition">
                                        @for($i=0;$i< count(explode(";",$_GET['brand']));$i++)
                                            @foreach($group['brands'] as $key =>$value)
                                                @if(explode(";",$_GET['brand'])[$i] == $value['attributes']['brand_name'])
                                                    @if($i != count(explode(";",$_GET['brand']))-1)
                                                        {{$value['attributes']['brand_text']."、"}}
                                                    @else
                                                        {{$value['attributes']['brand_text']}}
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endfor
                                    </div>
                                    <div class="close">
                                        <img src="{{url('images/product/cancel.png')}}">
                                    </div>
                                </div>
                            </a>
                        @endif
                        @if(isset($_GET['madein']))
                            <a href="{{str_replace("&madein=".$_GET['madein'],'',url($_SERVER['REQUEST_URI']))}}">
                                <div class="selectedCondition" onclick='deleteSelectedCondition(this)'>
                                    <div class="conditionKind">产地：</div>
                                    <div class="condition">
                                        @for($i=0;$i< count(explode(";",$_GET['madein']));$i++)
                                            @foreach($group['madins'] as $key =>$value)
                                                @if(explode(";",$_GET['madein'])[$i] == $value['attributes']['madein_name'])
                                                    @if($i != count(explode(";",$_GET['madein']))-1)
                                                        {{$value['attributes']['madein_text']."、"}}
                                                    @else
                                                        {{$value['attributes']['madein_text']}}
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endfor
                                    </div>
                                    <div class="close">
                                        <img src="{{url('images/product/cancel.png')}}">
                                    </div>
                                </div>
                            </a>
                        @endif
                        @if(isset($_GET['price_from'])&&isset($_GET['price_to']))
                            <a href="{{str_replace("&price_from=".$_GET['price_from']."&price_to=".$_GET['price_to'],'',url($_SERVER['REQUEST_URI']))}}">
                                <div class="selectedCondition" onclick='deleteSelectedCondition(this)'>
                                    <div class="conditionKind">价格区间：</div>
                                    <div class="condition">
                                        @for($i = 0 ; $i < count(explode(";",$_GET['price_from']));$i++)
                                            @foreach($group['prices'] as $key =>$value)
                                                @if((explode(";",$_GET['price_from'])[$i] == $value['attributes']['price_from']) &&(explode(";",$_GET['price_to'])[$i] == $value['attributes']['price_to']))
                                                    @if($i !=count(explode(";",$_GET['price_from']))-1)
                                                        {{$value['attributes']["price_from"].'-'.$value['attributes']["price_to"]."、"}}
                                                    @else
                                                        {{$value['attributes']["price_from"].'-'.$value['attributes']["price_to"]}}
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endfor
                                    </div>
                                    <div class="close">
                                        <img src="{{url('images/product/cancel.png')}}">
                                    </div>
                                </div>
                            </a>
                        @endif
                    </div>
                @if(isset($_GET['protype']))
                    @if(!isset($_GET['brand']))
                        <li class="brands">
                            <div class="brandTopic">品牌：</div>
                            <div class="brandContent">
                                @foreach($group['brands'] as $key =>$value)
                                    <?php
                                    $URL=url($_SERVER['REQUEST_URI'].'&brand='.$value['attributes']['brand_name']);
                                    if(isset($_GET['orderby'])){
                                        $URL = str_replace('&sortby=price&orderby=desc','',$URL);
                                    }
                                    if(isset($_GET['page'])){
                                        $URL=str_replace('&page='.$_GET['page'],'&page=1',$URL);
                                    }else{
                                        $URL .="&page=1";
                                    }
                                    ?>
                                    <div class="brand" data-tag="{{$value['attributes']['brand_name']}}"><img class="checkBox" src="{{url('images/product/unchecked.png')}}"><a href="{{$URL}}" data-msg="{{$URL}}">{{$value['attributes']["brand_text"]}}</a></div>
                                @endforeach
                            </div>
                            <div class="otherHandle">
                                <div class="more"><span>更多</span><img src="{{url('images/product/more.png')}}"></div>
                                <div class="selectMore">多选<img src="{{url('images/product/selectMore.png')}}"></div>
                                <div class="confirm" data-url="{{url($_SERVER['REQUEST_URI'])}}"><a href="">确定</a></div>
                                <div class="cancel">取消<img src="{{url('images/product/sub.png')}}"></div>
                            </div>
                            <div class="clear"></div>
                        </li>
                    @endif
                    @if(!isset($_GET['madein']))
                        <li class="origins">
                            <div class="originTopic">产地：</div>
                            <div class="originContent">
                                @foreach($group['madins'] as $key =>$value)
                                    <?php
                                    $place_URL=url($_SERVER['REQUEST_URI'].'&madein='.$value['attributes']['madein_name']);
                                    if(isset($_GET['orderby'])){
                                        $place_URL = str_replace('&sortby=price&orderby=desc','',$place_URL);
                                    }
                                    if(isset($_GET['page'])){
                                        $place_URL=str_replace('&page='.$_GET['page'],'&page=1',$place_URL);
                                    }else{
                                        $place_URL .="&page=1";
                                    }
                                    ?>
                                    <div class="brand" data-tag="{{$value['attributes']['madein_name']}}"><img class="checkBox" src="{{url('images/product/unchecked.png')}}"> <a href="{{$place_URL}}" data-msg="{{$place_URL}}">{{$value['attributes']["madein_text"]}}</a></div>
                                @endforeach
                            </div>
                            <div class="otherHandle">
                                <div class="more"><span>更多</span><img src="{{url('images/product/more.png')}}"></div>
                                <div class="selectMore">多选<img src="{{url('images/product/selectMore.png')}}"></div>
                                <div class="confirm" data-url="{{url($_SERVER['REQUEST_URI'])}}"><a href="" onclick="changeHref(this)">确定</a></div>
                                <div class="cancel">取消<img src="{{url('images/product/sub.png')}}"></div>
                            </div>
                            <div class="clear"></div>
                        </li>
                    @endif
                    @if(!isset($_GET['subtype']))
                        <li class="types">
                            <div class="varietieTopic">品种类别：</div>
                            <div class="varietieContent">
                                <!-- <div class="originContent"> -->
                                    @foreach($group['subtypes'] as $key =>$value)
                                        <?php
                                        $type_URL=url($_SERVER['REQUEST_URI'].'&subtype='.$value['attributes']['type_id']);
                                        if(isset($_GET['orderby'])){
                                            $type_URL = str_replace('&sortby=price&orderby=desc','',$type_URL);
                                        }
                                        if(isset($_GET['page'])){
                                            $type_URL=str_replace('&page='.$_GET['page'],'&page=1',$type_URL);
                                        }else{
                                            $type_URL.="&page=1";
                                        }
                                        ?>
                                        <div class="brand" data-tag="{{$value['attributes']["type_id"]}}"><img class="checkBox" src="{{url('images/product/unchecked.png')}}"> <a href="{{$type_URL}}" data-msg="{{$type_URL}}">{{$value['attributes']["type_name"]}}</a></div>
                                    @endforeach
                               <!--  </div> -->
                            </div>
                            <div class="otherHandle">
                                <div class="more"><span>更多</span><img src="{{url('images/product/more.png')}}"></div>
                                <div class="selectMore">多选<img src="{{url('images/product/selectMore.png')}}"></div>
                                <div class="confirm" data-url="{{url($_SERVER['REQUEST_URI'])}}"><a href="">确定</a></div>
                                <div class="cancel">取消<img src="{{url('images/product/sub.png')}}"></div>
                            </div>
                            <div class="clear"></div>
                        </li>
                    @endif
                    @if(!isset($_GET['price_from'])||!isset($_GET['price_to']))
                        <li class="prices">
                            <div class="priceTopic">价格：</div>
                            <div class="priceContent">
                                <div class="originContent">
                                    @foreach($group['prices'] as $key =>$value)
                                        <?php
                                        $price_URL=url($_SERVER['REQUEST_URI'].'&price_from='.$value['attributes']["price_from"].'&price_to='.$value['attributes']["price_to"]);
                                        if(isset($_GET['orderby'])){
                                            $price_URL = str_replace('&sortby=price&orderby=desc','',$price_URL);
                                        }
                                        if(isset($_GET['page'])){
                                            $price_URL=str_replace('&page='.$_GET['page'],'&page=1',$price_URL);
                                        }else{
                                            $price_URL.="&page=1";
                                        }
                                        ?>
                                        <div class="brand" data-from="{{$value['attributes']["price_from"]}}" data-to="{{$value['attributes']["price_to"]}}"><img class="checkBox" src="{{url('images/product/unchecked.png')}}"> <a href="{{$price_URL}}" data-msg="{{$price_URL}}">{{$value['attributes']["price_from"]}}-{{$value['attributes']["price_to"]}}</a></div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="otherHandle">
                                <div class="selectMore">多选<img src="{{url('images/product/selectMore.png')}}"></div>
                                <div class="confirm" data-url="{{url($_SERVER['REQUEST_URI'])}}"><a href="">确定</a></div>
                                <div class="cancel">取消<img src="{{url('images/product/sub.png')}}"></div>
                            </div>
                            <div class="clear"></div>
                        </li>
                    @endif
                @else
                    <li class="varieties">
                        <div class="varietieTopic">品种：</div>
                        <div class="varietieContent">
                            <div class="varietieContent">
                                @foreach($group['protype'] as $key =>$value)
                                    <?php
                                    $brand_URL=url($_SERVER['REQUEST_URI'].'&protype='.$value['attributes']['type_id']);
                                    if(isset($_GET['orderby'])){
                                        $brand_URL = str_replace('&sortby=price&orderby=desc','',$brand_URL);
                                    }
                                    if(isset($_GET['page'])){
                                        $brand_URL=str_replace('&page='.$_GET['page'],'&page=1',$brand_URL);
                                    }else{
                                        $brand_URL .="&page=1";
                                    }
                                    ?>
                                    <div class="brand" data-tag="{{$value['attributes']['type_id']}}"><img class="checkBox" src="{{url('images/product/unchecked.png')}}"> <a href="{{$brand_URL}}" data-msg="{{$brand_URL}}">{{$value['attributes']['type_name']}}</a></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="otherHandle">
                            {{--<div class="selectMore">多选<img src="{{url('images/product/selectMore.png')}}"></div>--}}
                            {{--<div class="confirm" data-url="{{url($_SERVER['REQUEST_URI'])}}"><a href="">确定</a></div>--}}
                            {{--<div class="cancel">取消<img src="{{url('images/product/sub.png')}}"></div>--}}
                        </div>
                        <div class="clear"></div>
                    </li>
                @endif
                <li class="miscellaneous">
                    <div class="miscellaneousTopic">您是不是在找？</div>
                    <div class="miscellaneousContent">
                        <div class="miscellaneoue"><a href="">进口牛肉</a></div>
                        <div class="miscellaneoue"><a href="">冷冻牛肉</a></div>
                        <div class="miscellaneoue"><a href="">澳洲牛肉</a></div>
                        <div class="miscellaneoue"><a href="">风干牛肉</a></div>
                        <div class="miscellaneoue"><a href="">平遥牛肉</a></div>
                        <div class="miscellaneoue"><a href="">麻辣牛肉</a></div>
                        <div class="miscellaneoue"><a href="">澳洲进口牛肉</a></div>
                    </div>
                    <div class="clear"></div>
                </li>
            </ul>
        </div>
        <div class="orderBar">
            <ul class="orderOptions">

                @if(isset($_GET['sortby']))
                    @if($_GET['sortby']=='price')
                        <li class="option">综合</li>
                        <li class="option">销量</li>
                        @if($_GET['orderby'] == 'desc')
                            <li class="option optionActive" onclick="window.location.href='{{url(str_replace('desc','asc',$_SERVER['REQUEST_URI']))}}'">价格↓</li>
                        @else
                            <li class="option optionActive" onclick="window.location.href='{{url(str_replace('asc','desc',$_SERVER['REQUEST_URI']))}}'">价格↑</li>
                        @endif
                    @else
                        <li class="option optionActive">综合</li>
                        <li class="option">销量</li>
                        <li class="option" onclick="window.location.href='{{url($_SERVER['REQUEST_URI'].'&sortby=price&orderby=desc')}}'">价格↑</li>
                    @endif
                @else
                    <li class="option optionActive">综合</li>
                    <li class="option">销量</li>
                    <li class="option" onclick="window.location.href='{{url($_SERVER['REQUEST_URI'].'&sortby=price&orderby=desc')}}'">价格↑</li>

                @endif
                <li class="option">所在区域</li>
            </ul>
        </div>
        <div class="goods">
            <ul class="goodsMode" id="goodsMode">
                @if(count($products) == 0)
                    <div style="color:#13b51a;font-family:'微软雅黑';font-size: 20px;width: 100%; text-align: center;margin-top: 50px">对不起，暂时没有你所需要的产品！</div>
                @else
                    @foreach($products as $k =>$v)
                        <li onclick="window.location.href='{{url("product/item?companyid=".$v["company_id"]."&proid=".$v['pro_id'])}}'">
                            <div class="border">
                                <div class="goodsImg">
                                    <img src="{{url($v['product_info']['pro_img'])}}">
                                </div>
                                <div class="goodsIntroduce">
                                    <div class="goodsName">{{isset($v['product_info']['pro_name'])?$v['product_info']['pro_name']:""}}</div>
                                    {{--<div class="goodsKind">--}}
                                        {{--@foreach($types as $k_1 => $v_1)--}}
                                            {{--@if(isset($v_1['subtypes']))--}}
                                                {{--@foreach($v_1['subtypes'] as $k2 => $v2)--}}
                                                    {{--@if($v2['type_id'] == $v['product_info']['pro_type_id'])--}}
                                                        {{--<span>{{$v2['type_name']}}</span>--}}
                                                    {{--@endif--}}
                                                {{--@endforeach--}}
                                            {{--@endif--}}
                                        {{--@endforeach--}}
                                        {{--<span>{{isset($v['product_info']['pro_mode'])?$v['product_info']['pro_mode']:""}}</span>--}}
                                    {{--</div>--}}
                                </div>
                                <div class="goodsInfo">
                                    <div class="guidePrice">指导价格：</div>
                                    @if(isset($v['product_info']['pro_unitPrice']))
                                        @if($v['product_info']['pro_unitPrice'] != 0)
                                            <div class="priceNow">
                                                <span class="now">￥<span>{{isset($v['product_info']['pro_unitPrice'])?$v['product_info']['pro_unitPrice']:""}}</span></span><span class="cost"><span>{{isset($v['product_info']['wholesale_unit'])?'/'.$v['product_info']['wholesale_unit']:""}}</span></span>
                                            </div>
                                           <!--  <div class="regularPrice ">
                                                @if(isset($v['product_info']['pro_regularPrice']))
                                                    @if($v['product_info']['pro_regularPrice']!=0)
                                                        <span class="oldPrice">￥<span>{{isset($v['product_info']['pro_regularPrice'])?$v['product_info']['pro_regularPrice']:""}}</span></span>
                                                    @endif
                                                @endif
                                                <span class="proUnitPrice"><span>{{isset($v['product_info']['price_extend'])?$v['product_info']['price_extend']:""}}</span><span>{{(isset($v['product_info']['unit'])&&$v['product_info']['unit']!= '')?'/'.$v['product_info']['unit']:""}}</span></span>
                                            </div> -->
                                            <div class="regularPrice">VIP价格电询</div>
                                        @else
                                            <div class="priceAsk">
                                                <span class="now">价格电询</span>
                                            </div>
                                        @endif
                                    @else
                                        <div class="priceAsk">
                                            <span class="now">价格电询</span>
                                        </div>
                                    @endif
                                    {{--<span class="now">￥<span>{{isset($v['product_info']['price'])?$v['product_info']['price']:""}}</span></span><span class="cost">/<span>{{isset($v['product_info']['unit'])?$v['product_info']['unit']:""}}</span></span>--}}


                                </div>
                                <div class="belong">
                                    <img class="icon" src="{{url('images/product/goodsIcon.png')}}">
                                    <span class="company">{{isset($v['product_info']['pro_provider'])?$v['product_info']['pro_provider']:""}}</span>
                                    <span class="address">{{isset($v['product_info']['pro_place'])?$v['product_info']['pro_place']:""}}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
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
            <div class="pageNavRight" data-pageCount="{{$page_number}}">
                @if(isset($_GET['page']))
                    <a href="{{url(str_replace('&page='.$_GET['page'],'&page=1',$URL))}}" class="n pageHeader"><span><img src="{{url('images/product/pageNavBefore.jpg')}}"><img src="{{url('images/product/pageNavBefore.jpg')}}">首页</span></a>
                @else
                    <a href="{{url($URL.'&page=1')}}" class="n pageHeader"><span><img src="{{url('images/product/pageNavBefore.jpg')}}"><img src="{{url('images/product/pageNavBefore.jpg')}}">首页</span></a>
                @endif
                @if(isset($_GET['page']))
                    <a class="n" id="pageNavBefore" href="{{$page!=1?url(str_replace('&page='.$_GET['page'],'&page='.($page-1),$URL)):" "}}">
                        <img src="{{url('images/product/pageNavBefore.jpg')}}">上一页
                    </a>
                @else
                    <a class="n" id="pageNavBefore" href="{{$page!=1?url($URL.'&page='.($page-1)):" "}}">
                        <img src="{{url('images/product/pageNavBefore.jpg')}}">上一页
                    </a>
                @endif
                <a class="preMore">...</a>
                @for($i = 1 ; $i <=$page_number;$i++)
                    @if($page == $i)
                        @if(isset($_GET['page']))
                            <a href="{{url(str_replace('&page='.$_GET['page'],'&page='.$i,$URL))}}">
                                <span class="initSpan pc">{{$i}}</span>
                            </a>
                        @else
                            <a href="{{url($URL.'&page='.$i)}}">
                                <span class="initSpan pc">{{$i}}</span>
                            </a>
                        @endif
                    @else
                        @if($page > 2 && $page <= $page_number-3)
                            @if($page -2<= $i && $i <=$page+3)
                                @if(isset($_GET['page']))
                                    <a class="pageActive" href="{{url(str_replace('&page='.$_GET['page'],'&page='.$i,$URL))}}">
                                        <span class="initSpan">{{$i}}</span>
                                    </a>
                                @else
                                    <a class="pageActive" href="{{url($URL."&page=".$i)}}">
                                        <span class="initSpan">{{$i}}</span>
                                    </a>
                                @endif
                            @else
                                @if(isset($_GET['page']))
                                    <a class="pageNotActive" href="{{url(str_replace('&page='.$_GET['page'],'&page='.$i,$URL))}}">
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
                                    <a class="pageActive" href="{{url(str_replace('&page='.$_GET['page'],'&page='.$i,$URL))}}">
                                        <span class="initSpan">{{$i}}</span>
                                    </a>
                                @else
                                    <a class="pageActive" href="{{url($URL."&page=".$i)}}">
                                        <span class="initSpan">{{$i}}</span>
                                    </a>
                                @endif
                            @else
                                @if(isset($_GET['page']))
                                    <a class="pageNotActive" href="{{url(str_replace('&page='.$_GET['page'],'&page='.$i,$URL))}}">
                                        <span class="initSpan">{{$i}}</span>
                                    </a>
                                @else
                                    <a class="pageNotActive" href="{{url($URL."&page=".$i)}}">
                                        <span class="initSpan">{{$i}}</span>
                                    </a>
                                @endif
                            @endif
                        @else
                            @if($i >$page_number-6)
                                @if(isset($_GET['page']))
                                    <a class="pageActive" href="{{url(str_replace('&page='.$_GET['page'],'&page='.$i,$URL))}}">
                                        <span class="initSpan">{{$i}}</span>
                                    </a>
                                @else
                                    <a class="pageActive" href="{{url($URL."&page=".$i)}}">
                                        <span class="initSpan">{{$i}}</span>
                                    </a>
                                @endif
                            @else
                                @if(isset($_GET['page']))
                                    <a class="pageNotActive" href="{{url(str_replace('&page='.$_GET['page'],'&page='.$i,$URL))}}">
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
                    <a class="n" id="pageNavNext" href="{{$page!=$page_number?url(str_replace("&page=".$_GET['page'],"&page=".($page+1),$URL)):''}}">
                        下一页<img src="{{url('images/product/pageNavNext.jpg')}}">
                    </a>
                @else
                    <a class="n" id="pageNavNext" href="{{$page!=$page_number?url($URL."&page=".($page+1)):''}}">
                        下一页<img src="{{url('images/product/pageNavNext.jpg')}}">
                    </a>
                @endif
                @if(isset($_GET['page']))
                    <a href="{{url(str_replace('&page='.$_GET['page'],'&page='.$page_number,$URL))}}" class="n pagefooter"><span>尾页<img src="{{url('images/product/pageNavNext.jpg')}}"><img src="{{url('images/product/pageNavNext.jpg')}}"></span></a>
                @else
                    <a href="{{url($URL.'&page='.$page_number)}}" class="n pagefooter"><span>尾页<img src="{{url('images/product/pageNavNext.jpg')}}"><img src="{{url('images/product/pageNavNext.jpg')}}"></span></a>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript" src="{{url('js/PublicDomain.js')}}"></script>
    <script type="text/javascript" src="{{url('js/product/products.js')}}"></script>
    <script type="text/javascript" src="{{url('js/product/productPageNav.js')}}"></script>
@endsection