@extends('admin.layouts.sublayout')
@section('title')添加商品
@stop
@section('css')
    <link href="{{url('css/product/product_add.css')}}" rel="stylesheet">
    <link href="{{url('css/tableStyle.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/datepicker.css') }}" type="text/css"/>
@endsection
@section('navigation')
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="{{ route('product::index') }}" class="navbar-brand" onclick="showLoading();">
                    商品管理
                </a>
                <span class="tag">>></span>
            </div>
            <ul class="nav navbar-nav">
                <li class="{{ Route::is('product::list') ? 'active' : '' }}">
                    <a href="{{ route('product::list') }}" onclick="showLoading();">
                        商品列表
                    </a>
                </li>
                <li>
                    <span class="tag">>></span>
                </li>
                <li class="{{ Route::is('product::add') ? 'active' : '' }}">
                    <a href="{{ url('product/add?companyid='.$_GET['companyid']) }}" onclick="showLoading();">
                        商品添加
                    </a>
                </li>
            </ul>
        </div>
    </nav>
@stop
@section('content')
    <div class="updateForm" id="Form">
        <div class="formHeader">
            <input type="hidden" id="companyid" name="companyid">
            <span class="formTitle">添加新商品</span>
            <div class="btn btn-success continues"><i class="glyphicon glyphicon-plus"></i>属性</div>
        </div>
        <div style="padding: 15px">
            <form class="form-horizontal" name="form1" id="form1" method="post" action="{{url('product/add')}}"
                  onsubmit="return false;">
                {{csrf_field()}}
                <ul class="add_property">
                    <li class="item form-group">
                        <label class="col-sm-4 control-label">商品名：</label>
                        <div class="col-sm-8">
                            <div>
                                <input class="property_text form-control pro_name" type="text" name="pro_name" value=""
                                       placeholder="请输入属性值" onfocus="removeMessage(this)">
                            </div>
                        </div>
                    </li>
                    <li class="item form-group">
                        <label class="col-sm-4 control-label">商品类型：</label>
                        <div class="col-sm-8">
                            <div>
                                <select class="pro_type_id form-control" name="pro_type_id">
                                    <option value="0">选择类型</option>
                                    @foreach($types as $key => $value)
                                        <option value="{{$value['type_id']}}">{{$value['type_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </li>
                </ul>
                <br style="clear: both;">
                {{--<div class="add_inventory">--}}
                    {{--<div class="head">--}}
                        {{--<span class="title">添加库存</span>--}}
                        {{--<span class="btn btn-primary addbtn" onclick="openAlertDiv();">添加库存记录</span>--}}
                    {{--</div>--}}
                    {{--<div class="table-responsive" style="margin-top: 10px;">--}}
                        {{--<table class="table table-condensed table-hover table-stats table-bordered" id="table">--}}
                            {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<td>批发价格</td>--}}
                                {{--<td>起批量</td>--}}
                                {{--<td>批发单位</td>--}}
                                {{--<td>单价</td>--}}
                                {{--<td style="width: 150px;">操作</td>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="form-group">
                    <div style="width: 100%;text-align: center;margin-top: 50px;">
                        <div class="btn btn-info goback"
                             onclick="window.location.href='{{url('product/list')}}'; showLoading();"><i
                                    class="glyphicon glyphicon-chevron-left"></i>返回
                        </div>
                        <button type="button" class="btn btn-success saving" onclick="sendPost();"><i
                                    class="glyphicon glyphicon-floppy-save"></i>提交
                        </button>
                    </div>
                </div>
                <input type="hidden" name="companyid" value="{{$_GET['companyid']}}">
                <input type="hidden" name="inventory" id="inventory" value="">
            </form>
        </div>
    </div>
    {{--<div class="alertDiv">--}}
        {{--<div class="title">--}}
            {{--<span class="title_text">添加库存信息</span>--}}
            {{--<span class="close" onclick="closeAlertDiv();"><i class="glyphicon glyphicon-remove"></i></span>--}}
        {{--</div>--}}
        {{--<div style="padding: 15px;">--}}
            {{--<form class="addInventForm form-horizontal" name="addInventForm"  onsubmit="return false;">--}}
                {{--<input type="hidden" class="inventory_id" name="inventoryid" value="">--}}
                {{--<div class="form-group">--}}
                    {{--<label class="col-sm-4 control-label">商品批发价格：</label>--}}
                    {{--<div class="col-sm-8">--}}
                        {{--<div class="line">--}}
                            {{--<input type="text" class="form-control wholesale_price" name="wholesale_price" value="" placeholder="请输入商品批发价格" oninput="removeMessage(this);">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label class="col-sm-4 control-label">商品起批量：</label>--}}
                    {{--<div class="col-sm-5">--}}
                        {{--<div class="line">--}}
                            {{--<input type="text" class="form-control wholesale_amount" name="wholesale_amount" value="" placeholder="请输入起批量" oninput="removeMessage(this);">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-3">--}}
                        {{--<div class="line">--}}
                            {{--<input type="text" class="form-control wholesale_unit" name="wholesale_unit" value="" placeholder="单位" oninput="removeMessage(this);">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label class="col-sm-4 control-label">商品单价：</label>--}}
                    {{--<div class="col-sm-8">--}}
                        {{--<div class="line">--}}
                            {{--<input type="text" class="form-control wholesale_price_extend" name="wholesale_price_extend" value="" placeholder="商品批发价格" oninput="removeMessage(this);">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<div class="col-sm-4 col-sm-offset-4">--}}
                        {{--<input type="button" class="btn btn-info inventSubmit" name="inventSubmit" id="inventSubmit" value="确定" onclick="addTr(this);">--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</form>--}}
        {{--</div>--}}
    {{--</div>--}}
@stop
@section('js')
    @include('admin.layouts.loading')
    <script>
        function createDiv() {
            /*********************************************
             *                                           *
             *            获取已经选择了的属性值             *
             *                                           *
             *********************************************/
            var property = [];
            var count = 0;
            var flag = true;
            $('.add_property .item .property_text').each(function () {
                property[count] = $(this).attr('name');
                count++;
            });
            /*********************************************
             *                                           *
             *     创建新DIV元素，供用户选择需要添加的属性     *
             *                                           *
             *********************************************/
            var div = document.createElement("div");
            var Form = document.getElementById('Form');
            div.setAttribute('class', 'add_div');
            var content = [];
            content.push(' <span class="div_title">添加属性</span> <span class="div_close" onclick="closeDiv()"><i class="glyphicon glyphicon-remove"></i></span> <div style="margin-top: 10px;border-top:1px solid #a1a1a1;display: inline-block;padding-top: 20px;">');
            @foreach($fields as $field)
                @if($field->property_name !="pro_name" && $field->property_name!="pro_type_id")
                    content.push( '<div class="col-sm-6 context"><input type="checkbox" class="checkbox" name="{{$field->property_name}}" data-text="{{$field->property_text}}"><span class="text">{{$field->property_text}}</span></div>');
            @endif
        @endforeach
       content.push('</div> <div class="col-sm-4 col-sm-offset-4"><button type="button" class="btn btn-success" onclick="propertySure()" style="margin-top: 15px;width: 100%">确定</button></div>');
            div.innerHTML = content.join(" ");
            Form.appendChild(div);
            /*********************************************
             *     判断该属性是否被选择,如果是则不能复选。      *
             *********************************************/
            $("#Form .add_div .checkbox").each(function () {
                for (var i = 0; i < property.length; i++) {
                    if ($(this).attr('name') == property[i]) {
                        flag = false;
                    }
                }
                if (!flag) {
                    $(this).attr('disabled', true);
                    $(this).parent().find('.text').css('color',"#a1a1a1");
                }
                flag = true;
            });
        }

        /*********************************************
         *           选择属性，显示到页面中              *
         *********************************************/
        function propertySure() {
            $('.add_div .checkbox').each(function () {
                if ($(this).is(':checked')) {
                    var str_1 = '<li class="item form-group"><label class="col-sm-4 control-label">' + $(this).attr('data-text') + '：</label>';
                    if ($(this).attr('name') == 'pro_date') {
                        str_1 += '<div class="col-sm-8"><div class="input-group"> <input class="property_text form-control" id="datepicker" ' +
                                'type="datetime" ' +
                                'name="' + $(this).attr('name') + '" value="" placeholder="请输入属性值" onfocus="removeMessage(this)">';
                    } else if ($(this).attr('name') == 'pro_place') {
                        var options = '\''+
                                @foreach($madein as $v)
                                        '<option value="{{$v->madein_name}}">{{$v->madein_text}}</option>' +
                                @endforeach
                                '\'';
                        str_1 += '<div class="col-sm-8"><div class="input-group"><select class="property_text form-control" name="' + $(this)
                                        .attr('name') + '">' + options + '</select>';
                    } else {
                        str_1 += '<div class="col-sm-8"><div class="input-group"> <input class="property_text form-control" type="text" name="' + $(this).attr('name') + '" value="" placeholder="请输入属性值" onfocus="removeMessage(this)">';
                    }
                    str_1 += ' <span class="input-group-addon remove" onclick="removeProperty(this)"><i class="glyphicon glyphicon-remove"></i></span></div></div> </li>';
                    $('.add_property').append(str_1);
                    datepicker_init();
                }
            });
            $('.add_div').remove();
        }
        function datepicker_init() {
            $('#datepicker').datepicker({
                language: "zh-CN",
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
            });
        }

    </script>
    <script type="text/javascript" src="{{url('js/product/product_add.js')}}"></script>
    <script type="text/javascript" src="{{url('js/datepicker/datepicker.js')}}"></script>
    <script type="text/javascript" src="{{url('js/datepicker/datepicker-cn.js')}}"></script>
@endsection