@extends('admin.layouts.sublayout')
@section('title')商铺管理
@stop
@section('css')
    <link href="{{url('css/company/company_manage.css')}}" rel="stylesheet">
    <link href="{{url('css/tableStyle.css')}}" rel="stylesheet">
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">

@endsection
@section('navigation')
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="{{ route('company::list') }}" class="navbar-brand"  onclick="showLoading()">
                     商铺管理
                </a>
                <span class="tag">>></span>
            </div>
            <ul class="nav navbar-nav">
                <li class="{{ Route::is('company::list') ? 'active' : '' }}">
                    <a href="{{ route('company::list') }}" onclick="showLoading()">
                        商铺列表
                    </a>
                </li>
            </ul>
        </div>
    </nav>
@stop
@section('content')
    <div class='text-left searchContent'>
        <input type="text" name="search" id="search" placeholder="请输入您搜索的内容..">
        <button class="btn btn-primary search">搜索</button>
    </div>
    <div class="table-responsive">
        <table class="table table-condensed table-hover table-stats table-bordered" id="company">
            <thead>
            <tr>
                <td>操作</td>
                <td>企业ID</td>
                <td>名称</td>
                <td>联系人</td>
                <td>手机</td>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $key=>$value)
                <tr>
                    <td>
                       <a class="btn btn-xs btn-info looking" href="{{url('company/item?companyid='.$value->company_id)}}">
                            <i class="glyphicon glyphicon-search">查看</i>
                       </a>
                    </td>
                    <td>{{isset($value->company_id)?$value->company_id:""}}</td>
                    <td>{{isset($value->company_name)?$value->company_name:""}}</td>
                    <td>{{isset($value->company_linkman)?$value->company_linkman:""}}</td>
                    <td>{{isset($value->company_mobile)?$value->company_mobile:""}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div style="text-align: center">
        {{$companies->links()}}
    </div>
@stop
@section('js')
    <script src="{{url('js/company/company.js')}}"></script>
    @include('admin.layouts.loading')
@endsection