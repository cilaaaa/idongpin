@extends('admin.layouts.sublayout')
@section('css')
    <link href="{{url('css/order/order_index.css')}}" rel="stylesheet">
    <link href="{{url('css/tableStyle.css')}}" rel="stylesheet">
@endsection
@section('navigation')
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="{{ route('order::index') }}" class="navbar-brand">
                    <i class="fa fa-fw fa-book"></i> 订单管理
                </a>
                <span class="tag">>></span>
            </div>
            <ul class="nav navbar-nav">
                <li class="{{ Route::is('order::launchOrderlist') ? 'active' : '' }}">
                    <a href="{{ route('order::launchOrderlist') }}">
                        询价单管理
                    </a>
                </li>
            </ul>
        </div>
    </nav>
@stop
@section('content')
    <div class='text-left searchContent'>
        <form method="get" action="">
            <input type="text" name="keywords" id="search" value="{{isset($_GET['keywords'])?$_GET['keywords']:""}}" placeholder="请输入您搜索的内容..">
            <button class="btn btn-primary search" type="submit">搜索</button>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-condensed table-hover table-stats table-bordered" id="company">
            <thead>
            <tr>
                <td style='width:150px;'>操作</td>
                <td>询价单ID</td>
                <td>询价单名</td>
                <td>创建时间</td>
                <td>创建者</td>
                <td>报价状态</td>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $key=>$value)
                <tr>
                    <td>
                        <a class="btn btn-xs btn-info looking" href="{{url('launchOrder/item?orderid='.$value->launch_order_id)}}">
                            <i class="glyphicon glyphicon-search">查看</i>
                        </a>
                        <a class="btn btn-xs btn-danger looking" data-order_id="{{$value->launch_order_id}}" onclick="delOrder(this);">
                            <i class="glyphicon glyphicon-remove">删除</i>
                        </a>
                    </td>
                    <td>{{isset($value->launch_order_id)?$value->launch_order_id:""}}</td>
                    <td>{{isset($value->launch_order_name)?$value->launch_order_name:""}}</td>
                    <td>{{isset($value->created_at)?$value->created_at:""}}</td>
                    <td>{{isset($value->user_name)?$value->user_name:""}}</td>
                    <td>{{isset($value->quote_status)?$value->quote_status:""}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @include('admin.layouts.paginate')
@stop
@section('js')
    <script type="text/javascript">
        function delOrder(obj){
            var r=confirm('确定要删除该条询价单吗？');
            if(r){
                showLoading();
                $.ajax({
                    url:'http://114.55.150.226:8080/launchOrder/update',
                    type:'post',
                    cache:'false',
                    dataType:'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        do_method: 'del',
                        launch_order_id:$(obj).attr('data-order_id'),
                    },
                    success: function (data) {
                        if (data.msg == 'success') {
                            alert('删除成功！');
                            window.location.reload();
                        } else {
                            alert(data.msg);
                            console.log(data);
                            hideLoading();
                        }
                    },
                    error: function (data) {
                        alert('网络或服务器错误，请检查网络连接！');
                        console.log(data);
                        hideLoading();
                    }
                });
            }
        }
    </script>
    @include('admin.layouts.loading')
@endsection