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
                    <i class="fa fa-fw fa-book"></i> 订单管理
                </a>
            </div>
        </div>
    </nav>
@stop
@section('content')
    <div class="wrap">
        <div class="btn-wrap">
            <button type="button" class="btn btn-primary btn-lg" onclick="window.location.href='{{route('order::orderlist')}}'">订单管理</button>
        </div>
        <div class="btn-wrap">
            <button type="button" class="btn btn-primary btn-lg" onclick="window.location.href='{{route('order::launchOrderlist')}}'">询价单管理</button>
        </div>
        <br style="clear: both"/>
    </div>
@stop
@section('js')

@endsection