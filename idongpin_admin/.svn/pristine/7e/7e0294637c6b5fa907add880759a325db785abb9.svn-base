@extends('admin.layouts.sublayout')
@section('title')类别管理
@stop
@section('css')
    <link href="{{url('css/product/navigation.css')}}" rel="stylesheet">
    <link href="{{url('css/product/tree-style.css')}}" rel="stylesheet">
@endsection
@section('navigation')
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="{{ route('product::typelist') }}" class="navbar-brand" onclick="showLoading()">
                    类别管理
                </a>
                <span class="tag">>></span>
            </div>
            <ul class="nav navbar-nav">
                <li class="{{ Route::is('product::typelist') ? 'active' : '' }}">
                    <a href="{{ route('product::typelist') }}" onclick="showLoading()">
                        类别列表
                    </a>
                </li>
            </ul>
        </div>
    </nav>
@stop
@section('content')
    <div class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="title">商品类别树</div>
                    </div>
                    <div class="panel-body">
                        <div id="FlatTree" class="tree tree-plus-minus">
                            <div class="tree-folder" style="display:none;">
                                <div class="tree-folder-header">
                                    <a class="tree-header-wrap">
                                        <i class="fa fa-folder"></i>
                                        <div class="tree-folder-name"></div>
                                    </a>
                                    <a class="add subitem" onclick="addType(this)">添加子分类</a>
                                    <a class="edit subitem" onclick="editType(this)">编辑</a>
                                    <a class="del subitem" onclick="delType(this)">删除</a>
                                </div>
                                <div class="tree-folder-content"></div>
                                <div class="tree-loader" style="display:none"></div>
                            </div>
                            <div class="tree-item" style="display:none;">
                                <i class="tree-dot"></i>
                                <div class="tree-item-name"></div>
                                <a class="add subitem" onclick="addType(this)">添加子分类</a>
                                <a class="edit subitem" onclick="editType(this)">编辑</a>
                                <a class="del subitem" onclick="delType(this)">删除</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary add-main">添加主分类</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="updateForm" {{$errors->has('type_name')&&!$errors->has('msg')?"style=display:block":""}}>
        <div class="formHeader">
            <span class="formTitle"></span>
            <span class="closeForm"><i class="glyphicon glyphicon-remove"></i></span>
        </div>
        <div style="padding: 15px;">
            <form name="typeForm" class="form-horizontal" action="{{url('/navigation/update')}}"
                  method="post">
                {!! csrf_field() !!}
                <div class="form-group {{$errors->has('type_name')?'has-error':""}}">
                    <label class="col-sm-4 control-label">类别名：</label>
                    <div class="col-sm-8">
                        <input type="text" name="type_name" class="form-control type_name" placeholder="请输入类别名">
                        @if ($errors->has('type_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('type_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <input type="hidden" name="type_id" id="type_id">
                <input type="hidden" name="type_par_id" id="type_par_id">
                <input type="hidden" name="do_method" id="do_method">
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-4">
                        <button type="submit" name="submit" id="typeBtn" class="btn btn-success btn">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
@section('js')
    <script type="text/javascript" src="{{url('js/product/tree.min.js')}}"></script>
    <script src="{{url('js/product/navigation.js')}}"></script>
    <script>
        if('{{$errors->has('msg')}}'){
            alert('{{$errors->first('msg')}}')
        }
    </script>
    @include('admin.layouts.loading')
@endsection