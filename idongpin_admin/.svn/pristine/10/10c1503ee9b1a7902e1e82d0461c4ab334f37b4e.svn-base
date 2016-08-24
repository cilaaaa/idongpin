@extends('admin.layouts.sublayout')
@section('title')商铺管理
@stop
@section('css')
    <link href="{{url('css/product/product.css')}}" rel="stylesheet">
    <link href="{{url('css/tableStyle.css')}}" rel="stylesheet">
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">

@endsection
@section('navigation')
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="{{ route('product::list') }}" class="navbar-brand" onclick="showLoading();">
                    商品管理
                </a>
                <span class="tag">>></span>
            </div>
            <ul class="nav navbar-nav">
                <li class="{{ Route::is('product::list') ? 'active' : '' }}" onclick="showLoading();">
                    <a href="{{ route('product::list') }}" onclick="showLoading();">
                        商品列表
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
            <button class="btn btn-primary search"  type="submit">搜索</button>
        </form>
        <span class="sel_title">请选择商铺名：</span>
        <?php
        isset($_GET['companyid']) ? $companyid = $_GET['companyid'] : $companyid = "";
        ?>
        <select class="sel_company" id="sel_company">
            @foreach($companies as $key => $value)
                <option data-id="{{$value->company_id}}"
                        value="{{$value->company_id}}" {{($companyid==$value->company_id)?"selected":""}}>{{$value->company_name}}</option>
            @endforeach
        </select>
        <button class="btn btn-success add text-center" onclick="window.location.href='{{url('product/add?companyid='.(isset($_GET['companyid'])?$_GET['companyid']:$companies[0]['company_id']))}}'"><i
                    class="glyphicon glyphicon-plus"></i>添加商品
        </button>
    </div>
    <div class="table-responsive">
        <table class="table table-condensed table-hover table-stats table-bordered" id="company">
            <thead>
            <tr>
                <td style="width: 150px;">操作</td>
                <td>商品ID</td>
                <td>商品名称</td>
                <td>商品类型</td>
                <td>商品描述</td>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $key=>$value)
                <tr>
                    <td>
                        <a class="btn btn-xs btn-info looking" href="{{url('product/item?proid='.$value['proid'])}}">
                            <i class="glyphicon glyphicon-search">查看</i>
                        </a>
                        <a class="btn btn-xs btn-danger  deleting" data-number="{{$value['proid']}}" onclick="deletePro(this);">
                            <i class="glyphicon glyphicon-trash">删除</i>
                        </a>
                    </td>
                    <td>{{$value['proid']}}</td>
                    <td>{{$value['pro_name']}}</td>
                    <td>{{$value['pro_type_name']}}</td>
                    <td>{{$value['proinfo_desc']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @include('admin.layouts.paginate')
@stop
@section('js')
    <script src="{{url('js/product/product.js')}}"></script>
    @include('admin.layouts.loading')
    <script type="text/javascript">
        function deletePro(obj){
            showLoading();
            var pro_id = $(obj).attr('data-number');
            var r = confirm('确定要删除该商品吗？');
            if(r == true){
                $.ajax({
                    url: 'http://114.55.150.226:8080/product/update',
                    type: 'post',
                    cache: 'false',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        proid:pro_id,
                        do_method: 'del'
                    },
                    success: function (data) {
                        if (data.msg == 'success') {
                            alert('删除成功！');
                            window.location.reload();

                        } else {
                            alert('删除失败！');
                            console.log(data);
                            hideLoading();
                        }
                    },
                    error: function (data) {
                        alert('网络错误，请检查网络设置！');
                        console.log(data);
                        hideLoading();
                    }
                });
            }
        }
    </script>
@endsection