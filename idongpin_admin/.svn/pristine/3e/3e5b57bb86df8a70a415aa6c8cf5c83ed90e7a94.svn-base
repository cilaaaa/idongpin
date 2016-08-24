@extends('admin.layouts.sublayout')
@section('title')商品详情
@stop
@section('css')
    <link href="{{url('css/product/product.css')}}" rel="stylesheet" xmlns="http://www.w3.org/1999/html">
    <link href="{{url('css/tableStyle.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/datepicker.css') }}" type="text/css" />
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

                <li class="{{ Route::is('product::item') ? 'active' : '' }}">
                    <a href="{{ url('product/item?proid='.$_GET['proid']) }}" onclick="showLoading();">
                        商品详情
                    </a>
                </li>
            </ul>
        </div>
    </nav>
@stop
@section('content')
    <div class="updateForm" id="Form">
        <div class="formHeader">
            <input type="hidden" id="companyid" name="companyid" value="{{$_GET['proid']}}">
            <span class="formTitle">商品详细信息</span>
            <span class="btn btn-info goback" onclick="showLoading();"><i class="glyphicon glyphicon-chevron-left"></i>返回</span>
            <span class="btn btn-success updating"><i class="glyphicon glyphicon-book"></i>编辑</span>
            <span class="btn btn-warning  canceling"><i class="glyphicon glyphicon-remove"></i>取消</span>
            <span class="btn btn-success saving"><i class="glyphicon glyphicon-floppy-save"></i>保存</span>
            <div class=" btn  btn-primary continues" onclick="createDiv();"><i class="glyphicon glyphicon-plus"></i>属性</div>
        </div>
        <div style="padding: 15px;">
            <form class="form-horizontal form1" name="form1" action="{{url('product/update')}}" method="post" id="form1">
                <input type="hidden" name="do_method" value="update">
                <input type="hidden" name="proid" value="{{$_GET['proid']}}">
                {{csrf_field()}}
                @foreach($product as $key => $value)
                    @if($value['property_name'] == 'pro_name')
                        <div class="form-group">
                            <label class="col-sm-4 control-label">{{$value['property_text']}}：</label>
                            <div class="col-sm-8">
                                <div >
                                    <input class="form-control" type="text" name="{{$value['property_name']}}" value="{{$value['property_value']}}" oninput="hideError(this)">
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @foreach($product as $key => $value)
                    @if($value['property_name'] == 'pro_type_id')
                        <div class="form-group">
                            <label class="col-sm-4 control-label">{{$value['property_text']}}：</label>
                            <div class="col-sm-8">
                                <select class="form-control" type="text" name="{{$value['property_name']}}" value="{{$value['property_value']}}">
                                    @foreach($types as $k =>$v)
                                        @if($v['type_id'] == $value['property_value'])
                                            <option value="{{$v['type_id']}}" selected>{{$v['type_name']}}</option>
                                        @else
                                            <option value="{{$v['type_id']}}">{{$v['type_name']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                @endforeach
                @foreach($product as $key => $value)
                    @if($value['property_name'] != 'pro_name' && $value['property_name'] != 'pro_type_id')
                        @if($value['property_name'] == 'pro_date')
                            <div class="form-group">
                                <label class="col-sm-4 control-label">{{$value['property_text']}}：</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input class="form-control" id="picker" type="datetime" name="{{$value['property_name']}}" value="{{$value['property_value']}}">
                                        <span class="input-group-addon"> <i class="glyphicon glyphicon-remove"></i></span>
                                    </div>
                                </div>
                            </div>
                            {{--@elseif($value['property_name'] == 'pro_provider')--}}
                            {{--<div class="form-group">--}}
                            {{--<label class="col-sm-3 control-label">{{$value['property_text']}}：</label>--}}
                            {{--<div class="col-sm-8">--}}
                            {{--<select class="form-control" type="text" name="{{$value['property_name']}}" value="{{$value['property_value']}}">--}}
                            {{--<option>{{$value['property_value']}}</option>--}}
                            {{--</select>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        @elseif($value['property_name'] =='pro_place')
                            <div class="form-group">
                                <label class="col-sm-4 control-label">{{$value['property_text']}}：</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <select class="form-control" type="text" name="{{$value['property_name']}}" value="{{$value['property_value']}}">
                                            @foreach($madein as $v)
                                                @if($v->madein_name == $value['property_value'])
                                                    <option value="{{$v->madein_name}}" selected>{{$v->madein_text}}</option>
                                                @else
                                                    <option value="{{$v->madein_name}}">{{$v->madein_text}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-remove"></i></span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="form-group">
                                <label class="col-sm-4 control-label">{{$value['property_text']}}：</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="{{$value['property_name']}}" value="{{$value['property_value']}}" oninput="hideError(this)">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-remove"></i></span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            </form>
        </div>
        <br style="clear: both"/>
        {{--<div class="inventory">--}}
            {{--<div class="div_head">--}}
                {{--<span class="formTitle">商品库存信息</span>--}}
                {{--<div class="btn btn-primary add_inventory" onclick="openAddInventory();">添加库存</div>--}}
            {{--</div>--}}
            {{--<table class="table table-condensed table-hover table-stats table-bordered" id="inventory">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<td style="width: 130px;">操作</td>--}}
                    {{--<td>库存ID</td>--}}
                    {{--<td>商品批发价格</td>--}}
                    {{--<td>商品起批量</td>--}}
                    {{--<td>批发单位（箱/吨/kg）</td>--}}
                    {{--<td>商品单价</td>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody>--}}
                {{--@foreach($inventory as $key => $value)--}}
                    {{--<tr>--}}
                        {{--<td>--}}
                            {{--<a class="btn btn-xs btn-success" href="javascript:void(0)"  onclick="openUpdateInventory(this);" data-inventoryid="{{$value->id}}">--}}
                                {{--<i class="glyphicon glyphicon-pencil"></i>修改--}}
                            {{--</a>--}}
                            {{--<a class="btn btn-xs btn-danger" href="javascript:void(0)" data-inventoryid="{{$value->id}}" onclick="delUpdateInventory(this)">--}}
                                {{--<i class="glyphicon glyphicon-remove"></i>删除--}}
                            {{--</a>--}}
                        {{--</td>--}}
                        {{--<td class="td_id">{{$value->id}}</td>--}}
                        {{--<td class="td_wholesale_price">{{$value->wholesale_price}}</td>--}}
                        {{--<td class="td_wholesale_amount">{{$value->wholesale_amount}}</td>--}}
                        {{--<td class="td_wholesale_unit">{{$value->wholesale_unit}}</td>--}}
                        {{--<td class="td_wholesale_price_extend">{{$value->wholesale_price_extend}}</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
                {{--</tbody>--}}
            {{--</table>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="add_invent">--}}
        {{--<div class="title">--}}
            {{--<span class="title_text">添加库存信息</span>--}}
            {{--<span class="close" onclick="closeAddInventory();"><i class="glyphicon glyphicon-remove"></i></span>--}}
        {{--</div>--}}
        {{--<div style="padding: 15px;">--}}
            {{--<form class="addInventForm form-horizontal" name="addInventForm" action="" method="">--}}
                {{--<input type="hidden" name="proid" class="proid" value="{{$_GET['proid']}}">--}}
                {{--<div class="form-group">--}}
                    {{--<label class="col-sm-4 control-label">商品批发价格：</label>--}}
                    {{--<div class="col-sm-8">--}}
                        {{--<input type="text" class="form-control wholesale_price" name="wholesale_price" value="" placeholder="请输入商品批发价格" oninput="removeErrorMessage(this);">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label class="col-sm-4 control-label">商品起批量：</label>--}}
                    {{--<div class="col-sm-5">--}}
                        {{--<input type="text" class="form-control wholesale_amount" name="wholesale_amount" value="" placeholder="请输入起批量" oninput="removeErrorMessage(this);">--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-3">--}}
                        {{--<input type="text" class="form-control wholesale_unit" name="wholesale_unit" value="" placeholder="单位" oninput="removeErrorMessage(this);">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label class="col-sm-4 control-label">商品单价：</label>--}}
                    {{--<div class="col-sm-8">--}}
                        {{--<input type="text" class="form-control wholesale_price_extend" name="wholesale_price_extend" value="" placeholder="商品批发价格" oninput="removeErrorMessage(this);">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<div class="col-sm-4 col-sm-offset-4">--}}
                        {{--<input type="button" class="btn btn-info inventSubmit" name="inventSubmit" id="inventSubmit" value="提交" onclick="addUpdateInventory();">--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</form>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="update_invent">--}}
        {{--<div class="title">--}}
            {{--<span class="title_text">修改库存信息</span>--}}
            {{--<span class="close" onclick="closeUpdateInventory();"><i class="glyphicon glyphicon-remove"></i></span>--}}
        {{--</div>--}}
        {{--<div style="padding: 15px;">--}}
            {{--<form class="addInventForm form-horizontal" name="addInventForm" action="" method="" onsubmit="return false;">--}}
                {{--<input type="hidden" class="inventory_id" name="inventoryid" value="">--}}
                {{--<div class="form-group">--}}
                    {{--<label class="col-sm-4 control-label">商品批发价格：</label>--}}
                    {{--<div class="col-sm-8">--}}
                        {{--<input type="text" class="form-control wholesale_price" name="wholesale_price" value="" placeholder="请输入商品批发价格" oninput="removeErrorMessage(this);">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label class="col-sm-4 control-label">商品起批量：</label>--}}
                    {{--<div class="col-sm-5">--}}
                        {{--<input type="text" class="form-control wholesale_amount" name="wholesale_amount" value="" placeholder="请输入起批量" oninput="removeErrorMessage(this);">--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-3">--}}
                        {{--<input type="text" class="form-control wholesale_unit" name="wholesale_unit" value="" placeholder="单位" oninput="removeErrorMessage(this);">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label class="col-sm-4 control-label">商品单价：</label>--}}
                    {{--<div class="col-sm-8">--}}
                        {{--<input type="text" class="form-control wholesale_price_extend" name="wholesale_price_extend" value="" placeholder="商品批发价格" oninput="removeErrorMessage(this);">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<div class="col-sm-4 col-sm-offset-4">--}}
                        {{--<input type="button" class="btn btn-info inventSubmit" name="inventSubmit" id="inventSubmit" value="确定" onclick="sendUpdateInentoryAjax();">--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</form>--}}
        {{--</div>--}}
    {{--</div>--}}
@stop

@section('js')
    <script>
        function createDiv(){
            /**            获取已经选择了的属性值             **/
            if($('.add_div').length == 0){
                var property=[];
                var count = 0;
                var flag=true;
                $('.form-group input,select').each(function(){
                    property[count]=$(this).attr('name');
                    count++;
                });
                /**     创建新DIV元素，供用户选择需要添加的属性     **/
                var div = document.createElement("div");
                var Form = document.getElementById('Form');
                div.setAttribute('class','add_div');
                var content=[];
                content.push(' <span class="div_title">添加属性</span> <span class="div_close" onclick="closeDiv()"><i class="glyphicon glyphicon-remove"></i></span> <div style="margin-top: 10px;border-top:1px solid #a1a1a1;display: inline-block;padding-top: 20px;">');
                @foreach($fields as $field)
                    @if($field->property_name !="pro_name" && $field->property_name!="pro_type_id")
                        content.push('<div class="col-sm-6 context"><input type="checkbox" class="checkbox" name="{{$field->property_name}}" data-text="{{$field->property_text}}"><span class="text">{{$field->property_text}}</span></div>');
                @endif
            @endforeach
            content.push('</div><div class="col-sm-4 col-md-offset-4"> <button type="button" class="btn btn-success" onclick="proPertySure()" style="margin-top: 15px;width: 100%">确定</button></div>');
                div.innerHTML=content.join(" ");
                Form.appendChild(div);
                /**     判断该属性是否被选择,如果是则不能复选。      **/
                $("#Form .add_div .checkbox").each(function(){
                    for(var i= 0; i < property.length ; i++){
                        if($(this).attr('name') == property[i]){
                            flag = false;
                            console.log($(this).attr('name'));
                        }
                    }
                    if(!flag){
                        $(this).attr('disabled',true);
                        $(this).parent().find('.text').css('color','#a1a1a1');
                    }
                    flag=true;
                });
            }
        }

        function proPertySure(){
            $('.add_div .checkbox').each(function () {
                if ($(this).is(':checked')) {
                    var str_1='<div class="form-group">';
                    str_1+='<label class="col-sm-4 control-label">'+$(this).attr("data-text")+'：</label>';
                    if($(this).attr("name") == 'pro_date'){
                        str_1+='<div class="col-sm-8"><div class="input-group"><input class="form-control" id="datepicker" type="datetime" name="'+$(this).attr("name")+'" value="" oninput="hideError(this)">';
                    }else if($(this).attr("name") == 'pro_place'){
                        var options = '\''+
                        @foreach($madein as $v)
                                        '<option value="{{$v->madein_name}}">{{$v->madein_text}}</option>'+
                                @endforeach
                                        '\'';
                                        str_1 += '<div class="col-sm-8"><div class="input-group"><select class="property_text form-control" name="'+ $(this).attr('name') + '"value="">' + options + '</select>';
                    }else{
                        str_1+='<div class="col-sm-8"><div class="input-group"><input class="form-control" type="text" name="'+$(this).attr("name")+'" value="" oninput="hideError(this)">';
                    }
                    str_1+='<span class="input-group-addon" onclick="removeProperty(this)"><i class="glyphicon glyphicon-remove"></i></span></div></div>';
                    $('#form1').append(str_1);
                    datepicker_init();
                }
            });
            $('.add_div ').remove();
        }
    </script>
    @include('admin.layouts.loading')
    <script src="{{url('js/product/productDetail.js')}}"></script>
    <script type="text/javascript" src="{{url('js/datepicker/datepicker.js')}}"></script>
    <script type="text/javascript" src="{{url('js/datepicker/datepicker-cn.js')}}"></script>

@endsection