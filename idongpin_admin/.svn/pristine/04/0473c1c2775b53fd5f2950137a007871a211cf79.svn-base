@extends('admin.layouts.sublayout')
@section('css')
    <link href="{{url('css/tableStyle.css')}}" rel="stylesheet">
    <link href="{{url('css/User/user_manage.css')}}" rel="stylesheet">
@endsection
@section('navigation')
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="{{ route('user::list') }}" class="navbar-brand">
                    用户管理
                </a>
                <span class="tag">>></span>
            </div>
            <ul class="nav navbar-nav">
                <li class="{{ Route::is('user::list') ? 'active' : '' }}">
                    <a href="{{ route('user::list') }}">
                        用户列表
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
                    <td>用户id</td>
                    <td>用户名称</td>
                    <td>用户手机号</td>
                    <td>用户类型</td>
                    <td>用户组</td>
                    <td>状态</td>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            <a class="btn btn-xs btn-info looking"  href="{{url
                            ('user/userDetail?userid='
                            .$user->user_id)}}">
                                查看
                            </a>
                            <a class="btn btn-xs btn-success looking" onclick="openac('{{$user->user_id}}')"
                               href="javascript:void(0)">
                                启用
                            </a>
                            <a class="btn btn-xs btn-danger looking" onclick="closeac('{{$user->user_id}}')"
                               href="javascript:void(0)">
                                停用
                            </a>
                        </td>
                        <td>{{$user->user_id}}</td>
                        <td>{{$user->user_name}}</td>
                        <td>{{$user->user_phone}}</td>
                        <td>{{$user->user_type}}</td>
                        <td>{{$user->groupid}}</td>
                        <td>{{$user->status}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @include('admin.layouts.paginate')
    </div>
    <div class="updateForm" id="Form">
        <div class="formHeader">
            <span class="formTitle">添加新用户</span>
            <span class="closeForm"><i class="glyphicon glyphicon-remove"></i></span>
        </div>
        <div style="padding: 15px;">
            <form name="update" class="update form-horizontal" action="{{url('/user/update')}}" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label class="col-sm-4 control-label">用户手机号：</label>
                    <div class="col-sm-8">
                        <input type="tel" name="user_phone" class="form-control user_phone" placeholder="请输入用户手机号">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">用户称呼：</label>
                    <div class="col-sm-8">
                        <input type="tel" name="user_name" class="form-control user_name" placeholder="请输入用户称呼">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">用户密码：</label>
                    <div class="col-sm-8">
                        <input type="password" name="password" class="form-control password" placeholder="请输入用户设置密码">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">用户类型：</label>
                    <div class="col-sm-8">
                        <select name="user_type" class="user_type form-control">
                            @foreach($usertypes as $usertype)
                                <option value="{{$usertype->value}}">{{$usertype->text}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">用户组：</label>
                    <div class="col-sm-8">
                        <select name="groupid" class="form-control groupid">
                            @foreach($groups as $group)
                                <option value="{{$group->value}}">{{$group->text}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <input type="hidden" name="do_method" value="add">
                <div class="form-group">
                    <button type="button" name="submit" class="btn btn-success submit form-control" onclick="submitAdd()">提交</button>
                </div>
            </form>
        </div>
    </div>
@stop
@section('js')
    <script type="text/javascript" src="{{url('js/user/user.js')}}"></script>
    @include('admin.layouts.loading')
@endsection