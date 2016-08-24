@extends('admin.layouts.app')

@section('title')商铺管理@endsection

@section('navigation')

@endsection

@section('content')
    <iframe id="mainFrame" src="{{url('/company/list')}}" frameborder="0" style="width: 100%;"
             scrolling="no"></iframe>
@endsection

@section('js')
    <script type="text/javascript" src="{{url('js/public/iframe_height_auto.js')}}"></script>
    <script type="text/javascript">
        startInit('mainFrame',650);
    </script>
@stop