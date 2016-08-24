@extends('admin.layouts.sublayout')
@section('css')
    <link href="{{url('css/order/launchOrderDetail.css')}}" rel="stylesheet">
    <link href="{{url('css/tableStyle.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/datepicker.css') }}" type="text/css" />
@endsection
@section('navigation')
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="{{ route('order::index') }}" class="navbar-brand">
                    <i class="fa fa-fw fa-book"></i> 订单管理
                </a>
                <span class="tag">>></span>
            </div>
            <ul class="nav navbar-nav">
                <li class="{{ Route::is('order::launchOrderlist') ? 'active' : '' }}">
                    <a href="{{ route('order::launchOrderlist') }}">
                        询价单管理
                    </a>
                </li>
                <li>
                    <span class="tag">>></span>
                </li>
                <li class="{{ Route::is('order::launchOrderDetail') ? 'active' : '' }}">
                    <a href="{{ url('launchOrder/item?orderid='.$_GET['orderid']) }}">
                        询价单详情
                    </a>
                </li>
            </ul>
        </div>
    </nav>
@stop
@section('content')
    <div class="updateForm" id="Form">
        <div class="formHeader">
            <input type="hidden" id="companyid" name="companyid" >
            <span class="formTitle">询价单详细信息</span>
            <span class="btn btn-info goback" onclick="window.location.href='{{ url('launchOrder/list')}}';showLoading();"><i class="glyphicon glyphicon-chevron-left"></i>返回</span>
            <span class="btn btn-success updating" onclick="edit();"><i class="glyphicon glyphicon-book"></i>编辑</span>
            <span class="btn btn-warning  canceling" onclick="cancels();"><i class="glyphicon glyphicon-remove"></i>取消</span>
            <span class="btn btn-success saving" onclick="saves();"><i class="glyphicon glyphicon-floppy-save"></i>保存</span>
        </div>
        <div style="padding: 15px;">
            <form class="form-horizontal form1" name="form1" action="{{url('launchOrder/update')}}" method="post" id="form1">
                <input type="hidden" name="do_method" value="update">
                <input type="hidden" name="launch_order_id" value="{{$order->launch_order_id}}">
                <input type="hidden" name="user_id" value="{{$order->user_id}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-4 control-label">发布订单编号：</label>
                    <div class="col-sm-8">
                        <span class="form-control" style="border:none;background: none">{{$order->launch_order_id}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">订单发布者：</label>
                    <div class="col-sm-8">
                        <span class="form-control" style="border:none;background: none">{{isset($order->user_name)?$order->user_name:""}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">订单时限开始：</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="limit_time_start" type="text" name="limit_time_from" value="{{$order->limit_time_from}}"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">订单时限结束：</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="limit_time_end" type="text" name="limit_time_to" value="{{$order->limit_time_to}}"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">订单数量：</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="amount"  value="{{$order->amount}}"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">订单名称：</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="launch_order_name" value="{{$order->launch_order_name}}"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">含油量：</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="oil_content" value="{{$order->oil_content}}"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">含水量：</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="water_content" value="{{$order->water_content}}"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">保质期：</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="shelf_life" value="{{$order->shelf_life}}"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">单只重量：</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="per_weight" value="{{$order->per_weight}}"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">单只长度：</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="per_length" value="{{$order->per_length}}"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">产地：</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="madein" value="{{$order->madein}}">
                            @foreach($madein as $key => $value)
                                @if($order->madein == $value->madein_name)
                                    <option selected value="{{$value->madein_name}}">{{$value->madein_text}}</option>
                                @else
                                    <option value="{{$value->madein_name}}">{{$value->madein_text}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">订单需求信息：</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="launch_order_detail" value="{{$order->launch_order_detail}}"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">审核状态：</label>
                    <div class="col-sm-8">
                        {{--<select name="review_status" class="review_status" value="">--}}
                        {{--<option value="">未审核</option>--}}
                        {{--<option value="">审核通过</option>--}}
                        {{--<option value="">审核未通过</option>--}}
                        {{--</select>--}}
                        <input class="form-control" type="text" name="review_status" value="{{$order->review_status}}"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">审核时间：</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="review_time_s" type="text" name="review_time" value="{{$order->review_time}}"   oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">审核人：</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="review_account" value="{{$order->review_account}}"  oninput="hideError(this)">
                    </div>
                </div>
            </form>
        </div>
        <br style="clear: both"/>
        <div class="givePrice">
            <div class="give_head">
                <span class="title">产品报价信息</span>
                <div class="btn btn-success quotedPrice" onclick="add_price();">添加报价</div>
            </div>
            <div class="table-responsive">
                <table class="table table-condensed table-hover table-stats table-bordered" id="company">
                    <thead>
                    <tr>
                        <td style="width: 150px;">操作</td>
                        <td>报价单ID</td>
                        <td>公司名称</td>
                        <td>报价价格</td>
                        <td>运费</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->quotes as $key => $value)
                        <tr>
                            <td >
                                <a class="btn btn-xs btn-info looking" onclick="open_update_price(this);" >
                                    <i class="glyphicon glyphicon-pencil">修改</i>
                                </a>
                                <a class="btn btn-xs btn-danger looking" onclick="del_price(this);" data-number='{{$value->quote_id}}'>
                                    <i class="glyphicon glyphicon-remove">删除</i>
                                </a>
                            </td>
                            <td class="td_quote_id">{{$value->quote_id}}</td>
                            <td class="td_company_name">{{$value->company_name}}</td>
                            <td class="td_quote_price">{{$value->quote_price}}</td>
                            <td class="td_quote_freight">{{$value->quote_freight}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="add_price">
                <div class="head">
                    <span class="title">添加新报价</span>
                    <span class="glyphicon glyphicon-remove close" onclick="close_add_price();"></span>
                </div>
                <form class="form-horizontal" name="quoted" id="quoted" action="{{url('launchOrder/quote')}}" method="post" onsubmit="return false;">
                    {{csrf_field()}}
                    <input type="hidden" class="quote_launch_order_id" name="quote_launch_order_id" value="{{$_GET['orderid']}}">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">公司名称:</label>
                        <div class="col-sm-8">
                            @if(Auth::user()->user_type == 'admin')
                            <select name="quote_user_id" class="companyid form-control quote_user_id" value="0">
                                @foreach($companies as $key => $value)
                                    <option value="{{$value->company_id}}">{{$value->company_name}}</option>
                                @endforeach
                            </select>
                            @elseif(Auth::user()->user_type == 'company')
                                <span>{{$companies[0]['company_name']}}</span>
                                <input type="hidden" name="quote_user_id" value="{{Auth::user()->company_id}}">
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">报价价格:</label>
                        <div class="col-sm-8">
                            <input type="text" name="quote_price" class="quote_price form-control" value="" oninput="hideError(this);">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">运费:</label>
                        <div class="col-sm-8">
                            <input type="text" name="quote_freight" class="quote_freight form-control" value="" oninput="hideError(this);">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-4">
                            <input type="button" name="submit" class="btn btn-success submit" value="提交" style="width: 100%;" onclick="sendAddPrice();">
                        </div>
                    </div>
                </form>
            </div>
            <div class="update_price">
                <div class="head">
                    <span class="title">修改新报价</span>
                    <span class="glyphicon glyphicon-remove close" onclick="close_update_price();"></span>
                </div>
                <form class="form-horizontal" name="quoted" id="quoted" action="{{url('launchOrder/quote')}}" method="post" onsubmit="return false;">
                    <input type="hidden" class="quote_id" name="quote_id" value="">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">公司名称:</label>
                        <div class="col-sm-8">
                            <input name="company_name" class="company_name form-control" value="" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">报价价格:</label>
                        <div class="col-sm-8">
                            <input type="text" name="quote_price" class="quote_price form-control" value="" oninput="hideError(this);">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">运费:</label>
                        <div class="col-sm-8">
                            <input type="text" name="quote_freight" class="quote_freight form-control" value="" oninput="hideError(this);">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-4">
                            <input type="button" name="submit" class="btn btn-success submit" value="提交" style="width: 100%;" onclick="sendUpdatePrice();">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('js')
    @include('admin.layouts.loading')
    <script type="text/javascript" src="{{url('js/datepicker/datepicker.js')}}"></script>
    <script type="text/javascript" src="{{url('js/datepicker/datepicker-cn.js')}}"></script>
    <script type="text/javascript" src="{{url('js/order/launchorderdetail.js')}}"></script>
@endsection