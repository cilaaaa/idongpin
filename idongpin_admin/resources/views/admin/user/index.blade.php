@extends('admin.layouts.app')

@section('title')用户管理@endsection

@section('navigation')

@endsection

@section('content')
    <iframe src="{{url('/user/list')}}" frameborder="0" style="width: 100%;min-height: 650px"></iframe>
@endsection