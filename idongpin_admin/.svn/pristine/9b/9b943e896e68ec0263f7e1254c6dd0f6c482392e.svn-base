@extends('admin.layouts.sublayout')
@section('css')
    <link href="{{url('css/order/order_index.css')}}" rel="stylesheet">
    <link href="{{url('css/tableStyle.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/datepicker.css') }}" type="text/css" />
    <style>
        .form1 .form-group{
            display: inline-block;
            width: 50%;
            float: left;
        }
    </style>
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
            <form class="form-horizontal form1" name="form1" action="" method="post" id="form1">
                <input type="hidden" name="do_method" value="update">
                <input type="hidden" name="proid" >
                <div class="form-group">
                    <label class="col-sm-4 control-label">发布订单编号：</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="launch_order_id"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">订单时限开始：</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="limit_time_start" type="text" name="limit_time_from"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">订单时限结束：</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="limit_time_end" type="text" name="limit_time_to"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">订单数量：</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="amount"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">订单名称：</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="launch_order_name"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">含油量：</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="oil_content"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">含水量：</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="water_content"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">保质期：</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="shelf_life"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">单只重量：</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="per_weight"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">单只长度：</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="per_length"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">产地：</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="madein"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">订单需求信息：</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="launch_order_detail"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">发布订单者id：</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="user_id"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">审核状态：</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="review_status"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">审核时间：</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="review_time_s" type="text" name="review_time"  oninput="hideError(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">审核人：</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="review_account"  oninput="hideError(this)">
                    </div>
                </div>
            </form>
        </div>
        <br style="clear: both"/>

    </div>

@stop
@section('js')
    @include('admin.layouts.loading')
    <script type="text/javascript" src="{{url('js/datepicker/datepicker.js')}}"></script>
    <script type="text/javascript" src="{{url('js/datepicker/datepicker-cn.js')}}"></script>
    <script>
        $(".form1 .form-group input").attr("disabled","disabled");
        function edit() {
            $(".form1 .form-group input").removeAttr("disabled");
            $(".formHeader .updating").css("display","none");
            $(".formHeader .goback").css("display","none");
            $(".formHeader .canceling").css("display","block");
            $(".formHeader .saving").css("display","block");
        }
        function cancels() {
           window.location.reload();
        }
        function saves() {

        }
        $('#limit_time_start').datepicker({
            language: "zh-CN",
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
        $('#limit_time_end').datepicker({
            language: "zh-CN",
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
//        $('#update_time').datepicker({
//            language: "zh-CN",
//            format: 'yyyy-mm-dd',
//            autoclose: true,
//            todayHighlight: true
//        });
        $('#review_time_s').datepicker({
            language: "zh-CN",
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
//        $('#create_time').datepicker({
//            language: "zh-CN",
//            format: 'yyyy-mm-dd',
//            autoclose: true,
//            todayHighlight: true
//        });
    </script>
@endsection