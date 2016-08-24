@extends('admin.layouts.sublayout')
@section('css')
    <link href="{{url('css/order/order_index.css')}}" rel="stylesheet">
    <link href="{{url('css/tableStyle.css')}}" rel="stylesheet">
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
                <li class="{{ Route::is('order::orderlist') ? 'active' : '' }}">
                    <a href="{{ route('order::orderlist') }}">
                        订单列表
                    </a>
                </li>
            </ul>
        </div>
    </nav>
@stop
@section('content')
    <div class="container-fluid">
        <div class='text-left searchContent'>
            <form method="get" action="">
                <input type="text" name="keywords" id="search" value="{{isset($_GET['keywords'])?$_GET['keywords']:""}}" placeholder="请输入您搜索的内容..">
                <button class="btn btn-primary search" type="submit">搜索</button>
            </form>
            <button class="btn btn-success add text-center" onclick="window.location.href='{{url('order/add')}}'">
                <i class="glyphicon glyphicon-plus"></i>添加订单
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-condensed table-hover table-stats table-bordered" id="company">
                <thead>
                <tr>
                    <td>操作</td>
                    <td>订单ID</td>
                    <td>发布者</td>
                    <td>订单总付款金额</td>
                    <td>付款金额</td>
                    <td>供应商</td>
                    <td>商品数量</td>
                    <td>收货地址</td>
                    <td>订单状态</td>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>
                            <a class="btn btn-xs btn-info looking" href="{{url('order/orderManage?orderid='.$order->order_id)}}">
                                <i class="glyphicon glyphicon-search">查看</i>
                            </a>
                        </td>
                        <td>{{$order->order_id}}</td>
                        <td>{{$order->order_user_id}}</td>
                        <td>{{$order->amount}}</td>
                        <td>{{$order->pay_amount}}</td>
                        <td>{{$order->company_id}}</td>
                        <td>{{$order->qty}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->order_status}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @include('admin.layouts.paginate')
    </div>
@stop
@section('js')
    @include('admin.layouts.loading')
@endsection