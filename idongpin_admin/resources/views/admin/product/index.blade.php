@extends('admin.layouts.app')

@section('title')商品管理@endsection

@section('navigation')

@endsection

@section('content')
    <iframe id="mainFrame" src="{{url('/product/list')}}" frameborder="0" style="width: 100%;min-height: 650px" scrolling="no"></iframe>
@endsection

@section('js')
    <script type="text/javascript" src="{{url('js/public/iframe_height_auto.js')}}"></script>
    <script type="text/javascript">
        startInit('mainFrame',650);
    </script>
@stop