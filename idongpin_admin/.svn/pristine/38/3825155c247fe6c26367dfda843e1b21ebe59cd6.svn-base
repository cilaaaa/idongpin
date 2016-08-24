@extends('admin.layouts.sublayout')
@section('title')用户详情
@stop
@section('css')
    <link href="{{url('css/User/userDetail.css')}}" rel="stylesheet">
@endsection
@section('navigation')
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="{{ route('user::list') }}" class="navbar-brand" onclick="showLoading()">
                    用户管理
                </a>
                <span class="tag">>></span>
            </div>s
            <ul class="nav navbar-nav">
                <li class="{{ Route::is('user::list') ? 'active' : '' }}">
                    <a href="{{ route('user::list') }}" onclick="showLoading()">
                        用户列表
                    </a>
                </li>
                <li>
                    <span class="tag">>></span>
                </li>
                <li class="{{ Route::is('user::userDetail') ? 'active' : '' }}">
                    <a href="{{ route('user::userDetail') }}" onclick="showLoading()">
                        用户详情
                    </a>
                </li>
            </ul>
        </div>
    </nav>
@stop
@section('content')
    <div class="updateForm" id="Form">
        <div class="formHeader">
            <input type="hidden" id="companyid" name="companyid" value="">
            <span class="formTitle">用户详细信息</span>
            <span class="btn btn-info goback" ><i class="glyphicon glyphicon-chevron-left"></i>返回</span>
            <span class="btn btn-success updating" ><i class="glyphicon glyphicon-book"></i>编辑</span>
            <span class="btn btn-warning  canceling"><i class="glyphicon glyphicon-remove"></i>取消</span>
            <span class="btn btn-success saving" onclick="saveUpdate();"><i class="glyphicon glyphicon-floppy-save"></i>保存</span>
        </div>
        <div style="padding: 15px;">
            <form name="update" class="update form-horizontal" action="{{url('/user/update')}}" method="post">
                <div class="form-group">
                    <label class="col-sm-4 control-label">用户手机号：</label>
                    <div class="col-sm-8">
                        <input type="tel" name="user_phone" class="form-control user_phone" placeholder="请输入用户手机号"
                               value="{{$user->user_phone}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">用户称呼：</label>
                    <div class="col-sm-8">
                        <input type="text" name="user_name" class="form-control user_name" placeholder="请输入用户称呼" value="{{$user->user_name}}">
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
                        <select name="user_type" class="user_type form-control" id="user_type">
                            @foreach($usertypes as $usertype)
                                <option {{$user->user_type==$usertype->value?"selected":""}} value="{{$usertype->value}}">{{$usertype->text}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @if($user->user_type=="company")
                    <div class="form-group"  id="company_type"  data-display="true">
                        <label class="col-sm-4 control-label">所属公司名称：</label>
                        <div class="col-sm-8">
                            <select name="company_id" class="company_id form-control" value="">
                                @foreach($company as $com)
                                    <option {{$user->company_id == $com->company_id ? "selected":""}} value="{{$com->company_id}}">{{$com->company_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @else
                    <div class="form-group"  id="company_type" style="display: none" data-display="false">
                        <label class="col-sm-4 control-label">所属公司名称：</label>
                        <div class="col-sm-8">
                            <select name="company_id" class="company_id form-control" value="">
                                @foreach($company as $com)
                                    <option value="{{$com->company_id}}">{{$com->company_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif

                <div class="form-group" id="groupid">
                    <label class="col-sm-4 control-label">用户组：</label>
                    <div class="col-sm-8">
                        <select name="groupid" class="form-control groupid">
                            @foreach($groups as $group)
                                <option {{$user->groupid==$group->value?"selected":""}} value="{{$group->value}}">{{$group->text}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
@section('js')
    <script src="{{url('js/user/userDetail.js')}}"></script>
    @include('admin.layouts.loading')
    <script type="text/javascript">
        $('#user_type').delegate("","change",function(){
            if($(this).val() == 'company'){
                $("#company_type").css('display','block');
                $("#company_type").attr('data-display','true')
            }else{
                $("#company_type").css('display','none');
                $("#company_type").attr('data-display','false')
            }
        });
    </script>
@endsection