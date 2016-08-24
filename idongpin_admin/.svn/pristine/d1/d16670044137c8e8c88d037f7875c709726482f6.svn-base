@extends('admin.layouts.sublayout')
@section('css')
    <link href="{{url('css/order/order_add.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/datepicker.css') }}" type="text/css" />
@endsection
@section('navigation')
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="{{ route('order::index') }}" class="navbar-brand">
                    订单管理
                </a>
                <span class="tag">>></span>
            </div>
            <ul class="nav navbar-nav">
                <li class="{{ Route::is('order::index') ? 'active' : '' }}">
                    <a href="{{ route('order::index') }}">
                        订单管理
                    </a>
                </li>
                <li>
                    <span class="tag">>></span>
                </li>

                <li class="{{ Route::is('order::orderlist') ? 'active' : '' }}">
                    <a href="{{ route('order::orderlist') }}">
                        订单列表
                    </a>
                </li>
                <li>
                    <span class="tag">>></span>
                </li>
                <li class="{{ Route::is('order::add') ? 'active' : '' }}">
                    <a href="{{ route('order::add') }}">
                        添加订单
                    </a>
                </li>
            </ul>
        </div>
    </nav>
@stop
@section('content')
    <div class="container-fluid">
        <div class="updateForm" id="Form">
            <div class="formHeader">
                <input type="hidden" id="companyid" name="companyid" value="">
                <span class="formTitle">添加订单</span>
                <span class="btn btn-info goback"><i class="glyphicon glyphicon-chevron-left" onclick="window.location.href='http://114.55.150.226:8080/order/orderlist'"></i>返回</span>
                <span class="btn btn-success saving"><i class="glyphicon glyphicon-floppy-save"></i>下单</span>
            </div>
        </div>
        <div class="formSubmit" style="padding: 15px;">
            <form class="form-horizontal form" name="form" action="{{url('/order/add')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('company_id') ? ' has-error' : '' }}">
                    <label class="col-sm-4  control-label">供应商：</label>
                    <div class="col-sm-8">
                        <select class="form-control company_id"  name="company_id" value="{{old('company_id')}}">
                            <option value="">请选择供应商</option>
                            @foreach($companies as $company)
                                @if($company->company_id == old('company_id'))
                                    <option selected value="{{$company->company_id}}">{{$company->company_name}}</option>
                                @else
                                    <option value="{{$company->company_id}}">{{$company->company_name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @if ($errors->has('company_id'))
                            <span class="help-block">
                                <strong>{{$errors->first('company_id')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('pro_id') ? ' has-error' : '' }}">
                    <label class="col-sm-4  control-label">商品：</label>
                    <div class="col-sm-8">
                        <select class="form-control pro_id"  name="pro_id" value="{{old('pro_id')}}">
                            <option value="">请选择商品</option>
                        </select>
                        @if ($errors->has('pro_id'))
                            <span class="help-block">
                                <strong>{{$errors->first('pro_id')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                {{--<div class="form-group {{ $errors->has('inventory_id') ? ' has-error' : '' }}">--}}
                {{--<label class="col-sm-4  control-label">商品库存：</label>--}}
                {{--<div class="col-sm-8">--}}
                {{--<select class="form-control inventory_id"  name="inventory_id">--}}
                {{--<option value="">请选择库存</option>--}}
                {{--</select>--}}
                {{--@if ($errors->has('inventory_id'))--}}
                {{--<span class="help-block">--}}
                {{--<strong>{{ $errors->first('inventory_id') }}</strong>--}}
                {{--</span>--}}
                {{--@endif--}}
                {{--</div>--}}
                {{--</div>--}}
                <div class="form-group {{ $errors->has('order_user_id') ? ' has-error' : '' }}">
                    <label class="col-sm-4  control-label">买家手机号：</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  order_user_id"  name="order_user_id" maxlength="11" value="{{old('order_user_id')}}" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
                        @if ($errors->has('order_user_id'))
                            <span class="help-block">
                                <strong>{{$errors->first('order_user_id')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                {{--<div class="form-group {{ $errors->has('freight') ? ' has-error' : '' }}">--}}
                {{--<label class="col-sm-4  control-label">订单运费金额：</label>--}}
                {{--<div class="col-sm-8">--}}
                {{--<input type="text" class="form-control freight"  name="freight">--}}
                {{--@if ($errors->has('freight'))--}}
                {{--<span class="help-block">--}}
                {{--<strong>{{ $errors->first('freight') }}</strong>--}}
                {{--</span>--}}
                {{--@endif--}}
                {{--</div>--}}
                {{--</div>--}}
                <div class="form-group {{ $errors->has('unit_price') ? ' has-error' : '' }}">
                    <label class="col-sm-4  control-label">商品单价：</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="text" class="form-control unit_price"  name="unit_price" value="{{old('unit_price')}}" onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')">
                            @if ($errors->has('unit_price'))
                                <span class="help-block">
                                    <strong>{{$errors->first('unit_price')}}</strong>
                                </span>
                            @endif
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle {{ $errors->has('price_unit') ? ' has-error' : '' }}" data-toggle="dropdown">
                                    <span class="price_unit">{{old('price_unit')!="" ? old('price_unit') : '单位'}}</span>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li class="text-center" onclick="change_price_unit(this);"><a>元/kg</a></li>
                                    <li class="text-center" onclick="change_price_unit(this);"><a>元/件</a></li>
                                    <li class="text-center" onclick="change_price_unit(this);"><a>元/吨</a></li>
                                </ul>
                                @if ($errors->has('price_unit'))
                                    <span class="help-block">
                                    <strong>请选择</strong>
                                </span>
                                @endif
                            </div>
                            <input type="hidden" name="price_unit" id="price_unit" value="{{old('price_unit')}}">
                        </div>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('qty') ? ' has-error' : '' }}">
                    <label class="col-sm-4  control-label">商品数量：</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="text" class="form-control qty"  name="qty" value="{{old('qty')}}" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
                            @if ($errors->has('qty'))
                                <span class="help-block">
                                    <strong>{{$errors->first('qty')}}</strong>
                                </span>
                            @endif
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle {{ $errors->has('qty_unit') ? ' has-error' : '' }}" data-toggle="dropdown">
                                    <span class="qty_unit">{{old('qty_unit')!=""?old('qty_unit'):"单位"}}</span>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li class="text-center" onclick="change_qty_unit(this);"><a>kg</a></li>
                                    <li class="text-center" onclick="change_qty_unit(this);"><a>件</a></li>
                                    <li class="text-center" onclick="change_qty_unit(this);"><a>吨</a></li>
                                </ul>
                                @if ($errors->has('qty_unit'))
                                    <span class="help-block">
                                    <strong>请选择</strong>
                                </span>
                                @endif
                            </div>
                            <input type="hidden" name="qty_unit" id="qty_unit" value="{{old('qty_unit')}}">
                        </div>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">
                    <label class="col-sm-4  control-label">订单商品总价：</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control amount"  name="amount" value="{{old('amount')}}" onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')">
                        @if ($errors->has('amount'))
                            <span class="help-block">
                                <strong>{{$errors->first('amount')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">订单运费金额：</label>
                    <div class="col-sm-3 {{ $errors->has('freight_type') ? 'has-error' : '' }}">
                        <select class="freight_type " name="freight_type" value="{{old('freight_type')}}">
                            <option value="">运费付款方式</option>
                            <option value="自提" {{old('freight_type')=="自提"?'selected':""}}>自提</option>
                            <option value="货到付款" {{old('freight_type')=="货到付款"?'selected':""}}>货到付款</option>
                            <option value="免运费" {{old('freight_type')=="免运费"?'selected':""}}>免运费</option>
                        </select>
                        @if ($errors->has('freight_type'))
                            <span class="help-block">
                                <strong>{{$errors->first('freight_type')}}</strong>
                            </span>
                        @endif
                    </div>
                    <label class="col-sm-2 control-label">金额：</label>
                    <div class="col-sm-3 {{ $errors->has('freight') ? ' has-error' : '' }}">
                        @if(old('freight_type'))
                            <input type="text" class="form-control freight" id="freight" name="freight" placeholder="输入具体金额"   value="{{old('freight')}}" onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')">
                        @else
                            <input type="text" class="form-control freight" id="freight" name="freight" placeholder="输入具体金额" readonly  value="{{old('freight')}}" onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')">
                        @endif
                        @if ($errors->has('freight'))
                            <span class="help-block">
                                <strong>{{$errors->first('freight')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('receipt_person') ? ' has-error' : '' }}">
                    <label class="col-sm-4  control-label">收货人：</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"  name="receipt_person" value="{{old('receipt_person')}}">
                        @if ($errors->has('receipt_person'))
                            <span class="help-block">
                                <strong>{{$errors->first('receipt_person')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('receipt_person_phone') ? ' has-error' : '' }}">
                    <label class="col-sm-4  control-label">收货人手机号：</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="receipt_person_phone" maxlength="11" value="{{old('receipt_person_phone')}}" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
                        @if ($errors->has('receipt_person_phone'))
                            <span class="help-block">
                                <strong>{{$errors->first('receipt_person_phone')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                    <label class="col-sm-4  control-label">收货地址：</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control address"  name="address" value="{{old('address')}}">
                        @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{$errors->first('address')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('arrival_date') ? ' has-error' : '' }}">
                    <label class="col-sm-4  control-label">到货日期：</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="arrival_date" id="datepicker" value="{{old('arrival_date')}}">
                        @if ($errors->has('arrival_date'))
                            <span class="help-block">
                                <strong>{{$errors->first('arrival_date')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
@section('js')
    @include('admin.layouts.loading')
    <script src="{{url('js/order/addOrder.js')}}"></script>
    <script type="text/javascript" src="{{url('js/datepicker/datepicker.js')}}"></script>
    <script type="text/javascript" src="{{url('js/datepicker/datepicker-cn.js')}}"></script>
    @if(old('company_id') != "")
        <script type="text/javascript">
            var pro_id = $('.pro_id').attr('value');
            $.ajax({
                url: 'http://114.55.150.226:8080/order/getCompanyPro',
                type: 'get',
                cache: 'false',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    companyid:$('.company_id').val(),
                },
                success: function (data) {
                    $('.pro_id').empty().append("<option value=''>请选择商品</option>");
                    $.each(data,function($k,$v){
                        if(pro_id == $v.proid){
                            $('.pro_id').append("<option selected value='" + $v.proid + "'>" + $v.proname + "</option>");
                        }else{
                            $('.pro_id').append("<option value='" + $v.proid + "'>" + $v.proname + "</option>");
                        }
                    });
                    hideLoading();
                },
                error: function (data) {
                    alert('网络或服务器错误，请检查网络连接！');
                    console.log(data);
                    hideLoading();
                }
            });
        </script>
    @endif
    <script type="text/javascript">
        if('{{$errors->has('msg')}}'=='1'){
            alert('{{$errors->first('msg')}}');
        }
        $('#datepicker').datepicker({
            language: "zh-CN",
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
    </script>
@endsection
