@extends('admin.layouts.app')

@section('title')订单管理@endsection

@section('navigation')

@endsection

@section('content')
    <iframe id="mainFrame" src="{{url('/order/index')}}" scrolling="no" frameborder="0" style="width: 100%;"></iframe>
@endsection

@section('js')
    <script type="text/javascript" src="{{url('js/public/iframe_height_auto.js')}}"></script>
    <script type="text/javascript">
        startInit('mainFrame',650);
    </script>
@stop