@extends('admin.layouts.sublayout')
@section('css')
    <link href="{{url('css/tableStyle.css')}}" rel="stylesheet">
    <link href="{{url('css/product/field.css')}}" rel="stylesheet">
@endsection
@section('navigation')
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="{{ route('product::fieldlist') }}" class="navbar-brand" onclick="showLoading()">
                    属性管理
                </a>
                <span class="tag">>></span>
            </div>
            <ul class="nav navbar-nav">
                <li class="{{ Route::is('product::fieldlist') ? 'active' : '' }}">
                    <a href="{{ route('product::fieldlist') }}" onclick="showLoading()">
                        属性列表
                    </a>
                </li>
            </ul>
        </div>
    </nav>
@stop
@section('content')
    <div class="container-fluid">
        <div class='text-left searchContent'>
            <button class="btn btn-success add text-center"><i class="glyphicon glyphicon-plus"></i>添加</button>
            <form method="get" action="">
                <input type="text" name="keywords" id="search" value="{{isset($_GET['keywords'])?$_GET['keywords']:""}}" placeholder="请输入您搜索的内容..">
                <button class="btn btn-primary search" type="submit">搜索</button>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-condensed table-hover table-stats table-bordered" id="company">
                <thead>
                <tr>
                    <td style="width: 130px;">操作</td>
                    <td>商品属性字段id</td>
                    <td>商品属性字段名称</td>
                    <td>属性字段显示文本</td>
                </tr>
                </thead>
                <tbody>
                @foreach($fields as $field)
                    <tr>
                        <td>
                            <a class="btn btn-xs btn-info edit" onclick="editfield(this)"
                               href="javascript:void(0)">
                                编辑
                            </a>
                            <a class="btn btn-xs btn-danger del" onclick="delfield(this)"
                               href="javascript:void(0)">
                                删除
                            </a>
                        </td>
                        <td>{{$field->id}}</td>
                        <td>{{$field->property_name}}</td>
                        <td>{{$field->property_text}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @include('admin.layouts.paginate')
    </div>
    <div class="updateForm" {{$errors->count()>0&&!$errors->has('msg')?"style=display:block":""}}>
        <div class="formHeader">
            <span class="formTitle"></span>
            <span class="closeForm"><i class="glyphicon glyphicon-remove"></i></span>
        </div>
        <div style="padding: 15px;">
            <form name="update" class="update form-horizontal" action="{{url('/field/update')}}" method="post">
                {!! csrf_field() !!}
                <div class="form-group {{$errors->has('property_name')?'has-error':""}}">
                    <label class="col-sm-4 control-label">属性字段名称：</label>
                    <div class="col-sm-8">
                        <input type="tel" name="property_name" class="form-control property_name" placeholder="请输入属性字段名称">
                        @if ($errors->has('property_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('property_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{$errors->has('property_text')?'has-error':""}}">
                    <label class="col-sm-4 control-label">属性字段显示文本：</label>
                    <div class="col-sm-8">
                        <input type="tel" name="property_text" class="form-control property_text" placeholder="请输入属性字段显示文本">
                        @if ($errors->has('property_text'))
                            <span class="help-block">
                                <strong>{{ $errors->first('property_text') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <input type="hidden" name="do_method" id="do_method">
                <input type="hidden" name="fieldid" id="fieldid">
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-4">
                        <button type="submit" name="submit" id="fieldBtn" class="btn btn-success btn">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
@section('js')
    <script type="text/javascript" src="{{url('js/product/field.js')}}"></script>
    <script>
        if('{{$errors->has('msg')}}'){
            alert('{{$errors->first('msg')}}')
        }
    </script>
    @include('admin.layouts.loading')
@endsection