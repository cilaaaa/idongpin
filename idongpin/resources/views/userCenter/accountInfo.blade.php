@extends('layouts.user_center')
@section('csssheet')
    <link rel="stylesheet" type="text/css" href="{{url('css/userCenter/acountInfo.css')}}">
@endsection

@section('rightSideContent')
    <div class="infoMain">
        <div class="infoTags">
            <div class="countName">> 账户信息</div>
            <div class="countOpera">
                <span class="tagsName redSpan" id="basInfo">基本信息</span><span class="tagsText" id="comInfo">企业信息</span>
            </div>

        </div>
        <div class="infoDetails">
            <div class="head">
                <form id="headImages" name="headImages" action="">
                    <div>
                        <img src="{{url('images/userCenter/headPhoto.png')}}">
                    </div>
                    <a onclick="javascript:upImg();" >上传头像</a>
                    <input id="upImages" type="file" name="upImages" class="displayNone">
                </form>
            </div>
            <div class="details">
                <div class="Certification">
                    <span class="a">IDP</span><span class="b">（未认证）</span>
                </div>
                <div class="detailsItem">
                    <span class="detailsItemName w2">账户</span>:<span class="detailsItemText">18625654856</span>
                </div>
                <div class="detailsItem">
                    <div class="displayT">
                        <span class="detailsItemName w2">性别</span>:<span class="detailsItemText">男</span>
                    </div>
                    <div class="displayF">
                        <div class="sexSelect">
                            <div class="itemLeft "><span class="w2">性别</span>:</div>
                            <div  class="typeSelect">
                                <div  class="typeHeader">
                                    <div >请选择</div><img src="{{url('images/userCenter/down.png')}}">
                                </div>
                                <ul class="personalType">
                                    <li>男</li>
                                    <li>女</li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>

                </div>
                <div class="detailsItem" >
                    <div class="displayT">
                        <span class="detailsItemName w2">电话</span>:<span class="detailsItemText">18625654856</span>
                    </div>
                    <div class="displayF">
                        <span class="detailsItemName w2">电话</span>:<input class="inputPhone">
                    </div>
                </div>
                <div class="detailsItem">
                    <div class="displayT">
                        <span class="detailsItemName w4">公司类型</span>:<span class="detailsItemText">企业单位</span>
                    </div>
                    <div class="displayF">
                        <div class="companyTypeSelect">
                            <div class="itemLeft"><span class="w4">公司类型</span>:</div>
                            <div  class="typeSelect">
                                <div  class="typeHeader">
                                    <div >请选择</div><img src="{{url('images/userCenter/down.png')}}">
                                </div>
                                <ul class="personalType">
                                    <li>企业单位</li>
                                    <li>事业单位</li>
                                    <li>社会团体</li>
                                    <li>个体经营</li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="detailsItem">
                    <div class="displayT">
                        <span class="detailsItemName w3">所在地</span>:<span class="detailsItemText">上海广中西路777弄99号</span>
                    </div>
                    <div class="displayF">
                        <span class="detailsItemName w3">所在地</span>:<input class="inputAddress">
                    </div>
                </div>
                <div class="opera">
                    <span class="operaChange">修　改</span><span class="operaConfirm">确　定</span>
                </div>
            </div>
            <div class="detailsC displayNone">
                <div class="Certification">
                    <span class="a">IDP</span><span class="b">（未认证）</span>
                </div>
                <div class="detailsItem">
                    <span class="detailsItemName w2">账户</span>:<span class="detailsItemText">18625654856</span>
                </div>
                <div class="detailsItem">
                    <div class="displayT">
                        <span class="detailsItemName w4">公司类型</span>:<span class="detailsItemText">企业单位</span>
                    </div>
                    <div class="displayF">
                        <div class="companyTypeSelect">
                            <div class="itemLeft"><span class="w4">公司类型</span>:</div>
                            <div  class="typeSelect">
                                <div  class="typeHeader">
                                    <div >请选择</div><img src="{{url('images/userCenter/down.png')}}">
                                </div>
                                <ul class="personalType">
                                    <li>企业单位</li>
                                    <li>事业单位</li>
                                    <li>社会团体</li>
                                    <li>个体经营</li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>

                </div>
                <div class="detailsItem">
                    <div class="displayT">
                        <span class="detailsItemName w4">公司名称</span>:<span class="detailsItemText">上海涌得贸易</span>
                    </div>
                    <div class="displayF">
                        <span class="detailsItemName w4">公司名称</span>:<input class="inputName">
                    </div>

                </div>
                <div class="detailsItem" >
                    <div class="displayT">
                        <span class="detailsItemName w4">经营地址</span>:<span class="detailsItemText">上海广中西路777弄99号</span>
                    </div>
                    <div class="displayF">
                        <span class="detailsItemName w4">经营地址</span>:<input class="inputAddress">
                    </div>

                </div>
                <div class="detailsItem">
                    <div class="displayT">
                        <span class="detailsItemName w4">主营行业</span>:<span class="detailsItemText">牛 羊 猪</span>
                    </div>
                    <div class="displayF">
                        <div class="industrySelect">
                            <div class="itemLeft"><span class="w4">主营行业</span>:</div>
                            <div  class="typeSelect">
                                <div  class="typeHeader">
                                    <div >请选择</div><img src="{{url('images/userCenter/down.png')}}">
                                </div>
                                <ul class="personalType">
                                    <li>
                                        <span>鸡</span><img  src="{{url('images/userCenter/btn_2_1.png')}}" class="industryCheck">
                                    </li>
                                    <li>
                                        <span>鸭</span><img  src="{{url('images/userCenter/btn_2_1.png')}}"  class="industryCheck">
                                    </li>
                                    <li>
                                        <span>鹅</span><img  src="{{url('images/userCenter/btn_2_1.png')}}"  class="industryCheck">
                                    </li>
                                    <li>
                                        <span>牛</span><img  src="{{url('images/userCenter/btn_2_1.png')}}" class="industryCheck">
                                    </li>
                                    <li>
                                        <span>羊</span><img  src="{{url('images/userCenter/btn_2_1.png')}}"  class="industryCheck">
                                    </li>
                                    <li>
                                        <span>猪</span><img  src="{{url('images/userCenter/btn_2_1.png')}}"  class="industryCheck">
                                    </li> <li>
                                        <span>海鲜</span><img  src="{{url('images/userCenter/btn_2_1.png')}}" class="industryCheck">
                                    </li>
                                    <li>
                                        <span>其他</span><img src="{{url('images/userCenter/btn_2_1.png')}}" class="industryCheck">
                                    </li>
                                    <div>
                                        <div class="industryConfirm">
                                            <span>确定</span>
                                        </div>
                                        <div class="industryCancel">
                                            <span>取消</span>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="detailsItem">
                    <div class="displayT">
                        <span class="detailsItemName w4">主营产品</span>:<span class="detailsItemText"><span>销售</span>　<span>采购</span></span>
                    </div>
                    <div class="displayF">
                        <div class="productSelect">
                            <div class="itemLeft"><span class="w4">主营产品</span>:</div>
                            <div  class="typeSelect">
                                <div  class="typeHeader">
                                    <div >请选择</div><img src="{{url('images/userCenter/down.png')}}">
                                </div>
                                <ul class="personalType">
                                    <li>
                                        <span>销售</span><img  src="{{url('images/userCenter/btn_2_1.png')}}" class="industryCheck">
                                    </li>
                                    <li>
                                        <span>采购</span><img  src="{{url('images/userCenter/btn_2_1.png')}}"  class="industryCheck">
                                    </li>
                                    <li>
                                        <span>其他</span><img src="{{url('images/userCenter/btn_2_1.png')}}" class="industryCheck">
                                    </li>
                                    <div>
                                        <div class="industryConfirm">
                                            <span>确定</span>
                                        </div>
                                        <div class="industryCancel">
                                            <span>取消</span>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>

                </div>
                <div class="detailsItem">
                    <div class="displayT">
                        <span class="detailsItemName w4">公司网站</span>:<span class="detailsItemText">www.zdongdong.com</span>
                    </div>
                    <div class="displayF">
                        <span class="detailsItemName w4">公司网站</span>:<input class="inputSite">
                    </div>
                </div>
                <div class="opera">
                    <span class="operaChange">修　改</span><span class="operaConfirm">确　定</span>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="{{url('js/PublicDomain.js')}}"></script>
    <script type="text/javascript" src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="{{url('js/userCenter/acountInfo.js')}}"></script>

@endsection