@extends('admin.layouts.sublayout')
@section('css')
    <link href="{{url('css/tableStyle.css')}}" rel="stylesheet">
    <style>

        .add{
            margin-left: 20px;;
        }
        .updateForm{
            display: none;
        }
        .tag{
            font-size: 18px;
            color:#efefef;
            display: inline-block;
            height: 50px;
            line-height: 50px;
            float: right;
        }
        .updateForm{
            width: 600px;
            display: none;
            background-color: #fafafa;
            border:1px solid #e1e1e1;
            border-radius: 5px;
            position: absolute;
            top: 50px;
            margin-left: 50%;
            left: -300px;
        }
        .updateForm .formHeader{
            width: 100%;
            height: 60px;
            line-height: 60px;
            border-bottom: 1px solid #a1a1a1;
        }
        .updateForm .formHeader .formTitle{
            font-family: '微软雅黑';
            font-size: 22px;
            display: inline-block;
            margin-left: 20px;
            float: left;
            color:#333333;
        }
        .updateForm .formHeader .closeForm{
            font-size: 18px;
            display: inline-block;
            float: right;
            margin-right: 20px;
            color:#666666;
        }
        .updateForm .formHeader .closeForm:hover{
            font-size: 22px;
            color:#000000;
            cursor: pointer;
        }
    </style>
@endsection
@section('navigation')
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="{{ route('product::madeinlist') }}" class="navbar-brand" onclick="showLoading()">
                    产地管理
                </a>
                <span class="tag">>></span>
            </div>
            <ul class="nav navbar-nav">
                <li class="{{ Route::is('product::madeinlist') ? 'active' : '' }}">
                    <a href="{{ route('product::madeinlist') }}" onclick="showLoading()">
                        产地列表
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
                    <td>产地id</td>
                    <td>产地名称</td>
                    <td>产地文本</td>
                </tr>
                </thead>
                <tbody>
                @foreach($madein as $madein)
                    <tr>
                        <td>
                            <a class="btn btn-xs btn-info edit" onclick="editmadein(this)"
                               href="javascript:void(0)">
                                编辑
                            </a>
                            <a class="btn btn-xs btn-danger del" onclick="delmadein(this)"
                               href="javascript:void(0)">
                                删除
                            </a>
                        </td>
                        <td>{{$madein->id}}</td>
                        <td>{{$madein->madein_name}}</td>
                        <td>{{$madein->madein_text}}</td>
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
            <form name="update" class="update form-horizontal" action="{{url('madein/update')}}" method="post">
               {{csrf_field()}}
                <div class="form-group {{$errors->has('madein_name')?'has-error':""}}">
                    <label class="col-sm-4 control-label">产地名称：</label>
                    <div class="col-sm-8 ">
                        <input type="tel" name="madein_name" class="form-control madein_name" placeholder="请输入产地名称">
                        @if ($errors->has('madein_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('madein_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{$errors->has('madein_text')?'has-error':""}}">
                    <label class="col-sm-4 control-label">产地显示文本：</label>
                    <div class="col-sm-8 ">
                        <input type="tel" name="madein_text" class="form-control madein_text" placeholder="请输入产地显示文本">
                        @if ($errors->has('madein_text'))
                            <span class="help-block">
                                <strong>{{ $errors->first('madein_text') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <input type="hidden" name="do_method" id="do_method">
                <input type="hidden" name="madeinid" id="madeinid">
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-4">
                        <button type="submit" name="submit" id="madeinBtn" class="btn btn-success btn">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
@section('js')
    <script>

        if('{{$errors->has('msg')}}'){
            alert('{{$errors->first('msg')}}')
        }
        $(".add").click(function(){
            $('.updateForm').show();
            $(".formTitle").html("添加商品产地");
            $(".madein_name").val("");
            $(".madein_text").val("");
            $("#madeinid").val("");
            $("#do_method").val('add');
        });

        function editmadein(obj) {
            $('.updateForm').show();
            $(".formTitle").html("编辑商品产地");
            $("#do_method").val('update');
            $("#madeinid").val($(obj).parent().siblings().eq(0).html());
            $(".madein_name").val($(obj).parent().siblings().eq(1).html());
            $(".madein_text").val($(obj).parent().siblings().eq(2).html());
        }
        function delmadein(obj) {
//            var id= $(obj).parent().siblings().eq(0).html();
//            if (confirm("确认删除该商品产地？")) {
//                showLoading();
//                $.ajax({
//                    url: 'http://114.55.150.226:8080/madein/update',
//                    type: 'post',
//                    cache: 'false',
//                    dataType: 'json',
//                    headers: {
//                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                    },
//                    data: {
//                        do_method: 'del',
//                        madeinid: id
//                    },
//                    success: function (data) {
//                        alert('删除成功！');
//                        console.log(data);
//                        window.location.reload();
//                    },
//                    error: function (data) {
//                        console.log(data);
//                        hideLoading();
//                    }
//                });
//            }

                $(".formTitle").html("");
                $(".madein_name").val("");
                $(".madein_text").val("");
                $("#madeinid").val($(obj).parent().siblings().eq(0).html());
                $("#do_method").val('del');
                $("#madeinBtn").click();

        }
        $('.updateForm .formHeader .closeForm').click(function () {
            $('.updateForm').hide();
            $(".formTitle").html("");
            $(".madein_name").val("");
            $(".madein_text").val("");
            $("#do_method").val("");
            $("#madeinid").val("");
        });
    </script>
    @include('admin.layouts.loading')
@endsection