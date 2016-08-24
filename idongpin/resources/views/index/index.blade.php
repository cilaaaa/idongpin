@extends('layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('css/index/index.css')}}">
    @endsection
            <!-- viwepager start -->
@section('viwepager')
    <div class="viwepager">
        <div class="banner">
            <ul class="image">
                @foreach($slidePics as $key => $value)
                    <li data-color="{{$value->bg_color}}">
                        <a href="javascript:void(0)">
                            <img src="{{url($value->pic_url)}}">
                        </a>
                    </li>
                @endforeach
            </ul>
            <div  class="shu">
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="carte" id="carte">
        @foreach($types as $k=>$v)
            <div class="firstCarte" id="" data-type="{{$v['type_id']}}">
                <img class="itemImg" src="{{url('images/index/itemActive.png')}}">
                <div class="menuItem {{' '.$v['type_id'] =="400" ? 'activeItem':' ' }}" data-type="{{$v['type_id']}}">
                    <div class="bigClass">{{$v['type_name']}}</div>
                    <div class="smallClass">
                        @if(isset($v['subtypes']))
                            <?php $count = 0; ?>
                            @foreach($v['subtypes'] as $k1=>$v1)
                                @if($count<3)
                                        <?php $count++; ?>
                                    <span>{{$v1['type_name']}}</span>
                                @else
                                    @break;
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        {{--<div class="firstCarte"  data-type="4">--}}
            {{--<img class="itemImg" src="{{url('images/index/itemActive.png')}}">--}}
            {{--<div class="menuItem" data-type="4">--}}
                {{--<div class="bigClass">找物流</div>--}}
                {{--<div class="smallClass">--}}
                    {{--<span>门到门配送服务</span>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="firstCarte" data-type="5">--}}
            {{--<img class="itemImg" src="{{url('images/index/itemActive.png')}}">--}}
            {{--<div class="menuItem" data-type="5">--}}
                {{--<div class="bigClass">找仓储</div>--}}
                {{--<div class="smallClass">--}}
                    {{--<span>实时监控保障安全</span>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="firstCarte" data-type="6">--}}
            {{--<img class="itemImg" src="{{url('images/index/itemActive.png')}}">--}}
            {{--<div class="menuItem" data-type="6">--}}
                {{--<div class="bigClass">找资金</div>--}}
                {{--<div class="smallClass">--}}
                    {{--<span>白条在手买货不愁</span>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div id="secondCarte" style="position:absolute;">
            @foreach($types as $key => $value)
                <div class="secondCarte {{' '.$value['type_id'] == 400 ? 'secondCarteActive':' '}}" data-type ='{{$value['type_id']}}'>
                    {{--<div class="topCarte">--}}
                        {{--@foreach($value['subtypes'] as $k => $v)--}}
                            {{--<div data-type="{{$v['type_id']}}" class="{{$k==0 ? 'secondActive':' '}}">--}}
                                {{--<span>{{$v['type_name']}}</span>--}}
                                {{--<img class="{{$k==0 ? 'imgActive':' '}}" src="{{url('images/point.png')}}">--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                    {{--@foreach($value['subtypes'] as $k => $v)--}}
                        <div class="bottomCarte bottomCarte_{{$v['type_id']}} {{''.$k==0 ? 'bottomCarteActive':''}}">
                            {{--@foreach($v['subtypes'] as $k_1 => $v_1)--}}
                            @if(isset($value['subtypes']))
                                @foreach($value['subtypes'] as $k => $v)
                                    <a href="{{url('search?searchType=product&page=1&protype='.$value['type_id'].'&subtype='.$v['type_id'])}}" class="thirdCarte">{{$v['type_name']}}</a>
                                @endforeach
                            @endif
                        </div>
                    {{--@endforeach--}}
                    <div class="strength">
                        <div>
                            <img src="{{url('images/index/stock.png')}}">
                            <span>海量现货库存</span>
                        </div>
                        <div>
                            <img src="{{url('images/index/supply.png')}}">
                            <span>供求精准匹配</span>
                        </div>
                        <div>
                            <img src="{{url('images/index/userCount.png')}}">
                            <span>每天20000+使用</span>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="secondCarte" data-type ='4'>
                <img src="{{url('images/transport.png')}}">
            </div>
            <div class="secondCarte" data-type ='5'>
                <img src="{{url('images/stock.png')}}">
                <a class="learnMore" href="#">了解更多</a>
            </div>
            <div class="secondCarte" data-type ='6'>
                <img src="{{url('images/fund.png')}}">
            </div>
        </div>
    </div>
     <div class="brandPromise">
        <div class="brandPromise1">
            <img src="{{url('images/index/brandpromiseicon4.png')}}" />
            <p class="promiseText">交易服务</p>
            <p class="promisedetail">专家指导，支付护航</p>
        </div>
        <div class="brandPromise2">
            <img src="{{url('images/index/brandpromiseicon3.png')}}">
            <p class="promiseText">品牌联盟</p>
            <p class="promisedetail">名企云集，大牌汇聚</p>
        </div>
        <div class="brandPromise3">
            <img src="{{url('images/index/brandpromiseicon1.png')}}">
            <p class="promiseText">安全可追溯</p>
            <p class="promisedetail">食品安全，严格把关</p>
        </div>
        <div class="brandPromise4">
            <img src="{{url('images/index/brandpromiseicon2.png')}}">
            <p class="promiseText">源头采集</p>
            <p class="promisedetail">去中间商，产地直供</p>
        </div>
    </div>
     <div class="flashSale">
         <div class="sale">
             <div class="saleTheme"><img src="{{url('images/index/flashSaleTtl.png')}}"></div>
             <div class="saleContent">
                 <div class="saleBanner">
                     @for($i = 0 ; $i<4 ; $i++)
                         <div class="specialSell" data-flag="specialSell_{{$i}}">
                             @for($j=0;$j<3;$j++)
                                 @foreach($products as $key => $value)
                                     @if($key == (3*$i+$j))
                                         <div class="specialSellGoods" onclick="window.location.href='{{url('product/item?companyid='.$value['company_id'].'&proid='.$value['pro_id'])}}'">
                                             <img class="specialSellImg" src="{{url('images/index/specialSell.png')}}">
                                             <div class="saleInfo">
                                                 <div class="saleImg">
                                                     <img src="{{isset($value['product_info']['pro_img'])?$value['product_info']['pro_img']:""}}">
                                                 </div>
                                                 <div class="saleDetail">
                                                     <div class="saleTtl">{{isset($value['product_info']['pro_name'])?$value['product_info']['pro_name']:""}}</div>
                                                     <div class="saleKind">
                                                         {{--<span>{{isset($value['product_info']['type_name'])?$value['product_info']['type_name']:""}}</span>--}}
                                                         {{--<span>{{isset($value['product_info']['pro_mode'])?$value['product_info']['pro_mode']:""}}</span>--}}
                                                     </div>
                                                     @if(!isset($value['product_info']['pro_unitPrice']) || $value['product_info']['pro_unitPrice']==0 || $value['product_info']['pro_unitPrice']=="")
                                                         <div class="price">
                                                             <span class="now">价格电询</span>
                                                         </div>
                                                     @else
                                                        <div class="guidePrice">指导价格：</div>
                                                         <div class="priceNow">
                                                             <span class="now"><span>¥<span>{{$value['product_info']['pro_unitPrice']}}</span></span><span class="price">{{isset($value['product_info']['wholesale_unit'])&& $value['product_info']['wholesale_unit']!=""?'/'.$value['product_info']['wholesale_unit']:""}}</span></span>
                                                         </div>
                                                         <div class="regularPrice ">VIP价格电询</div>
                                                         {{--<!-- <div class="regularPrice "><span class="proUnitPrice"><del>¥<span>{{$value['product_info']['price_extend']}}</span></del><span>{{isset($value['product_info']['unit'])&& $value['product_info']['unit']!=""?'/'.$value['product_info']['unit']:""}}</span></span></div> -->--}}
                                                     @endif
                                                     <div class="saleCompany"><img src="{{url('images/index/goodsIcon.png')}}"><span class="company">{{isset($value['product_info']['pro_provider'])?$value['product_info']['pro_provider']:""}}</span><span class="saleAddress">{{isset($value['product_info']['import_port'])?$value['product_info']['import_port']:""}}</span></div>
                                                 </div>
                                             </div>
                                         </div>
                                     @endif
                                 @endforeach
                             @endfor
                             <div class="clear"></div>
                         </div>
                     @endfor
                     <div class="clear"></div>
                 </div>
             </div>
             <div class="saleBottom">
                 <ul class="saleDots">
                     <li class="saleDot saleDotActive" data-flag="specialSell_1"></li>
                     <li class="saleDot" data-flag="specialSell_2"></li>
                     <li class="saleDot" data-flag="specialSell_3"></li>
                     <li class="saleDot" data-flag="specialSell_4"></li>
                 </ul>
             </div>
         </div>
     </div>
     <div class="goods">
        <div class="goodsTeme">
            <div class="recomend">
                <span class="hostGoods">推荐热品</span>
                <span class="spot">.</span>
                <span class="purpose">/我们只选对的不选贵的/</span>
            </div>
            <div class="sort">
                <a href="{{url('/search?searchType=product&page=1')}}" class="more">更多 ></a>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>

        <!-- 推荐热门产品 -->
        <div class="content">
            <ul class="goodsMode" id="" data-type="">
                <li class="advertisement">
                    <img src="{{url('images/index/adImg.png')}}">
                </li>
                @foreach($products as $key => $value)
                    @if($key<=15 && $key >= 12)
                        <li class="goodsList" onclick="window.location.href='{{url('product/item?companyid='.$value['company_id'].'&proid='.$value['pro_id'])}}'">
                            <div class="border">
                                <div class="goodsImg">
                                    <img src="{{isset($value['product_info']['pro_img'])?$value['product_info']['pro_img']:""}}">
                                </div>
                                <div class="goodsIntroduce">
                                    <div class="goodsName">{{isset($value['product_info']['pro_name'])?$value['product_info']['pro_name']:""}}</div>
                                    <div class="goodsKind">
                                        {{--<span>{{isset($value['product_info']['type_name'])?$value['product_info']['type_name']:""}}</span>--}}
                                        {{--<span>{{isset($value['product_info']['pro_mode'])?$value['product_info']['pro_mode']:""}}</span>--}}
                                    </div>
                                    <div class="goodsInfo">
                                        @if(!isset($value['product_info']['pro_unitPrice']) || $value['product_info']['pro_unitPrice']==0 || $value['product_info']['pro_unitPrice']=="")
                                            <div class="price">
                                                <span class="now">价格电询</span>
                                            </div>
                                        @else
                                            <div class="guidePrice">指导价格：</div>
                                            <div class="priceNow">
                                                <span class="now"><span>¥<span>{{$value['product_info']['pro_unitPrice']}}</span></span><span class="price">{{isset($value['product_info']['wholesale_unit'])&& $value['product_info']['wholesale_unit']!=""?'/'.$value['product_info']['wholesale_unit']:""}}</span></span>
                                            </div>
                                            <div class="regularPrice ">VIP价格电询</div>
                                            {{--<!-- <div class="regularPrice "><span class="proUnitPrice" style="text-decoration: line-through;">¥<span>{{$value['product_info']['price_extend']}}</span><span>{{isset($value['product_info']['wholesale_unit'])&& $value['product_info']['wholesale_unit']!=""?'/'.$value['product_info']['wholesale_unit']:""}}</span></span></div> -->--}}
                                        @endif
                                    </div>
                                    <div class="belong"><img class="icon" src="images/goodsIcon.png"><span class="company">{{isset($value['product_info']['pro_provider'])?$value['product_info']['pro_provider']:""}}</span><span class="address">{{isset($value['product_info']['import_port'])?$value['product_info']['import_port']:""}}</span></div>
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>

         <div class="goodsTeme">
            <div class="recomend">
                <span class="hostGoods">精选冻品</span>
                <span class="spot">.</span>
                <span class="purpose">/肉香肆意，大快朵颐/</span>
            </div>
            <div class="sort">
                <a href="{{url('/search?searchType=product&page=1')}}" class="more">更多 ></a>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>

        <!-- 推荐热门产品 -->
        <div class="content">
            <ul class="goodsMode" id="" data-type="">
                <li class="advertisement">
                    <img src="{{url('images/index/adImg_2.png')}}">
                </li>
                @foreach($products as $key => $value)
                    @if($key<=19 && $key >= 16)
                        <li class="goodsList" onclick="window.location.href='{{url('product/item?companyid='.$value['company_id'].'&proid='.$value['pro_id'])}}'">
                            <div class="border">
                                <div class="goodsImg">
                                    <img src="{{isset($value['product_info']['pro_img'])?$value['product_info']['pro_img']:""}}">
                                </div>
                                <div class="goodsIntroduce">
                                    <div class="goodsName">{{isset($value['product_info']['pro_name'])?$value['product_info']['pro_name']:""}}</div>
                                    <div class="goodsKind">
                                        {{--<span>{{isset($value['product_info']['type_name'])?$value['product_info']['type_name']:""}}</span>--}}
                                        {{--<span>{{isset($value['product_info']['pro_mode'])?$value['product_info']['pro_mode']:""}}</span>--}}
                                    </div>
                                    <div class="goodsInfo">
                                        @if(!isset($value['product_info']['pro_unitPrice']) || $value['product_info']['pro_unitPrice']==0 || $value['product_info']['pro_unitPrice']=="")
                                            <div class="price">
                                                <span class="now">价格电询</span>
                                            </div>
                                        @else
                                            <div class="guidePrice">指导价格：</div>
                                            <div class="priceNow">
                                                <span class="now"><span>¥<span>{{$value['product_info']['pro_unitPrice']}}</span></span><span class="price">{{isset($value['product_info']['wholesale_unit'])&& $value['product_info']['wholesale_unit']!=""?'/'.$value['product_info']['wholesale_unit']:""}}</span></span>
                                            </div>
                                            <div class="regularPrice ">VIP价格电询</div>
                                            {{--<!-- <div class="regularPrice "><span class="proUnitPrice" style="text-decoration: line-through;">¥<span>{{$value['product_info']['price_extend']}}</span><span>{{isset($value['product_info']['wholesale_unit'])&& $value['product_info']['wholesale_unit']!=""?'/'.$value['product_info']['wholesale_unit']:""}}</span></span></div> -->--}}
                                        @endif
                                    </div>
                                    <div class="belong"><img class="icon" src="images/goodsIcon.png"><span class="company">{{isset($value['product_info']['pro_provider'])?$value['product_info']['pro_provider']:""}}</span><span class="address">{{isset($value['product_info']['import_port'])?$value['product_info']['import_port']:""}}</span></div>
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>

    <!-- 产商 -->
    <div class="productionBusiness">
        <div class="topTtlBar">
            <div class="topTtlBarLeft">
                <span class="superior">优品产商</span>
                <span  class="spot">.</span>
                <span class="purpose">/大牌产商，品质保证/</span>
            </div>
            <div class="topTtlBarRight">
                <span class="superiorRight">战略合作伙伴</span>
                <span  class="spot">.</span>
                <span class="purpose">/实力买家，优质客户/</span>
            </div>
        </div>
        <div class="showBusiness">
            <ul class="showBusinessLeft">
                <li class="business business_1" onclick="window.location.href='{{url('/company?companyid=10032')}}'">
                    <img src="{{url('images/index/baiyoujia.png')}}">
                    <div>中国顶级的肉类供应厂商</div>
                </li>
                <li class="business business_2" onclick="window.location.href='{{url('/company?companyid=10028')}}'">
                    <img src="{{url('images/index/taisen.png')}}">
                    <div>中国顶级的肉类供应厂商</div>
                </li>
            </ul>
            <ul class="showBusinessRight">
                <li class="business business_1">
                    <img src="{{url('images/index/ziyan.png')}}">
                    <div>在本平台年采购量30＋亿人民币</div>
                </li>
                <li class="business business_2">
                    <img src="{{url('images/index/wufangzhai.png')}}">
                    <div>在本平台年采购量20＋亿人民币</div>
                </li>
            </ul>
        </div>
    </div>
    </div>
   <!--  <div class="advantage">
        <span class="superior">品牌优势</span>
        <span  class="spot">.</span>
        <span class="purpose">我们不仅仅只提供好的商品</span>
    </div> -->

    <div class="promise">
       <ul>
           <li class="priceGuarantee">
               <div class="guaranteeImg">
                   <img src="{{url('images/index/priceGuarantee.png')}}">
               </div>
               <div class="guaranteeContent">
                   <span class="guaranteeTop">价格保证</span>
                   <span class="guaranteeMiddle">无中间环节</span>
                   <span class="guaranteeBottom">低于市场价格20%</span>
               </div>
               <div class="clear"></div>
           </li>
           <li class="refundGuarantee">
               <div class="guaranteeImg">
                   <img src="{{url('images/index/refundGuarantee.png')}}">
               </div>
               <div class="guaranteeContent">
                   <span class="guaranteeTop">退换货保证</span>
                   <span class="guaranteeMiddle">补贴运费</span>
                   <span class="guaranteeBottom">2天内无条件退货</span>
               </div>
               <div class="clear"></div>
           </li>
           <li class="deliveryGuarantee">
               <div class="guaranteeImg">
                   <img src="{{url('images/index/deliveryGuarantee.png')}}">
               </div>
               <div class="guaranteeContent">
                   <span class="guaranteeTop">配送保证</span>
                   <span class="guaranteeMiddle">货到付款</span>
                   <span class="guaranteeBottom">直达县市</span>
               </div>
               <div class="clear"></div>
           </li>
           <li class="physicalGuarantee">
               <div class="guaranteeImg">
                   <img src="{{url('images/index/physicalGuarantee.png')}}">
               </div>
               <div class="guaranteeContent">
                   <span class="guaranteeTop">实物保证</span>
                   <span class="guaranteeMiddle">真是来源</span>
                   <span class="guaranteeBottom">实物拍摄</span>
               </div>
               <div class="clear"></div>
           </li>
           <li class="qualityGuarantee">
               <div class="guaranteeImg">
                   <img src="{{url('images/index/qualityGuarantee.png')}}">
               </div>
               <div class="guaranteeContent">
                   <span class="guaranteeTop">品质保证</span>
                   <span class="guaranteeMiddle">品牌合作</span>
                   <span class="guaranteeBottom">绝无山寨</span>
               </div>
               <div class="clear"></div>
           </li>
           <li class="serviceGuarantee">
               <div class="guaranteeImg">
                   <img src="{{url('images/index/serviceGuarantee.png')}}">
               </div>
               <div class="guaranteeContent">
                   <span class="guaranteeTop">服务稳定</span>
                   <span class="guaranteeMiddle">我们有稳定的</span>
                   <span class="guaranteeBottom">客服为您服务</span>
               </div>
               <div class="clear"></div>
           </li>
           <li class="clear"></li>
       </ul>
    </div>
    

@endsection
@section('javascript')
    <script type="text/javascript" src="{{url('js/PublicDomain.js')}}"></script>
    <script type="text/javascript" src="{{url('js/searchTool.js')}}"></script>
    <script type="text/javascript" src="{{url('js/index.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var index = 0;
            var t;
            $(".image li").first().show();
            $(".shu li").first().addClass("Imgactive");
            timer();
            $(".shu li").mouseover(function(){
                $(this).addClass("Imgactive").siblings("li").removeClass("Imgactive");
                index = $(this).index();
                $(".image li").eq(index).fadeIn().siblings().fadeOut();
                var color = $(".image li").eq(index).attr("data-color");
                $(".viwepager").css({
                    backgroundColor : color
                });
            });
            function timer(){
                t = setInterval(function(){
                    $(".shu li").eq(index).addClass("Imgactive").siblings("li").removeClass("Imgactive");
                    $(".image li").eq(index).fadeIn().siblings().fadeOut();
                    var color = $(".image li").eq(index).attr("data-color");
                    $(".viwepager").css({
                        backgroundColor : color
                    });
                    if(index==4){
                        index=0;
                    }else{
                        index++;
                    }
                },3000);
            }
            $(".banner").hover(function(){
                clearInterval(t);
            },function(){
                timer();
            });
        });
    </script>
@endsection